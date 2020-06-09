-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 05:11 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_produk`, `harga`, `qty`, `subtotal`) VALUES
(1, 3, 4500, 2, 9000),
(2, 6, 140000, 2, 280000),
(3, 5, 135000, 1, 135000),
(3, 4, 90000, 2, 180000),
(4, 4, 90000, 2, 180000),
(4, 10, 445000, 1, 445000),
(5, 4, 90000, 2, 180000),
(5, 12, 555000, 1, 555000),
(6, 4, 90000, 1, 90000),
(6, 9, 340000, 3, 1020000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Coffee'),
(2, 'Tools');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `username` varchar(12) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `nama` text NOT NULL,
  `level` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `email`, `nama`, `level`) VALUES
('admin', 'eb184cc3e4469723f6afda6b176ebb49', 'admin@admin.com', 'admin', 'admin'),
('adminkopi', '5910e0e2e6915189b630bccfd1fd09b8', 'admi@gmail.com', 'adminkopi', 'admin'),
('alex', '7815696ecbf1c96e6894b779456d330e', 'alexx@gmail.com', 'alexa', 'admin'),
('angga', '8479c86c7afcb56631104f5ce5d6de62', 'angga@gmail.com', 'Angga Kur', 'customer'),
('bintang', '801dc3c9e3bcd2a3cf428f3b79b312b6', 'bintang@bnt.com', 'bintang', 'customer'),
('indra', 'e24f6e3ce19ee0728ff1c443e4ff488d', 'indra@gmail.com', 'indra', 'customer'),
('raf', '75ac496ef4abb4ead6af2eb4c44f9b9a', 'raf@raf.com', 'raf', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_kirim` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `nomor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_kirim`, `id_transaksi`, `nama`, `alamat`, `nomor`) VALUES
(1, 1, 'Ivan Abdurrafie', 'smeen', '1212'),
(2, 2, 'Angga Kurniawan', 'Jl. Semen romo no.9 Kertosari Babadan Ponorogo Jawa Timur Indonesia', '012345566789'),
(3, 3, 'lalal', 'asdasd', '123123'),
(4, 4, 'asdasd', 'ckckc', '123123'),
(5, 5, 'Indra saputra', 'Jl. Semen romo no. 9 kertosari Ponorogo', '0123455667'),
(6, 6, 'Budiman Jingga', 'Jl Soekarno Hatta no 9 Malang Jawa Timur', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama`, `harga`, `stok`, `deskripsi`, `img`) VALUES
(3, 1, 'ORIGINUTT ARABICA BLEND', 100000, 42, 'Our very first blend will bring you unforgettable coffee experience. We found out that in Indonesia, this kind of flavor is very hard to find while it\'s quite common abroad. Why? Because this coffee has super sweet nutty complexity with lingering Sweet Buttery Cookie and Lemon aftertaste so that this coffee is not intimidating even for first time coffee drinkers. Almost everybody agrees with that.', 'as.jpg'),
(4, 1, 'GAYO BLACK TEA', 90000, 43, 'Wet hull is a common post-harvest processing method in Indonesia because it\'s practical and low-cost. It will be weird if we, as a roastery based in Indonesia, didn\'t have at least one kind of coffee processed with this method. But unfortunately, wet hull has a bad reputation in coffee industry because it usually produces unpleasant characteristics such as earthy, woody, tobacco, musty, cedar or even rubber and dirt-like with inconsistent flavours. With careful and strict processing protocols, a', 'gayo_black_tea.jpg'),
(5, 1, 'HALU PINK BANANA', 135000, 19, 'This coffee has been everybody\'s favorite and in 2018 was one of our best selling coffee. We bet you have never tasted coffee as complex and enjoyable as this one. Try it yourself.', 'halu_pink_banana.jpg'),
(6, 1, 'GAYO APPLE CIDER', 140000, 8, 'This coffee is our attempt in doing non-conventional coffee processing: anaerobic cherry maceration. If not carefully done, this kind of process can be a disaster resulting in coffee that has unpleasant pungent flavor, something you can relate to decayed fruits. But if it\'s done correctly, it can be a magic: adding complexity to the fruitiness and enhancing sweetness and body.', 'gayo_apple_cider.jpg'),
(7, 1, 'MOKONISA RED MATCHA', 150000, 15, 'Honey Processed Ethiopian Coffee.\r\nLast year, we released coffee from Mokonisa washing station with strong Jasmine flavour. This year, coffee from this region got us quite surprised with dominant Matcha (green tea) flavour with sweet aromatic rosewater undertaste.', 'mokonisa_red_macha.jpg'),
(8, 1, 'MACHOFFEE HOUSE BLEND', 90000, 4, 'Bold, Brave, Bad-ass.\r\nFor us, Machoffee was like a tough guy. When you first met him, he has this kind of intimidating impression at first but after you know him for some time, you will start to find their tenderness.\r\nWe received a lot of request for \"the strongest coffee without apparent bitterness\" so we created this blend and nobody it has been their favorite ever since. The creation of this blend was inspired from when we were in Italy and tried the coffee there. It has this simple Milk Chocolate sweetness and elegant bold body with super smooth Blackcurrant finish.', 'machoffee.jpg'),
(9, 2, 'V60 DRIP IN SERVER (VDI-02B)', 340000, 7, 'The Hario v60 ‘Drip In’ server provides a convenient way to start brewing pour over coffee at home. Made of borosilicate glass, the carafe uses Hario (02) filters and has 700ml capacity, suitable for 1 to 4 people. Included in the box is 1x 02 Drip Server 1x 02 Plastic Dripper 40 x Unbleached Paper Filters (02)', 'v60.jpg'),
(10, 2, 'HARIO V60 ICED COFFEE MAKER (VIC-02B)', 445000, 4, 'Ice Coffee Maker yang berasal dari Jepang ini diciptakan khusus untuk anda yang menyukai kopi yang disajikan dingin. Dilengkapi dengan wadah kaca khusus dan corong plastik untuk menampung es memungkinkan anda membuat es kopi dengan sangat praktis. Jangan tanya soal hasil kopi yang dihasilkan. Keunggulan kualitas dari cold drip dari Hario ini sungguh tak bisa lagi diragukan. Jadi buat anda yang mungkin sedang bingung memilih cold drip apa yang dibutuhkan? Hario V60 Ice Coffee Maker VIC-02B adalah pilihan pas yang mampu melengkapi kebutuhan minum kopi anda. Oh satu lagi, harganya yang ekonomis membuat cold drip ini menjadi primadona di kelasnya. \r\n', 'vic.jpg'),
(12, 2, 'HARIO V60 TETSU KASUYA SERIES DRIPPER 02 (KDC-02)', 555000, 19, 'Perbedaan dari design V60 Tetsu Kasuya dibanding dripper standard V60 lainnya ada di bagian lubang bawah drippernya yang dapat menahan laju air lebih lama karena dripper ini cocok untuk grind size coarse, ukuran yg dipakai oleh Tetsu sendiri saat memenangkan WBC 2016. Grind size coarse sendiri meminimalisir partikel fine di kopi, sehingga mengurangi astringency dan membuat kopi lebih clean.', 'kdc1.jpg'),
(13, 2, 'HARIO V60 DRIP SCALE (VST-2000B)', 1200000, 3, 'Produk timbangan ini memiliki skala timbangan mulai dari 0,1 gram, dengan skala tersebut Anda bisa menghasilkan timbangan yang konsisten dan sesuai dengan apa yang Anda butuhkan, sehingga kopi yang dibuat lebih nikmat dbandingkan dengan kopi-kopi yang Anda buat sebelumnya. Selain itu, produk Hario Drip Scale VST-2000B ini juga dilengkapi dengan timer yang dapat membantu Anda dalam menuangkan kopi yang akan digunakan. Hal tersebut akan membantu Anda mendapatkan takaran kopi yang benar-benar sesuai dengan yang Anda butuhkan. Kelebihan yang dimiliki oleh timbangan tersebut pasti tak akan membuat Anda ragu untuk membeli produk tersebut. Timbangan dengan skala terkecil satu angka di belakang koma (0,1 gram) yang dilengkapi timer akan semakin memudahkan Anda untuk mendapatkan takaran kopi yang sesuai dengan yang Anda butuhkan.', 'timbangan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(12) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `struk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `username`, `grandtotal`, `status`, `struk`) VALUES
(1, '2020-05-10 04:15:29', 'raf', 18000, 0, 'index.jpg'),
(2, '2020-05-11 14:19:25', 'angga', 280000, 0, 'adat2.png'),
(3, '2020-05-11 14:53:52', 'angga', 315000, 0, 'fuck.png'),
(4, '2020-05-11 15:00:52', 'angga', 625000, 0, 'cad.jpg'),
(5, '2020-05-30 15:39:42', 'indra', 735000, 0, 'excel2.png'),
(6, '2020-06-06 16:59:43', 'angga', 1110000, 2, 'transfer.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `username` (`username`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_kirim`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
