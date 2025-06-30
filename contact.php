<?php include('header.php')?>
<body>

    <header id="masthead" class="site-header site-header-white">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">
                   
                    <a href="index.html" class="site-title"><span>SMP</span>Negeri 13 Magelang</a>

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

    <div id="hero" class="hero overlay subpage-hero contact-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Contact</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

        <section class="site-section subpage-site-section section-contact-us">

            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                    <body>
                        <h2>Google Map</h2>
                        <a href="https://www.google.com/maps/place/SMP+Negeri+13+Magelang/@-7.4577975,110.2196117,17z/data=!4m7!3m6!1s0x2e7a85e8ea77396d:0x9b4a86ee24e254e2!4b1!8m2!3d-7.4577975!4d110.2218004!16s%2Fg%2F1hm2_jnm8" target="_blank"><img src="assets/img/gugelmap.png" width="600" height="450" style="border:0;" alt="Google Maps"></a>
                    </body>
                    </div>
                    <div class="col-sm-5">
                        <div class="contact-info">
                            <h2>Contact information</h2>
                            <?php $edit_contact = "SELECT * FROM contact WHERE id = 1 ";
                                $contact_edit = $mysqli->query($edit_contact);
                                while ($du = $contact_edit->fetch_object()) : ?>
                            <div class="row">
                                <br><br><br>
                                <div class="col-sm-12">
                                    <h3>Address</h3>
                                    <ul class="list-unstyled">
                                        <li><?= $du->alamat ?></li>
                                    </ul>
                                    <h3>E-mail</h3>
                                    <a href="mailto:pixelperfectmk@gmail.com" target="_blank"><?= $du->email ?></a>
                                    <h3>Phone</h3>
                                    <a href="tel:<?= $du->wa ?>" target="_blank"><?= $du->wa ?></a>
                                    <h3>Telepon</h3>
                                    <a href="tel:<?= $du->nomrum ?>" target="_blank"><?= $du->nomrum ?></a>
                                </div>
                            <?php endwhile; ?>
                            </div>
                        </div><!-- /.contact-info -->
                    </div>
                </div>
            </div>
            
        </section><!-- /.section-contact-us -->

    </main><!-- /#main -->
<?php include('footer.php') ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/jquery.countTo.min.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
    <script src="assets/js/script.js"></script>
  
</body>
</html>