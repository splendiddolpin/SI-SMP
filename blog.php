<?php include('header.php') ?>
<?php include('logic2.php') ?>
<style>
    .wrapper {
        max-width: auto;
      }
      .demo {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
    }
    .pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    }

    .pagination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .pagination a,
    .pagination span {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        text-decoration: none;
        background-color: #fff;
        color: #333;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .pagination a:hover {
        background-color: #eee;
    }

    .pagination span.current-page {
        background-color: #6fc754;
        color: #fff;
        border-color: #6fc754;
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
                <h1>Kegiatan</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Kegiatan</li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

        <section class="site-section subpage-site-section section-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    <?php
                        // Jumlah artikel per halaman
                        $per_page = 3;

                        // Mengambil data artikel dari database
                        $articles = mysqli_query($mysqli, "SELECT * FROM article ORDER BY date DESC");

                        // Menghitung jumlah total artikel
                        $total_articles = mysqli_num_rows($articles);

                        // Menghitung jumlah total halaman
                        $total_pages = ceil($total_articles / $per_page);

                        // Mengambil parameter halaman dari URL
                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                        // Menghitung artikel pertama yang akan ditampilkan
                        $offset = ($current_page - 1) * $per_page;

                        // Mengambil artikel dengan pembatasan jumlah artikel per halaman
                        $articles = mysqli_query($mysqli, "SELECT * FROM article ORDER BY date DESC LIMIT $offset, $per_page");

                        // Menampilkan artikel
                        while ($i = mysqli_fetch_assoc($articles)) { ?>
                            <article class="blog-post">
                            <a href="blog-post.php?id=<?php echo $i['id']?>">
                                <img src="assets/img/<?php if (empty($i['gambar_arc'])) {
                                    echo "portfolio-2.jpg";
                                } else {
                                    echo $i['gambar_arc'];
                                } ?>" class="img-res" alt="">
                            </a>
                            <div class="post-content">
                                <h3 class="post-title"><a href="blog-post.php?id=<?php echo $i['id']?>"><?php echo $i['judul_arc']?></a></h3>
                                <div class="wrapper">
                                    <p class="demo"><?php echo $i['content_arc']?></p>
                                </div>
                                <div class="text-right">
                                    <a class="read-more" href="blog-post.php?id=<?php echo $i['id']?>">Read more</a>
                                </div>
                                <div class="post-meta">
                                    <span class="post-date">
                                        <a href="blog-post.php?id=<?php echo $i['id']?>"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d/m/Y', strtotime($i['date'])) ?></a>
                                    </span>
                                </div><!-- /.post-meta -->
                            </div><!-- /.post-content -->
                        </article>
                           <?php } ?><!-- /.blog-post -->
                        <!-- Menampilkan tombol "next page" beserta angka halaman -->
                        <div class="pagination-container">
                            <div class="pagination">
                                <?php if ($current_page > 1) { ?>
                                    <a href="?page=<?php echo $current_page - 1 ?>">« Prev</a>
                                <?php } ?>
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <?php if ($i == $current_page) { ?>
                                        <span class="current-page"><?php echo $i ?></span>
                                    <?php } else { ?>
                                        <a href="?page=<?php echo $i ?>"><?php echo $i ?></a> 
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($current_page < $total_pages) { ?>
                                    <a href="?page=<?php echo $current_page + 1 ?>">Next »</a>
                                <?php } ?>
                            </div><!-- /.pagination -->
                        </div><!-- /.pagination-container -->
                        </div>
                    <aside class="col-md-4">
                        <div class="sidebar">
                            <div class="widget search-form">
                                <h4 class="widget-title">Search Kegiatan</h4> 
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" placeholder="Search">
                                </div>
                                <div id="result"></div>
                            <br><br>
                            <div class="widget widget-recent-posts">
                                <h4 class="widget-title">Kegiatan Terbaru</h4>
                                <ul class="list-unstyled">
                                <?php $arcc = mysqli_query($mysqli, "SELECT * FROM article ORDER BY date DESC LIMIT 8"); ?>
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