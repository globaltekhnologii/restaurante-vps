# 🍽️ Sistema de Gestión de Restaurante - Global Tekhnologii

Sistema integral de gestión para restaurantes con arquitectura multi-tenant (SaaS), que incluye módulos de ventas, inventario, cocina, hardware periférico y actualizaciones automáticas.

![Versión](https://img.shields.io/badge/version-3.1.0-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4+-purple.svg)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-orange.svg)
![Licencia](https://img.shields.io/badge/license-Propietario-red.svg)

---

## 📋 Tabla de Contenidos

- [Características Principales](#-características-principales)
- [Módulos del Sistema](#-módulos-del-sistema)
- [Requisitos del Sistema](#-requisitos-del-sistema)
- [Instalación](#-instalación)
- [Configuración](#-configuración)
- [Arquitectura Multi-Tenant](#-arquitectura-multi-tenant)
- [Hardware Periférico](#-hardware-periférico)
- [Sistema de Actualizaciones](#-sistema-de-actualizaciones)
- [Seguridad](#-seguridad)
- [API](#-api)
- [Contribuir](#-contribuir)
- [Licencia](#-licencia)

---

## ✨ Características Principales

- 🏢 **Multi-Tenant (SaaS)**: Soporte para múltiples restaurantes con aislamiento completo de datos
- 🖨️ **Hardware Periférico**: Integración con impresoras térmicas, balanzas digitales y termómetros
- 📊 **Dashboard Administrativo**: Panel de control completo con estadísticas en tiempo real
- 🍳 **Gestión de Cocina**: Control de calidad, pesaje de ingredientes y monitoreo de temperatura
- 💰 **Punto de Venta (POS)**: Sistema completo de facturación y gestión de ventas
- 📦 **Inventario Inteligente**: Control automático de stock con alertas de bajo inventario
- 👥 **Gestión de Usuarios**: Sistema de roles (Admin, Cajero, Chef, Mesero, Desarrollador)
- 🔄 **Sistema de Actualizaciones**: Distribución automática de actualizaciones a todos los tenants
- 📱 **Responsive Design**: Interfaz adaptable a dispositivos móviles y tablets
- 🔐 **Seguridad Avanzada**: Autenticación robusta, prepared statements y aislamiento de datos

---

## 🧩 Módulos del Sistema

### 1. **Administración** (`admin.php`)
- Dashboard con estadísticas de ventas
- Gestión de productos, categorías y usuarios
- Configuración de impuestos y métodos de pago
- Reportes y análisis de ventas

### 2. **Punto de Venta** (`venta.php`)
- Interfaz rápida para toma de pedidos
- Cálculo automático de impuestos y descuentos
- Impresión de facturas en impresoras térmicas
- Gestión de mesas y comandas

### 3. **Cocina** (`cocina.php`, `cocina_control_calidad.php`)
- Visualización de pedidos pendientes
- Control de calidad con balanza digital
- Monitoreo de temperatura de alimentos
- Registro de pesajes y temperaturas

### 4. **Inventario** (`inventario.php`)
- Control de stock en tiempo real
- Alertas de productos con bajo inventario
- Gestión de proveedores
- Historial de movimientos

### 5. **Hardware Periférico** (v3.1.0)
- **Impresoras Térmicas**: Configuración y gestión de impresoras ESC/POS
- **Balanzas Digitales**: Integración con balanzas USB/Bluetooth
- **Termómetros**: Monitoreo de temperatura de alimentos
- **Cajones de Dinero**: Control automático de apertura
- **Lectores de Código de Barras**: Escaneo rápido de productos

### 6. **Sistema de Actualizaciones** (`admin_updates.php`)
- Panel exclusivo para desarrollador
- Creación y distribución de actualizaciones
- Monitoreo de versiones por tenant
- Gestión de actualizaciones críticas

---

## 💻 Requisitos del Sistema

### Software Requerido

- **Servidor Web**: Apache 2.4+ o Nginx
- **PHP**: 7.4 o superior
- **MySQL**: 5.7 o superior (o MariaDB 10.3+)
- **Extensiones PHP**:
  - `mysqli`
  - `json`
  - `session`
  - `mbstring`
  - `gd` (para generación de imágenes)

### Hardware Recomendado

- **Procesador**: Dual-core 2.0 GHz o superior
- **RAM**: 4 GB mínimo (8 GB recomendado)
- **Almacenamiento**: 10 GB de espacio libre
- **Red**: Conexión a internet para actualizaciones

### Hardware Periférico Compatible

- **Impresoras Térmicas**: Compatibles con ESC/POS (58mm o 80mm)
- **Balanzas**: USB, Bluetooth o Serial con protocolo estándar
- **Termómetros**: Digitales con salida USB o Bluetooth
- **Lectores de Código de Barras**: USB HID o Serial

---

## 🚀 Instalación

### 1. Clonar el Repositorio

```bash
git clone https://github.com/tu-usuario/globaltekhnologii.git
cd globaltekhnologii
```

### 2. Configurar la Base de Datos

```bash
# Crear base de datos
mysql -u root -p
CREATE DATABASE menu_restaurante CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;

# Importar estructura base
mysql -u root -p menu_restaurante < database/schema.sql
```

### 3. Configurar Credenciales

Editar `Restaurante/config.php`:

```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'tu_usuario');
define('DB_PASS', 'tu_contraseña');
define('DB_NAME', 'menu_restaurante');
?>
```

### 4. Ejecutar Scripts de Instalación

```bash
# Navegar a la carpeta del proyecto
cd Restaurante

# Ejecutar setup de hardware periférico
php setup_hardware_periferico.php
```

### 5. Configurar Permisos

```bash
# En Linux/Mac
chmod -R 755 Restaurante/
chmod -R 777 Restaurante/uploads/

# En Windows (ejecutar como administrador)
icacls Restaurante /grant Users:F /T
```

### 6. Acceder al Sistema

```
URL: http://localhost/globaltekhnologii/Restaurante/
Usuario: admin
Contraseña: 123456
```

> ⚠️ **IMPORTANTE**: Cambiar la contraseña del administrador después del primer inicio de sesión.

---

## ⚙️ Configuración

### Configuración de Tenant

Cada restaurante (tenant) debe configurarse en la tabla `saas_tenants`:

```sql
INSERT INTO saas_tenants (restaurant_name, tenant_key, status) 
VALUES ('Mi Restaurante', 'UNIQUE_KEY_HERE', 'active');
```

### Configuración de Impresora Térmica

1. Ir a **Admin → Hardware Periférico → Configuración de Impresora**
2. Seleccionar tipo de conexión (USB, Red, Bluetooth)
3. Configurar parámetros:
   - Ancho de papel (58mm o 80mm)
   - Velocidad de impresión
   - Corte automático
4. Probar conexión

### Configuración de Balanza Digital

1. Ir a **Admin → Hardware Periférico → Hardware de Cocina**
2. Configurar balanza:
   - Puerto de conexión
   - Protocolo de comunicación
   - Unidad de medida (g, kg, oz, lb)
3. Calibrar balanza

---

## 🏢 Arquitectura Multi-Tenant

### Aislamiento de Datos

Cada tenant tiene sus propios datos completamente aislados:

```php
// Todas las consultas incluyen filtro de tenant_id
$stmt = $conn->prepare("SELECT * FROM productos WHERE tenant_id = ?");
$stmt->bind_param("i", $_SESSION['tenant_id']);
```

### Tablas Compartidas vs. Aisladas

**Tablas Compartidas** (sin `tenant_id`):
- `saas_tenants` - Información de restaurantes
- `system_updates` - Actualizaciones del sistema
- `usuarios` - Usuarios del sistema

**Tablas Aisladas** (con `tenant_id`):
- `productos`, `categorias`, `ventas`
- `inventario`, `movimientos_inventario`
- `config_impresora`, `config_hardware_cocina`
- `registro_pesajes`, `registro_temperaturas`

---

## 🖨️ Hardware Periférico

### Impresoras Térmicas

**Protocolos Soportados:**
- ESC/POS (Epson Standard Code for Point of Sale)
- Star Line Mode
- Citizen CBM

**Funcionalidades:**
- Impresión de facturas
- Impresión de comandas de cocina
- Apertura automática de cajón
- Corte automático de papel
- Códigos de barras y QR

**Ejemplo de Uso:**

```javascript
const printer = new ThermalPrinter('USB', '/dev/usb/lp0');
await printer.connect();
await printer.printInvoice(invoiceData);
await printer.openCashDrawer();
```

### Balanzas Digitales

**Características:**
- Pesaje en tiempo real
- Múltiples unidades (g, kg, oz, lb)
- Tara automática
- Registro de pesajes
- Alertas de peso fuera de rango

**Ejemplo de Uso:**

```javascript
const scale = new DigitalScale('USB', '/dev/ttyUSB0');
await scale.connect();
const weight = await scale.getWeight(); // { value: 250, unit: 'g' }
```

### Control de Temperatura

**Funcionalidades:**
- Monitoreo continuo de temperatura
- Alertas de temperatura fuera de rango
- Registro histórico
- Gráficas de tendencias

---

## 🔄 Sistema de Actualizaciones

### Para Desarrolladores

**Crear Nueva Actualización:**

1. Acceder a `admin_updates.php` (solo usuario ID=1)
2. Completar formulario:
   - **Versión**: Formato X.Y.Z (ej: 3.1.0)
   - **Nombre**: Nombre descriptivo
   - **Descripción**: Detalles de la actualización
   - **Changelog**: Lista de cambios
   - **Opciones**: Crítica, Requiere reinicio
3. Hacer clic en "Crear Actualización"

**Distribuir Actualización:**

1. Localizar la actualización en la lista
2. Hacer clic en "Distribuir"
3. Confirmar distribución a todos los tenants

### Para Tenants

Las actualizaciones se verifican automáticamente mediante:

```php
// API: api/check_updates.php
GET /api/check_updates.php?tenant_id=1

Response:
{
  "tiene_actualizacion": true,
  "version_actual": "3.0.0",
  "version_disponible": "3.1.0",
  "es_critica": false,
  "requiere_reinicio": true,
  "changelog": "..."
}
```

---

## 🔐 Seguridad

### Medidas Implementadas

1. **Prepared Statements**: Prevención de SQL Injection
   ```php
   $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
   $stmt->bind_param("s", $username);
   ```

2. **Sanitización de Entrada**:
   ```php
   $input = htmlspecialchars(trim($_POST['data']), ENT_QUOTES, 'UTF-8');
   ```

3. **Control de Sesiones**:
   ```php
   session_start();
   if (!isset($_SESSION['user_id'])) {
       header('Location: login.php');
       exit;
   }
   ```

4. **Aislamiento de Tenant**:
   ```php
   // Todas las consultas filtran por tenant_id
   WHERE tenant_id = ?
   ```

5. **Roles y Permisos**:
   - Admin: Acceso completo
   - Cajero: Solo ventas
   - Chef: Solo cocina
   - Mesero: Solo pedidos
   - Desarrollador: Actualizaciones

### Recomendaciones

- ✅ Cambiar contraseñas por defecto
- ✅ Usar HTTPS en producción
- ✅ Configurar firewall
- ✅ Backups automáticos diarios
- ✅ Actualizar regularmente
- ✅ Monitorear logs de acceso

---

## 📡 API

### Endpoints Disponibles

#### Check Updates
```http
GET /api/check_updates.php?tenant_id={id}
```

#### Imprimir Factura
```http
POST /api/imprimir_factura.php
Content-Type: application/json

{
  "venta_id": 123,
  "tenant_id": 1,
  "tipo_impresion": "factura"
}
```

#### Obtener Peso
```http
GET /api/get_weight.php?tenant_id={id}
```

#### Obtener Temperatura
```http
GET /api/get_temperature.php?tenant_id={id}
```

---

## 📊 Estructura del Proyecto

```
globaltekhnologii/
├── Restaurante/
│   ├── admin.php                    # Panel administrativo
│   ├── venta.php                    # Punto de venta
│   ├── cocina.php                   # Panel de cocina
│   ├── inventario.php               # Gestión de inventario
│   ├── admin_updates.php            # Gestión de actualizaciones
│   ├── admin_config_impresora.php   # Config. impresoras
│   ├── admin_config_hardware_cocina.php  # Config. hardware cocina
│   ├── cocina_control_calidad.php   # Control de calidad
│   ├── setup_hardware_periferico.php # Setup de BD
│   ├── config.php                   # Configuración DB
│   ├── auth_helper.php              # Autenticación
│   ├── api/
│   │   ├── check_updates.php        # API de actualizaciones
│   │   └── imprimir_factura.php     # API de impresión
│   ├── js/
│   │   ├── thermal_printer.js       # Librería de impresora
│   │   └── kitchen_hardware.js      # Librería hardware cocina
│   ├── css/
│   │   └── admin-modern.css         # Estilos modernos
│   └── includes/
│       └── tenant_context.php       # Contexto multi-tenant
└── README.md
```

---

## 🐛 Solución de Problemas

### Error: "Unknown column 'nombre'"

**Solución**: Ejecutar script de actualización de BD:

```sql
ALTER TABLE system_updates 
ADD COLUMN IF NOT EXISTS nombre VARCHAR(100) NOT NULL AFTER version;
```

### Impresora no conecta

**Solución**:
1. Verificar que el driver esté instalado
2. Comprobar puerto de conexión
3. Revisar permisos de acceso al puerto
4. Probar con otra aplicación

### Balanza no responde

**Solución**:
1. Verificar conexión física
2. Comprobar protocolo de comunicación
3. Calibrar balanza
4. Reiniciar dispositivo

---

## 📝 Changelog

### v3.1.0 (2025-12-21)

#### ✨ Nuevas Características
- Sistema completo de hardware periférico
- Panel de configuración de impresoras térmicas
- Panel de configuración de hardware de cocina
- Panel de control de calidad para chefs
- Sistema de actualizaciones automáticas
- Integración con balanzas digitales
- Monitoreo de temperatura de alimentos

#### 🔧 Correcciones
- Corregido error "Unknown column 'nombre'" en `system_updates`
- Corregido `bind_param` con número incorrecto de parámetros
- Eliminados warnings de `navbar_admin.php`

#### 📚 Documentación
- README completo con guías de instalación
- Documentación de API
- Guías de configuración de hardware
- Walkthrough de depuración

### v3.0.0 (2025-12-15)
- Lanzamiento inicial del sistema multi-tenant
- Módulos de admin, ventas, cocina e inventario
- Sistema de autenticación y roles

---

## 👥 Contribuir

Este es un proyecto propietario de **Global Tekhnologii**. Para contribuir:

1. Contactar al equipo de desarrollo
2. Solicitar acceso al repositorio
3. Seguir las guías de estilo de código
4. Crear pull requests con descripción detallada

---

## 📄 Licencia

Copyright © 2025 Global Tekhnologii. Todos los derechos reservados.

Este software es propietario y confidencial. No está permitida su distribución, modificación o uso sin autorización expresa de Global Tekhnologii.

---

## 📞 Contacto y Soporte

### Soporte Técnico
- **Email**: soporte@globaltekhnologii.com
- **Documentación**: [docs.globaltekhnologii.com](https://docs.globaltekhnologii.com)
- **Issues**: Reportar en el sistema interno de tickets

### Contrataciones y Servicios
- **Email**: contrataciones@globaltekhnologii.com
- **Consultas Comerciales**: Disponibles para proyectos personalizados
- **Desarrollo a Medida**: Soluciones adaptadas a tus necesidades

---

## 🤖 Desarrollo Asistido por IA

> **AVISO IMPORTANTE**: Este proyecto ha sido desarrollado con la asistencia de **Inteligencia Artificial** utilizando **Antigravity**, la plataforma de desarrollo agentico de **Google DeepMind**.
> 
> Antigravity ha permitido:
> - ✨ Desarrollo acelerado de funcionalidades complejas
> - 🔍 Análisis profundo de código y arquitectura
> - 🐛 Depuración asistida y resolución de problemas
> - 📚 Generación automática de documentación
> - 🎯 Optimización de rendimiento y seguridad
>
> **Global Tekhnologii** combina la potencia de la IA con la experiencia humana para crear soluciones de software de alta calidad, eficientes y escalables.

---

## 🏢 Sobre Global Tekhnologii

**Global Tekhnologii** es una empresa dedicada al desarrollo de soluciones tecnológicas innovadoras para la industria de restaurantes y servicios.

### Nuestra Misión
Transformar la gestión de restaurantes mediante tecnología de vanguardia, combinando desarrollo tradicional con las últimas innovaciones en Inteligencia Artificial.

### Nuestros Valores
- 🚀 **Innovación**: Uso de tecnologías emergentes como IA para acelerar el desarrollo
- 🔐 **Seguridad**: Implementación de las mejores prácticas de seguridad
- 🎯 **Calidad**: Código limpio, bien documentado y mantenible
- 🤝 **Transparencia**: Comunicación clara sobre nuestros métodos y herramientas

### Servicios
- Desarrollo de software a medida
- Integración de sistemas
- Consultoría tecnológica
- Soporte y mantenimiento
- Desarrollo asistido por IA

---

## 🙏 Agradecimientos

Desarrollado con ❤️ por el equipo de **Global Tekhnologii**

### Equipo de Desarrollo
- **Arquitectura**: Sistema multi-tenant robusto y escalable
- **Seguridad**: Implementación de mejores prácticas
- **UX/UI**: Diseño moderno y responsive
- **Hardware**: Integración con dispositivos periféricos

### Tecnologías y Herramientas
- **Antigravity** (Google DeepMind): Asistente de desarrollo agentico con IA
- **PHP & MySQL**: Stack principal del backend
- **JavaScript**: Librerías de hardware periférico
- **Git**: Control de versiones

---

## 📜 Firma Digital

```
╔══════════════════════════════════════════════════════════════╗
║                                                              ║
║              🌐 GLOBAL TEKHNOLOGII                          ║
║                                                              ║
║  Sistema de Gestión de Restaurante v3.1.0                   ║
║  Desarrollado con asistencia de IA (Antigravity)            ║
║                                                              ║
║  Copyright © 2025 Global Tekhnologii                        ║
║  Todos los derechos reservados                              ║
║                                                              ║
║  📧 Contrataciones: contrataciones@globaltekhnologii.com    ║
║  🛠️ Soporte: soporte@globaltekhnologii.com                  ║
║                                                              ║
║  Powered by Antigravity - Google DeepMind                   ║
║                                                              ║
╚══════════════════════════════════════════════════════════════╝
```

---

**¡Gracias por usar nuestro sistema de gestión de restaurantes!** 🍽️

*Desarrollado con la potencia de la Inteligencia Artificial y la experiencia humana.*
