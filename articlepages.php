<?php include('header.php')?>
<?php include('logic2.php')?>
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
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Semester Genap</li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">
        <section class="site-section subpage-site-section section-project">
        <?php foreach($query as $i){ ?>
        <div class="containerr">
                        <img style="width:100%; height:150px;"src="assets/img/chalkboard.png" alt="">
                        <div style="font-size: 50px;" class="centered"><?php echo $i['mapel']?></div>
        </div> 
        <br><br>
        <div class="container">    
                <div class="row">
                    <div style="border-style: double;" class="row">
                        <div style="height: 350px;" class="col-md-4 ">
                            <img src="assets/img/<?php 
                            if ( empty($i['guru']) ) { 
                                echo "randompeople.jpg";
                            } else {
                            echo $i['gambar'];
                            }?>" 
                            class="img-res" alt="">
                        </div>
                        <div class="col-md-8">
                            <br><br><h3 ><?php echo $i['namaguru']?></h3>
                            <br>
                            <p style="font-size: 16px; font-weight: 250; color:black;">&emsp;&emsp;<span style="color:green;">Mengampu :</span> &nbsp;<?php echo $i['mapel']?></p>
                            <p style="font-size: 16px; font-weight: 250; color:black;">&emsp;&emsp;<span style="color:green;">Pengampu Mapel :</span> &nbsp;<?php echo $i['mapel']?></p>
                            <p style="font-size: 16px; font-weight: 250; color:black;"><span style="color:green;">&emsp;&emsp;Tingkat :</span>&nbsp;<?php echo $i['group']?></p>
                        </div>
                    </div>
                                
                        
                </div>
                <br><br>    
                    <p style="font-size: 16px; font-weight: bold; color:black;">Deskripsi Mata Pelajaran</p>
                    <p style="color:black; text-align: justify;"class="project-description">&emsp;<?php echo $i['dess']?></p>
                    
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