<?php
//memasukkan file config.php
require_once ('config.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>KelasKU</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
	<?php require_once "utils/navbar.php" ?>

	<div class="container" style="margin-top:20px">
		<h2>Daftar Mahasiswa</h2>

		<hr>

		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>NO.</th>
					<th>NIM</th>
					<th>NAMA MAHASISWA</th>
					<th>JENIS KELAMIN</th>
					<th>JURUSAN</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan nim yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nim ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['nim'] . '</td>
							<td>' . $data['nama'] . '</td>
							<td>' . $data['jenis_kelamin'] . '</td>
							<td>' . $data['jurusan'] . '</td>
							<td>
								<a href="edit.php?id=' . $data['id'] . '" class="badge badge-warning">Edit</a>
								<a href="delete.php?id=' . $data['id'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
					//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>

	</div>



	<div class="container" style="margin-top:20px">
		<h2>Daftar Dosen</h2>

		<hr>

		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>KODE DOSEN</th>
					<th>NAMA DOSEN</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel dosen urut berdasarkan kode_dosen yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM dosen ORDER BY kode_dosen ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>' . $data['kode_dosen'] . '</td>
							<td>' . $data['nama_dosen'] . '</td>
							<td>
								<a href="edit dosen.php?kode_dosen=' . $data['kode_dosen'] . '" class="badge badge-warning">Edit</a>
								<a href="delete dosen.php?kode_dosen=' . $data['kode_dosen'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
											</td>
						</tr>
						';
						$no++;
					}
					//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>

	</div>


	<div class="container" style="margin-top:20px">
		<h2>Daftar Makul</h2>

		<hr>

		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>KODE MAKUL</th>
					<th>NAMA MAKUL</th>
					<th>SKS</th>
					<th>KODE DOSEN</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel makul urut berdasarkan kode makul yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM makul ORDER BY kode_mk ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>' . $data['kode_mk'] . '</td>
							<td>' . $data['nama_mk'] . '</td>
							<td>' . $data['sks'] . '</td>
							<td>' . $data['kode_dosen'] . '</td>
							<td>
								<a href="edit makul.php?kode_mk=' . $data['kode_mk'] . '" class="badge badge-warning">Edit</a>
								<a href="delete makul.php?kode_mk=' . $data['kode_mk'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
					//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>

	</div>

	<div class="container" style="margin-top:20px">
		<h2>Daftar Kelas</h2>

		<hr>

		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>NO.</th>
					<th>KODE KELAS</th>
					<th>NAMA MAKUL</th>
					<th>KODE DOSEN</th>
					<th>JAM</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan nim yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM ruang_kelas ORDER BY kode_kelas ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['kode_kelas'] . '</td>
							<td>' . $data['nama_makul'] . '</td>
							<td>' . $data['kode_dosen'] . '</td>
							<td>' . $data['jam'] . '</td>
							<td>
								<a href="edit kelas.php?id=' . $data['id'] . '" class="badge badge-warning">Edit</a>
								<a href="delete kelas.php?id=' . $data['id'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
					//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>

	</div>

	<div class="container" style="margin-top:20px">
		<h2>Biodata</h2>

		<hr>

		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>NO</th>
					<th>FOTO</th>
					<th>NAMA</th>
					<th>NIM</th>
					<th>JURUSAN</th>
					<th>ALAMAT</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan nim yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM biodata ORDER BY id ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>' . $no . '</td>
							<td><img src="' . $data['foto'] . '" alt="Foto" style="width: 100px; height: 100px;"></td>
							<td>' . $data['nama'] . '</td>
							<td>' . $data['nim'] . '</td>
							<td>' . $data['jurusan'] . '</td>
							<td>' . $data['alamat'] . '</td>
							<td>
								<a href="edit biodata.php?id=' . $data['id'] . '" class="badge badge-warning">Edit</a>
								<a href="delete biodata.php?id=' . $data['id'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
					//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>

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