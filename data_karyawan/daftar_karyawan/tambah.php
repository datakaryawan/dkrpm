<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ 
				$nik		     = $_POST['nik'];
				$nama_karyawan   = $_POST['nama_karyawan'];
				$jabatan  		 = $_POST['jabatan'];
				$tgl_masuk		 = $_POST['tgl_masuk'];
				$divisi			 = $_POST['divisi'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE nik='$nik'"); // query untuk memilih entri dengan nik terpilih
						$insert = mysqli_query($koneksi, "INSERT INTO tb_karyawan(nik, nama_karyawan, jabatan, tgl_masuk, divisi) VALUES('$nik','$nama_karyawan', '$jabatan', '$tgl_masuk', '$divisi')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Di Simpan.</div>'; // maka tampilkan 'Data Karyawan Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Karyawan Gagal Di simpan!</div>'; // maka tampilkan 'Ups, Data Karyawan Gagal Di simpan!'
						}
				}else{ // mengecek jika nik yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Sudah Ada..!</div>'; // maka tampilkan 'NIK Sudah Ada..!'
				}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-2">
						<input type="text" name="nik" class="form-control" placeholder="NIK" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Karyawan</label>
					<div class="col-sm-4">
						<input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jabatan</label>
					<div class="col-sm-2">
						<select name="jabatan" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Technical Support">Technical Support</option>
							<option value="Finance">Finance</option>
							<option value="Manager">Manager</option>
                            <option value="Supervisor">Supervisor</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tgl Masuk</label>
					<div class="col-sm-3">
						<input type="date" name="tgl_masuk" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Divisi</label>
					<div class="col-sm-3">
						<input type="text" name="divisi" class="form-control" placeholder="Divisi" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Karyawan">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal"><i class="fas fa-times-circle"></i> Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>