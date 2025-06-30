<?php
include('connect.php');
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username   = $_POST['user'];
    $pass       = md5($_POST['pass']);
    $logon="SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$pass'";
    $logon2 = mysqli_query($mysqli,$logon);
    $row=mysqli_fetch_array($logon2);

    if($row["username"]=="$username") {
        $_SESSION["username"]="$username";
        $_SESSION["pass"]="$pass";
        $_SESSION["namaadmin"]=$row['namaadmin'];
        $_SESSION["role"]=$row['role'];
        $_SESSION["pp"]=$row['pp'];
        $_SESSION["company"]=$row['company'];
        $_SESSION["country"]=$row['country'];
        header("location:index.php");
    }
    else
{   
    header("location:pages-login.php?pesan=gagal");
}   
}
?>