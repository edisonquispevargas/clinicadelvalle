<?php 

include 'conexion.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512',$contrasena);/*increptar contraseña*/

$query = "INSERT INTO usuarios(nombre_completo, email, usuario, contrasena) 
          VALUES('$nombre_completo','$correo','$usuario','$contrasena')";


/*verificar que el correo elecronico no se repíta*/

$verificar_correo = mysqli_query($conexion,"SELECT * FROM usuarios WHERE email='$correo'");
if(mysqli_num_rows($verificar_correo) > 0){
    echo'
    <script>
    alert("Este correo ya esta registrado, entente  con otro diferente");
    window.location="../index.php";
    </script>
    ';
    exit();
}
/*verificar que el usuario no se repíta*/
$verificar_usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo'
    <script>
    alert("Este usuario ya esta registrado intentelo con otro");
    window.location="../index.php";
    </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
    <script>
    alert("usuario almacenado correctamente");
    window.location="../index.php";
    </script>
    ';
}else{
    echo'
    <script>
    alert("intentalo de nuevo usuario no almacenado");
    window.location="../index.php";
    </script>
    ';
}
myqli_close($conexion);



?>