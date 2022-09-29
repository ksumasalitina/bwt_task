-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 29, 2022 at 11:39 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bwt_task`
--
CREATE DATABASE IF NOT EXISTS `bwt_task` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bwt_task`;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
                            `id` int(11) NOT NULL,
                            `title` varchar(100) NOT NULL,
                            `date` datetime NOT NULL,
                            `country` varchar(45) NOT NULL,
                            `latitude` text,
                            `longitude` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
