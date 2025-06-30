<?php
// Koneksi ke database
$servername ="localhost";
$database = "smp13db";
$username = "root";
$password = "";

$mysqli = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Ambil data dari input search
$search = $_POST['search'];

// Query SQL
$sql = "SELECT * FROM semestergenap WHERE mapel LIKE '%$search%'";

$result = $mysqli->query($sql);

// Tampilkan hasil pencarian
if ($result->num_rows > 0) { ?>
    <p style='color:red; font-weight: bold;'>note : apabila ingin memunculkan kembali tombol pengelompokan berdasarkan kelas silahkan refresh halaman ini</p>
    <?php
    while($row = $result->fetch_assoc()) { ?>
        <div id="grid">
        <div class="col-lg-3 col-md-4 col-xs-6"data-groups='["<?php echo $row['group']?>"]'>
                    <div class="portfolio-item">
                    <img src="assets/img/<?php if (empty($row['gambar']) ) { 
                                    echo "portfolio-2.jpg";
                                } else {
                                echo $row['gambar'];
                                }?>" class="img-res" alt="">
                    <h4 style="font-size:18px;" class="portfolio-item-title"><?php echo $row['mapel']?></h4>
                    <h4 style="font-size:14px; color: green;"class="portfolio-item-title"><br><br><br><?php echo $row['group']?></h4>
                    <a href="portfolio-item.php?id=<?php echo $row['id']?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    </div><?php } ?>
<?php } else {

    echo "<br> <p style='color:red; font-weight: bold;'>Tidak ada hasil yang ditemukan</p>";
}

$mysqli->close();
?>