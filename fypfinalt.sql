-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 11:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fypfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submition_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guidline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_statement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_statement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapter_status` tinyint(100) NOT NULL DEFAULT 0,
  `deadline` timestamp NOT NULL DEFAULT (current_timestamp() + interval 4 week),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `project_id`, `title`, `submition`, `submition_date`, `template`, `guidline`, `student_statement`, `supervisor_statement`, `chapter_status`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 1, 'id 1 chapter 1 department 1', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>1 updating chapter 1 checking if update works for project 1 chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-06-06 15:44:15'),
(2, 1, 'id 2 chapter 2 department 1', NULL, '2023-06-09 09:21:52', NULL, NULL, '2 statement', '<p>2 updating chapter 1</p>\r\n<p>project 1</p>', 0, '0000-00-00 00:00:00', NULL, '2023-06-05 15:19:42'),
(3, 1, 'id 3 chapter 3 department 1', NULL, '2023-06-09 09:21:52', NULL, NULL, '3 statement', '<p>3 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-03-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(4, 1, 'id 4 chapter 4 department 1', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, '4 statement', '<p>4 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(5, 2, 'id 5 chapter 1 department 2', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, '5 statement', '<p>5 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(6, 2, 'id 6 chapter 2 department 2', 'chapter_6_project_2_20230608_164359.png', '2023-06-09 09:21:52', NULL, NULL, '6 statement', '<p>6 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-06-08 13:44:00'),
(7, 2, 'id 7 chapter 3 department 2', NULL, '2023-06-09 09:21:52', NULL, NULL, '7 statement', '<p>7 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-06-05 15:20:31'),
(8, 3, 'id 8 chapter 1 department 2', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, '8 statement', '<p>8 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(9, 3, 'id 9 chapter 2 department 2', NULL, '2023-06-09 09:21:52', NULL, NULL, '9 statement', '<p>9 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(10, 3, 'id 10 chapter 3 department 2', NULL, '2023-06-09 09:21:52', NULL, NULL, '10 statement', '<p>10 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(11, 0, 'chapter 1 department 3', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>11 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(12, 4, 'chapter 2 department 3', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>12 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(13, 5, 'chapter 1 department 3', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>13 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(14, 5, 'chapter 2 department 3', NULL, '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>14 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(15, 6, 'chapter 1 department 4', NULL, '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>15 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(16, 6, 'chapter 2 department 4', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>16 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(17, 6, 'chapter 3 department 4', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>17 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(18, 7, 'chapter 1 department 4', NULL, '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>18 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(19, 7, 'chapter 2 department 4', 'chapter_1_project_1_20230508_100109.png', '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>19 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51'),
(20, 7, 'chapter 3 department 4', NULL, '2023-06-09 09:21:52', NULL, NULL, 'statement', '<p>20 updating chapter 1</p>\r\n<p>project 1</p>', 0, '2024-01-31 20:33:45', NULL, '2023-05-11 08:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_histories`
--

CREATE TABLE `chapter_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter_histories`
--

INSERT INTO `chapter_histories` (`id`, `file_adress`, `file_id`, `created_at`, `updated_at`) VALUES
(2, 'chapter_1_project_1_20230508_095921.pdf', 1, '2023-05-08 03:59:21', '2023-05-08 03:59:30'),
(3, 'chapter_1_project_1_20230508_095930.pdf', 1, '2023-05-08 03:59:30', '2023-05-08 04:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'School of Science and Engineering'),
(2, 'School of Management and Economics'),
(3, 'School of Social Sciences'),
(4, 'School of Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_files`
--

CREATE TABLE `history_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_files`
--

INSERT INTO `history_files` (`id`, `file_adress`, `file_id`, `created_at`, `updated_at`) VALUES
(2, 'chapter_1_project_1_20230508_095921.pdf', 1, '2023-05-08 06:59:21', '2023-05-08 06:59:30'),
(3, 'chapter_1_project_1_20230508_095930.pdf', 1, '2023-05-08 06:59:30', '2023-05-08 07:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2023_03_28_044013_create_user_roles_table', 1),
(18, '2023_03_28_044022_create_roles_table', 1),
(19, '2023_03_28_044049_create_projects_table', 1),
(20, '2023_03_28_044109_create_project_queries_table', 1),
(21, '2023_03_28_044123_create_project_users_table', 1),
(22, '2023_03_28_044136_create_chapters_table', 1),
(23, '2023_03_28_044143_create_tasks_table', 1),
(24, '2023_03_28_044211_create_history_files_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `confirm_title` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtittle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_status` decimal(5,2) NOT NULL DEFAULT 0.00,
  `deadline` timestamp NOT NULL DEFAULT (current_timestamp() + interval 40 week),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `supervisor_id`, `student_id`, `confirm_title`, `title`, `subtittle`, `department`, `project_status`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 0, 'project title 1', 'project sub title 1 project sub title 1', '1', '0.00', '0000-00-00 00:00:00', NULL, '2023-05-23 06:13:38'),
(2, 8, 2, 0, 'project 2 title update', 'project 3 sub title update', '2', '0.00', '2024-02-20 08:09:33', '2023-05-16 05:09:33', '2023-06-09 07:02:11'),
(3, 9, 3, 0, 'project title 3', 'project sub title 3 project sub title 1', '2', '0.00', '2024-02-20 09:59:42', '2023-05-16 06:59:42', '2023-05-16 10:27:42'),
(4, 9, 4, 0, 'project title 4', 'project sub title 4 project sub title 1', '3', '0.00', '2024-02-20 09:59:42', '2023-05-16 06:59:42', '2023-05-16 10:27:42'),
(5, 10, 5, 0, 'project title 5', 'project sub title 5 project sub title 1', '3', '0.00', '2024-02-20 09:59:42', '2023-05-16 06:59:42', '2023-05-16 10:27:42'),
(6, 10, 6, 0, 'project title 6', 'project sub title 6 project sub title 1', '4', '0.00', '2024-02-20 09:59:42', '2023-05-16 06:59:42', '2023-05-16 10:27:42'),
(7, 10, 7, 0, 'project title 7', 'project sub title 7 project sub title 1', '4', '0.00', '2024-02-20 13:22:25', '2023-05-16 10:22:25', '2023-05-16 10:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `project_queries`
--

CREATE TABLE `project_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guidline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` timestamp NOT NULL DEFAULT (current_timestamp() + interval 40 week),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_queries`
--

INSERT INTO `project_queries` (`id`, `project_id`, `title`, `template`, `guidline`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 1, 'project Query 1', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL),
(2, 2, 'Project Query 2', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL),
(3, 3, 'project query 3', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL),
(4, 4, 'project query 4', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL),
(5, 5, 'project query 5', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL),
(6, 6, 'project query 6', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL),
(7, 7, 'project query 7', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_users`
--

CREATE TABLE `project_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'student', NULL, NULL),
(2, 'supervisor', NULL, NULL),
(3, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submition_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guidline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_statement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_statement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_status` tinyint(100) NOT NULL DEFAULT 0,
  `deadline` timestamp NOT NULL DEFAULT (current_timestamp() + interval 2 week),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `chapter_id`, `title`, `submition`, `submition_date`, `template`, `guidline`, `student_statement`, `supervisor_statement`, `task_status`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 1, 'chapter 1 task', NULL, '2023-06-09 09:19:07', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, '<p>project 1 chapter 1 task 1</p>', 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-06-06 18:39:17'),
(2, 1, 'chapter 1 task 2', NULL, '2023-06-09 09:19:07', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-06-05 18:10:52'),
(3, 2, 'chapter 2 task 3', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(4, 3, 'chapter 3 task 1', NULL, '2023-06-06 21:38:47', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, '<p>checking if project 1 chapter 3 task 4 works, updateing</p>', 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-06-06 18:38:47'),
(5, 4, 'chapter 4 task 1', NULL, '2023-06-09 09:19:54', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-06-05 18:23:52'),
(6, 5, 'chapter 5 task 1', 'task_6_chapter_5_project_2_20230611_123733.pptx', '2023-06-11 12:37:33', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-06-11 09:37:33'),
(7, 5, 'chapter 5 task 2', NULL, '2023-06-08 20:56:37', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', '<p>student project 2 chapter 5 task 7 update</p>\r\n<p>&nbsp;</p>', NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-06-08 17:56:37'),
(8, 5, 'chapter 5 task 1', 'task_8_chapter_5_project_2_20230611_124128.pptx', '2023-06-11 12:41:28', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-06-11 09:41:28'),
(9, 6, 'chapter 6 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(10, 7, 'chapter 7 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(11, 8, 'chapter 8 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(12, 8, 'chapter 8 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(13, 9, 'chapter 9 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(14, 10, 'chapter 10 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(15, 11, 'chapter 11 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(16, 12, 'chapter 12 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(17, 13, 'chapter 13 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(18, 13, 'chapter 13 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(19, 14, 'chapter 14 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(20, 15, 'chapter 15 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(21, 16, 'chapter 16 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(22, 17, 'chapter 17 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(23, 17, 'chapter 17 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(24, 17, 'chapter 17 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(25, 18, 'chapter 18 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(26, 18, 'chapter 18 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(27, 19, 'chapter 19 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(28, 20, 'chapter 20 task', NULL, '2023-05-09 21:58:21', 'template_task_645ac1fdd0aba_chapter_1_.png', 'guideline_task_645ac1fdd1cfd_chapter_1_.pdf', NULL, NULL, 0, '2023-05-23 21:58:21', '2023-05-09 18:58:21', '2023-05-09 18:58:21'),
(29, 1, 'task testing, project 1 chapater 1', NULL, '2023-06-09 09:19:54', 'template_task_6480407922912_chapter_1.jpg', 'guideline_task_6480407979209_chapter_1.png', NULL, NULL, 0, '2023-06-24 08:31:00', '2023-06-07 05:31:53', '2023-06-08 11:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `task_histories`
--

CREATE TABLE `task_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_histories`
--

INSERT INTO `task_histories` (`id`, `file_adress`, `file_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 6, '2023-05-09 18:58:21', '2023-06-11 09:37:24'),
(2, 'task_6_chapter_5_project_2_20230611_123724.pptx', 6, '2023-06-11 09:37:24', '2023-06-11 09:37:33'),
(3, 'task_8_chapter_5_project_2_20230611_124115.pptx', 8, '2023-06-11 09:41:15', '2023-06-11 09:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `department`, `major`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'student 1', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'student.1', NULL, NULL, NULL),
(2, 'student 2', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'student.2', NULL, NULL, NULL),
(3, 'student 3', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'student.3', NULL, NULL, NULL),
(4, 'student 4', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'student.4', NULL, NULL, NULL),
(5, 'student 5', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'student.4', NULL, NULL, NULL),
(6, 'student 6', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'student.4', NULL, NULL, NULL),
(7, 'student 7', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'student.4', NULL, NULL, NULL),
(8, 'supervisor 1', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'supervisor.1', NULL, NULL, NULL),
(9, 'supervisor 2', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'supervisor.2', NULL, NULL, NULL),
(10, 'supervisor and admin 3', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'supervisor.admin.3', NULL, NULL, NULL),
(11, 'admin 1', 'zheliyasalam@gmail.com', 'cse', 'cs', NULL, 'admin.1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 9, 2, NULL, NULL),
(10, 10, 2, NULL, NULL),
(11, 10, 3, NULL, NULL),
(12, 11, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_files`
--
ALTER TABLE `history_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_student_id_unique` (`student_id`);

--
-- Indexes for table `project_queries`
--
ALTER TABLE `project_queries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_queries_project_id_unique` (`project_id`);

--
-- Indexes for table `project_users`
--
ALTER TABLE `project_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_users_student_id_unique` (`student_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_histories`
--
ALTER TABLE `task_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_files`
--
ALTER TABLE `history_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_queries`
--
ALTER TABLE `project_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_users`
--
ALTER TABLE `project_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `task_histories`
--
ALTER TABLE `task_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
