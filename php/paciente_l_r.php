<?php
  session_start();
  if(isset($_SESSION['usuario'])){
     header ("location: php/menu.php");
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
                <form action="php/login_usuario.php" method="POST" class="formulario__login">
                    <h2>Iniciar sesion</h2>
                    <input type="text" placeholder="Correo Electronico" name="correo">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <a href="" style="font-size: 12px; margin-top: 15px;">
									¿Olvidaste tu Contraseña?
								</a><br>
                    <button>Ingresar</button>
                </form>
            
              <!--login-->
            <form action="php/registro_usuario.php" method="POST" class="formulario__register" >
                <h2>Registrarse</h2>
                    <input type="text" placeholder="DNI" name="DNI">
                    <input type="text" placeholder="nombre" name="nombre">
                    <input type="text" placeholder="Apellidos" name="apellidos">
                    <input type="text" placeholder="Telefono" name="telefono">
                    <input type="text" placeholder="Dirección" name="direccion">
                
       

                    <p style="font-size: 12px; margin-top: 15px; text-align: center; color: #2dc3cc;">
								Ingrese los detalles de su cuenta a continuación:
				    </p>
                    <input type="text" placeholder="Email" name="Email">
                    <input type="password" placeholder="Contraseña" name = "contrasena">
                    <input type="text" placeholder="Contraseña de nuevo" name="correo">
                    <button>Registrarse</button>
            </form>
        </div>
        </div>


    </main>
    <script src="../js/script.js"></script>
</body>
</html>