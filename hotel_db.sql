-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 04:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `name`, `email`, `create_date`) VALUES
(1, 'admin', '$2y$10$k6OFMw6L5KzMQkt7oFAmg.RTGu4kK4OAryuAv84A9dEZZJ1Mnjrcu', 'John Doe', 'first1@gbail.com', '2024-03-04'),
(2, 'admin1', '$2y$10$n.rj6mOfLZ.0nJkJ8/YhSevX8H0F9hGJoWaf/1xVUEYOjDZrzxFwG', 'Fname Lname', 'Fnamelname11@notmail.com', '2024-03-01'),
(3, 'ash90_2000', '$2y$10$/BJNRy5fnhzo39P980HNq.C3UJAWEhy8YhVHos04RPCl/L8p1W91m', 'Ash M', 'ash890@ryto.com', '2024-03-09'),
(4, 'test_name12', '$2y$10$DF7khQaxSEHktubU2kUoQOj1ZOZzjHTKEOqg1qTP1WxGvjDtFDZvC', 'test name', 'testname456@kagle.com', '2024-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `last_name`, `first_name`, `address`, `phone_number`, `email`) VALUES
(3, 'jangam', 'bhargav', 'newark', 8624056618, 'tchaitanya@gmail.com'),
(4, 'c', 'c', 'Dno. 20-659-9/1, 3rd Street rtc colony', 7013828227, 'tchaitanya.701@gmail.com'),
(5, 'ch', 'c', 'c', 7013828227, 'tchait@gmail.com'),
(6, 'ChaitanyaBhargav', 'T.J.', 'Dno. 20-659-9/1, 3rd Street rtc colony', 7013828227, 'tchaitanya.701.jb@gmail.com'),
(7, 'Chaitanya', 'T.', 'Dno. 20-659-9/1, 3rd Street rtc colony', 7013828227, 'tchaitanya.701asdsa@gmail.com'),
(8, 'Chaitanya', 'T.', 'Dno. 20-659-9/1, 3rd Street rtc colony', 7013828227, 'tchaitanya.70231321@gmail.com'),
(9, 'Chaitanya', 'T.', 'Dno. 20-659-9/1, 3rd Street rtc colony', 7013828227, 'tchaitanya.701_327@gmail.com'),
(10, '', '', '', 0, ''),
(11, 'Chaitanya', 'T.', 'Dno. 20-659-9/1, 3rd Street rtc colony', 7013828227, 'ya.701@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(10) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `confirmation_status` tinyint(1) NOT NULL,
  `total_cost` int(25) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `num_adult` int(10) NOT NULL,
  `num_child` int(10) NOT NULL,
  `num_rooms` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `check_in`, `check_out`, `confirmation_status`, `total_cost`, `customer_id`, `room_id`, `num_adult`, `num_child`, `num_rooms`) VALUES
(110001, '2024-03-10 23:28:06', '2024-03-12 18:28:06', 0, 398, 3, 4, 0, 0, 0),
(110002, '2024-03-11 00:00:00', '2024-03-12 00:00:00', 0, 420, 9, 2, 1, 0, 1),
(110003, '2024-03-11 00:00:00', '2024-03-12 00:00:00', 0, 420, 10, 2, 1, 0, 1),
(110004, '2024-03-11 00:00:00', '2024-03-12 00:00:00', 1, 420, 11, 2, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_type` varchar(25) NOT NULL,
  `cost` int(25) NOT NULL,
  `available_quantity` int(11) NOT NULL,
  `accomodates_people` varchar(255) NOT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `cost`, `available_quantity`, `accomodates_people`, `description`, `image_url`, `create_date`) VALUES
(1, 'Single Room', 200, 50, '2', 'Step into a world of comfort and serenity in our Single Room at The Velvet Rose. Whether you\'re traveling solo for business or leisure, this cozy haven offers everything you need for a peaceful retreat. Relax in style amidst modern amenities and chic decor, ensuring a memorable stay tailored just for you.', 'room2.jpg', NULL),
(2, 'Deluxe Room', 350, 29, '4', 'Immerse yourself in luxury and sophistication in our Deluxe Room at The Velvet Rose. From the moment you enter, you\'ll be greeted by a sense of opulence and refinement. Indulge in spacious elegance with plush furnishings, lavish amenities, and panoramic views that create an ambiance of pure indulgence.', 'room3.jpg', NULL),
(3, 'Suite Room', 650, 10, '6', 'Experience the pinnacle of luxury living in our Suites at The Velvet Rose. Perfectly blending opulent design with unparalleled comfort, each suite is a sanctuary of refined elegance. Enjoy expansive living spaces, sumptuous bedding, and bespoke touches that cater to your every desire, promising an unforgettable stay filled with luxury and indulgence.', 'room1.jpg', NULL),
(4, 'Executive Room', 1000, 5, '6', 'Elevate your stay to new heights of sophistication in our Executive Rooms at The Velvet Rose. Designed for the modern traveler who appreciates the finer things in life, these rooms exude style and comfort at every turn. With thoughtful amenities and personalized service, our Executive Rooms offer a refined retreat where luxury meets functionality, ensuring an unforgettable experience for discerning guests.', 'room4.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roomlist`
--

CREATE TABLE `roomlist` (
  `room_no` int(5) NOT NULL,
  `room_type` varchar(25) NOT NULL,
  `create_date` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomlist`
--

INSERT INTO `roomlist` (`room_no`, `room_type`, `create_date`, `status`) VALUES
(101, 'Single Room', '2024-03-09', 'Available'),
(201, 'Deluxe Room', '2024-03-09', 'Available'),
(301, 'Suite Room', '2024-03-09', 'Available'),
(503, 'Single Room', '2024-03-09', 'Available'),
(504, 'Single Room', '2024-03-09', 'Available'),
(508, 'Suite Room', '2024-03-09', 'Available'),
(509, 'Single Room', '2024-03-11', 'Available'),
(601, 'Deluxe Room', '2024-03-09', 'Available'),
(701, 'Deluxe Room', '2024-03-09', 'Available'),
(801, 'Single Room', '2024-03-09', 'Available'),
(834, 'Deluxe Room', '2024-03-09', 'Available'),
(905, 'Executive Room', '2024-03-09', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `roomlist`
--
ALTER TABLE `roomlist`
  ADD UNIQUE KEY `room_no` (`room_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110005;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
