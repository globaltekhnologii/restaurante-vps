<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restaurante - ComandaCloud</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="auth-page" style="background-color: #f0fdf4;"> <!-- Slight green tint for differentiation -->
        <div class="card auth-card">
            <div class="auth-header">
                <a href="../index.php" class="auth-logo" style="color: var(--secondary-color);">ComandaCloud</a>
                <p style="color: var(--text-muted);">Acceso para Restaurantes</p>
            </div>
            
            <form action="dashboard.php" method="POST">
                
                <!-- Tenant ID (Could be hidden if using subdomains later) -->
                <div class="form-group">
                    <label for="tenant_id" class="form-label">Código del Restaurante</label>
                    <input type="text" id="tenant_id" name="tenant_id" class="form-input" placeholder="Ej. REST-001" required>
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">Usuario / Email</label>
                    <input type="text" id="username" name="username" class="form-input" placeholder="usuario@restaurante.com" required>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%; background-color: var(--secondary-color);">Entrar al Restaurante</button>
            </form>
            
            <div style="margin-top: 1.5rem; text-align: center;">
                <a href="../index.php" style="color: var(--text-muted); text-decoration: none; font-size: 0.875rem;">&larr; Volver al inicio</a>
            </div>
        </div>
    </div>
</body>
</html>
