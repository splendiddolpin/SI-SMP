<?php include('header.php')?>
<?php include('logic.php')?>
<style>
     .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 50px;
  }
    @media screen and (max-width: 767px) {
         /* selector untuk elemen yang ingin diubah ukuran teksnya */
  body {
    font-size: 14px;
  }
  /* selector lainnya */
  .containerr {
    font-size: 12px;
    position: relative;
    display: block;
    margin: 0 auto;
    max-width: 100%;
    height: 150px;
    overflow: hidden;
  }
  
  .containerr img {
    width: 100%;
    height: auto;
    margin: 0 auto;
  }
  
  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 24px;
  }
  
  .col-md-4 {
    height: auto;
  }
  
  .col-md-8 {
    margin-top: 30px;
    margin-bottom: 30px;
  }
  
  .project-description {
    font-size: 14px;
    text-align: justify;
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
    <header id="masthead" class="site-header site-header-white">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">
                   
                    <a href="index.html" class="site-title"><span><?= $arr_utama['judul']; ?></a>

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
    <?php endwhile?>
    <div id="hero" class="hero overlay subpage-hero portfolio-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Mata Pelajaran</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Semester Genap</li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">
        <section class="site-section subpage-site-section section-project">
        <div class="containerr">
        <?php foreach($query as $i){ ?>
          <h1><?php echo $i['mapel']?></h1>
          </div>
        <!-- 
                        <div style="font-size: auto px;" class="centered"><br><br></div>
          -->
        <br><br>
        <div class="container">    
                <div class="row">
                    <div style="border-style: double;" class="row">
                        <div style="height: 350px;" class="col-md-4 ">
                            <img src="assets/img/<?php 
                            if (empty($i['guru']) ) { 
                                echo "randompeople.jpg";
                            } else {
                            echo $i['guru'];
                            }?>" 
                            class="img-res" alt="">
                        </div>
                        <div class="col-md-8">
                            <br><br><h3 style="font-weight: bold;">Profil Pengampu</h3>
                            <br>
                            <p style="font-size: 16px;  font-weight: 400; color: black;">&emsp;&emsp;<span style="font-weight: 500; color:green;">Mengampu :</span > &nbsp;<?php echo $i['mapel']?></p>
                            <p style="font-size: 16px; font-weight: 400; color: black;">&emsp;&emsp;<span style="font-weight: 500; color:green;">Pengampu Mapel :</span> &nbsp;<?php echo $i['namaguru']?></p>
                            <p style="font-size: 16px; font-weight: 400; color: black;"><span style="font-weight: 500; color:green;">&emsp;&emsp;Tingkat :</span>&nbsp;<?php echo $i['group']?></p>
                        </div>
                    </div>
                    
                </div>
                <br><br>    
                    <p style="font-size: 16px; font-weight: bold; color:black;">Deskripsi Mata Pelajaran</p>
                    <?php
                                        $paragraphs = explode("\n", $i['dess']); // Memisahkan paragraf berdasarkan baris baru

                                        foreach ($paragraphs as $paragraph) {
                                            echo "<p style=' text-align:justify; color: black; font-size: 16px; text-indent: 2em; font-weight: 500; '>$paragraph</p>";
                                        }
                                        ?>
                    
                <?php } ?>
            </div>
            
        </section><!-- /.section-project -->
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