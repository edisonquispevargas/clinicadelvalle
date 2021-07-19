<?php 
include 'conexion.php';

    $dni=$_POST['DNI'];
    $fname=$_POST['full_name'];
    $apellidos=$_POST['apellidos'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
   /* $password=$_POST['password'];
    $password=hash('sha512',$password);*/
    $password=md5($_POST['password']);
    $query = "INSERT INTO users(fullname,address,city,gender,email,password,DNI,apellidos) 
          VALUES('$fname','$address','$city','$gender','$email','$password','$dni','$apellidos')";

   /* $query=mysqli_query($conexion,"insert into users(fullname,address,city,gender,email,password,DNI,apellidos) values('$fname','$address','$city','$gender','$email','$password','$dni','$apellidos')");
    if($query)
    {
        echo "<script>alert('Successfully Registered. You can login now');</script>";
        //header('location:user-login.php');
    }
    
    }*/
/*verificar que el correo elecronico no se repíta*/

/*$verificar_correo = mysqli_query($conexion,"SELECT * FROM users WHERE email='$email'");
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
/*$verificar_usuario = mysqli_query($conexion,"SELECT * FROM users WHERE usuario='$email'");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo'
    <script>
    alert("Este usuario ya esta registrado intentelo con otro");
    window.location="../index.php";
    </script>
    ';
    exit();
}
*/
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    
    echo '
    <script>
    alert("usuario almacenado correctamente");
    window.location="paciente_l_r.php";
    </script>
    ';
}else{
    echo'
    <script>
    alert("intentalo de nuevo usuario no almacenado");
    window.location="paciente_l_r.php";
    </script>
    ';
}
myqli_close($conexion);



?>