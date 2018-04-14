-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 08:02 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysqli_prm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `contact_no` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `sex` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `username`, `password`, `role`, `birthday`, `sex`) VALUES
(14, 'Yvan', 'Luna', 'yvanluna000@gmail.com', 0, 'yvanyvanyvan', '$2y$10$VR9XaDVsqawBVQepZk4Xne4apKFqcGyp3qF/UtgnLrUQdx.xdxqrG', 'Admin', '1997-11-25', 'Male'),
(15, 'Cyrus', 'Chang', 'cyruschang111@gmail.com', 0, 'Calstream', '$2y$10$y01WbXaahakPm6CheJ6oiuCEAXAnK5C3gaYnyef1MDs6ZraUEkHme', 'User', '1997-08-15', 'Male'),
(17, 'Renoir', 'Sorreda', 'renoirsorreda@gmail.com', 0, 'uwasorreda', '$2y$10$8XyLT56GCUCgshEGDIgFteE54KiZZxCE7d5kZWOsO1fJXuvaZMFJG', 'User', '1997-02-25', 'Male'),
(18, 'Christian', 'Manducduc', 'christianmanducduc@gmail.com', 0, 'Janno', '$2y$10$lWTVSVc.xYFLjIlAzZIZNOfOC/i/HUJpTQIIyNbeg8ovfLJmCWEMO', 'User', '1997-05-12', 'Male'),
(19, 'Julius', 'Baldo', 'jmigbaldo@gmail.com', 0, 'RandomSmartGuy', '$2y$10$YLRghkPm6f8cr1uWZ6b.UufAKCu4d.lAsys4/HPrJhXPIdzbfiAtO', 'Admin', '1997-12-09', 'Male'),
(20, 'Allen', 'Pamaong', 'allenpamaong@gmail.com', 0, 'Allen', '$2y$10$ShWbUcVTXXDSlwJIr/mmn.bLjS3kQtpculH4lE1O7mXgTp1ZDVLQK', 'User', '1991-01-01', 'Male'),
(21, 'Ja', 'Santos', 'japoposantos@gmail.com', 0, 'Jambles', '$2y$10$WYoHs78DwIzJpiwFU/Ftg.6bow57vJj5h2qpJSJYgrtpcWOj5/68G', 'User', '1991-01-01', 'Male'),
(22, 'John Paul', 'Pinuela', 'jpmoto@gmail.com', 0, 'jpinuela', '$2y$10$BRPUN3r1YTcc1zR7N1QaG.Ricy1C00vyyCJYv/IlCdEvkyN5n1ATu', 'User', '1991-01-01', 'Male'),
(23, 'Vinzy', 'Catimbang', 'vinzylovesyou@gmail.com', 0, 'iamvinzy_C', '$2y$10$Tri3CGcPc2AaznN5nbBUSOjI/OHv08fK3.kULTNcvD2OgsjfNU/Sa', 'User', '1991-01-01', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
