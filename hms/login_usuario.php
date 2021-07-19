<?php

session_start();

include 'conexion.php';

$email=$_POST['username'];
$password=$_POST['password'];
$password = hash('sha512',$password);

$validar_login = mysqli_query($conexion,"SELECT * FROM users WHERE email='$email' and password = '$password'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['users'] = $email;
    header("location:dashboard.php");
    exit;

}else{
    echo'
    <script>
    alert("usuario no existe, verifique los datos introducidos");
    window.location="paciente_l_r.php";
    </script>
    ';
    exit;
}


/*
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
	// For stroing log if user login unsuccessfull
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$_SESSION['errmsg']="Usuario y/o Contraseña Incorrecta";
$extra="user-login.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}*/
?>