-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 29 2017 г., 02:00
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

CREATE TABLE `Articles` (
  `id` int(11) NOT NULL,
  `id_Podrazdel` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Text` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Articles`
--

INSERT INTO `Articles` (`id`, `id_Podrazdel`, `Name`, `Author`, `Text`, `Date`) VALUES
(1, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, aspernatur.', 'Санек Логинов', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et nemo totam quaerat nam. Nobis id porro, enim reiciendis soluta facilis quod odit nesciunt magni unde ullam voluptates. Voluptate itaque voluptatem fugit, culpa fugiat porro delectus. Nesciunt, at laboriosam iatis non. Earum nulla quod, nostrum quis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Et nemo totam quaerat nam. Nobis id porro, enim reiciendis soluta facilis quod odit nesciunt magni unde ullam voluptates. Voluptate itaque voluptatem fugit, culpa fugiat porro delectus. Nesciunt, at laboriosam iatis non. Earum nulla quod, nostrum quis!', '2017-10-01'),
(2, 5, 'Автоконцерн Ford начал использовать HoloLens для проектировки автомобилей', 'Комаровский Дмитрий', 'Компания Ford за всю свою историю, которой уже где-то 140 лет выдержала и подверглась большим переменам. Но, не смотря на это, самые главные принципы работы производства остались неизменными - автомобили для людей должны быть доступные, современные и надёжные.\r\n\r\nГенри Форд родился 30 июля 1863 года в поселке Спрингфилд штата Мичиган. Его родителей звали Уильям и Мэри Форд (William and Mary Ford), у которых было шестеро детей. Генри был самым старшим из них. Отец с матерью владели фермерским хозяйством, дела которого процветали. Поэтому все детство будущего гения прошло на семейной ферме, где Генри ходил в обычную сельскую школу, а после неё помогал родителям по хозяйству.\r\n\r\nКогда Генри исполнилось 12 лет, он соорудил для себя небольшую мастерскую, в которой проводил всё свободное время с большим удовольствием. Спустя несколько лет он создаст свой первый паровой двигатель, сконструированный в этой мастерской.', '2001-10-20'),
(3, 6, 'GIT?', 'Комаровский Дмитрий', 'Git является распределенной системой для управления версиями разрабатываемых файлов. Создана она была в 2005 году автором ОС Linux. Эта система осуществляет синхронизацию работы с сайтом, а также сохраняет и обновляет изменения в файлах. Это очень удобный подход в случае работы над проектом нескольких разработчиков. На сегодняшний день во многих известных проектах используется именно Git. Что такое использование дает? К примеру, разработкой операционной системы Android занимается большое число программистов. Было бы крайне неудобно, если бы один из них вносил изменения, а другие об этом не знали. Git же позволяет всем быть в курсе всех изменений, а в случае ошибок вернуться к предыдущим версиям файлов. - Читайте подробнее на FB.ru: http://fb.ru/article/278293/git---chto-takoe-git-dlya-nachinayuschih-opisanie', '2017-10-18');

-- --------------------------------------------------------

--
-- Структура таблицы `boardp`
--

CREATE TABLE `boardp` (
  `post_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `m_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `boardp`
--

INSERT INTO `boardp` (`post_id`, `theme_id`, `login`, `comment`, `email`, `m_date`) VALUES
(6, 29, 'wolfs2003', 'Это первый ответ на тему', 'skirko_sn@mail.ru', '2017-10-29'),
(7, 29, 'wolfs2003', 'Это второй комментарий к теме', 'skirko_sn@mail.ru', '2017-10-30'),
(8, 29, 'greywolf', 'Это первый комментарий этого пользователя', 'wolf_s2003@mail.ru', '2017-10-30'),
(9, 30, 'wolfs2003', 'Новый комментарий к этому топику', 'skirko_sn@mail.ru', '2017-10-29'),
(11, 30, 'greywolf', 'проверка отправки сообщения', 'wolf_s2003@mail.ru', '2017-10-29');

-- --------------------------------------------------------

--
-- Структура таблицы `boardsection`
--

CREATE TABLE `boardsection` (
  `section_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `boardsection`
--

INSERT INTO `boardsection` (`section_id`, `name`, `status`) VALUES
(1, 'Раздел форума №1', 'Open'),
(2, 'Раздел форума №2', 'Open'),
(3, 'Раздел форума №3', 'Open');

-- --------------------------------------------------------

--
-- Структура таблицы `boardt`
--

CREATE TABLE `boardt` (
  `theme_id` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `topic` text NOT NULL,
  `author` varchar(32) NOT NULL DEFAULT '',
  `subject` varchar(60) NOT NULL DEFAULT '',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `boardt`
--

INSERT INTO `boardt` (`theme_id`, `id_section`, `topic`, `author`, `subject`, `create_date`, `email`) VALUES
(29, 1, 'Тестовое сообщение в теме №1', 'greywolf', 'Пробная тема №1', '2017-10-28', 'wolf_s2003@mail.ru'),
(30, 2, 'Новое сообщение в этой теме', 'wolfs2003', 'новая тема в разделе номер 2', '2017-10-29', 'skirko_sn@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `f_admin`
--

CREATE TABLE `f_admin` (
  `id_A` int(11) NOT NULL,
  `id_R` int(11) NOT NULL,
  `Rull` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `f_razdel`
--

CREATE TABLE `f_razdel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `open/close` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `f_topic`
--

CREATE TABLE `f_topic` (
  `id` int(11) NOT NULL,
  `id_R` int(11) NOT NULL,
  `Author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Razdel`
--

CREATE TABLE `Razdel` (
  `id` int(10) NOT NULL,
  `P_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Razdel`
--

INSERT INTO `Razdel` (`id`, `P_id`, `Name`) VALUES
(1, 0, 'Раздел1'),
(3, 0, 'Раздел2'),
(4, 0, 'Раздел3'),
(5, 1, 'Подраздел1'),
(6, 3, 'Подраздел3'),
(7, 4, 'Подраздел4'),
(8, 3, 'Подраздел3');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `level_id` int(50) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `login`, `pass`, `email`, `Name`, `Surname`, `level_id`, `reg_date`) VALUES
(9, 'wolfs2003', 'b2ca678b4c936f905fb82f2733f5297f', 'skirko_sn@mail.ru', 'Sergey', 'Skirko', 1, '2017-10-09'),
(10, 'greywolf', 'c1c6aa010d50d67b2d524072034b64bb', 'wolf_s2003@mail.ru', 'Сергей', 'Скирко', 3, '2017-10-12'),
(11, 'Master', 'c1c6aa010d50d67b2d524072034b64bb', 'sergeysn79@gmail.com', 'Андрей', 'Михайлов', 3, '2017-10-28');

-- --------------------------------------------------------

--
-- Структура таблицы `users_level`
--

CREATE TABLE `users_level` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_level`
--

INSERT INTO `users_level` (`id`, `level`, `name`) VALUES
(1, 1, 'Root'),
(3, 2, 'Admin'),
(11, 3, 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Podrazdel` (`id_Podrazdel`);

--
-- Индексы таблицы `boardp`
--
ALTER TABLE `boardp`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `theme_id` (`theme_id`);

--
-- Индексы таблицы `boardsection`
--
ALTER TABLE `boardsection`
  ADD PRIMARY KEY (`section_id`);

--
-- Индексы таблицы `boardt`
--
ALTER TABLE `boardt`
  ADD PRIMARY KEY (`theme_id`),
  ADD KEY `id_section` (`id_section`);

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
-- Индексы таблицы `Razdel`
--
ALTER TABLE `Razdel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Индексы таблицы `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Articles`
--
ALTER TABLE `Articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `boardp`
--
ALTER TABLE `boardp`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `boardsection`
--
ALTER TABLE `boardsection`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `boardt`
--
ALTER TABLE `boardt`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
--
-- AUTO_INCREMENT для таблицы `Razdel`
--
ALTER TABLE `Razdel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `users_level`
--
ALTER TABLE `users_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_Podrazdel`) REFERENCES `Razdel` (`id`);

--
-- Ограничения внешнего ключа таблицы `boardp`
--
ALTER TABLE `boardp`
  ADD CONSTRAINT `boardp_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `boardt` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `boardt`
--
ALTER TABLE `boardt`
  ADD CONSTRAINT `boardt_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `boardsection` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `users_level` (`level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
