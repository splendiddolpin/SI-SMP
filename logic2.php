<?php 
if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];

        $isi = "SELECT * FROM article WHERE id = $id";
        $query = mysqli_query($mysqli, $isi);
        }


    ?>