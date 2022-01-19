<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="asa.jpg">
	<title>Data Karyawan</title>
	<link rel="shortcut icon" href="img/logo_ilmututorial_32x32.jpg" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/fontawesome/css/all.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">
	<!-- JS -->
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/popper.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../bootstrap/js/tooltip.js"></script>
	<script src="../bootstrap/js/bootstrap-datepicker.js"></script>
    <link href="../daftar_karyawan/style.css" rel="stylesheet">
	<!-- JS Fontawesome-->
	<script src="../bootstrap/fontawesome/js/all.min.js"></script>

	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>

  </head>
<body>
	<!-- Start navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#">RETRORIKA STUDIO</a>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link active" href="home.php">
						<i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link active" href="data.php">
						<i class="fas fa-copy"></i> Lihat Data</a>
					<a class="nav-item nav-link active" href="tambah.php" class="fas fa-file-alt">
						<i class="fas fa-user-plus"></i> Tambah Data</a>			
				</div>
			</div>
			<form class="form-inline my-2 my-lg-0" method="POST" name="cari" action="cari.php" role="search">
				<div class="form-group">
					<input class="form-control mr-sm-2" type="text" name="carinik" placeholder="Search NIK Karayawan" aria-label="Search">
				</div>
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" id="submit" value="search">Search</button>
			</form>
		</div>
	</nav>

	<!-- End navbar -->