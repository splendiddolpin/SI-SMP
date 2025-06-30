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
$sql = "SELECT * FROM article WHERE judul_arc OR content_arc LIKE '%$search%'";

$result = $mysqli->query($sql);

// Tampilkan hasil pencarian
if ($result->num_rows > 0) {
    echo '<br><br><h5 class="widget-title">Hasil Cari :</h5>' ;
    while($row = $result->fetch_assoc()) { ?>
        <div class="widget widget-recent-posts">
                                <br>
                                <ul class="list-unstyled">
                                    <li><a href="blog-post.php?id=<?php echo $row['id']?>"><?php echo $row['judul_arc']?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
<?php    } else {

    echo " <br> <p style='color:red;'>Tidak ada hasil yang ditemukan</p>";
}

$mysqli->close();
?>