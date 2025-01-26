CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `customers` (`id`, `name`, `email`) VALUES
(1,	'Diego Lucas Maia Neto',	'ian56@hotmail.com'),
(2,	'Rebeca Batista da Silva Jr.',	'hgarcia@jimenes.net'),
(3,	'Norma Abreu',	'mferreira@branco.net'),
(4,	'Rafaela Cervantes',	'jorge03@meireles.org'),
(5,	'Diego Pereira',	'dante.padilha@yahoo.com');
-- 2020-04-08 18:30:20


