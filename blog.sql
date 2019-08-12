-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 06:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_user`
--

CREATE TABLE `access_user` (
  `id_access` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `get` tinyint(4) NOT NULL COMMENT 'lihat',
  `post` tinyint(4) NOT NULL COMMENT 'buat',
  `put` tinyint(4) NOT NULL COMMENT 'rubah',
  `delete` tinyint(4) NOT NULL COMMENT 'hapus',
  `module` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_user`
--

INSERT INTO `access_user` (`id_access`, `level`, `get`, `post`, `put`, `delete`, `module`) VALUES
(1, 1, 1, 0, 0, 0, 'dashboard'),
(2, 1, 1, 1, 1, 1, 'postingan'),
(3, 1, 1, 1, 1, 1, 'file');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `kode_form` varchar(150) NOT NULL,
  `nama_form` varchar(150) NOT NULL,
  `id_tabel` tinyint(4) NOT NULL,
  `tipe` varchar(150) NOT NULL,
  `placeholder` varchar(150) NOT NULL,
  `required` tinyint(4) NOT NULL,
  `urut` tinyint(4) NOT NULL,
  `menu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header_master`
--

CREATE TABLE `header_master` (
  `code_menu` varchar(50) NOT NULL,
  `name_menu` varchar(250) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `urutan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_master`
--

INSERT INTO `header_master` (`code_menu`, `name_menu`, `menu_icon`, `urutan`) VALUES
('file', 'File', 'mdi mdi-newspaper', 99),
('laman', 'Halaman', 'mdi mdi-newspaper', 2),
('postingan', 'Postingan', 'mdi mdi-newspaper', 1);

-- --------------------------------------------------------

--
-- Table structure for table `header_sub`
--

CREATE TABLE `header_sub` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `code_menu` varchar(50) NOT NULL,
  `sub_menu` varchar(150) NOT NULL,
  `icon_submenu` varchar(50) NOT NULL,
  `urut` int(11) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_sub`
--

INSERT INTO `header_sub` (`id`, `level`, `code_menu`, `sub_menu`, `icon_submenu`, `urut`, `link`) VALUES
(6, 1, 'postingan', 'Create', 'mdi mdi-creation', 1, 'custom_controler/add_post'),
(7, 1, 'postingan', 'List Post', 'mdi mdi-view-list', 2, 'master_control/master_list/postingan'),
(8, 1, 'postingan', 'draf', 'mdi mdi-zip-box', 3, 'draf'),
(9, 1, 'file', 'File', 'ti-user', 1, 'custom_controler/file_master'),
(10, 1, 'laman', 'List Halaman', 'mdi mdi-view-list', 2, 'master_control/master_list/laman');

-- --------------------------------------------------------

--
-- Table structure for table `header_tugas`
--

CREATE TABLE `header_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_user` varchar(250) NOT NULL,
  `id_header_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histori_`
--

CREATE TABLE `histori_` (
  `id` int(11) NOT NULL,
  `aksi` varchar(50) NOT NULL,
  `tabel` varchar(50) NOT NULL,
  `data` varchar(500) NOT NULL,
  `detail_user` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histori_`
--

INSERT INTO `histori_` (`id`, `aksi`, `tabel`, `data`, `detail_user`, `user_id`) VALUES
(1, 'Add', 'post', '{\"id_post\":\"rIUFVNwYKDYktbKYF4d8VUsbSY9HttxFIZWtNDn3mblIR5tFe\",\"judul\":\"adirp.id\",\"detail\":\"<p><img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\" xss=removed><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"adi,rizky,adirp.id\",\"bahasa\":\"all\",\"status_post\":\"1\",\"tubmail\":\"adirp-id\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-21 21:11:59 log', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-21 21:11:59 login Detail : ,', 0),
(2, 'Add', 'post', '{\"id_post\":\"BGVUezgxHhwx1DCFn3q2nUaOFt7IDTFquv6sLYpT8j1JTJCKP\",\"judul\":\"aku\",\"detail\":\"<p>aku<\\/p>\",\"img_tub\":\"\",\"label\":\"aku\",\"create_date\":\"2019-07-21 10:08:00\",\"bahasa\":\"ID\",\"status_post\":\"1\",\"tubmail\":\"aku\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-21 22:00:08 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-21 22:00:08 login Detail : ,', 0),
(3, 'Delete', 'ms_post', '{\"id_post\":\"BGVUezgxHhwx1DCFn3q2nUaOFt7IDTFquv6sLYpT8j1JTJCKP\",\"tubmail\":\"aku\",\"img_tub\":\"\",\"judul\":\"aku\",\"detail\":\"<p>aku<\\/p>\",\"create_date\":\"2019-07-21 10:08:00\",\"label\":\"aku\",\"bahasa\":\"all\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-21 22:00:08 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-21 22:59:25 login Detail : ,', 0),
(4, 'Delete', 'ms_post', '{\"id_post\":\"rIUFVNwYKDYktbKYF4d8VUsbSY9HttxFIZWtNDn3mblIR5tFe\",\"tubmail\":\"adirp-id\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"judul\":\"adirp.id\",\"detail\":\"<p><img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\" xss=removed><\\/p>\",\"create_date\":\"0000-00-00 00:00:00\",\"label\":\"adi,rizky,adirp.id\",\"bahasa\":\"all\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windo', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-21 22:05:26 login Detail : ,', 0),
(5, 'Add', 'post', '{\"id_post\":\"OJbeZWwYYMwl0xevZpwOOiLYE7HQ91OAk3emsJYx0hZUh7axW\",\"judul\":\"Me\",\"detail\":\"<p>Adi Rizky Pratama<br>\\r\\n<img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\" xss=removed><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"adirp.id\",\"create_date\":\"2019-07-22 08:32:45\",\"bahasa\":\"ID\",\"status_post\":\"1\",\"tubmail\":\"me\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Win', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 08:45:32 login Detail : ,', 0),
(6, 'Add', 'post', '{\"id_post\":\"ZgxXGhvZedPG9HmI5nft1jOvHIYVAvIMgLJmqUp3TftjzKk4s\",\"judul\":\"Me\",\"detail\":\"<p>Adi Rizky Pratama<br>\\r\\n<img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\" xss=removed><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"adirp.id\",\"create_date\":\"2019-07-22 09:04:40\",\"bahasa\":\"ID\",\"status_post\":\"1\",\"tubmail\":\"me-22-July-19-040440\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:40:04 login Detail : ,', 0),
(7, 'Delete', 'ms_post', '{\"id_post\":\"OJbeZWwYYMwl0xevZpwOOiLYE7HQ91OAk3emsJYx0hZUh7axW\",\"tubmail\":\"me\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"judul\":\"Me\",\"detail\":\"<p>Adi Rizky Pratama<br>\\r\\n<img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\" xss=removed><\\/p>\",\"create_date\":\"2019-07-22 08:32:45\",\"label\":\"adirp.id\",\"bahasa\":\"ID\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Win', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:46:04 login Detail : ,', 0),
(8, 'update', 'post', '{\"judul\":\"Me\",\"detail\":\"<p>Adi Rizky Pratama<br>\\r\\n<img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\"><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"adirp.id\",\"bahasa\":\"ID\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:05:17 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:05:17 login Detail : ,', 0),
(9, 'update', 'post', '{\"judul\":\"Me : adi rizky\",\"detail\":\"<p>Adi Rizky Pratama<br>\\r\\n<img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\"><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"adirp.id,rizky\",\"bahasa\":\"all\",\"status_post\":\"0\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:29:17 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:29:17 login Detail : ,', 0),
(10, 'update', 'post', '{\"judul\":\"Me : adi rizky\",\"detail\":\"<p>Adi Rizky Pratama<br>\\r\\n<img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\"><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"adirp.id,adirizkypratama\",\"bahasa\":\"all\",\"status_post\":\"0\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:27:20 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:27:20 login Detail : ,', 0),
(11, 'update', 'post', '{\"judul\":\"Me : adi rizky\",\"detail\":\"<p>Adi Rizky Pratama<br>\\r\\n<img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\"><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"adirp.id,adirizkypratama\",\"bahasa\":\"ID\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:52:21 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:52:21 login Detail : ,', 0),
(12, 'update', 'post', '{\"judul\":\"Me : adi rizky\",\"detail\":\"<p>Adi Rizky Pratama<br>\\r\\n<img alt=\\\"\\\" src=\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\"><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"adirp.id,adirizkypratama\",\"bahasa\":\"all\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:47:22 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:47:22 login Detail : ,', 0),
(13, 'Add', 'post', '{\"id_post\":\"DGOP5vhuPXC5BZP1ZB4wURTN9lj2iMLq2cyVLCs9ExBgYdHVB\",\"judul\":\"tes post pertama\",\"detail\":\"<p>post pertama<\\/p>\\r\\n\\r\\n<p>bvlasbsafsadfsafsadf<\\/p>\\r\\n\\r\\n<p xss=removed><strong>sfgasfg<\\/strong><\\/p>\\r\\n\\r\\n<p xss=removed><strong><img alt=\\\\\\\"\\\\\\\" src=\\\\\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\\\\\" xss=removed><\\/strong><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"aku\",\"create', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:42:29 login Detail : ,', 0),
(14, 'update', 'post', '{\"judul\":\"tes post pertama\",\"detail\":\"<p>post pertama<\\/p>\\r\\n\\r\\n<p>bvlasbsafsadfsafsadf<\\/p>\\r\\n\\r\\n<p><strong>sfgasfg<\\/strong><\\/p>\\r\\n\\r\\n<p><strong><img alt=\\\\\\\"\\\\\\\" src=\\\\\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\\\\\" style=\\\\\\\"float:left; height:188px; width:150px\\\\\\\" \\/><\\/strong><\\/p>\\r\\n\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"aku\",\"bahasa\":\"all\",\"status_post\":\"1\",\"last_edit_in', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:37:31 login Detail : ,', 0),
(15, 'update', 'post', '{\"judul\":\"Me : adi rizky\",\"detail\":\"<p>Adi Rizky Pratama<br \\/>\\r\\n<img alt=\\\\\\\"\\\\\\\" src=\\\\\\\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\\\\\\\" \\/><\\/p>\",\"img_tub\":\"\\/upload_data\\/images\\/adi_rp\\/48195653_10216209895513804_9204740176666951680_n.jpg\",\"label\":\"adirp.id,adirizkypratama\",\"bahasa\":\"all\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-26 23:41:22 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-26 23:41:22 login Detail : ,', 0),
(16, 'Add', 'post', '{\"id_post\":\"Op042HxspdKZZPEvCqqGk7LgkZZxe6dVROusJZyhLA8vHpMOS\",\"judul\":\"123\",\"detail\":\"<p>123<\\/p>\",\"img_tub\":\"\",\"label\":\"adi\",\"create_date\":\"2019-08-01 10:21:40\",\"bahasa\":\"ID\",\"category\":\"blog\",\"status_post\":\"1\",\"tubmail\":\"123\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-08-01 22:40:21 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-08-01 22:40:21 login Detail : ,', 0),
(17, 'update', 'post', '{\"judul\":\"123\",\"detail\":\"<p>123<\\/p>\",\"img_tub\":\"\",\"label\":\"adi\",\"category\":\"teaching\",\"bahasa\":\"ID\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-08-01 22:55:24 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-08-01 22:55:24 login Detail : ,', 0),
(18, 'update', 'post', '{\"judul\":\"123\",\"detail\":\"<p>123<\\/p>\",\"img_tub\":\"\",\"label\":\"adi\",\"category\":\"blog\",\"bahasa\":\"ID\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-08-01 22:02:25 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-08-01 22:02:25 login Detail : ,', 0),
(19, 'update', 'post', '{\"judul\":\"123\",\"detail\":\"<p>123<\\/p>\",\"img_tub\":\"\",\"label\":\"adi\",\"category\":\"blog\",\"bahasa\":\"ID\",\"status_post\":\"1\",\"last_edit_info\":\"DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-08-01 22:15:31 login Detail : ,\"}', 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-08-01 22:15:31 login Detail : ,', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ms_bahasa`
--

CREATE TABLE `ms_bahasa` (
  `id_bahasa` varchar(250) NOT NULL,
  `nama_bahasa` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_bahasa`
--

INSERT INTO `ms_bahasa` (`id_bahasa`, `nama_bahasa`) VALUES
('all', 'ALL'),
('en', 'English'),
('ID', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `ms_category`
--

CREATE TABLE `ms_category` (
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_category`
--

INSERT INTO `ms_category` (`category`) VALUES
('blog'),
('teaching');

-- --------------------------------------------------------

--
-- Table structure for table `ms_level`
--

CREATE TABLE `ms_level` (
  `level_kode` int(11) NOT NULL,
  `level_nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_level`
--

INSERT INTO `ms_level` (`level_kode`, `level_nama`) VALUES
(1, 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `ms_module`
--

CREATE TABLE `ms_module` (
  `kode_module` varchar(250) NOT NULL,
  `nama_module` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_module`
--

INSERT INTO `ms_module` (`kode_module`, `nama_module`) VALUES
('dashboard', 'dashboard'),
('file', 'File master'),
('postingan', 'Postingan');

-- --------------------------------------------------------

--
-- Table structure for table `ms_post`
--

CREATE TABLE `ms_post` (
  `id_post` varchar(50) NOT NULL,
  `tubmail` varchar(250) NOT NULL,
  `img_tub` varchar(250) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `detail` longtext NOT NULL,
  `create_date` datetime NOT NULL,
  `label` varchar(250) NOT NULL,
  `bahasa` varchar(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status_post` tinyint(4) NOT NULL,
  `last_edit_info` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_post`
--

INSERT INTO `ms_post` (`id_post`, `tubmail`, `img_tub`, `judul`, `detail`, `create_date`, `label`, `bahasa`, `category`, `status_post`, `last_edit_info`) VALUES
('DGOP5vhuPXC5BZP1ZB4wURTN9lj2iMLq2cyVLCs9ExBgYdHVB', 'tes-post-pertama', '/upload_data/images/adi_rp/48195653_10216209895513804_9204740176666951680_n.jpg', 'tes post pertama', '<p>post pertama</p>\r\n\r\n<p>bvlasbsafsadfsafsadf</p>\r\n\r\n<p><strong>sfgasfg</strong></p>\r\n\r\n<p><strong><img alt=\\\"\\\" src=\\\"/upload_data/images/adi_rp/48195653_10216209895513804_9204740176666951680_n.jpg\\\" style=\\\"float:left; height:188px; width:150px\\\" /></strong></p>\r\n', '2019-07-22 09:29:42', 'aku', 'all', '', 1, 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-22 09:37:31 login Detail : ,'),
('Op042HxspdKZZPEvCqqGk7LgkZZxe6dVROusJZyhLA8vHpMOS', '123', '', '123', '<p>123</p>', '2019-08-01 10:21:40', 'adi', 'ID', 'blog', 1, 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-08-01 22:15:31 login Detail : ,'),
('ZgxXGhvZedPG9HmI5nft1jOvHIYVAvIMgLJmqUp3TftjzKk4s', 'me-22-July-19-040440', '/upload_data/images/adi_rp/48195653_10216209895513804_9204740176666951680_n.jpg', 'Me : adi rizky', '<p>Adi Rizky Pratama<br />\r\n<img alt=\\\"\\\" src=\\\"/upload_data/images/adi_rp/48195653_10216209895513804_9204740176666951680_n.jpg\\\" /></p>', '2019-07-22 09:04:40', 'adirp.id,adirizkypratama', 'all', '', 1, 'DESKTOP-LCIK5BV Chrome 75.0.3770.142  ::1 Windows 10 date : 2019-07-26 23:41:22 login Detail : ,');

-- --------------------------------------------------------

--
-- Table structure for table `ms_publish`
--

CREATE TABLE `ms_publish` (
  `id_publish` tinyint(4) NOT NULL,
  `nama_publish` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_publish`
--

INSERT INTO `ms_publish` (`id_publish`, `nama_publish`) VALUES
(0, 'Draf'),
(1, 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `ms_tag`
--

CREATE TABLE `ms_tag` (
  `tags` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_tag`
--

INSERT INTO `ms_tag` (`tags`) VALUES
('adi'),
('adirizkypratama'),
('adirp.id'),
('aku'),
('rizky');

-- --------------------------------------------------------

--
-- Table structure for table `tabel`
--

CREATE TABLE `tabel` (
  `id` int(11) NOT NULL,
  `code_nama` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `urut` tinyint(4) NOT NULL,
  `module` varchar(25) NOT NULL,
  `orderable` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel`
--

INSERT INTO `tabel` (`id`, `code_nama`, `nama`, `urut`, `module`, `orderable`) VALUES
(1, 'judul', 'Judul', 1, 'postingan', 1),
(2, 'label', 'Label', 2, 'postingan', 1),
(3, 'action', 'Action', 99, 'postingan', 0),
(4, 'create_date', 'Create', 0, 'postingan', 1),
(5, 'nama_publish', 'Publish', 5, 'postingan', 1),
(6, 'nama_bahasa', 'Bahasa', 6, 'postingan', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tag_post`
-- (See below for the actual view)
--
CREATE TABLE `tag_post` (
`tags` varchar(250)
,`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `last_edit_info` varchar(250) NOT NULL,
  `last_login` datetime NOT NULL,
  `last_login_info` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `status`, `last_edit_info`, `last_login`, `last_login_info`) VALUES
('superadmin', '$2y$10$SER1qExTS5FTd/x1IC35hephIcAvqkPhmwbWu7xICiodzMcMpjy5a', 1, 1, 'DESKTOP-LCIK5BV Chrome 72.0.3626.96  ::1 Windows 10 date : 2019-02-08 17:34:34 login Detail : superadmin,superadmin,', '2019-01-01 00:00:00', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_post`
-- (See below for the actual view)
--
CREATE TABLE `v_post` (
`id_post` varchar(50)
,`tubmail` varchar(250)
,`img_tub` varchar(250)
,`judul` varchar(250)
,`create_date` date
,`label` varchar(250)
,`nama_bahasa` varchar(250)
,`nama_publish` varchar(250)
,`bahasa` varchar(11)
,`status_post` tinyint(4)
,`isi_post` varchar(50)
,`category` varchar(50)
,`detail` longtext
);

-- --------------------------------------------------------

--
-- Structure for view `tag_post`
--
DROP TABLE IF EXISTS `tag_post`;

CREATE VIEW `tag_post`  AS  select `ms_tag`.`tags` AS `tags`,count(`ms_tag`.`tags`) AS `count` from (`ms_tag` join `ms_post` on((`ms_tag`.`tags` like concat('%',`ms_post`.`label`,'%')))) group by `ms_tag`.`tags` ;

-- --------------------------------------------------------

--
-- Structure for view `v_post`
--
DROP TABLE IF EXISTS `v_post`;

CREATE VIEW `v_post`  AS  select `ms_post`.`id_post` AS `id_post`,`ms_post`.`tubmail` AS `tubmail`,`ms_post`.`img_tub` AS `img_tub`,`ms_post`.`judul` AS `judul`,cast(`ms_post`.`create_date` as date) AS `create_date`,`ms_post`.`label` AS `label`,`ms_bahasa`.`nama_bahasa` AS `nama_bahasa`,`ms_publish`.`nama_publish` AS `nama_publish`,`ms_post`.`bahasa` AS `bahasa`,`ms_post`.`status_post` AS `status_post`,substr(`ms_post`.`detail`,1,50) AS `isi_post`,`ms_post`.`category` AS `category`,`ms_post`.`detail` AS `detail` from ((`ms_post` join `ms_bahasa` on((`ms_bahasa`.`id_bahasa` = `ms_post`.`bahasa`))) join `ms_publish` on((`ms_publish`.`id_publish` = `ms_post`.`status_post`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_user`
--
ALTER TABLE `access_user`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `db_name` (`module`),
  ADD KEY `level` (`level`,`module`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu` (`menu`);

--
-- Indexes for table `header_master`
--
ALTER TABLE `header_master`
  ADD PRIMARY KEY (`code_menu`);

--
-- Indexes for table `header_sub`
--
ALTER TABLE `header_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `code_menu` (`code_menu`);

--
-- Indexes for table `header_tugas`
--
ALTER TABLE `header_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_header_sub` (`id_header_sub`);

--
-- Indexes for table `histori_`
--
ALTER TABLE `histori_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_bahasa`
--
ALTER TABLE `ms_bahasa`
  ADD PRIMARY KEY (`id_bahasa`);

--
-- Indexes for table `ms_category`
--
ALTER TABLE `ms_category`
  ADD PRIMARY KEY (`category`);

--
-- Indexes for table `ms_level`
--
ALTER TABLE `ms_level`
  ADD PRIMARY KEY (`level_kode`);

--
-- Indexes for table `ms_module`
--
ALTER TABLE `ms_module`
  ADD PRIMARY KEY (`kode_module`);

--
-- Indexes for table `ms_post`
--
ALTER TABLE `ms_post`
  ADD PRIMARY KEY (`id_post`),
  ADD UNIQUE KEY `tubmail` (`tubmail`);

--
-- Indexes for table `ms_tag`
--
ALTER TABLE `ms_tag`
  ADD PRIMARY KEY (`tags`);

--
-- Indexes for table `tabel`
--
ALTER TABLE `tabel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module` (`module`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_user`
--
ALTER TABLE `access_user`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_sub`
--
ALTER TABLE `header_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `header_tugas`
--
ALTER TABLE `header_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histori_`
--
ALTER TABLE `histori_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ms_level`
--
ALTER TABLE `ms_level`
  MODIFY `level_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel`
--
ALTER TABLE `tabel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_user`
--
ALTER TABLE `access_user`
  ADD CONSTRAINT `access_user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `ms_level` (`level_kode`),
  ADD CONSTRAINT `access_user_ibfk_2` FOREIGN KEY (`module`) REFERENCES `ms_module` (`kode_module`);

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `ms_module` (`kode_module`);

--
-- Constraints for table `header_sub`
--
ALTER TABLE `header_sub`
  ADD CONSTRAINT `header_sub_ibfk_1` FOREIGN KEY (`level`) REFERENCES `ms_level` (`level_kode`),
  ADD CONSTRAINT `header_sub_ibfk_2` FOREIGN KEY (`code_menu`) REFERENCES `header_master` (`code_menu`);

--
-- Constraints for table `header_tugas`
--
ALTER TABLE `header_tugas`
  ADD CONSTRAINT `header_tugas_ibfk_1` FOREIGN KEY (`id_header_sub`) REFERENCES `header_sub` (`id`);

--
-- Constraints for table `tabel`
--
ALTER TABLE `tabel`
  ADD CONSTRAINT `tabel_ibfk_1` FOREIGN KEY (`module`) REFERENCES `ms_module` (`kode_module`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
