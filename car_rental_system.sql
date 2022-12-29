-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 09:04 PM
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
-- Database: `car_rental_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `plate_id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `price_per_day` double UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`plate_id`, `brand`, `model`, `body`, `color`, `year`, `status`, `price_per_day`) VALUES
(84252265, 'BMW', 'Harley', 'Hatchback', 'blue', 2020, 'active', 699.85),
(84596939, 'Fisker', 'Noodle', 'Sedan', 'white', 2010, 'active', 571.5),
(90198969, 'Land Rover', 'Rocky', 'Kammback', 'blue', 2001, 'active', 511.74),
(93466522, 'Volkswagen', 'Nala', 'CUV', 'black', 2003, 'active', 503.76),
(94656589, 'Maybach', 'Marley', 'Cabriolet', 'black', 2006, 'active', 571.44),
(95695504, 'Tesla', 'Blackie', 'Roadster', 'red', 2003, 'active', 634),
(97470234, 'Mitsubishi', 'Ginger', 'CUV', 'red', 2004, 'active', 671.4),
(99308913, 'Lada', 'Sassy', 'Cabriolet', 'blue', 2010, 'active', 643.98),
(99655700, 'Tesla', 'Sasha', 'Coupe', 'black', 2022, 'active', 664.9),
(99871125, 'DS', 'Muffin', 'Roadster', 'red', 2022, 'active', 552.82);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_Id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_Id`, `country`, `city`) VALUES
(1, 'egypt', 'cairo'),
(2, 'uae', 'dubai'),
(3, 'egypt', 'alexandria'),
(4, 'England', 'London'),
(5, 'England', 'Manchester');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `plate_id` int(10) UNSIGNED NOT NULL,
  `office_Id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `reservation_date` date NOT NULL,
  `pick_up_date` date NOT NULL,
  `return_date` date NOT NULL,
  `payment` double UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `balance` double UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `balance`, `email`, `password`, `bdate`, `gender`, `country`, `city`, `is_admin`) VALUES
(1, 'Joeann', 'Enoch', 10000, 'zula8732@hotmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2015-05-10', 1, 'Djibouti', 'Minneapolis', 1),
(2, 'Aimee', 'Kathryn', 5000.59, 'daronvanmeter4828@played.yugawa.fukushima.jp', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1984-11-06', 0, 'Bolivia', 'New Bedford', 0),
(3, 'Nigel', 'Bruce', 550.68, 'thuybeck75@recordings.edu.ar', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2008-03-27', 0, 'Belgium', 'Orange', 0),
(4, 'Brandy', 'Hattie', 1.83, 'hung908@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1986-03-21', 1, 'Ivory Coast', 'Syracuse', 0),
(5, 'Elizabet', 'Eleonore', 60.21, 'laurie0@yahoo.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2008-02-10', 1, 'Angola', 'Huntsville', 0),
(6, 'Dani', 'Cara', 3.03, 'keely_richie@populations.wake.okayama.jp', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1975-05-25', 0, 'Haiti', 'Hampton', 0),
(7, 'Teodoro', 'Kathryne', 83.18, 'elodia.barrios@dates.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2004-11-19', 0, 'Mongolia', 'New York City', 0),
(8, 'Cathrine', 'Towanda', 43.91, 'jenniffer.slagle312@flags.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2001-01-28', 0, 'Dominican Republic', 'Topeka', 0),
(9, 'Madison', 'Rory', 19.58, 'denyse-conover-griffis718@yahoo.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1978-03-06', 1, 'Qatar', 'Joliet', 0),
(10, 'Ira', 'Tyler', 59.17, 'loraine.lu58416@husband.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2016-08-10', 0, 'Denmark', 'Baltimore', 0),
(11, 'Brandee', 'Judith', 56.53, 'royal-finney@respondent.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2020-01-03', 1, 'Bahrain', 'Panama City', 0),
(12, 'Roxanne', 'Angelyn', 53.87, 'un6@amd.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2009-04-18', 0, 'Kenya', 'Portland', 0),
(13, 'Neville', 'Xenia', 77.26, 'tomas18072@opposed.smøla.no', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2020-09-22', 0, 'Chad', 'Virginia Beach', 0),
(14, 'Tracey', 'Erlene', 10.88, 'meaghanrobinson7419@cole.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1973-12-09', 0, 'Portugal', 'Fairfield', 0),
(15, 'Trish', 'Lana', 27.66, 'sadye.driver@hotmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1972-05-06', 1, 'Angola', 'Clearwater', 0),
(16, 'Chiquita', 'Rosemary', 33, 'judy.guy73869@hotmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1998-10-17', 1, 'Lithuania', 'Spokane', 0),
(17, 'Clarinda', 'Magaret', 60.87, 'georgine-byrne@iran.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1981-08-05', 0, 'Benin', 'Fremont', 0),
(18, 'Carisa', 'Natasha', 29.19, 'ingrid_weinstein563@yahoo.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2000-10-03', 1, 'South Sudan', 'Minneapolis', 0),
(19, 'Stephani', 'Jaquelyn', 29.15, 'tamicatotten82561@madagascar.gjovik.no', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1996-04-04', 1, 'France', 'York', 0),
(20, 'Elly', 'Raisa', 89.3, 'pilar_east@newman.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1997-03-02', 1, 'Zimbabwe', 'Madison', 0),
(21, 'Fonda', 'Derek', 81.51, 'valery_hume-hays@hotmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1987-12-17', 0, 'Peru', 'Apple Valley', 0),
(22, 'Racheal', 'Araceli', 80.1, 'versieguffey@tgp.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2003-06-25', 1, 'New Zealand', 'Thousand Oaks', 0),
(23, 'Sherilyn', 'Gwyn', 21.08, 'raven.fabian479@up.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2006-01-28', 0, 'Cuba', 'Harrisburg', 0),
(24, 'Fabiola', 'Lauretta', 13.01, 'kenton.harter3@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2002-12-21', 0, 'Uzbekistan', 'Warren', 0),
(25, 'Maryellen', 'Jani', 80.32, 'calista2413@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1992-02-09', 1, 'Syria', 'Newburgh', 0),
(26, 'Janyce', 'Jillian', 98.54, 'petrina_anaya00@yahoo.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1993-05-29', 0, 'Thailand', 'Fort Walton Beach', 0),
(27, 'Imelda', 'Max', 41.02, 'fiona-goode283@agent.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2019-06-05', 0, 'Montenegro', 'Santa Rosa', 0),
(28, 'Jenniffer', 'Alonso', 75.31, 'ettie28080@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2021-02-09', 1, 'Pakistan', 'San Bernardino', 0),
(29, 'Judy', 'Mathilda', 18, 'rachell6433@occasion.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2006-01-22', 1, 'Mali', 'Lorain', 0),
(30, 'Efren', 'Ammie', 89, 'patty76@boots.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2006-05-29', 0, 'Swaziland', 'Roanoke', 0),
(31, 'Marna', 'Ken', 35.62, 'keeley74506@hotmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2015-09-01', 0, 'Finland', 'Chandler', 0),
(32, 'Trudi', 'Dianna', 57.88, 'agustina6@specified.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1986-04-15', 0, 'Yemen', 'Elkhart', 0),
(33, 'Candida', 'Rosario', 82.16, 'terina_rock@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2008-06-12', 1, 'Myanmar, {Burma}', 'Madison', 0),
(34, 'Lana', 'Les', 25.72, 'georgianna.fay@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2011-12-15', 1, 'Senegal', 'Lakeland', 0),
(35, 'Art', 'Ezra', 71.08, 'brianne.santos5@hotmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1986-05-01', 0, 'Panama', 'Waterloo', 0),
(36, 'Regan', 'Sulema', 47.98, 'carolann.packer99318@belarus.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1986-11-30', 0, 'Finland', 'Thornton', 0),
(37, 'Joelle', 'Shizuko', 88.07, 'florencia.rickard@spas.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2015-09-08', 0, 'Nicaragua', 'Amarillo', 0),
(38, 'Lupita', 'Marylee', 98.51, 'kandy4468@generate.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2011-02-10', 1, 'Malawi', 'Fitchburg', 0),
(39, 'Mauricio', 'Clarinda', 38.61, 'courtney390@lesson.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1986-08-13', 0, 'Namibia', 'Manchester', 0),
(40, 'Renato', 'Yuonne', 67.8, 'isaac.plante@hotmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1972-06-06', 1, 'Mexico', 'Orange', 0),
(41, 'Terese', 'Pei', 28.25, 'cassi-spinks500@naples.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1997-05-18', 0, 'Burundi', 'Arlington', 0),
(42, 'Rosalie', 'Tereasa', 62.48, 'enda573@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1983-12-04', 1, 'Solomon Islands', 'Laredo', 0),
(43, 'Luke', 'Ross', 36.07, 'indira_munger@excellent.網絡.hk', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1987-06-11', 0, 'Lithuania', 'Lubbock', 0),
(44, 'Jennette', 'Suzette', 41.81, 'gudruncamara2528@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1989-11-14', 1, 'Vatican City', 'Concord', 0),
(45, 'Elida', 'Fredricka', 85.25, 'bernice_curran25@circular.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2019-01-29', 0, 'Singapore', 'Port Saint Lucie', 0),
(46, 'Ruthanne', 'Bea', 86.28, 'queenie.worthy6775@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1998-09-27', 1, 'Fiji', 'Pompano Beach', 0),
(47, 'Olimpia', 'Tarah', 6.89, 'isabellecavazos0930@hotmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2005-03-10', 1, 'Bahrain', 'North Port', 0),
(48, 'Librada', 'Yoshiko', 62.62, 'georgiana-judkins@tx.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '2004-04-12', 0, 'Sri Lanka', 'San Buenaventura', 0),
(49, 'Ossie', 'Owen', 32.19, 'nohemi.mcclelland7175@instrumentation.toga.toyama.jp', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1986-02-25', 0, 'Iraq', 'Davidson County', 0),
(50, 'Minh', 'Teofila', 92.65, 'sammiedoss-counts9@gmail.com', 'b6eed1ceec6d0ecc74cc6e17f078938ba4431764', '1999-06-03', 1, 'Luxembourg', 'Olympia', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`plate_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_Id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`user_id`,`plate_id`,`office_Id`),
  ADD UNIQUE KEY `res_id_unique` (`reservation_id`),
  ADD KEY `reservation_user_id_fk` (`user_id`),
  ADD KEY `plate_id_update_delete_cascade` (`plate_id`),
  ADD KEY `office_id_update_delete_cascade` (`office_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `office_id_update_delete_cascade` FOREIGN KEY (`office_Id`) REFERENCES `office` (`office_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plate_id_update_delete_cascade` FOREIGN KEY (`plate_id`) REFERENCES `car` (`plate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_office_id_fk` FOREIGN KEY (`office_Id`) REFERENCES `office` (`office_Id`),
  ADD CONSTRAINT `reservation_plate_id_fk` FOREIGN KEY (`plate_id`) REFERENCES `car` (`plate_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_update_delete_cascade` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
