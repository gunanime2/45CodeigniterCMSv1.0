-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2015 at 04:19 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `45cms-codeigniter-extension-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `45cms_appearance`
--

CREATE TABLE IF NOT EXISTS `45cms_appearance` (
  `appearance_id` int(11) NOT NULL AUTO_INCREMENT,
  `appearance_name` text NOT NULL,
  `body_font_family` text NOT NULL,
  `body_background_color` text NOT NULL,
  `body_maximum_width` text NOT NULL,
  `body_font_size` text NOT NULL,
  `header_background_color` text NOT NULL,
  `header_header_text_color` text NOT NULL,
  `header_normal_text_color` text NOT NULL,
  `header_link_text_color` text NOT NULL,
  `article_background_color` text NOT NULL,
  `article_header_text_color` text NOT NULL,
  `article_normal_text_color` text NOT NULL,
  `article_link_text_color` text NOT NULL,
  `footer_background_color` text NOT NULL,
  `footer_header_text_color` text NOT NULL,
  `footer_normal_text_color` text NOT NULL,
  `footer_link_text_color` text NOT NULL,
  PRIMARY KEY (`appearance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `45cms_appearance`
--

INSERT INTO `45cms_appearance` (`appearance_id`, `appearance_name`, `body_font_family`, `body_background_color`, `body_maximum_width`, `body_font_size`, `header_background_color`, `header_header_text_color`, `header_normal_text_color`, `header_link_text_color`, `article_background_color`, `article_header_text_color`, `article_normal_text_color`, `article_link_text_color`, `footer_background_color`, `footer_header_text_color`, `footer_normal_text_color`, `footer_link_text_color`) VALUES
(1, 'default', 'Tahoma, Geneva, sans-serif', '#cccccc', '950px', '16', '#666666', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#333333', '#666666', '#336633', '#666666', '#ffffff', '#ffffff', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `45cms_posts`
--

CREATE TABLE IF NOT EXISTS `45cms_posts` (
  `url` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` text NOT NULL,
  `author` text NOT NULL,
  `image_url` text,
  `content` text NOT NULL,
  `views` int(11) DEFAULT NULL,
  `labels` text,
  `title` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `45cms_posts`
--

INSERT INTO `45cms_posts` (`url`, `id`, `date`, `type`, `author`, `image_url`, `content`, `views`, `labels`, `title`) VALUES
('download_0', 2, '2015-03-14 08:00:31', 'Normal', '', '0', '<h2>FREE For Download</h2><p>45CMS CodeIgniter Extension is an opensource project. This application is free for download and is free to user.</p><p>To start your download click on the download link below.</p><p><a href="45cms-codeigniter-extension.16mb.com\\download\\45cms-codeigniter-extension.com.uploadable.zip" data-mce-href="45cms-codeigniter-extension.16mb.com\\download\\45cms-codeigniter-extension.com.uploadable.zip">45cms-codeigniter-extension.16mb.com\\download\\45cms-codeigniter-extension.com.uploadable.zip</a></p><h2>How To Use</h2><p>After downloading click on the ''Intructions'' link in the menu for instructions on how to install, use and customize this CodeIgniter extension.</p><h2>Whats Inside The Download File</h2><p>The contents of the file is a tool(45 CMS) that is composed of components such as Twitter Bootstrap, CodegIgniter, TinyMCE.</p>', NULL, 'blog', 'Download'),
('about_1', 3, '2015-03-14 08:23:38', 'Normal', '', '0', '<h2>45CMS CodeIgniter Extension</h2><p>This project is a noob personal extension of the CodeIgniter project. Our team developed this as a tool to speed up our development of noob and basic projects.</p><p>If you are familiar with the CRUD functionalities that every cms have, well ''surprise!'' this tool have that feature already coded for you. It will get you pass that phase where you have to start coding that CRUD functionalities from top to bottom.</p><p>Well, we just thought this would be somehow useful.</p><p>If you guys wanna try something weird, download now.</p><h2>Why CodeIgniter Extension</h2><p>Because this project is built using the CodeIgniter MVC framework and is powered by it. Shout out to CodeIgniter, we love that tool.</p><h2>Who Made This Tool</h2><p>My name is Isagani P. Lisondra. Just another jobless Filipino, with nothing to do in his life. Just kidding, I am working as an MIS in a small company based in Ormoc City, Leyte, Philippins.</p><p>Anyways if you wanna check me out here is the url to my portfolio.(<em>Kindly type it in your address bar.</em>)</p><p><a href="http://isaganilisondra.wc.lt/" data-mce-href="http://isaganilisondra.wc.lt/">http://isaganilisondra.wc.lt/</a></p><p>I started working on this on March 8, 2015 and I came up with a working version, which I used to make this website, on March 14, 2015.</p><p>Contact Details: isagani.lisondra@gmail.com</p>', NULL, 'blog', 'About'),
('built_in_codeigniter_2', 4, '2015-03-14 08:45:38', 'Featured', '', 'built_in_codeigniter_2.png', '<p>This project was built using CodeIgniter, a lightweight PHP framework.</p><h2>Why CodeIgniter?</h2><p>CodeIgniter is known as a fast and easy to learn PHP framework. I have been using it since the day I learned it. The main reason why I used CodeIgniter to build it is because, its the onlt PHP Framework I know!</p><p>I would consider myself an average CodeIgniter user.</p><p>But I am open to learning new frameworks.</p><h2>Other Technologies Used</h2><p>I also integrated the Bootstrap technology for this project. When I decided that I would make this tool, I also decided to learn more about Bootstrap. I have already know a little about Bootstrap before but through this project I learned alot.</p><p>Ajax was alos a very important tool for this project, you can see alot of Ajax functionalities inside this tool. From the installation to the admin dashboard upto the publishing of articles.</p><p>jQuery also was a huge part. I''ve been in stackoverflow because of jQuery and every issue I have encountered were solved.</p><p>For the database I used mySQL.</p>', NULL, 'blog', 'Built In CodeIgniter'),
('build_web_applications_faster_3', 5, '2015-03-14 08:54:36', 'Featured', '', 'build_web_applications_faster_3.jpg', '<p>Well for me that was the case. I mean I haven''t really used this tool on real projects since I don''t have one. But my goal for making this tool was pretty much to make my development of sample projects faster.</p><h2>How Does This Make Me Faster?</h2><p>Basically this is a CMS or a wanna be CMS tool. My vision when I was making this tool was to eliminate the process of coding the basic CRUD features when I am trying to make a web app or website. Also the creation of database tables, basic tables needed by a basic small CMS application, will also be done after installing this tool.</p><h2>CRUD and Auth Done</h2><p>Also, after installation, your project will already have authentication feature. During installation you will be asked to register an administrator account which you will use to manage your project.</p>', NULL, 'blog', 'Build Web Applications Faster'),
('instructions_5', 7, '2015-03-14 09:16:48', 'Normal', '', '0', '<p>In this page, I will try my best to teach you how you can start using this tool.</p><h3>Installation</h3><p>I would suggest that you learn CodeIgniter first before using this tool. Because I don''t think someone who don''t know CodeIgniter MVC framework would actually know how to use this tool.</p><p>If you haven''t downloaded the file yet, please click on the download link at the menu of this website and follow the instructions on how you can download.</p><p>Once you have unzipped the file, paste its content in your desired directory at your host invironment (ex. wamp/www/projectname). I assume you are using wamp. Since I use wamp too.</p><p>After you have extracted the contents of the file into your directory, open the "install read me" file.</p><p>Then, follow the instructions written in that .txt file. Follow and read the instructions carefully and youll be good to go.</p><h3>Publishing Your First Post</h3><p>You can publish a post by going to the /create route. Ex. yourproject.com/create. You can then manage your posts in the admin dashboard.</p><h3>The Carousel/ Slider</h3><p>You need to publish an article with the "Featured" type set in order for your carousel to appear in the home page. I suggest attaching images with atleast width of 500px and height of 400px to have a perfect slider. Also by default the slider is limited to 3 posts only.</p><h3>Problems And Issues</h3><p>There is also a problem with this, the administrator mode buttons in the dashboard and in the create new post that has Ajax functionalities does not work on Explorer. But the finished website can be viewed in exploere</p><p>I suggest you use Chrome of Firefox, the latest versions.</p>', NULL, 'blog', 'Instructions'),
('learn_codeigniter_php_framework_first_6', 8, '2015-03-15 00:45:13', 'Normal', '', '0', '<p>Since this tool is built using CodeIgniter and when you try to build new websites or web apps using this, you will have to learn the CodeIgniter PHP Framework first.</p><p>CodeIgniter is not that hard to learn. The documentation is very informative and complete. You find tutorials everywhere on the web.</p><p>The CodeIgniter has been around for many years so finding people who know the framework is very easy. Everytime you get stuck with a problem search solutions on Google.</p>', NULL, 'blog', 'Learn CodeIgniter PHP Framework First'),
('tinymce_wysiwyg_editor_updated_7', 9, '2015-03-15 00:56:31', 'Normal', '', '0', '<p>I have updated the WYSIWYG of this tool.</p><p>Now, with the updated version of the rich text editor I am able to add links to my posts.</p><p>If you wanna checkout TinyMCE here is their website: <a href="http://www.tinymce.com/" data-mce-href="http://www.tinymce.com/">http://www.tinymce.com/</a></p>', NULL, 'blog', 'TinyMCE WYSIWYG Editor Updated'),
('developed_in_wamp_environment_8', 10, '2015-03-15 01:06:12', 'Normal', '', '0', '<p>I am a WAMP user. I don''t know if this would work on other environments such as LAMP and others.</p><p>So for those who would like to try this out, I would suggest you use WAMP.</p><p>There is also a problem with this, the administrator mode buttons in the dashboard and in the create new post that has Ajax functionalities does not work on Explorer. But the finished website can be viewed in exploere</p><p>I suggest you use Chrome of Firefox, the latest versions.</p>', NULL, 'blog', 'Developed In WAMP Environment'),
('not_yet_finished_9', 11, '2015-10-22 09:20:16', 'Featured', '', 'not_yet_finished_9.png', '<p>This tool is not finished yet. Like many other unfunded projects this is not finished yet. I hope I will be able to keep the drive I have in developing this tool.</p><p>I already find this useful. With the features that this project now offer I feel like I can make my sample website faster and more beautiful.</p><p>Since this tool utilize Bootstrap, I am pretty proud of the design. It is responsive and so is the website I will be able to produce with using this tool.</p><h2>What I Learned Building This Tool</h2><p>I learned alot. I learned alot about AJAX, formData, jQuery, rich text editors. I used timyMCE for this website''s post editor.</p>', NULL, 'page, blog', 'Not Yet Finished');

-- --------------------------------------------------------

--
-- Table structure for table `45cms_users`
--

CREATE TABLE IF NOT EXISTS `45cms_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`,`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `45cms_users`
--

INSERT INTO `45cms_users` (`id`, `username`, `password`, `date`, `name`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-03-14 07:55:51', '45-admin', 'admin@gmail.com'),
(3, 'asd', 'asd', '2015-08-20 05:17:57', 'asd', 'asd'),
(4, 'a', 'a', '2015-08-21 00:57:19', 'abNoynoy Aquino', 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
