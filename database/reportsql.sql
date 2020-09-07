-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for report
DROP DATABASE IF EXISTS `report`;
CREATE DATABASE IF NOT EXISTS `report` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `report`;

-- Dumping structure for table report.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `level` int(1) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table report.user: ~7 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `username`, `password`, `status`, `level`, `gender`, `age`, `address`, `occupation`) VALUES
	(0, 'admin', 'admin', 'admin', 'active', 0, 'unknown', 0, '-', 'manager'),
	(2, 'muhammad ali bin ahmad safuan', 'ali_safuan', 'aaa', 'active', 1, 'male', 31, 'jalan gajah, kelantan', 'kerani'),
	(11, 'syafiq samsudin bin fazali', 'samsudin', 'syafiq', 'active', 1, 'male', 36, 'kuala lumpur', 'pegawai'),
	(15, 'fariz haikal bin ghazali', 'farizghazali', 'fariz', 'active', 1, 'male', 42, 'pahang', 'driver'),
	(16, 'muhamed ahmad bin haikal mail', 'ahmadmail', 'mail', 'active', 1, 'male', 39, 'terengganu', 'driver'),
	(19, 'sarah iman binti razali', 'sarah', 'iman', 'active', 1, 'female', 21, 'putrajaya', 'assisstance');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
