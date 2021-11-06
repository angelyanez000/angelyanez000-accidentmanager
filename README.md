## Proyecto de Reporte de Accidentes de Tránsito
## 1. Creamos la base de datos en MySQL

CREATE DATABASE accidentmanager CHARACTER SET utf8 COLLATE utf8_general_ci;

## 2. Creamos un usuario con el que nos conectaremos desde el aplicativo a la base de datos

USE accidentmanager;

CREATE USER 'admin'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `accidentmanager`.* TO 'admin'@'%';
FLUSH PRIVILEGES;

## 3. Modificamos el archivo .env que se encuentra en la ruta principal del proyecto con los datos del usuario

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=accidentmanager
DB_USERNAME=admin
DB_PASSWORD=password

## 3. Creamos la estructura de Usuario, Roles y Permisos
php artisan db:seed --class=DatabaseSeeder
## 4. Creamos los permisos de cada una de las paginas 
php artisan db:seed --class=PermissionTableSeeder
## 5. Creamos el usuario administrador por defecto
php artisan db:seed --class=CreateAdminUserSeeder
## 6. Modificamos la sección de MAIL dentro del archivo .env con los valores del mail
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
## 7. Levantamos el aplicativo mediante el siguiente comando
php artisan serve
## 8. Accedemos al aplicativo mediante la url 
http://127.0.0.1:8000
