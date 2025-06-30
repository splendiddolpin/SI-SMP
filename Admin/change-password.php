<?php>
if (isset($_POST['submitpass'])) {
  $currentPassword = md5($_POST['password']); // hash password lama
  $newPassword = md5($_POST['newpassword']); // hash password baru
  $renewPassword = md5($_POST['renewpassword']); // hash re-enter password baru

  // verifikasi password lama
  $queryCheckPass = "SELECT password FROM admin WHERE id=1"; // contoh query, ganti id dan table sesuai dengan kebutuhan
  $result = mysqli_query($mysqli, $queryCheckPass);
  $row = mysqli_fetch_assoc($result);
  if ($currentPassword != $row['password']) {
    echo '<span class="text-danger">Password lama salah!</span>';
  }

  // verifikasi password baru
  if ($newPassword != $renewPassword) {
    echo '<span class="text-danger">Password baru tidak sama dengan re-enter password baru</span>';
  }

  // simpan password baru ke database
  $querypass = "UPDATE admin SET password='$newPassword' WHERE id=1"; // contoh query, ganti id dan table sesuai dengan kebutuhan
  mysqli_query($mysqli, $querypass);

  session_destroy();
  header("location:pages-login.php?info=updatedpass");
  exit();
}
?>