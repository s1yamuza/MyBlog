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

[1]: https://github.com/s1yamuza/MyBlog/blob/master/doc/1.%20Introducci%C3%B3n%2C%20instalaci%C3%B3n%20y%20configuraci%C3%B3n.md
[2]: https://github.com/s1yamuza/MyBlog/blob/master/doc/2.%20Controlador.md
[3]: https://github.com/s1yamuza/MyBlog/blob/master/doc/3.%20Vista:%20plantillas%20con%20Twig.md
[4]: https://github.com/s1yamuza/MyBlog/blob/master/doc/4.%20Modelo:%20base%20de%20datos%20con%20Doctrine.md
[5]: https://github.com/s1yamuza/MyBlog/blob/master/doc/5.%20Formularios.md
[6]: https://github.com/s1yamuza/MyBlog/blob/master/doc/6.%20Bundles.md
[7]: https://github.com/s1yamuza/MyBlog/blob/master/doc/7.%20Seguridad%20y%20Acceso.md
[8]: https://github.com/s1yamuza/MyBlog/blob/master/doc/8.%20Servicios%20e%20inyecci%C3%B3n%20de%20dependencias.md
[9]: https://github.com/s1yamuza/MyBlog/blob/master/doc/9.%20Cuentas%20de%20usuario.md
