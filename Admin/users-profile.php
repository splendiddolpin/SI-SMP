<?php
session_start();
if (empty($_SESSION['username']) OR empty($_SESSION['pass'])){
    header("location:pages-login.php");
}
else {
?>
<?php include('adminheader.php')?>
<?php include('logic.php')?>
<?php 
if (isset($_POST['submitpass'])) {
  $currentPassword = md5($_POST['password']); // hash password lama
  $newPassword = md5($_POST['newpassword']); // hash password baru
  $renewPassword = md5($_POST['renewpassword']); // hash re-enter password baru

  // verifikasi password lama
  $queryCheckPass = "SELECT password FROM admin WHERE id=1"; // contoh query, ganti id dan table sesuai dengan kebutuhan
  $result = mysqli_query($mysqli, $queryCheckPass);
  $row = mysqli_fetch_assoc($result);

  $errorMsg = '';
  if ($currentPassword != $row['password']) {
    $errorMsg = 'Password lama salah!';
  } else if ($newPassword != $renewPassword OR $newPassword == '' AND $newPassword == '') {
    $errorMsg = 'Tolong masukkan password yang sama pada re-enter password atau sebaliknya!';
  }

  if (!$errorMsg) {
    // simpan password baru ke database
    $querypass = "UPDATE admin SET password='$newPassword' WHERE id=1"; // contoh query, ganti id dan table sesuai dengan kebutuhan
    mysqli_query($mysqli, $querypass);
    session_destroy();
    header("location:pages-login.php?inform=updatedpass");
  } else {
    echo '<script>alert("' . $errorMsg . '");</script>';
  }
}
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $namaadmin = $_POST['namaadmin'];

  // sesi upload foto
  if ($username == '' || $namaadmin == '') {
    echo '<script>alert("Ada field yang belum diisi!");</script>';
  }
  else {
    $update = "UPDATE `admin` SET `username` = '$username', `namaadmin` = '$namaadmin' WHERE `id` = '1'";
    mysqli_query($mysqli, $update);
    
    $direktori = "assets/img/";
    $file_foto = $_FILES['pp']['name'];
    $files = $_FILES['pp']['tmp_name'];
    if(move_uploaded_file($files, $direktori.$file_foto)){
      mysqli_query($mysqli, "UPDATE `admin` SET `pp` = '$file_foto' WHERE `id` = '1'");
    }
    session_destroy();
    header("location:pages-login.php?info=updated");
    exit();
  }
}

?>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
    <a class="nav-link" href="index.php">
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
  </li>
  <!-- End Dashboard Nav -->

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

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/<?php echo $_SESSION['pp'];?>" alt="Profile" class="rounded-circle img-profile">
              <h2><?php echo $_SESSION['namaadmin'];?></h2>
              <h3><?php echo $_SESSION['role'];?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['namaadmin'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['company'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['role'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['country'];?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                      <img id="preview-image">
                      <div class="pt-2"> 
                        <label for="file-upload" class="btn btn-primary btn-sm" title="Upload new profile image">
                          <i style="color:white;"class="bi bi-upload"></i>
                        </label>
                        <input name="pp" type="file" id="file-upload" style="display: none;" onchange="previewImage(event);">
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" onclick="deletePreviewImage();"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" value="<?php echo $_SESSION['username'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="namaadmin" type="text" class="form-control" id="namaadmin" value="<?php echo $_SESSION['namaadmin'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?php echo $_SESSION['company'];?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Role</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="role" type="text" class="form-control" id="Job" value="<?php echo $_SESSION['role'];?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="<?php echo $_SESSION['country'];?>" disabled>
                      </div>
                    </div>

                    <div class="text-center">
                      <button name="submit" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                  <form method="POST">
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button name="submitpass" type="submit" class="btn btn-primary">Change Password</button>
                    </div>

                  </form><!-- End Change Password Form -->
                </div>


              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

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
  <script>
    function previewImage(event) {
  var reader = new FileReader();
  reader.onload = function() {
    var output = document.getElementById('preview-image');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}

function deletePreviewImage() {
  var output = document.getElementById('preview-image');
  output.src = '';
}

  </script>

</body>

</html>
<?php } ?>