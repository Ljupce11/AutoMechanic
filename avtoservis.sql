-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 04:45 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avtoservis`
--

-- --------------------------------------------------------

--
-- Table structure for table `delovi`
--

CREATE TABLE `delovi` (
  `Del_ID` int(11) NOT NULL,
  `VoziloID` int(11) NOT NULL,
  `Ime` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Model` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Cena` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Naracka` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delovi`
--

INSERT INTO `delovi` (`Del_ID`, `VoziloID`, `Ime`, `Model`, `Cena`, `Naracka`) VALUES
(23, 27, 'Radio', 'Mercedes', '500', '0'),
(24, 28, 'Radio', 'Audi', '500', '0'),
(25, 29, 'Brisaci', 'BMW', '1500', '1');

-- --------------------------------------------------------

--
-- Table structure for table `naracka`
--

CREATE TABLE `naracka` (
  `NarackaID` int(11) NOT NULL,
  `Del_ID` int(11) NOT NULL,
  `VrabotenID` int(11) NOT NULL,
  `Cena` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `naracka`
--

INSERT INTO `naracka` (`NarackaID`, `Del_ID`, `VrabotenID`, `Cena`) VALUES
(8, 24, 1, '500');

-- --------------------------------------------------------

--
-- Table structure for table `popravka`
--

CREATE TABLE `popravka` (
  `PopravkaID` int(11) NOT NULL,
  `VrabotenID` int(11) NOT NULL,
  `Del_ID` int(11) NOT NULL,
  `Opis` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Cena` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Zavrsena` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `popravka`
--

INSERT INTO `popravka` (`PopravkaID`, `VrabotenID`, `Del_ID`, `Opis`, `Cena`, `Zavrsena`) VALUES
(14, 1, 23, 'Popravka', '200', '1'),
(15, 1, 24, 'Promena na staro radio so novo', '500', '0'),
(16, 1, 25, 'Promena na stari brisaci so novi', '500', '0');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `ServisID` int(11) NOT NULL,
  `PopravkaID` int(11) NOT NULL,
  `VrabotenID` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Cena` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`ServisID`, `PopravkaID`, `VrabotenID`, `Data`, `Cena`) VALUES
(6, 14, 1, '2018-05-02', '200'),
(7, 15, 1, '2018-05-02', '1000'),
(8, 16, 1, '2018-05-04', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `sopstvenik`
--

CREATE TABLE `sopstvenik` (
  `SopstvenikID` int(11) NOT NULL,
  `Ime` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Prezime` varchar(255) CHARACTER SET utf8 NOT NULL,
  `EMBG` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Telefon` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sopstvenik`
--

INSERT INTO `sopstvenik` (`SopstvenikID`, `Ime`, `Prezime`, `EMBG`, `Telefon`) VALUES
(35, 'Ljubomir', 'Bojadziev', '2501997480003', '077707755'),
(36, 'Nikola', 'Ivanov', '0101997480003', '077777777'),
(37, 'Ljupce', 'Bojadziev', '2525997480003', '2002302302');

-- --------------------------------------------------------

--
-- Table structure for table `vozilo`
--

CREATE TABLE `vozilo` (
  `VoziloID` int(11) NOT NULL,
  `SopstvenikID` int(11) NOT NULL,
  `Marka` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Godina` int(11) NOT NULL,
  `Kilometraza` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Boja` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Pogon` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Br_Shasija` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozilo`
--

INSERT INTO `vozilo` (`VoziloID`, `SopstvenikID`, `Marka`, `Godina`, `Kilometraza`, `Boja`, `Pogon`, `Br_Shasija`) VALUES
(27, 35, 'Mercedes CLS', 2015, '25000', 'Bela', 'Dizel', 'ASD888ASD'),
(28, 36, 'Audi A7', 2015, '50000', 'Bela', 'Hybrid', 'ASDKD898'),
(29, 37, 'BMW i5', 2018, '25000', 'Crna', 'Hybrid', '203929ASDD');

-- --------------------------------------------------------

--
-- Table structure for table `vraboten`
--

CREATE TABLE `vraboten` (
  `VrabotenID` int(11) NOT NULL,
  `Ime` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Prezime` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Lozinka` varchar(255) CHARACTER SET utf8 NOT NULL,
  `EMBG` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Pozicija` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vraboten`
--

INSERT INTO `vraboten` (`VrabotenID`, `Ime`, `Prezime`, `Lozinka`, `EMBG`, `Pozicija`) VALUES
(1, 'Ljubomir', 'Bojadziev', '292f2ea4e88d988c5523954fa15c4e71', '2501997480003', 'Serviser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delovi`
--
ALTER TABLE `delovi`
  ADD PRIMARY KEY (`Del_ID`),
  ADD KEY `VoziloID` (`VoziloID`);

--
-- Indexes for table `naracka`
--
ALTER TABLE `naracka`
  ADD PRIMARY KEY (`NarackaID`),
  ADD KEY `Del_ID` (`Del_ID`),
  ADD KEY `VrabotenID` (`VrabotenID`);

--
-- Indexes for table `popravka`
--
ALTER TABLE `popravka`
  ADD PRIMARY KEY (`PopravkaID`),
  ADD KEY `VrabotenID` (`VrabotenID`),
  ADD KEY `Del_ID` (`Del_ID`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`ServisID`),
  ADD KEY `VrabotenID` (`VrabotenID`),
  ADD KEY `PopravkaID` (`PopravkaID`);

--
-- Indexes for table `sopstvenik`
--
ALTER TABLE `sopstvenik`
  ADD PRIMARY KEY (`SopstvenikID`);

--
-- Indexes for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD PRIMARY KEY (`VoziloID`),
  ADD KEY `ServisID` (`SopstvenikID`);

--
-- Indexes for table `vraboten`
--
ALTER TABLE `vraboten`
  ADD PRIMARY KEY (`VrabotenID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delovi`
--
ALTER TABLE `delovi`
  MODIFY `Del_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `naracka`
--
ALTER TABLE `naracka`
  MODIFY `NarackaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `popravka`
--
ALTER TABLE `popravka`
  MODIFY `PopravkaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `ServisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sopstvenik`
--
ALTER TABLE `sopstvenik`
  MODIFY `SopstvenikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vozilo`
--
ALTER TABLE `vozilo`
  MODIFY `VoziloID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vraboten`
--
ALTER TABLE `vraboten`
  MODIFY `VrabotenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `servis`
--
ALTER TABLE `servis`
  ADD CONSTRAINT `servis_ibfk_1` FOREIGN KEY (`VrabotenID`) REFERENCES `vraboten` (`VrabotenID`),
  ADD CONSTRAINT `servis_ibfk_2` FOREIGN KEY (`PopravkaID`) REFERENCES `popravka` (`PopravkaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
