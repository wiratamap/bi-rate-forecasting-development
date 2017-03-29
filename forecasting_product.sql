-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Mar 2017 pada 05.33
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forecasting_product`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fp_data_training`
--

CREATE TABLE IF NOT EXISTS `fp_data_training` (
  `uuid_fp_data_training` varchar(255) NOT NULL,
  `bi_rate` double NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `tahun` year(4) NOT NULL,
  `dtm_crt` datetime DEFAULT NULL,
  `dtm_upd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fp_data_training`
--

INSERT INTO `fp_data_training` (`uuid_fp_data_training`, `bi_rate`, `bulan`, `tahun`, `dtm_crt`, `dtm_upd`) VALUES
('50c38025-089e-11e7-95ef-c454448293a1', 0.085, 7, 2005, '2017-03-14 17:09:31', NULL),
('50c3ad38-089e-11e7-95ef-c454448293a1', 0.0875, 8, 2005, '2017-03-14 17:09:31', NULL),
('50c3ae61-089e-11e7-95ef-c454448293a1', 0.1, 9, 2005, '2017-03-14 17:09:31', NULL),
('50c3aeb2-089e-11e7-95ef-c454448293a1', 0.11, 10, 2005, '2017-03-14 17:09:31', NULL),
('50c3aef3-089e-11e7-95ef-c454448293a1', 0.1225, 11, 2005, '2017-03-14 17:09:31', NULL),
('50c3af29-089e-11e7-95ef-c454448293a1', 0.1275, 12, 2005, '2017-03-14 17:09:31', NULL),
('799be147-08a2-11e7-95ef-c454448293a1', 0.1275, 1, 2006, '2017-03-14 17:39:17', NULL),
('799faf91-08a2-11e7-95ef-c454448293a1', 0.1275, 2, 2006, '2017-03-14 17:39:17', NULL),
('799fb0d0-08a2-11e7-95ef-c454448293a1', 0.1275, 3, 2006, '2017-03-14 17:39:17', NULL),
('799fb111-08a2-11e7-95ef-c454448293a1', 0.1275, 4, 2006, '2017-03-14 17:39:17', NULL),
('799fb14c-08a2-11e7-95ef-c454448293a1', 0.125, 5, 2006, '2017-03-14 17:39:17', NULL),
('799fb182-08a2-11e7-95ef-c454448293a1', 0.125, 6, 2006, '2017-03-14 17:39:17', NULL),
('799fb1b8-08a2-11e7-95ef-c454448293a1', 0.1225, 7, 2006, '2017-03-14 17:39:17', NULL),
('799fb1f4-08a2-11e7-95ef-c454448293a1', 0.1175, 8, 2006, '2017-03-14 17:39:17', NULL),
('799fb245-08a2-11e7-95ef-c454448293a1', 0.1125, 9, 2006, '2017-03-14 17:39:17', NULL),
('799fb27b-08a2-11e7-95ef-c454448293a1', 0.1075, 10, 2006, '2017-03-14 17:39:17', NULL),
('799fb2f2-08a2-11e7-95ef-c454448293a1', 0.1025, 11, 2006, '2017-03-14 17:39:17', NULL),
('799fb32d-08a2-11e7-95ef-c454448293a1', 0.0975, 12, 2006, '2017-03-14 17:39:17', NULL),
('799fb389-08a2-11e7-95ef-c454448293a1', 0.095, 1, 2007, '2017-03-14 17:39:17', NULL),
('799fb3bf-08a2-11e7-95ef-c454448293a1', 0.0925, 2, 2007, '2017-03-14 17:39:17', NULL),
('799fb3f5-08a2-11e7-95ef-c454448293a1', 0.09, 3, 2007, '2017-03-14 17:39:17', NULL),
('799fb425-08a2-11e7-95ef-c454448293a1', 0.09, 4, 2007, '2017-03-14 17:39:17', NULL),
('799fb45c-08a2-11e7-95ef-c454448293a1', 0.0875, 5, 2007, '2017-03-14 17:39:17', NULL),
('799fb492-08a2-11e7-95ef-c454448293a1', 0.085, 6, 2007, '2017-03-14 17:39:17', NULL),
('799fb4c8-08a2-11e7-95ef-c454448293a1', 0.0825, 7, 2007, '2017-03-14 17:39:17', NULL),
('799fb4f8-08a2-11e7-95ef-c454448293a1', 0.0825, 8, 2007, '2017-03-14 17:39:17', NULL),
('799fb529-08a2-11e7-95ef-c454448293a1', 0.0825, 9, 2007, '2017-03-14 17:39:17', NULL),
('799fb559-08a2-11e7-95ef-c454448293a1', 0.0825, 10, 2007, '2017-03-14 17:39:17', NULL),
('799fb58f-08a2-11e7-95ef-c454448293a1', 0.0825, 11, 2007, '2017-03-14 17:39:17', NULL),
('799fb5c5-08a2-11e7-95ef-c454448293a1', 0.08, 12, 2007, '2017-03-14 17:39:17', NULL),
('799fb5f6-08a2-11e7-95ef-c454448293a1', 0.08, 1, 2008, '2017-03-14 17:39:17', NULL),
('799fb62c-08a2-11e7-95ef-c454448293a1', 0.08, 2, 2008, '2017-03-14 17:39:17', NULL),
('799fb662-08a2-11e7-95ef-c454448293a1', 0.08, 3, 2008, '2017-03-14 17:39:17', NULL),
('799fb698-08a2-11e7-95ef-c454448293a1', 0.08, 4, 2008, '2017-03-14 17:39:17', NULL),
('799fb6ce-08a2-11e7-95ef-c454448293a1', 0.0825, 5, 2008, '2017-03-14 17:39:17', NULL),
('799fb6ff-08a2-11e7-95ef-c454448293a1', 0.085, 6, 2008, '2017-03-14 17:39:17', NULL),
('799fb735-08a2-11e7-95ef-c454448293a1', 0.0875, 7, 2008, '2017-03-14 17:39:17', NULL),
('799fb76b-08a2-11e7-95ef-c454448293a1', 0.09, 8, 2008, '2017-03-14 17:39:17', NULL),
('799fb79b-08a2-11e7-95ef-c454448293a1', 0.0925, 9, 2008, '2017-03-14 17:39:17', NULL),
('799fb7d1-08a2-11e7-95ef-c454448293a1', 0.095, 10, 2008, '2017-03-14 17:39:17', NULL),
('799fb807-08a2-11e7-95ef-c454448293a1', 0.095, 11, 2008, '2017-03-14 17:39:17', NULL),
('799fb833-08a2-11e7-95ef-c454448293a1', 0.095, 12, 2008, '2017-03-14 17:39:17', NULL),
('799fb863-08a2-11e7-95ef-c454448293a1', 0.0875, 1, 2009, '2017-03-14 17:39:17', NULL),
('799fb894-08a2-11e7-95ef-c454448293a1', 0.0825, 2, 2009, '2017-03-14 17:39:17', NULL),
('799fb8ca-08a2-11e7-95ef-c454448293a1', 0.0775, 3, 2009, '2017-03-14 17:39:17', NULL),
('799fb8fb-08a2-11e7-95ef-c454448293a1', 0.075, 4, 2009, '2017-03-14 17:39:17', NULL),
('799fb926-08a2-11e7-95ef-c454448293a1', 0.0725, 5, 2009, '2017-03-14 17:39:17', NULL),
('799fb956-08a2-11e7-95ef-c454448293a1', 0.07, 6, 2009, '2017-03-14 17:39:17', NULL),
('799fb98c-08a2-11e7-95ef-c454448293a1', 0.0675, 7, 2009, '2017-03-14 17:39:17', NULL),
('799fb9b8-08a2-11e7-95ef-c454448293a1', 0.065, 8, 2009, '2017-03-14 17:39:17', NULL),
('799fb9e8-08a2-11e7-95ef-c454448293a1', 0.065, 9, 2009, '2017-03-14 17:39:17', NULL),
('799fba19-08a2-11e7-95ef-c454448293a1', 0.065, 10, 2009, '2017-03-14 17:39:17', NULL),
('799fba4f-08a2-11e7-95ef-c454448293a1', 0.065, 11, 2009, '2017-03-14 17:39:17', NULL),
('799fba7f-08a2-11e7-95ef-c454448293a1', 0.065, 12, 2009, '2017-03-14 17:39:17', NULL),
('799fbaab-08a2-11e7-95ef-c454448293a1', 0.065, 1, 2010, '2017-03-14 17:39:17', NULL),
('799fbae1-08a2-11e7-95ef-c454448293a1', 0.065, 2, 2010, '2017-03-14 17:39:17', NULL),
('799fbb11-08a2-11e7-95ef-c454448293a1', 0.065, 3, 2010, '2017-03-14 17:39:17', NULL),
('799fbb42-08a2-11e7-95ef-c454448293a1', 0.065, 4, 2010, '2017-03-14 17:39:17', NULL),
('799fbb73-08a2-11e7-95ef-c454448293a1', 0.065, 5, 2010, '2017-03-14 17:39:17', NULL),
('799fbba3-08a2-11e7-95ef-c454448293a1', 0.065, 6, 2010, '2017-03-14 17:39:17', NULL),
('799fbbd4-08a2-11e7-95ef-c454448293a1', 0.065, 7, 2010, '2017-03-14 17:39:17', NULL),
('799fbbff-08a2-11e7-95ef-c454448293a1', 0.065, 8, 2010, '2017-03-14 17:39:17', NULL),
('799fbc30-08a2-11e7-95ef-c454448293a1', 0.065, 9, 2010, '2017-03-14 17:39:17', NULL),
('799fbc60-08a2-11e7-95ef-c454448293a1', 0.065, 10, 2010, '2017-03-14 17:39:17', NULL),
('799fbc91-08a2-11e7-95ef-c454448293a1', 0.065, 11, 2010, '2017-03-14 17:39:17', NULL),
('799fbcc1-08a2-11e7-95ef-c454448293a1', 0.065, 12, 2010, '2017-03-14 17:39:17', NULL),
('799fbcf2-08a2-11e7-95ef-c454448293a1', 0.065, 1, 2011, '2017-03-14 17:39:17', NULL),
('799fbd23-08a2-11e7-95ef-c454448293a1', 0.0675, 2, 2011, '2017-03-14 17:39:17', NULL),
('799fbd53-08a2-11e7-95ef-c454448293a1', 0.0675, 3, 2011, '2017-03-14 17:39:17', NULL),
('799fbd84-08a2-11e7-95ef-c454448293a1', 0.0675, 4, 2011, '2017-03-14 17:39:17', NULL),
('799fbdb5-08a2-11e7-95ef-c454448293a1', 0.0675, 5, 2011, '2017-03-14 17:39:17', NULL),
('799fbde5-08a2-11e7-95ef-c454448293a1', 0.0675, 6, 2011, '2017-03-14 17:39:17', NULL),
('799fbe16-08a2-11e7-95ef-c454448293a1', 0.0675, 7, 2011, '2017-03-14 17:39:17', NULL),
('799fbe46-08a2-11e7-95ef-c454448293a1', 0.0675, 8, 2011, '2017-03-14 17:39:17', NULL),
('799fbe7c-08a2-11e7-95ef-c454448293a1', 0.0675, 9, 2011, '2017-03-14 17:39:17', NULL),
('799fbead-08a2-11e7-95ef-c454448293a1', 0.065, 10, 2011, '2017-03-14 17:39:17', NULL),
('799fbede-08a2-11e7-95ef-c454448293a1', 0.06, 11, 2011, '2017-03-14 17:39:17', NULL),
('799fbf0e-08a2-11e7-95ef-c454448293a1', 0.06, 12, 2011, '2017-03-14 17:39:17', NULL),
('799fbf3f-08a2-11e7-95ef-c454448293a1', 0.06, 1, 2012, '2017-03-14 17:39:17', NULL),
('799fbf70-08a2-11e7-95ef-c454448293a1', 0.0575, 2, 2012, '2017-03-14 17:39:17', NULL),
('799fbfa0-08a2-11e7-95ef-c454448293a1', 0.0575, 3, 2012, '2017-03-14 17:39:17', NULL),
('799fbfd1-08a2-11e7-95ef-c454448293a1', 0.0575, 4, 2012, '2017-03-14 17:39:17', NULL),
('799fc001-08a2-11e7-95ef-c454448293a1', 0.0575, 5, 2012, '2017-03-14 17:39:17', NULL),
('799fc032-08a2-11e7-95ef-c454448293a1', 0.0575, 6, 2012, '2017-03-14 17:39:17', NULL),
('799fc063-08a2-11e7-95ef-c454448293a1', 0.0575, 7, 2012, '2017-03-14 17:39:17', NULL),
('799fc093-08a2-11e7-95ef-c454448293a1', 0.0575, 8, 2012, '2017-03-14 17:39:17', NULL),
('799fc0be-08a2-11e7-95ef-c454448293a1', 0.0575, 9, 2012, '2017-03-14 17:39:17', NULL),
('799fc0ef-08a2-11e7-95ef-c454448293a1', 0.0575, 10, 2012, '2017-03-14 17:39:17', NULL),
('799fc120-08a2-11e7-95ef-c454448293a1', 0.0575, 11, 2012, '2017-03-14 17:39:17', NULL),
('799fc150-08a2-11e7-95ef-c454448293a1', 0.0575, 12, 2012, '2017-03-14 17:39:17', NULL),
('799fc181-08a2-11e7-95ef-c454448293a1', 0.0575, 1, 2013, '2017-03-14 17:39:17', NULL),
('799fc1b2-08a2-11e7-95ef-c454448293a1', 0.0575, 2, 2013, '2017-03-14 17:39:17', NULL),
('799fc1e2-08a2-11e7-95ef-c454448293a1', 0.0575, 3, 2013, '2017-03-14 17:39:17', NULL),
('799fc218-08a2-11e7-95ef-c454448293a1', 0.0575, 4, 2013, '2017-03-14 17:39:17', NULL),
('799fc249-08a2-11e7-95ef-c454448293a1', 0.0575, 5, 2013, '2017-03-14 17:39:17', NULL),
('799fc279-08a2-11e7-95ef-c454448293a1', 0.06, 6, 2013, '2017-03-14 17:39:17', NULL),
('799fc2aa-08a2-11e7-95ef-c454448293a1', 0.065, 7, 2013, '2017-03-14 17:39:17', NULL),
('799fc2e0-08a2-11e7-95ef-c454448293a1', 0.07, 8, 2013, '2017-03-14 17:39:17', NULL),
('799fc311-08a2-11e7-95ef-c454448293a1', 0.0725, 9, 2013, '2017-03-14 17:39:17', NULL),
('799fc341-08a2-11e7-95ef-c454448293a1', 0.0725, 10, 2013, '2017-03-14 17:39:17', NULL),
('799fc372-08a2-11e7-95ef-c454448293a1', 0.075, 11, 2013, '2017-03-14 17:39:17', NULL),
('799fc3a3-08a2-11e7-95ef-c454448293a1', 0.075, 12, 2013, '2017-03-14 17:39:17', NULL),
('799fc3d3-08a2-11e7-95ef-c454448293a1', 0.075, 1, 2014, '2017-03-14 17:39:17', NULL),
('799fc404-08a2-11e7-95ef-c454448293a1', 0.075, 2, 2014, '2017-03-14 17:39:17', NULL),
('799fc43a-08a2-11e7-95ef-c454448293a1', 0.075, 3, 2014, '2017-03-14 17:39:17', NULL),
('799fc465-08a2-11e7-95ef-c454448293a1', 0.075, 4, 2014, '2017-03-14 17:39:17', NULL),
('799fc49b-08a2-11e7-95ef-c454448293a1', 0.075, 5, 2014, '2017-03-14 17:39:17', NULL),
('799fc4c6-08a2-11e7-95ef-c454448293a1', 0.075, 6, 2014, '2017-03-14 17:39:17', NULL),
('799fc4f7-08a2-11e7-95ef-c454448293a1', 0.075, 7, 2014, '2017-03-14 17:39:17', NULL),
('799fc527-08a2-11e7-95ef-c454448293a1', 0.075, 8, 2014, '2017-03-14 17:39:17', NULL),
('799fc558-08a2-11e7-95ef-c454448293a1', 0.075, 9, 2014, '2017-03-14 17:39:17', NULL),
('799fc589-08a2-11e7-95ef-c454448293a1', 0.075, 10, 2014, '2017-03-14 17:39:17', NULL),
('799fc5bf-08a2-11e7-95ef-c454448293a1', 0.0775, 11, 2014, '2017-03-14 17:39:17', NULL),
('799fc5ef-08a2-11e7-95ef-c454448293a1', 0.0775, 12, 2014, '2017-03-14 17:39:17', NULL),
('799fc620-08a2-11e7-95ef-c454448293a1', 0.0775, 1, 2015, '2017-03-14 17:39:17', NULL),
('799fc651-08a2-11e7-95ef-c454448293a1', 0.075, 2, 2015, '2017-03-14 17:39:17', NULL),
('799fc681-08a2-11e7-95ef-c454448293a1', 0.075, 3, 2015, '2017-03-14 17:39:17', NULL),
('799fc6b2-08a2-11e7-95ef-c454448293a1', 0.075, 4, 2015, '2017-03-14 17:39:17', NULL),
('799fc6e2-08a2-11e7-95ef-c454448293a1', 0.075, 5, 2015, '2017-03-14 17:39:17', NULL),
('799fc713-08a2-11e7-95ef-c454448293a1', 0.075, 6, 2015, '2017-03-14 17:39:17', NULL),
('799fc744-08a2-11e7-95ef-c454448293a1', 0.075, 7, 2015, '2017-03-14 17:39:17', NULL),
('799fc774-08a2-11e7-95ef-c454448293a1', 0.075, 8, 2015, '2017-03-14 17:39:17', NULL),
('799fc7a5-08a2-11e7-95ef-c454448293a1', 0.075, 9, 2015, '2017-03-14 17:39:17', NULL),
('799fc7d6-08a2-11e7-95ef-c454448293a1', 0.075, 10, 2015, '2017-03-14 17:39:17', NULL),
('799fc806-08a2-11e7-95ef-c454448293a1', 0.0775, 11, 2015, '2017-03-14 17:39:17', NULL),
('799fc831-08a2-11e7-95ef-c454448293a1', 0.0775, 12, 2015, '2017-03-14 17:39:17', NULL),
('799fc862-08a2-11e7-95ef-c454448293a1', 0.0725, 1, 2016, '2017-03-14 17:39:17', NULL),
('799fc893-08a2-11e7-95ef-c454448293a1', 0.07, 2, 2016, '2017-03-14 17:39:17', NULL),
('799fc8c3-08a2-11e7-95ef-c454448293a1', 0.0675, 3, 2016, '2017-03-14 17:39:17', NULL),
('799fc9a6-08a2-11e7-95ef-c454448293a1', 0.0675, 4, 2016, '2017-03-14 17:39:17', NULL),
('799fc9dc-08a2-11e7-95ef-c454448293a1', 0.0675, 5, 2016, '2017-03-14 17:39:17', NULL),
('799fca18-08a2-11e7-95ef-c454448293a1', 0.0675, 6, 2016, '2017-03-14 17:39:17', NULL),
('799fca5e-08a2-11e7-95ef-c454448293a1', 0.065, 7, 2016, '2017-03-14 17:39:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fp_data_uji`
--

CREATE TABLE IF NOT EXISTS `fp_data_uji` (
  `uuid_fp_data_uji` varchar(255) NOT NULL,
  `bi_rate` double NOT NULL,
  `bulan` tinyint(4) NOT NULL,
  `tahun` year(4) NOT NULL,
  `dtm_crt` datetime DEFAULT NULL,
  `dtm_upd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fp_data_uji`
--

INSERT INTO `fp_data_uji` (`uuid_fp_data_uji`, `bi_rate`, `bulan`, `tahun`, `dtm_crt`, `dtm_upd`) VALUES
('ff4a1bd5-08b9-11e7-be2c-c454448293a1', 0.08, 1, 2008, '2017-03-14 20:27:40', NULL),
('ff4bca1c-08b9-11e7-be2c-c454448293a1', 0.08, 2, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcb50-08b9-11e7-be2c-c454448293a1', 0.08, 3, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcba7-08b9-11e7-be2c-c454448293a1', 0.08, 4, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcbe2-08b9-11e7-be2c-c454448293a1', 0.0825, 5, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcc18-08b9-11e7-be2c-c454448293a1', 0.085, 6, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcc53-08b9-11e7-be2c-c454448293a1', 0.0875, 7, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcc89-08b9-11e7-be2c-c454448293a1', 0.09, 8, 2008, '2017-03-14 20:27:40', NULL),
('ff4bccbf-08b9-11e7-be2c-c454448293a1', 0.0925, 9, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcd0b-08b9-11e7-be2c-c454448293a1', 0.095, 10, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcd87-08b9-11e7-be2c-c454448293a1', 0.095, 11, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcdbd-08b9-11e7-be2c-c454448293a1', 0.095, 12, 2008, '2017-03-14 20:27:40', NULL),
('ff4bcdf3-08b9-11e7-be2c-c454448293a1', 0.0875, 1, 2009, '2017-03-14 20:27:40', NULL),
('ff4bce55-08b9-11e7-be2c-c454448293a1', 0.0825, 2, 2009, '2017-03-14 20:27:40', NULL),
('ff4bce8b-08b9-11e7-be2c-c454448293a1', 0.0775, 3, 2009, '2017-03-14 20:27:40', NULL),
('ff4bcebb-08b9-11e7-be2c-c454448293a1', 0.075, 4, 2009, '2017-03-14 20:27:40', NULL),
('ff4bceec-08b9-11e7-be2c-c454448293a1', 0.0725, 5, 2009, '2017-03-14 20:27:40', NULL),
('ff4bcf22-08b9-11e7-be2c-c454448293a1', 0.07, 6, 2009, '2017-03-14 20:27:40', NULL),
('ff4bcf58-08b9-11e7-be2c-c454448293a1', 0.0675, 7, 2009, '2017-03-14 20:27:40', NULL),
('ff4bcf89-08b9-11e7-be2c-c454448293a1', 0.065, 8, 2009, '2017-03-14 20:27:40', NULL),
('ff4bcfc4-08b9-11e7-be2c-c454448293a1', 0.065, 9, 2009, '2017-03-14 20:27:40', NULL),
('ff4bcff5-08b9-11e7-be2c-c454448293a1', 0.065, 10, 2009, '2017-03-14 20:27:40', NULL),
('ff4bd030-08b9-11e7-be2c-c454448293a1', 0.065, 11, 2009, '2017-03-14 20:27:40', NULL),
('ff4bd06b-08b9-11e7-be2c-c454448293a1', 0.065, 12, 2009, '2017-03-14 20:27:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_general_settings`
--

CREATE TABLE IF NOT EXISTS `ms_general_settings` (
  `uuid_ms_general_settings` varchar(255) NOT NULL,
  `gs_code` varchar(30) NOT NULL,
  `gs_value` varchar(15) NOT NULL,
  `dtm_crt` datetime DEFAULT NULL,
  `dtm_upd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_general_settings`
--

INSERT INTO `ms_general_settings` (`uuid_ms_general_settings`, `gs_code`, `gs_value`, `dtm_crt`, `dtm_upd`) VALUES
('8782fd9a-10fb-11e7-ba67-c454448293a1', 'PRM1_APPVERSION', '1.1.3', '2017-03-25 08:36:55', '2017-03-25 12:15:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_mail`
--

CREATE TABLE IF NOT EXISTS `ms_mail` (
  `uuid_ms_mail` varchar(255) NOT NULL,
  `uuid_ms_user_sender` varchar(255) NOT NULL,
  `uuid_ms_user_receiver` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `body` longtext NOT NULL,
  `dtm_send` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_mail`
--

INSERT INTO `ms_mail` (`uuid_ms_mail`, `uuid_ms_user_sender`, `uuid_ms_user_receiver`, `subject`, `body`, `dtm_send`) VALUES
('2c9805c9-1227-11e7-83e8-c454448293a1', '08058593-06bc-11e7-88db-c454448293a1', 'b962cda3-1105-11e7-ba67-c454448293a1', 'Ingin bertanya', '<p>Selamat siang bu, saya ingin bertanya mengenai dengan metode</p><p><br></p><p>Apakah bisa saya bertanya ya? kalau ga bisa gapapa bu</p>', '2017-03-26 20:21:51'),
('3c3fd94e-1226-11e7-83e8-c454448293a1', '08058593-06bc-11e7-88db-c454448293a1', '094659d8-0865-11e7-ab84-c454448293a1', 'Apakah benar?', '\r\nApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jombloApakah benar anda ini jomblo', '2017-03-26 20:15:08'),
('46b33c27-11d1-11e7-8ed1-c454448293a1', 'f3fb22b3-0864-11e7-ab84-c454448293a1', '08058593-06bc-11e7-88db-c454448293a1', 'Banyak Issue', 'Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. Selamat pagi salam sejahtera untuk kita semua. <br><br>', '2017-03-26 10:06:59'),
('56ab90a3-11d3-11e7-8ed1-c454448293a1', '27f66226-08ba-11e7-be2c-c454448293a1', '08058593-06bc-11e7-88db-c454448293a1', 'Hasil peramalan error', 'Assalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? <br>\r\n\r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? \r\nAssalaumalaikum, saya ingin bertanya mengapa hasil peramalan error ya? ', '2017-03-26 10:21:44'),
('86875418-13a0-11e7-b587-c454448293a1', '08058593-06bc-11e7-88db-c454448293a1', '080597de-06bc-11e7-88db-c454448293a1', 'Ingin bimbingan', '<h1>Salam sejahtera untuk kita semua</h1><p>Saya ingin bimbingan besok pada pukul 8.00 bu, terima kasih atas perhatiannya<br></p>', '2017-03-28 17:23:03'),
('9157720c-1226-11e7-83e8-c454448293a1', '08058593-06bc-11e7-88db-c454448293a1', 'b036567b-0863-11e7-ab84-c454448293a1', 'Ingin minta tolong', 'selamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n<br></p><p><br></p><p>\r\n\r\n??selamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n\r\n\r\nselamat pagi, saya ingin menginformasikan bahwa\r\n\r\n<br></p>', '2017-03-26 20:17:31'),
('abf679e9-142f-11e7-b19c-c454448293a1', '08058593-06bc-11e7-88db-c454448293a1', 'ed96213a-0863-11e7-ab84-c454448293a1', 'Tanda terima', '<h2>Selamat siang</h2><p>\r\n\r\n</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur semper magna, hendrerit interdum diam luctus sit amet. Vestibulum vel facilisis eros, sed tristique erat. Aenean porttitor lorem a ipsum tempus mattis. Quisque eget dolor sodales, gravida lectus a, faucibus tortor. Nunc a risus diam. In pretium, dui vel molestie tempor, purus velit molestie est, a cursus massa nisl et libero. Mauris mauris elit, euismod eu eros eu, gravida ultrices dui. Donec non metus eget ex lobortis porttitor. Duis tristique, sapien in condimentum aliquam, diam velit consequat purus, vel varius elit augue et ante. Cras congue viverra velit at cursus. Curabitur eu dictum velit. Praesent velit lorem, fringilla non bibendum non, molestie id nisl. Donec et turpis nisi.</p><p>Curabitur lobortis rutrum rutrum. Praesent nisl massa, dictum ut odio id, bibendum accumsan sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent id euismod ante, a placerat velit. Praesent vel ex nec nisi porttitor tempor. Praesent eleifend scelerisque elit et eleifend. Proin dignissim convallis consequat. Vestibulum tristique dictum condimentum. Nulla facilisi.</p><p>Donec augue sapien, hendrerit ut laoreet et, commodo sit amet leo. Aenean nec consectetur tellus. Sed porta pulvinar massa, ut egestas purus aliquam quis. In non lectus sagittis, pharetra lacus in, eleifend nisl. Nulla vel mollis mauris. Nunc ut quam vulputate, dignissim tortor eget, ultrices mauris. Nullam eu bibendum elit, aliquet mollis nibh. Aliquam sed congue urna. Donec justo enim, finibus sit amet odio ac, aliquam convallis lacus.</p><p>Curabitur efficitur tortor imperdiet, feugiat mauris nec, dignissim magna. In nisl ipsum, lacinia sed nisl vitae, efficitur finibus felis. Sed pulvinar ultrices lectus, vel efficitur felis volutpat eget. Nullam ac lectus mauris. Quisque ac nibh nisl. Curabitur tincidunt risus massa, sit amet sagittis dui convallis quis. Sed eros magna, ullamcorper at finibus at, tempus in augue. Praesent lobortis dui id suscipit ultrices. Donec blandit tellus sed metus vehicula elementum. Curabitur non ex sit amet massa dapibus blandit. Phasellus lacinia, metus ut ultricies fringilla, felis dui scelerisque lorem, nec iaculis eros arcu eu leo. Nam ac felis et justo suscipit feugiat a eget est. Nunc sit amet nibh condimentum, fermentum massa eget, auctor urna. Morbi accumsan mauris lectus, id vulputate elit placerat quis. Curabitur non tincidunt arcu.</p><p>Donec placerat metus id orci vehicula posuere. Phasellus tincidunt tempor sapien, id dapibus nisl. Integer vel augue pharetra mauris mattis ultricies volutpat et quam. Quisque tortor sapien, cursus eget dictum id, malesuada non augue. Fusce orci nunc, fringilla non ex ut, varius pretium massa. Phasellus vitae magna vitae erat blandit commodo. Pellentesque nulla est, tempus at dignissim eget, porta ac turpis. Integer hendrerit luctus nibh ac facilisis. Praesent ut mauris cursus, ornare enim ut, sagittis turpis. Vestibulum in cursus nibh, eu malesuada diam. Integer tempus felis nec egestas aliquet. Vivamus vel faucibus ipsum. Nulla aliquam finibus erat, quis posuere tellus ultricies a. In hendrerit nunc vel augue laoreet, in malesuada augue venenatis. Duis eros turpis, faucibus nec ipsum sit amet, efficitur molestie enim.</p><p><br></p><p>Tertanda,</p><p><br></p><p><b>Admin BIF</b><br></p><p></p>', '2017-03-29 10:27:43'),
('ccf4d55c-1104-11e7-ba67-c454448293a1', '022a594f-0864-11e7-ab84-c454448293a1', '08058593-06bc-11e7-88db-c454448293a1', 'Terdapat issue pada page home', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales metus neque, nec eleifend velit aliquam ac. Aenean sed vestibulum nunc. Fusce venenatis nibh et purus viverra rutrum. Praesent ac laoreet mauris. Vestibulum egestas, nunc eu vehicula iaculis, mauris nulla lobortis enim, at iaculis est arcu id massa. Cras dui erat, commodo ac elit vel, gravida bibendum lectus. Vestibulum tincidunt, neque eget tincidunt malesuada, risus eros imperdiet sem, ut facilisis lorem mauris non lectus. Integer tristique vulputate euismod. Donec et lectus eget elit luctus ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam sed purus auctor, aliquam orci semper, volutpat erat. Quisque nibh neque, porta eget dui et, finibus elementum nisi. In tempor sed augue sit amet commodo. Cras non ligula a turpis convallis elementum non quis ipsum.<br><br>\r\n\r\nQuisque ac congue ante, quis pulvinar erat. Maecenas sodales orci consectetur lorem ullamcorper fermentum auctor non tortor. Vestibulum eget diam laoreet, rhoncus est at, laoreet lectus. Nam ornare est augue, sit amet interdum erat imperdiet nec. Praesent sit amet eros dapibus mi ornare dictum. Donec et sem odio. Nam ultrices ac mi eget gravida. Fusce hendrerit lectus vel libero mattis, vitae varius sapien euismod. Duis egestas tempus nibh sed aliquam. Sed laoreet dui felis. Integer nisi metus, tristique et nisl in, dapibus blandit sapien. Pellentesque ullamcorper hendrerit ultrices. Proin at eleifend urna. Nunc egestas pharetra ipsum eu gravida. Aenean efficitur suscipit augue id sodales.<br><br>\r\n\r\nDonec condimentum augue nisi, a vulputate eros suscipit quis. Curabitur nec diam quis est lobortis elementum. Quisque efficitur ligula a finibus sagittis. Etiam mauris nulla, mollis id urna in, euismod placerat magna. Quisque at elit ut odio placerat maximus. Nam fringilla blandit mi in rutrum. Fusce tellus est, imperdiet sit amet lobortis ultricies, feugiat in justo. Aliquam lacinia a sapien eu sodales. Phasellus a placerat neque. Cras in ligula tempus, dictum lacus cursus, semper magna. Morbi auctor viverra augue, non cursus ante malesuada sed. Fusce risus nibh, vehicula in varius sed, tincidunt non metus.<br><br>\r\n\r\nNullam molestie metus elit, ac condimentum dolor commodo quis. Vestibulum convallis nisl at aliquam feugiat. Nullam volutpat tellus et volutpat mattis. Nulla nisl eros, commodo sed fringilla sit amet, maximus in ligula. Sed efficitur magna at volutpat pretium. Aliquam sed varius nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer malesuada id risus nec vulputate. Nam accumsan semper erat, vel mollis lectus fringilla at. Nunc ac auctor metus. Pellentesque porta lacus quis ullamcorper ornare. Morbi quis urna in augue gravida mattis et vitae eros. Nam iaculis ac justo non tincidunt. Quisque tempus risus at enim tempus, sit amet finibus felis gravida. Aliquam consequat purus vitae ligula bibendum, vel maximus metus pulvinar. Vestibulum a venenatis quam, quis porta ante.<br><br>\r\n\r\nProin ligula lacus, porttitor eget mi ac, venenatis vehicula sapien. Fusce sit amet nulla lorem. Fusce consectetur orci congue ultrices tempus. Nam pharetra cursus metus, et pharetra lacus tristique non. Suspendisse vel nunc dignissim, consequat justo at, sollicitudin orci. Suspendisse convallis nulla ut ultricies porta. Morbi ut sollicitudin eros, id sagittis odio. Curabitur scelerisque tristique nulla. Vivamus molestie mollis nisl id vulputate. Etiam sollicitudin lacus vel egestas finibus. Ut non vulputate urna.<br><br>', '2017-03-25 09:40:51'),
('e5422d1f-142d-11e7-b19c-c454448293a1', '080597de-06bc-11e7-88db-c454448293a1', '08058593-06bc-11e7-88db-c454448293a1', 'Terima kasih', '<h2>Waalaikumsalam wr. wb</h2><p>Terima kasih atas perhatiannya, baik untuk bimbingan bisa dilakukan mulai besok jam 8.00 ya</p>', '2017-03-29 10:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_mail_receiver`
--

CREATE TABLE IF NOT EXISTS `ms_mail_receiver` (
  `uuid_ms_mail_receiver` varchar(255) NOT NULL,
  `uuid_ms_mail` varchar(255) NOT NULL,
  `is_viewable` varchar(5) NOT NULL DEFAULT '1',
  `is_removed` varchar(5) NOT NULL DEFAULT '0',
  `dtm_upd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_mail_receiver`
--

INSERT INTO `ms_mail_receiver` (`uuid_ms_mail_receiver`, `uuid_ms_mail`, `is_viewable`, `is_removed`, `dtm_upd`) VALUES
('2cb0fffb-1227-11e7-83e8-c454448293a1', '2c9805c9-1227-11e7-83e8-c454448293a1', '1', '0', NULL),
('2d95a409-1225-11e7-83e8-c454448293a1', '46b33c27-11d1-11e7-8ed1-c454448293a1', '1', '1', '2017-03-26 20:19:41'),
('2d95b217-1225-11e7-83e8-c454448293a1', '56ab90a3-11d3-11e7-8ed1-c454448293a1', '1', '0', NULL),
('53e74ae4-1226-11e7-83e8-c454448293a1', '3c3fd94e-1226-11e7-83e8-c454448293a1', '1', '0', NULL),
('54d7c19c-1225-11e7-83e8-c454448293a1', 'ccf4d55c-1104-11e7-ba67-c454448293a1', '1', '0', NULL),
('86979579-13a0-11e7-b587-c454448293a1', '86875418-13a0-11e7-b587-c454448293a1', '1', '0', NULL),
('ac1c6323-142f-11e7-b19c-c454448293a1', 'abf679e9-142f-11e7-b19c-c454448293a1', '1', '0', '2017-03-29 10:28:28'),
('e553d878-142d-11e7-b19c-c454448293a1', 'e5422d1f-142d-11e7-b19c-c454448293a1', '1', '0', NULL),
('fbcd184a-1226-11e7-83e8-c454448293a1', '9157720c-1226-11e7-83e8-c454448293a1', '1', '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_mail_sender`
--

CREATE TABLE IF NOT EXISTS `ms_mail_sender` (
  `uuid_ms_mail_sender` varchar(255) NOT NULL,
  `uuid_ms_mail` varchar(255) NOT NULL,
  `is_viewable` varchar(5) NOT NULL DEFAULT '1',
  `is_removed` varchar(5) NOT NULL DEFAULT '0',
  `is_drafted` varchar(5) NOT NULL DEFAULT '0',
  `dtm_upd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_mail_sender`
--

INSERT INTO `ms_mail_sender` (`uuid_ms_mail_sender`, `uuid_ms_mail`, `is_viewable`, `is_removed`, `is_drafted`, `dtm_upd`) VALUES
('2ca6c1a2-1227-11e7-83e8-c454448293a1', '2c9805c9-1227-11e7-83e8-c454448293a1', '1', '0', '0', NULL),
('4ae9ab02-1225-11e7-83e8-c454448293a1', '46b33c27-11d1-11e7-8ed1-c454448293a1', '1', '0', '0', NULL),
('4ae9b982-1225-11e7-83e8-c454448293a1', '56ab90a3-11d3-11e7-8ed1-c454448293a1', '1', '0', '0', NULL),
('4ae9c4b6-1225-11e7-83e8-c454448293a1', 'ccf4d55c-1104-11e7-ba67-c454448293a1', '1', '0', '0', NULL),
('59227981-1226-11e7-83e8-c454448293a1', '3c3fd94e-1226-11e7-83e8-c454448293a1', '1', '0', '0', NULL),
('869210a7-13a0-11e7-b587-c454448293a1', '86875418-13a0-11e7-b587-c454448293a1', '1', '0', '0', NULL),
('ac04a943-142f-11e7-b19c-c454448293a1', 'abf679e9-142f-11e7-b19c-c454448293a1', '1', '0', '0', NULL),
('e54d1880-142d-11e7-b19c-c454448293a1', 'e5422d1f-142d-11e7-b19c-c454448293a1', '1', '0', '0', NULL),
('f761e675-1226-11e7-83e8-c454448293a1', '9157720c-1226-11e7-83e8-c454448293a1', '1', '0', '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_subsystem`
--

CREATE TABLE IF NOT EXISTS `ms_subsystem` (
  `uuid_ms_subsystem` varchar(255) NOT NULL,
  `subsystem_value` varchar(20) NOT NULL,
  `subsystem_name` varchar(20) NOT NULL,
  `subsystem_desc` text NOT NULL,
  `dtm_crt` datetime NOT NULL,
  `dtm_upd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_subsystem`
--

INSERT INTO `ms_subsystem` (`uuid_ms_subsystem`, `subsystem_value`, `subsystem_name`, `subsystem_desc`, `dtm_crt`, `dtm_upd`) VALUES
('4249b7c8-06ba-11e7-88db-c454448293a1', 'ADMIN-FP', 'ADMINISTRATOR', 'ADMINISTRATOR', '2017-03-12 07:27:18', NULL),
('4249cbf4-06ba-11e7-88db-c454448293a1', 'EXPERT-FP', 'FORECASTING EXPERT', 'FORECASTING EXPERT', '2017-03-12 07:27:30', NULL),
('d8067dd0-06ba-11e7-88db-c454448293a1', 'CLIENT-FP', 'FORECASTING CLIENT', 'FORECASTING CLIENT', '2017-03-12 07:28:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
  `uuid_ms_user` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `dtm_crt` datetime DEFAULT NULL,
  `dtm_upd` datetime DEFAULT NULL,
  `uuid_ms_subsystem` varchar(255) NOT NULL,
  `is_logged_in` varchar(5) NOT NULL DEFAULT '0',
  `is_active` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_user`
--

INSERT INTO `ms_user` (`uuid_ms_user`, `username`, `password`, `full_name`, `email`, `dtm_crt`, `dtm_upd`, `uuid_ms_subsystem`, `is_logged_in`, `is_active`) VALUES
('022a594f-0864-11e7-ab84-c454448293a1', 'medcoenergi', 'd41d8cd98f00b204e9800998ecf8427e', 'Medco Energi', 'medcoenergi@gmail.com', '2017-03-14 10:12:08', '2017-03-16 22:20:14', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('08058593-06bc-11e7-88db-c454448293a1', 'wira', '5f4dcc3b5aa765d61d8327deb882cf99', 'Wiratama Paramasatya', 'wiratamaparamasatya@forecasting-product.com', '2017-03-12 07:37:11', '2017-03-12 11:27:03', '4249b7c8-06ba-11e7-88db-c454448293a1', '0', '1'),
('080597de-06bc-11e7-88db-c454448293a1', 'dianekaratnawati', '5f4dcc3b5aa765d61d8327deb882cf99', 'Dian Eka Ratnawati', 'dianekaratnawati@forecasting-product.com', '2017-03-12 07:39:16', '2017-03-12 11:27:03', '4249cbf4-06ba-11e7-88db-c454448293a1', '0', '1'),
('0805a5a1-06bc-11e7-88db-c454448293a1', 'wiratamap', '5f4dcc3b5aa765d61d8327deb882cf99', 'Wiratama Paramasatya', 'wiratamaparamasatya@gmail.com', '2017-03-12 07:37:11', '2017-03-12 11:27:03', 'd8067dd0-06ba-11e7-88db-c454448293a1', '1', '1'),
('094659d8-0865-11e7-ab84-c454448293a1', 'bursaefekindo', '0ed542b815a0d4b0c457ad9def1a21d2', 'Bursa Efek Indonesia', 'bursaefek@bei.co.id', '2017-03-14 10:19:29', '2017-03-25 12:50:19', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '0'),
('27f66226-08ba-11e7-be2c-c454448293a1', 'tokopedia', '5f4dcc3b5aa765d61d8327deb882cf99', 'PT Tokopedia', 'tokopedia@tokopedia.com', '2017-03-14 20:28:48', '2017-03-26 10:22:42', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('37dbb705-08ba-11e7-be2c-c454448293a1', 'ojkindonesia', '5f4dcc3b5aa765d61d8327deb882cf99', 'Otoritas Jasa Keuangan', 'ojkindonesia@ojk.gov.id', '2017-03-14 20:29:15', '2017-03-16 22:42:23', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('59834faf-0868-11e7-ab84-c454448293a1', 'schlumberger', '5f4dcc3b5aa765d61d8327deb882cf99', 'Schlumberger Indonesia', 'schlumberger@schlumberger.com', '2017-03-14 10:43:12', NULL, 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '0'),
('5c48f8d1-0a5c-11e7-9553-c454448293a1', 'fisipub', 'd41d8cd98f00b204e9800998ecf8427e', 'FISIP UB', 'fisip@ub.ac.id', '2017-03-16 22:22:25', '2017-03-16 22:22:49', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('64b30852-1105-11e7-ba67-c454448293a1', 'logitechindo', '5f4dcc3b5aa765d61d8327deb882cf99', 'Logitech Indonesia', 'logitech@gmail.com', '2017-03-25 09:47:32', NULL, 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '0'),
('6ac31002-08ba-11e7-be2c-c454448293a1', 'filkomub', '86a65acd94b33daa87c1c6a2d1408593', 'FILKOM UB', 'filkomub@ub.ac.id', '2017-03-14 20:30:40', '2017-03-14 20:32:03', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('850afc76-08ba-11e7-be2c-c454448293a1', 'febub', '5f4dcc3b5aa765d61d8327deb882cf99', 'F. Ekonomi dan Bisnis UB', 'feb@ub.ac.id', '2017-03-14 20:31:24', '2017-03-14 21:12:57', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('90dd78bc-122e-11e7-83e8-c454448293a1', 'pakar4', '7c6a180b36896a0a8c02787eeafb0e4c', 'Pakar 4', 'pakar4@forecasting-product.com', '2017-03-26 21:14:46', NULL, '4249cbf4-06ba-11e7-88db-c454448293a1', '0', '1'),
('ac768b96-08bf-11e7-be2c-c454448293a1', 'mochraflia', 'd41d8cd98f00b204e9800998ecf8427e', 'Mochamad Rafli A', 'mochraflia@gmail.com', '2017-03-14 21:08:18', '2017-03-16 22:20:24', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '0'),
('b01cf5c7-07f3-11e7-9e9e-c454448293a1', 'rolen', '5f4dcc3b5aa765d61d8327deb882cf99', 'rolennnn', 'rolen@gmail.com', '2017-03-13 20:48:07', NULL, 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('b036567b-0863-11e7-ab84-c454448293a1', 'pakar1', '0ed542b815a0d4b0c457ad9def1a21d2', 'Pakar 1', 'pakar1@forecasting-product.com', '2017-03-14 10:09:50', NULL, '4249cbf4-06ba-11e7-88db-c454448293a1', '0', '1'),
('b0aeea76-0815-11e7-9e9e-c454448293a1', 'laras', '7c6a180b36896a0a8c02787eeafb0e4c', 'laras miranti', 'laras@gmail.com', '2017-03-14 00:51:30', '2017-03-25 09:52:38', 'd8067dd0-06ba-11e7-88db-c454448293a1', '1', '0'),
('b4f28099-07f2-11e7-9e9e-c454448293a1', 'totohugo', '5f4dcc3b5aa765d61d8327deb882cf99', 'TOTO HUGO', 'totohugo@gmail.com', '2017-03-13 20:41:05', NULL, 'd8067dd0-06ba-11e7-88db-c454448293a1', '1', '1'),
('b950b3e2-0863-11e7-ab84-c454448293a1', 'pakar2', '0ed542b815a0d4b0c457ad9def1a21d2', 'Pakar 2', 'pakar2@forecasting-product.com', '2017-03-14 10:10:06', NULL, '4249cbf4-06ba-11e7-88db-c454448293a1', '0', '1'),
('b962cda3-1105-11e7-ba67-c454448293a1', 'candradewi', '7c6a180b36896a0a8c02787eeafb0e4c', 'Candra Dewi', 'candradewi@ub.ac.id', '2017-03-25 09:49:54', NULL, '4249cbf4-06ba-11e7-88db-c454448293a1', '0', '1'),
('c2c928fb-0863-11e7-ab84-c454448293a1', 'pakar3', '0ed542b815a0d4b0c457ad9def1a21d2', 'Pakar 3', 'pakar3@forecasting-product.com', '2017-03-14 10:10:22', NULL, '4249cbf4-06ba-11e7-88db-c454448293a1', '0', '1'),
('dfabb976-06d9-11e7-88db-c454448293a1', 'nuradli', 'd41d8cd98f00b204e9800998ecf8427e', 'Nur Adli Ari Darmawand', 'nuradliaridarmawand@gmail.com', '2017-03-12 11:10:48', '2017-03-14 11:39:04', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('e4015aab-0864-11e7-ab84-c454448293a1', 'maybank', '5f4dcc3b5aa765d61d8327deb882cf99', 'BII Maybank', 'maybank@maybank.co.id', '2017-03-14 10:18:27', NULL, 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '0'),
('ed96213a-0863-11e7-ab84-c454448293a1', 'bankmandiri', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bank Mandiri', 'bankmandiri@bankmandiri.co.id', '2017-03-14 10:11:33', '2017-03-16 22:27:29', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('f3fb22b3-0864-11e7-ab84-c454448293a1', 'centralasia', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bank Central Asia', 'bca@bcagroup.com', '2017-03-14 10:18:54', NULL, 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '0'),
('f499d626-0a59-11e7-9553-c454448293a1', 'bni46', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bank Nasional Indonesia', 'bni46@bni.co.id', '2017-03-16 22:05:13', '2017-03-16 22:28:35', 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '1'),
('f60901f1-085d-11e7-ab84-c454448293a1', 'wayanfm', '0ed542b815a0d4b0c457ad9def1a21d2', 'Wayan Firdaus Mahmudy', 'wayanfm@ub.ac.id', '2017-03-14 09:28:51', NULL, '4249cbf4-06ba-11e7-88db-c454448293a1', '0', '1'),
('fa934abb-07f9-11e7-9e9e-c454448293a1', 'madeyong', '5f4dcc3b5aa765d61d8327deb882cf99', 'madeeeyong', 'madeyong@gmail.com', '2017-03-13 21:33:09', NULL, 'd8067dd0-06ba-11e7-88db-c454448293a1', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fp_data_training`
--
ALTER TABLE `fp_data_training`
  ADD PRIMARY KEY (`uuid_fp_data_training`);

--
-- Indexes for table `fp_data_uji`
--
ALTER TABLE `fp_data_uji`
  ADD PRIMARY KEY (`uuid_fp_data_uji`);

--
-- Indexes for table `ms_general_settings`
--
ALTER TABLE `ms_general_settings`
  ADD PRIMARY KEY (`uuid_ms_general_settings`);

--
-- Indexes for table `ms_mail`
--
ALTER TABLE `ms_mail`
  ADD PRIMARY KEY (`uuid_ms_mail`);

--
-- Indexes for table `ms_mail_receiver`
--
ALTER TABLE `ms_mail_receiver`
  ADD PRIMARY KEY (`uuid_ms_mail_receiver`);

--
-- Indexes for table `ms_mail_sender`
--
ALTER TABLE `ms_mail_sender`
  ADD PRIMARY KEY (`uuid_ms_mail_sender`),
  ADD KEY `uuid_ms_mail` (`uuid_ms_mail`);

--
-- Indexes for table `ms_subsystem`
--
ALTER TABLE `ms_subsystem`
  ADD PRIMARY KEY (`uuid_ms_subsystem`),
  ADD UNIQUE KEY `uuid_ms_subsystem` (`uuid_ms_subsystem`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`uuid_ms_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
