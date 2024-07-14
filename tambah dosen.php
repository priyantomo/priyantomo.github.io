<?php require_once ('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>CONTOH CRUD MySQLi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
	<?php require_once "utils/navbar.php" ?>


	<div class="container" style="margin-top:20px">
		<h2>Tambah Dosen</h2>

		<hr>

		<?php
		if (isset($_POST['submit'])) {
			$kode_dosen = $_POST['kode_dosen'];
			$nama_dosen = $_POST['nama_dosen'];

			$cek = mysqli_query($koneksi, "SELECT * FROM dosen WHERE kode_dosen='$kode_dosen'") or die(mysqli_error($koneksi));

			if (mysqli_num_rows($cek) == 0) {
				$sql = mysqli_query($koneksi, "INSERT INTO dosen(kode_dosen, nama_dosen) VALUES('$kode_dosen', '$nama_dosen')") or die(mysqli_error($koneksi));

				if ($sql) {
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah dosen.php";</script>';
				} else {
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			} else {
				echo '<div class="alert alert-warning">Gagal, Kode Dosen sudah terdaftar.</div>';
			}
		}
		?>

		<form action="tambah dosen.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE DOSEN</label>
				<div class="col-sm-10">
					<input type="text" name="kode_dosen" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA DOSEN</label>
				<div class="col-sm-10">
					<input type="text" name="nama_dosen" class="form-control" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
		crossorigin="anonymous"></script>

</body>

</html>