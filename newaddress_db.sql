-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2016 г., 13:44
-- Версия сервера: 5.7.11
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `newaddress_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `nas_catalog`
--

CREATE TABLE IF NOT EXISTS `nas_catalog` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nas_catalog`
--

INSERT INTO `nas_catalog` (`id`, `title`, `alias`) VALUES
(1, 'Дома', 'doma');

-- --------------------------------------------------------

--
-- Структура таблицы `nas_direction`
--

CREATE TABLE IF NOT EXISTS `nas_direction` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nas_direction`
--

INSERT INTO `nas_direction` (`id`, `title`, `alias`) VALUES
(1, 'Направление 1', 'direction1'),
(2, 'напрвление 2', 'direction2');

-- --------------------------------------------------------

--
-- Структура таблицы `nas_house`
--

CREATE TABLE IF NOT EXISTS `nas_house` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) DEFAULT NULL,
  `direction_id` int(11) DEFAULT NULL,
  `alias` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nas_house`
--

INSERT INTO `nas_house` (`id`, `catalog_id`, `direction_id`, `alias`, `address`) VALUES
(1, 1, 1, 'dom1', 'дом1');

-- --------------------------------------------------------

--
-- Структура таблицы `nas_service`
--

CREATE TABLE IF NOT EXISTS `nas_service` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `nas_system_role`
--

CREATE TABLE IF NOT EXISTS `nas_system_role` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `access_level` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nas_system_role`
--

INSERT INTO `nas_system_role` (`id`, `name`, `access_level`) VALUES
(1, 'guest', 0),
(2, 'user', 1),
(3, 'manager', 2),
(4, 'admin', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `nas_user`
--

CREATE TABLE IF NOT EXISTS `nas_user` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nas_user`
--

INSERT INTO `nas_user` (`id`, `login`, `password`, `email`, `role_id`) VALUES
(1, 'admin', '123', 'admin@admin/com', 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `nas_catalog`
--
ALTER TABLE `nas_catalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `nas_direction`
--
ALTER TABLE `nas_direction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `nas_house`
--
ALTER TABLE `nas_house`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_id` (`catalog_id`),
  ADD KEY `direction_id` (`direction_id`),
  ADD KEY `alias` (`alias`);

--
-- Индексы таблицы `nas_service`
--
ALTER TABLE `nas_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `nas_system_role`
--
ALTER TABLE `nas_system_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `access_level` (`access_level`);

--
-- Индексы таблицы `nas_user`
--
ALTER TABLE `nas_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `nas_catalog`
--
ALTER TABLE `nas_catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `nas_direction`
--
ALTER TABLE `nas_direction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `nas_house`
--
ALTER TABLE `nas_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `nas_service`
--
ALTER TABLE `nas_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `nas_system_role`
--
ALTER TABLE `nas_system_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `nas_user`
--
ALTER TABLE `nas_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `nas_house`
--
ALTER TABLE `nas_house`
  ADD CONSTRAINT `nas_house_ibfk_1` FOREIGN KEY (`catalog_id`) REFERENCES `nas_catalog` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `nas_house_ibfk_2` FOREIGN KEY (`direction_id`) REFERENCES `nas_direction` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `nas_user`
--
ALTER TABLE `nas_user`
  ADD CONSTRAINT `nas_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `nas_system_role` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
