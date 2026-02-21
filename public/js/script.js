const apiUrl = '../controllers/UserController.php';

document.addEventListener('DOMContentLoaded', () => {
    fetchUsers();

    // Modal Close on Outside Click
    const modalOverlay = document.getElementById('userModal');
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function (e) {
            if (e.target === this) closeModal();
        });
    }
});

// Modal Logic
function openModal() {
    const modal = document.getElementById('userModal');
    if (modal) {
        modal.classList.add('active');
        document.getElementById('modalTitle').innerText = 'Agregar Nuevo Usuario';
        clearForm();
    }
}

function closeModal() {
    const modal = document.getElementById('userModal');
    if (modal) {
        modal.classList.remove('active');
    }
}

async function fetchUsers() {
    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        // Destroy existing DataTable instance BEFORE modifying the DOM
        if ($.fn.DataTable.isDataTable('#userTable')) {
            $('#userTable').DataTable().destroy();
        }

        const tbody = document.querySelector('#userTable tbody');
        tbody.innerHTML = '';

        if (data.records) {
            data.records.forEach(user => {
                const row = document.createElement('tr');
                // Random status for demo purposes to match image
                const statuses = ['Active', 'Inactive'];
                const status = statuses[Math.floor(Math.random() * statuses.length)];
                const statusClass = status === 'Active' ? 'status-active' : 'status-inactive';
                const statusLabel = status === 'Active' ? 'Activo' : 'Inactivo';
                const badgeClass = status === 'Active' ? 'status-active' : 'status-inactive';

                row.innerHTML = `
                    <td>${user.id}</td>
                    <td>
                        <div style="font-weight:500;">${user.name}</div>
                    </td>
                    <td>${user.email}</td>
                    <td>
                        <span class="status-badge ${badgeClass}">${statusLabel}</span>
                    </td>
                    <td class="actions-cell">
                        <button class="btn-action btn-edit" onclick="editUser('${user.id}', '${user.name}', '${user.email}')">
                            <i class="fa-solid fa-pen"></i> Editar
                        </button>
                        <button class="btn-action btn-delete" onclick="deleteUser('${user.id}')">
                            <i class="fa-solid fa-trash"></i> Eliminar
                        </button>
                    </td>
                `;
                tbody.appendChild(row);
            });

            // Initialize DataTable
            $('#userTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "search": "Buscar:",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                // Build options to keep state if desired like "stateSave": true
                "order": [[0, "desc"]] // Order by ID descending by default to show new users
            });

            // Hide custom pagination/info controls if DataTables is used, 
            // or we could integrate them, but DataTables has its own
            const customPagination = document.querySelector('.pagination-wrapper');
            if (customPagination) customPagination.style.display = 'none';

            const customControls = document.querySelector('.table-controls');
            // We want to keep the "Add User" button but hide the redundant search/entries if DataTable adds them
            // Actually, DataTables adds its own controls wrapper. 
            // Let's hide our custom controls except the button
            if (customControls) {
                // customControls.style.display = 'none'; // logic to keep button?
                // Let's just move the button to a better place or keep it alone
                const dtButtons = document.querySelector('.dt-buttons');
                const searchControl = document.querySelector('.search-control');
                const entriesControl = document.querySelector('.entries-control');
                if (searchControl) searchControl.style.display = 'none';
                if (entriesControl) entriesControl.style.display = 'none';
            }

        } else {
            tbody.innerHTML = '<tr><td colspan="5" style="text-align:center; padding: 20px;">No hay usuarios encontrados</td></tr>';
            // Destroy if exists to show message cleanly
            if ($.fn.DataTable.isDataTable('#userTable')) {
                $('#userTable').DataTable().destroy();
            }
        }
    } catch (error) {
        console.error('Error fetching users:', error);
    }
}

// Sidebar Toggle Logic
// Toggle Sidebar (Mobile)
function toggleSidebar() {
    document.querySelector('.layout-wrapper').classList.toggle('sidebar-collapsed');
    document.querySelector('.sidebar-overlay').classList.toggle('active');
}

function toggleMenu(header) {
    header.parentElement.classList.toggle('active');
}

async function saveUser() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;

    if (!name || !email) {
        alert('Por favor complete todos los campos');
        return;
    }

    const userData = { name, email };

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(userData)
        });

        const result = await response.json();
        // alert(result.message); // Optional, maybe less intrusive?
        closeModal();
        fetchUsers();
    } catch (error) {
        console.error('Error saving user:', error);
    }
}

function editUser(id, name, email) {
    openModal();
    document.getElementById('modalTitle').innerText = 'Editar Usuario';
    document.getElementById('userId').value = id;
    document.getElementById('name').value = name;
    document.getElementById('email').value = email;

    document.getElementById('saveBtn').style.display = 'none';
    const updateBtn = document.getElementById('updateBtn');
    updateBtn.style.display = 'inline-block';

    // Slight style change for update button to match "Primary" look in modal
    updateBtn.className = 'btn-primary';
}

async function updateUser() {
    const id = document.getElementById('userId').value;
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;

    if (!name || !email) {
        alert('Por favor complete todos los campos');
        return;
    }

    const userData = { id, name, email };

    try {
        const response = await fetch(apiUrl, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(userData)
        });

        const result = await response.json();
        // alert(result.message);
        closeModal();
        fetchUsers();

        // Reset buttons handled by clearForm invoked in openModal next time
    } catch (error) {
        console.error('Error updating user:', error);
    }
}

async function deleteUser(id) {
    if (!confirm('¿Está seguro de que desea eliminar este usuario?')) return;

    try {
        const response = await fetch(apiUrl, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        });

        const result = await response.json();
        // alert(result.message);
        fetchUsers();
    } catch (error) {
        console.error('Error deleting user:', error);
    }
}

function clearForm() {
    document.getElementById('userId').value = '';
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('saveBtn').style.display = 'inline-block';
    document.getElementById('updateBtn').style.display = 'none';
}
