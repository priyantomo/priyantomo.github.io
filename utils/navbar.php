<link rel="stylesheet" href="styles.css">

<nav class="navbar navbar-expand-lg navbar-light bg-primary text-white">
	<div class="container">
		<a class="navbar-brand" href="#">KelasKu</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tambah.php' ? 'active' : ''; ?>">
					<a class="nav-link" href="tambah.php">Tambah Mahasiswa</a>
				</li>
				<li
					class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tambah dosen.php' ? 'active' : ''; ?>">
					<a class="nav-link" href="tambah dosen.php">Tambah Dosen</a>
				</li>
				<li
					class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tambah makul.php' ? 'active' : ''; ?>">
					<a class="nav-link" href="tambah makul.php">Tambah Makul</a>
				</li>
				<li
					class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tambah kelas.php' ? 'active' : ''; ?>">
					<a class="nav-link" href="tambah kelas.php">Tambah Kelas</a>
				</li>
				<li
					class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'tambah biodata.php' ? 'active' : ''; ?>">
					<a class="nav-link" href="tambah biodata.php">Tambah Biodata Diri</a>
				</li>
			</ul>
		</div>
	</div>
</nav>