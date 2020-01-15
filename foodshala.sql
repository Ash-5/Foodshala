-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 05:13 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `rest_id`, `category`, `active`, `image`, `type`) VALUES
(46, 'Pakaora', 100, 'This is a type of pakora arp so crispy and cooked health.', 26, 'snacks', 0, 'images/products/pkoora.jpg', 'vegetarian'),
(48, 'sring rolls', 100, 'These are Mumbai famous spring rolls. Cooked in healthy oil. It come up with a very different and special souse that only go well with our spring rolls.', 26, 'snacks', 0, 'images/products/springrolls.jpg', 'vegetarian'),
(50, 'Special chicken', 600, 'It is cooked with our special recipe. It is chicken blend in some souses which gives it a finger licking taste. ', 26, 'Main course', 1, 'images/products/special.jpg', 'non-veg'),
(52, 'Veg-burger', 80, 'It is a crispy aalo tikki burger with layer of paneer and cheese. ', 27, 'snacks', 0, 'images/products/burger.jpg', 'veg'),
(58, 'Pasta', 300, 'It is a red sauce pasta with lots of toppings and cheese that makes it so delicious.', 27, 'snakcs', 1, 'images/products/pasta.jpg', 'veg'),
(59, 'Tandoori Smoked Chicken', 250, 'It is a smokey grilled tandoori chicken. Served with green chili sauce. It comes up with some customization.', 27, 'Main course', 1, 'images/products/tandoori.jpg', 'non-veg'),
(60, 'Tandoori Smoked Chicken', 250, 'It is a smokey grilled tandoori chicken. Served with green chili sauce. It comes up with some customization.', 27, 'Main course', 1, 'images/products/tandoori.jpg', 'non-veg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` longtext NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `email`, `bio`, `user_id`, `active`, `logo`) VALUES
(26, 'Homely', 'homely@gmail.com', 'The great taste of moms kitchen at your doorstep in your city', 85, 0, 'images/logo/berries-granola.jpg'),
(27, 'Burger Badshah', 'bbad@gmail.com', 'The burger you know you want and we know how to make it.', 86, 0, 'images/logo/hamburger-and-fries.jpg'),
(28, 'The Best Pizzeria', 'tbp@gmail.com', '\r\nTheres nothing cookie-cutter about Pizza Hut. Not our pizzas. Not our people. And definitely not the way we live life. Around here we dont settle for anything less than food were proud to serve And we do not just clock in Not when we can also become our best make friends and have fun while we are at it We are the pizza company that lives life unboxed', 88, 0, 'images/logo/games-and-pizza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(50) NOT NULL,
  `expiry` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `expiry`, `user_id`) VALUES
('5e1e25ead14f1', '1579040090857', 72);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(255) NOT NULL,
  `food_pref` varchar(255) DEFAULT NULL,
  `phone_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `food_pref`, `phone_no`) VALUES
(72, 'Admin', 'admin@foodshala.com', 'seJyplgzLbpvk', 'Admin', 'NULL', '7539518520'),
(85, 'Homely', 'homely@gmail.com', 'seXmbywSMvYBw', 'Restaurent', NULL, '9123456123'),
(86, 'Burger Badshah', 'bbad@gmail.com', 'seXmbywSMvYBw', 'Restaurent', NULL, '08288949255'),
(88, 'The Best Pizzeria', 'tbp@gmail.com', 'seXmbywSMvYBw', 'Restaurent', NULL, '9123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
