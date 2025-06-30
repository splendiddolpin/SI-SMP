<footer id="colophon" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <a class="site-title"><span>SMP Negeri 13 Magelang</a>
                    <p style="text-align: justify;">Sebuah sekolah menengah pertama yang terletak di kota Magelang, Jawa Tengah.</p>
                    <p style="text-align: justify;"> Sekolah ini menyediakan pendidikan untuk siswa/i yang berusia antara 12 hingga 15 tahun dengan kurikulum yang telah disesuaikan dengan standar nasional. </p>
                </div>
                <?php $edit_contact = "SELECT * FROM contact WHERE id = 1 ";
                    $contact_edit = $mysqli->query($edit_contact);
                    while ($du = $contact_edit->fetch_object()) : ?>
                <div class="col-lg-offset-4 col-md-3 col-sm-4 col-md-offset-2 col-sm-offset-0 col-xs-6 ">
                    <h3>Kontak :</h3>
                    <ul class="list-unstyled contact-links">
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?= $du->email ?>"><?= $du->email ?></a></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?= $du->nomrum ?>"><?= $du->nomrum ?></a></li>
                        <li><i class="fa fa-fax" aria-hidden="true"></i><a href="<?= $du->wa ?>"><?= $du->wa ?></a></li>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><p><?= $du->alamat ?></p></li>
                    </ul>
                </div>
                <?php endwhile; ?>
                <div class="clearfix visible-xs"></div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <h3>Featured links</h3>
                    <ul class="list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="semestergenap.php">Mata Pelajaran</a></li>
                        <li><a href="blog.php">Kegiatan</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="social-links">
                        </div><!-- /.social-links -->
                    </div>
                    <div class="col-xs-4">
                        <div class="text-right">
                            <p>SMP Negeri 13 Magelang</p>
                            <p>Made With ♥</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>