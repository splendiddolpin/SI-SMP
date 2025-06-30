<?php 

if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];

        $isi = "SELECT * FROM semestergenap WHERE id = $id";
        $query = mysqli_query($mysqli, $isi);
        }


    ?>