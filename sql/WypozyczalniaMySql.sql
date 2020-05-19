CREATE TABLE `Klient` (
  `id_klient` int PRIMARY KEY,
  `imie` varchar(255),
  `nazwisko` varchar(255),
  `email` varchar(255),
  `haslo` varchar(255),
  `nr_telefonu` int,
  `nr_karty` int,
  `data_waz` varchar(255),
  `cvv` int
);

CREATE TABLE `Samochod` (
  `id_samochod` int PRIMARY KEY,
  `marka` varchar(255),
  `model` varchar(255),
  `rok_prod` date,
  `silnik` varchar(255),
  `miejsca` int,
  `drzwi` int,
  `bagaznik` varchar(255),
  `klimatyzacja` varchar(255),
  `kolor` varchar(255),
  `rodz_paliwa` varchar(255),
  `cena` int,
  `zdjecie` varchar(255)
);

CREATE TABLE `Pracownik` (
  `id_pracownik` int PRIMARY KEY,
  `id_miejsce` int,
  `imie` varchar(255),
  `nazwisko` varchar(255),
  `email` varchar(255),
  `haslo` varchar(255),
  `nr_telefonu` int
);

CREATE TABLE `Miejsce` (
  `id_miejsce` int PRIMARY KEY,
  `ulica` varchar(255),
  `numer` varchar(255),
  `miasto` varchar(255),
  `kod` varchar(255),
  `numer_tel` int
);

CREATE TABLE `Wypozyczenie` (
  `id_wypozyczenia` int PRIMARY KEY,
  `id_samochod` int,
  `id_klient` int,
  `id_miejsce` int,
  `data_odb` date,
  `data_zwr` date,
  `status` varchar(255)
);

ALTER TABLE `Pracownik` ADD FOREIGN KEY (`id_miejsce`) REFERENCES `Miejsce` (`id_miejsce`);

ALTER TABLE `Wypozyczenie` ADD FOREIGN KEY (`id_samochod`) REFERENCES `Samochod` (`id_samochod`);

ALTER TABLE `Wypozyczenie` ADD FOREIGN KEY (`id_klient`) REFERENCES `Klient` (`id_klient`);

ALTER TABLE `Wypozyczenie` ADD FOREIGN KEY (`id_miejsce`) REFERENCES `Miejsce` (`id_miejsce`);
