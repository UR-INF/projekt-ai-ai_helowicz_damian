CREATE TABLE `Klient` (
  `id_klient` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `nr_telefonu` int NOT NULL,
  `nr_karty` int NOT NULL,
  `data_waz` varchar(255) NOT NULL,
  `cvv` int NOT NULL
);

CREATE TABLE `Samochod` (
  `id_samochod` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `marka` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `rok_prod` date NOT NULL,
  `silnik` varchar(255) NOT NULL,
  `miejsca` int NOT NULL,
  `drzwi` int NOT NULL,
  `bagaznik` varchar(255) NOT NULL,
  `klimatyzacja` varchar(255) NOT NULL,
  `kolor` varchar(255) NOT NULL,
  `rodz_paliwa` varchar(255) NOT NULL,
  `cena` int NOT NULL,
  `zdjecie` varchar(255) NOT NULL
);

CREATE TABLE `Pracownik` (
  `id_pracownik` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_miejsce` int NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `nr_telefonu` int NOT NULL
);

CREATE TABLE `Miejsce` (
  `id_miejsce` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `ulica` varchar(255) NOT NULL,
  `numer` varchar(255) NOT NULL,
  `miasto` varchar(255) NOT NULL,
  `kod` varchar(255) NOT NULL,
  `numer_tel` int NOT NULL
);

CREATE TABLE `Wypozyczenie` (
  `id_wypozyczenia` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_samochod` int NOT NULL,
  `id_klient` int NOT NULL,
  `id_miejsce` int NOT NULL,
  `data_odb` date NOT NULL,
  `data_zwr` date NOT NULL,
  `status` varchar(255) NOT NULL
);

ALTER TABLE `Pracownik` ADD FOREIGN KEY (`id_miejsce`) REFERENCES `Miejsce` (`id_miejsce`);

ALTER TABLE `Wypozyczenie` ADD FOREIGN KEY (`id_samochod`) REFERENCES `Samochod` (`id_samochod`);

ALTER TABLE `Wypozyczenie` ADD FOREIGN KEY (`id_klient`) REFERENCES `Klient` (`id_klient`);

ALTER TABLE `Wypozyczenie` ADD FOREIGN KEY (`id_miejsce`) REFERENCES `Miejsce` (`id_miejsce`);
