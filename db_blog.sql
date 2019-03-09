-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 02:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(11, 'Java'),
(12, 'C'),
(13, 'PHP'),
(14, 'C++'),
(15, 'HTML'),
(16, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(1, 'Nur nobi', 'jewel', 'nurnobi319@gmail.com', 'This is about our blog page...', 0, '2016-11-28 18:05:20'),
(6, 'Badhon', 'khan', 'khan456@gmail.com', 'Lorem PHP  is simply dummy text of the printing and typesetting industry. Lorem Ipsu....', 0, '2016-11-30 07:08:44'),
(7, 'Rakib', 'hasan', 'rakib33@gmail.com', 'Lorem PHP  is simply dummy text of the printing and typesetting industry. Lorem Ipsu....', 1, '2016-11-30 07:23:04'),
(8, 'Nizam', 'Uddin', 'nizam33@gmail.com', 'Lorem PHP  is simply dummy text of the printing and typesetting industry. Lorem Ipsu....', 1, '2016-11-30 07:23:28'),
(9, 'Kamrul', 'hasan', 'hassan456@gmail.com', 'Lorem PHP  is simply dummy text of the printing and typesetting industry. Lorem Ipsu....', 0, '2016-11-30 07:23:49'),
(10, 'Rakib', 'Hasan', 'rakib33@gmail.com', 'Lorem PHP is simply dummy text of the printing and typesetting industry. Lorem Ipsu....', 0, '2017-04-28 19:15:29'),
(11, 'Rakib', 'Hasan', 'rakib33@gmail.com', 'sdkfjksfjdskfjskjdfskljdfssdfdffdfd', 0, '2017-05-07 16:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, 'Database Project Using CRUD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE IF NOT EXISTS `tbl_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(2, 'Terms & Policy', '<p>&nbsp;programmable OR gates at the output. Each AND gate has n inputs, and each OR gate has 2n inputs.<br />Thus, each OR gate can be used to generate any conceivable Boolean function of n variables, and this<br />generalized ROM can be used to produce m arbitrary n-variable Boolean functions. The AND array<br />produces all possible minterms of a given number of input variables, and the programmable OR array<br />allows only the desired minterms to appear at their inputs. Figure 9.3 shows the internal architecture<br />of a PROM having four input lines, a hard-wired array of 16 AND gates and a programmable array<br />of four OR gates. A cross (&times;) indirammed) fusible link or interconnection,<br />and a dot (&bull;) indicates a hard-wired interconnection. PROMs, EPROMs and EEPROMs (Electrically<br />Erasable Programmable Read Only Memory) can be programmed using standard PROM programmers.<br />One of the major disadvantages of PROMs is their inefficient use of logic capacity. It is not economical<br />to use PROMs for all those applications</p>'),
(4, 'About Programming', '<p><strong>Computer programming</strong><span>&nbsp;(often shortened to&nbsp;</span><strong>programming</strong><span>) is a process that leads from an original formulation of a&nbsp;</span><a title="Computing" href="https://en.wikipedia.org/wiki/Computing">computing</a><span>&nbsp;problem to&nbsp;</span><a title="Executable" href="https://en.wikipedia.org/wiki/Executable">executable</a><span>&nbsp;</span><a title="Computer program" href="https://en.wikipedia.org/wiki/Computer_program">computer programs</a><span>. Programming involves activities such as analysis, developing understanding, generating&nbsp;</span><a title="Algorithm" href="https://en.wikipedia.org/wiki/Algorithm">algorithms</a><span>, verification of requirements of algorithms including their correctness and resources consumption, and implementation (commonly referred to as&nbsp;</span><strong>coding</strong><span>&nbsp;of algorithms in a target&nbsp;</span><a title="Programming language" href="https://en.wikipedia.org/wiki/Programming_language">programming language</a><span>.&nbsp;</span><a title="Source code" href="https://en.wikipedia.org/wiki/Source_code">Source code</a><span>&nbsp;is written in one or more programming languages. The purpose of programming is to find a sequence of instructions that will automate performing a specific task or solving a given problem. The process of programming thus often requires expertise in many different subjects, including knowledge of the&nbsp;</span><a title="Application domain" href="https://en.wikipedia.org/wiki/Application_domain">application domain</a><span>, specialized algorithms, and formal&nbsp;</span><a title="Logic" href="https://en.wikipedia.org/wiki/Logic">logic</a><span>.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `description`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(19, 11, 'Java programming', 'This is about Java', '<p>There are two basic types of GUI program in Java: stand-alone applications and (online)<br />applets. An applet is a program that runs in a rectangular area on a Web page. Applets are<br />generally small programs, meant to do fairly simple things, although there is nothing to stop<br />them from being very complex. Applets were responsible for a lot of the initial excitement about<br />Java when it was introduced, since they could do things that could not otherwise be done on<br />Web pages. However, there are now easier ways to do many of the more basic things that can<br />be done with applets, and they are no longer the main focus of interest in Java.</p>', 'upload/4af80705ee.jpg', 'jewel', 'Programming', '0000-00-00 00:00:00', 22),
(21, 12, 'C Programming', 'This is about C', '<p>C is a powerful general-purpose programming language. It is fast, portable and available in all platforms.If you are new to programming, C is a good choice to start your programming journey.This is a comprehensive guide on how to get started in C programming language, why you should learn it and how you can learn it.</p>', 'upload/3459f7dbb9.jpg', 'jewel', 'Programming', '0000-00-00 00:00:00', 22),
(22, 13, 'Php Programming', 'This is about Php', '<p><strong>PHP</strong><span>&nbsp;is a server-side&nbsp;</span><strong>scripting language</strong><span>&nbsp;designed primarily for web development but also used as a general-purpose programming&nbsp;</span><strong>language</strong><span>. Originally created by Rasmus Lerdorf in 1994, the&nbsp;</span><strong>PHP</strong><span>&nbsp;reference implementation is now produced by The</span><strong>PHP</strong><span>&nbsp;Development Team.</span></p>\r\n<p><strong>PHP</strong><span>&nbsp;is mainly focused on server-side scripting, so you can do anything any other CGI program can do, such as collect form data, generate dynamic page content, or send and receive cookies. But&nbsp;</span><strong>PHP</strong><span>&nbsp;can do much more. There are three main areas where&nbsp;</span><strong>PHP</strong><span>&nbsp;scripts are&nbsp;</span><strong>used</strong><span>. Server-side scripting.</span></p>', 'upload/5e32309b6d.jpg', 'jewel', 'Programming', '0000-00-00 00:00:00', 22),
(23, 14, 'C++ Programming', 'This is about C++', '<div><strong><span>When we consider a C++ program, it can be defined as a collection of objects that communicate via invoking each other''s methods. Let us now briefly look into what do class, object, methods and Instance variables mean.</span></strong></div>\r\n<ul class="list">\r\n<li>\r\n<p><strong>Object</strong>&nbsp;&minus; Objects have Properties and Behaviors. Example: A dog has Properties - color, name, breed as well as Behaviors - wagging, barking, eating. An object is an instance of a class.</p>\r\n</li>\r\n<li>\r\n<p><strong>Class</strong>&nbsp;&minus; A class can be defined as a template/blueprint that describes the behaviors/states that object of its type support.</p>\r\n</li>\r\n</ul>', 'upload/5c5c43abe2.jpg', 'jewel', 'Programming', '0000-00-00 00:00:00', 22),
(25, 11, 'NSTU', 'This is about nstu', '<p><strong>Noakhali Science and Technology University</strong>&nbsp;(<a title="Bengali language" href="https://en.wikipedia.org/wiki/Bengali_language">Bengali</a>:&nbsp;<span lang="bn">à¦¨à§‹à¦¯à¦¼à¦¾à¦–à¦¾à¦²à§€ à¦¬à¦¿à¦œà§à¦žà¦¾à¦¨ à¦“ à¦ªà§à¦°à¦¯à§à¦•à§à¦¤à¦¿ à¦¬à¦¿à¦¶à§à¦¬à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à¦¯à¦¼</span>) (popularly known as&nbsp;<strong>NSTU</strong>) is a newly established&nbsp;<a title="Public university" href="https://en.wikipedia.org/wiki/Public_university">public university</a>&nbsp;in the coastal terrain&nbsp;<a class="mw-redirect" title="Noakhali" href="https://en.wikipedia.org/wiki/Noakhali">Noakhali</a>&nbsp;of&nbsp;<a title="Bangladesh" href="https://en.wikipedia.org/wiki/Bangladesh">Bangladesh</a>. It is the 27th public university (out of 32) and fifth science and technology university in Bangladesh when it established, while in 2013, it places as 10th public university (out of 38) and 2nd science and technology university in national ranking. Its foundation stone was laid on 11 October 2003 and academic activities started on 22 June 2006.</p>\r\n<p>Founding a science and technology university in a&nbsp;<a class="mw-redirect" title="Coastal" href="https://en.wikipedia.org/wiki/Coastal">coastal</a>&nbsp;terrain like Noakhali is significant. A newly accrued coastal system may render this university a versatile field station to study the pattern of changes in the seashore and to harness its opportunities.</p>', 'upload/77dec6d4b8.jpg', 'nizam', 'Education', '0000-00-00 00:00:00', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(4, 'First Slider will be go here', 'upload/slider/419981b897.jpg'),
(5, 'Second Slider will be go here', 'upload/slider/a212c4819b.jpg'),
(6, 'Third Slider will be go here', 'upload/slider/8cd6c04390.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE IF NOT EXISTS `tbl_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'http://facebook.com/live_project', 'http://twitter.com/live_project', 'http://linkedin.com/live_project', 'http://google.com/live_project');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE IF NOT EXISTS `tbl_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme`) VALUES
(1, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(22, 'nur nobi', 'jewel', '3bd916971651ba60d0e50fc9502a478e', 'nurnobi319@gmail.com', '<p>This is an Admin</p>', 0),
(30, 'Nur Nobi', 'jewel', '827ccb0eea8a706c4c34a16891f84e7b', 'nurnobi@gmail.com', 'This is an author', 1),
(31, 'Rakib Hasan', 'Rakib', '81dc9bdb52d04dc20036dbd8313ed055', 'rakib33@gmail.com', 'This is an Editor', 2),
(32, 'Nizam Uddin', 'nizam', '34d778bcfc8c2829edfc70f690a4b46a', 'nizam@gmail.com', 'This is an Editor', 2);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE IF NOT EXISTS `title_slogan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Database project with CRUD', 'Programming   Blog', 'upload/logo.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
