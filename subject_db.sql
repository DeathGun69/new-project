-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2022 г., 17:39
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `subject_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `federal_district`
--

CREATE TABLE `federal_district` (
  `id` int NOT NULL,
  `district` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `federal_district`
--

INSERT INTO `federal_district` (`id`, `district`) VALUES
(1, 'Центральный'),
(2, 'Северо-Западный'),
(3, 'Южный'),
(4, 'Северо-Кавказский'),
(5, 'Приволжский'),
(6, 'Уральский'),
(7, 'Сибирский'),
(8, 'Дальневосточный');

-- --------------------------------------------------------

--
-- Структура таблицы `raion`
--

CREATE TABLE `raion` (
  `id` int NOT NULL,
  `id_region` int NOT NULL,
  `raion_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `raion`
--

INSERT INTO `raion` (`id`, `id_region`, `raion_name`) VALUES
(1, 71, 'Аларский район'),
(2, 71, 'Ангарский район'),
(3, 71, 'Балаганский район'),
(4, 71, 'Баяндаевский район'),
(5, 71, 'Бодайбинский район'),
(6, 71, 'Боханский район'),
(7, 71, 'Братский район'),
(8, 71, 'Жигаловский район'),
(9, 71, 'Заларинский район'),
(10, 71, 'Зиминский район'),
(11, 71, 'Иркутский район'),
(12, 71, 'Казачинско-Ленский район'),
(13, 71, 'Катангский район'),
(14, 71, 'Качугский район'),
(15, 71, 'Киренский район'),
(16, 71, 'Куйтунский район'),
(17, 71, 'Мамско-Чуйский район'),
(18, 71, 'Нижнеилимский район'),
(19, 71, 'Нижнеудинский район'),
(20, 71, 'Нукутский район'),
(21, 71, 'Ольхонский район'),
(22, 71, 'Осинский район'),
(23, 71, 'Слюдянский район'),
(24, 71, 'Тайшетский район'),
(25, 71, 'Тулунский район'),
(26, 71, 'Усольский район'),
(27, 71, 'Усть-Илимский район'),
(28, 71, 'Усть-Кутский район'),
(29, 71, 'Усть-Удинский район'),
(30, 71, 'Черемховский район'),
(31, 71, 'Чунский район'),
(32, 71, 'Шелеховский район'),
(33, 71, 'Эхирит-Булагатский район');

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int NOT NULL,
  `id_district` int NOT NULL,
  `region_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `id_district`, `region_name`) VALUES
(3, 1, 'Белгородская область'),
(4, 1, 'Брянская область'),
(5, 1, 'Владимирская область'),
(6, 1, 'Воронежская область'),
(7, 1, 'Ивановская область'),
(8, 1, 'Калужская область'),
(9, 1, 'Костромская область'),
(10, 1, 'Курская область'),
(11, 1, 'Липецкая область'),
(12, 1, 'Московская область'),
(13, 1, 'Орловская область'),
(14, 1, 'Рязанская область'),
(15, 1, 'Смоленская область'),
(16, 1, 'Тамбовская область'),
(17, 1, 'Тверская область'),
(18, 1, 'Тульская область'),
(19, 1, 'Ярославская область'),
(20, 2, 'Архангельская область'),
(21, 2, 'Вологодская область'),
(22, 2, 'Калининградская область'),
(23, 2, 'Республика Карелия'),
(24, 2, 'Республика Коми'),
(25, 2, 'Ленинградская область'),
(26, 2, 'Мурманская область'),
(27, 2, 'Ненецкий автономный округ'),
(28, 2, 'Новгородская область'),
(29, 2, 'Псковская область'),
(30, 3, 'Республика Адыгея'),
(31, 3, 'Астраханская область'),
(32, 3, 'Волгоградская область'),
(33, 3, 'Республика Калмыкия'),
(34, 3, 'Краснодарский край'),
(35, 3, 'Ростовская область'),
(36, 3, 'Республика Крым'),
(37, 4, 'Республика Дагестан'),
(38, 4, 'Республика Ингушетия'),
(39, 4, 'Кабардино-Балкарская Республика'),
(40, 4, 'Карачаево-Черкесская Республика'),
(41, 4, 'Республика Северная Осетия — Алания'),
(42, 4, 'Ставропольский край'),
(43, 4, 'Чеченская Республика'),
(44, 5, 'Республика Башкортостан'),
(45, 5, 'Кировская область'),
(46, 5, 'Республика Марий Эл'),
(47, 5, 'Республика Мордовия'),
(48, 5, 'Нижегородская область'),
(49, 5, 'Оренбургская область'),
(50, 5, 'Пензенская область'),
(51, 5, 'Пермский край'),
(52, 5, 'Самарская область'),
(53, 5, 'Саратовская область'),
(54, 5, 'Республика Татарстан'),
(55, 5, 'Удмуртская Республика'),
(56, 5, 'Ульяновская область'),
(57, 5, 'Чувашская Республика'),
(58, 6, 'Курганская область'),
(59, 6, 'Свердловская область'),
(60, 6, 'Тюменская область'),
(61, 6, 'Ханты-Мансийский автономный округ — Югра'),
(62, 6, 'Челябинская область'),
(63, 6, 'Ямало-Ненецкий автономный округ'),
(69, 7, 'Республика Алтай'),
(70, 7, 'Алтайский край'),
(71, 7, 'Иркутская область'),
(72, 7, 'Кемеровская область'),
(73, 7, 'Красноярский край'),
(74, 7, 'Новосибирская область'),
(75, 7, 'Омская область'),
(76, 7, 'Томская область'),
(77, 7, 'Республика Тыва'),
(78, 7, 'Республика Хакасия'),
(79, 8, 'Амурская область'),
(80, 8, 'Республика Бурятия'),
(81, 8, 'Еврейская автономная область'),
(82, 8, 'Забайкальский край'),
(83, 8, 'Камчатский край'),
(84, 8, 'Магаданская область'),
(85, 8, 'Приморский край'),
(86, 8, 'Республика Саха (Якутия)'),
(87, 8, 'Сахалинская область'),
(88, 8, 'Хабаровский край'),
(89, 8, 'Чукотский автономный округ');

-- --------------------------------------------------------

--
-- Структура таблицы `statistics_district`
--

CREATE TABLE `statistics_district` (
  `id` int NOT NULL,
  `id_raion` int NOT NULL,
  `date` year NOT NULL,
  `population` float DEFAULT NULL,
  `fire` int DEFAULT NULL,
  `technosphere_objects` int DEFAULT NULL,
  `damage` float DEFAULT NULL,
  `died` int DEFAULT NULL,
  `traumatized` int DEFAULT NULL,
  `objects_destroyed` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statistics_district`
--

INSERT INTO `statistics_district` (`id`, `id_raion`, `date`, `population`, `fire`, `technosphere_objects`, `damage`, `died`, `traumatized`, `objects_destroyed`) VALUES
(1, 1, 2010, 21.4, 42, 6104, 1.54, 2, 2, 15),
(2, 1, 2011, 21.4, 40, 6179, 0.65, 1, 0, 10),
(3, 1, 2012, 21.4, 39, 6288, 0.76, 2, 0, 9),
(4, 1, 2013, 21, 42, 6379, 0.68, 4, 2, 10),
(5, 1, 2014, 20.8, 47, 6408, 0.24, 2, 0, 7),
(6, 1, 2015, 20.8, 49, 6449, 1.79, 3, 2, 45),
(7, 1, 2016, 20.6, 37, 6491, 1.3, 1, 0, 34),
(8, 1, 2017, 20.5, 46, 6588, 0.96, 5, 0, 31),
(9, 1, 2018, 20.4, 34, 6632, 0, 5, 0, 62),
(10, 1, 2019, 20.3, 67, 7074, 1.92, 6, 3, 37),
(11, 1, 2020, 20.4, 56, 7126, 1.96, 3, 0, 39),
(12, 2, 2010, 244.4, 202, 56502, 68.5, 19, 24, 46),
(13, 2, 2011, 258.1, 200, 56911, 40.1, 10, 20, 41),
(14, 2, 2012, 244.4, 216, 57125, 52.1, 12, 27, 41),
(15, 2, 2013, 253.2, 204, 57372, 83.6, 23, 25, 48),
(16, 2, 2014, 250.7, 196, 57561, 18.8, 13, 19, 42),
(17, 2, 2015, 248.3, 178, 57744, 92.1, 10, 20, 24),
(18, 2, 2016, 246.1, 177, 57925, 15.5, 6, 12, 31),
(19, 2, 2017, 243.7, 173, 58254, 7.12, 11, 13, 28),
(20, 2, 2018, 241.4, 173, 58561, 22.2, 16, 7, 77),
(21, 2, 2019, 239.6, 378, 58878, 31.23, 11, 26, 82),
(22, 2, 2020, 238.5, 395, 59181, 159.38, 11, 31, 63),
(23, 3, 2010, 9.1, 18, 5327, 0.33, 4, 0, 11),
(24, 3, 2011, 9.1, 16, 5440, 0.97, 0, 0, 4),
(25, 3, 2012, 9, 13, 5522, 0.79, 1, 0, 2),
(26, 3, 2013, 8.9, 13, 5629, 4.25, 1, 0, 6),
(27, 3, 2014, 8.8, 12, 5717, 0.17, 0, 0, 8),
(28, 3, 2015, 8.6, 25, 5807, 1.23, 0, 0, 12),
(29, 3, 2016, 8.7, 20, 5938, 0.6, 0, 0, 9),
(30, 3, 2017, 8.6, 24, 5984, 0.71, 2, 0, 5),
(31, 3, 2018, 8.5, 20, 6091, 0, 1, 0, 24),
(32, 3, 2019, 8.4, 23, 6140, 1.38, 2, 1, 13),
(33, 3, 2020, 8.3, 21, 6201, 3.74, 1, 0, 10),
(34, 4, 2010, 11.5, 15, 6943, 0.05, 0, 0, 4),
(35, 4, 2011, 11.4, 18, 6999, 1.23, 1, 0, 10),
(36, 4, 2012, 11.2, 15, 7045, 0.06, 1, 2, 4),
(37, 4, 2013, 11.2, 21, 7096, 0, 2, 1, 9),
(38, 4, 2014, 11.1, 20, 7143, 3.36, 1, 0, 8),
(39, 4, 2015, 11, 20, 7197, 1.4, 0, 0, 6),
(40, 4, 2016, 11, 18, 7246, 0.91, 0, 0, 13),
(41, 4, 2017, 11, 22, 7287, 0.11, 0, 4, 6),
(42, 4, 2018, 10.9, 13, 7314, 0.13, 1, 0, 13),
(43, 4, 2019, 10.8, 53, 7352, 1.09, 1, 2, 22),
(44, 4, 2020, 10.8, 31, 7373, 0.95, 3, 0, 11),
(45, 5, 2010, 23.2, 45, 7291, 10.6, 4, 1, 7),
(46, 5, 2011, 23, 42, 7407, 12.1, 3, 6, 2),
(47, 5, 2012, 22.3, 41, 7526, 10.2, 7, 4, 3),
(48, 5, 2013, 21.9, 35, 7613, 1.64, 3, 2, 8),
(49, 5, 2014, 21.2, 36, 7759, 21.3, 2, 1, 4),
(50, 5, 2015, 20.6, 25, 7846, 12.9, 1, 1, 4),
(51, 5, 2016, 19.9, 48, 7958, 7.14, 1, 0, 4),
(52, 5, 2017, 19.5, 28, 8006, 0.31, 0, 6, 2),
(53, 5, 2018, 18.6, 16, 8069, 0.86, 0, 2, 0),
(54, 5, 2019, 18.1, 63, 8144, 10.17, 1, 2, 37),
(55, 5, 2020, 18, 61, 8198, 2.39, 1, 0, 11),
(56, 6, 2010, 25.3, 32, 7578, 0.76, 8, 1, 4),
(57, 6, 2011, 25.4, 28, 7620, 0.18, 2, 1, 14),
(58, 6, 2012, 25.3, 25, 7678, 2.32, 1, 1, 4),
(59, 6, 2013, 25.2, 35, 7719, 1.8, 4, 3, 4),
(60, 6, 2014, 25.1, 25, 7764, 1.37, 3, 0, 6),
(61, 6, 2015, 25, 25, 7808, 1.56, 2, 1, 7),
(62, 6, 2016, 24.9, 21, 7850, 1.41, 1, 0, 11),
(63, 6, 2017, 24.9, 36, 7875, 1.1, 0, 0, 20),
(64, 6, 2018, 24.8, 28, 7893, 0.25, 9, 0, 17),
(65, 6, 2019, 24.8, 71, 7926, 5.11, 2, 0, 27),
(66, 6, 2020, 25, 63, 7958, 0.89, 2, 0, 29),
(67, 7, 2010, 304, 413, 110819, 19.8, 27, 35, 96),
(68, 7, 2011, 302.8, 452, 111366, 29.6, 30, 34, 72),
(69, 7, 2012, 299.8, 429, 111809, 19.1, 29, 45, 82),
(70, 7, 2013, 296.8, 419, 112379, 44.1, 19, 33, 90),
(71, 7, 2014, 293.1, 426, 112537, 9.92, 18, 42, 93),
(72, 7, 2015, 290.6, 397, 112922, 21.9, 20, 50, 20),
(73, 7, 2016, 287.1, 359, 113293, 9.2, 17, 39, 51),
(74, 7, 2017, 261.2, 351, 113638, 2.94, 20, 48, 100),
(75, 7, 2018, 280.6, 396, 114083, 6.07, 24, 55, 127),
(76, 7, 2019, 277.8, 758, 114373, 4.94, 24, 29, 150),
(77, 7, 2020, 275.9, 796, 114759, 6.05, 16, 22, 162),
(78, 8, 2010, 9.3, 20, 3311, 2.92, 0, 1, 5),
(79, 8, 2011, 9.2, 15, 3347, 0.16, 1, 1, 1),
(80, 8, 2012, 9.1, 26, 3389, 0.28, 4, 1, 2),
(81, 8, 2013, 8.9, 26, 3441, 1.82, 3, 1, 11),
(82, 8, 2014, 8.7, 23, 3499, 0, 0, 1, 10),
(83, 8, 2015, 8.6, 30, 3568, 1.5, 1, 2, 4),
(84, 8, 2016, 8.5, 21, 3626, 1.11, 0, 0, 4),
(85, 8, 2017, 8.4, 20, 3701, 0.02, 2, 4, 2),
(86, 8, 2018, 8.3, 18, 3749, 0, 0, 0, 8),
(87, 8, 2019, 8.2, 25, 3768, 0.78, 2, 1, 16),
(88, 8, 2020, 8.1, 19, 3821, 0, 1, 0, 6),
(89, 9, 2010, 28.2, 40, 10320, 10.9, 5, 0, 17),
(90, 9, 2011, 28.1, 33, 11000, 7.92, 3, 0, 15),
(91, 9, 2012, 28.2, 25, 11102, 3.19, 3, 1, 13),
(92, 9, 2013, 28.2, 31, 11189, 1.26, 2, 1, 8),
(93, 9, 2014, 28.1, 29, 11241, 1.42, 3, 0, 11),
(94, 9, 2015, 28, 24, 11299, 4.98, 4, 0, 19),
(95, 9, 2016, 27.9, 23, 11367, 3.31, 3, 2, 6),
(96, 9, 2017, 27.9, 35, 11425, 1.71, 0, 5, 26),
(97, 9, 2018, 27.7, 35, 11497, 3.65, 2, 1, 28),
(98, 9, 2019, 26.1, 76, 11539, 8.34, 5, 10, 47),
(99, 9, 2020, 27.4, 63, 11601, 0.88, 3, 0, 32),
(100, 10, 2010, 86.7, 151, 25914, 22.7, 19, 12, 43),
(101, 10, 2011, 86.3, 119, 26197, 13.4, 4, 9, 35),
(102, 10, 2012, 85.6, 127, 26457, 8.1, 3, 8, 38),
(103, 10, 2013, 85.1, 109, 26697, 8.5, 10, 18, 34),
(104, 10, 2014, 84.4, 126, 26929, 13.5, 13, 12, 41),
(105, 10, 2015, 83.9, 109, 27129, 12.4, 4, 5, 70),
(106, 10, 2016, 83.6, 98, 27345, 4.21, 8, 7, 54),
(107, 10, 2017, 83.2, 112, 27585, 2.78, 7, 8, 346),
(108, 10, 2018, 82.7, 127, 27585, 90.42, 5, 12, 80),
(109, 10, 2019, 82, 267, 27979, 16.89, 9, 8, 89),
(110, 10, 2020, 81.8, 253, 28191, 5.84, 18, 8, 116),
(111, 11, 2010, 672.1, 1035, 693169, 216.9, 57, 72, 45),
(112, 11, 2011, 674.7, 901, 693750, 598.2, 64, 56, 42),
(113, 11, 2012, 687.6, 937, 694316, 67.5, 51, 54, 37),
(114, 11, 2013, 702.1, 898, 694769, 101, 42, 59, 67),
(115, 11, 2014, 716, 922, 695649, 56.1, 46, 61, 88),
(116, 11, 2015, 727.1, 889, 696329, 133.6, 38, 55, 158),
(117, 11, 2016, 735.1, 921, 696974, 67.2, 41, 64, 153),
(118, 11, 2017, 742.9, 818, 697609, 90.6, 32, 55, 107),
(119, 11, 2018, 719.2, 724, 698329, 68.85, 29, 39, 401),
(120, 11, 2019, 722.2, 1558, 698967, 144.67, 34, 59, 460),
(121, 11, 2020, 725.1, 1624, 699558, 125.26, 34, 39, 333),
(122, 12, 2010, 18.8, 58, 5357, 2.3, 4, 2, 18),
(123, 12, 2011, 18.7, 54, 5392, 2.83, 2, 3, 17),
(124, 12, 2012, 18.3, 38, 5430, 1.75, 1, 1, 9),
(125, 12, 2013, 17.9, 34, 5468, 2.03, 1, 0, 12),
(126, 12, 2014, 17.5, 34, 5491, 6.48, 0, 0, 14),
(127, 12, 2015, 17.3, 31, 5528, 2.56, 2, 0, 2),
(128, 12, 2016, 17.2, 20, 5566, 1.1, 0, 0, 6),
(129, 12, 2017, 17, 23, 5689, 0.04, 2, 0, 1),
(130, 12, 2018, 16.8, 9, 5710, 0.19, 1, 0, 2),
(131, 12, 2019, 16.6, 76, 5724, 15, 2, 4, 37),
(132, 12, 2020, 16.4, 107, 5739, 59.3, 8, 3, 29),
(133, 13, 2010, 3.8, 5, 1132, 0.17, 1, 0, 2),
(134, 13, 2011, 3.7, 3, 1159, 0.2, 0, 0, 1),
(135, 13, 2012, 3.7, 7, 1178, 0, 0, 0, 3),
(136, 13, 2013, 3.6, 8, 1199, 0.24, 2, 2, 4),
(137, 13, 2014, 3.5, 1, 1223, 1.4, 0, 0, 0),
(138, 13, 2015, 3.4, 4, 1238, 0.35, 0, 0, 0),
(139, 13, 2016, 3.4, 2, 1252, 0.04, 0, 0, 1),
(140, 13, 2017, 3.3, 7, 1269, 0, 1, 0, 0),
(141, 13, 2018, 3.3, 5, 1378, 0.16, 1, 0, 4),
(142, 13, 2019, 3.3, 11, 1392, 0.06, 0, 0, 5),
(143, 13, 2020, 3.3, 9, 1413, 0, 0, 0, 3),
(144, 14, 2010, 17.3, 32, 5161, 2.49, 4, 0, 5),
(145, 14, 2011, 17.3, 30, 5199, 3.69, 2, 0, 9),
(146, 14, 2012, 17.3, 23, 5230, 1.61, 2, 0, 6),
(147, 14, 2013, 17.2, 19, 5278, 2.31, 6, 0, 6),
(148, 14, 2014, 17.2, 24, 5325, 4.38, 1, 1, 5),
(149, 14, 2015, 17.1, 27, 5366, 5.76, 2, 1, 7),
(150, 14, 2016, 17.1, 23, 5398, 2.03, 3, 2, 9),
(151, 14, 2017, 17, 29, 5438, 1.97, 1, 0, 11),
(152, 14, 2018, 16.9, 28, 5477, 1.37, 1, 2, 6),
(153, 14, 2019, 16.7, 59, 5498, 3.93, 0, 0, 13),
(154, 14, 2020, 16.8, 49, 5532, 0.72, 0, 1, 14),
(155, 15, 2010, 17.8, 30, 4504, 1.83, 10, 4, 8),
(156, 15, 2011, 17.6, 33, 4621, 2.36, 7, 1, 7),
(157, 15, 2012, 17.3, 29, 4741, 1.92, 3, 1, 11),
(158, 15, 2013, 17, 27, 4882, 2.03, 4, 1, 9),
(159, 15, 2014, 16.6, 25, 5045, 0.22, 2, 4, 9),
(160, 15, 2015, 16.1, 27, 5168, 2.64, 0, 0, 1),
(161, 15, 2016, 15.9, 21, 5293, 1.75, 0, 1, 12),
(162, 15, 2017, 15.8, 29, 5455, 31, 4, 5, 81),
(163, 15, 2018, 15.3, 26, 5604, 23.1, 3, 0, 17),
(164, 15, 2019, 15.1, 1, 5722, 0, 0, 0, 0),
(165, 15, 2020, 15, 58, 5803, 1.12, 0, 1, 31),
(166, 16, 2010, 31.8, 53, 11064, 1.43, 5, 1, 11),
(167, 16, 2011, 31.7, 61, 11135, 8.29, 5, 3, 15),
(168, 16, 2012, 30.9, 54, 11197, 5.92, 5, 1, 9),
(169, 16, 2013, 30.4, 56, 11249, 3.97, 7, 1, 11),
(170, 16, 2014, 29.9, 51, 11311, 1.91, 8, 8, 16),
(171, 16, 2015, 29.5, 45, 11347, 8.76, 6, 3, 15),
(172, 16, 2016, 29, 54, 11395, 6.1, 2, 0, 21),
(173, 16, 2017, 28.5, 40, 11447, 3.81, 2, 4, 16),
(174, 16, 2018, 28.2, 36, 11512, 4.21, 1, 0, 23),
(175, 16, 2019, 27.7, 99, 11581, 8, 5, 1, 66),
(176, 16, 2020, 27.3, 108, 11623, 0, 2, 2, 52),
(177, 17, 2010, 5.5, 8, 1311, 0.05, 0, 0, 1),
(178, 17, 2011, 5.4, 6, 1347, 0.15, 0, 2, 0),
(179, 17, 2012, 5.2, 6, 1409, 0.39, 0, 1, 0),
(180, 17, 2013, 4.9, 3, 1428, 0, 1, 4, 1),
(181, 17, 2014, 4.7, 6, 1460, 0.01, 0, 1, 0),
(182, 17, 2015, 4.5, 3, 1492, 0.06, 0, 0, 1),
(183, 17, 2016, 4.3, 9, 1524, 0.17, 3, 0, 0),
(184, 17, 2017, 4, 11, 1548, 0.02, 2, 0, 1),
(185, 17, 2018, 3.8, 1, 1577, 0, 0, 0, 0),
(186, 17, 2019, 3.7, 6, 1590, 0, 0, 0, 1),
(187, 17, 2020, 3.6, 11, 1612, 0, 0, 0, 1),
(188, 18, 2010, 35.5, 58, 17391, 1.49, 9, 2, 13),
(189, 18, 2011, 35.3, 64, 17580, 6.16, 6, 6, 22),
(190, 18, 2012, 34.5, 65, 17767, 3.04, 6, 6, 16),
(191, 18, 2013, 33.7, 57, 17931, 1.74, 8, 0, 26),
(192, 18, 2014, 33.3, 55, 18105, 8.53, 3, 0, 17),
(193, 18, 2015, 28.7, 45, 18354, 6.84, 14, 4, 0),
(194, 18, 2016, 31.9, 26, 18513, 1.24, 1, 1, 0),
(195, 18, 2017, 31.3, 23, 18782, 0.03, 2, 0, 1),
(196, 18, 2018, 30.9, 35, 18951, 1.92, 4, 2, 22),
(197, 18, 2019, 30.3, 177, 19195, 4.6, 7, 4, 31),
(198, 18, 2020, 29.9, 198, 19433, 0.5, 1, 6, 23),
(199, 19, 2010, 63, 156, 22236, 6.94, 19, 5, 33),
(200, 19, 2011, 62.8, 144, 22569, 6.69, 13, 5, 32),
(201, 19, 2012, 62, 125, 23143, 5.29, 24, 1, 27),
(202, 19, 2013, 60.9, 106, 23451, 4.58, 9, 1, 38),
(203, 19, 2014, 60, 114, 23720, 5.88, 18, 5, 26),
(204, 19, 2015, 59, 115, 24035, 6.84, 10, 4, 55),
(205, 19, 2016, 58.5, 91, 24245, 3.1, 7, 2, 32),
(206, 19, 2017, 58.1, 96, 24821, 0.9, 7, 4, 37),
(207, 19, 2018, 57.7, 113, 25149, 7.81, 20, 9, 39),
(208, 19, 2019, 57.2, 303, 25496, 6.22, 10, 3, 71),
(209, 19, 2020, 56.4, 335, 25785, 7.54, 9, 2, 75),
(210, 20, 2010, 15.7, 18, 6099, 1.23, 0, 0, 4),
(211, 20, 2011, 15.7, 16, 6113, 1.9, 1, 0, 11),
(212, 20, 2012, 15.6, 12, 6124, 0.03, 1, 0, 10),
(213, 20, 2013, 15.6, 22, 6141, 0.01, 1, 2, 4),
(214, 20, 2014, 15.6, 22, 6155, 0, 1, 1, 11),
(215, 20, 2015, 15.7, 25, 6175, 1.25, 0, 2, 12),
(216, 20, 2016, 15.6, 23, 6193, 1.3, 0, 0, 12),
(217, 20, 2017, 15.7, 32, 6208, 1.5, 2, 0, 20),
(218, 20, 2018, 15.7, 35, 6224, 0, 1, 0, 18),
(219, 20, 2019, 15.6, 35, 6238, 1.49, 4, 0, 23),
(220, 20, 2020, 15.5, 38, 6245, 1.62, 2, 0, 19),
(221, 21, 2010, 9.4, 27, 4181, 3.29, 0, 4, 3),
(222, 21, 2011, 9.4, 18, 4233, 1.38, 3, 0, 2),
(223, 21, 2012, 9.5, 25, 4289, 3.65, 3, 1, 7),
(224, 21, 2013, 9.6, 21, 4377, 8.36, 6, 3, 6),
(225, 21, 2014, 9.6, 24, 4458, 1.06, 2, 1, 12),
(226, 21, 2015, 9.5, 19, 4522, 3.79, 3, 2, 6),
(227, 21, 2016, 9.5, 11, 4594, 1.15, 0, 0, 7),
(228, 21, 2017, 9.6, 20, 4663, 3.66, 0, 0, 8),
(229, 21, 2018, 9.7, 21, 4715, 0.32, 4, 8, 13),
(230, 21, 2019, 9.7, 37, 4758, 45.3, 0, 1, 22),
(231, 21, 2020, 9.9, 32, 4826, 2.17, 2, 0, 11),
(232, 22, 2010, 20.4, 33, 8531, 1.03, 6, 3, 14),
(233, 22, 2011, 20.3, 30, 8593, 9.82, 4, 1, 7),
(234, 22, 2012, 20.5, 32, 8665, 1.18, 3, 3, 14),
(235, 22, 2013, 20.7, 30, 8737, 1.57, 2, 0, 11),
(236, 22, 2014, 20.7, 31, 8819, 0.05, 1, 1, 9),
(237, 22, 2015, 20.8, 29, 8864, 1.36, 2, 0, 7),
(238, 22, 2016, 21, 29, 8904, 1.26, 0, 0, 6),
(239, 22, 2017, 21.2, 37, 8946, 0.18, 4, 4, 7),
(240, 22, 2018, 21.3, 29, 8998, 0, 2, 3, 19),
(241, 22, 2019, 21.4, 84, 9038, 0.9, 0, 0, 29),
(242, 22, 2020, 21.4, 57, 9082, 0.8, 1, 0, 27),
(243, 23, 2010, 35.9, 94, 10888, 6.13, 5, 1, 13),
(244, 23, 2011, 36.3, 92, 11257, 6.86, 7, 5, 28),
(245, 23, 2012, 49.6, 91, 11556, 1.62, 4, 4, 11),
(246, 23, 2013, 36.2, 83, 11817, 0.86, 5, 5, 16),
(247, 23, 2014, 35.9, 82, 12075, 1.57, 9, 1, 12),
(248, 23, 2015, 36, 78, 12301, 2.97, 6, 2, 14),
(249, 23, 2016, 35.9, 83, 12519, 2, 6, 3, 15),
(250, 23, 2017, 35.6, 86, 12737, 2.38, 3, 9, 9),
(251, 23, 2018, 35.5, 81, 12949, 0.13, 3, 7, 16),
(252, 23, 2019, 35.2, 177, 13167, 3.36, 5, 5, 21),
(253, 23, 2020, 35.3, 159, 13219, 15.09, 2, 3, 7),
(254, 24, 2010, 65.7, 99, 21092, 7.9, 19, 3, 29),
(255, 24, 2011, 64.2, 97, 21354, 8.72, 12, 6, 26),
(256, 24, 2012, 63.1, 93, 21640, 6.61, 11, 11, 17),
(257, 24, 2013, 62.2, 84, 21920, 17.9, 8, 3, 18),
(258, 24, 2014, 61.6, 69, 22283, 7.85, 15, 1, 16),
(259, 24, 2015, 60.9, 65, 22644, 7.72, 12, 4, 12),
(260, 24, 2016, 60.3, 56, 23006, 5.03, 9, 0, 5),
(261, 24, 2017, 59.9, 57, 23372, 1.67, 9, 7, 14),
(262, 24, 2018, 59.3, 74, 23855, 5.06, 14, 2, 42),
(263, 24, 2019, 58.4, 249, 24451, 6.54, 10, 5, 84),
(264, 24, 2020, 58, 200, 24693, 7.59, 10, 5, 33),
(265, 25, 2010, 71.8, 115, 18295, 7.16, 6, 6, 14),
(266, 25, 2011, 71.5, 143, 18558, 14.1, 10, 4, 32),
(267, 25, 2012, 70.6, 131, 18951, 4.7, 11, 14, 27),
(268, 25, 2013, 69.5, 110, 19324, 0.33, 10, 7, 35),
(269, 25, 2014, 68.5, 98, 19613, 7.97, 5, 10, 28),
(270, 25, 2015, 68, 89, 19824, 8.35, 10, 11, 24),
(271, 25, 2016, 67.7, 111, 20011, 3.59, 5, 26, 36),
(272, 25, 2017, 67.1, 98, 20179, 2.96, 5, 10, 23),
(273, 25, 2018, 66.6, 75, 20373, 0, 4, 5, 30),
(274, 25, 2019, 65.9, 295, 20488, 0.33, 4, 10, 50),
(275, 25, 2020, 64, 299, 20553, 2.1, 5, 4, 29),
(276, 26, 2010, 102.9, 346, 35047, 25.4, 29, 32, 66),
(277, 26, 2011, 102.7, 331, 35460, 40.6, 15, 29, 60),
(278, 26, 2012, 102.1, 301, 36019, 14.5, 10, 30, 39),
(279, 26, 2013, 101.2, 284, 36315, 35, 20, 20, 42),
(280, 26, 2014, 102.4, 247, 36664, 14.3, 20, 24, 53),
(281, 26, 2015, 101.5, 215, 36971, 29.6, 17, 10, 120),
(282, 26, 2016, 100.8, 176, 37361, 7.47, 16, 11, 83),
(283, 26, 2017, 100.2, 149, 37844, 19.25, 18, 12, 115),
(284, 26, 2018, 100, 162, 38077, 19.05, 6, 9, 90),
(285, 26, 2019, 98.7, 623, 38374, 17.63, 14, 15, 124),
(286, 26, 2020, 97.8, 557, 38584, 15.1, 9, 11, 114),
(287, 27, 2010, 98.2, 198, 27974, 7.19, 7, 11, 51),
(288, 27, 2011, 97.9, 186, 28276, 8.72, 8, 18, 66),
(289, 27, 2012, 96.5, 180, 28588, 6.61, 5, 9, 31),
(290, 27, 2013, 95.5, 152, 28971, 17.8, 14, 8, 23),
(291, 27, 2014, 93.4, 141, 29357, 7.85, 6, 9, 49),
(292, 27, 2015, 92.4, 144, 29753, 7.72, 6, 6, 37),
(293, 27, 2016, 91.8, 125, 30144, 5.03, 6, 2, 42),
(294, 27, 2017, 91.2, 116, 30381, 9.76, 12, 7, 43),
(295, 27, 2018, 90.4, 106, 30646, 9.32, 10, 5, 81),
(296, 27, 2019, 89.3, 287, 30854, 3.73, 7, 3, 129),
(297, 27, 2020, 88.5, 316, 31001, 35.01, 8, 5, 123),
(298, 28, 2010, 51, 80, 11180, 8.79, 4, 8, 26),
(299, 28, 2011, 50.8, 75, 11338, 8.85, 2, 3, 18),
(300, 28, 2012, 50.3, 74, 11498, 12, 10, 9, 17),
(301, 28, 2013, 49.6, 78, 11636, 2.53, 5, 4, 27),
(302, 28, 2014, 48.7, 87, 11829, 1.35, 16, 22, 20),
(303, 28, 2015, 48.1, 78, 11972, 11.7, 11, 6, 12),
(304, 28, 2016, 47.5, 67, 12114, 5.31, 8, 9, 9),
(305, 28, 2017, 47.2, 70, 12134, 1, 5, 10, 5),
(306, 28, 2018, 46.5, 81, 12254, 1.2, 3, 10, 65),
(307, 28, 2019, 46, 230, 12319, 0.51, 2, 6, 34),
(308, 28, 2020, 45.5, 206, 12422, 4.05, 1, 5, 50),
(309, 29, 2010, 14.3, 33, 5697, 3.25, 2, 1, 18),
(310, 29, 2011, 14.3, 24, 5769, 1.56, 2, 2, 7),
(311, 29, 2012, 14.2, 22, 5823, 0.89, 1, 1, 7),
(312, 29, 2013, 14, 17, 5871, 0.26, 1, 1, 4),
(313, 29, 2014, 13.8, 26, 5918, 0.19, 0, 1, 5),
(314, 29, 2015, 13.8, 21, 5948, 2.76, 2, 1, 2),
(315, 29, 2016, 13.6, 12, 5968, 1.41, 0, 0, 3),
(316, 29, 2017, 13.5, 17, 5992, 0.2, 0, 0, 4),
(317, 29, 2018, 13.3, 19, 6016, 0, 1, 2, 11),
(318, 29, 2019, 13.2, 37, 6041, 10, 3, 1, 12),
(319, 29, 2020, 13.1, 32, 6060, 0.23, 12, 0, 16);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `federal_district`
--
ALTER TABLE `federal_district`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `raion`
--
ALTER TABLE `raion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_region` (`id_region`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_district` (`id_district`);

--
-- Индексы таблицы `statistics_district`
--
ALTER TABLE `statistics_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_raion` (`id_raion`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `federal_district`
--
ALTER TABLE `federal_district`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `raion`
--
ALTER TABLE `raion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `statistics_district`
--
ALTER TABLE `statistics_district`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `raion`
--
ALTER TABLE `raion`
  ADD CONSTRAINT `raion_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id`);

--
-- Ограничения внешнего ключа таблицы `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`id_district`) REFERENCES `federal_district` (`id`);

--
-- Ограничения внешнего ключа таблицы `statistics_district`
--
ALTER TABLE `statistics_district`
  ADD CONSTRAINT `statistics_district_ibfk_1` FOREIGN KEY (`id_raion`) REFERENCES `raion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;