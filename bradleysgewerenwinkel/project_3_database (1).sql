-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 11:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project 3 database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(12) NOT NULL,
  `gebruikerid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `gebruikerid`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(12) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `naam`, `email`, `wachtwoord`) VALUES
(1, 'hansbetaalt', 'hans@gamil.com', '$2y$10$CAn3dlEkgHavGeTXvf05RO54/30b9QpOpJSw5eCZZS1H3RmEZoKt.'),
(2, 'jan piet', 'jan_piet@hotmail.com', '$2y$10$rSZ4IA28BOW0qb60mrn6Gu2MGVC9DnqE9TZ5MEDiS0juaMC9RyLGe'),
(3, 'ardaangun', 'arda_iscool@hotmail.com', '$2y$10$PAHOCMzEZacx43I7mruLLuA3Ns/BD5q296Me1nfF./gh/LU9.3LCu'),
(4, 'bart12', 'bart@hotmail.com', '$2y$10$rT63rTGXDCuToC2BKTGnA.ruwEcTrru2DUlsvmhg0gVH.b8OnhD1e');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(12) NOT NULL,
  `productnaam` varchar(255) NOT NULL,
  `gebruikerid` varchar(255) NOT NULL,
  `datum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `id` int(12) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `prijs` int(12) NOT NULL,
  `catogorie` varchar(255) NOT NULL,
  `afbeelding` varchar(255) NOT NULL,
  `merken` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`id`, `naam`, `prijs`, `catogorie`, `afbeelding`, `merken`, `location`) VALUES
(1, ' H&N Baracuda 18 5,5 mm', 20, 'munitie', 'https://media.s-bol.com/RW97rkx2NvO/550x438.jpg', 'JSB', '../userpages/productenpage.php?1'),
(2, 'JSB Predator Polymag 9 mm .35', 17, 'munitie', 'https://sharg.pl/ger_pl_JSB-Predator-PolyMag-35-9mm-Airgun-Pellets-50psc-1012-01-50-112541_1.jpg', 'JSB', '../userpages/productenpage.php?2'),
(3, 'WALTHER Reign M2 6,35 mm .25', 799, 'luchtdrukwapen', 'https://cdn.webshopapp.com/shops/137816/files/426684714/600x465x3/walther-walther-reign-m2-635-mm-25.jpg', 'WALTHER', '../userpages/productenpage.php?3'),
(4, 'WALTHER Rotex RM8 UC 5,5 mm .22', 709, 'luchtdrukwapen', 'https://cdn.webshopapp.com/shops/137816/files/426922008/600x465x3/walther-walther-rotex-rm8-uc-55-mm-22.jpg', 'WALTHER', '../userpages/productenpage.php?4'),
(7, 'nerf geweer', 5, 'junior', 'https://nerf-pijltjes.nl/wp-content/uploads/2019/10/NERF-Rival-Knockout-XX-1000-Blauw-1.jpeg', 'nerf', '../userpages/productenpage.php?7'),
(8, 'NERF N-Strike Elite Surgefire - Blaster', 32, 'junior', 'https://media.s-bol.com/mZREojWmgrZn/1200x826.jpg', 'junior', ''),
(9, 'NERF Elite 2.0 Shockwave RD 15 - Blaster', 25, 'junior', 'https://media.s-bol.com/wrMnWkVBNYWR/wmPLgOz/1200x832.jpg', 'junior', ''),
(10, 'Smith & Wesson M&P 9 - Occasion', 525, 'vuurwapen', 'https://cdn.webshopapp.com/shops/137816/files/422520017/600x465x3/smith-wesson-smith-wesson-m-p-9-occasion.jpg', 'vuurwapen', ''),
(11, 'Norinco 1911 .45 ACP - Occasion', 175, 'vuurwapen', 'https://cdn.webshopapp.com/shops/137816/files/416386352/600x465x3/norinco-norinco-1911-45-acp-occasion.jpg', 'vuurwapen', ''),
(12, 'CZ TS 2 Deep Bronze', 299, 'vuurwapen', 'https://cdn.webshopapp.com/shops/137816/files/407264188/600x465x3/cz-cz-ts-2-deep-bronze.jpg', 'vuurwapen', ''),
(13, 'CZ P-09 Kadet 22 LR', 674, 'vuurwapen', 'https://cdn.webshopapp.com/shops/137816/files/289324293/600x465x3/cz-cz-p-09-kadet-22-lr.jpg', 'vuurwapen', ''),
(14, 'Sellier & Bellot 9mm LUGER FMJ 124 grain', 16, 'munitie', 'https://cdn.webshopapp.com/shops/137816/files/320670340/600x465x3/sellier-bellot-sellier-bellot-9mm-luger-fmj-124-gr.jpg', 'munitie', ''),
(15, 'Semi-Auto .22LR van Geco', 5, 'munitie', 'https://cdn.webshopapp.com/shops/137816/files/320405262/600x465x3/geco-semi-auto-22lr-van-geco.jpg', 'munitie', ''),
(16, '.22LR Standard munitie van Sellier & Bellot', 4, 'munitie', 'https://cdn.webshopapp.com/shops/137816/files/320462816/600x465x3/sellier-bellot-22lr-standard-munitie-van-sellier-b.jpg', 'munitie', ''),
(17, 'Airmax CP400 Multi Shot Co2 Pistool 4.5mm', 100, 'luchtdrukwapen', 'https://cdn.webshopapp.com/shops/137816/files/416173963/600x465x3/gsg-airmax-cp400-multi-shot-co2-pistool-45mm.jpg', 'luchtdrukwapen', ''),
(18, 'Hatsan Hercules 7.62mm PCP luchtbuks', 124, 'luchtdrukwapen', 'https://cdn.webshopapp.com/shops/137816/files/403183023/600x465x3/hatsan-hatsan-hercules-762mm-pcp-luchtbuks.jpg', 'luchtdrukwapen', ''),
(19, 'FX Impact M3 Black', 215, 'luchtdrukwapen', 'https://cdn.webshopapp.com/shops/137816/files/407857366/600x465x3/fx-airguns-fx-impact-m3-black.jpg', 'luchtdrukwapen', ''),
(24, 'trstwapen', 10, 'vuurwapen', 'https://media.s-bol.com/3rq0JG4Y3Lqx/MWkElG/550x299.jpg', 'test', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
