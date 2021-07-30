<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
	$eid = $_GET['editid'];
	$patdni = $_POST['patdni'];
	$patname = $_POST['patname'];
	$patcontact = $_POST['patcontact'];
	$patemail = $_POST['patemail'];
	$gender = $_POST['gender'];
	$pataddress = $_POST['pataddress'];
	$patage = $_POST['patage'];
	$medhis = $_POST['medhis'];
	$sql = mysqli_query($con, "update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis',dnipaciente='$patdni' where ID='$eid'");
	if ($sql) {
        $msg = "Datos del paciente actualizados con éxito !!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor | Modificar Paciente</title>
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
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>

			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle" style="color: #2dc3cc;font-weight: 600">Paciente | Modificar Paciente</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Paciente</span>
								</li>
								<li class="active">
									<span>Modificar Paciente</span>
								</li>
							</ol>
						</div>
					</section>
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
												<h5 class="panel-title"style="color: #2dc3cc;font-weight: 600; margin-left: 40%">Modificar Paciente</h5>
											</div>
											<div class="panel-body">
													
												<form role="form" name="" method="post">
													<?php
													$eid = $_GET['editid'];
													$ret = mysqli_query($con, "select * from tblpatient where ID='$eid'");
													$cnt = 1;
													while ($row = mysqli_fetch_array($ret)) {

													?>
													<div class="form-group">
															<label for="doctorname">
																DNI Paciente
															</label>
															<span class="input-icon">
															<input type="text" name="patdni" class="form-control" value="<?php echo $row['dnipaciente']; ?>" required="true">
															<i class="fa fa-book"></i></span>
														</div>
														<div class="form-group">
															<label for="doctorname">
																Nombre Paciente
															</label>
															<span class="input-icon">
															<input type="text" name="patname" class="form-control" value="<?php echo $row['PatientName']; ?>" required="true">
															<i class="fa fa-user"></i></span>
														</div>
														<div class="form-group">
															<label for="fess">
																Contacto Paciente
															</label>
															<span class="input-icon">
															<input type="text" name="patcontact" class="form-control" value="<?php echo $row['PatientContno']; ?>" required="true" maxlength="9" pattern="[0-9]+">
															<i class="fa fa-phone"></i></span>
														</div>
														<div class="form-group">
															<label for="fess">
																Email Paciente
															</label>
															<span class="input-icon">
															<input type="email" id="patemail" name="patemail" class="form-control" value="<?php echo $row['PatientEmail']; ?>" readonly='true'>
															<span id="email-availability-status"></span>
															<i class="fa fa-envelope"></i></span>
														</div>
														<div class="form-group">
															<label class="control-label">Sexo: </label>
															<?php if ($row['Gender'] == "Female") { ?>
																<input type="radio" name="gender" id="gender" value="Femenino" checked="true"> Femenino
																<input type="radio" name="gender" id="gender" value="Masculino"> Masculino
															<?php } else { ?>
																<label>
																	<input type="radio" name="gender" id="gender" value="Masculino" checked="true"> Masculino
																	<input type="radio" name="gender" id="gender" value="Femenino"> Femenino
																</label>
															<?php } ?>
														</div>
														<div class="form-group">
															<label for="address">
																Direccion Paciente
															</label>
															<span class="input-icon">
															<textarea name="pataddress" class="form-control" required="true"><?php echo $row['PatientAdd']; ?></textarea>
															<i class="fa fa-map-marker"></i></span>
														</div>
														<div class="form-group">
															<label for="fess">
																Edad Paciente
															</label>
															<span class="input-icon">
															<input type="text" name="patage" class="form-control" value="<?php echo $row['PatientAge']; ?>" required="true">
															<i class="fa fa-calendar"></i></span>
														</div>
														<div class="form-group">
															<label for="fess">
																Historial Medico del Paciente
															</label>
															<span class="input-icon">
															<textarea type="text" name="medhis" class="form-control" placeholder="Enter Patient Medical History(if any)" ><?php echo $row['PatientMedhis']; ?></textarea>
															<i class="fa fa-user-md"></i></span>
														</div>
														<div class="form-group">
															<label for="fess">
																Fecha Creacion
															</label>
															<span class="input-icon">
															<input type="text" class="form-control" value="<?php echo $row['CreationDate']; ?>" readonly='true'>
															<i class="fa fa-calendar"></i></span>
														</div>
													<?php } ?>
								
													<div class="modal-footer">
													<a href="Gestionar-paciente.php"  method="post" class="btn btn-default btn-flat pull-left"><i class="fa fa-close"></i> Regresar</a>
													<button type="submit" name="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Actualizar</button>
													</form>
													</div>
												</form>
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
				</div>
			</div>
		</div>
	</div>
	<!-- start: FOOTER -->
	<?php include('include/footer.php'); ?>
	<!-- end: FOOTER -->

	<!-- start: SETTINGS -->
	<?php include('include/setting.php'); ?>

	<!-- end: SETTINGS -->

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