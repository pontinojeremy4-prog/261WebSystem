/*
 Navicat Premium Dump SQL

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : jpcs

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 04/09/2026 18:41:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for school
-- ----------------------------
DROP TABLE IF EXISTS `school`;
CREATE TABLE `school`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of school
-- ----------------------------
INSERT INTO `school` VALUES (1, 'ACI', 'Aldersgate College Inc,', 'Burgos St., Brgy Quirino solano Nueva Vizcaya');
INSERT INTO `school` VALUES (2, 'NVUS', 'Nueva Vizcaya State University,', 'bayombong Nueva Vizcaya');
INSERT INTO `school` VALUES (3, 'SHS', 'Solano High school,', 'Solano, Nueva Vizcaya');
INSERT INTO `school` VALUES (4, 'SLU', 'Saint Luis University,', 'baguio City, Philipines');
INSERT INTO `school` VALUES (5, 'UB', 'Univesity of Baguio,', 'baguio City, Philipines 2600');
INSERT INTO `school` VALUES (6, 'ACI', 'Aldersgate College Inc,', 'Burgos St., Brgy Quirino Solano, Nueva Vizcaya');
INSERT INTO `school` VALUES (7, 'NVSU', 'Nueva Vizcaya State University,', 'Bayombomg NUeva Vizcaya');
INSERT INTO `school` VALUES (8, 'BNHS', 'Bintawan National High School', 'Bintawan Sur Villaverder Nueva Vizcaya');
INSERT INTO `school` VALUES (9, 'FJBCS', 'Felix Juana Brawner Community School', 'Pieza Villaverde Nueva Vizcaya');
INSERT INTO `school` VALUES (10, 'FJBCS', 'Felix Juana Brawner Community School', 'Pieza Villaverde Nueva Vizcaya');

SET FOREIGN_KEY_CHECKS = 1;
