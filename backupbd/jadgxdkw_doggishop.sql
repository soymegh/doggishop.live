-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2025 at 05:18 PM
-- Server version: 10.6.21-MariaDB-cll-lve-log
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadgxdkw_doggishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `warrant` varchar(64) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `bill_date` datetime NOT NULL,
  `payment_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `name`, `phone`, `warrant`, `subtotal`, `total`, `bill_date`, `payment_type_id`, `user_id`) VALUES
(1, 'juan', '77119343', '001131065f', 189, 217, '2024-11-03 21:50:51', 1, 11),
(2, 'Test Guest', '85584554', '0010203021010U', 100, 115, '2024-11-03 22:03:50', 1, 3),
(3, 'Test Guest', '85584554', '0010203021010U', 31, 35, '2024-11-03 22:05:10', 1, 3),
(4, 'Test Guest', '85584554', '0010203021010U', 74, 85, '2024-11-03 22:10:38', 1, 3),
(5, 'Test Guest', '83767090', '001-090802-1033C', 274, 315, '2024-11-05 23:24:01', 1, 3),
(6, 'marvingonzales', '77725579', '00123243h', 252, 289, '2024-11-06 03:12:02', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `product_id`, `amount`, `price`, `subtotal`) VALUES
(1, 1, 1, 1, 251.54, 251.54),
(2, 2, 2, 1, 22.03, 22.03),
(3, 2, 18, 1, 111.18, 111.18),
(4, 3, 12, 1, 40.97, 40.97),
(5, 4, 16, 1, 14.07, 14.07),
(6, 4, 14, 1, 39.89, 39.89),
(7, 4, 13, 2, 22.26, 44.52),
(8, 5, 1, 1, 251.54, 251.54),
(9, 5, 2, 1, 22.03, 22.03),
(10, 6, 1, 1, 251.54, 251.54);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Abriendo eventos proximamente...', 'planes-futuro', 'Esta siendo hablado el tener eventos a futuro donde varias  mascotitas pueden socializar  :3', 1, '2024-08-23 01:22:13', '2024-08-24 07:57:32'),
(6, 'Productos para aves agregados :D', 'nuevos-para-aves', 'Proveedores para articulos de aves asegurados :0\r\n\r\nSi hace falta algún producto háganos saber :D', 1, '2024-08-23 01:22:13', '2024-08-24 07:56:15'),
(7, 'Las aves son populares??', 'aves', 'Nos han escrito a redes sociales que muchos tienen aves como mascotas, pidiendo que los incluyamos\r\n\r\nEn corto nos encargamos :)', 1, '2024-08-23 01:22:13', '2024-08-24 07:50:51'),
(8, 'Conseguimos proveedores para objetos de reptiles', 'solucion-reptiles', 'Hemos encontrado un par de proveedores que incluyen a nuestros amiguitos reptilianos :D!!', 1, '2024-08-23 01:22:13', '2024-08-24 07:49:15'),
(9, 'Proveedores', 'proveedores', 'Seguimos en búsqueda de proveedores que tengan artículos para reptiles domésticos si tiene una preferencia :0', 1, '2024-08-23 01:22:13', '2024-08-24 07:47:35'),
(10, 'Buenos días :D !!!!!', 'welcome', 'Bienvenidos a nuestra nueva tienda en linea!!\r\n\r\nSi tiene comentarios siéntase libre de hacérnoslo saber', 1, '2024-08-23 01:22:13', '2024-08-24 07:46:27'),
(12, 'Evento NAVIDAD', 'test', 'Evento NAVIDAD', 1, '2024-11-06 08:17:41', '2024-11-06 08:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `img_url`, `created_at`, `updated_at`) VALUES
(1, 'Comida seca', 'Pellet de comida, marcas y mascota objetivo varían', '1.avif', '2024-08-22 21:22:13', '2024-08-23 20:10:16'),
(2, 'Comida húmeda', 'Variaciones de comida húmeda para mascotas, mayoritariamente', '2.png', '2024-08-22 21:22:13', '2024-09-06 06:16:43'),
(3, 'Comida viva', 'Comida para animales exoticos', '3.webp', '2024-08-22 21:22:13', '2024-08-23 20:26:46'),
(4, 'Juguetes', 'Artículos para el entretenimiento de su mascota', '4.jpg', '2024-08-22 21:22:13', '2024-08-23 20:29:15'),
(5, 'Habitats', 'Tanques, Acuarios y Jaulas', '5.jpg', '2024-08-22 21:22:13', '2024-08-23 20:52:18'),
(6, 'Collares', 'Collares para reconocimiento de mascotas grandes', '6.webp', '2024-08-22 21:22:13', '2024-08-23 20:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Boaco'),
(2, 'Carazo'),
(3, 'Chinandega'),
(4, 'Chontales'),
(5, 'Estelí'),
(6, 'Jinotega'),
(7, 'León'),
(8, 'Madriz'),
(9, 'Managua'),
(10, 'Masaya'),
(11, 'Matagalpa'),
(12, 'Nueva Segovia'),
(13, 'Rivas'),
(14, 'Río San Juan');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `discount` decimal(5,2) NOT NULL,
  `pets` tinyint(1) NOT NULL DEFAULT 0,
  `products` tinyint(1) NOT NULL DEFAULT 0,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `description`, `discount`, `pets`, `products`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dia del padre', 'test', 15.00, 1, 1, '2024-09-01 04:00:00', '2024-09-02 03:59:59', 1, '2024-09-02 00:05:34', '2024-09-02 00:05:34'),
(2, 'Descuento por un dia', 'solo por ahorita', 25.00, 1, 1, '2024-09-05 04:00:00', '2024-09-07 03:59:59', 1, '2024-09-06 06:12:38', '2024-09-06 06:13:18'),
(3, 'Independencia', '14 de seto', 20.00, 1, 1, '2024-09-15 04:00:00', '2024-09-17 03:59:59', 1, '2024-09-16 00:58:21', '2024-09-16 00:58:21'),
(4, 'Halloweeen', '31 de octubre, noche de brujas, dia de los muertos', 25.00, 0, 1, '2024-10-28 04:00:00', '2024-11-04 04:59:59', 1, '2024-10-30 22:47:55', '2024-10-30 22:47:55'),
(5, 'Dia de navidad', 'Dia de navidad', 15.00, 0, 1, '2024-11-05 05:00:00', '2024-11-07 04:59:59', 1, '2024-11-06 08:17:02', '2024-11-06 08:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_event` varchar(255) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `pet_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `image_event`, `start_date`, `end_date`, `pet_type_id`, `created_at`, `updated_at`) VALUES
(1, 'Dia del padre', 'Dia del padre', '1.png', '2024-09-01 00:00:00', '2024-09-06 00:00:00', NULL, '2024-09-06 06:17:58', '2024-09-06 06:17:58'),
(2, 'Evento Navidad', 'Evento Navidad', '2.webp', '2024-11-05 00:00:00', '2024-11-06 00:00:00', NULL, '2024-11-06 08:18:23', '2024-11-06 08:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaries`
--

CREATE TABLE `inventaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventaries`
--

INSERT INTO `inventaries` (`id`, `date`, `product_id`, `quantity`, `price`, `description`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2024-11-03', 1, 100, 20.00, 'Entrada', 1, 1, '2024-11-04 02:48:48', '2024-11-04 02:48:48'),
(2, '2024-11-03', 2, 20, 50.00, 'Entrada', 1, 1, '2024-11-04 02:49:07', '2024-11-04 02:49:07'),
(3, '2024-11-03', 3, 20, 30.05, 'Entrada', 1, 1, '2024-11-04 02:49:25', '2024-11-06 03:48:57'),
(4, '2024-11-03', 4, 40, 500.00, 'Entrada', 1, 1, '2024-11-04 02:49:43', '2024-11-04 02:49:43'),
(5, '2024-11-03', 5, 600, 2300.00, 'Entrada', 1, 1, '2024-11-04 02:50:22', '2024-11-04 02:50:22'),
(6, '2024-11-03', 6, 150, 60.00, 'Entrada', 1, 1, '2024-11-04 02:50:38', '2024-11-04 02:50:38'),
(7, '2024-11-03', 1, 1, 251.54, 'Contiene todas las vitaminas y minerales que cumplen los más exigentes requerimientos nutricionales, así como una cuidadosa selección de aditivos naturales que potencian el crecimiento y bienestar de tu mascota.', 11, 1, '2024-11-04 02:50:51', '2024-11-04 02:50:51'),
(8, '2024-11-03', 10, 400, 200.00, 'Entrada', 1, 1, '2024-11-04 02:51:01', '2024-11-04 02:51:01'),
(9, '2024-11-03', 11, 500, 200.00, 'Entrada', 1, 1, '2024-11-04 02:52:43', '2024-11-04 02:52:43'),
(10, '2024-11-03', 12, 10, 50.00, 'Entrada', 1, 1, '2024-11-04 02:56:59', '2024-11-04 02:56:59'),
(11, '2024-11-03', 13, 50, 40.00, 'Entrada', 1, 1, '2024-11-04 02:57:16', '2024-11-04 02:57:16'),
(12, '2024-11-03', 14, 36, 50.00, 'Entrada', 1, 1, '2024-11-04 02:58:08', '2024-11-04 02:58:08'),
(13, '2024-11-03', 15, 120, 80.00, 'Entrada', 1, 1, '2024-11-04 02:58:37', '2024-11-04 02:58:37'),
(14, '2024-11-03', 16, 212, 500.00, 'Entrada', 1, 1, '2024-11-04 03:00:23', '2024-11-04 03:00:23'),
(15, '2024-11-03', 17, 99, 6.06, 'Entrada', 1, 1, '2024-11-04 03:00:50', '2024-11-06 04:57:19'),
(16, '2024-11-03', 18, 266, 65.00, 'Entrada', 1, 1, '2024-11-04 03:01:03', '2024-11-04 03:01:03'),
(17, '2024-11-03', 2, 1, 22.03, 'Jaula de pantalla de reptiles ideal para: camaleones, geckos crestados, anoles y geckos diurnos.', 3, 1, '2024-11-04 03:03:50', '2024-11-04 03:03:50'),
(18, '2024-11-03', 18, 1, 111.18, 'El pienso para gatos Light Weight Care es una comida que controlará el aumento de peso de tu mascota y evitará problemas asociados con la obesidad.', 3, 1, '2024-11-04 03:03:50', '2024-11-04 03:03:50'),
(19, '2024-11-03', 12, 1, 40.97, 'Raciones de alimento vivo compuestas de tenebrio molitor para alimentar reptiles y anfibios de terrario.', 3, 1, '2024-11-04 03:05:10', '2024-11-04 03:05:10'),
(20, '2024-11-03', 16, 1, 14.07, 'contiene todas las vitaminas y minerales que cumplen los más exigentes requerimientos nutricionales, así como una cuidadosa selección de aditivos naturales que potencian el crecimiento y bienestar de tu mascota.', 3, 1, '2024-11-04 03:10:38', '2024-11-04 03:10:38'),
(21, '2024-11-03', 14, 1, 39.89, 'Previene la formación de cálculos y promueve un pH adecuado en la orina', 3, 1, '2024-11-04 03:10:38', '2024-11-04 03:10:38'),
(22, '2024-11-03', 13, 2, 22.26, 'Reduce los cálculos de estruvita y los problemas del tracto urinario en gatos adultos.', 3, 1, '2024-11-04 03:10:38', '2024-11-04 03:10:38'),
(23, '2024-11-03', 20, 100, 34.90, 'Entrada', 1, 1, '2024-11-04 03:34:52', '2024-11-04 03:34:52'),
(26, '2024-11-05', 1, 1, 251.54, 'Contiene todas las vitaminas y minerales que cumplen los más exigentes requerimientos nutricionales, así como una cuidadosa selección de aditivos naturales que potencian el crecimiento y bienestar de tu mascota.', 3, 1, '2024-11-06 04:24:01', '2024-11-06 04:24:01'),
(27, '2024-11-05', 2, 1, 22.03, 'Jaula de pantalla de reptiles ideal para: camaleones, geckos crestados, anoles y geckos diurnos.', 3, 1, '2024-11-06 04:24:01', '2024-11-06 04:24:01'),
(28, '2024-11-06', 1, 1, 251.54, 'Contiene todas las vitaminas y minerales que cumplen los más exigentes requerimientos nutricionales, así como una cuidadosa selección de aditivos naturales que potencian el crecimiento y bienestar de tu mascota.', 3, 1, '2024-11-06 08:12:02', '2024-11-06 08:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_06_000254_create_categories_table', 1),
(7, '2024_05_06_000338_create_pet_types_table', 1),
(8, '2024_05_06_000340_create_pets_table', 1),
(9, '2024_05_06_000443_create_providers_table', 1),
(10, '2024_05_06_000444_create_products_table', 1),
(11, '2024_05_08_013546_create_blogs_table', 1),
(12, '2024_05_09_145246_create_comments_table', 1),
(13, '2024_05_18_042902_create_inventaries_table', 1),
(14, '2024_08_04_063149_create_sessions_table', 1),
(15, '2024_08_31_191533_create_discounts_table', 1),
(16, '2024_08_31_221612_create_events_table', 1),
(17, '2024_09_02_190539_create_payment_types_table', 1),
(18, '2024_09_02_194756_create_bills_table', 1),
(19, '2024_09_02_195117_create_bill_details_table', 1),
(20, '2024_10_27_232022_create_departments_table', 1),
(21, '2024_10_27_232128_create_municipalities_table', 1),
(22, '2024_10_27_232223_create_shippings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `departments_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `name`, `departments_id`) VALUES
(1, 'Boaco', 1),
(2, 'Camoapa', 1),
(3, 'Santa Lucía', 1),
(4, 'Diriamba', 2),
(5, 'Dolores', 2),
(6, 'Jinotepe', 2),
(7, 'Chinandega', 3),
(8, 'Corinto', 3),
(9, 'El Realejo', 3),
(10, 'Juigalpa', 4),
(11, 'Acoyapa', 4),
(12, 'Comalapa', 4),
(13, 'Estelí', 5),
(14, 'Condega', 5),
(15, 'La Trinidad', 5),
(16, 'Jinotega', 6),
(17, 'San Rafael del Norte', 6),
(18, 'San Sebastián de Yalí', 6),
(19, 'León', 7),
(20, 'Achuapa', 7),
(21, 'El Jicaral', 7),
(22, 'Somoto', 8),
(23, 'San Juan del Río Coco', 8),
(24, 'Telpaneca', 8),
(25, 'Managua', 9),
(26, 'El Crucero', 9),
(27, 'Mateare', 9),
(28, 'Masaya', 10),
(29, 'Catarina', 10),
(30, 'La Concepción', 10),
(31, 'Matagalpa', 11),
(32, 'San Ramón', 11),
(33, 'Sébaco', 11),
(34, 'Ocotal', 12),
(35, 'Ciudad Antigua', 12),
(36, 'Dipilto', 12),
(37, 'Rivas', 13),
(38, 'Altagracia', 13),
(39, 'Belén', 13),
(40, 'San Carlos', 14),
(41, 'El Almendro', 14),
(42, 'El Castillo', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('poxap68180@adambra.com', '$2y$12$AEtKQ/6Qoc6KbsPwPpmEzOAuBxfJPWn7qAWgQL8gnKHteZODNjQqS', '2024-10-05 04:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `description`) VALUES
(1, 'Por transferencias', 'Pago por transferencia a empresa');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `breed` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `pet_type_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `name`, `breed`, `gender`, `age`, `price`, `img_url`, `pet_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pet-66c773c54e3b8', 'Pastor Alemán', 'H', '3 meses', 195.87, '1.avif', 1, 1, '2024-08-23 01:22:13', '2024-08-24 01:09:04'),
(2, 'pet-66c773c54e9d9', 'Iguana', 'M', '1 año', 219.22, '2.jpg', 4, 1, '2024-08-23 01:22:13', '2024-08-24 01:10:12'),
(3, 'pet-66c773c54ed8a', 'Perico', 'H', '1 año', 949.21, '3.webp', 3, 1, '2024-08-23 01:22:13', '2024-08-24 01:11:26'),
(4, 'pet-66c773c54f124', 'Camaleón', 'M', '4 meses', 185.82, '4.jpg', 4, 1, '2024-08-23 01:22:13', '2024-08-24 01:12:19'),
(5, 'pet-66c773c54f475', 'Bichon maltes', 'H', '3 meses', 809.26, '5.jpg', 1, 1, '2024-08-23 01:22:13', '2024-08-24 01:13:42'),
(6, 'pet-66c773c54f791', 'Naranja Atigrado', 'M', '2 años', 1022.06, '6.webp', 2, 1, '2024-08-23 01:22:13', '2024-08-24 01:15:41'),
(7, 'pet-66c773c54fbc7', 'Cafe Atigrado', 'H', '3 años', 299.54, '7.png', 2, 1, '2024-08-23 01:22:13', '2024-08-24 01:24:38'),
(8, 'pet-66c773c54febb', 'Rottweiler', 'M', '2 meses', 491.96, '8.png', 1, 1, '2024-08-23 01:22:13', '2024-08-24 01:29:12'),
(9, 'pet-66c773c5501df', 'Canario', 'H', '5 meses', 500.80, '9.jpg', 3, 1, '2024-08-23 01:22:13', '2024-08-24 01:30:55'),
(10, 'pet-66c773c550500', 'Serpiente del maiz', 'M', '4 meses', 80.73, '10.jpg', 4, 1, '2024-08-23 01:22:13', '2024-08-24 01:34:19'),
(12, 'pet-66c773c550b6a', 'Poodle', 'H', '1 año', 811.45, '12.webp', 1, 1, '2024-08-23 01:22:13', '2024-08-24 01:35:20'),
(13, 'pet-66c773c550e63', 'Golden Retriever', 'H', '1 mes', 344.66, '13.jpg', 1, 1, '2024-08-23 01:22:13', '2024-08-24 01:37:50'),
(14, 'pet-66c773c5511a3', 'Diamantes mandarín', 'M', '1 año', 611.90, '14.webp', 3, 1, '2024-08-23 01:22:13', '2024-08-24 01:40:21'),
(15, 'pet-66c773c551446', 'Tortuga', 'M', '4 meses', 417.78, '15.jpg', 4, 1, '2024-08-23 01:22:13', '2024-08-24 01:41:21'),
(16, 'pet-66c773c5516ac', 'Esfinje', 'M', '1 año', 703.19, '16.webp', 2, 1, '2024-08-23 01:22:13', '2024-08-24 01:44:50'),
(31, 'pet-671862e3bffbf', 'PITBULL', 'Macho', '2', 2500.00, '31.avif', 1, 1, '2024-10-23 10:43:47', '2024-10-23 10:43:47'),
(32, 'pet-6727f9ecbb76d', 'Chihuahua', 'Hembra', '1 año', 500.00, '32.jpg', 1, 1, '2024-11-04 03:32:12', '2024-11-04 03:32:12'),
(33, 'pet-672aa34872a5e', 'Tortuga de mar marina', 'Macho', '5', 560.00, '33.jpg', 4, 1, '2024-11-06 03:59:20', '2024-11-06 04:00:13'),
(34, 'pet-672adf4616857', 'PITBULL', 'Macho', '2', 2500.00, '34.avif', 1, 1, '2024-11-06 08:15:18', '2024-11-06 08:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `pet_types`
--

CREATE TABLE `pet_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pet_types`
--

INSERT INTO `pet_types` (`id`, `name`, `description`, `img_url`, `created_at`, `updated_at`) VALUES
(1, 'Perro', 'Categoría destinada hacía artículos o mascotas bajo cualquier mascota que involucre un perro', '1.avif', '2024-08-22 21:22:13', '2024-11-06 08:16:02'),
(2, 'Gato', 'Categoría destinada hacía artículos o mascotas bajo cualquier mascota que involucre un gato', '2.jpg', '2024-08-22 21:22:13', '2024-08-23 19:06:44'),
(3, 'Pájaro', 'Categoría destinada hacía artículos o mascotas bajo cualquier mascota que involucre un pájaro', '3.jpg', '2024-08-22 21:22:13', '2024-08-23 19:07:42'),
(4, 'Reptiles', 'Categoría destinada hacía artículos o mascotas bajo cualquier mascota que involucre un reptil', '4.jpg', '2024-08-22 21:22:13', '2024-08-23 19:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `size` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `picture` varchar(255) DEFAULT NULL,
  `pet_type_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `size`, `price`, `stock`, `picture`, `pet_type_id`, `category_id`, `provider_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asgard Cachorro', 'Contiene todas las vitaminas y minerales que cumplen los más exigentes requerimientos nutricionales, así como una cuidadosa selección de aditivos naturales que potencian el crecimiento y bienestar de tu mascota.', '4 Kg', 251.54, 76, '1.png', 1, 1, 3, 1, '2024-08-23 01:22:13', '2024-11-06 08:14:00'),
(2, 'Habitat para iguanas', 'Jaula de pantalla de reptiles ideal para: camaleones, geckos crestados, anoles y geckos diurnos.', 'SMALL: 18” x 12” x 20”', 22.03, 51, '2.jpg', 4, 5, 2, 1, '2024-08-23 01:22:13', '2024-08-24 06:33:19'),
(3, 'Semillas para pericos', 'Mezclas de semillas y piensos especialmente formulados para periquitos, que proporcionan todos los nutrientes esenciales', '3 Kg', 30.05, 20, '3.jpg', 3, 1, 1, 1, '2024-08-23 01:22:13', '2024-08-24 06:39:17'),
(4, 'Tunel para gatos | Cuatro entradas', 'Este túnel para gatos con 4 entradas es plegable, ideal para el entretenimiento de hurones y conejos también.', '84 cm x 25 cm x 25 cm', 50.59, 78, '4.webp', 2, 4, 4, 1, '2024-08-23 01:22:13', '2024-08-24 06:38:27'),
(5, 'Pipas para Loros', 'Alimento 100% natural. Pipa de girasol de pequeño tamaño, gran calidad y color atractivo para aves psitácidas (loros cotorras, ninfas, agapornis...)', '1,5 Kg', 9.81, 76, '5.jpg', 3, 1, 2, 1, '2024-08-23 01:22:13', '2024-08-24 06:41:55'),
(6, 'Pesa Mordedor Flotante', 'Juguete flotante en forma de pesa para perros, permite esconder snacks y entretener al animal mientras los busca, ideal para jugar en el agua,', 'N/A', 15.84, 39, '6.jpg', 1, 4, 5, 1, '2024-08-23 01:22:13', '2024-08-24 06:48:24'),
(10, 'Comida Húmeda para Perro con Venado y Reno', 'Contribuye a la buena salud y el bienestar de tu perro, sin cereales, patatas, aditivos, ni conservantes.', 'Paquete de 6', 50.14, 46, '10.webp', 1, 2, 1, 1, '2024-08-23 01:22:13', '2024-08-24 06:57:03'),
(11, 'Comida Húmeda para Gatos Pavo Y Salmón. Carnivore.', 'Comida húmeda para gatos adultos, elaborada con carne de pavo y salmón, ricos en proteínas altamente digeribles.', '12 x 100gr', 935.40, 94, '11.webp', 2, 2, 5, 1, '2024-08-23 01:22:13', '2024-08-24 06:58:49'),
(12, 'Gusano de la harina', 'Raciones de alimento vivo compuestas de tenebrio molitor para alimentar reptiles y anfibios de terrario.', '1 Kg', 40.97, 20, '12.jpg', 4, 3, 1, 1, '2024-08-23 01:22:13', '2024-08-24 07:03:38'),
(13, 'Comida húmeda para Gatos. Farmina', 'Reduce los cálculos de estruvita y los problemas del tracto urinario en gatos adultos.', '24 x 80gr', 22.26, 78, '13.webp', 3, 2, 4, 1, '2024-08-23 01:22:13', '2024-08-24 07:07:16'),
(14, 'Pienso para Gatos Esterilizados Con Carpa y Trucha. Carnivore', 'Previene la formación de cálculos y promueve un pH adecuado en la orina', '6 Kg', 39.89, 62, '14.webp', 2, 1, 4, 1, '2024-08-23 01:22:13', '2024-08-24 07:10:33'),
(15, 'Wellness Core Pollo y Pavo Lata para cachorros', 'Esta ración húmeda de Wellness Core Puppy Original es una lata de pavo y pollo especial para los pequeños peludos de la casa.', '6 x 400 gr', 18.88, 4, '15.webp', 1, 2, 1, 1, '2024-08-23 01:22:13', '2024-08-24 07:13:04'),
(16, 'Asgard Cachorros', 'contiene todas las vitaminas y minerales que cumplen los más exigentes requerimientos nutricionales, así como una cuidadosa selección de aditivos naturales que potencian el crecimiento y bienestar de tu mascota.', '2 Kg', 14.07, 98, '16.png', 3, 1, 3, 1, '2024-08-23 01:22:13', '2024-08-24 07:15:51'),
(17, 'Hueso Cuerda de 2 Nudos con Pelota de Tenis', NULL, '35 cm', 6.06, 99, '17.webp', 1, 4, 2, 1, '2024-08-23 01:22:13', '2024-11-06 04:57:38'),
(18, 'Royal Canin Adult Light Weight Care pienso para gatos', 'El pienso para gatos Light Weight Care es una comida que controlará el aumento de peso de tu mascota y evitará problemas asociados con la obesidad.', '7 Kg', 111.18, 18, '18.jpg', 2, 1, 2, 1, '2024-08-23 01:22:13', '2024-08-24 07:19:46'),
(19, 'Comida para Canarios Natural con Avena', 'Alimento completo para fringílidos. Ideal para su alimentación en todas las épocas del año, a base de alpiste, nabina, negrillo, avena pelada, linaza, paniset, cañamón, rábano, cereal, vitaroma', '5 Kg', 30.40, 87, '19.jpg', 3, 1, 4, 1, '2024-08-23 01:22:13', '2024-08-24 07:21:21'),
(20, 'Peluche para perros', 'Amigo felpudo para tu amigo peludo', '1 pieza', 34.90, 100, '20.jpg', 1, 4, 2, 1, '2024-11-04 03:34:52', '2024-11-04 03:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `attendant` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `attendant`, `email`, `phone`, `website`, `img_url`, `created_at`, `updated_at`) VALUES
(1, 'Reino DM', 'Rosario Mendoza', 'rmendoza@reindm.com', '555 2658 1257', 'https://www.reinodm.com.ar/', '1.webp', '2024-08-22 21:22:13', '2024-08-23 22:03:37'),
(2, 'Gloria Pets', 'Dayton O\'Kon', 'dokon@hotmail.com', '1-757-548-9520', 'https://gloriapets.com/', '2.png', '2024-08-22 21:22:13', '2024-08-23 22:05:03'),
(3, 'LionBrand.', 'Kali Howe', 'khowe@hotmail.com', '(517) 944-0460', 'https://lionbrand.com.ni/aliados/', '3.png', '2024-08-22 21:22:13', '2024-08-23 22:06:18'),
(4, 'PetStar', 'Fermin Denesik', 'fdenesik@hotmail.com', '(636) 741-6683', 'https://petproducts.com.cn/es/', '4.webp', '2024-08-22 21:22:13', '2024-08-23 22:07:47'),
(5, 'Animal Max', 'Aurore Bauch', 'abauch@yahoo.com', '785.627.5873', 'https://www.animalmax.es/', '5.png', '2024-08-22 21:22:13', '2024-08-23 22:09:00'),
(6, 'Purina', 'Reina Maria Fernandez', 'rmfernandez@purina.org.ni', '+505 6858455', NULL, '6.png', '2024-11-04 03:40:47', '2024-11-04 03:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('42750zGeiPy1bN6dzdGXTPRH2AJwdBqeOCjdApqu', NULL, '52.12.121.61', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSk5sVFdnYnNETTAyR01xQzZnU0dpaWhqaXRjZUFBM0NQWUpFRUV6TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742047444),
('5tuSgcsyq4NdDRCbLTjNSTDqsCKxZ21UWJQt9Kry', NULL, '47.82.10.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1R0Q2NpcHJZV0NtNG9XVTFVNkx3MlcxWDBiZVZjcG1BUGhWbkZDaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742158179),
('6LIHCOSDpuo57c8YJy2yneyJc3YUns9mABuu7qUL', NULL, '43.135.144.126', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0FsYWdqeE9GRkhsVUxocTI1akR3SzJOb0tUOU9SN2FWaGlLUHRUciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742151472),
('8sw0gadMlHjqjfwBwxR1t47WIyZm6SPdtGlCT9Nm', NULL, '170.106.180.246', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2tEYVBCajZUYjFVMnJYdDhETEZHMFpTVDE0dEZyWWtTbXJ5a1BoUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742045324),
('95wKrZThpCy2LrfUSjCzInD89gJbyT0SvkuT0kxe', NULL, '49.51.183.220', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3dMdXVoSTNNOFdkb1E2Y3IyN0dFS0c0MFhzd0hMVGNJQWJEV2hWQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742060246),
('9UeDBhab1l1OTQVQwqCgRDZJtnNMgHmKGLYmDqno', NULL, '185.191.171.15', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkVid04wS2dYQkNTd0l5SWxaVUhTZnJ6Y2hLaVlsbFhIRXJsWGJzTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhLzYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742111196),
('AfpcyZjNiG8RXE3M7An2ts9PvYQjsFldkqcEQTSo', NULL, '51.222.253.5', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWnR6akVYdjdHS3M5Z3hRRG5ndVFHS1ljM3pqZzU4bDdOeWZFeFE2byI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cHM6Ly9kb2dnaXNob3AubGl2ZS9ibG9ncy8yIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvYmxvZ3MvMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742057681),
('ao4Ra1w9MnMrgQevhgQmlEYNQLvsTIh9zoaX0M7K', NULL, '43.157.22.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2EwME9PU0pUTWxZN08wSTlkWTl3S3Z3YThqMDUzYWR0b0Jod1dXZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvbWFzY290YXM/cGFnZT0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742064458),
('AssDZZAJ4dbphaJXsFlUAZ8RtLxysDELDdZw8tHt', NULL, '150.109.230.210', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiak5FckVMaUZITUxEQkF4eXVPZ2pUalZodndtTVVhd2I5OG5KNkZIbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742112156),
('CGNsbpYUVusxocVS6OejabsJbkQYyBi5FRwbFV4R', NULL, '93.158.91.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUhKa3VxZm5VWWRYdzJJbEV0Z1JsSkhjREx0ZE9WbHN1aXBJREdUdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742113505),
('chMbz2BDHCnj82hadFZHh8dU3BCMkbuuI5OMio30', NULL, '66.249.66.200', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.6943.141 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMTd4S0ZUZU5JdGY3YlFJaXN6N3FvSmNuYXRmcDNPbW1SNXpSTVVLUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhLzYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742149691),
('Cicxm6yt5kTL0rsRya6KxZxljvlXbOSMhBfwa976', NULL, '47.82.11.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmdMQWZMZzZXb1FFSk5qUnZtY3R3Q1NxdUFXcTBtUG9aN21Qa0M5ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhLzYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742109859),
('D5cw8AtovHTajsQj3Jnm8nzjyrTSrFNcpQQ5G9Ax', NULL, '43.135.182.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDliY3pycmdFTllhQ2VWSDYxMTN4Vko1bjRWNXZvd3hTb2NDMm9GRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvbWFzY290YXM/cGFnZT0zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742063325),
('DJ6pWxDNA5jt7CP3o4BQezWyPqvfTnIwaW0KnILm', NULL, '156.59.172.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1ZDZUNIdlFzRE9ZQlUxRFV0eTR6NDY1SVVaclphS0xXUHNqWnpaaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742100885),
('EuXZRNeFJqPMj7H2IfhwEJAcsU2OwbFLnvFHT5l2', NULL, '185.191.171.13', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidEtCZlB0T1F4dGV3M3J1ellmWmppNUVzcGgzWmR5NFl1VGJ1ZEZEbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY29udGFjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742060060),
('ezcSkHenVr3G4PWhTk81Qbs8xVpJ1xYbg0hzB9Mb', NULL, '182.42.105.85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTURJTTRoRlhaSHUxdVFGbjhPNWc1NWNHUWNxQktISHRHZks2YzQxWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742165076),
('gTBjFLa1mOUg687I5SIEFFkWGML662fAcue3H9LW', NULL, '43.166.132.142', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWpUYmlCNnV2VUFoYzNTRFRNdThnY0ppc1Z5aG1tUEpQS0FGeWpLTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvbWFzY290YXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742058442),
('HHlBDTumxdBRxPQzSJY8lcVXRmSPjq1ZGQoUQLRl', NULL, '47.82.11.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMklFMDV4NTR1bkxTcXFBY08xVzdYdXlrVnZabDd5aGxrOFpON1N4NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvcGFzc3dvcmQvcmVzZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742153586),
('HOm9ycWPE5z9Qv9TUumLg0Wo9SXpx3kr68FIvTYt', NULL, '43.166.245.120', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTZCNXBWSGtaY01BWnRpVTY1RWY1azRJR0dKcnBXcnhhNWtKUEZ6bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742093341),
('IJqfaSEKrLrmBl56r8Jj6RWCWlkxNRGOPtorzYRt', NULL, '35.88.35.195', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDNaZDZsdGptUFh4RHdId3VSQTliRm1SMlZJZ25yU2dZaXhQaEFmSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742130623),
('jY69RPTbp0jRF6Prt6vhnRgA8bP2Zpkt3Me8921j', NULL, '170.106.140.110', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUFyRDJEUE9MTU1uTjBveVRpRldNam43ZFVDVnVxWVJkM25rR1d0NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742066444),
('KeoSXxzuHDo3ZbLyL6CQje8tRgYlKT8TsAeXrWQG', NULL, '198.235.24.153', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjljZXlqZW04SEpNOGVQN01vREd6REE0SmV2eWdneUJuUTQyT0VITSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742068726),
('KLm8U5WNEBODLTezrvWDxqTFzpZ5biybOGpl3XrZ', NULL, '182.44.12.37', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnRhTWhRNU9hNUZZclMxRGdyb2xtd1hKc0d0SHI0WDF0S3JiWW9IWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742057012),
('kO9TFN4cLFeTBM4zcpwuqALVCIMN2rpPgLrjjVwY', NULL, '198.235.24.41', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0h6V3BFd2lXQ1JxTFhVNWU5VFI4SVo0dDZZTzlqcTZ2MWVRa0JlMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742186091),
('lQhUPp4TEU1iXUJqotoRTkXepn8VnHXY7c730dJh', NULL, '47.79.3.237', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWRvbWtySXhhcXVORWNPR2NsZlNMbU9Ec1ZlWXQ4Sk9CME5PRFFwbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742168345),
('mEpDPXqVVvnyppNrhNkPayxPDtF06z2hFOBm7l2N', NULL, '162.62.231.139', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2JMV3B0dmxOTlR5MWNseTRYQ0VBZDhXZ3FqTmJuZ3Z6WXJWd0tvaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhLzMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742095104),
('mIldrsbW8k078868HHPGSiA9INwblCi9VcVnJJec', NULL, '180.110.203.108', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDEza0d6ejhxdWJ4WU9oVmtCZGxBRk9Yb3l6b0d1TWlLTHFQVUpETCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742092523),
('MYFZubAxgdY9QepoPZuhGY5qSFdUOcMh9FHyGDX9', NULL, '51.222.253.9', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFlDRGd2ekhNbXZIUDNsaUdxNXBjd3d4YnhsTTVLMmw2ZnlOaktpQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742120352),
('N71anmLcETfSWXorScJJdYxigaBqE9e0PDVjwVbZ', 129, '80.85.245.5', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNDRrRHdrQ3RqbkVtdVo2VFZ3UVhscVl4VjFMYzVDdEV4UjVVdFdUMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvYmxvZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyOTt9', 1742051389),
('OEJYuhzdJDxD42eDCcabh62d5YyubtDIuYo9BmNd', NULL, '47.82.11.207', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWhOZkozS3JlSDhKRVhIT1hLYWdYeVRWZW00bmxiOFlEMGtKc1Q4byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhLzQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742103187),
('PjL1cCfdMOLDYYi9gECDKoQ7j8CBrLzhs01XFsih', NULL, '49.51.183.75', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGE3dFNZZG9hVUFwTFNMckd5Smc0Yktpbm05T01vTUF4eURoaEFQbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvcGFzc3dvcmQvcmVzZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742097955),
('q2iCgQn4xu77xfdcETFkWyz748mpj3WvwKhLYhB5', NULL, '43.135.182.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRERhcnRUZ1ZUYlpCYktORjNXd1RIN0JtZ1M5SWh2OGRFa1licE5zQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742131561),
('RrwG5vzhwJtNDuDv1ACWPnEbmY5Gs2EwSlz1gxBB', NULL, '42.83.147.54', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)Chrome/74.0.3729.169 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWM0cVBwYzB3SjBVa0MwOEt6SUtrUUZXZkUxVE11OWU1NmtzckZ6bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742758046),
('s97zr5OvoHAB7StEbJXMpjaunkn51OUCF8IhbgO2', NULL, '18.246.212.181', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib05rbFBSakVUckJ3TllWaVhUTURRMlBsN0N2WmRDUThPWTFVNklIRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742100817),
('SGeWo70xXa76pUkpC9h1kk0CTj6PI5cZ0ZLXmpRT', NULL, '43.166.239.145', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickVLcFpqRFMwM2NmUUFDcVRkalg2cTYyYmdTN3NRYktIc0JUd0tkUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742091556),
('ssLf1h8U6TmDafL7UeTNtH8PSn3H8cMDmDQyvSRb', NULL, '51.222.253.16', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibHhUb0RPUk0ySkQ1SzNQQkNsOWtZTXhBTXdxbmZvbHN5alJLcVdxTSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cHM6Ly9kb2dnaXNob3AubGl2ZS9ibG9ncy81Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvYmxvZ3MvNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742087434),
('sZECMnokAx1Q6p6AoslOUCI3WtD4T4FZyOcdmt1x', NULL, '47.79.0.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3BHZlZ4NWtHZnZMcXpZNVJzWHcxZ0g4OHdqZVgxMTVpZmI5VVBrOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhLzMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742165976),
('tk3B36J1ED0J37xLGDmPGQw9omdE2wdCXhzeHxUk', NULL, '165.22.54.109', 'Mozlila/5.0 (Linux; Android 7.0; SM-G892A Bulid/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/60.0.3112.107 Moblie Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTGMzSmV6VE1seWRTTk1wenc1QWJMN1BiN0tld0RRc2tYRkphZ2Z6ZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cHM6Ly9kb2dnaXNob3AubGl2ZS9hZG1pbi9mdW5jdGlvbi5waHAiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyODoiaHR0cHM6Ly9kb2dnaXNob3AubGl2ZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742092695),
('tUD6gErLyDJAdy7Q9duMRoHWmoySMxKF1F750CHR', 130, '88.218.62.29', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYTNjMzQ4cGhwNlU2bEtoRWNhdjVWOFg2UWVWZ3QySmVxSXBWM1NVOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvYmxvZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzMDt9', 1742120983),
('u3aafzVAVGH638hMbOyvZ2WeFhXQg1rpScMoIYZI', NULL, '43.130.91.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWkY3eG1kWVc4bGw1bUgzck5GNTBpeXFkeEM2NXdhT1h5Rm1qWnFNSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvbWFzY290YXM/cGFnZT0yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742062671),
('u9NazQIppgTAJtsQHy7cs0iMy1NZoXMbzqMGn3HG', NULL, '3.140.191.195', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibkJ4WmY4SUtCcTlFV3RlRDdoZ2xWcUVVRjl6SEdWZjhzVDN0czR0OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742066231),
('uK8NYZoIEF3uFAN3lRT7zBpe1qIzM9dC6GyFnp4w', NULL, '2001:4ca0:108:42::7', 'quic-go-HTTP/3', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWlE4SXFPWnkxYXluWmFMOVVERU00aTVTaktKN2hUcnY1UWRJUDE4TCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742067062),
('vcZNvgU1JaFP3sXyjMohJXDyqTNZcQDemBSQ7bMt', NULL, '47.82.11.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNThyS0ZaQjE1R2VvTWE4aGF2Tnp2T1oyaWRaSHlwYU9xQU45Q0dQUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvbWFzY290YXM/cGFnZT0yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742156333),
('vDwQFXmVFIBXq8n6AMGh0W3phm7p7tn5B7CXhEy6', NULL, '190.143.253.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmxkeVJZaWtMT0FVN0M2MXJRUk5kR2ppTFlJbDlKZmdPZjAxYzJobCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742170633),
('VnPxWOpsEcmXwnbOmOJVrXWxmcVO3eJ6TvZxH8sz', NULL, '182.44.12.37', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWwxZml4MWhjVE5ya1FCVEVQWkMwMUVPNW5NUkQ3T0tQUjA4SXdHTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742129104),
('W1aPVsxzTo4klQGjJq9EztYiVQYFNTZk4tLxiCSv', NULL, '186.64.118.90', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 13.3; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWxkQ1NwMGJuc3R0RzA2cmRCVlo3dlEzdGREcVJWMDdJZDVaMmwzMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742074221),
('WoHfTTmM3NDbLn05JECR9vRuk1mKWSBwETBEYstU', NULL, '66.249.66.199', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.6943.141 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieXZzTGtHTDNLa05LUjA3dWpkTXpuVVFYOFEyN3VoaUxvazRuNVdPRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvbWFzY290YXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742176575),
('wqyPSnfCcPjNlMqrTkWLaIAWYV6CaGRfqVrOc3v6', NULL, '49.51.180.2', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFhidVhIOThIeFdmT0lScmlZMTREM2FXNGRzc3U4M1hwNU9iSXBBSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhLzIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742130556),
('WYUVtSPbZukCK2PlZjE8EChVzPJLTyCtLAq0bXks', NULL, '43.130.57.76', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnFWRmZuTGRWclBzRFg2eVhBVXhjakVpUHJ0Vjh6dDlJWEpOa3NmSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742172477),
('xB4HPPK00Z3dqbcocspxruGDP7dc1Gm9OyYJkHrL', NULL, '18.246.229.222', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVNIODB1WGRwcUlZVkp2UEpwTW1KOHpDWWxsbXJmYkpWQ2h1d0dMZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742161152),
('XlmmgiFX5phTGyuYseVqs4KEZx8ippIspJqFRvsR', NULL, '43.159.149.56', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicmRGUG52bWYxN20xZnhwRXM0VnJ0UGJBa3FGUXlMTjhQN25kMEdRZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cHM6Ly9kb2dnaXNob3AubGl2ZS9mYWN0dXJhIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvZmFjdHVyYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742096434),
('Y2r91BIjEY26bvltcRzOngjdGBwQXLqlGfVpVNLB', NULL, '188.126.94.239', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTQ4U1hkdER2SHBrNEJZSHMxOEd3UnFPa1MydVNHR0t0R3dJeVBDTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY29udGFjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742141483),
('Y8Sm4LQz7YtjU6SDIx7r6GUdB8IEDNXcoxWDhTAv', NULL, '54.202.198.139', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclBPZnhJZUF6ZGlITmloMEluYW1ycTFDQWZrVVd1ZnUyRVNYSFh4SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742067984),
('YL0EnhBMhv27MUWCRPxqUlzAXIlNTHVwkiJeYcE4', NULL, '43.130.228.73', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDRybE5WZEE4elBUbmJmV25aYmhLc0p3TXViT25namJEdXMwMlJmSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvY2F0ZWdvcmlhLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742059049),
('Ytj6BkvKA8BPb75T5wovpBk1Qk1sHMuZjO1eTXNi', NULL, '43.159.149.56', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicENjOGlMdlVleTlrQWlObDFVWXhTMklkR09tVll4Tmt5MTM2NmgzVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742096440),
('zLQfxouzJct00F6IF0K6pJuf57oghYUZjSL8K2j5', NULL, '45.55.225.51', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVlUdjdIMDd6NEJzeXN1ZnhselFlbEpPNkMxMDFBRUtiOW1YS0N1NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vZG9nZ2lzaG9wLmxpdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742154391);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_shipping` datetime NOT NULL,
  `address` varchar(256) NOT NULL,
  `municipalities_id` bigint(20) UNSIGNED NOT NULL,
  `departments_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `date_shipping`, `address`, `municipalities_id`, `departments_id`, `user_id`, `bill_id`) VALUES
(1, '2024-11-03 21:50:51', 'test', 25, 9, 11, 1),
(2, '2024-11-03 22:03:50', 'En el bosque de la china', 8, 3, 3, 2),
(3, '2024-11-03 22:05:10', 'Por el arbol', 25, 9, 3, 3),
(4, '2024-11-03 22:10:38', 'Por el centro San Lorenzo', 19, 7, 3, 4),
(5, '2024-11-06 03:12:02', 'Vulcanizacion los trillizos 13C al Sur, 1 y media arriba', 25, 9, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','guest') NOT NULL DEFAULT 'guest',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Admin', 'admin@example.com', '2024-08-22 21:22:12', '$2y$12$TUM/J2O7ijkWGYU0t3.XZeqTRko73nFyYfMr4QrlGg14s6mqUfoiC', 'admin', 'ugr3swclDmdQU3SfJqFLnxH6gu29Da5cGo1nl8F3n6q8kOEeSU6fUnokHC02', '2024-08-22 21:22:12', '2024-08-22 21:22:12'),
(2, 'Test User', 'user@example.com', '2024-08-22 21:22:13', '$2y$12$lC0YGFEw0ifQx.8v0d84e.w0kFnpQJlcUh4QqDD42M5ydtyaR8umG', 'user', 'nQ03WRySc7M8Qkl48T6zCm2bdKhEateJ0sMDS5utRXHbYKrSuhjPY5leW10v', '2024-08-22 21:22:13', '2024-08-22 21:22:13'),
(3, 'Test Guest', 'guest@example.com', '2024-08-22 21:22:13', '$2y$12$AzBjoqadSs2DPS2H0MHLd.uzBOmuh2uCQIBaO0EQu6X5ELYebzA9u', 'guest', 'ooToNZNNf2ryMYQB6HAAAU0DIV0vz3TosIDvuXElsEBlb0gkWAKkklAhGL8H', '2024-08-22 21:22:13', '2024-08-22 21:22:13'),
(5, 'test1', 'poxap68180@adambra.com', NULL, '$2y$12$YLedYf/rfgSb09M0WFiTG.e8sAqpQdvFTaq0RWYidI/EhIbTr/llK', 'guest', NULL, '2024-10-05 03:36:27', '2024-10-05 03:36:27'),
(6, 'eDRSQdyMowRPAr', 'hahnkeidensom29@gmail.com', NULL, '$2y$12$tOc1hCa3u8bAMRAJj6pJNuBsxMWlad.tXiqIVFs7cVMZJccNAD63u', 'guest', NULL, '2024-10-08 13:14:01', '2024-10-08 13:14:01'),
(7, 'ZIptpNLsXm', 'arellashonaih242@gmail.com', NULL, '$2y$12$cIgaumC5rYLpezzE0Zk2w./MYm4NUxpq68kXBga9WIoCCbBIswp86', 'guest', NULL, '2024-10-20 01:13:10', '2024-10-20 01:13:10'),
(8, 'qSqPXaAQTBd', 'ckimberlin918@gmail.com', NULL, '$2y$12$/Eofcy0q2nh0FhDuxOwFaOY7svL/TYVwC.j2RlsmtcoCzkaEhYFsK', 'guest', NULL, '2024-10-24 05:57:03', '2024-10-24 05:57:03'),
(9, 'OGyvzlmo', 'oayalakr@gmail.com', NULL, '$2y$12$5e8XKoCUAUmmrZprbJG6mOqbJwvYyIvuKBeH5oxM1LSkgs2kgjP4q', 'guest', NULL, '2024-10-27 12:11:55', '2024-10-27 12:11:55'),
(10, 'mPinCEaiOBVn', 'ynbxaut43elroqi@yahoo.com', NULL, '$2y$12$5nVjPxrKSvsdJ2lbsZw9ZedkqoTwe1YP01PqiGswfcvVOw55V1mwq', 'guest', NULL, '2024-11-01 12:45:27', '2024-11-01 12:45:27'),
(11, 'juan', 'mg082337@gmail.com', NULL, '$2y$12$.GHRI0kkvWEccOKOUj8zYecztCKSvLPSomG/VfsrOSU7wWXteyXhm', 'guest', NULL, '2024-11-04 02:27:28', '2024-11-04 02:27:28'),
(12, 'rZpOJPyJt', 'qqtwuiaiylthoqo@yahoo.com', NULL, '$2y$12$E0bYRMrEzhvDGoI.f5/exuNbT77RsAc6YVkPhPjl/ttUHd4mtQBEW', 'guest', NULL, '2024-11-07 06:52:03', '2024-11-07 06:52:03'),
(13, 'MUAxYLkRyQQqacg', 'giannonidgra@yahoo.com', NULL, '$2y$12$9v1LKRgps9Hchd1Pue1OmerGuJCxYcnpmnyi7L65O0TbjI8c40GA2', 'guest', NULL, '2024-11-08 15:19:04', '2024-11-08 15:19:04'),
(14, 'MjpUwVFOLsdc', 'iubemljrro@yahoo.com', NULL, '$2y$12$o7t9XUZreCxE/cAzvmLM4eR/SBbcpbYDCQc/XWpWAlfzNnAeAT2v6', 'guest', NULL, '2024-11-09 13:24:55', '2024-11-09 13:24:55'),
(15, 'nlaZPwnHbxLlO', 'hpenningtonja6745@gmail.com', NULL, '$2y$12$39Bmksjb1Yx27knyuBkAAO1f/zuceW9aa04kN5ymwhX.ANi5Rm.ty', 'guest', NULL, '2024-11-10 07:04:05', '2024-11-10 07:04:05'),
(16, 'KvkmIGHaDOZ', 'meioroq468@gmail.com', NULL, '$2y$12$u1MV5JmMi1Hd5sJbQUl.7.7NOvgw6MWrkBsjj8UnBSjanZbN5CiBW', 'guest', NULL, '2024-11-11 01:00:01', '2024-11-11 01:00:01'),
(17, 'XMlsBqhcQocqOf', 'oksto4brwvxs1@yahoo.com', NULL, '$2y$12$2.bLMs2OAQjPjgl.IhkMf.iOpPz3Nlvs715nWRy9y7elP2srOutDy', 'guest', NULL, '2024-11-11 18:49:04', '2024-11-11 18:49:04'),
(18, 'kCIEicTMxmphY', 'lqyhmqzu7cg@yahoo.com', NULL, '$2y$12$VlelffTND/5Is0tnpLvlSOPoFFGEQI8PEIHXvSC.blf3jw7yYhdKO', 'guest', NULL, '2024-11-12 13:26:34', '2024-11-12 13:26:34'),
(19, 'IMmlruzqot', 'pvthlbldbsqw@yahoo.com', NULL, '$2y$12$mOpiJNuGrDy2HlN6uU3TieggFC82Q8E39nrzT9u3n7ZTsNz1HNdNO', 'guest', NULL, '2024-11-13 12:29:05', '2024-11-13 12:29:05'),
(20, 'WBiWORlY', 'axvkuqwqougsdqyea@yahoo.com', NULL, '$2y$12$Xd7IlbLaffHlfRZYZ6hH4ui5SS92cc8twy5lAyu2k5M1jnUDKKEEa', 'guest', NULL, '2024-11-14 09:55:50', '2024-11-14 09:55:50'),
(21, 'BqyjAnaBelyAfm', 'domenicodellamura@yahoo.com', NULL, '$2y$12$QWET7bsxMqvWtuMIlxZVUuBWcqnxoqbF4yLuCBRU1EZLuMITJt1Na', 'guest', NULL, '2024-11-15 07:10:44', '2024-11-15 07:10:44'),
(22, 'JPmyUKksvwmkyH', 'heleneta876@gmail.com', NULL, '$2y$12$IoL/VMdzkTtfRMSreDQrrOcoy5GgLYwDI5gt5jf9mhJiEumQLXS8u', 'guest', NULL, '2024-11-16 05:13:06', '2024-11-16 05:13:06'),
(23, 'PcEAvZoZpGav', 'djoandranealo738@gmail.com', NULL, '$2y$12$Vd.InwxZ4HWXKTENEkZxDOo3I.geUktKaPnnT/A.PjTt4hxlym8MW', 'guest', NULL, '2024-11-17 03:03:46', '2024-11-17 03:03:46'),
(24, 'XGCruNUALNii', 'jcwyxfrrtrsenq@yahoo.com', NULL, '$2y$12$3Zo4HmI8HGicNkMGuuxL1e3tp1/0wMghXgWC72ZpNKmPXrja6Lecu', 'guest', NULL, '2024-11-23 09:39:24', '2024-11-23 09:39:24'),
(25, 'rkZvEbMjFXCzfb', 'lakirichardsonj@gmail.com', NULL, '$2y$12$2daAEzhUErtaFyVQjs9B0evDDG9HCCwiLTjOOMJrQliqGScc.14gC', 'guest', NULL, '2024-11-24 13:02:23', '2024-11-24 13:02:23'),
(26, 'Nfejdekofhofjwdoe jirekdwjfreohogjkerwkrj rekwlrkfekjgoperrkfoek ojeopkfwkferjgiejfwk okfepjfgrihgoiejfklegjroi jeiokferfekfrjgiorjofeko jeoighirhgioejfoekforjgijriogjeo foefojeigjrigklej jkrjfkrejgkrhglrlrk doggishop.live', 'yasen.krasen.13+76737@mail.ru', NULL, '$2y$12$gednmipo7bmni2P6/AW00uimYC2T671i0J0Vmhf4N16gFAsJOWt9.', 'guest', NULL, '2024-11-24 15:27:43', '2024-11-24 15:27:43'),
(27, 'HvoKIfbEr', 'watdjekki5910@gmail.com', NULL, '$2y$12$eyzGbF3IMoeDfL/rQb6PGuM0Oc1jrl8i9ZNut9Du8FQ2Hfuy6oluy', 'guest', NULL, '2024-11-25 09:35:03', '2024-11-25 09:35:03'),
(28, 'CCrjFjYFpbWsI', 'estebater28@gmail.com', NULL, '$2y$12$1k7CMn11CbWhZ.lnyh1wA.z6TTcqq1TieXd8NJaX71GhU6VKxBUCe', 'guest', NULL, '2024-11-26 08:36:45', '2024-11-26 08:36:45'),
(29, 'UJTeeeAROZIQHN', 'pvvxwokdudausyn@yahoo.com', NULL, '$2y$12$YrZIC4w0ezLFgA8urH2zZe.yzAn.3hLtt5eAKDVI7SgcfTYnY3GN.', 'guest', NULL, '2024-11-27 07:00:44', '2024-11-27 07:00:44'),
(30, 'RhyDyrbHnDZ', 'elsdoenglis1923@gmail.com', NULL, '$2y$12$cPnhEglaZxUeds34Xq2YveU3YYVArYSZKtIZaH.C/UixR0nlGkKn6', 'guest', NULL, '2024-11-28 05:59:06', '2024-11-28 05:59:06'),
(31, 'UtproBxlWCZZ', 'djinetdavisa@gmail.com', NULL, '$2y$12$Fqg4vX6SHbzR9HKDckX/r.95.CYlgtX6QIGOy.2fY1EblubyhqlrC', 'guest', NULL, '2024-11-29 01:49:20', '2024-11-29 01:49:20'),
(32, 'UypqNUuhel', 'knuttjecht@yahoo.com', NULL, '$2y$12$OY36o0osg0eZgJZb/Vm1rurzelUgyvOf7ZW.TKrImE0m3Qvyg9c1G', 'guest', NULL, '2024-11-29 21:24:26', '2024-11-29 21:24:26'),
(33, 'irBCIIhFG', 'awwwnnkm8dxvefo@yahoo.com', NULL, '$2y$12$jITfRWT80.MhHgAASX2B1.xQjrpI2xJi2Ra.zIx7cBqrG4fWfFZL6', 'guest', NULL, '2024-11-30 16:03:26', '2024-11-30 16:03:26'),
(34, 'MEIIRYYQFJww', 'areesophonichtonk@yahoo.com', NULL, '$2y$12$Us/yMeeGFvT/JT5EycfFYOnkVfvWkyGiiKC5ro4JaE2uCi3usQrXW', 'guest', NULL, '2024-12-01 10:22:10', '2024-12-01 10:22:10'),
(35, 'mHZJOrJO', 'simjtjddgehnk@yahoo.com', NULL, '$2y$12$iuvE7uqgHZaeEP6RsrVsleGZsuaLpIlYcqxUdE4XE2TMv8R3TJEYO', 'guest', NULL, '2024-12-02 04:21:08', '2024-12-02 04:21:08'),
(36, 'WtmxQpQwPeNrL', 'lkjvqissaxocexof@yahoo.com', NULL, '$2y$12$oOsfTFHSkZZaqdgk/b6QDu1hxohdJYJi5.Iw7/D.cZwBtTkpH.EYa', 'guest', NULL, '2024-12-02 20:28:27', '2024-12-02 20:28:27'),
(37, 'RNusPEOtNZnKsO', 'rwum3fizqlgfwtum@yahoo.com', NULL, '$2y$12$KhfTu0i5ehNcW.JHGw4O5u/4oNI1VcfGr772M/2Zhd9.48JHciY2m', 'guest', NULL, '2024-12-03 14:34:28', '2024-12-03 14:34:28'),
(38, 'kzDYGnUJ', 'kaeajtwckpiivd@yahoo.com', NULL, '$2y$12$sXxxOVMK.H9urNbo3UyTY.BKslqOrYsEt6JhEJB4VhOvuGGecf6K.', 'guest', NULL, '2024-12-04 08:20:13', '2024-12-04 08:20:13'),
(39, 'ztbmhccasqKPDm', 'mstewartcu@gmail.com', NULL, '$2y$12$o5DZ4t0kkv0MckgzqzAV9evPyydRk06OGt/AS2RzV.eGemaZyXe5.', 'guest', NULL, '2024-12-05 00:20:33', '2024-12-05 00:20:33'),
(40, 'AHAVzHzXH', 'konstanciyalamberttj26@gmail.com', NULL, '$2y$12$Zu0IunpUnR6oWOz3tS16T.ZCS.9r.fbGbtnQLDXJg7gn1hnFM2XWi', 'guest', NULL, '2024-12-05 18:22:43', '2024-12-05 18:22:43'),
(41, 'WtJtUipDwoABN', 'jqrfrrjnheixsim@yahoo.com', NULL, '$2y$12$0pImgDSN8g4wyhpHO7j7s.1qBdW8Alkm8J4Yrg2qehnOFg4ZjT5Zu', 'guest', NULL, '2024-12-06 14:54:43', '2024-12-06 14:54:43'),
(42, 'ygmrFPbXg', 'yvshpjhlt@yahoo.com', NULL, '$2y$12$R2.B53ojO8Gyopx0YPAkTuFRvxqrTEYY7j.dIqULq7M0JqyodPAhC', 'guest', NULL, '2024-12-07 09:41:03', '2024-12-07 09:41:03'),
(43, 'GWdqjwANt', 'hevenallen2000@gmail.com', NULL, '$2y$12$KYfos6d5k/tmN2Pv7mIp5.PfyEt2RM1oKB/Pd.im9f3XLt1AMlZiK', 'guest', NULL, '2024-12-08 03:41:09', '2024-12-08 03:41:09'),
(44, 'LqQvkbavH', 'ravnlyednorowicz@yahoo.com', NULL, '$2y$12$LXUXCzasx83NejAo31c7JOnz9r7Hm1LSrMNjUuNA544TOKX83hemy', 'guest', NULL, '2024-12-08 20:51:49', '2024-12-08 20:51:49'),
(45, 'SLGWuZVtj', 'pigaodillan992@gmail.com', NULL, '$2y$12$r4HBuh0ga7PHgWdDIP6Ec.hO8dOFu5rQAKENMzAc6kL1frlt93sd.', 'guest', NULL, '2024-12-09 19:46:54', '2024-12-09 19:46:54'),
(46, 'AuYjWJzZQ', 'pervillemp48@gmail.com', NULL, '$2y$12$lzwKbAEIrU9mb9FGPT648Ow7wTjg8Sre6FymBduBVkZkEvRxeqQyK', 'guest', NULL, '2024-12-11 21:44:32', '2024-12-11 21:44:32'),
(47, 'VupoLgmaR', 'gainechob15@gmail.com', NULL, '$2y$12$m9OnAutTY79sOqjqlr6J6O0FNJGC0mZvflmZStpm2DIrr0fxkfQr6', 'guest', NULL, '2024-12-13 02:50:37', '2024-12-13 02:50:37'),
(48, 'utVOmEzwHG', 'domocobs@gmail.com', NULL, '$2y$12$qeJ0n6GyMECBd37.kKibS.6PtUPdu8.gEIdzWjCep0GrFA3TmGXm.', 'guest', NULL, '2024-12-14 04:24:46', '2024-12-14 04:24:46'),
(49, 'zkjLZpvdj', 'nd8lrqwalfn@yahoo.com', NULL, '$2y$12$Gn2O2pVjurjRe.HGSoB1Eu/hMR90krAG/7BOMgIXiLAR5.IXnlrcO', 'guest', NULL, '2024-12-15 00:42:38', '2024-12-15 00:42:38'),
(50, 'ZIjvjteutXHulcY', 'hm771ikfn3xgsxm@yahoo.com', NULL, '$2y$12$V5XX6T2wB/VTJfR5kTPzB.DBZm0BU1Ne7JM7kLNelLu3X8igwPnsC', 'guest', NULL, '2024-12-15 00:42:52', '2024-12-15 00:42:52'),
(51, 'NHQWPbYHMKx', 'qyyytyvldecr@yahoo.com', NULL, '$2y$12$XnwcRs/FHQ21kl9FDJHESOTugVIt.SqeusK/Y63XN7fQ0nYK4Vx8u', 'guest', NULL, '2024-12-15 19:38:45', '2024-12-15 19:38:45'),
(52, 'cRyGFAkyJjV', 'crescentuyfrost@gmail.com', NULL, '$2y$12$iIrPeer/ZtslAgurGToaiufT1FjOHtQClRZuAzQ4RYuxbJnUZY0fi', 'guest', NULL, '2024-12-16 20:08:07', '2024-12-16 20:08:07'),
(53, 'yqVzOJjdRFx', 'hdaianrdfdkmgtiiy@yahoo.com', NULL, '$2y$12$X9mR4euidOwUhA55gD0RRucoP.OK8XAq0BH4puS.5g0U1sx9aGRym', 'guest', NULL, '2024-12-19 07:07:06', '2024-12-19 07:07:06'),
(54, 'rahoXMcAU', 'uzowutiku184@gmail.com', NULL, '$2y$12$.iJq1WuxY6XJm6JLPAZn8eICdMiSsq4wlJ0ydw4aVp6KEh12DxAQ6', 'guest', NULL, '2024-12-20 07:06:54', '2024-12-20 07:06:54'),
(55, 'YEOEEfraGusvv', 'bhoenerpas@yahoo.com', NULL, '$2y$12$hqicaGpqc1TWPwgEy/meVe0fR/EM/8cd5B6V0I2GPBzuVihBtOh7a', 'guest', NULL, '2024-12-21 05:42:52', '2024-12-21 05:42:52'),
(56, 'BTUOIwaBxbvG', 'atgqyxcxcljnlwbw@yahoo.com', NULL, '$2y$12$N3DIoLIEZsVepxM6YLYfdudb7Uez6dgRuGtMSbzzfrtRQNT2hDp32', 'guest', NULL, '2024-12-22 18:55:23', '2024-12-22 18:55:23'),
(57, 'onOnMjop', 'olebofotiya73@gmail.com', NULL, '$2y$12$ZOA.H3qcgv7Co5vurg.3HuX..4U70YewhZgaAG9buwabpX9vlB8Qy', 'guest', NULL, '2024-12-23 13:12:42', '2024-12-23 13:12:42'),
(58, 'fdzkCfVX', 'xiqihehac43@gmail.com', NULL, '$2y$12$DHYC2TDBprIOkbs7Nr3YQOLSKWzn8qkCkLsYwDyCV3KCVGxa1ICoq', 'guest', NULL, '2024-12-24 16:03:37', '2024-12-24 16:03:37'),
(59, 'EBpMHAcyxaUifp', 'thiekefalkener@yahoo.com', NULL, '$2y$12$RK4ozArcA9Gfgq7Vv9FzJefC7N3JgQmb5UAL./fABh5i1Wquk.yiG', 'guest', NULL, '2024-12-25 12:57:03', '2024-12-25 12:57:03'),
(60, 'HQGYhFNHtQv', 'ziqawiseq96@gmail.com', NULL, '$2y$12$26RbfedKbhlPvxXgNg9vG.MyEdyRuV7u6tUHTX/TcDjGRsJKXmlUi', 'guest', NULL, '2024-12-26 08:29:39', '2024-12-26 08:29:39'),
(61, 'qJvnUkMa', 'qhusmktht8i4mm2@yahoo.com', NULL, '$2y$12$UlDXKo.plAcNXI/cn8aPyOGFFkgfilPdMhEw1THXjF4VSGFdfq5nG', 'guest', NULL, '2024-12-27 07:30:42', '2024-12-27 07:30:42'),
(62, 'nOUDHzZmZk', 'jowulovaq52@gmail.com', NULL, '$2y$12$3qTn.4Uf8tsJ62iEfGRSHOk8bLqaZCIX93CtamjzXDgWUXlyAi7N6', 'guest', NULL, '2024-12-28 06:52:27', '2024-12-28 06:52:27'),
(63, 'HGEsKmGnFJ', 'awojaneqaheb00@gmail.com', NULL, '$2y$12$uHol6oSu840s.hLi9St1F.pt.jOk3QG6R0wd3ctqUtWIDzn3IBdta', 'guest', NULL, '2024-12-30 02:21:42', '2024-12-30 02:21:42'),
(64, 'TTkYLEMWnBh', 'lmgrklioodubk@yahoo.com', NULL, '$2y$12$OWlVSHrjq2fAssJG38.i2OZC.UeuWWirHYnSuKOCZ93joB9DMlR8e', 'guest', NULL, '2024-12-31 00:19:23', '2024-12-31 00:19:23'),
(65, 'UQOxHcEqz', 'galterwlpn@yahoo.com', NULL, '$2y$12$d/xcSvDqtvf5IcrwRhxrgu6Da3Z.3vdBcgK84utWJqegtYTkuIcwC', 'guest', NULL, '2024-12-31 18:22:42', '2024-12-31 18:22:42'),
(66, 'MTMAVBPUpGJh', 'uyutuwic546@gmail.com', NULL, '$2y$12$cbwIa8/G16WI14uWZP7Q0OG4ut00eBL3ENreDLUeJflGyqVC6JB0K', 'guest', NULL, '2025-01-01 11:54:02', '2025-01-01 11:54:02'),
(67, 'CxEPoblYIJ', 'we3we2xjembwe@yahoo.com', NULL, '$2y$12$Angqfl6cytqelDAser64m.s.kiMbrspuQl5aD5r9fVbrfjk4ouaHy', 'guest', NULL, '2025-01-02 05:25:49', '2025-01-02 05:25:49'),
(68, 'AgOlnqONHLaDHc', 'evefifoqiq563@gmail.com', NULL, '$2y$12$qzgfT1ffMFvZzJdm4rjUEu1B4WkyI3kdfKqUPnIYaaI9zDvBHZT9m', 'guest', NULL, '2025-01-03 01:05:33', '2025-01-03 01:05:33'),
(69, 'DLYvJGiFQu', 'tagasih778@gmail.com', NULL, '$2y$12$FdQ277inJW3JQCw7HyYiH.8Onp2UekJY7XbbMEZIVVACd4QPpnahK', 'guest', NULL, '2025-01-04 21:27:15', '2025-01-04 21:27:15'),
(70, 'adminxps', 'budaklzcrew@gmail.com', NULL, '$2y$12$mv2ik33TRVuekRx1Ny8djeW9dairTTvQXtMd9iKBhr2L6IzwesTIu', 'guest', NULL, '2025-01-05 00:19:38', '2025-01-05 00:19:38'),
(71, 'dJOATAIz', 'bazudimece01@gmail.com', NULL, '$2y$12$krfFNEYJBy4hiZ76QZbYR.1RYJCPDAsu/UwIIE0LeVRZWaf/YoXpi', 'guest', NULL, '2025-01-07 06:54:35', '2025-01-07 06:54:35'),
(72, 'arPUaZwW', 'skoparisian@yahoo.com', NULL, '$2y$12$7HpMeN3awEWV6ZFfguiRSeqVUZTzSKVwQ3sY9Jq1uUbRrmbc4HC6W', 'guest', NULL, '2025-01-08 08:02:17', '2025-01-08 08:02:17'),
(73, 'AqxVNlvJRgP', 'alosiwerol33@gmail.com', NULL, '$2y$12$dM6vOF.lV2KQsmS/LPoq4uWBtMcwTZvpa2gFjSYFreHC3u6u0MAVi', 'guest', NULL, '2025-01-09 11:35:07', '2025-01-09 11:35:07'),
(74, 'oHWtmKBzuULck', 'helfenteinknazs@yahoo.com', NULL, '$2y$12$Y1rYPdKJiHDvT19onQNtxeMOBz3I8GDF.mqP1iEmL9ugy38sU.6OC', 'guest', NULL, '2025-01-10 11:03:32', '2025-01-10 11:03:32'),
(75, 'QCuSzqfjNgUiE', 'plqybufsvgpcc@yahoo.com', NULL, '$2y$12$cMvJNEV87UTcJSiLSAG.9.os0MnaW8r4abHRYnQzOHnxssEFXxccm', 'guest', NULL, '2025-01-11 08:56:50', '2025-01-11 08:56:50'),
(76, 'asUXMYbMo', 'oxpcaqxwu@yahoo.com', NULL, '$2y$12$mxU07oDz3AHOdqtXWY6UJe/EmTeiJTU5pPl1QoOr5WF4xkyGqK5zm', 'guest', NULL, '2025-01-12 08:02:28', '2025-01-12 08:02:28'),
(77, 'WaYQIhNmQD', 'ndiformutiehmizia@yahoo.com', NULL, '$2y$12$QR6z32Qp9MXTnL49GEEBCecyP93M33G2ON7cl9vxOeVInS/jOSGVG', 'guest', NULL, '2025-01-13 11:05:34', '2025-01-13 11:05:34'),
(78, 'BpgAqGyebEtYqL', 'uqjtm5ylhi262l@yahoo.com', NULL, '$2y$12$tYX4eANtUm1Qgz6Vk1IUb.efEQSc8cykxE.hJ8v5bf.JXSh3MH73K', 'guest', NULL, '2025-01-14 21:42:02', '2025-01-14 21:42:02'),
(79, 'YbUzpkwXCVR', 'duskie21echo12uy@gmail.com', NULL, '$2y$12$DO4GwL0Y48IkJmsxWKDgw.mUQHeD8hzjGF3J6MdGb885hkP4FqoAG', 'guest', NULL, '2025-01-16 12:37:29', '2025-01-16 12:37:29'),
(80, 'DomanTXmukAe', 'flfomiultx@yahoo.com', NULL, '$2y$12$Dh/8okOdFmQeeg4J08MGOuLcNDvkkkA7byo2byuAHnFkdfhamftL6', 'guest', NULL, '2025-01-17 17:32:33', '2025-01-17 17:32:33'),
(81, 'LRVQQAuBP', 'vardarocader@yahoo.com', NULL, '$2y$12$ey4M/Ec.JpWI/MloD51jFujmXbLl7r9Zyg7n.Wq8O7qSAwqlTHCbG', 'guest', NULL, '2025-01-18 21:07:16', '2025-01-18 21:07:16'),
(82, 'zgQsLxomd', 'diucyluxxqdmywcnh@yahoo.com', NULL, '$2y$12$095UjuS8lhn81nEcXKqTLeg/X9nTAbaUPEsZXiP9CP.7d9k6R1QHW', 'guest', NULL, '2025-01-19 17:52:45', '2025-01-19 17:52:45'),
(83, 'GeFxqVnzvOhzI', 'oejubileeeyverge9ay@gmail.com', NULL, '$2y$12$pRpEdCBxOmhH5bMkAvL8/eerbilxwvMwAsYiK7QbN6Flfn9f9lyli', 'guest', NULL, '2025-01-20 14:21:15', '2025-01-20 14:21:15'),
(84, 'DBHAeAAYckOmYgA', 'uvortexoechime83@gmail.com', NULL, '$2y$12$dPo9yWsKmdKVLN4l9JHvSO.UD0lYBA6oabVLQKulrHYwnwvZ9RqLG', 'guest', NULL, '2025-01-21 22:33:47', '2025-01-21 22:33:47'),
(85, 'FaaMwPHMS', 'h837tae2glvu6en0m@yahoo.com', NULL, '$2y$12$aEKBSfY.nONVrVOf0R3X9eAHn0Ri99rrOaN62wnZFvPNtFBRnBqhe', 'guest', NULL, '2025-01-23 13:51:26', '2025-01-23 13:51:26'),
(86, 'rqtkHQJICHXwR', 'Bruce3Thompson8456@gmail.com', NULL, '$2y$12$PHcEvqvm9wOsncNvD4XS/e1R6PuL2SEaCqjIHQkkAWjIrWG.Ns/Em', 'guest', NULL, '2025-01-25 04:03:07', '2025-01-25 04:03:07'),
(87, 'bXBsKzzbBF', 'bjdjx2y2bw2@yahoo.com', NULL, '$2y$12$jinok11GduVX5IWoRITP3OfbD0931PBr73jWdaRnwZenHbq2qbmyS', 'guest', NULL, '2025-01-26 17:22:25', '2025-01-26 17:22:25'),
(88, 'xIECdLCtCAUHw', 'rphrprplslnfkdjh@yahoo.com', NULL, '$2y$12$qqlaD54M9Xl21vbpNEDcGuX4qvCNP1x/qwxgHlCYR2e9hzr4nxWve', 'guest', NULL, '2025-01-28 14:50:42', '2025-01-28 14:50:42'),
(89, 'dDzbZbbFYwRFptK', 'ncfw8pzhy4q@yahoo.com', NULL, '$2y$12$3/8/hdEH8kRwGtKy83XLf.bLz9yVgvMWRxAtPRnWAfncK17bxKz.6', 'guest', NULL, '2025-01-30 19:51:45', '2025-01-30 19:51:45'),
(90, 'HiQExkRecCxuPN', 'obsidian24verge35@gmail.com', NULL, '$2y$12$2TVrms2HILt06AN0VcBzk.YYkDQ9KU8TsOuJMmx8AggnNzLBRGu6.', 'guest', NULL, '2025-02-01 06:26:25', '2025-02-01 06:26:25'),
(91, 'XGzgmBxPcvh', 'ilojelolihe424@gmail.com', NULL, '$2y$12$DeDpOaqbzqymRuEC8Jk47uqzvqd4WhsFumHZg1fwRsSnbuuj0fuCK', 'guest', NULL, '2025-02-02 05:46:25', '2025-02-02 05:46:25'),
(92, 'bcGXITjusPJVwXt', 'dgyjxwiwtys@yahoo.com', NULL, '$2y$12$Bp8FQpWOKXYXXuFRVeq5ruWgd8w2eua0/RwZCvAj1KdwjTEb5wtb2', 'guest', NULL, '2025-02-03 02:38:13', '2025-02-03 02:38:13'),
(93, 'bWLjkjXeJAHG', 'eclipseeybrinkia@gmail.com', NULL, '$2y$12$80nOjf0CO8TcEa.fMiiE5OivN6kRzaJG4M1dxX.gxD5YiDRqlQ.3m', 'guest', NULL, '2025-02-04 04:29:51', '2025-02-04 04:29:51'),
(94, 'SrAsfMIYXtxtDbX', 'borealio45yarn@gmail.com', NULL, '$2y$12$3ZUxwmWy.OEEGLenP92zL.2TU7vITaVvoAqDfGPtZ4qxsQFbdGEvO', 'guest', NULL, '2025-02-05 05:12:14', '2025-02-05 05:12:14'),
(95, 'wBTAEmilsKK', 'mementouedelve@gmail.com', NULL, '$2y$12$0HF8MPXZfKC/UkA0RfQQauntXvmTZFHL8wY14o3BZbNUQ1IkJLtye', 'guest', NULL, '2025-02-06 04:35:07', '2025-02-06 04:35:07'),
(96, 'lxIklSOPlJMz', 'uaborealiarift@gmail.com', NULL, '$2y$12$z86osf5f6ppGE5Jspz04DuMkBsDKjGIdBFimeFVa84ADmAxXTBi5y', 'guest', NULL, '2025-02-08 13:20:30', '2025-02-08 13:20:30'),
(97, 'SuAjdQbYAl', 'nirvanaio7zeal94@gmail.com', NULL, '$2y$12$tb6rffYug9Wqkei.75Cxs.MjXl1WAo1aBnYJaYW5UJ77HEnxW/DbS', 'guest', NULL, '2025-02-10 02:13:08', '2025-02-10 02:13:08'),
(98, 'irdqpFpREty', 'phantomoo41mirage23@gmail.com', NULL, '$2y$12$4l0OKd1s3yymT0YgVjW66OyQKb43RTAYz.wAXswGF.emUP759RIlW', 'guest', NULL, '2025-02-11 13:58:23', '2025-02-11 13:58:23'),
(99, 'dMPrUcPaFxRI', 'ocnruthndtxyvbaom@yahoo.com', NULL, '$2y$12$rg8bAqHz3fjMXTuZFciZReqQ30lmFz.EDNopbkOPzEnyiemvwpkFO', 'guest', NULL, '2025-02-14 05:16:38', '2025-02-14 05:16:38'),
(100, 'YPaPeffa', 'ivosoyoca741@gmail.com', NULL, '$2y$12$t38PyP83TS46.N8qE7r3/e8e8AgZhA8PWu8wlbJlwdKTzGH2lF5UW', 'guest', NULL, '2025-02-15 03:06:04', '2025-02-15 03:06:04'),
(101, 'msIVmlRLrxSZ', 'sorvalas46@gmail.com', NULL, '$2y$12$No3.6BCTsGm3RuT/gOTdkufyWCRW2gsTU9kDVhBrz7X2jyaP9j.iu', 'guest', NULL, '2025-02-15 20:33:57', '2025-02-15 20:33:57'),
(102, 'QxjBMVKZWNIWUH', 'hornedjervaz@gmail.com', NULL, '$2y$12$qV6h08Qm9DDyPShe51t6h.VGFvtU6uMfr7Q/SSmE1mf7RsZAsEI6a', 'guest', NULL, '2025-02-16 12:22:52', '2025-02-16 12:22:52'),
(103, 'TpEzMLaijmon', 'djessikahanna83@gmail.com', NULL, '$2y$12$VEWSzLtAUlpYMu9ZKKbbbOUqBowm523VVOzTJDlFSRXZYYowXt5Tq', 'guest', NULL, '2025-02-17 05:02:22', '2025-02-17 05:02:22'),
(104, 'mElnJBRx', 'michelainbullockod6@gmail.com', NULL, '$2y$12$xwuUXYlhFTJmFIJNAYkV3eiYI9S.hGWkIGJA8kJwsP3MqMqXt5TE.', 'guest', NULL, '2025-02-18 05:08:43', '2025-02-18 05:08:43'),
(105, 'JFgYdYjCGH', 'uyixoye739@gmail.com', NULL, '$2y$12$/kfdmnSsI2ypsTyCDTOVueyXlSaLo49JGZCE6ELpjla9mM45KniKS', 'guest', NULL, '2025-02-19 13:21:40', '2025-02-19 13:21:40'),
(106, 'wSVdYqHzojKYJrz', 'derrilf3@gmail.com', NULL, '$2y$12$f74DpMbLmYcsft8WYd9bMOEtNM.BombTvQweWKgyzvF/7emqwavLq', 'guest', NULL, '2025-02-20 14:59:40', '2025-02-20 14:59:40'),
(107, 'PZvyiPGYI', 'yonderaeumbra37oi@gmail.com', NULL, '$2y$12$fz921cb6EcQnEtYDVzXh4uZNy1JL27FI8kN/UuMN/iiW16oO1HlAW', 'guest', NULL, '2025-02-21 14:09:58', '2025-02-21 14:09:58'),
(108, 'Stephenwaf', 'alllinks3001@gmail.com', NULL, '$2y$12$wGPXd2jXvoSD.4tp3irZ6ORdiko53fosfu/becDfh7oA3zFFdIXUG', 'guest', NULL, '2025-02-21 20:32:42', '2025-02-21 20:32:42'),
(109, 'GCQRPvZQbo', 'ucoconovi664@gmail.com', NULL, '$2y$12$rV1JT6JdnC50hwmXayUJqOMJ8HUbdkvtM9wy9StA.J.rJoquA1H62', 'guest', NULL, '2025-02-21 22:27:53', '2025-02-21 22:27:53'),
(110, 'XhtOrNONnfMoaXH', 'ariaslonnima47@gmail.com', NULL, '$2y$12$LHkZnu9YhfgTtH5YMA1kkuhhi1ZlaTj1UVx3rpSZ824wRC5n5XgJe', 'guest', NULL, '2025-02-23 00:05:44', '2025-02-23 00:05:44'),
(111, 'zlwmarhhkDnZH', 'fitzpatrickmadizin@gmail.com', NULL, '$2y$12$mhTQWen1u2m1C0hA.SI8bemdhEd8PC1y7b9q9KWqj2jCl3rJYfv7.', 'guest', NULL, '2025-02-23 15:56:53', '2025-02-23 15:56:53'),
(112, '* * * Claim Free iPhone 16: https://kapilgroup.com/uploads/cim2qx.php?67l314r * * * hs=e7a9c2fb56f838a8bafe5f93451bc941*', 'pazapz@mailbox.in.ua', NULL, '$2y$12$Z8WXjvqYeEnsjwe784lY9OAQQNq7mPR880OKUHsCfDUGrEVoUE7gm', 'guest', NULL, '2025-02-23 20:18:54', '2025-02-23 20:18:54'),
(113, 'ntjbfXgHxdqZS', 'mossdjori42@gmail.com', NULL, '$2y$12$S4i9/hQc9sUWwCyKFQssceD2HXJgWaXamj.SwbxkQmGG168bVAvLK', 'guest', NULL, '2025-02-24 09:43:06', '2025-02-24 09:43:06'),
(114, 'JxQDxDPrrUszW', 'abraxasurift89@gmail.com', NULL, '$2y$12$vIUGVQoDxQCHKuZQnlD35ORhK07TAXQQDLd.J8GQ5xqE/vJGs72Ji', 'guest', NULL, '2025-02-25 11:15:53', '2025-02-25 11:15:53'),
(115, 'nwntlQqBf', 'vercheriordanova@yahoo.com', NULL, '$2y$12$8PtN/N9jBTabUryqvqIrDOF0w35ZMHzuIJsVlPEP73NK2tGgkk9vS', 'guest', NULL, '2025-02-26 12:59:03', '2025-02-26 12:59:03'),
(116, 'nmRNMCQAInk', 'abebeasq89@gmail.com', NULL, '$2y$12$8bQEqLBPwAJF9S3DfDVZD.4vAQSJkzSQOIocTJias4Io7fDQgru1O', 'guest', NULL, '2025-02-27 09:50:51', '2025-02-27 09:50:51'),
(117, 'QPpJfDoQXoHq', 'syzirushq3@gmail.com', NULL, '$2y$12$COiBgUFr7SmbIg/5pxd6.u/8meToeB8V4hrFJqA08nCV26W5pcCOG', 'guest', NULL, '2025-03-01 03:41:49', '2025-03-01 03:41:49'),
(118, 'XgArhLAnLCPDkd', 'greeoltzpenzik@yahoo.com', NULL, '$2y$12$YBgIJWntkvi4HkjF6pdyZe9zu65jxRIXmvO6dBXCprrlJGWADbu9m', 'guest', NULL, '2025-03-01 20:06:29', '2025-03-01 20:06:29'),
(119, 'dZvsTvxDZ', 'willharlop1991@gmail.com', NULL, '$2y$12$BUIRfpynFtx8o9w9S5gMVejFHZD/5R6S4iEwJilDbc1kigRnVD.5q', 'guest', NULL, '2025-03-02 13:22:05', '2025-03-02 13:22:05'),
(120, 'RkjJldLRCZZH', 'kellyadriank54@gmail.com', NULL, '$2y$12$uiq4OKlFqLfnv8d.wxcD4.aBX7WSOP2.HgfjflO80BZwHhbfwDiny', 'guest', NULL, '2025-03-03 06:54:52', '2025-03-03 06:54:52'),
(121, 'fbkwwZqE', 'lysettacd@gmail.com', NULL, '$2y$12$mSExRHH1k5wUcmbBLDE2Fu3CxLVt/pUwaBin7wBwgO66FouzlSXoW', 'guest', NULL, '2025-03-04 06:57:54', '2025-03-04 06:57:54'),
(122, 'fHSaqWUFTpAq', 'kollymcamacho51@gmail.com', NULL, '$2y$12$Dn.eVu56UFB9meSgLCYlW.8YYCo7uPpE9mUa2iIrGd6g3.gHNUxoa', 'guest', NULL, '2025-03-05 08:36:01', '2025-03-05 08:36:01'),
(123, 'xfpMjMVUqrF', 'nqntwkftogrymuxwy@yahoo.com', NULL, '$2y$12$Z.y.2ZN7B/S7pVBHO/RZAeWICEjkdtzOlMZ5supRJwyh9A94DBksC', 'guest', NULL, '2025-03-06 11:21:38', '2025-03-06 11:21:38'),
(124, 'pvUWKhofftr', 'mementoai30zeal@gmail.com', NULL, '$2y$12$bPjdOKd.AO30f5v2VhCfR.q3yUKOa.tHPd/5lqeO4xvhpkm7SnhAy', 'guest', NULL, '2025-03-07 17:14:31', '2025-03-07 17:14:31'),
(125, 'XeebKUhMfyAadi', 'ua16quartz51@gmail.com', NULL, '$2y$12$x609FQjyayxkEAOzGP0x8uvPIkaplyKgX6zhfKHJTJw4BbcVEekYS', 'guest', NULL, '2025-03-08 13:25:23', '2025-03-08 13:25:23'),
(126, 'hMdONoncZhh', 'metelhard1997@gmail.com', NULL, '$2y$12$0XHJtToqlutBnu6gI9/bJumJYjetqxND3Tt6uT5L6stByR9ACjrom', 'guest', NULL, '2025-03-09 09:53:59', '2025-03-09 09:53:59'),
(127, 'gyNJCiJHMDxyTL', 'lesbucub@gmail.com', NULL, '$2y$12$XDpjuuJafpuCuZ6zxmkJ1Osn1kn0h/9jZTklQJakjlHjBRusmTa.C', 'guest', NULL, '2025-03-12 15:20:09', '2025-03-12 15:20:09'),
(128, 'xPbATdCOmxn', 'teiths17@gmail.com', NULL, '$2y$12$O6d10o2obRuUqbX/HCrLze9WDKTcHH2t5jX5C/zmCKPsqZp4GfcUm', 'guest', NULL, '2025-03-15 00:02:01', '2025-03-15 00:02:01'),
(129, 'rXZvApLm', 'gcervantesby19@gmail.com', NULL, '$2y$12$Fjqr3/HHRjeCUCqM/DQb5.u1nWHMwdXnPkbI0t/rHUo2qJAv81Lxq', 'guest', NULL, '2025-03-15 19:09:31', '2025-03-15 19:09:31'),
(130, 'EyphwMMEKuwTbj', 'briariyjx@gmail.com', NULL, '$2y$12$/GJi02OFbT21Oa2UcK7rpeSsUmvAr1M2QpfZL3ctN18Xo9lEo22uK', 'guest', NULL, '2025-03-16 14:29:35', '2025-03-16 14:29:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_payment_type_id_foreign` (`payment_type_id`),
  ADD KEY `bills_user_id_foreign` (`user_id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_details_bill_id_foreign` (`bill_id`),
  ADD KEY `bill_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_pet_type_id_foreign` (`pet_type_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventaries`
--
ALTER TABLE `inventaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventaries_product_id_foreign` (`product_id`),
  ADD KEY `inventaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipalities_departments_id_foreign` (`departments_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pets_name_unique` (`name`),
  ADD KEY `pets_pet_type_id_foreign` (`pet_type_id`);

--
-- Indexes for table `pet_types`
--
ALTER TABLE `pet_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_pet_type_id_foreign` (`pet_type_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_municipalities_id_foreign` (`municipalities_id`),
  ADD KEY `shippings_departments_id_foreign` (`departments_id`),
  ADD KEY `shippings_user_id_foreign` (`user_id`),
  ADD KEY `shippings_bill_id_foreign` (`bill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaries`
--
ALTER TABLE `inventaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pet_types`
--
ALTER TABLE `pet_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`),
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_pet_type_id_foreign` FOREIGN KEY (`pet_type_id`) REFERENCES `pet_types` (`id`);

--
-- Constraints for table `inventaries`
--
ALTER TABLE `inventaries`
  ADD CONSTRAINT `inventaries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `inventaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `municipalities_departments_id_foreign` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_pet_type_id_foreign` FOREIGN KEY (`pet_type_id`) REFERENCES `pet_types` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_pet_type_id_foreign` FOREIGN KEY (`pet_type_id`) REFERENCES `pet_types` (`id`),
  ADD CONSTRAINT `products_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `shippings_departments_id_foreign` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `shippings_municipalities_id_foreign` FOREIGN KEY (`municipalities_id`) REFERENCES `municipalities` (`id`),
  ADD CONSTRAINT `shippings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
