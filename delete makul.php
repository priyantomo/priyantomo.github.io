<?php
//require_once file config.php
require_once ('config.php');

//jika benar mendapatkan GET kode_mk dari URL
if (isset($_GET['kode_mk'])) {
	//membuat variabel $kode_mk yang menyimpan nilai dari $_GET['kode_mk']
	$kode_mk = $_GET['kode_mk'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki kode_mk yang sama dengan variabel $kode_mk
	$cek = mysqli_query($koneksi, "SELECT * FROM makul WHERE kode_mk='$kode_mk'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if (mysqli_num_rows($cek) > 0) {
		//query ke database DELETE untuk menghapus data dengan kondisi kode_mk=$kode_mk
		$del = mysqli_query($koneksi, "DELETE FROM makul WHERE kode_mk='$kode_mk'") or die(mysqli_error($koneksi));
		if ($del) {
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		} else {
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	} else {
		echo '<script>alert("Kode Makul tidak ditemukan di database."); document.location="index.php";</script>';
	}
} else {
	echo '<script>alert("Kode Makul tidak ditemukan di database."); document.location="index.php";</script>';
}

?>