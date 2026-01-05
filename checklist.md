# Checklist de Tareas - Proyecto CineApp

## Estado del Proyecto

- [x] Configuración Inicial (Scaffolding MVC + SPA)
- [x] Base de Datos (Estructura inicial)

## 👤 Fran: Gestión de Usuarios (Auth & Perfil)

**Objetivo:** Permitir el registro, login y gestión de perfil de usuarios.

- [ ] **Vista:** Login / Registro (en `paginas/index.php`)
- [ ] **Funcionalidad:** Implementar AuthController (Login con AJAX/Fetch)
- [ ] **Funcionalidad:** Implementar AuthController (Registro con validaciones y hash de contraseña)
- [ ] **Vista:** Página de "Mi Perfil" (dashboard de usuario)
- [ ] **Vista:** Formulario de "Editar Perfil"
- [ ] **Funcionalidad Única:** Subida de imagen de avatar o cambio de contraseña

## 🎬 Cristina: Catálogo de Películas

**Objetivo:** Mostrar la cartelera y permitir búsquedas.

- [ ] **Modelo:** Crear modelo `Pelicula` (métodos `obtenerTodas`, `obtenerPorId`)
- [ ] **Vista:** Catálogo principal (Grid de pósters)
- [ ] **Vista:** Ficha técnica de película (Detalles, sinopsis)
- [ ] **Controlador:** Crear `Peliculas.php` para gestionar las vistas
- [ ] **Funcionalidad Única:** Buscador en tiempo real (AJAX) o Filtro por Género

## 🎟️ Diana: Sistema de Reservas/Entradas

**Objetivo:** Gestión de compra de entradas y selección de butacas.

- [x] **Modelo:** Crear modelo `Reserva` y `Sesion`
- [x] **Vista:** Pantalla de Selección de Butacas (Visualmente atractiva)
- [x] **Funcionalidad:** Lógica de selección de asientos (Javascript para marcar libres/ocupados)
- [x] **Vista:** Resumen de Compra / Carrito
- [x] **Vista:** "Mis Entradas" (Historial de compras)
- [x] **Funcionalidad Única:** Validación de butacas ocupadas en tiempo real

## 🛠️ Ignacio: Administración (Backoffice)

**Objetivo:** Gestión del contenido (CRUD).

- [ ] **Middleware:** Asegurar que solo usuarios ADMIN accedan a estas rutas
- [ ] **Vista:** Dashboard Admin (Tabla listando películas)
- [ ] **Funcionalidad:** Eliminar película (Soft delete o hard delete)
- [ ] **Vista:** Formulario para Crear/Editar Película
- [ ] **Funcionalidad Única:** CRUD Completo (Insertar/Actualizar en BD)
- [ ] **Funcionalidad:** Subida de carteles (Manejo de archivos en PHP)

## 🚀 Entrega Final (Todos)

- [ ] Verificar que la navegación es SPA (sin recargas completas)
- [ ] Revisión de estilos (CSS/Bootstrap)
- [ ] Preparar ZIP del proyecto
- [ ] Desplegar en InfinityFree
