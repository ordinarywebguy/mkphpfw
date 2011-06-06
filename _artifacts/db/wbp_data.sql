-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2010 at 09:01 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wbp`
--

--
-- Dumping data for table `wbp_news`
--

INSERT INTO `wbp_news` (`id`, `wbp_news_category_id`, `title`, `text`, `created`, `modified`) VALUES
(2, 1, 'title', 'test text', 1275356516, 0),
(3, 1, 'title', 'test text', 1275356517, 0),
(4, 1, 'title', 'test text', 1275356571, 0),
(5, 2, 'sa', 'asdfasdfsadf', 1275359368, 0),
(6, 1, 'sdfsdf', 'sdfdsf', 1275360083, 0),
(7, 2, 'title', 'test text', 1275360899, 0),
(9, 1, 'Arrays', 'array()', 1275361233, 0),
(10, 1, 'Primitives', 'Primitives', 1275361949, 0),
(11, 1, 'Functions', 'Functions', 1275361965, 0),
(12, 1, 'test again', 'test again', 1275364283, 0),
(13, 1, 'title edit', 'test text', 1275364293, 0);

--
-- Dumping data for table `wbp_news_categories`
--

INSERT INTO `wbp_news_categories` (`id`, `name`, `created`, `modified`) VALUES
(1, 'PHP', 0, 0),
(2, 'Java', 0, 0);

--
-- Dumping data for table `wbp_users`
--

INSERT INTO `wbp_users` (`id`, `username`, `password`, `created`, `modified`) VALUES
(1, 'admin', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
