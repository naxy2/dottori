-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 10, 2021 alle 01:28
-- Versione del server: 10.4.16-MariaDB
-- Versione PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdottori`
--
CREATE DATABASE IF NOT EXISTS `dbdottori` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbdottori`;

-- --------------------------------------------------------

--
-- Struttura della tabella `medico`
--

CREATE TABLE `medico` (
  `codice` varchar(16) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `dataNascita` date NOT NULL,
  `luogoNascita` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `medico`
--

INSERT INTO `medico` (`codice`, `cognome`, `nome`, `dataNascita`, `luogoNascita`) VALUES
('ABC11', 'Palmieri', 'Romeo', '1965-10-11', 'Palermo'),
('ABC12', 'Esposito', 'Ciro', '1969-12-12', 'Napoli'),
('ABC13', 'Chelarau', 'Mircea', '1972-10-18', 'Napoli');

-- --------------------------------------------------------

--
-- Struttura della tabella `paziente`
--

CREATE TABLE `paziente` (
  `CF` varchar(16) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `dataNascita` date NOT NULL,
  `luogoNascita` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `fkMedico` varchar(16) DEFAULT NULL,
  `dataAssociazione` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `paziente`
--

INSERT INTO `paziente` (`CF`, `cognome`, `nome`, `dataNascita`, `luogoNascita`, `indirizzo`, `fkMedico`, `dataAssociazione`) VALUES
('AAAAAA00A00A000A', 'Costa', 'Alessandro', '2000-10-10', 'CIVITAVECCHIA', 'casa sua', NULL, NULL),
('AAAAAA00A00A000C', 'Rossi', 'Alessandro', '2000-12-12', 'Roma', 'casa sua', NULL, NULL),
('AAAAAA00A00A000D', 'Rossi', 'Daniele', '0001-01-01', 'gerusalemme', 'Via delle stalle 45', NULL, NULL),
('AAAAAA00A00A000E', 'Rossi', 'Mario', '2012-12-10', 'Roma', 'Via Lazio 12', NULL, NULL),
('AAAAAA00A11A000A', 'Oniarti ', 'Diego', '2002-10-18', 'Trento', 'casa mia', NULL, NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `paziente`
--
ALTER TABLE `paziente`
  ADD PRIMARY KEY (`CF`),
  ADD KEY `fkMedico` (`fkMedico`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `paziente`
--
ALTER TABLE `paziente`
  ADD CONSTRAINT `fkMedico` FOREIGN KEY (`fkMedico`) REFERENCES `medico` (`codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
