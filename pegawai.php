<?php require('koneksi.php'); 
    require('header.php');
?>
<style>
    .pagination > li > a
{
    background-color: white;
    color: #ed563b;
}

.pagination > li > a:focus,
.pagination > li > a:hover,
.pagination > li > span:focus,
.pagination > li > span:hover
{
    color: #5a5a5a;
    background-color: #eee;
    border-color: #ddd;
}

.pagination > .active > a
{
    color: white;
    background-color: #ed563b !Important;
    border: solid 1px #ed563b !Important;
}

.pagination > .active > a:hover
{
    background-color: #ed563b !Important;
    border: solid 1px #ed563b;
}
</style>
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
                            <li class="main-button"><a href="index.php">Kembali</a></li>
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
    <!-- ***** Features Item Start ***** -->
    <section class="section" id="tentang">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>DATA PEGAWAI <em>PT BMB</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">
                        <p>Informasi Kepegawaian yang ada di PT. BMB (BINUANG MITRA BERASAMA) Kalimantan  Selatan</p>
                    </div>
                </div>
<?php 
    $halaman      = 6; //batasan halaman
    $page         = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
    $mulai        = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $sql          = mysqli_query($kon, "SELECT * FROM user WHERE NOT level = 'admin'");
    $total        = mysqli_num_rows($sql);
    $pages        = ceil($total/$halaman);
    $previous     = $page - 1;
    $next         = $page + 1;

    $user = mysqli_query($kon, "SELECT * FROM user WHERE NOT level = 'admin' ORDER BY nama ASC LIMIT $mulai, $halaman");
    while($data = mysqli_fetch_array($user)){
        ?>
        <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="<?= $data['foto'] ?>" width='100px'>
                            </div>
                            <div class="right-content">
                                <h4><u><?= $data['nama'] ?></u></h4>
                                <b><?= $data['jabatan'] ?><br> </b><p>Berlokasi di <?= $data['alamat'] ?>. Hub : <?= $data['telp'] ?> </p>
                            </div>
                        </li>
                    </ul>
                </div>
        <?php    
    }
 ?><br>

            </div>
        </div>
    </section>
    <!-- ***** Features Item End ***** -->
</div>
    <?php 
    ?>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

        <!-- INFO HALAMAN -->
             <li class="page-item disabled">
                <a class="page-link" href="#">Hal <?= $page ?> dari <?= $pages ?></a>
        <!-- LINK AWAL DAN SELANJUTNYA -->
    <?php 
        if($page == 1){ // Jika page terakhir
      ?>
        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a>
        <li class="page-item disabled"><a class="page-link" href="#">&lsaquo;</a>
      <?php
      }else{ // Jika Bukan page terakhir
       $link_prev = ($page > 1)? $page - 1 : 1;
      ?>
        <li class="page-item"><a class="page-link" href="pegawai.php?halaman=<?=$link_prev?>">&laquo;</a>
        <li class="page-item"><a class="page-link" href="pegawai.php?halaman=<?=$pages?>">&lsaquo;</a>
      <?php
      }
      ?>
    
        <!-- LINK NUMBER -->
        <?php
        $jumlah_number  = 2; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number   = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number     = ($page < ($pages - $jumlah_number))? $page + $jumlah_number : $pages;
      
        for($i = $start_number; $i <= $end_number; $i++){
            $link_active = ($page == $i) ? 'class="page-item active"' : ''; ?>
        <li <?= $link_active ?>><a class="page-link" href="pegawai.php?halaman=<?= $i; ?>"><?= $i; ?></a></li>
        <?php } ?>

        <!-- LINK NEXT AND LAST -->
      <?php
      // Jika page sama dengan jumlah page, maka disable link NEXT nya
      // Artinya page tersebut adalah page terakhir 
      if($page == $pages){ // Jika page terakhir
      ?>
        <li class="page-item disabled"><a class="page-link" href="#">&rsaquo;</a>
        <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a>
      <?php
      }else{ // Jika Bukan page terakhir
        $link_next = ($page < $pages)? $page + 1 : $pages;
      ?>
        <li class="page-item"><a class="page-link" href="pegawai.php?halaman=<?=$link_next?>">&rsaquo;</a>
        <li class="page-item"><a class="page-link" href="pegawai.php?halaman=<?=$pages?>">&raquo;</a>
      <?php
      }
      ?>
  </ul>
</nav>

<?php require('footer.php') ?>