<?php 
include "header.php";
include("../koneksi.php");
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<h1>Data Karyawan</h1>
				<a href="data.php" data-toggle="tooltip" title="Lihat Data Karyawan" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Karyawan</a>
				<a href="tambah.php" data-toggle="tooltip" title="Tambah Data Karyawan" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Data</a>
			</div>
		</div>
	</div>
	<!-- End container -->
<?php 
include("footer.php");
?>