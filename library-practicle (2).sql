-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 02 2021 г., 09:29
-- Версия сервера: 5.6.51
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library-practicle`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id_author` int(11) NOT NULL,
  `name_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id_author`, `name_author`) VALUES
(1, 'Джорж Лукас'),
(2, 'Джордж Лукас'),
(3, 'Анджей Сапковский'),
(4, ' Анджей Сапковский');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id_book` int(11) NOT NULL,
  `title_book` varchar(255) NOT NULL,
  `genre_book` varchar(255) NOT NULL,
  `desc_book` text NOT NULL,
  `img_book` varchar(255) NOT NULL,
  `year_book` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id_book`, `title_book`, `genre_book`, `desc_book`, `img_book`, `year_book`) VALUES
(23, 'Star Wars:High Republic', 'Фантастика', '12345678905432123456789876543', 'assets/vendor/books/6197d8c35f46eunknown.png', '2021'),
(29, 'Ведьмак: Кровь Эльфов', 'Фэнтези', 'Ведьмак — это мастер меча и мэтр волшебства, ведущий непрерыв иую войну с кровожадными монстрами, которые угрожают покою сказоч ной страны.\r\n.«Ведьмак» — это мир на острие меча, ошеломляющее действие, неза бываемые ситуации, великолепные боевые сцены.', 'assets/vendor/books/6197e728516101020243104.jpg', '1991'),
(30, 'Типо книга', 'ТМПО', '1234567890-=', 'assets/vendor/books/6197e96f6cce70XVfJumRZq0.jpg', '2021'),
(31, 'Типо книга', 'ТМПО', '1234567890-=', 'assets/vendor/books/6197e96f6cce70XVfJumRZq0.jpg', '2021');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(600) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `status`) VALUES
(9, 'Александр Лиджиев', 'sashawot060@gmail.com', '202cb962ac59075b964b07152d234b70', 'assets/vendor/avatars/618d00ae959e5WV4h9TVBw90.jpg', 10),
(11, 'Анна Лиджиева', 'anyalidjieva08@mail.ru', '202cb962ac59075b964b07152d234b70', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `usersbooks`
--

CREATE TABLE `usersbooks` (
  `id_b` int(11) NOT NULL,
  `id_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usersbooks`
--

INSERT INTO `usersbooks` (`id_b`, `id_a`) VALUES
(23, 2),
(30, 2),
(29, 3),
(30, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id_author`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usersbooks`
--
ALTER TABLE `usersbooks`
  ADD PRIMARY KEY (`id_b`,`id_a`),
  ADD KEY `id_a` (`id_a`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `usersbooks`
--
ALTER TABLE `usersbooks`
  ADD CONSTRAINT `usersbooks_ibfk_1` FOREIGN KEY (`id_a`) REFERENCES `authors` (`id_author`),
  ADD CONSTRAINT `usersbooks_ibfk_2` FOREIGN KEY (`id_b`) REFERENCES `books` (`id_book`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
