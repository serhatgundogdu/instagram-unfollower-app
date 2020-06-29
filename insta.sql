-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Haz 2020, 15:18:36
-- Sunucu sürümü: 10.1.35-MariaDB
-- PHP Sürümü: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `insta`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `followings`
--

CREATE TABLE `followings` (
  `id` int(11) NOT NULL,
  `followers` text COLLATE utf8_turkish_ci NOT NULL,
  `followings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `followings`
--

INSERT INTO `followings` (`id`, `followers`, `followings`) VALUES
(0, '\r\n', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_pass` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_uname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` int(11) NOT NULL DEFAULT '1',
  `kullanici_hakkinda` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_registerdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_birthdate` date NOT NULL,
  `kullanici_country` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_city` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_institution` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gender` int(11) NOT NULL,
  `kullanici_otel` int(11) NOT NULL,
  `kullanici_uncode` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_resim`, `kullanici_mail`, `kullanici_gsm`, `kullanici_pass`, `kullanici_adsoyad`, `kullanici_uname`, `kullanici_yetki`, `kullanici_hakkinda`, `kullanici_registerdate`, `kullanici_birthdate`, `kullanici_country`, `kullanici_city`, `kullanici_institution`, `kullanici_gender`, `kullanici_otel`, `kullanici_uncode`) VALUES
(1, '/dist/img/avatar5.png', 'admin@admin.com', '', '$2y$10$dOXBtWPqCNMyyODkVeFfJumwUrUsJHsd8nHRryGpk.Z3EcfPSoSUW', 'serhatg.code', '', 3266, '', '2019-02-27 22:08:13', '2002-08-01', 'TR\r\n', 'İzmir', '', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `last_lefters`
--

CREATE TABLE `last_lefters` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `user_photo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `user_left_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userjson` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `followings`
--
ALTER TABLE `followings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `last_lefters`
--
ALTER TABLE `last_lefters`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `followings`
--
ALTER TABLE `followings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `last_lefters`
--
ALTER TABLE `last_lefters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
