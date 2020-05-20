-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Maj 2020, 22:13
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wypozyczalnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id_klient` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `nr_telefonu` int(11) NOT NULL,
  `nr_karty` int(16) NOT NULL,
  `data_waz` varchar(255) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`id_klient`, `imie`, `nazwisko`, `email`, `haslo`, `nr_telefonu`, `nr_karty`, `data_waz`, `cvv`) VALUES
(2, 'Damian', 'Helowicz', 'tak@tak.pl', '1bd11e251c32fe71278cad168ccf1985', 888888888, 2147483647, '21/58', 555),
(4, 'Damian', 'Helowicz', 'damian@damian.pl', '1bd11e251c32fe71278cad168ccf1985', 888888888, 2147483647, '88/88', 555),
(5, 'Hanka', 'Mostowiak', 'hania@karton.pl', '5394b510e06d570e6880e86d023ba85d', 123456789, 2147483647, '22/88', 111);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejsce`
--

CREATE TABLE `miejsce` (
  `id_miejsce` int(11) NOT NULL,
  `ulica` varchar(255) NOT NULL,
  `numer` varchar(255) NOT NULL,
  `miasto` varchar(255) NOT NULL,
  `kod` varchar(255) NOT NULL,
  `numer_tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `miejsce`
--

INSERT INTO `miejsce` (`id_miejsce`, `ulica`, `numer`, `miasto`, `kod`, `numer_tel`) VALUES
(1, 'Rejtana', '25/8', 'Rzeszów', '35-310', 888222555),
(2, '3 Maja', '74', 'Mielec', '39-300', 888555222),
(3, 'Świadka', '7/6', 'Krosno', '35-310', 888111555),
(4, 'Rejtana', '214', 'Tuszyma', '35-310', 888222333);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownik`
--

CREATE TABLE `pracownik` (
  `id_pracownik` int(11) NOT NULL,
  `id_miejsce` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `nr_telefonu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownik`
--

INSERT INTO `pracownik` (`id_pracownik`, `id_miejsce`, `imie`, `nazwisko`, `email`, `haslo`, `nr_telefonu`) VALUES
(1, 1, 'Damian', 'Helowicz', 'damian@damian.com', '1bd11e251c32fe71278cad168ccf1985', 888888888);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE `samochod` (
  `id_samochod` int(11) NOT NULL,
  `marka` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `rok_prod` date NOT NULL,
  `silnik` varchar(255) NOT NULL,
  `miejsca` int(11) NOT NULL,
  `drzwi` int(11) NOT NULL,
  `bagaznik` varchar(255) NOT NULL,
  `klimatyzacja` varchar(255) NOT NULL,
  `kolor` varchar(255) NOT NULL,
  `rodz_paliwa` varchar(255) NOT NULL,
  `cena` int(11) NOT NULL,
  `zdjecie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `samochod`
--

INSERT INTO `samochod` (`id_samochod`, `marka`, `model`, `rok_prod`, `silnik`, `miejsca`, `drzwi`, `bagaznik`, `klimatyzacja`, `kolor`, `rodz_paliwa`, `cena`, `zdjecie`) VALUES
(1, 'Opel', 'Combo', '2020-01-01', '1.5', 5, 4, 'Duży', 'Climatronic', 'Szary', 'Diesel', 250, '1'),
(2, 'Opel', 'Combo', '2020-01-01', '1.6', 5, 4, 'Duży', 'Climatronic', 'Brązowy', 'Diesel', 240, '2'),
(3, 'Opel', 'Combo', '2020-01-01', '1.4', 5, 4, 'Duży', 'Manualna', 'Niebieski', 'Bensyna', 260, '3'),
(4, 'Opel', 'Crossland X', '2020-01-01', '1.8', 5, 4, 'Średni', 'Automatyczna', 'Niebieski', 'Diesel', 200, '4'),
(5, 'Opel', 'Grandland X', '2020-01-01', '2.0', 5, 4, 'Średni', 'Manualna', 'Czerwony', 'Bensyna', 225, '5'),
(6, 'Opel', 'Grandland X', '2020-01-01', '1.9', 5, 4, 'Średni', 'Climatronic', 'Biały', 'Gaz', 300, '6'),
(7, 'Opel', 'Astra', '2020-01-01', '1.4', 5, 4, 'Mały', 'Climatronic', 'Biały', 'Gaz', 200, '7'),
(8, 'Opel', 'Astra', '2020-01-01', '1.4', 5, 4, 'Mały', 'Automatyczna', 'Niebieski', 'Gaz', 210, '8'),
(9, 'Opel', 'Astra', '2020-01-01', '1.3', 5, 4, 'Mały', 'Manualna', 'Srebrny', 'Bensyna', 190, '9'),
(10, 'Opel', 'New Corsa', '2020-01-01', '1.2', 5, 4, 'Mały', 'Climatronic', 'Pomarańczowy', 'Gaz', 150, '10'),
(11, 'Opel', 'New Corsa', '2020-01-01', '1.3', 5, 4, 'Mały', 'Automatyczna', 'Czarny', 'Gaz', 160, '11'),
(12, 'Opel', 'New Corsa', '2020-01-01', '1.3', 5, 4, 'Mały', 'Manualna', 'Biały', 'Diesel', 150, '12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenie`
--

CREATE TABLE `wypozyczenie` (
  `id_wypozyczenia` int(11) NOT NULL,
  `id_samochod` int(11) NOT NULL,
  `id_klient` int(11) NOT NULL,
  `id_miejsce` int(11) NOT NULL,
  `data_odb` date NOT NULL,
  `data_zwr` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wypozyczenie`
--

INSERT INTO `wypozyczenie` (`id_wypozyczenia`, `id_samochod`, `id_klient`, `id_miejsce`, `data_odb`, `data_zwr`, `status`) VALUES
(7, 2, 2, 1, '2020-05-20', '2020-05-20', 'Oddany'),
(8, 3, 2, 1, '2020-05-20', '2020-05-20', 'Oddany'),
(9, 4, 2, 1, '2020-05-20', '2020-05-20', 'Oddany'),
(10, 5, 2, 1, '2020-05-20', '2020-05-20', 'Oddany'),
(11, 6, 2, 1, '2020-05-20', '2020-05-20', 'Oddany'),
(12, 8, 2, 1, '2020-05-20', '2020-05-20', 'Oddany'),
(13, 9, 2, 1, '2020-05-20', '2020-05-20', 'Oddany'),
(14, 10, 2, 1, '2020-05-20', '2020-05-20', 'Oddany'),
(15, 11, 2, 1, '2020-05-20', '2020-05-20', 'Oddany'),
(16, 12, 2, 1, '2020-05-20', '2020-05-20', 'Oddany');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klient`);

--
-- Indeksy dla tabeli `miejsce`
--
ALTER TABLE `miejsce`
  ADD PRIMARY KEY (`id_miejsce`);

--
-- Indeksy dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  ADD PRIMARY KEY (`id_pracownik`),
  ADD KEY `id_miejsce` (`id_miejsce`);

--
-- Indeksy dla tabeli `samochod`
--
ALTER TABLE `samochod`
  ADD PRIMARY KEY (`id_samochod`);

--
-- Indeksy dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD PRIMARY KEY (`id_wypozyczenia`),
  ADD KEY `id_samochod` (`id_samochod`),
  ADD KEY `id_klient` (`id_klient`),
  ADD KEY `id_miejsce` (`id_miejsce`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `miejsce`
--
ALTER TABLE `miejsce`
  MODIFY `id_miejsce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `id_pracownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `samochod`
--
ALTER TABLE `samochod`
  MODIFY `id_samochod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  MODIFY `id_wypozyczenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  ADD CONSTRAINT `pracownik_ibfk_1` FOREIGN KEY (`id_miejsce`) REFERENCES `miejsce` (`id_miejsce`);

--
-- Ograniczenia dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD CONSTRAINT `wypozyczenie_ibfk_1` FOREIGN KEY (`id_samochod`) REFERENCES `samochod` (`id_samochod`),
  ADD CONSTRAINT `wypozyczenie_ibfk_2` FOREIGN KEY (`id_klient`) REFERENCES `klient` (`id_klient`),
  ADD CONSTRAINT `wypozyczenie_ibfk_3` FOREIGN KEY (`id_miejsce`) REFERENCES `miejsce` (`id_miejsce`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
