<?php include('header.php')?>
<?php include('logic2.php')?>
<style>
  .paragraph {
    text-align: justify;
    color: black;
    font-size: 16px;
    line-height: 1.5; /* Sesuaikan jarak antar baris di sini */
  }
</style>
<body>

    <header id="masthead" class="site-header site-header-white">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">
                   
                    <a href="index.php" class="site-title"><span>SMP Negeri 13 Magelang</a>

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

    <div id="hero" class="hero overlay subpage-hero blog-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Content</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="blog.php">Kegiatan</a></li>
                  <li class="breadcrumb-item active">Content</li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

        <section class="site-section subpage-site-section section-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    <?php foreach($query as $i){ ?>
                        <article class="blog-post">
                            <img src="assets/img/<?php if (empty($i['gambar_arc']) ) { 
                                    echo "portfolio-2.jpg";
                                } else {    
                                echo $i['gambar_arc'];
                                }?>" class="img-res" alt=""><br>
                                    <?php if (!empty($i['gambar1'])) { 
                                        foreach($query as $i){ ?>
                                    <img src="assets/img/<?php echo $i['gambar1']?>" class="img-res" alt=""><br>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php if (!empty($i['gambar2'])) { 
                                        foreach($query as $i){ ?>
                                    <img src="assets/img/<?php echo $i['gambar2']?>" class="img-res" alt=""><br>
                                    <?php } ?>
                                    <?php } ?>
                            <div class="post-content">
                                <h2 class="post-title"><?php echo $i['judul_arc']?></h2>
                                <?php
                                        $paragraphs = explode("\n", $i['content_arc']); // Memisahkan paragraf berdasarkan baris baru

                                        foreach ($paragraphs as $paragraph) {
                                            echo "<p style=' text-align:justify; color: black; font-size: 16px; text-indent: 2em; font-weight: 500; '>$paragraph</p>";
                                        }
                                        ?>
                                <div class="post-meta">
                                    <span class="post-date">
                                        <a href=""><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d/m/Y', strtotime($i['date'])) ?></a>
                                        </span>
                                </div><!-- /.post-meta -->
                            </div><!-- /.post-content -->
                        </article><!-- /.blog-post -->
                        <?php } ?>
                    </div>
                    <aside class="col-md-4">
                    <div class="sidebar">
                            <div class="widget search-form">
                                <h4 class="widget-title">Search the blog</h4>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" placeholder="Search">
                                </div>
                                <div id="result"></div>
                            <br><br>
                            <div class="widget widget-recent-posts">
                                <h4 class="widget-title">Kegiatan Terbaru</h4>
                                <ul class="list-unstyled">
                                <?php $arcc = mysqli_query($mysqli, "SELECT * FROM article ORDER BY id DESC LIMIT 8"); ?>
                                <?php foreach($arcc as $a){ ?>
                                    <li><a href="blog-post.php?id=<?php echo $a['id']?>"><?php echo $a['judul_arc']?></a></li>
                                    <?php } ?>
                                </ul>
                            </div><!-- /.widget-recent-posts -->
                            </div><!-- /.widget-tags -->
                        </div><!-- /.sidebar -->
                    </aside>
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
    <script>
        $(document).ready(function() {
    $('#search').keyup(function() {
        var search = $(this).val();

        if (search != '') { // pengecekan apakah input search tidak kosong
        $.ajax({
            url: 'search.php',
            type: 'POST',
            data: {search: search},
            success: function(response) {
                $('#result').html(response);
            }
        });
    } else { // jika input search kosong, hapus hasil pencarian
            $('#result').empty();
        }
    });
});
    </script>
  
</body>
</html>