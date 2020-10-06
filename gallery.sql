-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 06 2020 г., 22:02
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
(24, 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.', '2020-09-02 21:31:51', 1),
(25, 'Admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.', '2020-09-02 21:32:42', 1),
(32, 'Anna', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2020-10-06 21:18:32', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgName` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Описание товара.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `imgName`, `price`, `description`) VALUES
(1, 'Товар 1', '1.jpg  ', '100', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.'),
(2, 'Товар 2', '2.jpg  ', '150', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.'),
(3, 'Товар 3', '3.jpg  ', '177', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.'),
(4, 'Товар 4', '4.jpg  ', '320', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.'),
(35, 'Товар 5', '5.jpg', '4000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, nihil.');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `items` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_order` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_order` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `items`, `status`, `full_name`, `address`, `comment_order`, `payment_method`, `date_order`, `total_price`) VALUES
(31, 50, '{\"2\":{\"id\":\"2\",\"imgName\":\"2.jpg  \",\"name\":\"Товар 2\",\"price\":\"150\",\"count\":1},\"3\":{\"id\":\"3\",\"imgName\":\"3.jpg  \",\"name\":\"Товар 3\",\"price\":\"177\",\"count\":1},\"35\":{\"id\":\"35\",\"imgName\":\"5.jpg\",\"name\":\"Товар 5\",\"price\":\"4000\",\"count\":2}}', 'Заказан', 'Иванова Анна Ивановна', 'г. Сочи', 'Бееееееее', 'Наличный', '2020-10-06 21:34:41', '8327'),
(32, 50, '{\"4\":{\"id\":\"4\",\"imgName\":\"4.jpg  \",\"name\":\"Товар 4\",\"price\":\"320\",\"count\":10}}', 'Оплачен', 'Иванова Анна Ивановна', 'г. Сочи', 'No comment', 'Безаличный', '2020-10-06 21:35:22', '3200'),
(33, 51, '{\"2\":{\"id\":\"2\",\"imgName\":\"2.jpg  \",\"name\":\"Товар 2\",\"price\":\"150\",\"count\":3},\"1\":{\"id\":\"1\",\"imgName\":\"1.jpg  \",\"name\":\"Товар 1\",\"price\":\"100\",\"count\":3},\"3\":{\"id\":\"3\",\"imgName\":\"3.jpg  \",\"name\":\"Товар 3\",\"price\":\"177\",\"count\":3},\"4\":{\"id\":\"4\",\"imgName\":\"4.jpg  \",\"name\":\"Товар 4\",\"price\":\"320\",\"count\":2},\"35\":{\"id\":\"35\",\"imgName\":\"5.jpg\",\"name\":\"Товар 5\",\"price\":\"4000\",\"count\":3}}', 'Ожидает обработки', 'Петров Алексей Петрович', 'г. Москва', 'sdvsdv', 'Наличный', '2020-10-06 21:37:09', '13921'),
(34, 51, '{\"2\":{\"id\":\"2\",\"imgName\":\"2.jpg  \",\"name\":\"Товар 2\",\"price\":\"150\",\"count\":1}}', 'Доставлен', 'Петров Алексей Петрович', 'г. Москва', 'No comment', 'Безаличный', '2020-10-06 21:41:32', '150');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `userName`, `login`, `password`, `is_admin`) VALUES
(3, 'Администратор', 'admin', '$2y$10$Wm3Wvw202AHNNGO60cxEXusWZloxsrNhiBg8nQgT9nox5l/ton65u', 1),
(50, 'Анна', 'anna-gb', '$2y$10$FMgR/hoTXxFUlLAucg2nb.guf/7DO9Un3EGCoo4zGLK7Ie29OSItm', 0),
(51, 'Алексей', 'alex_77', '$2y$10$0ZtiaaD/8Qp.Yqh.EdffT.1ZXS3Qwote32Jz9op7CzovLeYExaR3C', 0);

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
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
