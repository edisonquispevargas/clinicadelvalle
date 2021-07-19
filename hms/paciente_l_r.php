<?php
session_start();
  if(isset($_SESSION['users'])){
     header ("location: dashboard.php");
  }

  error_reporting(0);
  include("include/config.php");
  if(isset($_POST['submit']))
  {
  $ret=mysqli_query($con,"SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
  $num=mysqli_fetch_array($ret);
  if($num>0)
  {
  $extra="dashboard.php";//
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
  }
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,
                100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stilo_login_paciente.css">
    <link rel="stylesheet" href="assets/css/stilos.css">
    <link rel="stylesheet" href="../css/awesome-bootstrap-checkbox.css">
    
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar en la pagina</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Registrate para entrar en la página</p>
                    <button id="btn__registrarse">Registrate</button>
                </div>
            </div>
 
            <!--formulario de login y registro-->
            <div class="contenedor__login-register">

                <!--login-->
                <form class="formulario__login" method="post">
                    <h2>Iniciar sesion</h2>
                    <input type="text" placeholder="Correo Electronico" name="username"  id="email">
                    <input type="password" placeholder="Contraseña" name="password" id="username">
                    <a href="" style="font-size: 12px; margin-top: 35px;">
									¿Olvidaste tu Contraseña?
								</a><br>
                    <button name="submit" type="submit">Ingresar</button>
                </form>
            
              <!--login-->
            <form action="registro_paciente.php" method="POST" class="formulario__register" >
                <h2>Registrarse</h2>
                    <input type="text" placeholder="DNI" name="DNI" required>
                    <input type="text" placeholder="Nombre" name="full_name" required>
                    <input type="text" placeholder="Apellidos" name="apellidos" required>
                    <input type="text" placeholder="Telefono" name="city" required>
                    <input type="text" placeholder="Dirección" name="address">
                    <div class="genero">
								<label class="block">
									Genero 
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="Masculino" >
									<label for="rg-female" checked>
										Masculino 
									</label>
									<input type="radio" id="rg-male" name="gender" value="Femenino">
									<label for="rg-male">
										Femenino
									</label>
								</div>
							</div>
       

                    <p style="font-size: 12px; margin-top: 10px; text-align: center; color: #2dc3cc;">
								Ingrese los detalles de su cuenta a continuación:
				    </p>
                    <input type="text" placeholder="Email" name="email"  id="email" required>
                    <input type="password" placeholder="Contraseña" name = "password" id="password" required>
                    <input type="password" placeholder="Contraseña de nuevo" name="password_again" id="password_again" required>
                    <button>Registrarse</button>
            </form>
        </div>
        </div>


    </main>
    <script src="../js/script.js"></script>
</body>
</html>