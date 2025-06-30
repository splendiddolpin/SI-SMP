-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 09:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp13db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `namaadmin` text NOT NULL,
  `role` text NOT NULL,
  `pp` text NOT NULL,
  `country` text NOT NULL,
  `company` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `namaadmin`, `role`, `pp`, `country`, `company`) VALUES
(1, 'bagas123', '5ffd9bb73b00bce4feeb77e2d12722da', 'Bagaskara Al Hadi', 'Admin', 'Jun-14@14.54.36.png', 'Indonesia', 'SMP Negeri 13 Magelang');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(250) NOT NULL,
  `judul_arc` text NOT NULL,
  `content_arc` text NOT NULL,
  `gambar_arc` varchar(250) NOT NULL,
  `gambar1` text NOT NULL,
  `gambar2` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul_arc`, `content_arc`, `gambar_arc`, `gambar1`, `gambar2`, `date`) VALUES
(1, 'Splendiddolpines', 'Lumba-lumba adalah mamalia laut yang sangat cerdas, selain itu sistem alamiah yang melengkapi tubuhnya sangat kompleks. Sehingga banyak teknologi yang terinspirasi dari lumba-lumba. Salah satu contoh adalah kulit lumba-lumba yang mampu memperkecil gesekan dengan air, sehingga lumba-lumba dapat berenang dengan sedikit hambatan air. Hal ini yang digunakan para perenang untuk merancang baju renang yang mirip kulit lumba-lumba. \r\n\r\nLumba-lumba memiliki sebuah sistem yang digunakan untuk berkomunikasi dan menerima rangsang yang dinamakan sistem sonar, sistem ini dapat menghindari benda-benda yang ada di depan lumba-lumba, sehingga terhindar dari benturan. Teknologi ini kemudian diterapkan dalam pembuatan radar kapal selam. Lumba-lumba adalah binatang menyusui karena lumba lumba adalah mamalia. Mereka hidup di laut dan sungai di seluruh dunia. Lumba-lumba adalah kerabat paus dan pesut. Ada lebih dari 40 jenis lumba-lumba.\r\n\r\nBayi lumba-lumba yang baru lahir akan dibawa ke permukaan oleh induknya agar bisa menghirup udara. Lumba-lumba perlu naik ke permukaan untuk bernapas supaya tetap hidup. Lumba-lumba bernapas melalui lubang udara yang terletak di atas kepalnya. Tubuhnya yang licin dan ramping sangat sesuai untuk berenang. Induk lumba-lumba menyusui anaknya dengan susu yang gurih dan menyediakan energi bagi anaknya supaya cepat besar. Setiap anak lumba-lumba selalu berada di dekat induknya, sehingga ibunya bisa melindungi dari bahaya. Lumba-lumba selalu menjaga hubungan dengan anaknya hingga tumbuh semakin besar. Induk lumba-lumba memanggil anak anaknya dengan siulan khusus yang bisa mereka kenali.\r\n\r\nLumba-lumba hidup dan bekerja dalam kelompok atau disebut kawanan. Mereka sering bermain bersama. Seekor lumba-lumba tidak bisa tidur nyenyak di bawah air. Ia bisa tenggelam. Oleh karena itu, ia setengah tidur beberapa saat dalam sehari. Lumba-lumba makan cumi dan ikan seperti ikan mullet abu-abu. Kadang kadang Lumba-lumba menggiring kawanan ikan agar mudah ditangkap. Lumba-lumba mencari jalan dengan mengirimkan suara di dalam air. Jika suara itu mengenai suatu benda, suara itu akan dipantulkan kembali sebagai gema. Kadang kadang, suara gaduh di laut akibat pengeboran minyak dapat membingungkan lumba-lumba. Mereka akan mengalami kesulitan dalam mengirim dan menerima pesan. Karena lumba-lumba dapat berkomunikasi, maka lumba-lumba disebut sebagai hewan yang paling cerdas, melebihi simpanse.[1]\r\n\r\nManusia senantiasa tertarik dengan kisah lumba-lumba. Bangsa Romawi telah membuat gambar mozaik lumba-lumba sekitar 2.000 tahun lalu. Sekarang, manusia senang berenang di laut bersama binatang yang pandai dan bersahabat seperti lumba-lumba. Lumba-lumba harus berhati hati terhadap ikan hiu yang mungkin menyerang mereka sewaktu waktu. Mereka melindungi diri dengan gigi giginya, kadang-kadang mereka menggunakan paruhnya sebagai pelantak. Manusia dapat menjala banyak sekali ikan bagi lumba-lumba untuk makanannya. Terkadang, lumba-lumba tertangkap oleh jaring nelayan. Mereka tidak dapat menghirup napas di permukaan, akibatnya mereka tenggelam. Ketika bahan kimia yang berbahaya dibuang ke laut, limbah itu bisa meracuni makanan yang dimakan lumba-lumba. Pembangunan waduk di sungai dan pengeringan danau hanya menyisakan sedikit tempat bagi binatang seperti lumba-lumba Brazil untuk hidup.\r\n\r\nLumba-lumba tergolong sebagai mamalia yang cerdas. Lumba-lumba dapat menolong manusia, bila lumba-lumba sudah terlatih, bahkan lingkaran api pun dapat mereka terobos. Singa laut, spesies primata, paus dan anjing juga termasuk binatang yang cerdas. Lumba-lumba yang sudah terlatih dapat melakukan berbagai atraksi dan mereka juga dapat berhitung, tetapi Lumba-lumba liar belum dapat melakukan berbagai atraksi. Sekarang ini, lumba-lumba dan paus sudah langka, maka lumba-lumba dan paus harus dilindungi. Lumba-lumba dan paus telah mulai dilindungi di seluruh dunia.', 'WhatsApp Image 2023-06-26 at 10.55.31.jpeg', '', '', '2023-06-13'),
(2, 'Ikan', 'Ikan adalah anggota vertebrata poikilotermik (berdarah dingin)[1] yang hidup di air dan bernapas dengan insang. Ikan merupakan kelompok vertebrata yang paling beraneka ragam dengan jumlah spesies lebih dari 27,000 di seluruh dunia. Secara taksonomi, ikan tergolong kelompok paraphyletic yang hubungan kekerabatannya masih diperdebatkan; biasanya ikan dibagi menjadi ikan tanpa rahang (kelas Agnatha, 75 spesies termasuk lamprey dan ikan hag), ikan bertulang rawan (kelas Chondrichthyes, 800 spesies termasuk hiu dan pari), dan sisanya tergolong ikan bertulang keras (kelas Osteichthyes). Ikan dalam berbagai bahasa daerah disebut iwak (jv, bjn), jukut (vkt).[2][butuh sumber yang lebih baik]\r\n\r\nIkan memiliki bermacam ukuran, mulai dari hiu paus yang berukuran 14 meter (45 ft) hingga stout infantfish yang hanya berukuran 7 mm (kira-kira 1/4 inch). Ada beberapa hewan air yang sering dianggap sebagai \"ikan\", seperti paus, ikan cumi dan ikan duyung, yang sebenarnya tidak tergolong sebagai ikan.', '', '', '', '2023-02-22'),
(3, 'Taman Nasional Yellowstone', 'Taman Nasional Yellowstone adalah taman nasional Amerika yang sebagian besar terletak di Wyoming, dengan bagian-bagian kecil di Montana dan Idaho. Taman Nasional Yellowstone didirikan oleh Kongres AS dan ditandatangani menjadi undang-undang oleh Presiden Ulysses S. Grant pada 1 Maret 1872. Yellowstone adalah taman nasional pertama di AS dan juga secara luas dianggap sebagai taman nasional pertama di Amerika Serikat dan dunia. Taman ini terkenal dengan margasatwa dan banyak fitur geotermalnya, terutama geiser Old Faithful, salah satu fitur paling populer. Taman Nasional Yellowstone memiliki banyak jenis ekosistem, tetapi hutan subalpine adalah yang paling melimpah. Taman Nasional Yellowstone adalah bagian dari ekoregion hutan South Central Rockies.[4]\r\n\r\nPenduduk asli Amerika telah tinggal di wilayah Yellowstone setidaknya selama 11.000 tahun. Selain kunjungan para pria gunung selama awal hingga pertengahan abad ke-19, eksplorasi terorganisir tidak dimulai sampai akhir 1860-an. Manajemen dan kontrol taman awalnya berada di bawah yurisdiksi Menteri Dalam Negeri, yang pertama adalah Columbus Delano. Namun, Angkatan Darat AS kemudian ditugaskan untuk mengawasi manajemen Yellowstone untuk periode 30 tahun antara 1886 dan 1916. Pada tahun 1917, administrasi taman dipindahkan ke Layanan Taman Nasional, yang telah dibuat tahun sebelumnya. Ratusan struktur telah dibangun dan dilindungi karena signifikansi arsitektural dan historisnya, dan para peneliti telah memeriksa lebih dari seribu situs arkeologi.[5]\r\n\r\nTaman Nasional Yellowstone membentang seluas 3.468,4 mil persegi (8.983 km 2), yang terdiri dari danau, ngarai, sungai dan pegunungan. Danau Yellowstone adalah salah satu danau dataran tinggi terbesar di Amerika Utara dan berpusat di atas Kaldera Yellowstone, supervolcano terbesar di benua. Kaldera dianggap sebagai gunung berapi yang tidak aktif. Gunung tersebut telah meletus dengan kekuatan luar biasa beberapa kali dalam dua juta tahun terakhir. Setengah dari geyser dunia dan fitur hidrotermal berada di Yellowstone, didorong oleh vulkanisme yang sedang berlangsung ini. Aliran lava dan batuan dari letusan gunung berapi meliputi sebagian besar wilayah daratan Yellowstone. Taman ini adalah pusat dari Greater Yellowstone Ecosystem, ekosistem hampir utuh yang tersisa terbesar di zona beriklim utara Bumi. Pada tahun 1978, Yellowstone dinobatkan sebagai Situs Warisan Dunia UNESCO.[6]\r\n\r\nRatusan spesies mamalia, burung, ikan, dan reptil telah didokumentasikan, termasuk beberapa yang genting atau terancam. Hutan dan padang rumput yang luas juga mencakup spesies tanaman yang unik. Taman Yellowstone adalah lokasi megafauna terbesar dan paling terkenal di Daratan Utama Amerika Serikat. Beruang grizzly, serigala, dan kawanan bison dan rusa yang hidup bebas hidup di taman ini. Kawanan bison Taman Yellowstone adalah kawanan bison umum tertua dan terbesar di Amerika Serikat. Kebakaran hutan terjadi di taman setiap tahun; dalam kebakaran hutan besar tahun 1988, hampir sepertiga dari taman tersebut terbakar. Yellowstone memiliki banyak kesempatan rekreasi, termasuk hiking, berkemah, berperahu, memancing, dan jalan-jalan. Jalan beraspal menyediakan akses yang dekat ke area panas bumi utama serta beberapa danau dan air terjun. Selama musim dingin, pengunjung sering mengakses taman melalui tur berpemandu yang menggunakan bus salju atau mobil salju.[7]', 'Jun-7@16.41.30.png', 'ea8bafb8dc579bfe0a02b529212c90dc.jpeg', '', '2023-06-03'),
(36, 'Doa Bersama', 'Kegiatan Doa Bersama Menyambut Ujian Nasional di SMP Negeri 13 Magelang merupakan acara yang diadakan sebagai bentuk persiapan dan dukungan spiritual bagi para siswa-siswi yang akan menghadapi Ujian Nasional (UN). Acara ini bertujuan untuk menguatkan semangat dan kepercayaan diri siswa-siswi dalam menghadapi tantangan ujian yang akan datang, serta memohon restu dan bimbingan Tuhan dalam setiap langkah mereka.\r\n\r\nKegiatan dimulai dengan penyelenggaraan doa bersama, yang dipimpin oleh guru agama atau tokoh agama terkait. Doa dipilih sebagai sarana untuk memohon keberkahan, ketenangan batin, serta kekuatan dalam menghadapi UN. Para siswa-siswi didorong untuk memusatkan pikiran, membuka hati, dan menghubungkan diri dengan Tuhan melalui doa yang tulus dan sungguh-sungguh.\r\n\r\nDoa bersama ini diadakan di ruang aula atau tempat yang dapat menampung seluruh siswa-siswi beserta guru dan staf sekolah. Ruangan tersebut dihias dengan suasana yang tenang dan sederhana, menciptakan atmosfer yang mendukung kekhusyukan dan refleksi spiritual.\r\n\r\nSelama doa, berbagai aspek penting dalam menghadapi ujian, seperti ketenangan, keberanian, kecerdasan, kesabaran, dan keberhasilan, menjadi fokus utama dalam permohonan kepada Tuhan. Para siswa-siswi diingatkan akan pentingnya bekerja keras, berdoa, serta mempercayai diri sendiri dan kemampuan mereka untuk meraih hasil yang terbaik dalam UN.\r\n\r\nSelain doa, mungkin juga dilakukan beberapa kegiatan pendukung, seperti pembacaan ayat suci atau nasyid untuk menambah kekhidmatan suasana. Guru dan staf sekolah juga memberikan pesan motivasi dan dorongan kepada siswa-siswi agar tetap fokus, tidak stress, dan memiliki sikap positif selama persiapan menuju UN.\r\n\r\nSetelah doa selesai, acara diakhiri dengan ungkapan rasa syukur dan harapan yang tulus kepada Tuhan. Siswa-siswi diberi kesempatan untuk berdoa secara pribadi atau berkelompok, memohon perlindungan dan petunjuk dalam menghadapi UN. Selain itu, momen ini juga menjadi ajang untuk menguatkan solidaritas dan persatuan antar-siswa dalam menghadapi tantangan bersama.\r\n\r\nKegiatan Doa Bersama Menyambut Ujian Nasional di SMP Negeri 13 Magelang merupakan upaya sekolah dalam membantu siswa-siswi untuk menghadapi ujian dengan jiwa yang kuat dan keyakinan yang tinggi. Dengan didukung oleh doa dan semangat kebersamaan, diharapkan siswa-siswi mampu mengatasi stres dan meraih hasil yang memuaskan dalam UN.', 'WhatsApp-Image-2020-02-22-at-14.21.091-750x458.jpeg', '', '', '2023-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nomrum` text NOT NULL,
  `wa` text NOT NULL,
  `email` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nomrum`, `wa`, `email`, `alamat`) VALUES
(1, '(0293)23123123 ', '08953766106091 ', 'admin@smpn13mgl.sch.id', 'Jalan Pahlawan No. 167 Kota Magelang ');

-- --------------------------------------------------------

--
-- Table structure for table `semestergenap`
--

CREATE TABLE `semestergenap` (
  `id` int(11) NOT NULL,
  `group` text NOT NULL,
  `mapel` text NOT NULL,
  `dess` text NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `namaguru` text NOT NULL,
  `guru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semestergenap`
--

INSERT INTO `semestergenap` (`id`, `group`, `mapel`, `dess`, `gambar`, `namaguru`, `guru`) VALUES
(5, 'Kelas 9', 'Pendidikan Agama Katolik', 'Kata \"katolik\" (καθολικός, katolikos; Latin: catholicus)[1][2] berasal dari frasa Yunani καθόλου (katolou), yang berarti \"sarwa sekalian\", \"secara keseluruhan\", atau \"am\", gabungan kata κατά (kata), yang berarti \"perihal\", dan kata ὅλος (holos), yang berarti \"sarwa\".[3][4] Istilah \"Katolik\" (dengan huruf k besar) pertama kali digunakan pada permulaan abad ke-2 sebagai sebutan bagi seantero Dunia Kristen.[5] Dalam ranah eklesiologi, istilah ini memiliki sejarah yang panjang dan digunakan dengan berbagai makna.\r\n\r\nDi Indonesia, kata ini dapat berarti \"hal ihwal agama Kristen Katolik\" maupun \"hal ihwal ajaran dan amalan bersejarah Gereja Barat\".[note 1][6] Kata ini digunakan banyak orang Kristen sebagai sebutan bagi Gereja Semesta atau segenap orang yang beriman kepada Yesus Kristus tanpa pandang denominasi,[7][8] dan digunakan pula dengan makna yang lebih sempit sebagai sebutan bagi kekatolikan, yang mencakup beberapa gereja bersejarah dengan keyakinan-keyakinan pokok yang sama. Katolikos, gelar pemimpin tertinggi di sejumlah Gereja Timur, juga berasal dari akar kata yang sama.\r\n\r\nIstilah ini sudah lekat pada nama persekutuan Kristen terbesar di dunia, yakni Gereja Katolik. Tiga cabang utama agama Kristen di Dunia Timur, yakni Gereja Ortodoks Timur, Gereja Ortodoks Oriental, dan Gereja Persia, senantiasa menyebut diri Katolik, seturut tradisi rasuli dan syahadat Nikea. Jemaat-jemaat Anglikan, Lutheran, dan sejumlah jemaat Metodis percaya bahwa gereja-gereja mereka juga \"Katolik\", dalam arti merupakan kelanjutan dari Gereja Perdana sedunia yang didirikan oleh rasul-rasul Kristus. Kendati demikian, tiap-tiap Gereja memaknai istilah \"Gereja Katolik\" secara berbeda-beda. Sebagai contoh, baik Gereja Katolik, Gereja Ortodoks Timur, Gereja Ortodoks Oriental, maupun Gereja Persia menegaskan bahwa denominasinya adalah kelanjutan dari Gereja Perdana sedunia, sementara semua denominasi lain hanyalah pecahannya.', '', 'Fede Bracamontes S.pd', 'download.jfif'),
(6, 'Kelas 7', 'Ilmu Pengetahuan Sosial', 'asdasdsadasda', 'portfolio-1.jpg', 'Jonas AlBakori Bakrono', ''),
(10, 'Kelas 7', 'Pendidikan Kwarganegaraan', 'Mata pelajaran Pendidikan Kewarganegaraan (PKn) adalah salah satu mata pelajaran yang diberikan di sekolah-sekolah di Indonesia. PKn adalah mata pelajaran yang bertujuan untuk membentuk generasi muda yang memiliki kesadaran akan pentingnya keberadaan negara dan kewarganegaraan dalam kehidupan bermasyarakat, berbangsa, dan bernegara.\r\n\r\nMata pelajaran PKn mencakup berbagai aspek dalam kehidupan bermasyarakat, seperti hak dan kewajiban warga negara, konstitusi dan sistem pemerintahan, sejarah perjuangan bangsa Indonesia, hak asasi manusia, pluralisme, demokrasi, dan globalisasi. Selain itu, PKn juga membantu siswa untuk memahami nilai-nilai luhur dan etika dalam kehidupan berbangsa dan bernegara.\r\n\r\nDalam pembelajaran PKn, siswa tidak hanya diberikan teori dan konsep, tetapi juga dilibatkan dalam berbagai kegiatan praktik, seperti mengikuti kegiatan-kegiatan sosial, melakukan kegiatan gotong royong, serta mengadakan diskusi dan debat untuk membentuk kemampuan berpikir kritis dan kreatif.\r\n\r\nPKn merupakan salah satu mata pelajaran yang penting untuk membentuk karakter dan mempersiapkan siswa sebagai warga negara yang baik dan bertanggung jawab. Oleh karena itu, PKn harus diajarkan dengan sungguh-sungguh agar siswa dapat memahami pentingnya kewarganegaraan dan menjadikan nilai-nilai tersebut sebagai bagian dari diri mereka sendiri.', 'coverppkn.jpg', 'Pratiwi Ningtyas, S.Pd', '2ebb6746-9473-4641-b1ee-cd3b75a788ba (3) - Pratiwi Ningtyas.png'),
(11, 'Kelas 8', 'Pendidikan Kwarganegaraan', 'Mata pelajaran Pendidikan Kewarganegaraan (PKn) adalah salah satu mata pelajaran yang diberikan di sekolah-sekolah di Indonesia. PKn adalah mata pelajaran yang bertujuan untuk membentuk generasi muda yang memiliki kesadaran akan pentingnya keberadaan negara dan kewarganegaraan dalam kehidupan bermasyarakat, berbangsa, dan bernegara.\r\n\r\nMata pelajaran PKn mencakup berbagai aspek dalam kehidupan bermasyarakat, seperti hak dan kewajiban warga negara, konstitusi dan sistem pemerintahan, sejarah perjuangan bangsa Indonesia, hak asasi manusia, pluralisme, demokrasi, dan globalisasi. Selain itu, PKn juga membantu siswa untuk memahami nilai-nilai luhur dan etika dalam kehidupan berbangsa dan bernegara.\r\n\r\nDalam pembelajaran PKn, siswa tidak hanya diberikan teori dan konsep, tetapi juga dilibatkan dalam berbagai kegiatan praktik, seperti mengikuti kegiatan-kegiatan sosial, melakukan kegiatan gotong royong, serta mengadakan diskusi dan debat untuk membentuk kemampuan berpikir kritis dan kreatif.\r\n\r\nPKn merupakan salah satu mata pelajaran yang penting untuk membentuk karakter dan mempersiapkan siswa sebagai warga negara yang baik dan bertanggung jawab. Oleh karena itu, PKn harus diajarkan dengan sungguh-sungguh agar siswa dapat memahami pentingnya kewarganegaraan dan menjadikan nilai-nilai tersebut sebagai bagian dari diri mereka sendiri.', 'coverppkn.jpg', 'Pratiwi Ningtyas, S.Pd', '2ebb6746-9473-4641-b1ee-cd3b75a788ba (3) - Pratiwi Ningtyas.png'),
(12, 'Kelas 9', 'Pendidikan Kwarganegaraan', 'Mata pelajaran Pendidikan Kewarganegaraan (PKn) adalah salah satu mata pelajaran yang diberikan di sekolah-sekolah di Indonesia. PKn adalah mata pelajaran yang bertujuan untuk membentuk generasi muda yang memiliki kesadaran akan pentingnya keberadaan negara dan kewarganegaraan dalam kehidupan bermasyarakat, berbangsa, dan bernegara.\r\n\r\nMata pelajaran PKn mencakup berbagai aspek dalam kehidupan bermasyarakat, seperti hak dan kewajiban warga negara, konstitusi dan sistem pemerintahan, sejarah perjuangan bangsa Indonesia, hak asasi manusia, pluralisme, demokrasi, dan globalisasi. Selain itu, PKn juga membantu siswa untuk memahami nilai-nilai luhur dan etika dalam kehidupan berbangsa dan bernegara.\r\n\r\nDalam pembelajaran PKn, siswa tidak hanya diberikan teori dan konsep, tetapi juga dilibatkan dalam berbagai kegiatan praktik, seperti mengikuti kegiatan-kegiatan sosial, melakukan kegiatan gotong royong, serta mengadakan diskusi dan debat untuk membentuk kemampuan berpikir kritis dan kreatif.\r\n\r\nPKn merupakan salah satu mata pelajaran yang penting untuk membentuk karakter dan mempersiapkan siswa sebagai warga negara yang baik dan bertanggung jawab. Oleh karena itu, PKn harus diajarkan dengan sungguh-sungguh agar siswa dapat memahami pentingnya kewarganegaraan dan menjadikan nilai-nilai tersebut sebagai bagian dari diri mereka sendiri.', 'coverppkn.jpg', 'Pratiwi Ningtyas, S.Pd', '2ebb6746-9473-4641-b1ee-cd3b75a788ba (3) - Pratiwi Ningtyas.png');

-- --------------------------------------------------------

--
-- Table structure for table `utama`
--

CREATE TABLE `utama` (
  `id` int(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `notelp` int(255) DEFAULT NULL,
  `judul` varchar(250) DEFAULT NULL,
  `ketjud` varchar(250) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `linkyt` text NOT NULL,
  `linkad` text NOT NULL,
  `linkel` text NOT NULL,
  `linkwb` text NOT NULL,
  `sis_inf` varchar(30) NOT NULL,
  `ket_sis` text NOT NULL,
  `ketjud2` varchar(250) NOT NULL,
  `jud2` varchar(250) NOT NULL,
  `ket2` text NOT NULL,
  `gambar2` varchar(250) NOT NULL,
  `p_kelas` int(25) NOT NULL,
  `p_pengajar` int(25) NOT NULL,
  `p_prestasi` int(25) NOT NULL,
  `p_ekstrakulikuler` int(25) NOT NULL,
  `jud3` text NOT NULL,
  `ket3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utama`
--

INSERT INTO `utama` (`id`, `email`, `notelp`, `judul`, `ketjud`, `gambar`, `linkyt`, `linkad`, `linkel`, `linkwb`, `sis_inf`, `ket_sis`, `ketjud2`, `jud2`, `ket2`, `gambar2`, `p_kelas`, `p_pengajar`, `p_prestasi`, `p_ekstrakulikuler`, `jud3`, `ket3`) VALUES
(1, 'smpnegeri13@school.sc.id', 2132132, 'SMP Negeri 13 Kota Magelang ', '', 'profil-foto.gif', 'https://www.youtube.com/@artsspenagalas4048', 'https://wawasan.co/news/detail/7463/smp-negeri-13-kota-magelang-raih-penghargaan-sekolah-adiwiyata-tingkat-nasional', 'https://e-library.erlanggaonline.co.id/', 'https://smpn13mgl.sch.id/', 'Sistem Informasi  1', 'Beberapa Informasi yang ada di SMP Negeri 13 Magelang  1', 'Pendidikan Yang Lebih Baik untuk Generasi yang lebih baik ', 'Art Spenagalas ', 'SMP NEGERI 13 MAGELANG adalah salah satu satuan pendidikan dengan jenjang SMP di Potrobangsan, Kec. Magelang Utara, Kota Magelang, Jawa Tengah. Dalam menjalankan kegiatannya, SMP NEGERI 13 MAGELANG berada di bawah naungan Kementerian Pendidikan dan Kebudayaan. 1', '1659321204429 (1).png', 14, 25, 11, 21, 'Aktivitas Terbaru', 'Artikel yang berisi tentang kegiatan sekolah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semestergenap`
--
ALTER TABLE `semestergenap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utama`
--
ALTER TABLE `utama`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semestergenap`
--
ALTER TABLE `semestergenap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `utama`
--
ALTER TABLE `utama`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
