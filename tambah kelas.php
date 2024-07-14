<?php require_once ('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>WEB CRUD KAMPUS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
	<?php require_once "utils/navbar.php" ?>


	<div class="container" style="margin-top:20px">
		<h2>Tambah Kelas</h2>

		<hr>

		<?php
		if (isset($_POST['submit'])) {
			$kode_kelas = $_POST['kode_kelas'];
			$nama_makul = $_POST['nama_makul'];
			$kode_dosen = $_POST['kode_dosen'];
			$jam = $_POST['jam'];

			$cek = mysqli_query($koneksi, "SELECT * FROM ruang_kelas WHERE kode_kelas='$kode_kelas'") or die(mysqli_error($koneksi));

			if (mysqli_num_rows($cek) == 0) {
				$sql = mysqli_query($koneksi, "INSERT INTO ruang_kelas(kode_kelas, nama_makul, kode_dosen, jam) VALUES('$kode_kelas', '$nama_makul', '$kode_dosen', '$jam')") or die(mysqli_error($koneksi));

				if ($sql) {
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah kelas.php";</script>';
				} else {
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			} else {
				echo '<div class="alert alert-warning">Gagal, kode kelas sudah terdaftar.</div>';
			}
		}
		?>

		<form action="tambah kelas.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE KELAS</label>
				<div class="col-sm-10">
					<input type="text" name="kode_kelas" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAKUL</label>
				<div class="col-sm-10">
					<input type="text" name="nama_makul" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE DOSEN</label>
				<div class="col-sm-10">
					<input type="text" name="kode_dosen" class="form-control" required>
				</div>
			</div>
			<!-- <div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE DOSEN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="kode_dosen" value="LAKI-LAKI" required>
						<label class="form-check-label">RUANG</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div> -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JAM</label>
				<div class="col-sm-10">
					<select name="jam" class="form-control" required>
						<option value="">PILIH JAM</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
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