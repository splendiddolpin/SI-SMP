<?php 

if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];

        $isi = "SELECT * FROM semestergenap WHERE id = '$id'";
        $query = mysqli_query($mysqli, $isi);

        $arc = "SELECT * FROM article WHERE id = '$id'";
        $queryarc = mysqli_query($mysqli, $arc);
        }

if (isset($_REQUEST['update'])) {
    $id = $_REQUEST['id'];
    $mapel= $_REQUEST["mapel"];
    $namaguru = $_REQUEST["namaguru"];
    $dess = $_REQUEST["dess"];
    $kelas = $_REQUEST["group"];
        
            if ($mapel == '' || $namaguru == '' || $dess == '') {
              echo '<script>alert("Ada field yang belum diisi!");</script>';
            }
            else {
              $isi = "UPDATE semestergenap SET mapel = '$mapel', namaguru =  '$namaguru', dess = '$dess' WHERE id = '$id'";
              $direktori = "../assets/img/";
              function uploadFile($mysqli, $id, $inputName, $columnName, $targetDirectory)
              {
                  $fileFoto = $_FILES[$inputName]['name'];
                  $files = $_FILES[$inputName]['tmp_name'];
                  $targetPath = $targetDirectory . basename($fileFoto);
                  if (move_uploaded_file($files, $targetPath)) {
                      mysqli_query($mysqli, "UPDATE `semestergenap` SET `$columnName` = '$fileFoto' WHERE `id` = '$id'");
                  }
              }
              // Cek dan hapus file yang dipilih untuk dihapus
              function deleteFile($mysqli, $id, $columnName, $targetDirectory)
              {
                  if (isset($_POST['delete_'.$columnName]) && $_POST['delete_'.$columnName] == '1') {
                      $filename = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT `$columnName` FROM `semestergenap` WHERE `id` = '$id'"))[$columnName];
                      $filepath = $targetDirectory . $filename;
                      if (file_exists($filepath)) {
                          unlink($filepath); // Hapus file dari direktori
                      }
                      mysqli_query($mysqli, "UPDATE `semestergenap` SET `$columnName` = NULL WHERE `id` = '$id'"); // Hapus nilai dari database
                  }
              }
              uploadFile($mysqli, $id, 'gambar', 'gambar', $direktori);
              uploadFile($mysqli, $id, 'guru', 'guru', $direktori);

              deleteFile($mysqli, $id, 'gambar', $direktori);
              deleteFile($mysqli, $id, 'guru', $direktori);

              header("location:forms-semestergenap.php?info=updated");
              exit();
            }

          }

//Artikel
  
if (isset($_REQUEST['article'])) {
    $id = $_REQUEST['id'];
    $judul_arc = $_REQUEST["judul_arc"];
    $content_arc = $_REQUEST["content_arc"];
    $date = $_REQUEST["date"]; 
            if ($judul_arc == '' || $content_arc == '') {
              echo '<script>alert("Ada field yang belum diisi!");</script>';
            }
            else if(empty($date)) {
              $date = date('Y-m-d H:i:s');
            }
            else {
              $arc = "UPDATE article SET judul_arc = '$judul_arc', content_arc = '$content_arc', date = '$date' WHERE id = '$id'";
              mysqli_query($mysqli, $arc);

              $direktori = "../assets/img/";

              function uploadFile($mysqli, $id, $inputName, $columnName, $targetDirectory)
              {
                $fileFoto = $_FILES[$inputName]['name'];
                $files = $_FILES[$inputName]['tmp_name'];
                $targetPath = $targetDirectory . basename($fileFoto);
                
                if (move_uploaded_file($files, $targetPath)) {
                  mysqli_query($mysqli, "UPDATE `article` SET `$columnName` = '$fileFoto' WHERE `id` = '$id'");
                }
              }

            // Cek dan hapus file yang dipilih untuk dihapus
            function deleteFile($mysqli, $id, $columnName, $targetDirectory)
            {
              if (isset($_POST['delete_'.$columnName]) && $_POST['delete_'.$columnName] == '1') {
                $filename = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT `$columnName` FROM `article` WHERE `id` = '$id'"))[$columnName];
                $filepath = $targetDirectory . $filename;
                
                if (file_exists($filepath)) {
                  unlink($filepath); // Hapus file dari direktori
                }
                
                mysqli_query($mysqli, "UPDATE `article` SET `$columnName` = NULL WHERE `id` = '$id'"); // Hapus nilai dari database
              }
              }

              uploadFile($mysqli, $id, 'gambar_arc', 'gambar_arc', $direktori);
              uploadFile($mysqli, $id, 'gambar1', 'gambar1', $direktori);
              uploadFile($mysqli, $id, 'gambar2', 'gambar2', $direktori);

              deleteFile($mysqli, $id, 'gambar_arc', $direktori);
              deleteFile($mysqli, $id, 'gambar1', $direktori);
              deleteFile($mysqli, $id, 'gambar2', $direktori);

              header("location:forms-edit.php?info=updated");
              exit();

            }

          }

          if(isset($_REQUEST['delete'])){
            $id = $_REQUEST['id'];
    
            $arc = "DELETE FROM article WHERE id = $id";
            $queryarc = mysqli_query($mysqli, $arc);

            header("location:forms-edit.php?info=deleted");
            exit(); 
            }

            if(isset($_REQUEST['deleted'])){
              $id = $_REQUEST['id'];
              $arc = "DELETE FROM semestergenap WHERE id = '$id'";
              $queryarc = mysqli_query($mysqli, $arc);
              header("location:forms-semestergenap.php?info=deleted");
              exit(); 
          }
    ?>

    