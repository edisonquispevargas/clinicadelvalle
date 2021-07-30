<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did = intval($_GET['id']); // get doctor id
if (isset($_POST['submit'])) {
	$docspecialization = $_POST['Doctorspecialization'];
	$docdni = $_POST['docdni'];
	$docname = $_POST['docname'];
	$docapellido = $_POST['docapellido'];
	$docaddress = $_POST['clinicaddress'];
	$docfees = $_POST['docfees'];
	$doccontactno = $_POST['doccontact'];
	$docemail = $_POST['docemail'];
	$sql = mysqli_query($con, "Update doctors set specilization='$docspecialization',doctorName='$docname'
	,address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail',dni='$docdni',apellidos='$docapellido' where id='$did'");
	if ($sql) {
		$msg = "Detalles del médico actualizados con éxito!!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Modificar Detalle Doctor</title>
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
			<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle"style="color: #2dc3cc;font-weight: 600" >Admin | Modificar Detalle Doctor</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Modificar Detalle Doctor</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
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
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title"  style="color: #2dc3cc;font-weight: 600;  text-align: center;">
												Modificar Informacion Doctor</h5>
											</div>
											<div class="panel-body">
												<?php $sql = mysqli_query($con, "select * from doctors where id='$did'");
												while ($data = mysqli_fetch_array($sql)) {
												?>
													<h4> Doctor (a): <?php echo htmlentities($data['doctorName']); ?> - Perfil</h4>
													<p><b>Fecha Registro Perfil: </b><?php echo htmlentities($data['creationDate']); ?></p>
													<?php if ($data['updationDate']) { ?>
													<!--	<p><b>Fecha de Ultima Actualizacion Perfil: </b><?php echo htmlentities($data['updationDate']); ?></p>-->
													<?php } ?>
													<hr />
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																Especilidad Doctor
															</label>
															<select name="Doctorspecialization" class="form-control" required="required">
																<option value="<?php echo htmlentities($data['specilization']); ?>">
																	<?php echo htmlentities($data['specilization']); ?></option>
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
                                                        <label for="doctordni" >
                                                            DNI Doctor
                                                        </label>
														<span class="input-icon">
                                                        <input type="text" name="docdni" class="form-control" value="<?php echo htmlentities($data['dni']); ?>">
														<i class="fa fa-book"></i></span>
													</div>
														<div class="form-group">
															<label for="doctorname">
																Nombre Doctor
															</label>
															<span class="input-icon">
															<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']); ?>">
															<i class="fa fa-user"></i></span>
														</div>

														<div class="form-group">
														<label for="doctorapellido">
															Apellidos Doctor
														</label>
														<span class="input-icon">
														<input type="text" name="docapellido" class="form-control" value="<?php echo htmlentities($data['apellidos']); ?>">
														<i class="fa fa-user"></i></span>
													</div>

														<div class="form-group">
															<label for="address">
																Dirección Doctor
															</label>
															<span class="input-icon">
															<textarea name="clinicaddress" class="form-control" style="border-color: #2dc3cc"><?php echo htmlentities($data['address']); ?></textarea>
															<i class="fa fa-map-marker"></i></span>
														</div>
														<div class="form-group">
															<label for="fess">
																Precio de Consulta Medica
															</label>
															<span class="input-icon">
															<input type="text" name="docfees" class="form-control" required="required" value="<?php echo htmlentities($data['docFees']); ?>">
															<i class="fa fa-usd"></i></span>
														</div>
														<div class="form-group">
															<label for="fess">
																Contacto Doctor
															</label>
															<span class="input-icon">
															<input type="text" name="doccontact" class="form-control" required="required" value="<?php echo htmlentities($data['contactno']); ?>">
															<i class="fa fa-phone"></i></span>
														</div>

														<div class="form-group">
															<label for="fess">
																Email Doctor
															</label>
															<span class="input-icon">
															<input type="email" name="docemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['docEmail']); ?>">
															<i class="fa fa-envelope"></i></span>
														</div>
													<?php } ?>
											
													<div class="modal-footer">
													<a href="Administrar-doctores.php"  method="post" class="btn btn-default btn-flat pull-left"><i class="fa fa-close"></i> Regresar</a>
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
			<!-- end: BASIC EXAMPLE -->
			<!-- end: SELECT BOXES -->
		</div>
		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include('include/setting.php'); ?>
	</div>



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