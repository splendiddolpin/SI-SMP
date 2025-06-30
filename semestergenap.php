<?php include('header.php')?>
<style>
#info {
  font-size: 16px;
  color: red;
  text-align: center;
}
@media (max-width: 768px) {
  #info {
    font-size: 16px;
    color: red;
    text-align: center;
  }
}
.navbar-nav {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.navbar-nav li {
  margin-left: 30px;
}

@media (max-width: 767px) {
  .navbar-nav {
    display: block;
    text-align: center;
  }

  .navbar-nav li {
    display: inline-block;
    margin: 10px 0;
  }
}
    @media (max-width: 768px) {
       
    .section-portfolio {
        padding: 50px 0;
    }

    .portfolio-sorting {
        margin-bottom: 30px;
    }

    .portfolio-sorting li {
        margin: 0 5px;
    }

    .portfolio-item {
        margin-bottom: 20px;
    }

    .portfolio-item-title {
        margin-top: 10px;
        font-size: 16px;
    }

    .portfolio-item-title small {
        font-size: 12px;
    }
}
</style>
<body>

    <header id="masthead" class="site-header site-header-white">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">
                   
                    <a href="index.php" class="site-title"><span>SMP Negeri 13 Magelang</span></a>

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

    <div id="hero" class="hero overlay subpage-hero portfolio-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Mata Pelajaran</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a>Mata Pelajaran</a></li>

                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">
    <?php  

$sql = mysqli_query($mysqli, "SELECT * FROM semestergenap");  
?>

        <section class="site-section subpage-site-section section-portfolio">
            <div class="container"> 
            <div id="info"></div>
            <input type="text" class="form-control" id="search" placeholder="Search">
            <br> <br>
            <div id='result'>
                <ul class="portfolio-sorting list-inline text-center">
                    <li><a href="#" class="btn btn-gray active" data-group="all">Semua</a></li>
                    <li><a href="#" class="btn btn-gray" data-group="Kelas 7">Kelas VII</a></li>
                    <li><a href="#" class="btn btn-gray" data-group="Kelas 8">Kelas VIII</a></li>
                    <li><a href="#" class="btn btn-gray" data-group="Kelas 9">Kelas IX</a></li>
                </ul><!-- /.portfolio-sorting  -->
                    <div id="grid" class="row">
                    <?php while($row = mysqli_fetch_array($sql)){ ?>
                    <div class="col-lg-3 col-md-4 col-xs-6"data-groups='["<?php echo $row['group']?>"]'>
                    <div class="portfolio-item">
                    <img src="assets/img/<?php if (empty($row['gambar']) ) { 
                                    echo "portfolio-2.jpg";
                                } else {    
                                echo $row['gambar'];
                                }?>" class="img-res" alt="">
                    <h4 style="font-size:18px;" class="portfolio-item-title"><?php echo $row['mapel']?></h4>
                    <h4 style="font-size:14px; color: green;"class="portfolio-item-title"><br><br><br><br><?php echo $row['group']?></h4>
                    <a href="portfolio-item.php?id=<?php echo $row['id']?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    </div><?php } ?>
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
        $('#search').on('keyup', function () {
        var search = $(this).val();

        $.ajax({
            url: 'search1.php',
            type: 'POST',
            data: {search: search},
            success: function(response) {
                $('#result').html(response);
            }
        });
    });
});
   </script>
   <script>
const infoElement = document.getElementById('info');

if (window.innerWidth <= 768) {
  infoElement.innerHTML = 'Tekan gambar untuk melihat informasi <br><br>';
} 
   </script>
    
</body>
</html>