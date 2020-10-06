-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 27 2020 г., 00:46
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--
CREATE DATABASE IF NOT EXISTS `gallery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `gallery`;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `userName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateFeed` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goodId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `userName`, `text`, `dateFeed`, `goodId`) VALUES
(14, 'John', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.', '2020-08-26 21:54:17', 3),
(15, 'Anna', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.', '2020-08-26 22:33:46', 3),
(16, 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.', '2020-08-26 22:34:56', 1),
(17, 'Alex', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.', '2020-08-26 22:35:34', 2),
(18, 'Гога', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.', '2020-08-26 22:35:48', 2),
(19, 'Boss', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.', '2020-08-26 22:47:29', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Описание товара.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `url`, `price`, `description`) VALUES
(1, 'Товар 1', '/img/1.jpg  ', '100', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.'),
(2, 'Товар 2', '/img/2.jpg', '150', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.'),
(3, 'Товар 3', '/img/3.jpg  ', '177', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.'),
(4, 'Товар 4', '/img/4.jpg  ', '320', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.'),
(5, 'Товар 5', '/img/5.jpg  ', '4000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
