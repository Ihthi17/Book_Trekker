-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 08:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `a_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`a_id`, `author`) VALUES
(6, 'kelvin'),
(10, 'steve job'),
(15, 'peter'),
(16, 'kelvin'),
(25, 'peter'),
(29, 'steve job'),
(34, 'raj'),
(35, 'Jay Shetty');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `p_date` date NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `description`, `keyword`, `price`, `image`, `author`, `publisher`, `p_date`, `category_id`) VALUES
(41, 'THE-MICE-AND-THE-ELEPH-LEVEL-1', 'The mice are afraid of the elephants, but the elephant king helps them. what will the mice do when the elephants are afraid?', 'kids, kids story, childrens, children', '1000.00', 'Upload/READ-IT-YOURSELF---THE-MICE-AND-THE-ELEPH-LEVEL-1-0241361443.png', 'Narinda Dhami', 'Oxford University Press', '2011-09-08', 5),
(42, 'CHINAMAN', 'Ambitious, playful and strikingly original, \"Chinaman\" is a novel about cricket and Sri Lanka - and the story of modern day Sri Lanka through its most cherished sport. ', 'Novel', '1500.00', 'Upload/CHINAMAN-0143450441.png', 'Shehan Karunatilaka', 'Self-published', '2010-02-03', 3),
(44, '8 Rules of Love', 'Jay Shetty lays out specific, actionable steps to help you develop the skills to practice and nurture love better than ever before.', 'love, story', '4200.00', 'Upload/8-RULES-OF-LOVE-0008471665.png', 'Jay Shetty', '‎Simon & Schuster ', '2023-01-31', 6),
(45, 'Digital Image  Processing', 'Image processing is the process of transforming an image into a digital form and performing certain operations to get some useful information from it. The image processing system usually treats all images as 2D signals when applying certain predetermined signal processing methods..', 'Digital', '5000.00', 'Upload/DIGITAL-IMAGE-PROCESSING-2ED-9389811929.png', 'kelvin', '‎Simon & Schuster ', '2019-06-11', 7),
(46, 'Rail Way Children', 'this story centres on the lives of three children whose comfortable, middle-class existence ends when their father has to go away unexpectedly.', 'Kids', '850.00', 'Upload/Puffin-Cla-Railway-Children-0141321601.png', 'Edith Nesbit', 'Wells, Gardner, Darton', '1956-06-12', 5),
(47, 'Computer Programming for Bigginers', ' This book aims to capture the fundamentals of computer programming without tying the topic to any specific programming language.', 'Programming', '3700.00', 'Upload/61JHadrOJlL._AC_UF1000,1000_QL80_.jpg', 'Murali Chemuturi', 'Chapman and Hall/CRC', '2018-08-15', 32),
(52, 'The Lost Girl King', 'The Lost Girl King is a cleverly crafted Middle Grade fantasy adventure based on Irish mythology.', 'Novel', '7800.00', 'Upload/THE-LOST-GIRL-KING-1526608006.png', 'Catherine Doyle', 'Bloomsbury Publishing PLC', '2022-09-01', 3),
(53, 'THE-TOYOTA-WAY-2ED', 'With The Toyota Way, you have an inspiration and a model of how to set a direction, continuously improve and learn at all levels, continually \"flow\" value to satisfy customers, improve your leadership, and get quality right the first time.', 'Production', '4100.00', 'Upload/THE-TOYOTA-WAY-2ED-9354600468.png', 'Jeffrey Liker', '‎McGraw Hill; 2nd edition ', '2020-12-01', 35),
(54, 'ALL-THE-BROKEN-PLACES', 'Ninety-one-year-old Gretel Fernsby has lived in the same well-to-do mansion block in London for decades', 'History', '1750.00', 'Upload/ALL-THE-BROKEN-PLACES-0857528866.png', 'John Boyne', 'Historical Fiction', '2022-09-15', 8),
(55, 'Crown of Midnight', 'After a year of hard labor in the Salt Mines of Endovier, eighteen-year-old assassin Celaena Sardothien has won the king\'s contest to become the new royal assassin. Yet Celaena is far from loyal to the crown – a secret she hides from even her most intimate confidantes.', 'Novel', '1850.00', 'Upload/CROWN-OF-MIDNIGHT-1408834944.png', 'Sarah J. Maas', 'Bloomsbury Publishing', '2023-02-14', 3),
(56, 'The Assassins Blade', 'Assassin\'s Blade is a collection of novellas, served as a backstory to the Throne of Glass series. These novellas follows Celaena Sardothien\'s life, all the way up to the Salt Mines of Endovier. Celaena Sardothien was brought up in Rifthold, and trained to become Adarlan\'s Assassin.', 'Novel', '2300.00', 'Upload/THE-ASSASSINS-BLADE-1408851989.png', 'Sarah J. Maas', 'Bloomsbury Publishing', '2023-02-14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `categories`) VALUES
(1, 'js'),
(3, 'Novel'),
(5, 'kids'),
(6, 'love Story'),
(7, 'Digital'),
(8, 'History'),
(32, 'Programming'),
(35, 'Production');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `time`) VALUES
(2, 'rathnayaka', 'maneesha12@gmail.com', 'Order', 'I order book still not come', '2023-06-06 16:21:05'),
(5, 'Raju', 'raju12@gmail.com', 'Complain for deliverd product', 'I already orderd two book but Still not come\r\nplease check it', '2023-06-29 22:43:30'),
(6, '', '', '', '', '2023-07-03 09:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_id`, `user_id`, `total`, `address`, `phone`, `status`, `date`) VALUES
(72, '649ded96a53', 8, 5700, 'No:23 New Pandulugama Road Anuradhapura', 776950058, 1, '2023-06-30'),
(74, '649e922ab41', 7, 2000, 'Anuradhapura', 772563241, 2, '2023-06-30'),
(75, '649e96864e5', 7, 1500, 'Kekirawa', 772563241, 0, '2023-06-30'),
(77, '64a19926877', 10, 10100, 'No:55, masjidh Road Puttalam', 776950058, 2, '2023-07-02'),
(78, '64a2f9dd9e6', 10, 11750, 'NO:55, Masjidh Road Puttalam', 755665748, 0, '2023-07-03'),
(79, '64a5c1d190f', 7, 3000, 'ullukkapulam palavi', 785502952, 0, '2023-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `book_id`, `qty`, `total_amount`) VALUES
(79, '649ded96a53', 41, 2, 2000),
(80, '649ded96a53', 47, 1, 3700),
(83, '649e922ab41', 41, 2, 2000),
(84, '649e96864e5', 42, 1, 1500),
(88, '64a19926877', 56, 1, 2300),
(89, '64a19926877', 52, 1, 7800),
(90, '64a2f9dd9e6', 45, 2, 10000),
(91, '64a2f9dd9e6', 54, 1, 1750),
(92, '64a5c1d190f', 42, 2, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `rating`, `message`, `time`, `book_id`) VALUES
(8, 10, '3', ' This book very easy to read ', '2023-07-03 18:43:00', 54);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `c_pass` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `reset_token` varchar(50) DEFAULT NULL,
  `reset_tokenexpaire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `email`, `pass`, `c_pass`, `type`, `reset_token`, `reset_tokenexpaire`) VALUES
(1, 'Admin\r\n', 'admin@gmail.com', 'admin1', '', 'admin', NULL, NULL),
(7, 'testing', 'testing@gmail.com', 'testing1', 'testing1', 'user', NULL, NULL),
(8, 'Raju', 'raju12@gmail.com', 'raju12', 'raju12', 'user', NULL, NULL),
(10, 'Ihthisham', 'mohamedihthisham17@gmail.com', 'ihthi', 'ihthi', 'user', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `forignkey` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`user_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book` (`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `forignkey` FOREIGN KEY (`category_id`) REFERENCES `categories` (`c_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`b_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `book` FOREIGN KEY (`book_id`) REFERENCES `book` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
