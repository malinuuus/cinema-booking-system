-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Cze 2023, 13:48
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
(6, 'Jannn', 'Kowalski', 'jan@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$T2V5RTRpQnY5elhrbk9wVg$ltBwKWSNGz+9X/NSIWdxKnQy6jMK47rKlKKBoVuszE8', 1),
(21, 'Maria', 'Najzer', 'marianajzer@gmail.com', NULL, 0),
(22, 'Maria', 'Najzer', 'marianajzer@gmail.com1111', '$2y$10$rW1PgxYYNJ5b1ay2M99MpObcmE0lzXPrCP5svFZgxckjgXS7rEVsS', 1),
(27, 'zuzia', 'now', 'zuz@gmail.com', '$2y$10$wP7fSpQ4ZMqcOLksRuzH.u0ktXfcDWR4AK/nxKNJAAwvLGWxRUDwK', 1),
(28, 'zuzia', 'now', 'zuz@gmail.com11111', NULL, 0),
(29, 'zuzia', 'now', 'zuz@gmail.com111', NULL, 0);

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
(4, 'Sensacyjny');

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
  `cover_path` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `premiere_date`, `duration`, `genre_id`, `cover_path`) VALUES
(1, 'Strażnicy galaktyki', 'W „Strażnikach Galaktyki vol. 3” Marvel Studios nasza ulubiona banda odmieńców wygląda obecnie trochę inaczej. Po nabyciu Knowhere od Kolekcjonera Strażnicy pracują nad naprawieniem ogromnych szkód wyrządzonych przez Thanosa — zdeterminowani, by uczynić Knowhere bezpiecznym schronieniem nie tylko dla nich samych, ale także dla wszystkich uchodźców wysiedlonych przez surowy wszechświat. Ale wkrótce ich życie zostaje wywrócone do góry nogami przez echa burzliwej przeszłości Rocketa. Peter Quill, wciąż niepogodzony ze stratą Gamory, musi zebrać wokół siebie swoją bandę na niebezpieczną misję ratowania życia Rocketa — misję, która, jeśli nie zakończy się powodzeniem, może doprowadzić do końca Strażników w dotychczasowej formie.\r\n\r\n', '2023-05-05', 150, 1, './images/movies/straznicy.jpg'),
(3, 'Super Mario Bros. Film', 'Animacja jest wyprodukowana przez Chrisa Meledandri z Illumination („Minionki”) oraz Shigeru Miyamoto z Nintendo. „Super Mario Bros” jest oparty na kultowej grze komputerowej z lat osiemdziesiątych . Głosów użyczyli min: Chris Pratt jako Mario oraz Anya Taylor-Joy jako księżniczka Peach.', '2023-05-26', 92, 3, './images/movies/super-mario.jpg'),
(8, 'Szybcy i wściekli 10', 'Dziesiąty film sagi „Szybcy i wściekli” rozpoczyna ostatni rozdział jednej z najbardziej popularnych globalnych franczyz, która trwa już trzecią dekadę i ma niesłabnącą popularność. W ciągu wielu misji i wbrew przeciwnościom losu Dom Toretto (Vin Diesel) i jego rodzina przechytrzyli i prześcignęli każdego wroga na swojej drodze. Teraz muszą zmierzyć się z najgroźniejszym przeciwnikiem, z jakim kiedykolwiek mieli do czynienia.', '2023-05-19', 141, 4, NULL),
(12, 'Martwe Zło. Przebudzenie', 'Opowieść o dwóch zranionych siostrach, których spotkanie przerywa pojawienie się opętanych demonów.', '2023-03-15', 98, 2, NULL),
(14, 'Martwe Zło. Przebudzenie', 'Opowieść o dwóch zranionych siostrach, których spotkanie przerywa pojawienie się opętanych demonów.', '2023-06-11', 110, 2, NULL);

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
(9, '6485b23291c14', 1, 16, 29, 10, '2023-06-11 13:38:26');

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
(22, '2023-06-14', '12:20:00', 28.9, 1, 8, 2);

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
(14, 4, 2, 1),
(15, 4, 3, 1);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `screenings`
--
ALTER TABLE `screenings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
