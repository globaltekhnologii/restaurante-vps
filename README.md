# 🍽️ Sistema de Gestión de Restaurante - Global Tekhnologii

Sistema integral de gestión para restaurantes con arquitectura multi-tenant (SaaS), que incluye módulos de ventas, inventario, cocina, hardware periférico y actualizaciones automáticas.

![Versión](https://img.shields.io/badge/version-3.1.0-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4+-purple.svg)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-orange.svg)
![Licencia](https://img.shields.io/badge/license-Propietario-red.svg)

---

## 📋 Tabla de Contenidos

- [Historia del Proyecto](#-historia-del-proyecto)
- [Cronología de Desarrollo](#-cronología-de-desarrollo)
- [Errores y Soluciones Documentados](#-errores-y-soluciones-documentados)
- [Capturas de Pantalla](#-capturas-de-pantalla)
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

## 📖 Historia del Proyecto

### Origen y Evolución

Este proyecto nació como una solución integral para la gestión de restaurantes, evolucionando desde un sistema básico hasta una plataforma SaaS multi-tenant completa con integración de hardware periférico.

### Línea de Tiempo

```
Fase Inicial  │  v1.x - Sistema básico de restaurante
              │  - Menú digital
              │  - Carrito de compras
              │  - Sistema de pedidos
              │
Expansión     │  v2.x - Módulos avanzados
              │  - Panel administrativo
              │  - Gestión de inventario
              │  - Punto de venta (POS)
              │  - Panel de cocina
              │  - Sistema de delivery
              │
Multi-Tenant  │  v3.0.0 - Arquitectura SaaS
              │  - Sistema multi-tenant implementado
              │  - Aislamiento completo de datos
              │  - Gestión de múltiples restaurantes
              │  - Sistema de autenticación con roles
              │
Actual        │  v3.1.0 - Hardware Periférico (Diciembre 2025)
              │  - Integración con impresoras térmicas
              │  - Balanzas digitales y termómetros
              │  - Sistema de actualizaciones automáticas
              │  - Desarrollo asistido por IA (Antigravity)
              │  - Documentación completa
```

---

## 🗓️ Cronología de Desarrollo

### Desarrollo Histórico (Varios Meses)

El proyecto ha evolucionado a través de múltiples iteraciones durante varios meses de desarrollo activo:

**Fase Inicial:**
- Sistema de menú digital
- Carrito de compras básico
- Gestión de pedidos

**Fase de Expansión:**
- Panel administrativo completo
- Sistema de inventario
- Punto de venta (POS)
- Panel de cocina
- Sistema de delivery con GPS
- Integración de pagos (Bold, Mercado Pago)

**Fase Multi-Tenant (v3.0.0):**
- Arquitectura SaaS implementada
- Aislamiento de datos por tenant
- Gestión de múltiples restaurantes
- Sistema de roles y permisos

### Desarrollo Reciente - Hardware Periférico (Diciembre 2025)

#### Fase 1: Planificación

**Objetivo Inicial:** Implementar un sistema completo de hardware periférico para restaurantes.

**Módulos Planificados:**
- Impresoras térmicas ESC/POS
- Balanzas digitales
- Termómetros de cocina
- Sistema de actualizaciones automáticas

#### Fase 2: Implementación (Diciembre 2025)

**Archivos Creados:**
1. `setup_hardware_periferico.php` - 7 nuevas tablas de BD
2. `admin_config_impresora.php` - Panel de impresoras (~800 líneas)
3. `admin_config_hardware_cocina.php` - Panel de hardware (~750 líneas)
4. `cocina_control_calidad.php` - Control de calidad (~550 líneas)
5. `admin_updates.php` - Sistema de actualizaciones (~500 líneas)
6. `thermal_printer.js` - Librería de impresoras
7. `kitchen_hardware.js` - Librería de hardware cocina
8. `api/check_updates.php` - API de actualizaciones
9. `api/imprimir_factura.php` - API de impresión

**Total:** ~4,200 líneas de código

#### Fase 3: Integración (Diciembre 2025)

- ✅ Banner de "Hardware Periférico" agregado a `admin.php`
- ✅ Botones de acceso rápido implementados
- ✅ Visibilidad condicional según rol de usuario
- ✅ Integración completada exitosamente

#### Fase 4: Depuración (Diciembre 2025)

Esta fue la fase más crítica, donde se encontraron y resolvieron 5 errores importantes.

---

## 🐛 Errores y Soluciones Documentados

### Error #1: Unknown column 'fecha_creacion'

**Síntoma:**
```
Unknown column 'fecha_creacion' in 'order clause'
```

**Ubicación:** `admin_updates.php` línea 109

**Causa:** Nombre de columna incorrecto en la consulta SQL. La tabla `system_updates` usa `created_at`, no `fecha_creacion`.

**Solución:**
```php
// ❌ Antes
$updates = $conn->query("SELECT * FROM system_updates ORDER BY fecha_creacion DESC");

// ✅ Después
$updates = $conn->query("SELECT * FROM system_updates ORDER BY created_at DESC");
```

---

### Error #2: Unknown column 't.nombre'

**Síntoma:**
```
Unknown column 't.nombre' in 'field list'
```

**Ubicación:** `admin_updates.php` líneas 111-115

**Causa:** Nombre de columna incorrecto en la tabla `saas_tenants`. La columna correcta es `restaurant_name`, no `nombre`.

**Solución:**
```php
// ❌ Antes
SELECT t.id, t.nombre, tv.version_actual...
FROM saas_tenants t

// ✅ Después
SELECT t.id, t.restaurant_name as nombre, tv.version_actual...
FROM saas_tenants t
```

---

### Error #3: Warning - navbar_admin.php

**Síntoma:**
```
Warning: include(includes/navbar_admin.php): Failed to open stream
```

**Ubicación:** 4 archivos (admin_updates.php, admin_config_impresora.php, etc.)

**Causa:** Los nuevos paneles intentaban incluir un navbar que no existe.

**Solución:**
```php
// ❌ Antes
<?php include 'includes/navbar_admin.php'; ?>

// ✅ Después
<?php // include 'includes/navbar_admin.php'; ?>
```

---

### Error #4: Unknown column 'nombre' (Crítico)

**Síntoma:**
```
Unknown column 'nombre' in 'field list'
```

**Ubicación:** `admin_updates.php` línea 51 (INSERT statement)

**Causa:** La tabla `system_updates` no tenía la columna `nombre`.

**Investigación:**
1. ✅ Verificado que el INSERT requiere columna `nombre`
2. ✅ Inspeccionado `setup_hardware_periferico.php`
3. ✅ Confirmado que faltaba la columna en CREATE TABLE

**Solución:**

Paso 1 - Actualizar `setup_hardware_periferico.php`:
```sql
CREATE TABLE IF NOT EXISTS system_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    version VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,  -- ✅ AGREGADO
    descripcion TEXT NOT NULL,
    changelog TEXT NULL,
    es_critico TINYINT(1) DEFAULT 0,
    requiere_reinicio TINYINT(1) DEFAULT 0,
    ...
);
```

Paso 2 - Ejecutar ALTER TABLE en phpMyAdmin:
```sql
ALTER TABLE system_updates 
ADD COLUMN IF NOT EXISTS nombre VARCHAR(100) NOT NULL AFTER version,
ADD COLUMN IF NOT EXISTS changelog TEXT AFTER descripcion,
ADD COLUMN IF NOT EXISTS es_critico TINYINT(1) DEFAULT 0 AFTER changelog,
ADD COLUMN IF NOT EXISTS requiere_reinicio TINYINT(1) DEFAULT 0 AFTER es_critico;
```

---

### Error #5: ArgumentCountError - bind_param

**Síntoma:**
```
Fatal error: ArgumentCountError: The number of elements in the type definition 
string must match the number of bind variables
```

**Ubicación:** `admin_updates.php` línea 55

**Causa:** `bind_param` tenía 8 tipos (`"ssssiiii"`) pero solo 7 variables.

**Análisis:**
```
Parámetros a insertar:
1. version          (string)
2. nombre           (string)
3. descripcion      (string)
4. changelog        (string)
5. es_critico       (integer)
6. requiere_reinicio (integer)
7. usuario_id       (integer)
Total: 7 parámetros
```

**Solución:**
```php
// ❌ Antes (8 tipos, 7 variables)
$stmt->bind_param("ssssiiii", $version, $nombre, $descripcion, $changelog, 
                  $es_critico, $requiere_reinicio, $usuario_id);

// ✅ Después (7 tipos, 7 variables)
$stmt->bind_param("ssssiis", $version, $nombre, $descripcion, $changelog, 
                  $es_critico, $requiere_reinicio, $usuario_id);
```

---

### ✅ Prueba Final Exitosa

**Acción:** Crear actualización v3.1.0

**Datos de prueba:**
- Versión: `3.1.0`
- Nombre: `Sistema de Hardware Periférico`
- Descripción: `Integración completa de impresoras térmicas, balanzas digitales y control de temperatura`
- Requiere reinicio: ✅

**Resultado:**
```
✅ Actualización v3.1.0 creada exitosamente
```

---

## 📸 Capturas de Pantalla

### Panel de Actualizaciones - Actualización Creada

![Lista de Actualizaciones](https://raw.githubusercontent.com/globaltekhnologii/restaurante-vps/main/.github/screenshots/updates_list_v310.png)

**Detalles visibles:**
- ✅ Versión v3.1.0 con badge azul
- ✅ Nombre "Sistema de Hardware Periférico"
- ✅ Descripción completa
- ✅ Indicador "⚠️ Requiere reinicio"
- ✅ Fecha de creación
- ✅ Botón "Distribuir" funcional

### Estado de Tenants

![Tabla de Tenants](https://raw.githubusercontent.com/globaltekhnologii/restaurante-vps/main/.github/screenshots/tenant_status_table.png)

**Tenants registrados:**
- La casona - v3.0.0
- Mi Restaurante - v3.0.0
- Restaurante Demo - v3.0.0

Todos listos para recibir la actualización v3.1.0

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

## 📞 Soporte

- **Email**: soporte@globaltekhnologii.com
- **Teléfono**: +1 (XXX) XXX-XXXX
- **Documentación**: [docs.globaltekhnologii.com](https://docs.globaltekhnologii.com)
- **Issues**: Reportar en el sistema interno de tickets

---

## 🙏 Agradecimientos

Desarrollado con ❤️ por el equipo de **Global Tekhnologii**

- **Arquitectura**: Sistema multi-tenant robusto y escalable
- **Seguridad**: Implementación de mejores prácticas
- **UX/UI**: Diseño moderno y responsive
- **Hardware**: Integración con dispositivos periféricos

---

**¡Gracias por usar nuestro sistema de gestión de restaurantes!** 🍽️
