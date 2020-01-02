-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 04:22 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyberblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `authorId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postId`, `authorId`, `title`, `content`) VALUES
(1, 35, 82, 'dbtitlez', 'dbcontentz'),
(2, 35, 83, 'titlez', 'a lot of more content than the last comment but still not too much'),
(4, 35, 84, 'wtf are you on about?', ' why are there so many comments for a lorem ipsum post ? '),
(5, 35, 86, 'Maariv Lanoar.', ' loreming ipsumin the imsumizem of the loreminingingz you to hotdog in the plenties i guess ');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `image`) VALUES
(26, 83, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg'),
(27, 82, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg'),
(28, 82, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg'),
(29, 82, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg'),
(30, 82, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg'),
(31, 82, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg'),
(32, 82, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg'),
(33, 82, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg'),
(34, 83, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg'),
(35, 82, 'Post Title\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet aliquam id diam maecenas ultricies mi eget mauris pharetra. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nibh sit amet commodo nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Vitae et leo duis ut diam quam nulla. Eget sit amet tellus cras adipiscing enim eu turpis. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Bibendum enim facilisis gravida neque convallis a. Amet consectetur adipiscing elit ut aliquam purus. Eu non diam phasellus vestibulum lorem. Quam adipiscing vitae proin sagittis.\r\n\r\nJusto laoreet sit amet cursus. Augue neque gravida in fermentum et. Facilisi morbi tempus iaculis urna id. Aliquet risus feugiat in ante metus dictum at. Augue interdum velit euismod in pellentesque massa placerat duis. Pellentesque sit amet porttitor eget dolor morbi. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. Ipsum consequat nisl vel pretium lectus quam id. Nunc pulvinar sapien et ligula ullamcorper. Orci porta non pulvinar neque laoreet suspendisse interdum.\r\n\r\nMassa eget egestas purus viverra. Sollicitudin tempor id eu nisl nunc. Quis hendrerit dolor magna eget. Id faucibus nisl tincidunt eget nullam. Elit ut aliquam purus sit amet luctus venenatis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Sapien eget mi proin sed libero. Egestas egestas fringilla phasellus faucibus scelerisque eleifend. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Morbi tristique senectus et netus et malesuada. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Placerat in egestas erat imperdiet. Eget nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Bibendum at varius vel pharetra. Ut etiam sit amet nisl purus in mollis. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi. Tellus mauris a diam maecenas sed enim ut sem viverra.\r\n\r\nQuis blandit turpis cursus in hac habitasse. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Urna nec tincidunt praesent semper feugiat nibh sed pulvinar proin. Ut etiam sit amet nisl purus in. Integer feugiat scelerisque varius morbi enim nunc. In nisl nisi scelerisque eu ultrices vitae auctor eu augue. Nullam non nisi est sit amet. Sed vulputate odio ut enim blandit. Massa eget egestas purus viverra accumsan in. Odio morbi quis commodo odio aenean sed. Adipiscing elit ut aliquam purus. Venenatis a condimentum vitae sapien pellentesque habitant. Habitant morbi tristique senectus et netus. Mauris sit amet massa vitae tortor condimentum lacinia quis vel. Id ornare arcu odio ut sem. Risus feugiat in ante metus dictum at tempor commodo. Proin sed libero enim sed faucibus turpis in. Integer eget aliquet nibh praesent tristique magna sit.\r\n\r\nMalesuada fames ac turpis egestas maecenas pharetra conv', 'https://pinnacleplacement.com/wp-content/uploads/employers-750x300.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(82, 'karnafun', '', '1234'),
(83, 'hotdog', '', '123'),
(84, 'hotdogz', '', '123'),
(85, 'pizda', '123213', '123123'),
(86, '123123123', '123213213123123123', '123123'),
(87, 'dor', '123123213213', '1234'),
(88, 'Alon Hagever', '123123123213', '123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_comments`
-- (See below for the actual view)
--
CREATE TABLE `v_comments` (
`commentId` int(11)
,`postId` int(11)
,`authorId` int(11)
,`title` varchar(100)
,`content` varchar(5000)
,`author` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_postswithauthorname`
-- (See below for the actual view)
--
CREATE TABLE `v_postswithauthorname` (
`id` int(11)
,`authorId` int(11)
,`author` varchar(50)
,`content` varchar(3000)
,`title` varchar(100)
,`image` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure for view `v_comments`
--
DROP TABLE IF EXISTS `v_comments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_comments`  AS  select `comments`.`id` AS `commentId`,`comments`.`postId` AS `postId`,`comments`.`authorId` AS `authorId`,`comments`.`title` AS `title`,`comments`.`content` AS `content`,`users`.`username` AS `author` from (`comments` join `users` on(`users`.`id` = `comments`.`authorId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_postswithauthorname`
--
DROP TABLE IF EXISTS `v_postswithauthorname`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_postswithauthorname`  AS  select `posts`.`id` AS `id`,`posts`.`author` AS `authorId`,`users`.`username` AS `author`,`posts`.`content` AS `content`,`posts`.`title` AS `title`,`posts`.`image` AS `image` from (`posts` join `users` on(`users`.`id` = `posts`.`author`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_authorId` (`authorId`),
  ADD KEY `fk_comments_postId` (`postId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_author` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_authorId` FOREIGN KEY (`authorId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_comments_postId` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_author` FOREIGN KEY (`author`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
