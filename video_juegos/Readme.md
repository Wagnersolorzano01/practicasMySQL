Sistema Web ZonaGamer - Call of Duty Mobile

ZonaGamer es una aplicación web desarrollada como práctica académica utilizando PHP y MySQL.

El proyecto está inspirado en una comunidad gamer enfocada en jugadores de Call of Duty Mobile, donde los usuarios pueden crear una cuenta, iniciar sesión y administrar su información personal de forma segura.

El objetivo principal del sistema es aplicar conceptos de autenticación de usuarios, manejo de sesiones y protección de datos dentro de un entorno web dinámico.



Objetivo del Proyecto

Comprender y aplicar los conceptos de:

* Autenticación de usuarios 
* Manejo de sesiones en PHP 
* Protección y validación de datos 
* Actualización segura de información personal 
* Seguridad básica en aplicaciones web 



Todo esto mediante el desarrollo de una plataforma web con temática gamer.

Descripción del Sistema

ZonaGamer funciona como una pequeña comunidad para jugadores de Call of Duty Mobile.

Los usuarios pueden registrarse en la plataforma y acceder a una zona privada donde administran su perfil.

El sistema incluye funcionalidades básicas pero importantes para cualquier aplicación web con usuarios autenticados.

Entre sus funciones principales se encuentran:

* Registro de usuarios 
* Inicio de sesión 
* Cierre de sesión 
* Acceso a perfil privado 
* Actualización de datos personales 
* Cambio seguro de contraseña 

Validación de sesiones activas 

Además, el sistema implementa medidas básicas de seguridad para proteger la información de los usuarios.

Tecnologías Utilizadas

* PHP 8.2.12 
* MySQL 8.2.12
* XAMPP 8.2.12 
* Apache 
* Bootstrap 5 
* HTML5 
* CSS3 



Seguridad Implementada

El proyecto incluye algunas prácticas básicas de seguridad:

* Encriptación de contraseñas usando password\_hash() 
* Verificación segura con password\_verify() 
* Validación de formularios 
* Restricción de acceso mediante sesiones 
* Validación de correos duplicados 
* Verificación de contraseña actual antes de actualizarla 

Requisitos para Ejecutar el Proyecto

Antes de ejecutar el sistema es necesario tener instalado:

* XAMPP 
* PHP 
* MySQL 
* Apache 

Todas en la versión 8.2.12

Instalación del Proyecto

1.Descargar o clonar el repositorio. 

2.Copiar la carpeta del proyecto en: 

C:\\xampp\\htdocs\\

3.Iniciar Apache y MySQL desde XAMPP. 

4.Abrir phpMyAdmin. 

5.Crear una base de datos llamada: 

usuarios

6.Importar el archivo .sql incluido en el proyecto. 

7.Verificar que el archivo conexion.php tenga estos datos: 

$host = "localhost";

$usuario = "root";

$password = "";

$bd = "usuarios";

8\.	Abrir el navegador y ejecutar: 

http://localhost/proyecto/

Usuario de Prueba 1

Puede utilizar el siguiente usuario para probar el sistema:

Correo:

wasolorzano6@utpl.edu.ec

Contraseña:

Wagnersh1

También puede crear una nueva cuenta desde el formulario de registro.

Usuario de Prueba 2

Puede utilizar el siguiente usuario para probar el sistema:

Correo:

andresurrego@gmail.com

Contraseña:

Andreslopez123

También puede crear una nueva cuenta desde el formulario de registro.

Funcionalidades Principales

* Registro de usuarios
* Inicio de sesión
* Gestión de sesiones
* Perfil privado
* Actualización de datos
* Cambio de contraseña
* Cierre de sesión

Aprendizajes Obtenidos

Durante el desarrollo de este proyecto se aplicaron conocimientos relacionados con:

* Manejo de sesiones en PHP 
* Conexión entre PHP y MySQL 
* Seguridad básica en autenticación 
* Validación de formularios 
* Organización de archivos web 
* Diseño responsivo utilizando Bootstrap 





Autor

Wagner Aarón Solórzano Herrera, estudiante del quinto semestre de la carrera Tecnologías de la Información de la materia de Diseño Web.











