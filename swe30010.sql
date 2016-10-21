-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2016 at 10:17 AM
-- Server version: 5.7.15-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swe30010`
--

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(256) NOT NULL,
  `itemDesc` text NOT NULL,
  `itemCount` int(11) NOT NULL,
  `itemPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`itemID`, `itemName`, `itemDesc`, `itemCount`, `itemPrice`) VALUES
(1, 'Rivoltril', 'Each pale orange, cylindrical, biplane, scored, bevelled-edged tablet, with "ROCHE" over "0.5" on one side, cross-scored on the other, contains clonazepam 0.5 mg. ', 235, 352.14),
(2, 'Tirofiban', '50 micrograms/ml Solution for Infusion', 34, 303.33),
(3, 'Pantoprazole Sodium', 'For injection, 40 mg', 10, 153.32),
(4, 'Paracetamol ', '500mg tablet oral, anti inflammation, relief fever', 289, 12.1),
(5, 'Accutane (Isotretinoin) Roaccutane', '10mg 30tbs. Anti anxiety and anti depression.', 37, 186.52),
(6, 'Differin (Adapalene)', '0.10 GEL 30 grams gel. Avoid prolonged exposure to sunlight. Differin may increase the sensitivity of your skin to sunlight. Use a sunscreen and wear protective clothing when sun exposure is unavoidable. Do not use adapalene on sunburned, windburned, dry, chapped, or irritated skin or on open wounds. Avoid abrasive, harsh, or drying soaps and cleansers while using differin.', 1515, 356.12),
(7, 'REVIA (VIVITROL)(NALTREXONE) BRAND 50 mg 56 tablets', 'REVIA (naltrexone hydrochloride tablets USP), an opioid antagonist, is a synthetic congener of oxymorphone with no opioid agonist properties. Naltrexone differs in structure from oxymorphone in that the methyl group on the nitrogen atom is replaced by a cyclopropylmethyl group.', 85, 422.36),
(8, 'Aerius(Desloratadine)', '5mg 20tbs. Antihistamine, used to relieve the symptoms of hay fever and hives of the skin.', 2301, 123.45),
(9, 'Aspirin', '300mg tablet oral, pain killer, for cardiovascular disease prophylaxis', 356, 22.2),
(10, 'Ibuprofen', '200mg tab oral, for fever and pain killer', 519, 1.32),
(11, 'Indomethacin', '25mg capsule oral, pain killer', 4532, 12.33),
(12, 'Mefenamic acid', '250mg tab , for menstrual pain', 2324, 1.99),
(13, 'Indomethacin', '25mg capsule oral, general pain killer', 3876, 25.78),
(14, 'Diclofenac sodium', '50mg tab, general pain killer', 2323, 18.78),
(15, 'Augmentin', '600mg injection. To treat infection caused by susceptible organism', 358, 89.64),
(16, 'Amoxicilin', '250mg capsule. To treat infection caused by susceptible organism', 798, 65.48),
(17, 'Augmentin', '600mg injection. To treat infection caused by susceptible organism', 897, 53.45),
(18, 'Amoxicilin', '250mg capsule. To treat infection caused by susceptible organism', 587, 23.56),
(19, 'Ampicilin ', '500mg capsule. To treat infection caused by susceptible organism', 489, 68.14),
(20, 'Penicillin V', '125mg tab. To treat infection caused by susceptible organism', 8746, 11.45),
(21, 'Erythromycin', '250mg tab. To treat infection caused by susceptible organism', 6870, 23.21),
(22, 'Azithromycin', '250mg tab. To treat infection caused by susceptible organism', 12, 8785),
(23, 'Vancomycin HCl', '500mg injection. To treat infection caused by susceptible organism', 3857, 123.7),
(24, 'Rifampicin', '150mg capsule. Anti-tuberculosis agent.', 5401, 85.12),
(25, 'Isoniazid', '400mg tab. Anti-tuberculosis agent.', 4587, 54.132),
(26, 'Ethambutol HCl', '400mg tab. Anti-tuberculosis agent.', 5478, 25.89),
(27, 'Pyrazinamide', '500mg tab. Anti-tuberculosis agent.', 897, 64.45),
(28, 'Streptomycin sulphate ', '1g injection. Anti-tuberculosis agent.', 6354, 79.13),
(29, 'Cefuroxime', '1.5g injection. To treat infection caused by susceptible organism', 689, 64.46),
(30, 'Ceftazidime', '2g injection. To treat infection caused by susceptible organism', 9847, 12.654),
(31, 'Bonjela', '200g gel. Contains keratolytic and mildly antiseptic salicylic acid in the form of its salt choline salicylate and the antiseptic cetalkonium chloride as active ingredients. **ONLY SUITABLE FOR PEOPLE AGED 16 OR ABOVE**', 653, 15.32),
(32, 'Metronidazole', '200mg tab. Cures anaerobic infection.', 3541, 78.2);

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `salesID` int(11) NOT NULL,
  `salesDate` date NOT NULL,
  `invoice` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`salesID`, `salesDate`, `invoice`) VALUES
(1, '2010-02-01', 'INV0001'),
(2, '2010-10-17', 'INV0002'),
(3, '2010-10-18', 'INV0003'),
(5, '2010-10-11', 'INV0003'),
(6, '2010-10-02', 'INV0005'),
(7, '2010-10-02', 'INV0006'),
(8, '2010-10-02', 'INV0008'),
(9, '2010-10-02', 'INV0010'),
(10, '2010-10-02', 'INV0011');

-- --------------------------------------------------------

--
-- Table structure for table `SalesItem`
--

CREATE TABLE `SalesItem` (
  `salesID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `itemCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SalesItem`
--

INSERT INTO `SalesItem` (`salesID`, `itemID`, `itemCount`) VALUES
(1, 2, 1),
(1, 3, 1),
(2, 5, 2),
(2, 7, 3),
(2, 8, 9),
(3, 2, 12),
(3, 3, 10),
(3, 6, 5),
(3, 8, 12),
(5, 1, 1),
(5, 6, 2),
(6, 10, 23),
(6, 16, 14),
(6, 20, 2),
(6, 32, 4),
(7, 17, 43),
(7, 19, 12),
(8, 14, 35),
(8, 31, 44),
(8, 32, 12),
(9, 18, 1),
(9, 19, 2),
(9, 29, 1),
(10, 31, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`itemID`),
  ADD UNIQUE KEY `itemID` (`itemID`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`salesID`);

--
-- Indexes for table `SalesItem`
--
ALTER TABLE `SalesItem`
  ADD PRIMARY KEY (`salesID`,`itemID`),
  ADD KEY `itemID` (`itemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
  MODIFY `salesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `SalesItem`
--
ALTER TABLE `SalesItem`
  ADD CONSTRAINT `SalesItem_ibfk_1` FOREIGN KEY (`salesID`) REFERENCES `Sales` (`salesID`),
  ADD CONSTRAINT `SalesItem_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `Inventory` (`itemID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
