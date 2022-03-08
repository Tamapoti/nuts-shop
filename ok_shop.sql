-- Adminer 4.8.1 MySQL 5.7.28 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `login`, `password`) VALUES
(1,	'熊木 和夫',	'東京都新宿区西新宿2-8-1',	'nats77@gmail.jp',	'kumaki',	'BearTree1'),
(10,	' 猫田 重蔵',	'静岡県静岡市葵区追手町9-6',	'',	'nekota',	'CatRiceField10'),
(13,	'佐藤 熊吉',	'青森県青森市くま',	'qwer123@gmal.com',	'kumama',	'Kumama88'),
(15,	'犬山 健',	'滋賀県犬山市',	'onaka@gmail.com',	'poti',	'$2y$10$Npq2T7FjuLStxppm6YWiXefRIfnir3PR10InbSJI/v1w2nReSKZSm');

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `favorite` (`customer_id`, `product_id`) VALUES
(1,	1),
(13,	1),
(15,	1),
(1,	2),
(10,	3),
(10,	4),
(13,	4),
(10,	5),
(1,	6),
(13,	6),
(10,	9);

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1,	'松の実',	700),
(2,	'くるみ',	270),
(3,	'ひまわりの種',	210),
(4,	'アーモンド',	220),
(5,	'カシューナッツ',	250),
(6,	'ジャイアントコーン',	180),
(7,	'ピスタチオ',	310),
(8,	'マカダミアナッツ',	600),
(9,	'かぼちゃの種',	180),
(10,	'ピーナッツ',	150),
(11,	'クコの実',	400);

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase` (`id`, `customer_id`) VALUES
(6,	1),
(1,	10),
(2,	10),
(3,	10),
(4,	10),
(5,	10);

DROP TABLE IF EXISTS `purchase_detail`;
CREATE TABLE `purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase_detail` (`purchase_id`, `product_id`, `count`) VALUES
(1,	1,	4),
(5,	4,	1),
(6,	1,	1),
(6,	8,	1);

-- 2022-02-21 05:06:50
