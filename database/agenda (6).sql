  -- phpMyAdmin SQL Dump
  -- version 5.2.1
  -- https://www.phpmyadmin.net/
  --
  -- Host: 127.0.0.1
  -- Waktu pembuatan: 07 Des 2023 pada 14.23
  -- Versi server: 10.4.28-MariaDB
  -- Versi PHP: 8.2.4

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Database: `agenda`
  --

  -- --------------------------------------------------------

  --
  -- Struktur dari tabel `agenda`
  --

  CREATE TABLE `agenda` (
    `id_rapat` int(11) NOT NULL,
    `judul_rapat` varchar(255) NOT NULL,
    `tanggal` date NOT NULL,
    `waktu` time NOT NULL,
    `pimpinan_rapat` varchar(255) NOT NULL,
    `tempat` varchar(255) NOT NULL,
    `hasil_rapat` text NOT NULL,
    `undangan` varchar(100) NOT NULL,
    `dokumentasi` varchar(100) NOT NULL,
    `presensi` varchar(100) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

  --
  -- Dumping data untuk tabel `agenda`
  --

  INSERT INTO `agenda` (`id_rapat`, `judul_rapat`, `tanggal`, `waktu`, `pimpinan_rapat`, `tempat`, `hasil_rapat`, `undangan`, `dokumentasi`, `presensi`) VALUES
  (2, 'Rapat Meja Segitiga', '2022-09-01', '15:27:16', 'Pak moko', 'Vokasi Dieng', '', '', '', ''),
  (3, 'Rapat Pleno', '2023-12-28', '10:00:00', 'Maulid Rifky Munajat ', 'Dieng', '', '', '', ''),
  (4, 'Rapat Rapatan', '2023-12-30', '19:48:00', 'kkk', 'Rumah', '', '', '', ''),
  (5, 'Rapat', '2023-12-22', '14:23:00', 'Maulid Rifky Munajat ', 'Asrikaton', '', '', '', '');

  --
  -- Indexes for dumped tables
  --

  --
  -- Indeks untuk tabel `agenda`
  --
  ALTER TABLE `agenda`
    ADD PRIMARY KEY (`id_rapat`);

  --
  -- AUTO_INCREMENT untuk tabel yang dibuang
  --

  --
  -- AUTO_INCREMENT untuk tabel `agenda`
  --
  ALTER TABLE `agenda`
    MODIFY `id_rapat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
