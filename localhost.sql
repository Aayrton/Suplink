-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 26 Février 2013 à 11:27
-- Version du serveur: 5.5.25a
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `144346Suplink`
--
CREATE DATABASE `144346Suplink` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `144346Suplink`;

-- --------------------------------------------------------

--
-- Structure de la table `stat`
--

CREATE TABLE IF NOT EXISTS `stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urlId` int(11) NOT NULL,
  `date` date NOT NULL,
  `url` varchar(255) NOT NULL,
  `ip` int(15) NOT NULL,
  `host` varchar(60) NOT NULL,
  `referer` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `stat`
--

INSERT INTO `stat` (`id`, `urlId`, `date`, `url`, `ip`, `host`, `referer`) VALUES
(34, 41, '2013-02-25', '/Suplink/decoder.php?decode=i0id', 1270, 'localhost', 'Direct'),
(57, 42, '2013-02-25', '/Suplink/decoder.php?decode=4vp4', 1270, 'localhost', 'Direct'),
(58, 42, '2013-02-25', '/Suplink/decoder.php?decode=4vp4', 1270, 'localhost', 'Direct'),
(59, 42, '2013-02-25', '/Suplink/decoder.php?decode=4vp4', 1270, 'localhost', 'Direct'),
(60, 42, '2013-02-25', '/Suplink/decoder.php?decode=4vp4', 1270, 'localhost', 'Direct'),
(61, 42, '2013-02-25', '/Suplink/decoder.php?decode=4vp4', 1270, 'localhost', 'Direct'),
(62, 42, '2013-02-25', '/Suplink/decoder.php?decode=4vp4', 1270, 'localhost', 'Direct'),
(63, 36, '2013-02-25', '/Suplink/decoder.php?decode=44uf', 1270, 'localhost', 'Direct'),
(64, 36, '2013-02-25', '/Suplink/decoder.php?decode=44uf', 1270, 'localhost', 'Direct'),
(65, 36, '2013-02-25', '/Suplink/decoder.php?decode=44uf', 1270, 'localhost', 'Direct'),
(66, 37, '2013-02-26', '/Suplink/decoder.php?decode=lsc9', 1270, 'localhost', 'http://www.facebook.com/'),
(68, 37, '2013-02-26', '/Suplink/decoder.php?decode=lsc9', 1270, 'localhost', 'http://www.facebook.com/l.php?u=http%3A%2F%2Flocalhost%2FSuplink%2Flsc9&h=oAQFs0rKq'),
(69, 37, '2013-02-26', '/Suplink/decoder.php?decode=lsc9', 1270, 'localhost', 'http://www.facebook.com/l.php?u=http%3A%2F%2Flocalhost%2FSuplink%2Flsc9&h=oAQFs0rKq');

-- --------------------------------------------------------

--
-- Structure de la table `url`
--

CREATE TABLE IF NOT EXISTS `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `shortened_url` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `clicks` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `url`
--

INSERT INTO `url` (`id`, `userId`, `name`, `url`, `shortened_url`, `date_created`, `clicks`, `state`) VALUES
(31, 13, 'Facebook', 'http://www.facebook.com/', 'ktrt', '2013-02-22', 8, 1),
(34, 4, 'Colorzilla', 'http://www.colorzilla.com/', 'li76', '2013-02-23', 1, 0),
(37, 2, 'Redbull', 'http://www.redbull.fr/', 'lsc9', '2013-02-25', 7, 1),
(40, 2, 'Twitter', 'http://www.twitter.com', 's0d5', '2013-02-25', 0, 1),
(41, 2, 'Free', 'http://www.free.fr/', 'i0id', '2013-02-25', 2, 1),
(42, 2, 'Facebook', 'http://www.facebook.com', '4vp4', '2013-02-25', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registration` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `date_registration`) VALUES
(2, 'ayrton@ayrton.fr', '5259b3fe5915a04a758767ec1c184782c8b60cb0', '2013-02-19'),
(3, 'zadzed', '3f8d1d38e12141e770e073f1cdcc399d660890ac', '2013-02-19'),
(4, 'lol@lol.fr', '403926033d001b5279df37cbbe5287b7c7c267fa', '2013-02-19'),
(5, 'loool@lol.fr', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2013-02-19'),
(13, 'biatch@biatch.fr', 'ca00278c24e64632176dacc088cf3c20a497c02e', '2013-02-21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
