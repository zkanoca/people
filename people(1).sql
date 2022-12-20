-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 May 2015, 20:45:55
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `people`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `akademik_gorevler`
--

CREATE TABLE IF NOT EXISTS `akademik_gorevler` (
  `akademik_gorevid` int(11) NOT NULL AUTO_INCREMENT,
  `birim` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `unvanid` int(11) NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `akademik_durum` tinyint(4) NOT NULL COMMENT '0:tam zamanlı; 1:yarı zamanlı',
  `baslangic` date NOT NULL,
  `bitis` date DEFAULT NULL,
  PRIMARY KEY (`akademik_gorevid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basim_turleri`
--

CREATE TABLE IF NOT EXISTS `basim_turleri` (
  `basim_turid` int(11) NOT NULL AUTO_INCREMENT,
  `basim_turu` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`basim_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `basim_turleri`
--

INSERT INTO `basim_turleri` (`basim_turid`, `basim_turu`) VALUES
(1, 'Basılı'),
(2, 'Elektronik'),
(3, 'Basılı ve Elektronik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bildiriler`
--

CREATE TABLE IF NOT EXISTS `bildiriler` (
  `bildiriid` int(11) NOT NULL AUTO_INCREMENT,
  `insanid` int(11) NOT NULL,
  `bildiri_kategoriid` int(11) NOT NULL,
  `yazarlar` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazar_sayisi` tinyint(4) NOT NULL,
  `yazar_siralamasi` tinyint(4) NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `etkinlik_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sehir` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `ulkeid` smallint(10) NOT NULL,
  `url1` text COLLATE utf8_turkish_ci NOT NULL,
  `url2` text COLLATE utf8_turkish_ci NOT NULL,
  `url1_etiket` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Bağlantı 1',
  `url2_etiket` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Bağlantı 2',
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  `alan_bilgisi` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `etkinlik_baslangic_tarihi` date NOT NULL,
  `etkinlik_bitis_tarihi` date NOT NULL,
  `basim_turid` int(11) NOT NULL,
  `bildiri_yayin_durumid` int(11) NOT NULL,
  `dilid` int(11) NOT NULL,
  `basim_tarihi` date NOT NULL,
  `cilt` smallint(6) NOT NULL,
  `sayi` smallint(6) NOT NULL,
  `ozel_sayi` tinyint(4) NOT NULL DEFAULT '0',
  `ilk_sayfa` smallint(6) NOT NULL,
  `son_sayfa` smallint(6) NOT NULL,
  `doi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `isbn` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `issn` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sponsor` tinyint(4) NOT NULL DEFAULT '0',
  `toplam_atif_sayisi` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bildiriid`),
  KEY `insanid` (`insanid`,`bildiri_kategoriid`),
  KEY `basim_turid` (`basim_turid`),
  KEY `bildiri_yayin_durumid` (`bildiri_yayin_durumid`),
  KEY `ulkeid` (`ulkeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `bildiriler`
--

INSERT INTO `bildiriler` (`bildiriid`, `insanid`, `bildiri_kategoriid`, `yazarlar`, `yazar_sayisi`, `yazar_siralamasi`, `baslik`, `etkinlik_adi`, `sehir`, `ulkeid`, `url1`, `url2`, `url1_etiket`, `url2_etiket`, `sil`, `alan_bilgisi`, `etkinlik_baslangic_tarihi`, `etkinlik_bitis_tarihi`, `basim_turid`, `bildiri_yayin_durumid`, `dilid`, `basim_tarihi`, `cilt`, `sayi`, `ozel_sayi`, `ilk_sayfa`, `son_sayfa`, `doi`, `isbn`, `issn`, `sponsor`, `toplam_atif_sayisi`) VALUES
(1, 1, 1, 'Sefa DÜNDAR;Mehmet BULUT;Sinan CANAN;Özkan ÖZLÜ;Sezgin Kaçar;İlyas Çankaya', 6, 4, 'BİLİŞSEL STİLLERİ FARKLI OLAN ÖĞRENCİLERİN\r\nARİTMETİK PROBLEMLERİ ÇÖZME SÜRECİNDE\r\nBEYİN DALGALARININ İNCELENMESİ', 'INTERNATIONAL SYMPOSIUM ON CHANGES AND NEW TRENDS IN EDUCATION', 'Konya', 216, 'http://egtsemp.konya.edu.tr/', 'http://egtsemp.konya.edu.tr/', 'Sempozyum Web Sitesi', 'Bağlantı 2', 0, NULL, '0000-00-00', '0000-00-00', 3, 2, 2, '0000-00-00', 0, 0, 0, 0, 0, '', '', '', 0, 0),
(2, 1, 1, 'Özkan ÖZLÜ;Sefa DÜNDAR', 2, 1, 'TECHNOLOGY USE IN EDUCATION: WEB BASED ONLINE QUIZ EXAMPLE', 'INTERNATIONAL SYMPOSIUM ON CHANGES AND NEW TRENDS IN EDUCATION', 'Konya', 216, 'http://egtsemp.konya.edu.tr/', 'http://egtsemp.konya.edu.tr/', 'Sempozyum Web Sitesi', 'Bağlantı 2', 0, NULL, '0000-00-00', '0000-00-00', 3, 2, 2, '0000-00-00', 0, 0, 0, 0, 0, '', '', '', 0, 0),
(3, 1, 1, 'Özkan ÖZLÜ;Pınar ONAY-DURDU', 2, 1, 'İçerik Yönetim Sistemi Kullanılabilirlik Değerlendirmesi: Joomla 3 ', 'International Conference on Education in Mathematics, Science and Technology', 'Konya', 216, 'http://www.icemst.com', 'http://www.icemst.com', 'Konferans Web Sayfası', 'Bağlantı 2', 0, NULL, '0000-00-00', '0000-00-00', 3, 2, 2, '0000-00-00', 0, 0, 0, 0, 0, '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bildiri_kategorileri`
--

CREATE TABLE IF NOT EXISTS `bildiri_kategorileri` (
  `bildiri_kategoriid` int(11) NOT NULL AUTO_INCREMENT,
  `bildiri_kategorisi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`bildiri_kategoriid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `bildiri_kategorileri`
--

INSERT INTO `bildiri_kategorileri` (`bildiri_kategoriid`, `bildiri_kategorisi`) VALUES
(1, 'Uluslararası Toplantılarda Sunulan Bildiriler'),
(2, 'Ulusal Toplantılarda Sunulan Bildiriler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bildiri_yayin_durumlari`
--

CREATE TABLE IF NOT EXISTS `bildiri_yayin_durumlari` (
  `bildiri_yayin_durumid` int(11) NOT NULL AUTO_INCREMENT,
  `bildiri_yayin_durumu` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`bildiri_yayin_durumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `bildiri_yayin_durumlari`
--

INSERT INTO `bildiri_yayin_durumlari` (`bildiri_yayin_durumid`, `bildiri_yayin_durumu`) VALUES
(1, 'Yayınlandı'),
(2, 'Yayınlanmadı'),
(3, 'Kabul Edildi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilimsel_etkinlikler`
--

CREATE TABLE IF NOT EXISTS `bilimsel_etkinlikler` (
  `bilimsel_etkinlikid` int(11) NOT NULL AUTO_INCREMENT,
  `insanid` int(11) NOT NULL,
  `bilimsel_etkinlik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bilimsel_etkinlikid`),
  KEY `insanid` (`insanid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilimsel_raporlar`
--

CREATE TABLE IF NOT EXISTS `bilimsel_raporlar` (
  `bilimsel_raporid` int(11) NOT NULL AUTO_INCREMENT,
  `bilimsel_rapor_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kurum_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sehir` varchar(32) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `insanid` int(11) NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ulke` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`bilimsel_raporid`),
  KEY `insanid` (`insanid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `bilimsel_raporlar`
--

INSERT INTO `bilimsel_raporlar` (`bilimsel_raporid`, `bilimsel_rapor_adi`, `kurum_adi`, `sehir`, `tarih`, `insanid`, `sil`, `url`, `ulke`) VALUES
(1, 'Avrupa Birliği''nde Bilişim Teknolojileri Eğitimine Yönelik Yeni Yaklaşımların İncelenmesi ve Transferi', 'Abant İzzet Baysal Üniversitesi', 'Bolu', '2014-08-05', 1, 0, 'http://ibu.edu.tr', 'Türkiye');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birimler`
--

CREATE TABLE IF NOT EXISTS `birimler` (
  `birimid` int(11) NOT NULL AUTO_INCREMENT,
  `ustbirimid` int(11) NOT NULL DEFAULT '0',
  `birim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `etkin` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`birimid`),
  KEY `okulid` (`ustbirimid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `birimler`
--

INSERT INTO `birimler` (`birimid`, `ustbirimid`, `birim`, `etkin`) VALUES
(1, 0, 'Rektörlük', 1),
(2, 1, 'Bilgi İşlem Daire Başkanlığı', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersler`
--

CREATE TABLE IF NOT EXISTS `dersler` (
  `dersid` int(11) NOT NULL AUTO_INCREMENT,
  `ders_dereceid` tinyint(4) NOT NULL,
  `insanid` int(11) NOT NULL,
  `dilid` smallint(6) NOT NULL,
  `ders` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `derskodu` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  `haftalik_ders_saati` tinyint(4) NOT NULL,
  PRIMARY KEY (`dersid`),
  KEY `insanid` (`insanid`),
  KEY `ders_dereceid` (`ders_dereceid`),
  KEY `dilid` (`dilid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders_dereceleri`
--

CREATE TABLE IF NOT EXISTS `ders_dereceleri` (
  `ders_dereceid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ders_derecesi` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ders_dereceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `ders_dereceleri`
--

INSERT INTO `ders_dereceleri` (`ders_dereceid`, `ders_derecesi`) VALUES
(1, 'Önlisans'),
(2, 'Lisans'),
(3, 'Yüksek Lisans'),
(4, 'Doktora'),
(5, 'Hazırlık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diller`
--

CREATE TABLE IF NOT EXISTS `diller` (
  `dilid` int(11) NOT NULL AUTO_INCREMENT,
  `dil` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`dilid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=15 ;

--
-- Tablo döküm verisi `diller`
--

INSERT INTO `diller` (`dilid`, `dil`) VALUES
(1, 'İngilizce'),
(2, 'Türkçe'),
(3, 'Almanca'),
(4, 'Fransızca'),
(5, 'İspanyolca'),
(6, 'Arapça'),
(7, 'İbranice'),
(8, 'Yunanca'),
(9, 'Farsça'),
(10, 'Çince'),
(11, 'Rusça'),
(12, 'Danca'),
(13, 'Flemenkçe'),
(14, 'Macarca');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE IF NOT EXISTS `duyurular` (
  `duyuruid` int(11) NOT NULL AUTO_INCREMENT,
  `takma_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `metin` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL,
  `gecerlilik` date NOT NULL,
  `etkin` tinyint(4) NOT NULL DEFAULT '1',
  `sil` int(11) NOT NULL DEFAULT '0',
  `insanid` int(11) NOT NULL,
  PRIMARY KEY (`duyuruid`),
  KEY `insanid` (`insanid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`duyuruid`, `takma_ad`, `baslik`, `metin`, `tarih`, `gecerlilik`, `etkin`, `sil`, `insanid`) VALUES
(1, 'ornek-duyuru-1', 'Örnek Duyuru 1', 'Örnek duyuru metni', '2015-03-09 11:17:06', '2015-04-24', 1, 0, 1),
(2, 'ornek-duyuru-2', 'Örnek Duyuru 2', 'Örnek duyuru metni', '2015-03-09 11:17:06', '2015-04-09', 1, 1, 1),
(3, 'ornek-duyuru-3', 'Örnek Duyuru 3', 'Örnek duyuru metni', '2015-03-09 11:17:06', '2015-04-08', 1, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `editorlukler`
--

CREATE TABLE IF NOT EXISTS `editorlukler` (
  `editorlukid` int(11) NOT NULL AUTO_INCREMENT,
  `editorluk_turid` int(11) NOT NULL,
  `insanid` int(11) NOT NULL,
  `editorluk_gorevid` int(11) NOT NULL,
  `yayin_kapsamid` tinyint(4) NOT NULL,
  `basim_turid` tinyint(4) NOT NULL,
  `dilid` smallint(6) NOT NULL,
  `ulkeid` smallint(6) NOT NULL,
  `yayin_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `baslangic` date NOT NULL,
  `bitis` date DEFAULT NULL,
  `alan_bilgisi` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yayinevi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yil` smallint(6) NOT NULL,
  `doi` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sehir` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`editorlukid`),
  KEY `insanid` (`insanid`),
  KEY `editorluk_ve_hakemlik_turid` (`editorluk_turid`),
  KEY `editorluk_gorevid` (`editorluk_gorevid`),
  KEY `yayin_kapsamid` (`yayin_kapsamid`),
  KEY `dilid` (`dilid`),
  KEY `ulkeid` (`ulkeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `editorlukler`
--

INSERT INTO `editorlukler` (`editorlukid`, `editorluk_turid`, `insanid`, `editorluk_gorevid`, `yayin_kapsamid`, `basim_turid`, `dilid`, `ulkeid`, `yayin_adi`, `baslangic`, `bitis`, `alan_bilgisi`, `yayinevi`, `yil`, `doi`, `sehir`, `sil`) VALUES
(1, 0, 1, 0, 0, 0, 0, 0, 'Abant İzzet Baysal Üniversitesi Fen Bilimleri Enstitüsü Dergisi', '2014-10-06', '2015-02-10', NULL, NULL, 0, NULL, '', 0),
(2, 0, 1, 0, 0, 0, 0, 0, 'Abant İzzet Baysal Üniversitesi Sosyal Bilimleri Enstitüsü Dergisi', '2014-05-13', NULL, NULL, NULL, 0, NULL, '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `editorluk_gorevleri`
--

CREATE TABLE IF NOT EXISTS `editorluk_gorevleri` (
  `editorluk_gorevid` int(11) NOT NULL AUTO_INCREMENT,
  `editorluk_gorevi` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`editorluk_gorevid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `editorluk_gorevleri`
--

INSERT INTO `editorluk_gorevleri` (`editorluk_gorevid`, `editorluk_gorevi`) VALUES
(1, 'Editör'),
(2, 'Yardımcı Editör'),
(3, 'Konu Editör'),
(4, 'Editör'),
(5, 'Yayın Kurulu Üyeliği');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `editorluk_turleri`
--

CREATE TABLE IF NOT EXISTS `editorluk_turleri` (
  `editorluk_turid` int(11) NOT NULL AUTO_INCREMENT,
  `editorluk_turu` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`editorluk_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `editorluk_turleri`
--

INSERT INTO `editorluk_turleri` (`editorluk_turid`, `editorluk_turu`) VALUES
(1, 'Dergi'),
(2, 'Kitap'),
(3, 'Kitap (Çeviri)'),
(4, 'Diğer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakemlikler`
--

CREATE TABLE IF NOT EXISTS `hakemlikler` (
  `hakemlikid` int(11) NOT NULL AUTO_INCREMENT,
  `hakemlik_turid` int(11) NOT NULL,
  `makale_indeksid` int(11) NOT NULL,
  `insanid` int(11) NOT NULL,
  `yayin_kapsamid` tinyint(4) NOT NULL,
  `basim_turid` tinyint(4) NOT NULL,
  `ulkeid` smallint(6) NOT NULL,
  `dilid` smallint(6) NOT NULL,
  `yayin_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `alan_bilgisi` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yayinevi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `baslangic` date NOT NULL,
  `bitis` date DEFAULT NULL,
  `yil` smallint(6) NOT NULL,
  `doi` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sehir` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`hakemlikid`),
  KEY `insanid` (`insanid`),
  KEY `editorluk_ve_hakemlik_turid` (`hakemlik_turid`),
  KEY `yayin_kapsamid` (`yayin_kapsamid`),
  KEY `dilid` (`dilid`),
  KEY `ulkeid` (`ulkeid`),
  KEY `makale_indeksid` (`makale_indeksid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `hakemlikler`
--

INSERT INTO `hakemlikler` (`hakemlikid`, `hakemlik_turid`, `makale_indeksid`, `insanid`, `yayin_kapsamid`, `basim_turid`, `ulkeid`, `dilid`, `yayin_adi`, `alan_bilgisi`, `yayinevi`, `baslangic`, `bitis`, `yil`, `doi`, `sehir`, `sil`) VALUES
(1, 0, 0, 1, 0, 0, 0, 0, 'Abant İzzet Baysal Üniversitesi Fen Bilimleri Enstitüsü Dergisi', NULL, NULL, '2014-10-06', '2015-02-10', 0, NULL, '', 0),
(2, 0, 0, 1, 0, 0, 0, 0, 'Abant İzzet Baysal Üniversitesi Sosyal Bilimleri Enstitüsü Dergisi', NULL, NULL, '2014-05-13', NULL, 0, NULL, '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakemlik_turleri`
--

CREATE TABLE IF NOT EXISTS `hakemlik_turleri` (
  `hakemlik_turid` int(11) NOT NULL AUTO_INCREMENT,
  `hakemlik_turu` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`hakemlik_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `hakemlik_turleri`
--

INSERT INTO `hakemlik_turleri` (`hakemlik_turid`, `hakemlik_turu`) VALUES
(1, 'Dergi'),
(2, 'Bildiri Kitabı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `idari_gorevler`
--

CREATE TABLE IF NOT EXISTS `idari_gorevler` (
  `idari_gorevid` int(11) NOT NULL AUTO_INCREMENT,
  `insanid` int(11) NOT NULL,
  `gorev` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `baslangic` date NOT NULL,
  `bitis` date NOT NULL,
  `birim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idari_gorevid`),
  KEY `insanid` (`insanid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `idari_gorevler`
--

INSERT INTO `idari_gorevler` (`idari_gorevid`, `insanid`, `gorev`, `baslangic`, `bitis`, `birim`, `sil`) VALUES
(1, 1, 'Bilgi İşlem Daire Başkanı', '2014-09-01', '2014-10-01', 'Bilgi İşlem Daire Başkanlığı', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `insanlar`
--

CREATE TABLE IF NOT EXISTS `insanlar` (
  `insanid` int(11) NOT NULL AUTO_INCREMENT,
  `unvanid` int(11) NOT NULL,
  `doktora` tinyint(4) NOT NULL,
  `adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `okulid` int(11) NOT NULL,
  `birimid` int(11) NOT NULL,
  `eposta` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkinda` longtext COLLATE utf8_turkish_ci NOT NULL,
  `uzmanlik_alanlari` text COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `gsm` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `dahili` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `faks` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `calisma_alanlari` text COLLATE utf8_turkish_ci NOT NULL,
  `fotograf` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `etkin` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`insanid`),
  KEY `unvanid` (`unvanid`),
  KEY `birimid` (`birimid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `insanlar`
--

INSERT INTO `insanlar` (`insanid`, `unvanid`, `doktora`, `adi`, `soyadi`, `okulid`, `birimid`, `eposta`, `hakkinda`, `uzmanlik_alanlari`, `telefon`, `gsm`, `dahili`, `faks`, `calisma_alanlari`, `fotograf`, `etkin`) VALUES
(1, 7, 0, 'Özkan', 'ÖZLÜ', 1, 2, 'ozkanozlu', 'Marmara Üniversitesi Teknik Eğitim Fakültesi 2005 mezunudur. 2005-2006 eğitim-öğretim yılında Afyonkarahisar''da bilgisayar öğretmeni olarak işe başlamıştır. 2010 yılında Bolu''ya tayin olmuştur. 2012 yılının Şubat ayında Abant İzzet Baysal Üniversitesi Bilgi İşlem Daire Başkanlığı''nda uzman olarak çalışmaya başlamıştır. Aynı yıl Afyon Kocatepe Üniversitesi''nde yüksek lisans derecesini almıştır. Halen Kocaeli Üniversitesi''nde Bilgisayar Mühendisliği Anabilim Dalı''nda doktora eğitimine devam etmektedir.', 'CMS;PHP;ASP.NET;C#;Java;CSS;XML;jQuery;Web Servisleri;Joomla;WordPress;OpenCart;Ubuntu;Entity Framework;Laravel;CodeIgniter', '+90 374 254 10 00', '+90 505 751 33 00', '1823', '+90 374 253 45 06', 'Kullanılabilirlik;SOA;Makine Öğrenmesi;Optimizasyon Algoritmaları', 'http://www.kouibel.org/wp-content/uploads/2014/10/ozkanozlu.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE IF NOT EXISTS `kitaplar` (
  `kitapid` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `insanid` int(11) NOT NULL,
  `yazarlar` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazar_sayisi` tinyint(4) NOT NULL,
  `yazar_siralamasi` tinyint(4) NOT NULL,
  `editorler` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yayinevi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sehir` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yil` smallint(6) DEFAULT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  `isbn` varchar(32) COLLATE utf8_turkish_ci DEFAULT NULL,
  `baski` tinyint(4) DEFAULT NULL,
  `sayfa_sayisi` smallint(6) DEFAULT NULL,
  `url` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dilid` int(11) NOT NULL,
  `kitap_turid` int(11) NOT NULL,
  `alan_bilgisi` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `basim_turid` int(11) NOT NULL,
  `toplam_atif_sayisi` int(11) NOT NULL DEFAULT '0',
  `ulkeid` int(11) NOT NULL,
  PRIMARY KEY (`kitapid`),
  KEY `insanid` (`insanid`),
  KEY `kitap_turid` (`kitap_turid`),
  KEY `basim_turuid` (`basim_turid`),
  KEY `ulkeid` (`ulkeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`kitapid`, `baslik`, `insanid`, `yazarlar`, `yazar_sayisi`, `yazar_siralamasi`, `editorler`, `yayinevi`, `sehir`, `yil`, `sil`, `isbn`, `baski`, `sayfa_sayisi`, `url`, `dilid`, `kitap_turid`, `alan_bilgisi`, `basim_turid`, `toplam_atif_sayisi`, `ulkeid`) VALUES
(1, 'A Guide to Collecting Cookbooks', 1, 'Özkan ÖZLÜ', 1, 1, NULL, 'AİBÜ Matbaası', 'Bolu', 2014, 0, '605324675', 1, 521, 'http://www.abebooks.com/books/cooking/collecting-cookbooks.shtml', 1, 1, NULL, 3, 0, 216);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap_turleri`
--

CREATE TABLE IF NOT EXISTS `kitap_turleri` (
  `kitap_turid` int(11) NOT NULL AUTO_INCREMENT,
  `kitap_turu` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kitap_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `kitap_turleri`
--

INSERT INTO `kitap_turleri` (`kitap_turid`, `kitap_turu`) VALUES
(1, 'Bilimsel Kitap'),
(2, 'Ders Kitabı'),
(3, 'Ansiklopedi Maddesi'),
(4, 'Kitap Çevirisi'),
(5, 'Diğer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makaleler`
--

CREATE TABLE IF NOT EXISTS `makaleler` (
  `makaleid` int(11) NOT NULL AUTO_INCREMENT,
  `makale_kategoriid` int(11) NOT NULL,
  `yazarlar` text COLLATE utf8_turkish_ci NOT NULL,
  `yazar_sayisi` tinyint(4) NOT NULL,
  `yazar_siralamasi` tinyint(4) NOT NULL,
  `insanid` int(11) NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `dergi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `volume` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `pp` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `issn` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `doi` varchar(28) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yil` smallint(6) DEFAULT NULL,
  `ay` int(11) NOT NULL,
  `cilt` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sayi` int(11) NOT NULL,
  `url1` text COLLATE utf8_turkish_ci,
  `url2` text COLLATE utf8_turkish_ci,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  `url1_etiket` varchar(100) COLLATE utf8_turkish_ci DEFAULT 'Bağlantı 1',
  `url2_etiket` varchar(100) COLLATE utf8_turkish_ci DEFAULT 'Bağlantı 2',
  `alan_bilgisi` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dilid` int(11) NOT NULL,
  `ozel_sayi` tinyint(1) NOT NULL DEFAULT '0',
  `ilk_sayfa` int(11) NOT NULL,
  `son_sayfa` int(11) NOT NULL,
  `sponsor` tinyint(4) NOT NULL DEFAULT '0',
  `ulkeid` int(11) NOT NULL,
  `toplam_atif_sayisi` int(11) NOT NULL DEFAULT '0',
  `sehir` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `keywords` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`makaleid`),
  KEY `makale_kategoriid` (`makale_kategoriid`,`insanid`),
  KEY `ulkeid` (`ulkeid`),
  KEY `dilid` (`dilid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `makaleler`
--

INSERT INTO `makaleler` (`makaleid`, `makale_kategoriid`, `yazarlar`, `yazar_sayisi`, `yazar_siralamasi`, `insanid`, `baslik`, `dergi`, `volume`, `pp`, `issn`, `doi`, `yil`, `ay`, `cilt`, `sayi`, `url1`, `url2`, `sil`, `url1_etiket`, `url2_etiket`, `alan_bilgisi`, `dilid`, `ozel_sayi`, `ilk_sayfa`, `son_sayfa`, `sponsor`, `ulkeid`, `toplam_atif_sayisi`, `sehir`, `keywords`) VALUES
(1, 1, 'Emre ŞENOL-DURAK;Mithat DURAK;Özkan ÖZLÜ', 3, 3, 1, 'Testing the psychometric properties of the Ways of Coping Questionnaire (WCQ) in Turkish university students and community samples', 'Clinical Psychology and Psychotherapy', '18', '172-185', '', '10.1002', 2010, 12, '99', 3, 'http://link.springer.com/article/10.1007/s11205-010-9589-4', 'http://onlinelibrary.wiley.com/journal/10.1002/%28ISSN%291099-0879', 0, 'Makale', 'Dergi', NULL, 1, 0, 413, 429, 0, 216, 0, 'Bolu', 'Satisfaction with Life Scale;SWLS;University students;Elderly;Correctional officers;Confirmatory factor analysis;Reliability;Concurrent validity;Discriminant validity;Multi-group comparison'),
(2, 3, 'Sefa DÜNDAR;Mehmet BULUT;Sinan CANAN;Özkan ÖZLÜ;Sezgin Kaçar;İlyas Çankaya', 6, 4, 1, 'Problem Çözme Sürecinde Beyin Dalgalarının İncelenmesi', 'Erzincan Üniversitesi Eğitim Fakültesi Dergisi', '2', '', '2148-7510', '', 2014, 10, '16', 2, 'http://eefdergi.erzincan.edu.tr/index', 'http://eefdergi.erzincan.edu.tr/article/view/5000003939', 0, 'Dergi', 'Makale', NULL, 2, 0, 1, 23, 0, 216, 0, 'Bolu', 'mathematics education;brain waves;cognitive styles');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makale_indeksleri`
--

CREATE TABLE IF NOT EXISTS `makale_indeksleri` (
  `makale_indeksid` int(11) NOT NULL AUTO_INCREMENT,
  `makale_indeks` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`makale_indeksid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `makale_indeksleri`
--

INSERT INTO `makale_indeksleri` (`makale_indeksid`, `makale_indeks`) VALUES
(1, 'SSCI'),
(2, 'SCI'),
(3, 'SCI-Expanded'),
(4, 'AHCI'),
(5, 'Alan İndeksleri'),
(6, 'Diğer İndeksler'),
(7, 'İndekste taranmıyor');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makale_kategorileri`
--

CREATE TABLE IF NOT EXISTS `makale_kategorileri` (
  `makale_kategoriid` int(11) NOT NULL AUTO_INCREMENT,
  `makale_kategorisi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`makale_kategoriid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `makale_kategorileri`
--

INSERT INTO `makale_kategorileri` (`makale_kategoriid`, `makale_kategorisi`) VALUES
(1, 'Uluslararası Hakemli Dergilerde Yayınlanan Makaleler'),
(2, 'Uluslararası Hakemsiz Dergilerde Yayınlanan Makaleler'),
(3, 'Ulusal Hakemli Dergilerde Yayınlanan Makaleler'),
(4, 'Ulusal Hakemsiz Dergilerde Yayınlanan Makaleler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oduller`
--

CREATE TABLE IF NOT EXISTS `oduller` (
  `odulid` int(11) NOT NULL AUTO_INCREMENT,
  `insanid` int(11) NOT NULL,
  `odul_kurulus_turid` int(11) NOT NULL DEFAULT '7',
  `odul` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `veren` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`odulid`),
  KEY `insanid` (`insanid`),
  KEY `odul_kurulus_turid` (`odul_kurulus_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `oduller`
--

INSERT INTO `oduller` (`odulid`, `insanid`, `odul_kurulus_turid`, `odul`, `veren`, `tarih`, `aciklama`, `sil`) VALUES
(1, 1, 7, 'Teşvik Ödülü', 'TÜBİTAK', '2015-03-03', 'Açıklama test', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odul_kurulus_turleri`
--

CREATE TABLE IF NOT EXISTS `odul_kurulus_turleri` (
  `odul_kurulus_turid` int(11) NOT NULL AUTO_INCREMENT,
  `odul_kurulus_turu` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`odul_kurulus_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=10 ;

--
-- Tablo döküm verisi `odul_kurulus_turleri`
--

INSERT INTO `odul_kurulus_turleri` (`odul_kurulus_turid`, `odul_kurulus_turu`) VALUES
(1, 'Üniversite'),
(2, 'Kamu Kurumu'),
(3, 'Sivil Toplum Kuruluşu'),
(4, 'Ticari (Özel)'),
(5, 'Ticari (KİT)'),
(6, 'Hastane'),
(7, 'Diğer'),
(8, 'Yurtdışı Üniversite'),
(9, 'Mesleki Dernekler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenim_bilgileri`
--

CREATE TABLE IF NOT EXISTS `ogrenim_bilgileri` (
  `ogrenim_bilgiid` int(11) NOT NULL AUTO_INCREMENT,
  `insanid` int(11) NOT NULL,
  `ogrenim_dereceid` int(11) NOT NULL,
  `universite` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `okul` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `program` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mezuniyet_tarihi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ogrenim_bilgiid`),
  KEY `insanid` (`insanid`,`ogrenim_dereceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `ogrenim_bilgileri`
--

INSERT INTO `ogrenim_bilgileri` (`ogrenim_bilgiid`, `insanid`, `ogrenim_dereceid`, `universite`, `okul`, `program`, `mezuniyet_tarihi`) VALUES
(1, 1, 3, 'Marmara Üniversitesi', 'Teknik Eğitim Fakültesi', 'Bilgisayar ve Kontrol Öğretmenliği', '2005'),
(2, 1, 4, 'Afyon Kocatepe Üniversitesi', 'Fen Bilimleri Enstitüsü', 'Elektrik Eğitimi', '2012');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenim_dereceleri`
--

CREATE TABLE IF NOT EXISTS `ogrenim_dereceleri` (
  `ogrenim_dereceid` int(11) NOT NULL AUTO_INCREMENT,
  `derece` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ogrenim_dereceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `ogrenim_dereceleri`
--

INSERT INTO `ogrenim_dereceleri` (`ogrenim_dereceid`, `derece`) VALUES
(1, 'Lise'),
(2, 'Önlisans'),
(3, 'Lisans'),
(4, 'Yüksek Lisans'),
(5, 'Doktora'),
(6, 'Doktora Sonrası Çalışma');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `okullar`
--

CREATE TABLE IF NOT EXISTS `okullar` (
  `okulid` int(11) NOT NULL AUTO_INCREMENT,
  `okul` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `etkin` tinyint(4) NOT NULL,
  PRIMARY KEY (`okulid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `patentler`
--

CREATE TABLE IF NOT EXISTS `patentler` (
  `patentid` int(11) NOT NULL AUTO_INCREMENT,
  `patent_kategoriid` int(11) NOT NULL,
  `insanid` int(11) NOT NULL,
  `patent_dosya_turid` int(11) NOT NULL,
  `patent_basvuru_turid` tinyint(4) NOT NULL,
  `numara` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `sinif` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `patent` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ozet` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `basvuru_sahipleri` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `bulus_sahipleri` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yil` date NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`patentid`),
  KEY `patent_kategoriid` (`patent_kategoriid`),
  KEY `patent_basvuru_turid` (`patent_basvuru_turid`),
  KEY `patent_dosya_turid` (`patent_dosya_turid`),
  KEY `insanid` (`insanid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `patentler`
--

INSERT INTO `patentler` (`patentid`, `patent_kategoriid`, `insanid`, `patent_dosya_turid`, `patent_basvuru_turid`, `numara`, `sinif`, `patent`, `ozet`, `basvuru_sahipleri`, `bulus_sahipleri`, `yil`, `sil`) VALUES
(1, 1, 1, 1, 1, '1231dsaq1231', '1', '1fewf3 3fw fd4 fd fd', ' wefd wefwe fwef wef wefwfwef 23r 32r23re', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', '2015-05-04', 0),
(2, 1, 1, 1, 2, '1231dsaq1231', '1', '1fewf3 3fw fd4 fd fd', ' wefd wefwe fwef wef wefwfwef 23r 32r23re', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', '2015-05-04', 0),
(3, 2, 1, 1, 1, '1231dsaq1231', '1', '1fewf3 3fw fd4 fd fd', ' wefd wefwe fwef wef wefwfwef 23r 32r23re', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', '2015-05-04', 0),
(4, 2, 1, 1, 2, '1231dsaq1231', '1', '1fewf3 3fw fd4 fd fd', ' wefd wefwe fwef wef wefwfwef 23r 32r23re', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', '2015-05-04', 0),
(5, 3, 1, 1, 1, '1231dsaq1231', '1', '1fewf3 3fw fd4 fd fd', ' wefd wefwe fwef wef wefwfwef 23r 32r23re', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', '2015-05-04', 0),
(6, 3, 1, 1, 1, '1231dsaq1231', '1', '1fewf3 3fw fd4 fd fd', ' wefd wefwe fwef wef wefwfwef 23r 32r23re', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', '2015-05-04', 0),
(7, 2, 1, 2, 2, '1231dsaq1231', '1', '1fewf3 3fw fd4 fd fd', ' wefd wefwe fwef wef wefwfwef 23r 32r23re', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', 'Özkan ÖZLÜ+Elif ÖZLÜ+Burak ÖZLÜ', '2015-05-04', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `patent_basvuru_turleri`
--

CREATE TABLE IF NOT EXISTS `patent_basvuru_turleri` (
  `patent_basvuru_turid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `patent_basvuru_turu` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`patent_basvuru_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `patent_basvuru_turleri`
--

INSERT INTO `patent_basvuru_turleri` (`patent_basvuru_turid`, `patent_basvuru_turu`) VALUES
(1, 'Ulusal'),
(2, 'Uluslararası');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `patent_dosya_turleri`
--

CREATE TABLE IF NOT EXISTS `patent_dosya_turleri` (
  `patent_dosya_turid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `patent_dosya_turu` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`patent_dosya_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `patent_dosya_turleri`
--

INSERT INTO `patent_dosya_turleri` (`patent_dosya_turid`, `patent_dosya_turu`) VALUES
(1, 'Patent'),
(2, 'Faydalı Model'),
(3, 'Ek Patent'),
(4, 'Diğer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `patent_kategorileri`
--

CREATE TABLE IF NOT EXISTS `patent_kategorileri` (
  `patent_kategoriid` smallint(6) NOT NULL AUTO_INCREMENT,
  `patent_kategori` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `patent_section` varchar(4) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`patent_kategoriid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=13 ;

--
-- Tablo döküm verisi `patent_kategorileri`
--

INSERT INTO `patent_kategorileri` (`patent_kategoriid`, `patent_kategori`, `patent_section`) VALUES
(1, 'Human Necessities', 'A'),
(2, 'Performing Operations', 'B'),
(3, 'Transporting', 'B'),
(4, 'Chemistry', 'C'),
(5, 'Metallurgy', 'C'),
(6, 'Textiles', 'D'),
(7, 'Fixed Constructions', 'E'),
(8, 'Mechanical Engineering', 'F'),
(9, 'Lighting', 'F'),
(10, 'Heat', 'F'),
(11, 'Physics', 'G'),
(12, 'Electricity', 'H');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projeler`
--

CREATE TABLE IF NOT EXISTS `projeler` (
  `projeid` int(11) NOT NULL AUTO_INCREMENT,
  `proje_kategoriid` int(11) NOT NULL,
  `proje_durumid` tinyint(4) NOT NULL,
  `proje_rolid` tinyint(4) NOT NULL,
  `insanid` int(11) NOT NULL,
  `baslik` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `proje_konusu` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `baslangic` date NOT NULL,
  `bitis` date NOT NULL,
  `sure` tinyint(4) NOT NULL,
  `ek_sure` tinyint(4) NOT NULL,
  `kod` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `butce` decimal(10,0) NOT NULL,
  `para_birimi` varchar(4) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TL',
  `sahip` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `katkida_bulunanlar` text COLLATE utf8_turkish_ci NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`projeid`),
  KEY `proje_kategoriid` (`proje_kategoriid`,`insanid`),
  KEY `rol` (`proje_rolid`),
  KEY `proje_durumid` (`proje_durumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `projeler`
--

INSERT INTO `projeler` (`projeid`, `proje_kategoriid`, `proje_durumid`, `proje_rolid`, `insanid`, `baslik`, `proje_konusu`, `baslangic`, `bitis`, `sure`, `ek_sure`, `kod`, `butce`, `para_birimi`, `sahip`, `katkida_bulunanlar`, `sil`) VALUES
(1, 1, 0, 1, 1, '2-metil-2-propilpropan-1,3-diyl bis(p-arilkarbamat) türevlerinin sentezi ve sıvı yağlar ile petrol ürünlerini jelleştirme özelliklerinin incelenmesi', NULL, '2011-04-01', '2014-04-01', 36, 6, 'TR42/14/DFD/0019', '14900', 'TL', 'Özkan ÖZLÜ', '', 0),
(2, 3, 0, 5, 1, 'AB Ülkelerinde iş tabanlı öğrenmede eqavet kalite güvence sisteminin incelenmesi', NULL, '2014-05-01', '2014-09-01', 4, 0, '2013-1-TR1-LEO03-50060', '79500', 'TL', 'Öğr. Gör. Murat ÖZKAN', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_durumlari`
--

CREATE TABLE IF NOT EXISTS `proje_durumlari` (
  `proje_durumid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `proje_durumu` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`proje_durumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `proje_durumlari`
--

INSERT INTO `proje_durumlari` (`proje_durumid`, `proje_durumu`) VALUES
(1, 'Beklemede'),
(2, 'Devam Ediyor'),
(3, 'Ertelendi'),
(4, 'Tamamlandı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_kategorileri`
--

CREATE TABLE IF NOT EXISTS `proje_kategorileri` (
  `proje_kategoriid` int(11) NOT NULL AUTO_INCREMENT,
  `proje_kategori` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `etkin` tinyint(4) NOT NULL,
  PRIMARY KEY (`proje_kategoriid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `proje_kategorileri`
--

INSERT INTO `proje_kategorileri` (`proje_kategoriid`, `proje_kategori`, `etkin`) VALUES
(1, 'TÜBİTAK Projeleri', 1),
(2, 'SAN-TEZ Projeleri', 1),
(3, 'AB Projeleri', 1),
(4, 'MARKA Projeleri', 1),
(5, 'Bilimsel Araştırma Projeleri', 1),
(6, 'Diğer Projeler', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_rolleri`
--

CREATE TABLE IF NOT EXISTS `proje_rolleri` (
  `proje_rolid` int(11) NOT NULL AUTO_INCREMENT,
  `proje_rolu` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`proje_rolid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=14 ;

--
-- Tablo döküm verisi `proje_rolleri`
--

INSERT INTO `proje_rolleri` (`proje_rolid`, `proje_rolu`) VALUES
(1, 'Yürütücü'),
(2, 'Danışman'),
(3, 'Araştırmacı'),
(4, 'Bursiyer'),
(5, 'Katılımcı'),
(6, 'Koordinatör'),
(7, 'Eğitmen'),
(9, 'Koordinatör Yardımcısı'),
(10, 'Hakem'),
(11, 'İzleyici'),
(12, 'Uzman'),
(13, 'Yönetici');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sanat_etkinlikleri`
--

CREATE TABLE IF NOT EXISTS `sanat_etkinlikleri` (
  `sanat_etkinlikid` int(11) NOT NULL AUTO_INCREMENT,
  `sanat_etkinlik_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `etkinlik_baslangic_tarihi` date DEFAULT NULL,
  `etkinlik_bitis_tarihi` date DEFAULT NULL,
  `insanid` int(11) NOT NULL,
  `ulkeid` int(11) NOT NULL,
  `dilid` smallint(6) NOT NULL,
  `yer` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sehir` varchar(32) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sure` varchar(10) COLLATE utf8_turkish_ci DEFAULT '00:00:00',
  `duzenleyenler` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL COMMENT 'Düzenleyenler, Yer alanlar, İcracılar',
  PRIMARY KEY (`sanat_etkinlikid`),
  KEY `insanid` (`insanid`),
  KEY `dilid` (`dilid`),
  KEY `ulkeid` (`ulkeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `sanat_etkinlikleri`
--

INSERT INTO `sanat_etkinlikleri` (`sanat_etkinlikid`, `sanat_etkinlik_adi`, `etkinlik_baslangic_tarihi`, `etkinlik_bitis_tarihi`, `insanid`, `ulkeid`, `dilid`, `yer`, `sehir`, `sil`, `url`, `sure`, `duzenleyenler`) VALUES
(1, 'Haydi Kızlar Okula Fotoğraf Sergisi', '2015-03-03', NULL, 1, 0, 0, NULL, 'Bolu', 0, 'http://ibu.edu.tr', '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `spor_etkinlikleri`
--

CREATE TABLE IF NOT EXISTS `spor_etkinlikleri` (
  `spor_etkinlikid` int(11) NOT NULL AUTO_INCREMENT,
  `spor_etkinlik_adi` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date DEFAULT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sehir` varchar(32) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ulke` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `insanid` int(11) NOT NULL,
  PRIMARY KEY (`spor_etkinlikid`),
  KEY `insanid` (`insanid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `spor_etkinlikleri`
--

INSERT INTO `spor_etkinlikleri` (`spor_etkinlikid`, `spor_etkinlik_adi`, `tarih`, `sil`, `url`, `sehir`, `ulke`, `insanid`) VALUES
(1, 'Üniversiteler Arası Halı Saha Futbol Şampiyonası', '2015-04-06', 0, 'http://ibu.edu.tr', 'Bolu', 'Türkiye', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tezler`
--

CREATE TABLE IF NOT EXISTS `tezler` (
  `tezid` int(11) NOT NULL AUTO_INCREMENT,
  `insanid` int(11) NOT NULL,
  `yazar` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `universite` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `enstitu` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `abd` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `yil` smallint(6) NOT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  `tez_turid` tinyint(4) NOT NULL,
  `tez_kurum_turid` tinyint(4) NOT NULL,
  `konu` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `danisman1` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `danisman2` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`tezid`),
  KEY `insanid` (`insanid`),
  KEY `tez_turid` (`tez_turid`,`tez_kurum_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `tezler`
--

INSERT INTO `tezler` (`tezid`, `insanid`, `yazar`, `baslik`, `universite`, `enstitu`, `abd`, `yil`, `sil`, `tez_turid`, `tez_kurum_turid`, `konu`, `danisman1`, `danisman2`) VALUES
(1, 1, 'Özkan ÖZLÜ', 'Motor Tasarımı için Optimizasyon Algoritması Geliştirilmesi', 'Afyon Kocatepe Üniversitesi', 'Fen Bilimleri Enstitüsü', 'Elektrik Eğitimi', 2012, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tez_kurum_turleri`
--

CREATE TABLE IF NOT EXISTS `tez_kurum_turleri` (
  `tez_kurum_turid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tez_kurum_turu` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`tez_kurum_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `tez_kurum_turleri`
--

INSERT INTO `tez_kurum_turleri` (`tez_kurum_turid`, `tez_kurum_turu`) VALUES
(1, 'Üniversite'),
(2, 'Sağlık Bakanlığı'),
(3, 'TODAİE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tez_turleri`
--

CREATE TABLE IF NOT EXISTS `tez_turleri` (
  `tez_turid` tinyint(11) NOT NULL AUTO_INCREMENT,
  `tez_turu` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `kisaltma` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`tez_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `tez_turleri`
--

INSERT INTO `tez_turleri` (`tez_turid`, `tez_turu`, `kisaltma`) VALUES
(1, 'Yüksek Lisans', 'M. Sc.'),
(2, 'Doktora', NULL),
(3, 'Tıpta Uzmanlık', NULL),
(4, 'Sanatta Yeterlik', NULL),
(5, 'Diş Hekimliği Uzmanlık', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ulkeler`
--

CREATE TABLE IF NOT EXISTS `ulkeler` (
  `ulkeid` int(11) NOT NULL AUTO_INCREMENT,
  `ulke` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ulkeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=236 ;

--
-- Tablo döküm verisi `ulkeler`
--

INSERT INTO `ulkeler` (`ulkeid`, `ulke`) VALUES
(1, 'Afganistan'),
(2, 'Almanya'),
(3, 'Amerikan Samoa'),
(4, 'Amerika Birleşik Devletleri'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla, İngiltere'),
(8, 'Antigua ve Barbuda'),
(9, 'Arjantin'),
(10, 'Arnavutluk'),
(11, 'Aruba, Hollanda'),
(12, 'Avustralya'),
(13, 'Avusturya'),
(14, 'Azerbaycan'),
(15, 'Bahama Adaları'),
(16, 'Bahreyn'),
(17, 'Bangladeş'),
(18, 'Barbados'),
(19, 'Belçika'),
(20, 'Belize'),
(21, 'Benin'),
(22, 'Bermuda, İngiltere'),
(23, 'Beyaz Rusya'),
(24, 'Bhutan'),
(25, 'Birleşik Arap Emirlikleri'),
(26, 'Birmanya (Myanmar)'),
(27, 'Bolivya'),
(28, 'Bosna Hersek'),
(29, 'Botswana'),
(30, 'Brezilya'),
(31, 'Brunei'),
(32, 'Bulgaristan'),
(33, 'Burkina Faso'),
(34, 'Burundi'),
(35, 'Cape Verde'),
(36, 'Cayman Adaları, İngiltere'),
(37, 'Cebelitarık, İngiltere'),
(38, 'Cezayir'),
(39, 'Christmas Adası, Avusturalya'),
(40, 'Cibuti'),
(41, 'Çad'),
(42, 'Çek Cumhuriyeti'),
(43, 'Çin'),
(44, 'Danimarka'),
(45, 'Dominika'),
(46, 'Dominik Cumhuriyeti'),
(47, 'Ekvator'),
(48, 'Ekvator Ginesi'),
(49, 'El Salvador'),
(50, 'Endonezya'),
(51, 'Eritre'),
(52, 'Ermenistan'),
(53, 'Estonya'),
(54, 'Etiyopya'),
(55, 'Fas'),
(56, 'Fiji'),
(57, 'Fildişi Sahili'),
(58, 'Filipinler'),
(59, 'Filistin'),
(60, 'Finlandiya'),
(61, 'Folkland Adaları, İngiltere'),
(62, 'Fransa'),
(63, 'Fransız Guyanası'),
(64, 'Fransız Güney Eyaletleri (Kerguelen Adaları)'),
(65, 'Fransız Polinezyası'),
(66, 'Gabon'),
(67, 'Galler'),
(68, 'Gambiya'),
(69, 'Gana'),
(70, 'Gine'),
(71, 'Gine-Bissau'),
(72, 'Grenada'),
(73, 'Grönland'),
(74, 'Guadalup, Fransa'),
(75, 'Guam, Amerika'),
(76, 'Guatemala'),
(77, 'Guyana'),
(78, 'Güney Afrika'),
(79, 'Güney Georgia ve Güney Sandviç Adaları, İngiltere'),
(80, 'Güney Kıbrıs Rum Yönetimi'),
(81, 'Güney Kore'),
(82, 'Gürcistan'),
(83, 'Haiti'),
(84, 'Hırvatistan'),
(85, 'Hindistan'),
(86, 'Hollanda'),
(87, 'Hollanda Antilleri'),
(88, 'Honduras'),
(89, 'Irak'),
(90, 'İngiltere'),
(91, 'İran'),
(92, 'İrlanda'),
(93, 'İspanya'),
(94, 'İsrail'),
(95, 'İsveç'),
(96, 'İsviçre'),
(97, 'İtalya'),
(98, 'İzlanda'),
(99, 'Jamaika'),
(100, 'Japonya'),
(101, 'Johnston Atoll, Amerika'),
(102, 'Kamboçya'),
(103, 'Kamerun'),
(104, 'Kanada'),
(105, 'Kanarya Adaları'),
(106, 'Karadağ'),
(107, 'Katar'),
(108, 'Kazakistan'),
(109, 'Kenya'),
(110, 'Kırgızistan'),
(111, 'Kiribati'),
(112, 'Kolombiya'),
(113, 'Komorlar'),
(114, 'Kongo'),
(115, 'Kongo Demokratik Cumhuriyeti'),
(116, 'Kosova'),
(117, 'Kosta Rika'),
(118, 'Kuveyt'),
(119, 'Kuzey İrlanda'),
(120, 'Kuzey Kore'),
(121, 'Kuzey Maryana Adaları'),
(122, 'Küba'),
(123, 'K.K.T.C.'),
(124, 'Laos'),
(125, 'Lesotho'),
(126, 'Letonya'),
(127, 'Liberya'),
(128, 'Libya'),
(129, 'Liechtenstein'),
(130, 'Litvanya'),
(131, 'Lübnan'),
(132, 'Lüksemburg'),
(133, 'Macaristan'),
(134, 'Madagaskar'),
(135, 'Makau (Makao)'),
(136, 'Makedonya'),
(137, 'Malavi'),
(138, 'Maldiv Adaları'),
(139, 'Malezya'),
(140, 'Mali'),
(141, 'Malta'),
(142, 'Marşal Adaları'),
(143, 'Martinik, Fransa'),
(144, 'Mauritius'),
(145, 'Mayotte, Fransa'),
(146, 'Meksika'),
(147, 'Mısır'),
(148, 'Midway Adaları, Amerika'),
(149, 'Mikronezya'),
(150, 'Moğolistan'),
(151, 'Moldavya'),
(152, 'Monako'),
(153, 'Montserrat'),
(154, 'Moritanya'),
(155, 'Mozambik'),
(156, 'Namibia'),
(157, 'Nauru'),
(158, 'Nepal'),
(159, 'Nijer'),
(160, 'Nijerya'),
(161, 'Nikaragua'),
(162, 'Niue, Yeni Zelanda'),
(163, 'Norveç'),
(164, 'Orta Afrika Cumhuriyeti'),
(165, 'Özbekistan'),
(166, 'Pakistan'),
(167, 'Palau Adaları'),
(168, 'Palmyra Atoll, Amerika'),
(169, 'Panama'),
(170, 'Papua Yeni Gine'),
(171, 'Paraguay'),
(172, 'Peru'),
(173, 'Polonya'),
(174, 'Portekiz'),
(175, 'Porto Riko, Amerika'),
(176, 'Reunion, Fransa'),
(177, 'Romanya'),
(178, 'Ruanda'),
(179, 'Rusya Federasyonu'),
(180, 'Saint Helena, İngiltere'),
(181, 'Saint Martin, Fransa'),
(182, 'Saint Pierre ve Miquelon, Fransa'),
(183, 'Samoa'),
(184, 'San Marino'),
(185, 'Santa Kitts ve Nevis'),
(186, 'Santa Lucia'),
(187, 'Santa Vincent ve Grenadinler'),
(188, 'Sao Tome ve Principe'),
(189, 'Senegal'),
(190, 'Seyşeller'),
(191, 'Sırbistan'),
(192, 'Sierra Leone'),
(193, 'Singapur'),
(194, 'Slovakya'),
(195, 'Slovenya'),
(196, 'Solomon Adaları'),
(197, 'Somali'),
(198, 'Sri Lanka'),
(199, 'Sudan'),
(200, 'Surinam'),
(201, 'Suriye'),
(202, 'Suudi Arabistan'),
(203, 'Svalbard, Norveç'),
(204, 'Svaziland'),
(205, 'Şili'),
(206, 'Tacikistan'),
(207, 'Tanzanya'),
(208, 'Tayland'),
(209, 'Tayvan'),
(210, 'Togo'),
(211, 'Tonga'),
(212, 'Trinidad ve Tobago'),
(213, 'Tunus'),
(214, 'Turks ve Caicos Adaları, İngiltere'),
(215, 'Tuvalu'),
(216, 'Türkiye'),
(217, 'Türkmenistan'),
(218, 'Uganda'),
(219, 'Ukrayna'),
(220, 'Umman'),
(221, 'Uruguay'),
(222, 'Ürdün'),
(223, 'Vallis ve Futuna, Fransa'),
(224, 'Vanuatu'),
(225, 'Venezuela'),
(226, 'Vietnam'),
(227, 'Virgin Adaları, Amerika'),
(228, 'Virgin Adaları, İngiltere'),
(229, 'Wake Adaları, Amerika'),
(230, 'Yemen'),
(231, 'Yeni Kaledonya, Fransa'),
(232, 'Yeni Zelanda'),
(233, 'Yunanistan'),
(234, 'Zambiya'),
(235, 'Zimbabve');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `unvanlar`
--

CREATE TABLE IF NOT EXISTS `unvanlar` (
  `unvanid` int(11) NOT NULL AUTO_INCREMENT,
  `unvan` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `etkin` tinyint(4) NOT NULL,
  PRIMARY KEY (`unvanid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=10 ;

--
-- Tablo döküm verisi `unvanlar`
--

INSERT INTO `unvanlar` (`unvanid`, `unvan`, `etkin`) VALUES
(1, 'Prof.', 1),
(2, 'Doç.', 1),
(3, 'Yrd. Doç.', 1),
(4, 'Arş. Gör.', 1),
(5, 'Öğr. Gör.', 1),
(6, 'Okt.', 1),
(7, 'Uzm.', 1),
(8, 'Çev.', 1),
(9, 'Eğt. Pln.', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyelikler`
--

CREATE TABLE IF NOT EXISTS `uyelikler` (
  `uyelikid` int(11) NOT NULL AUTO_INCREMENT,
  `uyelik_turid` tinyint(4) NOT NULL,
  `uyelik_kurulus_turid` tinyint(4) NOT NULL,
  `insanid` int(11) NOT NULL,
  `topluluk` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `baslangic_tarihi` date NOT NULL,
  `bitis_tarihi` date DEFAULT NULL,
  `sil` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uyelikid`),
  KEY `insanid` (`insanid`),
  KEY `uyelik_turid` (`uyelik_turid`,`uyelik_kurulus_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `uyelikler`
--

INSERT INTO `uyelikler` (`uyelikid`, `uyelik_turid`, `uyelik_kurulus_turid`, `insanid`, `topluluk`, `baslangic_tarihi`, `bitis_tarihi`, `sil`) VALUES
(1, 0, 0, 1, 'Marmara Üniversitesi Mezunlar Derneği', '2005-08-03', NULL, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyelik_kurulus_turleri`
--

CREATE TABLE IF NOT EXISTS `uyelik_kurulus_turleri` (
  `uyelik_kurulus_turid` int(11) NOT NULL AUTO_INCREMENT,
  `uyelik_kurulus_turu` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`uyelik_kurulus_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `uyelik_kurulus_turleri`
--

INSERT INTO `uyelik_kurulus_turleri` (`uyelik_kurulus_turid`, `uyelik_kurulus_turu`) VALUES
(1, 'Bilimsel'),
(2, 'Diğer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyelik_turleri`
--

CREATE TABLE IF NOT EXISTS `uyelik_turleri` (
  `uyelik_turid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `uyelik_turu` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`uyelik_turid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `uyelik_turleri`
--

INSERT INTO `uyelik_turleri` (`uyelik_turid`, `uyelik_turu`) VALUES
(1, 'Üye'),
(2, 'Danışman'),
(3, 'Onursal Başkan'),
(4, 'Yönetim Kurulu Üyesi'),
(5, 'Başkan');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yayin_kapsamlari`
--

CREATE TABLE IF NOT EXISTS `yayin_kapsamlari` (
  `yayin_kapsamid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'yayin',
  `yayin_kapsami` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`yayin_kapsamid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `yayin_kapsamlari`
--

INSERT INTO `yayin_kapsamlari` (`yayin_kapsamid`, `yayin_kapsami`) VALUES
(1, 'Uluslararası'),
(2, 'Ulusal');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `insanlar`
--
ALTER TABLE `insanlar`
  ADD CONSTRAINT `insanlar_ibfk_1` FOREIGN KEY (`unvanid`) REFERENCES `unvanlar` (`unvanid`),
  ADD CONSTRAINT `insanlar_ibfk_2` FOREIGN KEY (`birimid`) REFERENCES `birimler` (`birimid`);

--
-- Tablo kısıtlamaları `uyelikler`
--
ALTER TABLE `uyelikler`
  ADD CONSTRAINT `uyelikler_ibfk_1` FOREIGN KEY (`insanid`) REFERENCES `insanlar` (`insanid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
