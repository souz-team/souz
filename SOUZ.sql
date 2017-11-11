-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 192.168.1.10:3306
-- Время создания: Ноя 10 2017 г., 00:43
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

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
CREATE DATABASE IF NOT EXISTS `SOUZ` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `SOUZ`;

-- --------------------------------------------------------

--
-- Структура таблицы `Articles`
--

DROP TABLE IF EXISTS `Articles`;
CREATE TABLE IF NOT EXISTS `Articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Podrazdel` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Text` text NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Podrazdel` (`id_Podrazdel`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Articles`
--

INSERT INTO `Articles` (`id`, `id_Podrazdel`, `Name`, `Author`, `Text`, `Date`) VALUES
(1, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, aspernatur.', 'Санек Логинов', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et nemo totam quaerat nam. Nobis id porro, enim reiciendis soluta facilis quod odit nesciunt magni unde ullam voluptates. Voluptate itaque voluptatem fugit, culpa fugiat porro delectus. Nesciunt, at laboriosam iatis non. Earum nulla quod, nostrum quis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Et nemo totam quaerat nam. Nobis id porro, enim reiciendis soluta facilis quod odit nesciunt magni unde ullam voluptates. Voluptate itaque voluptatem fugit, culpa fugiat porro delectus. Nesciunt, at laboriosam iatis non. Earum nulla quod, nostrum quis!', '2017-10-01'),
(2, 5, 'Автоконцерн Ford начал использовать HoloLens для проектировки автомобилей', 'Комаровский Дмитрий', 'Компания Ford за всю свою историю, которой уже где-то 140 лет выдержала и подверглась большим переменам. Но, не смотря на это, самые главные принципы работы производства остались неизменными - автомобили для людей должны быть доступные, современные и надёжные.\r\n\r\nГенри Форд родился 30 июля 1863 года в поселке Спрингфилд штата Мичиган. Его родителей звали Уильям и Мэри Форд (William and Mary Ford), у которых было шестеро детей. Генри был самым старшим из них. Отец с матерью владели фермерским хозяйством, дела которого процветали. Поэтому все детство будущего гения прошло на семейной ферме, где Генри ходил в обычную сельскую школу, а после неё помогал родителям по хозяйству.\r\n\r\nКогда Генри исполнилось 12 лет, он соорудил для себя небольшую мастерскую, в которой проводил всё свободное время с большим удовольствием. Спустя несколько лет он создаст свой первый паровой двигатель, сконструированный в этой мастерской.', '2001-10-20'),
(3, 6, 'GIT?', 'Комаровский Дмитрий', 'Git является распределенной системой для управления версиями разрабатываемых файлов. Создана она была в 2005 году автором ОС Linux. Эта система осуществляет синхронизацию работы с сайтом, а также сохраняет и обновляет изменения в файлах. Это очень удобный подход в случае работы над проектом нескольких разработчиков. На сегодняшний день во многих известных проектах используется именно Git. Что такое использование дает? К примеру, разработкой операционной системы Android занимается большое число программистов. Было бы крайне неудобно, если бы один из них вносил изменения, а другие об этом не знали. Git же позволяет всем быть в курсе всех изменений, а в случае ошибок вернуться к предыдущим версиям файлов. - Читайте подробнее на FB.ru: http://fb.ru/article/278293/git---chto-takoe-git-dlya-nachinayuschih-opisanie', '2017-10-18'),
(11, 7, 'Основы работы с PHP MySqli', 'Sergey Skirko', 'В связи с прекращением поддержки PHP MySQL в 2011 году для работы с базами данных все более широкое применение находят PDO или MySqli. Они обладают лучшей функциональностью (чем MySQL) и предлагают ООП (объектно-ориентированный интерфейс) API. Какой из них лучше, это тема для другой статьи, в этой статье мы попытаемся разобраться с основами работы с MySqli. Поэтому, без дальнейших предисловий, перейдем к рассмотрению соединения (connect), выбора (select), вставки (insert), обновления (update) и удаления (delete) записей (данных/документов/информации) посредством PHP MySqli. Надеюсь, что данная статья будет полезна при решении проблем, которые могут возникнуть при работе с PHP MySqli.', '2017-11-06'),
(13, 8, 'Топ Гир 4 сезон 10 серия', 'Sergey Skirko', 'Джеймс Мей уверен, что Volvo V50 с универсальным кузовом - это один из самых универсальных в мире транс автомобилей среднего класса. Для того чтобы доказать что он прав, ведущий попытается засунуть в него большой диван. Что получится из его оригинальной затеи? Для того чтобы узнать это обязательно посмотрите эту серию. В это время Джереми усиленно ищет самые плохие дороги во всей Британии, для того чтобы протестировать BMW X3. Несмотря на не совсем благоприятные условия для езды, ведущий остаётся очень доволен техническими характеристиками машины, нравится ему и внешний вид этого авто.\r\nCorvette – это, наверное, один из самых популярных спорткаров в Соединённых Штатах Америки, но, к сожалению, он очень плохо известен в Европе. Хаммонд решается избавиться от такой несправедливости и рассказывает много интересных фактов об этом мощном и красивом автомобиле. Стиг же в свою очередь протестирует его на скоростном треке. Помимо этого в этом выпуске мы узнаем о достоинствах Peugeot 407. Гостем студии станет известный британский актёр Патрик Килти. И как всегда в заключительной серии сезона Топ Гир будут подведены итоги 2004 года. ', '2017-11-06');

-- --------------------------------------------------------

--
-- Структура таблицы `boardp`
--

DROP TABLE IF EXISTS `boardp`;
CREATE TABLE IF NOT EXISTS `boardp` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `m_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`post_id`),
  KEY `theme_id` (`theme_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `boardp`
--

INSERT INTO `boardp` (`post_id`, `theme_id`, `login`, `comment`, `email`, `m_date`) VALUES
(6, 29, 'wolfs2003', 'Это первый ответ на тему', 'skirko_sn@mail.ru', '2017-10-29'),
(7, 29, 'wolfs2003', 'Это второй комментарий к теме', 'skirko_sn@mail.ru', '2017-10-30'),
(8, 29, 'greywolf', 'Это первый комментарий этого пользователя', 'wolf_s2003@mail.ru', '2017-10-30'),
(9, 30, 'wolfs2003', 'Новый комментарий к этому топику', 'skirko_sn@mail.ru', '2017-10-29'),
(11, 30, 'greywolf', 'проверка отправки сообщения', 'wolf_s2003@mail.ru', '2017-10-29'),
(12, 31, 'greywolf', 'тест', 'wolf_s2003@mail.ru', '2017-10-29'),
(13, 33, 'wolfs2003', 'ответ на это', 'skirko_sn@mail.ru', '2017-10-29'),
(14, 36, 'wolfs2003', 'ответ на третью тему', 'skirko_sn@mail.ru', '2017-10-31'),
(15, 29, 'wolfs2003', '4 сообщение', 'skirko_sn@mail.ru', '2017-10-31'),
(16, 29, 'wolfs2003', '5 сообщение', 'skirko_sn@mail.ru', '2017-10-31'),
(17, 33, 'wolfs2003', '2 сообщение', 'skirko_sn@mail.ru', '2017-10-31'),
(18, 33, 'wolfs2003', '3 сообщение', 'skirko_sn@mail.ru', '2017-10-31'),
(19, 37, 'wolfs2003', 'сообщение', 'skirko_sn@mail.ru', '2017-10-31'),
(20, 31, 'wolfs2003', 'сообщение', 'skirko_sn@mail.ru', '2017-10-31'),
(21, 40, 'wolfs2003', 'сообщение', 'skirko_sn@mail.ru', '2017-10-31'),
(22, 39, 'wolfs2003', '333', 'skirko_sn@mail.ru', '2017-10-31'),
(23, 35, 'wolfs2003', '333', 'skirko_sn@mail.ru', '2017-10-31'),
(24, 38, 'wolfs2003', 'qqq', 'skirko_sn@mail.ru', '2017-10-31'),
(25, 30, 'wolfs2003', 'fff', 'skirko_sn@mail.ru', '2017-11-01'),
(26, 29, 'greywolf', '5543543534', 'wolf_s2003@mail.ru', '2017-11-03'),
(27, 29, 'greywolf', '5435345', 'wolf_s2003@mail.ru', '2017-11-03'),
(28, 29, 'greywolf', '5345345', 'wolf_s2003@mail.ru', '2017-11-03'),
(29, 29, 'greywolf', '765765756', 'wolf_s2003@mail.ru', '2017-11-03'),
(30, 29, 'greywolf', 'hrhtrdhtrd', 'wolf_s2003@mail.ru', '2017-11-03'),
(31, 29, 'greywolf', 'gregerger', 'wolf_s2003@mail.ru', '2017-11-03'),
(32, 29, 'greywolf', 'gregreger', 'wolf_s2003@mail.ru', '2017-11-03'),
(33, 35, 'greywolf', '777', 'wolf_s2003@mail.ru', '2017-11-03'),
(34, 29, 'greywolf', 'ffff', 'wolf_s2003@mail.ru', '2017-11-03'),
(35, 33, 'greywolf', '76575756765', 'wolf_s2003@mail.ru', '2017-11-03'),
(37, 33, 'greywolf', '765765876', 'wolf_s2003@mail.ru', '2017-11-03'),
(38, 33, 'greywolf', 'Новое сообщение', 'wolf_s2003@mail.ru', '2017-11-03'),
(39, 33, 'greywolf', 'отобразить новое сообщение', 'wolf_s2003@mail.ru', '2017-11-03'),
(41, 30, 'greywolf', 'ееог87лшлн7г', 'wolf_s2003@mail.ru', '2017-11-03'),
(42, 29, 'wolfs2003', 'При присвоении значения в столбце после SET, вы не всегда должны указывать статические значения. Вы также можете использовать выражения, как показано ниже.\r\n\r\nНиже приводится очень простое выражение, где оно увеличивает значение заработной платы на 500 для всех сотрудников отдела IT.\r\nPHP\r\nmysql&gt; UPDATE worker SET salary=salary+500 WHERE dept=&#039;IT&#039;;\r\nQuery OK, 3 rows affected (0.01 sec)\r\nRows matched: 4  Changed: 3  Warnings: 0\r\n1\r\n2\r\n3\r\n	\r\nmysql&gt; UPDATE worker SET salary=salary+500 WHERE dept=&#039;IT&#039;;\r\nQuery OK, 3 rows affected (0.01 sec)\r\nRows matched: 4  Changed: 3  Warnings: 0\r\n\r\n \r\n\r\nБыли только 4 записи, которые соответствовали условию выше. Но только три записи были обновлены, как показано ниже, в качестве одного из записей сотрудников, который принадлежит к техническому отделу, имел нулевое значение в поле заработной платы. Таким образом, зарплата выше + 500 выражение по прежнему NULL, и не обновляется эта конкретную запись.\r\nPHP\r\nmysql&gt; SELECT * FROM worker;\r\n+-----+--------+------------+--------+\r\n| id  | name   | dept       | salary |\r\n+-----+--------+------------+--------+\r\n| 100 | Andrey | IT         |   5500 |\r\n| 200 | Anton  | IT         |   6000 |\r\n| 300 | Maxim  | Marketing  |   7000 |\r\n| 400 | Dimon  | Marketing  |   9500 |\r\n| 500 | Anton  | IT         |   6500 |\r\n| 501 | Anna   | IT         |   NULL |\r\n+-----+--------+------------+--------+\r\n1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9\r\n10\r\n11\r\n	\r\nmysql&gt; SELECT * FROM worker;\r\n+-----+--------+------------+--------+\r\n| id  | name   | dept       | salary |\r\n+-----+--------+------------+--------+\r\n| 100 | Andrey | IT         |   5500 |\r\n| 200 | Anton  | IT         |   6000 |\r\n| 300 | Maxim  | Marketing  |   7000 |\r\n| 400 | Dimon  | Marketing  |   9500 |\r\n| 500 | Anton  | IT         |   6500 |\r\n| 501 | Anna   | IT         |   NULL |\r\n+-----+--------+------------+--------+\r\n\r\n ', 'skirko_sn@mail.ru', '2017-11-04'),
(43, 48, 'wolfs2003', 'ответ', 'skirko_sn@mail.ru', '2017-11-05'),
(44, 49, 'taffy', 'Test test test', 'taffytf@gmail.com', '2017-11-05'),
(45, 32, 'fulex', 'ля ля', 'aleks.maison7788@gmail.com', '2017-11-08'),
(46, 29, 'fulex', '!@#$!@$%#$^&amp;%^*^*)_^*&amp;(*\r\n&lt;script&gt;alert();&lt;/script&gt;', 'aleks.maison7788@gmail.com', '2017-11-08');

-- --------------------------------------------------------

--
-- Структура таблицы `boardsection`
--

DROP TABLE IF EXISTS `boardsection`;
CREATE TABLE IF NOT EXISTS `boardsection` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `close` int(3) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `boardsection`
--

INSERT INTO `boardsection` (`section_id`, `name`, `close`) VALUES
(1, 'Раздел форума №1', 0),
(2, 'Новое название раздела', 0),
(3, 'Раздел форума №3', 0),
(4, 'Обратная связь', 1),
(5, '44324324', 0),
(6, '6578890876543', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `boardt`
--

DROP TABLE IF EXISTS `boardt`;
CREATE TABLE IF NOT EXISTS `boardt` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_section` int(11) NOT NULL,
  `topic` text NOT NULL,
  `author` varchar(32) NOT NULL DEFAULT '',
  `subject` varchar(60) NOT NULL DEFAULT '',
  `create_date` date NOT NULL DEFAULT '0000-00-00',
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`theme_id`),
  KEY `id_section` (`id_section`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `boardt`
--

INSERT INTO `boardt` (`theme_id`, `id_section`, `topic`, `author`, `subject`, `create_date`, `email`) VALUES
(29, 1, 'Тестовое сообщение в теме №1', 'greywolf', 'Пробная тема №1', '2017-10-28', 'wolf_s2003@mail.ru'),
(30, 2, 'Новое сообщение в этой теме', 'wolfs2003', 'новая тема в разделе номер 2', '2017-10-29', 'skirko_sn@mail.ru'),
(31, 2, 'Сообщение в теме второго раздела', 'greywolf', 'тема во втором разделе', '2017-10-29', 'wolf_s2003@mail.ru'),
(32, 4, 'первое сообщение из обратной связи', 'Сергей', 'Сообщения из обратной связи', '2017-10-29', 'skirko_sn@mail.ru'),
(33, 3, 'новое сообщение', 'wolfs2003', 'New topc', '2017-10-29', 'skirko_sn@mail.ru'),
(34, 4, 'Не запускается', 'Сергей', 'windows 7', '2017-10-29', 'wolf_s2003@mail.ru'),
(35, 1, 'Как заставить группу совместно работать над этим проектом? Пишите здесь свои предложения', 'wolfs2003', 'Мотивация на работу', '2017-10-29', 'skirko_sn@mail.ru'),
(36, 2, 'Новое сообщение', 'wolfs2003', 'Третья тема', '2017-10-31', 'skirko_sn@mail.ru'),
(37, 2, 'Текст 4 темы', 'wolfs2003', '4 тема', '2017-10-31', 'skirko_sn@mail.ru'),
(38, 2, 'текст 5 темы', 'wolfs2003', '5 тема', '2017-10-31', 'skirko_sn@mail.ru'),
(39, 1, 'тема3', 'wolfs2003', '3 тема', '2017-10-31', 'skirko_sn@mail.ru'),
(40, 3, '111', 'wolfs2003', '2 тема', '2017-10-31', 'skirko_sn@mail.ru'),
(41, 4, 'yyy', 'eee', 'ttt', '2017-11-01', 'rrr'),
(42, 4, '121', '212', '1212', '2017-11-01', '121'),
(43, 4, 'grsew', 'gresg', 'grse', '2017-11-01', 'gresg'),
(44, 4, 'adminadmin', 'admin', 'Тест 2', '2017-11-02', 'admin@test.ru'),
(45, 4, 'dsfs', '11', '33', '2017-11-02', '22@mail.ru'),
(46, 4, 'dsfs', '11', '33', '2017-11-02', '22@mail.ru'),
(47, 4, 'dsfs', '11', '33', '2017-11-02', '22@mail.ru'),
(48, 2, 'Может быть ситуация, когда вам нужна точная копия таблицы и команды CREATE TABLE &hellip; или SELECT &hellip; не подходят для ваших целей, потому что копия должна включать в себя одни и те же индексы, значения по умолчанию и так далее.\r\n\r\nЕсли вы используете MySQL RDBMS, вы можете справиться с этой ситуацией, придерживаясь шагов, приведенных ниже:\r\n\r\n    Используйте команду SHOW CREATE TABLE, чтобы получить заявление CREATE TABLE, которое определяет структуру таблицы-источника, индексы и все.\r\n    Исправьте оператор, чтобы изменить имя таблицы, для клонирования таблицы и выполнения оператора. Таким образом, вы будете иметь точную таблицу клона.\r\n    Необязательно, если вам нужно скопировать содержимое таблицы, то также надо выполнить INSERT INTO или SELECT.', 'wolfs2003', 'SQL &ndash; Клонирование таблиц', '2017-11-04', 'skirko_sn@mail.ru'),
(49, 5, 'sdfsfgf', 'taffy', 'Test', '2017-11-05', 'taffytf@gmail.com'),
(50, 4, 'Текст с пробелами', 'Сергей Николаевич', 'Проверка на наличие пробелов', '2017-11-06', 'skirko_sn@mail.ru'),
(51, 1, 'eee', 'wolfs2003', 'test', '2017-11-06', 'skirko_sn@mail.ru'),
(52, 3, 'ячсмячсм', 'fulex', 'ячсмячсм', '2017-11-06', 'aleks.maison7788@gmail.com'),
(53, 4, 'В сообщении на сайте Главного управления МЧС по Москве говорится, что сообщение о пожаре поступило в оперативную дежурную службу Центра управления кризисных ситуаций в 15:34 мск.\r\n\r\n&laquo;По прибытию на место было установлено, что происходит загорание в коллекторе. Что горит и площадь - уточняется. Со слов администрации объекта - в коллекторе могут находиться люди. Принимаются меры для спасения возможно находящихся внутри людей. Сил и средств на месте достаточно&raquo;, - говорится в сообщении МЧС.\r\n\r\nИсточник РБК в ведомстве пояснил, что трое человек могут находиться в коллекторе, расположенном на первом этаже 5-этажного здания.\r\n\r\n&laquo;На место для проверки отправлено два звена газодымозащитной службы, которые пытаются открыть дверь в коллектор&raquo;, - пояснил источник.\r\n\r\nРанее сообщалось, что на место пожара выехал начальник столичного главка МЧС Илья Денисов, а пожару присвоен повышенный, второй, номер сложности.\r\n\r\nТем временем, на внешней стороне МКАД в районе Ясенево собралась автомобильная пробка. &laquo;В сторону территории, где расположены административные корпуса СВР проезжают пожарные машины, на пересечении МКАД с проездом Карамзина образовался затор&raquo;, - рассказал очевидец.\r\n\r\nАвторы: Дмитрий Серков, Евгений Калюков, Ольга Агеева.\r\nТеги: дым , МКАД\r\n\r\nПодробнее на РБК:\r\nhttp://www.rbc.ru/society/08/11/2017/5a030f2f9a79474de9a34d53', 'Александр Логинов', 'test', '2017-11-08', 'aleks.maison7788@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `f_admin`
--

DROP TABLE IF EXISTS `f_admin`;
CREATE TABLE IF NOT EXISTS `f_admin` (
  `id_A` int(11) NOT NULL,
  `id_R` int(11) NOT NULL,
  `Rull` varchar(100) NOT NULL,
  PRIMARY KEY (`id_A`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `f_razdel`
--

DROP TABLE IF EXISTS `f_razdel`;
CREATE TABLE IF NOT EXISTS `f_razdel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `open/close` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `f_topic`
--

DROP TABLE IF EXISTS `f_topic`;
CREATE TABLE IF NOT EXISTS `f_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_R` int(11) NOT NULL,
  `Author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Razdel`
--

DROP TABLE IF EXISTS `Razdel`;
CREATE TABLE IF NOT EXISTS `Razdel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `P_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `level_id` int(50) NOT NULL,
  `reg_date` date NOT NULL,
  `gender` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `login`, `pass`, `email`, `name`, `surname`, `level_id`, `reg_date`, `gender`) VALUES
(9, 'wolfs2003', 'c1c6aa010d50d67b2d524072034b64bb', 'skirko_sn@mail.ru', 'Sergey', 'Skirko', 1, '2017-10-09', 1),
(10, 'GreyWolf', 'c1c6aa010d50d67b2d524072034b64bb', 'wolf_s2003@mail.ru', 'Сергей', 'Скирко', 3, '2017-10-12', 1),
(11, 'Master', 'c1c6aa010d50d67b2d524072034b64bb', 'sergeysn79@gmail.com', 'Андрей', 'Михайлов', 3, '2017-10-28', 1),
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@test.ru', 'admin', 'admin', 1, '2017-11-02', 1),
(13, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'saltykova111@mail.ru', 'aaa', 'aaa', 1, '2017-11-03', 0),
(14, 'taffy', 'c4ca4238a0b923820dcc509a6f75849b', 'taffytf@gmail.com', 'Tatiana', 'Yavorskaya', 1, '2017-11-05', 0),
(15, 'Adminus', 'ce7cf56ad1678315405c95915a56a102', 'aleks.maison7788@gmail.com', 'Adminus', 'Adminus', 1, '2017-11-06', 1),
(16, 'Anchy', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'ann.iljichova@yandex.ru', 'Anna', 'Iljicheva', 1, '2017-11-08', 0),
(17, 'temp', '3d801aa532c1cec3ee82d87a99fdf63f', 'temp@', 'temp', 'temp', 3, '2017-11-08', 1),
(18, 'Shyriqq', '4eae18cf9e54a0f62b44176d074cbe2f', 'saneks-95@inbox.ru', 'Александр ', 'Алексеевич ', 3, '2017-11-08', 1),
(19, 'sss', 'a384b6463fc216a5f8ecb6670f86456a', 'fakechild@list.ru', 'bbb', 'bbb', 3, '2017-11-09', 0),
(20, 'Radistka_CAT', 'b2ca678b4c936f905fb82f2733f5297f', 'cate@shtirliz.su', 'Катя', 'Семенова', 3, '2017-11-09', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_level`
--

DROP TABLE IF EXISTS `users_level`;
CREATE TABLE IF NOT EXISTS `users_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_level`
--

INSERT INTO `users_level` (`id`, `level`, `name`) VALUES
(1, 1, 'Root'),
(3, 2, 'Admin'),
(11, 3, 'user');

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
