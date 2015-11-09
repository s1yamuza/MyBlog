Aplicación **MyBlog**
========================

Pequeña aplicación Symfony2 utilizada como ejemplo durante el desarrollo del tutorial: Symfony2 tutorial.

El código de la aplicación ha sido refactorizado y puede haber pequeñas variaciones respecto al contenido del tutorial.

Instalación
--------------
Inicializar el respositorio

```
cd /var/www/

git init
```

Clonar el proyecto

```
git clone https://github.com/s1yamuza/MyBlog.git NombreDelProyecto
```
Establecer los valores necesarios en el archivo app/config/parameters.yml

Instalación de dependencias

```
$ composer install
```

Crear base de datos y actualizar su esquema

```
$ php app/console doctrine:schema:update --force
```
Instalar assets

```
$ php app/console assets:install
$ php app/console assetic:dump
```
Limpiar caché

```
$ php app/console cache:clear
```

Crear usuario administrador

```
php app/console fos:user:create $USUARIO $EMAIL $CONTRASEÑA

php app/console fos:user:promote admin ROLE_SUPER_ADMIN

```

Tutorial
--------------
1. [**Introducción, instalación y configuración**][1]
2. [**Controlador**][2]
3. [**Vista: plantillas con Twig**][3]
4. [**Modelo: base de datos con Doctrine**][4]
5. [**Formularios**][5]
6. [**Bundles**][6]
7. [**Seguridad y Acceso**][7]
8. [**Servicios e inyección de dependencias**][8]
9. [**Cuentas de usuario**][9]
