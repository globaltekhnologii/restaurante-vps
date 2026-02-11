<?php require_once '../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Restaurante - ComandaCloud</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Specific overrides for tenant view */
        .sidebar { background-color: #f8fafc; }
        .nav-item.active { background-color: white; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); }
    </style>
</head>
<body>
    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div style="background: var(--secondary-color); width: 32px; height: 32px; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: white;">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div>
                    <div style="font-weight: 800; font-size: 1rem;">La Parrilla de Juan</div>
                    <div style="font-size: 0.75rem; color: var(--secondary-color);">Online</div>
                </div>
            </div>
            
            <!-- Quick Action Button -->
            <div style="padding: 1rem;">
                <button class="btn btn-primary" style="width: 100%; background-color: var(--secondary-color); font-size: 0.9rem;">
                    <i class="fa-solid fa-plus" style="margin-right: 0.5rem;"></i> Nueva Orden
                </button>
            </div>

            <nav class="sidebar-nav" style="padding-top: 0.5rem;">
                <a href="#" class="nav-item active">
                    <i class="fa-solid fa-cash-register"></i> Punto de Venta
                </a>
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-fire-burner"></i> Cocina
                </a>
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-list-check"></i> Pedidos Activos
                </a>
                
                <div class="nav-section-title">Administración</div>
                
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-utensils"></i> Menú / Platos
                </a>
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-chart-pie"></i> Reportes
                </a>
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-users-gear"></i> Personal
                </a>
            </nav>
            
            <div class="user-profile">
                <div class="user-avatar" style="background-color: var(--secondary-color);">C</div>
                <div style="flex: 1;">
                    <div style="font-weight: 600; font-size: 0.875rem;">Cajero 1</div>
                    <div style="color: var(--text-muted); font-size: 0.75rem;">Turno Mañana</div>
                </div>
                <a href="../index.php" style="color: var(--text-muted);"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h1 class="page-title">Punto de Venta</h1>
                    <p style="color: var(--text-muted);">Martes, 11 de Febrero 2026</p>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div style="background: white; padding: 0.5rem 1rem; border-radius: var(--radius-md); border: 1px solid var(--border-color); display: flex; flex-direction: column; align-items: flex-end;">
                        <span style="font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase;">Caja Actual</span>
                        <span style="font-weight: 700;">$ 450.00</span>
                    </div>
                </div>
            </header>

            <!-- Quick Stats -->
            <div class="stats-grid" style="grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1.5rem;">
                <div class="stat-card" style="padding: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div>
                            <div class="stat-label">Mesas Ocupadas</div>
                            <div class="stat-value" style="font-size: 1.5rem;">8<span style="font-size: 1rem; color: var(--text-muted); font-weight: normal;">/20</span></div>
                        </div>
                        <div style="background: #E0E7FF; color: var(--primary-color); padding: 0.5rem; border-radius: 0.5rem;">
                            <i class="fa-solid fa-chair"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card" style="padding: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div>
                            <div class="stat-label">Pedidos en Cocina</div>
                            <div class="stat-value" style="font-size: 1.5rem;">5</div>
                        </div>
                        <div style="background: #FEF3C7; color: #D97706; padding: 0.5rem; border-radius: 0.5rem;">
                            <i class="fa-solid fa-fire"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card" style="padding: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div>
                            <div class="stat-label">Pedidos Domicilio</div>
                            <div class="stat-value" style="font-size: 1.5rem;">2</div>
                        </div>
                        <div style="background: #D1FAE5; color: #059669; padding: 0.5rem; border-radius: 0.5rem;">
                            <i class="fa-solid fa-motorcycle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Orders Grid (Visual) -->
            <h3 style="margin-bottom: 1rem; font-size: 1.1rem;">Mesas Activas</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 1rem;">
                <!-- Table Card 1 -->
                <div class="card" style="padding: 1rem; cursor: pointer; border: 2px solid transparent; transition: all 0.2s;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <span style="font-weight: 700; color: var(--text-main);">Mesa 1</span>
                        <span style="background: #DEF7EC; color: #03543F; font-size: 0.7rem; padding: 0.2rem 0.5rem; border-radius: 4px;">Comiendo</span>
                    </div>
                    <div style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.5rem;">
                        <i class="fa-regular fa-clock"></i> 45 min
                    </div>
                    <div style="font-weight: 600; text-align: right; color: var(--primary-color);">
                        $ 45.00
                    </div>
                </div>

                <!-- Table Card 2 -->
                <div class="card" style="padding: 1rem; border: 2px solid var(--secondary-color);">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <span style="font-weight: 700; color: var(--text-main);">Mesa 4</span>
                        <span style="background: #FEF3C7; color: #92400E; font-size: 0.7rem; padding: 0.2rem 0.5rem; border-radius: 4px;">Esperando</span>
                    </div>
                    <div style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.5rem;">
                        <i class="fa-regular fa-clock"></i> 5 min
                    </div>
                    <div style="font-weight: 600; text-align: right; color: var(--primary-color);">
                        $ 0.00
                    </div>
                </div>
                
                <!-- Empty Table -->
                <div class="card" style="padding: 1rem; background-color: #F9FAFB; border: 1px dashed var(--border-color); display: flex; align-items: center; justify-content: center; height: 120px; color: var(--text-muted);">
                    <div style="text-align: center;">
                        <i class="fa-solid fa-plus" style="display: block; margin-bottom: 0.5rem;"></i>
                        Abrir Nueva
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
