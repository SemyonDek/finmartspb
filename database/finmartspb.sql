-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 13 2024 г., 03:14
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
-- База данных: `finmartspb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `ID` int NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`ID`, `NAME`) VALUES
(4, 'Витамины'),
(7, 'Кофе'),
(8, 'Чай'),
(9, 'Продукты');

-- --------------------------------------------------------

--
-- Структура таблицы `delivery`
--

CREATE TABLE `delivery` (
  `ID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PRICE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `delivery`
--

INSERT INTO `delivery` (`ID`, `NAME`, `PRICE`) VALUES
(1, 'Курьерская служба по СПБ', 200),
(2, 'Курьерская служба по Лен. области', 300),
(3, 'ТК ПЭК (без жесткой упаковки) от', 400),
(4, 'ТК ПЭК (жесткая упаковка) от', 700),
(5, 'Boxberry от', 400);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` int NOT NULL,
  `USERID` int NOT NULL,
  `DATE` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `DELIVERYID` int NOT NULL,
  `DELIVERYNAME` varchar(255) NOT NULL,
  `DELIVERYPRICE` int NOT NULL,
  `AMOUNT` int NOT NULL,
  `AMOUNTFULL` int NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `COMM` text NOT NULL,
  `STATUS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID`, `USERID`, `DATE`, `ADDRESS`, `DELIVERYID`, `DELIVERYNAME`, `DELIVERYPRICE`, `AMOUNT`, `AMOUNTFULL`, `EMAIL`, `NUMBER`, `USERNAME`, `COMM`, `STATUS`) VALUES
(2, 1, '13.04.2024 01:29', 'Двинская ул., 5/7, Санкт-Петербург', 2, 'Курьерская служба по Лен. области', 300, 7483, 7783, 'asd@mail.ru', '+7 998 896-45-43', 'Иванов Иван Иванович', '', 2),
(3, 0, '13.04.2024 03:01', '7-я линия Васильевского острова, 16-18', 3, 'ТК ПЭК (без жесткой упаковки) от', 400, 3481, 3881, 'ivan@mail.ru', '+79998887766', 'Иванов Иван Иванович', 'А товары не портятся? ', 0),
(4, 1, '13.04.2024 03:02', 'Двинская ул., 5/7, Санкт-Петербург', 4, 'ТК ПЭК (жесткая упаковка) от', 700, 4784, 5484, 'asd@mail.ru', '+7 998 896-45-43', 'Иванов Иван Иванович', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_item`
--

CREATE TABLE `orders_item` (
  `ID` int NOT NULL,
  `ORDERID` int NOT NULL,
  `PRODID` int NOT NULL,
  `PRODNAME` varchar(255) NOT NULL,
  `VALUE` int NOT NULL,
  `AMOUNT` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders_item`
--

INSERT INTO `orders_item` (`ID`, `ORDERID`, `PRODID`, `PRODNAME`, `VALUE`, `AMOUNT`) VALUES
(1, 2, 2, 'Омега 3 - Friggs Omega 3 , 160 капсул.', 3, 4017),
(2, 2, 1, 'Витамины Puhdistamo Tripla Sinkki + C (Цинк + Витамин С) , 120 капсул.', 2, 3466),
(3, 3, 2, 'Омега 3 - Friggs Omega 3 , 160 капсул.', 1, 1339),
(4, 3, 3, 'Sana-sol Vitamiini D Oliivioly (Сана-сол Витамин Д на оливковом масле) 50 mkg 180 шт.', 2, 2142),
(5, 4, 12, 'Чёрный чай Nordqvist Taste of Kenya , 800 гр.', 2, 3886),
(6, 4, 9, 'Кофе молотый Segafredo Forza (4) - 425 гр.', 1, 898);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int NOT NULL,
  `CATID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PRICE` int NOT NULL,
  `CODE` varchar(255) NOT NULL,
  `WEIGHT` varchar(255) NOT NULL,
  `BRAND` varchar(255) NOT NULL,
  `TEXT` text NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `CATID`, `NAME`, `PRICE`, `CODE`, `WEIGHT`, `BRAND`, `TEXT`, `SRC`) VALUES
(1, 4, 'Витамины Puhdistamo Tripla Sinkki + C (Цинк + Витамин С) , 120 капсул.', 1733, '3127', '0.15', 'Puhdistamo', 'Витамины Puhdistamo Tripla Sinkki + C (Цинк + Витамин С)\r\n\r\nСодержит три высококачественные формы цинка: пиколинат цинка, бисглицинат и монометионин, что делает его исключительно универсальным продуктом цинка. В дополнение к этому в продукт добавлены витамин С и свободные аминокислоты для обеспечения уникальной абсорбции. Витамин B6 и цитрусовые биофлавоноиды в Tripla Zinc защищают витамин C от окисления. \r\n\r\nTripla Zinc также содержит редкую активную коферментную форму витамина B6, P5P, называемую пиридоксаль-5-фосфатом. Помимо прочего, P5P улучшает использование цинка в нашем организме и стимулирует выработку пиколиновой кислоты, которая отлично способствует усвоению цинка. Продукт содержит 2 мг/капсулу P5P.\r\n\r\nЦинк способствует хорошему состоянию костей, волос и кожи, а также жировому обмену. Цинк также способствует нормальному функционированию иммунной системы, а также нормальной фертильности и репродукции.\r\n\r\nСреди прочего, витамин С помогает поддерживать нормальное функционирование иммунной системы во время и после напряженных упражнений и помогает защитить клетки от окислительного стресса.\r\n\r\nПриём: 1 капсула в день\r\n\r\n1 капсула содержит:\r\n\r\nЦинк                            25 мг       250% *\r\nВитамин С                  60 мг    75% *\r\nВитамин B6 (P-5-P)    2 мг    143% *\r\n*% от суточной нормы потребления\r\n\r\nСостав:  L-глицин, L-метионин, L-лизин, L-цистеин, L-гистидин, аскорбиновая кислота (витамин С), пиколинат цинка, бисглицинат цинка, монометионин цинка (сульфат цинка, L-метионин), цитрусовые биофлавоноиды, пиридоксаль- 5-фосфат (витамин В6). Капсула: гидроксипропилметилцеллюлоза.', 'img/product/6617f6ed13180.jpg'),
(2, 4, 'Омега 3 - Friggs Omega 3 , 160 капсул.', 1339, '3126', '0.2', 'Moller', 'Омега 3 - Friggs Omega 3 \r\n\r\nПищевая добавка Омега-3 Фригг содержит омега-3 и представляет собой полиненасыщенные жирные кислоты, которые в основном содержатся в жирной рыбе, такой как лосось и скумбрия.Омега-3 представляет собой группу полиненасыщенных жирных кислот. Жирные кислоты омега-3 незаменимы, а это значит, что они необходимы для жизни, но организм не может производить их самостоятельно.\r\n\r\nСостав: Рыбий жир (72%), желатин (крупного рогатого скота), поверхностно-активный агент (глицерин), антиоксидант (d-альфа-токоферол).', 'img/product/6617f76b45c2c.jpg'),
(3, 4, 'Sana-sol Vitamiini D Oliivioly (Сана-сол Витамин Д на оливковом масле) 50 mkg 180 шт.', 1071, '3124', '0.15', 'Sana-sol', 'Sana-sol Vitamiini D Oliivioly (Сана-сол Витамин Д на оливковом масле) 50 mkg (2000 ме)\r\n\r\nКапсула витамина D. Оливковое масло 50 мкг — это сильный препарат витамина D, содержащий витамин D3 в оливковом масле первого отжима. Маленькие капсулы легко глотать.\r\nВитамин D полезен для костей, поскольку способствует усвоению кальция. Витамин D способствует нормальному функционированию иммунной системы и мышц.\r\n\r\nВитамин D известен своими костными эффектами. Кальций не усваивается без витамина D. Недавно были обнаружены его прекрасные эффекты в поддержании мышечной функции и сопротивляемости. Витамин D в качестве пищевой добавки рекомендуется круглый год людям до 18 лет, беременным и кормящим грудью, людям старше 75 лет и веганам. Для других это рекомендуется зимой, если вы не получаете достаточного количества витамина D в своем рационе. \r\n\r\nПриём: Взрослым по 1 таблетке в день.\r\n\r\nНе для детей. Продукт содержит высокую дозировку (50 мкг/день) витамина D. Продукт не предназначен для постоянного и длительного использования.\r\n\r\nИнгредиенты: Вспомогательные вещества (дикальцийфосфат, микрокристаллическая целлюлоза) поверхностно-обработанные (магниевые соли жирных кислот ), витамин D3 (холекальциферол).', 'img/product/6617ff5aa5ba6.jpg'),
(9, 7, 'Кофе молотый Segafredo Forza (4) - 425 гр.', 898, '3041', '0.5', 'Segafredo', 'Кофе молотый Segafredo Forza (4)\r\n\r\nВысококачественный и очень крепкий (степень обжарки 4+) фильтрованный кофе и зерна в итальянском стиле для самых требовательных любителей кофе. Вкусовой профиль Segafredo Forza сильный и богатый, поджаренный мед с оттенками темного шоколада', 'img/product/6619c9174e469.jpg'),
(10, 7, 'Кофе в зёрнах Rainbow kaffe Bonor (тёмная обжарка) - 1 кг.', 1725, '2888', '1', 'Rainbow', 'Кофе в зёрнах Rainbow kaffe Bonor (тёмная обжарка)', 'img/product/6619c999137ba.jpg'),
(11, 8, 'Зелёный чай Nordqvist China Powder tea, 1 кг.', 1865, '3038', '1', 'Nordqvist', 'Зелёный чай Nordqvist China Powder tea\r\n\r\nЗеленый китайский чай, получивший свое название «Порох» из-за скрученных чайных листьев, напоминающих шарик пороха. Чайные листья красиво раскрываются в горячей воде. Вкус оригинальный, сильный, с терпкими ароматами.', 'img/product/6619c9d94f838.jpg'),
(12, 8, 'Чёрный чай Nordqvist Taste of Kenya , 800 гр.', 1943, '2871', '0.9', 'Nordqvist', 'Чёрный чай Nordqvist Taste of Kenya - крепкий и насыщенный черный чай с большим количеством бутонов золотого чайного листа. Темный цвет чашки и ароматный вкус характерны для этого драгоценного и гордого чая.', 'img/product/6619ca3c4278a.jpg'),
(13, 9, 'Конфеты карамельная коровка Woogie Milk Caramels , 250 гр.', 153, '2917', '0.29', 'woogie', 'Woogie Milk Caramels ', 'img/product/6619caa403183.jpg'),
(14, 9, 'Паста орех-какао Stevia Sweet&safe intense cacoa spreed (без сахара) - 220 гр.', 651, '2414', '0.26', 'Stevia', 'Паста орех-какао Sweet&safe Stevia \r\n\r\nИнтенсивный какао-крем с фундуком, без добавления сахара, с подсластителем Стевия.\r\nБогатый клетчаткой. ', 'img/product/6619cada7a521.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products_new`
--

CREATE TABLE `products_new` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_new`
--

INSERT INTO `products_new` (`ID`, `PRODID`) VALUES
(2, 1),
(3, 2),
(4, 3),
(8, 9),
(9, 10),
(10, 11),
(11, 12),
(12, 13),
(13, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `RATEIT` int NOT NULL,
  `TEXT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`ID`, `PRODID`, `NAME`, `RATEIT`, `TEXT`) VALUES
(22, 11, 'Иванов Иван Иванович', 5, 'Отличный чай'),
(23, 12, 'Иванов Иван Иванович', 4, 'Сойдёт'),
(24, 1, 'Иванов Иван Иванович', 5, 'С ними я начал чувствовать себя как человек'),
(25, 1, 'Иванов Иван Иванович', 5, 'Лучшее что есть в этом мире'),
(26, 9, 'Иванов Иван Иванович', 1, 'Не вкусно');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `EMAIL`, `PHONE`, `NAME`, `ADDRESS`) VALUES
(1, 'user', 'u', 'asd@mail.ru', '+7 998 896-45-43', 'Иванов Иван Иванович', 'Двинская ул., 5/7, Санкт-Петербург');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_new`
--
ALTER TABLE `products_new`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `delivery`
--
ALTER TABLE `delivery`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `products_new`
--
ALTER TABLE `products_new`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
