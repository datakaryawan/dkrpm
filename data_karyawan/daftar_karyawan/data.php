<?php 
include("header.php");
include("../koneksi.php");
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan</h2>
			<hr/>
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$nik = $_GET['nik']; // ambil nilai nik
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE nik='$nik'"); // query untuk memilih entri dengan nik yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri nik yang dipilih
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri nik yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE no='$nik'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}
			?>
			<!-- bagian ini untuk memfilter data berdasarkan status -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data Karyawan</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="Personalia" <?php if($filter == 'Personalia'){ echo 'selected'; } ?>>Personalia</option>
						<option value="Ketenagakerjaan" <?php if($filter == 'Ketenagakerjaan'){ echo 'selected'; } ?>>Ketenagakerjaan</option>
                        <option value="Umum" <?php if($filter == 'Umum'){ echo 'selected'; } ?>>Umum</option>
					</select>
				</div>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Karyawan</th>
						<th>Jabatan</th>
						<th>Tgl Masuk</th>
						<th>Divisi</th>
						<th>Action</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE divisi='$filter' ORDER BY nik ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan ORDER BY nik ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nik'].'</td>
								<td><a href="profile.php?nik='.$row['nik'].'">'.$row['nama_karyawan'].'</a></td>
								<td>'.$row['jabatan'].'</td>
								<td>'.$row['tgl_masuk'].'</td>
								<td>'.$row['divisi'].'</td>
								<td>';
								if($row['divisi'] == 'Personalia'){
									echo '<span class="label label-success">Personalia</span>';
								}
								else if ($row['divisi'] == 'Ketenagakerjaan' ){
									echo '<span class="label label-info">Ketenagakerjaan</span>';
								}
								else if ($row['divisi'] == 'Umum' ){
									echo '<span class="label label-warning"></span>';
								}
							echo '
								
									<a href="edit.php?nik='.$row['nik'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
									<a href="password.php?nik='.$row['nik'].'" title="Ganti Password" data-toggle="tooltip" class="btn btn-warning btn-sm"><i class="fas fa-user-shield" aria-hidden="true"></i></a>
									<a href="data.php?aksi=delete&nik='.$row['nik'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nik'].'?\')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>