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
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
            <a href="forms-edit.php">
              <i class="bi bi-circle"></i><span>Bagian Edit</span>
            </a>
          </li>
          <li>
            <a href="create-article.php" class="active">
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
  if (isset($_POST['create'])) {
    $id = $_REQUEST['id'];
    $judul_arc = $_POST['judul_arc'];
    $content_arc = $_POST['content_arc'];
    $date = $_POST['date'];
    
    if ($judul_arc == '' || $content_arc == '') {
      echo '<script>alert("Ada field yang belum diisi!");</script>';
    }
    else {
      if (empty($date)) {
        $date = date('Y-m-d H:i:s');
      }
      $create = "INSERT INTO `article` ( `id`, `judul_arc`, `content_arc`, `date`, `gambar_arc`, `gambar1`, `gambar2`) VALUES ('','$judul_arc','$content_arc','$date', '', '', '')";
      mysqli_query($mysqli, $create);

      $direktori = "../assets/img/";
      $file_foto = $_FILES['gambar_arc']['name'];
      $files = $_FILES['gambar_arc']['tmp_name'];
      if(move_uploaded_file($files, $direktori.$file_foto)){
        mysqli_query($mysqli, "UPDATE `article` SET `gambar_arc`='$file_foto' WHERE `judul_arc`='$judul_arc'");
      }
      $file_foto2 = $_FILES['gambar1']['name'];
      $files2 = $_FILES['gambar1']['tmp_name'];
      if(move_uploaded_file($files2, $direktori.$file_foto2)){
        mysqli_query($mysqli, "UPDATE `article` SET `gambar1`='$file_foto2' WHERE `judul_arc`='$judul_arc'");
      }
      $file_foto3 = $_FILES['gambar2']['name'];
      $files3 = $_FILES['gambar2']['tmp_name'];
      if(move_uploaded_file($files3, $direktori.$file_foto3)){
        mysqli_query($mysqli, "UPDATE `article` SET `gambar2`='$file_foto3' WHERE `judul_arc`='$judul_arc'");
      }

      header("location:forms-edit.php?info=created");
      exit();
    }
  }   ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Create Kegiatan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Kegiatan</li>
          <li class="breadcrumb-item active">Bagian Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

 

    <section class="section">
        <div class="col">

          <div  class="card" >
            <div class="card-body">
              <h5 class="card-title">Create Section</h5>
              <!-- General Form Elements -->
              <form method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Judul Kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul_arc" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="content_arc" style="height: 100px"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" name="date" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Foto Cover</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="gambar_arc" type="file" id="formFile">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Foto Tambahan 1</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="gambar1" type="file" id="formFile">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Foto Tambahan 2</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="gambar2" type="file" id="formFile">
                  </div>
                </div>
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
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" name="create" id="create" class="btn btn-primary">+ Create</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>  
    </section>

  </main><!-- End #main -->

</body>
<!-- // sesi upload foto background / gambar
      $direktori = "./assets/img/";
      $file_foto_bg = $_FILES['gambar']['name'];
      if(move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori.$file_foto_bg)) {

      mysqli_query($mysqli, "UPDATE utama SET gambar = '$file_foto_bg' WHERE id = 1");
      }
    
      // sesi upload foto background / gambar 2
      $file_foto_bg2 = $_FILES['gambar2']['name'];
      if(move_uploaded_file($_FILES['gambar2']['tmp_name'], $direktori.$file_foto_bg2 )) {
      mysqli_query($mysqli, "UPDATE utama SET gambar2 = '$file_foto_bg2' WHERE id = 1");
      } -->
</html>

<?php include('adminfooter.php')?>
<?php } ?>