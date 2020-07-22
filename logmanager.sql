-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 22 2020 г., 13:19
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rumex_testtask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

DROP TABLE IF EXISTS `access`;
CREATE TABLE IF NOT EXISTS `access` (
  `a_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_ip` varchar(128) NOT NULL,
  `a_date` datetime NOT NULL,
  `a_request` varchar(256) NOT NULL,
  `a_answer_code` int(11) NOT NULL,
  `a_response_size` int(11) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `access`
--

INSERT INTO `access` (`a_id`, `a_ip`, `a_date`, `a_request`, `a_answer_code`, `a_response_size`) VALUES
(1, '::1', '2020-07-20 07:15:43', 'GET /phpmyadmin/themes/pmahomme/img/b_ftext.png HTTP/1.1', 200, 550),
(2, '::1', '2020-07-20 07:17:47', 'GET /phpmyadmin/themes/pmahomme/img/col_drop.png HTTP/1.1', 200, 111),
(3, '::1', '2020-07-20 07:17:47', 'GET /phpmyadmin/themes/pmahomme/img/s_fulltext.png HTTP/1.1', 200, 176),
(4, '::1', '2020-07-20 07:25:51', 'GET /phpmyadmin/index.php?ajax_request=1&recent_table=1&no_debug=true&_nocache=1595229951738981171&token=m*(U:6_;S7q,CR%) HTTP/1.1', 200, 1652),
(5, '::1', '2020-07-20 07:25:51', 'GET /phpmyadmin/favicon.ico HTTP/1.1', 200, 22486),
(6, '::1', '2020-07-20 07:25:51', 'POST /phpmyadmin/ajax.php HTTP/1.1', 200, 1593),
(7, '::1', '2020-07-20 07:25:51', 'POST /phpmyadmin/ajax.php HTTP/1.1', 200, 1699),
(8, '::1', '2020-07-20 07:25:51', 'POST /phpmyadmin/navigation.php?ajax_request=1 HTTP/1.1', 200, 3343),
(9, '::1', '2020-07-20 07:25:51', 'POST /phpmyadmin/ajax.php HTTP/1.1', 200, 1602),
(10, '::1', '2020-07-20 07:25:51', 'GET /phpmyadmin/sql.php?server=1&db=rumex_testtask&table=access&pos=0 HTTP/1.1', 200, 14933),
(11, '::1', '2020-07-20 07:25:50', 'GET /phpmyadmin/themes/pmahomme/img/s_unlink.png HTTP/1.1', 200, 589),
(12, '::1', '2020-07-20 07:21:28', 'GET /phpmyadmin/index.php?ajax_request=1&recent_table=1&no_debug=true&_nocache=159522968894586232&token=m*(U:6_;S7q,CR%) HTTP/1.1', 200, 1652),
(13, '::1', '2020-07-20 07:21:28', 'GET /phpmyadmin/sql.php?server=1&db=rumex_testtask&table=access&pos=0&ajax_request=true&ajax_page_request=true&_nocache=1595229688736746183&token=m*(U:6_;S7q,CR%) HTTP/1.1', 200, 8312);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1595418519),
('m200720_095959_create_user_table', 1595418538);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
