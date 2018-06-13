-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 14 jun 2018 om 00:32
-- Serverversie: 5.6.35
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `han_shop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `CATEGORIE`
--

CREATE TABLE `CATEGORIE` (
  `CATEGORIENAAM` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `CATEGORIE`
--

INSERT INTO `CATEGORIE` (`CATEGORIENAAM`) VALUES
('basgitaren'),
('drums'),
('gitaren'),
('piano\'s');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `GEBRUIKER`
--

CREATE TABLE `GEBRUIKER` (
  `GEBRUIKERSNAAM` varchar(15) NOT NULL,
  `VOORNAAM` varchar(125) NOT NULL,
  `TUSSENVOEGSEL` varchar(30) DEFAULT NULL,
  `ACHTERNAAM` varchar(125) NOT NULL,
  `STRAATNAAM` varchar(125) NOT NULL,
  `HUISNUMMER` int(11) NOT NULL,
  `POSTCODE` char(6) NOT NULL,
  `WOONPLAATS` varchar(125) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `SEXE` char(1) NOT NULL,
  `WACHTWOORD` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `GEBRUIKER`
--

INSERT INTO `GEBRUIKER` (`GEBRUIKERSNAAM`, `VOORNAAM`, `TUSSENVOEGSEL`, `ACHTERNAAM`, `STRAATNAAM`, `HUISNUMMER`, `POSTCODE`, `WOONPLAATS`, `EMAIL`, `SEXE`, `WACHTWOORD`) VALUES
('jeffrey', 'Jeffrey', 'van', 'Rossum', 'Juliana van Stolberglaan', 53, '6713PB', 'Ede', 'rossum.jeffrey@gmail.com', 'm', 'pass123'),
('jurrian', 'Jurrian', 'te', 'Loo', 'Teststraat', 1, '1234AB', 'Apeldoorn', 'jurrian@test.nl', 'm', 'pass456');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `PRODUCTNUMMER` int(11) NOT NULL,
  `PRODUCTNAAM` varchar(100) NOT NULL,
  `OMSCHRIJVING` longtext NOT NULL,
  `CATEGORIE` varchar(15) NOT NULL,
  `PRIJS` decimal(8,2) NOT NULL,
  `VOORRAAD` int(11) DEFAULT NULL,
  `AFBEELDING_GROOT` varchar(1024) NOT NULL,
  `AFBEELDING_KLEIN` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `PRODUCT`
--

INSERT INTO `PRODUCT` (`PRODUCTNUMMER`, `PRODUCTNAAM`, `OMSCHRIJVING`, `CATEGORIE`, `PRIJS`, `VOORRAAD`, `AFBEELDING_GROOT`, `AFBEELDING_KLEIN`) VALUES
(1, 'Gretsch G9500 Jim Dandy Flat Top gitaar', 'Gretsch biedt in de G9500 Jim Dandy Flat Top een compacte, roots-georiënteerde akoestische gitaar. Gebaseerd op het \'Rex\'-model uit de jaren \'30 en vervaardigd van degelijke houtsoorten. Licht, compact en soepel speelbaar.', 'gitaren', '172.00', 17, 'assets/images/products/large-201806132343440.jpg', 'assets/images/products/small-201806132343440.jpg'),
(2, 'Fazley W50CBK akoestische western gitaar zwart', 'Dit is de Fazley W50CBK akoestische westerngitaar. Zoekt u een goede westerngitaar, maar wilt u niet de hoofdprijs betalen? Dan zit u goed met deze zwarte beauty, met sparrenhouten bovenblad en lindehouten klankkast. ', 'gitaren', '79.00', 12, 'assets/images/products/large-201806132344451.jpg', 'assets/images/products/small-201806132344451.jpg'),
(3, 'Boss ME-80 gitaar multi-effectprocessor', 'De Boss ME-80 is een compact en krachtig multi-effectpedaal voor gitaar, met een simpele stompbox-bediening en verbeterde COSM versterkermodellen uit de GT-100. Hij werkt tevens op 6 AA batterijen, dus ideaal voor onderweg.', 'gitaren', '235.00', 23, 'assets/images/products/large-201806132344542.jpg', 'assets/images/products/small-201806132344542.jpg'),
(4, 'Fazley W50CN akoestische western gitaar naturel', 'Dit is de Fazley W50CN akoestische westerngitaar. Zoekt u een goede westerngitaar, maar wilt u niet de hoofdprijs betalen? Dan zit u goed met deze naturel beauty, met sparrenhouten bovenblad en lindehouten klankkast. ', 'gitaren', '79.00', 10, 'assets/images/products/large-201806132345053.jpg', 'assets/images/products/small-201806132345053.jpg'),
(5, 'Fender ESC-80 3/4 formaat klassieke gitaar', 'De Fender ESC-80 is een 3/4 formaat klassieke gitaar uit de Fender Educational Serie en staat garant voor jarenlang speelplezier. Het formaat is ideaal voor de kleinere handen van kinderen tussen de 7 en 10 jaar.', 'gitaren', '89.00', 30, 'assets/images/products/large-201806132345144.jpg', 'assets/images/products/small-201806132345144.jpg'),
(6, 'Konig &amp; Meyer 16280 gitaar muurbeugel zwart', 'Deze gitaar houder is niet alleen stevig maar ook nog universeel. U kunt er elke gitaar of basgitaar op kwijt door de buigzaamheid van de armen.', 'gitaren', '6.00', 18, 'assets/images/products/large-201806132345225.jpg', 'assets/images/products/small-201806132345225.jpg'),
(7, 'Ibanez IJRG200-BK elektrische gitaar jumpstart pakket zwart', 'Dit is een complete oefenset met alles erop en eraan. Zo krijgt u een gitaar en versterker met een gitaarband, stemapparaat, kabel, plectrums, draaghoes en accessoiretas!', 'gitaren', '289.00', 20, 'assets/images/products/large-201806132345306.jpg', 'assets/images/products/small-201806132345306.jpg'),
(8, 'Innox IGS 55 gitaar statief', 'De IGS 55 is een zeer praktische standaard voor maximaal 5 gitaren. Aangezien de contactpunten met een schuimlaag bedekt zijn, wordt uw instrument beschermd tegen krassen en kleine beschadigingen.', 'gitaren', '26.00', 23, 'assets/images/products/large-201806132345397.jpg', 'assets/images/products/small-201806132345397.jpg'),
(9, 'LaPaz 001 BK klassieke gitaar zwart', 'De vriendelijk geprijsde LaPaz 001 BK Black is een klassieke (Spaanse) gitaar met een chique zwarte afwerking. Een heel goede keus voor wie het gitaarspel eens wil uitproberen.', 'gitaren', '41.00', 30, 'assets/images/products/large-201806132345508.jpg', 'assets/images/products/small-201806132345508.jpg'),
(10, 'Gomez 036 3/4-model klassieke gitaar sunburst', 'Gomez gunt jonge gitaristen een muzikale start op maat. De 036 is een 3/4-model klassieke gitaar, in sunburst-uitvoering. Naast de charmante look zijn de afmetingen optimaal voor muzikanten tot 12 jaar.', 'gitaren', '199.00', 22, 'assets/images/products/large-201806132345599.jpg', 'assets/images/products/small-201806132345599.jpg'),
(20, 'Fazley GB-Standard Classical gigbag voor klassieke gitaar', 'Met een 10 mm dikke voering en een hoogwaardige 600 Denier exterieur, biedt de Fazley GB-Standard Classical een uitstekende bescherming tijdens het vervoer van uw klassieke gitaar. Voorzien van opbergvakken en schouderriemen.', 'gitaren', '15.00', 29, 'assets/images/products/large-2018061323535210.jpg', 'assets/images/products/small-2018061323535210.jpg'),
(21, 'LaPaz 001 AN klassieke gitaar Amber Natural', 'De LaPaz 001 AN is een heel betaalbare klassieke gitaar (ook wel Spaanse gitaar) voor de beginnende gitarist. Met zijn Amber Natural-jasje heeft hij het fraaie naturelkleurige uiterlijk dat kenmerkend is voor dit type gitaar.', 'gitaren', '41.00', 26, 'assets/images/products/large-2018061323540211.jpg', 'assets/images/products/small-2018061323540211.jpg'),
(22, 'Boss GT-100 Version 2.0 multi-effectprocessor voor gitaar', 'Na de zeer populaire en succesvolle GT-10 is er nu de GT-100 van Boss. Deze krachtige vloer multi-effectprocessor voor gitaar beschikt over geheel opnieuw ontworpen COSM versterkermodellen en een verbeterde DSP engine.', 'gitaren', '370.00', 13, 'assets/images/products/large-2018061323541012.jpg', 'assets/images/products/small-2018061323541012.jpg'),
(23, 'D\'Addario EJ27N snarenset voor klassieke gitaar', 'De EJ27N van D\'Addario is een snarenset voor een klassieke / Spaanse gitaar. Deze set bestaat uit drie nylon snaren en drie verzilverd koper omwonden nylon snaren. Perfecte prijs-kwaliteitsverhouding.', 'gitaren', '5.00', 7, 'assets/images/products/large-2018061323541813.jpg', 'assets/images/products/small-2018061323541813.jpg'),
(24, 'Line 6 POD HD500X modeling effectprocessor voor gitaar', 'De opvolger van de veelgeprezen POD HD500, de Line 6 POD HD500X. Een high-end effectprocessor met versterkermodeling. Nu met meer DSP-processorkracht, meer routing-opties en vernieuwde voetschakelaars met LED-ring.', 'gitaren', '432.00', 22, 'assets/images/products/large-2018061323542514.jpg', 'assets/images/products/small-2018061323542514.jpg'),
(25, 'Fazley GAFAZ1 gitaar onderhoudsset', 'Op zoek naar een volledige onderhoudsset waarmee u zowel uw akoestische als elektrische gitaar onder handen kunt nemen? De Fazley GAFAZ1 Maintenance Kit is een veelzijdige verzameling om uw gear tiptop in orde te houden.', 'gitaren', '12.00', 14, 'assets/images/products/large-2018061323543215.jpg', 'assets/images/products/small-2018061323543215.jpg'),
(26, 'Koala Beginnerscursus Gitaar incl. CD/2DVD/DVD-ROM', 'Voor wie graag gitaar wil leren spelen biedt deze Beginnerscursus in boekvorm uitkomst! Geleverd inclusief CD en 2 DVD\'s. Hiermee brengt u het geoefende materiaal tot leven aan de hand van songs, voorbeelden en oefeningen.', 'gitaren', '22.00', 27, 'assets/images/products/large-2018061323543816.jpg', 'assets/images/products/small-2018061323543816.jpg'),
(27, 'De Haske FastTrack Gitaar 1 incl. CD', 'De Haske Fast Track 1 gitaar incl cd is een heldere zelfstudiemethode voor de akoestische en elektrische gitaar waarmee u pijlsnel vooruitgang boekt.', 'gitaren', '21.00', 7, 'assets/images/products/large-2018061323544417.jpg', 'assets/images/products/small-2018061323544417.jpg'),
(28, 'D\'Addario EXL110-3D snaren voor elektrische gitaar (3 sets)', 'De EXL110-3D bestaat uit drie D\'Addario EXL110 snarensets voor elektrische gitaar. De snaren zijn gemaakt van hoogwaardig staal en nikkel omwonden staal voor een helder en vol geluid met perfecte intonatie. Maten 010 - 046.', 'gitaren', '13.00', 13, 'assets/images/products/large-2018061323545318.jpg', 'assets/images/products/small-2018061323545318.jpg'),
(29, 'Innox IGS 21 gitaar muurbeugel', 'De Innox IGS 21 is een praktische en kostenbeperkende muurbeugel. De basisplaat is eenvoudig in een muur of balk te schroeven en vervolgens is de vork er op te draaien. Geschikt voor de meeste soorten gitaren en basgitaren.', 'gitaren', '5.00', 6, 'assets/images/products/large-2018061323545919.jpg', 'assets/images/products/small-2018061323545919.jpg'),
(30, 'Yamaha F310P akoestische western gitaar set', 'De Yamaha F310 akoestische folk gitaar is kwalitatief een top instrument voor een betaalbare prijs. Dit is een complete set inclusief draagtas, extra set snaren, snaren winder, capo en een set plectrums.', 'gitaren', '148.00', 12, 'assets/images/products/large-2018061323550820.jpg', 'assets/images/products/small-2018061323550820.jpg'),
(31, 'Fender Classic Series 50s Stratocaster Fiesta Red MN', 'De Fender Classic Series ‘50s Stratocaster heeft zowel de klassieke sounds als de vintage looks van een jaren vijftig Strat, van zijn vintage correcte maple hals tot de felrode Fiesta Red kleur. Hij is retro én betaalbaar!', 'gitaren', '699.00', 11, 'assets/images/products/large-201806132357300.jpg', 'assets/images/products/small-201806132357300.jpg'),
(32, 'Ibanez SR305EB Weathered Black basgitaar', 'De Ibanez SR305EB in de uitvoering Weathered Black is een vederlichte vijfsnarige basgitaar met een gerieflijk speelcomfort. Deze Soundgear bas bezit 2 Powerscan Dual Coils, een Power Tap schakelaar en Custom Electronics EQ.', 'basgitaren', '284.00', 26, 'assets/images/products/large-201806132359030.jpg', 'assets/images/products/small-201806132359030.jpg'),
(33, 'Ibanez SR300EB Weathered Black basgitaar', 'De SR300EB Weather Black van Ibanez heeft het lichte spelgevoel en gewicht waar de Soundgear basgitaren om bekend staan. Met Custom Electronics 3-band equalizer, Power Tap coilschakeling en twee PowerSpan Dual Coil elementen.', 'basgitaren', '299.00', 26, 'assets/images/products/large-201806132359151.jpg', 'assets/images/products/small-201806132359151.jpg'),
(34, 'De Haske FastTrack Basgitaar 1 incl. CD', 'De Haske Fast Track 1 basgitaar wordt heel compleet geleverd met een fraaie en handige cd met diverse begeleidingstracks. Met deze zelfstudiemethode komt een solide basgitaartechniek in een mum van tijd binnen handbereik.', 'basgitaren', '21.00', 30, 'assets/images/products/large-201806132359202.jpg', 'assets/images/products/small-201806132359202.jpg'),
(35, 'Line 6 Helix LT multi-effectprocessor', 'Een top-of-the-line multi-effectprocessor voor (bas)gitaar. Klasse effecten, cab-sims, amps, microfoonset-ups en eindeloze mogelijkheden voor editing, routing en recording. Een effect voor iedereen!', 'basgitaren', '944.00', 13, 'assets/images/products/large-201806132359293.jpg', 'assets/images/products/small-201806132359293.jpg'),
(36, 'Ampeg V-4B basgitaar buizenversterkertop', 'Oude tijden herleven met de nieuwe Ampeg V-4B, een wedergeboorte van de V-4B uit 1971. Ditmaal met lichtere materialen en nieuwe componenten. Over de klank hoeft u niet in te zetten, deze blijft niet te versmaden!', 'basgitaren', '1154.00', 18, 'assets/images/products/large-201806132359354.jpg', 'assets/images/products/small-201806132359354.jpg'),
(37, 'TC Electronic Hall Of Fame 2 Reverb effectpedaal', 'TC Electronic heeft één van zijn populairste effectpedalen doorontwikkeld en dit heeft geresulteerd in de Hall of Fame 2. Deze stompbox bevat een Shimmer-reverb, 3 plekken om Toneprints op te slaan en de nieuwe Mash-functie.', 'basgitaren', '143.00', 10, 'assets/images/products/large-201806132359475.jpg', 'assets/images/products/small-201806132359475.jpg'),
(38, 'Ibanez GSR200B-WNF basgitaar 4 snaren', 'Een goede maar eenvoudige bas. Geeft dankzij de houtkeuze een goed geluid en heeft een Phat eq aan boord voor nog een beetje extra laag. Dit is een bas die geschikt is voor zowel beginners als gevorderden.', 'basgitaren', '203.00', 18, 'assets/images/products/large-201806132359536.jpg', 'assets/images/products/small-201806132359536.jpg'),
(39, 'Fazley B200 SB elektrische basgitaar sunburst', 'De Fazley B200 SB is een klassiek ogende, budgetvriendelijke elektrische basgitaar met een solide feel en een dikke, punchy sound. Deze zwarte bas is de perfecte keuze voor de prijsbewuste beginner én gevorderde.', 'basgitaren', '58.00', 20, 'assets/images/products/large-201806140000037.jpg', 'assets/images/products/small-201806140000037.jpg'),
(40, 'De Haske FastTrack Basgitaar 2 incl. CD', 'Deel 2 in de De Haske serie is wederom een succes. Wilt u uw technieken nog verbeteren of misschien wat meer oefenen? Dan is deel 2 de perfecte oplossing voor u!', 'basgitaren', '21.00', 7, 'assets/images/products/large-201806140000108.jpg', 'assets/images/products/small-201806140000108.jpg'),
(41, 'MXR M87 Bass Compressor voor basgitaar', 'Een enorm complete compressor voor de basgitaar, maar ook voor de gitaar. Druk subtiel de pieken in of zorg voor maximale compressie. Dankzij de compacte behuizing zet u dit pedaal bovendien gemakkelijk tussen uw effecten.', 'basgitaren', '199.00', 8, 'assets/images/products/large-201806140000179.jpg', 'assets/images/products/small-201806140000179.jpg'),
(42, 'Aguilar SL 112 basgitaar speakerkast', 'De Aguilar SL 112 is extreem compact en licht van gewicht, maar sluit geen enkel compromis in toon. Zijn 12 inch Neodymium speaker, instelbare tweeter en basreflexpoort biedt u 250 Watt aan legendarische Aguilar bas-sound!', 'basgitaren', '799.00', 13, 'assets/images/products/large-2018061400002510.jpg', 'assets/images/products/small-2018061400002510.jpg'),
(43, 'Ibanez SR300EB Candy Apple basgitaar', 'De Ibanez SR300EB Candy Apple bezit het lichte gewicht en aangename speelcomfort van de Soundgear serie. Met passieve PowerSpan Dual Coil humbuckers, Custom Electronics equalizing en Power Tap schakelaar.', 'basgitaren', '299.00', 12, 'assets/images/products/large-2018061400022011.jpg', 'assets/images/products/small-2018061400022011.jpg'),
(44, 'Ernie Ball 2832 Regular Slinky Bass snarenset voor basgitaar', 'De zeer populaire Ernie Ball 2832 Regular Slinky Bass snaren hebben zich intussen wel bewezen! Deze uitstekende set van 4 nikkel-omwonden roundwound-exemplaren (.50-.105) geeft uw basgitaar een helder en punchy geluid.', 'basgitaren', '22.00', 7, 'assets/images/products/large-2018061400022612.jpg', 'assets/images/products/small-2018061400022612.jpg'),
(45, 'Ibanez GSRM20B miKro Walnut Flat elektrische basgitaar', 'De chique uitziende GSRM20B miKro is een van de short scale modellen van Ibanez. De Walnut Flat finish van deze handzame basgitaar steekt mooi af tegen de zwarte hardware en multifunctionele elementen.', 'basgitaren', '199.00', 20, 'assets/images/products/large-2018061400023513.jpg', 'assets/images/products/small-2018061400023513.jpg'),
(46, 'Fazley B200 BK elektrische basgitaar zwart', 'De Fazley B200 BK is een klassiek ogende, budgetvriendelijke elektrische basgitaar met een solide feel en een dikke, punchy sound. Deze zwarte bas is de perfecte keuze voor de prijsbewuste beginner én gevorderde.', 'basgitaren', '88.00', 18, 'assets/images/products/large-2018061400024414.jpg', 'assets/images/products/small-2018061400024414.jpg'),
(47, 'Electro Harmonix Deluxe Bass Big Muff Pi basgitaar distortion', 'De Electro-Harmonix Deluxe Bass Big Muff Pi is een zeer uitgebreide versie van de succesvolle Big Muff Pi. Geef uw bas een geweldig rijke distortion en sustain en bewerk de sound tot in detail met o.a. het crossover-circuit!', 'basgitaren', '135.00', 22, 'assets/images/products/large-2018061400025015.jpg', 'assets/images/products/small-2018061400025015.jpg'),
(48, 'MusicSales Basgitaar voor beginners incl. CD educatief boek', 'De basgitaar is een onmisbaar onderdeel binnen vrijwel elke muziekstroming. Basgitaar voor Beginners legt op heldere wijze de grondbeginselen van bas-spel uit en voorziet in tal van illustraties en een meespeel-CD.', 'basgitaren', '12.00', 28, 'assets/images/products/large-2018061400025516.jpg', 'assets/images/products/small-2018061400025516.jpg'),
(49, 'Ibanez PCBE12MH-OPN Open Pore Natural elektr.-akoest. basgitaar', 'Deze aantrekkelijke donkerbruine elektrisch-akoestische basgitaar is de Ibanez PCBE12MH-OPN (Open Pore Natural), met een volledig uit mahonie gemaakte, handzame Grand Concert klankkast en 32 inch medium scale hals.', 'basgitaren', '178.00', 22, 'assets/images/products/large-2018061400030317.jpg', 'assets/images/products/small-2018061400030317.jpg'),
(50, 'Koala Beginnerscursus Basgitaar incl. CD/2DVD/DVD-ROM', 'Leer op makkelijke wijze basgitaar spelen met deze beginnerscursus Basgitaar van Koala! Inclusief CD en 2 DVD\'s met voorbeelden, oefeningen en songs. Als bonus ook nog eens een DVD-ROM!', 'basgitaren', '20.00', 16, 'assets/images/products/large-2018061400030918.jpg', 'assets/images/products/small-2018061400030918.jpg'),
(51, 'Ibanez IJSR190-BK elektrische basgitaar jumpstart pakket zwart', 'Complete beginnersset voor de basgitarist die graag goed van start wil. Zo zit in dit pakket onder andere een stemapparaat, draagtas, standaard en versterker.', 'basgitaren', '285.00', 30, 'assets/images/products/large-2018061400031519.jpg', 'assets/images/products/small-2018061400031519.jpg'),
(52, 'Squier Affinity Series PJ Bass Pack Black', 'Ideaal voor beginners. Dit startpakket van Squier bevat een Squier PJ Bass, een Fender Rumble 15 versterker, een instrumentkabel en een draagband.', 'basgitaren', '313.00', 21, 'assets/images/products/large-2018061400032120.jpg', 'assets/images/products/small-2018061400032120.jpg'),
(53, 'ESP LTD B-204SM Natural Satin elektrische basgitaar', 'De LTD B-204SM NS (Natural Satin) heeft met zijn body van essenhout, Spalted Maple top en 5-delige hals (esdoorn, palissander) een onvergetelijk uiterlijk. Verder bezit hij 2 humbuckers en een actieve 3-bands toonregeling.', 'basgitaren', '460.00', 13, 'assets/images/products/large-2018061400033021.jpg', 'assets/images/products/small-2018061400033021.jpg'),
(54, 'Fender Rumble 115 Cabinet basgitaar speakerkast', 'Nieuwe Rumble-cabinets klinken gedetailleerder dan ooit, zetten lage frequenties zeer nauwkeurig neer en zijn bekleed in Blackface-stijl. De Fender Rumble 115 Cabinet (8 ohm) is een 300 W-model met tweeter en 15&quot; speaker.', 'basgitaren', '379.00', 18, 'assets/images/products/large-2018061400033622.jpg', 'assets/images/products/small-2018061400033622.jpg'),
(55, 'Roland TD-25K V-Drums elektronisch drumstel', 'Met de Roland TD-25K V-Drums haalt de (semi-)professionele drummer een topkwaliteit set in huis, uitermate geschikt voor opnames.', 'drums', '1659.00', 26, 'assets/images/products/large-201806140007290.jpg', 'assets/images/products/small-201806140007290.jpg'),
(56, 'Roland TD-25KV V-Drums elektronisch drumstel', 'Met de Roland TD-25KV V-Drums haalt de (semi-)professionele drummer een topkwaliteit set in huis, uitermate geschikt voor opnames.', 'drums', '2154.00', 24, 'assets/images/products/large-201806140007401.jpg', 'assets/images/products/small-201806140007401.jpg'),
(57, 'Roland TD-50K V-Drums elektronisch drumstel', 'Begint je drumcarrière serieuze vormen aan te nemen? Dan wordt het tijd dat je een drumstel hebt dat bij je niveau en eisen past. De TD-50K V-Drums van Roland is gericht op de serieuze, (semi) professionele drummer. ', 'drums', '4199.00', 18, 'assets/images/products/large-201806140007502.jpg', 'assets/images/products/small-201806140007502.jpg'),
(58, 'Teenage Engineering PO-32 Tonic Drum Synth', 'De Teenage Engineering PO-32 Tonic uit de Pocket Operator-serie is een coole drum en percussie synthesizer. Een van de meest interessante aspecten van de Tonic is de ingebouwde microfoon en de import/export-functionaliteit.', 'drums', '99.00', 22, 'assets/images/products/large-201806140007593.jpg', 'assets/images/products/small-201806140007593.jpg'),
(59, 'Roland TD-17KVX V-drums elektronisch drumstel', 'De TD-17KVX is het meest voorname model uit de TD-17 serie. Volledig voorzien van Mesh Head-pads, 3 bekkens en een zeer realistische hihat. De module heeft klanken van de TD-50 en zit vol met effecten en Bluetooth.', 'drums', '1699.00', 9, 'assets/images/products/large-201806140008084.jpg', 'assets/images/products/small-201806140008084.jpg'),
(60, 'Digitech SDRUM Strummable Drums ritme-effectpedaal', 'Een intelligente drummachine voor gitaristen en bassisten. Door simpelweg over je snaren aan te slaan, kun je een ritme aangeven. SDRUM maakt hier vervolgens een echt mooie drumbeat van.', 'drums', '189.00', 26, 'assets/images/products/large-201806140008145.jpg', 'assets/images/products/small-201806140008145.jpg'),
(61, 'Roland TD-50KV V-Drums elektronisch drumstel', 'De absolute topper onder de elektronische drumstellen op dit moment: de Roland TD-50KV V-Drums. Dit vlaggenschip van Roland biedt alles wat je maar mag verwachten van een moderne professionele, elektronische drumkit.  ', 'drums', '6571.00', 20, 'assets/images/products/large-201806140008236.jpg', 'assets/images/products/small-201806140008236.jpg'),
(62, 'Roland TD-1KPX2 V-Drums Portable elektronisch drumstel', 'Het innovatieve en populaire vouw-design van de TD-1KPX, maar dan met een verbeterde kick pad. Deze is ook met een dubbel bassdrumpedaal te gebruiken. Een ideale set als je weinig ruimte tot je beschikking hebt! ', 'drums', '883.00', 22, 'assets/images/products/large-201806140008307.jpg', 'assets/images/products/small-201806140008307.jpg'),
(63, 'Moog DFAM Drummer From Another Mother drum synthesizer', 'De Moog DFAM \'Drummer from another mother\' is een semi-modulaire, analoge drum synthesizer waarmee je zonder enige kennis van zaken al snel hele toffe drumgeluiden en ritmes kan maken. ', 'drums', '567.00', 9, 'assets/images/products/large-201806140008368.jpg', 'assets/images/products/small-201806140008368.jpg'),
(64, 'Roland TD-50 V-Drums drummodule', 'Het vlaggenschip uit de V-Drums serie van Roland: de TD-50. Een drummodule met zeer uitgebreide mogelijkheden. Speciaal ontworpen voor de professionele, veeleisende drummer. Deze module is ook zeer geschikt voor live-gebruik!', 'drums', '2120.00', 17, 'assets/images/products/large-201806140008439.jpg', 'assets/images/products/small-201806140008439.jpg'),
(65, 'De Haske Real Time Drums 1 incl. cd', 'De Haske Real Time Drums 1 incl. cd is een resultaatgerichte en uitdagende lesmethode voor de beginnende drummer waarbij onder meer rock, shuffle, jazz en latin aan bod komen.', 'drums', '21.00', 8, 'assets/images/products/large-2018061400094111.jpg', 'assets/images/products/small-2018061400094111.jpg'),
(66, 'Toontrack Superior Drummer 3 virtuele drums (download)', 'Toontrack Superior Drummer 3 virtuele drums is het nieuwe paradepaardje van het bedrijf dat ons al enorm veel drum-libraries heeft bezorgd. Met 230GB is dit een flinke bak samples, met vele surround-opnames voor de beste mix.', 'drums', '329.00', 27, 'assets/images/products/large-2018061400095012.jpg', 'assets/images/products/small-2018061400095012.jpg'),
(67, 'DW Drums 5000TD4 Turbo bassdrum pedaal', 'Uit de vernieuwde 5000-serie van DW Drums is dit de 5000TD4 Turbo; een enkel bassdrum pedaal dat solide en stabiel aanvoelt. De Tri-Pivot Toe klem zorgt voor extra grip op iedere bassdrum rand, ongeacht de dikte of diameter.', 'drums', '218.00', 21, 'assets/images/products/large-2018061400095613.jpg', 'assets/images/products/small-2018061400095613.jpg'),
(68, 'Devine MIC-DS 7-delige set drum microfoons', 'De Devine MIC-DS set drum microfoons is een professionele microfoonset, bestaande uit 7 microfoons en alle benodigde accessoires om een uitgebreide drumkit te kunnen opnemen. Geleverd in een aluminium opbergkoffer.', 'drums', '125.00', 21, 'assets/images/products/large-2018061400100514.jpg', 'assets/images/products/small-2018061400100514.jpg'),
(69, 'DW Drums 5002TD4 Turbo dubbel bassdrum pedaal', 'Uit de populaire 5000-serie van DW Drums is dit het 5002TD4 Turbo twin-pedaal. Als u voor stabiliteit, duurzaamheid en snelheid gaat, is dit een zeer interessante keuze. Geschikt voor rechtsbenige drummers. ', 'drums', '425.00', 27, 'assets/images/products/large-2018061400101015.jpg', 'assets/images/products/small-2018061400101015.jpg'),
(70, 'Roland PM-03 Personal drum monitor', 'Speciaal voor de V-Drums series heeft Roland een zeer compacte monitor ontwikkeld: de PM-03. Dit stijlvolle 2.1-monitorsysteem staat voor superieure geluidskwaliteit.', 'drums', '167.00', 11, 'assets/images/products/large-2018061400101716.jpg', 'assets/images/products/small-2018061400101716.jpg'),
(71, 'DW Drums 3002 dubbel bassdrumpedaal', 'Dit dubbele bass drum pedaal komt uit de succesvolle 3000-serie van DW Drums. Het gegoten frame, de stalen vloerplaat met klittenband, de dubbele kettingaandrijving; dit is een twin pedaal waar je van op aan kunt! ', 'drums', '208.00', 30, 'assets/images/products/large-2018061400102417.jpg', 'assets/images/products/small-2018061400102417.jpg'),
(72, 'Roland TD-4KP V-Drums Portable elektronisch drumstel', 'Met de TD-4KP biedt Roland u de fameuze V-drum geluidskwaliteit in een handig compact en opvouwbaar formaat. Dit elektronische drumstel is ideaal voor thuis en overal waar u als drummer weinig ruimte hebt.', 'drums', '615.00', 28, 'assets/images/products/large-2018061400103318.jpg', 'assets/images/products/small-2018061400103318.jpg'),
(73, 'Gretsch Drums CT1-J484-SWG Catalina Club 2014 Satin Walnut Glaze', 'Gretsch zet hun Catalina Club serie ook in 2014 voort, voorzien van enkele vernieuwingen. Deze vierdelige jazz shellset heeft mahoniehouten ketels en levert de onvervalste Gretsch sound!', 'drums', '689.00', 30, 'assets/images/products/large-2018061400104019.jpg', 'assets/images/products/small-2018061400104019.jpg'),
(74, 'Dimavery DFM-1000 dubbele bass drum pedal', 'Als u een betaalbare en dubbel voetpedaal zoekt voor gebruik met een bassdrum dan is deze DFM-1000 perfect voor u. Verdubbel gemakkelijk het aantal aanslagen en drum mee met de ruigste muzieksoorten.', 'drums', '117.00', 27, 'assets/images/products/large-2018061400104620.jpg', 'assets/images/products/small-2018061400104620.jpg'),
(75, 'DW Drums Performance Ebony Stain 22 4-delige shellset', 'Deze vierdelige shellset komt uit de Performance serie van DW Drums. De set bestaat uit een 22 x 18 inch bass drum, toms van 10 x 8 en 12 x 9 inch en een floortom van 16 x 14 inch. Afgewerkt in de kleur Ebony Stain. ', 'drums', '2499.00', 7, 'assets/images/products/large-2018061400105321.jpg', 'assets/images/products/small-2018061400105321.jpg'),
(76, 'Overtone Labs Tune Bot Studio stemapparaat voor drums', 'Met de Tune Bot Studio kun je je drumstel snel en precies stemmen. Je kunt afstemmen op frequenties of toonhoogtes zodat je een muzikaal interval op je drumstel kunt maken. Makkelijk op je drums te bevestigen met een clip.', 'drums', '98.00', 14, 'assets/images/products/large-2018061400105922.jpg', 'assets/images/products/small-2018061400105922.jpg'),
(77, 'Clavia Nord Piano 3 stage piano', 'De Nord Piano 3 is de opvolger van de Nord Piano 2 HA88. Dankzij het verbeterde, extra nauwkeurig reagerende klavier en de Virtual Hammer Action Technology zijn de meest subtiele klankvariaties mogelijk met deze stagepiano.', 'piano\'s', '2498.00', 8, 'assets/images/products/large-201806140012330.jpg', 'assets/images/products/small-201806140012330.jpg'),
(78, 'Korg SP280 BK 88 toetsen stage-piano zwart', 'De Korg piano’s staan bekend om hun fijne klavier en mooie geluid. Voor de SP280 BK geldt dat ook, sterker nog: zowel de klank als de feel zijn verbeterd. Wordt geleverd inclusief een onderstel en een sustainpedaal.', 'piano\'s', '622.00', 27, 'assets/images/products/large-201806140012401.jpg', 'assets/images/products/small-201806140012401.jpg'),
(79, 'Yamaha P-45 digitale piano zwart', 'Het ideale instapmodel van Yamaha: de P-45. Deze piano heeft een vergelijkbare aanslag-curve als een akoestische piano. Bovendien worden de klanken optimaal weergegeven middels het speciaal ontwikkelde luidsprekersysteem!', 'piano\'s', '399.00', 20, 'assets/images/products/large-201806140012502.jpg', 'assets/images/products/small-201806140012502.jpg'),
(80, 'Roland FP-30 digitale piano (zwart)', 'Een digitale piano die met zijn lichte gewicht en compacte behuizing gemakkelijk een plek te geven is. De moderne Roland FP-30 (zwart) speelt en klinkt bovendien erg overtuigend, en is voorzien van onder andere Bluetooth.', 'piano\'s', '515.00', 21, 'assets/images/products/large-201806140013003.jpg', 'assets/images/products/small-201806140013003.jpg'),
(81, 'Yamaha P-115B digitale piano zwart', 'Deze Yamaha P-115B biedt unieke mogelijkheden. Dankzij zijn hoogstaande klank is hij geschikt voor veeleisende pianisten terwijl hij eenvoudig genoeg te bedienen is voor startende spelers. Ook te bedienen met iOS!', 'piano\'s', '636.00', 14, 'assets/images/products/large-201806140013094.jpg', 'assets/images/products/small-201806140013094.jpg'),
(82, 'Casio CDP-130 BK Black digitale piano', 'We kunnen bijna geen betere instap-piano bedenken dan de Casio CDP-130 BK (Black). Deze zwarte piano heeft, voor een zeer schappelijke prijs, alle belangrijke features aan boord die u van een digitale piano verwacht.', 'piano\'s', '279.00', 16, 'assets/images/products/large-201806140013195.jpg', 'assets/images/products/small-201806140013195.jpg'),
(83, 'Yamaha DGX-660 digitale piano zwart', 'De DGX-660 is een erg prettige combinatie van klanken, mogelijkheden en looks. Hij past verrassend goed in menig huiskamer, maar biedt de mogelijkheden en klankkwaliteit van een serieus keyboard.', 'piano\'s', '697.00', 12, 'assets/images/products/large-201806140013286.jpg', 'assets/images/products/small-201806140013286.jpg'),
(84, 'Yamaha NP-12 Piaggero keyboard/digitale piano zwart', 'Back to the basics met de NP-12 van Yamaha. De prachtige klank van een Yamaha concertvleugel in een eenvoudig keyboard, super lichtgewicht, werkt ook op batterijen en met ondersteuning voor iOS-apps.', 'piano\'s', '180.00', 7, 'assets/images/products/large-201806140013367.jpg', 'assets/images/products/small-201806140013367.jpg'),
(85, 'Yamaha Arius YDP-143B digitale piano zwart', 'Welke pianomuziek u ook wilt spelen, deze Arius digitale piano staat aan uw zijde. Een prachtige klank van een CF3S-concertvleugel, aangevuld met een fraaie galm, een recorder, dit instrument biedt volop mogelijkheden en fun!', 'piano\'s', '735.00', 6, 'assets/images/products/large-201806140013468.jpg', 'assets/images/products/small-201806140013468.jpg'),
(86, 'Yamaha Arius YDP-163B digitale piano zwart', 'Stijlvol, smaakvol, een streling voor oog en oor, deze termen kunnen alleen maar op de Yamaha Arius YDP-163B slaan. Een mooie digitale piano voor beginners en gevorderden, met de klank van de vermaarde CF3S-concertvleugel.', 'piano\'s', '954.00', 26, 'assets/images/products/large-201806140013559.jpg', 'assets/images/products/small-201806140013559.jpg'),
(87, 'Roland RD-2000 stage piano', 'De Roland RD-2000 stage piano is een oerdegelijk product voor het podium. Propvol pianoklanken, vintage piano\'s, virtuele toonwielorgels, pads en blazers. Met heerlijk spelende gewogen toetsen en audio/MIDI-interface.', 'piano\'s', '2292.00', 15, 'assets/images/products/large-2018061400144011.jpg', 'assets/images/products/small-2018061400144011.jpg'),
(88, 'Roland F-140R WH White digitale piano', 'Wilt u een kwaliteitspiano in uw huiskamer maar ziet u op tegen de vele kostbare modellen op de markt? Misschien is deze F-140R wel iets voor u. Een SuperNATRURAL-engine zorgt voor een prachtklank. Ook voorzien van styles.', 'piano\'s', '879.00', 15, 'assets/images/products/large-2018061400144712.jpg', 'assets/images/products/small-2018061400144712.jpg'),
(89, 'Roland FP-30 digitale piano (wit)', 'Met de FP-30 probeerde Roland zo veel mogelijk functionaliteit in een zo compact mogelijke behuizing te stoppen. En dat lukte. Een natuurlijk geluid en speelgevoel, pianobreed klavier en zelfs functies als Bluetooth.', 'piano\'s', '509.00', 24, 'assets/images/products/large-2018061400145613.jpg', 'assets/images/products/small-2018061400145613.jpg'),
(90, 'Roland GP-7 PE V-Piano Grand digitale vleugel', 'De Roland V-Piano Grand is een avantgardistische digitale vleugel. Voorzien van de V-Piano-techniek, waarmee u uw eigen piano\'s kunt boetseren aan de hand van talloze parameters. Prachtig klinkend door meerkanaals versterker.', 'piano\'s', '18166.00', 29, 'assets/images/products/large-2018061400150114.jpg', 'assets/images/products/small-2018061400150114.jpg'),
(91, 'Yamaha CLP-635B Clavinova digitale piano zwart', 'Met deze Clavinova klinkt en voelt het alsof je op een akoestiche piano speelt. Realistische klanken van onder andere CFX- en Bösendorfer Imperial concertvleugels. Met Hammer Action toetsen en virtuele resonantie.', 'piano\'s', '1527.00', 17, 'assets/images/products/large-2018061400150915.jpg', 'assets/images/products/small-2018061400150915.jpg'),
(92, 'Clavia Nord Electro 5D 73', 'Zijn rode uiterlijk springt eruit op het podium maar zijn geluiden zijn werkelijk fenomenaal. De Nord Electro 5D 73 heeft een stevige update ondergaan en heeft veel meegekregen van de Nord Stage 2. Een echt podiumbeest!', 'piano\'s', '1689.00', 19, 'assets/images/products/large-2018061400151816.jpg', 'assets/images/products/small-2018061400151816.jpg'),
(93, 'Yamaha Clavinova CVP-705B Black Walnut digitale piano', 'Behalve een fraai meubelstuk, is de matzwarte Yamaha CVP-705B (Black Walnut) vooral een zeer uitgebreide en realistisch spelende digitale piano met onder meer Natural Wood-klavier, backing styles en touchscreen.', 'piano\'s', '4241.00', 15, 'assets/images/products/large-2018061400152617.jpg', 'assets/images/products/small-2018061400152617.jpg'),
(94, 'Roland FP-90-BK Premium Portable digitale piano zwart', 'De Roland FP-90 is een serieuze digitale piano met ongekende mogelijkheden. Deze schitterende zwarte uitvoering laat zich van zijn beste kant zien. Roland heeft de FP-90 voorzien van 88 aanslaggevoelige toetsen.', 'piano\'s', '1444.00', 12, 'assets/images/products/large-2018061400153418.jpg', 'assets/images/products/small-2018061400153418.jpg'),
(95, 'Roland F-140R CB Contemporary Black digitale piano', 'Eenvoud, compact, en toch een heleboel charme in deze Roland digitale piano. Door de SuperNATURAL-engine is de pianoklank tot in de puntjes verzorgd. Inclusief leuke styles om zelf liedjes te spelen. Ideaal voor starters.', 'piano\'s', '908.00', 20, 'assets/images/products/large-2018061400154319.jpg', 'assets/images/products/small-2018061400154319.jpg'),
(96, 'Roland GO-61P GO:PIANO digitale piano, 61 toetsen', 'Altijd al piano willen spelen? Deze 61 toetsen variant neem je makkelijk met je mee. Hij heeft hetzelfde speelgevoel en klank als de topmodellen van Roland, maar dan in een budgetvriendelijk jasje.', 'piano\'s', '259.00', 8, 'assets/images/products/large-2018061400155320.jpg', 'assets/images/products/small-2018061400155320.jpg'),
(97, 'Roland LX-7 PE Polished Ebony digitale piano', 'Houdt u ook van die schitterende klanken van de piano? Deze Roland is voorzien van de SuperNATURAL-technologie, waardoor deze die klanken zo realistisch mogelijk kan reproduceren. ', 'piano\'s', '3699.00', 15, 'assets/images/products/large-2018061400160221.jpg', 'assets/images/products/small-2018061400160221.jpg'),
(98, 'Cherub WTB-004 sustainpedaal', 'Laat uw muziek langer doorklinken met dit solide sustainpedaal van Cherub. De WTB-004 is erg breed te gebruiken dankzij een schakelaar, waarmee de polariteit om te keren is.', 'piano\'s', '15.00', 16, 'assets/images/products/large-201806140020110.jpg', 'assets/images/products/small-201806140020110.jpg'),
(99, 'Innox PB 20W piano / orgel bank wit', 'De witte Innox PB 20W piano / orgel bank zorgt ervoor dat u altijd heerlijk zit achter uw toetsinstrument. Het grootste comfort komt van het gevoerde kussen. Onder de zitting is een opbergvak waar u van alles kwijt kunt.', 'piano\'s', '48.00', 24, 'assets/images/products/large-201806140020171.jpg', 'assets/images/products/small-201806140020171.jpg'),
(100, 'Innox PB 30RB pianobank rood / bruin', 'Als u graag een lange periode speelt dan is een juiste houding belangrijk. De Innox PB 30RB is een chique pianobank in een bijzondere rode kleur. Met een breed zitvlak van kunstleer voelt u zich de koning te rijk.', 'piano\'s', '76.00', 22, 'assets/images/products/large-201806140020252.jpg', 'assets/images/products/small-201806140020252.jpg'),
(101, 'Innox PB 30W pianobank wit', 'De Innox PB 30W is een luxe pianokruk die in hoogte te verstellen is van 49 tot en met 58.5 centimeter, waardoor deze bank geschikt is voor vrijwel iedereen. De kunstlederen zitting is bovendien bijzonder comfortabel.', 'piano\'s', '76.00', 25, 'assets/images/products/large-201806140020353.jpg', 'assets/images/products/small-201806140020353.jpg'),
(102, '(B-Stock) Innox PB 30BR pianobank bruin', 'Wanneer u een mooie piano heeft staan gemaakt van bijvoorbeeld eiken-, of kersenhout dan passen niet alle pianobanken daar even mooi bij. In dat geval biedt Innox een goed alternatief met deze luxe, bruine PB 30BR.', 'piano\'s', '77.00', 27, 'assets/images/products/large-201806140020474.jpg', 'assets/images/products/small-201806140020474.jpg'),
(103, 'Innox PB 30BR pianobank bruin', 'Wanneer u een mooie piano heeft staan gemaakt van bijvoorbeeld eiken-, of kersenhout dan passen niet alle pianobanken daar even mooi bij. In dat geval biedt Innox een goed alternatief met deze luxe, bruine PB 30BR.', 'piano\'s', '79.00', 14, 'assets/images/products/large-201806140020545.jpg', 'assets/images/products/small-201806140020545.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `PRODUCT_GERELATEERD_PRODUCT`
--

CREATE TABLE `PRODUCT_GERELATEERD_PRODUCT` (
  `PRODUCTNUMMER` int(11) NOT NULL,
  `PRODUCTNUMMER_GERELATEERD_PRODUCT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  ADD PRIMARY KEY (`CATEGORIENAAM`);

--
-- Indexen voor tabel `GEBRUIKER`
--
ALTER TABLE `GEBRUIKER`
  ADD PRIMARY KEY (`GEBRUIKERSNAAM`);

--
-- Indexen voor tabel `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`PRODUCTNUMMER`),
  ADD UNIQUE KEY `UK_PRODUCTNAAM` (`PRODUCTNAAM`),
  ADD KEY `FK_PRODUCT_CATEGORIE` (`CATEGORIE`);

--
-- Indexen voor tabel `PRODUCT_GERELATEERD_PRODUCT`
--
ALTER TABLE `PRODUCT_GERELATEERD_PRODUCT`
  ADD PRIMARY KEY (`PRODUCTNUMMER`,`PRODUCTNUMMER_GERELATEERD_PRODUCT`),
  ADD KEY `FK2_PRODUCT_GERELATEERD_PRODUCT` (`PRODUCTNUMMER_GERELATEERD_PRODUCT`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `PRODUCTNUMMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `FK_PRODUCT_CATEGORIE` FOREIGN KEY (`CATEGORIE`) REFERENCES `CATEGORIE` (`CATEGORIENAAM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `PRODUCT_GERELATEERD_PRODUCT`
--
ALTER TABLE `PRODUCT_GERELATEERD_PRODUCT`
  ADD CONSTRAINT `FK1_PRODUCT_GERELATEERD_PRODUCT` FOREIGN KEY (`PRODUCTNUMMER`) REFERENCES `PRODUCT` (`PRODUCTNUMMER`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK2_PRODUCT_GERELATEERD_PRODUCT` FOREIGN KEY (`PRODUCTNUMMER_GERELATEERD_PRODUCT`) REFERENCES `PRODUCT` (`PRODUCTNUMMER`) ON DELETE NO ACTION ON UPDATE NO ACTION;
