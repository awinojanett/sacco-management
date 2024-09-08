-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 03:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saccodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `member_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `account_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`member_id`, `password`, `role`, `account_status`) VALUES
('2244', '$id_number', 'Member', 'Active'),
('2324', '$id_number', 'Member', ''),
('2372', '$id_number', 'Member', ''),
('3030', '$id_number', 'Member', 'Active'),
('3232', '$id_number', 'Member', ''),
('3294', '1234', 'Member', 'Active'),
('3463', '$id_number', 'Member', ''),
('4000', '$id_number', 'Member', 'Active'),
('4354', '$id_number', 'Member', ''),
('admin@gmail.com', 'admin', 'Admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `members_savings`
--

CREATE TABLE `members_savings` (
  `transaction_id` varchar(100) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `amount_paid` varchar(50) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members_savings`
--

INSERT INTO `members_savings` (`transaction_id`, `member_id`, `amount_paid`, `payment_mode`, `payment_date`, `status`) VALUES
('DHDJGDJH', '3030', '2500', 'Mpesa', '2023-07-01', 'Paid'),
('FHSJFHJEUY', '3294', '4500', 'Cash', '2023-07-01', 'Paid'),
('SFHJDJG865', '3294', '4000', 'Bank', '2023-07-01', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `member_information`
--

CREATE TABLE `member_information` (
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dissability` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `kra_pin` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `subcounty` varchar(100) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `parmanent_address` varchar(100) NOT NULL,
  `next_of_kin` varchar(100) NOT NULL,
  `spause_name` varchar(100) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `id_front` varchar(500) NOT NULL,
  `id_back` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_information`
--

INSERT INTO `member_information` (`first_name`, `middle_name`, `last_name`, `member_id`, `id_number`, `member_email`, `gender`, `joining_date`, `dissability`, `phone_number`, `dob`, `kra_pin`, `county`, `subcounty`, `ward`, `parmanent_address`, `next_of_kin`, `spause_name`, `profile_pic`, `id_front`, `id_back`) VALUES
('Laban', 'Yuteng', 'okelo', '2244', '554545', 'fred@gmail.com', 'Select Gender', '2023-07-05 21:00:00', 'No', '0724569982', '2023-07-10', '4754856', 'dkfdkgh', 'fhjfh', 'ehjfhjh', 'fyruy', 'wreuryet', 'wiruery', 'Frontpage.png', 'Frontpage.png', 'Frontpage.png'),
('Milka', 'Yuteng', 'wewr', '2324', '34376463746', 'fdhjfdhjfd@gmail.com', 'Male', '2023-07-11 21:00:00', 'Yes', '0724589982', '2023-07-12', 'etutyr', 'dkfdkgh', 'fhjfh', 'ehjfhjh', 'fyruy', 'wreuryet', 'wiruery', 'Frontpage.png', 'Frontpage.png', 'Frontpage.png'),
('dfhdj', 'rerer', 'rhejhrer', '2372', '33578465', 'fdhjfdhjfd@gmail.com', 'Male', '2023-07-11 21:00:00', 'Yes', 'fhfjgfjg', '2023-07-11', 'etutyr', 'dkfdkgh', 'fhjfh', 'ehjfhjh', 'fyruy', 'wreuryet', 'wiruery', 'Frontpage.png', 'Frontpage.png', 'Frontpage.png'),
('Nancy', 'Awiti', 'Owiti', '3030', '33994488', 'owiti@gmail.com', 'Female', '2023-06-27 21:00:00', 'No', '0722898873', '2000-06-28', 'A0012009348', 'Kakamega', 'Kakamega East', 'Kitewo', '70 Kombewa', 'Jamal Ochieng', 'Felix Owiti', 'IMG_20200515_092443.jpg', 'Screenshot 2021-12-28 192150.jpeg', 'Screenshot 2021-12-23 120034.jpeg'),
('dfdhj', 'eyeuty', 'eity', '3232', '33578465', 'fdhjfdhjfd@gmail.com', 'Male', '2023-07-11 21:00:00', 'Yes', 'fhfjgfjg', '2023-07-11', 'etutyr', 'dkfdkgh', 'fhjfh', 'ehjfhjh', 'fyruy', 'wreuryet', 'wiruery', 'Frontpage.png', 'Frontpage.png', 'Frontpage.png'),
('James', 'Ochieng', 'Okeyo', '3294', '3880999', 'okeyo@gmail.com', 'Male', '2023-06-24 16:40:45', 'No', '0717789800', '', 'A0122333M', 'Siaya', 'Ugenya', 'Kobila', '', 'William Oduol', 'Dorcas', '', '', ''),
('dfjdhfd', 'eyeuty', 'jdfhd', '3463', '647547567', 'fdhjfdhjfd@gmail.com', 'Male', '2023-07-11 21:00:00', 'Yes', '0724589982', '2023-07-19', 'etutyr', 'dkfdkgh', 'fhjfh', 'ehjfhjh', 'fyruy', 'wreuryet', 'wiruery', 'Frontpage.png', 'Frontpage.png', 'Frontpage.png'),
('Dorcas', 'Akinyi', 'Opiyo', '4000', '45647564', 'dorcus@gmail.com', 'Select Gender', '2023-06-15 21:00:00', 'No', '074667456', '2023-06-23', 'A0123389', 'Siaya', 'Bondo', 'Home', '34-Nyamomo', 'Omboto', 'Ojwang', 'Add student.jpg', 'Aggie 6.jpg', 'login.jpeg'),
('JKJH', 'IRYEUYT', 'WIRYE', '4354', '5948574', 'fred@gmail.com', 'Male', '2023-07-11 21:00:00', 'Yes', '0724589980', '2023-07-20', '434634635', 'dkfdkgh', 'fhjfh', 'ehjfhjh', 'fyruy', 'wreuryet', 'wiruery', 'Frontpage.png', 'Frontpage.png', 'Frontpage.png');

-- --------------------------------------------------------

--
-- Table structure for table `member_loan_sts`
--

CREATE TABLE `member_loan_sts` (
  `member_id` varchar(100) NOT NULL,
  `credit_status` varchar(100) NOT NULL,
  `qualified_amount` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_loan_sts`
--

INSERT INTO `member_loan_sts` (`member_id`, `credit_status`, `qualified_amount`, `rate`, `status`) VALUES
('3294', 'Good', '2000', '20%', 'Approved'),
('2244', 'Good', '20000', '20%', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `sacco_activities`
--

CREATE TABLE `sacco_activities` (
  `id` int(11) NOT NULL,
  `activity_name` text NOT NULL,
  `expected_activity` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sacco_activities`
--

INSERT INTO `sacco_activities` (`id`, `activity_name`, `expected_activity`, `start_date`, `end_date`, `status`) VALUES
(1003, 'jdfdfg', 'tyuwit', '2023-06-16', '2023-06-08', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `unique_id` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `ke_name` varchar(50) NOT NULL,
  `ke_number` varchar(50) NOT NULL,
  `cluster` varchar(50) NOT NULL,
  `sub_cluster` varchar(50) NOT NULL,
  `beneficiary_number` varchar(50) NOT NULL,
  `date_of_depature` varchar(50) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `permanent_address` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `home_county` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `current_residence` varchar(50) NOT NULL DEFAULT 'Long loan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`unique_id`, `title`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email_address`, `ke_name`, `ke_number`, `cluster`, `sub_cluster`, `beneficiary_number`, `date_of_depature`, `job_title`, `company`, `permanent_address`, `position`, `home_county`, `uname`, `password`, `image`, `current_residence`) VALUES
('1275987774', 'Mr.', 'Jane', 'Akelo', 'Ojwang', '0717798978', 'akelo@gmail.com', 'Odhuro', '99999', 'Kilifi-Ganze -Kaloleni', 'Bondo', '47389456375', '2023-06-14', 'Freelancer', 'Upwork', '43-Nyamonye', 'Freelancer', 'Embu', 'Akelo', '25f9e794323b453885f5181f1b624d0b', '1687619542+254 794 088622 20191209_204055.jpg', 'Nyamonye');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `members_savings`
--
ALTER TABLE `members_savings`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `member_information`
--
ALTER TABLE `member_information`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `sacco_activities`
--
ALTER TABLE `sacco_activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sacco_activities`
--
ALTER TABLE `sacco_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
