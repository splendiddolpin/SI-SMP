<?php
// Mendapatkan nama file gambar dari request POST
$image = $_POST['image'];

// Hapus file gambar dari direktori
$direktori = "../assets/img/";
if (file_exists($direktori . $image)) {
    unlink($direktori . $image);
}

// Lakukan query update untuk menghapus nama gambar dari database
$arc = "UPDATE article SET gambar_arc = NULL, gambar1 = NULL, gambar2 = NULL WHERE gambar_arc = '$image' OR gambar1 = '$image' OR gambar2 = '$image'";
mysqli_query($mysqli, $arc);

// Mengirimkan respons berhasil ke klien
echo "Image deleted successfully";
?>
