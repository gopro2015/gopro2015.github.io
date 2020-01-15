-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 14 2020 г., 23:51
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `c953640n_sparepa`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--
-- Создание: Янв 21 2019 г., 11:06
-- Последнее обновление: Янв 14 2020 г., 14:22
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `idgroup` int(11) NOT NULL,
  `group1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `kabinets`
--
-- Создание: Янв 13 2020 г., 16:01
-- Последнее обновление: Янв 14 2020 г., 14:33
--

DROP TABLE IF EXISTS `kabinets`;
CREATE TABLE `kabinets` (
  `id` int(11) NOT NULL,
  `nomer` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `predmets`
--
-- Создание: Июл 26 2019 г., 14:16
-- Последнее обновление: Янв 14 2020 г., 14:26
--

DROP TABLE IF EXISTS `predmets`;
CREATE TABLE `predmets` (
  `id` int(11) NOT NULL,
  `nazv` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `preps`
--
-- Создание: Янв 13 2020 г., 16:14
-- Последнее обновление: Янв 14 2020 г., 14:30
--

DROP TABLE IF EXISTS `preps`;
CREATE TABLE `preps` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--
-- Создание: Ноя 20 2019 г., 18:54
-- Последнее обновление: Янв 13 2020 г., 15:05
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `groupa` varchar(25) NOT NULL,
  `one` varchar(25) NOT NULL,
  `one_prep` varchar(25) NOT NULL,
  `one_kab` int(25) NOT NULL,
  `two` varchar(25) NOT NULL,
  `two_prep` varchar(25) NOT NULL,
  `two_kab` int(25) NOT NULL,
  `three` varchar(25) NOT NULL,
  `three_prep` varchar(25) NOT NULL,
  `three_kab` int(25) NOT NULL,
  `four` varchar(25) NOT NULL,
  `four_prep` varchar(25) NOT NULL,
  `four_kab` int(25) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idgroup`);

--
-- Индексы таблицы `kabinets`
--
ALTER TABLE `kabinets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `predmets`
--
ALTER TABLE `predmets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `preps`
--
ALTER TABLE `preps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `kabinets`
--
ALTER TABLE `kabinets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `predmets`
--
ALTER TABLE `predmets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `preps`
--
ALTER TABLE `preps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
