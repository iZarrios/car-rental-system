-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 05:51 PM
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
-- CREATE DATABASE  car_rental_system;
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
(22408392, 'Dodge', 'MIMI', 'Sedan', 'blue', 2010, 'active', 519.16),
(79511257, 'Porsche', 'cupcake', 'CUV', 'black', 2022, 'active', 629.52),
(79902974, 'Alfa Romeo', 'Midnight', 'Cabriolet', 'blue', 2007, 'active', 631.23),
(81421388, 'Smart', 'Gizmo', 'Hatchback', 'red', 2010, 'active', 522.71),
(82503457, 'Iveco', 'Cali', 'Sedan', 'blue', 2021, 'active', 506.74),
(83874324, 'Alfa Romeo', 'Baby', 'Coupe', 'white', 2001, 'active', 576.52),
(84252265, 'BMW', 'Harley', 'Hatchback', 'blue', 2020, 'active', 699.85),
(84596939, 'Fisker', 'Noodle', 'Sedan', 'white', 2010, 'active', 571.5),
(90198969, 'Land Rover', 'Rocky', 'Kammback', 'blue', 2001, 'active', 511.74),
(93466522, 'Volkswagen', 'Nala', 'CUV', 'black', 2003, 'active', 503.76),
(94656589, 'Maybach', 'Marley', 'Cabriolet', 'black', 2006, 'active', 571.44),
(95695504, 'Tesla', 'Blackie', 'Roadster', 'red', 2003, 'active', 634),
(97065179, 'Abarth', 'Milo', 'Hatchback', 'yellow', 2020, 'active', 576.3),
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
(3, 'egypt', 'alexandria');

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
(1, 'Refugio', 'Deshawn', 60.67, 'doreneadcock@gmail.com', 'zZ123456', '1997-10-19', 1, 'Swaziland', 'Harlingen', 0),
(2, 'Lona', 'Blanche', 15.92, 'sixtavance@yahoo.com', 'zZ123456', '1996-08-31', 1, 'Denmark', 'Phoenix', 0),
(3, 'Nona', 'Monica', 12.22, 'melissa_maxwell8@proof.nym.bz', 'zZ123456', '1976-08-24', 1, 'Nicaragua', 'Nashua', 0),
(4, 'Marth', 'Dan', 78.64, 'tien-brewer@forecasts.com', 'zZ123456', '2011-08-09', 0, 'Kyrgyzstan', 'Lincoln', 0),
(5, 'Candida', 'Joella', 68.23, 'garrett-shapiro15@gmail.com', 'zZ123456', '1993-10-18', 0, 'Grenada', 'Hampton', 0),
(6, 'Devora', 'Kenny', 41.55, 'barabara-brice24@yahoo.com', 'zZ123456', '2016-04-02', 0, 'Greece', 'Pompano Beach', 0),
(7, 'January', 'Kendrick', 97.22, 'jacelyn30027@gmail.com', 'zZ123456', '1985-04-22', 0, 'Central African Rep', 'Fort Worth', 0),
(8, 'Nannette', 'Xavier', 60.88, 'lashell_jankowski@gmail.com', 'zZ123456', '2013-05-12', 1, 'United States', 'Cleveland', 0),
(9, 'Librada', 'Bradford', 71.66, 'chanelmattson33@gmail.com', 'zZ123456', '2014-01-31', 1, 'Mali', 'Winston', 0),
(10, 'Arminda', 'Lester', 71.44, 'gertude547@entertaining.com', 'zZ123456', '2011-02-20', 1, 'Greece', 'Bellevue', 0),
(11, 'Thaddeus', 'Latrice', 21.12, 'mabelle.harr@gmail.com', 'zZ123456', '2019-01-21', 1, 'Jamaica', 'Henderson', 0),
(12, 'Bibi', 'Cheryl', 82.29, 'oma_oconnell@syndication.academy', 'zZ123456', '2022-09-05', 1, 'Botswana', 'Stamford', 0),
(13, 'Francina', 'Tisha', 33.67, 'teressa-milton@exhibits.com', 'zZ123456', '2012-02-09', 0, 'Mozambique', 'Mesa', 0),
(14, 'Marlin', 'Mirian', 59.92, 'eliz40645@threats.com', 'zZ123456', '1975-02-08', 1, 'Brunei', 'New York City', 0),
(15, 'Maris', 'Johnny', 42.98, 'theodora-boudreau@yahoo.com', 'zZ123456', '2019-08-01', 1, 'Paraguay', 'Utica', 0),
(16, 'Monnie', 'Latesha', 58.65, 'hellen_garnett8922@lone.toyooka.hyogo.jp', 'zZ123456', '2009-03-11', 0, 'St Lucia', 'Salem', 0),
(17, 'Junior', 'Aleida', 84.71, 'kermit53123@hotmail.com', 'zZ123456', '1985-11-13', 0, 'Mozambique', 'Vero Beach', 0),
(18, 'Lyndon', 'Bettyann', 83.51, 'kennyhorowitz859@fp.com', 'zZ123456', '2018-11-01', 0, 'Venezuela', 'Lacey', 0),
(19, 'Tora', 'Maisie', 10.26, 'phuong.murphy@gmail.com', 'zZ123456', '1993-01-02', 0, 'Nigeria', 'Fullerton', 0),
(20, 'Olin', 'Dalene', 85.36, 'annemariesimone@yahoo.com', 'zZ123456', '1997-01-29', 1, 'East Timor', 'Port Orange', 0),
(21, 'Velma', 'Stuart', 45.22, 'jamal-browning81@gmail.com', 'zZ123456', '1983-01-31', 1, 'Switzerland', 'Evansville', 0),
(22, 'Providencia', 'Letisha', 67.14, 'kerry1368@range.com', 'zZ123456', '1978-01-26', 1, 'Andorra', 'Lewisville', 0),
(23, 'Brandy', 'Barbara', 91.34, 'doretta94@supposed.com', 'zZ123456', '1997-03-06', 0, 'Cuba', 'Richmond', 0),
(24, 'May', 'Lenna', 71.92, 'alberta_scherer@gmail.com', 'zZ123456', '2006-05-12', 0, 'Korea South', 'Boulder', 0),
(25, 'Natacha', 'Thad', 45.55, 'rooseveltdelgado@gmail.com', 'zZ123456', '2007-01-04', 1, 'Mongolia', 'Kenosha', 0),
(26, 'Chi', 'Genny', 15.69, 'dave.hynes@yoga.com', 'zZ123456', '1992-04-20', 1, 'Japan', 'Dallas', 0),
(27, 'Freda', 'Monte', 9.31, 'ardellecruz@symbols.pccw', 'zZ123456', '1978-03-14', 0, 'Malawi', 'Racine', 0),
(28, 'Celinda', 'Darron', 96.42, 'yoshiebeckman059@wool.com', 'zZ123456', '1973-04-02', 1, 'Luxembourg', 'Port Orange', 0),
(29, 'German', 'Sherly', 23.6, 'scott.higgs25000@gotta.com', 'zZ123456', '2012-01-27', 0, 'United Arab Emirates', 'Rancho Cucamonga', 0),
(30, 'Delphia', 'Deeann', 83.12, 'trisha-valdes996@yahoo.com', 'zZ123456', '1974-06-26', 0, 'Colombia', 'Albuquerque', 0),
(31, 'Bart', 'Cherrie', 5.74, 'katy-jensen7@perfect.com', 'zZ123456', '1995-12-18', 0, 'Samoa', 'Saint Petersburg', 0),
(32, 'Margert', 'Bret', 35.17, 'shelton-enos@hotmail.com', 'zZ123456', '1982-04-03', 0, 'Nigeria', 'Myrtle Beach', 0),
(33, 'Vergie', 'Lino', 60.29, 'kyung9@prints.web.ve', 'zZ123456', '1974-03-11', 0, 'Canada', 'Wichita', 0),
(34, 'Ileana', 'Ceola', 31.43, 'nidatang@mardi.com', 'zZ123456', '1990-02-17', 0, 'Gabon', 'Orem', 0),
(35, 'Krystle', 'Chelsey', 38.73, 'avery-meek@hughes.com', 'zZ123456', '2008-03-01', 0, 'Sierra Leone', 'Greensboro', 0),
(36, 'Renata', 'Qiana', 32.13, 'fay_marion8@education.com', 'zZ123456', '1975-08-16', 0, 'Australia', 'Knoxville', 0),
(37, 'Marsha', 'Melonie', 40.41, 'sherly.howe6@hotmail.com', 'zZ123456', '1975-06-09', 0, 'Sri Lanka', 'Roanoke', 0),
(38, 'Kayleen', 'Phylis', 1.91, 'ivelissealston@hotmail.com', 'zZ123456', '2019-01-21', 0, 'Sierra Leone', 'Carrollton', 0),
(39, 'Saran', 'Mariana', 26.51, 'lynda_calkins54792@velocity.com', 'zZ123456', '1998-05-01', 0, 'Armenia', 'St. Louis', 0),
(40, 'Else', 'Lorelei', 60.71, 'harmony4739@gmail.com', 'zZ123456', '1989-09-24', 0, 'Bulgaria', 'Modesto', 0),
(41, 'Jacki', 'Sherron', 13.18, 'rosalyn4@annie.googlecode.com', 'zZ123456', '1993-03-14', 1, 'Algeria', 'Tempe', 0),
(42, 'Anh', 'Shaunte', 37.53, 'brigette_hoyle124@tonight.com', 'zZ123456', '1981-08-17', 1, 'Costa Rica', 'Winter Haven', 0),
(43, 'Ruben', 'Bethany', 26.89, 'maximina.beeler@dress.com', 'zZ123456', '2017-04-12', 1, 'Madagascar', 'Houston', 0),
(44, 'Leon', 'Tana', 11.2, 'erlinda27@outer.com', 'zZ123456', '2016-06-08', 1, 'Kuwait', 'Simi Valley', 0),
(45, 'Sharlene', 'Mathilda', 92.01, 'contessa_keel@orientation.com', 'zZ123456', '1975-06-16', 0, 'Austria', 'Costa Mesa', 0),
(46, 'Prince', 'Bernardina', 92.54, 'myrtis_abel1976@gmail.com', 'zZ123456', '1989-05-31', 0, 'France', 'Albuquerque', 0),
(47, 'Delmar', 'Marylin', 46.48, 'natalia_cornwell@encourage.com', 'zZ123456', '1970-02-24', 1, 'Syria', 'West Covina', 0),
(48, 'Lachelle', 'Riley', 44.47, 'joneblankenship41646@queries.com', 'zZ123456', '2018-07-29', 1, 'Namibia', 'Roseville', 0),
(49, 'Vicky', 'Jeremiah', 83.29, 'sadye17@hotmail.com', 'zZ123456', '1983-03-05', 1, 'Korea South', 'Fitchburg', 0),
(50, 'Madie', 'Beatris', 32.48, 'ahmed.harley89626@union.com', 'zZ123456', '2006-07-22', 0, 'Burkina', 'Inglewood', 0),
(51, 'Joeann', 'Enoch', 76.54, 'zula8732@hotmail.com', 'zZ123456', '2015-05-10', 1, 'Djibouti', 'Minneapolis', 0),
(52, 'Aimee', 'Kathryn', 5.59, 'daronvanmeter4828@played.yugawa.fukushima.jp', 'zZ123456', '1984-11-06', 0, 'Bolivia', 'New Bedford', 0),
(53, 'Nigel', 'Bruce', 55.68, 'thuybeck75@recordings.edu.ar', 'zZ123456', '2008-03-27', 0, 'Belgium', 'Orange', 0),
(54, 'Brandy', 'Hattie', 1.83, 'hung908@gmail.com', 'zZ123456', '1986-03-21', 1, 'Ivory Coast', 'Syracuse', 0),
(55, 'Elizabet', 'Eleonore', 60.21, 'laurie0@yahoo.com', 'zZ123456', '2008-02-10', 1, 'Angola', 'Huntsville', 0),
(56, 'Dani', 'Cara', 3.03, 'keely_richie@populations.wake.okayama.jp', 'zZ123456', '1975-05-25', 0, 'Haiti', 'Hampton', 0),
(57, 'Teodoro', 'Kathryne', 83.18, 'elodia.barrios@dates.com', 'zZ123456', '2004-11-19', 0, 'Mongolia', 'New York City', 0),
(58, 'Cathrine', 'Towanda', 43.91, 'jenniffer.slagle312@flags.com', 'zZ123456', '2001-01-28', 0, 'Dominican Republic', 'Topeka', 0),
(59, 'Madison', 'Rory', 19.58, 'denyse-conover-griffis718@yahoo.com', 'zZ123456', '1978-03-06', 1, 'Qatar', 'Joliet', 0),
(60, 'Ira', 'Tyler', 59.17, 'loraine.lu58416@husband.com', 'zZ123456', '2016-08-10', 0, 'Denmark', 'Baltimore', 0),
(61, 'Brandee', 'Judith', 56.53, 'royal-finney@respondent.com', 'zZ123456', '2020-01-03', 1, 'Bahrain', 'Panama City', 0),
(62, 'Roxanne', 'Angelyn', 53.87, 'un6@amd.com', 'zZ123456', '2009-04-18', 0, 'Kenya', 'Portland', 0),
(63, 'Neville', 'Xenia', 77.26, 'tomas18072@opposed.smøla.no', 'zZ123456', '2020-09-22', 0, 'Chad', 'Virginia Beach', 0),
(64, 'Tracey', 'Erlene', 10.88, 'meaghanrobinson7419@cole.com', 'zZ123456', '1973-12-09', 0, 'Portugal', 'Fairfield', 0),
(65, 'Trish', 'Lana', 27.66, 'sadye.driver@hotmail.com', 'zZ123456', '1972-05-06', 1, 'Angola', 'Clearwater', 0),
(66, 'Chiquita', 'Rosemary', 33, 'judy.guy73869@hotmail.com', 'zZ123456', '1998-10-17', 1, 'Lithuania', 'Spokane', 0),
(67, 'Clarinda', 'Magaret', 60.87, 'georgine-byrne@iran.com', 'zZ123456', '1981-08-05', 0, 'Benin', 'Fremont', 0),
(68, 'Carisa', 'Natasha', 29.19, 'ingrid_weinstein563@yahoo.com', 'zZ123456', '2000-10-03', 1, 'South Sudan', 'Minneapolis', 0),
(69, 'Stephani', 'Jaquelyn', 29.15, 'tamicatotten82561@madagascar.gjovik.no', 'zZ123456', '1996-04-04', 1, 'France', 'York', 0),
(70, 'Elly', 'Raisa', 89.3, 'pilar_east@newman.com', 'zZ123456', '1997-03-02', 1, 'Zimbabwe', 'Madison', 0),
(71, 'Fonda', 'Derek', 81.51, 'valery_hume-hays@hotmail.com', 'zZ123456', '1987-12-17', 0, 'Peru', 'Apple Valley', 0),
(72, 'Racheal', 'Araceli', 80.1, 'versieguffey@tgp.com', 'zZ123456', '2003-06-25', 1, 'New Zealand', 'Thousand Oaks', 0),
(73, 'Sherilyn', 'Gwyn', 21.08, 'raven.fabian479@up.com', 'zZ123456', '2006-01-28', 0, 'Cuba', 'Harrisburg', 0),
(74, 'Fabiola', 'Lauretta', 13.01, 'kenton.harter3@gmail.com', 'zZ123456', '2002-12-21', 0, 'Uzbekistan', 'Warren', 0),
(75, 'Maryellen', 'Jani', 80.32, 'calista2413@gmail.com', 'zZ123456', '1992-02-09', 1, 'Syria', 'Newburgh', 0),
(76, 'Janyce', 'Jillian', 98.54, 'petrina_anaya00@yahoo.com', 'zZ123456', '1993-05-29', 0, 'Thailand', 'Fort Walton Beach', 0),
(77, 'Imelda', 'Max', 41.02, 'fiona-goode283@agent.com', 'zZ123456', '2019-06-05', 0, 'Montenegro', 'Santa Rosa', 0),
(78, 'Jenniffer', 'Alonso', 75.31, 'ettie28080@gmail.com', 'zZ123456', '2021-02-09', 1, 'Pakistan', 'San Bernardino', 0),
(79, 'Judy', 'Mathilda', 18, 'rachell6433@occasion.com', 'zZ123456', '2006-01-22', 1, 'Mali', 'Lorain', 0),
(80, 'Efren', 'Ammie', 89, 'patty76@boots.com', 'zZ123456', '2006-05-29', 0, 'Swaziland', 'Roanoke', 0),
(81, 'Marna', 'Ken', 35.62, 'keeley74506@hotmail.com', 'zZ123456', '2015-09-01', 0, 'Finland', 'Chandler', 0),
(82, 'Trudi', 'Dianna', 57.88, 'agustina6@specified.com', 'zZ123456', '1986-04-15', 0, 'Yemen', 'Elkhart', 0),
(83, 'Candida', 'Rosario', 82.16, 'terina_rock@gmail.com', 'zZ123456', '2008-06-12', 1, 'Myanmar, {Burma}', 'Madison', 0),
(84, 'Lana', 'Les', 25.72, 'georgianna.fay@gmail.com', 'zZ123456', '2011-12-15', 1, 'Senegal', 'Lakeland', 0),
(85, 'Art', 'Ezra', 71.08, 'brianne.santos5@hotmail.com', 'zZ123456', '1986-05-01', 0, 'Panama', 'Waterloo', 0),
(86, 'Regan', 'Sulema', 47.98, 'carolann.packer99318@belarus.com', 'zZ123456', '1986-11-30', 0, 'Finland', 'Thornton', 0),
(87, 'Joelle', 'Shizuko', 88.07, 'florencia.rickard@spas.com', 'zZ123456', '2015-09-08', 0, 'Nicaragua', 'Amarillo', 0),
(88, 'Lupita', 'Marylee', 98.51, 'kandy4468@generate.com', 'zZ123456', '2011-02-10', 1, 'Malawi', 'Fitchburg', 0),
(89, 'Mauricio', 'Clarinda', 38.61, 'courtney390@lesson.com', 'zZ123456', '1986-08-13', 0, 'Namibia', 'Manchester', 0),
(90, 'Renato', 'Yuonne', 67.8, 'isaac.plante@hotmail.com', 'zZ123456', '1972-06-06', 1, 'Mexico', 'Orange', 0),
(91, 'Terese', 'Pei', 28.25, 'cassi-spinks500@naples.com', 'zZ123456', '1997-05-18', 0, 'Burundi', 'Arlington', 0),
(92, 'Rosalie', 'Tereasa', 62.48, 'enda573@gmail.com', 'zZ123456', '1983-12-04', 1, 'Solomon Islands', 'Laredo', 0),
(93, 'Luke', 'Ross', 36.07, 'indira_munger@excellent.網絡.hk', 'zZ123456', '1987-06-11', 0, 'Lithuania', 'Lubbock', 0),
(94, 'Jennette', 'Suzette', 41.81, 'gudruncamara2528@gmail.com', 'zZ123456', '1989-11-14', 1, 'Vatican City', 'Concord', 0),
(95, 'Elida', 'Fredricka', 85.25, 'bernice_curran25@circular.com', 'zZ123456', '2019-01-29', 0, 'Singapore', 'Port Saint Lucie', 0),
(96, 'Ruthanne', 'Bea', 86.28, 'queenie.worthy6775@gmail.com', 'zZ123456', '1998-09-27', 1, 'Fiji', 'Pompano Beach', 0),
(97, 'Olimpia', 'Tarah', 6.89, 'isabellecavazos0930@hotmail.com', 'zZ123456', '2005-03-10', 1, 'Bahrain', 'North Port', 0),
(98, 'Librada', 'Yoshiko', 62.62, 'georgiana-judkins@tx.com', 'zZ123456', '2004-04-12', 0, 'Sri Lanka', 'San Buenaventura', 0),
(99, 'Ossie', 'Owen', 32.19, 'nohemi.mcclelland7175@instrumentation.toga.toyama.jp', 'zZ123456', '1986-02-25', 0, 'Iraq', 'Davidson County', 0),
(100, 'Minh', 'Teofila', 92.65, 'sammiedoss-counts9@gmail.com', 'zZ123456', '1999-06-03', 1, 'Luxembourg', 'Olympia', 0);

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
  ADD KEY `reservation_plate_id_fk` (`plate_id`),
  ADD KEY `reservation_office_id_fk` (`office_Id`),
  ADD KEY `reservation_user_id_fk` (`user_id`);

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
  MODIFY `reservation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_office_id_fk` FOREIGN KEY (`office_Id`) REFERENCES `office` (`office_Id`),
  ADD CONSTRAINT `reservation_plate_id_fk` FOREIGN KEY (`plate_id`) REFERENCES `car` (`plate_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
