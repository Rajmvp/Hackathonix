-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 05:05 PM
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
-- Database: `epicbooks`
--
CREATE DATABASE IF NOT EXISTS `epicbooks` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `epicbooks`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'sagar', 'sagar12'),
(2, 'aman', 'aman23');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `pub_date` date NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `edition` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `isbn`, `genre`, `pub_date`, `publisher`, `pages`, `language`, `edition`, `price`, `description`, `pdf_file`, `cover_image`) VALUES
(25, 'The 48 Laws of Power', 'Robert Greene', '978-0143039945', 'Psychology', '2000-10-12', 'Penguin Books', 476, 'English', 'First Edition', 16.00, '\"The 48 Laws of Power\" is a guide to gaining and maintaining power, drawing on historical examples and lessons. Each law is illustrated with anecdotes and advice, offering insights into the dynamics of power and manipulation. The book covers topics such as deception, strategy, and the psychology of power, making it a popular read for those interested in leadership and influence.', 'The+48+Laws+Of+Power.pdf', 'image-736x962.jpg'),
(26, 'Ice Bear: The Cultural History of an Arctic Icon', ' Michael Engelhard', '9780295999300', 'Cultural history, Nature, Environmental studies', '2016-11-07', 'University of Washington Press', 288, 'English', 'First Edition', 17.00, 'Ice Bear: The Cultural History of an Arctic Icon explores the polar bear\'s role as both a biological and cultural symbol, spanning indigenous beliefs, artistic representations, and its contemporary use in environmental campaigns. Engelhard uses a blend of historical research, storytelling, and over 160 illustrations to paint a comprehensive portrait of the polar bear’s symbolic significance throughout human history. This book is particularly relevant in discussions of climate change, as the polar bear has also become an emblem of environmental issues.\r\n\r\nYou can explore or purchase the book from the University of Washington Press or other retailers like Amazon.', 'Ice Bear The Cultural History of an Arctic.pdf', 'image-739x962.jpg'),
(27, 'Boundaries: When to Say YES, When to Say NO, To Take Control of Your Life', 'Dr. Henry Cloud, Dr. John Townsend', '9780310247456', 'Self-Help, Psychology, Personal Development', '1992-10-01', ' Zondervan', 357, 'English', ' Revised and Updated Edition', 20.00, ' This book provides guidance on establishing healthy boundaries in relationships, work, and personal life. It teaches how to take control by setting limits and learning to say \'no\' in situations where you feel overwhelmed or taken advantage of, while maintaining personal integrity and well-being.', 'Boundaries.pdf', 'Boundaries.jpg'),
(28, ' Give and Take: Why Helping Others Drives Our Success', 'Adam Grant', '9780670026555', 'Business, Self-Help, Psychology', '2013-04-09', 'Viking', 260, 'English', ' First Edition', 17.00, 'In \"Give and Take,\" Adam Grant explores how different approaches to interactions—whether you\'re a giver, taker, or matcher—can impact your success. Drawing on groundbreaking research, Grant reveals that giving can be a powerful strategy for personal and professional growth. The book provides insights into how generosity leads to greater long-term rewards and challenges common notions about what drives achievement and productivity.', 'Give and Take.pdf', 'Give and Take.jpg'),
(29, 'Harry Potter All Collection', 'J.K. Rowling', '9780439708180 ', 'Fantasy, Adventure, Young Adult', '1998-09-01', 'Scholastic , Bloomsbury ', 3623, 'English', ' First Edition', 35.00, 'The Harry Potter series, written by J.K. Rowling, is a seven-book fantasy saga that follows the journey of a young boy, Harry Potter, who discovers on his 11th birthday that he is a wizard. The series begins with Harry Potter and the Sorcerer\'s Stone, where Harry is introduced to the magical world, attends Hogwarts School of Witchcraft and Wizardry, and learns of his unique destiny. As the story progresses, Harry, along with his friends Hermione Granger and Ron Weasley, faces increasingly dangerous challenges, including his encounters with the dark wizard Lord Voldemort, who killed his parents and seeks to dominate the magical world.', 'harrypotter.pdf', 'Harry Potter.jpg'),
(30, 'The Art of War', 'Sun Tzu', '9781590302255', 'Military Strategy, Philosophy, History', '0001-01-01', 'Shambhala', 66, 'English', ' First Edition', 15.00, '\"The Art of War\" is an ancient Chinese military treatise attributed to Sun Tzu, offering timeless wisdom on warfare, strategy, and leadership. Though originally intended for military leaders, its insights have been applied to modern-day business, politics, and personal success. Key themes include adaptability, strategic planning, and understanding both your strengths and weaknesses, making it a must-read for those seeking to excel in competitive fields.', 'The Art Of War.pdf', 'The Art of war.jpg'),
(31, 'The Jungle Book', 'Rudyard Kipling', '9781503332546', 'Adventure, Children\'s Literature, Fiction', '1984-01-01', 'Originally published by Macmillan & Co., multiple modern editions by various publishers', 210, 'English', ' First Edition', 20.00, '\"The Jungle Book\" is a classic collection of stories by Rudyard Kipling, primarily centered around Mowgli, a boy raised by wolves in the jungles of India. The book includes various tales of animals and adventure, featuring beloved characters such as Baloo the bear, Bagheera the panther, and Shere Khan the tiger. Kipling’s stories explore themes of survival, respect for nature, and the balance between civilization and the wild. It remains a timeless piece of literature, appealing to readers of all ages.', 'The Jungle Book.pdf', 'The Jungle Book.jpg'),
(32, 'To Kill a Mockingbird', 'Harper Lee', '9780060935467', 'Fiction, Historical Fiction, Coming-of-Age', '1960-07-11', 'J.B. Lippincott & Co.,modern editions by Harper Perennial', 285, 'English', 'Multiple editions', 21.00, ' \"To Kill a Mockingbird\" is a Pulitzer Prize-winning novel that addresses serious issues like racial injustice and moral growth in the American South during the 1930s. The story is told through the eyes of young Scout Finch, whose father, Atticus Finch, defends a Black man wrongly accused of raping a white woman. With themes of empathy, justice, and courage, the book has become a classic in American literature and continues to be widely studied for its powerful portrayal of social issues.', 'To kill Mockingbird.pdf', 'To kill Mockingbird.jpg'),
(33, 'Worrying: A Literary and Cultural History', 'Francis O\'Gorman', '9781620400892', 'Cultural Studies, Psychology, Literary Criticism', '2015-03-11', 'Bloomsbury USA', 210, 'English', ' First Edition', 22.00, '\"Worrying: A Literary and Cultural History\" explores the nature of worry from historical, psychological, and cultural perspectives. Francis O\'Gorman delves into how worrying has been reflected in literature and culture throughout history and how it shapes individual and collective consciousness. The book draws on a wide range of examples, from literature, art, and philosophy, to analyze the anxieties of modern life, offering insights into how worrying has become an intrinsic part of the human experience.', 'worrying a literary and cultural history.pdf', 'worrying a literary and cultural history.jpg'),
(34, 'The Laws of Connection: The Scientific Secrets of Building a Strong Social Network', 'David Robson', '978-0399588402', ' Nonfiction, Psychology, Social Science, Personal Development', '2022-04-05', 'Penguin Life', 346, 'English', 'Hardcover, Kindle Edition, Audiobook', 25.00, ' The Laws of Connection delves into the science behind building meaningful social connections. David Robson explores how relationships shape our lives, based on research in psychology, neuroscience, and social science. The book identifies key principles and strategies—referred to as \"laws\"—that can help individuals build a strong, supportive social network. Robson combines cutting-edge research with practical advice on improving one\'s ability to connect, communicate, and form deep, lasting relationships, both personally and professionally. Ideal for anyone seeking to enhance their social skills, this book is rooted in science and full of evidence-backed techniques for thriving in our increasingly interconnected world.', 'The Laws of connection.pdf', 'Elisha Zepeda _ Faceout Studio.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `epicbooks_contacts`
--

CREATE TABLE `epicbooks_contacts` (
  `id` int(11) NOT NULL,
  `fkUserId` int(22) NOT NULL,
  `name` varchar(22) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(22) NOT NULL,
  `query` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `epicbooks_contacts`
--

INSERT INTO `epicbooks_contacts` (`id`, `fkUserId`, `name`, `email`, `number`, `query`) VALUES
(8, 6, 'aman', ' aman@gmail.com', '+91 2235568890', 'adfaf');

-- --------------------------------------------------------

--
-- Table structure for table `epicbooks_users`
--

CREATE TABLE `epicbooks_users` (
  `id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `username` varchar(55) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `darkmode` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `epicbooks_users`
--

INSERT INTO `epicbooks_users` (`id`, `name`, `email`, `username`, `password`, `darkmode`) VALUES
(6, 'aman', 'aman@gmail.com', 'aman', '$2y$10$4qe36X0xn2f5C4zXOsUj6eu.06UWboSQfIGPTNOjJcR.zBEOzzXoK', 'N'),
(7, 'Diablo', 'Diablo@gmail.com', 'Diablo', '$2y$10$8Wx.yBoQOcGAjl/SB8.lU.cHbGX3iW4MbIWGjWVeOqxSJ1z9X7686', 'N'),
(10, 'Ram', 'Ram@gmail.com', 'ram', '$2y$10$ajoi57.rf94vrWalyS604uczPXpC/bG2dNW6ywpPCw/MIU3mUdsVq', 'N'),
(11, 'david', 'david@gmail.com', 'david', '$2y$10$fkPXmwDlrZrDrlrm0DPWcOqxiPIax0i8Uyadj44pj1/KaOLjnYPAa', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epicbooks_contacts`
--
ALTER TABLE `epicbooks_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkUserId` (`fkUserId`);

--
-- Indexes for table `epicbooks_users`
--
ALTER TABLE `epicbooks_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `epicbooks_contacts`
--
ALTER TABLE `epicbooks_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `epicbooks_users`
--
ALTER TABLE `epicbooks_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `epicbooks_contacts`
--
ALTER TABLE `epicbooks_contacts`
  ADD CONSTRAINT `fkUserId` FOREIGN KEY (`fkUserId`) REFERENCES `epicbooks_users` (`id`);
--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `pub_date` date NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `edition` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"epicbooks\",\"table\":\"epicbooks_users\"},{\"db\":\"epicbooks\",\"table\":\"admin\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2025-02-03 16:04:52', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `sagar`
--
CREATE DATABASE IF NOT EXISTS `sagar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sagar`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'sagar', '123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `number` int(22) NOT NULL,
  `query` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `number`, `query`) VALUES
(1, 'naruto ', 'mailtopriyaanytime@gma', 1234123412, 'this is itachi ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `description` varchar(22) NOT NULL,
  `mrp` int(22) NOT NULL,
  `offer price` int(22) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `mrp`, `offer price`, `images`) VALUES
(8, 'asdf', 'adf', 0, 0, 'dog.jpg'),
(9, 'aman', 'adfadfasdfaa', 2222, 10, 'wallpaperflare.com_wallpaper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `username` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Sagar', 'sagar@gmail.com', 'sagar', '1234'),
(3, 'Kakashi', 'kakashi@gmail.com', 'kakashi', '1234'),
(4, 'Itadori', 'itadori@gmail.com', 'itadori', '1234'),
(6, 'Gojo', 'sgojo@gmail.com', 'gojo', '1234'),
(9, 'aman', 'aman@gmail.com', 'orchadman', '1122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
