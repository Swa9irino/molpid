-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2023 г., 06:45
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
-- База данных: `products_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bike`
--

CREATE TABLE `bike` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `popularity` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bike`
--

INSERT INTO `bike` (`id`, `name`, `description`, `price`, `popularity`, `img`) VALUES
(11, 'Горный велосипед Giant ATX', 'Горный велосипед Giant ATX 27.5 (2022) – яркая модель, предназначенная для комфортной езды по разнообразным типам дорог, начиная от городских улиц и заканчивая лесными тропинками.', '38540.00', '10', 'https://cdn.velostrana.ru/upload/models/velo/55248/full/d4dfe1198d17b994e8dc509ba5f24bed.jpg'),
(12, 'Горный велосипед Trinx M116', 'Горный велосипед Trinx M116 Pro (2021) привлекательная модель, выполненная в спортивном стиле, которая подходит для велопрогулок по городу и пересеченной местности.', '26520.00', '50', 'https://cdn.velostrana.ru/upload/models/velo/52659/full/9fe6cb079b999587914e7ebd40dbb1bc.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `cpu`
--

CREATE TABLE `cpu` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `popularity` int NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cpu`
--

INSERT INTO `cpu` (`id`, `name`, `description`, `price`, `popularity`, `img`) VALUES
(9, 'AMD Ryzen 5 \r\n5600X ', 'AMD Ryzen 5 5600X OEM', '13499.00', 40, 'https://c.dns-shop.ru/thumb/st4/fit/wm/0/0/0337faf641403203af079998cbb8d8c3/a60d568636c393c611792fb99f68dd97fb6fe3de90e8bd6f085c7c321e9e32b0.jpg.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `gpu`
--

CREATE TABLE `gpu` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `popularity` int NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gpu`
--

INSERT INTO `gpu` (`id`, `name`, `description`, `price`, `popularity`, `img`) VALUES
(7, 'MSI GeForce GTX 1660 SUPER', 'Видеокарта MSI GeForce GTX 1660 SUPER Gaming X [GTX 1660 SUPER GAMING X] – игровой видеоадаптер высокого класса.', '23999.00', 45, 'https://c.dns-shop.ru/thumb/st4/fit/500/500/f1e8bc6643dd208b27563ace3e2b6195/a21ca13090f1aee5c62cb1eb261b5c324eef772f1b781e3f3209c675b921b71f.jpg.webp'),
(8, 'ASUS GeForce RTX 2060', 'Видеокарта ASUS GeForce RTX 2060 Dual EVO OC Edition [DUAL-RTX2060-O6G-EVO] с поддержкой технологии трассировки лучей.', '31799.00', 10, 'https://c.dns-shop.ru/thumb/st1/fit/500/500/502f454559e03518daee2ef1a6f56fc5/b3ab27192d0ca00d17bb20219c31088d42d277156f8b85915a2d324acbb1d850.jpg.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `phone`
--

CREATE TABLE `phone` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `popularity` int NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `phone`
--

INSERT INTO `phone` (`id`, `name`, `description`, `price`, `popularity`, `img`) VALUES
(1, 'iphone13', 'iphone13pro max delux edition', '151234.00', 10, 'https://live.staticflickr.com/65535/52914082567_d50b5cfa99_z.jpg'),
(2, 'Pocox5pro', 'Pocox5pro', '5000.00', 100, 'https://live.staticflickr.com/65535/52913967796_c334ae4913_z.jpg\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `phonecase`
--

CREATE TABLE `phonecase` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `popularity` int NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `phonecase`
--

INSERT INTO `phonecase` (`id`, `name`, `description`, `price`, `popularity`, `img`) VALUES
(5, 'Накладка Apple Silicone', 'Накладка Apple Silicone Case MHL63ZE/A для смартфона Apple iPhone 12/12 Pro насыщенного красного цвета.', '3899.00', 13, 'https://c.dns-shop.ru/thumb/st1/fit/500/500/b3aa816de88fa3d54a9e233e720560be/ee3c1f00390eec8413657c569d01d97d81057b60bf588c41253411330bd51d0f.jpg.webp'),
(6, 'Чехол-книжка Samsung', 'Чехол-книжка Samsung Smart View Wallet Case обеспечивает полноценную защиту дисплея, корпуса и боковых граней смартфона.', '3499.00', 33, 'https://c.dns-shop.ru/thumb/st4/fit/500/500/5f8b84e4903a21cbcb4c4db1548b5378/ca7e7360ddd578e971b8a8c34aee713a4627105d5f5edbb069a2d8e078520846.jpg.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `popular`
--

CREATE TABLE `popular` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `popular`
--

INSERT INTO `popular` (`id`, `name`, `description`, `price`, `img`) VALUES
(20, 'Xiaomi Mi Power Bank 3', 'Портативный аккумулятор Xiaomi Mi Power Bank 3 Ultra Compact станет вашим незаменимым спутником в любом путешествии. ', '1499.00', 'https://c.dns-shop.ru/thumb/st4/fit/500/500/7e920a62a0dd34446bf6e89fdf534ee0/242f152f603c50880175a090b5e197f71e0ea2c582f99775ef7964abb475c9c0.jpg.webp'),
(21, 'MSI GeForce GTX 1660 SUPER', 'Видеокарта MSI GeForce GTX 1660 SUPER Gaming X [GTX 1660 SUPER GAMING X] – игровой видеоадаптер высокого класса.', '23999.00', 'https://c.dns-shop.ru/thumb/st4/fit/500/500/f1e8bc6643dd208b27563ace3e2b6195/a21ca13090f1aee5c62cb1eb261b5c324eef772f1b781e3f3209c675b921b71f.jpg.webp'),
(22, 'Горный велосипед Giant ATX', 'Горный велосипед Giant ATX 27.5 (2022) – яркая модель, предназначенная для комфортной езды по разнообразным типам дорог, начиная от городских улиц и заканчивая лесными тропинками.', '38540.00', 'https://cdn.velostrana.ru/upload/models/velo/55248/full/d4dfe1198d17b994e8dc509ba5f24bed.jpg'),
(23, 'AMD Ryzen 5 \r\n5600X ', NULL, '13499.00', 'https://c.dns-shop.ru/thumb/st4/fit/wm/0/0/0337faf641403203af079998cbb8d8c3/a60d568636c393c611792fb99f68dd97fb6fe3de90e8bd6f085c7c321e9e32b0.jpg.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `powerbank`
--

CREATE TABLE `powerbank` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `popularity` int NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `powerbank`
--

INSERT INTO `powerbank` (`id`, `name`, `description`, `price`, `popularity`, `img`) VALUES
(3, 'Xiaomi Mi Power Bank 3', 'Портативный аккумулятор Xiaomi Mi Power Bank 3 Ultra Compact станет вашим незаменимым спутником в любом путешествии. ', '1499.00', 10, 'https://c.dns-shop.ru/thumb/st4/fit/500/500/7e920a62a0dd34446bf6e89fdf534ee0/242f152f603c50880175a090b5e197f71e0ea2c582f99775ef7964abb475c9c0.jpg.webp'),
(4, 'Xiaomi Mi 50W  Power Bank 20000', 'Модель емкостью 20000 мА*ч обеспечивает быстрый заряд смартфонов, плееров, ноутбуков и других устройств.', '3299.00', 2, 'https://c.dns-shop.ru/thumb/st4/fit/500/500/a13252a8d620e06b675721f99d784aba/a61b03595ebfc4b01ed92ab73625a4ddfc197e11de14bbedd4f5d726d0a04025.jpg.webp');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bike`
--
ALTER TABLE `bike`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phonecase`
--
ALTER TABLE `phonecase`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `popular`
--
ALTER TABLE `popular`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `powerbank`
--
ALTER TABLE `powerbank`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bike`
--
ALTER TABLE `bike`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `phonecase`
--
ALTER TABLE `phonecase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `popular`
--
ALTER TABLE `popular`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT для таблицы `powerbank`
--
ALTER TABLE `powerbank`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
