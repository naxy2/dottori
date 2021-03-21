-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 21, 2021 alle 16:45
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 8.0.2

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
-- Struttura della tabella `associazione`
--

CREATE TABLE `associazione` (
  `data` date NOT NULL DEFAULT current_timestamp(),
  `fkMedico` varchar(16) NOT NULL,
  `fkPaziente` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `associazione`
--

INSERT INTO `associazione` (`data`, `fkMedico`, `fkPaziente`) VALUES
('0000-00-00', 'ABC12', 'AAAAAA00A00A000A'),
('0000-00-00', 'ABC12', 'AAAAAA00A11A000A');

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
('ABC12', 'Esposito', 'Ciro', '1969-12-12', 'Napoli');

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
  `indirizzo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `paziente`
--

INSERT INTO `paziente` (`CF`, `cognome`, `nome`, `dataNascita`, `luogoNascita`, `indirizzo`) VALUES
('AAAAAA00A00A000A', 'Costa', 'Alessandro', '2000-10-10', 'CIVITAVECCHIA', 'casa sua'),
('AAAAAA00A00A000B', 'Rossi', 'Mario', '1990-02-21', 'Roma', 'via Lazio 15'),
('AAAAAA00A00A000C', 'Rossi', 'Alessandro', '2000-12-12', 'Roma', 'casa sua'),
('AAAAAA00A11A000A', 'Oniarti ', 'Diego', '2002-10-18', 'Trento', 'casa mia');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `associazione`
--
ALTER TABLE `associazione`
  ADD PRIMARY KEY (`fkPaziente`),
  ADD KEY `fkPaziente` (`fkPaziente`),
  ADD KEY `fkMedico` (`fkMedico`);

--
-- Indici per le tabelle `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `paziente`
--
ALTER TABLE `paziente`
  ADD PRIMARY KEY (`CF`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `associazione`
--
ALTER TABLE `associazione`
  ADD CONSTRAINT `associazione_paziente` FOREIGN KEY (`fkPaziente`) REFERENCES `paziente` (`CF`),
  ADD CONSTRAINT `fkMedico` FOREIGN KEY (`fkMedico`) REFERENCES `medico` (`codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
