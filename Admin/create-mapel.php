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
            <a href="forms-semestergenap.php">
              <i class="bi bi-circle"></i><span>Bagian Edit</span>
            </a>
          </li>
          <li>
            <a href="create-mapel.php" class="active">
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
  if (isset($_POST['create'])) {
    $mapel = $_POST['mapel'];
    $dess = $_POST['dess'];
    $namaguru = $_POST['namaguru'];
    $kelas = $_POST['group'];
    $semester = $_POST['semester'];
    
    // check if required fields are not empty
    if ($mapel == '' || $kelas == '' || $namaguru == '') {
        echo '<script>alert("Ada field yang belum diisi!");</script>';
    }
    else {
        $direktori = "../assets/img/";
        
        // get file names and tmp names
        $cover = $_FILES['gambar']['name'];
        $tmp_cover = $_FILES['gambar']['tmp_name'];
        $foto = $_FILES['guru']['name'];
        $tmp_foto = $_FILES['guru']['tmp_name'];

        // move files to directory
        move_uploaded_file($tmp_cover, $direktori.$cover);
        move_uploaded_file($tmp_foto, $direktori.$foto);
        
        // insert record into database
        $query = "INSERT INTO `semestergenap` (`mapel`, `dess`, `group`, `namaguru`, `gambar`, `guru`) 
        VALUES ('$mapel', '$dess', '$kelas', '$namaguru', '$cover', '$foto')";
        
        mysqli_query($mysqli, $query);

        header("location:forms-semestergenap.php?info=added");
        exit();
    }
}


  ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Create Mata Pelajaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Mata Pelajaran</li>
          <li class="breadcrumb-item active">Bagian Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

 

    <section class="section">
        <div class="col">

          <div  class="card" >
            <div class="card-body">
              <h5 class="card-title">Edit Section</h5>
              <!-- General Form Elements -->
              <form method="POST" enctype="multipart/form-data">
                
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Nama Mata Pelajaran</label>
                  <div class="col-sm-10">
                    <input type="text" name="mapel" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Nama Pengampu</label>
                  <div class="col-sm-10">
                    <input type="text" name="namaguru" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Deskripsi Mata Pelajaran</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="dess" style="height: 100px"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Foto Pengampu</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="guru" type="file" id="formFile">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Foto Cover Mapel</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="gambar" type="file" id="formFile">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="group" id="group">
                      <option value="Kelas 7" selected>Kelas 7</option>
                      <option value="Kelas 8">Kelas 8</option>
                      <option value="Kelas 9">Kelas 9</option>
                    </select>
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
</html>

<?php include('adminfooter.php')?>
<?php } ?>