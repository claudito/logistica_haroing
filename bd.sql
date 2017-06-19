
CREATE DATABASE login;
USE login;


CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB


INSERT INTO `login` (`correo`, `pass`) VALUES
('pedro@hotmail.com', 'c6cc8094c2dc07b700ffcc36d64e2138');