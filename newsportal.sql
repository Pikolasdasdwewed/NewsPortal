-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 16 2025 г., 21:22
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `newsportal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Stardileht'),
(2, 'Eesti'),
(3, 'Maailm'),
(4, 'Majandus');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `text` varchar(500) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `text`, `date`) VALUES
(1, 1, 'Huvitav teema – loodetavasti saavad inimesed oma maksed korda.', '2025-12-16'),
(2, 1, 'Kas sellele tuleb ka viivis, kui hiljaks jääda?', '2025-12-16'),
(3, 2, 'Riigikaitse korraldus peab olema selge ja läbipaistev.', '2025-12-16'),
(4, 3, 'Andmejälgija tundub väga vajalik lahendus.', '2025-12-16'),
(5, 6, 'Nafta hinnad mõjutavad lõpuks kõiki hindu.', '2025-12-16'),
(6, 12, 'Hea töö politseilt.', '2025-12-16');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `picture` blob NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `picture`, `category_id`, `user_id`) VALUES
(1, 'Automaks jäi tähtajaks tasumata 60 000 isikul', 'Teisipäeva hommiku seisuga on kaheksa maksumaksjat kümnest automaksu õigeaegselt tasunud, öeldi ERR-ile maksu- ja tolliametist (MTA). Esmaspäeval oli mootorsõidukimaksu teise osamakse tähtaeg. MTA tulude osakonna võlahalduse juht Kadri Kööp selgitas, et võlglastele saadetakse meeldetuletused ja vajadusel alustatakse menetlusi.', 0x68747470733a2f2f692e6572722e65652f736d61727463726f703f747970653d6f7074696d697a652677696474683d3130373226617370656374726174696f3d313625334131302675726c3d6874747073253341253246253246732e6572722e656525324670686f746f25324663726f7025324632303235253246303725324632322532463239353438303268353866382e6a7067, 1, 2),
(2, 'Riik annaks sõjaajal 56 000 erasektori inimesele kriisiülesanded', 'Ministeeriumid koostavad tsiviilkriisi ja riigikaitse seadust, mis koondab üheks õigusraamiks kolm seni eraldi kehtinud seadust. Selle järgi oleks erasektorist tuleva sõjaajakoosseisu suurus pea 56 000 inimest. Uus raamistik hõlmaks hädaolukorra seadust, erakorralise seisukorra seadust ning riigikaitseseadust.', 0x68747470733a2f2f692e6572722e65652f736d61727463726f703f747970653d6f7074696d697a652677696474683d3130373226617370656374726174696f3d313625334131302675726c3d6874747073253341253246253246732e6572722e656525324670686f746f25324663726f7025324632303235253246303525324631352532463238363433363768396366372e6a7067, 1, 2),
(3, 'Riik plaanib muuta andmejälgija avalike andmekogude jaoks kohustuslikuks', 'Justiits- ja digiministeerium plaanib kehtestada isikuandmetega seotud avalikele infosüsteemidele kohustuse võtta kasutusele andmejälgija. Lahendus annab inimesele ülevaate, kes ja millal on tema andmeid vaadanud, ning aitab suurendada läbipaistvust riiklikes andmekogudes.', 0x68747470733a2f2f692e6572722e65652f736d61727463726f703f747970653d6f7074696d697a652677696474683d3130373226617370656374726174696f3d313625334131302675726c3d6874747073253341253246253246732e6572722e656525324670686f746f25324663726f7025324632303235253246303725324631322532463239343030383468323734352e6a7067, 1, 2),
(4, 'Tallinnas avati uus noortekeskus, mis pakub tasuta koolitusi', 'Tallinna linn avas uue noortekeskuse, kus saab osaleda tasuta IT- ja keelekoolitustel. Linnavalitsuse sõnul on eesmärk toetada noorte praktilisi oskusi ning pakkuda turvalist vaba aja veetmise võimalust.', 0x68747470733a2f2f732e6572722e65652f70686f746f2f63726f702f323032352f31322f31362f3331323636303168643835317436332e6a7067, 2, 2),
(5, 'Terviseamet hoiatab: sügis toob kaasa suurema viiruskoormuse', 'Terviseamet tuletab meelde, et sügishooajal kasvab viirushaiguste levik. Inimestel soovitatakse jälgida hügieeni, jääda haigena koju ning riskirühmadel kaaluda vaktsineerimist.', 0x68747470733a2f2f692e6572722e65652f736d61727463726f703f747970653d6f7074696d697a652677696474683d3130373226617370656374726174696f3d313625334131302675726c3d6874747073253341253246253246732e6572722e656525324670686f746f25324663726f7025324632303234253246313125324632362532463236333431333968333530662e6a7067, 2, 2),
(6, 'Vene naftahinnad kukkusid viimaste aastate madalaimale tasemele', 'Uudisteagentuur Bloomberg teatas, et Moskva-vastased sanktsioonid avaldavad mõju ja Venemaa naftahinnad langesid madalaimale tasemele pärast Ukraina sõja puhkemist. Läänemerelt, Mustalt merelt ja Kaug-Ida Kozmino sadamast tarnitava Vene toornafta hinnad langesid umbes 40 dollarini barrelist.', 0x68747470733a2f2f692e6572722e65652f736d61727463726f703f747970653d6f7074696d697a652677696474683d3130373226617370656374726174696f3d313625334131302675726c3d6874747073253341253246253246732e6572722e656525324670686f746f25324663726f7025324632303232253246303525324630372532463134363135383668663638392e6a7067, 3, 2),
(7, 'Euroopa Liit arutab uusi energiajulgeoleku meetmeid', 'Euroopa Liidu liikmesriigid arutavad energiajulgeoleku suurendamist ning võimalikke täiendavaid samme, et stabiliseerida turgu ja vähendada hinnakõikumisi. Eesmärk on tagada tarnekindlus ning kaitsta tarbijaid.', 0x68747470733a2f2f692e6572722e65652f736d61727463726f703f747970653d6f7074696d697a652677696474683d3130373226617370656374726174696f3d313625334131302675726c3d6874747073253341253246253246732e6572722e656525324670686f746f25324663726f7025324632303235253246313125324631382532463330393238373168656532612e6a7067, 3, 2),
(8, 'Õppus testib kriisiteavituse süsteeme üle Eesti', 'Sel nädalal toimub üleriigiline õppus, mille käigus testitakse kriisiteavituse kanaleid ning koostööd kohalike omavalitsuste ja riigiasutuste vahel. Harjutuse eesmärk on parandada valmisolekut eriolukordadeks.', 0x68747470733a2f2f696d616765732e756e73706c6173682e636f6d2f70686f746f2d313532303937353935383232352d3166306636663666366636333f6175746f3d666f726d6174266669743d63726f7026773d3132303026713d3630, 4, 2),
(9, 'Päästeamet ja Kaitseliit harjutavad ühiselt evakuatsiooni korraldamist', 'Koostööõppusel keskendutakse elanike teavitamisele, transpordikorraldusele ja ajutiste majutuskohtade valmisolekule. Korraldajate sõnul aitab ühisõppus parandada tegevuste koordineerimist.', 0x68747470733a2f2f696d616765732e756e73706c6173682e636f6d2f70686f746f2d313435373336393830343631332d3532633631613436386537643f6175746f3d666f726d6174266669743d63726f7026773d3132303026713d3630, 4, 2),
(10, 'Inflatsioon aeglustus, kuid toidukaupade hinnad püsivad kõrged', 'Analüütikute sõnul on inflatsioon mõnevõrra aeglustunud, kuid igapäevakaupade hinnad mõjutavad jätkuvalt leibkondade eelarvet. Tarbijad on muutunud hinnatundlikumaks ja otsivad soodsamaid alternatiive.', 0x68747470733a2f2f692e6572722e65652f736d61727463726f703f747970653d6f7074696d697a652677696474683d3130373226617370656374726174696f3d313625334131302675726c3d6874747073253341253246253246732e6572722e656525324670686f746f25324663726f7025324632303235253246313225324631362532463331323732333768366136382e6a7067, 5, 2),
(11, 'Eesti ettevõtted investeerivad rohkem küberturvalisusse', 'Ettevõtted suurendavad investeeringuid küberturbe lahendustesse, et vähendada andmelekkete ja teenusetõkete riski. Ekspertide hinnangul kasvab lähiaastatel nõudlus ka turbespetsialistide järele.', 0x68747470733a2f2f692e6572722e65652f736d61727463726f703f747970653d6f7074696d697a652677696474683d3130373226617370656374726174696f3d313625334131302675726c3d6874747073253341253246253246732e6572722e656525324670686f746f25324663726f7025324632303233253246303425324630382532463138353939373868633761312e6a7067, 5, 2),
(12, 'Politsei pidas kinni vargustes kahtlustatava mehe', 'Politsei teatel peeti kinni mees, keda kahtlustatakse mitmes varguses. Uurimine jätkub ning politsei palub pealtnägijatel jagada täiendavat infot.', 0x68747470733a2f2f696d616765732e756e73706c6173682e636f6d2f70686f746f2d313532313739313035353336362d3064353533383732313235663f6175746f3d666f726d6174266669743d63726f7026773d3132303026713d3630, 6, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `job` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `registration_date` date NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `job`, `email`, `login`, `password`, `status`, `registration_date`, `pass`) VALUES
(1, 'admin', 'Portal admin', 'admin@newsportal.ee', 'admin', '$2y$12$pxB2ofiiNZkxObmbBvBOyegwCjHCVFYhapjiSsdYXUaJ9Z1IH6pQW', 'admin', '2019-11-05', '123456'),
(2, 'anonim', 'Portal anonim', 'user@newsportal.ee', 'anonim', '$2y$10$dYK1sCogKL/zZBef.V/gBeynL5mdt0QxZlvwEUBkS0jkdXYRMPHRa', 'user', '2019-11-05', '111111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_id` (`news_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_users_login` (`login`),
  ADD UNIQUE KEY `uq_users_email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
