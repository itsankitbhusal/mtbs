-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 05:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `total_tickets` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `booked_seat` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Sci-Fi'),
(2, 'Horror'),
(3, 'Fantasy'),
(4, 'Comedy'),
(5, 'Crime'),
(6, 'Action'),
(7, 'Romance'),
(8, 'Drama'),
(9, 'Biography'),
(10, 'Adventure'),
(12, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `genre_movie`
--

CREATE TABLE `genre_movie` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre_movie`
--

INSERT INTO `genre_movie` (`id`, `genre_id`, `movie_id`) VALUES
(80, 5, 17),
(81, 8, 17),
(82, 9, 17),
(87, 6, 18),
(99, 5, 16),
(100, 6, 16),
(101, 8, 16),
(102, 6, 24),
(103, 10, 24),
(104, 7, 25),
(105, 8, 25),
(106, 6, 26),
(107, 8, 26),
(108, 5, 27),
(109, 6, 27),
(110, 6, 28),
(111, 8, 28),
(112, 4, 29);

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `name`, `total_seats`) VALUES
(4, 'CinemaTIC', 100);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `language` varchar(10) NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `image_cover` varchar(200) NOT NULL,
  `runtime` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `language`, `release_date`, `image`, `image_cover`, `runtime`) VALUES
(16, 'The Batman', 'English', '2022-03-04', '6226bc0fc413d.jpeg', '6226bc0fc4627.jpeg', '153'),
(17, 'Gangubai Kathiawadi', 'Hindi', '2022-02-25', '6226bce868555.jpeg', '6226bce868756.jpeg', '140'),
(18, 'Lappan Chhappan 2', 'Nepali', '2022-02-25', '6226cbe7db01b.jpeg', '6226bd8f262b6.jpeg', '126'),
(24, 'Morbius', 'English', '2022-04-01', '62357c106534a.jpeg', '62357c1065511.jpeg', '104'),
(25, 'Radhe Shyam', 'Hindi', '2022-03-11', '62357cb577383.jpeg', '62357cb577453.jpeg', '128'),
(26, 'RRR', 'Hindi', '2022-03-25', '62357d8691d36.jpeg', '62357d8691dbc.jpeg', '186'),
(27, 'Bachchan Pandey', 'Hindi', '2022-03-18', '62357e1156831.jpeg', '62357e115691f.jpeg', '150'),
(28, 'KGF Chapter II', 'Hindi', '2022-04-15', '6259765e1b2cf.jpeg', '6259765e1b3ea.jpeg', '168'),
(29, 'Kabaddi IV', 'Nepali', '2022-05-27', '62903a3597d3e.jpeg', '62903a359800e.jpeg', '137');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `play_date` date NOT NULL,
  `play_time` time NOT NULL,
  `ticket_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'user',
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `phone`) VALUES
(1, 'ankit', 'ankit@ankit.com', '$2y$10$VfUe9A5HQdgr.xkHG5ZdSONk58cjBM0fGiaOt1oKiErJWMMU.dIeG', 'user', '9762534112'),
(2, 'admin', 'admin@admin.com', '$2y$10$Ly2dVfzg91Y8Bicq4GX.qevdi7nOkg2cOrw36ZV4lrWA/oJ64aMnu', 'admin', '9823513251'),
(8, 'CinemaTIC', 'aksj@aksj.aksj', '$2y$10$KYOT2NmGQEwQkxsszIvt8uljAoNrugCaxVugdJIHl9FjuHXMMA/SW', 'user', '9878912343'),
(11, 'hello', 'hello@hello', '$2y$10$9d7EIv7BnJ7YUGtG8zpK7.KxS8UJRQwQag05DpK57iF95JYRfys.C', 'user', '9810101100'),
(14, 'Ankit Bhusal', 'user@user.com', '$2y$10$DTM28tG6qHvkof8GKkTUAO2GvcrRDwmbfInBRvBQB9ilEvLwzUSRi', 'user', '9700000109'),
(23, 'Ankit Bhusal', 'ankitbhusal95@gmail.com', '$2y$10$oMfmTH.tE9ok/WHx9cYar.rfzr7WuVRmW.I3Z8R.r.byFoYf26vp6', 'user', '9824408587'),
(24, 'ankit', 'heeeee@hello.com', '$2y$10$MmvuqweGXibtkvuvjnpZ..gGktLcDP49u6L6LXbmimrOQxteIjRBG', 'user', '9847388977'),
(25, 'ankit bhusal', 'ankitbhusal959@gmail.com', '$2y$10$7GStC9m4BmBsWn2PDkWuVuSI9vKt0KbzfrB/aMy..RkJGJa3gnclW', 'user', '9779824408587'),
(26, 'Ankit Bhusal', 'ankitbhusal@gmail.com', '$2y$10$JTlOGovHM9YG4RnuzAUUeujb8aqecs/zFz0fT/DNjWPElZgPInBvq', 'user', '9800000090'),
(27, 'ankit', 'ankitbhusal@afskdj.asjd', '$2y$10$lD6h29ePNPJg7Bv90pkjUul0MeR5/bf6eCpl6jTwPslNjRQEVZcXi', 'user', '9824408517');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `show` (`show_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre_movie`
--
ALTER TABLE `genre_movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking` (`booking_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall` (`hall_id`),
  ADD KEY `movie` (`movie_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genre_movie`
--
ALTER TABLE `genre_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `show` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genre_movie`
--
ALTER TABLE `genre_movie`
  ADD CONSTRAINT `genre_movie_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genre_movie_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `booking` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `hall` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
