-- Adminer 4.8.1 MySQL 8.0.32-0ubuntu0.20.04.2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(12,4) NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product` (`id`, `product_name`, `price`, `qty`) VALUES
(1,	'Test Laptop',	500.0000,	1000),
(2,	'Test Mobile ',	50.0000,	1000),
(3,	'Test Mouse',	10.0000,	1000);

DROP TABLE IF EXISTS `quote`;
CREATE TABLE `quote` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `price` decimal(12,4) NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `items_qty` int NOT NULL,
  `total` decimal(20,4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `quote` (`id`, `item_id`, `price`, `is_active`, `items_qty`, `total`) VALUES
(1,	1,	234.2340,	1,	0,	NULL),
(2,	1,	234.2340,	1,	0,	NULL),
(3,	1,	234.2340,	1,	1,	NULL),
(4,	1,	234.2340,	1,	1,	234.2340),
(5,	1,	234.2340,	1,	1,	234.2340),
(6,	1,	234.2340,	1,	5,	1171.1700),
(7,	1,	234.2340,	1,	5,	1171.1700),
(8,	1,	234.2340,	1,	5,	1171.1700),
(9,	1,	234.2340,	1,	5,	1171.1700),
(10,	1,	234.2340,	1,	5,	1171.1700),
(11,	1,	234.2340,	1,	5,	1171.1700),
(12,	1,	2134.0000,	1,	2,	4268.0000),
(13,	1,	2134.0000,	1,	2,	4268.0000),
(14,	1,	2134.0000,	1,	2,	4268.0000),
(15,	1,	2134.0000,	1,	2,	4268.0000),
(16,	1,	2134.0000,	1,	2,	4268.0000),
(17,	1,	2134.0000,	1,	2,	4268.0000),
(18,	1,	2134.0000,	1,	2,	4268.0000),
(19,	1,	2134.0000,	1,	2,	4268.0000),
(20,	1,	2134.0000,	1,	2,	4268.0000),
(21,	1,	2134.0000,	1,	2,	4268.0000),
(22,	2,	50.0000,	1,	4,	200.0000),
(23,	3,	10.0000,	1,	3,	30.0000),
(24,	1,	500.0000,	1,	1,	500.0000),
(25,	1,	500.0000,	1,	5,	2500.0000),
(26,	1,	500.0000,	1,	1,	500.0000),
(27,	1,	500.0000,	1,	1,	500.0000),
(28,	1,	500.0000,	1,	1,	500.0000),
(29,	1,	500.0000,	1,	1,	500.0000),
(30,	1,	500.0000,	1,	1,	500.0000),
(31,	1,	500.0000,	1,	1,	500.0000),
(32,	1,	500.0000,	1,	1,	500.0000),
(33,	1,	500.0000,	1,	1,	500.0000),
(34,	1,	500.0000,	1,	1,	500.0000),
(35,	1,	500.0000,	1,	1,	500.0000),
(36,	1,	500.0000,	1,	1,	500.0000),
(37,	1,	500.0000,	1,	1,	500.0000),
(38,	1,	500.0000,	1,	2,	1000.0000);

-- 2023-03-03 15:53:17
