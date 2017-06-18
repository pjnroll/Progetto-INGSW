-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 18, 2017 alle 20:35
-- Versione del server: 5.7.17
-- Versione PHP: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `regolaeccezione`
--

CREATE TABLE `regolaeccezione` (
  `ID` int(10) NOT NULL,
  `IDUtente` int(10) NOT NULL,
  `IDSensore` int(10) NOT NULL,
  `ValoreSoglia` double NOT NULL,
  `TipoControllo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rilevazione`
--

CREATE TABLE `rilevazione` (
  `ID` int(10) NOT NULL,
  `IstanteAcquisizione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ValoreRilevazione` double NOT NULL,
  `Errore` int(10) NOT NULL,
  `DescrizioneRilevazione` char(255) NOT NULL,
  `IDSensore` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rilevazioneanomala`
--

CREATE TABLE `rilevazioneanomala` (
  `ID` int(11) NOT NULL,
  `IDUtente` int(10) NOT NULL,
  `IDRilevazione` int(10) NOT NULL,
  `IDRegola` int(10) NOT NULL,
  `viewed` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `sensore`
--

CREATE TABLE `sensore` (
  `ID` int(10) NOT NULL,
  `Marca` char(255) NOT NULL,
  `Tipo` int(10) NOT NULL,
  `IDsito` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `sito`
--

CREATE TABLE `sito` (
  `ID` int(10) NOT NULL,
  `IDCliente` int(10) NOT NULL,
  `Nome` char(255) NOT NULL,
  `Grandezza` char(255) NOT NULL,
  `LocalitÃ ` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tiposensore`
--

CREATE TABLE `tiposensore` (
  `ID` int(10) NOT NULL,
  `IDSito` int(10) NOT NULL,
  `Nome` int(10) NOT NULL,
  `Posizione` int(10) NOT NULL,
  `DatiContenuti` char(255) NOT NULL,
  `NumeroDatiContenuti` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `ID` int(10) NOT NULL,
  `Nome` char(255) NOT NULL,
  `Cognome` char(255) NOT NULL,
  `Email` char(255) NOT NULL,
  `DataDiNascita` date NOT NULL,
  `Sesso` char(1) NOT NULL,
  `Residenza` char(255) NOT NULL,
  `LuogoDiNascita` char(255) NOT NULL,
  `NumeroDiTelefono` int(10) NOT NULL,
  `CodiceFiscale` char(16) NOT NULL,
  `Password` char(40) NOT NULL,
  `isAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID`, `Nome`, `Cognome`, `Email`, `DataDiNascita`, `Sesso`, `Residenza`, `LuogoDiNascita`, `NumeroDiTelefono`, `CodiceFiscale`, `Password`, `isAdmin`) VALUES
(1, 'Amministratore', 'Di Iot', 'a@a.it', '1996-06-06', 'M', 'Via Orabona', 'Bari', 1231314156, 'YFWBVR77P56A662L', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(2, 'Gabriele', 'Pisciotta', 'u@u.it', '1996-05-03', 'M', 'Bari', 'Bari', 2147483647, 'PSCGRL96E03A662Q', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `regolaeccezione`
--
ALTER TABLE `regolaeccezione`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `IDUtente` (`IDUtente`),
  ADD UNIQUE KEY `IDSensore` (`IDSensore`);

--
-- Indici per le tabelle `rilevazione`
--
ALTER TABLE `rilevazione`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `IDSensore` (`IDSensore`),
  ADD KEY `FKRilevazion536259` (`IDSensore`);

--
-- Indici per le tabelle `rilevazioneanomala`
--
ALTER TABLE `rilevazioneanomala`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `IDUtente` (`IDUtente`),
  ADD UNIQUE KEY `IDRilevazione` (`IDRilevazione`),
  ADD UNIQUE KEY `IDRegola` (`IDRegola`),
  ADD KEY `FKRilevazion857267` (`IDUtente`),
  ADD KEY `FKRilevazion300044` (`IDRegola`),
  ADD KEY `FKRilevazion880608` (`IDRilevazione`);

--
-- Indici per le tabelle `sensore`
--
ALTER TABLE `sensore`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKSensore917818` (`ID`),
  ADD KEY `FKSensore901159` (`IDsito`);

--
-- Indici per le tabelle `sito`
--
ALTER TABLE `sito`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKSito406760` (`IDCliente`);

--
-- Indici per le tabelle `tiposensore`
--
ALTER TABLE `tiposensore`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKTipoSensor789254` (`IDSito`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
