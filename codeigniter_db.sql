/*
Navicat MySQL Data Transfer

Source Server         : lokal
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : codeigniter

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-01-27 11:27:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adm_akses
-- ----------------------------
DROP TABLE IF EXISTS `adm_akses`;
CREATE TABLE `adm_akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adm_akses
-- ----------------------------
INSERT INTO `adm_akses` VALUES ('1', '1', '1', '1');
INSERT INTO `adm_akses` VALUES ('2', '2', '1', '1');
INSERT INTO `adm_akses` VALUES ('3', '3', '1', '1');
INSERT INTO `adm_akses` VALUES ('4', '4', '1', '1');
INSERT INTO `adm_akses` VALUES ('5', '5', '1', '1');
INSERT INTO `adm_akses` VALUES ('6', '1', '2', '1');
INSERT INTO `adm_akses` VALUES ('7', '2', '2', '0');
INSERT INTO `adm_akses` VALUES ('8', '3', '2', '0');
INSERT INTO `adm_akses` VALUES ('9', '4', '2', '0');
INSERT INTO `adm_akses` VALUES ('10', '5', '2', '0');
INSERT INTO `adm_akses` VALUES ('11', '6', '1', '1');
INSERT INTO `adm_akses` VALUES ('12', '6', '2', '0');
INSERT INTO `adm_akses` VALUES ('13', '1', '3', '1');
INSERT INTO `adm_akses` VALUES ('14', '2', '3', '0');
INSERT INTO `adm_akses` VALUES ('15', '3', '3', '0');
INSERT INTO `adm_akses` VALUES ('16', '4', '3', '0');
INSERT INTO `adm_akses` VALUES ('17', '5', '3', '0');
INSERT INTO `adm_akses` VALUES ('18', '6', '3', '0');

-- ----------------------------
-- Table structure for adm_menu
-- ----------------------------
DROP TABLE IF EXISTS `adm_menu`;
CREATE TABLE `adm_menu` (
  `id_menu` int(255) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `controllers` varchar(255) DEFAULT NULL,
  `function` varchar(255) DEFAULT NULL,
  `sub` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adm_menu
-- ----------------------------
INSERT INTO `adm_menu` VALUES ('1', 'ayam goreng', 'aymgrg', 'admin', 'index', '2');
INSERT INTO `adm_menu` VALUES ('2', 'sate', 'glyphicon glyphicon-home', 'karyawan', '-', '0');
INSERT INTO `adm_menu` VALUES ('3', 'Telo Pendem Saus Pedas', 'glyphicon glyphicon-list', 'menu', 'index', '0');
INSERT INTO `adm_menu` VALUES ('5', 'Manajemen Karyawan', 'glyphicon glyphicon-user', 'karyawan', 'index', '2');
INSERT INTO `adm_menu` VALUES ('9', 'HRD', 'string', 'Mng', 'Head', '0');
INSERT INTO `adm_menu` VALUES ('10', 'jagong', 'bold', 'menu', 'index', '0');

-- ----------------------------
-- Table structure for adm_role
-- ----------------------------
DROP TABLE IF EXISTS `adm_role`;
CREATE TABLE `adm_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adm_role
-- ----------------------------
INSERT INTO `adm_role` VALUES ('1', 'super');
INSERT INTO `adm_role` VALUES ('2', 'Administrasi');
INSERT INTO `adm_role` VALUES ('3', 'Guru');

-- ----------------------------
-- Table structure for tbl_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang`;
CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_barang
-- ----------------------------
INSERT INTO `tbl_barang` VALUES ('1', 'Speaker', '150000', '6');
INSERT INTO `tbl_barang` VALUES ('2', 'Printer', '600000', '2');
INSERT INTO `tbl_barang` VALUES ('3', 'laptop', '3500000', '2');
INSERT INTO `tbl_barang` VALUES ('4', 'sierra', '3000', '3');
