
<?php include('header.php')?>
<style>
    @media (max-width: 767px) {
  /* Hero section */
  #hero {
    height: 400px;
    background-position: center;
    background-size: cover;
  }
  
  .hero-text {
    padding: 50px 15px;
    text-align: center;
  }

  h1 {
    font-size: 30px;
    font-weight: bold;
    line-height: 1.3;
  }

  p {
    font-size: 18px;
    font-weight: 500;
    line-height: 1.3;
  }

  /* Services section */
  .service {
    margin: 20px 0;
  }

  .service-title {
    font-size: 20px;
    margin-top: 15px;
  }

  .service-info {
    font-size: 16px;
    margin-top: 10px;
  }

  /* Container */
  .container {
    padding: 0 15px;
  }
  .col-xs-6 {
    width: 50%;
    float: left;
  }

  .portfolio-item {
    margin-bottom: 20px;
  }

  .portfolio-item-title {
    margin-top: 15px;
    margin-bottom: 5px;
    font-size: 16px;
  }
}
  
    @media only screen and (max-width: 768px) {
  .section-services .row {
    display: flex;
    flex-wrap: wrap;
  }

  .section-services .col-xs-4 {
    width: 100%;
    margin-bottom: 20px;
  }

  .section-services .service {
    padding: 20px;
    text-align: center;
    background-color: #fff;
    border: 1px solid #eee;
    border-radius: 5px;
  }

  .section-services .service img {
    width: 40%;
    margin: 0 auto;
    display: block;
  }

  .section-services .service-title {
    font-size: 18px;
    margin-top: 20px;
  }

  .section-services .service-info {
    font-size: 14px;
    margin-top: 10px;
  }
}
</style>
<body>
<?php  

    $utama = mysqli_query($mysqli, "SELECT * FROM utama");  
  ?>
    <?php
    while($arr_utama = mysqli_fetch_array($utama)):
    ?>
    <header id="masthead" class="site-header">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">
                   
                    <a class="site-title"><span><?= $arr_utama['judul']; ?></a>

                </div><!-- /.navbar-header -->

                <div class="collapse navbar-collapse" id="agency-navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="semestergenap.php">Mata Pelajaran</a></li>
                        <li><a href="blog.php">Kegiatan</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>

                </div>

            </div>   
        </nav><!-- /.site-navigation -->
    </header><!-- /#mastheaed -->

    <div style='background-image: url("assets/img/<?= $arr_utama['gambar']; ?>"); height:650px;' id="hero" class="hero overlay" >
        <div class="hero-content">
            <div class="hero-text">
                <h1 style='font-size:45px; font-weight:bold;' ><?= $arr_utama['judul']; ?></h1>
                <p style='font-size:20px; font-weight:500;'><?= $arr_utama['ketjud2']; ?></p>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">
        <section class="site-section section-features">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                            <h2><br><br><?= $arr_utama['jud2']; ?></h2><br>
                            <p style="color:black; text-align: justify;"><?= $arr_utama['ket2']; ?></p>
                    </div>
                        <div class="col-sm-7 hidden-xs">
                            <img src="assets/img/<?= $arr_utama['gambar2']; ?>" alt="">
                        </div>
                    </div>
                </div>
            </section><!-- /.section-features -->
            <section class="site-section section-services gray-bg text-center">
                <div class="container">
                    <h2 class="heading-separator"><?= $arr_utama['sis_inf']; ?></h2>
                    <p class="subheading-text"><?= $arr_utama['ket_sis']; ?></p>
                    <div class="row">
                        <a href="semestergenap.php">
                        <div class="col-xs-4">
                            <div  class="service">
                                <img src="assets/img/book.png" alt="" width="60" height="">
                                <h3 class="service-title">Mata Pelarajan</h3>
                                <p class="service-info"> Link yang berisi beberapa informasi tentang deskripsi mata pelajaran beserta guru yang mengampu </p>
                            </div>
                        </div>
                        </a>
                        <a href="<?= $arr_utama['linkyt']; ?>">
                        <div class="col-xs-4">
                            <div class="service">   
                                <img src="assets/img/youtube-icon.svg" alt="" width="80" height="80">
                                <h3 class="service-title">Youtube</h3>
                                <p class="service-info"> Link youtube SMP Negeri 13 yang berisi kegiatan dalam bentuk video </p>
                            </div><!-- /.service -->
                        </div>
                        </a>
                        <a href="blog.php">
                        <div class="col-xs-4">
                            <div class="service">   
                                <img src="assets/img/activities-icon.jpg" alt="" width="70" height="60">
                                <h3 class="service-title">Kegiatan</h3>
                                <p class="service-info"> Link yang berisi beberapa informasi tentang Kegiatan - kegiatan yang dilakukan di sekolah</p>
                            </div><!-- /.service -->
                        </div>
                        </a>
                    </div>
                    <br>
                    <div class="row">
                        <a href="<?= $arr_utama['linkel']; ?>">
                        <div class="col-xs-4">
                            <div  class="service">
                                <img src="assets/img/library-icon.png" alt="" width="80" height="80">
                                <h3 class="service-title">E - library</h3>
                                <p class="service-info"> Link yang berisi beberapa informasi tentang deskripsi mata pelajaran beserta guru yang mengampu </p>
                            </div>
                        </div>
                        </a>
                        <a href="<?= $arr_utama['linkwb']; ?>">
                        <div class="col-xs-4">
                            <div class="service">   
                                <img src="assets/img/web.png" alt="" width="60" height="60">
                                <h3 class="service-title">Website</h3>
                                <p class="service-info"> Link yang berisi beberapa informasi tentang materi mata pelajaran di semester genap beserta guru yang mengampu </p>
                            </div><!-- /.service -->
                        </div>
                        </a>
                        <a href="<?= $arr_utama['linkad']; ?>">
                        <div class="col-xs-4">
                            <div class="service">   
                                <img src="assets/img/plant-icon.png" alt="" width="60" height="auto">
                                <h3 class="service-title">Adiwiyata</h3>
                                <p class="service-info"> Link yang berisi beberapa informasi tentang materi mata pelajaran di semester genap beserta guru yang mengampu </p>
                            </div><!-- /.service -->
                        </div>
                        </a>
                    </div>
                </div>
        </section><!-- /.section-services -->

        <section class="site-section section-map-feature text-center">
            <div class="container">
                <h2>Profil</h2>
                <p>Berisi beberpa informasi tentang :</p>
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="counter-item">
                            <p class="counter" data-to="<?= $arr_utama['p_kelas']; ?>" data-speed="2000">0</p>
                            <h3>Kelas</h3>
                        </div><!-- /.counter-item -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="counter-item">
                            <p class="counter" data-to="<?= $arr_utama['p_pengajar']; ?>" data-speed="2000">0</p>       
                            <h3>Pengajar</h3>
                        </div> <!-- /.counter-item -->      
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="counter-item">
                            <p class="counter" data-to="<?= $arr_utama['p_prestasi']; ?>" data-speed="1000">0</p>
                            <h3>Prestasi</h3>
                        </div><!-- /.counter-item -->
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="counter-item">
                            <p class="counter" data-to="<?= $arr_utama['p_ekstrakulikuler']; ?>" data-speed="1000">0</p>
                            <h3>Ekstrakulikuler</h3>
                        </div><!-- /.counter-item -->
                    </div>
                </div>
            </div>

        </section><!-- /.section-map-feature -->

        <section class="site-section section-portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="heading-separator"><?= $arr_utama['jud3']; ?></h2>
                    <p class="subheading-text"><?= $arr_utama['ket3']; ?></p>
                </div>
                <?php endwhile?>
                <!-- ====================================/end of utama database ===============================-->
                <?php 
                $arc = mysqli_query($mysqli, "SELECT * FROM article ORDER BY date DESC LIMIT 4"); 
                ?>
                <div class="row">
                    <?php foreach($arc as $a){ ?>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="assets/img/<?php if (empty($a['gambar_arc']) ) { 
                                    echo "portfolio-2.jpg";
                                } else {    
                                echo $a['gambar_arc'];
                                }?>" class="img-res" alt="">
                            <h4 class="portfolio-item-title"><?php echo $a['judul_arc']?></h4>
                            <a href="blog-post.php?id=<?php echo $a['id']?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section><!-- /.section-portfolio -->

    </main><!-- /#main -->

    <?php include('footer.php')?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/jquery.countTo.min.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>
</html>
<style>
    .hero1 { 
    background: url(../img/hero.jpg) no-repeat center / cover; 
    height: 100%;
    width: 100%;
    display: table;
    position: relative;
}
</style>