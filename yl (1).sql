-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 28 2023 г., 09:50
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yl`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blank`
--

CREATE TABLE `blank` (
  `id` int(11) NOT NULL,
  `number` varchar(50) DEFAULT NULL,
  `master_id` int(11) DEFAULT NULL,
  `date_time_blank` varchar(60) NOT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `blank`
--

INSERT INTO `blank` (`id`, `number`, `master_id`, `date_time_blank`, `service_id`) VALUES
(1, '+79526125565', 2, '2022-12-24 10:00:01', 2),
(2, '+762165498643', 1, '2022-12-24 19:00:01', 5),
(11, '+7 (952) 612-55-45', 1, '28.12.22 07:33', 1),
(12, '+79526125545', NULL, '28.01.23 15:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `masters`
--

CREATE TABLE `masters` (
  `id_master` int(11) NOT NULL,
  `FIO` varchar(80) NOT NULL,
  `number_master` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `masters`
--

INSERT INTO `masters` (`id_master`, `FIO`, `number_master`, `email`, `role`) VALUES
(1, 'Олег Олегов', '+79526125565', 'ooleg@irk.ru', 'Шиномонтажник'),
(2, 'Петр Петрович Петров', '+762165498', 'petya@mail.ru', 'Старший шиномонтажник'),
(3, 'Козиненчекнка Даниил', '+79643586412', 'dan@gmail.com', 'Стажёр');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id_services` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(60) DEFAULT NULL,
  `price` varchar(60) DEFAULT NULL,
  `period` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id_services`, `name`, `description`, `price`, `period`) VALUES
(1, 'Замена колёс', 'Полная замена 4-ёх колёс', '5000', '4 часа'),
(2, 'Обслуживание колёс', 'Осмотр и работа над колёсами', '2000', '1 час'),
(3, 'Замена двигателя', 'Полная замна двигателя', '50000', '10 часов'),
(4, 'Обслуживание двигателя', 'Осмотр и работа над двигателем', '6000', '4 часа'),
(5, 'Обслуживание бензобака', 'Осмотр и работа над бензобаком', '2000', '1 час'),
(6, 'Обслуживание Салона', 'Осмотр и работа над салоном', '2000', '1 час'),
(7, 'Обслуживание системы зажигания', 'Осмотр и работа над системой зажигания', '2000', '1 час'),
(8, 'Обслуживание тормозов', 'Осмотр и работа над тормозами', '2000', '1 час');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `age`) VALUES
(1, 'sibok', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blank`
--
ALTER TABLE `blank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_id` (`master_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Индексы таблицы `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id_master`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blank`
--
ALTER TABLE `blank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `masters`
--
ALTER TABLE `masters`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blank`
--
ALTER TABLE `blank`
  ADD CONSTRAINT `blank_ibfk_1` FOREIGN KEY (`master_id`) REFERENCES `masters` (`id_master`),
  ADD CONSTRAINT `blank_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id_services`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
