-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hospital
CREATE DATABASE IF NOT EXISTS `hospital` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hospital`;

-- Dumping structure for table hospital.appointments
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `reason` text,
  `status` varchar(30) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.appointments: ~2 rows (approximately)
DELETE FROM `appointments`;
INSERT INTO `appointments` (`id`, `patient_name`, `doctor_name`, `department`, `appointment_date`, `appointment_time`, `reason`, `status`) VALUES
	(1, 'shalu', 'manojh', 'Neurology', '2026-10-22', '16:53:00', 'hhhhhhhhhh', 'pending'),
	(2, 'shalu', 'manojh', 'Dental', '2026-10-24', '04:53:00', 'ddddd', 'pending');

-- Dumping structure for table hospital.doctor_schedule
CREATE TABLE IF NOT EXISTS `doctor_schedule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `available_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.doctor_schedule: ~0 rows (approximately)
DELETE FROM `doctor_schedule`;
INSERT INTO `doctor_schedule` (`id`, `doctor_name`, `department`, `available_date`, `start_time`, `end_time`, `status`) VALUES
	(1, 'manojh', 'Neurology', '2026-10-23', '10:46:00', '11:50:00', 'Available');

-- Dumping structure for table hospital.medicines
CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(20,6) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.medicines: ~0 rows (approximately)
DELETE FROM `medicines`;
INSERT INTO `medicines` (`id`, `medicine_name`, `category`, `quantity`, `price`, `expiry_date`) VALUES
	(1, 'pan', 'tablet', 3, 245.000000, '2026-10-07');

-- Dumping structure for table hospital.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.patients: ~0 rows (approximately)
DELETE FROM `patients`;
INSERT INTO `patients` (`id`, `name`, `age`, `gender`, `phone`, `address`) VALUES
	(1, 'shalu', 25, 'Female', '0764534243', 'jaffna');

-- Dumping structure for table hospital.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT 'NOT NULL',
  `email` varchar(150) DEFAULT ' UNIQUE NOT NULL',
  `password` varchar(255) DEFAULT ' NOT NULL',
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.user: ~2 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
	(1, 'Admin', 'manojh@gmail.com', '$2y$10$24NxdbmokkmNJaYfLM1Ah.88K6XDhQ9GPpX.o3SNbE.ed.OnJ9z0K', 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
