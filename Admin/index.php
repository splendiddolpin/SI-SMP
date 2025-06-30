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
    <a class="nav-link" href="index.php">
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
<main id="main" class="main">
<section class="section">
      <div class="row align-items-top">
        <span style="text-align:center; color:blue; font-weight: bold;">Bagian Edit</span><br><br>
        <span style="text-align:center; color:red; font-size: 14px;">Bagian untuk mengedit data yang sudah ada</span>
        <br>
        <br>
      <div class="col-lg-6">
        <div class="card text-center">
            <div class="card-header">
            EDIT SECTION
            </div>
            <div class="card-body">
              <h5 class="card-title">Edit Mata Pelajaran</h5>
              <p class="card-text">Bagian Edit Mata Pelajaran.</p>
              <a href="forms-semestergenap.php" class="btn btn-primary">Edit</a>
            </div>
        </div>
      </div>
        <div class="col-lg-6">
        <div class="card text-center">
            <div class="card-header">
              EDIT SECTION
            </div>
            <div class="card-body">
              <h5 class="card-title">Edit Halaman Utama</h5>
              <p class="card-text">Bagian Edit Halaman Utama.</p>
              <a href="forms-elements.php" class="btn btn-primary">Edit</a>
          </div>
        </div>
        </div>
        <div class="col-lg-6">
          <div class="card text-center">
              <div class="card-header">
                EDIT SECTION
              </div>
              <div class="card-body">
                <h5 class="card-title">Edit Kegiatan</h5>
                <p class="card-text">Bagian Edit Kegiatan.</p>
                <a href="forms-edit.php" class="btn btn-primary">Edit</a>
              </div>
        </div>
        </div>
        <div class="col-lg-6">
          <div class="card text-center">
              <div class="card-header">
                EDIT SECTION
              </div>
              <div class="card-body">
                <h5 class="card-title">Edit Contact</h5>
                <p class="card-text">Bagian Edit Contact.</p>
                <a href="contact.php" class="btn btn-primary">Edit</a>
              </div>
          </div>
        </div>
        <span style="text-align:center; color:blue; font-weight: bold;">Bagian Create</span><br><br>
        <span style="text-align:center; color:red; font-size: 14px;">Bagian untuk membuat konten baru</span>
        <br>
        <br>
        <div class="col-lg-6">
          <div class="card text-center">
              <div class="card-header">
                EDIT SECTION
              </div>
              <div class="card-body">
                <h5 class="card-title">Create Kegiatan</h5>
                <p class="card-text">Bagian untuk membuat konten kegiatan.</p>
                <a href="create-article.php" class="btn btn-primary">Create</a>
              </div>
        </div>
        </div>
        <div class="col-lg-6">
          <div class="card text-center">
              <div class="card-header">
                EDIT SECTION
              </div>
              <div class="card-body">
                <h5 class="card-title">Create Mapel</h5>
                <p class="card-text">Bagian untuk membuat mata pelajaran baru.</p>
                <a href="forms-edit.php" class="btn btn-primary">Create</a>
              </div>
        </div>
        </div>
      </div>
    </section>
  </main>
<?php include('adminfooter.php')?>
<?php } ?>