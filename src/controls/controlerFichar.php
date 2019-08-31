<?php
include '../models/Connect.php';
include_once "../models/User.php";
$conexion = new Connect();
$con = $conexion->connectBD();
$user = new User();


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
{   
    session_start();
    $hora = date("H:i:sa");
    echo $hora;
    $fecha = date("Y-m-d");
    echo $fecha;
    $idUsuario = $_SESSION['id'];
    echo $idUsuario;
    $meteo=1;

    $user->fichar($con,$fecha,$hora,$idUsuario,$meteo);
}

