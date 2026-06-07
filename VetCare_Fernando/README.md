# VetCare - Sistema de gestión veterinaria

**Alumno:** Fernando Ochoa Castro  
**Grupo:** 2-2  

## Descripción

VetCare es un sistema web desarrollado con PHP, MySQL, HTML y CSS. Su objetivo es administrar registros de mascotas dentro de una veterinaria. El sistema permite registrar usuarios, iniciar sesión y realizar un CRUD completo de mascotas.

## Tecnologías utilizadas

- HTML5
- CSS3
- PHP
- MySQL
- XAMPP
- phpMyAdmin

## Módulos del sistema

- Página principal
- Registro de usuarios
- Inicio de sesión
- Cierre de sesión
- Panel de mascotas
- Crear mascota
- Editar mascota
- Eliminar mascota

## Instalación

1. Descargar o clonar el proyecto.
2. Copiar la carpeta `VetCare_Fernando` dentro de `C:\xampp\htdocs`.
3. Abrir XAMPP y activar Apache y MySQL.
4. Entrar a `http://localhost/phpmyadmin/`.
5. Importar el archivo `database/vetcare_db.sql`.
6. Abrir el sistema en el navegador:

```txt
http://localhost/VetCare_Fernando/
```

## Uso

1. Crear una cuenta desde la sección Registro.
2. Iniciar sesión.
3. Entrar al panel de mascotas.
4. Agregar, editar o eliminar registros.

## Base de datos

La base de datos se llama:

```txt
vetcare_db
```

Tablas principales:

- `usuarios`
- `mascotas`

## Seguridad implementada

- Uso de sesiones en PHP.
- Protección de páginas administrativas.
- Contraseñas cifradas con `password_hash`.
- Validación de contraseña con `password_verify`.
- Consultas preparadas para reducir riesgo de inyección SQL.
