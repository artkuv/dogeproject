-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Вер 10 2018 р., 20:31
-- Версія сервера: 5.7.20
-- Версія PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `my_twitter`
--

-- --------------------------------------------------------

--
-- Структура таблиці `followers`
--

CREATE TABLE `followers` (
  `user_id` int(11) NOT NULL,
  `follows_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `followers`
--

INSERT INTO `followers` (`user_id`, `follows_user_id`) VALUES
(14, 10),
(14, 11),
(14, 13);

-- --------------------------------------------------------

--
-- Структура таблиці `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `content`, `date_created`, `date_updated`) VALUES
(1, 13, 'My first tweet', 1536564687, 1536564687),
(2, 13, 'My second tweet', 1536564902, 1536564902),
(3, 13, 'Add third tweet in my feed', 1536564913, 1536564913),
(4, 13, 'Aloha! This is a fourth tweet :)', 1536575429, 1536575429),
(5, 14, 'Hello, world!', 1536582421, 1536582421),
(6, 14, 'Second message on this site!', 1536582806, 1536582806),
(7, 11, 'add new message', 1536593710, 1536593710),
(8, 14, 'add new message', 1536593731, 1536593731),
(9, 14, 'Add a new tweet :)', 1536597214, 1536597214);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '/demo/faces/default.jpg',
  `about` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `ip` int(5) NOT NULL DEFAULT '123456',
  `registered` int(11) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `avatar`, `about`, `name`, `ip`, `registered`, `last_login`) VALUES
(1, 'mymail@adress.com', '0aef0a575d5abdea862c2fb79c683c2b3eb8f70ad25b7957df797fc2f239fef7', '/demo/faces/default.jpg', NULL, 'MyName', 123456, 1536244797, 1536244797),
(5, 'second@mafsfil.org', '936e9dc71a022fa76d0f1dcae81656a0694176385580dc39996fbe649bef8a9a', '/demo/faces/default.jpg', NULL, 'Second', 123456, 1536259228, 1536259228),
(9, 'third@fdsgsd.ru', 'bcd2a1f82b6d226f9587b2a49302ffa474b00bf4c3168e645429eb0d2755ecc7', '/demo/faces/default.jpg', NULL, 'Third', 123456, 1536263493, 1536263493),
(10, 'test@test.ru', 'f5eafda418fc7f38ba42f19078b488f9ecd171943ee82751971a0901f1dbca9b', '/demo/faces/default.jpg', NULL, 'test', 123456, 1536263966, 1536263966),
(11, 'olalalal@fsdgsgsg.ru', 'c8b494580c6a49ff1db4ed753e1e81afe82119ff5fd1afcdedd54cee98f545ce', '/demo/faces/default.jpg', NULL, 'Olalal', 123456, 1536388822, 1536388822),
(12, 'shfdskgj@fdsgbh.ru', '070add0419f8b95fae6b34edb79f9250bcb9307bbbb2f9eef29016ebfdede0ee', '/demo/faces/default.jpg', NULL, 'Tratata', 123456, 1536390935, 1536390935),
(13, 'lol@lol.com', '88441ed9c106780f85e7e39963be3b8b4612692fd3358d988eb3972a3ff8d955', '/demo/faces/default.jpg', NULL, 'lol', 123456, 1536412936, 1536412936),
(14, 'user@user.com', 'f0741407ee6194bd8c92118e2607b62bd31f3f8fa4732e3bcebab1e1c503f383', '/assets/images/avatars/14.jpg', 'About me', 'user', 2130706433, 1536582378, 1536582378);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `followers`
--
ALTER TABLE `followers`
  ADD UNIQUE KEY `user_id` (`user_id`,`follows_user_id`);

--
-- Індекси таблиці `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
