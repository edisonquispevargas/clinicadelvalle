<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
	$dni = $_POST['DNI'];
	$fname = $_POST['fname'];
	$fapell = $_POST['fapell'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];

	$sql = mysqli_query($con, "Update users set fullName='$fname',DNI='$dni',address='$address',city='$city',gender='$gender',apellidos='$fapell' where id='" . $_SESSION['id'] . "'");
	if ($sql) {
		$msg = "Sus datos se actualizaron con éxito !!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Usuario | Modificar Perfil</title>
	<link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon">
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
								<h1 class="mainTitle" style="color: #2dc3cc;font-weight: 600;">Paciente| Modificar Perfil</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Usuario </span>
								</li>
								<li class="active">
									<span>Modificar Perfil</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
					
						<div class="row">
						<?php
							if($msg){
							echo "
								<div class='alert alert-success alert-dismissible' style='background: #00a65a;color: #ffffff;'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true' style='color: black;'>x</button>
								<h4 style='color: #ffffff;font-weight: 600;'><i class='icon fa fa-check'></i> ¡Proceso Exitoso!</h4>
								".htmlentities($msg)."
								</div>
							";
							unset($_SESSION['success']);
							}
						?>
							<div class="col-md-12">
								
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
									
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title" style="color: #2dc3cc;font-weight: 600;text-align: center;">Modificar Perfil</h5>
											</div>
											<div class="panel-body">
												<?php
												$sql = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
												while ($data = mysqli_fetch_array($sql)) {
												?>
													<h4><?php echo htmlentities($data['fullName']); ?> - Perfil</h4>
													<p><b> Fecha Registro Perfil: </b><?php echo htmlentities($data['regDate']); ?></p>
													<!--<?php if ($data['updationDate']) { ?>
														<p><b> Fecha Ultima Actualizacion Perfil:  </b><?php echo htmlentities($data['updationDate']); ?></p>
													<?php } ?>-->
													<hr />
													
													<form role="form" name="edit" method="post">
													<div class="form-group">
															<label for="fname">
																DNI
															</label>
															<span class="input-icon">
															<input type="text" name="DNI" class="form-control" style="border-color: #2dc3cc" value="<?php echo htmlentities($data['DNI']); ?>">
															<i class="fa fa-book"></i></span>
														</div>

														<div class="form-group">
															<label for="fname">
																Nombre Usuario
															</label>
															<span class="input-icon">
															<input type="text" name="fname" class="form-control" style="border-color: #2dc3cc" value="<?php echo htmlentities($data['fullName']); ?>">
															<i class="fa fa-user"></i></span>
														</div>

														<div class="form-group">
															<label for="fname">
																Apellidos
															</label>
															<span class="input-icon">
															<input type="text" name="fapell" class="form-control" style="border-color: #2dc3cc" value="<?php echo htmlentities($data['apellidos']); ?>">
															<i class="fa fa-user"></i></span>
														</div>

														<div class="form-group">
															<label for="address">
																Dirección
															</label>
															<span class="input-icon">
															<textarea name="address" class="form-control" style="border-color: #2dc3cc"><?php echo htmlentities($data['address']); ?></textarea>
															<i class="fa fa-map-marker"></i></span>
														</div>
														<div class="form-group">
															<label for="city">
																Telefono
															</label>
															<span class="input-icon">
															<input type="text" name="city" class="form-control" required="required" style="border-color: #2dc3cc" value="<?php echo htmlentities($data['city']); ?>">
															<i class="fa fa-phone"></i></span>
														</div>

														<div class="form-group">
															<label for="gender">
																Sexo:
															</label>

															<select name="gender" class="form-control" required="required">
																<option value="<?php echo htmlentities($data['gender']); ?>"><?php echo htmlentities($data['gender']); ?></option>
																<option value="Masculino">Masculino</option>
																<option value="Femenino">Femenino</option>
																<option value="Ninguno">Ninguno</option>
															</select>

														</div>

														<div class="form-group">
															<label for="fess">
																Email Usuario
															</label>
															<span class="input-icon">
															<input type="email" name="uemail" class="form-control" readonly="readonly" style="border-color: #2dc3cc" value="<?php echo htmlentities($data['email']); ?>">
															<a href="modificar-email.php">Modificar  Email</a>
															<i class="fa fa-envelope"></i></span>
														</div>
														<div class="modal-footer">
													<a href="inicio.php"  method="post" class="btn btn-default btn-flat pull-left"><i class="fa fa-close"></i> Regresar</a>
													<button type="submit" name="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Actualizar</button>
													</form>
													</div>
													</form>
												<?php } ?>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="panel panel-white">


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