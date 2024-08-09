-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 12:08 PM
-- Server version: 8.0.32
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sladolino`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanci`
--

CREATE TABLE `clanci` (
  `id_clanak` int NOT NULL,
  `naslov` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tekst` varchar(15000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `slika` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kategorija` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `clanci`
--

INSERT INTO `clanci` (`id_clanak`, `naslov`, `tekst`, `slika`, `datum`, `id_kategorija`) VALUES
(1, 'koji nas sladoledi očekuju ove godine?', 'Challenging yourself to go vegan for the month of January? We’ve got dessert covered! Check out our top 10 tips for surviving Veganuary as a dessert lover.', 'news2.jpg', '2024-02-04 16:43:44', 1),
(2, 'Sladolino zaljubljena akcija!', 'We work with our Caring Dairy farms to develop a three-part approach to improve the health of their soil and help fight climate change. Let’s dig in!', 'news3.jpg', '2024-02-04 17:01:26', 2),
(3, 'Top 5 ukusa koji idu odlično uz kafu.', 'Challenging yourself to go vegan for the month of January? We’ve got dessert covered! Check out our top 10 tips for surviving Veganuary as a dessert lover.', 'news4.jpg', '2024-02-04 17:02:05', 3),
(4, '10 načina da ubijete vreme dok čekate u redu na dan sladolina.', 'Free ice cream comes to those who wait. The line moves quickly, and we\'ve got 10 things you can do to pass the time.', 'news5.jpg', '2024-02-14 14:19:25', 1),
(5, 'Ukusi koje naše mlade mušterije obožavaju', 'Ako ste se ikada pitali koji su to ukusi koje vaši mališani vole.Došli ste na pravo mesto.', 'news6.jpg', '2024-03-06 22:05:45', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE `gradovi` (
  `id_grad` int NOT NULL,
  `naziv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`id_grad`, `naziv`) VALUES
(1, 'Beograd'),
(2, 'Novi Sad');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id_kategorija` int NOT NULL,
  `naziv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id_kategorija`, `naziv`) VALUES
(1, 'SVI SLADOLEDI'),
(2, 'POSNI SLADOLEDI'),
(3, 'SORBE'),
(4, 'MLEČNI'),
(5, 'VEGAN');

-- --------------------------------------------------------

--
-- Table structure for table `kategorijeclanaka`
--

CREATE TABLE `kategorijeclanaka` (
  `id_kategorija_clanka` int NOT NULL,
  `naziv` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `kategorijeclanaka`
--

INSERT INTO `kategorijeclanaka` (`id_kategorija_clanka`, `naziv`) VALUES
(4, 'Sve'),
(1, 'kultura'),
(2, 'ukusi'),
(3, 'zabava');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int NOT NULL,
  `Ime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Prezime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `korisnicko_ime` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Grad` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Ulica` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Broj` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Lozinka` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `Ime`, `Prezime`, `korisnicko_ime`, `Grad`, `Ulica`, `Broj`, `Email`, `Lozinka`, `status_id`) VALUES
(1, 'nikola', 'Djuric', 'Admin', 'Beograd', 'Grocanska 12', '0634855', 'nikola.djuric.79.21@ict.edu.rs', 'b52f3879b092d28a83113947457cc68d', 2),
(38, 'nikola', 'Djuric', 'korisnik', 'Beograd', 'Grocanska 12', '0634855', 'nikola.djuric.78.21@ict.edu.rs', '35f4a8d465e6e1edc05f3d8ab658c551', 2),
(42, 'Dusan', 'Jovic', 'JovaUbica', 'Beograd', 'Brestovicka 5', '+381 63 44 33 22 11', 'dusan.jovic@grocka.rs', '909e3df748672942d2af7ae86ef4dfc9', 2),
(59, 'Nikola', 'Djuric', 'NikolaDj', 'Grad', 'Grocanska 12', '+381638419511', 'dndjuric73@gmail.com', '664f1c841bc50caed7b73246e42ce43b', 2),
(69, 'Marko', 'Jovanovic', 'Markeza1', 'Grocka', 'Grocanska 12', '0638485511', 'marko.jovanovic@gmail.com', '65f8d5c94a8ace48b8471b5a2d83c839', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kutija`
--

CREATE TABLE `kutija` (
  `id_kutija` int NOT NULL,
  `naziv_kutije` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `kolicina_kg` double NOT NULL,
  `cena` decimal(30,0) NOT NULL,
  `kolicina_ukusa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `kutija`
--

INSERT INTO `kutija` (`id_kutija`, `naziv_kutije`, `kolicina_kg`, `cena`, `kolicina_ukusa`) VALUES
(1, 'sladoled', 0.35, '1050', 3),
(2, 'sladoled', 0.5, '1400', 3),
(3, 'sladoled', 1, '2750', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kutije_narudzbine`
--

CREATE TABLE `kutije_narudzbine` (
  `id_porKut_poruzbine` int NOT NULL,
  `id_porucena_kutija` int NOT NULL,
  `id_porudzbina` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `kutije_narudzbine`
--

INSERT INTO `kutije_narudzbine` (`id_porKut_poruzbine`, `id_porucena_kutija`, `id_porudzbina`) VALUES
(64, 64, 55),
(65, 65, 56),
(66, 66, 56),
(67, 67, 56);

-- --------------------------------------------------------

--
-- Table structure for table `lokacije`
--

CREATE TABLE `lokacije` (
  `id_lokacija` int NOT NULL,
  `id_grad` int NOT NULL,
  `naziv_ulice` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `broj_ulice` int NOT NULL,
  `id_radno_vreme` int NOT NULL,
  `telefon` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `id_radno_vreme_dostave` int NOT NULL,
  `latituda` double(12,7) NOT NULL,
  `longituda` double(12,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `lokacije`
--

INSERT INTO `lokacije` (`id_lokacija`, `id_grad`, `naziv_ulice`, `broj_ulice`, `id_radno_vreme`, `telefon`, `id_radno_vreme_dostave`, `latituda`, `longituda`) VALUES
(1, 1, 'Svetozara Markovića', 85, 1, '+381 36930595', 2, 44.7978360, 20.4699150),
(2, 1, 'Bulevar kralja Aleksandra', 86, 1, '+381 2872220918 ', 2, 44.8058200, 20.4742700),
(3, 1, 'Vojislava Ilića ', 141, 1, '+381 30689624', 2, 44.7865200, 20.5010500),
(4, 2, 'Maksima Gorkog', 14, 1, '+38128474129', 2, 45.2502430, 19.8475640),
(5, 2, 'Nikole Pašića', 5, 1, '+38160514449', 2, 45.2575160, 19.8474220);

-- --------------------------------------------------------

--
-- Table structure for table `narucene_kutije`
--

CREATE TABLE `narucene_kutije` (
  `id_porucena_kutija` int NOT NULL,
  `id_slad` int NOT NULL,
  `id_slad2` int NOT NULL,
  `id_slad3` int NOT NULL,
  `id_slad4` int DEFAULT NULL,
  `id_korisnik` int NOT NULL,
  `id_kutija` int NOT NULL,
  `kolicina` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `narucene_kutije`
--

INSERT INTO `narucene_kutije` (`id_porucena_kutija`, `id_slad`, `id_slad2`, `id_slad3`, `id_slad4`, `id_korisnik`, `id_kutija`, `kolicina`) VALUES
(48, 3, 8, 4, NULL, 59, 2, 2),
(49, 7, 8, 14, 9, 59, 3, 3),
(50, 15, 15, 15, NULL, 59, 2, 2),
(51, 3, 4, 8, NULL, 59, 2, 1),
(52, 3, 4, 8, NULL, 59, 2, 1),
(53, 3, 4, 5, NULL, 59, 1, 1),
(54, 4, 3, 7, NULL, 59, 2, 3),
(55, 10, 6, 11, 8, 59, 3, 2),
(56, 3, 4, 7, NULL, 59, 2, 3),
(57, 3, 8, 9, NULL, 59, 2, 1),
(58, 8, 9, 10, NULL, 69, 2, 1),
(59, 12, 14, 15, 4, 69, 3, 3),
(60, 7, 2, 8, NULL, 69, 1, 1),
(61, 3, 4, 8, NULL, 69, 2, 1),
(62, 3, 4, 8, NULL, 69, 2, 1),
(63, 3, 4, 5, NULL, 69, 2, 1),
(64, 4, 6, 9, NULL, 69, 2, 2),
(65, 4, 5, 9, NULL, 69, 2, 1),
(66, 14, 14, 14, NULL, 69, 2, 1),
(67, 10, 11, 10, 11, 69, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbina`
--

CREATE TABLE `narudzbina` (
  `id_narudzbina` int NOT NULL,
  `ulica` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `broj` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `sprat` int DEFAULT NULL,
  `interfon` int DEFAULT NULL,
  `Ime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Prezime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Telefon` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `napomena` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `dan` date NOT NULL,
  `vreme` time NOT NULL,
  `ukupna_cena` decimal(10,0) NOT NULL,
  `datum_kreiranja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_grad` int NOT NULL,
  `id_vrsta` int NOT NULL,
  `id_placanje` int NOT NULL,
  `id_korisnik` int NOT NULL,
  `id_lokacija` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `narudzbina`
--

INSERT INTO `narudzbina` (`id_narudzbina`, `ulica`, `broj`, `sprat`, `interfon`, `Ime`, `Prezime`, `Email`, `Telefon`, `napomena`, `dan`, `vreme`, `ukupna_cena`, `datum_kreiranja`, `id_grad`, `id_vrsta`, `id_placanje`, `id_korisnik`, `id_lokacija`) VALUES
(55, NULL, NULL, NULL, NULL, 'Marko', 'Jovanovic', 'marko.jovanovic@gmail.com', '0638485511', 'ffdgfdgdgdgdg', '2024-03-13', '12:30:00', '2800', '2024-03-10 20:41:40', 1, 2, 1, 69, 3),
(56, NULL, NULL, NULL, NULL, 'Marko', 'Jovanovic', 'marko.jovanovic@gmail.com', '0638485511', 'fdgdfggdfdgdg', '2024-03-13', '18:30:00', '8300', '2024-03-10 20:42:15', 1, 2, 1, 69, 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigacija`
--

CREATE TABLE `navigacija` (
  `id_navigacija` int NOT NULL,
  `naziv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `id_roditelj` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `navigacija`
--

INSERT INTO `navigacija` (`id_navigacija`, `naziv`, `link`, `id_roditelj`) VALUES
(1, 'Novosti', 'news_stranica.php', NULL),
(2, 'Cene', 'Cenovnik.php', NULL),
(3, 'Lokacije', 'locations.php', NULL),
(4, 'Ukusi', 'flavors.php', NULL),
(5, 'O nama', 'about_us.php', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE `odgovori` (
  `id_odgovor` int NOT NULL,
  `Tekst` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`id_odgovor`, `Tekst`) VALUES
(1, 'Straćatela'),
(2, 'Malina sa čokoladom'),
(3, 'Menta sa mrvicama čokolade'),
(4, 'Oreo'),
(5, 'Nutela'),
(6, 'Lešnik sa komadićima lešnika,crne i bele čokolade'),
(7, 'Pistaći sa čokoladom'),
(8, 'Kinder Bueno'),
(9, 'Pekan pita'),
(10, 'Višnja sa komadićima višnje'),
(11, 'Čokolada'),
(12, 'Bela čokolada sa karamelom'),
(13, 'Višnja sa šerijem'),
(14, 'Vanila'),
(15, 'Vanila sa komadićima čokolade i karamele'),
(16, 'jednom mesečno'),
(17, 'dvaput mesečno'),
(18, 'triput mesečno'),
(19, 'manje od navedenih opcija'),
(20, 'više od navedenih opcija'),
(21, 'kornet'),
(22, 'čašica');

-- --------------------------------------------------------

--
-- Table structure for table `odgovori_pitanja`
--

CREATE TABLE `odgovori_pitanja` (
  `id_odg_pit` int NOT NULL,
  `id_odgovor` int NOT NULL,
  `id_pitanje` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `odgovori_pitanja`
--

INSERT INTO `odgovori_pitanja` (`id_odg_pit`, `id_odgovor`, `id_pitanje`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(22, 16, 2),
(23, 17, 2),
(24, 18, 2),
(25, 19, 2),
(26, 20, 2),
(27, 21, 3),
(28, 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pitanja`
--

CREATE TABLE `pitanja` (
  `id_pitanje` int NOT NULL,
  `Tekst` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pitanja`
--

INSERT INTO `pitanja` (`id_pitanje`, `Tekst`) VALUES
(1, 'Koji ukus vam je omiljen?'),
(2, 'Koliko cesto kupujete sladoled?'),
(3, 'Da li vise volite sladoled u kornetu ili casici?');

-- --------------------------------------------------------

--
-- Table structure for table `placanje`
--

CREATE TABLE `placanje` (
  `id_placanje` int NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `placanje`
--

INSERT INTO `placanje` (`id_placanje`, `naziv`) VALUES
(1, 'pouzećem'),
(2, 'karticom');

-- --------------------------------------------------------

--
-- Table structure for table `radno_vreme`
--

CREATE TABLE `radno_vreme` (
  `id_radno_vreme` int NOT NULL,
  `pocetak` time(6) NOT NULL,
  `kraj` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `radno_vreme`
--

INSERT INTO `radno_vreme` (`id_radno_vreme`, `pocetak`, `kraj`) VALUES
(1, '10:00:00.000000', '23:00:00.000000'),
(2, '10:00:00.000000', '22:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `sladoledi`
--

CREATE TABLE `sladoledi` (
  `id_sladoled` int NOT NULL,
  `naziv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `datum_izlaska` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slika` varchar(120) COLLATE utf8mb4_bin NOT NULL,
  `kategorija_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sladoledi`
--

INSERT INTO `sladoledi` (`id_sladoled`, `naziv`, `datum_izlaska`, `slika`, `kategorija_id`) VALUES
(1, 'Stracatela', '2023-02-04 08:58:36', 'stracatela.png', 4),
(2, 'Malina sa cokoladom', '2023-02-04 09:04:08', 'MalinaCokolada.png', 2),
(3, 'Menta sa mrvicama cokolade', '2023-02-04 09:05:13', 'MentaCoko.png', 4),
(4, 'Oreo', '2023-02-04 09:11:54', 'oreo.png', 4),
(5, 'Nutela', '2023-02-04 09:11:54', 'Nutela.png', 4),
(6, 'Lešnik sa komadićima lešnika crne i bele čokolade', '2023-02-04 09:11:54', 'LesnikCoko.png', 4),
(7, 'Pistaći sa čokoladom', '2023-02-04 09:11:54', 'PistaciCoko.png', 5),
(8, 'Kinder Bueno', '2024-02-04 09:11:54', 'kinderBueno.png', 4),
(9, 'Pekan pita', '2023-02-04 09:11:54', 'PekanPita.png', 4),
(10, 'Višnja sa komadićima višnje', '2023-02-04 09:11:54', 'VisnjaVisnja.png', 3),
(11, 'Čokolada', '2023-02-04 09:11:54', 'Cokolada.png', 4),
(12, 'Bela čokolada sa karamelom', '2024-02-04 09:11:54', 'BelaCokoladaKaramela.png', 4),
(13, 'Višnja sa šerijem', '2024-02-04 09:11:54', 'VisnjaSheri.png', 3),
(14, 'Vanila', '2023-02-04 10:42:09', 'Vanila.png', 2),
(15, 'Vanila sa komadićima čokolade i karamele', '2024-02-04 10:43:04', 'VanilaCokoladaKaramela.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sladoled_lokacija`
--

CREATE TABLE `sladoled_lokacija` (
  `id_slad_lok` int NOT NULL,
  `id_lokacija` int NOT NULL,
  `id_sladoled` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `sladoled_lokacija`
--

INSERT INTO `sladoled_lokacija` (`id_slad_lok`, `id_lokacija`, `id_sladoled`) VALUES
(145, 1, 3),
(139, 1, 4),
(144, 1, 5),
(140, 1, 9),
(141, 1, 10),
(142, 1, 11),
(138, 1, 12),
(143, 1, 14),
(17, 2, 2),
(16, 2, 3),
(20, 2, 4),
(19, 2, 5),
(5, 2, 6),
(22, 2, 7),
(2, 2, 8),
(21, 2, 9),
(18, 2, 10),
(25, 2, 11),
(1, 2, 12),
(24, 2, 14),
(23, 2, 15),
(156, 3, 1),
(164, 3, 4),
(160, 3, 6),
(159, 3, 7),
(161, 3, 8),
(165, 3, 9),
(158, 3, 10),
(157, 3, 11),
(162, 3, 12),
(163, 3, 14),
(27, 4, 1),
(32, 4, 3),
(31, 4, 7),
(26, 4, 8),
(29, 4, 9),
(30, 4, 11),
(28, 4, 15),
(132, 5, 1),
(126, 5, 2),
(127, 5, 3),
(129, 5, 4),
(128, 5, 5),
(125, 5, 6),
(131, 5, 7),
(124, 5, 8),
(130, 5, 9),
(134, 5, 10),
(136, 5, 11),
(123, 5, 12),
(135, 5, 13),
(137, 5, 14),
(133, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `naziv` varchar(30) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `velicina`
--

CREATE TABLE `velicina` (
  `id_velicina` int NOT NULL,
  `naziv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `gramaza` int DEFAULT NULL,
  `cena` decimal(10,0) NOT NULL,
  `kolicina_ukusa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `velicina`
--

INSERT INTO `velicina` (`id_velicina`, `naziv`, `gramaza`, `cena`, `kolicina_ukusa`) VALUES
(1, 'Mala čaša/kornet ', 80, '260', 1),
(3, 'Srednja čaša/kornet', 140, '420', 2),
(5, 'Velika čaša/kornet', 210, '610', 3),
(6, 'Najveća čaša', 350, '980', 4);

-- --------------------------------------------------------

--
-- Table structure for table `vrste_narudzbina`
--

CREATE TABLE `vrste_narudzbina` (
  `id_vrsta` int NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `vrste_narudzbina`
--

INSERT INTO `vrste_narudzbina` (`id_vrsta`, `naziv`) VALUES
(1, 'Dostava'),
(2, 'Preuzimanje');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanci`
--
ALTER TABLE `clanci`
  ADD PRIMARY KEY (`id_clanak`),
  ADD UNIQUE KEY `naslov` (`naslov`),
  ADD UNIQUE KEY `slika` (`slika`),
  ADD KEY `id_kategorija` (`id_kategorija`);

--
-- Indexes for table `gradovi`
--
ALTER TABLE `gradovi`
  ADD PRIMARY KEY (`id_grad`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id_kategorija`);

--
-- Indexes for table `kategorijeclanaka`
--
ALTER TABLE `kategorijeclanaka`
  ADD PRIMARY KEY (`id_kategorija_clanka`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `kutija`
--
ALTER TABLE `kutija`
  ADD PRIMARY KEY (`id_kutija`);

--
-- Indexes for table `kutije_narudzbine`
--
ALTER TABLE `kutije_narudzbine`
  ADD PRIMARY KEY (`id_porKut_poruzbine`),
  ADD KEY `id_porucena_kutija` (`id_porucena_kutija`),
  ADD KEY `id_porudzbina` (`id_porudzbina`);

--
-- Indexes for table `lokacije`
--
ALTER TABLE `lokacije`
  ADD PRIMARY KEY (`id_lokacija`),
  ADD KEY `id_radno_vreme` (`id_radno_vreme`),
  ADD KEY `id_radno_vreme_dostave` (`id_radno_vreme_dostave`),
  ADD KEY `id_grad` (`id_grad`);

--
-- Indexes for table `narucene_kutije`
--
ALTER TABLE `narucene_kutije`
  ADD PRIMARY KEY (`id_porucena_kutija`),
  ADD KEY `id_slad` (`id_slad`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_kutija` (`id_kutija`),
  ADD KEY `id_slad2` (`id_slad2`),
  ADD KEY `id_slad3` (`id_slad3`),
  ADD KEY `id_slad4` (`id_slad4`);

--
-- Indexes for table `narudzbina`
--
ALTER TABLE `narudzbina`
  ADD PRIMARY KEY (`id_narudzbina`),
  ADD UNIQUE KEY `broj` (`broj`),
  ADD KEY `id_vrsta` (`id_vrsta`),
  ADD KEY `id_grad` (`id_grad`),
  ADD KEY `id_placanje` (`id_placanje`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_lokacija` (`id_lokacija`);

--
-- Indexes for table `navigacija`
--
ALTER TABLE `navigacija`
  ADD PRIMARY KEY (`id_navigacija`);

--
-- Indexes for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD PRIMARY KEY (`id_odgovor`);

--
-- Indexes for table `odgovori_pitanja`
--
ALTER TABLE `odgovori_pitanja`
  ADD PRIMARY KEY (`id_odg_pit`),
  ADD KEY `id_odgovor` (`id_odgovor`),
  ADD KEY `id_pitanje` (`id_pitanje`);

--
-- Indexes for table `pitanja`
--
ALTER TABLE `pitanja`
  ADD PRIMARY KEY (`id_pitanje`);

--
-- Indexes for table `placanje`
--
ALTER TABLE `placanje`
  ADD PRIMARY KEY (`id_placanje`);

--
-- Indexes for table `radno_vreme`
--
ALTER TABLE `radno_vreme`
  ADD PRIMARY KEY (`id_radno_vreme`);

--
-- Indexes for table `sladoledi`
--
ALTER TABLE `sladoledi`
  ADD PRIMARY KEY (`id_sladoled`),
  ADD UNIQUE KEY `naziv` (`naziv`),
  ADD KEY `kategorija_id` (`kategorija_id`);

--
-- Indexes for table `sladoled_lokacija`
--
ALTER TABLE `sladoled_lokacija`
  ADD PRIMARY KEY (`id_slad_lok`),
  ADD UNIQUE KEY `id_lokacija_2` (`id_lokacija`,`id_sladoled`),
  ADD KEY `id_lokacija` (`id_lokacija`),
  ADD KEY `id_sladoled` (`id_sladoled`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `velicina`
--
ALTER TABLE `velicina`
  ADD PRIMARY KEY (`id_velicina`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `vrste_narudzbina`
--
ALTER TABLE `vrste_narudzbina`
  ADD PRIMARY KEY (`id_vrsta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanci`
--
ALTER TABLE `clanci`
  MODIFY `id_clanak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gradovi`
--
ALTER TABLE `gradovi`
  MODIFY `id_grad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id_kategorija` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategorijeclanaka`
--
ALTER TABLE `kategorijeclanaka`
  MODIFY `id_kategorija_clanka` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `kutija`
--
ALTER TABLE `kutija`
  MODIFY `id_kutija` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kutije_narudzbine`
--
ALTER TABLE `kutije_narudzbine`
  MODIFY `id_porKut_poruzbine` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `lokacije`
--
ALTER TABLE `lokacije`
  MODIFY `id_lokacija` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `narucene_kutije`
--
ALTER TABLE `narucene_kutije`
  MODIFY `id_porucena_kutija` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `narudzbina`
--
ALTER TABLE `narudzbina`
  MODIFY `id_narudzbina` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `navigacija`
--
ALTER TABLE `navigacija`
  MODIFY `id_navigacija` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `odgovori`
--
ALTER TABLE `odgovori`
  MODIFY `id_odgovor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `odgovori_pitanja`
--
ALTER TABLE `odgovori_pitanja`
  MODIFY `id_odg_pit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pitanja`
--
ALTER TABLE `pitanja`
  MODIFY `id_pitanje` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `placanje`
--
ALTER TABLE `placanje`
  MODIFY `id_placanje` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `radno_vreme`
--
ALTER TABLE `radno_vreme`
  MODIFY `id_radno_vreme` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sladoledi`
--
ALTER TABLE `sladoledi`
  MODIFY `id_sladoled` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sladoled_lokacija`
--
ALTER TABLE `sladoled_lokacija`
  MODIFY `id_slad_lok` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `velicina`
--
ALTER TABLE `velicina`
  MODIFY `id_velicina` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vrste_narudzbina`
--
ALTER TABLE `vrste_narudzbina`
  MODIFY `id_vrsta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clanci`
--
ALTER TABLE `clanci`
  ADD CONSTRAINT `clanci_ibfk_1` FOREIGN KEY (`id_kategorija`) REFERENCES `kategorijeclanaka` (`id_kategorija_clanka`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `kutije_narudzbine`
--
ALTER TABLE `kutije_narudzbine`
  ADD CONSTRAINT `kutije_narudzbine_ibfk_1` FOREIGN KEY (`id_porucena_kutija`) REFERENCES `narucene_kutije` (`id_porucena_kutija`),
  ADD CONSTRAINT `kutije_narudzbine_ibfk_2` FOREIGN KEY (`id_porudzbina`) REFERENCES `narudzbina` (`id_narudzbina`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `lokacije`
--
ALTER TABLE `lokacije`
  ADD CONSTRAINT `lokacije_ibfk_1` FOREIGN KEY (`id_grad`) REFERENCES `gradovi` (`id_grad`),
  ADD CONSTRAINT `lokacije_ibfk_2` FOREIGN KEY (`id_radno_vreme_dostave`) REFERENCES `radno_vreme` (`id_radno_vreme`),
  ADD CONSTRAINT `lokacije_ibfk_3` FOREIGN KEY (`id_radno_vreme`) REFERENCES `radno_vreme` (`id_radno_vreme`);

--
-- Constraints for table `narucene_kutije`
--
ALTER TABLE `narucene_kutije`
  ADD CONSTRAINT `narucene_kutije_ibfk_1` FOREIGN KEY (`id_slad`) REFERENCES `sladoledi` (`id_sladoled`),
  ADD CONSTRAINT `narucene_kutije_ibfk_2` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`),
  ADD CONSTRAINT `narucene_kutije_ibfk_3` FOREIGN KEY (`id_kutija`) REFERENCES `kutija` (`id_kutija`),
  ADD CONSTRAINT `narucene_kutije_ibfk_4` FOREIGN KEY (`id_slad2`) REFERENCES `sladoledi` (`id_sladoled`),
  ADD CONSTRAINT `narucene_kutije_ibfk_5` FOREIGN KEY (`id_slad3`) REFERENCES `sladoledi` (`id_sladoled`),
  ADD CONSTRAINT `narucene_kutije_ibfk_6` FOREIGN KEY (`id_slad4`) REFERENCES `sladoledi` (`id_sladoled`);

--
-- Constraints for table `narudzbina`
--
ALTER TABLE `narudzbina`
  ADD CONSTRAINT `narudzbina_ibfk_1` FOREIGN KEY (`id_grad`) REFERENCES `gradovi` (`id_grad`),
  ADD CONSTRAINT `narudzbina_ibfk_2` FOREIGN KEY (`id_vrsta`) REFERENCES `vrste_narudzbina` (`id_vrsta`),
  ADD CONSTRAINT `narudzbina_ibfk_3` FOREIGN KEY (`id_placanje`) REFERENCES `placanje` (`id_placanje`),
  ADD CONSTRAINT `narudzbina_ibfk_4` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`),
  ADD CONSTRAINT `narudzbina_ibfk_5` FOREIGN KEY (`id_lokacija`) REFERENCES `lokacije` (`id_lokacija`);

--
-- Constraints for table `odgovori_pitanja`
--
ALTER TABLE `odgovori_pitanja`
  ADD CONSTRAINT `odgovori_pitanja_ibfk_1` FOREIGN KEY (`id_odgovor`) REFERENCES `odgovori` (`id_odgovor`),
  ADD CONSTRAINT `odgovori_pitanja_ibfk_2` FOREIGN KEY (`id_pitanje`) REFERENCES `pitanja` (`id_pitanje`);

--
-- Constraints for table `sladoledi`
--
ALTER TABLE `sladoledi`
  ADD CONSTRAINT `sladoledi_ibfk_1` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorije` (`id_kategorija`);

--
-- Constraints for table `sladoled_lokacija`
--
ALTER TABLE `sladoled_lokacija`
  ADD CONSTRAINT `sladoled_lokacija_ibfk_1` FOREIGN KEY (`id_sladoled`) REFERENCES `sladoledi` (`id_sladoled`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `sladoled_lokacija_ibfk_2` FOREIGN KEY (`id_lokacija`) REFERENCES `lokacije` (`id_lokacija`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
