<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Loginnn Doctor</title>
        <link rel="shortcut icon" href="../img/logo.jpg" type="image/x-icon">
    
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/stilo_login_doctor.css">
        <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
        
        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        
    </head>
    
    <body>
    
      <div class="container-login">
        <div class="wrap-login">
            
            <form class="login-form validate-form" id="formLogin" action="" method="post">
            <fieldset>
            <p style="font-size: 26px;margin-top:-50px; color: #2dc3cc;text-align: center;text-shadow: 2px 2px 2px black;font-weight: 600;">SESION DOCTOR</p>
                <p style="font-size: 15px; color: #2d2d2d;">Ingrese su Usuario y Contraseña para Iniciar Sesion.</p>
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Contraseña">
                    <span class="focus-efecto"></span>
                </div>
                <a href="" style="font-size: 12px; margin-top: -15px; color: blue;">
									¿Olvide mi contraseña?
								</a>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">Iniciar Sesion</button>
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
    </body>
</html>