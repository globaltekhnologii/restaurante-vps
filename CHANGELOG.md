# Changelog

Todos los cambios notables en este proyecto serán documentados en este archivo.

El formato está basado en [Keep a Changelog](https://keepachangelog.com/es-ES/1.0.0/),
y este proyecto adhiere a [Semantic Versioning](https://semver.org/lang/es/).

---

## [3.1.0] - 2025-12-21

### ✨ Agregado

#### Sistema de Hardware Periférico
- **Panel de Configuración de Impresoras** (`admin_config_impresora.php`)
  - Soporte para impresoras térmicas ESC/POS (58mm y 80mm)
  - Configuración de conexión USB, Red y Bluetooth
  - Gestión de cajón de dinero automático
  - Integración con lectores de código de barras
  - Prueba de impresión en tiempo real
  - Interfaz con tabs para organización modular

- **Panel de Configuración de Hardware de Cocina** (`admin_config_hardware_cocina.php`)
  - Configuración de balanzas digitales (USB/Bluetooth/Serial)
  - Soporte para múltiples unidades de medida (g, kg, oz, lb)
  - Configuración de termómetros digitales
  - Alertas de temperatura fuera de rango
  - Calibración de dispositivos
  - Interfaz intuitiva con tabs

- **Panel de Control de Calidad** (`cocina_control_calidad.php`)
  - Pesaje en tiempo real de ingredientes
  - Monitoreo continuo de temperatura
  - Registro histórico de pesajes y temperaturas
  - Alertas visuales y sonoras
  - Gráficas de tendencias
  - Interfaz optimizada para uso en cocina

- **Librerías JavaScript**
  - `thermal_printer.js`: Clase para comunicación con impresoras térmicas
  - `kitchen_hardware.js`: Clase para balanzas y termómetros
  - Soporte para WebUSB, WebBluetooth, WebSerial
  - Manejo robusto de errores y reconexión automática

#### Sistema de Actualizaciones
- **Panel de Gestión de Actualizaciones** (`admin_updates.php`)
  - Acceso exclusivo para usuario desarrollador (ID=1)
  - Creación de nuevas actualizaciones con versionado semántico
  - Distribución masiva a todos los tenants
  - Monitoreo de estado de actualización por tenant
  - Marcado de actualizaciones críticas
  - Indicador de actualizaciones que requieren reinicio
  - Changelog detallado por versión

- **API de Verificación de Actualizaciones** (`api/check_updates.php`)
  - Endpoint para que los tenants verifiquen actualizaciones disponibles
  - Respuesta JSON con detalles de la actualización
  - Validación de tenant_id para seguridad
  - Soporte para actualizaciones críticas

#### Base de Datos
- **Nuevas Tablas** (7 tablas creadas por `setup_hardware_periferico.php`)
  - `config_impresora`: Configuración de impresoras térmicas
  - `config_hardware_cocina`: Configuración de balanzas y termómetros
  - `recetas_ingredientes`: Ingredientes con peso esperado
  - `registro_pesajes`: Historial de pesajes
  - `registro_temperaturas`: Historial de temperaturas
  - `system_updates`: Actualizaciones del sistema
  - `tenant_versions`: Versiones por tenant

#### Interfaz de Usuario
- **Banner de Hardware Periférico** en `admin.php`
  - Acceso rápido a configuración de impresora
  - Acceso rápido a configuración de hardware de cocina
  - Acceso rápido a control de calidad
  - Acceso rápido a actualizaciones (solo para desarrollador)
  - Diseño moderno con gradientes y animaciones

### 🔧 Corregido

- **Error SQL en `admin_updates.php`**
  - Corregido error "Unknown column 'nombre'" en tabla `system_updates`
  - Agregada columna `nombre` a la definición de la tabla
  - Agregadas columnas `changelog`, `es_critico`, `requiere_reinicio`

- **Error PHP en `admin_updates.php` línea 55**
  - Corregido `bind_param` con número incorrecto de parámetros
  - Cambiado de `"ssssiiii"` (8 tipos) a `"ssssiis"` (7 tipos)
  - Sincronizado con el número real de variables (7)

- **Warnings de Include**
  - Comentado `include 'includes/navbar_admin.php'` en:
    - `admin_updates.php`
    - `admin_config_impresora.php`
    - `admin_config_hardware_cocina.php`
    - `cocina_control_calidad.php`
  - Eliminados warnings de archivo no encontrado

- **Error SQL en consulta de tenants**
  - Cambiado `t.nombre` por `t.restaurant_name` en `admin_updates.php`
  - Sincronizado con el nombre real de la columna en `saas_tenants`

- **Error SQL en ordenamiento**
  - Cambiado `ORDER BY fecha_creacion` por `ORDER BY created_at`
  - Sincronizado con el nombre real de la columna

### 📚 Documentación

- **README.md completo**
  - Guía de instalación paso a paso
  - Documentación de todos los módulos
  - Guía de configuración de hardware periférico
  - Documentación de API
  - Guía de arquitectura multi-tenant
  - Solución de problemas comunes
  - Badges de versión y tecnologías

- **CHANGELOG.md**
  - Historial completo de cambios
  - Formato basado en Keep a Changelog
  - Versionado semántico

- **Walkthrough de Depuración**
  - Documentación del proceso de debugging
  - Capturas de pantalla del sistema funcionando
  - Código antes y después de las correcciones
  - Tabla de verificación de funcionalidades

### 🔐 Seguridad

- **Aislamiento de Tenant**
  - Todas las nuevas tablas incluyen `tenant_id`
  - Filtrado automático por tenant en todas las consultas
  - Validación de permisos en APIs

- **Prepared Statements**
  - Uso universal de prepared statements
  - Prevención de SQL injection
  - Sanitización de todas las entradas

- **Control de Acceso**
  - Panel de actualizaciones restringido a desarrollador
  - Validación de roles en todos los paneles
  - Verificación de sesión activa

### 📊 Estadísticas

- **Archivos Nuevos**: 9
- **Tablas de BD Nuevas**: 7
- **Líneas de Código**: ~4,200
- **APIs Nuevas**: 2
- **Librerías JavaScript**: 2
- **Archivos Modificados**: 2

---

## [3.0.0] - 2025-12-15

### ✨ Agregado

- Sistema multi-tenant (SaaS) completo
- Panel administrativo con dashboard
- Módulo de punto de venta (POS)
- Módulo de gestión de cocina
- Módulo de inventario
- Sistema de autenticación con roles
- Gestión de productos y categorías
- Gestión de usuarios
- Reportes de ventas
- Control de stock

### 🔐 Seguridad

- Implementación de prepared statements
- Sistema de sesiones seguro
- Aislamiento de datos por tenant
- Roles y permisos de usuario

---

## [2.0.0] - 2025-12-01

### ✨ Agregado

- Versión inicial del sistema
- Funcionalidades básicas de restaurante
- Base de datos MySQL

---

## Tipos de Cambios

- **✨ Agregado**: Nuevas funcionalidades
- **🔧 Corregido**: Corrección de bugs
- **🔄 Cambiado**: Cambios en funcionalidades existentes
- **🗑️ Eliminado**: Funcionalidades removidas
- **🔐 Seguridad**: Mejoras de seguridad
- **📚 Documentación**: Cambios en documentación
- **⚡ Rendimiento**: Mejoras de rendimiento
- **🎨 Estilo**: Cambios de diseño/UI

---

## Versionado

Este proyecto usa [Semantic Versioning](https://semver.org/lang/es/):

- **MAJOR** (X.0.0): Cambios incompatibles con versiones anteriores
- **MINOR** (0.X.0): Nuevas funcionalidades compatibles con versiones anteriores
- **PATCH** (0.0.X): Correcciones de bugs compatibles con versiones anteriores

---

**Última actualización**: 2025-12-21
