<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vona - Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body class="auth-body">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="logo-auth">
                    <i class="fa-solid fa-layer-group"></i> <span>Vona</span>
                </div>
                <p class="auth-subtitle">Ingresa tu correo y contraseña para acceder al panel.</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="auth-alert error">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="auth-alert success">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
            <?php endif; ?>

            <form action="../controllers/AuthController.php?action=login" method="POST">
                <div class="form-group">
                    <label for="email">Dirección de Correo <span class="required">*</span></label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="tu@ejemplo.com"
                        required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña <span class="required">*</span></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••"
                        required>
                </div>

                <div class="form-actions">
                    <label class="checkbox-container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        Mantener sesión iniciada
                    </label>
                    <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn-auth">Iniciar Sesión</button>
            </form>

            <div class="auth-footer">
                ¿Nuevo aquí? <a href="register.php">Crear una cuenta</a>
            </div>
        </div>

        <div class="auth-copyright">
            © 2026 Vona — by Coderthemes
        </div>
    </div>
</body>

</html>