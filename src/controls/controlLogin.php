<?php 
session_start();
include_once "../models/Connect.php";
include_once "../models/User.php";

$conexion = new Connect();
$user = new User();
$con= $conexion->connectBD();
$username = $_POST["user"];
$userpass = $_POST ["pass"];

$user->getUserData ($con, $username, $userpass);
if($user->id==0){
    header("Location: ../views/viewLogin.html");  
}
$_SESSION['id']= $user->id;
$_SESSION['user']= $user->name;
$_SESSION['horario']= $user->id_schedule;

if($user->id_rol==2)
{
    $redirectUrl = '../views/viewAdmin.html';
    header("Location: $redirectUrl"); 
}
if($user->id_rol==1)
{
    $redirectUrl = '../views/viewUserProfile.php';
    header("Location: $redirectUrl"); 
}