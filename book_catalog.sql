-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 03 2018 г., 01:29
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `book_catalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(83, 'Александр Дюма'),
(87, 'Дарья Донцова'),
(89, 'Карен Монинг'),
(88, 'Николь Джордан'),
(86, 'Сергей Майдуков'),
(84, 'Стивен Кинг');

-- --------------------------------------------------------

--
-- Структура таблицы `authors_book`
--

CREATE TABLE `authors_book` (
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors_book`
--

INSERT INTO `authors_book` (`author_id`, `book_id`) VALUES
(83, 83),
(84, 84),
(86, 87),
(87, 88),
(88, 89),
(89, 90),
(84, 92);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_descr` text NOT NULL,
  `book_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_descr`, `book_price`) VALUES
(83, 'Исповедь фаворитки', 'Великий французский писатель, чьи приключенческие произведения сделали его одним из самых читаемых авторов в мире, создал удивительный, чувственный и шокирующий роман о любви и войне, грехе и страсти.', 149.9),
(84, 'Зелена миля', 'Пол Еджкомб — колишній наглядач федеральної в’язниці штату Луїзіана «Холодна гора», а нині — мешканець будинку для літніх людей. Більш ніж півстоліття тому він скоїв те, чого досі не може собі вибачити. І тягар минулого знову й знову повертає його до 1932 року. Тоді до блоку Е, в якому утримували засуджених до смертної кари злочинців, прибули «новенькі». ', 123.8),
(87, 'Выжить любой ценой', 'Во время отдыха в Таиланде бизнесмен Данко Максимов теряет дочь и жену. Они обиделись на главу семейства, который накануне загулял в компании старого друга Жени, и отправились на прогулку без него. Но так и не вернулись в отель. Растерянный Данко обращается в полицию, но там не спешат помочь иностранцу. Он едет в консульство, но и здесь соотечественнику вежливо отказывают в поисках пропавших. Единственная надежда — Женя Роднин. Они ищут Юлю и Соню самостоятельно. И, кажется, вышли на след похитителя…', 74.9),
(88, 'Львиная доля серой мышки', 'Вопрос на засыпку - как выглядит домовой? Вы спросите, да кто ж его видел? А вот Татьяна Сергеева видела существо, кое иначе, чем домовым, не назовешь - это похожее на гигантскую мышь лохматое создание с торчащими квадратными ушами! Но выяснять, откуда и зачем появилось в ее доме сие чудо чудное, Тане некогда - ее спецбригада проводит новое расследование. Платон Персакис и его матушка, сделав открытие, что жена Платона родила детей вовсе не от него, пожелали узнать, чьи же они. Однако не ставя в известность об этом их мать. Что ж желание клиента - закон! И тут... выяснилось такое! Как говорится, многие знания - многие печали...', 143.8),
(89, 'Мой грешный герцог', 'Герцог Ротэмский, дерзкий сластолюбец и известный развратник, всего лишь одним пылким поцелуем смог украсть покой красавицы Тесс Бланшард. Теперь его образ преследует ее во снах, полных грешных и запретных грез. Но встреча с герцогом вызвала небывалый скандал и теперь, чтобы избежать дальнейшей огласки и не лишиться влиятельных покровителей своей благотворительности, Тесс должна выйти за Иана замуж. Брак с герцогом открывает перед Тесс дверь в мир полный жарких ночей и плотских утех. Только девушка не испытывает к герцогу любви, между ними нет ничего, кроме животной страсти. Но тогда почему ей вдруг стал так дорог этот искушенный грешник?', 99.9),
(90, 'Рожденная огнем', 'Книги Карен Мари Монинг читают и любят фанаты по всему миру. Необычные герои и захватывающий мистический сюжет, тонкая грань между реальностью и фантазией — именно за это романы Монинг удостоены ряда престижных международных премий и наград, среди которых престижная награда RITA и «Книга года» международного интернет-сервиса для читателей Goodreads за лучшее паранормальное фэнтези. ', 124.9),
(92, 'Країна розваг', 'Студент Девін влаштовується на літню роботу в парк атракціонів, сподіваючись забути дівчину, яка розбила йому серце. Але тут відбувається щось моторошне. Кажуть, що в парку бачать примару дівчини, вбитої у «Домі жахів». Безжальний маніяк уже забрав життя дівчат, а його так і не знайшли.\r\nВорожка з парку розваг пророкує, що на Девіна чекають дивовижні зустрічі. З чим ще він стикнеться у країні розваг? Темне одкровення навіки змінить його життя!', 99.9);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(76, 'Детектив'),
(72, 'Классика'),
(77, 'Роман'),
(78, 'Триллер'),
(73, 'Фантастика');

-- --------------------------------------------------------

--
-- Структура таблицы `genres_book`
--

CREATE TABLE `genres_book` (
  `book_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genres_book`
--

INSERT INTO `genres_book` (`book_id`, `genre_id`) VALUES
(83, 72),
(84, 73),
(87, 76),
(88, 76),
(89, 77),
(90, 77),
(92, 78);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`),
  ADD UNIQUE KEY `author_name` (`author_name`);

--
-- Индексы таблицы `authors_book`
--
ALTER TABLE `authors_book`
  ADD KEY `authors_book_ibfk_1` (`author_id`),
  ADD KEY `authors_book_ibfk_2` (`book_id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `genre_name` (`genre_name`);

--
-- Индексы таблицы `genres_book`
--
ALTER TABLE `genres_book`
  ADD KEY `genres_book_ibfk_1` (`book_id`),
  ADD KEY `genres_book_ibfk_2` (`genre_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `authors_book`
--
ALTER TABLE `authors_book`
  ADD CONSTRAINT `authors_book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authors_book_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `genres_book`
--
ALTER TABLE `genres_book`
  ADD CONSTRAINT `genres_book_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genres_book_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
