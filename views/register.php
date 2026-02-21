<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vona - Registro</title>
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
                <p class="auth-subtitle">Crea tu cuenta para comenzar.</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="auth-alert error">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <form action="../controllers/AuthController.php?action=register" method="POST">
                <div class="form-group">
                    <label for="name">Nombre Completo <span class="required">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Juan Pérez" required>
                </div>

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

                <div class="form-group">
                    <label for="confirm_password">Confirmar Contraseña <span class="required">*</span></label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control"
                        placeholder="••••••••" required>
                </div>

                <div class="form-actions">
                    <label class="checkbox-container">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                        Acepto los <a href="#">Términos y Condiciones</a>
                    </label>
                </div>

                <button type="submit" class="btn-auth">Registrarse</button>
            </form>

            <div class="auth-footer">
                ¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a>
            </div>
        </div>

        <div class="auth-copyright">
            © 2026 Vona — by Coderthemes
        </div>
    </div>
</body>

</html>