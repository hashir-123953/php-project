-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2026 at 07:54 PM
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
-- Database: `hashir`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled','no_show') DEFAULT 'pending',
  `total_amount` decimal(10,2) DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `image`, `created_at`) VALUES
(12, 'The Midnight Library', 'Matt Haig', 2000.00, '1776947502_midnight library.png', '2026-04-23 12:31:42'),
(13, 'Comic Book: Vortex', 'J. Torres', 900.00, '1776947602_second image.png', '2026-04-23 12:33:22'),
(14, 'General Knowledge 2026', 'Dr. R. Sharma', 1050.00, '1776947709_general knowledge .png', '2026-04-23 12:35:09'),
(15, 'Harry Potter And The Philosopher \'s Stone', 'J.k Rowling', 1200.00, 'book1.jpg', '2026-04-24 14:44:47'),
(16, 'Charlotte \'s Web', 'E.B White', 800.00, 'book2.jpg', '2026-04-24 14:50:05'),
(17, 'The Very Hungry Catepillar', 'Eric Carle', 950.00, 'book3.jpg', '2026-04-24 14:58:17'),
(18, 'THE Little Prince', 'Antoine De Saint-Exupery', 600.00, 'book4.jpg', '2026-04-24 14:59:45'),
(19, 'Charlie And The Chocolate Factory', 'Roald Dahl', 850.00, 'book5.jpg', '2026-04-24 15:00:47'),
(20, 'The Hobbit', 'J.R.R. Tolkien', 1500.00, 'book6.jpg', '2026-04-24 15:01:44'),
(21, 'Green Eggs And Ham', 'Dr.Seuss', 700.00, 'book7.jpg', '2026-04-24 15:02:31'),
(22, 'The Tale Of Peter Rabbit', 'Beatrix Potter', 500.00, 'book8.jpg', '2026-04-24 15:03:18'),
(23, 'Where The Wild Things Are ', 'Maurice Sendak', 900.00, 'book9.jpg', '2026-04-24 15:04:41'),
(24, 'Good Night Moon ', 'Margaret Wise Brown', 800.00, 'book10.jpg', '2026-04-24 15:05:58'),
(25, 'Animal Farm', 'George Orwell', 400.00, 'book11.jpg', '2026-04-24 15:07:09'),
(26, 'Alice \'s Adventures In Wonderland', 'Lewis Carroll', 750.00, 'book12.jpg', '2026-04-24 15:10:01'),
(28, 'The Secret Garden', 'Frances Hodgson Burnett', 650.00, 'book13.jpg', '2026-04-24 15:13:43'),
(29, 'The Lion, The Witch And The Wardrobe', 'C.S. Lewis', 1000.00, 'book14.jpg', '2026-04-24 15:15:36'),
(30, 'Matilda ', 'Roald Dahl', 1250.00, 'book15.jpg', '2026-04-24 15:16:46'),
(31, 'Diary Of A Wimpy Kid', 'Jeff Kinney', 1100.00, 'book16.jpg', '2026-04-24 15:18:06'),
(32, 'The Cat In The Hat ', 'Dr.Seuss', 750.00, 'book17.jpg', '2026-04-24 15:19:21'),
(33, 'Black Beauty', 'Anna Sewell', 550.00, 'book18.jpg', '2026-04-24 15:21:19'),
(34, 'Winnie-The-Pooh', 'A.A. Milne', 900.00, 'book19.jpg', '2026-04-24 15:23:05'),
(35, 'The Alchemist', 'Paulo Coelho', 750.00, 'book20.jpg', '2026-04-24 15:24:13'),
(36, 'Wonder', 'R.J. Palacio', 1200.00, 'book21.jpg', '2026-04-24 15:25:11'),
(37, 'The BFG', 'Roald Dahl', 850.00, 'book22.jpg', '2026-04-24 15:27:16'),
(38, ' Treasure Island	', 'Robert Louis Stevenson', 600.00, 'book23.jpg', '2026-04-24 15:35:02'),
(39, 'Peter Pan	', 'J.M. Barrie	', 700.00, 'book24.jpg', '2026-04-24 15:36:13'),
(40, 'Little Women	', 'Louisa May Alcott', 550.00, 'book25.jpg', '2026-04-24 15:37:10'),
(41, 'The Gruffalo		', 'Julia Donaldson', 800.00, 'book26.jpg', '2026-04-24 15:37:48'),
(42, 'James and the Giant Peach		', 'Roald Dahl', 800.00, 'book27.jpg', '2026-04-24 15:38:35'),
(43, 'Grimm’s Fairy Tales', 'Brothers Grimm', 1000.00, 'book28.jpg', '2026-04-24 15:39:36'),
(44, 'The Giving Tree', 'Shel Silverstein', 1100.00, 'book29.jpg', '2026-04-24 15:41:19'),
(45, 'Holes		', 'Louis Sachar', 950.00, 'book30.jpg', '2026-04-24 15:42:19'),
(46, 'The Snowy Day		', 'Ezra Jack Keats', 850.00, 'book31.jpg', '2026-04-24 15:43:01'),
(47, 'Bridge to Terabithia	', 'Katherine Paterson', 700.00, 'book32.jpg', '2026-04-24 15:43:56'),
(48, 'The Wind in the Willows		', 'Kenneth Grahame', 900.00, 'book33.jpg', '2026-04-24 15:44:33'),
(49, 'To Kill a Mockingbird		', 'Harper Lee', 650.00, 'book34.jpg', '2026-04-25 16:58:20'),
(50, 'Percy Jackson & The Lightning Thief		', 'Rick Riordan', 1100.00, 'book35.jpg', '2026-04-25 17:02:36'),
(51, 'The Book Thief		', 'Markus Zusak', 1350.00, 'book36.jpg', '2026-04-26 13:36:05'),
(52, 'A Wrinkle in Time		', 'Madeleine L Engle', 900.00, 'book37.jpg', '2026-04-26 13:49:13'),
(53, 'The Jungle Book', 'Rudyard Kipling	', 600.00, 'book38.jpg', '2026-04-26 13:51:40'),
(54, 'Room on the Broom		', 'Julia Donaldson', 800.00, 'book39.jpg', '2026-04-26 13:52:36'),
(55, 'The Twits	', 'Roald Dahl	', 600.00, 'book40.jpg', '2026-04-26 13:53:27'),
(56, 'Dracula	', 'Bram Stoker', 500.00, 'book41.jpg', '2026-04-26 13:54:36'),
(57, 'Jane Eyre		', 'Charlotte Brontë', 699.00, 'book42.jpg', '2026-04-26 13:55:33'),
(58, 'Pride and Prejudice		', 'Jane Austen', 700.00, 'book43.jpg', '2026-04-26 13:56:06'),
(59, 'Oliver Twist', 'Charles Dickens	', 650.00, 'book44.jpg', '2026-04-26 13:56:51'),
(60, 'The Kite Runner		', 'Khaled Hosseini', 1100.00, 'book45.jpg', '2026-04-26 13:57:33'),
(61, 'The Great Gatsby		', 'F. Scott Fitzgerald', 750.00, 'book46.jpg', '2026-04-26 13:58:34'),
(62, 'Life of Pi	', 'Yann Martel', 1000.00, 'book47.jpg', '2026-04-26 13:59:38'),
(63, 'Robinson Crusoe		', 'Daniel Defoe', 500.00, 'book48.jpg', '2026-04-26 14:02:13'),
(64, 'The Catcher in the Rye		', 'J.D. Salinger', 850.00, 'book49.jpg', '2026-04-26 14:03:29'),
(65, 'Heidi	', 'Johanna Spyri', 600.00, 'book50.jpg', '2026-04-26 14:04:10'),
(66, 'The Martian	', 'Andy Weir	', 1400.00, 'book51.jpg', '2026-04-26 14:04:43'),
(67, 'Coraline	', 'Neil Gaiman', 950.00, 'book52.jpg', '2026-04-26 14:05:22'),
(68, 'Circe		', 'Madeline Miller', 1500.00, 'book53.jpg', '2026-04-26 14:06:13'),
(69, 'Project Hail Mary		', 'Andy Weir', 1900.00, 'book54.jpg', '2026-04-26 14:07:37'),
(70, 'The Night Circus	', 'Erin Morgenstern', 1200.00, 'book55.jpg', '2026-04-26 14:08:37'),
(71, 'Dark Matter		', 'Blake Crouch', 1300.00, 'book56.jpg', '2026-04-26 14:09:41'),
(72, 'A Man Called Ove		', 'Fredrik Backman', 1100.00, 'book57.jpg', '2026-04-26 14:10:23'),
(73, 'Evelyn Hugos Seven Husbands			', 'Taylor Jenkins Reid', 1450.00, 'book58.jpg', '2026-04-26 14:11:53'),
(74, 'Where the Crawdads Sing		', 'Delia Owens', 1350.00, 'book59.jpg', '2026-04-26 14:13:30'),
(75, 'Anxious People	', 'Fredrik Backman', 1200.00, 'book60.jpg', '2026-04-26 14:14:45'),
(76, 'The Song of Achilles		', 'Madeline Miller', 1500.00, 'book61.jpg', '2026-04-26 14:15:35'),
(77, 'Klara and the Sun', 'Kazuo Ishiguro	', 1600.00, 'book62.jpg', '2026-04-26 14:16:08'),
(78, 'Never Let Me Go', 'Kazuo Ishiguro	', 1200.00, 'book63.jpg', '2026-04-26 14:16:56'),
(79, 'Piranesi		', 'Susanna Clarke', 1400.00, 'book64.jpg', '2026-04-26 14:17:34'),
(80, 'Eleanor Oliphant Is Fine		', 'Gail Honeyman', 1100.00, 'book65.jpg', '2026-04-26 14:18:31'),
(81, 'The Silent Patient		', 'Alex Michaelides', 1200.00, 'book66.jpg', '2026-04-26 14:19:06'),
(82, 'Gone Girl	', 'Gillian Flynn', 1150.00, 'book67.jpg', '2026-04-26 14:19:36'),
(83, 'The Maid		', 'Nita Prose', 1300.00, 'book68.jpg', '2026-04-26 14:20:30'),
(84, 'Recursion		', 'Blake Crouch', 1400.00, 'book69.jpg', '2026-04-26 14:27:36'),
(85, 'The Guest List	', 'Lucy Foley', 1250.00, 'book70.jpg', '2026-04-26 14:33:00'),
(86, 'The Woman in the Window	', 'A.J. Finn', 1000.00, 'book71.jpg', '2026-04-26 14:35:10'),
(87, 'Verity', 'Colleen Hoover', 1400.00, 'book72.jpg', '2026-04-26 14:36:44'),
(88, 'Small Pleasures	', 'Clare Chambers', 1200.00, 'book73.jpg', '2026-04-26 14:37:35'),
(89, 'Station Eleven	', 'Emily St. John Mandel', 1350.00, 'book74.jpg', '2026-04-26 14:39:19'),
(90, 'The Dutch House	', 'Ann Patchett', 1600.00, 'book75.jpg', '2026-04-26 14:40:09'),
(91, 'The One and Only Ivan	', 'Katherine Applegate', 900.00, 'book76.jpg', '2026-04-26 14:40:55'),
(92, 'The Wild Robot	', 'Peter Brown', 1000.00, 'book77.jpg', '2026-04-26 14:42:32'),
(93, 'The Last Bear	', 'Hannah Gold', 950.00, 'book78.jpg', '2026-04-26 14:43:47'),
(94, 'Pax	Sara ', 'Pennypacker', 800.00, 'book79.jpg', '2026-04-26 14:44:40'),
(95, 'Front Desk	', 'Kelly Yang	', 1000.00, 'book80.jpg', '2026-04-26 14:45:59'),
(96, 'Amari & the Night Brothers	', 'B.B. Alston', 1200.00, 'book81.jpg', '2026-04-26 14:46:43'),
(97, 'Skellig	', 'David Almond', 750.00, 'book82.jpg', '2026-04-26 14:47:47'),
(98, 'The Girl on the Train	', 'Paula Hawkins', 1100.00, 'book83.jpg', '2026-04-26 14:48:32'),
(99, 'Lessons in Chemistry	', 'Bonnie Garmus', 1700.00, 'book84.jpg', '2026-04-26 14:49:19'),
(100, 'Daisy Jones & The Six	', 'Taylor Jenkins Reid', 1500.00, 'book85.jpg', '2026-04-26 14:50:24'),
(101, 'Tomorrow, and Tomorrow	', 'Gabrielle Zevin', 1800.00, 'book86.jpg', '2026-04-26 14:51:25'),
(102, 'The Paris Apartment	', 'Lucy Foley', 1300.00, 'book87.jpg', '2026-04-26 14:52:28'),
(103, 'Cloud Cuckoo Land	', 'Anthony Doerr', 1900.00, 'book88.jpg', '2026-04-26 14:53:21'),
(104, 'Sorrow and Bliss', 'Meg Mason', 1400.00, 'book89.jpg', '2026-04-26 14:57:23'),
(105, 'Dictionary of Lost Words	', 'Pip Williams', 1500.00, 'book90.jpg', '2026-04-26 14:58:58'),
(106, 'Normal People	', 'Sally Rooney', 1200.00, 'book91.jpg', '2026-04-26 14:59:43'),
(107, 'Hamnet	', 'Maggie O Farrell	', 1600.00, 'book92.jpg', '2026-04-26 15:00:35'),
(108, 'The Ocean at the End', 'Neil Gaiman', 950.00, 'book93.jpg', '2026-04-26 15:07:32'),
(109, 'The Name of the Wind	', 'Patrick Rothfuss	', 1800.00, 'book94.jpg', '2026-04-26 15:08:19'),
(110, 'The Housemaid	', 'Freida McFadden', 1100.00, 'book95.jpg', '2026-04-26 15:09:13'),
(111, 'Siddhartha	', 'Hermann Hesse', 300.00, 'book96.jpg', '2026-04-26 15:10:10'),
(112, 'The Stranger	', 'Albert Camus', 600.00, 'book97.jpg', '2026-04-26 15:11:24'),
(113, 'The Road', 'Cormac McCarthy	', 1200.00, 'book98.jpg', '2026-04-26 15:12:05'),
(114, 'The Picture of Dorian Gray	', 'Oscar Wilde', 500.00, 'book99.jpg', '2026-04-26 15:12:53'),
(115, 'The Metamorphosis	', 'Franz Kafka', 250.00, 'book100.jpg', '2026-04-26 15:13:37'),
(118, ' The Picture of Dorian Gray', 'Oscar Wilde', 1500.00, '1778313726_book34.jpg', '2026-05-09 08:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `image`, `title`, `description`) VALUES
(1, '1777720983_Students celebrate victory in library.png', 'Buy Books Online Instantly', 'PDF, Hard Copy & CD Available'),
(2, '1777722937_42.jpg', 'Join Writing Competitions', 'Win exciting prizes'),
(3, '1777723054_34.jpg', 'Explore New Arrivals', 'Discover latest books from top authors');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `notes`, `created_at`) VALUES
(1, 'Aisha', '+923001234571', 'aisha@example.com', NULL, '2026-04-05 16:01:29'),
(2, 'Sara Ahmed', '+923001234572', 'sara@example.com', NULL, '2026-04-05 16:01:29'),
(4, 'Aliyan', '03214456987', 'aliyan@gmail.com', NULL, '2026-04-07 14:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('active','upcoming','closed') DEFAULT 'upcoming',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `competition_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `title`, `description`, `start_date`, `end_date`, `status`, `created_at`, `competition_number`) VALUES
(1, 'Hashir Nadeem', 'hashir', 'yes', '0000-00-00', '0000-00-00', '', '2026-04-27 13:04:50', 1),
(2, 'Summer Reading Challenge', 'Read & Win 2026', 'A month-long reading competition where users earn points by reading books and submitting reviews.  ', '2026-06-01', '2026-06-30', 'active', '2026-04-27 14:43:54', 0),
(3, 'Summer Reading Challenge', 'Read & Win 2026', 'A month-long reading competition where users earn points by reading books and submitting reviews.  ', '2026-06-01', '2026-06-30', 'active', '2026-04-27 14:44:00', 0),
(4, 'Summer Reading Challenge', 'Read & Win 2026', 'A month-long reading competition where users earn points by reading books and submitting reviews.  ', '2026-06-01', '2026-06-30', 'active', '2026-04-27 14:44:04', 0),
(5, 'Summer Reading Challenge', 'Read & Win 2026', 'A month-long reading competition where users earn points by reading books and submitting reviews.  ', '2026-06-01', '2026-06-30', 'active', '2026-04-27 14:44:07', 0),
(6, 'Summer Reading Challenge', 'Read & Win 2026', 'A month-long reading competition where users earn points by reading books and submitting reviews.  ', '2026-06-01', '2026-06-30', 'active', '2026-04-27 14:44:59', 0),
(7, 'Summer Reading Challenge', 'Read & Win 2026', 'A month-long reading competition where users earn points by reading books and submitting reviews.', '2026-06-01', '2026-06-30', 'active', '2026-04-27 14:46:59', 0),
(8, 'Fiction Writing Contest', 'Creative Minds 2026', 'Participants submit original fiction stories. Winners are selected based on creativity and storytelling.', '2026-07-10', '2026-08-15', 'upcoming', '2026-04-27 14:52:41', 0),
(9, 'Book Review Marathon', 'Review Rush', 'Users compete to write the highest number of quality book reviews within a limited time.', '2026-05-01', '2026-05-20', '', '2026-04-27 14:53:44', 0),
(10, 'Poetry Slam', 'Voices of Verse', 'A poetry writing competition encouraging expressive and original poetic works.', '2026-09-01', '2026-09-10', 'upcoming', '2026-04-27 14:54:42', 0),
(11, 'Mystery Reading Contest', 'Solve & Read', 'Read mystery novels and solve quizzes to earn points.', '2026-06-15', '2026-07-05', 'active', '2026-04-27 14:57:20', 0),
(12, 'Sci-Fi Story Contest', 'Future Worlds', 'Submit sci-fi stories based on futuristic themes.', '2026-08-01', '2026-08-25', 'upcoming', '2026-04-27 14:59:28', 0),
(13, 'Classic Literature Quiz', 'Timeless Reads', 'Quiz competition based on classic literature books.', '2026-04-01', '2026-04-15', '', '2026-04-27 15:01:11', 0),
(14, 'Fantasy Writing Challenge', 'Magic Tales', 'Write fantasy stories with magical elements and characters.', '2026-07-01', '2026-07-20', 'active', '2026-04-27 15:02:14', 0),
(15, 'Childrens Story Contest', 'Little Writers', 'Create engaging childrens stories with moral lessons.', '2026-06-05', '2026-06-25', 'active', '2026-04-27 15:11:18', 0),
(16, 'Horror Story Contest ', ' Nightmares Unleashed ', ' Write the scariest horror stories to compete.', '2026-10-01', '2026-10-20', 'upcoming', '2026-04-27 15:13:25', 0),
(17, 'Biography Writing Contest', 'Life Stories', 'Write biographies of inspiring individuals.', '2026-05-10', '2026-05-30', '', '2026-04-27 15:14:28', 0),
(18, 'Romance Story Contest', 'Love Lines', 'Submit romantic stories with compelling narratives.', '2026-07-15', '2026-08-05', 'upcoming', '2026-04-27 15:15:18', 0),
(19, 'Historical Fiction Contest', 'Past Reimagined', 'Write fiction stories set in historical times.', '2026-08-10', '2026-09-01', 'upcoming', '2026-04-27 15:16:39', 0),
(20, 'Thriller Writing Contest', 'Edge of Seat', 'Create suspenseful thriller stories.', '2026-06-20', '2026-07-10', 'active', '2026-04-27 15:17:50', 0),
(21, 'Drama Story Contest', 'Emotional Waves', 'Focus on emotional and dramatic storytelling.', '2026-05-05', '2026-05-25', '', '2026-04-27 15:19:48', 0),
(22, 'Essay Writing Contest', 'Thought Leaders', 'Submit essays on thought-provoking topics.Submit essays on thought-provoking topics.', '2026-04-20', '2026-05-05', '', '2026-04-27 15:21:09', 0),
(23, 'Flash Fiction Contest', '100 Words Story', 'Write a complete story in under 100 words.', '2026-07-01', '2026-07-10', 'active', '2026-04-27 15:22:18', 0),
(24, 'Comic Story Contest', 'Graphic Tales', 'Create comic-style storytelling submissions.', '2026-08-05', '2026-08-25', 'upcoming', '2026-04-27 15:24:16', 0),
(25, 'Adventure Writing Contest', 'Into the Wild', 'Write adventure-filled stories with exciting plots.', '2026-06-10', '2026-06-30', 'active', '2026-04-27 15:25:21', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dashboard_stats`
-- (See below for the actual view)
--
CREATE TABLE `dashboard_stats` (
`pending_appointments` bigint(21)
,`today_appointments` bigint(21)
,`total_clients` bigint(21)
,`low_stock_items` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `rating` tinyint(4) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `service`, `rating`, `message`, `created_at`) VALUES
(1, 'Hashir', 'hashirnadeem949@gmail.com', 'Competition', 4, 'ko', '2026-04-25 16:38:38'),
(2, 'hammad', 'nina_nadeem@gmail.com', 'Subscription', 5, 'god job', '2026-04-25 16:44:18'),
(3, 'hadi', 'abdulhadi@gmail.com', 'Subscription', 2, 'best for subscription', '2026-04-25 16:52:54'),
(4, 'hammad ', 'hammad@gmail.com', 'Books', 3, 'good readnova ', '2026-04-25 17:37:18'),
(5, 'nadeem', 'nadeem@gmail.com', 'Books', 5, ' good performance for readnova', '2026-04-25 17:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `gk`
--

CREATE TABLE `gk` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gk`
--

INSERT INTO `gk` (`id`, `title`, `author`, `price`, `image`, `created_at`) VALUES
(1, 'The Big Quiz Book', ' DK ', 2965.00, 'quiz and gk 1.jpg', '2026-04-27 15:15:49'),
(2, 'Encyclopedia of General Knowledge MCQs ', 'Adeel Niaz ', 1999.00, 'quiz and gk 2.jpg', '2026-04-27 15:17:42'),
(3, ' Caravan Comprehensive General Knowledge MCQs Ch ', 'Ahmad Najib', 1899.00, 'quiz and gk 3.jpg', '2026-04-27 15:18:25'),
(4, ' Advanced Objective General Knowledge ', 'Dr Iqra Imtiaz ', 1800.00, 'quiz and gk 4.jpg', '2026-04-27 15:19:42'),
(5, 'Who is Who and What is What ', 'Dogar Publishers', 1000.00, 'quiz and gk 5.jpg', '2026-04-27 15:20:43'),
(6, 'Almi General Knowledge ', 'Dogar Publishers', 1000.00, 'quiz and gk 6.jpg', '2026-04-27 15:21:41'),
(7, 'The Book of General Ignorance ', 'John Lloyd ', 1500.00, 'quiz and gk 7.jpg', '2026-04-27 15:22:30'),
(8, ' A Guide to World Geography and GK', ' M Shahid Akbar ', 1895.00, 'quiz and gk 8.jpg', '2026-04-27 15:23:16'),
(9, 'The Best Of Bournvita Quiz Contest ', 'Derek O Brien ', 295.00, 'quiz and gk 9.jpg', '2026-04-27 15:24:06'),
(10, 'Aalmi Maloomat Encyclopedia Zahid ', 'Hussain Anjum ', 1499.00, 'quiz and gk 10.jpg', '2026-04-27 15:24:40'),
(11, ' Super Intelligence Tests ', 'Dogar Publishers ', 600.00, 'quiz and gk 11.jpg', '2026-04-27 15:25:21'),
(12, ' The Fact Book ', 'Waseem Riaz Khan ', 600.00, 'quiz and gk 12.jpg', '2026-04-27 15:26:16'),
(13, 'General Knowledge One Liners', ' BookWorld', 799.00, 'quiz and gk 13.jpg', '2026-04-27 15:27:02'),
(14, 'Seerat Quiz 3000 Sawal Jawab', ' BookWorld', 400.00, 'quiz and gk 14.jpg', '2026-04-27 15:27:48'),
(15, 'World General Knowledge ', 'Abdul Rasheed', 949.00, 'quiz and gk 15.jpg', '2026-04-27 15:28:25'),
(16, 'General Knowledge 2025 ', 'Arihant Publication', 800.00, 'quiz and gk 16.jpg', '2026-04-27 15:29:16'),
(17, 'One Paper MCQs Guide ', ' JWT Publications ', 1049.00, 'quiz and gk 17.jpg', '2026-04-27 15:30:42'),
(18, ' Objective GK One Liner 9', 'Dr Iqra Imtiaz', 1299.00, 'quiz and gk 18.jpg', '2026-04-27 15:31:55'),
(19, ' ILMI One Liner Capsule GK ILMI ', ' Kitab Khana ', 650.00, 'quiz and gk 19.jpg', '2026-04-27 15:32:43'),
(20, 'Psychological Tests Plus Interviews ', 'Dogar Publishers ', 600.00, 'quiz and gk 20.jpg', '2026-04-27 15:33:48'),
(21, ' IQ Tests Intelligence Quotient ', 'Dogar Publishers ', 1200.00, 'quiz and gk 21.jpg', '2026-04-27 15:34:48'),
(22, 'Aptitude Tests Dogar Publishers ', 'Dogar Publishers ', 1200.00, 'quiz and gk 22.jpg', '2026-04-27 15:35:23'),
(23, 'Maloomat Aama Urdu ', 'GK Book', 230.00, 'quiz and gk 23.jpg', '2026-04-27 15:36:16'),
(24, 'Super Excellent Intelligence Test Guide ', 'Dogar Publishers ', 700.00, 'quiz and gk 24 .jpg', '2026-04-27 15:37:22'),
(25, ' Comprehensive General Knowledge ', ' Dogar Publishers ', 1800.00, 'quiz and gk 25.jpg', '2026-04-27 15:38:26'),
(26, 'Maze General Knowledge Series', 'Maze Publishers', 570.00, 'quiz and gk 26.jpg', '2026-04-27 15:39:13'),
(27, 'General Knowledge ', ' Kids Various ', 300.00, 'quiz and gk 27.jpg', '2026-04-27 15:39:57'),
(28, 'Literacy Mobilizer Test ', 'Guide Various ', 1300.00, 'quiz and gk 28.jpg', '2026-04-27 15:40:44'),
(29, 'The Book of Unusual Knowledge ', 'Publications International ', 2500.00, 'quiz and gk 29.jpg', '2026-04-27 15:42:01'),
(30, 'Lonely Planet Ultimate Travel Quiz', ' Book Lonely Planet ', 2000.00, 'quiz and gk 30.jpg', '2026-04-27 15:43:15'),
(31, ' The GCHQ Puzzle ', 'Book GCHQ', 1800.00, 'quiz and gk 31.jpg', '2026-04-27 15:44:20'),
(32, ' Minute Cryptic 160', 'Puzzles Angas Tiernan', 4000.00, 'quiz and gk 32.jpg', '2026-04-29 14:49:56'),
(33, 'Wordle Challenge 500 Puzzles ', 'Ivy Press', 1500.00, 'quiz and gk 33.jpg', '2026-04-29 14:52:07'),
(34, ' The Big Pub Quiz ', ' Book Various', 2000.00, 'quiz and gk 34.jpg', '2026-04-29 14:53:32'),
(35, ' Only Connect Quiz Book ', 'Jack Waley Cohen', 2500.00, 'quiz and gk 35.jpg', '2026-04-29 14:54:28'),
(36, 'A Short History of Nearly Everything', 'Bill Bryson', 1200.00, 'quiz and gk 36.jpg', '2026-04-29 14:56:13'),
(37, ' Sapiens Yuval ', 'Noah Harari', 1100.00, 'quiz and gk 37.jpg', '2026-04-29 14:57:21'),
(38, ' Guinness World Records 2025 ', ' Guinness World Records', 4500.00, 'quiz and gk 38.jpg', '2026-04-29 14:58:47'),
(39, 'The Times GK Crossword Book', ' The Times', 1800.00, 'quiz and gk 39.jpg', '2026-04-29 15:00:22'),
(40, ' Murdle 100 Mysteries ', ' G T Karber ', 3000.00, 'quiz and gk 40.jpg', '2026-04-29 15:01:39'),
(41, 'The Mammoth Quiz Book ', 'Nick Holt', 2200.00, 'quiz and gk 41.jpg', '2026-04-29 15:02:38'),
(42, ' 1500 GK Quiz Questions', ' Terry Dolan', 1200.00, 'quiz and gk 42 .jpg', '2026-04-29 15:03:31'),
(43, ' University Challenge Quiz ', 'Book Various ', 2400.00, 'quiz and gk 43.jpg', '2026-04-29 15:04:33'),
(44, ' Bletchley Park Brainteasers ', 'Sinclair McKay', 1800.00, 'quiz and gk 44.jpg', '2026-04-29 15:07:08'),
(45, ' The Penguin Book of Puzzles ', ' Gareth Moore ', 1500.00, 'quiz and gk 45.jpg', '2026-04-29 15:08:19'),
(46, ' A to Z of Almost Everything ', 'Trevor Montague ', 3500.00, 'quiz and gk 46.jpg', '2026-04-29 15:09:17'),
(47, ' Quiz Master 10000', ' GK Questions Collins ', 2800.00, 'quiz and gk 47.jpg', '2026-04-29 15:10:32'),
(48, 'Malomaat e Aama ', ' Zahid Hussain Anjum ', 300.00, 'quiz and gk 48.jpg', '2026-04-29 15:12:16'),
(49, 'The Ultimate Pub Quiz Book ', 'Roy Preston ', 1800.00, 'quiz and gk 49.jpg', '2026-04-29 15:13:16'),
(50, 'General Knowledge Digest  ', ' Imtiaz Shahid ', 950.00, 'quiz and gk 50.jpg', '2026-04-29 15:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `low_stock_threshold` int(11) DEFAULT 10,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `sku`, `quantity`, `low_stock_threshold`, `cost_price`, `supplier`, `created_at`, `updated_at`) VALUES
(1, 'OPI Nail Polish', 'OPI-RED001', 25, 10, 450.00, 'Cosmetic Distributors', '2026-04-05 16:01:29', '2026-04-05 16:01:29'),
(2, 'Keratin Treatment Kit', 'KER-001', 8, 5, 2500.00, 'BeautyCorp', '2026-04-05 16:01:29', '2026-04-05 16:01:29'),
(3, 'Vitamin C Serum', 'VCS-100ML', 15, 10, 1200.00, 'Skincare Ltd', '2026-04-05 16:01:29', '2026-04-05 16:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `novels`
--

CREATE TABLE `novels` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `novels`
--

INSERT INTO `novels` (`id`, `title`, `author`, `price`, `image`, `created_at`) VALUES
(1, ' James ', 'Percival Everett ', 7840.00, 'novel1.jpg', '2026-04-27 14:45:03'),
(2, 'The Ministry of Time ', 'Kaliane Bradley', 7560.00, 'novel2.jpg', '2026-04-27 14:47:16'),
(3, 'Funny Story ', ' Emily Henry', 7840.00, 'novel3.jpg', '2026-04-27 14:48:02'),
(4, 'The Women ', ' Kristin Hannah', 8400.00, 'novel4.jpg', '2026-04-27 14:48:44'),
(5, ' All Fours ', 'Miranda July', 8120.00, 'novel5.jpg', '2026-04-27 14:49:18'),
(6, 'Martyr', 'Kaveh Akbar ', 7840.00, 'novel6.jpg', '2026-04-27 14:49:57'),
(7, 'The God of the Woods ', 'Liz Moore', 8400.00, 'novel7.jpg', '2026-04-27 14:50:41'),
(8, ' Wandering Stars ', 'Tommy Orange', 7840.00, 'novel8.jpg', '2026-04-27 14:51:18'),
(9, 'Blue Sisters ', 'Coco Mellors', 7840.00, 'novel9.jpg', '2026-04-27 14:52:10'),
(10, 'The Wedding People ', 'Alison Espach ', 7840.00, 'novel10.jpg', '2026-04-27 14:52:49'),
(11, 'Creation Lake ', ' Rachel Kushner ', 7840.00, 'novel11.jpg', '2026-04-27 14:53:21'),
(12, 'Long Island Compromise ', ' Taffy Brodesser-Akner', 8400.00, 'novel12.jpg', '2026-04-27 14:54:21'),
(13, 'Margo\\\'s Got Money Troubles ', ' Rufi Thorpe', 7560.00, 'novel13.jpg', '2026-04-27 14:55:22'),
(14, 'Intermezzo ', 'Sally Rooney ', 7840.00, 'novel14.jpg', '2026-04-27 14:56:27'),
(15, 'Our Evenings ', 'Alan Hollinghurst', 8400.00, 'novel15.jpg', '2026-04-27 14:57:19'),
(16, 'Behind You Is the Sea ', 'Susan Muaddi Darraj', 7560.00, 'novel16.jpg', '2026-04-27 14:58:16'),
(17, ' The Safe keep ', 'Yael van der Wouden', 7280.00, 'novel17.jpg', '2026-04-27 14:59:42'),
(18, 'caledonian Road ', ' Andrew O\\\'Hagan ', 8120.00, 'novel18.jpg', '2026-04-27 15:00:30'),
(19, 'Small Rain ', 'Garth Greenwell', 7560.00, 'novel19.jpg', '2026-04-27 15:01:20'),
(20, 'There Are Rivers in the Sky ', 'Elif Shafak', 7840.00, 'novel20.jpg', '2026-04-27 15:02:22'),
(21, 'The Ministry of Time part two  ', ' Kaliane Bradley ', 7560.00, 'novel21.jpg', '2026-04-27 15:03:18'),
(22, 'The Saint of Bright Doors ', 'Vajra Chandrasekera', 7560.00, 'novel22.jpg', '2026-04-27 15:04:02'),
(23, 'Chain Gang All-Stars ', 'Nana Kwame Adjei-Brenyah', 7840.00, 'novel23.jpg', '2026-04-27 15:05:09'),
(24, ' Witch King ', 'Martha Wells ', 7840.00, 'novel24.jpg', '2026-04-27 15:05:45'),
(25, 'The Adventures of Amina al-Sirafi ', ' Shannon Chakraborty', 8120.00, 'novel25.jpg', '2026-04-27 15:06:30'),
(26, 'Starter Villain ', 'John Scalzi ', 7560.00, 'novel26.jpg', '2026-04-27 15:07:38'),
(27, 'The Mountain in the Sea ', 'Ray Nayler ', 7560.00, 'novel27.jpg', '2026-04-27 15:08:15'),
(28, 'Some Desperate Glory ', ' Emily Tesh', 7840.00, 'novel28.jpg', '2026-04-27 15:09:10'),
(29, 'Translation State ', ' Ann Leckie ', 7840.00, 'novel29.jpg', '2026-04-27 15:09:43'),
(30, ' The Ten Percent Thief ', 'Lavanya Lakshminarayan', 7000.00, 'novel30.jpg', '2026-04-27 15:11:28'),
(31, ' Iron Flame ', 'Rebecca Yarros', 8400.00, 'novel31.jpg', '2026-04-27 15:12:12'),
(32, ' The Reformatory ', 'Tananarive Due', 7840.00, 'novel32.jpg', '2026-04-27 15:12:50'),
(33, 'Ink Blood Sister Scribe ', 'Emma Törzs', 7840.00, 'novel33.jpg', '2026-04-27 15:13:31'),
(34, ' Birnam Wood ', 'Eleanor Catton', 7840.00, 'novel34.jpg', '2026-04-27 15:14:14'),
(35, 'Homegoing ', 'Yaa Gyas', 8120.00, 'novel35.jpg', '2026-04-27 15:14:52'),
(36, ' The Heaven & Earth Grocery Store ', 'James McBride', 7840.00, 'novel36.jpg', '2026-04-27 15:15:30'),
(37, 'Tom Lake ', ' Ann Patchett', 8400.00, 'novel37.jpg', '2026-04-27 15:16:16'),
(38, ' The Overstory ', ' Richard Powers ', 8400.00, 'novel38.jpg', '2026-04-27 15:17:28'),
(39, 'Hello Beautiful ', 'Ann Napolitano', 7840.00, 'novel39.jpg', '2026-04-27 15:18:06'),
(40, ' North Woods ', 'Daniel Mason', 8120.00, 'novel40.jpg', '2026-04-27 15:18:49'),
(41, ' Sea of Tranquility Emily ', ' St. John Mandel', 7840.00, 'novel41.jpg', '2026-04-27 15:19:27'),
(42, 'Yellowface ', 'R.F. Kuang', 8400.00, 'novel42.jpg', '2026-04-27 15:20:13'),
(43, 'The Vaster Wilds ', 'Lauren Groff', 7840.00, 'novel43.jpg', '2026-04-27 15:20:54'),
(44, ' My Friends ', ' Hisham Matar', 7560.00, 'novel44.jpg', '2026-04-27 15:21:39'),
(45, 'Blackouts ', 'Justin Torres', 7280.00, 'novel45.jpg', '2026-04-27 15:22:19'),
(46, ' The Wren', 'Anne Enright', 7560.00, 'novel46.jpg', '2026-04-27 15:24:36'),
(47, 'Brotherless Night ', 'V.V. Ganeshananthan', 7840.00, 'novel47.jpg', '2026-04-27 15:25:19'),
(48, 'Praiseworthy ', ' Alexis Wright', 8400.00, 'novel48.jpg', '2026-04-27 15:25:59'),
(49, 'Kairos Jenny ', 'Erpenbeck ', 7560.00, 'novel49.jpg', '2026-04-27 15:26:34'),
(50, ' The Guest Lecture ', 'Martin Riker', 7560.00, 'novel50.jpg', '2026-04-27 15:27:34'),
(52, 'The Housekeepers ', 'Alex Hay ', 7840.00, 'novel65.jpg', '2026-04-29 18:11:00'),
(53, 'The Square of Sevens ', 'Laura Shepherd-Robinson', 8120.00, 'novel66.jpg', '2026-04-29 18:14:07'),
(54, 'Pineapple Street ', 'Jenny Jackson', 7560.00, 'novel67.jpg', '2026-04-29 18:15:30'),
(55, 'The Mostly True Story of Tanner & Louise ', 'Colleen Oakley', 7560.00, 'novel68.jpg', '2026-04-29 18:16:30'),
(56, 'The Connellys of County Down', ' Tracey Lange', 7840.00, 'novel69.jpg', '2026-04-29 18:17:31'),
(57, 'Hang the Moon ', 'Jeannette Walls ', 8120.00, 'novel70.jpg', '2026-04-29 18:18:37'),
(58, 'The London Séance Society ', 'Sarah Penner ', 7840.00, 'novel71.jpg', '2026-04-29 18:19:33'),
(59, ' The Spectacular ', 'Fiona Davis ', 7840.00, 'novel72.jpg', '2026-04-29 18:20:43'),
(60, 'The Paris Daughter', ' Kristin Harmel', 7840.00, 'novel73.jpg', '2026-04-29 18:21:59'),
(61, ' The Night Travelers  ', 'Armando Lucas Correa ', 7840.00, 'novel74.jpg', '2026-04-29 18:23:55'),
(62, ' The Caretaker', ' Ron Rash ', 7840.00, 'novel75.jpg', '2026-04-29 18:24:45'),
(63, ' The Air Raid Book Club ', 'Annie Lyons ', 7560.00, 'novel76.jpg', '2026-04-29 18:25:34'),
(64, 'The Secret Book of Flora Lea Patti ', 'Callahan Henry ', 7840.00, 'novel77.jpg', '2026-04-29 18:26:35'),
(65, 'The Bookbinder ', 'Pip Williams ', 7840.00, 'novel78.jpg', '2026-04-29 18:27:37'),
(66, ' The Museum of Failures ', 'Thrity Umriga', 7560.00, 'novel79.jpg', '2026-04-29 18:28:48'),
(67, 'Evil Eye ', 'Etaf Rum ', 7560.00, 'novel80.jpg', '2026-04-29 18:29:43'),
(68, 'The Other Valley ', 'Scott Alexander Howard ', 7840.00, 'novel81.jpg', '2026-04-29 18:30:37'),
(69, 'The Future', ' Naomi Alderman ', 8120.00, 'novel82.jpg', '2026-04-29 18:31:24'),
(70, 'Annie Bot', 'Sierra Greer ', 7840.00, 'novel83.jpg', '2026-04-29 18:32:28'),
(71, ' The Warehouse ', 'Rob Hart ', 7560.00, 'novel84.jpg', '2026-04-29 18:33:11'),
(72, 'Burn-In ', ' P.W. Singer and August Cole ', 7840.00, 'novel85.jpg', '2026-04-29 18:36:08'),
(73, 'Red Team Blues ', 'Cory Doctorow ', 7840.00, 'novel86.jpg', '2026-04-29 18:36:50'),
(74, ' Walk the Blue Fields ', 'Claire Keegan ', 7560.00, 'novel87.jpg', '2026-04-29 18:38:13'),
(75, 'Foster and Other Stories ', 'Claire Keegan ', 7560.00, 'novel88.jpg', '2026-04-29 18:38:49'),
(76, 'What You Are Looking For Is in the Library ', 'Michiko Aoyama ', 7560.00, 'novel89.jpg', '2026-04-29 18:39:35'),
(77, 'Butter ', 'Asako Yuzuki ', 7840.00, 'novel90.jpg', '2026-04-29 18:40:22'),
(78, 'Strange Sally Diamond ', 'Liz Nugent ', 7840.00, 'novel91.jpg', '2026-04-29 18:41:02'),
(79, ' Notes on an Execution ', 'Danya Kukafka', 7840.00, 'novel92.jpg', '2026-04-29 18:41:37'),
(80, 'The Push', ' Ashley Audrain ', 7840.00, 'novel93.jpg', '2026-04-29 18:42:46'),
(81, ' Nightbitch ', 'Rachel Yoder ', 7840.00, 'novel94.jpg', '2026-04-29 18:43:19'),
(82, 'Lapvona ', 'Ottessa Moshfegh ', 7840.00, 'novel95.jpg', '2026-04-29 18:43:51'),
(83, 'My Year of Rest and Relaxation', ' Ottessa Moshfegh ', 7840.00, 'novel96.jpg', '2026-04-29 18:44:28'),
(84, 'Eileen ', 'Ottessa Moshfegh', 7560.00, 'novel97.jpg', '2026-04-29 18:45:06'),
(85, 'Convenience Store Woman ', 'Sayaka Murata', 7560.00, 'novel98.jpg', '2026-04-29 18:45:40'),
(86, 'Earthlings ', 'Sayaka Murata ', 7560.00, 'novel99.jpg', '2026-04-29 18:46:13'),
(87, 'The Bee Sting ', 'Paul Murray ', 8400.00, 'novel100.jpg', '2026-04-29 18:53:37'),
(88, 'Orbital ', 'Samantha Harvey ', 7840.00, 'novel51.jpg', '2026-04-30 14:10:52'),
(89, 'Biography of X ', 'Catherine Lacey', 8120.00, 'novel52.jpg', '2026-04-30 14:11:50'),
(90, ' The Late Americans ', 'Brandon Taylor ', 7840.00, 'novel53.jpg', '2026-04-30 14:12:54'),
(91, ' Idlewild ', 'James Frankie Thomas', 7560.00, 'novel54.jpg', '2026-04-30 14:13:54'),
(92, 'The New Life ', 'Tom Crewe ', 7840.00, 'novel55.jpg', '2026-04-30 14:14:51'),
(93, 'The Fetishist ', 'Katherine Min', 7560.00, 'novel56.jpg', '2026-04-30 14:15:36'),
(94, 'The Celebrants ', 'Steven Rowley ', 7840.00, 'novel57.jpg', '2026-04-30 14:16:31'),
(95, 'Banyan Moon ', 'Thao Thai', 7840.00, 'novel58.jpg', '2026-04-30 14:17:29'),
(96, ' Rootless  ', 'Krystle Zara Appiah ', 7560.00, 'novel59.jpg', '2026-04-30 14:18:16'),
(97, 'River Sing Me Home ', 'Eleanor Shearer ', 7840.00, 'novel60.jpg', '2026-04-30 14:19:07'),
(98, 'The Half Moon', ' Mary Beth Keane ', 7840.00, 'novel61.jpg', '2026-04-30 14:19:54'),
(99, 'The Sunset Crowd', ' Karin Tanabe', 7560.00, 'novel62.jpg', '2026-04-30 14:20:44'),
(100, 'Old God\\\'s Time ', 'Sebastian Barry ', 7840.00, 'novel63.jpg', '2026-04-30 14:21:49'),
(101, 'The Storm We Made ', 'Vanessa Chan', 7840.00, 'novel64.jpg', '2026-04-30 14:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `book_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending',
  `account_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `book_id`, `book_name`, `author`, `name`, `email`, `price`, `payment_method`, `created_at`, `status`, `account_name`, `account_number`, `quantity`, `total_price`, `type`) VALUES
(45, NULL, 'Project Hail Mary		', 'Andy Weir', 'Hashir Nadeem', 'hashirnadeem949@gmail.com', 1900, 'PayPal', '2026-05-03 16:38:25', 'pending', 'nadir', '0987654321', 1, 1900.00, 'pdf'),
(46, NULL, 'The Very Hungry Catepillar', 'Eric Carle', 'ROSHAN', 'nomanroshan028@gmail.com', 950, 'JazzCash', '2026-05-03 16:40:30', 'pending', 'ROSHAN', '987654321', 1, 950.00, 'pdf'),
(47, NULL, 'Matilda ', 'Roald Dahl', ' umer ', 'uk3384045@gmail.com', 1250, 'JazzCash', '2026-05-04 04:47:13', 'pending', ' umer', '090909090909', 1, 1250.00, 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `paid_at` datetime DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `amount`, `payment_method`, `status`, `paid_at`, `notes`, `created_at`) VALUES
(1, 44, 950.00, 'Online', 'Paid', '2026-05-03 00:37:50', '', '2026-05-02 19:37:50'),
(2, 44, 950.00, 'Online', 'Paid', '2026-05-03 17:45:35', '', '2026-05-03 12:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `book_name`, `author_name`, `pdf`, `category`) VALUES
(1, 'Harry Potter and the Philosopher\\\'s Stone	', 'J.K. Rowling', 'harry-potter-and-the-philosophers-stone.pdf', 'Story Book'),
(2, 'Charlotte\\\'s Web	', 'E.B. White', 'Charlottes_Web.pdf', 'Story Book'),
(3, 'The Very Hungry Caterpillar	', 'Eric Carle', 'THE-VERY-HUNGRY-CATERPILLAR.pdf', 'Story Book'),
(4, 'The Little Prince	', 'Antoine de Saint-Exupéry', 'TheLittlePrince.pdf', 'Story Book'),
(5, 'Charlie and the Chocolate Factory	', 'Roald Dahl', 'charlie-and-the-chocolate-factory-by.pdf', 'Story Book'),
(6, 'The Hobbit', 'J.R.R. Tolkien', 'the_hobbit.pdf', 'Story Book'),
(7, 'Green Eggs and Ham	', 'Dr. Seuss', 'green-eggs-and-ham.pdf', 'Story Book'),
(8, 'The Tale of Peter Rabbit	', 'Beatrix Potter', 'the-tale-of-peter-rabbit.pdf', 'Story Book'),
(9, 'Where the Wild Things Are	', 'Maurice Sendak', 'Where the Wild Things Are.pdf', 'Story Book'),
(10, 'Goodnight Moon	', 'Margaret Wise Brown', 'goodnightmoon.pdf', 'Story Book'),
(11, 'Animal Farm	', 'George Orwell', 'Animal Farm.pdf', 'Story Book'),
(12, 'Alice\\\'s Adventures in Wonderland', 'Lewis Carrol', 'Alice_in_Wonderland.pdf', 'Story Book'),
(13, 'The Secret Garden	', 'Frances Hodgson Burnett', 'the secret garden.pdf', 'Story Book'),
(14, 'The Lion, the Witch and the Wardrobe	', 'C.S. Lewis', 'Lion, the Witch and the Wardrobe.pdf', 'Story Book'),
(15, 'Diary of a Wimpy Kid	', 'Jeff Kinney', 'diary-of-a-wimpy-kid.pdf', 'Story Book'),
(16, 'The Cat in the Hat	', 'Dr. Seuss', 'THE-CAT-IN-THE-HAT.pdf', 'Story Book'),
(17, 'Black Beauty', 'Anna Sewell', 'Black Beauty.pdf', 'Story Book'),
(18, 'Winnie-the-Pooh	', 'A.A. Milne', 'winnie-the-pooh.pdf', 'Story Book'),
(19, 'The Alchemist	', 'Paulo Coelho', 'The_Alchemist.pdf', 'Story Book'),
(20, 'Wonder	', 'R.J. Palacio', 'wonder.pdf', 'Story Book'),
(21, 'The BFG', 'Roald Dahl', 'The-BFG.pdf', 'Story Book'),
(22, 'Treasure Island', 'Robert Louis Stevenson	', 'treasure island.pdf', 'Story Book'),
(23, 'Peter Pan	', 'J.M. Barrie', 'Peter Pan.pdf', 'Story Book'),
(24, 'Little Women	', 'Louisa May Alcott', 'Little Women.pdf', 'Story Book'),
(25, 'The Gruffalo	', 'Julia Donaldson', 'The_Gruffalo.pdf', 'Story Book'),
(26, 'James and the Giant Peach	', 'Roald Dahl', 'james and the gaint peach.pdf', 'Story Book'),
(27, 'Grimm’s Fairy Tales	', 'Brothers Grimm', 'grim fairy tales.pdf', 'Story Book'),
(28, 'The Giving Tree	', 'Shel Silverstein', 'the-giving-tree.pdf', 'Story Book'),
(29, 'Holes	', 'Louis Sachar	', 'holes.pdf', 'Story Book'),
(30, 'The Snowy Day	', 'Ezra Jack Keats', 'The_Snowy_Day.pdf', 'Story Book'),
(31, 'Bridge to Terabithia	', 'Katherine Paterson', 'Bridge-to-Terabithia.pdf', 'Story Book'),
(32, 'The Wind in the Willows	', 'Kenneth Grahame	', 'Wind_in_the_Willows.pdf', 'Story Book '),
(33, 'To Kill a Mockingbird	', 'Harper Lee', 'to kill a mocking bird.pdf', 'Story Book '),
(34, 'Percy Jackson & The Lightning Thief	', 'Rick Riordan', 'The_Lightning_Thief.pdf', 'Story Book '),
(35, 'The Book Thief	', 'Markus Zusak', 'TheBookThief.pdf', 'Story Book '),
(36, 'A Wrinkle in Time	', 'Madeleine L\\\'Engle', 'A Wrinkle in Time.pdf', 'Story Book '),
(37, 'The Jungle Book', 'Rudyard Kipling', 'The Jungle Book.pdf', 'Story Book '),
(38, 'Room on the Broom	', 'Julia Donaldson', 'room on the broom.pdf', 'Story Book '),
(39, 'The Twits	', 'Roald Dahl', 'The-Twits.pdf', 'Story Book '),
(40, 'Dracula	', 'Bram Stoker', 'dracula.pdf', 'Story Book'),
(41, 'Jane Eyre', 'Charlotte Brontë', 'jane eyre.pdf', 'Story Book'),
(42, 'Pride and Prejudice ', 'Jane Austen', 'pride-and-prejudice.pdf', 'Story Book'),
(43, 'Oliver Twist ', 'Charles Dickens ', 'oliver twist.pdf', 'Story Book'),
(44, 'The Kite Runner ', 'Khaled Hosseini', 'the_kite_runner.pdf', 'Story Book'),
(45, 'Robinson Crusoe ', 'Daniel Defoe', 'Robinson_Crusoe_.pdf', 'Story Book'),
(46, 'The Catcher in the Rye ', 'J.D. Salinger', 'the catcher in the rye.pdf', 'Story Book'),
(47, 'Heidi ', 'Johanna Spyri', 'Heidi.pdf', 'Story Book'),
(48, 'The Martian', ' Andy Weir', 'The Martian.pdf', 'Story Book'),
(49, 'Coraline ', 'Neil Gaiman', 'Coraline.pdf', 'Story Book'),
(50, 'Circe', ' Madeline Miller ', 'Circe.pdf', 'Story Book'),
(51, 'Project Hail Mary ', 'Andy Weir', 'Project Hail Mary.pdf', 'Story Book'),
(52, 'The Night Circus', ' Erin Morgenstern', 'the_night_circus.pdf', 'Story Book'),
(53, 'Dark Matter', ' Blake Crouch', 'dark matter.pdf', 'Story Book'),
(54, 'A Man Called Ove ', 'Fredrik Backman', 'A Man Called Ove.pdf', 'Story Book'),
(55, 'Evelyn Hugo\\\'s Seven Husbands ', 'Taylor Jenkins Reid', 'The Seven Husbands of Evelyn Hugo.pdf', 'Story Book'),
(56, 'Where the Crawdads Sing ', 'Delia Owens', 'Where-the-Crawdads-Sing.pdf', 'Story Book'),
(57, 'Anxious People ', 'Fredrik Backman ', 'Anxious-People.pdf', 'Story Book'),
(58, 'The Song of Achilles', ' Madeline Miller ', 'the Song of Achilles.pdf', 'Story Book'),
(59, 'Klara and the Sun', ' Kazuo Ishiguro', 'klara_and_the_sun.pdf', 'Story Book'),
(60, 'Never Let Me Go ', 'Kazuo Ishiguro', 'Never-Let-Me-Go.pdf', 'Story Book'),
(61, 'Piranesi ', 'Susanna Clarke', 'Piranesi.pdf', 'Story Book'),
(62, 'Eleanor Oliphant Is Fine ', 'Gail Honeyman', 'eleanor-oliphant-is-completely-fine.pdf', 'Story Book'),
(63, ' The Silent Patient ', 'Alex Michaelides', 'the silent patient.pdf', 'Story Book'),
(64, 'Gone Girl ', 'Gillian Flynn ', 'Gone-Girl.pdf', 'Story Book'),
(65, 'The Maid ', 'Nita Prose', 'The-Maid.pdf', 'Story Book'),
(66, 'Recursion ', 'Blake Crouch', 'recursion.pdf', 'Story Book'),
(67, 'The Guest List', ' Lucy Foley', 'The-Guest-List.pdf', 'Story Book'),
(68, 'The Woman in the Window', ' A.J. Finn', 'Woman_in_the_Window.pdf', 'Story Book'),
(69, 'Verity', ' Colleen Hoover', 'Verity.pdf', 'Story Book'),
(70, 'Small Pleasures ', 'Clare Chambers', 'small pleasures.pdf', 'Story Book'),
(71, 'Station Eleven Emily ', 'St. John Mandel', 'station-eleven.pdf', 'Story Book'),
(72, 'The Dutch House ', 'Ann Patchett', 'the dutch house.pdf', 'Story Book'),
(73, 'The One and Only Ivan ', 'Katherine Applegate', 'the_one_and_only_ivan_.pdf', 'Story Book'),
(74, 'The Wild Robot ', 'Peter Brown ', 'The-Wild-Robot.pdf', 'Story Book'),
(75, 'The Last Bear ', 'Hannah Gold', 'thelastbear.pdf', 'Story Book'),
(76, 'Pax ', 'Sara Pennypacker', 'Pax.pdf', 'Story Book'),
(77, ' Front Desk ', 'Kelly Yang', 'frontdesk.pdf', 'Story Book'),
(78, 'Amari & the Night Brothers ', 'B.B. Alston', 'Amari and the night brothers.pdf', 'Story Book'),
(79, 'Skellig ', 'David Almond', 'Skellig.pdf', 'Story Book'),
(80, 'The Girl on the Train ', 'Paula Hawkins', 'the_girl_on_the_train.pdf', 'Story Book'),
(81, ' Lessons in Chemistry', ' Bonnie Garmus ', 'lesson in chemistry.pdf', 'Story Book'),
(82, 'Daisy Jones & The Six', ' Taylor Jenkins Reid', 'daisy jones and the six.pdf', 'Story Book'),
(83, 'Tomorrow, and Tomorrow ', 'Gabrielle Zevin', 'tomorrow-and-tomorrow-and-tomorrowpdf.pdf', 'Story Book'),
(84, 'The Paris Apartment ', 'Lucy Foley', 'the paris-apartment.pdf', 'Story Book'),
(85, 'Cloud Cuckoo Land ', 'Anthony Doerr', 'cloud-cuckoo-land.pdf', 'Story Book'),
(86, ' Sorrow and Bliss ', 'Meg Mason', 'sorrow and bliss.pdf', 'Story Book'),
(87, 'Dictionary of Lost Words ', 'Pip Williams', 'The-Dictionary-of-Lost-Words.pdf', 'Story Book'),
(88, 'Normal People ', 'Sally Rooney ', 'normal people.pdf', 'Story Book'),
(89, 'Hamnet ', 'Maggie O\\\'Farrell', 'hamnet.pdf', 'Story Book'),
(90, 'The Ocean at the End ', 'Neil Gaiman ', 'Ocean_at_the_End_of_the_Lane.pdf', 'Story Book'),
(91, 'The Name of the Wind ', 'Patrick Rothfuss', 'The name of the wind.pdf', 'Story Book'),
(92, 'The Housemaid ', 'Freida McFadden', 'the-housemaid.pdf', 'Story Book'),
(93, 'Siddhartha ', 'Hermann Hesse', 'siddhartha.pdf', 'Story Book'),
(94, ' The Stranger ', 'Albert Camus', 'The Stranger.pdf', 'Story Book'),
(95, 'The Road ', 'Cormac McCarthy', 'the_roadpdf.pdf', 'Story Book'),
(96, 'The Picture of Dorian Gray ', 'Oscar Wilde', 'the_picture_of_dorian_gray.pdf', 'Story Book'),
(97, ' The Metamorphosis ', 'Franz Kafka', 'the-metamorphosis.pdf', 'Story Book'),
(98, 'James ', 'Percival Everett', 'James.pdf', 'Novel'),
(99, 'The Ministry of Time ', 'Kaliane Bradley', 'The_Ministry_of_Time.pdf', 'Novel'),
(100, 'Funny Story ', 'Emily Henry', 'funny_story.pdf', 'Novel'),
(101, 'The Women ', 'Kristin Hannah', 'the_women.pdf', 'Novel'),
(102, 'All Fours ', 'Miranda July', 'all-fours.pdf', 'Novel'),
(103, 'Martyr! ', 'Kaveh Akbar', 'Martyr.pdf', 'Novel'),
(104, 'The God of the Woods', ' Liz Moore', 'The_God_of_the_wood.pdf', 'Novel'),
(105, 'Wandering Stars', ' Tommy Orange', 'wandering_stars.pdf', 'Novel'),
(106, 'Blue Sisters ', 'Coco Mellors', 'blueSisters.pdf', 'Novel'),
(107, 'The Wedding People', ' Alison Espach', 'The_Wedding_People.pdf', 'Novel'),
(108, 'Creation Lake', ' Rachel Kushner ', 'Creation Lake.pdf', 'Novel'),
(109, 'Long Island Compromise ', 'Taffy Brodesser-Akner', 'Long_Island_Compromise.pdf', 'Novel'),
(110, 'Margo\\\'s Got Money Troubles ', 'Rufi Thorpe', 'Margos_Got_Money_Troubles.pdf', 'Novel'),
(111, 'Intermezzo ', 'Sally Rooney ', 'Intermezzo.pdf', 'Novel'),
(112, 'Our Evenings ', 'Alan Hollinghurst ', 'Our_Evenings.pdf', 'Novel'),
(113, ' Behind You Is the Sea ', 'Susan Muaddi Darraj', 'behind-you-is-the-sea.pdf', 'Novel'),
(114, 'The Safekeep ', 'Yael van der Wouden', 'The-Safekeep Yael.pdf', 'Novel'),
(115, ' caledonian Road ', ' Andrew O\\\'Hagan', 'Caledonian_Road.pdf', 'Novel'),
(116, ' Small Rain ', ' Garth Greenwell', 'Small_Rain.pdf', 'Novel'),
(117, ' There Are Rivers in the Sky', ' Elif Shafak', 'There are rivers in the sky.pdf', 'Novel'),
(118, ' The Ministry of Time part two ', ' Kaliane Bradley', 'The_Ministry_of_Time.pdf', 'Novel'),
(119, ' The Saint of Bright Doors', 'Vajra Chandrasekera', 'The_Saint_of_Bright_Doors.pdf', 'Novel'),
(120, ' Chain Gang All-Stars', 'Nana Adjei-Brenyah', 'Chain_Gang_All_Stars.pdf', 'Novel'),
(121, 'Witch King ', 'Martha Wells', 'Witch_King.pdf', 'Novel'),
(122, ' The Adventures of Amina  al-Sirafi', ' Shannon Chakraborty ', 'Adventures_of_Amina_al-Sirafi.pdf', 'Novel'),
(123, ' Starter Villain ', ' John Scalzi', 'Starter-Villain.pdf', 'Novel'),
(124, ' The Mountain in the Sea ', 'Ray Nayler', 'The Mountain in the Sea.pdf', 'Novel'),
(125, 'Some Desperate Glory ', ' Emily Tesh', 'Some_Desperate_Glory.pdf', 'Novel'),
(126, 'Translation State', 'Ann Leckie', 'Translation_State.pdf', 'Novel'),
(127, ' The Ten Percent Thief ', 'Lavanya Lakshminarayan ', 'The_Ten_Percent_Thief.pdf', 'Novel'),
(128, ' Iron Flame ', ' Rebecca Yarros', 'Iron Flame.pdf', 'Novel'),
(129, 'The Reformatory ', ' Tananarive Due', 'the-reformatory.pdf', 'Novel'),
(130, ' Ink Blood Sister Scribe  ', 'Emma Törzs ', 'Ink-Blood-Sister.pdf', 'Novel'),
(131, 'Birnam Wood ', 'Eleanor Catton', 'Birnam-Wood.pdf', 'Novel'),
(132, ' Homegoing ', ' Yaa Gyasi', 'Homegoing.pdf', 'Novel'),
(133, 'The Heaven & Earth Grocery Store', 'James McBride', 'Heaven-and-Earth-Grocery-Store.pdf', 'Novel'),
(134, 'Tom Lake ', 'Ann Patchett ', 'tom lake.pdf', 'Novel'),
(135, 'The Overstory ', 'Richard Powers', 'the-overstory.pdf', 'Novel'),
(136, ' Hello Beautiful ', ' Ann Napolitano', 'hello beautiful.pdf', 'Novel'),
(137, 'North Woods ', ' Daniel Mason', 'NorthWoods.pdf', 'Novel'),
(138, 'Sea of Tranquility ', 'Emily St. John Mandel', 'Sea-of-Tranquility.pdf', 'Novel'),
(139, ' Yellowface ', ' R.F. Kuang', 'yellow face.pdf', 'Novel'),
(140, 'The Vaster Wilds ', 'Lauren Groff', 'the vaster wild.pdf', 'Novel'),
(141, 'My Friends', 'Hisham Matar', 'my friends.pdf', 'Novel'),
(142, 'The Wren, The Wren ', 'Anne Enright', 'the wren_the wren.pdf', 'Novel'),
(143, 'Brotherless Night ', 'V.V. Ganeshananthan', 'brotherless night.pdf', 'Novel'),
(144, 'Praiseworthy ', 'Alexis Wright', 'Praiseworthy.pdf', 'Novel'),
(145, 'Kairos Jenny ', 'Erpenbeck', 'Kairos.pdf', 'Novel'),
(146, ' The Guest Lecture ', 'Martin Riker', 'The_Guest_Lecture.pdf', 'Novel'),
(147, 'Orbital  ', 'Samantha Harvey', 'orbital.pdf', 'Novel'),
(148, 'Biography of X ', 'Catherine Lacey', 'Biography_of_X.pdf', 'Novel'),
(149, 'The Late Americans ', 'Brandon Taylor', 'the late americans.pdf', 'Novel'),
(150, ' Idlewild James ', 'Frankie Thomas', 'Idlewild_-_James.pdf', 'Novel'),
(151, ' The New Life', ' Tom Crewe ', 'the new life.pdf', 'Novel'),
(152, 'The Fetishist ', 'Katherine Min', 'the-fetishist.pdf', 'Novel'),
(153, 'The Celebrants ', 'Steven Rowley', 'The_Celebrants.pdf', 'Novel'),
(154, 'Banyan Moon ', 'Thao Thai', 'Banyan_Moon.pdf', 'Novel'),
(155, 'Rootless Krystle', ' Zara Appiah', 'Rootless.pdf', 'Novel'),
(156, 'River Sing Me Home', ' Eleanor Shearer', 'river-sing-me-home.pdf', 'Novel'),
(157, 'The Half Moon', ' Mary Beth Keane', 'the_half_moon.pdf', 'Novel'),
(158, 'The Sunset Crowd ', 'Karin Tanabe', 'The_Sunset_Crowd.pdf', 'Novel'),
(159, 'Old God\\\'s Time', ' Sebastian Barry', 'Old_Gods_Time.pdf', 'Novel'),
(160, 'The Storm We Made ', 'Vanessa Chan', 'The-Storm-We-Made.pdf', 'Novel'),
(161, 'The Housekeepers ', 'Alex Hay', 'The_Housekeeper.pdf', 'Novel'),
(162, ' The Square of Sevens ', 'Laura Shepherd-Robinson', 'The_Square_of_Sevens.pdf', 'Novel'),
(163, ' Pineapple Street ', 'Jenny Jackson', 'Pineapple_Street.pdf', 'Novel'),
(164, ' The Mostly True Story of Tanner & Louise ', 'Colleen Oakley', 'The_Mostly_True_Story_of_Tanner_and_Louise.pdf', 'Novel'),
(165, 'The Connellys of County Down', ' Tracey Lange', 'The_Connellys_of_County_Down.pdf', 'Novel'),
(166, 'Hang the Moon ', 'Jeannette Walls', 'Hang_the_Moon.pdf', 'Novel'),
(167, 'The London Séance Society ', 'Sarah Penner', 'The_London_Seance_Society.pdf', 'Novel'),
(168, 'The Spectacular ', 'Fiona Davis', 'The Spectacular.pdf', 'Novel'),
(169, 'The Paris Daughter ', 'Kristin Harmel', 'The_Paris_Daughter.pdf', 'Novel'),
(170, 'The Night Travelers  ', 'Armando Lucas Correa', 'The_Night_Travelers.pdf', 'Novel'),
(171, 'The Caretaker', ' Ron Rash ', 'The_Caretaker.pdf', 'Novel'),
(172, ' The Air Raid Book Club ', 'Annie Lyons', 'The_Air_Raid_Book_Club.pdf', 'Novel'),
(173, 'The Secret Book of Flora Lea ', 'Patti Callahan Henry', 'The_Secret_Book_of_Flora_Lea .pdf', 'Novel'),
(174, 'The Bookbinder', ' Pip Williams', 'the bookbinder.pdf', 'Novel'),
(175, 'The Museum of Failures ', 'Thrity Umrigar', 'The_Museum_of_Failures.pdf', 'Novel'),
(176, 'Evil Eye  ', 'Etaf Rum', 'Evil_Eye.pdf', 'Novel'),
(177, 'The Other Valley Scott ', 'Alexander Howard', 'The_Other_Valley.pdf', 'Novel'),
(178, 'The Future ', 'Naomi Alderman', 'The_Future.pdf', 'Novel'),
(179, 'Annie Bot ', 'Sierra Greer', 'Annie_Bot.pdf', 'Novel'),
(180, '84. The Warehouse', ' Rob Hart', 'The_Warehouse.pdf', 'Novel'),
(181, 'Burn-In ', 'P.W. Singer and August Cole', 'Burn In.pdf', 'Novel'),
(182, 'Red Team Blues', ' Cory Doctorow', 'red teams blues.pdf', 'Novel'),
(183, 'Walk the Blue Fields ', 'Claire Keegan', 'Walk_the_Blue_Fields.pdf', 'Novel'),
(184, 'Foster and Other Stories ', 'Claire Keegan', 'Foster_and_Small_Things_Like_These.pdf', 'Novel'),
(185, ' What You Are Looking For Is in the Library ', 'Michiko Aoyama', 'what are u looking for is in the library.pdf', 'Novel'),
(186, ' Butter ', 'Asako Yuzuki ', 'Butter.pdf', 'Novel'),
(187, 'Strange Sally Diamond ', 'Liz Nugent', 'strange sally daimond.pdf', 'Novel'),
(188, ' Notes on an Execution ', 'Danya Kukafka', 'notes_on_an_execution.pdf', 'Novel'),
(189, 'The Push ', 'Ashley Audrain ', 'the push.pdf', 'Novel'),
(190, 'Nightbitch', 'Rachel Yoder', 'nightbitch.pdf', 'Novel'),
(191, 'Lapvona ', 'Ottessa Moshfegh ', 'lapvona.pdf', 'Novel'),
(192, 'My Year of Rest and Relaxation ', 'Ottessa Moshfegh ', 'my year of rest and relaxation.pdf', 'Novel'),
(193, ' Eileen  ', 'Ottessa Moshfegh', 'eileen.pdf', 'Novel'),
(194, ' Convenience Store Woman ', 'Sayaka Murata', 'convenience-store-woman-grove.pdf', 'Novel'),
(195, ' Earthlings ', 'Sayaka Murata', 'Earthling.pdf', 'Novel'),
(196, 'The Bee Sting ', 'Paul Murray', 'the bee string.pdf', 'Novel'),
(197, 'The Big Quiz Book ', 'DK', 'The Big Quiz Book.pdf', 'General Knowledge'),
(198, 'Encyclopedia of General Knowledge MCQs ', 'Adeel Niaz', 'Encyclopedia of General Knowledge MCQs.pdf', 'General Knowledge'),
(199, 'Caravan Comprehensive General Knowledge MCQs ', 'Ch Ahmad Najib', 'Caravan Comprehensive General Knowledge MCQs.pdf', 'General Knowledge'),
(200, 'Who is Who and What is What ', 'Dogar Publishers', 'Who-and-What-Is-What.pdf', 'General Knowledge'),
(201, ' Almi General Knowledge ', 'Dogar Publishers', 'Almi General knowledge.pdf', 'General Knowledge'),
(202, 'The Book of General Ignorance ', 'John Lloyd ', 'The Book Of General Ignorance.pdf', 'General Knowledge'),
(203, 'A Guide to World Geography and GK ', 'M Shahid Akbar', 'A Guide to World Geography and GK.pdf', 'General Knowledge'),
(204, 'The Best Of Bournvita Quiz Contest ', 'Derek O Brien', 'The Best Of Bournvita Quiz Contest.pdf', 'General Knowledge'),
(205, 'Aalmi Maloomat Encyclopedia ', 'Zahid Hussain Anjum', 'Aalmi Maloomat Encyclopedia.pdf', 'General Knowledge'),
(206, ' Super Intelligence Tests ', 'Dogar Publishers', 'Super Intelligence Tests.pdf', 'General Knowledge'),
(207, 'The Fact Book ', 'Waseem Riaz Khan', 'The Fact Book.pdf', 'General Knowledge'),
(208, 'General Knowledge One Liners', 'BookWorld', 'General Knowledge One Liners.pdf', 'General Knowledge'),
(209, 'Seerat Quiz 3000 Sawal Jawab ', 'BookWorld', 'Seerat Quiz 3000 Sawal Jawab .pdf', 'General Knowledge'),
(210, ' World General Knowledge  ', 'Abdul Rasheed', 'World General Knowledge.pdf', 'General Knowledge'),
(211, 'General Knowledge 2025 ', 'Arihant Publication', 'General Knowledge 2025 .pdf', 'General Knowledge'),
(212, 'ILMI One Liner Capsule GK', ' ILMI Kitab Khana', 'ILMI One Liner Capsule GK.pdf', 'General Knowledge'),
(213, ' Psychological Tests Plus Interviews ', 'Dogar Publishers', 'Psychological Tests Plus Interviews.pdf', 'General Knowledge'),
(214, 'IQ Tests Intelligence Quotient ', 'Dogar Publishers', 'IQ Tests Intelligence Quotientpdf.pdf', 'General Knowledge'),
(215, 'Maloomat Aama Urdu', ' GK Book ', 'Maloomat Aama urdu gk.pdf', 'General Knowledge'),
(216, 'Maze General Knowledge Series ', 'Maze Publishers', 'Maze General Knowledge Series.pdf', 'General Knowledge'),
(217, 'General Knowledge for Kids ', 'Various', 'General Knowledge for Kids.pdf', 'General Knowledge'),
(218, 'Literacy Mobilizer Test Guide ', 'Various', 'Literacy Mobilizer Test Guide.pdf', 'General Knowledge'),
(219, 'The Book of Unusual Knowledge l', 'Publications Internationa', 'The Book of Unusual Knowledge.pdf', 'General Knowledge'),
(220, 'Lonely Planet Ultimate Travel Quiz ', 'Book Lonely Planet', 'Lonely Planet Ultimate Travel Quiz.pdf', 'General Knowledge'),
(221, 'The GCHQ Puzzle ', 'Book GCHQ', 'The GCHQ Puzzle.pdf', 'General Knowledge'),
(222, 'Minute Cryptic 160+ Puzzles ', ' Angas Tiernan', 'Minute Cryptic 160+ Puzzles.pdf', 'General Knowledge'),
(223, 'Wordle Challenge 500 Puzzles ', 'Ivy Press', 'Wordle Challenge 500 Puzzles.pdf', 'General Knowledge'),
(224, 'The Big Pub Quiz ', 'Book Various', 'The Big Pub Quiz.pdf', 'General Knowledge'),
(225, ' Only Connect Quiz Book ', 'Jack Waley Cohen', 'Only Connect Quiz Book.pdf', 'General Knowledge'),
(226, 'A Short History of Nearly Everything', ' Bill Bryson', 'A Short History of Nearly Everything.pdf', 'General Knowledge'),
(227, 'Sapiens ', 'Yuval Noah Harari ', 'Sapiens.pdf', 'General Knowledge'),
(228, 'Guinness World Records 2025 ', 'Guinness World Records', 'Guinness World Records 2025.pdf', 'General Knowledge'),
(229, 'The Times GK Crossword Book ', 'The Times', 'The Times GK Crossword Book.pdf', 'General Knowledge'),
(230, ' Murdle 100 Mysteries ', 'G T Karber', 'Murdle 100 Mysteries.pdf', 'General Knowledge'),
(231, ' The Mammoth Quiz Book ', 'Nick Holt', 'The Mammoth Quiz Book.pdf', 'General Knowledge'),
(232, ' 1500 GK Quiz Questions ', 'Terry Dolan', '1500 GK Quiz Questions.pdf', 'General Knowledge'),
(233, ' University Challenge Quiz ', 'Book Various', 'University Challenge Quiz.pdf', 'General Knowledge'),
(234, 'Bletchley Park Brainteasers', ' Sinclair McKay', 'Bletchley Park Brainteasers.pdf', 'General Knowledge'),
(235, ' The Penguin Book of Puzzles ', 'Gareth Moore', 'The Penguin Book of Puzzles.pdf', 'General Knowledge'),
(236, 'A to Z of Almost Everything  ', 'Trevor Montague', 'A to Z of Almost Everything.pdf', 'General Knowledge'),
(237, 'Quiz Master 10000 GK Questions ', 'Collins', 'Quiz Master 10000 GK Questions.pdf', 'General Knowledge'),
(238, 'Malomaat e Aama ', 'Zahid Hussain Anjum', 'Malomaat e Aama zahid.pdf', 'General Knowledge'),
(239, 'The Ultimate Pub Quiz Book ', 'Roy Preston', 'The Ultimate Pub Quiz Book.pdf', 'General Knowledge'),
(240, 'Encyclopaedia of General Knowledge ', 'Adeel Niaz', 'Encyclopaedia of General Knowledge.pdf', 'Quiz'),
(241, 'Everlatest General Knowledge ', 'Muhammad Akram', 'Everlatest General Knowledge.pdf', 'Quiz'),
(242, 'General Knowledge for All  ', 'Zahid Hussain Anjum', 'General Knowledge for All.pdf', 'Quiz'),
(243, 'CSS General Science and Ability ', 'M Imtiaz Shahid', 'CSS General Science and Ability.pdf', 'Quiz'),
(244, 'One Liner Capsule GK ', 'Rai Mansab Ali', 'One Liner Capsule GK rai.pdf', 'Quiz'),
(245, 'Science Malumat Book ', 'Urdu GK ', 'Science Malumat Book.pdf', 'Quiz'),
(246, ' International Relations GK', ' Dr Sultan Khan', 'International Relations GK.pdf', 'Quiz'),
(247, ' The Knowledge Book ', 'National Geographic', 'The Knowledge Book.pdf', 'Quiz'),
(248, 'General Knowledge Quizzes for Clever Kids  ', 'Chris Dickason', 'General Knowledge Quizzes for Clever Kids.pdf', 'Quiz'),
(249, 'Knowledge Genius', ' DK', 'Knowledge Genius.pdf', 'Quiz'),
(250, 'The 1 Percent Club Quiz ', 'Book Various', 'The 1 Percent Club Quiz.pdf', 'Quiz'),
(251, 'Smart Study GK MCQs ', 'M Soban Chaudhry', 'Smart Study GK MCQs.pdf', 'Quiz'),
(252, ' Whos Who in the World ', 'Marquis', 'Whos Who in the World.pdf', 'Quiz'),
(253, ' General Knowledge One Liners ', 'Fatima Ali Raza', 'General Knowledge One Liners.pdf', 'Quiz'),
(254, 'ILMI Almi Maloomat', ' ILMI', 'ILMI Almi Maloomat.pdf', 'Quiz'),
(255, ' World History Quiz ', 'Book Various ', 'World History Quiz.pdf', 'Quiz'),
(256, 'The Collins Pub Quiz Book', ' Collins', 'The Collins Pub Quiz Book .pdf', 'Quiz'),
(257, 'Pakistan General Knowledge MCQs ', 'Dogar Brothers', 'Pakistan General Knowledge MCQs.pdf', 'Quiz');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `title`, `author`, `price`, `image`, `created_at`) VALUES
(1, 'Encyclopaedia of General Knowledge', ' Adeel Niaz', 1600.00, 'quiz and gk 51.jpg', '2026-04-29 15:25:32'),
(2, 'Everlatest General Knowledge ', 'Muhammad Akram ', 1100.00, 'quiz and gk 52.jpg', '2026-04-29 15:29:08'),
(3, 'General Knowledge for All ', 'Zahid Hussain Anjum', 650.00, 'quiz and gk 53.jpg', '2026-04-29 15:30:18'),
(4, ' CSS General Science and Ability ', 'M Imtiaz Shahid', 1400.00, 'quiz and gk 54.jpg', '2026-04-29 15:30:59'),
(5, ' One Liner Capsule GK ', 'Rai Mansab Ali ', 550.00, 'quiz and gk 55.jpg', '2026-04-29 15:32:45'),
(6, 'Science Malumat Book ', 'Urdu GK ', 250.00, 'quiz and gk 56.jpg', '2026-04-29 15:33:23'),
(7, ' International Relations GK ', 'Dr Sultan Khan ', 1200.00, 'quiz and gk 57.jpg', '2026-04-29 15:33:54'),
(8, 'The Knowledge Book ', 'National Geographic ', 4500.00, 'quiz and gk 58.jpg', '2026-04-29 15:34:47'),
(9, 'General Knowledge Quizzes for Clever Kids ', 'Chris Dickason', 1150.00, 'quiz and gk 59.jpg', '2026-04-29 15:35:37'),
(10, ' Knowledge Genius ', 'DK', 2800.00, 'quiz and gk 60.jpg', '2026-04-29 15:36:08'),
(11, 'Pakistan Affairs GK ', 'Ikram Rabbani ', 950.00, 'quiz and gk 61.jpg', '2026-04-29 15:36:48'),
(12, ' The 1 Percent Club Quiz ', 'Book Various ', 2200.00, 'quiz and gk 62.jpg', '2026-04-29 15:37:48'),
(13, 'Smart Study GK MCQs ', 'M Soban Chaudhry ', 850.00, 'quiz and gk 63.jpg', '2026-04-29 15:38:21'),
(14, 'Geography of the World ', 'DK', 3200.00, 'quiz and gk 64.jpg', '2026-04-29 15:39:07'),
(15, ' Whos Who in the World', ' Marquis ', 5000.00, 'quiz and gk 65.jpg', '2026-04-29 15:40:01'),
(16, '5000General Knowledge One Liners ', 'Fatima Ali Raza ', 700.00, 'quiz and gk 66.jpg', '2026-04-29 15:41:13'),
(17, 'ILMI Almi Maloomat ', 'ILMI ', 900.00, 'quiz and gk 67.jpg', '2026-04-29 15:41:48'),
(18, ' World History Quiz ', 'Book Various', 1200.00, 'quiz and gk 68.jpg', '2026-04-29 15:42:42'),
(19, 'The Collins Pub Quiz', ' Book Collins ', 1900.00, 'quiz and gk 69.jpg', '2026-04-29 15:43:16'),
(20, 'Pakistan General Knowledge MCQs ', 'Dogar Brothers ', 750.00, 'quiz and gk 70.jpg', '2026-04-29 15:44:02'),
(21, 'Current Affairs 2025 ', 'Aftab Umrani ', 650.00, 'quiz and gk 71.jpg', '2026-04-30 14:42:44'),
(22, 'The Times Quiz Book ', 'The Times Mind Games', 1850.00, 'quiz and gk 72.jpg', '2026-04-30 14:43:37'),
(23, 'Everyday Science GK ', 'Dr Muhammad Akram ', 800.00, 'quiz and gk 73.jpg', '2026-04-30 14:44:37'),
(24, ' Islamic Quiz Book ', 'Saniyasnain Khan ', 500.00, 'quiz and gk 74.jpg', '2026-04-30 14:45:18'),
(25, 'Brain Training Puzzles', ' Gareth Moore ', 1300.00, 'quiz and gk 75.jpg', '2026-04-30 14:46:05'),
(26, 'The Riddles of the Sphinx ', 'David Bodycombe ', 1600.00, 'quiz and gk 76.jpg', '2026-04-30 14:47:14'),
(27, ' Worlds Greatest Riddles ', 'Various ', 850.00, 'quiz and gk 77.jpg', '2026-04-30 14:48:11'),
(28, 'Quick Review of General Knowledge', ' Dogar Publishers', 550.00, 'quiz and gk 78.jpg', '2026-04-30 14:48:47'),
(29, '1339 QI Facts To Make Your Jaw Drop ', 'John Lloyd ', 1550.00, 'quiz and gk 79.jpg', '2026-04-30 14:49:34'),
(30, 'The New York Times Guide to GK ', 'William Safire ', 4800.00, 'quiz and gk 80.jpg', '2026-04-30 14:50:47'),
(31, 'World Geography GK MCQs ', 'Ch Ahmad Najib ', 1100.00, 'quiz and gk 81.jpg', '2026-04-30 14:51:22'),
(32, 'Junior General Knowledge', ' Paramount ', 450.00, 'quiz and gk 82.jpg', '2026-04-30 14:51:59'),
(33, 'The Ultimate Trivia Book', ' J N Beil ', 1250.00, 'quiz and gk 83.jpg', '2026-04-30 14:52:33'),
(34, 'The World Almanac and Book of Facts ', 'Sarah Janssen', 3000.00, 'quiz and gk 84.jpg', '2026-04-30 14:53:23'),
(35, 'Britannica All New Kids Encyclopedia', ' Britannica ', 4200.00, 'quiz and gk 85.jpg', '2026-04-30 14:53:59'),
(36, ' General Knowledge Manual', ' Edgar Thorpe ', 1200.00, 'quiz and gk 86.jpg', '2026-04-30 14:54:31'),
(37, ' Lucents General Knowledge', ' Dr Binay Karna ', 900.00, 'quiz and gk 87.jpg', '2026-04-30 14:55:11'),
(38, 'Manorama Yearbook 2025 ', 'Mammen Mathew ', 1500.00, 'quiz and gk 88.jpg', '2026-04-30 14:55:46'),
(39, ' Pearson General Knowledge Manual ', 'Edgar Thorpe ', 1300.00, 'quiz and gk 89.jpg', '2026-04-30 14:56:37'),
(40, 'General Studies Manual ', 'McGraw Hill', 2200.00, 'quiz and gk 90.jpg', '2026-04-30 14:57:15'),
(41, 'The Handy General Knowledge Answer Book', ' Charles Liu', 2800.00, 'quiz and gk 91.jpg', '2026-04-30 14:58:06'),
(42, 'DK General Knowledge Encyclopedia', ' DK ', 3500.00, 'quiz and gk 92.jpg', '2026-04-30 14:58:48'),
(43, 'The Ultimate IQ Test Book', ' Philip Carter ', 1600.00, 'quiz and gk 93.jpg', '2026-04-30 14:59:26'),
(44, ' Boost Your Brain ', 'Gareth Moore ', 1400.00, 'quiz and gk 94.jpg', '2026-04-30 14:59:59'),
(45, ' Brain Games Big Book of Puzzles ', 'Ivan Moscovich ', 2000.00, 'quiz and gk 95.jpg', '2026-04-30 15:00:38'),
(46, 'National Geographic Kids Almanac 2025', ' National Geographic', 2500.00, 'quiz and gk 96.jpg', '2026-04-30 15:01:21'),
(47, 'Oxford Childrens Encyclopedia ', 'Oxford ', 3800.00, 'quiz and gk 97.jpg', '2026-04-30 15:02:07'),
(48, 'The Usborne Internet Linked Encyclopedia ', 'Usborne ', 3200.00, 'quiz and gk 98.jpg', '2026-04-30 15:03:12'),
(49, 'Big Book of Quiz Questions ', 'Miles Kelly ', 1700.00, 'quiz and gk 99.jpg', '2026-04-30 15:03:49'),
(50, 'The Complete Book of Intelligence Tests', ' Philip Carter ', 1800.00, 'quiz and gk 100.jpg', '2026-04-30 15:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(2, 'Admin'),
(3, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` enum('hair','skin','nails','wellness','bridal') NOT NULL,
  `duration_minutes` int(11) NOT NULL DEFAULT 60,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `category`, `duration_minutes`, `price`, `description`) VALUES
(1, 'Signature Cut & Style', 'hair', 60, 3500.00, 'Precision haircut with blowout'),
(2, 'Balayage & Highlights', 'hair', 180, 12000.00, 'Hand-painted color technique'),
(3, 'Signature Glow Facial', 'skin', 75, 4500.00, 'Deep cleansing facial'),
(4, 'Luxury Manicure', 'nails', 60, 1800.00, 'Complete manicure service'),
(5, 'Aromatherapy Massage', 'wellness', 120, 6500.00, 'Full body massage'),
(6, 'Bridal Glam Package', 'bridal', 240, 25000.00, 'Complete bridal package'),
(7, 'Keratin Treatment', 'hair', 90, 9000.00, 'Hair smoothing treatment'),
(8, 'Gel Extension Set', 'nails', 75, 3500.00, 'Gel nail extensions');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` enum('stylist','receptionist') NOT NULL,
  `commission_rate` decimal(5,4) DEFAULT 0.2000,
  `phone` varchar(20) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `role`, `commission_rate`, `phone`, `is_available`, `created_at`) VALUES
(1, 'Zara Ali', 'stylist', 0.2500, '+923001234567', 1, '2026-04-05 16:01:29'),
(2, 'Nadia Hassan', 'stylist', 0.3000, '+923001234568', 1, '2026-04-05 16:01:29'),
(3, 'Rida Tariq', 'stylist', 0.2200, '+923001234569', 1, '2026-04-05 16:01:29'),
(4, 'Ahmed Khan', 'receptionist', 0.1000, '+923001234570', 1, '2026-04-05 16:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','receptionist','stylist') DEFAULT 'receptionist',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `is_active`, `created_at`) VALUES
(1, 'admin', 'admin@elegancesalon.pk', '12345678', 'admin', 1, '2026-04-05 16:01:29'),
(2, 'Hashir', 'hashirnadeem949@gmail.com', '$2y$10$tQoizysHIQ8jxsIj0YnRjevwC3DtG8h3GKP.wKmdVmsXQ.dzNW7p2', 'receptionist', 1, '2026-04-17 12:30:32'),
(3, 'hammad', 'hammadnadeem@gmail.com', '$2y$10$lZK9OCSjg0Q8SleAlp4DAOIjOFZC.m8FgbwesHg.NDjYvK.frkwWe', 'receptionist', 1, '2026-04-17 12:38:18'),
(4, 'hadi', 'hadi@gmail.com', '$2y$10$99BE5yUjXmSpprRgYb.Ui.K7yD2HxrWGCRSLBM93ztEAGYKSLHlH.', 'receptionist', 1, '2026-04-17 12:43:35'),
(8, 'kashan', 'hammad@123gmail.com', '$2y$10$/DIMOpoiWEs.ZpaEAvGoXe6jarugss4txJabPYJ1YEBVkd.4rVQHC', 'receptionist', 1, '2026-04-25 17:43:24'),
(9, 'nadeem', 'nadeem@gmail.com', '$2y$10$Jfb3xXv9Moyo6Hdi7nBOyOE3Xvzx6.TgMeM1zRwfEFigFVmTVw/vS', 'receptionist', 1, '2026-04-25 17:52:46'),
(10, 'HASHIER', 'HASHIR@GMAIL.COM', '$2y$10$O0KU5Tjm.VbxJdfL4VTFAeQ..0lLQOLY2HlNSP814eSoZMdLsN24q', 'receptionist', 1, '2026-04-29 15:48:58'),
(11, 'jjjj', 'j@gmail.com', '$2y$10$ec1AYrtlEK0cKC/i4jFqr.ppHb2QS.BvXIyGxlj770wPuoKo6Xsk6', 'receptionist', 1, '2026-04-30 12:46:15'),
(12, 'jjjjj', 'jjj@gmail.com', '$2y$10$TdPrdjKGTsf/.BOCwKb/XOK7c0cazakSPRyiKlM0oEpr3sV.weeHa', 'receptionist', 1, '2026-04-30 12:51:52'),
(14, 'jazil', 'jazil@gmail.com', '123456', 'receptionist', 1, '2026-05-09 07:38:45'),
(15, 'laiba', 'laiba@gmail.com', 'ko23456', 'receptionist', 1, '2026-05-09 07:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`id`, `name`, `title`, `description`, `image`) VALUES
(11, 'Abdul Rahim', 'Outstanding Performance Award 2026', 'Abdul Rahim has demonstrated exceptional dedication, consistency, and excellence in his field. His hard work and commitment have set a remarkable example for others, making him a deserving recipient of this award', 'male.png'),
(12, 'Rida', '“Excellence Award 2026”', '“Rida has shown outstanding performance through her dedication, creativity, and consistent efforts. Her achievements reflect her passion and commitment, making her a truly deserving winner”', 'female.png'),
(13, 'Ali Khan', 'The Lost City', 'An adventurous journey of a young explorer who discovers a hidden city deep in the mountains.', 'Savvy A 1 Graduation Portraits _ Lloyd\'s Studio Photography (1).jfif'),
(14, 'Sara Ahmed', 'Midnight Thoughts', 'A collection of emotional and deep poems reflecting life, love, and loneliness.', 'download (1).jfif'),
(15, 'Hassan Raza', 'Tech Revolution', 'A modern guide explaining how technology is shaping the future of humanity.', 'Fotos de Graduaciones en Santo Domingo by Ranyel Raw - Ranyel Raw  (Fotógrafo) -  Santo Domingo.jfif'),
(16, 'Ayesha Noor', 'Beyond the Stars', 'A science fiction story about space travel and discovering new planets.', 'download (2).jfif'),
(17, 'Bilal Sheikh', 'The Hidden Truth', 'A mystery novel uncovering secrets buried within a small town.', 'Savvy A 1 Graduation Portraits _ Lloyd\'s Studio Photography.jfif'),
(18, 'Fatima Zahra', 'Cooking Made Easy', 'A beginner-friendly cookbook with simple and delicious recipes.', 'download (3).jfif'),
(19, 'Usman Tariq', 'Fitness First', 'A practical guide to staying healthy with workouts and diet tips.', 'Savvy A 1 Graduation Portraits _ Lloyd\'s Studio Photography.jfif'),
(20, 'Zainab Malik', 'Art of Writing', 'Tips and techniques to improve creative writing skills for beginners.', 'download.jfif'),
(21, 'Hamza Ali', 'Shadow Hunt', 'A thrilling chase between a detective and an unknown criminal mastermind.', 'صور عبايات التخرج 2025 اجمل موديلات لعبايات وارواب التخرج.jfif'),
(22, 'Noor Fatima', 'Silent Dreams', 'A touching story about hopes, struggles, and achieving dreams against all odds.', 'salutatorian graduation award.jfif'),
(23, 'Daniyal Ahmed', 'Code Breaker', 'A hacker uncovers a global conspiracy hidden inside encrypted systems.', 'Man holding proudly a mock-up diploma _ Free Psd (1).jfif'),
(24, 'Iqra Khan', 'Love & Destiny', 'A romantic story where fate brings two strangers together.', 'download (2).jfif'),
(26, 'Taha Qureshi', 'Digital World', 'A deep dive into virtual reality and its impact on real life.', '360_F_619811933_WmIrHD0mRXSDkjlWFhHOzMGoKdDPYpRL.jpg'),
(27, 'Fahad Khan', 'Warrior Within', 'A motivational journey of self-discipline and inner strength.', 'images (1).jfif'),
(28, 'Hira Shah', 'Whispering Winds', 'A poetic tale inspired by nature and changing seasons.', 'graduation-student-and-girl-with-trophy-or-diploma-outdoor-for-degree-ceremony-achievement-and-excited-college-graduate-woman-and-scholarship-success-with-academic-milestone-or-certificate-event-photo.jpg'),
(29, 'Amna Siddiqui', 'Broken Pieces', 'A story about healing and rebuilding life after heartbreak.', '2663295-graduation-university-diploma-and-happy-student-on-campus-with-smile-for-ceremony-award-and-achievement.-education-college-and-girl-graduate-celebrate-with-certificate-degree-and-academy-scroll-fit_.jpg'),
(30, 'Mahnoor Ali', 'Colors of Life', 'A vibrant story exploring different emotions and experiences.', 'a-young-female-graduate-against-the-background-of-university-graduates-2BX2E2T.jpg'),
(31, 'Sana Raza', 'Hidden Emotions', 'A story revealing the feelings people often keep inside.', 'images (2).jfif'),
(32, 'Areeba Noor', 'Endless Journey', 'A tale of traveling across different cultures and places.', 'images (3).jfif'),
(33, 'Rabia Khan', 'Moonlight Tales', 'Short stories inspired by quiet nights and deep thoughts.', '9b3e32e0fd9ca96eceb86e5cd1b509e7.jpg'),
(34, 'Sameer Ali', 'Speed Racer', 'A young racer aims to become the fastest in the world.', 'images (4).jfif'),
(35, 'Kiran Malik', 'Mind Matters', 'Mind Matters', 'college-student-portrait-graduate-certificate-black-woman-happiness-education-milestone-career-growth-degree-city-university-diploma-african-person-happy-learning-achievement_590464-209198.avif'),
(36, 'Mehwish Ahmed', 'Life Lessons', 'Simple lessons learned from everyday experiences.', 'images (5).jfif'),
(37, 'Haris Khan', 'Desert Storm', 'Survival story set in the harsh desert environment.', 'images (6).jfif'),
(38, 'Talha Raza', 'Startup Guide', 'A beginner’s roadmap to launching a startup.', 'front-view-young-man-elegant-classic-suit-holding-documents-white-background_140725-122549.avif');

-- --------------------------------------------------------

--
-- Structure for view `dashboard_stats`
--
DROP TABLE IF EXISTS `dashboard_stats`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dashboard_stats`  AS SELECT (select count(0) from `appointments` where `appointments`.`status` = 'pending') AS `pending_appointments`, (select count(0) from `appointments` where `appointments`.`status` = 'completed' and cast(`appointments`.`date_time` as date) = curdate()) AS `today_appointments`, (select count(0) from `clients`) AS `total_clients`, (select count(0) from `inventory` where `inventory`.`quantity` <= `inventory`.`low_stock_threshold`) AS `low_stock_items` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `idx_appointments_date` (`date_time`),
  ADD KEY `idx_appointments_status` (`status`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_feedback_rating` (`rating`);

--
-- Indexes for table `gk`
--
ALTER TABLE `gk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `novels`
--
ALTER TABLE `novels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_users_role` (`role`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gk`
--
ALTER TABLE `gk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `novels`
--
ALTER TABLE `novels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
