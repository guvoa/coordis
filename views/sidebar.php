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

    <div style="padding: 10px 24px 16px 0px;">
        <a href="../controllers/AuthController.php?action=logout"
            style="color: #ef4444; font-size: 13px; text-decoration: none; display: flex; align-items: center; gap: 6px;">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión
        </a>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-category">PRINCIPAL</div>
        <a href="dashboard.php" class="nav-item active"><i class="fa-solid fa-gauge-high"></i> <span>Panel de
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
                <a href="terms.php" class="nav-sub-item"><span>Términos</span></a>
                <a href="#" class="nav-sub-item"><span>Configuración</span></a>
            </div>
        </div>
    </nav>
</aside>