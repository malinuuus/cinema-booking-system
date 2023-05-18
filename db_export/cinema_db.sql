-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Maj 2023, 09:52
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
(1, 'Jan', 'Kowalski', 'jan@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$bUI5UGd5YTlzT1F2M0FNUQ$M2hwOF15YoIkewiMQSlCxObLaiBobvSk/M7q+hUU4TE', 1),
(3, 'Tomasz', 'Malinowski', 'tomasz.malinowski1812@gmail.com', NULL, 0);

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
(3, 'Animowany');

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
  `genre_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `premiere_date`, `duration`, `genre_id`) VALUES
(1, 'Strażnicy galaktyki', 'W „Strażnikach Galaktyki vol. 3” Marvel Studios nasza ulubiona banda odmieńców wygląda obecnie trochę inaczej. Po nabyciu Knowhere od Kolekcjonera Strażnicy pracują nad naprawieniem ogromnych szkód wyrządzonych przez Thanosa — zdeterminowani, by uczynić Knowhere bezpiecznym schronieniem nie tylko dla nich samych, ale także dla wszystkich uchodźców wysiedlonych przez surowy wszechświat. Ale wkrótce ich życie zostaje wywrócone do góry nogami przez echa burzliwej przeszłości Rocketa. Peter Quill, wciąż niepogodzony ze stratą Gamory, musi zebrać wokół siebie swoją bandę na niebezpieczną misję ratowania życia Rocketa — misję, która, jeśli nie zakończy się powodzeniem, może doprowadzić do końca Strażników w dotychczasowej formie.\r\n\r\n', '2023-05-05', 150, 1),
(2, 'Martwe Zło: Przebudzenie', 'Akcja filmu Martwe zło: Przebudzenie przenosi się z lasu do miasta. Fabuła opowiada o dwóch nieutrzymujących ze sobą kontaktu siostrach (w ich rolach Sutherland i Sullivan). Ich spotkanie zostaje przerwane pojawieniem się demonów, które potrafią przejmować panowanie nad ludzkimi ciałami. W obliczu najkoszmarniejszej wersji rodziny, jaką można sobie wyobrazić, siostry zmuszone są podjąć brutalną walkę o przetrwanie.', '2023-04-21', 97, 2),
(3, 'Super Mario Bros. Film', 'Animacja jest wyprodukowana przez Chrisa Meledandri z Illumination („Minionki”) oraz Shigeru Miyamoto z Nintendo. „Super Mario Bros” jest oparty na kultowej grze komputerowej z lat osiemdziesiątych . Głosów użyczyli min: Chris Pratt jako Mario oraz Anya Taylor-Joy jako księżniczka Peach.', '2023-05-26', 92, 3);

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
  `seat_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`id`, `ticket_number`, `is_paid`, `screening_id`, `customer_id`, `seat_id`) VALUES
(1, 'cm2mcj2ma', 1, 1, 1, 4),
(2, '3dsamidz', 0, 6, 1, 13),
(3, '3dsamidz', 0, 6, 1, 14),
(4, '3dsamidz', 0, 6, 1, 15);

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
(1, '2023-05-14', '14:20:00', 28.9, 1, 1, 2),
(2, '2023-05-14', '17:40:00', 26.9, 0, 1, 2),
(3, '2023-05-15', '12:00:00', 28.9, 1, 1, 1),
(4, '2023-05-13', '12:30:00', 26, 0, 1, 2),
(5, '2023-05-13', '21:20:00', 22.9, 1, 2, 1),
(6, '2023-05-15', '15:40:00', 22.9, 0, 3, 1);

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
-- AUTO_INCREMENT dla tabeli `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `screenings`
--
ALTER TABLE `screenings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
