-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Okt 2016 pada 12.38
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pesanan` (
`id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `produk_id`, `qty`, `pesanan_id`) VALUES
(8, 3, 41, 17),
(9, 2, 40, 17),
(10, 3, 40, 18),
(11, 1, 40, 19),
(12, 2, 40, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_pembayaran`
--

CREATE TABLE IF NOT EXISTS `info_pembayaran` (
`id` int(11) NOT NULL,
  `info` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_pembayaran`
--

INSERT INTO `info_pembayaran` (`id`, `info`) VALUES
(1, 'Transaksi pembayaran bisa di bayar DP 50% dulu sebelum hari H.\r\njika tidak maka transaksi akan di batalkan .\r\n\r\nPembayaran Transaksi Bisa Melalui Rekening Di Bawah Ini\r\nBRI => 660192839102938 a/n Muhammad Rifqi\r\n\r\nkemudian konfirmasi pembayaran bisa di menu pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
`id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`, `deskripsi`) VALUES
(6, 'Beverages', ''),
(7, 'Steak', ''),
(8, 'Drinks', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(200) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `subjek`, `pesan`) VALUES
(2, 'Delvia', 'delvia@gmail.com', 'tos', 'tis'),
(7, '', 'putri@gmail.com', '', ''),
(8, '', 'putri@gmail.com', '', ''),
(9, '', 'mshodiqul@gmail.com', '', ''),
(10, '', 'mshodiqul@gmail.com', '', ''),
(11, '', 'mshodiqul@gmail.com', '', ''),
(12, '', 'mshodiqul@gmail.com', '', ''),
(13, '', 'mshodiqul@gmail.com', '', ''),
(14, '', 'mshodiqul@gmail.com', '', ''),
(15, '', 'meryayu@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`, `ongkir`) VALUES
(2, 'Semarang', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
`id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('pending','verified','','') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pesanan`, `id_user`, `file`, `total`, `status`, `keterangan`, `created_at`) VALUES
(3, 17, 4, '49eb6a44db57cba8d66b3404fa9f0ad45.jpg', 200000, 'verified', 'Contoh Pembayaran', '0000-00-00 00:00:00'),
(4, 17, 4, '49eb6a44db57cba8d66b3404fa9f0ad46.jpg', 200000, 'verified', 'Pembayaran Ke Dua', '2016-09-30 15:58:35'),
(5, 17, 4, '49eb6a44db57cba8d66b3404fa9f0ad46.jpg', 107500, 'verified', 'Terakhir', '2016-09-30 16:10:33'),
(6, 18, 4, '49eb6a44db57cba8d66b3404fa9f0ad46.jpg', 300000, 'verified', 'Bukti Pembayaran', '2016-09-30 16:16:32'),
(7, 18, 4, '49eb6a44db57cba8d66b3404fa9f0ad44.jpg', 40000, 'verified', 'Pembayaran Terakhir', '2016-09-30 16:24:01'),
(8, 19, 4, '49eb6a44db57cba8d66b3404fa9f0ad4buttons.png', 520000, 'verified', 'Bukti Pembayaran', '2016-09-30 16:34:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
`id` int(5) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `tanggal_digunakan` datetime NOT NULL,
  `user_id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `read` enum('0','1') NOT NULL,
  `status` enum('lunas','belum lunas','','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal_pesan`, `tanggal_digunakan`, `user_id`, `nama`, `alamat`, `kota`, `ongkir`, `telephone`, `read`, `status`) VALUES
(17, '2016-09-30 08:27:51', '2016-10-04 07:00:00', 4, 'Shodiqul Muzaki', 'karangasem', 'Semarang', 40000, '087717495260', '1', 'lunas'),
(18, '2016-09-30 11:15:02', '2016-10-05 08:02:00', 4, 'Shodiqul Muzaki', 'karangasem', 'Semarang', 40000, '087717495260', '1', 'lunas'),
(19, '2016-09-30 11:34:22', '2016-10-07 07:00:00', 4, 'Shodiqul Muzaki', 'karangasem', 'Semarang', 40000, '087717495260', '1', 'lunas'),
(20, '2016-10-03 04:53:05', '2016-10-11 09:00:00', 5, 'Mery Ayu Nurita', 'Semarang aja', 'Semarang', 40000, '089688899260', '1', 'belum lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `kategori_produk_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `gambar`, `harga`, `kategori_produk_id`) VALUES
(1, 'Steak Arab', 'asdasdasd', '49eb6a44db57cba8d66b3404fa9f0ad4p1.jpg', '12000', 7),
(2, 'Teh Botol Sosro', 'minuman sehat menyegarkan', '49eb6a44db57cba8d66b3404fa9f0ad4p2.jpg', '4000', 8),
(3, 'Fruit Salad Spesial', 'Fruid salad spesial ', '49eb6a44db57cba8d66b3404fa9f0ad4p3.jpg', '7500', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('user','admin') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `telephone`, `alamat`, `password`, `status`) VALUES
(1, 'Administrator', 'admin@gmail.com', '08985432330', 'Semarang Ajah', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Jokowi', 'joko@gmail.com', '08985432330', 'jakarta 1', '7d00ff54a263fe80825b9297804a982c', 'user'),
(3, 'Putri Delvia', 'putri@gmail.com', '08985432330', 'semarang selatan', '82682943a05de360abb183236c632bd6', 'user'),
(4, 'Shodiqul Muzaki', 'mshodiqul@gmail.com', '087717495260', 'karangasem', 'a63ae42a413740542ce47bb20a124438', 'user'),
(5, 'Mery Ayu Nurita', 'meryayu@gmail.com', '089688899260', 'Semarang aja', 'a63ae42a413740542ce47bb20a124438', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
 ADD PRIMARY KEY (`id`,`produk_id`,`pesanan_id`), ADD KEY `pesanan_id` (`pesanan_id`), ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `info_pembayaran`
--
ALTER TABLE `info_pembayaran`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
 ADD PRIMARY KEY (`id`,`user_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id`,`kategori_produk_id`), ADD KEY `kategori_produk_id` (`kategori_produk_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `info_pembayaran`
--
ALTER TABLE `info_pembayaran`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detail_pesanan_ibfk_3` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_produk_id`) REFERENCES `kategori_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
