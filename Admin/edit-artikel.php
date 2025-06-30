<?php
session_start();
if (empty($_SESSION['username']) OR empty($_SESSION['pass'])){
    header("location:pages-login.php");
}
else {
?>
<?php include('adminheader.php')?>
<?php include('logic.php')?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
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
  </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Mata Pelajaran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-semestergenap.php">
              <i class="bi bi-circle"></i><span>Bagian Edit</span>
            </a>
          </li>
          <li>
            <a href="create-article.php">
              <i class="bi bi-circle"></i><span>Bagian Create</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Kegiatan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
            <a href="forms-edit.php" class="active">
              <i class="bi bi-circle"></i><span>Bagian Edit</span>
            </a>
          </li>
          <li>
            <a href="create-article.php" >
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
  <!-- if (isset($_POST['submit'])) {
    
    
    $judul= $_POST['judul'];
    $ketjud2 = $_POST['ketjud2'];
    $jud2 = $_POST['jud2'];
    $ket2 = $_POST['ket2'];
    $sis_inf = $_POST['sis_inf'];
    $ket_sis = $_POST['ket_sis'];
    $p_kelas = $_POST['p_kelas'];
    $p_pengajar = $_POST['p_pengajar'];
    $p_prestasi = $_POST['p_prestasi'];
    $p_ekstrakulikuler = $_POST['p_ekstrakulikuler'];

    
    if ($judul == '' || $jud2 == '' || $ket2 == '' || $sis_inf == '' || $ket_sis == '' || $p_kelas == '' || $p_pengajar == '' || $p_prestasi == '' || $p_ekstrakulikuler == '' ) {
      echo '<script>alert("Ada field yang belum diisi!");</script>';
    }
    else {
      $update = "UPDATE utama SET judul = '$judul', ketjud2 = '$ketjud2', jud2 = '$jud2', ket2 = '$ket2', sis_inf = '$sis_inf', ket_sis = '$ket_sis', p_kelas = '$p_kelas', p_pengajar = '$p_pengajar', p_prestasi = '$p_prestasi', p_ekstrakulikuler = '$p_ekstrakulikuler' WHERE id = 1";

      mysqli_query($mysqli, $update);

    }
  } -->


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Kegiatan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Edit</li>
          <li class="breadcrumb-item active">Kegiatan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <style>
      .wrapper {
        max-width: 400px;
      }
      .demo {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;


    }
    </style>
    <section class="section">
    <div class="row align-items-top">
              <!-- General Form Elements -->
              <div class="card">
              <form method="POST" enctype="multipart/form-data">
                
              <?php foreach($queryarc as $a){ ?>
                <div style="padding-top:15px;" class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Judul Kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul_arc" class="form-control" value="<?php echo $a['judul_arc']?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="content_arc" style="height: 100px"><?php echo $a['content_arc']?></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($a['date'])) ?>">
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Gambar Cover</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="gambar_arc">
                    <?php if (!empty($a['gambar_arc'])): ?>
                    <input  type="checkbox" name="delete_gambar_arc" value="1">
                    <span style="color: red;">Delete Image</span>
                    <?php endif; ?> 
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Edit Gambar 1</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="gambar1">
                    <?php if (!empty($a['gambar1'])): ?>
                    <input type="checkbox" name="delete_gambar1" value="1">
                    <span style="color: red;">Delete Image</span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Edit Gambar 2</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="gambar2">
                    <?php if (!empty($a['gambar2'])): ?>
                    <input style="color: red;" type="checkbox" name="delete_gambar2" value="1">
                    <span style="color: red;">Delete Image</span>
                    <?php endif; ?>
                  </div>
                </div>
                            <?php } ?>         
                            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Submit Button</label>
                <div class="col-sm-10">
                  <button type="article" name="article" id="article" class="btn btn-primary">Submit Form</button>
                </div>
              </div>

              </form>
              </div><!-- End General Form Elements -->
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


  </main><!-- End #main -->

  <?php include('adminfooter.php')?>

</body>
<!-- // sesi upload foto background / gambar
      $direktori = "assets/img/";
      $file_foto_bg = $_FILES['gambar']['name'];
      $file_foto_bg2 = $_FILES['gambar2']['name'];
      if(move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori.$file_foto_bg)) {

      mysqli_query($mysqli, "UPDATE utama SET gambar = '$file_foto_bg' WHERE id = 1");
      }
    
      // sesi upload foto background / gambar 2
      if(move_uploaded_file($_FILES['gambar2']['tmp_name'], $direktori.$file_foto_bg2 )) {
      mysqli_query($mysqli, "UPDATE utama SET gambar2 = '$file_foto_bg2' WHERE id = 1");
      }; -->
</html>
<?php } ?>