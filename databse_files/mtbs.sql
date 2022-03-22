-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 04:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
(1, 'ankit', 'ankit@ankit.com', '$2y$10$VfUe9A5HQdgr.xkHG5ZdSONk58cjBM0fGiaOt1oKiErJWMMU.dIeG', 'user', ''),
(2, 'admin', 'admin@admin.com', '$2y$10$Ly2dVfzg91Y8Bicq4GX.qevdi7nOkg2cOrw36ZV4lrWA/oJ64aMnu', 'admin', ''),
(8, 'CinemaTIC', 'aksj@aksj.aksj', '$2y$10$KYOT2NmGQEwQkxsszIvt8uljAoNrugCaxVugdJIHl9FjuHXMMA/SW', 'user', ''),
(11, 'hello', 'hello@hello', '$2y$10$9d7EIv7BnJ7YUGtG8zpK7.KxS8UJRQwQag05DpK57iF95JYRfys.C', 'user', ''),
(14, 'user', 'user@user.com', '$2y$10$0s73U8a1JQ8ZknbSr/ABduxeXDaf1/K9UPDrfP1w0woFQ6SEnQsMC', 'user', ''),
(23, 'Ankit Bhusal', 'ankitbhusal95@gmail.com', '$2y$10$oMfmTH.tE9ok/WHx9cYar.rfzr7WuVRmW.I3Z8R.r.byFoYf26vp6', 'user', '9824408587');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
