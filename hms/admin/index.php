<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
	$ret = mysqli_query($con, "SELECT * FROM admin WHERE username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$extra = "inicio.php"; //
		$_SESSION['login'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} else {
		$_SESSION['errmsg'] = "Usuario y/o Contraseña es Incorrecta";
		$extra = "index.php";
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
}
?>

<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login Admin</title>
        <link rel="shortcut icon" href="../../images/logo.jpg" type="image/x-icon">
    
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/stilo_login_doctor.css">
        <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">

        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">

    </head>
    <body>
    <?php
    if($_SESSION['errmsg']){
        echo "
            <div class='alert alert-danger alert-dismissible' style='width: 50%; font-size: 14px;margin-left: 25%;margin-bottom: -8%;
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
    <div class="container-login">
        <div class="wrap-login">
            
            <form class="login-form validate-form" id="formLogin" action="" method="post">
            <fieldset>
            <p style="font-size: 26px;margin-top:-50px; color: #2dc3cc;text-align: center;text-shadow: 2px 2px 2px black;font-weight: 600;">SESION ADMIN</p>
                <p style="font-size: 13px; color: #2d2d2d">Ingrese su Usuario y Contraseña para Iniciar Sesión.</p>
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="username" required  placeholder="Usuario">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" required placeholder="Contraseña" >
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">Iniciar Sesion <i class=""></i></button>
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
    </div>   
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