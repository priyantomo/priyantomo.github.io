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
		<h2>Edit Biodata</h2>

		<hr>

		<?php
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$select = mysqli_query($koneksi, "SELECT * FROM biodata WHERE id='$id'") or die(mysqli_error($koneksi));

			if (mysqli_num_rows($select) == 0) {
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			} else {
				$data = mysqli_fetch_assoc($select);
			}
		}

		if (isset($_POST['submit'])) {
			$nama = $_POST['nama'];
			$nim = $_POST['nim'];
			$jurusan = $_POST['jurusan'];
			$alamat = $_POST['alamat'];

			if ($_FILES['foto']['name']) {
				$foto = $_FILES['foto']['name'];
				$tmp = $_FILES['foto']['tmp_name'];

				$ext = pathinfo($foto, PATHINFO_EXTENSION);
				$foto = uniqid() . '.' . $ext;

				$path = 'foto/' . $foto;
				move_uploaded_file($tmp, $path);
			} else {
				$foto = $data['foto'];
			}

			$sql = mysqli_query($koneksi, "UPDATE biodata SET foto='$path', nama='$nama', nim='$nim', jurusan='$jurusan', alamat='$alamat' WHERE id='$id'") or die(mysqli_error($koneksi));

			if ($sql) {
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit%20biodata.php?id=' . $id . '";</script>';
			} else {
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="edit%20biodata.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">FOTO</label>
				<div class="col-sm-10">
					<input type="file" name="foto">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="" disabled>PILIH JURUSAN</option>
						<option value="SISTEM INFORMASI" <?php if ($data['jurusan'] == 'SISTEM INFORMASI') {
							echo 'selected';
						} ?>>SISTEM INFORMASI</option>
						<option value="TEKNIK INFORMATIKA" <?php if ($data['jurusan'] == 'TEKNIK INFORMATIKA') {
							echo 'selected';
						} ?>>TEKNIK INFORMATIKA</option>
						<option value="TEKNIK SIPIL" <?php if ($data['jurusan'] == 'TEKNIK SIPIL') {
							echo 'selected';
						} ?>>
							TEKNIK SIPIL</option>
						<option value="PERTANIAN" <?php if ($data['jurusan'] == 'PERTANIAN') {
							echo 'selected';
						} ?>>
							PERTANIAN</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ALAMAT</label>
				<div class="col-sm-10">
					<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>"
						required>
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