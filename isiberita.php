<?php 
	require('koneksi.php'); 
    require('header.php'); require('tgl_indo.php');

	$id = $_GET['id'];
	$berita = mysqli_query($kon, "SELECT * FROM berita WHERE id='$id'");
	$data = mysqli_fetch_array($berita);
?>
<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo"><img src="assets/images/apple-touch-icon-57x57.png" alt=""></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#tentang">Visi Misi</a></li>
                            <li class="scroll-to-section"><a href="#our-classes">Struktur</a></li>
                            <li class="scroll-to-section"><a href="#schedule">Jam Kerja</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Lokasi</a></li> 
                            <li><a href="pegawai.php">Pegawai</a></li> 
                            <!--<li><a href="kegiatan/index.php">Kegiatan</a></li>-->
                            <li class="main-button"><a href="login.php">Login</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
<section class="section" id="tentang" style="margin-top: -100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>BERITA <em>PT BMB</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">
                        <p>Informasi Terkini Seputar Kegian PT. BMB (BINUANG MITRA BERASAMA) Kalimantan  Selatan</p>
                    </div>
                </div>
	<div class="container">
		<h2><?php echo $data['judul']; ?></h2> <hr>
        <label style="font-size:12px; color:grey; float: left">Kategori : <?php echo $data['kategori'] ?> </label>
		<label style="font-size:12px; color:grey; float: right">Dipublikasikan : <?php echo date("j F Y, g:i:a", strtotime($data['tanggal'])); ?> </label>
			<div class="row">
				<div class="col-md-12 col-sm-12 col" style="text-align: center">
					<img src="<?= $data['gambar'] ?>" style='max-width: 500px;'>
				</div>
				<div class="col-md-12 col-sm-12 col text-left">
					<p><?php echo $data['konten'] ?></p>
				</div>
			</div>
			<br>
		<div class="form-group">
			<button class="btn btn-secondary">
					<a onclick="history.back()">Kembali</a>
			  	</button>
		</div>
	</div> <!-- akhir container -->



            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->
</div>
	
	
<?php require('footer.php'); ?>