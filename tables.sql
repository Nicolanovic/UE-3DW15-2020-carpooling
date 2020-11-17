CREATE TABLE `users` (
  `id` int AUTO_INCREMENT NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');

CREATE TABLE `cars` (
  `id` int AUTO_INCREMENT NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `plaque` varchar(255) NOT NULL,
  `annee` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cars` (`id`, `marque`, `modele`, `couleur`, `plaque`, `annee`) VALUES
(1, 'Tesla', 'Model X', 'Noir', 'AA-123-AA', '2016-01-08'),
(2, 'Peugeot', '106', 'Jaune', 'AB-326-BA', '1984-04-03'),
(3, 'Fiat', 'Multipla', 'Violet', 'CA-432-AC', '2005-11-04');

CREATE TABLE `comments` (
  `id` int AUTO_INCREMENT NOT NULL,
  `id_annonce` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `id_annonce`, `firstname`, `lastname`, `email`, `phone`, `content`) VALUES
(1, 3, 'Nicolas', 'Seignette', 'nicolasseignette@gmail.com', '0612233445', 'Bonjour, je suis intéressé par votre annonce, merci de me recontacter par téléphone.'),
(2, 1, 'Pierre', 'Dupond', 'pierredupond@gmail.com', '0612454323', 'Bonjour, je suis intéressé par votre annonce, merci de me recontacter par mail.'),
(3, 2, 'Jean', 'Dujardin', 'jeandujardin@gmail.com', '0687765643', 'Bonjour, je suis intéressé par votre annonce.');