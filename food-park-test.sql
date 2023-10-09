-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2023 at 05:16 PM
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
-- Database: `food-park-test`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `food_cat_view`
-- (See below for the actual view)
--
CREATE TABLE `food_cat_view` (
);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_owner` varchar(100) NOT NULL,
  `shop_manager` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user',
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `name`, `password`, `shop_name`, `shop_owner`, `shop_manager`, `contact`, `address`, `usertype`, `status`) VALUES
(9, 'zenen', '', 'e10adc3949ba59abbe56e057f20f883e', 'Pizza', 'Zenen Perlas', 'reio cruz', '0992392123', 'Quezon, Cabugao Ilocos Sur', 'admin', 'Active'),
(10, 'reio', 'Reio Benjar Cruz', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '09982782199', 'Quezon, Cabugao Ilocos Sur', 'user', ''),
(11, 'zenen1', 'Zenen Perlas', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '09967548971', 'Quezon, Cabugao Ilocos Sur', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `food` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `delivery_address` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `code`, `food`, `user_id`, `vendor_id`, `price`, `qty`, `total`, `order_date`, `delivery_address`, `status`, `payment`, `contact`) VALUES
(209, '202304-00002', 'BEEF PARES (SOLO)', 9, 7, '60.00', 1, '60', '2023-04-12', 'Sto. Domingo', 'Food is Ready', 'Cash', '09982782199'),
(210, '202304-02', 'BEEF PARES (SOLO)', 9, 7, '60.00', 1, '60', '2023-04-12', 'Quezon, Cabugao Ilocos Sur', 'Food is Ready', 'Cash on Delivery', '09982782199'),
(211, '202304-002', 'BEEF PARES (SOLO)', 12, 7, '60.00', 1, '60', '2023-04-12', 'Vigan, Ilocos Sur', 'Food is Ready', 'Cash', '09982782199'),
(222, '202304-9001', 'Empanada', 9, 3, '99.00', 1, '99', '2023-04-15', 'Quezon, Cabugao Ilocos Sur', 'Delivered', 'Cash', '09982782199'),
(223, '202304-12001', 'Empanada', 12, 3, '99.00', 1, '99', '2023-04-15', 'Vigan, Ilocos Sur', 'Order Accept', 'Cash', '09982782199'),
(224, '202305-9001', 'Special Chicken Sisig', 9, 3, '120.00', 1, '120', '2023-05-09', 'Quezon, Cabugao Ilocos Sur', 'Out for Delivery', 'Cash', '09982782199');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category` varchar(50) NOT NULL,
  `add_category` varchar(50) NOT NULL,
  `active` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `vendor_id`, `title`, `image_name`, `price`, `category`, `add_category`, `active`) VALUES
(85, 3, 'Empanada', 'Food_category_5081.jpg', '99', 'Appetizer', '', 'Yes'),
(90, 10, 'Beef Pares w/ Bagnet', 'Food_category_2731.jpg', '120', 'Main', 'Appetizer', 'Yes'),
(91, 11, 'Palabok Overload', 'Food_category_4112.jpg', '85', 'Appetizer', 'Main', 'Yes'),
(92, 12, 'Beef Ramen', 'Food_category_659.png', '65', 'Appetizer', '', 'Yes'),
(93, 12, 'Shrimp Tempura', 'Food_category_1248.png', '65', 'Appetizer', 'Main', 'Yes'),
(96, 13, '(1) Nachos (2) Milktea 750ml', 'Food_category_726.jpg', '299', 'Appetizer', '', 'Yes'),
(97, 13, 'Wintermelon', 'Food_category_1629.png', '89', 'Beverage', 'Dessert', 'Yes'),
(98, 13, 'Okinawa', 'Food_category_904.jpg', '89', 'Beverage', 'Dessert', 'Yes'),
(100, 15, 'No Bake Mac + Caramel Black Kutsinta', 'Food_category_417.png', '140', 'Appetizer', '', 'Yes'),
(101, 16, 'Beef Nagiri', 'Food_category_5250.png', '160', 'Appetizer', 'Japanese', 'Yes'),
(102, 16, 'Kani Salad Roll', 'Food_category_6892.png', '150', 'Appetizer', 'Japanese', 'Yes'),
(103, 10, 'BEEF PARES (SOLO)', 'Food_category_1226.jpg', '60', 'Main', 'Appetizer', 'Yes'),
(104, 3, 'Special Chicken Sisig', 'Food_category_5076.jpg', '120', 'Appetizer', 'Main', 'Yes'),
(105, 3, 'Special Pork Sisig with Rice', 'Food_category_1013.jpg', '110', 'Appetizer', 'Main', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `email`, `contact`) VALUES
(31, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'cruzreio12@yahoo.com', '09982782199');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `add_address` text NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`id`, `name`, `username`, `email`, `password`, `contact`, `address`, `add_address`, `usertype`) VALUES
(4, 'shaquille tabogga', '', 'shaq@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', '09957435881', '', '', ''),
(9, 'Reio Benjar Cruz', 'reio', '', '827ccb0eea8a706c4c34a16891f84e7b', '09982782199', 'Quezon, Cabugao Ilocos Sur', 'Sto. Domingo', 'user'),
(12, 'Zenen Perlas', 'zenen', 'zenen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '09982782199', 'Vigan, Ilocos Sur', 'Tamag', 'user'),
(13, 'shaquille tabogga', 'shaq', 'shaq@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0988213123', 'baclig', 'Tamag', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_items`
--

CREATE TABLE `user_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_items`
--

INSERT INTO `user_items` (`id`, `user_id`, `vendor_id`, `product_id`, `status`, `address`, `contact`) VALUES
(368, 12, 0, 85, 'Added to cart', 'Vigan, Ilocos Sur', '09982782199'),
(388, 9, 0, 104, 'Added to cart', 'Quezon, Cabugao Ilocos Sur', '09982782199');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_list`
--

CREATE TABLE `vendor_list` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_owner` varchar(255) NOT NULL,
  `shop_manager` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_list`
--

INSERT INTO `vendor_list` (`id`, `shop_name`, `shop_owner`, `shop_manager`, `contact`, `username`, `address`, `password`, `status`, `usertype`, `image_name`) VALUES
(3, 'Casa Emapanada', 'Reio Benjar Cruz', 'reio cruz', '09982782199', 'admin', 'Quezon, Cabugao Ilocos Sur', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'admin', 'ViganEmpanada294623717_425309129613118_6320450882979011868_n.jpg'),
(10, 'JKLC\'s Pares Food Hub', 'Aubrey Rondon', 'Joshdayne Tabula', '0992392123', 'JKLC', 'Tamag, Vigan', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'admin', 'JKLC64480e0db527e7.16397698.png'),
(11, 'MfoodiExpress', 'Rolando Cabasug Jr', 'Allen Castillo', '09967548971', 'MfoodiExpress', 'Vigan City, Ilocos Sur', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'admin', 'MfoodiExpress6448107bc8b842.56654279.png'),
(12, 'Micah\'s Food House', 'Micah Castillo', 'Lewis Salmasan', '0988213123', 'Micah', 'Cabalangegan Vigan City', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'admin', 'Micah644fdf490bfbf8.87999201.png'),
(13, 'MarDin Milktea Corner', 'Mardin Nicha', 'Jansen Silario', '09957435881', 'mardin', 'Cabalangegan Vigan City', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'admin', 'mardin644fe8f1a2b1a8.58091760.png'),
(15, 'Caramel Black Kustinta', 'Joana Marie A. Carpio', 'Jansen Silario', '09967548971', 'yashika', 'Vigan City, Ilocos Sur', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'admin', 'yashika64527f338d30c8.98210901.png'),
(16, 'Michaela Sushimi', 'Michaela Udarbe', 'Brenda Reton', '099231592823', 'michaela', 'Tamag, Vigan City', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'admin', 'michaela64528676391d78.61822254.png');

-- --------------------------------------------------------

--
-- Structure for view `food_cat_view`
--
DROP TABLE IF EXISTS `food_cat_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `food_cat_view`  AS SELECT `f`.`id` AS `food_id`, `f`.`title` AS `food_title`, `f`.`description` AS `description`, `f`.`price` AS `price`, `f`.`image_name` AS `f_image`, `f`.`category_id` AS `category_id`, `f`.`featured` AS `f_featured`, `f`.`active` AS `f_active`, `c`.`id` AS `cat_id`, `c`.`title` AS `cat_title`, `c`.`image_name` AS `c_image`, `c`.`featured` AS `c_featured`, `c`.`active` AS `c_active` FROM (`tbl_food` `f` join `tbl_category1` `c`) WHERE `f`.`category_id` = `c`.`id``id`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_items`
--
ALTER TABLE `user_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_list`
--
ALTER TABLE `vendor_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user2`
--
ALTER TABLE `user2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_items`
--
ALTER TABLE `user_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `vendor_list`
--
ALTER TABLE `vendor_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
