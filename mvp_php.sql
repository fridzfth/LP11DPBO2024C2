/*
 Navicat Premium Data Transfer

 Source Server         : koneksi01
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : mvp_php

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 04/05/2024 17:22:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tempat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tl` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telp` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO `pasien` (`nik`, `nama`, `tempat`, `tl`, `gender`, `email`, `telp`) VALUES
(FLOOR(RAND() * 999999) + 100000, 'Choi Eun-seo', 'Busan', '1990-02-16', 'Perempuan', 'choieunseo@naver.com', CONCAT('+82', FLOOR(RAND() * 900) + 100, FLOOR(RAND() * 10000) + 1000)),
(FLOOR(RAND() * 999999) + 100000, 'Park Ji-hoon', 'Gwangju', '1981-11-22', 'Laki-laki', 'parkjihoon@naver.com', CONCAT('+82', FLOOR(RAND() * 900) + 100, FLOOR(RAND() * 10000) + 1000)),
(FLOOR(RAND() * 999999) + 100000, 'Kim Mi-sook', 'Incheon', '1987-06-22', 'Perempuan', 'kimmisook@naver.com', CONCAT('+82', FLOOR(RAND() * 900) + 100, FLOOR(RAND() * 10000) + 1000)),
(FLOOR(RAND() * 999999) + 100000, 'Lee Sang-min', 'Seoul', '1981-10-30', 'Laki-laki', 'leesangmin@naver.com', CONCAT('+82', FLOOR(RAND() * 900) + 100, FLOOR(RAND() * 10000) + 1000)),
(FLOOR(RAND() * 999999) + 100000, 'Yoon Hye-rin', 'Jeju', '1988-12-16', 'Perempuan', 'yoonhyerin@naver.com', CONCAT('+82', FLOOR(RAND() * 900) + 100, FLOOR(RAND() * 10000) + 1000)),
(FLOOR(RAND() * 999999) + 100000, 'Jung Woo-jin', 'Daejeon', '1994-10-10', 'Laki-laki', 'jungwoojin@naver.com', CONCAT('+82', FLOOR(RAND() * 900) + 100, FLOOR(RAND() * 10000) + 1000)),
(FLOOR(RAND() * 999999) + 100000, 'Han Soo-yeon', 'Ulsan', '1982-09-25', 'Perempuan', 'hansooyeon@naver.com', CONCAT('+82', FLOOR(RAND() * 900) + 100, FLOOR(RAND() * 10000) + 1000)),
(FLOOR(RAND() * 999999) + 100000, 'Ahn Seung-ho', 'Suwon', '1980-03-29', 'Laki-laki', 'ahnseungho@naver.com', CONCAT('+82', FLOOR(RAND() * 900) + 100, FLOOR(RAND() * 10000) + 1000)),
(FLOOR(RAND() * 999999) + 100000, 'Moon Ji-eun', 'Sejong', '1989-09-14', 'Perempuan', 'moonjieun@naver.com', CONCAT('+82', FLOOR(RAND() * 900) + 100, FLOOR(RAND() * 10000) + 1000));
