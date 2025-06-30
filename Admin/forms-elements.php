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
    <a class="nav-link" href="forms-elements.php">
      <i class="bi bi-grid"></i>
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
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="forms-semestergenap.php">
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
  </li>
  <!-- End Forms Nav -->

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
  if (isset($_POST['submit'])) {
    
    
    $judul= $_POST['judul'];
    $ketjud2 = $_POST['ketjud2'];
    $jud2 = $_POST['jud2'];
    $ket2 = $_POST['ket2'];
    $sis_inf = $_POST['sis_inf'];
    $ket_sis = $_POST['ket_sis'];
    $linkyt = $_POST['linkyt'];
    $linkwb = $_POST['linkwb'];
    $linkel = $_POST['linkel'];
    $linkad = $_POST['linkad'];
    $p_kelas = $_POST['p_kelas'];
    $p_pengajar = $_POST['p_pengajar'];
    $p_prestasi = $_POST['p_prestasi'];
    $p_ekstrakulikuler = $_POST['p_ekstrakulikuler'];
    
    
    // sesi upload foto
    

    
    if ($judul == '' || $jud2 == '' || $ket2 == '' || $sis_inf == '' || $ket_sis == '' || $p_kelas == '' || $p_pengajar == '' || $p_prestasi == '' || $p_ekstrakulikuler == '' ) {
      echo '<script>alert("Ada field yang belum diisi!");</script>';
    }
    else {
      $update = "UPDATE `utama` SET `judul` = '$judul', `ketjud2` = '$ketjud2', `jud2` = '$jud2', `ket2` = '$ket2', `sis_inf` = '$sis_inf', `linkyt` = '$linkyt', `linkwb` = '$linkwb' ,`linkel` = '$linkel', `linkad` = '$linkad', `ket_sis` = '$ket_sis', `p_kelas` = '$p_kelas', `p_pengajar` = '$p_pengajar', `p_prestasi` = '$p_prestasi', `p_ekstrakulikuler` = '$p_ekstrakulikuler' WHERE `id` = '1'";

      mysqli_query($mysqli, $update);
      
      $direktori = "../assets/img/";
      $file_foto = $_FILES['gambar']['name'];
      $files = $_FILES['gambar']['tmp_name'];
      if(move_uploaded_file($files, $direktori.$file_foto)){
        mysqli_query($mysqli, "UPDATE `utama` SET `gambar` = '$file_foto' WHERE `id` = '1'");
      }
      $direktori = "../assets/img/";
      $file_foto2 = $_FILES['gambar2']['name'];
      $files2 = $_FILES['gambar2']['tmp_name'];
      if(move_uploaded_file($files2, $direktori.$file_foto2)){
        mysqli_query($mysqli, "UPDATE `utama` SET `gambar2` = '$file_foto2' WHERE `id` = '1'");
      }
      header("location:forms-elements.php?info=updated");
      exit();

    }
  }

  ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Halaman Utama</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Edit Halaman Utama</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
                  if(isset($_GET['info'])){
                    if ($_GET['info']=="updated") {
                      echo "<div class='alert alert-success' style='text-align:center;' role='alert'>Pembaruan Halaman Utama Berhasil !</div>";
                    }              
                  }
           ?>
    <section class="section">
        <div class="col">

          <div  class="card" >
            <div class="card-body">
              <h5 class="card-title">Halaman Utama</h5>
              <?php
              $edit_utama = "SELECT * FROM utama WHERE id = 1 ";
              $utama_edit = $mysqli->query($edit_utama);
              while ($data_utama = $utama_edit->fetch_object()) :
              ?>
              <!-- General Form Elements -->
              <form method="POST" enctype="multipart/form-data">
              <span style="color: blue;">Bagian Halaman Utama Web</span>
                <br><br>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Nama Sekolah</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul" class="form-control" value="<?= $data_utama->judul ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Moto Sekolah</label>
                  <div class="col-sm-10">
                    <input type="text" name="ketjud2" class="form-control"value="<?= $data_utama->ketjud2 ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Foto Background</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="gambar">
                  </div>
                </div>
                <span style="color: blue;">Bagian Art Spenagalas</span>
                <br><br>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Spenagalas</label>
                  <div class="col-sm-10">
                    <input type="text"  name="jud2" class="form-control" value="<?= $data_utama->jud2 ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Keterangan Art</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="ket2" style="height: 100px"><?= $data_utama->ket2 ?></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Foto Logo</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="gambar2">
                  </div>
                </div>
                <span style="color: blue;">Bagian Sistem Informasi</span><br><br>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" name="sis_inf" class="form-control" value="<?= $data_utama->sis_inf ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="ket_sis" class="form-control" value="<?= $data_utama->ket_sis ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Link Youtube</label>
                  <div class="col-sm-10">
                    <input type="text" name="linkyt" class="form-control" value="<?= $data_utama->linkyt ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Link Website</label>
                  <div class="col-sm-10">
                    <input type="text" name="linkwb" class="form-control" value="<?= $data_utama->linkwb ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Link E-library</label>
                  <div class="col-sm-10">
                    <input type="text" name="linkel" class="form-control" value="<?= $data_utama->linkel ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Link Adiwiyata</label>
                  <div class="col-sm-10">
                    <input type="text" name="linkad" class="form-control" value="<?= $data_utama->linkad ?>">
                  </div>
                </div>
                <span style="color: blue;">Bagian Profil</span><br><br>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <input type="Number" name='p_kelas' class="form-control" value="<?= $data_utama->p_kelas ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Pengajar</label>
                  <div class="col-sm-10">
                    <input type="Number" name='p_pengajar' class="form-control" value="<?= $data_utama->p_pengajar ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Prestasi</label>
                  <div class="col-sm-10">
                    <input type="Number" name='p_prestasi' class="form-control" value="<?= $data_utama->p_prestasi ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Ekstrakulikuler</label>
                  <div class="col-sm-10">
                    <input type="Number" name='p_ekstrakulikuler' class="form-control" value="<?= $data_utama->p_ekstrakulikuler ?>">
                  </div>
                </div>

                <?php endwhile; ?>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>  
    </section>

  </main><!-- End #main -->
  <?php include('adminfooter.php')?>
</body>
</html>

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
<?php } ?>