-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2020 at 12:22 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(44) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_date` datetime NOT NULL,
  `author_name` varchar(44) NOT NULL DEFAULT 'Anonymous',
  `caption_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_info`
--

CREATE TABLE `tbl_company_info` (
  `id` int(11) NOT NULL,
  `comp_name` varchar(55) NOT NULL,
  `comp_logo` varchar(1000) NOT NULL,
  `comp_contact` varchar(33) NOT NULL,
  `comp_email` varchar(33) NOT NULL,
  `comp_address` varchar(88) NOT NULL,
  `comp_city` varchar(44) NOT NULL,
  `comp_state` int(11) NOT NULL,
  `comp_pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_billing_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `promocode_applied_id` int(11) NOT NULL,
  `discount_amt` float NOT NULL,
  `total_amt_after_dis` float NOT NULL,
  `tax_amt` float NOT NULL,
  `final_invoice_amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `prod_parent_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `prod_available` tinyint(1) NOT NULL,
  `prod_launch_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES
(1, 0, 'Hosting', 'xyz.com', 1, '2020-12-10 00:00:00'),
(2, 1, 'Linux hosting', 'xyz.com', 1, '2020-12-10 00:00:00'),
(3, 1, 'Windows hosting', 'xyz.com', 1, '2020-12-10 00:00:00'),
(4, 1, 'CMS hosting', 'xyz.com', 1, '2020-12-10 00:00:00'),
(5, 1, 'Wordpress Hosting', 'xyz.com', 1, '2020-12-10 00:00:00'),
(6, 1, 'someone hosting', 'xyz.com', 1, '2020-12-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_description`
--

CREATE TABLE `tbl_product_description` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `mon_price` float NOT NULL,
  `annual_price` float NOT NULL,
  `sku` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` varchar(22) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `code` varchar(55) NOT NULL,
  `expiry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `activation_time` datetime NOT NULL,
  `tenure` char(1) NOT NULL,
  `expiry_time` datetime NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email_approved` tinyint(1) DEFAULT 0,
  `phone_approved` tinyint(1) DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL,
  `sign_up_date` datetime DEFAULT current_timestamp(),
  `password` varchar(100) NOT NULL,
  `security_question` varchar(100) DEFAULT NULL,
  `security_answer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES
(1, 'nikhilsyal7@gmail.com', 'nikhil', '7016100753', 0, 0, 1, 1, '2020-12-08 15:13:24', 'b59c67bf196a4758191e42f76670ceba', 'what is my nik name?', 'nikku'),
(6, 'nikhil@h.c', 'nikhil', '23323', 0, 0, 1, 0, '2020-12-08 16:14:11', 'b59c67bf196a4758191e42f76670ceba', 'what is your name', 'shyam'),
(8, 'nikhil@h.c', 'nmn', '23323', 0, 0, 0, 0, '2020-12-08 18:56:12', '698d51a19d8a121ce581499d7b701668', 'nickname', 'hddkjhaskjh'),
(9, 'nikhilsyal7@gmail.com', 'nmn', '7016100753', 0, 0, 0, 0, '2020-12-08 19:21:25', '73345b5f6427c1100d2f0b20e5b828da', '1', 'sd'),
(10, 'nikhilsyal7@gmail.com', 'nmn', '7016100475', 0, 0, 0, 0, '2020-12-08 19:23:42', '73345b5f6427c1100d2f0b20e5b828da', '1', 'hddkjhaskjh'),
(11, 'nikhilsyal7@gmail.com', 'nmn', '7016100475', 0, 0, 0, 0, '2020-12-08 19:24:40', '73345b5f6427c1100d2f0b20e5b828da', 'nickname', 'hddkjhaskjh'),
(12, 'fhjghj@fgf.gfgh', 'fjgyhj', '56546', 0, 0, 0, 0, '2020-12-09 11:52:30', '10229078f31bb101fdfbb40341d18025', 'Select a security question', 'fghdfh'),
(13, 'nikhilsy$$al.@gmail.com', 'dffg ', '8899000000', 0, 0, 0, 0, '2020-12-09 11:56:17', '10229078f31bb101fdfbb40341d18025', 'What is the name of your favourite childhood friend?', 'gfbdf'),
(14, 'dd@gmail.com', 'rrrr', '321312', 0, 0, 0, 0, '2020-12-09 13:42:19', 'af15a212713ee1219f2c1fb1d50142db', 'What was your childhood nickname?', 'qqq'),
(15, 'nikhilsyal7@gmail.com', 'nikhil', '7016100753', 0, 0, 0, 0, '2020-12-09 15:53:45', '102eb1ef188b1a24e1a3e2621298702a', 'What was your childhood nickname?', '12345'),
(16, 'nikhilsyal7@gmail.com', 'nihkil', '7016100753', 0, 0, 0, 0, '2020-12-09 15:54:55', '102eb1ef188b1a24e1a3e2621298702a', 'What was your childhood nickname?', '12345'),
(19, 'mp8888719@gmail.com', 'vfvcvc', '5799789789', 0, 0, 0, 0, '2020-12-09 18:42:51', '87b86ba9f0e2e06e88bb0f62cc72a7ec', 'What was your favourite place to visit as a child?', 'nik'),
(20, 'ashutoshchaturvedi.906@gmail.com', 'nihkil', '7016100475', 1, 0, 1, 0, '2020-12-09 19:45:45', '87b86ba9f0e2e06e88bb0f62cc72a7ec', 'What is the name of your favourite childhood friend?', 'fghdfh'),
(22, 'anuraktsachan@gmail.com', 'anurakt', '9807897899', 1, 0, 1, 0, '2020-12-10 10:29:06', '87b86ba9f0e2e06e88bb0f62cc72a7ec', 'What was your childhood nickname?', 'shyam'),
(24, 'abhinav1806yadav@gmail.com', 'abhinav', '7016100753', 0, 0, 0, 0, '2020-12-10 11:15:13', '5c9019ba3495c3d77253d4d579cde62e', 'What was your childhood nickname?', 'karia'),
(33, 'himanshuar8898@gmail.com', 'aaaa', '9956085028', 0, 0, 0, 0, '2020-12-10 12:17:12', '0e7517141fb53f21ee439b355b5a1d0a', 'What was your childhood nickname?', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_billing_add`
--

CREATE TABLE `tbl_user_billing_add` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_name` varchar(55) NOT NULL,
  `house_no` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` int(11) NOT NULL,
  `country` varchar(55) NOT NULL,
  `pincode` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_billing_add`
--
ALTER TABLE `tbl_user_billing_add`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_user_billing_add`
--
ALTER TABLE `tbl_user_billing_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
