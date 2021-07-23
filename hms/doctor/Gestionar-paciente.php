<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_GET['del'])) {
    mysqli_query($con, "delete from tblpatient where id = '" . $_GET['id'] . "'");
    $_SESSION['msg'] = " Paciente eleminado correctamente !!";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor | Gestionar Paciente</title>
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
    <link rel="stylesheet" href="stilo.css">
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
								<h1 class="mainTitle" style="color: #2dc3cc;font-weight: 600;">Doctor | Gestionar Paciente</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Doctor</span>
								</li>
								<li class="active">
									<span>Gestionar Paciente</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
                                <p style="color:green;font-size: 15px;font-weight: 600;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
								<h5 class="over-title margin-bottom-15"style="color: #0a6aa1; margin-left: 42%"> <span class="text-bold"> Gestionar Paciente</span></h5>

                                <form role="form" method="post" name="search" action="buscar.php" class="formulariob">

                                        <input type="text" name="searchdata" id="searchdata" value="" required='true'placeholder="Buscar">
                                        <input type="submit" name="search" id="submit" class="btn_buscar" value="Buscar">

                                </form>
								<form role="form" method="post" name="search" action="agregar-paciente.php" class="formulario">


                            <input type="submit" name="search" id="submit" class="btn btn-success" value="Agregar nuevo Paciente">

                        </form>

								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>DNI</th>
											<th>Nombre Paciente</th>
											<th>Telefono Paciente</th>
											<th>Sexo Paciente </th>
											<th>Fecha Creación </th>
										<!--	<th>Fecha Modificacion</th>-->
											<th>Acción</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$docid = $_SESSION['id'];
										$sql = mysqli_query($con, "select * from tblpatient where Docid='$docid' ");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['dnipaciente']; ?></td>
												<td><?php echo $row['PatientName']; ?></td>
												<td><?php echo $row['PatientContno']; ?></td>
												<td><?php echo $row['PatientGender']; ?></td>
												<td><?php echo $row['CreationDate']; ?></td>
												
												</td>
												<td>

													<a href="editar-paciente.php?editid=<?php echo $row['ID']; ?>"><i class="fa fa-edit"></i></a> ||
                                                    <a href="vista-paciente.php?viewid=<?php echo $row['ID']; ?>"><i class="fa fa-eye"></i></a> ||
                                                    <a href="Gestionar-paciente.php?id=<?php echo $row['ID']; ?>&del=delete" onclick="return confirm('Está seguro de que desea eliminar?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-trash"></i></a>


												</td>
											</tr>
										<?php
											$cnt = $cnt + 1;
										} ?></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
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