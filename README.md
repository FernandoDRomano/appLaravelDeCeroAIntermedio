## Pasos de instalación

1. Descarga el repositorio
2. Renombra la carpeta (Opcional)
3. Entra a la carpeta desde la terminal cd directorio/de/la/carpeta
4. Copia el contenido del archivo .env.example a un nuevo archivo llamado .env
    - Si estás en Liunx o Mac puedes ejecutar el comando: cp .env.example .env
5. Crea una base de datos para el proyecto
6. Modifica las variables de conexión del nuevo archivo .env
7. Define los datos de conexión
    - DB_DATABASE=
    - DB_USERNAME=
    - DB_PASSWORD=
8. Define las credenciales de Mailtrap (Opcional)
    - Define las credenciales de Sendgrid (Para enviar emails en producción)
9. Ejecuta composer install
10. Ejecuta php artisan key:generate
11. Ejecuta php artisan migrate
12. Abre la aplicación en el navegador