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
		<h2>Edit Makul</h2>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET kode_mk dari URL
		if (isset($_GET['kode_mk'])) {
			//membuat variabel $kode_mk untuk menyimpan kode_mk dari GET kode_mk di URL
			$kode_mk = $_GET['kode_mk'];

			//query ke database SELECT tabel mahasiswa berdasarkan kode_mk = $kode_mk
			$select = mysqli_query($koneksi, "SELECT * FROM makul WHERE kode_mk='$kode_mk'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if (mysqli_num_rows($select) == 0) {
				echo '<div class="alert alert-warning">Kode makul tidak ada dalam database.</div>';
				exit();
				//jika hasil query > 0
			} else {
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if (isset($_POST['submit'])) {
			$kode_mk = $_POST['kode_mk'];
			$nama_mk = $_POST['nama_mk'];
			$sks = $_POST['sks'];
			$kode_dosen = $_POST['kode_dosen'];

			$sql = mysqli_query($koneksi, "UPDATE makul SET kode_mk='$kode_mk', nama_mk='$nama_mk', sks='$sks', kode_dosen='$kode_dosen' WHERE kode_mk='$kode_mk'") or die(mysqli_error($koneksi));

			if ($sql) {
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit makul.php?kode_mk=' . $kode_mk . '";</script>';
			} else {
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="edit makul.php?kode_mk=<?php echo $kode_mk; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE MAKUL</label>
				<div class="col-sm-10">
					<input type="text" name="kode_mk" class="form-control" size="4"
						value="<?php echo $data['kode_mk']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAKUL</label>
				<div class="col-sm-10">
					<input type="text" name="nama_mk" class="form-control" value="<?php echo $data['nama_mk']; ?>"
						required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">SKS</label>
				<div class="col-sm-10">
					<select name="sks" class="form-control" required>
						<option value="">PILIH SKS</option>
						<option value="1" <?php if ($data['sks'] == '1') {
							echo 'selected';
						} ?>>1</option>
						<option value="2" <?php if ($data['sks'] == '2') {
							echo 'selected';
						} ?>>2</option>
						<option value="3" <?php if ($data['sks'] == '3') {
							echo 'selected';
						} ?>>3</option>
						<option value="4" <?php if ($data['sks'] == '4') {
							echo 'selected';
						} ?>>4</option>
						<option value="5" <?php if ($data['sks'] == '5') {
							echo 'selected';
						} ?>>5</option>
						<option value="6" <?php if ($data['sks'] == '6') {
							echo 'selected';
						} ?>>6</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE DOSEN</label>
				<div class="col-sm-10">
					<input type="text" name="kode_dosen" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
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