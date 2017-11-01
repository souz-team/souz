-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 06 2017 г., 17:10
-- Версия сервера: 5.5.50
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `SOUZ`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Articles`
--

CREATE TABLE IF NOT EXISTS `Articles` (
  `id` int(11) NOT NULL,
  `id_Podrazdel` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Text` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Articles`
--

INSERT INTO `Articles` (`id`, `id_Podrazdel`, `Name`, `Author`, `Text`, `Date`) VALUES
(1, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, aspernatur.', 'Санек Логинов', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et nemo totam quaerat nam. Nobis id porro, enim reiciendis soluta facilis quod odit nesciunt magni unde ullam voluptates. Voluptate itaque voluptatem fugit, culpa fugiat porro delectus. Nesciunt, at laboriosam iatis non. Earum nulla quod, nostrum quis!', '2017-10-01'),
(2, 5, 'Автоконцерн Ford начал использовать HoloLens для проектировки автомобилей', 'Комаровский Дмитрий', 'Процесс создания новых автомобилей зачастую требует очень долгой и кропотливой работы. И даже когда «на бумаге» новое авто уже готово, нужно очень много времени...', '2001-10-20'),
(3, 6, 'GIT?', 'Комаровский Дмитрий', 'Git is a powerful, sophisticated system for distributed version control. Gaining an understanding of its features opens to developers a new and liberating approach to source code management. The surest path to mastering Git is to immerse oneself in its utilities and operations, to experience it first-hand.', '2017-10-18');

-- --------------------------------------------------------

--
-- Структура таблицы `Razdel`
--

CREATE TABLE IF NOT EXISTS `Razdel` (
  `id` int(10) NOT NULL,
  `P_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Razdel`
--

INSERT INTO `Razdel` (`id`, `P_id`, `Name`) VALUES
(1, 0, 'Раздел1'),
(3, 0, 'Раздел2'),
(4, 0, 'Раздел3'),
(5, 1, 'Подраздел'),
(6, 3, 'Подраздел'),
(7, 4, 'Подраздел'),
(8, 3, 'Подраздел2');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `f_admin`
--

CREATE TABLE IF NOT EXISTS `f_admin` (
  `id_A` int(11) NOT NULL,
  `id_R` int(11) NOT NULL,
  `Rull` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `f_razdel`
--

CREATE TABLE IF NOT EXISTS `f_razdel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `open/close` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `f_topic`
--

CREATE TABLE IF NOT EXISTS `f_topic` (
  `id` int(11) NOT NULL,
  `id_R` int(11) NOT NULL,
  `Author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Razdel`
--
ALTER TABLE `Razdel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `f_admin`
--
ALTER TABLE `f_admin`
  ADD PRIMARY KEY (`id_A`);

--
-- Индексы таблицы `f_razdel`
--
ALTER TABLE `f_razdel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `f_topic`
--
ALTER TABLE `f_topic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Articles`
--
ALTER TABLE `Articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Razdel`
--
ALTER TABLE `Razdel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `f_admin`
--
ALTER TABLE `f_admin`
  MODIFY `id_A` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `f_razdel`
--
ALTER TABLE `f_razdel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `f_topic`
--
ALTER TABLE `f_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
