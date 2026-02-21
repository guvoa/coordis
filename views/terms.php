<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vona - Términos y Condiciones</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="layout-wrapper">
        <!-- Overlay for mobile sidebar -->
        <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <i class="fa-solid fa-layer-group"></i> <span>Vona</span>
                </div>
                <button class="close-sidebar-btn" onclick="toggleSidebar()"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <div class="user-profile">
                <!-- Avatar placeholder -->
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div class="user-info">
                    <span class="user-name">
                        <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Usuario'; ?>
                    </span>
                    <span class="user-role">Administrador</span>
                </div>
            </div>

            <div style="padding: 0 24px 16px 24px;">
                <a href="../controllers/AuthController.php?action=logout"
                    style="color: #ef4444; font-size: 13px; text-decoration: none; display: flex; align-items: center; gap: 6px;">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión
                </a>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-category">PRINCIPAL</div>
                <a href="dashboard.php" class="nav-item"><i class="fa-solid fa-gauge-high"></i> <span>Panel de
                        Control</span></a>
                <a href="#" class="nav-item"><i class="fa-solid fa-calendar"></i> <span>Calendario</span></a>

                <div class="nav-category">GESTIÓN</div>

                <!-- Pages Group -->
                <div class="nav-item-group">
                    <div class="nav-item-header" onclick="toggleMenu(this)">
                        <i class="fa-regular fa-file"></i>
                        <span style="flex:1; margin-left: 10px;">Páginas</span>
                        <i class="fa-solid fa-chevron-down chevron"></i>
                    </div>
                    <div class="nav-sub-menu">
                        <a href="user.php" class="nav-sub-item"><span>Usuarios</span></a>
                        <a href="profile.php" class="nav-sub-item"><span>Perfil</span></a>
                        <a href="terms.php" class="nav-sub-item active"><span>Términos</span></a>
                        <a href="#" class="nav-sub-item"><span>Configuración</span></a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
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
                        <span>Vona</span> <i class="fa-solid fa-chevron-right"></i> <span>Términos y Condiciones</span>
                    </div>
                    <h2>Términos de Uso</h2>
                </div>

                <div class="card" style="padding: 40px; text-align: justify; line-height: 1.6;">
                    <h3 style="margin-top: 0;">1. Introducción</h3>
                    <p>Bienvenido a Vona. Al acceder a nuestro sitio web, usted acepta estar sujeto a estos términos de
                        servicio, a todas las leyes y regulaciones aplicables, y acepta que es responsable del
                        cumplimiento de cualquier ley local aplicable.</p>

                    <h3>2. Licencia de Uso</h3>
                    <p>Se concede permiso para descargar temporalmente una copia de los materiales (información o
                        software) en el sitio web de Vona solo para visualización transitoria personal y no comercial.
                        Esta es la concesión de una licencia, no una transferencia de título.</p>

                    <h3>3. Renuncia</h3>
                    <p>Los materiales en el sitio web de Vona se proporcionan "tal cual". Vona no ofrece garantías,
                        expresas o implícitas, y por la presente renuncia y niega todas las demás garantías, incluidas,
                        entre otras, las garantías implícitas o las condiciones de comerciabilidad, idoneidad para un
                        propósito particular o no infracción de la propiedad intelectual u otra violación de derechos.
                    </p>

                    <h3>4. Limitaciones</h3>
                    <p>En ningún caso Vona o sus proveedores serán responsables de ningún daño (incluidos, entre otros,
                        daños por pérdida de datos o ganancias, o debido a la interrupción del negocio) que surjan del
                        uso o la incapacidad de usar los materiales en el sitio web de Vona.</p>

                    <h3>5. Precisión de los Materiales</h3>
                    <p>Los materiales que aparecen en el sitio web de Vona podrían incluir errores técnicos,
                        tipográficos o fotográficos. Vona no garantiza que ninguno de los materiales en su sitio web sea
                        preciso, completo o actual.</p>
                </div>

            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        function toggleSidebar() {
            document.querySelector('.layout-wrapper').classList.toggle('sidebar-collapsed');
            document.querySelector('.sidebar-overlay').classList.toggle('active');
        }

        function toggleMenu(header) {
            header.parentElement.classList.toggle('active');
        }
    </script>
</body>

</html>