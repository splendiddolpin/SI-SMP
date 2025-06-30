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
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="forms-elements.php">
      <i class="bi bi-grid "></i>
      <span>Edit Halaman Utama</span>
    </a>
  </li>
  <!-- End Dashboard Nav -->
  <ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
    <a class="nav-link" href="index.php">
      <i class="bi bi-grid"></i>
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
  if (isset($_POST['submit'])) {
    
    
    $nomrum= $_POST['nomrum'];
    $wa = $_POST['wa'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    // sesi upload foto
    

    
    if ($nomrum == '' || $wa == '' || $alamat == '' || $email == '' ) {
      echo '<script>alert("Ada field yang belum diisi!");</script>';
    }
    else {
      $update = "UPDATE `contact` SET `nomrum` = '$nomrum', `wa` = '$wa', `alamat` = '$alamat', `email` = '$email' WHERE `id` = '1'";
      mysqli_query($mysqli, $update);
      header("location:contact.php?info=updated");
      exit();
    }
  }

  ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Contact</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">contact</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
                  if(isset($_GET['info'])){
                    if ($_GET['info']=="updated") {
                      echo "<div class='alert alert-success' style='text-align:center;' role='alert'>Pembaruan Kontak Berhasil !</div>";
                    }              
                  }
           ?>
    <section class="section">
        <div class="col">

          <div  class="card" >
            <div class="card-body">
              <h5 class="card-title">Informasi Kontak</h5>
              <?php

              $edit_contact = "SELECT * FROM contact WHERE id = 1 ";

              $contact_edit = $mysqli->query($edit_contact);

              while ($du = $contact_edit->fetch_object()) :

              ?>
              <!-- General Form Elements -->
              <form method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" name="nomrum" class="form-control" value="<?= $du->nomrum ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">WA</label>
                  <div class="col-sm-10">
                    <input type="text" name="wa" class="form-control"value="<?= $du->wa ?>">
                  </div>
                  </div>
                  <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control"value="<?= $du->alamat ?>">
                  </div>
                  </div>
                  <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control"value="<?= $du->email ?>">
                  </div>
                  </div>
              
                <?php endwhile; ?>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit Form</button>
                  </div>
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