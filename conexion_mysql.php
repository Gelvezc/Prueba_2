<?php
$nombreServidor = "localhost";
$nombreUsuario = "root";
$contraseña = "Emma2610*+";
$dbnombre = "usuario_prueba";

// Conexión Mysql
$con = new mysqli($nombreServidor, $nombreUsuario, $contraseña, $dbnombre);

// Verificar conexión
if ($con->error) {
    die("Conexion fallida: " . $con->error);
}