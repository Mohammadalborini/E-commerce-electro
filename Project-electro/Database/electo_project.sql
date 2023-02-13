-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 04:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electo_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_infromation`
--

CREATE TABLE `admin_infromation` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_infromation`
--

INSERT INTO `admin_infromation` (`id`, `email`, `phone`, `password`) VALUES
(1, 'admin@admin.com', 123456789, '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_images` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL,
  `product_category` varchar(256) NOT NULL,
  `short_description` text NOT NULL,
  `product_colors` varchar(256) NOT NULL,
  `product_price` varchar(256) NOT NULL,
  `discount` varchar(256) NOT NULL,
  `uploaded_on` date DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `point` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `product_images`, `id_user`, `product_category`, `short_description`, `product_colors`, `product_price`, `discount`, `uploaded_on`, `qty`, `id_product`, `point`) VALUES
(88, 'Camera ', 'product09.png', 4, 'Cameras', 'short', 'white', '50', '0', '2022-12-04', 1, 7, 0),
(89, 'Headphone', 'product02.png', 4, 'Accessories', 'short', 'black,blue', '20', '0', '2022-12-04', 1, 6, 0),
(108, 'Camera ', 'product09.png', 2, 'Cameras', 'short', 'white', '50', '0', '2023-01-01', 1, 7, 0),
(109, 'Phone', 'product07.png', 2, 'Smartphones', 'short', 'Blue', '250', '0', '2023-01-01', 1, 9, 0),
(111, 'Phone', 'product07.png', 3, 'Smartphones', 'short', 'Blue', '250', '0', '2023-01-01', 1, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `weblogo` longblob NOT NULL,
  `dashlogo` longblob NOT NULL,
  `dashname` varchar(256) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `weblogo`, `dashlogo`, `dashname`, `phone`, `email`, `address`) VALUES
(1, 0x89504e470d0a1a0a0000000d49484452000000a9000000460806000000b7c7b4780000001974455874536f6674776172650041646f626520496d616765526561647971c9653c0000032669545874584d4c3a636f6d2e61646f62652e786d7000000000003c3f787061636b657420626567696e3d22efbbbf222069643d2257354d304d7043656869487a7265537a4e54637a6b633964223f3e203c783a786d706d65746120786d6c6e733a783d2261646f62653a6e733a6d6574612f2220783a786d70746b3d2241646f626520584d5020436f726520352e362d633133382037392e3135393832342c20323031362f30392f31342d30313a30393a30312020202020202020223e203c7264663a52444620786d6c6e733a7264663d22687474703a2f2f7777772e77332e6f72672f313939392f30322f32322d7264662d73796e7461782d6e7323223e203c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a786d703d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f2220786d6c6e733a786d704d4d3d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f6d6d2f2220786d6c6e733a73745265663d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f73547970652f5265736f75726365526566232220786d703a43726561746f72546f6f6c3d2241646f62652050686f746f73686f702043432032303137202857696e646f7773292220786d704d4d3a496e7374616e636549443d22786d702e6969643a31424436323036324641434431314537413733343939423441303935393732382220786d704d4d3a446f63756d656e7449443d22786d702e6469643a3142443632303633464143443131453741373334393942344130393539373238223e203c786d704d4d3a4465726976656446726f6d2073745265663a696e7374616e636549443d22786d702e6969643a3142443632303630464143443131453741373334393942344130393539373238222073745265663a646f63756d656e7449443d22786d702e6469643a3142443632303631464143443131453741373334393942344130393539373238222f3e203c2f7264663a4465736372697074696f6e3e203c2f7264663a5244463e203c2f783a786d706d6574613e203c3f787061636b657420656e643d2272223f3ee6abfe330000053b4944415478daec9cbd8ed34010c76d747480947b0447a2a08d448fe47440e77b84a4051a47ba969392eaeae411920eca443c00242d05d2e5112e12941461078d915979bfbc1b27befc7fd2ea3e62ef78c77f8f7766edc4fbfd3e02e09479041700881400881440a40040a40040a40022050022051029001029001029804801804801804801440a00440a2052002052003cb8f0ed208ee3dafbeed5efae8c44bf139c9ed3a789d78f104941eb6ef7395d1c2ecd921cae0688a4edbc55a69a0b3b8587205200910200918233c1a5044525a15d4d3b1bb81a3421d299685bf99f3e75d280094847fc1888d6132dabd864c4c73a0960aba8548c2b3e5e154dd8da28f6a7e34bf8cf44632a13dbf62afc3da9e85355acec8bed57bc0df987fc94f3cfadf8aceb30e6625f990507a1d5c182118dafd4724db69948db7a17727d4b567c4cf3bd1b799d8b40b4b1a39d6595c8c4ffa6fbfadc39fa91aa0724f63bdbbe24df4e6b8c39add2894f6bad482932f89cec2a01a9229f68f71eb6f2238a74eeda5769cc3e4c438ab49589139ff8a94717749b5d9a84cab7c839dfeaea323ee2624656d3b7734fbbe4b7e5d966f73ca71b07e88a8437e7f9accace34d0618f6d23f703f12d910610bb73e234a8caee0db7fc9d989ccf023a31310867c75508396a0e3411352f122b2911330974c3494359f4ba884927bf7f641d2a2b3416be2d2786b663ceb82d9a4a9ceab00c392735cce77243e2b3d4ecdb71b073af5ab2d4d8195745ec50cba216e7616ed147e83197e7ff8d254e4715293be3deb31ab036ed6fb0b3b7b96d97ec4c55d38906456a23d0da632e6967add93f3b97c4295524303b87faa76abb9e859dbff55655fd5362285a576c3b146d7764bf8d3c7ceb32669d1daff9f8458b44aa2a7c77f6fe4fdef62cec44d27c4c89e5496d828d3896ad876fadc75c2ae6f71417c15964f7c901fbeed8d83921f1450ec2f1f2ade398b716fe3d6824ed4627ba2cda10db161ef3aee131ef0e11602e22607b329333f48beb983b3ab1ff78fcc2a9b3e7bfbfb7ee76bfd508ec32f6a36b133dda50900f1d311dc79c38048137a27d11ed1737fafd75dbe7a4baf94ed6c409b34d00f83987ce4310a943d2936ab278796efc51b44fa2bd12ed0937fafd337fd65a91ae34b7e531af98d80828356c6bb2631359a836796f51bfdd9dc8f422c49875cba9e5e48ba2e5b566db6b8eb2ed1329d71b179a68bae6b5679d404934b4c0a05cb337d82196a6d59752441973913caf21d2ec447cab1d33fb7ea989a25ba9ef0f1687f4febfe3934a8cb9e68af07932dff561dd91627b8a2e6b4349839c32b3b8d2e9c1e4be4a6ce2c79dc18eebda7da53d12b1c68ebc569e8b3e2e7dfda89aa258f8d675ed9eb82afcc489d34fd19e1af6a139eab3227172c9ee7d1f379b04b8e2b7c299c348ff744d12d93dc943b7fdb9e8f3aa2ab258d8e9456e2b29aaf1d3091c68e679a924a64c1cdf220a8ca56fd3c8ad30bf88ea3d5c12b7754e5a3893063d0ad45da69a6fb19d61203ba3e2358e0a5c9f12cb5ae2db15475199b5c5bedf5a2dd2d2d4e12af22b56d3be7ddd8a0a3f66e86b477bcb65fb23c70babd3806f7d20bfa91e4bbcb5d8ffb6f5222d5df5dd9ad30872625713dd42d859f14530b114864bd44e1bf2edacce980d63a132d38de6f31bdea656e2e43bf0f810137e29732fc6d051257ebe6f8cfabe2d6ad97fd55baf45a2b6901f1a39f4b7131ade165d959a76ccd28ad35bd1de89f692fffeca11f49f408bc4296ee2abfb00a810a9118814b4067ccd0e804801804801440a00440a00440a2052002052009102009102009102881400881400881440a40040a4002205002205c0873f020c003525b79e76bdfbcf0000000049454e44ae426082, 0x89504e470d0a1a0a0000000d49484452000000a9000000460806000000b7c7b478000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000060b49444154785eed9bcf6b244514c7139918036388876cdc24042206310ca2042fb9e5961537372f8a17f5e2bfe08207d99bf80f889e64fd0322680eb2b9e5100d7b092cc64d8410a2f114938130323abed7fb3a5477bfaaaeeeae994ccbf7038faa4ad7af57fdea75fd988c00000000000000000000000000000000000000000000000000000000000000d03f7a9a2c2d2dfd4a210011cf4808c0d0923052f160aa77ab22f08ca00af0a437c8eaeaea5714a8135b9e0102460a861e1829187a60a460e8199530823738c4cb924cb0b0b0f0c7f8f8785b9285383838f8787474f447499af0fa2b03f5e309f5634992ff5b78ddb9b3b3f3a12413d0b3afe9d947920431aeddfdfafafabb1486466dabe869c0c6c6c6eb5c666a6aea8a926a7d45ebb461d49569676262a2cbcfd6d6d63ea5b44aafd77b27ae636666e62ffe9326fc2cce670a3dd350eb30375fad566b57ca9b79bce072e4a47ea7a85936121e737eeed239288a12d7328c46ca7db219a64d7ceb36e149607b49366183d55e9ccb303d4543cb1719e9cacacaf7da33112b3cb645fbca3af7fd54a24e46ca9e8102b5bc8ff8cefc9c979c2b695d0669a41e1358a5aacea2637fa88b91bafa5944f20cb5ea4488c5d4679046ea2119428d2d7b550ac3530723ad3acbd3c29f720a33846e279e10c36ca4a175164f5e99beeeee6957ff39edeabf94a4062b9381faa1eeee79a26c6d6d3d90a40a979568c4c5c5c5adb3b3b349496660bd8e8f8f6f4b32820d777373f39124551a8d466f7171f15092239d4ea749f5bc28c90ce459feb9baba6ab091bafae341e29d09ea38a649bf43738c7dc69675989f9fff4d92b93a3364f83fecededbd25c9eab83c6919f170f96a399b277579215b19868d4efaa2964d7bd33c6f67db1cd8dae14d17edea5fa07802a927913796821b10b58e587c3c5a689d53128e6136523124effc1ae4fdfea5c059ded50e8bcf862b6e875f7c7a02980cc2487d0c34a4ce9ac832220cc36ca439eb252f6c75982fd2d58eef6420afb9e2b3861f8491faf42384ce2e5de4f8ae34b5b916a5b5a5eb064a1d9cb4d0dae80e8519cecfcf9f93a8b31d5a8f7d235127b40edfa3f5ddb792bc3178ddecd38f103af3ed18b727c904a7a7a733122d459d8cf49644fb8aab9dedededcf245a0b666767cf24ea2494cecd66b323d104dd6e57dbec79e36da4f4d9788f026ecc5b78374b21b821cafed6a22cd4dedf120d0a7e050582d1e9749e9568506a63a49393937f4a3403ed4edfa040f5e60524c2d58eef556add08a573bbdd1e9768026dadfa4be3d5bb240f492e4538feb63c4e502723b5ee328f8e8e5c17068570b5737272f2be449dd0eefe25d7d1d3b0114267dedddbd69ee9b53119e37d0a3649d6489a221cff4e9e25a88d91cecdcd7d22d10cfbfbfb6ffa1cb5303c986c4492cce06a876fe37c3ccbd8d8d813beb1ca3bbea135dcb14433d066e63589f69d103aefeeee7e20d10cd3d3d3d7b777e22def3d4da9dca33c77259ec5754eea6b040551dbb2bddcbc5b91bc43e3583f3e78d66e806242dfbed8f491314de48dc5e38cd944ad236f92980ceac6890c903febbd1c7928d92312ee9995e29923c90465eeee4dcc7b6283840231d48fd277f70c9797e83569bd6860a3bb744926e081efd7ddbd244dd43160b88c79572e3a689fd442e3a8e133b6e9fe94b9bb2703bca0e0f9a7292b97af741febbf6f9099175b7f68d1d0f2393d80eb76a4a8b8ae0c43b6c362f344791e2c2d96af859ad7358e1aa175d6c6978dd4f09836b994ec11b53b82e259a979ca32f04d936dbdc5edb45aad9f245909eeafedff95969797bf90a817878787bcc1e80b21c796bd2e8def84244d7e96d0857ddc65e6a9b322806868f9bc3c4088596ff36e2655dbf1d1a5e8b82b27076a3e9fb635aaea2c5f0715f2927cf4a4794f53ca6d9c02888696cf7b70f965c98f17d47a6cc283a8bc682b65da214f52e8ff7d8afc1780f2c957f395355286d7a8459722be3a9311de4f19a5299923a804753352132ee3ea3f1b59959716e36a875f123fab72e8cfe5652d97a89b4f24f899e59425913716e96765b81edb242dab3319e30609eff4db221cb77b500000000000000000000000000000000000000000000000000000000000000000b8114646fe036b7bc095454ea5460000000049454e44ae426082, 'Electro', '0791236547', 'Electro@gamil.com', 'Amman Jordan');

-- --------------------------------------------------------

--
-- Table structure for table `hot_deales`
--

CREATE TABLE `hot_deales` (
  `id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_images` varchar(256) NOT NULL,
  `product_category` varchar(256) NOT NULL,
  `short_description` text NOT NULL,
  `full_description` text NOT NULL,
  `product_colors` varchar(256) NOT NULL,
  `product_price` varchar(256) NOT NULL,
  `uploaded_on` date DEFAULT current_timestamp(),
  `rate` int(11) NOT NULL DEFAULT 5,
  `numer_seller` int(11) NOT NULL,
  `quantity_of_devices` int(11) NOT NULL,
  `hot_deals_end` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hot_deales`
--

INSERT INTO `hot_deales` (`id`, `product_name`, `product_images`, `product_category`, `short_description`, `full_description`, `product_colors`, `product_price`, `uploaded_on`, `rate`, `numer_seller`, `quantity_of_devices`, `hot_deals_end`) VALUES
(6, 'Headphone', 'image 1.jpg,image 2.jpg,', 'Accessories', 'test', 'test', 'Blue,Green', '60', '2022-12-23', 3, 1, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `phone` int(10) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_image` varchar(256) NOT NULL,
  `product_category` varchar(256) NOT NULL,
  `color` varchar(256) NOT NULL,
  `total` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `city` varchar(256) NOT NULL,
  `area` varchar(256) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_date` date DEFAULT current_timestamp(),
  `point2` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `id_product`, `user_name`, `phone`, `product_name`, `product_image`, `product_category`, `color`, `total`, `qty`, `note`, `city`, `area`, `order_id`, `order_date`, `point2`) VALUES
(13, 4, 7, 'Ahmad', 987654, 'Camera ', 'product09.png', 'Cameras', 'white', 50, 1, '', 'amman', 'amman', 76052, '2022-12-04', 1),
(14, 4, 6, 'Ahmad', 987654, 'Headphone', 'product02.png', 'Accessories', 'black,blue', 20, 1, '', 'amman', 'amman', 95559, '2022-12-04', 1),
(15, 4, 9, 'Ahmad', 987654, 'Phone', 'product07.png', 'Smartphones', 'Blue', 250, 1, '', 'amman', 'amman', 36550, '2022-12-04', 1),
(16, 4, 11, 'Ahmad', 987654, 'Headphone', 'product02.png', 'Accessories', 'blue', 30, 1, '', 'amman', 'amman', 51691, '2022-12-04', 0),
(17, 4, 10, 'Ahmad', 987654, 'Tap ', 'product04.png', 'Accessories', 'black', 325, 5, '', 'amman', 'amman', 94047, '2022-12-04', 1),
(18, 4, 5, 'Ahmad', 987654, 'New Labtop', 'product01.png', 'Laptops', 'red,blue', 500, 1, '', 'amman', 'amman', 27344, '2022-12-04', 0),
(19, 3, 10, 'Ali', 12345, 'Tap ', 'product04.png', 'Accessories', 'black', 260, 4, '', 'amman', 'amman', 43199, '2022-12-04', 1),
(20, 3, 9, 'Ali', 12345, 'Phone', 'product07.png', 'Smartphones', 'Blue', 250, 1, '', 'amman', 'amman', 89255, '2022-12-04', 0),
(21, 3, 5, 'Ali', 12345, 'Labtop', 'product01.png', 'Laptops', 'red', 600, 1, '', 'amman', 'amman', 88108, '2022-12-04', 1),
(22, 3, 6, 'Ali', 12345, 'Headphone', 'product02.png', 'Accessories', 'black,blue', 20, 1, '', 'amman', 'amman', 93650, '2022-12-04', 0),
(23, 3, 5, 'Ali', 12345, 'New Labtop', 'product01.png', 'Laptops', 'red,blue', 500, 1, '', 'amman', 'amman', 42206, '2022-12-04', 1),
(24, 3, 10, 'Ali', 12345, 'Tap ', 'product04.png', 'Accessories', 'black', 65, 1, '', 'amman', 'amman', 23796, '2022-12-04', 1),
(29, 2, 5, 'moahamd', 123456789, 'New Labtop', 'product01.png', 'Laptops', 'blue', 2500, 5, '', 'amman', 'amman', 58382, '2022-12-04', 0),
(30, 2, 9, 'moahamd', 123456789, 'Phone', 'product07.png', 'Smartphones', 'Blue', 250, 1, '', 'amman', 'amman', 90980, '2022-12-04', 1),
(31, 2, 7, 'moahamd', 123456789, 'Camera ', 'product09.png', 'Cameras', 'white', 300, 6, '', 'amman', 'amman', 87503, '2022-12-04', 0),
(32, 2, 10, 'moahamd', 123456789, 'Tap ', 'product04.png', 'Accessories', 'black', 65, 1, '', 'amman', 'amman', 23833, '2022-12-04', 1),
(33, 3, 5, 'Ali', 12345, 'New Labtop', 'product01.png', 'Laptops', 'red,blue', 500, 1, 'test', 'amman', 'amman', 10576, '2022-12-04', 0),
(34, 3, 9, 'Ali', 12345, 'Phone', 'product07.png', 'Smartphones', 'Blue', 250, 1, 'test', 'amman', 'amman', 47238, '2022-12-23', 0),
(35, 3, 10, 'Ali', 12345, 'Tap ', 'product04.png', 'Accessories', 'black', 65, 1, 'test', 'amman', 'amman', 93049, '2022-12-23', 0),
(36, 3, 7, 'Ali', 12345, 'Camera ', 'product09.png', 'Cameras', 'white', 50, 1, 'test', 'amman', 'amman', 27227, '2022-12-23', 1),
(37, 3, 9, 'Ali', 12345, 'Phone', 'product07.png', 'Smartphones', 'Blue', 250, 1, 'test', 'amman', 'amman', 62975, '2023-01-01', 0),
(38, 3, 5, 'Ali', 12345, 'Laptop', 'product01.png', 'Laptops', 'blue', 2500, 5, 'test', 'amman', 'amman', 77291, '2023-01-01', 0),
(39, 3, 6, 'Ali', 12345, 'Headphone', 'image 1.jpg', 'Accessories', 'Blue,Green', 60, 1, '', 'amman', 'amman', 14866, '2023-01-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_images` varchar(256) NOT NULL,
  `product_category` varchar(256) NOT NULL,
  `short_description` text NOT NULL,
  `full_description` text NOT NULL,
  `product_colors` varchar(256) NOT NULL,
  `product_price` varchar(256) NOT NULL,
  `discount` varchar(256) DEFAULT '0',
  `uploaded_on` date DEFAULT current_timestamp(),
  `rate` int(11) NOT NULL DEFAULT 5,
  `numer_seller` int(11) NOT NULL,
  `quantity_of_devices` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_images`, `product_category`, `short_description`, `full_description`, `product_colors`, `product_price`, `discount`, `uploaded_on`, `rate`, `numer_seller`, `quantity_of_devices`) VALUES
(5, 'Laptop', 'product01.png,product03.png,product06.png,product08.png,', 'Laptops', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'red,blue', '675', '500', '2022-10-26', 2, 28, 597),
(6, 'Headphone', 'product02.png,product05.png,', 'Accessories', 'short', 'full', 'black,blue', '25', '', '2022-10-26', 5, 2, 18),
(7, 'Camera ', 'product09.png,shop02.png,', 'Cameras', 'short', 'full', 'white', '50', NULL, '2022-11-21', 3, 8, 2),
(9, 'Phone', 'product07.png,', 'Smartphones', 'short', 'full', 'Blue', '250', NULL, '2022-11-21', 5, 5, 5),
(12, 'New Headphone', 'image 2.jpg,image 1.jpg,', 'Accessories', 'test', 'test', 'Blue,Green', '100', '', '2022-12-23', 5, 0, 50),
(14, 'lap', 'shop01.png,', 'Laptops', 'test', 'test', 'red', '500', '', '2022-12-25', 5, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `review` text NOT NULL,
  `time_uploade` date DEFAULT current_timestamp(),
  `point` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_user`, `id_product`, `rate`, `name`, `email`, `review`, `time_uploade`, `point`) VALUES
(14, 2, 5, 3, 'mohamd', 'test@gmail.com', 'test2', '2022-12-02', 1),
(15, 2, 7, 4, 'Mohamad', 'test@gmail.com', 'test4', '2022-12-02', 1),
(18, 3, 5, 1, 'Ali', 'ali@gamail.com', 'test2', '2023-01-01', 1),
(19, 3, 7, 2, 'Ali', 'ali@gamail.com', 'test5', '2022-12-02', 1),
(23, 3, 6, 4, 'Ali', 'ali@gamail.com', 'test4', '2023-01-01', 0),
(24, 4, 6, 1, 'Ahmad', 'ahamd@gmail.com', 'test3', '2022-12-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` char(10) NOT NULL,
  `re_password` char(10) NOT NULL,
  `city` varchar(256) NOT NULL,
  `area` varchar(256) NOT NULL,
  `phone` char(10) NOT NULL,
  `point` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `re_password`, `city`, `area`, `phone`, `point`) VALUES
(2, 'moahamd', 'alanjjar', 'mohamad2000', 'test@gmail.com', '1234567890', '1234567890', 'amman', 'amman', '0123456789', 1),
(3, 'Ali', 'ahmad', 'ali99', 'ali@gmail.com', '111', '111', 'amman', 'amman', '12345', 0),
(4, 'Ahmad', 'alnajjar', 'ahmad87', 'ahmad@gmail.com', '123', '123', 'amman', 'amman', '987654', 1),
(6, 'omar', 'ahmad', 'omar97', 'omar@gmail.com', '1234', '1234', 'amman', 'amman', '0000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `product_name` varchar(256) NOT NULL,
  `product_images` varchar(256) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `product_category` varchar(256) NOT NULL,
  `short_description` text NOT NULL,
  `product_colors` varchar(256) NOT NULL,
  `product_price` varchar(256) NOT NULL,
  `discount` varchar(256) NOT NULL,
  `uploaded_on` date DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `point` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`product_name`, `product_images`, `id_user`, `product_category`, `short_description`, `product_colors`, `product_price`, `discount`, `uploaded_on`, `qty`, `id`, `id_product`, `point`) VALUES
('Phone', 'product07.png', 3, 'Smartphones', 'short', 'Blue', '250', '0', '2022-11-28', 1, 43, 9, 0),
('Camera ', 'product09.png', 3, 'Cameras', 'short', 'white', '50', '0', '2022-11-30', 1, 51, 7, 0),
('Camera ', 'product09.png', 2, 'Cameras', 'short', 'white', '50', '0', '2022-12-02', 1, 59, 7, 0),
('Camera ', 'product09.png', 4, 'Cameras', 'short', 'white', '50', '0', '2022-12-03', 1, 62, 7, 0),
('Headphone', 'product02.png', 4, 'Accessories', 'short', 'black,blue', '20', '20', '2022-12-03', 1, 63, 6, 0),
('Phone', 'product07.png', 4, 'Smartphones', 'short', 'Blue', '250', '0', '2022-12-03', 1, 64, 9, 0),
('Phone', 'product07.png', 2, 'Smartphones', 'short', 'Blue', '250', '0', '2022-12-04', 1, 69, 9, 0),
('Headphone', 'product02.png', 2, 'Accessories', 'short', 'black,blue', '20', '20', '2022-12-04', 1, 70, 6, 0),
('Headphone', 'image 1.jpg', 3, 'Accessories', 'test', 'Blue,Green', '60', '0', '2023-01-01', 1, 73, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_infromation`
--
ALTER TABLE `admin_infromation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hot_deales`
--
ALTER TABLE `hot_deales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reference_unique` (`phone`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_infromation`
--
ALTER TABLE `admin_infromation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hot_deales`
--
ALTER TABLE `hot_deales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
