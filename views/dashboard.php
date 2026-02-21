<?php
include 'passport.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vona - Panel de Control</title>
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
        <?php include 'sidebar.php'; ?>

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
                        <span>Vona</span> <i class="fa-solid fa-chevron-right"></i> <span>Panel de Control</span>
                    </div>
                    <h2>Resumen General</h2>
                </div>

                <!-- Widgets -->
                <div class="dashboard-widgets">
                    <div class="widget-card">
                        <div class="widget-info">
                            <h3>1,254</h3>
                            <p>Usuarios Totales</p>
                        </div>
                        <div class="widget-icon blue">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>

                    <div class="widget-card">
                        <div class="widget-info">
                            <h3>$45,230</h3>
                            <p>Ingresos del Mes</p>
                        </div>
                        <div class="widget-icon green">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                    </div>

                    <div class="widget-card">
                        <div class="widget-info">
                            <h3>356</h3>
                            <p>Nuevos Pedidos</p>
                        </div>
                        <div class="widget-icon purple">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                    </div>

                    <div class="widget-card">
                        <div class="widget-info">
                            <h3>12</h3>
                            <p>Tareas Pendientes</p>
                        </div>
                        <div class="widget-icon orange">
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                    </div>
                </div>

                <!-- Charts Area -->
                <div class="dashboard-charts">
                    <div class="chart-card">
                        <div
                            style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 20px;">
                            <h3 style="margin:0; font-size: 18px;">Estadísticas de Usuarios</h3>
                            <select style="padding: 4px; border-radius: 4px; border: 1px solid #ddd;">
                                <option>Últimos 7 días</option>
                                <option>Último mes</option>
                            </select>
                        </div>
                        <div class="chart-placeholder">
                            <i class="fa-solid fa-chart-line" style="margin-right: 8px;"></i> Gráfica de Usuarios (Demo)
                        </div>
                    </div>

                    <div class="chart-card">
                        <h3 style="margin:0 0 20px 0; font-size: 18px;">Dispositivos</h3>
                        <div class="chart-placeholder">
                            <i class="fa-solid fa-chart-pie" style="margin-right: 8px;"></i> Gráfica de Dispositivos
                            (Demo)
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