-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 02:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assoc_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'olivernjeck@gmail.com', 'heraldic'),
(3, 'sampahdavid@gmail.com', 'heraldic1'),
(4, 'Zennitoliver@gmail.com', 'heraldic2');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `message`, `replies`) VALUES
(1, 'Hi|hello|hey', 'Hello there!'),
(2, 'Who are your donors?|How kind I become a donor?', 'Please find information about donations on our about page and contact us using the details in the footer for more information.'),
(3, 'who is the founder of CharityLIfe organization?|who is the founder of your organization?', 'Patrick Mulomba'),
(4, 'What is the total number of refugees you currently have in your camp?|how many refugees do you currently have?', 'We have a total of 500 refugees from over 15 countries.'),
(5, 'which country do refugees mostly come from?', 'The top represented countries are Nigeria and Chad'),
(6, 'How can I become a refugee in your camp?', 'We usually go to camps run by the government and randomly select a particular number to take care of them.\r\nwe also accept a few who come with valid concerns.'),
(7, 'How do you prevent sexual abuse in your organization?', 'There are structures in our organization to take care of these issues and we enforce them strongly.'),
(8, 'where is your office located?', 'We have two offices in Cameroon. One in Maroua and the Other in Bertua.'),
(9, 'How can I become an employee at CharityLife?| Are there job openings? ', 'currently, there are no openings. kindly check back in the future for updates.');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `Pname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `origin` enum('Bought','Donated') NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Pname`, `date`, `origin`, `quantity`) VALUES
(1, 'Bread', '2021-12-17', 'Donated', 10),
(2, 'Garri ', '2021-12-10', 'Donated', 12),
(3, 'Banana', '2021-12-10', 'Bought', 100),
(4, 'oranges', '2022-01-07', 'Bought', 100),
(5, 'water melon', '2021-11-30', 'Bought', 23),
(6, 'Laptops', '2025-12-10', 'Bought', 100),
(7, 'chocolate', '2021-12-24', 'Bought', 50),
(8, 'dresses', '2022-01-08', 'Donated', 100),
(9, 'Milk', '2021-12-24', 'Donated', 35);

-- --------------------------------------------------------

--
-- Table structure for table `refugee`
--

CREATE TABLE `refugee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `age` varchar(20) NOT NULL,
  `education` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refugee`
--

INSERT INTO `refugee` (`id`, `name`, `country`, `age`, `education`, `contact`, `gender`) VALUES
(2, 'Karl Lemfon ', 'CAMEROON', '20 years', 'university degree', '0229898774', 'Male'),
(4, 'Ngong Oliver ', 'Nigeria', '22 years ', 'High school Diploma', '022987654', 'Male'),
(5, 'Jude watimongo', 'Rwanda', '22 years', 'University', '02200987422', 'Male'),
(6, 'Ngong Carlson', 'Cameroon', '25 years', 'College degree', '02234567898', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refugee`
--
ALTER TABLE `refugee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `refugee`
--
ALTER TABLE `refugee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
