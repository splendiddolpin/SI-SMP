<?php
session_start();
if (empty($_SESSION['username']) OR empty($_SESSION['pass'])){
    header("location:pages-login.php");
}
else {
?>
<?php include('adminheader.php')?>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="forms-elements.php">
      <i class="bi bi-grid "></i>
      <span>Edit Halaman Utama</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="contact.php">
      <i class="bi bi-grid "></i>
      <span>Contact</span>
    </a>
  </li>

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Mata Pelajaran</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      <li>
        <a href="forms-semestergenap.php" class="active">
          <i class="bi bi-circle"></i><span>Bagian Edit</span>
        </a>
      </li>
      <li>
        <a href="create-mapel.php">
          <i class="bi bi-circle"></i><span>Bagian Create</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Kegiatan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
    <li>
        <a href="forms-edit.php">
          <i class="bi bi-circle"></i><span>Bagian Edit</span>
        </a>
      </li>
      <li>
        <a href="create-article.php">
          <i class="bi bi-circle"></i><span>Bagian Create</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Logout</span>
    </a>
  </li><!-- End Login Page Nav -->

</ul>
  </aside><!-- End Sidebar-->


  <!--SUBMIT SESSION-->
  <?php
        
        $utama_admin = "SELECT * FROM semestergenap";
        $do_utama_admin = $mysqli->query($utama_admin);
        while ($data_utama = $do_utama_admin->fetch_object()) :
        ?>
<?php endwhile;?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Bagian Edit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Mata Pelajaran</li>
          <li class="breadcrumb-item active">Bagian Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



              <?php

              $edit_isi = "SELECT * FROM semestergenap";
              $edit_isi7 = "SELECT * FROM `semestergenap` WHERE `group` = 'Kelas 7';";
              $edit_isi8 = "SELECT * FROM `semestergenap` WHERE `group` = 'Kelas 8';";
              $edit_isi9 = "SELECT * FROM `semestergenap` WHERE `group` = 'Kelas 9';";
              $isi_edit7 = $mysqli->query($edit_isi7);
              $isi_edit8 = $mysqli->query($edit_isi8);
              $isi_edit9 = $mysqli->query($edit_isi9);
              $isi_edit = $mysqli->query($edit_isi);

              ?>
              <!-- General Form Elements -->
              <span style="color: blue;">Bagian Edit pada Mata Pelajaran Semester Genap</span><br><br>  
              <span style="color: blue;">List Kelas :</span><br><br>
              <ul class="portfolio-sorting list-inline text-center">
                <a  href="forms-semestergenap.php" class="btn btn-primary" data-group="Kelas 7">Semua</a>&emsp;
                <a  href="forms-kelas7.php" class="btn btn-primary">Kelas 7</a>&emsp;
                <a  href="forms-kelas8.php" class="btn btn-primary">Kelas 8</a>&emsp;
                <a  href="forms-kelas9.php" class="btn btn-primary">Kelas 9</a>
              </ul> 
              <br><br>
              <section class="section">
              <div class="row align-items-top">
                <?php foreach($isi_edit7 as $a){ ?>
                <div class="col-lg-4" data-groups='["<?php echo $a['group']?>"]'>
                  <div class="card">
                  <div class="card-body">
                    <h5 style ="text-transform: capitalize;" class="text-transform: capitalize; card-title"><?php echo $a['mapel']?></h5>
                    <p style="color: black;" >Nama Pengampu : <span style="text-transform: capitalize; color: black;"><?php echo $a['namaguru']?></span></p>
                    <p style="color: black;" >Kelas : <span style="text-transform: capitalize; color: black;"><?php echo $a['group']?></span></p>
                    <div class="card-text">
                        <a href="forms-edits.php?id=<?php echo $a['id']?>" class="btn btn-primary mr-2">Edit</a>
                        <form method="POST" class="d-inline">
                            <input type="text" hidden name="id" value="<?php echo $a['id']?>">
                            <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" name="deleted">Delete</button>
                        </form>
                    </div>
                  </div>
                  </div>
                </div>
                <?php } ?>
                
                
                </div>
              </section>
                <!--<span style="color: blue;">Template</span><br><br>
                <div class="row mb-3">
                  <label for="inputColor" class="col-sm-2 col-form-label">Color Picker</label>
                  <div class="col-sm-10">
                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#4154f1" title="Choose your color">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px"></textarea>
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        First radio
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                      <label class="form-check-label" for="gridRadios2">
                        Second radio
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios" value="option" disabled>
                      <label class="form-check-label" for="gridRadios3">
                        Third disabled radio
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Checkboxes</legend>
                  <div class="col-sm-10">

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        Example checkbox
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                      <label class="form-check-label" for="gridCheck2">
                        Example checkbox 2
                      </label>
                    </div>

                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Disabled</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="Read only / Disabled" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Multi Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" multiple aria-label="multiple select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
-->
<!-- End General Form Elements -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('adminfooter.php')?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap-select.min.js"></script>
  <script src="assets/js/jquery.slicknav.min.js"></script>
  <script src="assets/js/jquery.countTo.min.js"></script>
  <script src="assets/js/jquery.shuffle.min.js"></script>

</body>

</html>
<?php } ?>