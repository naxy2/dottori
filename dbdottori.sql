-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 19, 2021 alle 18:58
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
-- Struttura della tabella `associazione`
--

CREATE TABLE `associazione` (
  `data` date NOT NULL DEFAULT current_timestamp(),
  `fkMedico` varchar(16) NOT NULL,
  `fkPaziente` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `associazione`
--
ALTER TABLE `associazione`
  ADD PRIMARY KEY (`fkMedico`,`fkPaziente`),
  ADD KEY `associazione_paziente` (`fkPaziente`);

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
  ADD CONSTRAINT `associazione_medico` FOREIGN KEY (`fkMedico`) REFERENCES `medico` (`codice`),
  ADD CONSTRAINT `associazione_paziente` FOREIGN KEY (`fkPaziente`) REFERENCES `paziente` (`CF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
