<?php require_once '../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - ComandaCloud</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <i class="fa-solid fa-cloud" style="color: var(--primary-color);"></i>
                <a href="#" class="sidebar-logo">ComandaCloud</a>
            </div>
            
            <nav class="sidebar-nav">
                <a href="#" class="nav-item active">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
                
                <div class="nav-section-title">Gestión</div>
                
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-utensils"></i> Restaurantes
                </a>
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-users"></i> Usuarios
                </a>
                
                <div class="nav-section-title">Facturación</div>
                
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-file-invoice-dollar"></i> Suscripciones
                </a>
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-receipt"></i> Pagos
                </a>

                <div class="nav-section-title">Sistema</div>
                
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-gear"></i> Configuración
                </a>
            </nav>
            
            <div class="user-profile">
                <div class="user-avatar">SA</div>
                <div style="flex: 1;">
                    <div style="font-weight: 600; font-size: 0.875rem;">Super Admin</div>
                    <div style="color: var(--text-muted); font-size: 0.75rem;">Dueño</div>
                </div>
                <a href="../index.php" style="color: var(--text-muted);"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="page-header">
                <h1 class="page-title">Bienvenido, Admin</h1>
                <p style="color: var(--text-muted);">Resumen de actividad de la plataforma.</p>
            </header>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-label">Restaurantes Activos</div>
                    <div class="stat-value">124</div>
                    <div class="stat-trend trend-up">
                        <i class="fa-solid fa-arrow-up"></i> +12% este mes
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-label">Ingresos Mensuales</div>
                    <div class="stat-value">$12.450</div>
                    <div class="stat-trend trend-up">
                        <i class="fa-solid fa-arrow-up"></i> +8.5% vs mes anterior
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-label">Licencias por Vencer</div>
                    <div class="stat-value">5</div>
                    <div class="stat-trend" style="color: var(--accent-color);">
                        <i class="fa-solid fa-circle-exclamation"></i> Requieren atención
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table (Placeholder) -->
            <div class="card">
                <h3 style="margin-bottom: 1.5rem; font-size: 1.1rem;">Registros Recientes</h3>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border-color); text-align: left;">
                                <th style="padding: 1rem; color: var(--text-muted); font-weight: 500;">Restaurante</th>
                                <th style="padding: 1rem; color: var(--text-muted); font-weight: 500;">Plan</th>
                                <th style="padding: 1rem; color: var(--text-muted); font-weight: 500;">Estado</th>
                                <th style="padding: 1rem; color: var(--text-muted); font-weight: 500;">Fecha Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <td style="padding: 1rem; font-weight: 500;">La Parrilla de Juan</td>
                                <td style="padding: 1rem;">Premium</td>
                                <td style="padding: 1rem;"><span style="background: #DEF7EC; color: #03543F; padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.75rem; font-weight: 600;">Activo</span></td>
                                <td style="padding: 1rem; color: var(--text-muted);">Hace 2 horas</td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <td style="padding: 1rem; font-weight: 500;">Sushi Express</td>
                                <td style="padding: 1rem;">Básico</td>
                                <td style="padding: 1rem;"><span style="background: #FEF3C7; color: #92400E; padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.75rem; font-weight: 600;">Pendiente</span></td>
                                <td style="padding: 1rem; color: var(--text-muted);">Ayer</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
