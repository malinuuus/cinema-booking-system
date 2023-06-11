-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Cze 2023, 20:12
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cinema_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '$argon2i$v=19$m=16,t=2,p=1$V0R6OEtlRFJLb09iZUdEVQ$7/hsGX9hc+hEOYeS2Gn0Lg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`, `is_user`) VALUES
(6, 'Jan', 'Kowalski', 'jan@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$T2V5RTRpQnY5elhrbk9wVg$ltBwKWSNGz+9X/NSIWdxKnQy6jMK47rKlKKBoVuszE8', 1),
(21, 'Maria', 'Najzer', 'marianajzer@gmail.com', NULL, 0),
(22, 'Jan', 'Nowak', 'jannowak@wp.pl', '$2y$10$rW1PgxYYNJ5b1ay2M99MpObcmE0lzXPrCP5svFZgxckjgXS7rEVsS', 1),
(28, 'zuzia', 'now', 'zuz@gmail.com11111', NULL, 0),
(29, 'zuzia', 'now', 'zuz@gmail.com111', NULL, 0),
(30, 'Anna', 'Nowak', 'anna.n@gmail.com', '$2y$10$vhtGGox.SBVQEJn5ZzTxJOLUzrDSIkOC4K.Ma7lKWH33FGsBLINYq', 1),
(31, 'Maria', 'Najzer', 'marianajzer@gmail.com', '$2y$10$gamCl6MdEYVBhX4sScysXeStUfhSBUeslC97WZOHbBMaQclNOu4I.', 1),
(32, 'Robert ', 'Nowak', 'rob@gmail.com', '$2y$10$p7iCiEbnI9DRgZpGKTy1ae/uvrn6C1yMU7fAPzZSdxzbKw1BaZepK', 1),
(33, 'Jann', 'Nowak', 'j@gmail.com1', NULL, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Akcja'),
(2, 'Horror'),
(3, 'Animowany'),
(4, 'Sensacyjny'),
(5, 'Komedia'),
(6, 'Dramat'),
(7, 'Fantasy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `premiere_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `genre_id` int(11) UNSIGNED NOT NULL,
  `cover_path` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `premiere_date`, `duration`, `genre_id`, `cover_path`) VALUES
(1, 'Strażnicy galaktyki', 'W „Strażnikach Galaktyki vol. 3” Marvel Studios nasza ulubiona banda odmieńców wygląda obecnie trochę inaczej. Po nabyciu Knowhere od Kolekcjonera Strażnicy pracują nad naprawieniem ogromnych szkód wyrządzonych przez Thanosa — zdeterminowani, by uczynić Knowhere bezpiecznym schronieniem nie tylko dla nich samych, ale także dla wszystkich uchodźców wysiedlonych przez surowy wszechświat. Ale wkrótce ich życie zostaje wywrócone do góry nogami przez echa burzliwej przeszłości Rocketa. Peter Quill, wciąż niepogodzony ze stratą Gamory, musi zebrać wokół siebie swoją bandę na niebezpieczną misję ratowania życia Rocketa — misję, która, jeśli nie zakończy się powodzeniem, może doprowadzić do końca Strażników w dotychczasowej formie.\r\n\r\n', '2023-05-05', 150, 1, './images/movies/straznicy.jpg'),
(3, 'Super Mario Bros. Film', 'Animacja jest wyprodukowana przez Chrisa Meledandri z Illumination („Minionki”) oraz Shigeru Miyamoto z Nintendo. „Super Mario Bros” jest oparty na kultowej grze komputerowej z lat osiemdziesiątych . Głosów użyczyli min: Chris Pratt jako Mario oraz Anya Taylor-Joy jako księżniczka Peach.', '2023-05-26', 92, 3, './images/movies/super-mario.jpg'),
(12, 'Martwe Zło. Przebudzenie', 'Opowieść o dwóch zranionych siostrach, których spotkanie przerywa pojawienie się opętanych demonów.', '2023-03-15', 98, 2, './images/movies/6486034fdf8a9-martwezlo.jpg'),
(15, 'Boogeyman', 'Nastolatka i jej mały braciszek próbują odnaleźć się w świecie po śmierci matki, gdy na ich drodze staje nowe zagrożenie – złowroga siła, która wybrała sobie ich na swoje ofiary.', '2023-06-02', 98, 2, './images/movies/64860b3468cfb-booge.jpg'),
(18, 'Transformers: Przebudzenie Bestii', 'Akcja filmu “Transformers: Przebudzenie Bestii” będzie miała miejsce w latach 90-tych i zabierze widzów w podróż dookoła świata. Do odwiecznej wojny między Autobotami i Deceptikonami dołączą nowe frakcje: Maximale, Predacony oraz Terracony. Reżyserem fimu jest Steven Caple Jr. W filmie zobaczymy: Anthony’ego Ramosa i Dominique’a Fishbacka.', '2023-06-09', 127, 1, './images/movies/6485fc8c9debd-transformers.jpg'),
(20, 'SPIDER-MAN: POPRZEZ MULTIWERSUM', '“Spider-Man: Across the Spider-Verse” (Part One) jest kontynuacją filmu z 2018 roku „Spider-Man Universum”, który cieszył się popularnością widzów na całym świecie i zarobił 375 mln dolarów. Film został nagrodzony Oscarem® dla najlepszej animacji.', '2023-06-02', 137, 3, './images/movies/648608eb5f457-spiderman.png'),
(21, 'Szybcy i wściekli 10', 'Dziesiąty film sagi „Szybcy i wściekli” rozpoczyna ostatni rozdział jednej z najbardziej popularnych globalnych franczyz, która trwa już trzecią dekadę i ma niesłabnącą popularność. W ciągu wielu misji i wbrew przeciwnościom losu Dom Toretto (Vin Diesel) i jego rodzina przechytrzyli i prześcignęli każdego wroga na swojej drodze. Teraz muszą zmierzyć się z najgroźniejszym przeciwnikiem, z jakim kiedykolwiek mieli do czynienia.', '2023-05-19', 141, 4, './images/movies/64860986c01a0-szybcy.jpg'),
(22, 'Mafia Mamma', 'Główną bohaterką „Mafia Mamma” jest Kristin (Toni Collette), która ma wrażenie, że nic ekscytującego jej już w życiu nie czeka. Dzieci wyfrunęły z gniazda, a mąż od dawna woli dziobać poza domem. Gdy z Włoch nadchodzi wiadomość o śmierci dziadka, Kristin wyrusza na pogrzeb, który wywróci jej życie do góry nogami. Uroczy staruszek przed śmiercią uczynił Kristin jedyną spadkobierczynią swojego biznesu. A że parał się dość nielegalnym zajęciem, wnuczka staje przed poważnym wyzwaniem. Dziadzio był szefem groźnej mafijnej rodziny, a jego śmierć zaostrzyła apetyt konkurencyjnych rodów. Kristin będzie musiała zamienić wałek do ciasta na kij baseballowy, a miotłę na karabin, jeśli sama nie chce skończyć w betonowych trzewikach. Strzeżcie się matki chrzestnej!', '2023-05-26', 102, 5, './images/movies/64860a8a7a6b4-mafia.jpg'),
(23, 'Mała syrenka', 'Mała Syrenka to wyreżyserowana przez specjalistę od musicali – Boba Marshalla – aktorska wersja nagrodzonej Oscarami klasycznej animacji Disneya, która pojawi się w kinach 26 maja 2023 roku. To popularna historia pięknej, odważnej i żądnej przygód syrenki Arielki - najmłodszej i najbardziej niepokornej córki Trytona – króla mórz i oceanów. Fascynacja światem ludzi ciągnie ją na powierzchnię, gdzie trafia na przystojnego księcia Eryka i z miejsca się w nim zakochuje. Mimo wszelkich zakazów, Ariel podąża za głosem serca i zawiera pakt z podstępną morską wiedźmą Urszulą. Syrenka będzie mogła żyć na lądzie, ale cena okaże się bardzo wysoka.', '2023-05-26', 135, 7, './images/movies/64860afba0c65-syrenka.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_number` varchar(20) NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `screening_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `seat_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`id`, `ticket_number`, `is_paid`, `screening_id`, `customer_id`, `seat_id`, `created_at`) VALUES
(1, '6482548e47ca1', 1, 2, 6, 22, '2023-06-09 00:22:06'),
(2, '6482548e47ca1', 1, 2, 6, 23, '2023-06-09 00:22:06'),
(3, '64834aa589e93', 1, 3, 21, 4, '2023-06-09 17:52:05'),
(4, '64834aa589e93', 1, 3, 21, 6, '2023-06-09 17:52:05'),
(5, '6485a9814b786', 1, 16, 22, 13, '2023-06-11 13:01:21'),
(6, '6485a9946022d', 1, 16, 6, 14, '2023-06-11 13:01:40'),
(7, '6485a9946022d', 1, 16, 6, 15, '2023-06-11 13:01:40'),
(8, '6485af3f6a0a8', 1, 2, 28, 15, '2023-06-11 13:25:51'),
(9, '6485b23291c14', 1, 16, 29, 10, '2023-06-11 13:38:26'),
(10, '64860bcc492ad', 1, 33, 30, 16, '2023-06-11 20:00:44'),
(11, '64860bcc492ad', 1, 33, 30, 17, '2023-06-11 20:00:44'),
(12, '64860c2d469ca', 1, 23, 30, 19, '2023-06-11 20:02:21'),
(13, '64860cc05a222', 1, 23, 6, 26, '2023-06-11 20:04:48'),
(14, '64860cc05a222', 1, 23, 6, 28, '2023-06-11 20:04:48'),
(15, '64860cc063504', 1, 26, 32, 1, '2023-06-11 20:04:48'),
(16, '64860cc063504', 1, 26, 32, 2, '2023-06-11 20:04:48'),
(17, '64860d3a20f78', 1, 23, 30, 24, '2023-06-11 20:06:50'),
(18, '64860d43e1865', 1, 23, 6, 29, '2023-06-11 20:06:59'),
(19, '64860d90d4e93', 1, 23, 33, 16, '2023-06-11 20:08:16');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `screenings`
--

CREATE TABLE `screenings` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` double NOT NULL,
  `is_subtitles` tinyint(1) NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `hall_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `screenings`
--

INSERT INTO `screenings` (`id`, `date`, `time`, `price`, `is_subtitles`, `movie_id`, `hall_number`) VALUES
(2, '2023-06-11', '17:50:00', 26.9, 1, 1, 1),
(3, '2023-06-11', '12:00:00', 28.9, 1, 1, 1),
(6, '2023-06-13', '15:40:00', 22.9, 0, 3, 1),
(16, '2023-06-11', '19:20:00', 26.99, 0, 1, 1),
(23, '2023-06-12', '16:00:00', 28.9, 1, 12, 2),
(24, '2023-06-12', '14:40:00', 27.9, 1, 12, 2),
(25, '2023-06-13', '21:20:00', 28.9, 0, 15, 2),
(26, '2023-06-14', '22:50:00', 25.9, 0, 15, 1),
(27, '2023-06-15', '18:50:00', 28.9, 1, 1, 2),
(28, '2023-06-15', '13:10:00', 23.9, 0, 3, 1),
(29, '2023-06-15', '14:20:00', 28.9, 1, 1, 2),
(30, '2023-06-16', '15:45:00', 28.9, 1, 18, 2),
(31, '2023-06-16', '18:45:00', 28.9, 1, 18, 2),
(32, '2023-06-15', '16:20:00', 27.99, 1, 3, 2),
(33, '2023-06-13', '12:00:00', 26.9, 1, 20, 2),
(34, '2023-06-15', '15:15:00', 26.9, 1, 21, 1),
(35, '2023-06-18', '19:30:00', 27.99, 1, 20, 2),
(36, '2023-06-15', '18:00:00', 28.9, 0, 21, 1),
(37, '2023-06-18', '21:40:00', 26.99, 1, 20, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seats`
--

CREATE TABLE `seats` (
  `id` int(10) UNSIGNED NOT NULL,
  `row` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `hall_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `seats`
--

INSERT INTO `seats` (`id`, `row`, `number`, `hall_number`) VALUES
(27, 0, 0, 0),
(1, 1, 1, 1),
(16, 1, 1, 2),
(2, 1, 2, 1),
(17, 1, 2, 2),
(3, 1, 3, 1),
(18, 1, 3, 2),
(4, 1, 4, 1),
(11, 1, 5, 1),
(5, 2, 1, 1),
(19, 2, 1, 2),
(6, 2, 2, 1),
(20, 2, 2, 2),
(7, 2, 3, 1),
(21, 2, 3, 2),
(8, 2, 4, 1),
(9, 2, 5, 1),
(10, 3, 1, 1),
(22, 3, 1, 2),
(12, 3, 2, 1),
(23, 3, 2, 2),
(24, 3, 3, 2),
(25, 3, 4, 2),
(13, 4, 1, 1),
(26, 4, 1, 2),
(14, 4, 2, 1),
(28, 4, 2, 2),
(15, 4, 3, 1),
(29, 4, 3, 2),
(30, 5, 1, 1),
(31, 5, 2, 1),
(32, 5, 3, 1),
(33, 5, 4, 1),
(34, 5, 5, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `screening_id` (`screening_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indeksy dla tabeli `screenings`
--
ALTER TABLE `screenings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indeksy dla tabeli `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`row`,`number`,`hall_number`) USING BTREE;

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `screenings`
--
ALTER TABLE `screenings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Ograniczenia dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`screening_id`) REFERENCES `screenings` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`);

--
-- Ograniczenia dla tabeli `screenings`
--
ALTER TABLE `screenings`
  ADD CONSTRAINT `screenings_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
