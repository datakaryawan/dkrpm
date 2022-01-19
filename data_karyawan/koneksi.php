<?php



$dbhost	= 'localhost';
$dbuser	= 'root';

$dbpass	= '';
$dbname	= 'db_data_karyawan';

$koneksi = new mysqli ($dbhost,$dbuser,$dbpass,$dbname);

if ($koneksi->connect_error) {
	die ('Mohon maaf koneksi gagal:'. $koneksi->connect_error);

}


?>