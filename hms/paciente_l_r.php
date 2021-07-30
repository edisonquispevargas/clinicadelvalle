<?php
session_start();
  if(isset($_SESSION['users'])){
     header ("location: inicio.php");
  }

  error_reporting(0);
  include("include/config.php");
  if(isset($_POST['submit']))
  {
  $ret=mysqli_query($con,"SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
  $num=mysqli_fetch_array($ret);
  if($num>0)
  {
  $extra="inicio.php";//
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
  $extra="paciente_l_r.php";
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

    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../css/stilo_login_paciente.css">
    <link rel="stylesheet" href="assets/css/stilos.css">
    <link rel="stylesheet" href="../css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
    
</head>}

<?php
if($_SESSION['errmsg']){
    echo "
            <div class='alert alert-danger alert-dismissible' style='width: 40%; font-size: 14px;margin-left: 10%;margin-bottom: -7%;
            margin-top: 2%;'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i>   Error!</h4>
              ".$_SESSION['errmsg']."
              ".($_SESSION['errmsg']= "")."
            </div>
          ";
    unset($_SESSION['error']);
}
?>
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
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="Correo Electronico" name="username"  id="email" required>
                    <input type="password" placeholder="Contraseña" name="password" id="username" required><br><br>
                    <a href="" style="font-size: 12px; margin-top: 35px;color: blue;">
									¿Olvidaste tu Contraseña?
								</a><br>
                    <button name="submit" type="submit">Ingresar</button><br><br>
                </form>
            
              <!--login-->
            <form action="registro_paciente.php" method="POST" class="formulario__register" >
                <h2>Registrarse</h2>
                    <input type="text" placeholder="DNI" name="DNI" required title="Solamente Números" pattern="[0123456789]+" maxlength="8">
                    <input type="text" placeholder="Nombre" name="full_name" required>
                    <input type="text" placeholder="Apellidos" name="apellidos" required>
                    <input type="text" placeholder="Telefono" name="city" required title="Solamente Números" pattern="[0123456789]+" maxlength="9">
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
                    <input type="email" placeholder="Email" name="email"  id="email" required>
                    <input type="password" placeholder="Contraseña" name = "password" id="password" required>
                    <input type="password" placeholder="Contraseña de nuevo" name="password_again" id="password_again" required>
                    <button>Registrarse</button>
            </form>
        </div>
        </div>


    </main>
    <script src="../js/script.js"></script>
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../popper/popper.min.js"></script>

<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="../codigo.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

<script src="assets/js/main.js"></script>

<script src="assets/js/login.js"></script>
<script>
    jQuery(document).ready(function() {
        Main.init();
        Login.init();
    });
</script>
</body>
</html>