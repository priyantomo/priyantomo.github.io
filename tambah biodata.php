<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>CONTOH CRUD MySQLi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <?php require_once "utils/navbar.php"; ?>

    <div class="container" style="margin-top:20px">
        <h2>Tambah Biodata</h2>
        <hr>

        <?php
        if (isset($_POST['submit'])) {
            // Koneksi ke database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "uas"; // Ganti dengan nama database Anda

            // Membuat koneksi
            $koneksi = new mysqli($servername, $username, $password, $dbname);

            // Memeriksa koneksi
            if ($koneksi->connect_error) {
                die("Connection failed: " . $koneksi->connect_error);
            }

            // Mengambil data dari form
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $jurusan = $_POST['jurusan'];
            $alamat = $_POST['alamat'];

            // Memproses file foto
            if ($_FILES['foto']['name']) {
                $foto = $_FILES['foto']['name'];
                $tmp = $_FILES['foto']['tmp_name'];

                $ext = pathinfo($foto, PATHINFO_EXTENSION);
                $foto = uniqid() . '.' . $ext;

                $path = 'foto/' . $foto;
                move_uploaded_file($tmp, $path);
            } else {
                $foto = null; // Atau nilai default
            }

            // Cek apakah data sudah ada
            $cek = $koneksi->query("SELECT * FROM biodata WHERE nim = '$nim'");

            // Periksa apakah query berhasil dieksekusi
            if ($cek === false) {
                die("Query failed: " . $koneksi->error);
            }

            if (mysqli_num_rows($cek) == 0) {
                $sql = $koneksi->query("INSERT INTO biodata(foto, nama, nim, jurusan, alamat) VALUES('$foto', '$nama', '$nim', '$jurusan', '$alamat')");

                if ($sql) {
                    echo '<script>alert("Berhasil menambahkan data."); document.location="tambah biodata.php";</script>';
                } else {
                    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                }
            } else {
                echo '<div class="alert alert-warning">Gagal, Data sudah terdaftar.</div>';
            }

            // Tutup koneksi
            $koneksi->close();
        }
        ?>

        <form action="tambah biodata.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">FOTO</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">JURUSAN</label>
                <div class="col-sm-10">
                    <select name="jurusan" class="form-control" required>
                        <option value="">PILIH JURUSAN</option>
                        <option value="SISTEM INFORMASI">SISTEM INFORMASI</option>
                        <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                        <option value="TEKNIK SIPIL">TEKNIK SIPIL</option>
                        <option value="PERTANIAN">PERTANIAN</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ALAMAT</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" required>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
