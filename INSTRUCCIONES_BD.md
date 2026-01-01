# Guía de Configuración de la Base de Datos - CineApp

## Pasos para activar la base de datos:

### 1. Iniciar el servidor MySQL

Dependiendo de tu entorno, necesitas iniciar MySQL:

#### Si usas XAMPP:
1. Abre el Panel de Control de XAMPP
2. Haz clic en "Start" en la fila de **MySQL**
3. Verifica que el estado cambie a "Running"

#### Si usas WAMP:
1. Abre WAMP
2. Asegúrate de que el icono esté en verde
3. MySQL debería iniciarse automáticamente

#### Si usas MAMP:
1. Abre MAMP
2. Haz clic en "Start Servers"
3. Verifica que MySQL esté corriendo

### 2. Crear la base de datos

1. Abre tu navegador y ve a: `http://localhost/phpmyadmin`
2. Haz clic en "Nueva" en el panel izquierdo
3. Nombre de la base de datos: **cineapp**
4. Cotejamiento: **utf8_general_ci**
5. Haz clic en "Crear"

### 3. Importar las tablas

1. Selecciona la base de datos **cineapp** en el panel izquierdo
2. Haz clic en la pestaña "SQL" en la parte superior
3. Copia y pega el contenido del archivo `sql/database.sql`
4. Haz clic en "Continuar" o "Go"

### 4. Verificar la configuración

Abre el archivo `app/Configuracion/config.php` y verifica que los datos sean correctos:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');          // Usuario por defecto
define('DB_PASS', '');              // Contraseña vacía por defecto
define('DB_NAME', 'cineapp');       // Nombre de la base de datos
```

**IMPORTANTE:** Si tu MySQL tiene una contraseña diferente, cámbiala en `DB_PASS`.

### 5. Iniciar el servidor PHP

Abre una terminal en la carpeta del proyecto y ejecuta:

```bash
cd public
php -S localhost:3000
```

O si usas XAMPP/WAMP, coloca el proyecto en la carpeta `htdocs` y accede a:
`http://localhost/Proyecto-Fran-Cristina-Diana-Ignacio/public`

### 6. Probar la conexión

1. Abre tu navegador
2. Ve a: `http://localhost:3000/reservas/getOcupacion/1`
3. Deberías ver un JSON con las butacas ocupadas: `["B15","B16"]`

Si ves este JSON, ¡la base de datos está funcionando correctamente! ✅

### 7. Probar la interfaz completa

1. Abre: `http://localhost:3000` (si usas el servidor PHP incorporado)
2. O abre directamente el archivo `demo.php` en tu navegador

## Solución de problemas comunes:

### Error: "SQLSTATE[HY000] [1045] Access denied"
- **Solución:** Verifica el usuario y contraseña en `config.php`

### Error: "SQLSTATE[HY000] [2002] No connection could be made"
- **Solución:** MySQL no está corriendo. Inicia el servicio MySQL.

### Error: "SQLSTATE[HY000] [1049] Unknown database 'cineapp'"
- **Solución:** La base de datos no existe. Créala siguiendo el paso 2.

### Error 404 en las peticiones AJAX
- **Solución:** Verifica que el archivo `.htaccess` esté en la carpeta `public` y que `mod_rewrite` esté habilitado en Apache.

## Estructura de URLs correcta:

Con la configuración actual, las URLs deben seguir este patrón:

- `http://localhost:3000/reservas/getOcupacion/1` → Obtiene butacas ocupadas
- `http://localhost:3000/reservas/confirmar` → Confirma una reserva
- `http://localhost:3000/reservas/misEntradas/1` → Obtiene reservas de un usuario

## Notas importantes:

1. El proyecto usa el patrón MVC (Modelo-Vista-Controlador)
2. El enrutamiento se maneja automáticamente mediante `.htaccess` y la clase `Core`
3. La conexión a la base de datos usa PDO para mayor seguridad
4. Todas las peticiones deben pasar por `public/index.php`
