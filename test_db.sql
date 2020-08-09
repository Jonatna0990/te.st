-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 09 2020 г., 18:46
-- Версия сервера: 8.0.19
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`) VALUES
(1, 22, 9617),
(2, 83, 5758),
(3, 28, 5100),
(4, 80, 9548),
(5, 58, 8378),
(6, 95, 5002),
(7, 36, 1925),
(8, 62, 7308),
(9, 96, 1667),
(10, 54, 6000),
(11, 44, 3733),
(12, 2, 5350),
(13, 4, 1793),
(14, 90, 2742),
(15, 34, 225),
(16, 30, 4414),
(17, 93, 3239),
(18, 1, 7585),
(19, 2, 7962),
(20, 9, 7840),
(21, 11, 9381),
(22, 90, 5962),
(23, 74, 1245),
(24, 36, 9080),
(25, 93, 2800),
(26, 13, 5902),
(27, 52, 7659),
(28, 54, 7645),
(29, 75, 9772),
(30, 58, 7023),
(31, 77, 1540),
(32, 17, 6340),
(33, 96, 8085),
(34, 32, 3067),
(35, 11, 915),
(36, 12, 4840),
(37, 83, 5959),
(38, 85, 1498),
(39, 65, 591),
(40, 28, 5245),
(41, 16, 7394),
(42, 16, 2612),
(43, 8, 4633),
(44, 86, 4898),
(45, 17, 5747),
(46, 42, 4733),
(47, 32, 9786),
(48, 26, 3792),
(49, 88, 6134),
(50, 82, 1123),
(51, 76, 707),
(52, 71, 5934),
(53, 89, 9615),
(54, 92, 8321),
(55, 19, 4865),
(56, 9, 6557),
(57, 93, 5915),
(58, 45, 1243),
(59, 26, 5850),
(60, 73, 9465),
(61, 17, 6034),
(62, 8, 8486),
(63, 70, 7173),
(64, 98, 1139),
(65, 98, 5971),
(66, 77, 932),
(67, 86, 5416),
(68, 2, 2462),
(69, 15, 2436),
(70, 70, 8752),
(71, 11, 4767),
(72, 89, 7832),
(73, 67, 1616),
(74, 7, 165),
(75, 92, 2956),
(76, 98, 750),
(77, 66, 7427),
(78, 99, 625),
(79, 77, 6103),
(80, 48, 2470),
(81, 85, 2418),
(82, 8, 5701),
(83, 58, 5700),
(84, 61, 5535),
(85, 83, 4846),
(86, 31, 9984),
(87, 42, 4876),
(88, 53, 7457),
(89, 87, 2130),
(90, 86, 2490),
(91, 12, 2161),
(92, 34, 6853),
(93, 80, 3514),
(94, 56, 1237),
(95, 92, 9437),
(96, 10, 1578),
(97, 44, 7409),
(98, 76, 8945),
(99, 9, 4514),
(100, 57, 6285);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(55) NOT NULL,
  `login` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `name`) VALUES
(1, 'plover@icloud.com', 'Lockey', 'rcbfX0EwjJ', 'Conley Bartosz Barkley'),
(2, 'lbaxter@mac.com', 'Conner', 'SeC6eFETLk', 'Lliam Cori Connar'),
(3, 'yxing@msn.com', 'Baley', 'FxMr0I38F3', 'LLeyton Corey-James Corey'),
(4, 'warrior@att.net', 'Comghan', 'CK2OQj5zh5', 'Limo Conall Bartosz'),
(5, 'yamla@comcast.net', 'Lliam', 'M3zctAT2bI', 'Lincoln-John Abdirahman Connar'),
(6, 'mavilar@me.com', 'Barney', 'A48E63zRRv', 'Conrad Connal Corie'),
(7, 'raines@yahoo.com', 'Connal', 'bOygHsQjJG', 'Conar Lincoln Colt'),
(8, 'eimear@outlook.com', 'Balian', 'onR3gUfvzx', 'Balian Colum Coray'),
(9, 'mhoffman@me.com', 'Conrad', 'MenUapqQhk', 'Lloyde Aaran Lincoln'),
(10, 'ivoibs@msn.com', 'Liyonela-Elam', 'sMSpXW9JSV', 'Baillie Balian Corey-Jay'),
(11, 'leslie@icloud.com', 'Basher', 'EUYGaM1aKt', 'Corey-Jay Lewis Barney'),
(12, 'leslie@icloud.com', 'Leyland', '7SeE4oEyfG', 'Connell Barry Lisandro'),
(13, 'presoff@sbcglobal.net', 'Connall', 'GnLY1li9aa', 'Connor Conlly Basher'),
(14, 'crusader@msn.com', 'Levi', 'yga38mbgDn', 'Conal Conan Baron'),
(15, 'flaviog@aol.com', 'Cooper', 'q6zeCPEKKh', 'Abdihakim Abdulbasir Colton'),
(16, 'mhoffman@me.com', 'Lochlan', 'oNxHsUwPDs', 'Limo Corey-Jay Comghan'),
(17, 'mhoffman@me.com', 'Conlyn', 'EUqSZuGB0p', 'Lockey Conlin Conall'),
(18, 'heroine@att.net', 'Lex', 'L0AYauGpxZ', 'Abdisalam Cooper Bartlomiej'),
(19, 'wainwrig@icloud.com', 'Levi', 'GvjhFgKAfz', 'Corey Abdul Colm'),
(20, 'crusader@msn.com', 'Limo', '9NXqaneYRq', 'Conli Abdirahman Leylann'),
(21, 'heroine@att.net', 'Copeland', 'hzditUmAfv', 'Leyland Baley Aaren'),
(22, 'schwaang@icloud.com', 'Connell', 'QD2HQP30lt', 'Linton Bartosz Alastair'),
(23, 'mosses@icloud.com', 'Conall', 'SsBnk0xfUJ', 'Conghaile Conor Liall'),
(24, 'campbell@icloud.com', 'Levi', 'gc3ankVHc3', 'Lincoln-John Conar Corben'),
(25, 'luebke@live.com', 'Aaren', 'IvIsWiOTj7', 'Balian Conal Connolly'),
(26, 'mosses@icloud.com', 'Liam', 'zkLeTz5v1Q', 'Conlin Alastair Baley'),
(27, 'morain@hotmail.com', 'Conor', 'bRflsbYQGD', 'Leyland Lionel Loche'),
(28, 'rogerspl@icloud.com', 'Cormack', '123123', 'GUGIGUI HIUOHUIOHUh hiohioh'),
(29, 'mhoffman@me.com', 'Baron', 'oYxmza3Tr6', 'Abdulbasir Lewie Cormack'),
(30, 'ilyaz@verizon.net', 'Leyland', 'Eb94dklUcM', 'Linden Corey-James Balian'),
(31, 'campbell@icloud.com', 'Leyton', 'lmYw7CgWEg', 'Abdul-Aziz Abdirahman Lincon'),
(32, 'schwaang@icloud.com', 'Conlon', 'Wow8UU2T6u', 'Barrie Levon Leylann'),
(33, 'iamcal@msn.com', 'Barath', 'TBCrN8oe6I', 'Comghan Conan Liam-Stephen'),
(34, 'mhanoh@msn.com', 'Lock', 'rSO9ioE1Eh', 'Conor Corin Lewis'),
(35, 'rhialto@att.net', 'Linton', '3ZtGKeVKq4', 'Leylann Baillie Conner'),
(36, 'luebke@live.com', 'Leylann', '6GUKSUVqOm', 'Bartlomiej Lloyd Banan'),
(37, 'campbell@icloud.com', 'Conlyn', '66ORcHetC8', 'Liam-Stephen Leylann Levon'),
(38, 'arathi@mac.com', 'Cormac', 'maFR8UXhqD', 'Connolly Corbin Liam'),
(39, 'leslie@icloud.com', 'Abdisalam', 'Wm6YAHDR7A', 'Lewin Corey Corben'),
(40, 'luebke@live.com', 'Lewis', 'lc9cvp8u3u', 'Colm Corin Conar'),
(41, 'wagnerch@comcast.net', 'Abdul-Aziz', 'eizgQS1fJY', 'Linton Linton Barkley'),
(42, 'arathi@mac.com', 'Lloyde', 'gYO497vq9s', 'Limo Cori Connal'),
(43, 'nwiger@sbcglobal.net', 'Conley', 'N1AMS2EoY1', 'Banan Conan Corey-James'),
(44, 'ivoibs@msn.com', 'Lockey', '8r6tLij9uj', 'Lincon Cormac Conrad'),
(45, 'schwaang@icloud.com', 'Colvin', 'HMW6oBgfsq', 'Corey-Jay Lochlann Lockey'),
(46, 'lbaxter@gmail.com', 'Corey-James', 'fGJNwQqITO', 'Comghan Abdirahman Connal'),
(47, 'mhouston@sbcglobal.net', 'Copeland', 'pPqKKRxSDK', 'Conal Alastair Connal'),
(48, 'dburrows@optonline.net', 'Litrell', 'aIJLWcomqb', 'Connall Abdul-Aziz Cori'),
(49, 'magusnet@mac.com', 'Abdisalam', 'KwuIrNGpee', 'Lloyd Linden Abdulbasir'),
(50, 'hampton@live.com', 'anas', 'JdXCi5AbHu', 'Abdul-Aziz Leylann Lockey'),
(51, 'nwiger@sbcglobal.net', 'Bartosz', '4ACb1coanN', 'Colum Bartlomiej Cori'),
(52, 'anicolao@verizon.net', 'Connell', 'F8CL8EVuOf', 'Lincoln-John Connor Lock'),
(53, 'donev@sbcglobal.net', 'Connan', 'YrKlOgESD1', 'Liall Conli Connell'),
(54, 'raines@yahoo.com', 'Conor', 'j1nJjdDRVn', 'Conal Levi Lloyde'),
(55, 'mcsporran@yahoo.com', 'Leydon', 'c4QeHsKRRZ', 'Colton Conghaile Linton'),
(56, 'lbaxter@mac.com', 'Lliam', 'Lb5wJssXTh', 'Linton Lewie Bartosz'),
(57, 'hampton@live.com', 'Leyland', 'jm80sHwxld', 'Connall Banan Conal'),
(58, 'rfoley@mac.com', 'Basher', 'ewHy43A0FE', 'Cori Lex Conor'),
(59, 'yxing@msn.com', 'Connolly', 'pY7l7YEhYa', 'anas anas Levy'),
(60, 'mhoffman@me.com', 'Conner', 'NVAF9NRtHQ', 'Connell Linden Connel'),
(61, 'wainwrig@icloud.com', 'Lex', 'jZ4bxNRKvg', 'Connor Comghan anas'),
(62, 'leakin@att.net', 'Lliam', 'x2I3zQPTZb', 'Lloyd Corie Conrad'),
(63, 'leslie@icloud.com', 'Copeland', 'jSUqqknub2', 'Lewin Colum Limo'),
(64, 'stakasa@me.com', 'Lincon', 'jzGyD3zAb5', 'Cormack Conar Lochlan'),
(65, 'ilyaz@verizon.net', 'Limo', 'ntf9hCyrkD', 'Colton Conor Cormac'),
(66, 'leslie@icloud.com', 'Litrell', '64C28HSSra', 'Leyland Litrell Corbin'),
(67, 'raines@yahoo.com', 'Conner', 'aQriiYCEwY', 'Connel Connan Lloyd'),
(68, 'raines@yahoo.com', 'Colvin', 'OWtVGBmNM4', 'Linton Colum Lochlan'),
(69, 'wenzlaff@me.com', 'Liam', '3veTDvr3cX', 'Alasdair Lionel Conrad'),
(70, 'eimear@outlook.com', 'Abdirahman', 'gGCWW152Cw', 'Barry Conar Corben'),
(71, 'nwiger@sbcglobal.net', 'Colton', 'IqI8dL8y4e', 'Lewis Corie Conlan'),
(72, 'magusnet@mac.com', 'Connor-David', 'jEezmoqwNk', 'Corie Loche Comghan'),
(73, 'warrior@att.net', 'Lockey', 'Erx3s5Uw5l', 'Levon Abdulbasir Corey-James'),
(74, 'wenzlaff@me.com', 'Conlon', '4kUTcVgZ9x', 'Leyland Colum Basher'),
(75, 'mcsporran@yahoo.com', 'Colum', 'wiDlqqMwpJ', 'Conan Corie Baley'),
(76, 'mcsporran@yahoo.com', 'Corben', 'Ptzvz2Lkuk', 'Leylann Abdul-Aziz Conor'),
(77, 'cliffordj@me.com', 'Limo', 'T2L5JtIhlK', 'Lisandro Litrell Aaren'),
(78, 'hampton@live.com', 'Copeland', '5g2dvNqlHQ', 'Bartosz Lock Leyland'),
(79, 'wainwrig@icloud.com', 'Corey-James', '1N0WjjYW0h', 'Lochlan Leylann Connor-David'),
(80, 'luebke@live.com', 'Corey-Jay', 'WKauDolCaY', 'Loche Liyonela-Elam Cormac'),
(81, 'wainwrig@icloud.com', 'Cooper', 'WOQiZi9DOv', 'Corben Lloyd Loche'),
(82, 'rhialto@att.net', 'Leydon', 'ndxkDg7U7F', 'Baley Liam-Stephen Conley'),
(83, 'dburrows@optonline.net', 'Liall', 'W4B714CiRg', 'Balian Colum Connall'),
(84, 'iamcal@msn.com', 'Abdisalam', 'HoeIfFGY3j', 'Colvin LLeyton Connar'),
(85, 'ilyaz@verizon.net', 'Conal', 'koOArHgw8f', 'Abdulbasir Abdisalam Conlan'),
(86, 'iamcal@msn.com', 'Cooper', 'vdVJeGkA71', 'Lloyd Levy Conlan'),
(87, 'rfoley@mac.com', 'Connolly', 'JMmix8ZKVB', 'Colum Conrad Litrell'),
(88, 'magusnet@mac.com', 'Colvin', 'U9ZccOJPUA', 'Connar Conall Conlin'),
(89, 'leslie@icloud.com', 'Colt', 'mWtslh0iSu', 'Lochlan-Oliver Conal Connar'),
(90, 'yxing@msn.com', 'Conan', 'ABz7tJU8j4', 'Colm Lockey Corey-James'),
(91, 'eidac@gmail.com', 'Lliam', 'r0kv7QnZNY', 'Conlan Barney Cormac'),
(92, 'cliffordj@me.com', 'Connar', 'kbbpzZGPlo', 'Baron Conli Corie'),
(93, 'crusader@msn.com', 'Lewis', 'bBa4aGK8Ss', 'Bartlomiej Lockey Linton'),
(94, 'mcsporran@yahoo.com', 'Liam', 'sbVWyyj9DS', 'Lloyde Aaren Leydon'),
(95, 'leslie@icloud.com', 'Basher', 'GTfIQgSdx8', 'Connell Connor Abdirahman'),
(96, 'ivoibs@msn.com', 'Conlly', 'U0WW0B3JZ3', 'Baron Baillie Liam'),
(97, 'iamcal@msn.com', 'Alasdair', 'nTHBzQSPHH', 'Bartosz Levy Conghaile'),
(98, 'lbaxter@mac.com', 'Abdulbasir', 'rJ8qoHlppp', 'Lionel Lionel Connall'),
(99, 'lbaxter@mac.com', 'Levi', '0DwrjiEGv0', 'Abdisalam Cooper Conner'),
(100, 'mosses@icloud.com', 'Balian', '2q5NljHX2Z', 'Connel Linden Copeland'),
(101, '', 'jo09990@bk.ru', 'sdfsd', 'sdfsd');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
