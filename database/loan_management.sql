-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `loans`;
CREATE TABLE `loans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tenure` int NOT NULL,
  `purpose` text NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `loans` (`id`, `user_id`, `amount`, `tenure`, `purpose`, `status`, `created_at`) VALUES
(1,	2,	100.00,	2,	'renovation',	'rejected',	'2025-03-30 09:30:12'),
(2,	2,	7.00,	1000,	'renovation',	'approved',	'2025-03-30 09:30:34'),
(3,	2,	100.00,	3,	'sdfsdf',	'rejected',	'2025-03-30 13:57:00'),
(4,	2,	1000.00,	4,	'renovation',	'approved',	'2025-03-30 14:27:24');

DROP TABLE IF EXISTS `repayments`;
CREATE TABLE `repayments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `loan_id` int NOT NULL,
  `user_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Completed') DEFAULT 'Pending',
  PRIMARY KEY (`id`),
  KEY `loan_id` (`loan_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `repayments_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `repayments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `repayments` (`id`, `loan_id`, `user_id`, `amount`, `payment_date`, `status`) VALUES
(1,	2,	2,	111.00,	'2025-03-30 20:20:40',	'Completed'),
(2,	2,	2,	800.00,	'2025-03-30 20:36:47',	'Completed'),
(3,	4,	2,	2000.00,	'2025-03-30 20:36:57',	'Completed');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1,	'Admin',	'admin@gmail.com',	'$2y$10$6RJuH1L1Tv0K8jAqqsbm7.PPBg8.92nMHMdy6tH81QYd61is5hIAG',	'admin',	'2025-03-30 18:34:35'),
(2,	'Anupam Singh',	'anupam@gmail.com',	'$2y$10$6RJuH1L1Tv0K8jAqqsbm7.PPBg8.92nMHMdy6tH81QYd61is5hIAG',	'customer',	'2025-03-30 14:50:32');

-- 2025-03-30 20:58:32
