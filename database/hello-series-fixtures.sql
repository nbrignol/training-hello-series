# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.7.25)
# Base de données: hello_series
# Temps de génération: 2019-09-24 09:56:00 +0000
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

LOCK TABLES `show` WRITE;
/*!40000 ALTER TABLE `show` DISABLE KEYS */;

INSERT INTO `show` (`id`, `label`)
VALUES
	(1,'Le trône de fer'),
	(2,'Brooklyn 99'),
	(3,'IT Crowd'),
	(4,'The Americans'),
	(5,'La servante écarlate'),
	(6,'Black Mirror'),
	(7,'Altered Carbon'),
	(8,'Monthy Python\'s Flying circus');

/*!40000 ALTER TABLE `show` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table show_tag
# ------------------------------------------------------------

LOCK TABLES `show_tag` WRITE;
/*!40000 ALTER TABLE `show_tag` DISABLE KEYS */;

INSERT INTO `show_tag` (`id_tag`, `id_show`)
VALUES
	(2,1),
	(3,2),
	(6,2),
	(6,3),
	(3,4),
	(7,5),
	(7,6),
	(3,7),
	(4,7),
	(7,7),
	(1,8),
	(6,8);

/*!40000 ALTER TABLE `show_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table show_user_note
# ------------------------------------------------------------

LOCK TABLES `show_user_note` WRITE;
/*!40000 ALTER TABLE `show_user_note` DISABLE KEYS */;

INSERT INTO `show_user_note` (`id_show`, `id_user`, `note`)
VALUES
	(1,1,5),
	(1,2,56),
	(2,1,3),
	(3,1,2),
	(7,1,25);

/*!40000 ALTER TABLE `show_user_note` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table tag
# ------------------------------------------------------------

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;

INSERT INTO `tag` (`id`, `label`)
VALUES
	(1,'Classique'),
	(2,'Fantasy'),
	(3,'Policier'),
	(4,'Cyberpunk'),
	(5,'Magie'),
	(6,'Humour'),
	(7,'Anticipation');

/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table user
# ------------------------------------------------------------

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`)
VALUES
	(1,'Robert'),
	(2,'Boby'),
	(3,'Jaqueline');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
