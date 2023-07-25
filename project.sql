-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 25 2023 г., 15:51
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `banner`
--

INSERT INTO `banner` (`id`, `title`, `subtitle`, `image`, `status`) VALUES
(1, 'Снарядные,тренировочные и профессиональные Перчатки для бокса', 'Снарядные,тренировочные и профессиональные Перчатки для бокса', 'c51153293894b9ad773f6fb3596f153c.jpg', 1),
(2, 'Перчатки для бокса', 'Перчатки для бокса', 'eadf5f0e22905f3729423bd9ffc5423c.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `name`, `status`) VALUES
(1, 'Adidas', 1),
(2, 'Everlast', 1),
(3, 'Band4Power', 1),
(4, 'Bad Boy', 1),
(5, 'German', 1),
(7, 'Venum', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `name`, `status`) VALUES
(1, 'yellow', 1),
(2, 'blue', 1),
(3, 'red', 1),
(4, 'orange', 1),
(5, 'black', 1),
(7, 'white', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `created_date` datetime NOT NULL,
  `phone` text NOT NULL,
  `category` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `created_date`, `phone`, `category`) VALUES
(1, 'Jahongir', 'xjoha@mail.ru', NULL, 'adasdsad', '2022-06-22 22:31:24', '998911631236', NULL),
(2, 'jahongir xushboqov', 'xjoha@mail.ru', NULL, '123', '2022-06-22 22:32:09', '8911631236', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `front_user`
--

CREATE TABLE `front_user` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `front_user`
--

INSERT INTO `front_user` (`id`, `first_name`, `last_name`, `email`, `phone`, `street`, `city`, `status`, `username`, `password`, `auth_key`, `access_token`) VALUES
(1, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '99999999', 'Taylak,Bagizagan,home-25', 'Samarkand', 1, 'bekmurod', '$2y$13$FAemO9sv8Tf1K8PXqScHj.oNUiXYx3bFYwykJBQfJtLxwLsbi5C9q', NULL, NULL),
(4, 'Timur', 'Isakov', 'tima@gmail.com', '998942821602', 'Samarkand', 'tashkent', 0, 'timur', '$2y$13$tVs5PqIaC6Z9n6PQFbkSauu4/XsAjX1fHd8/viHBrCVp1fu7lcZC.', NULL, NULL),
(5, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '915192001222', 'Belarus Minsk', 'Minskk', 0, 'bek_a', '$2y$13$vW1pbzFeoHsy/Vg3j4mhpulUZ0Ap5QDTHCRHWmME2o1vOkkiXUz..', NULL, NULL),
(6, NULL, NULL, 'behruz@gmail.com', '915192001222', NULL, NULL, 0, 'behruz', '$2y$13$XpyUnXdPrI00GhRwzcivZOXRaoHieTO3gScGa59avBSTdtNXSVeHm', NULL, NULL),
(7, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '915192001222', 'Samarkand', 'Minsk', 0, 'bekmurod_1', '$2y$13$Ir4brvjB3GJdyFoZbXOIaexpbTkU1TqmD0DMc5m9PdKhvXsVDpcWu', NULL, NULL),
(8, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '998915192001', 'Belarus Minsk', 'Minsk', 0, 'zver', '$2y$13$k3LKy9B3HucM6XPs.OIDHOoSqvVyMQ80wO3h.HpFM.LObp.5XWXbK', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `type` int DEFAULT NULL,
  `parent` int DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `order_by` int DEFAULT NULL,
  `status` int DEFAULT '0',
  `icon2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `type`, `parent`, `name`, `url`, `icon`, `order_by`, `status`, `icon2`) VALUES
(1, 0, NULL, 'Контакты', '/contact/', NULL, 30, 1, NULL),
(2, 0, NULL, 'Все Товары', '/product/', NULL, 10, 1, NULL),
(3, 0, NULL, 'Главная', '/', NULL, 1, 1, NULL),
(4, 0, NULL, 'Блог', '/news/', NULL, 15, 1, NULL),
(6, 0, NULL, 'О Нас', '/about/', NULL, 100, 1, NULL),
(9, 1, NULL, 'Главная', '/', NULL, 1, 1, NULL),
(10, 1, NULL, 'Блог', '/news/', NULL, 2, 1, NULL),
(11, 1, NULL, 'Все Товары', '/product/', NULL, 3, 1, NULL),
(12, 1, NULL, 'Контакты', '/about/', NULL, 4, 1, NULL),
(13, 1, NULL, 'О Нас', '/about/', NULL, 5, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL,
  `seen_count` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `create_date`, `updated_date`, `seen_count`, `image`, `status`) VALUES
(2, 'Для чего нужны компрессионные штаны?', '<p>Спортивная экипировка модернизируется и улучшается постоянно какие-то вещи действительно помогают спортсменам, а какие-то оказываются просто рекламным ходом. Очень частно люди задаются вопросом, стоит ли приобретать компрессионное белье: тайтсы, шорты, рашгард? Давайте разберем какое предназначение имеет подобная спортивная экипировка и какие плюсы несут в себе компрессионные штаны.</p>\r\n\r\n<p><img alt=\"\" src=\"https://rocky-shop.ru/images/blog/37-1.jpg\" /></p>\r\n\r\n<p><strong>Плюсы компрессионных штанов, которые оценят не только представители единоборств, но и любители всех видов спорта и физической активности.</strong></p>\r\n\r\n<p>1)&nbsp;<strong>Поддержание теплообмена</strong>. Компрессионные штаны защитят от сквозняка в спорт зале или от легкого ветра на улице. Наверняка вы знаете, как опасно бывает разогретому спортсмену попасть под потоки холодного воздуха и насколько резкое охлаждение повышает риск травмы мышцы</p>\r\n\r\n<p>2)&nbsp;<strong>Обеспечивают небольшое равномерное давление на кровяные сосуды</strong>, тем самым предотвращая возникновение варикоза и сосудистых звездочек. Особенно этот эффект важен во время силовых или скоростных тренировок, когда усиленная работа ногами заставляет сосуды работать в экстремальном режиме.</p>\r\n\r\n<p>3)&nbsp;<strong>Отводят пот</strong>, что дополнительно помогает не переохладиться и добавляет комфорт во время тренировки.</p>\r\n\r\n<p>4)&nbsp;<strong>Берегут мужское здоровье</strong>. Пункт, который часто упускают из вида, но который очень важен. Правильно подобранные компрессионные штаны плотно прилегают по всему телу и обеспечивают мягкую фиксацию очень важных мужских органов, что минимизирует риск травмы.</p>\r\n\r\n<p>5)&nbsp;<strong>Защищают от пыли и грязи</strong>&nbsp;во время тренировки на улице. Не важно, где вы, на спортивной площадке или во время пробежки на набережной, мелкие камушки из-под колес проезжающей мимо машины, валяющаяся ветка от дерева, или старое и ржавое спортивное оборудование так или иначе могут оставить царапины на коже, а компрессионные штаны готовы принять удар на себя.</p>\r\n', '2023-06-17 21:09:21', '2023-06-18 12:55:36', 21, 'cc2a1fb9b8222f9b17fa56afdf3b458f.jpg', 1),
(3, '5 шагов для НОКАУТИРУЮЩЕГО удара коленом. Фото и видео инструкция.', '<h1>Фото и видео инструкция.</h1>\r\n\r\n<p>ЗАЧЕМ ВАМ ИСПОЛЬЗОВАТЬ УДАРЫ КОЛЕНЯМИ</p>\r\n\r\n<p>Колено &ndash; основное оружие тайского бокса. Если Вы когда-нибудь видели бои реальных тайцев, то замечали, насколько много они бьют коленями. Боец, владеющий этим приемом, может легко посадить оппонента на пятую точку. Удары коленями используются в качестве приема наступления или контратаки.</p>\r\n\r\n<p>Это универсальное оружие, которое можно использовать на дальней, средней и близкой дистанции боя. Не надо недооценивать его силу!</p>\r\n\r\n<p>Колени в размене и в клинче.</p>\r\n\r\n<p>Существует большое количество вариаций этого удара. По большому счету, удары коленями делятся на два типа &ndash; удары из стойки и в клинче. Когда, между Вами и противником есть расстояние, то используются прямые удары коленями (вперед). Когда входите в клинч, то удары меняются, поскольку расстояние существенно уменьшается. Из стойки Вы также можете использовать удары коленями в прыжке, но это отдельная техника, мы рассмотрим ее в другой статье.</p>\r\n\r\n<p>ПРЯМЫЕ УДАРЫ КОЛЕНЯМИ</p>\r\n\r\n<p>Эти удары излюбленная техника многих бойцов. Им Вы можете отбросить противника в оборонительную позицию у канатов. Хорошо поставленный удар причиняет большую боль сопернику, и даже может привести к нокауту.</p>\r\n\r\n<p>ВАЖНО: Особенно прямые удары коленями подходят для высоких и худых бойцов, поскольку их конечности более длинные. Это увеличивает дистанцию нанесения удара.</p>\r\n\r\n<p>Чтобы нанести сокрушительный удар Вам нужно использовать бедра, при этом отклоняясь корпусом немного назад, для создания импульса движения вперед. Цельтесь в область живота соперника. Представьте, что Ваше колено &mdash; это копье, которым Вы хотите проткнуть врага.</p>\r\n\r\n<p>ВАЖНО: Не забывайте отклоняться назад. Этим Вы усилите удар и возможно уйдете от контратаки с рук.</p>\r\n\r\n<p>Элитные бойцы&nbsp;<a href=\"https://rocky-shop.ru/ekipirovka-dlya-edinoborstv/akipirovka-dlya-taiskogo-boksa/\">муай тай</a>&nbsp;имеют небольшие различия в технике этого удара. Для того, чтобы понять какая из них подходит именно Вам и вывести идеальную формулу, надо проанализировать удары ТОП профессионалов.</p>\r\n', '2023-06-18 12:54:17', '2023-06-18 12:54:18', NULL, 'd671f5364482c1b78c9ba4c7f8974793.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news_category`
--

CREATE TABLE `news_category` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int DEFAULT '0',
  `order_by` int DEFAULT NULL,
  `parent` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `status`, `order_by`, `parent`) VALUES
(1, 'All', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `qty` int NOT NULL,
  `sum` float NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `first_name`, `last_name`, `email`, `phone`, `street`, `city`, `created_date`, `updated_date`, `qty`, `sum`, `status`, `user_id`) VALUES
(1, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '+9998999999999', 'Samarkand', 'Minsk', '2023-06-18 11:36:29', '2023-06-18 12:36:53', 5, 510, 1, 7),
(2, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '915192001222', 'Samarkand', 'Minsk', '2023-06-18 12:38:48', '2023-06-18 12:38:48', 3, 217, 1, 7),
(3, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '915192001222', 'Samarkand', 'Minsk', '2023-06-18 12:44:11', '2023-06-18 12:44:11', 1, 40, 1, 7),
(4, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '915192001222', 'Samarkand', 'Minsk', '2023-06-18 12:46:27', '2023-06-18 12:46:27', 3, 323, 1, 7),
(5, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '998915192001', 'Belarus Minsk', 'Minsk', '2023-06-18 13:36:59', '2023-06-18 13:36:59', 3, 190, 1, 8),
(6, 'Bekmurod', 'Ahmadov', 'xbek1321@gmail.com', '998915192001', 'Belarus Minsk', 'Minsk', '2023-06-18 14:22:55', '2023-06-18 14:22:55', 1, 90, 1, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
--

CREATE TABLE `order_item` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `qty_item` int NOT NULL,
  `sum_item` int NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`, `user_id`) VALUES
(1, 1, 4, 'Перчатки боксерские Excalibur 8061/04 White Buffalo', 90, 2, 180, 7),
(2, 1, 3, 'Перчатки боксерские Venum Phantom Black/Red', 145, 2, 290, 7),
(3, 1, 2, 'Боксерские перчатки UNIQUE сине-белые', 40, 1, 40, 7),
(4, 2, 1, 'Перчатки боксерские GREEN HILL HAMED детские', 87, 1, 87, 7),
(5, 2, 2, 'Боксерские перчатки UNIQUE сине-белые', 40, 1, 40, 7),
(7, 3, 2, 'Боксерские перчатки UNIQUE сине-белые', 40, 1, 40, 7),
(8, 4, 4, 'Перчатки боксерские Excalibur 8061/04 White Buffalo', 90, 2, 180, 7),
(9, 4, 6, 'Щитки Venum Kontact Blue', 143, 1, 143, 7),
(10, 5, 2, 'Боксерские перчатки UNIQUE сине-белые', 40, 2, 80, 8),
(11, 5, 8, 'Перчатки боксерские профессиональные LEADERS PRO BK/WH', 110, 1, 110, 8),
(12, 6, 4, 'Перчатки боксерские Excalibur 8061/04 White Buffalo', 90, 1, 90, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `pcounter_save`
--

CREATE TABLE `pcounter_save` (
  `save_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `save_value` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pcounter_save`
--

INSERT INTO `pcounter_save` (`save_name`, `save_value`) VALUES
('counter', 63),
('day_time', 2460151),
('max_count', 2),
('max_time', 1671181200),
('yesterday', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pcounter_users`
--

CREATE TABLE `pcounter_users` (
  `user_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_time` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pcounter_users`
--

INSERT INTO `pcounter_users` (`user_ip`, `user_time`) VALUES
('182f34ba440f445651391e073ff17f38', 1690282056);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `new_price` float NOT NULL,
  `product_id` int NOT NULL,
  `color_id` int NOT NULL,
  `stock` int NOT NULL DEFAULT '1',
  `brand_id` int NOT NULL,
  `featured` int NOT NULL DEFAULT '1',
  `best` int NOT NULL DEFAULT '1',
  `new` int NOT NULL DEFAULT '1',
  `trend` int NOT NULL,
  `sale` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `body`, `price`, `new_price`, `product_id`, `color_id`, `stock`, `brand_id`, `featured`, `best`, `new`, `trend`, `sale`, `status`, `image`) VALUES
(1, 'Перчатки боксерские GREEN HILL HAMED детские', 'Тренировочные перчатки Green Hill \"Hamed\" предназначены для детей в возрасте до 9 лет. Эта модель наиболее популярна в этой возрастной категории. Перчатки сделаны из качественной искусственной кожи. Прекрасно сидят на руке и надежно фиксируют руку застежк', '<p>Тренировочные перчатки Green Hill &quot;Hamed&quot; предназначены для детей в возрасте до 9 лет. Эта модель наиболее популярна в этой возрастной категории.<br />\r\nПерчатки сделаны из качественной искусственной кожи. Прекрасно сидят на руке и надежно фиксируют руку застежкой на липучке. Отличный выбор для будущих чемпионов.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2000, 87, 1, 2, 1, 1, 1, 1, 0, 1, 1, 1, 'bf89d520b3019208531d4c814de817d2.jpg'),
(2, 'Боксерские перчатки UNIQUE сине-белые', 'Боксерские перчатки «TOTALBOX» сочетают в себе строгий стиль, удобство, высочайшее качество и долговечность. При производстве используется 5 видов кожи, 11 видов материалов, применяется несколько технологических новинок и ноу хау. Все элементы многокомпон', '<p>Боксерские перчатки &laquo;TOTALBOX&raquo; сочетают в себе строгий стиль, удобство, высочайшее качество и долговечность. При производстве используется 5 видов кожи, 11 видов материалов, применяется несколько технологических новинок и ноу хау. Все элементы многокомпонентной конструкции перчаток производятся в России. Единственный &laquo;иностранец&raquo; в новинке рынка &mdash; это высококачественная прочная кожа, сделанная в Италии под заказ для ТМ &laquo;TOTALBOX&raquo;.<br />\r\nОсобенностью новых перчаток является формообразующая вставка (набивка), особым образом формированная из нескольких видов материалов, в числе которых элемент из натурального латексированного кокосового волокна.<br />\r\nПреимущества нового типа перчаток ручной, высокотехнологичной сборки:<br />\r\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;исключительное качество исходных материалов;<br />\r\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;тщательно и сбалансированно подобранная плотность, эластичность и толщина многослойной &laquo;набивки&raquo;;<br />\r\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;под оптимальным углом сформированный &laquo;загиб&raquo; позволяет экономить силы для нокаутирующих ударов;<br />\r\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;чрезвычайно удобная форма кроя позволяет руке чувствовать себя &laquo;как дома &raquo; в&nbsp;&nbsp;перчатке;<br />\r\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;эргономично &raquo; упакованный &raquo; и защищенный большой палец позволяет руке быть единым сокрушительным монолитом;<br />\r\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;качественная кожа, технологичный крой элементов , контроль пошива каждого шва дают перчатке необходимую смесь прочности эластичности и надежности.<br />\r\nПолугодовые испытания в &raquo; экстремальных&raquo; условиях показали поразительную &laquo;живучесть &raquo; боксерских перчаток &laquo;TOTALBOX&raquo;. На них не только не порвался ни один шов, но они даже не потеряли первоначальную форму</p>\r\n', 45, 40, 1, 3, 0, 1, 1, 1, 1, 1, 1, 1, '81f06ef3083e635e360c722fe4f52299.jpg'),
(3, 'Перчатки боксерские Venum Phantom Black/Red', 'Перчатки боксерские Venum Phantom Black/Red', '<p>Перчатки боксерские Venum Phantom Black/Red</p>\r\n', 145, 130, 1, 5, 0, 1, 1, 1, 1, 1, 0, 1, '5d2c4bb60e4c366a67facecd482dd7ac.png'),
(4, 'Перчатки боксерские Excalibur 8061/04 White Buffalo', 'Перчатки боксерские Excalibur 8061/04 White Buffalo', '<p>Перчатки боксерские Excalibur 8061/04 White Buffalo.Перчатки боксерские Excalibur 8061/04 White Buffalo</p>\r\n', 100, 90, 1, 7, 0, 2, 1, 1, 0, 0, 1, 1, 'c9b7040cb6f7e7be2c82ffd3401295e2.jpg'),
(5, 'Перчатки боксерские Excalibur 8031/01 Black Buffalo', 'Перчатки боксерские Excalibur 8031/01 Black Buffalo', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullamLorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullamLorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullamLorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullamLorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam</p>\r\n', 120, 110, 1, 5, 1, 5, 1, 1, 1, 0, 0, 1, 'c22fc296e2da61e827b2e8c1fb22b04a.jpg'),
(6, 'Щитки Venum Kontact Blue', 'Щитки Venum Kontact Blue', '<p>Nikon Z30 оптимизирован для удовлетворения потребностей современного видеоблогера. Корпус весит около 350 г, поэтому вы можете легко брать камеру с собой куда угодно. 3-дюймовый экран, который можно наклонять и поворачивать, включает в себя ряд выбираемых настроек селфи, такие как положение автофокуса, экспозиция и настройки автоспуска, а также поддерживает сенсорное управление. На передней панели камеры есть красный индикатор, чтобы вы всегда знали, когда снимаете.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nikon Z30 оптимизирован для удовлетворения потребностей современного видеоблогера. Корпус весит около 350 г, поэтому вы можете легко брать камеру с собой куда угодно. 3-дюймовый экран, который можно наклонять и поворачивать, включает в себя ряд выбираемых настроек селфи, такие как положение автофокуса, экспозиция и настройки автоспуска, а также поддерживает сенсорное управление. На передней панели камеры есть красный индикатор, чтобы вы всегда знали, когда снимаете.</p>\r\n', 175, 143, 6, 2, 1, 5, 1, 1, 0, 1, 1, 1, '4a27c068f630b1da1ed4333a4181ef1f.jpg'),
(7, 'Защита голени и стопы EVERLAST Prime MMA', 'Защита голени и стопы Prime MMA Shin Guards идеально подойдёт для спаррингов . ', '<p>Защита голени и стопы Prime MMA Shin Guards идеально подойдёт для спаррингов . Надёжную защиту от травм и повреждений гарантирует пенный материал высокой плотности ISOPLATE, который находится в центральной части щитков. Настраиваемые крепления-липучки подойдут под любой размер ноги, обеспечат плотное прилегание к голени не сковывая при этом движения. Модель выпускается в одном размере.</p>\r\n', 95, 75, 6, 5, 0, 4, 1, 1, 1, 0, 0, 1, 'baff33a811da08a5789b7c4697599422.jpg'),
(8, 'Перчатки боксерские профессиональные LEADERS PRO BK/WH', 'Перчатки боксерские LEADERS LeadSeries  созданы на основе высококачественных материалов и с использованием натуральной премиальной кожи. Лаконичный дизайн, идеальная посадка руки,', '<p>Перчатки боксерские LEADERS LeadSeries&nbsp;&nbsp;созданы на основе высококачественных материалов и с использованием натуральной премиальной кожи. Лаконичный дизайн, идеальная посадка руки, современные технологии и материалы, качество пошива , устойчивый к нагрузкам многослойный пенный наполнитель делают эти перчатки настоящим БЕСТСЕЛЛЕРОМ.</p>\r\n', 124, 110, 1, 7, 0, 3, 1, 1, 0, 1, 1, 1, '4cf22e9dc7fd221e66e320f691610a4b.jpg'),
(9, 'Детские боксерские перчатки Leone 1947 LEO CAMO', 'Камуфляж подчеркивает цель и задачу молодого спортсмена. А самые внимательные в принте камуфляжа смогут найти льва. Оригинальный и узнаваемый дизайн.', '<p>Детские боксерские перчатки Leone 1947 LEO CAMO GN404<br />\r\nМатериал: Синтетическая кожа.<br />\r\nКрепление: Липучка.<br />\r\nЦвет: Камуфляж.<br />\r\n<br />\r\nНовая модель в линейке для начинающих молодых спортсменов.<br />\r\nВ модели особое внимание уделено безопасности ребенка.<br />\r\nНадежная и мягкая манжета, выставленный большой палец, средняя жесткость набивки.<br />\r\nМодель получила название LEO CAMO.<br />\r\nКамуфляж подчеркивает цель и задачу молодого спортсмена. А самые внимательные в принте камуфляжа смогут найти льва.<br />\r\nОригинальный и узнаваемый дизайн.</p>\r\n', 120, 89, 1, 5, 1, 1, 1, 1, 1, 0, 0, 1, '98e016740e32d7812bea2d7c8531c7f5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product_category`
--

CREATE TABLE `product_category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `popular` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `image`, `status`, `popular`) VALUES
(1, 'БОКСЕРСКИЕ ПЕРЧАТКИ', 'e383048f4ab98605e8d438b8a1ae0082.png', 1, 1),
(2, 'ПЕРЧАТКИ ММА', 'd1000908cd36b3a792d0b2e1e8b84fee.png', 1, 1),
(3, 'БИНТЫ БОКСЕРСКИЕ', '6c302c79d995c4fa2c2d110f470eee09.png', 1, 1),
(4, 'ЛАПЫ, ПАДЫ', '2a3b36e2ca0e52e8ac8503c5d07fcd28.png', 1, 1),
(6, 'ЗАЩИТНАЯ ЭКИПИРОВКА', '5fb719b385a966c3070a38ce6f1d9310.png', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_char`
--

CREATE TABLE `product_char` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_char`
--

INSERT INTO `product_char` (`id`, `name`, `value`, `product_id`) VALUES
(13, 'Цвет ', 'синий	', 1),
(17, 'Цвет ', 'черный/красный', 2),
(27, 'Производитель', ' VENUM', 3),
(32, 'Производитель ', 'EXCALIBUR', 4),
(38, 'Производитель ', 'EXCALIBUR', 5),
(45, 'Производитель Производитель VENUM', 'Производитель VENUM', 6),
(52, 'Производитель ', 'EVERLAST', 7),
(59, 'Производитель ', 'LEADERS', 8),
(62, 'Производитель', '	 LEONE 1974', 9),
(66, 'Тип матрицы', 'Полнокадровая CMOS-матрица Exmor RS 35 мм (35,9 x 24,0 мм)', 10),
(77, 'Общее количество пикселей	', 'Прибл. 50,5 МП', 10),
(78, 'Количество эффективных пикселей	', 'Прибл. 50,1 МП', 10),
(79, 'Соотношение размеров сторон экрана	', '3,2', 10),
(80, 'MТип Матрицы	', '22,3 x 14,9 мм CMOS', 11),
(81, 'Производитель ', 'GREEN HILL', 1),
(82, 'Размерный ряд ', 'ONE', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `product_comment`
--

CREATE TABLE `product_comment` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `product_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_comment`
--

INSERT INTO `product_comment` (`id`, `name`, `email`, `message`, `created_date`, `updated_date`, `product_id`) VALUES
(1, 'Bekmurod', 'xbek@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', '2022-11-14 22:54:11', '2022-11-14 22:54:11', 6),
(2, 'Weraka', 'xbek@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', '2022-11-14 22:54:38', '2022-11-14 22:54:38', 6),
(3, 'Bekmurod', 'xbek@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', '2022-11-15 16:34:02', '2022-11-15 16:34:02', 7),
(4, 'Timur', 'xbek@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', '2022-11-15 19:45:12', '2022-11-15 19:45:12', 5),
(5, 'Bobur', 'xbek@gmail.com', 'asdasdasdasdasdasdasd', '2022-11-17 10:08:16', '2022-11-17 10:08:16', 6),
(6, 'Botir', 'xbek@gmail.com', 'hello world', '2022-11-18 19:52:07', '2022-11-18 19:52:07', 8),
(7, 'Weraka', 'xbek@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', '2022-11-21 10:46:07', '2022-11-21 10:46:07', 3),
(8, 'Siroj', 'xbek@gmail.com', 'Test', '2022-12-07 01:27:13', '2022-12-07 01:27:13', 2),
(9, 'Bekmurod', 'xbek1321@gmail.com', 'test', '2023-03-06 23:33:44', '2023-03-06 23:33:44', 2),
(10, 'Behruz', 'xbek1321@gmail.com', 'test', '2023-03-08 21:22:17', '2023-03-08 21:22:17', 7),
(11, 'asdasda', 'xbek1321@gmail.com', 'asdasdas', '2023-06-06 21:49:41', '2023-06-06 21:49:41', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product_image`
--

CREATE TABLE `product_image` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`) VALUES
(79, 10, '5625aa895b363a4800c5aef5198d1e1a.jpg'),
(80, 10, '8dab155097b33266f0ab962bc5df6d1d.jpg'),
(81, 10, 'bf0b169cf4d49acb19cfeb2a40427a28.jpg'),
(82, 11, '234fa3e16ef4be9327a737e19ab8877b.jpg'),
(83, 11, 'aa0e8c7beb6a2866cf021e9554cd43a1.jpg'),
(84, 11, '4fdb74d35ac2b708a9585cd3bf084a82.jpg'),
(85, 11, '657a237b6a49f88ae38acbcfe2cce8ad.jpg'),
(89, 1, '5b4abe966690fdd01776550560713324.jpg'),
(90, 1, '4d04c5101630fbc1ee9fa2ab11323a30.jpg'),
(91, 2, '2fc0956a7c92b07fdc0654b9571ec749.jpg'),
(92, 2, '8f3351f7c6af4e03008bc920fee292e0.jpg'),
(93, 3, '58c810f4d342581e77e557e8887e165f.png'),
(94, 4, '61ac575d5e41c4b848cbefa6abad3384.jpg'),
(95, 5, '8553e8c340970cb462a2c31da2c4184b.jpg'),
(96, 5, 'bfa1460f7f63c3809b90be586aa31920.jpg'),
(97, 6, '9ad3c758637364894f0af29491caceeb.jpg'),
(98, 7, '6553c21eceba351478d6d889fffdad52.jpg'),
(99, 8, '047d47b7a9f5a8bfcd24f8bda49387be.jpg'),
(100, 9, '54e67e4381966f1726dddba5e0113e41.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` varchar(100) NOT NULL,
  `val` varchar(1000) NOT NULL,
  `url` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `val`, `url`) VALUES
('adress', 'Маунтин-Вью, Калифорния 94043, США', NULL),
('copyright', 'Copyright © 2021 Ehay. Разработано', NULL),
('email', 'permvagin@gmail.com\r\n', NULL),
('phone-france', '+33 7 81 84 30 20', NULL),
('phone-number', '+375 25 706 88 26', NULL),
('pochta', 'PO Box 97845 Baker st. 567, Los Angeles, California, US.', NULL),
('rejim', 'Пн-Пт: 7:00 - 17:00', NULL),
('skype', 'Edulight', NULL),
('website', 'www.behruz.com', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `site_user`
--

CREATE TABLE `site_user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `creator` int DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `rank` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `site_user`
--

INSERT INTO `site_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `creator`, `district_id`, `rank`) VALUES
(2, 'admin', '2oPTB8o2X8oT6eaJq9AhOGXHdJ8RzTTL', '$2y$13$f2p4eJY6u8w8smC9VUN4guMMweinYS93F6NLDeGJIC/m50AnbkvAG', NULL, 'umail@mail.ru', 10, 1594473306, 1594473557, NULL, NULL, 1),
(3, 'oltinsoy_arx', '9LcQI8AnHiROMG0D1U5Top3RIF8mg4Y5', '$2y$13$0dRwBYZqHEa5GhdMJ4Be.eBXUGrrX/j023p9muyt3nLbDXT2NV3CG', NULL, 'oltinsoy@terarx.uz', 10, 1594473330, 1594583987, NULL, 94, 2),
(4, 'angor_arx', 'QMaGroGDw9NuEaubfxOs_5gGy0F2tsbz', '$2y$13$aIwhEc7rXM1C7xNIMYR4ze4ypE1lQqS6ZYX8GZcBWJpqzoHvPWVAK', NULL, 'angor@terarx.uz', 10, 1594588628, 1594588628, NULL, 95, 2),
(5, 'termizsh_arx', 'rA0XgxIbJFL6fHZgpPkEKPSczhRPbNsT', '$2y$13$p5Vc4STUiGPLjW04EoSmwevipRjkU1qaS6.sbT9ZZz9Kd6F4gHHz6', NULL, 'termizsh@terarx.uz', 10, 1598254002, 1598254002, NULL, 107, 2),
(6, 'boysun_arx', 'IvPCLoaVRV60-tSW3viTuvhymNHXnBYw', '$2y$13$jVcgTOWD0XZnubGa/mkv3OGXrluRU2GAyiXZ.sSsrNkMrqeUvfEmG', NULL, 'boysun@terarx.uz', 10, 1598254031, 1598254046, NULL, 96, 2),
(7, 'denov_arx', 'h4PEFV7XVFMaNDeHF8ptJS5vTLn5AQ4j', '$2y$13$10WH/vI.8DW6XpgfejwpiusOizkkIPxlFFegwlSKjSsPSGYTnSXHG', NULL, 'denov@terarx.uz', 10, 1598254077, 1598254077, NULL, 97, 2),
(8, 'jarqurgon_arx', '39VPFdP-yei5FkGgwNtk9qfZ3-Dh7UmP', '$2y$13$JwvAV/I7bxR69vFg7RjGiugNAF7OVTueyIfHQikfnKFS4Bl6CbZDy', NULL, 'jarqurgon@terarx.uz', 10, 1598254394, 1598254394, NULL, 98, 2),
(9, 'qiziriq_arx', '8SCp7N0pRf7s59qyoDT9HVgofzBASFR9', '$2y$13$96gUJbwTuplLD0GpbL9lnumzsbkKLpyAijNXpQOC4wXe2EbyAafRe', NULL, 'qiziriq@terarx.uz', 10, 1598254412, 1598254412, NULL, 99, 2),
(10, 'qumqurgon_arx', 'E3dyyK9G8-8FEJiDZWCYZtXJKCth0M9V', '$2y$13$z4ts1tK61rz6QswGfmTT0.N6LDZD03OCGtz6XTlO1MrPxbL3spk9u', NULL, 'qumqurgon@terarx.uz', 10, 1598254432, 1598254432, NULL, 100, 2),
(11, 'muzrabot_arx', '8MLHZ4BwaV4bIqVch858TNyfmKKootX_', '$2y$13$yYFs3qw3.0TJwBfdaPoIT.9nrY4Bet9kbeVltQBOY15bdq/WdD8HW', NULL, 'muzrabot@terarx.uz', 10, 1598254455, 1598254455, NULL, 101, 2),
(12, 'sariosiyo_arx', 'HpzLNATeJW37cXApvsm4-8KT7Hf_2GwL', '$2y$13$CVnbRQ2AevrFOUYp2wCuyuhZC0Y6mvr2OmN/YMBl5bKHkaMoT0skC', NULL, 'sariosiyo@terarx.uz', 10, 1598254483, 1598254483, NULL, 102, 2),
(13, 'termizt_arx', 'qQRKWzESMz3ZfJeX7AA_VJPtsuw4q2_M', '$2y$13$JS9ofRzWyBEyHwXhIo9DkOIEJ5Ir0Af0OHoGDYwR3fTiYWxG4b1fq', NULL, 'termizt@terarx.uz', 10, 1598254504, 1598254504, NULL, 103, 2),
(14, 'uzun_arx', 'ZrXVqarg6NeZ8SbJwTJQwmcCQ6OFBRoO', '$2y$13$JDlW1dMmgZj4IuEXDZqC9O60BCLXOjuVWCK2u1FmtawKtqr5SiBTS', NULL, 'uzun@terarx.uz', 10, 1598254528, 1598254528, NULL, 104, 2),
(15, 'sherobod_arx', 'zAB1e73X3w9fH51f_xMHh5Go1jaCVIrR', '$2y$13$PdDiMNPRvqqOcp28w2WZs.4qDJH/JuuZphTtCKlZLptcNe4FLFLg2', NULL, 'sherobod@terarx.uz', 10, 1598254549, 1600344263, NULL, 105, 2),
(16, 'shurchi_arx', 'a0nn9QGhio9QWHH_5I6jno1cI-CYb_W1', '$2y$13$VWFRL.BrGxGGoiIdxiIZde.AiKXhVv9ySONjlBuO4Evn9gaBCWKpm', NULL, 'shurchi@terarx.uz', 10, 1598254569, 1598254569, NULL, 106, 2),
(17, 'bandixon_arx', 'E_oZ7IyqQaXNX_-vGHrGWriWORR8ZFDT', '$2y$13$n7UHeqv.D4rw05JdyFIsDOATCcpgP.xhByZ8hhtk2CJcSha3.bq6i', NULL, 'bandixon@oncon.uz', 10, 1601432634, 1601432634, NULL, 194, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `title`, `link`, `image`, `status`) VALUES
(3, '', '/', '51d1196124019efd4ea523b5fb379c2d.jpg', 1),
(4, '', '/', '9a133d568d0b1b56b30e16f8104efc01.jpg', 1),
(5, '', '/', 'a007cb39302b5687a2ab6d1b1fa4066f.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `social`
--

CREATE TABLE `social` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `social`
--

INSERT INTO `social` (`id`, `name`, `link`, `icon`, `status`, `image`) VALUES
(1, 'Google', 'https://www.telegram.org', 'fa fa-google-plus', 1, NULL),
(2, 'You tube', 'https://www.youtube.com', 'fa fa-youtube', 1, NULL),
(3, 'twitter', 'https://www.twitter.com', 'fa fa-twitter', 1, NULL),
(4, 'instagram', 'https://www.instagram.com', 'fa fa-instagram', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `creator` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `creator`) VALUES
(1, 'humoyun', 'dArVMsVrEo-9LPrwI4RtJc_I0eAnIIu9', '$2y$13$Xtt17UIHbhAssWz//LkfO.SVK9s1MTi9BfpHSD1luvgQ8pXoqSEtK', NULL, '', 10, 1481295772, 1687087665, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `front_user`
--
ALTER TABLE `front_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pcounter_save`
--
ALTER TABLE `pcounter_save`
  ADD PRIMARY KEY (`save_name`);

--
-- Индексы таблицы `pcounter_users`
--
ALTER TABLE `pcounter_users`
  ADD PRIMARY KEY (`user_ip`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_char`
--
ALTER TABLE `product_char`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `site_user`
--
ALTER TABLE `site_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `front_user`
--
ALTER TABLE `front_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product_char`
--
ALTER TABLE `product_char`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `site_user`
--
ALTER TABLE `site_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `social`
--
ALTER TABLE `social`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
