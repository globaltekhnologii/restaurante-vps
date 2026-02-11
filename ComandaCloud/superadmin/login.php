<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administración - ComandaCloud</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="auth-page">
        <div class="card auth-card">
            <div class="auth-header">
                <a href="../index.php" class="auth-logo">ComandaCloud</a>
                <p style="color: var(--text-muted);">Acceso Administrativo</p>
            </div>
            
            <form action="dashboard.php" method="POST">
                <div class="form-group">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" id="username" name="username" class="form-input" placeholder="admin@comandacloud.com" required>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;">Iniciar Sesión</button>
            </form>
            
            <div style="margin-top: 1.5rem; text-align: center;">
                <a href="../index.php" style="color: var(--text-muted); text-decoration: none; font-size: 0.875rem;">&larr; Volver al inicio</a>
            </div>
        </div>
    </div>
</body>
</html>
