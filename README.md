# CineApp - Proyecto Grupal (2º DAW)

## Descripción del Proyecto

Aplicación web para la gestión y reserva de entradas de cine, desarrollada siguiendo la arquitectura **MVC (Modelo-Vista-Controlador)** y funcionando como una **SPA (Single Page Application)**.

Este proyecto ha sido realizado por un grupo de 4 alumnos para la asignatura de Desarrollo Web en Entorno Servidor.

## Estructura del Equipo y Reparto de Tareas

A continuación se detalla la distribución del trabajo para cumplir con los requisitos de 2 vistas y 1 funcionalidad única por integrante.

### 👤 Integrante 1: Autenticación y Usuarios

**Responsabilidad:** Gestión de acceso y perfil de usuario.

- **Vistas:**
  1.  **Login/Registro (Index):** Formulario de entrada y registro de nuevos usuarios.
  2.  **Perfil de Usuario:** Visualización de datos y historial.
- **Funcionalidad Única:** Sistema de **Edición de Perfil con subida de imagen (Avatar)** o cambio de contraseña seguro.

### 🎬 Integrante 2: Catálogo y Cartelera

**Responsabilidad:** Visualización pública de las películas.

- **Vistas:**
  1.  **Galería de Películas:** Página principal con el listado de películas disponibles.
  2.  **Ficha Técnica:** Vista detallada de una película (sinopsis, trailer, horarios).
- **Funcionalidad Única:** **Buscador AJAX en tiempo real** y filtrado por género.

### 🎟️ Integrante 3: Reservas y Entradas

**Responsabilidad:** Proceso de compra y gestión de butacas.

- **Vistas:**
  1.  **Selección de Butacas:** Sala interactiva visual.
  2.  **Mis Entradas/Confirmación:** Resumen de la compra y tickets QR.
- **Funcionalidad Única:** **Selección gráfica de asientos** (validación de ocupación en tiempo real).

### 🛠️ Integrante 4: Administración (Panel de Control)

**Responsabilidad:** Gestión del contenido del cine (CRUD).

- **Vistas:**
  1.  **Dashboard Admin:** Listado de películas dadas de alta.
  2.  **Formulario Película:** Añadir/Editar películas y sesiones.
- **Funcionalidad Única:** **Gestión (CRUD) completa de películas** con subida de archivos (carteles).

---

## Arquitectura Técnica

### MVC (Modelo-Vista-Controlador)

El proyecto separa la lógica en tres capas:

- **Modelos:** Gestionan la conexión a base de datos y la lógica de negocio.
- **Vistas:** Plantillas HTML/CSS que muestran la interfaz.
- **Controladores:** Reciben las peticiones y deciden qué modelo usar y qué vista renderizar.

### SPA (Single Page Application)

La navegación se realiza sin recargar la página completa. Se utiliza **JavaScript (Fetch API)** para interceptar la navegación y cargar dinámicamente el contenido principal en el contenedor `#app` o `main`, manteniendo el header y footer estáticos.

## Checklist de Evaluación

| Requisito                                                   | Estado       | Responsable  |
| ----------------------------------------------------------- | ------------ | ------------ |
| **(1.5 ptos)** Registro y acceso de usuarios (en el index)  | ⏳ Pendiente | Integrante 1 |
| **(2.0 ptos)** Creación de al menos 2 vistas por componente | ⏳ Pendiente | Todos        |
| **(2.0 ptos)** Una funcionalidad por componente             | ⏳ Pendiente | Todos        |
| **(1.5 ptos)** Incluir CSS/Bootstrap para interfaz          | ⏳ Pendiente | Todos        |
| **(2.0 ptos)** Aplicación SPA + Arquitectura MVC            | ⏳ Pendiente | Arquitectura |
| **(1.0 pto)** Temática: CINE                                | ✅ Completo  | Todos        |

## Instalación y Despliegue

### Requisitos Local

1.  Servidor Web (Apache/Nginx o XAMPP).
2.  PHP 7.4 o superior.
3.  MySQL/MariaDB.

### Pasos

1.  Importar el script `database.sql` en tu gestor de base de datos.
2.  Configurar la conexión en `config/db.php`.
3.  Acceder a `http://localhost/Proyecto_Grupal`.

### Despliegue (Hosting Gratuito)

El proyecto ha sido desplegado en InfinityFree en la siguiente URL:

> [Insertar URL Aquí]

---

**Nota:** El login es obligatorio y no cuenta como funcionalidad única del Integrante 1, por eso se ha añadido la edición de perfil con avatar.
