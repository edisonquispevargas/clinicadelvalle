<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();


if (isset($_GET['del'])) {
	mysqli_query($con, "delete from doctors where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = " Doctor eleminado correctamente !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Gestionar Doctor</title>
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

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle" style="color: #2dc3cc;font-weight: 600">Administrar Medicos</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Administrar Medicos</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
					<form role="form" method="post" name="search" action="agregar-doctor.php" class="formulariob">
                        <p style="color:green;font-size: 15px;font-weight: 600;"><?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>

                            <input type="submit" name="search" id="submit" class="btn btn-success" value="Agregar Doctor">

                        </form>
						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">
                                    <span class="text-bold" style="color: #0a6aa1; margin-left: 42%">Gestionar Doctores</span></h5>
								<table class="table">
									<thead>
										<tr >
											<th class="center">#</th>
											<th>Especialidad</th>
                                            <th>DNI</th>
											<th class="hidden-xs">Nombre Doctor</th>
                                            <th>Apellidos </th>
											<th>Fecha Creación </th>
											<th style="color: white;">Acción</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = mysqli_query($con, "select * from doctors");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['specilization']; ?></td>
                                                <td><?php echo $row['dni']; ?></td>
												<td><?php echo $row['doctorName']; ?></td>
                                                <td><?php echo $row['apellidos']; ?></td>
												<td><?php echo $row['creationDate']; ?>
												</td>

												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a href="edit-doctor.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>

														<a href="Administrar-doctores.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Está seguro de que desea eliminar?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-trash fa fa-white"></i></a>
													</div>
													<div class="visible-xs visible-sm hidden-md hidden-lg">
														<div class="btn-group" dropdown is-open="status.isopen">
															<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
																<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
															</button>
															<ul class="dropdown-menu pull-right dropdown-light" role="menu">
																<li>
																	<a href="#">
																		Editar
																	</a>
																</li>
																<li>
																	<a href="#">
																		Compartir
																	</a>
																</li>
																<li>
																	<a href="#">
																		Eliminar
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</td>
											</tr>
										<?php
											$cnt = $cnt + 1;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end: BASIC EXAMPLE -->
			<!-- end: SELECT BOXES -->

		</div>
	</div>
	<div>
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