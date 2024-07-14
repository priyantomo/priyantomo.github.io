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
		<h2>Edit Kelas</h2>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if (isset($_GET['id'])) {
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel ruang_kelas berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM ruang_kelas WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if (mysqli_num_rows($select) == 0) {
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
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
			$kode_kelas = $_POST['kode_kelas'];
			$nama_makul = $_POST['nama_makul'];
			$kode_dosen = $_POST['kode_dosen'];
			$jam = $_POST['jam'];

			$sql = mysqli_query($koneksi, "UPDATE ruang_kelas SET kode_kelas='$kode_kelas', nama_makul='$nama_makul', kode_dosen='$kode_dosen', jam='$jam' WHERE id='$id'") or die(mysqli_error($koneksi));

			if ($sql) {
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit kelas.php?id=' . $id . '";</script>';
			} else {
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="edit kelas.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE KELAS</label>
				<div class="col-sm-10">
					<input type="text" name="kode_kelas" class="form-control" value="<?php echo $data['kode_kelas']; ?>"
						required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAKUL</label>
				<div class="col-sm-10">
					<input type="text" name="nama_makul" class="form-control" value="<?php echo $data['nama_makul']; ?>"
						required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE DOSEN</label>
				<div class="col-sm-10">
					<input type="text" name="kode_dosen" class="form-control" value="<?php echo $data['kode_dosen']; ?>"
						required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JAM</label>
				<div class="col-sm-10">
					<select name="jam" class="form-control" required>
						<option value="">PILIH JAM</option>
						<option value="1" <?php if ($data['jam'] == '1') {
							echo 'selected';
						} ?>>1</option>
						<option value="2" <?php if ($data['jam'] == '2') {
							echo 'selected';
						} ?>>2</option>
						<option value="3" <?php if ($data['jam'] == '3') {
							echo 'selected';
						} ?>>3</option>
						<option value="4" <?php if ($data['jam'] == '4') {
							echo 'selected';
						} ?>>4</option>
					</select>
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