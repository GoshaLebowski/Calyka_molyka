-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2023 г., 22:00
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `molyaks_carriage`
--

-- --------------------------------------------------------

--
-- Структура таблицы `additionalservices`
--

CREATE TABLE `additionalservices` (
  `idservices` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `additionalservices`
--

INSERT INTO `additionalservices` (`idservices`, `name`, `price`) VALUES
(1, 'Веселый мяч', 2000),
(2, 'Каляка-маляка', 3000),
(3, 'Вокал', 2500);

-- --------------------------------------------------------

--
-- Структура таблицы `attendance`
--

CREATE TABLE `attendance` (
  `idChild's` int NOT NULL,
  `idmonth` int NOT NULL,
  `Fullnameofthechild` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `VisitedDays` int NOT NULL,
  `idservices` int NOT NULL,
  `Cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `attendance`
--

INSERT INTO `attendance` (`idChild's`, `idmonth`, `Fullnameofthechild`, `VisitedDays`, `idservices`, `Cost`) VALUES
(4, 1, 'asd', 600, 1, 5000),
(5, 2, 'Саша Иванов ', 600, 1, 20600),
(6, 2, 'ваффывоа', 600, 3, 11500),
(7, 3, 'фывафыва', 400, 3, 11700),
(8, 2, 'фоыаф', 15, 3, 11500);

-- --------------------------------------------------------

--
-- Структура таблицы `month`
--

CREATE TABLE `month` (
  `idmonth` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `month`
--

INSERT INTO `month` (`idmonth`, `name`) VALUES
(1, 'Январь'),
(2, 'Февраль'),
(3, 'Март'),
(4, 'Апрель'),
(5, 'Май'),
(6, 'Июнь'),
(7, 'Июль'),
(8, 'Август'),
(9, 'Сентябрь'),
(10, 'Октябрь'),
(11, 'Ноябрь'),
(12, 'Декабрь');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `additionalservices`
--
ALTER TABLE `additionalservices`
  ADD PRIMARY KEY (`idservices`);

--
-- Индексы таблицы `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`idChild's`),
  ADD KEY `idmonth` (`idmonth`),
  ADD KEY `idservices` (`idservices`);

--
-- Индексы таблицы `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`idmonth`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `additionalservices`
--
ALTER TABLE `additionalservices`
  MODIFY `idservices` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `attendance`
--
ALTER TABLE `attendance`
  MODIFY `idChild's` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `month`
--
ALTER TABLE `month`
  MODIFY `idmonth` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`idmonth`) REFERENCES `month` (`idmonth`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`idservices`) REFERENCES `additionalservices` (`idservices`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
