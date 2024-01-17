-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Production Time: 09 Jan 2024, 00:33:52
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--Database: `zartzurt`
--

-- --------------------------------------------------------

--
-- Table structure for table `rented_cars`
--

CREATE TABLE `rented_cars` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `car_name` varchar(255) DEFAULT NULL,
  `rental_date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table breakdown data `rented_cars`
--

INSERT INTO `rented_cars` (`id`, `user_id`, `car_name`, `rental_date`, `location`) VALUES
(4, 3, 'Honda Civic', '2023-05-25', 'New York'),
(8, 1, 'Toyota RAV4', '2023-05-28', 'Chicago'),
(9, 1, 'Honda Civic', '2023-05-30', 'Chicago'),
(10, 9, 'Ford Mustang', '2023-05-31', 'New York'),
(11, 1, 'Honda Civic', '2023-06-12', 'Los Angeles'),
(12, 10, 'Toyota RAV4', '0131-03-31', 'Chicago');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table dump data `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `phone`, `password`) VALUES
(1, 'osmanmura@gmail.com', 'asdf', '710324', '$2y$10$GxhmTWyRYr.mEsqQkSB3Re7S07F5ZhC/hA.dbBSVzOiwD4sn.bgKq'),
(2, 'osmanmura@gmail.com', 'asdf', '710324', '$2y$10$eQTVo5WpDZXEagx3bhqT5OKOI.Dt7SBPjFQmwF3RNE8.nl9ybzcZ.'),
(3, 'babaa@gmail.com', 'babaa', '31313131', '$2y$10$0J.TcKOGxVf3hgttsQGZe.HrpXB4vSvJo7Xocbrg4Vp63eTq6Fly.'),
(5, 'osmanmurrrat03t@gmail.com', 'babayogaa', '313131', '$2y$10$ejFkTmEF.KTBz/mZme2bHub38NboN2FcNBbFvNJaop/1hHBSF1tiS'),
(6, 'qwertt@gmail.com', 'qwerr', '123123123', '$2y$10$oQHzeNuXNr2PwBy41cu4..tNi69xpy0QkmFrURinh.radtyx40Zpa'),
(7, 'asdfff@gmail.com', 'qwerrrr', '123123213', '$2y$10$e.YOjhcX7E4SpTevYcJl1.v8qSyRcUzhs8bf5it2zY5B9dkLslJAS'),
(8, 'asdf123', 'asdfffff@gmail.com', '123213213', '$2y$10$VIQEOhYOLpXH9XQ6EWEjVu9htAOMzS2YvPY2Uy6i5PmS1FoqpFET2'),
(9, 'qwertqwer@gmail.com', 'osuruk', '31313131', '$2y$10$j03/hPH24uZ8vpMYo7SIwOc71RNzUlo.ixWDn9I2GRHSRVFre3cNK'),
(10, 'zattttt', 'zoottt', '3131313131', '$2y$10$AGwutz1miHgQ2Cl3BwcdYOPX3pbY3Yw0AD2D2voiGSqtYQ5NNEo2O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rented_cars`
--
ALTER TABLE `rented_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT value for dumped tables
--

--
-- AUTO_INCREMENT value for table `rented_cars`
--
ALTER TABLE `rented_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT value for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrictions for dumped tables
--

--
-- Table constraints `rented_cars`
--
ALTER TABLE `rented_cars`
  ADD CONSTRAINT `rented_cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
