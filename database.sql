-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2024 at 05:55 PM
-- Server version: 10.5.25-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milliyto_shop`
--
CREATE DATABASE IF NOT EXISTS `milliyto_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `milliyto_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `profile_image` varchar(255) DEFAULT 'no_image.png',
  `status` enum('active','blocked') NOT NULL DEFAULT 'active',
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `number`, `email`, `username`, `password`, `role`, `profile_image`, `status`, `registration_date`) VALUES
(1, 'Iqbolshoh', '997799333', 'Iqbolshoh@gmail.com', 'Iqbolshoh', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'admin', 'no_image.png', 'active', '2024-05-14 11:17:25'),
(2, 'seller', '997733999', 'seller@gmail.com', 'seller', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'seller', 'no_image.png', 'active', '2024-05-14 11:17:25'),
(3, 'user', '993399777', 'user@gmail.com', 'user', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'user', 'no_image.png', 'active', '2024-05-14 11:17:25'),
(4, 'userAKA', '993399177', 'userAKA@gmail.com', 'userAKA', '69b241e1e59cc71c1fe80720c0254c48e4397c4f3ac56c61f03879f13e29c765', 'user', 'no_image.png', 'active', '2024-05-14 11:17:25'),
(5, 'Shoxrux', '933336974', 'shoxruxnorqoziyev2004@gmail.com', 'shoxrux', 'e5800f5000a8b071896e4d3f9b22b801427f229c0c8b306fffc80a5d063d0c63', 'seller', '', 'active', '2024-05-14 13:08:53'),
(6, 'Shoxrux', '933336973', 'shoxruxnorqoziyev204@gmail.com', 'shoxrux1', 'ed84bce861e67710a76393623d36b5ca6b9bcaaf658f57232be80c85af0ee52e', 'user', '', 'active', '2024-05-14 13:19:48'),
(7, 'Davsccsc', '12', 'admin@gmail.com', 'davlatfarruxov', '0413fccf40000e149b4a3d2fc98731262826554d8f9ab4d1457a1e4d1a2dd25f', 'user', '', 'active', '2024-05-17 14:32:08'),
(8, 'Sayyorbek', '99', 'holikovsajerbek@gmail.com', 'user1', 'ed84bce861e67710a76393623d36b5ca6b9bcaaf658f57232be80c85af0ee52e', 'user', '', 'active', '2024-07-19 07:32:07'),
(9, 'aziz', '1', 'azizjon4403@gmail.com', 'azizjon', 'c6da1f21ed831ab3eedcc562ecc4f6b021f49c25e2a494ec1dbc4e0d5599c2f1', 'user', '', 'active', '2024-07-20 09:56:20'),
(10, 'Admin', '+99999999999', 'sardor.me5727@gmail.com', 'accoder', '4feb98674012714cca8c178fc3ea06fd09498f4b6e69b0ca2d8a7055218e2c5c', 'user', '', 'active', '2024-07-20 17:55:14'),
(11, 'salom', '+998999999999', 'salom@gmail.com', 'salom', 'c95532fb9f8b17a5800c4fb596ffd47b4a26989e7bcca1a36e22608ced701535', 'user', '', 'active', '2024-07-28 17:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `number_of_products` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `number_of_products`) VALUES
(44, 3, 154, '1'),
(45, 3, 115, '10'),
(47, 9, 120, '1'),
(48, 1, 155, '1'),
(49, 1, 121, '1'),
(50, 1, 115, '1'),
(51, 3, 116, '1'),
(52, 3, 117, '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(3, 'Kompyuter'),
(2, 'Planshet'),
(1, 'Telefon'),
(7, 'Televizor');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `price_old` int(11) DEFAULT NULL,
  `price_current` int(11) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `quantity` int(11) DEFAULT NULL,
  `added_to_site` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `seller_id`, `price_old`, `price_current`, `description`, `rating`, `quantity`, `added_to_site`) VALUES
(115, 'Tecno Spark 20', 1, 2, 350, 249, 'Mahsulot haqida qisqacha:\r\nDispley: 6,78\'\' (2460x1080), Full HD, IPS; Ekranning yangilanish tezligi: 120 Gts; Ekran xususiyatlari: sensorli ekran, tirnalishga chidamli oyna, rangli ekran\r\nAsosiy (orqa) kameralar soni: 3; Asosiy kamera o\'lchamlari: 108 MP; Old kamera o\'lchamlari: 32 MP; Maks. video o\'lchamlari: 2K; Video yozish (asosiy kamera): 1920x1080; Eshitish vositasi chiqishi: mini-jak 3,5 mm\r\nProtsessor: MediaTek Helio G99; Xarakteristikalari - chastota: 2200 MGts; yadrolar soni: 8; 2x2,2 gigagertsli Cortex-A76, 6x2,0 gigagertsli Cortex-A55; video protsessor: Mali-G57 MC2; O\'rnatilgan xotira: 256 GB; RAM: 8 GB; Xotira kartasi uyasi: mavjud\r\nBatareya quvvati: 5000 mA/soat; Zaryadlovchi ulagich turi: USB-C; Zaryadlash funktsiyalari: tez zaryadlash\r\nSIM-kartalar soni: Dual nanoSIM; Aloqa standarti: 2G, 3G, 4G LTE, 2G/3G/4G (LTE), 4G; Simsiz interfeyslar: Bluetooth, NFC, Wi-Fi, GPS\r\nXususiyatlari: akselerometr, giroskop, yorug‘lik sensori, yaqinlik sensori, kompass, yuzni tanish sensori, barmoq izi skaneri, pedometr\r\nAutentifikatsiya: yuz orqali ochish, barmoq izlari skaneri\r\nKorpus turi: klassik; Korpus materiali: plastmassa; Himoya darajasi: IP53, IPX5; Smartfon og\'irligi: 206 g; O\'lchamlari (ExBxQ): 76,61x168,61x8,4 mm\r\nOS versiyasi: Android 13 sotuvlar boshida\r\nZavod jihozlari: hujjatlar, zaryadlovchi, himoya plyonkasi (ekranga yopishtirilgan', 5.0, 25, '2024-05-28 08:30:41'),
(116, 'Smartfon Infinix Note 40Pro', 1, 2, 700, 399, 'Mahsulot haqida qisqacha:\r\nSIM-kartalar soni 2\r\nOrqa kamera 108 MP, 2 MP, 2 MP\r\nOld Kamera 32 MP\r\nEkran o\'lchami 6.78&quot;\r\nEkran yangilanish chastotasi: 120 Gts\r\nEkran texnologiyasi: AMOLED\r\nDoimiy xotira hajmi 256 GB\r\nOperativ xotira hajmi 12 GB\r\nOperatsion tizim versiyasi Android 14\r\nBatareya quvvati 5000 мА/soat', 5.0, 56, '2024-05-28 08:32:49'),
(117, 'Samsung Galaxy A55', 1, 2, 690, 440, 'Mahsulot haqida qisqacha:\r\nBattareya 5000 mA/soat, zaryad olish tezligi 25 Vt\r\nSakkiz yadroli protsessor 4 nm, Exynos 1480, grafika Xclipse 530\r\nDisplay 6,6 dyuym, AMOLED, 2340×1080, 120Hz, 1650 nit, HDR 10+\r\nKeng burchakli kamera 50mp OIS, Ultra keng burchakli kamera 12mp, makro kamera 5mp\r\nSelfi kamera 32 MP\r\n8 Gb RAM va 128 / 256GB ichki xotirasi', 5.0, 25, '2024-05-28 08:36:05'),
(118, 'Samsung Galaxy A15', 1, 2, 290, 180, 'Mahsulot haqida qisqacha:\r\nBarcha IMEI lar rasmiy ro\'yxatdan o\'tgan va ro\'yxatga olish faollashuvi 30 kun ichida amalga oshiriladi. Ishlab chiqaruvchi o\'z mahsulotlariga 12 oylik kafolat beradi.\r\nProtsessor CPU chastotasi 2,2 gigagertsli, 2 gigagertsli Protsessor turi Sakkiz yadroli\r\nRAM: 6GB / 8GB Mavjud hajm (GB) 108.8 Tashqi xotirani qo\'llab-quvvatlash MicroSD (1 TB gacha)\r\nEkran o\'lchami: 6,5 dyuym\r\nBatareya quvvati: 5000 ma/soat\r\nXotira: 128GB / 256GB\r\nEkranni yangilash tezligi: 90 Gts\r\nOld va orqa kamera: 13-50-5-2mp\r\nEkran Asosiy ekran o\'lchamlari 163.9 mm (6,5 dyuym) Asosiy ekran o\'lchamlari 1080 x 2340 (FHD+) Asosiy ekran texnologiyasi Super AMOLED Asosiy ekran rang chuqurligi 16 mln.', 5.0, 67, '2024-05-28 08:39:38'),
(119, 'Samsung Galaxy S24 Ultra', 1, 2, 2000, 1500, 'Mahsulot haqida qisqacha:\r\nDizayn: Yuqori sifatli materiallardan foydalangan holda oqlangan va zamonaviy dizayn.\r\nOperatsion tizim: Samsung One UI foydalanuvchi interfeysi bilan eng yangi Android operatsion tizimida ishlaydi.\r\nTarmoq imkoniyatlari: Yuqori tezlikdagi Internet uchun ilg\'or aloqa texnologiyalarini, jumladan 5G ni qo\'llab-quvvatlaydi.\r\nXavfsizlik va xavfsizlik: Bir nechta autentifikatsiya usullari, jumladan, barmoq izlari va yuzni tanish texnologiyalari.\r\nKameralar: Professional fotografiya va videografiya uchun inqilobiy yuqori aniqlikdagi ko\'p kamerali tizim.\r\nBarcha IMEI lar rasmiy ro\'yxatdan o\'tgan va ro\'yxatga olish faollashuvi 30 kun ichida amalga oshiriladi. Ishlab chiqaruvchi o\'z mahsulotlariga 12 oylik kafolat beradi.\r\nDispley: Yuqori aniqlik va ilg\'or displey texnologiyalari bilan ajoyib va ​​ajoyib displey.\r\nIshlash: Maksimal ishlash va sezgirlik uchun kuchli protsessor.\r\nBatareya: Energiyani boshqarishning ilg\'or texnologiyalari va tez zaryadlash xususiyatiga ega uzoq umr batareya.\r\nQo\'shimcha xususiyatlar: Suv o\'tkazmaydigan, simsiz zaryadlash, stilusni qo\'llab-quvvatlash yoki boshqa innovatsion xususiyatlar.', 5.0, 98, '2024-05-28 08:41:54'),
(120, 'Xiaomi Redmi A3', 1, 2, 270, 120, 'Mahsulot haqida qisqacha:\r\nSmartfon sakkiz yadroli MediaTek Helio G36 protsessori bilan jihozlangan bo\'lib, kundalik silliq ish uchun barcha zarur quvvatni ta\'minlaydi.\r\nIshlab chiqaruvchining rasmiy kafolati: 1 yil. Barcha IMEI rasmiy ravishda ro\'yxatdan o\'tgan (ro\'yxatdan o\'tishni faollashtirish 30 kun ichida amalga oshiriladi).\r\nIP54 himoya klassi tufayli smartfon chayqalish va changdan ishonchli himoyalangan\r\n90 Hz ekranni yangilash tezligi o\'yin, multimedia yoki shunchaki aylantiruvchi tarkibni iloji boricha silliq qiladi.\r\nAsosiy 8 megapikselli ikki kamerali tizim tasvirni qayta ishlashning aqlli algoritmlari bilan jihozlangan bo\'lib, aniq ramkalar va boy ranglarni ta\'minlaydi.\r\nYassi ramkali zamonaviy korpus va dog‘ qoldirmaydigan orqa qopqoq smartfonni nafaqat zamonaviy, balki amaliy qiladi\r\n5000 mA/soat quvvatga ega kuchli batareya va tez zaryadlashni qo\'llab-quvvatlash batareyaning kun davomida uzoq umr ko\'rishini ta\'minlaydi', 5.0, 56, '2024-05-28 08:44:46'),
(121, 'Infinix Hot 40', 1, 2, 260, 140, 'Mahsulot haqida qisqacha:\r\nKatta 6,56 dyuymli HD+ displey: video va fotosuratlarni qulay ko\'rish uchun\r\nKuchli Unisoc T606 protsessori: kundalik vazifalar va engil o\'yinlar bilan shug\'ullanadi\r\nTez zaryadlash 18 Vt: smartfoningizni tezda zaryad qiladi\r\nBarmoq izi skaneri: qurilmangizni xavfsiz saqlaydi\r\n5000 mA/soat sig‘imli akkumulyator: 30 soatgacha video oqimini ta’minlaydi\r\nNFC: kontaktsiz xaridlar uchun to\'lovni amalga oshirish imkonini beradi\r\n50 MP asosiy kamera: yorqin va aniq suratlar uchun\r\n32 MP old kamera: yuqori sifatli selfi uchun', 5.0, 65, '2024-05-28 08:47:23'),
(122, 'Apple iPhone 13', 1, 2, 2000, 900, 'Mahsulot haqida qisqacha:\r\nBarcha IMEI lar rasmiy ro\'yxatdan o\'tgan va ro\'yxatga olish faollashuvi 30 kun ichida amalga oshiriladi. (SIM karta turi: Nano SIM + eSIM) Ishlab chiqaruvchi o\'z mahsulotlariga 12 oylik kafolat beradi.\r\nSuper Retina XDR displey 6,1 dyuymli (diagonal) butun ekranli OLED displey 2532 x 1170 piksel o\'lchamlari 460 ppi\r\nChayqalishga, suvga va changga chidamli 3 IEC 60529 standarti bo\'yicha IP68 nominal (maksimal chuqurlik 6 metrdan 30 daqiqagacha)\r\nIkkita 12MP kamera tizimi: Keng va ultra keng kameralar\r\nProtsessor turi: A15 Bionic chipi 2 ta ishlash va 4 ta samaradorlik yadroli yangi 6 yadroli protsessor Yangi 4 yadroli GPU Yangi 16 yadroli Neyron Dvigatel\r\nMaydon chuqurligi past bo\'lgan videolarni yozib olish uchun kinematik rejim (30 kadr / s tezlikda 1080p) Kino videoni barqarorlashtirish (4K, 1080p va 720p)\r\nManzil O\'rnatilgan GPS, GLONASS, Galileo, QZSS va BeiDou Raqamli kompas Wi-fi Uyali iBeacon mikrolokatsiyasi\r\nQuvvat va batareya Videoni ijro etish: 19 soatgacha Videoni ijro etish (oqimli): 15 soatgacha Audio tinglash: 75 soatgacha\r\nOperatsion tizim iOS 15 iOS dunyodagi eng shaxsiy va xavfsiz mobil operatsion tizim boʻlib, kuchli funksiyalarga ega va maxfiyligingizni himoya qilishga moʻljallangan.\r\nMintaqa kodi: RM/A va RK/A.', 5.0, 56, '2024-05-28 08:49:24'),
(124, 'IPhone 15 Pro/Promax', 1, 2, 2100, 1500, 'Mahsulot haqida qisqacha:\r\nKafolat - 12 oy. IMEI 1 - rasmiy ro\'yxatdan o\'tgan (ro\'yxatdan o\'tishni faollashtirish 30 kun ichida avtomatik tarzda amalga oshiriladi)\r\nO\'rnatilgan xotira - 128/256 GB / OS versiyasi-iOS 17\r\nSIM kartalar soni Dual - nano SIM + eSim\r\nDisplay - 6.7&quot; (2796x1290), 2K QHD, OLED\r\nKamera - 48 MP/ 12 MP / 12 MP\r\nVideo suratga olish (asosiy kamera) - 4K 60 kadr/s gacha bo\'lgan (3840x2160)\r\nProtsessor - Apple A17 Pro; Korpus materiali - Titan\r\nZaryadlovchi ulagich turi - USB-C\r\nZaryadlash funktsiyalari - simsiz zaryadlash, tez zaryadlash\r\nBatareya quvvati - Pro: 3274 ma/s Promax: 4422 ma/s', 5.0, 56, '2024-05-28 08:53:18'),
(125, 'Honor X7b 8/128 GB', 1, 2, 420, 230, 'Mahsulot haqida qisqacha:\r\nIshlab chiqaruvchining rasmiy kafolati: 1 yil. Barcha IMEI rasmiy ravishda ro\'yxatdan o\'tgan (ro\'yxatdan o\'tishni faollashtirish 30 kun ichida amalga oshiriladi).\r\nSmartfon 48 megapikselli kuchli asosiy kameraga ega bo\'lib, u turli yorug\'lik sharoitida yuqori sifatli fotosuratlar va videolarni olish imkonini beradi. 8 megapikselli old kamera aniq selfi va video qo\'ng\'iroqlarni amalga oshirishga imkon beradi.\r\n6000 ma/soat quvvatga ega batareya batareyaning uzoq umr ko\'rishini ta\'minlaydi, bu sizga doimiy zaryadlashni talab qilmasdan kun bo\'yi qurilmadan foydalanish imkonini beradi.\r\nUshbu smartfon yuqori unumdorlikni, ajoyib kamera funksiyalarini va uzoq vaqt davomida bitta zaryadda ishlashni taklif etadi, bu esa uni turli foydalanuvchilar uchun jozibali variantga aylantiradi.\r\nHonor X7B kuchli Qualcomm Snapdragon 680 protsessoriga ega bo\'lib, u turli vazifalarni, jumladan, ilovalarni ishga tushirish, multimedia jarayonlari va o\'yinlarni bajarishda qurilmaning tez va silliq ishlashini ta\'minlaydi.\r\nHonor X7B-bu zamonaviy xususiyatlar va xavfsizlikni ta\'minlaydigan Android 11 operatsion tizimiga ega kuchli smartfon.', 5.0, 36, '2024-05-28 08:56:58'),
(126, 'Xiaomi Redmi 13C', 1, 2, 290, 160, 'Mahsulot haqida qisqacha:\r\nYangilanish tezligi: 90 Hz gacha\r\nYorqinligi: 450 nit (turi), 600 nit\r\nProtsessor: MediaTek Helio G85\r\nEkran: Corning® Gorilla® Glass\r\nDiagonali displey: 6,74 dyuym 1600x720, 260 ppi\r\nAsosiy kamera 50 Mp 5p ob\'ektiv, f/1.8\r\n8 megapikselli old kamera f /2.0\r\nkino kamerasi / HDR rejimi / tungi rejim / portret rejimi / 50 Mp rejimi\r\nBatareya: 5000mAh (turi) 18W PD zaryadlashni qo\'llab-quvvatlaydi\r\nXavfsizlik: TouchID', 5.0, 59, '2024-05-28 09:01:48'),
(127, 'Samsung Galaxy A24,', 1, 2, 400, 240, 'Mahsulot haqida qisqacha:\r\nProtsessor: MediaTek Helio G99, 8 yadro, 2.2 GGs\r\nOperativ xotira: 4 GB\r\nO\'rnatilgan xotira: 128 GB\r\nEkran: 6.5, 2340 * 1080, Super AMOLED, 90 Gts\r\nAsosiy kameralar: 50 + 5 + 2 MP\r\nOld kamera: 13 MP\r\nUlanish: 2G, 3G, 4G, Wi-Fi, Bluetooth 5.0, GPS\r\nBatareya quvvati: 5000 mA/soat\r\nIMEI ro\'yxatdan o\'tgan\r\n1 yillik kafolatga ega', 5.0, 96, '2024-05-28 09:05:25'),
(128, 'Televizor AVAX Android 12 Smar', 7, 2, 300, 150, 'Mahsulot haqida qisqacha:\r\nAntenna kirish porti: DVB-T / T2 / C / analog uchun 1 IEC ulagichi. Antenna kirish porti (1 o\'rindiq): Ha. Antenna kirish porti turi: IEC 169-2\r\nEnergiya samaradorligi klassi: A+. Quvvat iste\'moli: 74 Vt.\r\nKafolat 3 yil. O\'zbekistonda ishlab chiqarilgan. Faqat 32&quot; ovozli boshqaruv pulti bilan!\r\nDTV qabul qilish tizimi: - DVB-T2; - raqamli tyuner; — CL+LG paneli; - S2; - LED televizor. Qabul qiluvchi chastota diapazoni (DTV): — DVB-T: 174 MGts ~ 230 MGts; — 470 MGts ~ 860 MGts; DVB-C: 50 MGts ~ 858 MGts DVB-S/S2: 950 MGts ~ 2150 MGts;\r\nMahsulot toifasi: Smart Android 12. O\'rnatilgan xotira: 8 Gb\r\nRejimlar: baland/bas/muvozanat: ha. Ovoz chiqish quvvati: 12 Vt + 12 Vt. NICAM: MONO/DUAL 1/DUAL 2/STEREO. Tizimga kirish Tyuner: 2 Kompozit: 1 HDMI: 3 USB: 2 Lan: 1 CI uyasi: 1', 5.0, 15, '2024-05-28 09:08:59'),
(129, 'Televizor LiTV Android 12 Smar', 7, 2, 300, 140, 'Mahsulot haqida qisqacha:\r\nIshlab chiqarilgan mamlakat: O\'zbekiston\r\nEnergiya samaradorligi (energiya iste\'moli) klassi a+\r\nTelevizor turi LED\r\nOperatsion tizimi Android 12\r\nKafolat muddati, ishlab chiqaruvchidan, 3 yil\r\nYagona xizmat ko\'rsatish markazi (99)-373-03-03\r\nKafolat talonini olish uchun, @volto_talon telegrammasiga murojaat qilishingizni so\'raymiz', 5.0, 56, '2024-05-28 09:11:42'),
(130, 'Televizor MoonX 43', 7, 2, 290, 150, 'Mahsulot haqida qisqacha:\r\nO\'zingizga kerakli diagonalni tanlang\r\nBarcha modellarda komplektda pult mavjud\r\nBrend: MoonX\r\n43&quot; Full HD - Smart TV, Bluetooth, Wi-Fi, 60 Hz, HDR, IPS, 2x dinamiklar, Dolby Digital, HDMI, USB\r\n50&quot; 4K Ultra HD - Google TV, Bluetooth, Wi-Fi, 60 Hz, HDR, IPS, 2x dinamiklar, Dolby Digital, HDMI, USB\r\n55&quot; 4K Ultra HD - Google TV, Bluetooth, Wi-Fi, 60 Hz, HDR, IPS, 2x dinamiklar, Dolby Digital, HDMI, USB\r\nBarcha modellarda ovozli boshqaruv mavjud', 5.0, 65, '2024-05-28 09:13:28'),
(131, 'Televizor QLT 32', 7, 2, 180, 130, 'Mahsulot haqida qisqacha:\r\nTo\'plamda ikkita masofadan boshqarish pulti mavjud: universal va ovozli boshqaruv pulti\r\nKafolat muddati, ishlab chiqaruvchidan, 3 yil\r\nQLT 32&quot; 9000 UM-S-LHD / QLT 43&quot; 9000 UM-S-FHD\r\nAndroid 12 operatsion tizimi Smart TV orqali ko\'plab ilovalar va kontentdan bahramand bo\'lish imkonini beradi\r\nZamonaviy texnologiyalar tufayli mukammal tasvir sifati va foydalanish qulayligini ta\'minlaydi\r\nZamonaviy ramkasiz dizayn, aniq tasvir uchun yuqori HD piksellar soniga ega\r\nQLT 55&quot; 9000 UM-S-UHD\r\nWebOS operatsion tizimi bilan jihozlangan, bu navigatsiya va kontentga kirishni yanada qulayroq qiladi\r\nAjoyib ravshanlik va chuqur ranglarni taqdim etadigan 4K Ultra HD ekranli zamonaviy qurilma\r\nQurilma bilan o\'zaro aloqani osonlashtirish uchun Aero-sichqoncha bilan jihozlangan innovatsion &quot;Magic remote&quot; pulti mavjud', 5.0, 45, '2024-05-28 09:14:59'),
(132, 'Televizor Samsung Crystal UHD ', 7, 2, 580, 460, 'Mahsulot haqida qisqacha:\r\nEkran o\'lchamlari: 3840 x 2160 (4K UHD)\r\nYangilanish tezligi: 50 Gs\r\nOperatsion tizim: Tizen™ Smart TV\r\nUlanish: Wi-Fi 5 (802.11 ac) / Bluetooth 5.0 / 3 X HDMI / 1 X USB / 1 X Ethernet / 1 X CI uyasi / Optik Audio chiqishi\r\nOvoz chiqishi: 2 x 10 Vt\r\nIshlab chiqaruvchining rasmiy kafolati: 1 yil', 5.0, 56, '2024-05-28 09:16:32'),
(133, 'smart televizori Xiaomi Mi TV ', 7, 2, 530, 430, 'Mahsulot haqida qisqacha:\r\nFull HD aniqlikka ega bo‘lgan Xiaomi Mi TV A2 sizga har bir detalni yorqinlik va aniqlik bilan ko‘rishga imkon beradi, u bevosita sizning ko‘z o‘ngingizda kontentni jonlantiradi.\r\nIshlab chiqaruvchidan rasmiy kafolat: 1 yil. Yandeks Alisa bilan birga qo‘llash mumkin\r\nXiaomi Mi TV A2 43» televizori har bir kadrni haqiqiy san’at asariga aylantiradi.\r\nSK-texnologiya hattoki ko‘rishning keng burchaklarida ham yorqin ranglarni va tasvir tiniqligini ta’minlaydi. Sizning tomosha tajribangiz betakror bo‘ladi.\r\nMi TV A2 – bu nafaqat televizor, balki ko‘ngilochish markazi ham. O‘zingizni sevimli oqimli servislaringizga bog‘laning, ilovalar dunyosini tadqiqot qiling va interfaol kontentdan bahramand bo‘ling.\r\nUltraingichka ramkali konstruksiya standart tv nisbatidan ahamiyatli ustun keluvchi ekran va korpusning o‘lchamlarini yuqori nisbatini ta’minlaydi.\r\nJozibali metall ramka va yaxlit konstruksiya sharofati bilan Xiaomi TV A2 har qanday interyerda yorqin detal bo‘lib qoladi.\r\nMaksimal darajadagi ixcham o‘lchamlar bilan, Mi TV A2 32” televizori har qanday fazoga juda yaxshi mos keladi.\r\nMaqbul 50 dyuymlar sizga harakatlarga sho‘ng‘ib ketishga va shu vaqtning o‘zida tasvir o‘lchami va sifati o‘rtasidagi muvozanatni saqlab qolish imkonini beradi.', 5.0, 59, '2024-05-28 09:18:25'),
(134, 'Smart televizor TCL 43&quot;', 7, 2, 560, 360, 'Mahsulot haqida qisqacha:\r\nOperativ xotira - DDR3-2133: 2GB. Xotira - eMMC5.0 16GB\r\nHDMI &amp; HDCP Versiyasi - HDMI1.4 &amp; HDMI2.1, HDCP1.4 &amp; HDCP2.2\r\nYangilanish Tezligi (Hz): 60\r\nBluetooth 5.1 - bor. Google Assistant/Ovozli qidiruv - bor\r\nInterfeys uslubi - Google TV UI + TCL TV UI. LED UHD Google TV. Android R.\r\nTV tizimi - ATV: PAL-M/N, NTSC-M DTV: DVB-C/T/T2/S/S2. AV tizimi - PAL, NTSC.\r\nOvozli qidiruv bor bo\'lgan bitta aqlli masofadan boshqarish pulti bilan birga keladi\r\nKafolat 3 yil. Ishlab chiqaruvchi TCL, Xitoy.\r\nQo\'shimcha ma\'lumot uchun &quot;Tarkib&quot;, &quot;O\'lchamlar&quot; yoki &quot;Batafsil&quot; bo\'limini tanlang', 5.0, 89, '2024-05-28 09:20:10'),
(135, 'Smart televizor WellStars 32', 7, 2, 250, 130, 'Mahsulot haqida qisqacha:\r\nModel: 4300 - 43&quot;; 5500 - 55&quot;; 7500 - 70&quot;. 55&quot;-70&quot; - UzDigital o\'qiydi.\r\nEkranni yangilash tezligi - 60 Gts. Bluetooth - bor\r\nRAM 4300 - 1 GB, 5500-7500- 1,5 GB; Xotira-8 GB\r\nIkkita masofadan boshqarish pulti, 1 ta ovozli boshqaruv. 5500-7500 modellari Magic masofadan boshqarish pultiga ega\r\n4300 - Android TV; 5500, 7500 - WebOS\r\n4300 - Full HD; 5500, 7500 - 4K Ultra HD\r\nImport texnika. Zavod tomonidan ishlab chiqarilgan.\r\nOvozli qidiruv - bor\r\nUSB - 2; HDMI - 3, DVB T2/S2 - bor\r\nKafolat 3 yil. Xitoyda ishlab chiqarilgan', 5.0, 56, '2024-05-28 09:21:55'),
(136, 'Televizor JVC 32N3105 HD Smart', 7, 2, 270, 140, 'Ultraingichka ramkali konstruksiya standart tv nisbatidan ahamiyatli ustun keluvchi ekran va korpusning o‘lchamlarini yuqori nisbatini ta’minlaydi.\r\nJozibali metall ramka va yaxlit konstruksiya sharofati bilan Xiaomi TV A2 har qanday interyerda yorqin detal bo‘lib qoladi.\r\nMaksimal darajadagi ixcham o‘lchamlar bilan, Mi TV A2 32” televizori har qanday fazoga juda yaxshi mos keladi.\r\nMaqbul 50 dyuymlar sizga harakatlarga sho‘ng‘ib ketishga va shu vaqtning o‘zida tasvir o‘lchami va sifati o‘rtasidagi muvozanatni saqlab qolish imkonini beradi.', 5.0, 56, '2024-05-28 09:24:08'),
(137, 'Televizor Sonor 32SNR100S Smar', 7, 2, 300, 140, 'Mahsulot haqida qisqacha:\r\nKafolat - 1 yil\r\nTezkor xotira - 1 gb\r\nO\'rnatilgan xotira - 8 gb\r\nEkran o\'lchamlari - 1366*768 (HDReady)\r\nKo\'rish burchagi (H/V) - 178°/178°\r\nOvoz chiqarish quvvati - 2x10=20w\r\nMatrisa turi - IPS panel\r\nSmart TV - Android\r\nMahsulot ekranini tarqatish punktida tekshirib oling', 5.0, 26, '2024-05-28 09:26:01'),
(138, 'Televizor Premier 32PRM700S Sm', 7, 2, 300, 150, 'Mahsulot haqida qisqacha:\r\nMatritsa turi - IPS paneli\r\nOperativ xotira - 1 GB\r\nO\'rnatilgan xotira - 8 GB\r\nKafolat - 3 yil\r\nEkran o\'lchami - HD (1280 * 720)\r\nOperatsion tizim - Android\r\nMahsulot ekranini tarqatish punktida tekshirib oling', 5.0, 56, '2024-05-28 09:27:29'),
(139, 'Televizor Artel MF3300', 7, 2, 700, 599, 'Mahsulot haqida qisqacha:\r\nSmart texnologiyasi mavjud\r\nDiagonali 43&quot;\r\nEkranni yangilash tezligi 60 Gts\r\nWi-Fi-ni qo\'llab-quvvatlash Bor\r\nBluetooth Bor\r\nEkran o\'lchamlari 1920x1080 Full HD', 5.0, 56, '2024-05-28 09:28:56'),
(140, 'Planshet Xiaomi Redmi Pad SE', 2, 2, 410, 220, 'Mahsulot haqida qisqacha:\r\nMobil platforma: Snapdragon® 680 4G\r\nYorqinligi: 400 nits\r\nXavfsizlik: FaceID\r\nGPU: Qualcomm® Adreno™\r\nRuxsat: 1920 * 1200, 207 ppi\r\nOrqa kamera 8MP f/ 2.0 orqa kamera, 1.12 mikron piksel o\'lchami\r\nBatareyani zaryadlash: 8000 mA / soat\r\nOvoz: 3.5 mm eshitish vositasi uyasi\r\n1080P 1920 * 1080 30 kadrlar, 720P 1280 * 720 30 kadrlar\r\nPlanshetda SIM karta uyasi yo\'q', 5.0, 26, '2024-05-28 09:30:36'),
(142, 'Planshet Oukitel OT6, 2024 mod', 2, 2, 180, 120, 'Mahsulot haqida qisqacha:\r\nAndroid 13 operatsion tizimi\r\n4 dan 16 GB gacha tezkor xotira\r\n64 GB ichki xotira\r\n10 dyuymli FHD+ displey\r\nBolalar uchun xavfsiz planshet\r\nAkkumulyator 8000 mA/soat', 5.0, 59, '2024-05-28 09:33:48'),
(143, 'Smart planshet CCIT A 103 PRO', 2, 2, 340, 160, 'Mahsulot haqida qisqacha:\r\nToʻliq ekran 10.1 800*1280\r\nBatareya: O\'rnatilgan 5800 mA / soat lityum batareya\r\nUlanish: Wi-Fi, Bluetooth, USB\r\nIMEI foydalanishga tayyor\r\nIkki SIM-kartali planshet\r\nOperativ xotira: 8 GB, 512 GB\r\nOperatsion tizim: Android 10.0\r\nKamera: 5,0 MP old kamera, 13,0 MP orqa kamera\r\nTo\'plam: Planshet, klaviatura, korpus, himoya oynasi, stilus, zaryadlovchi, naushnik\r\nTillar: rus, o\'zbek, ingliz va boshqalar.', 5.0, 59, '2024-05-28 09:35:25'),
(144, '5.0 ( 101 baho ) 400 ta buyurt', 2, 2, 810, 440, 'Mahsulot haqida qisqacha:\r\nOrqa kamera: 13MP 4k | 30fps1080p | 30/60fps720p | 30 kadr/soniya Old kamera: 8 MP 1,12µm f/2,21080p | 30fps720p | 30 kadr/s\r\nBatareyani zaryadlash: 8840 mA / soat\r\nSimli zaryadlash: 33 Vt\r\nTez zaryadlashni qo\'llab-quvvatlaydi: QC4 / QC3+ / QC3.0 / QC2.0 / PD3.0 / PD2.0 / MI FC1.0 tez zaryad\r\nBluetooth 5.2, WiFi 6, 4 mikrofon, 4 karnay\r\nOperatsion tizim: MIUI Pad 14, Android 13\r\nProtsessor: Qualcomm Snapdragon 870\r\nO\'lchami: 11 dyuymli displey (2880 * 1800)\r\nPlanshetda SIM karta uyasi yo\'q', 5.0, 59, '2024-05-28 09:37:34'),
(145, 'Planshet Modio M28', 2, 2, 250, 160, 'Mahsulot haqida qisqacha:\r\nOperatsion tizim: Android 10.0\r\nRAM: 6 GB/128 GB\r\nProtsessor turi: To\'rt yadroli\r\nKamera:Frontal kamera 5.0 MP, orqa kamera 13.0 MP\r\nMedia portlari: 128 GB gacha bo\'lgan MicroSD xotira kartasi\r\nUlanish: WiFi, Bluetooth, USB\r\nUSB: micro USB 2.0 versiyasi\r\nBatareya: o\'rnatilgan 6000 mA/soat lityum batareya\r\nImeykadan utgan', 5.0, 58, '2024-05-28 09:40:01'),
(146, 'Planshet Nextbook BRT81', 2, 2, 210, 110, 'Mahsulot haqida qisqacha:\r\nZaryadlash ulagichi turi: USB Type-C\r\nG\'ilof sovg\'a\r\nSD xotira: 128 GB gacha microSD\r\nOperativ xotira: 3 Gb\r\nDispley: IPS x 10,1&quot;\r\nAsosiy kamera: 1 x 5 MP\r\nOld kamera: 1 x 2 MP\r\nAndroid versiyasi: Android 10\r\nIchki xotira: 16 Gb\r\nSIM-karta qo\'llab quvvatlamaydi', 5.0, 26, '2024-05-28 09:41:30'),
(147, 'Smart Planshet, A1000 Pro,', 2, 2, 250, 110, 'Mahsulot haqida qisqacha:\r\nOperativ xotira: 4 GB, 128 GB\r\nPlanshet 4G LTE va 5G tarmoqlarini qo‘llab-quvvatlaydi\r\nPlanshet ANDOD11.0 operatsion tizimiga asoslangan bo‘lib, uning funksionalligi va ishlashini ta’minlashda asosiy rol o‘ynaydi\r\nKamera: 8,0 MP old kamera, 13,0 MP orqa kamera', 5.0, 15, '2024-05-28 09:42:52'),
(148, 'Planshet Blackview Tab 80', 2, 2, 340, 210, 'Mahsulot haqida qisqacha:\r\nIshlab chiqaruvchi 1 yillik rasmiy kafolat beradi.\r\nAndroid 13 operatsion tizimning eng so\'nggi versiyasi bo\'lib, u yaxshilangan ishlash, yangi xususiyatlar va yaxshilangan xavfsizlikni taklif etadi. Smartfoningizni ushbu versiyaga yangilash yanada yumshoq va qulayroq tajribani ta\'minlaydi.\r\nQurilma 128 Gb ichki xotiraga ega bo\'lib, ma\'lumotlar va ilovalar uchun keng saqlash joyini ta\'minlaydi. 4 GB operativ xotira bilan bir vaqtning o\'zida bir nechta ilovalar muammosiz va tez ishlashi kafolatlanadi.\r\n7680 mA/soat sig‘imga ega akkumulyator qurilma batareyasining uzoq ishlash muddatini ta’minlaydi. Bu sizga uni tez-tez zaryad qilmasdan ishlatish va uzoq kutish yoki faol foydalanishdan bahramand bo\'lish imkonini beradi.\r\n13 megapikselli asosiy kamera va 8 megapikselli old kamera yuqori sifatli fotosuratlar va videolarni taqdim etadi, bu esa yorqin, tiniq suratga olish va yuqori aniqlikdagi videoqo‘ng‘iroqlarni amalga oshirishni osonlashtiradi.\r\nTez aloqa uchun Wi-Fi 802.11 a/b/g/n/ac, oson ulanish uchun Bluetooth 5.0, 2 SIM yoki 1 SIM + 1 TF karta uchun ikkita SIM uyasi va mobil aloqa uchun 2G/3G/4G diapazonlarini qo‘llab-quvvatlaydi. .\r\n800*1280 HD piksellar soniga ega 10,1 dyuymli IPS ekran aniq va jonli tasvirlarni taqdim etadi. 16:10 tomonlar nisbati bilan u ko‘rish va ishlash uchun ideal.\r\n8 yadroli Unisoc T606 protsessori mobil qurilmalarda yuqori unumdorlikni ta\'minlaydi. Uning kuchli arxitekturasi ma\'lumotlarni tezkor qayta ishlash va silliq multimedia tajribasini kafolatlaydi.', 5.0, 26, '2024-05-28 09:44:40'),
(149, 'Planshet Blackview Tab 13 Pro ', 2, 2, 430, 280, 'Mahsulot haqida qisqacha:\r\nDispley: 10,1 dyuymli FHD+ IPS LCD, 16:10 nisbat\r\nProtsessor: MediaTek Helio G85\r\nAndroid 13 OS versiyasi\r\nXotira: 8 GB\r\nSaqlash: 128 GB, microSD karta uyasi orqali 1 TB gacha kengaytirilishi mumkin\r\nBatareya: 7280mAh\r\nO\'lchamlari: 238.8 x 157.6 x 7.7mm\r\nOg\'irligi: 450g\r\nOperatsion tizim: Android 13 sizning xavfsizligingiz uchun yaratilgan.\r\nSIM: 2 ta SIM-karta', 5.0, 36, '2024-05-28 09:46:44'),
(150, 'Planshet Blackview TabActive 8', 2, 2, 550, 460, 'Mahsulot haqida qisqacha:\r\nOperatsion tizim Android 12\r\nEkran diagonali 10.36 &quot;\r\nEkran turi IPS\r\nProtsessor modeli MT8781 Helio G99\r\n8 GB tezkor xotira\r\n256 GB ichki xotira\r\nBatareya quvvati 22000 ma / soat\r\n12 oylik kafolat', 5.0, 25, '2024-05-28 09:48:19'),
(151, 'Planshet Blackview Tab 18', 2, 2, 550, 450, 'Mahsulot haqida qisqacha:\r\nIshlab chiqaruvchi 1 yillik kafolat beradi. IMEI-ni ro\'yxatdan o\'tkazish rasmiy ravishda 30 kun ichida amalga oshiriladi.\r\nAndroid 13 operatsion tizimning eng so\'nggi versiyasi bo\'lib, u yaxshilangan ishlash, yangi xususiyatlar va yaxshilangan xavfsizlikni taklif etadi. Smartfoningizni ushbu versiyaga yangilash yanada yumshoq va qulayroq tajribani ta\'minlaydi\r\n8 yadroli va 2,2 gigagertsli takt tezligiga ega MediaTek Helio G99 protsessori turli vazifalarda qurilmaning yuqori unumdorligini saqlab, kuchli va sezgir ishlov berishni ta\'minlaydi.\r\n8 Gb tezkor xotira qurilmaning tez va muammosiz ishlashini, ilovalar va multimedia kontentini yuqori unumdorlikka ega qayta ishlashni ta\'minlaydi.\r\n33 Vt tez zaryadlovchiga ega 8800 mA/soat sig‘imli akkumulyator batareyaning uzoq ishlash muddatini va zaryadning tez tiklanishini ta’minlaydi, bu sizga qurilmangizdan uzluksiz maksimal darajada foydalanish imkonini beradi.\r\n11,97 dyuymli diagonali 2000x1200 IPS ekrani kontentni ko\'rish va ishlash uchun ideal, keng ko\'rish burchagi bilan yorqin, aniq tasvirlarni taqdim etadi.\r\n256 Gb o\'rnatilgan xotira qurilmadagi ma\'lumotlar, ilovalar va multimedia kontenti uchun keng saqlash joyini ta\'minlaydi.', 5.0, 15, '2024-05-28 09:51:02'),
(152, 'Planshet Teclast T40 Air 10', 2, 2, 400, 280, 'Mahsulot haqida qisqacha:\r\nUshbu quvvatga qo\'shimcha ravishda u 256 Gb xotira chipini ham o\'z ichiga oladi va Micro SD karta sig\'imini 1 TB gacha kengaytirishni qo\'llab-quvvatlaydi, bu sizning ehtiyojlaringizga to\'liq mos keladigan saqlash yechimini ta\'minlaydi.\r\nTeclast plansheti eng yangi Android 13 operatsion tizimida ishlaydi.\r\nBu borada foydali narsalardan biri SIM-karta uchun uyasi bo\'lib, u har doim aloqada bo\'lish imkonini beradi va Wi-Fi mavjudligiga bog\'liq emas. Shuningdek, GPS mavjud, shuning uchun gadjet navigator sifatida xizmat qilishi mumkin.\r\n18 vatt quvvatga ega 7200 mA / soat batareya avtonomiya uchun javobgardir.\r\nSakkiz yadroli Unisoc T616 protsessori oddiy vazifalar uchun yetarlicha ishlashni ta\'minlaydi\r\n10,4 dyuymli to\'liq laminatlangan IPS displeyimiz bilan o\'zingizni misli ko\'rilmagan tasvir sifatiga qo\'ying. 2000 x 1200 2K piksellar soniga va 178 ° ultra keng ko\'rish burchagiga ega T40 Air murosasiz tasvirni taqdim etadi.', 5.0, 26, '2024-05-28 09:53:26'),
(153, 'O\'yin monitori 2E Gaming 27', 3, 2, 360, 210, 'Mahsulot haqida qisqacha:\r\n- Ranglar soni: 16,7 million\r\n- Diagonal: 27&quot;\r\n- Yangilanish tezligi: 165 Gts\r\nDispley porti orqali ulanganda 165 Gts chiqadi, HDMI orqali ulanganda u 165 Gts dan kamroq chiqadi\r\n- Matritsa turi: VA, CURVED\r\n- Ramkasiz displey: Ha\r\n- Interfeyslar: 2xHDMI, Audio 3,5 mm, DisplayPort\r\n- Ruxsat: 1920x1080\r\n- Yorqinligi: 300 cd/m2', 5.0, 15, '2024-05-28 09:55:06'),
(154, 'Noutbuk Asus TUF GAMING Intel ', 3, 2, 1500, 1000, 'Mahsulot haqida qisqacha:\r\nProtsessor: Intel Core I7-11800H\r\nVideo karta: Geforce RTX 2050\r\nDispley: 1920 x 1080 FHD 15,6 dyuym\r\nRAM: 8 GB\r\nMa\'lumotlarni saqlash: 512 GB\r\nKafolat: 12 oy', 5.0, 15, '2024-05-28 09:56:30'),
(155, 'HP Victus 15 - 15,6', 3, 2, 920, 860, 'Mahsulot haqida qisqacha:\r\nKamera - Vaqtinchalik shovqinni kamaytiradigan va o\'rnatilgan ikkita raqamli mikrofonli HP Wide Vision 720p HD kamerasi\r\nKlaviatura - raqamli klaviatura bilan to\'liq o\'lchamli orqadan yoritilgan ingliz-koreys klaviaturasi\r\nKafolat - Bepul ta\'mirlash uchun sotib olingan kundan boshlab 1 yil\r\nProtsessor - AMD Ryzen 5-7535HS Maksimal soat tezligi 3,3 gigagertsdan 4,5 gigagertsgacha (6 yadro, 12 ip) HexaCore (16 MB L3 kesh)\r\nXotira turi - 8 GB DDR5-4800 MGts RAM (1 x 8 GB) 4800 MT/s gacha uzatish tezligi. 1 x 8 GB\r\nUmumiy Xotira - 512 GB PCIe® Gen4 NVMe™ TLC M.2 SSD\r\nGrafik xotira - NVIDIA® GeForce RTX™ 2050 noutbuki GPU (4 GB GDDR6 ajratilgan)\r\nEkran o\'lchami - 15,6&quot; diagonali FHD (1920 x 1080), 144 Gts, IPS, tor ramka, porlashga qarshi, 250 nits, 45% NTSC\r\nSimsiz karta - MediaTek Wi-Fi 6 MT7921 (2x2) + Bluetooth® 5.3 (gigabit ma\'lumotlar tezligini qo\'llab-quvvatlaydi) MU-MIMO-ni qo\'llab-quvvatlash\r\nUSB portlari - 1 ta USB Type-C® 5 Gb/s ma\'lumot uzatish tezligi (DisplayPort™ 1.4, HP Sleep and Charge); 1 USB Type-A 5 Gb/s ma’lumot uzatish tezligi (HP Kutish va Zaryad); 5 Gbit / s ma\'lumotlarni uzatish tezligiga ega 1 USB Type-A porti;', 5.0, 59, '2024-05-28 09:57:55'),
(156, 'MSI GF63 12UCX 8/512 Nvidia RT', 3, 2, 980, 830, 'Mahsulot haqida qisqacha:\r\nCPU: Intel core I5-1245(8yader, 12patok)(E-core up to4.4GHz).\r\nGPU: RTX 2050 4GB\r\nSSD: 512GB M2 NVMe PCle (2slots)\r\nRAM: 8GB DDR4 3200MHz(2slots)\r\nDisplay: 15.6 FULL HD (1920*1080), IPS, 250nits,144Hz\r\nBattery: 52.4 WH', 5.0, 29, '2024-05-28 09:59:06'),
(157, 'Noutbuk Lenovo LOQ, i5', 3, 2, 2000, 800, 'Mahsulot haqida qisqacha:\r\nProtsessor: Intel Core i5-12450H\r\nProtsessordagi yadrolar soni: 8 ta\r\nProtsessordagi potoklar soni: 12 ta\r\nProtsessorning bazaviy chastotasi: 2 GHz\r\nProtsessorning maksimal chastotasi: 4.4 GHz\r\nVideokarta: NVIDIA GeForce RTX 2050 4GB\r\nEkran: 15.6 dyum Full HD\r\nRGB yonuvchi klaviatura\r\nWindows 11 o\'rnatilgan ✅\r\nZamonaviy Gamerlar uchun moslashgan noutbuk', 5.0, 35, '2024-05-28 10:01:04'),
(158, 'Noutbuk Acer Aspire 3 Core i3', 3, 2, 850, 470, 'Mahsulot haqida qisqacha:\r\nEkran: Diagonal 15,6 dyuymli Full HD (1920x1080), 16:9 nisbat, TN matritsasi\r\nProtsessor: Intel® Core™ i3-1215U 6 yadroli 8 ta 4,40 gigagertsli 10 Mb kesh\r\nOperativ xotira: 8 GB DDR4\r\nQattiq disk: 512 GB PCIe® NVMe™ M.2 SSD\r\nVideo karta: Intel UHD Graphics\r\nPortlar: 1x USB 3.2 Gen1, 1x USB 3.2 Gen1, 1x HDMI, 1x USB 3.2 Gen 2 Type-C portlari\r\nWi-Fi/Bluetooth: Wi-Fi 5 (802.11 ax) + Bluetooth 5.1\r\nBatareya: 40Wh, 3S1P, 3 hujayrali Li-ion batareya\r\nWindows o\'rnatilgan\r\n1 yil kafolat', 5.0, 19, '2024-05-28 10:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_url`) VALUES
(457, 115, '458258f7c743f74c3e7bd080d895f1a3.jpg'),
(458, 115, 'cf924cf99ddd1c37f919cb130b756295.jpg'),
(459, 115, '898b90e0f4dea1ade41cccf6902456ce.jpg'),
(460, 115, '997bac00f2d4e7e5ea7c277bf2f94c79.jpg'),
(461, 115, 'b6ea287ded6bd7cff573579777358da3.jpg'),
(462, 115, 'ddcef60fcbc408ee913a2f9fafaa6709.jpg'),
(463, 115, '6c798f3a2b7ef9f5f3d205a765717cf3.jpg'),
(464, 116, '4d0a7ffd5f70bc3237396812fa1a4bd9.jpg'),
(465, 116, '0b157c413d7f06b752b4992508f556f4.jpg'),
(466, 116, 'e75dc465413c000ed81a47c932775c90.jpg'),
(467, 116, '0f6d8bbf4f6bc905c09ea10c183fb35e.jpg'),
(468, 116, '1cc549ff388d403c884e2b873150762b.jpg'),
(469, 117, '638d329c609fa117e046a8ed9ab06457.jpg'),
(470, 117, '7eda294377cd22c7ad0a834515bd842f.jpg'),
(471, 117, '93ef2268eea9572b8faa86dd53cea0f6.jpg'),
(472, 117, '75efd260bb35da2d2d09faefa78ffe82.jpg'),
(473, 117, '1d99c410a12b99307f13bd05bf9b5712.jpg'),
(474, 117, 'ff328316228781109f9ab0aba5470e10.jpg'),
(475, 117, '1b62fd562db438ad2df08cd263165c09.jpg'),
(476, 118, '4e3d97fc71606572c2ca1cae1d7dbff6.jpg'),
(477, 118, '8822f0004794b8593104b57a976e6d24.jpg'),
(478, 118, '6671a3795c8de9c5e8263fd76ab52887.jpg'),
(479, 118, 'f7442669a7ae52e5cc3db22f9c865ca8.jpg'),
(480, 118, '9041dea1db309f507030f8cec1fe88cf.jpg'),
(481, 118, '91edfe923eb8df15d595daefef468a79.jpg'),
(482, 118, '0844d354129b145adce6f880a3a8f8f5.jpg'),
(483, 119, 'f2312561a2f0d39aebd41714cd6d87ae.jpg'),
(484, 119, '12cb3f2afdf8d09ee9bc888ea92a18fe.jpg'),
(485, 119, 'da7e34f9dbe36379f32424796d8656cb.jpg'),
(486, 119, '24e93cca3f0fab8b3e271aa7d92f5c50.jpg'),
(487, 119, '90e1917d597eead243b1d784fd53de55.jpg'),
(488, 120, '5015939a6f1c5feb5e950759d295ac4d.jpg'),
(489, 120, '96ed00fdcfaf3014b2a9b02b5076e7e9.jpg'),
(490, 120, '36df19ff671f525d22522badc8d047f1.jpg'),
(491, 120, '9454e7a42dbc8b18f85e62b104e9488d.jpg'),
(492, 121, 'e0373f19573bfefc42357210e725807d.jpg'),
(493, 121, '21a9de559e79b661d72f95575f558585.jpg'),
(494, 121, '8fafc6c13af1a54f4791c42c07788044.jpg'),
(495, 121, '9d6882cf6f9d0b31e00ed2c0d1c22b7f.jpg'),
(496, 121, '8779add0b466b6b48704629fcabc5af3.jpg'),
(497, 122, 'c99d57f33e755f9116ec801783017213.jpg'),
(498, 122, '8bf6072b78b7b60a57a9eeeccbd47c5d.jpg'),
(499, 122, '61a224e77e6782a14671758e9791972e.jpg'),
(500, 122, 'e4bd23bb0b90564ae0869cc51ee0229c.jpg'),
(501, 122, '44a9a43d24c06488989ab3bab7489eed.jpg'),
(502, 124, '089a18ece6adb85a3cf1ef4f39813444.jpg'),
(503, 124, 'e523dbd3d40abad54cb6a91b9b36ace5.jpg'),
(504, 124, '90e0a8f45f6535244524d9a3fd539953.jpg'),
(505, 124, '918ba210ecfecf35666cdcdd2616bfb9.jpg'),
(506, 124, 'e83ba80c89cefbd93ef64fbf762b298c.jpg'),
(507, 124, 'fd47b69cc72e642aea0facb2b3beb30f.jpg'),
(508, 125, '2091ee89dca220551cb84586e5c48904.jpg'),
(509, 125, 'bcb04c75dd826465f5b5f4b6344aec3b.jpg'),
(510, 125, '497871762791694c61bc02453f152058.jpg'),
(511, 125, 'ad7993122f78a7c0167eee2ebfc00740.jpg'),
(512, 125, '5536386cd7b4e20d171c35ac09f9fc5e.jpg'),
(513, 126, 'a3342e27aeb7909fc741b199033d62b9.jpg'),
(514, 126, '09cd4b13082feb1c6ff320eb3ca22251.jpg'),
(515, 126, 'f0e3320c9a9dc6a341cf6f79138ddf4a.jpg'),
(516, 126, 'b827142297e909438033ef8853fb1dc5.jpg'),
(517, 126, '391d3336cceec2e7ddb7b8e54230c1ef.jpg'),
(518, 127, '9fa7afd8c98109c880e0f8d0d5c6d4d0.jpg'),
(519, 127, 'ae25848c0780155e464e514d121454fa.jpg'),
(520, 127, '3847e2c4a68fd8fb6316ec73ace12a91.jpg'),
(521, 127, '858c2cf848addfb25f80f4ca7bc491b5.jpg'),
(522, 127, 'e45c1ed9ad7566f43a1857b717a29829.jpg'),
(523, 127, 'cbff30c696178c9c2f939feeaca5ae95.jpg'),
(524, 127, '7cffc9f71300ed7f6c00c779a6168f9e.jpg'),
(525, 128, '35a4a5c678bfae5748a588aa0f186f19.jpg'),
(526, 128, 'dd2754bbc7954a354ee76d251b4b65f9.jpg'),
(527, 128, 'c30249ff4ef6f23a72b7260edfc83422.jpg'),
(528, 129, '42d482e852b7a651f87bab8d10a9d86e.jpg'),
(529, 129, 'c6b677e4e71947084941fe43c4c8138e.jpg'),
(530, 129, 'f16161596b4f418d1897cb98c7ee7db2.jpg'),
(531, 129, '19830fde50ac9e88b907eb5bbebb9c37.jpg'),
(532, 129, '2c613a93104e0d7fa229212c37caaac9.jpg'),
(533, 130, '4a4ec440ba88ee1d7b8cd2f51f61811e.jpg'),
(534, 130, '6338b44c442a1f9cb278ccb1bb04e1d8.jpg'),
(535, 130, '119f91613d442076b9894d687d463f68.jpg'),
(536, 131, 'a846709bb01f4b8e939224573a3a234e.jpg'),
(537, 131, 'c52148c225380efe2b6252006da60aa1.jpg'),
(538, 131, 'a728263d4da88e62f416ead460dc6f26.jpg'),
(539, 131, 'a63d1431eb10e7eb224d8e8a1690461f.jpg'),
(540, 131, '7032fc119311917227c8e48508ee8e42.jpg'),
(541, 131, '56083912fd094b81315432a56a3affcf.jpg'),
(542, 131, '5cfeed277e27bf3b6f217b9241cca0d8.jpg'),
(543, 132, '6ca98d9fd5ca459a52e78915bf7aea76.jpg'),
(544, 132, '00907decda1adf99b6c54c688aa9dcb9.jpg'),
(545, 132, 'f1cea8fd52db31786a3c68c0babf0ffa.jpg'),
(546, 133, 'c3479ef525cf17c4417d57a5d89a4e27.jpg'),
(547, 133, '3f24fe8d20a3e828f88c9a852c6674a5.jpg'),
(548, 133, '8565cc17c438b32f85d10229ca92574e.jpg'),
(549, 134, 'f0f72198ddd3cb600d8abe5931a61d3a.jpg'),
(550, 134, 'bb60357ac0a5ca2b8cd050ce4f789896.jpg'),
(551, 134, 'b5aba770a6f9b93dcfbdfaee4b5e5589.jpg'),
(552, 134, '122933dfa4b9df16199bf99ccb2760e5.jpg'),
(553, 134, 'd2a263d0e5cea54e7376a93662a0ad9a.jpg'),
(554, 134, 'fd0b16ca2e825c4cef9f3db1558a10af.jpg'),
(555, 135, 'b6c7b34a14e4f3723fe3d288cde3afb5.jpg'),
(556, 135, '4627a6056f01c6a191ddef37628ab4dd.jpg'),
(557, 135, '6740c4ba9050f8f9d03925bf991eba80.jpg'),
(558, 135, 'a7ea3c7b7a855429d617094da729a0e1.jpg'),
(559, 136, '2ff7f56f592acddfb30dc76ff90b1683.jpg'),
(560, 136, '60271212434632cbf4ef2f7d67ff4ae3.jpg'),
(561, 137, '7da9501e896b923982dc78162bb7d122.jpg'),
(562, 137, 'a5c905c3d6d08dbebc2849a4caf10438.jpg'),
(563, 137, '80eaa11545fb1c3ac5e069d48cc82e94.jpg'),
(564, 137, 'aa2515baa965fbc4916fa3755963d759.jpg'),
(565, 137, '318ccea555e65598235d084c0ca3f601.jpg'),
(566, 138, '38c78d71878af1fdf921ad1c1f97360c.jpg'),
(567, 138, 'bee5b572b42ef02da951bc4491925dde.jpg'),
(568, 138, '32f1d473cb661ef81a75cde97fa00935.jpg'),
(569, 138, '95744d78648c1560671b988bdc3f3530.jpg'),
(570, 138, '60080c1e3f5047fac482bdfc14611fb9.jpg'),
(571, 139, '820d783934a2515680a2eb5b0e3f41c7.jpg'),
(572, 139, '7f894738b084d0980a08d3f2cd8b5f99.jpg'),
(573, 139, '59f51bd397a621cb928bb91a033f7f35.jpg'),
(574, 140, 'f71bc45752c3beca0086878b866dde45.jpg'),
(575, 140, '8c2971b27e00433d3fe1479f91d7e4ec.jpg'),
(576, 140, 'a702ea3856fbfa930d83f5e52ce46fe1.jpg'),
(577, 140, '561b318a27125d7d275e46f1fe22f4e2.jpg'),
(578, 140, '6547579fb261c6f51a3460bab6ace4fc.jpg'),
(584, 142, 'c6be63659ef005e276df4b299db88d74.jpg'),
(585, 142, '534380921fc3834e9ee73be03eb17b99.jpg'),
(586, 142, '0e85bf3bf647a5dc55c80fcdecddea78.jpg'),
(587, 142, 'c6f9911aeb19f6da16d99a09240f38c5.jpg'),
(588, 142, '79a0bd0953a141feb2fa85beece6f564.jpg'),
(589, 143, 'e63e40700bc58ff5f579089bf381ab89.jpg'),
(590, 143, '579bf10148a8860d62213a4a22824f91.jpg'),
(591, 143, 'aff6251853823f2d7b8a8f65b9cab709.jpg'),
(592, 143, 'bfa332ff7bc59a9c117273890ad20d15.jpg'),
(593, 143, '4b961d175ae80b09ee3053a95444d8da.jpg'),
(594, 144, '97f01c0ea0b0ff4c445ccfa1ac686329.jpg'),
(595, 144, '625688de31d74041899cd1f5ad229a59.jpg'),
(596, 144, '600c4b60acb71965c95c182c7c494c4d.jpg'),
(597, 144, 'b5db4a1789622dbdd501d88a8eef732a.jpg'),
(598, 144, 'f862f94878a62490440a6f55885aabec.jpg'),
(599, 145, '04ecc2a61ffb0ed0b99c684275633cc2.jpg'),
(600, 145, '255030c02e45a819bf639e1893ee79d0.jpg'),
(601, 145, '8ec179d608a06d28c1f54284fb325c30.jpg'),
(602, 145, 'a2a0476423963aa6fccbb0e6b80f6374.jpg'),
(603, 145, '6cfd588fd540ffc130e5332bb82b806a.jpg'),
(604, 146, '1dd28b34843aee3e7c963963064b71bf.jpg'),
(605, 146, 'f6d27e6ab4c23c339df98377e3d976f1.jpg'),
(606, 146, '19e67e0595f789d16d26b7c8d512e5a1.jpg'),
(607, 147, '7806cfe14f92c120a08689d2d9ba6fd6.jpg'),
(608, 147, '2f228ac5f8c5fd5488224378bba5be32.jpg'),
(609, 147, '38ee1882fdcbaad5867999d8b5e7a6ee.jpg'),
(610, 147, '4c7d5078ce5113e5ebd2ae5c885837eb.jpg'),
(611, 147, '0570e30373d15989a408497eb219c378.jpg'),
(612, 148, 'c96efd1feeac55dfa1932252a8458107.jpg'),
(613, 148, '2d036cb647f0ab0de66e91c3b1ed8aef.jpg'),
(614, 148, '8a62bee2145282df0091f6f016b3627d.jpg'),
(615, 148, '700467d09012108b533881014b0509f7.jpg'),
(616, 148, '93bc9f41d7a8bf9638a14482d946a40d.jpg'),
(617, 149, '5507b84a47dbb171114a63ee61e5e20e.jpg'),
(618, 149, '6aa169e24c6491605fdc53d361bebc57.jpg'),
(619, 149, '175cad66b54eaa15101e24c365237c40.jpg'),
(620, 149, 'abbab0641d587eb43d28da4f6dff05b2.jpg'),
(621, 149, '9e6313dffda6f5586680d62dc0963338.jpg'),
(622, 150, 'c198311104de79a98d3cabdfaf124c5a.jpg'),
(623, 150, '45f6201269970a864cb0b1bc573a8360.jpg'),
(624, 150, 'b2d126eea7056590345931e44ba9fb6c.jpg'),
(625, 150, 'ce021f8659735c7bf3f7d347681e07fd.jpg'),
(626, 150, '247397d25f09af5c3c7fcf2ac78e5a4c.jpg'),
(627, 150, '7ab5ffe0bdf2c7902a4fe2325fcd9074.jpg'),
(628, 151, '14eac314fa5767c5636bf4fc6fc2de67.jpg'),
(629, 151, '261272230e2150321280cc9a1b5a9dc8.jpg'),
(630, 151, 'a446ecbfff77dab6541f6e7487ba46b5.jpg'),
(631, 151, '08bf30bc7d022367e0b69222012da869.jpg'),
(632, 151, '574570a664371973100396931919204f.jpg'),
(633, 152, 'a7ffea103b90ddcffd2ddb75b863e248.jpg'),
(634, 152, 'aa4b8f49c7319f448b86939efb53b464.jpg'),
(635, 152, 'c9cec99f0218c6863694d7aaf8a5c22b.jpg'),
(636, 152, 'b0a969277db8f6007a8f2d4a054734f7.jpg'),
(637, 152, 'c8b84f7ca1e1624062c76fcb7e2dfa37.jpg'),
(638, 153, 'd65465b64363e9bd6b1897a589800433.jpg'),
(639, 153, 'a57db396144181fed7c97c7502878e21.jpg'),
(640, 153, 'f9739ffe6e91d6027d866c8eecef0168.jpg'),
(641, 153, '5d42b5021b6a1d50638805756e8d2f07.jpg'),
(642, 153, '94e5687372ca010373980dc511cbb041.jpg'),
(643, 154, '55616eb462ea96785b8502829ea24728.jpg'),
(644, 154, '3404259f53c8c96415d8558118c11584.jpg'),
(645, 154, '3039c7c2fcb54915d7b67ba1c1b53b2c.jpg'),
(646, 154, 'd315c5e3b229bd8483650910343ca20b.jpg'),
(647, 154, '0e030f3b6abdf1164c6cf0a2cb8a8833.jpg'),
(648, 155, '848750ec5d458bf13d4f78779aefaade.jpg'),
(649, 155, '0885235951267fd9e415761b9b6d8696.jpg'),
(650, 155, '17f6ee256d50f8589489e47e93128c3f.jpg'),
(651, 155, '1d2b623a77f8d356951dc2b0f003e857.jpg'),
(652, 155, '82ddf475fcdb69360a302cb9c91bfd5f.jpg'),
(653, 156, '2fd33258a9495c899b9158f4c8e77e6e.jpg'),
(654, 156, '0d29c695facc01ef60217222e8fd90c8.jpg'),
(655, 156, '2ccd1d50d56a125d9427625fdc790ebb.jpg'),
(656, 157, 'ce4a76259adb007bcab1be415d78a1b3.jpg'),
(657, 157, '46864d7a3b751007d875e3441bfde4ea.jpg'),
(658, 157, 'fc501026d75be9d602ca99b7d4e3a00d.jpg'),
(659, 157, 'ba21e6910cd90b90ba0f7b4744fbbf31.jpg'),
(660, 157, '0f8fd54260d152f75576bb8f500af671.jpg'),
(661, 158, '54a1f1a251953a88e2d49e4f269279da.jpg'),
(662, 158, '9d3fef7e16fa38c48d6fb5e5a9e20032.jpg'),
(663, 158, 'aa438c33dcba65d37df285216c87b80e.jpg'),
(664, 158, '1946829af6c4d628f5116dc78297f350.jpg'),
(665, 158, 'd02a4f5c9b6244c8b7ec8bd58c12fca8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishes`
--

CREATE TABLE `wishes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishes`
--

INSERT INTO `wishes` (`id`, `user_id`, `product_id`) VALUES
(40, 3, 115),
(41, 1, 155),
(42, 1, 121),
(43, 3, 154);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `wishes`
--
ALTER TABLE `wishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT for table `wishes`
--
ALTER TABLE `wishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `wishes`
--
ALTER TABLE `wishes`
  ADD CONSTRAINT `wishes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `wishes_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
