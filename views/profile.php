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
    <title>Vona - Perfil de Usuario</title>
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
                        <a href="profile.php" class="nav-sub-item active"><span>Perfil</span></a>
                        <a href="terms.php" class="nav-sub-item"><span>Términos</span></a>
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
                        <span>Vona</span> <i class="fa-solid fa-chevron-right"></i> <span>Perfil</span>
                    </div>
                    <h2>Perfil de Usuario</h2>
                </div>

                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar-large">
                            <?php echo strtoupper(substr($_SESSION['user_name'] ?? 'U', 0, 1)); ?>
                        </div>
                        <h2 class="profile-name">
                            <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Usuario'; ?>
                        </h2>
                        <span class="profile-role">Administrador del Sistema</span>
                    </div>

                    <div class="profile-body">
                        <div class="profile-section">
                            <h3>Información Personal</h3>
                            <div class="info-grid">
                                <div class="info-item">
                                    <label>Nombre Completo</label>
                                    <div>
                                        <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : '-'; ?>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <label>Correo Electrónico</label>
                                    <div>
                                        <?php echo isset($_SESSION['user_email']) ? htmlspecialchars($_SESSION['user_email']) : '-'; ?>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <label>Teléfono</label>
                                    <div>+52 555 123 4567</div>
                                </div>
                                <div class="info-item">
                                    <label>Ubicación</label>
                                    <div>Ciudad de México, México</div>
                                </div>
                            </div>
                        </div>

                        <div class="profile-section">
                            <h3>Configuración de Cuenta</h3>
                            <div class="info-grid">
                                <div class="info-item">
                                    <label>Estado</label>
                                    <div style="color: #16a34a;"><i class="fa-solid fa-circle-check"></i> Activo</div>
                                </div>
                                <div class="info-item">
                                    <label>Rol</label>
                                    <div>Administrador</div>
                                </div>
                                <div class="info-item">
                                    <label>Miembro desde</label>
                                    <div>15 Feb, 2026</div>
                                </div>
                            </div>
                        </div>
                    </div>
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