insert into miejsce(id_miejsce, ulica, numer, miasto, kod, numer_tel) values (MIEJSCE_SEQ.nextval,'Rejtana','25/8','Rzesz�w','35-310','888222555');
insert into miejsce(id_miejsce, ulica, numer, miasto, kod, numer_tel) values (MIEJSCE_SEQ.nextval,'3 Maja','74','Mielec','39-300','888555222');
insert into miejsce(id_miejsce, ulica, numer, miasto, kod, numer_tel) values (MIEJSCE_SEQ.nextval,'�wiadka','7/6','Krosno','35-310','888111555');
insert into miejsce(id_miejsce, ulica, numer, miasto, kod, numer_tel) values (MIEJSCE_SEQ.nextval,'Rejtana','214','','35-310','888222333');

Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','Combo',to_date('20/01/01','RR/MM/DD'),'1.5','5','4','Du�y','Climatronic','Szary','Diesel','250','1');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','Combo',to_date('20/01/01','RR/MM/DD'),'1.6','5','4','Du�y','Climatronic','Br�zowy','Diesel','240','2');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','Combo',to_date('20/01/01','RR/MM/DD'),'1.4','5','4','Du�y','Manualna','Niebieski','Bensyna','260','3');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','Crossland X',to_date('20/01/01','RR/MM/DD'),'1.8','5','4','�redni','Automatyczna','Niebieski','Diesel','200','4');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','Grandland X',to_date('20/01/01','RR/MM/DD'),'2.0','5','4','�redni','Manualna','Czerwony','Bensyna','225','5');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','Grandland X',to_date('20/01/01','RR/MM/DD'),'1.9','5','4','�redni','Climatronic','Bia�y','Gaz','300','6');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','Astra',to_date('20/01/01','RR/MM/DD'),'1.4','5','4','Ma�y','Climatronic','Bia�y','Gaz','200','7');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','Astra',to_date('20/01/01','RR/MM/DD'),'1.4','5','4','Ma�y','Automatyczna','Niebieski','Gaz','210','8');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','Astra',to_date('20/01/01','RR/MM/DD'),'1.3','5','4','Ma�y','Manualna','Srebrny','Bensyna','190','9');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','New Corsa',to_date('20/01/01','RR/MM/DD'),'1.2','5','4','Ma�y','Climatronic','Pomara�czowy','Gaz','150','10');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','New Corsa',to_date('20/01/01','RR/MM/DD'),'1.3','5','4','Ma�y','Automatyczna','Czarny','Gaz','160','11');
Insert into SAMOCHOD(ID_SAMOCHOD,MARKA,MODEL,ROK_PROD,SILNIK,MIEJSCA,DRZWI,BAGAZNIK,KLIMATYZACJA,KOLOR,RODZ_PALIWA,CENA,ZDJECIE) values (SAMOCHOD_SEQ.nextval,'Opel','New Corsa',to_date('20/01/01','RR/MM/DD'),'1.3','5','4','Ma�y','Manualna','Bia�y','Diesel','150','12');


insert into wypozyczenie(id_wypozyczenia, id_samochod, id_klient, id_miejsce, data_odb, data_zwr, status) values (wypozyczenie_seq.nextval, '7', '33', '4', to_date('2020/05/10', 'yyyy/mm/dd'), to_date('2020/05/17', 'yyyy/mm/dd'), 'Wypo�yczony');