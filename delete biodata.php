<?php
//require_once file config.php
require_once ('config.php');

//jika benar mendapatkan GET kode_dosen dari URL
if (isset($_GET['id'])) {
	//membuat variabel $kode_dosen yang menyimpan nilai dari $_GET['kode_dosen']
	$id = $_GET['id'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki kode_dosen yang sama dengan variabel $kode_dosen
	$cek = mysqli_query($koneksi, "SELECT * FROM biodata WHERE id='$id'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if (mysqli_num_rows($cek) > 0) {
		//query ke database DELETE untuk menghapus data dengan kondisi kode_dosen=$kode_dosen
		$del = mysqli_query($koneksi, "DELETE FROM biodata WHERE id='$id'") or die(mysqli_error($koneksi));
		if ($del) {
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		} else {
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	} else {
		echo '<script>alert("Kode Dosen tidak ditemukan di database."); document.location="index.php";</script>';
	}
} else {
	echo '<script>alert("kode_dosen tidak ditemukan di database."); document.location="index.php";</script>';
}

?>