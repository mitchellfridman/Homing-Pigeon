-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 04, 2022 at 06:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homing_pigeon`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `date`, `is_paid`) VALUES
(1, 68, '2022-07-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts_postcards`
--

CREATE TABLE `carts_postcards` (
  `cart_id` int(11) NOT NULL,
  `postcard_id` int(11) NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `user_id` int(11) NOT NULL,
  `postcard_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postcards`
--

CREATE TABLE `postcards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float(5,2) NOT NULL DEFAULT 0.00,
  `artist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postcards`
--

INSERT INTO `postcards` (`id`, `name`, `description`, `price`, `artist`) VALUES
(65, 'Poutine', 'Poutine is Love, Poutine is life', 4.99, 'malak'),
(66, 'Habitat 67', 'Lego my eggo version of habitat 67', 4.99, 'malak'),
(67, 'Ode to Crayola', 'Ode to Crayola', 4.99, 'malak'),
(68, 'Dream of Montreal', 'Dream of montreal', 4.99, 'rami');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` set('admin','customer') NOT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `type`, `is_blocked`) VALUES
(1, 'Rami', 'Chaouki', 'chaoukirami@live.ca', '$2y$10$rODNj8mQQn4OSUHvCJSiMuIbUNN81FSbVRhwDS9S24PxMKdeD209a', '111 fake street', 'admin', 0),
(63, 'Alina', 'Gotcherian', 'alina@live.ca', '$2y$10$19j19cfwdOjzXsN0p7E2D.YBdmVxZJMQvQxD9aST1UwO1tKKnx9Fa', 'test', 'customer', 0),
(68, 'Edgar', 'Townsend', 'E@T.ca', '$2y$10$KLc2ZS.Yt3VKhBLuCx72zuGok0MzBpHT05JP6aWqTalZQzbfR2tYO', '111 fun street', 'customer', 0),
(70, 'Pargol', 'Poshtareh', 'P@gmail.com', '$2y$10$1K3U0NN1Awvi4ZnC7w7rcOFgQnUoeANQRxCLXp.0kyDkevurOmzfy', '111 fake street', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carts_users` (`user_id`);

--
-- Indexes for table `carts_postcards`
--
ALTER TABLE `carts_postcards`
  ADD KEY `fk_carts_postcards_carts` (`cart_id`),
  ADD KEY `fk_carts_postcards_postcards` (`postcard_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD KEY `fk_favourites_postcards` (`postcard_id`),
  ADD KEY `fk_favourites_users` (`user_id`);

--
-- Indexes for table `postcards`
--
ALTER TABLE `postcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `postcards`
--
ALTER TABLE `postcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_carts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts_postcards`
--
ALTER TABLE `carts_postcards`
  ADD CONSTRAINT `fk_carts_postcards_carts` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `fk_carts_postcards_postcards` FOREIGN KEY (`postcard_id`) REFERENCES `postcards` (`id`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `fk_favourites_postcards` FOREIGN KEY (`postcard_id`) REFERENCES `postcards` (`id`),
  ADD CONSTRAINT `fk_favourites_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
