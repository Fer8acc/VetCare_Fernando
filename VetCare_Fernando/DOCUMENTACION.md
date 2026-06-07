# Documentación del Sistema

## Datos del proyecto

**Nombre del sistema:** VetCare - Sistema de gestión veterinaria  
**Alumno:** Fernando Ochoa Castro  
**Grupo:** 2-2  

---

## Introducción

El presente proyecto consiste en el desarrollo de un sistema web para la administración de mascotas en una veterinaria. El sistema permite llevar un control básico de los registros de mascotas, incluyendo información como nombre, especie, raza, edad, propietario, teléfono y estado de salud.

El sistema fue desarrollado con tecnologías web básicas como HTML, CSS, PHP y MySQL, utilizando XAMPP como entorno local de desarrollo.

---

## Resumen del sistema

VetCare es una aplicación web que permite a un usuario registrarse, iniciar sesión y administrar información de mascotas. La información se almacena en una base de datos MySQL y se consulta desde interfaces creadas con PHP.

El módulo principal del sistema es el CRUD de mascotas, donde se pueden realizar las siguientes acciones:

- Crear registros de mascotas.
- Consultar la lista de mascotas.
- Editar información existente.
- Eliminar registros.

---

## Requisitos funcionales

1. El sistema debe permitir registrar usuarios.
2. El sistema debe permitir iniciar sesión.
3. El sistema debe permitir cerrar sesión.
4. El sistema debe restringir el acceso al panel administrativo si no existe una sesión activa.
5. El sistema debe permitir registrar nuevas mascotas.
6. El sistema debe permitir consultar las mascotas registradas.
7. El sistema debe permitir editar los datos de una mascota.
8. El sistema debe permitir eliminar una mascota.

---

## Requisitos no funcionales

1. El sistema debe tener una interfaz clara y fácil de usar.
2. El sistema debe ejecutarse en un servidor local con XAMPP.
3. El sistema debe almacenar la información en MySQL.
4. Las contraseñas deben guardarse cifradas.
5. El sistema debe organizar sus archivos de forma entendible.

---

## Requisitos técnicos

- PHP 8 o superior.
- MySQL/MariaDB.
- XAMPP.
- Navegador web.
- phpMyAdmin para importar la base de datos.

---

## Arquitectura del sistema

El sistema utiliza una arquitectura web sencilla basada en páginas PHP conectadas a una base de datos MySQL.

### Capas principales

- **Presentación:** HTML y CSS.
- **Lógica:** PHP.
- **Datos:** MySQL.

### Archivos principales

- `index.php`: página principal.
- `registro.php`: registro de usuarios.
- `login.php`: inicio de sesión.
- `logout.php`: cierre de sesión.
- `verificar_sesion.php`: protección de páginas privadas.
- `mascotas.php`: listado de mascotas.
- `crear_mascota.php`: formulario para crear registros.
- `editar_mascota.php`: edición de registros.
- `eliminar_mascota.php`: eliminación de registros.
- `conexion.php`: conexión a la base de datos.

---

## Instalación

1. Copiar la carpeta del proyecto en `C:\xampp\htdocs`.
2. Abrir XAMPP.
3. Activar Apache y MySQL.
4. Abrir `http://localhost/phpmyadmin/`.
5. Importar el archivo `database/vetcare_db.sql`.
6. Abrir `http://localhost/VetCare_Fernando/`.

---

## Uso del sistema

1. El usuario entra a la página principal.
2. El usuario crea una cuenta.
3. El usuario inicia sesión.
4. El sistema muestra el panel de mascotas.
5. El usuario puede crear, editar o eliminar registros.
6. Al terminar, el usuario puede cerrar sesión.

---

## Base de datos

### Tabla usuarios

| Campo | Tipo | Descripción |
|---|---|---|
| id | INT | Identificador del usuario |
| nombre | VARCHAR | Nombre completo |
| correo | VARCHAR | Correo electrónico |
| password | VARCHAR | Contraseña cifrada |
| fecha_registro | TIMESTAMP | Fecha de registro |

### Tabla mascotas

| Campo | Tipo | Descripción |
|---|---|---|
| id | INT | Identificador de la mascota |
| nombre | VARCHAR | Nombre de la mascota |
| especie | VARCHAR | Tipo de animal |
| raza | VARCHAR | Raza de la mascota |
| edad | INT | Edad de la mascota |
| propietario | VARCHAR | Nombre del dueño |
| telefono | VARCHAR | Teléfono del dueño |
| estado_salud | TEXT | Observaciones de salud |
| fecha_registro | TIMESTAMP | Fecha de registro |

---

## Mantenimiento y actualizaciones

El sistema puede mejorarse agregando módulos como citas veterinarias, historial clínico, vacunas, pagos o reportes. También se puede mejorar el diseño visual y agregar validaciones más avanzadas.

---

## Pruebas

Se realizaron pruebas de funcionamiento en los siguientes módulos:

1. Registro de usuario.
2. Inicio de sesión.
3. Acceso al panel protegido.
4. Registro de mascotas.
5. Edición de mascotas.
6. Eliminación de mascotas.
7. Cierre de sesión.

---

## Seguridad

El sistema implementa medidas básicas de seguridad:

- Contraseñas protegidas con `password_hash`.
- Validación de contraseñas con `password_verify`.
- Uso de sesiones para controlar el acceso.
- Protección del panel administrativo.
- Consultas preparadas para operaciones con la base de datos.

---

## Referencias y recursos

- Documentación oficial de PHP.
- Documentación oficial de MySQL.
- Documentación de XAMPP.
- Apuntes de clase sobre desarrollo web y bases de datos.
