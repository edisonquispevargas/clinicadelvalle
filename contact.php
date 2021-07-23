<?php
include_once('hms/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Su información ha sido enviada con éxito, el administrador se contactara contigo');</script>";
echo "<script>window.location.href ='contact.php'</script>";

}


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Clinica del Valle | 2021</title>
		<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<!--start-wrap-->
		
			<!--start-header-->
			<div class="header" style="background: #2dc3cc">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
		<a href="index.html" style="font-size: 30px; color: #f6f8f8">Clinica del Valle - Andahuaylas</a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li><a href="index.html">INICIO</a></li>
					
						<li class="active"><a href="contact.php">CONTACTO</a></li>
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		    <div class="clear"> </div>
		   <div class="wrap">
		   	<div class="contact">
		   	<div class="section group">				
				<div class="col span_1_of_3">
					
      			<div class="company_address">
				     	<h2 style="color: #2dc3cc">Dirección Clinica:</h2>
						    	<p>Jr. Hugo Pecce Peceto -</p>
						   		<p>N° 350 Andahuaylas</p>

				   		<p>Telefono:(+51) 997 952 888</p>
				   		<p>Ruc: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>clinicadelvalle@gmail.com</span></p>
				   	
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2 style="color: #2dc3cc;padding-bottom: 15px;margin-left: 23%">Contactenos</h2>
					    <form name="contactus" method="post">
					    	<div>
						    	<span><label>NOMBRE</label></span>
						    	<span><input type="text" name="fullname" required="true" value=""
								pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+" title="Solamente letras de A Z"></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="email" name="emailid" required="ture" value=""></span>
						    </div>
						    <div>
						     	<span><label>TELEFONO</label></span>
						    	<span><input type="text" name="mobileno" required="true" value=""
								title="Solamente Números" pattern="[0123456789]+" maxlength="9"></span>
						    </div>
						    <div>
						    	<span><label>DESCRIPCION - MENSAJE</label></span>
						    	<span><textarea name="description" required="true"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="Enviar" style="margin-left: 30%"></span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
			</div>
	      <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.html">INICIO</a></li>
						
						<li><a href="contact.php">CONTACTO</a></li>
					</ul>
		   	</div>
		  
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>

