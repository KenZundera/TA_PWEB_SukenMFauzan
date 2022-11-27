-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2022 pada 13.16
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epic_rpg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `achievements`
--

CREATE TABLE `achievements` (
  `id_achievements` int(11) NOT NULL,
  `progress` varchar(255) NOT NULL,
  `dungeon` varchar(255) NOT NULL,
  `working` varchar(255) NOT NULL,
  `multiplayer` varchar(255) NOT NULL,
  `events` varchar(255) NOT NULL,
  `misc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `achievements`
--

INSERT INTO `achievements` (`id_achievements`, `progress`, `dungeon`, `working`, `multiplayer`, `events`, `misc`) VALUES
(1, '42', '14', '18', '7', '12', '48'),
(2, '14', '3', '37', '6', '6', '21'),
(3, '53', '20', '40', '4', '16', '20'),
(4, '65', '20', '41', '14', '26', '18'),
(5, '50', '27', '23', '3', '28', '44'),
(6, '65', '34', '15', '12', '24', '10'),
(7, '6', '28', '43', '9', '21', '40'),
(8, '42', '26', '37', '15', '20', '37'),
(9, '19', '5', '41', '8', '22', '2'),
(10, '56', '2', '13', '17', '38', '40'),
(11, '30', '16', '23', '5', '39', '12'),
(12, '69', '17', '24', '31', '20', '19'),
(13, '9', '15', '3', '1', '26', '38'),
(14, '74', '9', '12', '8', '26', '47'),
(15, '64', '30', '29', '21', '17', '45'),
(16, '15', '34', '17', '33', '38', '12'),
(17, '80', '6', '1', '11', '24', '46'),
(18, '65', '15', '22', '18', '15', '10'),
(19, '7', '13', '27', '6', '34', '48'),
(20, '68', '11', '9', '9', '40', '11'),
(21, '60', '5', '19', '20', '9', '28'),
(22, '29', '29', '5', '30', '29', '36'),
(23, '27', '35', '8', '20', '3', '12'),
(24, '26', '14', '26', '1', '18', '30'),
(25, '66', '14', '5', '23', '21', '37'),
(26, '65', '30', '6', '15', '14', '27'),
(27, '29', '25', '32', '12', '1', '47'),
(28, '18', '13', '27', '15', '42', '28'),
(29, '50', '35', '37', '30', '35', '12'),
(30, '42', '18', '32', '30', '1', '46'),
(31, '13', '4', '38', '30', '31', '40'),
(32, '67', '30', '39', '20', '19', '30'),
(33, '69', '21', '17', '30', '42', '20'),
(34, '62', '21', '24', '13', '25', '6'),
(35, '32', '28', '6', '10', '19', '19'),
(36, '56', '17', '32', '20', '3', '17'),
(37, '22', '23', '28', '7', '38', '36'),
(38, '9', '16', '19', '3', '23', '27'),
(39, '56', '30', '18', '7', '28', '14'),
(40, '58', '12', '25', '23', '7', '23'),
(41, '44', '14', '5', '24', '34', '27'),
(42, '21', '25', '20', '15', '19', '27'),
(43, '79', '20', '36', '26', '15', '27'),
(44, '73', '30', '30', '24', '23', '23'),
(45, '26', '11', '29', '12', '42', '22'),
(46, '8', '30', '16', '23', '38', '29'),
(47, '25', '20', '28', '19', '35', '27'),
(48, '64', '3', '23', '27', '10', '15'),
(49, '27', '12', '37', '30', '20', '28'),
(50, '76', '12', '34', '16', '41', '35'),
(51, '10', '10', '10', '11', '10', '10'),
(52, '41', '14', '18', '6', '11', '48'),
(53, '1', '1', '1', '1', '1', '1'),
(54, '1', '1', '1', '1', '1', '1'),
(55, '1', '1', '1', '1', '1', '1'),
(56, '41', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `coins` varchar(255) NOT NULL,
  `bonus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `coins`, `bonus`) VALUES
(1, '66 T', '5.2%'),
(2, '43 K', '9.7%'),
(3, '62 T', '9.2%'),
(4, '76 M', '7.5%'),
(5, '90 B', '2.2%'),
(6, '65 T', '8.1%'),
(7, '55 B', '1.5%'),
(8, '16 T', '6.5%'),
(9, '54 K', '1.6%'),
(10, '50 K', '5.6%'),
(11, '6 K', '7.2%'),
(12, '37 M', '2.3%'),
(13, '27 M', '4.5%'),
(14, '32 T', '8.2%'),
(15, '71 T', '3.1%'),
(16, '81 B', '5.9%'),
(17, '23 T', '1.9%'),
(18, '17 T', '5.8%'),
(19, '8 M', '4%'),
(20, '15 T', '3.6%'),
(21, '32 T', '7.6%'),
(22, '94 B', '2.8%'),
(23, '4 B', '3.3%'),
(24, '5 M', '10%'),
(25, '81 T', '2.4%'),
(26, '33 K', '2.1%'),
(27, '98 T', '6.8%'),
(28, '8 T', '3.2%'),
(29, '2 K', '1.5%'),
(30, '93 B', '4.9%'),
(31, '58 M', '5.7%'),
(32, '17 K', '1.7%'),
(33, '66 B', '5.7%'),
(34, '27 K', '7.4%'),
(35, '43 K', '3.6%'),
(36, '2 T', '5.7%'),
(37, '44 K', '6.7%'),
(38, '29 M', '9.5%'),
(39, '97 K', '3.9%'),
(40, '61 M', '7.6%'),
(41, '15 B', '8%'),
(42, '16 T', '8.5%'),
(43, '7 T', '2.7%'),
(44, '32 T', '6.1%'),
(45, '63 B', '1.2%'),
(46, '79 K', '1.6%'),
(47, '13 K', '6.8%'),
(48, '19 B', '1.7%'),
(49, '28 K', '8.7%'),
(50, '65 M', '6%'),
(51, '51 B', '5.1%'),
(52, '123 T', '10.0%'),
(53, '1 K', '10.0%'),
(54, '20 T', '10.0%'),
(55, '123 T', '10.0%'),
(56, '66 T', '10.0%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `horse`
--

CREATE TABLE `horse` (
  `id_horse` int(11) NOT NULL,
  `tier` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `level` int(11) NOT NULL,
  `epicness` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `horse`
--

INSERT INTO `horse` (`id_horse`, `tier`, `type`, `level`, `epicness`) VALUES
(1, 3, 'Golden', 59, 22),
(2, 4, 'Magic', 67, 25),
(3, 1, 'Super Special', 23, 42),
(4, 3, 'Golden', 59, 22),
(5, 7, 'Magic', 33, 22),
(6, 4, 'Super Special', 2, 22),
(7, 9, 'Super Special', 23, 22),
(8, 4, 'Festive', 27, 2),
(9, 3, 'Tank', 71, 23),
(10, 8, 'Tank', 29, 18),
(11, 10, 'Golden', 97, 43),
(12, 8, 'Special', 17, 24),
(13, 3, 'Festive', 34, 14),
(14, 5, 'Magic', 20, 37),
(15, 2, 'Magic', 45, 35),
(16, 4, 'Strong', 58, 17),
(17, 8, 'Strong', 85, 18),
(18, 2, 'Magic', 98, 31),
(19, 4, 'Strong', 43, 11),
(20, 9, 'Tank', 55, 18),
(21, 6, 'Golden', 35, 47),
(22, 9, 'Defender', 59, 18),
(23, 9, 'Strong', 100, 46),
(24, 9, 'Special', 85, 46),
(25, 3, 'Defender', 48, 19),
(26, 8, 'Festive', 79, 9),
(27, 8, 'Strong', 24, 32),
(28, 9, 'Golden', 37, 32),
(29, 3, 'Defender', 34, 3),
(30, 9, 'Defender', 69, 44),
(31, 10, 'Strong', 94, 44),
(32, 5, 'Festive', 55, 12),
(33, 10, 'Strong', 91, 16),
(34, 4, 'Festive', 43, 27),
(35, 5, 'Strong', 67, 28),
(36, 9, 'Strong', 80, 33),
(37, 9, 'Defender', 57, 25),
(38, 5, 'Strong', 39, 21),
(39, 2, 'Golden', 71, 26),
(40, 6, 'Defender', 22, 3),
(41, 10, 'Defender', 84, 21),
(42, 5, 'Magic', 69, 24),
(43, 10, 'Defender', 41, 48),
(44, 2, 'Defender', 77, 19),
(45, 9, 'Golden', 36, 46),
(46, 9, 'Defender', 10, 14),
(47, 7, 'Tank', 61, 46),
(48, 1, 'Strong', 83, 7),
(49, 3, 'Magic', 29, 20),
(50, 9, 'Special', 99, 25),
(51, 11, 'Golden', 100, 100),
(52, 10, 'SUPER SPECIAL', 100, 100),
(53, 1, 'Special', 1, 1),
(54, 1, '1', 1, 1),
(55, 1, 'Golden', 1, 1),
(56, 10, 'Golden', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id_inventory` int(11) NOT NULL,
  `log` int(11) NOT NULL,
  `fish` int(11) NOT NULL,
  `fruit` int(11) NOT NULL,
  `drop_item` int(11) NOT NULL,
  `potion` int(11) NOT NULL,
  `cookie` int(11) NOT NULL,
  `lootbox` int(11) NOT NULL,
  `seed` int(11) NOT NULL,
  `epic_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id_inventory`, `log`, `fish`, `fruit`, `drop_item`, `potion`, `cookie`, `lootbox`, `seed`, `epic_item`) VALUES
(1, 69632, 64810, 640, 74, 33429, 16365, 353, 6431, 30),
(2, 698, 66486, 192, 56, 96187, 51003, 869, 2311, 61),
(3, 79527, 40720, 17, 87, 75992, 22346, 985, 4324, 58),
(4, 54765, 48883, 623, 13, 19654, 79990, 728, 9192, 93),
(5, 10752, 25094, 480, 75, 26434, 40165, 496, 8684, 48),
(6, 46121, 69338, 841, 87, 77540, 6603, 932, 7660, 100),
(7, 30069, 9206, 296, 64, 54137, 91422, 243, 880, 23),
(8, 24024, 7254, 374, 96, 29142, 38971, 860, 1511, 49),
(9, 81196, 94758, 67, 74, 91877, 13396, 75, 4165, 38),
(10, 57488, 18422, 573, 5, 25664, 63877, 443, 1173, 3),
(11, 84017, 38950, 769, 1, 8816, 72172, 784, 5677, 92),
(12, 66732, 92452, 610, 75, 4658, 45813, 574, 6387, 81),
(13, 81041, 92571, 712, 26, 82000, 98102, 5, 5208, 38),
(14, 70503, 65992, 810, 18, 47092, 88921, 813, 8091, 17),
(15, 66957, 36068, 55, 71, 8089, 25237, 82, 3310, 18),
(16, 77617, 37595, 584, 55, 63798, 72168, 350, 2653, 2),
(17, 69722, 55702, 570, 41, 33695, 75280, 421, 6574, 78),
(18, 25486, 94010, 582, 95, 40324, 54767, 369, 1681, 32),
(19, 57813, 35173, 936, 74, 85612, 99166, 673, 2361, 17),
(20, 34338, 63478, 826, 96, 22225, 69253, 51, 2221, 98),
(21, 79688, 62525, 611, 15, 25625, 87421, 386, 7802, 80),
(22, 37248, 80630, 861, 60, 42080, 79108, 660, 4260, 42),
(23, 33113, 32597, 843, 75, 2159, 88978, 518, 4508, 65),
(24, 7814, 60558, 88, 20, 13771, 92543, 88, 2307, 35),
(25, 27902, 73544, 106, 31, 91604, 48277, 745, 8629, 36),
(26, 41067, 76881, 554, 34, 34005, 76567, 360, 5847, 95),
(27, 38643, 96608, 776, 51, 89738, 9413, 99, 602, 80),
(28, 7857, 35824, 60, 36, 29115, 47349, 103, 630, 55),
(29, 49200, 15349, 373, 30, 65659, 50771, 222, 1921, 51),
(30, 68924, 68793, 795, 33, 68600, 44301, 31, 5881, 71),
(31, 87055, 4967, 743, 47, 11548, 84684, 487, 7479, 22),
(32, 75899, 16997, 998, 88, 21398, 94412, 237, 3991, 88),
(33, 63690, 71410, 374, 61, 34530, 3790, 916, 7123, 75),
(34, 19592, 71085, 862, 57, 47341, 6241, 788, 2159, 84),
(35, 13340, 11576, 159, 44, 26796, 29333, 186, 5912, 1),
(36, 19131, 21172, 77, 89, 23453, 44127, 564, 3306, 40),
(37, 56058, 35552, 799, 48, 9367, 90240, 799, 5812, 83),
(38, 30804, 39302, 463, 9, 49885, 69563, 258, 8167, 40),
(39, 75384, 98391, 260, 51, 14841, 42377, 743, 2453, 37),
(40, 26168, 79899, 683, 85, 97289, 2620, 160, 3806, 51),
(41, 9293, 7070, 300, 100, 87470, 15725, 632, 2570, 33),
(42, 73352, 86628, 850, 29, 91491, 12348, 12, 9688, 61),
(43, 38561, 83702, 599, 60, 92821, 84508, 247, 1664, 65),
(44, 47943, 87780, 582, 12, 59482, 47496, 439, 2912, 78),
(45, 81881, 18228, 109, 73, 41039, 98387, 863, 5246, 10),
(46, 54680, 80849, 138, 33, 34770, 54162, 712, 3863, 46),
(47, 380, 66993, 885, 1, 14564, 31339, 953, 48, 60),
(48, 6513, 9354, 772, 30, 74074, 91077, 926, 9723, 83),
(49, 90626, 37999, 925, 40, 89921, 8374, 838, 2497, 19),
(50, 65183, 43174, 2, 83, 24301, 80472, 736, 8329, 62),
(51, 123456, 54321, 12345, 54321, 12345, 54321, 12345, 54321, 12345),
(52, 123, 123, 123, 123, 123, 123, 123, 123, 123),
(53, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(54, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(55, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(56, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `player`
--

CREATE TABLE `player` (
  `id_player` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_inventory` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_professions` int(11) NOT NULL,
  `id_horse` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `id_achievements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `player`
--

INSERT INTO `player` (`id_player`, `username`, `id_profile`, `id_inventory`, `id_bank`, `id_professions`, `id_horse`, `id_quest`, `id_achievements`) VALUES
(1, 'Tweek', 1, 1, 1, 1, 1, 1, 1),
(2, 'Uprising', 2, 2, 2, 2, 2, 2, 2),
(3, 'Indominus', 3, 3, 3, 3, 3, 3, 3),
(4, 'Alley Frog', 4, 4, 4, 4, 4, 4, 4),
(5, 'Trip', 5, 5, 5, 5, 5, 5, 5),
(6, 'Rigs', 6, 6, 6, 6, 6, 6, 6),
(7, 'Fire-Bred', 7, 7, 7, 7, 7, 7, 7),
(8, 'Doom', 8, 8, 8, 8, 8, 8, 8),
(9, 'Insurgent', 9, 9, 9, 9, 9, 9, 9),
(10, 'Grave', 10, 10, 10, 10, 10, 10, 10),
(11, 'Gunner', 11, 11, 11, 11, 11, 11, 11),
(12, 'Doom', 12, 12, 12, 12, 12, 12, 12),
(13, 'Skinner', 13, 13, 13, 13, 13, 13, 13),
(14, 'Cannon', 14, 14, 14, 14, 14, 14, 14),
(15, 'Cannon', 15, 15, 15, 15, 15, 15, 15),
(16, 'Back Bett', 16, 16, 16, 16, 16, 16, 16),
(17, 'Scar', 17, 17, 17, 17, 17, 17, 17),
(18, 'Slasher', 18, 18, 18, 18, 18, 18, 18),
(19, 'Bullet-Proof', 19, 19, 19, 19, 19, 19, 19),
(20, 'Admiral Tot', 20, 20, 20, 20, 20, 20, 20),
(21, 'Scar', 21, 21, 21, 21, 21, 21, 21),
(22, 'Subversion', 22, 22, 22, 22, 22, 22, 22),
(23, 'Pursuit', 23, 23, 23, 23, 23, 23, 23),
(24, 'Fire-Bred', 24, 24, 24, 24, 24, 24, 24),
(25, 'Mad Dog', 25, 25, 25, 25, 25, 25, 25),
(26, 'Cobra', 26, 26, 26, 26, 26, 26, 26),
(27, 'Alley Frog', 27, 27, 27, 27, 27, 27, 27),
(28, 'Tito', 28, 28, 28, 28, 28, 28, 28),
(29, 'Admiral Tot', 29, 29, 29, 29, 29, 29, 29),
(30, 'Hurricane', 30, 30, 30, 30, 30, 30, 30),
(31, 'Hash', 31, 31, 31, 31, 31, 31, 31),
(32, 'Gargoyle', 32, 32, 32, 32, 32, 32, 32),
(33, 'Kevlar', 33, 33, 33, 33, 33, 33, 33),
(34, 'Angel', 34, 34, 34, 34, 34, 34, 34),
(35, 'Rebellion', 35, 35, 35, 35, 35, 35, 35),
(36, 'Ranger', 36, 36, 36, 36, 36, 36, 36),
(37, 'Admiral Tot', 37, 37, 37, 37, 37, 37, 37),
(38, 'Rubble', 38, 38, 38, 38, 38, 38, 38),
(39, 'Ironclad', 39, 39, 39, 39, 39, 39, 39),
(40, 'Ripley', 40, 40, 40, 40, 40, 40, 40),
(41, 'Angel', 41, 41, 41, 41, 41, 41, 41),
(42, 'Sick Rebellious Names', 42, 42, 42, 42, 42, 42, 42),
(43, 'Titanium', 43, 43, 43, 43, 43, 43, 43),
(44, 'Decay', 44, 44, 44, 44, 44, 44, 44),
(45, 'Skinner', 45, 45, 45, 45, 45, 45, 45),
(46, 'Clink', 46, 46, 46, 46, 46, 46, 46),
(47, 'Knuckles', 47, 47, 47, 47, 47, 47, 47),
(48, 'Fester', 48, 48, 48, 48, 48, 48, 48),
(49, 'Cobra', 49, 49, 49, 49, 49, 49, 49),
(50, 'Slasher', 50, 50, 50, 50, 50, 50, 50),
(51, 'Cobra', 51, 51, 51, 51, 51, 51, 51),
(52, 'Alpha', 52, 52, 52, 52, 52, 52, 52),
(53, 'Doyle', 53, 53, 53, 53, 53, 53, 53),
(54, 'Flack', 54, 54, 54, 54, 54, 54, 54),
(55, 'Rubble', 55, 55, 55, 55, 55, 55, 55),
(56, 'Xrynsltn', 56, 56, 56, 56, 56, 56, 56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `professions`
--

CREATE TABLE `professions` (
  `id_professions` int(11) NOT NULL,
  `worker` int(11) NOT NULL,
  `crafter` int(11) NOT NULL,
  `lootboxer` int(11) NOT NULL,
  `merchant` int(11) NOT NULL,
  `enchanter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `professions`
--

INSERT INTO `professions` (`id_professions`, `worker`, `crafter`, `lootboxer`, `merchant`, `enchanter`) VALUES
(1, 133, 23, 81, 137, 111),
(2, 77, 62, 28, 98, 1),
(3, 94, 66, 86, 70, 85),
(4, 14, 78, 28, 4, 3),
(5, 35, 45, 75, 86, 118),
(6, 3, 113, 73, 35, 39),
(7, 143, 33, 107, 16, 80),
(8, 132, 10, 2, 119, 115),
(9, 127, 88, 30, 16, 36),
(10, 114, 72, 57, 69, 54),
(11, 121, 43, 28, 131, 19),
(12, 131, 134, 134, 133, 47),
(13, 95, 120, 54, 21, 133),
(14, 115, 148, 149, 116, 39),
(15, 137, 94, 55, 35, 30),
(16, 1, 91, 142, 113, 10),
(17, 101, 110, 109, 134, 76),
(18, 85, 5, 93, 110, 16),
(19, 117, 4, 6, 136, 134),
(20, 23, 8, 149, 83, 72),
(21, 145, 26, 71, 44, 66),
(22, 17, 112, 32, 44, 68),
(23, 29, 21, 22, 83, 72),
(24, 87, 136, 90, 58, 83),
(25, 137, 131, 11, 23, 98),
(26, 31, 54, 99, 141, 102),
(27, 140, 133, 143, 103, 57),
(28, 30, 4, 144, 140, 101),
(29, 95, 137, 104, 47, 109),
(30, 141, 106, 3, 113, 83),
(31, 148, 115, 102, 39, 59),
(32, 70, 60, 55, 63, 127),
(33, 95, 71, 56, 131, 13),
(34, 6, 149, 98, 17, 56),
(35, 40, 23, 45, 60, 14),
(36, 8, 42, 97, 94, 101),
(37, 40, 105, 17, 124, 128),
(38, 67, 57, 96, 72, 49),
(39, 9, 149, 35, 147, 133),
(40, 128, 77, 57, 59, 128),
(41, 142, 21, 84, 74, 59),
(42, 65, 144, 126, 73, 8),
(43, 139, 107, 83, 80, 6),
(44, 3, 23, 29, 115, 113),
(45, 48, 10, 12, 63, 62),
(46, 145, 2, 111, 60, 45),
(47, 97, 96, 51, 145, 64),
(48, 114, 110, 135, 36, 48),
(49, 72, 126, 134, 130, 144),
(50, 150, 35, 108, 43, 109),
(51, 101, 100, 100, 100, 100),
(52, 100, 100, 100, 100, 100),
(53, 1, 1, 1, 1, 1),
(54, 1, 1, 1, 1, 1),
(55, 1, 1, 1, 1, 1),
(56, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `atk` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  `sword` varchar(255) NOT NULL,
  `armor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `level`, `atk`, `def`, `hp`, `sword`, `armor`) VALUES
(1, 1652, 701, 801, 5901, 'Omega Sword', 'Omega Armor'),
(2, 3671, 913, 115, 7835, 'Hair Sword', 'Mermaid Armor'),
(3, 5397, 525, 333, 5166, 'Basic Sword', 'Ultra-Omega Armor'),
(4, 903, 237, 2, 1413, 'Apple Sword', 'Banana Armor'),
(5, 3353, 259, 998, 386, 'Hair Sword', 'Omega Armor'),
(6, 5430, 996, 53, 2275, 'Zombie Sword', 'Fish Armor'),
(7, 634, 114, 667, 3832, 'Unicorn Sword', 'Elecrtronical Armor'),
(8, 1326, 631, 670, 3750, 'Ruby Sword', 'Ruby Armor'),
(9, 528, 438, 50, 1646, 'Edgy Sword', 'Eye Armor'),
(10, 2306, 749, 900, 4097, 'Ultra-Edgy Sword', 'Eye Armor'),
(11, 3825, 419, 435, 8695, 'Ultra-Omega Sword', 'Edgy Armor'),
(12, 812, 919, 31, 6561, 'Edgy Sword', 'Basic Armor'),
(13, 2558, 945, 935, 8144, 'Ultra-Omega Sword', 'Fish Armor'),
(14, 4950, 61, 647, 1394, 'Ultra-Omega Sword', 'Ultra-Omega Armor'),
(15, 3609, 860, 41, 7437, 'Zombie Sword', 'Epic Armor'),
(16, 6512, 495, 416, 6630, 'Coin Sword', 'Edgy Armor'),
(17, 5749, 97, 120, 2989, 'Ultra-Omega Sword', 'Ruby Armor'),
(18, 6008, 748, 519, 5915, 'Ultra-Edgy Sword', 'Ultra-Edgy Armor'),
(19, 2280, 876, 591, 5872, 'Coin Sword', 'Elecrtronical Armor'),
(20, 6564, 570, 614, 6857, 'Banana Sword', 'Eye Armor'),
(21, 4227, 210, 666, 9143, 'Zombie Sword', 'Ultra-Omega Armor'),
(22, 5306, 110, 358, 6669, 'Apple Sword', 'Coin Armor'),
(23, 2823, 15, 183, 736, 'Banana Sword', 'Eye Armor'),
(24, 3744, 947, 49, 3456, 'Edgy Sword', 'Banana Armor'),
(25, 3025, 578, 461, 2325, 'Ruby Sword', 'Epic Armor'),
(26, 5485, 830, 956, 6624, 'Elecrtronical Sword', 'Edgy Armor'),
(27, 2183, 184, 847, 2513, 'Banana Sword', 'Basic Armor'),
(28, 1288, 134, 959, 2505, 'Wooden Sword', 'Wolf Armor'),
(29, 5754, 770, 157, 2875, 'Coin Sword', 'Banana Armor'),
(30, 5004, 593, 551, 8821, 'Unicorn Sword', 'Coin Armor'),
(31, 2500, 815, 920, 5481, 'Zombie Sword', 'Eye Armor'),
(32, 6040, 152, 834, 486, 'Edgy Sword', 'Epic Armor'),
(33, 3833, 88, 340, 5938, 'Elecrtronical Sword', 'Ultra-Edgy Armor'),
(34, 902, 63, 217, 6395, 'Elecrtronical Sword', 'Ultra-Edgy Armor'),
(35, 2383, 912, 481, 3782, 'Omega Sword', 'Banana Armor'),
(36, 1623, 438, 852, 5750, 'Omega Sword', 'Eye Armor'),
(37, 802, 727, 645, 9049, 'Elecrtronical Sword', 'Basic Armor'),
(38, 3873, 166, 842, 3243, 'Epic Sword', 'Ruby Armor'),
(39, 3430, 46, 663, 2782, 'Ultra-Edgy Sword', 'Omega Armor'),
(40, 2392, 589, 104, 561, 'Apple Sword', 'Fish Armor'),
(41, 6531, 983, 82, 163, 'Ultra-Omega Sword', 'Ultra-Omega Armor'),
(42, 4185, 788, 495, 9053, 'Omega Sword', 'Elecrtronical Armor'),
(43, 1081, 139, 849, 1157, 'Omega Sword', 'Coin Armor'),
(44, 2260, 989, 718, 6844, 'Epic Sword', 'Mermaid Armor'),
(45, 4856, 849, 681, 7245, 'Basic Sword', 'Fish Armor'),
(46, 5059, 856, 800, 2734, 'Ultra-Omega Sword', 'Ultra-Omega Armor'),
(47, 4250, 44, 591, 2275, 'Epic Sword', 'Eye Armor'),
(48, 3432, 263, 977, 2123, 'Ultra-Omega Sword', 'Ultra-Edgy Armor'),
(49, 629, 165, 941, 4532, 'Elecrtronical Sword', 'Elecrtronical Armor'),
(50, 3704, 276, 210, 9520, 'Hair Sword', 'Mermaid Armor'),
(51, 5301, 111, 359, 6666, 'Apple Sword', 'Coin Armor'),
(52, 10000, 10000, 10000, 10000, 'Ultra-Edgy Sword', 'Ultra-Omega Armor'),
(53, 1, 1, 1, 1, 'Basic Sword', 'Basic Armor'),
(54, 1, 1, 1, 1, 'Edgy Sword', 'Edgy Armor'),
(55, 100, 1, 1, 1, 'Ultra-Edgy Sword', 'Ultra-Omega Armor'),
(56, 1, 1, 1, 1, '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quest`
--

CREATE TABLE `quest` (
  `id_quest` int(11) NOT NULL,
  `quest` varchar(255) NOT NULL,
  `detail_quest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quest`
--

INSERT INTO `quest` (`id_quest`, `quest`, `detail_quest`) VALUES
(1, '-', '-'),
(2, 'Guild Quest', 'Do a guild raid'),
(3, 'Adventure Quest', 'Do an Adventure command'),
(4, 'Cooking Quest', 'Cook 5 Filled Lootbox'),
(5, 'Arena Quest', 'Join an Arena'),
(6, 'Crafting Quest', 'Craft 6 Potion'),
(7, 'Adventure Quest', 'Do an Adventure command'),
(8, 'Hunt Quest', 'Kill 5 Giant'),
(9, 'Gambling Quest', 'Get at least 159265 coins with gambling commands'),
(10, '-', '-'),
(11, 'Cooking Quest', 'Cook 5 Baked Fish'),
(12, 'Cooking Quest', 'Cook 4 Apple Juice'),
(13, 'Guild Quest', 'Do a guild raid'),
(14, 'Crafting Quest', 'Craft 1 Seed'),
(15, 'Guild Quest', 'Do a guild raid'),
(16, '-', '-'),
(17, 'Arena Quest', 'Join an Arena'),
(18, 'Cooking Quest', 'Cook 4 Carrot Bread'),
(19, 'Guild Quest', 'Do a guild raid'),
(20, 'Cooking Quest', 'Cook 3 Hairn'),
(21, 'Guild Quest', 'Do a guild raid'),
(22, 'Trading Quest', 'Do a trade with the EPIC NPC'),
(23, '-', '-'),
(24, 'Hunt Quest', 'Kill 5 Wild Sharpener'),
(25, 'Trading Quest', 'Do a trade with the EPIC NPC'),
(26, 'Gambling Quest', 'Get at least 73558 coins with gambling commands'),
(27, 'Miniboss Quest', 'Summon and kill a miniboss'),
(28, '-', '-'),
(29, 'Trading Quest', 'Do a trade with the EPIC NPC'),
(30, '-', '-'),
(31, 'Adventure Quest', 'Do an Adventure command'),
(32, 'Adventure Quest', 'Do an Adventure command'),
(33, 'Arena Quest', 'Join an Arena'),
(34, 'Cooking Quest', 'Cook 4 Coin Sandwich'),
(35, '-', '-'),
(36, 'Guild Quest', 'Do a guild raid'),
(37, 'Guild Quest', 'Do a guild raid'),
(38, 'Guild Quest', 'Do a guild raid'),
(39, 'Gambling Quest', 'Get at least 159349 coins with gambling commands'),
(40, 'Trading Quest', 'Do a trade with the EPIC NPC'),
(41, 'Trading Quest', 'Do a trade with the EPIC Player'),
(42, 'Crafting Quest', 'Craft 8 Seed'),
(43, 'Trading Quest', 'Do a trade with the EPIC NPC'),
(44, '-', '-'),
(45, 'Trading Quest', 'Do a trade with the EPIC NPC'),
(46, 'Adventure Quest', 'Do an Adventure command'),
(47, 'Adventure Quest', 'Do an Adventure command'),
(48, 'Guild Quest', 'Do a guild raid'),
(49, 'Cooking Quest', 'Cook 3 Carrot Bread'),
(50, 'Arena Quest', 'Join an Arena'),
(51, 'FINAL BOSS QUESTT', 'KALAHKAN FINAL BOSS'),
(52, 'FINAL BOSS QUESTT', 'Beat Final Boss'),
(53, '-', '-'),
(54, '-', '-'),
(55, '-', '-'),
(56, 'FINAL BOSS QUESTT', 'Beat Final Boss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `tgl_lahir`, `email`, `agama`, `jenis_kelamin`) VALUES
(1, 'tes', '$2y$10$lphDT7BUk8VW04ii2Z.Ng.6p08ZltIaoHmKmoW5qCa7D5Qd0qVI7q', '2022-11-27', 'fauzansuken@gmail.com', 'Islam', ''),
(2, 'kenn.dev', '$2y$10$KgVGFWMKDp317Bf3mZiXJuIAB9ZzqkjofBsxA8Z//WvDaB2OPLYDq', '2022-11-27', 'fauzansuken@gmail.com', 'Islam', 'Pria'),
(3, 'asd', '$2y$10$3/o8jTzX5EBk0JN0j4VD5ej6sqjNEkz3V6qpgP5Rfo1iOewLxe30q', '2022-12-08', 'fauzansuken@gmail.com', 'Islam', 'Pria'),
(4, 'asdasd', '$2y$10$N/NDmvnUsANYfHUEyqeTeOw011gp9xHk3BxFk0ooM5naia2LI9NIW', '2022-11-27', 'fauzansuken@gmail.com', 'Kristen', 'Pria'),
(5, 'sadmin', '$2y$10$ad3y3Nl82.Ij4F/UOialBePLgM/.KYTFulLN5zBENt9NFwKnbFamO', '2022-11-27', 'fauzansuken@gmail.com', 'Islam', 'Pria'),
(6, 'asd2', '$2y$10$5fXu6jFKAx/47b1QAqDbWeqef9Dxhh4csTF3DI4ISRdupVKro6bB2', '2022-11-27', 'fauzansuken@gmail.com', 'Islam', 'Pria'),
(7, 'asd1', '$2y$10$kfxx7un70GsbdxHuFfdwJOS7SdgvTJTQa6GsHCLiIpPcpbIVVcKPe', '2022-11-27', 'fauzansuken@gmail.com', 'Kristen', 'Pria'),
(8, 'asd3', '$2y$10$vgLR4YIrte6fYSuwrx8nPOa.YNAYDFtaypoBCsZSzBSAwEU3wmLDu', '2022-11-27', 'fauzansuken@gmail.com', 'Islam', 'Pria');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id_achievements`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `horse`
--
ALTER TABLE `horse`
  ADD PRIMARY KEY (`id_horse`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inventory`);

--
-- Indeks untuk tabel `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id_player`),
  ADD KEY `id_achievements` (`id_achievements`),
  ADD KEY `id_horse` (`id_horse`),
  ADD KEY `id_inventory` (`id_inventory`),
  ADD KEY `id_professions` (`id_professions`),
  ADD KEY `id_profile` (`id_profile`),
  ADD KEY `id_quest` (`id_quest`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indeks untuk tabel `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id_professions`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indeks untuk tabel `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`id_quest`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id_achievements` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `horse`
--
ALTER TABLE `horse`
  MODIFY `id_horse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inventory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `player`
--
ALTER TABLE `player`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `professions`
--
ALTER TABLE `professions`
  MODIFY `id_professions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `quest`
--
ALTER TABLE `quest`
  MODIFY `id_quest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`id_achievements`) REFERENCES `achievements` (`id_achievements`),
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`id_horse`) REFERENCES `horse` (`id_horse`),
  ADD CONSTRAINT `player_ibfk_3` FOREIGN KEY (`id_inventory`) REFERENCES `inventory` (`id_inventory`),
  ADD CONSTRAINT `player_ibfk_4` FOREIGN KEY (`id_professions`) REFERENCES `professions` (`id_professions`),
  ADD CONSTRAINT `player_ibfk_5` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`),
  ADD CONSTRAINT `player_ibfk_6` FOREIGN KEY (`id_quest`) REFERENCES `quest` (`id_quest`),
  ADD CONSTRAINT `player_ibfk_7` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
