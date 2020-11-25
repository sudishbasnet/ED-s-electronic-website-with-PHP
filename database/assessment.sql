-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 07:23 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `uName` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `uName`, `fName`, `phone`, `mail`, `location`, `password`) VALUES
(1, 'admin', 'admin', 1234567890, 'admin@edelectronic.com', 'Nepal,Kathmandu 4', '$2y$10$pKQgFWrnIokUqSzGGSVmq.FrxIAlR2nnyCCoiy7AD3ZRMjfUNyOPO');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `type`) VALUES
(1, 'tv'),
(2, 'computer'),
(3, 'phone'),
(4, 'game');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `date`, `p_id`, `user_id`, `status`) VALUES
(81, '2019-01-13 12:30:06', 31, 6, 'shipped'),
(82, '2019-01-13 12:30:06', 25, 6, 'shipped');

-- --------------------------------------------------------

--
-- Table structure for table `featureproduct`
--

CREATE TABLE `featureproduct` (
  `f_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featureproduct`
--

INSERT INTO `featureproduct` (`f_id`, `p_id`) VALUES
(24, 23),
(23, 29);

-- --------------------------------------------------------

--
-- Table structure for table `manage_reviews`
--

CREATE TABLE `manage_reviews` (
  `m_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_reviews`
--

INSERT INTO `manage_reviews` (`m_id`, `r_id`) VALUES
(1, 8),
(2, 9),
(4, 10),
(5, 11),
(6, 11),
(7, 11),
(8, 11),
(9, 11),
(10, 11),
(11, 11),
(12, 11),
(13, 11),
(14, 12),
(15, 13),
(16, 18);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `n_id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `p_details` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `name`, `c_id`, `admin_id`, `img`, `p_details`, `price`, `date`) VALUES
(23, 'Dell xps 15', 2, 1, 'laptop.jpg', 'It is the just introduced laptop by the dell company with the features of best core and graphics with LED touch.\r\n\r\nIt comes with the charger which is renowned as the fastest UTP chargers. ', 100099, '2019-01-07 15:33:02'),
(25, 'Samsung LED tv', 1, 1, 'tv.jpg', 'Best tv with the feature of monitor for playing games comes with ultra sound technology with best graphics .\r\n\r\nJust manufactured from the irland with the topmost mechanism.', 50000, '2019-01-07 15:33:02'),
(26, 'LG tv', 1, 1, 'tv.jpg', 'best product of the year with enough functions and wildcard replacement of old features over willing newest.\r\n\r\nProduct with reasonable price and ultra sound feature. ', 40000, '2019-01-07 15:33:02'),
(27, 'Iphone 8 plus', 3, 2, 'iphone.jpg', 'Just now released with the best features as known of waterproof grozilla glass and ultra thin size with compact battery life.\r\n\r\nComes in different variety of memory card with 1 year replacement guarantee. ', 80000, '2019-01-07 15:33:02'),
(28, 'iphone 8', 3, 2, 'iphone.jpg', 'Just now released with the best features as known of waterproof grozilla glass and ultra thin size with compact battery life.\r\n\r\nComes in different variety of memory card with 1 year replacement guarantee. ', 60099, '2019-01-08 15:33:02'),
(29, 'apple watch', 4, 1, 'linkedin.png', 'This is the newest product', 10000, '2019-01-12 06:01:29'),
(30, 'Iphone X', 3, 1, 'youtube.png', 'It is the latest iphone in the market with a great specification enhancing latest technology', 130000, '2019-01-13 11:32:33'),
(31, 'iphone 7', 3, 1, 'iphone.jpg', 'it is the good iphone model', 70000, '2019-01-13 11:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rate_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rate_id`, `rate`, `p_id`, `user_id`) VALUES
(3, 5, 29, 1),
(8, 5, 27, 1),
(21, 5, 23, 1),
(22, 5, 26, 7),
(23, 5, 27, 7),
(24, 5, 1, 2),
(25, 5, 1, 2),
(26, 5, 1, 2),
(27, 5, 1, 2),
(28, 5, 1, 2),
(29, 5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `r_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`r_id`, `p_id`, `user_id`, `review`, `date`) VALUES
(8, 23, 2, 'i like this product.\r\nReally this is the best product i have ever got in my life with the awesome features and the system power. thumbs up ', '2019-01-06 13:53:14'),
(9, 28, 6, 'I have been using this product since last weak when \r\ni bought from your shop it\'s very good and reliable. \r\n                                     Happy as a customer\r\n\r\n\r\n\r\n\r\n', '2019-01-06 14:54:17'),
(10, 26, 3, 'The best product in market yet with the functionality of robotics feeling as compare to old products in market.', '2019-01-07 07:23:39'),
(11, 25, 2, 'Relatively cheap with good features.\r\n                                   Thank you providing such products in this city.', '2019-01-07 08:17:58'),
(12, 28, 1, 'Really it is the best product till now and will be forever. Thank you Ed\'s electronics for this wonderful experience.', '2019-01-09 12:57:15'),
(13, 23, 1, 'I used to use old kinda laptops with low graphics and memory and with non portable accessories ,Thank you for uplifting my system.', '2019-01-09 12:58:35'),
(18, 30, 2, 'I like this product very much thank you for being there.', '2019-01-13 11:50:29'),
(19, 23, 2, 'I like this product', '2019-01-13 12:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `uName` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `uName`, `fName`, `mail`, `phone`, `location`, `password`, `notice`) VALUES
(1, 'ram1', 'Ram Hari', 'ramhari@email.com', '012275546', 'nepal,lalitpurr', 'ram1', NULL),
(2, 'sudish', 'sudish basnet', 'sudishbasnet@gmail.com', '+977 9860836906', 'kathmandu,new baneshwor 5', '$2y$10$to7gSoqSqn8lYj.Qc7.Xp.e9RTTVIRhViVcBIJZvVGPuXgVA7RU5u', 1),
(3, 'sandip', 'sandip subba', 'sandipsubba@gmail.com', '9811551227', 'kathmandu,jorpati', '$2y$10$MURr99i4EHr2YKzac6pOd.GjsZJfza5GDnhtcyFZio0mW39PgkXCa', 1),
(4, 'nikhil', 'nikhil pradhan', 'nikhilpunk@gmail.com', '9818437871', 'Kathmandu,old baneshwor', '$2y$10$.YIkJe6OnDh7afa/oZXfqullQfjI7Cnn5qSzBnZ8FvustGmTSJDM.', NULL),
(5, 'swarnim', 'swarnim rimal', 'cutegirl123@gmail.com', '078545271', 'kathmandu,tinkune', '$2y$10$.KmnjIogGLvhk0xiPFwem.UitT7RCA93yO2DJmc6PRMNwNx6briAC', NULL),
(6, 'sneha', 'sneha gauchan', 'gauchan25@gmail.com', '078545288', 'lalitpur,suncity', '$2y$10$ZrxSYWq/9L.QSVW1JGQsWuyNCBMYIEJvgdAVOhl0w3Diu0q7n3Nbm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `featureproduct`
--
ALTER TABLE `featureproduct`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `manage_reviews`
--
ALTER TABLE `manage_reviews`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `featureproduct`
--
ALTER TABLE `featureproduct`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `manage_reviews`
--
ALTER TABLE `manage_reviews`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`);

--
-- Constraints for table `featureproduct`
--
ALTER TABLE `featureproduct`
  ADD CONSTRAINT `featureproduct_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`),
  ADD CONSTRAINT `featureproduct_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`);

--
-- Constraints for table `manage_reviews`
--
ALTER TABLE `manage_reviews`
  ADD CONSTRAINT `manage_reviews_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `reviews` (`r_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`c_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
