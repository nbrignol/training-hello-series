# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.7.25)
# Base de données: hello_series
# Temps de génération: 2019-09-24 09:55:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table show
# ------------------------------------------------------------

CREATE TABLE `show` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table show_tag
# ------------------------------------------------------------

CREATE TABLE `show_tag` (
  `id_tag` int(11) unsigned NOT NULL,
  `id_show` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_tag`,`id_show`),
  KEY `id_show` (`id_show`),
  CONSTRAINT `show_tag_ibfk_2` FOREIGN KEY (`id_show`) REFERENCES `show` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table show_user_note
# ------------------------------------------------------------

CREATE TABLE `show_user_note` (
  `id_show` int(11) unsigned NOT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `note` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_show`,`id_user`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `show_user_note_ibfk_1` FOREIGN KEY (`id_show`) REFERENCES `show` (`id`),
  CONSTRAINT `show_user_note_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table tag
# ------------------------------------------------------------

CREATE TABLE `tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table user
# ------------------------------------------------------------

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
