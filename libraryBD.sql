-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Temps de generació: 16-11-2018 a les 17:04:57
-- Versió del servidor: 10.1.28-MariaDB
-- Versió de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `library`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `book`
--

CREATE TABLE `book` (
  `isbn` varchar(13) NOT NULL,
  `title` varchar(80) NOT NULL,
  `author` varchar(60) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `edition` varchar(2) DEFAULT NULL,
  `year` varchar(4) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `language` varchar(30) NOT NULL,
  `description` varchar(5) DEFAULT NULL,
  `book_condition` varchar(7) DEFAULT NULL,
  `continuous_of` varchar(13) DEFAULT NULL,
  `continued_by` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `book`
--

INSERT INTO `book` (`isbn`, `title`, `author`, `editorial`, `edition`, `year`, `category`, `language`, `description`, `book_condition`, `continuous_of`, `continued_by`) VALUES
('9788408078678', 'La venganza de la tierra', 'Lovelock, James', 'Planeta', '2', '2009', 'Ecology', 'Spanish', '264', 'good', '', ''),
('9788408094999', 'Piensa, es gratis', 'Lorente, Joaquin', 'Planeta', '4', '2011', 'Self-help', 'Spanish', '208', 'good', '', ''),
('9788420637686', 'Biografia de la fisica', 'Gamow, George', 'Alianza editorial', '1', '2007', 'Divulgation', 'Spanish', '448', 'good', '', ''),
('9788420674339', 'La muerte de Ivan Ilich : Hadyi Murad', 'Tolstoi, Leon', 'Alianza editorial', '4', '2011', 'Philosophy', 'Spanish', '320', 'good', '', ''),
('9788423324613', 'Una mochila para el universo', 'Punset, Elsa', 'Destino', '1', '2012', 'Self-help', 'Spanish', '320', 'bad', '', ''),
('9788429743838', 'Breu historia de Catalunya', 'Mestre I Godes, Jesus', 'Edicions 62', '3', '1998', 'Historical', 'Catalan', '272', 'medium', '', ''),
('9788445000663', 'El señor de los anillos I: La comunidad del anillo ', 'Tolkien, J.R.R. ', 'Minotauro', '1', '2012', 'Fiction', 'Spanish', '576', 'good', '', '9788445000670'),
('9788445000670', 'El señor de los anillos II: Las dos torres', 'Tolkien, J.R.R. ', 'Minotauro', '1', '2012', 'Fiction', 'Spanish', '480', 'good', '9788445000663', '9788445000687'),
('9788445000687', 'El señor de los anillos III: El retorno del rey', 'Tolkien, J.R.R. ', 'Minotauro', '1', '2012', 'Fiction', 'Spanish', '606', 'good', '9788445000670', ''),
('9788445000694', 'La lengua de los elfos', 'Gonzalez Baixauli, Luis', 'Minotauro', '1', '2012', 'Fiction', 'Spanish', '272', 'good', '', ''),
('9788467005035', 'Que la muerte te acompañe', 'Mejide, Risto', 'Espasa', '1', '2011', 'Novel', 'Spanish', '224', 'good', '', ''),
('9788483469088', 'El món groc', 'Espinosa, Albert', 'Debolsillo', '2', '2012', 'Self-help', 'Catalan', '176', 'good', '', ''),
('9788484376866', 'Romeu i Julieta', 'Shakespeare, William ', 'Proa', '3', '2008', 'Theater', 'Catalan', '224', 'good', '', ''),
('9788492549597', 'Perdona si et dic amor', ' Moccia, Federico', 'Labutxaca', '5', '2010', 'Novel', 'Catalan', '624', 'good', '', ''),
('9788497914574', 'Secrets de Catalunya', 'Sust, Xavier', 'Cossetania', '1', '2009', 'Social', 'Catalan', '216', 'good', '', ''),
('9788499085067', 'Fisica de lo imposible', 'Kaku, Michio ', 'Debolsillo', '1', '2010', 'Divulgation', 'Spanish', '384', 'good', '', ''),
('9788499086156', 'Las 8 claves del liderazgo del monje que vendio su ferrari', 'Sharma, Robin ', 'Debolsillo', '2', '2011', 'Self-help', 'Spanish', '288', 'good', '', ''),
('9788499086200', 'Lecciones sobre la vida del monje que vendio su ferrari', 'Sharma, Robin ', 'Debolsillo', '3', '2012', 'Self-help', 'Spanish', '224', 'good', '', ''),
('9788499087139', 'Sabiduria cotidiana del monje que vendio su ferrari', 'Sharma, Robin ', 'Debolsillo', '2', '2011', 'Self-help', 'Spanish', '240', 'good', '', ''),
('9788499303253', 'El petit llibre de les grans preguntes', 'Stock, Gregory', 'Labutxaca', '1', '2011', 'Fiction', 'Catalan', '160', 'good', '', ''),
('9788499303321', 'Els jocs de la fam I', 'Collins, Suzanne ', 'Labutxaca', '2', '2011', 'Fiction', 'Catalan', '400', 'good', '', '9788499305424'),
('9788499305424', 'Els jocs de la fam II: en flames', 'Collins, Suzanne ', 'Labutxaca', '2', '2013', 'Fiction', 'Catalan', '432', 'good', '9788499303321', '9788499305431'),
('9788499305431', 'Els jocs de la fam III: l ocell de la revolta', 'Collins, Suzanne ', 'Labutxaca', '1', '2013', 'Fiction', 'Catalan', '432', 'good', '9788499305424', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `copy`
--

CREATE TABLE `copy` (
  `id_copy` int(11) NOT NULL,
  `isbn` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `copy`
--

INSERT INTO `copy` (`id_copy`, `isbn`) VALUES
(36, '9788408078678'),
(53, '9788408078678'),
(34, '9788408094999'),
(16, '9788420637686'),
(37, '9788420674339'),
(43, '9788423324613'),
(31, '9788429743838'),
(32, '9788429743838'),
(1, '9788445000663'),
(2, '9788445000663'),
(3, '9788445000663'),
(4, '9788445000663'),
(5, '9788445000670'),
(6, '9788445000670'),
(7, '9788445000670'),
(8, '9788445000670'),
(9, '9788445000687'),
(10, '9788445000687'),
(11, '9788445000687'),
(12, '9788445000687'),
(13, '9788445000694'),
(15, '9788467005035'),
(44, '9788483469088'),
(35, '9788484376866'),
(33, '9788492549597'),
(42, '9788497914574'),
(14, '9788499085067'),
(39, '9788499086156'),
(40, '9788499086200'),
(41, '9788499087139'),
(38, '9788499303253'),
(26, '9788499303321'),
(27, '9788499303321'),
(28, '9788499303321'),
(29, '9788499303321'),
(30, '9788499303321'),
(17, '9788499305424'),
(18, '9788499305424'),
(19, '9788499305424'),
(20, '9788499305424'),
(21, '9788499305431'),
(22, '9788499305431'),
(23, '9788499305431'),
(24, '9788499305431'),
(25, '9788499305431');

-- --------------------------------------------------------

--
-- Estructura de la taula `lend`
--

CREATE TABLE `lend` (
  `id_lend` int(11) NOT NULL,
  `start_time_lend` date NOT NULL,
  `dni` varchar(10) NOT NULL,
  `id_copy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `reserve`
--

CREATE TABLE `reserve` (
  `id_reserve` int(11) NOT NULL,
  `start_time_reserve` date NOT NULL,
  `dni` varchar(10) NOT NULL,
  `id_copy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `reserve`
--

INSERT INTO `reserve` (`id_reserve`, `start_time_reserve`, `dni`, `id_copy`) VALUES
(22, '2018-11-30', '00000000x', 4),
(23, '2018-11-30', '00000000x', 4);

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE `users` (
  `dni` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `user_type` int(1) NOT NULL,
  `phone_number` varchar(9) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `postal_code` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direction` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `users`
--

INSERT INTO `users` (`dni`, `name`, `surname`, `pass`, `user_type`, `phone_number`, `city`, `postal_code`, `email`, `direction`) VALUES
('00000000x', 'Test', 'User', '00000', 0, NULL, NULL, 7003, '00000@mail.com', NULL),
('11111111x', 'Test', 'Librarian', '11111', 1, NULL, NULL, 8000, '11111@mail.com', NULL),
('22222222x', 'Test', 'Administrator', '22222', 2, NULL, NULL, 7701, '22222@mail.com', NULL);

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`);

--
-- Index de la taula `copy`
--
ALTER TABLE `copy`
  ADD PRIMARY KEY (`id_copy`),
  ADD KEY `FK_isbn_copy` (`isbn`);

--
-- Index de la taula `lend`
--
ALTER TABLE `lend`
  ADD PRIMARY KEY (`id_lend`),
  ADD KEY `FK_copy_lend` (`id_copy`),
  ADD KEY `FK_dni_lend` (`dni`);

--
-- Index de la taula `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id_reserve`),
  ADD KEY `FK_dni_reserve` (`dni`),
  ADD KEY `FK_copy_reserve` (`id_copy`);

--
-- Index de la taula `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `copy`
--
ALTER TABLE `copy`
  MODIFY `id_copy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT per la taula `lend`
--
ALTER TABLE `lend`
  MODIFY `id_lend` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id_reserve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `copy`
--
ALTER TABLE `copy`
  ADD CONSTRAINT `FK_isbn_copy` FOREIGN KEY (`isbn`) REFERENCES `book` (`isbn`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restriccions per la taula `lend`
--
ALTER TABLE `lend`
  ADD CONSTRAINT `FK_copy_lend` FOREIGN KEY (`id_copy`) REFERENCES `copy` (`id_copy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_dni_lend` FOREIGN KEY (`dni`) REFERENCES `users` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriccions per la taula `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `FK_copy_reserve` FOREIGN KEY (`id_copy`) REFERENCES `copy` (`id_copy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_dni_reserve` FOREIGN KEY (`dni`) REFERENCES `users` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
