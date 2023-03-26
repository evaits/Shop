-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Бер 26 2023 р., 20:14
-- Версія сервера: 10.4.27-MariaDB
-- Версія PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `online_store`
--

-- --------------------------------------------------------

--
-- Структура таблиці `bag`
--

CREATE TABLE `bag` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `bag`
--

INSERT INTO `bag` (`id`, `user_id`, `product_id`, `amount`) VALUES
(143, 9, 1, NULL),
(144, 9, 4, NULL),
(145, 9, 5, NULL),
(146, 9, 6, NULL),
(147, 9, 2, NULL),
(148, 9, 2, NULL),
(149, 9, 4, NULL),
(150, 9, 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `shortInfo` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `midleInfo` varchar(400) DEFAULT NULL,
  `info` varchar(2000) NOT NULL,
  `img` varchar(100) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `name`, `shortInfo`, `price`, `midleInfo`, `info`, `img`, `type`) VALUES
(1, 'Apple Watch', 'Series 5 SE', 529.99, 'The Apple Watch Series 5 SE is a more affordable version of the Apple Watch Series 5. It features a 30% larger display than the Series 3, with an always-on Retina display that makes it easy to see the time and other information at a glance. ', 'Apple Watch SE is delivered in a cardboard package, inside which there are a couple of boxes. One of them contains the watch itself, some documentation and instructions, as well as a charging cable with a USB Type-C connector on one side and a round magnetic wireless charger on the other. In the second box there is a strap. Our test sample was equipped with a traditional \"silicone\" (in fact, it is made of fluoroplastic) with a metal clasp. There are three elements in the box: one standard half of the strap with an eye and a metal clasp, as well as two halves with holes that have different lengths: S/M and M/L. Thus, each user will be able to choose a suitable strap length. It seems like a trifle, but a pleasant one.', 'https://i.postimg.cc/Fzf8Kzt9/apple-watch.png', 'small'),
(2, 'Macbook Pro 16”', 'Silver - M1 Pro', 3249.99, 'The MacBook Pro 16\" Silver - M1 Pro is Apple\'s latest high-end laptop, powered by the M1 Pro chip. It features a stunning 16-inch Retina display with True Tone technology, which adjusts the color temperature of the screen to match the ambient lighting for a more natural viewing experience. The M1 Pro chip delivers exceptional performance, with up to 10 CPU cores and up to 16 GPU cores, making it g', 'The 16-inch MacBook Pro with custom Apple Silicon is the most powerful portable Mac ever introduced by Apple. It houses the M2 Pro or M2 Max processor, multiple ports, ProMotion with mini-LED backlight, and a notched display. The return to a variety of ports, no Touch Bar, and a thicker case show that Apple has listened to its customer`s complaints about the pro laptop line. Thanks to the new processors and display upgrades, Apple`s MacBook Pros are more powerful and versatile than ever.', 'https://i.postimg.cc/1RW0ySrj/mac.png', 'big'),
(3, 'Apple MacBook Air Retina 13\"', 'Space gray - M1 8-core', 1086.99, 'The Apple MacBook Air Retina 13\" is a sleek and lightweight laptop that is designed for portability and ease of use. It features a stunning 13.3-inch Retina display with True Tone technology, which adjusts the color temperature of the screen to match the ambient lighting for a more natural viewing experience.', 'The thinnest and lightest of our notebooks has been completely transformed by the Apple M1 chip. It has up to 3.5x faster CPU. Up to 5x faster GPU. Our most advanced Neural Engine for up to 9x faster self-learning. The most powerful battery in MacBook Air history. And a noiseless design without a fan. There has never been so much ultra-portable power. Using self-learning (ML) technology, apps automatically retouch photos at a professional level, increase the accuracy of auto-detection in smart tools - such as sound filters and magic wands - and do a whole lot of other amazing things. It`s more than intelligence. It`s the combined power of the entire stack of intelligent ML technologies. Designed to unleash the full potential of the M1 chip, macOS Big Sur dramatically enhances Mac performance and transforms it in many other ways. Offers useful app updates. Beautiful new design. Industry-leading privacy features and best-in-class security. Our most powerful software now runs on the most advanced hardware we`ve ever made.', 'https://i.postimg.cc/1zG17cFw/macbook-Air-space-grey.png', 'big'),
(4, 'Iphone 11', 'Red - 64GB', 634.99, 'The iPhone 11 is a popular smartphone released by Apple in 2019. It features a 6.1-inch Liquid Retina display with True Tone technology, which adjusts the color temperature of the screen to match the ambient lighting for a more natural viewing experience.', 'The iPhone 11 Red is a popular smartphone model produced by Apple Inc. It was first released in September 2019 as part of the iPhone 11 series. The iPhone 11 Red features a 6.1-inch Liquid Retina display with a resolution of 828 x 1792 pixels, which provides sharp and vivid visuals. It runs on the A13 Bionic chip, which delivers fast and smooth performance, making it great for multitasking, gaming, and other demanding applications. One of the standout features of the iPhone 11 Red is its camera system. It has a dual-camera setup on the back, consisting of a 12-megapixel wide-angle lens and a 12-megapixel ultra-wide lens, which allows users to capture high-quality photos and videos. It also has a 12-megapixel front-facing camera that supports features such as portrait mode, slow-motion video, and 4K video recording. The iPhone 11 Red is available in 64GB, 128GB, and 256GB storage options and comes with a long-lasting battery that can provide up to 17 hours of video playback. It also supports fast charging and wireless charging, making it convenient to charge on the go.', 'https://i.postimg.cc/mkQdB8by/Image.png', 'small'),
(5, 'Iphone 13 Pro', 'Grey - 256GB', 1099.99, 'The iPhone 13 Pro is the latest high-end smartphone released by Apple in 2021. It features a 6.1-inch Super Retina XDR display with ProMotion technology, which offers a high refresh rate of up to 120Hz for smoother scrolling and animations. ', 'The iPhone 13 Pro is a high-end smartphone from Apple that was released in September 2021. The device comes in four color options, including graphite (grey), gold, silver, and sierra blue.The graphite color option for the iPhone 13 Pro is a sleek, dark grey color that gives the device a professional and sophisticated look. The finish is a matte texture that feels smooth to the touch, and it is made from a durable stainless steel frame with a precision-crafted back glass.In terms of technical specifications, the iPhone 13 Pro has a 6.1-inch Super Retina XDR display, a powerful A15 Bionic chip, and a triple-camera system that includes a 12-megapixel ultra-wide, wide, and telephoto lens. It also has advanced features like ProRes video recording, Night mode, and ProRAW.', 'https://i.postimg.cc/RZ0MG1kN/macbook-Air-space-grey.png', 'small'),
(6, 'Iphone 14 Plus', 'Blue - 128GB', 1203.99, 'The iPhone 14 is equipped with the same A15 Bionic chip that was used in the iPhone 13 Pro . This chip powers all iPhone functions and makes games and apps run smoothly. All this fun will last a long time thanks to the increased thermal efficiency of the iPhone\'s internal design.', 'Choose a smartphone that impresses with long battery life, phenomenal and sharp display image and fast and smooth operation of all applications - put on the advanced Apple iPhone 14 Plus model. Thanks to it, using the phone will be even more convenient and intuitive. Make the movies you watch on your phone as delightful as when you play them on the TV screen. The Apple iPhone 14 Plus smartphone equipped with a 6.7-inch Super Retina XDR OLED display1 will allow you to enjoy a phenomenal image even when traveling by bus. It provides a perfect black and white balance and realistic reproduction of other colors. In addition, the True Tone function ensures optimal color matching with lighting, which prevents eye strain. Forget about carrying an ordinary digital camera with you - the presented smartphone will fully replace it! All thanks to the use of an advanced camera system in the device - it consists of a main lens with a resolution of 12 Mpix and an ultra-wide-angle lens with a field of view of 120 °. Modern technologies allow you to take beautiful, expressive photos also in low light, so you can successfully take photos at night parties or inside cathedrals visited on vacation.', 'https://i.postimg.cc/V6mRnVbr/iphone14pro.png', 'small'),
(7, 'SAMSUNG Galaxy S21', 'Lilac Purple - 128GB', 819.99, 'The Samsung Galaxy S21 is a high-end smartphone released in 2021. It features a 6.2-inch Dynamic AMOLED 2X display with a resolution of 1080 x 2400 pixels. The phone is powered by the Qualcomm Snapdragon 888 or Samsung Exynos 2100 chipset, depending on the region. It has a triple-camera setup, including a 12-megapixel ultra-wide, wide, and telephoto lens, and can shoot up to 8K video. It also feat', 'The Samsung Galaxy S21+ is a smartphone that was announced by Samsung in January 2021 and released shortly thereafter. It features a 6.7-inch Dynamic AMOLED 2X display with a resolution of 2400 x 1080 pixels and a high refresh rate of 120Hz. It is powered by the Exynos 2100 or Snapdragon 888 chipset, depending on the region, and comes with 8GB of RAM and 128GB of internal storage, which is non-expandable. The phone features a triple-camera setup on the rear, with a 12-megapixel primary sensor, a 12-megapixel ultra-wide sensor, and a 64-megapixel telephoto sensor with 3x hybrid zoom. The front-facing camera is a 10-megapixel sensor that can capture 4K video. Other features of the Samsung Galaxy S21+ include 5G connectivity, Wi-Fi 6E, Bluetooth 5.2, NFC, GPS, and an IP68 rating for dust and water resistance. It also comes with a 4,800mAh battery that supports fast charging, wireless charging, and reverse wireless charging.', 'https://i.postimg.cc/fbkqJ5qQ/Product-Image.png', 'small');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `pass`) VALUES
(8, 'denys', 'lol@gmail.com', '123123'),
(9, 'evait', 'lol@gmail.com', '123123');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `bag`
--
ALTER TABLE `bag`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
