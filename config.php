<?php 
#Zona Horaria
date_default_timezone_set('America/Lima');

#Path Local
define("PATH","http://192.168.1.15/dev/haroing/");

#Path Remoto
#efine("PATH","http://logistica.perutec.com.pe/");

#Rutas y Carpetas
define("RUTA", dirname(__FILE__).DIRECTORY_SEPARATOR);#Ruta del proyecto
define("FOLDER","/dev/haroing/");#Folder del Proyecto
define("FOLDER_FILE",RUTA."upload/articulo_file/");#Ruta de Carpeta de Imagenes
define("FOLDER_FIRMA",RUTA."docs/pdf/img/firma/");#Ruta de Firmas de Usuarios

#Datos de Conexión a Base de Datos
define("SERVER","localhost");
define("USER", "root");
#define("PASS", "userperutecdb");
define("PASS", "perutec");
define("BD", "haroing_db");
#define("BD", "haroing_db");

#Configuración del Sistema
define("FECHA",'Y-m-d');#Formato de Fecha
define("MAX_FILE_SIZE", 5000000);#Tamaño Máximo de Archivos
define("IGV", "18");#IGV

#CONSTANTES VARIABLES SESION
define("KEY",md5(date('Y-m-d').$_SERVER['SERVER_NAME'].FOLDER));
define("ID", "ID");
define("NOMBRES", "NOMBRES");
define("APELLIDOS", "APELLIDOS");
define("TIPO", "TIPO");
define("ALM", "01");

#Configuración de Etiquetas Proyectos
define("TITULO_HOME", "Aplicación Logística");
define("VERSION", "Versión 1.0");
define("DESC_HOME", "Gestión de Compras e Inventarios");
define("NAME_PROJECT", "Gestión Logística");
 ?>
