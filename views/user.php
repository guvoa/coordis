<?php
include 'passport.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vona - Usuarios</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="layout-wrapper">
        <!-- Sidebar Overlay for Mobile -->
        <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <header class="topbar">
                <div class="toggle-sidebar-btn" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="search-bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Buscar...">
                    <span class="command-shortcut">⌘K</span>
                </div>
                <div class="topbar-actions">
                    <div class="icon-btn">
                        <i class="fa-regular fa-bell"></i>
                        <span class="badge">4</span>
                    </div>
                    <div class="icon-btn">
                        <i class="fa-regular fa-moon"></i>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="content-wrapper">
                <div class="page-header">
                    <div class="breadcrumb">
                        <span>Vona</span> <i class="fa-solid fa-chevron-right"></i> <span>Usuarios</span>
                    </div>
                    <h2>Gestión de Usuarios</h2>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title-group">
                            <h3>Lista de Usuarios</h3>
                        </div>
                        <div class="card-actions">
                            <button onclick="openModal()" class="btn-primary" style="margin:0;"><i
                                    class="fa-solid fa-plus"></i> Agregar Usuario</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="userTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>CORREO</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal for Form -->
    <div id="userModal" class="modal-overlay">
        <div class="modal">
            <div class="modal-header">
                <h2 id="modalTitle">Agregar Nuevo Usuario</h2>
                <button onclick="closeModal()" class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <input type="hidden" id="userId">
                    <div class="input-group">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" placeholder="Ingrese nombre">
                    </div>
                    <div class="input-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" placeholder="Ingrese correo">
                    </div>
                    <div class="message" id="message"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal()" class="btn-secondary">Cancelar</button>
                <button id="saveBtn" onclick="saveUser()">Guardar</button>
                <button id="updateBtn" onclick="updateUser()" style="display:none;">Actualizar</button>
            </div>
        </div>
    </div>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="../public/js/script.js"></script>
</body>

</html>