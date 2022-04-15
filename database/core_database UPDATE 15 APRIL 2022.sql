-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 03:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `core`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `cb_points`
-- (See below for the actual view)
--
CREATE TABLE `cb_points` (
`player_ID` int(11)
,`fname` varchar(256)
,`lname` varchar(256)
,`club` varchar(256)
,`age` int(11)
,`nationality` varchar(256)
,`player_pic` varchar(256)
,`position` varchar(256)
,`appearances` int(11)
,`minutes_played` int(11)
,`pass_attempt` int(11)
,`pass_comp` int(11)
,`pass_accuracy` varchar(20)
,`tackle_attempt` int(11)
,`tackle_comp` int(11)
,`tackle_success` varchar(20)
,`aerials_contested` int(11)
,`aerials_won` int(11)
,`aerial_success` varchar(20)
,`possession_won` int(11)
,`interceptions` int(11)
,`points` double(17,0)
,`points_per_game` double(17,0)
,`rating` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_ID` int(11) NOT NULL,
  `club_name` varchar(256) DEFAULT NULL,
  `league` varchar(256) DEFAULT NULL,
  `league_code` varchar(256) NOT NULL,
  `league_position` int(255) DEFAULT NULL,
  `formation` varchar(256) DEFAULT NULL,
  `manager` varchar(256) DEFAULT NULL,
  `stadium` varchar(256) DEFAULT NULL,
  `stadium_capacity` int(255) DEFAULT NULL,
  `captain` varchar(256) DEFAULT NULL,
  `v_captain` varchar(256) DEFAULT NULL,
  `pk_taker` varchar(256) DEFAULT NULL,
  `short_fk` varchar(256) DEFAULT NULL,
  `long_fk` varchar(256) DEFAULT NULL,
  `l_corner` varchar(256) DEFAULT NULL,
  `r_corner` varchar(256) DEFAULT NULL,
  `club_pic` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_ID`, `club_name`, `league`, `league_code`, `league_position`, `formation`, `manager`, `stadium`, `stadium_capacity`, `captain`, `v_captain`, `pk_taker`, `short_fk`, `long_fk`, `l_corner`, `r_corner`, `club_pic`) VALUES
(1, 'Liverpool FC', 'Premier League', 'eng-pl', 2, '4-3-3', 'Jurgen Klopp', 'Anfield', NULL, 'Henderson', 'Milner', 'Salah', 'Alexander-Arnold', 'Alexander-Arnold', 'Robertson', 'Alexander-Arnold', 'Media/Clubs/lfc.webp'),
(2, 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 1, '4-2-3-1, 4-4-2', 'Kalisto Pasuwa', 'Kamuzu Stadium', 65000, 'Yamikani Fodya', NULL, 'Hassan Kajoke', NULL, NULL, NULL, NULL, 'Media/Clubs/NBB.png'),
(3, 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', 3, '4-4-1-1', 'Bob Mpinganjira', 'Kamuzu Stadium', 65000, 'Alfred Manyozo', NULL, NULL, NULL, NULL, NULL, NULL, 'Media/Clubs/Wanderers.png'),
(4, 'PSG', 'French Ligue 1', '', 1, '4-3-3', 'Mauricio Pochettino', 'Parc de Princes', NULL, 'Marquinhos', 'Veratti', 'Neymar', 'Neymar', 'Neymar', 'Neymar', 'Neymar', 'Media/Clubs/PSG.webp'),
(5, 'Orlando Pirates', 'South African PSL', 'sa-psl', 0, '4-3-3', 'Josef Zinnbauer', 'Orlando Stadium', NULL, 'Happy Jele', 'Thulani Hlatshwayo', 'Pule', 'Pule', 'Makaringe', 'Hotto', 'Hotto', 'Media/Clubs/opirates.webp'),
(6, 'Manchester City', 'Premier League', '', 3, '4-3-3', 'Pep Guardiola', 'Etihad Stadium', 50000, 'Fernandinho', 'De Bruyne', 'De Bruyne', 'Mahrez', 'De Bruyne', 'De Bruyne', 'De Bruyne', 'Media/Clubs/mancity.webp'),
(7, 'Silver Strikers', 'TNM Super League', 'mw-tsl', 2, '4-3-3', 'Daniel Kabwe', 'Silver Stadium', 20000, 'Mike Robert', NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\silverstrikers.jpg'),
(8, 'Blue Eagles', 'TNM Super League', 'mw-tsl', 12, '4-4-2', 'Elia Kananji', 'Nankhaka Stadium', 5000, 'Micium Mhone', NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\blueeagles.png'),
(9, 'Civil ', 'TNM Super League', 'mw-tsl', 4, '4-4-2', 'Franco Ndawa', 'Silver Stadium', 20000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\civil.jpg'),
(15, 'TN Stars', 'TNM Super League', 'mw-tsl', 7, '4-4-2', 'Joseph Malizani', '', NULL, 'Blessings Joseph', NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\tnstars.jpg'),
(16, 'Karonga United', 'TNM Super League', 'mw-tsl', 5, '4-2-3-1', NULL, 'Karonga Stadium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\karongaunited.jpg'),
(18, 'Kamuzu Barracks', 'TNM Super League', 'mw-tsl', 10, '4-4-2', 'Charles Kamanga', '', NULL, 'Samuel Chivunde', NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\kamuzubarracks.png'),
(19, 'Moyale Barracks', 'TNM Super League', 'mw-tsl', 6, '4-4-2', 'Prichard Mwansa', '', NULL, 'Lloyd Njaliwa', NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\moyalebarracks.jpg'),
(21, 'MAFCO', 'TNM Super League', 'mw-tsl', 12, '4-4-2', 'Yohane Fulaye', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Red Lions', 'TNM Super League', 'mw-tsl', 15, '4-4-2', 'Mike Kumanga', 'Mpira Stadium', 1000, 'Chikot Chirwa', NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\redlions.jpg'),
(23, 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', 13, '4-3-3', 'Etson Mwafulirwa', '', NULL, 'Harry Nyirenda', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Ntopwa', 'TNM Super League', 'mw-tsl', 16, '4-5-1', 'Karen Chaula', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\ntopwa.png'),
(25, 'Mzuzu Warriors', 'TNM Super League', 'mw-tsl', 16, '4-2-3-1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Chitipa United', 'TNM Super League', 'mw-tsl', 14, '4-4-2', 'Chris Nyambose', 'Karonga Stadium', 5000, 'Hardy Ngandu', NULL, NULL, NULL, NULL, NULL, NULL, 'Media\\Clubs\\chitipaunited.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `competitions_tournaments`
--

CREATE TABLE `competitions_tournaments` (
  `league_id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `code` varchar(256) DEFAULT NULL,
  `country` varchar(256) DEFAULT NULL,
  `format` varchar(255) DEFAULT 'league',
  `confederation` varchar(256) NOT NULL,
  `continent` varchar(256) DEFAULT NULL,
  `founded` varchar(256) DEFAULT NULL,
  `record_titles` varchar(256) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competitions_tournaments`
--

INSERT INTO `competitions_tournaments` (`league_id`, `name`, `code`, `country`, `format`, `confederation`, `continent`, `founded`, `record_titles`, `logo`) VALUES
(1, 'TNM Super League', 'mw-tsl', 'Malawi', 'league', 'CAF', 'Africa', '1986', 'Big Bullets (15)', 'Media\\Leagues\\mw-tsl.jpg'),
(2, 'Premier League', 'eng-pl', 'England', 'league', 'UEFA', 'Europe', '1992', 'Manchester United (13 Titles)', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fb_points`
-- (See below for the actual view)
--
CREATE TABLE `fb_points` (
`player_ID` int(11)
,`fname` varchar(256)
,`lname` varchar(256)
,`club` varchar(256)
,`age` int(11)
,`nationality` varchar(256)
,`player_pic` varchar(256)
,`position` varchar(256)
,`appearances` int(11)
,`minutes_played` int(11)
,`pass_attempt` int(11)
,`pass_comp` int(11)
,`pass_accuracy` varchar(20)
,`assists` int(11)
,`cross_comp` int(4)
,`cross_accuracy` varchar(19)
,`cross_attempt` int(11)
,`chances_created` int(11)
,`chances_created_per_game` varchar(17)
,`tackle_attempt` int(11)
,`tackle_comp` int(11)
,`tackle_success` varchar(20)
,`possession_won` int(11)
,`points` double(17,0)
,`points_per_game` double(17,0)
,`rating` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `match_ID` int(11) NOT NULL,
  `competition` varchar(255) DEFAULT NULL,
  `competition_code` varchar(255) DEFAULT NULL,
  `season` text DEFAULT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'Malawi',
  `MD` varchar(256) DEFAULT NULL,
  `minutes_played` varchar(256) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT '14:30:00',
  `venue` varchar(200) DEFAULT NULL,
  `referee` varchar(255) DEFAULT NULL,
  `home_team` varchar(256) DEFAULT NULL,
  `away_team` varchar(256) DEFAULT NULL,
  `home_goals` varchar(256) DEFAULT '0',
  `away_goals` varchar(256) DEFAULT '0',
  `home_scorers` varchar(256) DEFAULT NULL,
  `away_scorers` varchar(256) DEFAULT NULL,
  `home_lineup` varchar(1000) DEFAULT NULL,
  `away_lineup` varchar(1000) DEFAULT NULL,
  `home_reds` int(11) DEFAULT 0,
  `away_reds` int(11) DEFAULT 0,
  `home_yellows` int(11) DEFAULT 0,
  `away_yellows` int(11) DEFAULT 0,
  `home_possession` int(255) NOT NULL DEFAULT 0,
  `away_possession` int(255) NOT NULL DEFAULT 0,
  `home_shots` int(255) NOT NULL DEFAULT 0,
  `away_shots` int(255) NOT NULL DEFAULT 0,
  `home_corners` int(255) NOT NULL DEFAULT 0,
  `away_corners` int(255) NOT NULL DEFAULT 0,
  `home_fouls` int(255) NOT NULL DEFAULT 0,
  `away_fouls` int(255) NOT NULL DEFAULT 0,
  `home_votes` int(255) NOT NULL DEFAULT 0,
  `away_votes` int(255) NOT NULL DEFAULT 0,
  `draw_votes` int(255) NOT NULL DEFAULT 0,
  `status` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`match_ID`, `competition`, `competition_code`, `season`, `country`, `MD`, `minutes_played`, `date`, `time`, `venue`, `referee`, `home_team`, `away_team`, `home_goals`, `away_goals`, `home_scorers`, `away_scorers`, `home_lineup`, `away_lineup`, `home_reds`, `away_reds`, `home_yellows`, `away_yellows`, `home_possession`, `away_possession`, `home_shots`, `away_shots`, `home_corners`, `away_corners`, `home_fouls`, `away_fouls`, `home_votes`, `away_votes`, `draw_votes`, `status`) VALUES
(4, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-10-16', '14:30:00', 'Kamuzu Stadium', 'Chaupi Ghambi', 'Nyasa Big Bullets', 'Karonga United', '3', '2', 'Hassan Kajoke(57\', 90\'), Nkhoma(52\')', 'J. Duwa(16\'), Kamanga(29\')', 'Bright Munthali <b>GK</b>,Yamikani Fodya <b>(C)</b>,Miracle Gabeya,Gomezgani Chirwa,Sankhani Mkandawire,Babatunde Adepujo,Ernest Petro,Chimango Kayira,Chimwemwe Idana,Pilirani Zonda,Hassan Kajoke', 'Yona Milanzi <b>GK</b>,Hygiene Mwadepeka <b>(C)</b>,William Mwalwimba, Nangi Nsonga, Gabriel Daud,Josaya Duwa,Victor Lungu', 0, 0, 2, 2, 55, 45, 10, 8, 5, 3, 8, 10, 0, 0, 0, 'report'),
(5, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-10-16', '14:30:00', 'Kamuzu Stadium', 'Chaupi Ghambi', 'BE-FORWARD Wanderers', 'Moyale Barracks', '0', '0', NULL, NULL, 'Richard Chipuwa <b>GK</b>,Stanley Sanudi,Yunus Sherrif,Lucky Malata,Francis Mulimbika,Alfred Manyozo <b> C</b>,Rafick Namwera,Yamikani Chester,Vitumbiko Kumwenda,Peter Wadabwa,Vincent Nyangulu', 'McDonald Harawa <b>GK </b>,Chamveka Gwetsani,Limbani Simenti,Black Aliseni,Innocent Bottoman,Boyboy Chima,Clifford Fukizi,Crispine Fukizi,Brown Magaga,Lloyd Njaliwa <b>C</b>,Raphael Phiri', NULL, NULL, 1, 2, 60, 40, 11, 3, 5, 2, 7, 10, 0, 0, 0, 'played'),
(6, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-10-09', '14:30:00', NULL, 'Chaupi Ghambi', 'Silver Strikers', 'Ekwendeni Hammers', '2', '0', 'R. Robert(38\'), F.Banda(60\')', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(7, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-10-03', '14:30:00', NULL, 'Chaupi Ghambi', 'Chitipa United', 'Red Lions', '2', '1', 'P. Mughogho(13\'), E. Muyira(70\')', 'R. Bokosi(26\')', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(8, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-10-02', '14:30:00', 'CIVO Stadium', 'Chaupi Ghambi', 'Kamuzu Barracks', 'Nyasa Big Bullets', '0', '3', NULL, 'Selemani(15\'), Kajoke(26\'), Idana(55\')', 'Lweya <b>(GK)</b>,Namazunda,Chivunde <b>(C)</b>,Issa,Kawanga,Kanongona,Nachipo,Chisambi,Kanzeka,Hanganda,Yona', 'Richard Chimbamba <b>(GK)</b>,Chimwemwe Idana <b>(C)</b>,Miracle Gabeya,Gomezgani Chirwa,Sankhani Mkandawire,Babatunde Adepujo,Ernest Petro,Chimango Kayira,Chimwemwe Idana,Pilirani Zonda,Hassan Kajoke', NULL, NULL, NULL, NULL, 45, 55, 2, 12, 3, 5, 8, 10, 0, 0, 0, 'played'),
(9, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-10-03', '14:30:00', NULL, 'Chaupi Ghambi', 'MAFCO', 'Ekwendeni Hammers', '0', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(10, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-09-30', '14:30:00', NULL, 'Chaupi Ghambi', 'TN Stars', 'Red Lions', '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(11, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-09-26', '14:30:00', 'Kamuzu Stadium', 'Chaupi Ghambi', 'Nyasa Big Bullets', 'BE-FORWARD Wanderers', '0', '1', NULL, 'V. Nyangulu(31\')', 'Kakhobwe <b>(GK)</b>,Idana <b>(C)</b>,Miracle Gabeya,Gomezgani Chirwa,Sankhani Mkandawire,Babatunde Adepujo,Ernest Petro,Chimango Kayira,Chimwemwe Idana,Pilirani Zonda,Hassan Kajoke', 'McDonald <b>(GK)</b>,Chamveka Gwetsani,Limbani Simenti,Black Aliseni,Innocent Bottoman,Boyboy Chima,Clifford Fukizi,Crispine Fukizi,Brown Magaga,Lloyd Njaliwa <b>(C)</b>,Vincent Nyangulu', NULL, NULL, NULL, NULL, 51, 49, 6, 7, 4, 4, 6, 7, 0, 0, 0, 'played'),
(12, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-09-26', '14:30:00', NULL, 'Chaupi Ghambi', 'Civil', 'Blue Eagles', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(13, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-09-25', '14:30:00', NULL, 'Chaupi Ghambi', 'Karonga United', 'Moyale Barracks', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(14, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-08-29', '14:30:00', 'Kamuzu Stadium', 'Chaupi Ghambi', 'Nyasa Big Bullets', 'Chitipa United', '2', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(15, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-09-29', '14:30:00', NULL, 'Chaupi Ghambi', 'Silver Strikers', 'Mzuzu Warriors', '7', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(16, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-08-28', '14:30:00', NULL, 'Chaupi Ghambi', 'Mighty Tigers', 'Savenda Chitipa United', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(17, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-08-22', '14:30:00', NULL, 'Chaupi Ghambi', 'Silver Strikers', 'Blue Eagles', '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(18, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-08-21', '14:30:00', NULL, 'Chaupi Ghambi', 'Ntopwa', 'BE-FORWARD Wanderers', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(19, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-08-15', '14:30:00', NULL, 'Chaupi Ghambi', 'TN Stars', 'Mighty Tigers', '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(20, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-07-30', '14:30:00', 'Kamuzu Stadium', 'Chaupi Ghambi', 'Nyasa Big Bullets', 'Silver Strikers', '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(21, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-10-03', '14:30:00', 'Kamuzu Stadium', 'Chaupi Ghambi', 'BE-FORWARD Wanderers', 'Blue Eagles', '1', '3', 'V. Nyangulu(26\')', 'Mpinganjira(15\'), Chriwa(30\',67\')', NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(22, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-10-02', '14:30:00', NULL, 'Chaupi Ghambi', 'Moyale Barracks', 'Silver Strikers', '2', '0', 'Phiri(50\', 70\')', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(23, 'TNM Super League', 'mw-tsl', '2021-2022', 'Malawi', NULL, 'FT', '2021-09-30', '14:30:00', 'Kamuzu Stadium', 'Chaupi Ghambi', 'BE-FORWARD Wanderers', 'Ekwendeni Hammers', '2', '0', 'Y. Sheriff(31\'), P. Wadabwa(65\')', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'played'),
(25, 'TNM Super League', 'mw-tsl', '2022-2023', 'Malawi', '6', NULL, '2022-04-23', '14:30:00', 'Kamuzu Stadium', 'Mike Dean', 'BE-Forward Wanderers', 'Silver Strikers', '0', '0', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 2, 2, 'upcoming');

-- --------------------------------------------------------

--
-- Stand-in structure for view `forward_points`
-- (See below for the actual view)
--
CREATE TABLE `forward_points` (
`player_ID` int(11)
,`fname` varchar(256)
,`lname` varchar(256)
,`club` varchar(256)
,`position` varchar(256)
,`appearances` int(11)
,`minutes_played` int(11)
,`goals` int(11)
,`assists` int(11)
,`shots` int(11)
,`shot_conversion` varchar(20)
,`dribble_attempt` int(11)
,`dribble_comp` int(11)
,`dribble_success` varchar(20)
,`pass_attempt` int(11)
,`pass_comp` int(11)
,`pass_accuracy` varchar(20)
,`chances_created` int(11)
,`points` varchar(23)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `gk_points`
-- (See below for the actual view)
--
CREATE TABLE `gk_points` (
`player_ID` int(11)
,`fname` varchar(256)
,`lname` varchar(256)
,`club` varchar(256)
,`appearances` int(11)
,`minutes_played` int(11)
,`clean_sheets` int(11)
,`saves` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mid_points`
-- (See below for the actual view)
--
CREATE TABLE `mid_points` (
`player_ID` int(11)
,`fname` varchar(256)
,`lname` varchar(256)
,`club` varchar(256)
,`position` varchar(256)
,`appearances` int(11)
,`minutes_played` int(11)
,`pass_attempt` int(11)
,`pass_comp` int(11)
,`pass_accuracy` varchar(20)
,`goals` int(11)
,`assists` int(11)
,`chances_created` int(11)
,`tackle_attempt` int(11)
,`tackle_comp` int(11)
,`tackle_success` varchar(20)
,`possession_won` int(11)
,`points` varchar(27)
);

-- --------------------------------------------------------

--
-- Table structure for table `mw-tsl-table_21-22`
--

CREATE TABLE `mw-tsl-table_21-22` (
  `pos_ID` int(11) NOT NULL,
  `club` varchar(256) NOT NULL,
  `win` int(11) NOT NULL,
  `draw` int(11) NOT NULL,
  `loss` int(11) NOT NULL,
  `ga` int(11) NOT NULL,
  `gf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mw-tsl-table_21-22`
--

INSERT INTO `mw-tsl-table_21-22` (`pos_ID`, `club`, `win`, `draw`, `loss`, `ga`, `gf`) VALUES
(1, 'Nyasa Big Bullets', 18, 8, 4, 18, 51),
(2, 'BE-FORWARD Wanderers', 15, 10, 5, 20, 38),
(3, 'Chitipa United', 9, 5, 16, 41, 23),
(4, 'Silver Strikers', 18, 4, 8, 20, 55),
(5, 'Blue Eagles', 7, 11, 12, 29, 29),
(8, 'Civil', 12, 12, 6, 26, 37),
(9, 'Karonga United', 12, 10, 8, 26, 35),
(10, 'Moyale Barracks', 12, 10, 8, 32, 30),
(11, 'TN Stars', 12, 7, 11, 41, 28),
(12, 'MAFCO', 10, 12, 8, 29, 31),
(13, 'Ekwendeni Hammers', 11, 8, 11, 31, 33),
(14, 'Kamuzu Barracks', 10, 11, 9, 31, 29),
(15, 'Mzuzu Warriors', 4, 6, 20, 52, 18),
(16, 'Ntopwa', 5, 6, 19, 56, 28),
(17, 'Red Lions', 9, 8, 13, 31, 27),
(29, 'Mighty Tigers', 8, 8, 14, 33, 24);

-- --------------------------------------------------------

--
-- Table structure for table `mw-tsl-table_22-23`
--

CREATE TABLE `mw-tsl-table_22-23` (
  `pos_ID` int(11) NOT NULL,
  `club` varchar(256) NOT NULL,
  `win` int(11) NOT NULL,
  `draw` int(11) NOT NULL,
  `loss` int(11) NOT NULL,
  `ga` int(11) NOT NULL,
  `gf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `mw-tsl-teams`
-- (See below for the actual view)
--
CREATE TABLE `mw-tsl-teams` (
`club_ID` int(11)
,`club_name` varchar(256)
,`league` varchar(256)
,`league_code` varchar(256)
,`league_position` int(255)
,`formation` varchar(256)
,`manager` varchar(256)
,`stadium` varchar(256)
,`stadium_capacity` int(255)
,`captain` varchar(256)
,`v_captain` varchar(256)
,`pk_taker` varchar(256)
,`short_fk` varchar(256)
,`long_fk` varchar(256)
,`l_corner` varchar(256)
,`r_corner` varchar(256)
,`club_pic` varchar(256)
);

-- --------------------------------------------------------

--
-- Table structure for table `national_team`
--

CREATE TABLE `national_team` (
  `nation_ID` int(11) NOT NULL,
  `nation_name` varchar(256) DEFAULT NULL,
  `national_confederation` varchar(255) DEFAULT NULL,
  `fifa_ranking` varchar(256) DEFAULT NULL,
  `formation` varchar(256) DEFAULT NULL,
  `manager` varchar(256) DEFAULT NULL,
  `captain` varchar(256) DEFAULT NULL,
  `v_captain` varchar(256) DEFAULT NULL,
  `nation_pic` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `national_team`
--

INSERT INTO `national_team` (`nation_ID`, `nation_name`, `national_confederation`, `fifa_ranking`, `formation`, `manager`, `captain`, `v_captain`, `nation_pic`) VALUES
(1, 'Malawi', 'CAF', '115', '4-4-2', 'Meke Mwase', 'Limbikani Mzava', NULL, 'Media/Countries/img1000/mw.png'),
(2, 'England', 'UEFA', '3', '3-4-3', 'Gareth Southgate', 'Harry Kane', NULL, 'Media/Countries/img1000/gb.png'),
(3, 'France', 'UEFA\r\n', '2', '3-4-3', 'Laurent Blanc', 'Lloris', 'Griezmann', 'Media\\Countries\\imgsmall\\fr.png'),
(4, 'Spain', 'UEFA', '8', '4-3-3', 'Luis Enrique', 'Sergio Ramos', 'Sergio Busquets', 'Media/Countries/img1000/es.png'),
(5, 'Belgium', 'UEFA', '1', '3-4-3', 'Roberto Martinez', 'Eden Hazard', 'Kevin De Bryune', 'Media/Countries/img1000/be.png'),
(6, 'Italy', 'UEFA', '5', '4-3-3', 'Roberto Mancini', 'Giorgio Chiellini', 'Leonardo Bonucci', 'Media/Countries/img1000/it.png'),
(7, 'Portugal', 'UEFA', '7', '4-3-3', 'Fernando Santos', 'Cristiano Ronaldo', 'Moutinho', 'Media/Countries/img1000/pt.png'),
(8, 'Argentina', 'CONEBOL', '6', '4-2-3-1', 'Lionel Scaloni', 'Lionel Messi', '', 'Media/Countries/img1000/ar.png'),
(9, 'Brazil', 'CONEBOL', '2', '4-3-3', 'Tite', 'Thiago Silva', '', 'Media/Countries/img1000/br.png'),
(10, 'Senegal', 'CAF', '20', '4-4-2', 'Alio Cisse', 'Kalidou Koulibaly', 'Sadio Mane', 'Media/Countries/img1000/sn.png'),
(11, 'South Africa', 'CAF', '73', '4-2-3-1', 'Hugo Broos', 'Ronwen Williams', NULL, 'Media/Countries/img1000/za.png'),
(12, 'Nigeria', 'CAF', '30', '4-3-3', NULL, NULL, NULL, 'Media\\Countries\\img1000\\ng.png');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_ID` int(11) NOT NULL,
  `fname` varchar(256) DEFAULT NULL,
  `lname` varchar(256) DEFAULT NULL,
  `position` varchar(256) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `nationality` varchar(256) DEFAULT NULL,
  `club` varchar(256) DEFAULT NULL,
  `league` varchar(256) DEFAULT NULL,
  `league_code` varchar(256) NOT NULL,
  `dominant_foot` varchar(256) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` varchar(256) DEFAULT NULL,
  `appearances` int(11) NOT NULL DEFAULT 0,
  `minutes_played` int(11) DEFAULT NULL,
  `goals` int(11) NOT NULL DEFAULT 0,
  `assists` int(11) NOT NULL DEFAULT 0,
  `chances_created` int(11) NOT NULL DEFAULT 0,
  `pass_attempt` int(11) NOT NULL DEFAULT 0,
  `cross_attempt` int(11) NOT NULL DEFAULT 0,
  `cross_comp` int(4) DEFAULT NULL,
  `shots` int(11) NOT NULL DEFAULT 0,
  `pass_comp` int(11) NOT NULL DEFAULT 0,
  `tackle_attempt` int(11) NOT NULL DEFAULT 0,
  `tackle_comp` int(11) NOT NULL DEFAULT 0,
  `aerials_won` int(11) NOT NULL DEFAULT 0,
  `aerials_contested` int(11) NOT NULL DEFAULT 0,
  `interceptions` int(11) NOT NULL DEFAULT 0,
  `defensive_errors` int(11) NOT NULL DEFAULT 0,
  `clearances` int(11) NOT NULL DEFAULT 0,
  `blocks` int(11) NOT NULL DEFAULT 0,
  `possession_won` int(11) NOT NULL DEFAULT 0,
  `possession_lost` int(11) NOT NULL DEFAULT 0,
  `dribble_attempt` int(11) NOT NULL DEFAULT 0,
  `dribble_comp` int(11) NOT NULL DEFAULT 0,
  `clean_sheets` int(11) NOT NULL DEFAULT 0,
  `saves` int(11) NOT NULL DEFAULT 0,
  `goals_conceded` int(11) NOT NULL DEFAULT 0,
  `player_pic` varchar(256) DEFAULT NULL,
  `joined` varchar(256) DEFAULT NULL,
  `contract_length` varchar(256) DEFAULT NULL,
  `kit` varchar(256) DEFAULT NULL,
  `national_kit` varchar(256) DEFAULT NULL,
  `national_caps` varchar(256) DEFAULT NULL,
  `national_debut` varchar(255) DEFAULT NULL,
  `national_position` varchar(256) DEFAULT NULL,
  `national_goals` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_ID`, `fname`, `lname`, `position`, `age`, `nationality`, `club`, `league`, `league_code`, `dominant_foot`, `height`, `weight`, `appearances`, `minutes_played`, `goals`, `assists`, `chances_created`, `pass_attempt`, `cross_attempt`, `cross_comp`, `shots`, `pass_comp`, `tackle_attempt`, `tackle_comp`, `aerials_won`, `aerials_contested`, `interceptions`, `defensive_errors`, `clearances`, `blocks`, `possession_won`, `possession_lost`, `dribble_attempt`, `dribble_comp`, `clean_sheets`, `saves`, `goals_conceded`, `player_pic`, `joined`, `contract_length`, `kit`, `national_kit`, `national_caps`, `national_debut`, `national_position`, `national_goals`) VALUES
(1, 'Chaupi Amari', 'Ghambi', 'CF', 21, 'Brazil', 'Manchester City', 'Premier League', '', 'R', 165, '65', 10, 800, 45, 5, 15, 790, 11, NULL, 80, 748, 10, 5, 4, 8, 10, 0, 0, 0, 11, 0, 30, 19, 5, 0, 0, NULL, 'July 1, 2019', '2022', '10', '10', NULL, NULL, 'CM', NULL),
(2, 'Gabadinho', 'Mhango', 'ST', 29, 'Malawi', 'Orlando Pirates', 'PSL', '', 'R', 162, '76', 1, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Media/Players/gabamhango.png', 'July 2019', '2022', '7', '7', '20', NULL, 'CF', NULL),
(3, 'Alisson', 'Becker', 'GK', 29, 'Brazil', 'Liverpool FC', 'Premier League', '', 'R', 191, '91', 8, 0, 0, 0, 0, 250, 0, NULL, 0, 200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 25, 12, 'Media/Players/alissonbecker.png', 'July 2018', '2027', '1', NULL, NULL, NULL, 'GK', NULL),
(4, 'Trent', 'Alexander-Arnold', 'RB', 23, 'England', 'Liverpool FC', 'Premier League', '', 'R', 180, '70', 29, 2610, 1, 18, 53, 1804, 129, NULL, 0, 1400, 84, 63, 46, 143, 51, 0, 78, 58, 108, 0, 0, 0, 0, 0, 0, 'Media/Players/alexanderarnold.png', 'Youth Academy', '2026', '66', NULL, '15', '2018', 'RB', 4),
(5, 'Thiago', 'Alcantara', 'CM', 30, 'Spain', 'Liverpool FC', 'Premier League', '', 'R', 174, NULL, 3, 0, 0, 0, 0, 100, 0, NULL, 5, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 30, 0, 0, 0, 'Media/Players/thiagoalcantara.png', 'August 2020', '2024', '6', '6', NULL, NULL, 'CM', NULL),
(6, 'Sadio', 'Mane', 'LW', 29, 'Senegal', 'Liverpool FC', 'Premier League', '', 'R', 175, '76', 10, 0, 6, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Media/Players/sadiomane.png', 'July 1, 2016', '2023', '10', '10', NULL, NULL, 'LW', NULL),
(8, 'Kylian', 'Mbappe', 'ST', 23, 'France', 'PSG', 'French Ligue 1', '', 'L', 178, '76', 12, 0, 5, 4, 0, 660, 0, NULL, 30, 528, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 31, 18, 0, 0, 0, 'Media/Players/kylianmbappe.png', 'July 1, 2017', '2022', '7', '10', '54', NULL, 'RW', NULL),
(9, 'Happy', 'Jele', 'CB', 34, 'South Africa', 'Orlando Pirates', 'PSL', '', 'R', 181, '70', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'August 2006', '2024', '4', NULL, NULL, NULL, NULL, NULL),
(10, 'Thulani', 'Hlatshwayo', 'CB', 31, 'South Africa', 'Orlando Pirates', 'PSL', '', 'R', 188, '88', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'Sep 21, 2020', '2024', '14', NULL, NULL, NULL, NULL, NULL),
(11, 'Thembinkosi', 'Lorch', 'RW', 27, 'South Africa', 'Orlando Pirates', 'PSL', '', 'R', 166, '60', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2017', '2023', '3', NULL, NULL, NULL, NULL, NULL),
(12, 'Vincent', 'Pule', 'CAM', 29, 'South Africa', 'Orlando Pirates', 'PSL', '', 'L', 169, '64', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2018', '2022', '45', NULL, NULL, NULL, NULL, NULL),
(13, 'Neymar Jr', 'Dos Santos', 'LW', 29, 'Brazil', 'PSG', 'French Ligue 1', '', 'R', 175, '68', 8, 0, 1, 2, 15, 400, 10, NULL, 18, 350, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 30, 0, 0, 0, 'Media/players/neymarjr.png', 'August 3, 2017', '2025', '10', '10', NULL, NULL, 'LW', NULL),
(14, 'Edouard', 'Mendy', 'GK', 27, 'Senegal', 'Chelsea', 'Premier League', '', 'R', 195, '90', 9, 0, 0, 0, 0, 270, 0, NULL, 0, 240, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 30, 3, NULL, 'August, 2020', '2024', '1', '1', NULL, NULL, 'GK', NULL),
(20, 'Virgil', 'Van Dijk', 'CB', 30, 'Netherlands', 'Liverpool FC', 'Premier League', '', 'R', 194, '79', 11, 1000, 0, 1, 0, 913, 0, NULL, 0, 847, 88, 80, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 8, NULL, 'January 1, 2018', '2026', '4', '4', NULL, NULL, 'CB', NULL),
(23, 'Khama', 'Billiat', 'LW', 28, 'Zimbabwe', 'Kaizer Chiefs', NULL, '', NULL, 170, '63', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL),
(35, 'Hassan', 'Kajoke', 'ST', 23, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'R', 172, '65', 25, 2200, 15, 4, 21, 1589, 0, NULL, 31, 1272, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 36, 0, 0, 0, 'Media/Players/hassankajoke.jpg', NULL, '2023', '9', NULL, NULL, NULL, 'ST', NULL),
(36, 'Richard', 'Chibamba', 'GK', 24, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'R.', 'Chiyenda', 'GK', 25, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Bright', 'Munthali', 'GK', 23, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Gomezgani', 'Chirwa', 'RB', 25, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 29, 2465, 2, 3, 14, 939, 131, 81, 0, 809, 123, 104, 69, 147, 47, 5, 75, 49, 52, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Yamikani', 'Fodya', 'CB', 29, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 29, 2610, 0, 0, 0, 1358, 0, NULL, 0, 827, 189, 152, 150, 258, 40, 0, 126, 43, 101, 0, 0, 0, 13, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Miracle', 'Gabeya', 'LB', 25, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 25, 2125, 1, 1, 14, 1803, 102, 54, 0, 1600, 169, 103, 99, 195, 64, 1, 82, 57, 116, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Sankhani', 'Mkandawire', 'CB', 31, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 29, 2610, 0, 0, 0, 1023, 0, NULL, 0, 736, 222, 109, 101, 194, 37, 0, 126, 43, 67, 0, 0, 0, 7, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Babatunde ', 'Adepoju', 'LM', 25, 'Nigeria', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 18, 1584, 4, 6, 25, 3642, 36, NULL, 54, 3370, 93, 51, 0, 0, 53, 0, 0, 0, 58, 0, 40, 19, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Chimwemwe', 'Idana', 'CM', 23, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 21, 1848, 3, 6, 28, 3754, 69, NULL, 21, 3735, 58, 52, 0, 0, 63, 0, 0, 0, 64, 0, 31, 12, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Chimango', 'Kayira', 'CM', 28, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 13, 1144, 1, 8, 38, 3982, 53, NULL, 33, 3745, 92, 77, 0, 0, 20, 0, 0, 0, 66, 0, 49, 35, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'M,', 'Selemani', 'CM', 23, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 23, 2024, 1, 6, 45, 3854, 31, NULL, 28, 3700, 100, 88, 0, 0, 27, 0, 0, 0, 51, 0, 52, 25, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'V.', 'Limbani', 'CF', 25, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 18, 1584, 10, 1, 12, 1070, 0, NULL, 23, 1027, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 74, 58, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'M.', 'Ngwira', 'LM', 27, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 23, 2024, 3, 3, 39, 3858, 84, NULL, 44, 3380, 73, 33, 0, 0, 62, 0, 0, 0, 89, 0, 54, 25, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'P.', 'Phiri', 'RM', 24, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 11, 968, 4, 5, 25, 3907, 60, NULL, 28, 3824, 93, 71, 0, 0, 20, 0, 0, 0, 52, 0, 56, 29, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Stanley', 'Billiat', 'LW', 24, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Ernest', 'Petro', 'CAM', 25, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 12, 1056, 1, 4, 39, 3709, 75, NULL, 24, 3431, 95, 87, 0, 0, 52, 0, 0, 0, 101, 0, 33, 15, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'pilirani', 'Zonda', 'CB', 24, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1190, 0, NULL, 0, 902, 214, 159, 135, 234, 51, 0, 126, 43, 87, 0, 0, 0, 7, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Misheck', 'Seleman', 'LM', 23, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 24, 2112, 3, 4, 29, 3996, 39, NULL, 53, 3754, 88, 87, 0, 0, 57, 0, 0, 0, 105, 0, 50, 17, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Dalitso', 'Sailesi', 'CM', 25, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 12, 1056, 2, 0, 48, 3530, 31, NULL, 33, 3410, 76, 31, 0, 0, 37, 0, 0, 0, 93, 0, 51, 29, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Alfred', 'Manyozo', 'CM', 28, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 10, 880, 3, 4, 40, 3823, 51, NULL, 39, 3599, 94, 79, 0, 0, 50, 0, 0, 0, 65, 0, 14, 5, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Stanley', 'Sanudi', 'CB', 26, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1704, 0, NULL, 0, 1036, 154, 100, 148, 235, 69, 0, 126, 43, 68, 0, 0, 0, 14, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Isaac', 'Kaliati', 'LM', 28, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 18, 1584, 1, 2, 31, 3560, 44, NULL, 39, 3288, 94, 52, 0, 0, 32, 0, 0, 0, 61, 0, 42, 15, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Lucky', 'Malata', 'RB', 25, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 29, 2465, 3, 3, 8, 756, 153, 94, 0, 620, 74, 45, 85, 132, 15, 4, 82, 44, 53, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Richard', 'Chipuwa', 'GK', 29, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Vincent', 'Nyangulu', 'LW', 26, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Bongani', 'Kaipa', 'LB', 26, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 27, 2295, 0, 0, 9, 1168, 185, 119, 0, 924, 158, 56, 117, 229, 78, 4, 79, 34, 68, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Misheck', 'Botoman', 'ST', 24, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 15, 1320, 2, 6, 17, 1525, 0, NULL, 8, 1512, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 92, 48, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Chawanangwa', 'Kaonga', 'ST', 25, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 10, 880, 1, 0, 19, 1798, 0, NULL, 14, 1152, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 91, 53, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Stain', 'Davie', 'ST', 25, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 22, 1936, 12, 5, 28, 1547, 0, NULL, 20, 836, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 90, 53, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Frank', 'Banda', 'ST', 24, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 19, 1672, 1, 3, 18, 1384, 0, NULL, 10, 1044, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 93, 22, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Charles', 'Thom', 'GK', 29, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Maxwell', 'Paipi', 'CB', 25, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 28, 2520, 0, 0, 0, 1246, 0, NULL, 0, 867, 222, 101, 139, 201, 78, 0, 126, 43, 66, 0, 0, 0, 8, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Mark', 'Fodya', 'RB', 25, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 30, 2550, 3, 0, 10, 942, 126, 109, 0, 773, 87, 47, 61, 92, 40, 4, 65, 32, 42, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Nixon', 'Mwase', 'LB', 24, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 30, 2550, 3, 2, 11, 707, 129, 110, 0, 491, 103, 50, 90, 128, 27, 5, 75, 53, 51, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Taonga', 'Chimodzi', 'RM', 25, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 24, 2112, 1, 7, 49, 3864, 41, NULL, 29, 3800, 57, 40, 0, 0, 42, 0, 0, 0, 58, 0, 29, 8, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Patrick', 'Macheso', 'CDM', 26, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 20, 1760, 4, 5, 41, 3727, 70, NULL, 24, 3625, 86, 82, 0, 0, 27, 0, 0, 0, 108, 0, 35, 12, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Blessings', 'Tembo', 'ST', 24, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 20, 1760, 7, 7, 21, 1973, 0, NULL, 17, 1869, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 86, 69, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Zebron', 'Kalima', 'LM', 26, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 20, 1760, 3, 5, 31, 3772, 81, NULL, 36, 3265, 51, 44, 0, 0, 54, 0, 0, 0, 69, 0, 48, 17, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Mike', 'Robert', 'RB', 28, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 20, 1700, 1, 1, 12, 1265, 101, 84, 0, 1088, 136, 60, 99, 134, 53, 2, 90, 58, 54, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'Wisdom', 'Mpinganjira', 'CM', 25, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 15, 1320, 3, 1, 50, 3688, 78, NULL, 38, 3358, 92, 80, 0, 0, 50, 0, 0, 0, 70, 0, 18, 7, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, ' Yamikani', 'Chester', 'CAM', 27, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 21, 1848, 2, 3, 43, 3987, 78, NULL, 39, 3281, 89, 49, 0, 0, 49, 0, 0, 0, 62, 0, 56, 26, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Felix', 'Zulu', 'LM', 25, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 21, 1848, 5, 4, 36, 3808, 74, NULL, 38, 3286, 100, 49, 0, 0, 61, 0, 0, 0, 86, 0, 34, 16, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Francis', 'Mkonda', 'CM', 29, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 25, 2200, 4, 6, 34, 3581, 72, NULL, 40, 3511, 67, 51, 0, 0, 20, 0, 0, 0, 87, 0, 21, 10, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Young', 'Chimodzi Jr', 'CDM', 25, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 24, 2112, 2, 7, 39, 3784, 38, NULL, 23, 3442, 87, 48, 0, 0, 48, 0, 0, 0, 102, 0, 41, 28, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Peter', 'Cholopi', 'CB', 27, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1498, 0, NULL, 0, 1091, 167, 119, 172, 225, 74, 0, 126, 43, 119, 0, 0, 0, 9, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Vitumbiko', 'Kumwenda', 'CM', 26, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 24, 2112, 4, 7, 45, 3988, 77, NULL, 38, 3437, 100, 77, 0, 0, 36, 0, 0, 0, 49, 0, 47, 16, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Michael', 'Teteh', 'ST', 24, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 23, 2024, 10, 5, 22, 1549, 0, NULL, 19, 1385, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 81, 32, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Maxwell', 'Gasten', 'ST', 25, 'Malawi', 'Silver Strikers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 20, 1760, 13, 3, 18, 1110, 0, NULL, 24, 1065, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 69, 44, 0, 0, 0, 'Media/Players/maxwellgasten.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Muhammad', 'Sulumba', 'ST', 28, 'Malawi', 'Civil', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 14, 1232, 11, 6, 12, 1898, 0, NULL, 16, 1685, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 39, 17, 0, 0, 0, 'Media/Players/muhammadsulumba.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'Royal', 'Bokosi', 'ST', 23, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 10, 880, 10, 0, 14, 1483, 0, NULL, 8, 749, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 63, 25, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Hendrix', 'Misinde', 'ST', 24, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 5, 440, 9, 2, 6, 630, 0, NULL, 9, 386, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 42, 40, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'Lloyd', 'Njaliwa', 'CF', 25, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 23, 2024, 9, 3, 16, 1763, 0, NULL, 6, 1531, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 69, 56, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'Francis', 'Mulimbika', 'LB', 25, 'Malawi', 'Be-Forward Wanderers', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 16, 1360, 2, 0, 10, 1138, 64, 43, 0, 868, 145, 51, 69, 91, 32, 1, 75, 34, 49, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'Emmanuel', 'Muyira', 'ST', 24, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 20, 1760, 8, 2, 9, 585, 0, NULL, 4, 435, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 16, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'Clement', 'Nyondo', 'ST', 23, 'Malawi', 'Karonga United', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 5, 440, 7, 2, 11, 973, 0, NULL, 13, 842, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 56, 23, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'China', 'Chirwa', 'CF', 27, 'Malawi', 'TN Stars', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 19, 1672, 7, 0, 10, 1492, 0, NULL, 7, 1115, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 59, 39, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'Taniel', 'Mhango', 'ST', 23, 'Malawi', 'Mzuzu Warriors', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 26, 2288, 7, 4, 9, 632, 0, NULL, 5, 379, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 48, 18, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'Zicco', 'Mkanda', 'ST', 23, 'Malawi', 'Nyasa Big Bullets', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 12, 1056, 8, 3, 30, 1730, 0, NULL, 10, 1670, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 78, 58, 0, 0, 0, 'Media/Players/ziccomkanda.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'Chifuniro', 'Mpinganjira', 'ST', 25, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 24, 2112, 7, 1, 11, 861, 0, NULL, 7, 795, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 52, 29, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'Precious', 'Chipungu', 'ST', 23, 'Malawi', 'Mighty Tigers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 12, 1056, 8, 0, 6, 1224, 0, NULL, 7, 560, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 18, 18, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Kondwani', 'Chilembwe', 'ST', 22, 'Malawi', 'Mighty Tigers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 22, 1936, 6, 1, 6, 923, 0, NULL, 12, 760, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 21, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'Micium', 'Mhone', 'LM', 24, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 23, 2024, 2, 2, 22, 2868, 67, NULL, 31, 2757, 81, 39, 0, 0, 28, 0, 0, 0, 47, 0, 50, 26, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Jailos', 'Kapalamura', 'GK', 28, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'Zikhole', 'Ngulube', 'RB', 24, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 31, 2635, 2, 3, 13, 990, 146, 121, 0, 790, 142, 117, 78, 144, 55, 2, 65, 40, 61, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'Zikan', 'Sichinga', 'LB', 27, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 26, 2210, 1, 1, 8, 1059, 146, 88, 0, 743, 175, 145, 112, 135, 28, 1, 65, 38, 49, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'Kingsley', 'Nkhonjera', 'CM', 25, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 24, 2112, 1, 2, 37, 3242, 84, NULL, 25, 2994, 94, 62, 0, 0, 39, 0, 0, 0, 47, 0, 42, 32, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'Alexander', 'Sikwambe', 'CM', 28, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 24, 2112, 4, 0, 31, 3310, 73, NULL, 23, 3257, 71, 66, 0, 0, 59, 0, 0, 0, 80, 0, 42, 15, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'Morris', 'Chiumia', 'CDM', 27, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 21, 1848, 3, 4, 24, 3346, 80, NULL, 53, 3260, 75, 40, 0, 0, 64, 0, 0, 0, 45, 0, 20, 10, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'Stain', 'Malata', 'CAM', 24, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 16, 1408, 2, 1, 20, 3099, 84, NULL, 26, 3010, 63, 45, 0, 0, 33, 0, 0, 0, 84, 0, 53, 21, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'Dan', 'Chimbalanga', 'ST', 26, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 17, 1496, 2, 2, 9, 1596, 0, NULL, 8, 1141, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 57, 35, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'Blessings', 'Phiri', 'ST', 25, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 6, 528, 0, 6, 8, 894, 0, NULL, 10, 862, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 37, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'Joseph', 'Donsa', 'LM', 24, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 17, 1496, 1, 1, 21, 3016, 51, NULL, 37, 3014, 74, 54, 0, 0, 51, 0, 0, 0, 95, 0, 20, 9, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'Yohane', 'Malunga', 'RM', 25, 'Malawi', 'MAFCO', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 18, 1584, 1, 5, 26, 3344, 69, NULL, 24, 3060, 53, 48, 0, 0, 35, 0, 0, 0, 99, 0, 29, 17, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'Jacob', 'Kaunda', 'GK', 27, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'Chikoti', 'Chirwa', 'CB', 28, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1476, 0, NULL, 0, 938, 208, 80, 91, 178, 40, 0, 126, 43, 74, 0, 0, 0, 12, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'James', 'Chirwa', 'CB', 26, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1414, 0, NULL, 0, 1155, 198, 153, 112, 158, 88, 0, 126, 43, 73, 0, 0, 0, 4, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'James', 'Mwetse', 'CB', 25, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 29, 2610, 0, 0, 0, 1199, 0, NULL, 0, 755, 229, 120, 105, 234, 31, 0, 126, 43, 72, 0, 0, 0, 8, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'Khumbo', 'Banda', 'LB', 25, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 23, 1955, 0, 2, 13, 1587, 116, 66, 0, 1021, 221, 181, 108, 139, 91, 5, 68, 33, 63, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'Gibson', 'Nkhonjera', 'CDM', 26, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 21, 1848, 4, 2, 24, 2896, 78, NULL, 46, 2804, 80, 34, 0, 0, 25, 0, 0, 0, 69, 0, 47, 20, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'McPeter', 'Makwale', 'CM', 26, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 29, 2552, 4, 1, 20, 2937, 38, NULL, 21, 2785, 61, 57, 0, 0, 32, 0, 0, 0, 21, 0, 46, 11, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Humphreys', 'Minandi', 'RM', 26, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 14, 1232, 4, 4, 25, 2928, 33, NULL, 25, 2807, 64, 33, 0, 0, 62, 0, 0, 0, 56, 0, 31, 15, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'Henry', 'Kamunga', 'LM', 27, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 25, 2200, 3, 5, 25, 2898, 50, NULL, 35, 2569, 56, 23, 0, 0, 47, 0, 0, 0, 64, 0, 43, 31, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'Brown', 'Gondwe', 'ST', 24, 'Malawi', 'Red Lions', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 18, 1584, 0, 0, 7, 925, 0, NULL, 7, 670, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 44, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'Chancy', 'Mtete', 'GK', 26, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'Emmanuel', 'Kaunga', 'RB', 27, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 31, 2635, 3, 1, 8, 1112, 121, 77, 0, 902, 172, 77, 89, 195, 70, 2, 86, 31, 81, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'Jimmy', 'Msiska', 'CB', 28, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1084, 0, NULL, 0, 857, 154, 122, 118, 264, 86, 0, 126, 43, 82, 0, 0, 0, 16, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'Mustafa', 'Maulana', 'CB', 29, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 29, 2610, 0, 0, 0, 1722, 0, NULL, 0, 1278, 217, 117, 104, 201, 60, 0, 126, 43, 99, 0, 0, 0, 11, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'Harry', 'Maulana', 'CM', 28, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 29, 2552, 5, 3, 20, 2809, 52, NULL, 53, 2713, 64, 36, 0, 0, 54, 0, 0, 0, 22, 0, 46, 32, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'Eneya', 'Banda', 'CDM', 27, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 26, 2288, 5, 0, 15, 2971, 50, NULL, 48, 2572, 51, 27, 0, 0, 51, 0, 0, 0, 44, 0, 37, 11, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'Sammy', 'Phiri', 'CAM', 27, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 28, 2464, 4, 5, 20, 3021, 69, NULL, 22, 2982, 93, 58, 0, 0, 54, 0, 0, 0, 46, 0, 53, 10, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'Blessings', 'Singini', 'RM', 26, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 26, 2288, 5, 0, 20, 2953, 55, NULL, 21, 2672, 77, 48, 0, 0, 53, 0, 0, 0, 73, 0, 22, 10, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'Michael', 'Teteh', 'LW', 24, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'Brian', 'Phiri', 'ST', 24, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 9, 792, 2, 1, 15, 1486, 0, NULL, 11, 1349, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 28, 25, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'Clever', 'Kaira', 'ST', 26, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 16, 1408, 5, 5, 8, 1001, 0, NULL, 12, 897, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 57, 35, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'Sulitha', 'Robert', 'CAM', 24, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 26, 2288, 4, 2, 9, 2973, 82, NULL, 53, 2768, 50, 26, 0, 0, 43, 0, 0, 0, 72, 0, 56, 28, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'Bongani', 'Lungu', 'CM', 24, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 10, 880, 2, 3, 21, 3012, 55, NULL, 38, 2833, 62, 36, 0, 0, 43, 0, 0, 0, 71, 0, 30, 15, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Patrick', 'Rudi', 'ST', 24, 'Malawi', 'Ekwendeni Hammers', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 23, 2024, 7, 3, 14, 1139, 0, NULL, 12, 720, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 47, 41, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'Richard', 'Mwaila', 'GK', 28, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'Joseph', 'Balakasi', 'RB', 27, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 27, 2295, 3, 2, 12, 1695, 135, 68, 0, 902, 137, 86, 113, 150, 44, 4, 85, 46, 62, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'Happy', 'Kasamba', 'CB', 27, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1272, 0, NULL, 0, 986, 171, 137, 161, 204, 69, 0, 126, 43, 120, 0, 0, 0, 8, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'Lloyd', 'Mugara', 'CB', 27, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 29, 2610, 0, 0, 0, 1080, 0, NULL, 0, 805, 225, 80, 131, 222, 39, 0, 126, 43, 107, 0, 0, 0, 6, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'Glem', 'Lemera', 'LB', 25, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 17, 1445, 1, 1, 11, 1552, 70, 44, 0, 1308, 152, 106, 88, 232, 31, 0, 90, 61, 52, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'Kondwani', 'Saizi', 'LW', 25, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'Sunny', 'Banda', 'RM', 25, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 24, 2112, 1, 0, 17, 2714, 43, NULL, 54, 2301, 59, 28, 0, 0, 62, 0, 0, 0, 18, 0, 53, 7, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'Jawado', 'Kanjuzi', 'CDM', 25, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 22, 1936, 4, 0, 9, 2842, 51, NULL, 53, 2363, 75, 74, 0, 0, 63, 0, 0, 0, 36, 0, 17, 7, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'Arthur', 'Moffat', 'CM', 26, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 10, 880, 1, 4, 17, 2605, 40, NULL, 53, 2449, 40, 18, 0, 0, 36, 0, 0, 0, 46, 0, 23, 10, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'Clever', 'Chikwata', 'CF', 25, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 11, 968, 6, 4, 10, 567, 0, NULL, 12, 480, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 33, 15, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'Blessings', 'Lipenga', 'GK', 28, 'Malawi', 'Ntopwa', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'Paul', 'Phiri', 'CM', 26, 'Malawi', 'MAFCO', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'Martin', 'Masoatheka', 'CAM', 25, 'Malawi', 'MAFCO', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'John', 'Soko', 'GK', 27, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'Wonder', 'Jereman', 'RB', 25, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 18, 1530, 0, 3, 11, 1162, 55, 43, 0, 736, 119, 68, 125, 173, 59, 0, 90, 42, 71, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'Jacob', 'Robert', 'CB', 28, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1217, 0, NULL, 0, 774, 183, 85, 103, 140, 82, 0, 126, 43, 107, 0, 0, 0, 3, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'Ganizani', 'James', 'CB', 27, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1275, 0, NULL, 0, 999, 178, 136, 128, 160, 72, 0, 126, 43, 113, 0, 0, 0, 14, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'Steve', 'Msiska', 'LB', 25, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 22, 1870, 1, 0, 13, 776, 76, 57, 0, 647, 106, 85, 69, 97, 28, 1, 77, 49, 64, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'Alexander', 'Chigawa', 'CB', 28, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1314, 0, NULL, 0, 791, 232, 118, 158, 251, 81, 0, 126, 43, 75, 0, 0, 0, 6, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'Brian', 'Msumatiza', 'CM', 25, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 13, 1144, 1, 0, 24, 2983, 62, NULL, 38, 2626, 69, 23, 0, 0, 23, 0, 0, 0, 42, 0, 20, 9, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'Stuart', 'Mbunge', 'CAM', 25, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 16, 1408, 5, 1, 20, 2992, 32, NULL, 37, 2621, 77, 75, 0, 0, 45, 0, 0, 0, 64, 0, 52, 42, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'Paul', 'Master', 'CDM', 23, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 17, 1496, 3, 1, 25, 2894, 46, NULL, 32, 2637, 46, 39, 0, 0, 36, 0, 0, 0, 49, 0, 54, 22, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'Gaddie', 'Chirwa', 'CF', 24, 'Malawi', 'Blue Eagles', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 6, 528, 6, 3, 11, 862, 0, NULL, 12, 607, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 63, 54, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'Georage', 'Chikooka', 'GK', 28, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'Justice', 'Chihoma', 'CB', 27, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1282, 0, NULL, 0, 766, 127, 77, 108, 144, 70, 0, 126, 43, 84, 0, 0, 0, 5, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'Hardy', 'Ngandu', 'CB', 26, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 29, 2610, 0, 0, 0, 1002, 0, NULL, 0, 758, 181, 78, 87, 142, 40, 0, 126, 43, 109, 0, 0, 0, 14, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'Peter', 'Mughogho', 'RB', 24, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 28, 2380, 3, 0, 9, 1185, 116, 78, 0, 894, 105, 51, 87, 108, 52, 1, 66, 31, 80, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'Blessings', 'Chimbaza', 'LB', 25, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 20, 1700, 1, 3, 14, 866, 122, 97, 0, 617, 121, 75, 91, 138, 20, 1, 69, 59, 56, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'Alex', 'Benson', 'RM', 26, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 28, 2464, 3, 4, 15, 2725, 84, NULL, 25, 2664, 58, 55, 0, 0, 27, 0, 0, 0, 33, 0, 41, 17, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'Gule', 'Mwaisope', 'CM', 25, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 15, 1320, 3, 0, 6, 2825, 44, NULL, 37, 2319, 46, 28, 0, 0, 63, 0, 0, 0, 43, 0, 22, 11, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'Mathews', 'Sibale', 'CM', 26, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 11, 968, 4, 2, 8, 2884, 32, NULL, 23, 2585, 34, 29, 0, 0, 47, 0, 0, 0, 72, 0, 22, 10, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'Bayo', 'Fatayo', 'LM', 26, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 22, 1936, 3, 3, 16, 2724, 50, NULL, 47, 2674, 44, 19, 0, 0, 29, 0, 0, 0, 56, 0, 24, 12, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'Dumisan', 'Jere', 'ST', 24, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 16, 1408, 2, 3, 9, 927, 0, NULL, 7, 522, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 33, 31, 0, 0, 0, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(166, 'Kenson', 'Mlenga', 'CAM', 27, 'Malawi', 'Chitipa United', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 21, 1848, 2, 2, 20, 2730, 66, NULL, 47, 2313, 56, 45, 0, 0, 58, 0, 0, 0, 30, 0, 54, 31, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'Pilirani', 'Mapila', 'GK', 27, 'Malawi', 'Mzuzu Warriors', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'Matthew', 'Salilana', 'RB', 25, 'Malawi', 'Mzuzu Warriors', NULL, '', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'Temwa', 'Msowoya', 'CB', 27, 'Malawi', 'Mzuzu Warriors', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'Edward', 'Dakalira', 'CM', 26, 'Malawi', 'Mzuzu Warriors', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'Kelvin', 'Kadzinje', 'CAM', 24, 'Malawi', 'Mzuzu Warriors', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'Uchizi', 'Vunga', 'CB', 27, 'Malawi', 'Mzuzu Warriors', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'Gift', 'Khonje', 'CM', 25, 'Malawi', 'Mzuzu Warriors', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'Lackson', 'Sangano', 'CDM', 26, 'Malawi', 'Mzuzu Warriors', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'Shenton', 'Banda', 'LM', 24, 'Malawi', 'Mzuzu Warriors', NULL, '', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'Brian', 'Mhone', 'LB', 25, 'Malawi', 'Mzuzu Warriors', NULL, '', 'L', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'McDonald', 'Harawa', 'GK', 25, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'Lovemore', 'Jere', 'RB', 27, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 26, 2210, 0, 1, 8, 1433, 130, 58, 0, 1232, 234, 131, 166, 198, 64, 3, 63, 62, 114, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'Sandress', 'Mnthali', 'LB', 26, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 29, 2465, 3, 1, 13, 869, 128, 84, 0, 644, 134, 71, 64, 99, 36, 3, 71, 62, 41, 0, 0, 0, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'Black', 'Allisen', 'CB', 25, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 30, 2700, 0, 0, 0, 1512, 0, NULL, 0, 895, 213, 168, 109, 141, 79, 0, 126, 43, 80, 0, 0, 0, 9, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'Raphael', 'Phiri', 'ST', 26, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 23, 2024, 3, 4, 10, 1562, 0, NULL, 12, 1544, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 27, 19, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'Innocent', 'Bottoman', 'LM', 25, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', 'R', NULL, NULL, 27, 2376, 2, 0, 21, 3359, 84, NULL, 22, 2951, 60, 49, 0, 0, 60, 0, 0, 0, 95, 0, 39, 15, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 'Brown', 'Magaga', 'RM', 24, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', 'L', NULL, NULL, 27, 2376, 5, 4, 35, 3092, 83, NULL, 53, 3092, 89, 61, 0, 0, 61, 0, 0, 0, 42, 0, 52, 34, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'Chamveka', 'Gwetsani', 'CDM', 26, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 21, 1848, 1, 2, 31, 3404, 73, NULL, 23, 3011, 77, 51, 0, 0, 29, 0, 0, 0, 84, 0, 50, 38, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 'Ntopijo', 'Njewa', 'CDM', 25, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', NULL, NULL, NULL, 11, 968, 2, 0, 30, 3018, 53, NULL, 46, 3016, 64, 44, 0, 0, 52, 0, 0, 0, 92, 0, 43, 12, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 'Boyboy', 'Chima', 'CB', 24, 'Malawi', 'Moyale Barracks', 'TNM Super League', 'mw-tsl', NULL, 178, '70', 29, 2610, 0, 0, 0, 1349, 0, NULL, 0, 759, 199, 169, 101, 199, 53, 0, 126, 43, 77, 0, 0, 0, 5, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 'Test1', 'Player1', 'RB', NULL, NULL, 'Test Club1', NULL, 'mw-tsl', NULL, 178, '70', 28, 2380, 0, 3, 8, 50, 173, 128, 0, 30, 4, 2, 5, 8, 2, 0, 3, 2, 56, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `player_points`
-- (See below for the actual view)
--
CREATE TABLE `player_points` (
`player_ID` int(11)
,`fname` varchar(256)
,`lname` varchar(256)
,`club` varchar(256)
,`age` int(11)
,`nationality` varchar(256)
,`player_pic` varchar(256)
,`position` varchar(256)
,`rating` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `data` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `data`) VALUES
(3, '[\"chaupi\",\"ghambi\",21]');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `transfer_id` int(11) NOT NULL,
  `date_transfered` date DEFAULT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `previous_club` varchar(100) DEFAULT NULL,
  `next_club` varchar(100) DEFAULT NULL,
  `fee` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`transfer_id`, `date_transfered`, `fname`, `lname`, `previous_club`, `next_club`, `fee`) VALUES
(1, '2021-02-02', 'Stain', 'Davie', 'TN Stars', 'Silver Strikers', 'Undisclosed'),
(2, '2021-08-14', 'Duncan', 'Nyoni', 'Silver Strikers', 'Simba Sports Club', 'Undisclosed'),
(3, '2021-08-03', 'Peter', 'Banda', 'Nyasa Big Bullets', 'Simba SC', 'Undisclosed'),
(4, '2021-02-11', 'Mike', 'Mkwate', 'Nyasa Big Bullets', 'Polokwane City FC', 'Undisclosed'),
(5, '2021-07-25', 'Anthony', 'Mfune', 'Nyasa Big Bullets', 'Karonga United', '1500000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `user_votes` mediumtext DEFAULT NULL,
  `user_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `user_type`, `user_votes`, `user_pic`) VALUES
(1, 'test', 'test123', 'user', NULL, NULL),
(2, 'super user', 'super123', 'admin', NULL, NULL),
(8, 'Chaupi Ghambi', '123', 'admin', '[100,102,104,900,25]', NULL);

-- --------------------------------------------------------

--
-- Structure for view `cb_points`
--
DROP TABLE IF EXISTS `cb_points`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cb_points`  AS  select `players`.`player_ID` AS `player_ID`,`players`.`fname` AS `fname`,`players`.`lname` AS `lname`,`players`.`club` AS `club`,`players`.`age` AS `age`,`players`.`nationality` AS `nationality`,`players`.`player_pic` AS `player_pic`,`players`.`position` AS `position`,`players`.`appearances` AS `appearances`,`players`.`minutes_played` AS `minutes_played`,`players`.`pass_attempt` AS `pass_attempt`,`players`.`pass_comp` AS `pass_comp`,concat(`players`.`pass_comp` / `players`.`pass_attempt` * 100 * 1) AS `pass_accuracy`,`players`.`tackle_attempt` AS `tackle_attempt`,`players`.`tackle_comp` AS `tackle_comp`,concat(`players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 1) AS `tackle_success`,`players`.`aerials_contested` AS `aerials_contested`,`players`.`aerials_won` AS `aerials_won`,concat(`players`.`aerials_won` / `players`.`aerials_contested` * 100 * 1) AS `aerial_success`,`players`.`possession_won` AS `possession_won`,`players`.`interceptions` AS `interceptions`,floor(concat(`players`.`aerials_won` / `players`.`aerials_contested` * 100 * 40 + `players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 20 * `players`.`appearances`)) AS `points`,floor(concat(`players`.`aerials_won` / `players`.`aerials_contested` * 100 * 40 + `players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 20 * `players`.`appearances` / `players`.`appearances`)) AS `points_per_game`,if(floor(`players`.`aerials_won` / `players`.`aerials_contested` * 100 * 40 + `players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 20 * `players`.`appearances` / `players`.`appearances`) >= 9000,9,if(floor(`players`.`aerials_won` / `players`.`aerials_contested` * 100 * 40 + `players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 20 * `players`.`appearances` / `players`.`appearances`) >= 8000,8,if(floor(`players`.`aerials_won` / `players`.`aerials_contested` * 100 * 40 + `players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 20 * `players`.`appearances` / `players`.`appearances`) >= 7000,7,if(floor(`players`.`aerials_won` / `players`.`aerials_contested` * 100 * 40 + `players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 20 * `players`.`appearances` / `players`.`appearances`) >= 6000,6,5)))) AS `rating` from `players` where `players`.`position` = 'CB' and `players`.`league_code` = 'mw-tsl' order by `points` * 1 desc ;

-- --------------------------------------------------------

--
-- Structure for view `fb_points`
--
DROP TABLE IF EXISTS `fb_points`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fb_points`  AS  select `players`.`player_ID` AS `player_ID`,`players`.`fname` AS `fname`,`players`.`lname` AS `lname`,`players`.`club` AS `club`,`players`.`age` AS `age`,`players`.`nationality` AS `nationality`,`players`.`player_pic` AS `player_pic`,`players`.`position` AS `position`,`players`.`appearances` AS `appearances`,`players`.`minutes_played` AS `minutes_played`,`players`.`pass_attempt` AS `pass_attempt`,`players`.`pass_comp` AS `pass_comp`,concat(`players`.`pass_comp` / `players`.`pass_attempt` * 100 * 1) AS `pass_accuracy`,`players`.`assists` AS `assists`,`players`.`cross_comp` AS `cross_comp`,concat(`players`.`cross_comp` / `players`.`cross_attempt` * 100) AS `cross_accuracy`,`players`.`cross_attempt` AS `cross_attempt`,`players`.`chances_created` AS `chances_created`,concat(`players`.`chances_created` / `players`.`appearances` * 1) AS `chances_created_per_game`,`players`.`tackle_attempt` AS `tackle_attempt`,`players`.`tackle_comp` AS `tackle_comp`,concat(`players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 1) AS `tackle_success`,`players`.`possession_won` AS `possession_won`,floor(concat(`players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 40 + `players`.`chances_created` / `players`.`appearances` * 20 * `players`.`appearances`)) AS `points`,floor(concat(`players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 40 + `players`.`chances_created` / `players`.`appearances` * 20 * `players`.`appearances` / `players`.`appearances`)) AS `points_per_game`,if(floor(concat(`players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 40 + `players`.`chances_created` / `players`.`appearances` * 20 * `players`.`appearances` / `players`.`appearances`)) >= 7500,9,if(floor(concat(`players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 40 + `players`.`chances_created` / `players`.`appearances` * 20 * `players`.`appearances` / `players`.`appearances`)) >= 6500,8,if(floor(concat(`players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 40 + `players`.`chances_created` / `players`.`appearances` * 20 * `players`.`appearances` / `players`.`appearances`)) >= 5500,7,if(floor(concat(`players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 40 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 40 + `players`.`chances_created` / `players`.`appearances` * 20 * `players`.`appearances` / `players`.`appearances`)) >= 4405,6,5)))) AS `rating` from `players` where (`players`.`position` = 'LB' or `players`.`position` = 'RB' or `players`.`position` = 'LwB' or `players`.`position` = 'RWB') and `players`.`league_code` = 'mw-tsl' order by `points` * 1 desc ;

-- --------------------------------------------------------

--
-- Structure for view `forward_points`
--
DROP TABLE IF EXISTS `forward_points`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `forward_points`  AS  select `players`.`player_ID` AS `player_ID`,`players`.`fname` AS `fname`,`players`.`lname` AS `lname`,`players`.`club` AS `club`,`players`.`position` AS `position`,`players`.`appearances` AS `appearances`,`players`.`minutes_played` AS `minutes_played`,`players`.`goals` AS `goals`,`players`.`assists` AS `assists`,`players`.`shots` AS `shots`,concat(`players`.`goals` / `players`.`shots` * 100 * 1) AS `shot_conversion`,`players`.`dribble_attempt` AS `dribble_attempt`,`players`.`dribble_comp` AS `dribble_comp`,concat(`players`.`dribble_comp` / `players`.`dribble_attempt` * 100 * 1) AS `dribble_success`,`players`.`pass_attempt` AS `pass_attempt`,`players`.`pass_comp` AS `pass_comp`,concat(`players`.`pass_comp` / `players`.`pass_attempt` * 100 * 1) AS `pass_accuracy`,`players`.`chances_created` AS `chances_created`,concat(`players`.`goals` * 40 + `players`.`assists` * 20 + `players`.`dribble_comp` * 20 + `players`.`chances_created` * 10 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 1 * 10) AS `points` from `players` where (`players`.`position` = 'LM' or `players`.`position` = 'RM' or `players`.`position` = 'LW' or `players`.`position` = 'RW' or `players`.`position` = 'ST' or `players`.`position` = 'CF') and `players`.`league_code` = 'mw-tsl' order by concat(`players`.`goals` * 40 + `players`.`assists` * 20 + `players`.`dribble_comp` * 20 + `players`.`chances_created` * 10 + `players`.`pass_comp` / `players`.`pass_attempt` * 100 * 1 * 10) desc ;

-- --------------------------------------------------------

--
-- Structure for view `gk_points`
--
DROP TABLE IF EXISTS `gk_points`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gk_points`  AS  select `players`.`player_ID` AS `player_ID`,`players`.`fname` AS `fname`,`players`.`lname` AS `lname`,`players`.`club` AS `club`,`players`.`appearances` AS `appearances`,`players`.`minutes_played` AS `minutes_played`,`players`.`clean_sheets` AS `clean_sheets`,`players`.`saves` AS `saves` from `players` where `players`.`position` = 'GK' and `players`.`league_code` = 'mw-tsl' ;

-- --------------------------------------------------------

--
-- Structure for view `mid_points`
--
DROP TABLE IF EXISTS `mid_points`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mid_points`  AS  select `players`.`player_ID` AS `player_ID`,`players`.`fname` AS `fname`,`players`.`lname` AS `lname`,`players`.`club` AS `club`,`players`.`position` AS `position`,`players`.`appearances` AS `appearances`,`players`.`minutes_played` AS `minutes_played`,`players`.`pass_attempt` AS `pass_attempt`,`players`.`pass_comp` AS `pass_comp`,concat(`players`.`pass_comp` / `players`.`pass_attempt` * 100 * 1) AS `pass_accuracy`,`players`.`goals` AS `goals`,`players`.`assists` AS `assists`,`players`.`chances_created` AS `chances_created`,`players`.`tackle_attempt` AS `tackle_attempt`,`players`.`tackle_comp` AS `tackle_comp`,concat(`players`.`tackle_comp` / `players`.`tackle_attempt` * 100 * 1) AS `tackle_success`,`players`.`possession_won` AS `possession_won`,concat(`players`.`pass_comp` / `players`.`pass_attempt` * 100 * 1 * 30 + `players`.`chances_created` * 20 + `players`.`tackle_comp` * 20 + `players`.`assists` * 20 + `players`.`possession_won` * 5 + `players`.`goals` * 5) AS `points` from `players` where (`players`.`position` = 'CDM' or `players`.`position` = 'CM' or `players`.`position` = 'CAM') and `players`.`league_code` = 'mw-tsl' order by `points` * 1 desc ;

-- --------------------------------------------------------

--
-- Structure for view `mw-tsl-teams`
--
DROP TABLE IF EXISTS `mw-tsl-teams`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mw-tsl-teams`  AS  select `clubs`.`club_ID` AS `club_ID`,`clubs`.`club_name` AS `club_name`,`clubs`.`league` AS `league`,`clubs`.`league_code` AS `league_code`,`clubs`.`league_position` AS `league_position`,`clubs`.`formation` AS `formation`,`clubs`.`manager` AS `manager`,`clubs`.`stadium` AS `stadium`,`clubs`.`stadium_capacity` AS `stadium_capacity`,`clubs`.`captain` AS `captain`,`clubs`.`v_captain` AS `v_captain`,`clubs`.`pk_taker` AS `pk_taker`,`clubs`.`short_fk` AS `short_fk`,`clubs`.`long_fk` AS `long_fk`,`clubs`.`l_corner` AS `l_corner`,`clubs`.`r_corner` AS `r_corner`,`clubs`.`club_pic` AS `club_pic` from `clubs` where `clubs`.`league` = 'TNM Super League' or `clubs`.`league_code` = 'mw-tsl' ;

-- --------------------------------------------------------

--
-- Structure for view `player_points`
--
DROP TABLE IF EXISTS `player_points`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `player_points`  AS  select `cb_points`.`player_ID` AS `player_ID`,`cb_points`.`fname` AS `fname`,`cb_points`.`lname` AS `lname`,`cb_points`.`club` AS `club`,`cb_points`.`age` AS `age`,`cb_points`.`nationality` AS `nationality`,`cb_points`.`player_pic` AS `player_pic`,`cb_points`.`position` AS `position`,`cb_points`.`rating` AS `rating` from `cb_points` union select `fb_points`.`player_ID` AS `player_ID`,`fb_points`.`fname` AS `fname`,`fb_points`.`lname` AS `lname`,`fb_points`.`club` AS `club`,`fb_points`.`age` AS `age`,`fb_points`.`nationality` AS `nationality`,`fb_points`.`player_pic` AS `player_pic`,`fb_points`.`position` AS `position`,`fb_points`.`rating` AS `rating` from `fb_points` order by `rating` * 1 desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_ID`);

--
-- Indexes for table `competitions_tournaments`
--
ALTER TABLE `competitions_tournaments`
  ADD PRIMARY KEY (`league_id`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`match_ID`);

--
-- Indexes for table `mw-tsl-table_21-22`
--
ALTER TABLE `mw-tsl-table_21-22`
  ADD PRIMARY KEY (`pos_ID`);

--
-- Indexes for table `mw-tsl-table_22-23`
--
ALTER TABLE `mw-tsl-table_22-23`
  ADD PRIMARY KEY (`pos_ID`);

--
-- Indexes for table `national_team`
--
ALTER TABLE `national_team`
  ADD PRIMARY KEY (`nation_ID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `competitions_tournaments`
--
ALTER TABLE `competitions_tournaments`
  MODIFY `league_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `match_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mw-tsl-table_21-22`
--
ALTER TABLE `mw-tsl-table_21-22`
  MODIFY `pos_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mw-tsl-table_22-23`
--
ALTER TABLE `mw-tsl-table_22-23`
  MODIFY `pos_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `national_team`
--
ALTER TABLE `national_team`
  MODIFY `nation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
