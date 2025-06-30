-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 01:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magick_guestbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `variant` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `message` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `name`, `variant`, `size`, `quantity`, `total_price`, `message`, `date_posted`) VALUES
(1, 'Hermione', 'Luna Serenitas', '30ml Spray', 2, 398.00, 'This potion reminds me of moonlit strolls through the Hogwarts gardens. Gentle, calming, and enchantingly nostalgic. ✨ Thank you for crafting such a serene essence!', '2025-06-30 23:19:23'),
(2, 'Gillian', 'Amore Creatrix', '10ml Roll-on', 1, 99.00, 'The scent of Amore Creatrix is like a love spell in bloom — soft, warm, and impossible to forget. I feel like I’ve been kissed by a midsummer dream.', '2025-06-30 23:20:32'),
(3, 'Micaella', 'Lux Abundantia', '30ml Spray', 3, 597.00, 'Every spritz feels like abundance pouring into my day. A perfect charm for mornings filled with promise and golden light.', '2025-06-30 23:21:22'),
(4, 'Jaira', 'Ardor Victor', '10ml Roll-on', 2, 198.00, 'Strong and fearless — Ardor Victor ignites something powerful in me. It’s my invisible armor in a bottle. Love it!', '2025-06-30 23:21:48'),
(5, 'Russell', 'Vir Fortis', '30ml Spray', 1, 199.00, 'It’s like the forest breathed strength into a fragrance. Earthy and wise, Vir Fortis makes me feel like a grounded wizard of the old world.', '2025-06-30 23:22:07'),
(6, 'Andres', 'Luna Serenitas', '10ml Roll-on', 2, 198.00, 'I keep coming back to Luna Serenitas. It calms the chaos and lets me breathe deeply — a true spell of serenity in these restless days.', '2025-06-30 23:22:28'),
(7, 'Justine', 'Amore Creatrix', '10ml Roll-on', 1, 99.00, 'Amore Creatrix feels like poetry on the skin — sweet, soulful, and filled with soft magic. It lingers like a beautiful memory.', '2025-06-30 23:23:01'),
(8, 'Asnaira', 'Vir Fortis', '30ml Spray', 1, 199.00, 'A potion of resilience and grace. Vir Fortis uplifts me — I wear it when I need to remember my inner strength and quiet fire.', '2025-06-30 23:23:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
