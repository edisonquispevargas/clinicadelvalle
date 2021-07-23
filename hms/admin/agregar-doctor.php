<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
	$docspecialization = $_POST['Doctorspecialization'];
	$docdni = $_POST['docdni'];
	$docname = $_POST['docname'];
	$docapellido = $_POST['docapellido'];
	$docaddress = $_POST['clinicaddress'];
	$docfees = $_POST['docfees'];
	$doccontactno = $_POST['doccontact'];
	$docemail = $_POST['docemail'];
	$password = md5($_POST['npass']);
	$sql = mysqli_query($con, "insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password,dni,apellidos) 
	values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password','$docdni','$docapellido')");
	if ($sql) {
		echo "<script>alert('Doctor agregado correctamente');</script>";
		echo "<script>window.location.href ='Administrar-doctores.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Agregar Doctor</title>
	<link rel="shortcut icon" href="../../images/logo.jpg" type="image/x-icon">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-6.css" id="skin_color" />
	<script type="text/javascript">
		function valid() {
			if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
				alert("Contraseña y confirmar campo de contraseña no coinciden !!");
				document.adddoc.cfpass.focus();
				return false;
			}
			return true;
		}
	</script>


	<script>
		function checkemailAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'emailid=' + $("#docemail").val(),
				type: "POST",
				success: function(data) {
					$("#email-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">

			<?php include('include/header.php'); ?>

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle" style="color: #2dc3cc;font-weight: 600">Admin | Agregar Doctor</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Agregar Doctor</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title" style="color: #2dc3cc;font-weight: 600;text-align: center;">
                                                    Agregar Doctor</h5>
											</div>
											<div class="panel-body">

												<form role="form" name="adddoc" method="post" onSubmit="return valid();">
													<div class="form-group">
														<label for="DoctorSpecialization" style="color: black;">
															Especialidad Doctor
														</label>
														
														<select name="Doctorspecialization" class="form-control" required="true">
															<option value="">Seleccionar especialidad</option>
															<?php $ret = mysqli_query($con, "select * from doctorspecilization");
															while ($row = mysqli_fetch_array($ret)) {
															?>
																<option value="<?php echo htmlentities($row['specilization']); ?>">
																	<?php echo htmlentities($row['specilization']); ?>
																</option>
															<?php } ?>

														</select>
														
													</div>
                                                    <div class="form-group">
                                                       <label for="doctordni" style="color: black;">
                                                            DNI Doctor
                                                        </label>
														<span class="input-icon">
                                                        <input type="text" name="docdni" class="form-control" placeholder="Ingrese DNI del doctor" required="true"
														title="Solamente Números" pattern="[0123456789]+" maxlength="8">
														<i class="fa fa-book"></i></span>
                                                    </div>

													<div class="form-group">
														<label for="doctorname" style="color: black;">
															Nombre Doctor
														</label>
														<span class="input-icon">
														<input type="text" name="docname" class="form-control" placeholder="Ingrese el nombre del doctor" required="true"
														pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+" title="Solamente letras de A Z">
														<i class="fa fa-user"></i></span>
													</div>

													<div class="form-group">
														<label for="doctorapellido" style="color: black;">
															Apellidos Doctor
														</label>
														<span class="input-icon">
														<input type="text" name="docapellido" class="form-control" placeholder="Ingrese el apellido del doctor" 
														required="true" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+" title="Solamente letras de A Z">
														<i class="fa fa-user"></i></span>
													</div>


													<div class="form-group">
														<label for="address" style="color: black;">
															Direccion Doctor
														</label>
														<span class="input-icon">
														<textarea name="clinicaddress" class="form-control" style="border-color: #2dc3cc"
														placeholder="   Ingrese la dirección de la clínica del médico" required="true"></textarea>
														<i class="fa fa-map-marker"></i></span>
													
													</div>
													<div class="form-group">
														<label for="fess" style="color: black;">
															Tarifa de Consultoria Doctor
														</label>
														<span class="input-icon">
														<input type="number" name="docfees" class="form-control"style="border-color: #2dc3cc"
														 placeholder="Ingrese las tarifas de consultoría médica" 
														required="true">
														<i class="fa fa-usd"></i></span>
													</div>

													<div class="form-group">
														<label for="fess"style="color: black">
															Contacto Doctor
														</label>
														<span class="input-icon">
														<input type="" name="doccontact" class="form-control" style="border-color: #2dc3cc"
														placeholder="Ingrese el número de telefono de Doctor" 
														required="true" maxlength="9" pattern="[0-9]+" title="Solamente Números">
														<i class="fa fa-phone"></i></span>
													</div>

													<div class="form-group">
														<label for="fess" style="color: black;">
															Email Doctor
														</label>
														<span class="input-icon">
														<input type="email" id="docemail" name="docemail" class="form-control" placeholder="Ingrese Email del Doctor" required="true" onBlur="checkemailAvailability()">
														<span id="email-availability-status"></span>
														<i class="fa fa-envelope"></i></span>
													</div>




													<div class="form-group">
														<label for="exampleInputPassword1" style="color: black;">
															Contraseña
														</label>
														<span class="input-icon">
														<input type="password" name="npass" class="form-control" placeholder="ingresar una contraseña" required="required">
														<i class="fa fa-unlock-alt"></i></span>
													</div>

													<div class="form-group">
														<label for="exampleInputPassword2" style="color: black;">
															Confirmar Contraseña
														</label>
														<span class="input-icon">
														<input type="password" name="cfpass" class="form-control" placeholder="Repetir contraseña" required="required">
														<i class="fa fa-unlock-alt"></i></span>
													</div>



													<button type="submit" name="submit" id="submit" class="btn  btn-primary" style="margin-left: 40%">
														Agregar
													</button>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>
							<!--<div class="col-lg-12 col-md-12">
								<div class="panel panel-white">


								</div>-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end: BASIC EXAMPLE -->






			<!-- end: SELECT BOXES -->

		</div>
	</div>
	</div>
	<!-- start: FOOTER -->
	<?php include('include/footer.php'); ?>
	<!-- end: FOOTER -->

	<!-- start: SETTINGS -->
	<?php include('include/setting.php'); ?>

	<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>