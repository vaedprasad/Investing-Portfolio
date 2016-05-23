--
-- Database: `project2`
--

CREATE DATABASE IF NOT EXISTS `project2`;


--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `project2`.`users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1;

--
-- Dumping data for table `project2`.`users`
--

INSERT INTO `project2`.`users` (`id`, `username`, `hash`) VALUES(1, 'jharvard', '$1$50$RX3wnAMNrGIbgzbRYrxM1/');
