<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<?php $nik = $_POST['carinik']; // mengambil nik dari form cari ?> 
			<h2>Pencarian Data Karyawan &raquo; NIK: <?php echo $nik; // menampilkan nik ?></h2>
			<hr />
			
			<?php
			$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE nik='$nik'"); // query untuk memilih entri dengan nik terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: ../daftar_karyawan/home.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ // jika tombol 'Hapus Data' pada baris 74 ditekan
				$delete = mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE nik='$nik'"); // query delete entri dengan nik terpilih
				if($delete){ // jika query delete berhasil dieksekusi
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
				}else{ // jika query delete gagal dieksekusi
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
				}
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data karyawan hasil pencarian-->
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">NIK</th>
					<td><?php echo $row['nik']; ?></td>
				</tr>
				<tr>
					<th>Nama Karyawan</th>
					<td><?php echo $row['nama_karyawan']; ?></td>
				</tr>
				<tr>
					<th>Jabatan</th>
					<td><?php echo $row['jabatan']; ?></td>
				</tr>
				<tr>
					<th>Tgl Masuk</th>
					<td><?php echo $row['tgl_masuk'].', '.$row['tgl_masuk']; ?></td>
				</tr>
				<tr>
					<th>Divisi</th>
					<td><?php echo $row['divisi']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><i class="fas fa-caret-square-left"></i> Kembali</a>
			<a href="edit.php?nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-success"><i class="fas fa-user-edit"></i> Edit Data</a>
			<a href="profile.php?aksi=delete&nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama']; ?>')"><i class="fas fa-trash-alt"></i> Hapus Data</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>