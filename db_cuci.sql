/*
Navicat MySQL Data Transfer

Source Server         : Lokal
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : db_cuci

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-07-10 08:02:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adm_role
-- ----------------------------
DROP TABLE IF EXISTS `adm_role`;
CREATE TABLE `adm_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adm_role
-- ----------------------------
INSERT INTO `adm_role` VALUES ('1', 'admin');
INSERT INTO `adm_role` VALUES ('2', 'user');

-- ----------------------------
-- Table structure for adm_user
-- ----------------------------
DROP TABLE IF EXISTS `adm_user`;
CREATE TABLE `adm_user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adm_user
-- ----------------------------
INSERT INTO `adm_user` VALUES ('Chandra', 'ad845a24a47deecbfa8396e90db75c6a', 'Mochammad Chandra Kurniawan', '2', '1');
INSERT INTO `adm_user` VALUES ('chandra28', '21232f297a57a5a743894a0e4a801fc3', 'Mochammad Chandra Kurniawan', '1', '1');

-- ----------------------------
-- Table structure for mesin
-- ----------------------------
DROP TABLE IF EXISTS `mesin`;
CREATE TABLE `mesin` (
  `id_mesin` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesin_kategori` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `jenis_tabung` tinyint(4) DEFAULT NULL COMMENT '1: satu tabung 2: 2 tabung',
  `fitur_lainya` text,
  `nama_mesin` varchar(100) DEFAULT NULL,
  `bukaan_pintu` tinyint(4) DEFAULT NULL COMMENT '1: Atas 2:Bawah ',
  `garansi` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_mesin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mesin
-- ----------------------------
INSERT INTO `mesin` VALUES ('1', '3', 'lzUO5KE.png', null, '2', '......', 'A1', '1', '1');
INSERT INTO `mesin` VALUES ('2', '3', '7a9HClw.png', null, '2', '...', 'A2', '1', '2');
INSERT INTO `mesin` VALUES ('3', '2', 'bzNCVHj.png', null, '1', '......', 'A3', '2', '2');
INSERT INTO `mesin` VALUES ('4', '2', 'BaUKwQH.png', null, '1', '.....', 'A4', '2', '2');
INSERT INTO `mesin` VALUES ('5', '4', 'AAFrQRZ.gif', null, '1', '....', 'A5', '2', '3');
INSERT INTO `mesin` VALUES ('6', '5', 'Pau4UHa.png', null, '1', '......', 'A6', '2', '3');
INSERT INTO `mesin` VALUES ('7', '4', 'X7w4dIR.gif', null, '1', '.....', 'A7', '2', '3');
INSERT INTO `mesin` VALUES ('8', '2', 'DY77Mpc.png', null, '1', '.....', 'A8', '2', '3');
INSERT INTO `mesin` VALUES ('9', '5', 'c0JfeS9.png', null, '1', '......', 'A9', '2', '3');
INSERT INTO `mesin` VALUES ('10', '6', 'Z29KkT4.jpg', null, '1', '.....', 'A10', '2', '3');

-- ----------------------------
-- Table structure for mesin_bobot
-- ----------------------------
DROP TABLE IF EXISTS `mesin_bobot`;
CREATE TABLE `mesin_bobot` (
  `id_mesin_bobot` int(11) NOT NULL AUTO_INCREMENT,
  `id_parameter` int(11) DEFAULT NULL,
  `nilai` tinyint(4) DEFAULT NULL COMMENT '1:rendah 2:sedang 3:tinggi',
  `nilai_1` double DEFAULT NULL,
  `nilai_2` double DEFAULT NULL,
  `nilai_3` double DEFAULT NULL,
  PRIMARY KEY (`id_mesin_bobot`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mesin_bobot
-- ----------------------------
INSERT INTO `mesin_bobot` VALUES ('1', '1', '1', '2000000', '3500000', null);
INSERT INTO `mesin_bobot` VALUES ('2', '1', '2', '3000000', '4500000', '6000000');
INSERT INTO `mesin_bobot` VALUES ('3', '1', '3', '5500000', '8000000', null);
INSERT INTO `mesin_bobot` VALUES ('4', '2', '1', '4', '6', null);
INSERT INTO `mesin_bobot` VALUES ('5', '2', '2', '5', '7', '9');
INSERT INTO `mesin_bobot` VALUES ('6', '2', '3', '8', '12', null);
INSERT INTO `mesin_bobot` VALUES ('7', '3', '1', '400', '600', null);
INSERT INTO `mesin_bobot` VALUES ('8', '3', '2', '550', '700', '850');
INSERT INTO `mesin_bobot` VALUES ('9', '3', '3', '800', '1200', null);
INSERT INTO `mesin_bobot` VALUES ('10', '4', '1', '200', '400', null);
INSERT INTO `mesin_bobot` VALUES ('11', '4', '2', '300', '400', '500');
INSERT INTO `mesin_bobot` VALUES ('12', '4', '3', '450', '600', null);
INSERT INTO `mesin_bobot` VALUES ('13', '5', '1', '20', '30', null);
INSERT INTO `mesin_bobot` VALUES ('14', '5', '2', '25', '35', '50');
INSERT INTO `mesin_bobot` VALUES ('15', '5', '3', '45', '60', null);
INSERT INTO `mesin_bobot` VALUES ('16', '6', '1', '50', '65', null);
INSERT INTO `mesin_bobot` VALUES ('17', '6', '2', '60', '65', '75');
INSERT INTO `mesin_bobot` VALUES ('18', '6', '3', '70', '80', null);
INSERT INTO `mesin_bobot` VALUES ('19', '7', '1', '50', '60', null);
INSERT INTO `mesin_bobot` VALUES ('20', '7', '2', '55', '60', '65');
INSERT INTO `mesin_bobot` VALUES ('21', '7', '3', '60', '70', null);
INSERT INTO `mesin_bobot` VALUES ('22', '8', '1', '80', '95', null);
INSERT INTO `mesin_bobot` VALUES ('23', '8', '2', '90', '100', '110');
INSERT INTO `mesin_bobot` VALUES ('24', '8', '3', '105', '115', null);

-- ----------------------------
-- Table structure for mesin_bobot_nilai
-- ----------------------------
DROP TABLE IF EXISTS `mesin_bobot_nilai`;
CREATE TABLE `mesin_bobot_nilai` (
  `id_bobot_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesin` int(11) DEFAULT NULL,
  `id_parameter` int(11) DEFAULT NULL,
  `nilai_1` double DEFAULT '0' COMMENT '0',
  `nilai_2` double DEFAULT '0',
  `nilai_3` double DEFAULT '0',
  PRIMARY KEY (`id_bobot_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mesin_bobot_nilai
-- ----------------------------
INSERT INTO `mesin_bobot_nilai` VALUES ('1', '1', '1', '0.56666666666667', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('2', '2', '1', '0.33333333333333', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('3', '3', '1', '0.16666666666667', '0.16666666666667', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('4', '4', '1', '0.11333333333333', '0.22', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('5', '5', '1', '0', '0.26666666666667', '0.04');
INSERT INTO `mesin_bobot_nilai` VALUES ('6', '6', '1', '0', '0', '0.3');
INSERT INTO `mesin_bobot_nilai` VALUES ('7', '7', '1', '0', '0', '0.6');
INSERT INTO `mesin_bobot_nilai` VALUES ('8', '8', '1', '0', '0', '0.92');
INSERT INTO `mesin_bobot_nilai` VALUES ('9', '9', '1', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('10', '10', '1', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('11', '1', '2', '0', '0.5', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('12', '2', '2', '0', '0.5', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('13', '3', '2', '0', '0.5', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('14', '4', '2', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('15', '5', '2', '0', '0.5', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('16', '6', '2', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('17', '7', '2', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('18', '8', '2', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('19', '9', '2', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('20', '10', '2', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('21', '1', '3', '0', '0.33333333333333', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('22', '2', '3', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('23', '3', '3', '0', '0.66666666666667', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('24', '4', '3', '0', '0.33333333333333', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('25', '5', '3', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('26', '6', '3', '0', '0', '0.75');
INSERT INTO `mesin_bobot_nilai` VALUES ('27', '7', '3', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('28', '8', '3', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('29', '9', '3', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('30', '10', '3', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('31', '1', '4', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('32', '2', '4', '0', '0', '0.33333333333333');
INSERT INTO `mesin_bobot_nilai` VALUES ('33', '3', '4', '0', '0', '0.66666666666667');
INSERT INTO `mesin_bobot_nilai` VALUES ('34', '4', '4', '0', '0', '0.66666666666667');
INSERT INTO `mesin_bobot_nilai` VALUES ('35', '5', '4', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('36', '6', '4', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('37', '7', '4', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('38', '8', '4', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('39', '9', '4', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('40', '10', '4', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('41', '1', '5', '0', '0.66666666666667', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('42', '2', '5', '0', '0.46666666666667', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('43', '3', '5', '0', '0.4', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('44', '4', '5', '0', '0', '0.33333333333333');
INSERT INTO `mesin_bobot_nilai` VALUES ('45', '5', '5', '0', '0.26666666666667', '0.066666666666667');
INSERT INTO `mesin_bobot_nilai` VALUES ('46', '6', '5', '0', '0.2', '0.13333333333333');
INSERT INTO `mesin_bobot_nilai` VALUES ('47', '7', '5', '0', '0.13333333333333', '0.2');
INSERT INTO `mesin_bobot_nilai` VALUES ('48', '8', '5', '0', '0', '0.66666666666667');
INSERT INTO `mesin_bobot_nilai` VALUES ('49', '9', '5', '0', '0', '0.6');
INSERT INTO `mesin_bobot_nilai` VALUES ('50', '10', '5', '0', '0', '0.53333333333333');
INSERT INTO `mesin_bobot_nilai` VALUES ('51', '1', '6', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('52', '2', '6', '0', '0', '1');
INSERT INTO `mesin_bobot_nilai` VALUES ('53', '3', '6', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('54', '4', '6', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('55', '5', '6', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('56', '6', '6', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('57', '7', '6', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('58', '8', '6', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('59', '9', '6', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('60', '10', '6', '0', '0', '0.5');
INSERT INTO `mesin_bobot_nilai` VALUES ('61', '1', '7', '1', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('62', '2', '7', '1', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('63', '3', '7', '1', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('64', '4', '7', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('65', '5', '7', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('66', '6', '7', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('67', '7', '7', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('68', '8', '7', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('69', '9', '7', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('70', '10', '7', '0', '1', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('71', '1', '8', '1', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('72', '2', '8', '1', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('73', '3', '8', '1', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('74', '4', '8', '1', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('75', '5', '8', '1', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('76', '6', '8', '1', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('77', '7', '8', '0.66666666666667', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('78', '8', '8', '0.33333333333333', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('79', '9', '8', '0.33333333333333', '0', '0');
INSERT INTO `mesin_bobot_nilai` VALUES ('80', '10', '8', '0', '0.5', '0');

-- ----------------------------
-- Table structure for mesin_dtl
-- ----------------------------
DROP TABLE IF EXISTS `mesin_dtl`;
CREATE TABLE `mesin_dtl` (
  `id_mesin_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_parameter` int(11) DEFAULT NULL,
  `value` double DEFAULT '0',
  `id_mesin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mesin_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mesin_dtl
-- ----------------------------
INSERT INTO `mesin_dtl` VALUES ('1', '1', '2650000', '1');
INSERT INTO `mesin_dtl` VALUES ('2', '2', '6', '1');
INSERT INTO `mesin_dtl` VALUES ('3', '3', '600', '1');
INSERT INTO `mesin_dtl` VALUES ('4', '4', '400', '1');
INSERT INTO `mesin_dtl` VALUES ('5', '5', '40', '1');
INSERT INTO `mesin_dtl` VALUES ('6', '6', '100', '1');
INSERT INTO `mesin_dtl` VALUES ('7', '7', '50', '1');
INSERT INTO `mesin_dtl` VALUES ('8', '8', '80', '1');
INSERT INTO `mesin_dtl` VALUES ('9', '1', '3000000', '2');
INSERT INTO `mesin_dtl` VALUES ('10', '2', '6', '2');
INSERT INTO `mesin_dtl` VALUES ('11', '3', '700', '2');
INSERT INTO `mesin_dtl` VALUES ('12', '4', '500', '2');
INSERT INTO `mesin_dtl` VALUES ('13', '5', '43', '2');
INSERT INTO `mesin_dtl` VALUES ('14', '6', '100', '2');
INSERT INTO `mesin_dtl` VALUES ('15', '7', '50', '2');
INSERT INTO `mesin_dtl` VALUES ('16', '8', '80', '2');
INSERT INTO `mesin_dtl` VALUES ('17', '1', '3250000', '3');
INSERT INTO `mesin_dtl` VALUES ('18', '2', '6', '3');
INSERT INTO `mesin_dtl` VALUES ('19', '3', '750', '3');
INSERT INTO `mesin_dtl` VALUES ('20', '4', '550', '3');
INSERT INTO `mesin_dtl` VALUES ('21', '5', '44', '3');
INSERT INTO `mesin_dtl` VALUES ('22', '6', '75', '3');
INSERT INTO `mesin_dtl` VALUES ('23', '7', '50', '3');
INSERT INTO `mesin_dtl` VALUES ('24', '8', '80', '3');
INSERT INTO `mesin_dtl` VALUES ('25', '1', '3330000', '4');
INSERT INTO `mesin_dtl` VALUES ('26', '2', '7', '4');
INSERT INTO `mesin_dtl` VALUES ('27', '3', '800', '4');
INSERT INTO `mesin_dtl` VALUES ('28', '4', '550', '4');
INSERT INTO `mesin_dtl` VALUES ('29', '5', '50', '4');
INSERT INTO `mesin_dtl` VALUES ('30', '6', '75', '4');
INSERT INTO `mesin_dtl` VALUES ('31', '7', '60', '4');
INSERT INTO `mesin_dtl` VALUES ('32', '8', '80', '4');
INSERT INTO `mesin_dtl` VALUES ('33', '1', '5600000', '5');
INSERT INTO `mesin_dtl` VALUES ('34', '2', '8', '5');
INSERT INTO `mesin_dtl` VALUES ('35', '3', '1000', '5');
INSERT INTO `mesin_dtl` VALUES ('36', '4', '600', '5');
INSERT INTO `mesin_dtl` VALUES ('37', '5', '46', '5');
INSERT INTO `mesin_dtl` VALUES ('38', '6', '75', '5');
INSERT INTO `mesin_dtl` VALUES ('39', '7', '60', '5');
INSERT INTO `mesin_dtl` VALUES ('40', '8', '80', '5');
INSERT INTO `mesin_dtl` VALUES ('41', '1', '6250000', '6');
INSERT INTO `mesin_dtl` VALUES ('42', '2', '10', '6');
INSERT INTO `mesin_dtl` VALUES ('43', '3', '1100', '6');
INSERT INTO `mesin_dtl` VALUES ('44', '4', '650', '6');
INSERT INTO `mesin_dtl` VALUES ('45', '5', '47', '6');
INSERT INTO `mesin_dtl` VALUES ('46', '6', '75', '6');
INSERT INTO `mesin_dtl` VALUES ('47', '7', '60', '6');
INSERT INTO `mesin_dtl` VALUES ('48', '8', '80', '6');
INSERT INTO `mesin_dtl` VALUES ('49', '1', '7000000', '7');
INSERT INTO `mesin_dtl` VALUES ('50', '2', '12', '7');
INSERT INTO `mesin_dtl` VALUES ('51', '3', '1200', '7');
INSERT INTO `mesin_dtl` VALUES ('52', '4', '675', '7');
INSERT INTO `mesin_dtl` VALUES ('53', '5', '48', '7');
INSERT INTO `mesin_dtl` VALUES ('54', '6', '75', '7');
INSERT INTO `mesin_dtl` VALUES ('55', '7', '60', '7');
INSERT INTO `mesin_dtl` VALUES ('56', '8', '85', '7');
INSERT INTO `mesin_dtl` VALUES ('57', '1', '7800000', '8');
INSERT INTO `mesin_dtl` VALUES ('58', '2', '10', '8');
INSERT INTO `mesin_dtl` VALUES ('59', '3', '1250', '8');
INSERT INTO `mesin_dtl` VALUES ('60', '4', '600', '8');
INSERT INTO `mesin_dtl` VALUES ('61', '5', '55', '8');
INSERT INTO `mesin_dtl` VALUES ('62', '6', '75', '8');
INSERT INTO `mesin_dtl` VALUES ('63', '7', '60', '8');
INSERT INTO `mesin_dtl` VALUES ('64', '8', '90', '8');
INSERT INTO `mesin_dtl` VALUES ('65', '1', '9000000', '9');
INSERT INTO `mesin_dtl` VALUES ('66', '2', '12', '9');
INSERT INTO `mesin_dtl` VALUES ('67', '3', '1400', '9');
INSERT INTO `mesin_dtl` VALUES ('68', '4', '700', '9');
INSERT INTO `mesin_dtl` VALUES ('69', '5', '54', '9');
INSERT INTO `mesin_dtl` VALUES ('70', '6', '75', '9');
INSERT INTO `mesin_dtl` VALUES ('71', '7', '60', '9');
INSERT INTO `mesin_dtl` VALUES ('72', '8', '90', '9');
INSERT INTO `mesin_dtl` VALUES ('73', '1', '10250000', '10');
INSERT INTO `mesin_dtl` VALUES ('74', '2', '13', '10');
INSERT INTO `mesin_dtl` VALUES ('75', '3', '1200', '10');
INSERT INTO `mesin_dtl` VALUES ('76', '4', '800', '10');
INSERT INTO `mesin_dtl` VALUES ('77', '5', '53', '10');
INSERT INTO `mesin_dtl` VALUES ('78', '6', '75', '10');
INSERT INTO `mesin_dtl` VALUES ('79', '7', '60', '10');
INSERT INTO `mesin_dtl` VALUES ('80', '8', '95', '10');

-- ----------------------------
-- Table structure for mesin_kategori
-- ----------------------------
DROP TABLE IF EXISTS `mesin_kategori`;
CREATE TABLE `mesin_kategori` (
  `id_mesin_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mesin_kategori` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_mesin_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mesin_kategori
-- ----------------------------
INSERT INTO `mesin_kategori` VALUES ('2', 'Samsung');
INSERT INTO `mesin_kategori` VALUES ('3', 'Sharp');
INSERT INTO `mesin_kategori` VALUES ('4', 'Sanyo');
INSERT INTO `mesin_kategori` VALUES ('5', 'LG');
INSERT INTO `mesin_kategori` VALUES ('6', 'Electrolux');

-- ----------------------------
-- Table structure for prom_garansi
-- ----------------------------
DROP TABLE IF EXISTS `prom_garansi`;
CREATE TABLE `prom_garansi` (
  `id_prom_garansi` int(11) NOT NULL AUTO_INCREMENT,
  `garansi` int(11) DEFAULT NULL,
  `id_tran_fuzzy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prom_garansi`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prom_garansi
-- ----------------------------
INSERT INTO `prom_garansi` VALUES ('11', '2', '11');
INSERT INTO `prom_garansi` VALUES ('12', '3', '11');

-- ----------------------------
-- Table structure for prom_parameter
-- ----------------------------
DROP TABLE IF EXISTS `prom_parameter`;
CREATE TABLE `prom_parameter` (
  `id_prom_parameter` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria` int(11) DEFAULT NULL,
  `parameter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prom_parameter`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prom_parameter
-- ----------------------------
INSERT INTO `prom_parameter` VALUES ('1', '1', '2');
INSERT INTO `prom_parameter` VALUES ('2', '2', '2');
INSERT INTO `prom_parameter` VALUES ('3', '3', '3');
INSERT INTO `prom_parameter` VALUES ('4', '4', '3');
INSERT INTO `prom_parameter` VALUES ('5', '5', '2');

-- ----------------------------
-- Table structure for prom_persentase
-- ----------------------------
DROP TABLE IF EXISTS `prom_persentase`;
CREATE TABLE `prom_persentase` (
  `id_persentase` int(11) NOT NULL AUTO_INCREMENT,
  `urut` int(11) DEFAULT NULL,
  `persentase` double DEFAULT NULL,
  PRIMARY KEY (`id_persentase`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prom_persentase
-- ----------------------------
INSERT INTO `prom_persentase` VALUES ('1', '1', '45.7');
INSERT INTO `prom_persentase` VALUES ('2', '2', '25.7');
INSERT INTO `prom_persentase` VALUES ('3', '3', '15.7');
INSERT INTO `prom_persentase` VALUES ('4', '4', '9');
INSERT INTO `prom_persentase` VALUES ('5', '5', '4');

-- ----------------------------
-- Table structure for prom_pilih_mesin
-- ----------------------------
DROP TABLE IF EXISTS `prom_pilih_mesin`;
CREATE TABLE `prom_pilih_mesin` (
  `id_pilih_mesin` int(11) NOT NULL AUTO_INCREMENT,
  `id_tran_fuzzy` int(11) DEFAULT NULL,
  `id_mesin_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pilih_mesin`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prom_pilih_mesin
-- ----------------------------
INSERT INTO `prom_pilih_mesin` VALUES ('19', '11', '3');
INSERT INTO `prom_pilih_mesin` VALUES ('20', '11', '4');

-- ----------------------------
-- Table structure for prom_preferensi
-- ----------------------------
DROP TABLE IF EXISTS `prom_preferensi`;
CREATE TABLE `prom_preferensi` (
  `id_prom_preferensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesin1` int(11) DEFAULT NULL,
  `id_mesin2` int(11) DEFAULT NULL,
  `preferensi` double DEFAULT NULL,
  `id_tran_fuzzy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prom_preferensi`)
) ENGINE=InnoDB AUTO_INCREMENT=626 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prom_preferensi
-- ----------------------------
INSERT INTO `prom_preferensi` VALUES ('501', '1', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('502', '1', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('503', '1', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('504', '1', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('505', '1', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('506', '2', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('507', '2', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('508', '2', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('509', '2', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('510', '2', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('511', '6', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('512', '6', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('513', '6', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('514', '6', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('515', '6', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('516', '3', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('517', '3', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('518', '3', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('519', '3', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('520', '3', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('521', '7', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('522', '7', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('523', '7', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('524', '7', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('525', '7', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('526', '1', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('527', '1', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('528', '1', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('529', '1', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('530', '1', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('531', '2', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('532', '2', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('533', '2', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('534', '2', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('535', '2', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('536', '6', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('537', '6', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('538', '6', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('539', '6', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('540', '6', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('541', '3', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('542', '3', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('543', '3', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('544', '3', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('545', '3', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('546', '7', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('547', '7', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('548', '7', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('549', '7', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('550', '7', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('551', '1', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('552', '1', '2', '-0.17133333333333', '11');
INSERT INTO `prom_preferensi` VALUES ('553', '1', '6', '-0.17133333333333', '11');
INSERT INTO `prom_preferensi` VALUES ('554', '1', '3', '-0.17133333333333', '11');
INSERT INTO `prom_preferensi` VALUES ('555', '1', '7', '-0.17133333333333', '11');
INSERT INTO `prom_preferensi` VALUES ('556', '2', '1', '0.17133333333333', '11');
INSERT INTO `prom_preferensi` VALUES ('557', '2', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('558', '2', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('559', '2', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('560', '2', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('561', '6', '1', '0.17133333333333', '11');
INSERT INTO `prom_preferensi` VALUES ('562', '6', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('563', '6', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('564', '6', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('565', '6', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('566', '3', '1', '0.17133333333333', '11');
INSERT INTO `prom_preferensi` VALUES ('567', '3', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('568', '3', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('569', '3', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('570', '3', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('571', '7', '1', '0.17133333333333', '11');
INSERT INTO `prom_preferensi` VALUES ('572', '7', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('573', '7', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('574', '7', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('575', '7', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('576', '1', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('577', '1', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('578', '1', '6', '0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('579', '1', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('580', '1', '7', '0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('581', '2', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('582', '2', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('583', '2', '6', '0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('584', '2', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('585', '2', '7', '0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('586', '6', '1', '-0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('587', '6', '2', '-0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('588', '6', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('589', '6', '3', '-0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('590', '6', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('591', '3', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('592', '3', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('593', '3', '6', '0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('594', '3', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('595', '3', '7', '0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('596', '7', '1', '-0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('597', '7', '2', '-0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('598', '7', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('599', '7', '3', '-0.10466666666667', '11');
INSERT INTO `prom_preferensi` VALUES ('600', '7', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('601', '1', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('602', '1', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('603', '1', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('604', '1', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('605', '1', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('606', '2', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('607', '2', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('608', '2', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('609', '2', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('610', '2', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('611', '6', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('612', '6', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('613', '6', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('614', '6', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('615', '6', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('616', '3', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('617', '3', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('618', '3', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('619', '3', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('620', '3', '7', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('621', '7', '1', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('622', '7', '2', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('623', '7', '6', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('624', '7', '3', '0', '11');
INSERT INTO `prom_preferensi` VALUES ('625', '7', '7', '0', '11');

-- ----------------------------
-- Table structure for prom_preferensi_indeks
-- ----------------------------
DROP TABLE IF EXISTS `prom_preferensi_indeks`;
CREATE TABLE `prom_preferensi_indeks` (
  `id_prom_indeks` int(11) NOT NULL AUTO_INCREMENT,
  `leaving_flow` double DEFAULT NULL,
  `entering_flow` double DEFAULT NULL,
  `id_tran_fuzzy` int(11) DEFAULT NULL,
  `id_mesin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prom_indeks`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prom_preferensi_indeks
-- ----------------------------
INSERT INTO `prom_preferensi_indeks` VALUES ('16', '0.47599999999998', '-0.47599999999998', '11', '1');
INSERT INTO `prom_preferensi_indeks` VALUES ('17', '-0.38066666666667004', '0.38066666666667004', '11', '2');
INSERT INTO `prom_preferensi_indeks` VALUES ('18', '0.14266666666668', '-0.14266666666668', '11', '6');
INSERT INTO `prom_preferensi_indeks` VALUES ('19', '-0.38066666666667004', '0.38066666666667004', '11', '3');
INSERT INTO `prom_preferensi_indeks` VALUES ('20', '0.14266666666668', '-0.14266666666668', '11', '7');

-- ----------------------------
-- Table structure for prom_prosentase
-- ----------------------------
DROP TABLE IF EXISTS `prom_prosentase`;
CREATE TABLE `prom_prosentase` (
  `id_prom_prosentase` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria` int(11) DEFAULT NULL,
  `id_mesin` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `hasil` double DEFAULT NULL,
  `id_tran_fuzzy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prom_prosentase`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prom_prosentase
-- ----------------------------
INSERT INTO `prom_prosentase` VALUES ('126', '1', '1', '3', '1.371', '11');
INSERT INTO `prom_prosentase` VALUES ('127', '2', '1', '1', '0.04', '11');
INSERT INTO `prom_prosentase` VALUES ('128', '3', '1', '1', '0.257', '11');
INSERT INTO `prom_prosentase` VALUES ('129', '4', '1', '3', '0.471', '11');
INSERT INTO `prom_prosentase` VALUES ('130', '5', '1', '1', '0.09', '11');
INSERT INTO `prom_prosentase` VALUES ('131', '1', '2', '3', '1.371', '11');
INSERT INTO `prom_prosentase` VALUES ('132', '2', '2', '1', '0.04', '11');
INSERT INTO `prom_prosentase` VALUES ('133', '3', '2', '3', '0.771', '11');
INSERT INTO `prom_prosentase` VALUES ('134', '4', '2', '3', '0.471', '11');
INSERT INTO `prom_prosentase` VALUES ('135', '5', '2', '1', '0.09', '11');
INSERT INTO `prom_prosentase` VALUES ('136', '1', '6', '1', '0.457', '11');
INSERT INTO `prom_prosentase` VALUES ('137', '2', '6', '3', '0.12', '11');
INSERT INTO `prom_prosentase` VALUES ('138', '3', '6', '3', '0.771', '11');
INSERT INTO `prom_prosentase` VALUES ('139', '4', '6', '1', '0.157', '11');
INSERT INTO `prom_prosentase` VALUES ('140', '5', '6', '3', '0.27', '11');
INSERT INTO `prom_prosentase` VALUES ('141', '1', '3', '1', '0.457', '11');
INSERT INTO `prom_prosentase` VALUES ('142', '2', '3', '3', '0.12', '11');
INSERT INTO `prom_prosentase` VALUES ('143', '3', '3', '3', '0.771', '11');
INSERT INTO `prom_prosentase` VALUES ('144', '4', '3', '3', '0.471', '11');
INSERT INTO `prom_prosentase` VALUES ('145', '5', '3', '3', '0.27', '11');
INSERT INTO `prom_prosentase` VALUES ('146', '1', '7', '3', '1.371', '11');
INSERT INTO `prom_prosentase` VALUES ('147', '2', '7', '3', '0.12', '11');
INSERT INTO `prom_prosentase` VALUES ('148', '3', '7', '3', '0.771', '11');
INSERT INTO `prom_prosentase` VALUES ('149', '4', '7', '1', '0.157', '11');
INSERT INTO `prom_prosentase` VALUES ('150', '5', '7', '3', '0.27', '11');

-- ----------------------------
-- Table structure for prom_urut
-- ----------------------------
DROP TABLE IF EXISTS `prom_urut`;
CREATE TABLE `prom_urut` (
  `id_urut` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` tinyint(4) DEFAULT NULL,
  `urut` tinyint(4) DEFAULT NULL,
  `id_tran_fuzzy` int(11) DEFAULT NULL,
  `persentase` double DEFAULT NULL,
  PRIMARY KEY (`id_urut`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prom_urut
-- ----------------------------
INSERT INTO `prom_urut` VALUES ('46', '1', '1', '11', '45.7');
INSERT INTO `prom_urut` VALUES ('47', '2', '3', '11', '25.7');
INSERT INTO `prom_urut` VALUES ('48', '3', '4', '11', '15.7');
INSERT INTO `prom_urut` VALUES ('49', '4', '5', '11', '9');
INSERT INTO `prom_urut` VALUES ('50', '5', '2', '11', '4');

-- ----------------------------
-- Table structure for tabel_user
-- ----------------------------
DROP TABLE IF EXISTS `tabel_user`;
CREATE TABLE `tabel_user` (
  `id_user` varchar(200) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` text,
  `usia` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tabel_user
-- ----------------------------
INSERT INTO `tabel_user` VALUES ('5', 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tabel_user` VALUES ('6', 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tabel_user` VALUES ('7', 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tabel_user` VALUES ('8', 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tabel_user` VALUES ('9', 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tabel_user` VALUES ('10', 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tabel_user` VALUES ('11', 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '30');

-- ----------------------------
-- Table structure for tran_fuzzy
-- ----------------------------
DROP TABLE IF EXISTS `tran_fuzzy`;
CREATE TABLE `tran_fuzzy` (
  `id_tran_fuzzy` int(11) NOT NULL AUTO_INCREMENT,
  `on_session` varchar(150) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `hasil_rekomendasi` float DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `alamat` text,
  `usia` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_tran_fuzzy`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tran_fuzzy
-- ----------------------------
INSERT INTO `tran_fuzzy` VALUES ('1', 'zSuPUI6t18KoxJjV', '2015-07-09 07:23:07', null, null, null, null);
INSERT INTO `tran_fuzzy` VALUES ('2', 'Yd6zFVnApH7LLtdF', '2015-07-09 08:31:07', null, null, null, null);
INSERT INTO `tran_fuzzy` VALUES ('3', 'Cdwjv9IKaqct23bL', '2015-07-09 09:13:09', null, null, null, null);
INSERT INTO `tran_fuzzy` VALUES ('4', 'yP8UI6ZgXkuOayIu', '2015-07-09 10:09:47', null, 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tran_fuzzy` VALUES ('5', 'qVlnArGvAgVduGX3', '2015-07-09 10:10:24', null, 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tran_fuzzy` VALUES ('6', '3WJY5jPGuGXlyJXm', '2015-07-09 10:12:52', null, 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tran_fuzzy` VALUES ('7', 'ulwx4I500kfDq1fe', '2015-07-09 10:13:38', null, 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tran_fuzzy` VALUES ('8', 'PGVckaGZGiwsSfH4', '2015-07-09 10:14:29', null, 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tran_fuzzy` VALUES ('9', '4MbEajAGePCoVYby', '2015-07-09 10:18:01', null, 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tran_fuzzy` VALUES ('10', 'ATDkwww7spGNRIKu', '2015-07-09 10:20:08', null, 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '21');
INSERT INTO `tran_fuzzy` VALUES ('11', 'RcQSayHKJmyqBoBy', '2015-07-09 18:16:31', null, 'Mochammad Chandra Kurniawan', 'Jl.Denpasar no 68', '30');

-- ----------------------------
-- Table structure for tran_fuzzy_dtl
-- ----------------------------
DROP TABLE IF EXISTS `tran_fuzzy_dtl`;
CREATE TABLE `tran_fuzzy_dtl` (
  `id_tran_fuzzy_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesin` int(11) DEFAULT NULL,
  `nilai_rekomendasi` float DEFAULT NULL,
  `id_tran_fuzzy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tran_fuzzy_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tran_fuzzy_dtl
-- ----------------------------
INSERT INTO `tran_fuzzy_dtl` VALUES ('1', '1', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('2', '2', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('3', '3', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('4', '4', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('5', '5', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('6', '6', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('7', '7', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('8', '8', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('9', '9', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('10', '10', '0', '1');
INSERT INTO `tran_fuzzy_dtl` VALUES ('11', '1', '1', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('12', '2', '1', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('13', '3', '1', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('14', '4', '0', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('15', '5', '0', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('16', '6', '0', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('17', '7', '0', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('18', '8', '0', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('19', '9', '0', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('20', '10', '0', '2');
INSERT INTO `tran_fuzzy_dtl` VALUES ('21', '1', '1', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('22', '2', '1', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('23', '3', '1', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('24', '4', '0', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('25', '5', '0', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('26', '6', '0', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('27', '7', '0', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('28', '8', '0', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('29', '9', '0', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('30', '10', '0', '3');
INSERT INTO `tran_fuzzy_dtl` VALUES ('41', '1', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('42', '2', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('43', '3', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('44', '4', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('45', '5', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('46', '6', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('47', '7', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('48', '8', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('49', '9', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('50', '10', '0', '5');
INSERT INTO `tran_fuzzy_dtl` VALUES ('51', '1', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('52', '2', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('53', '3', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('54', '4', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('55', '5', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('56', '6', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('57', '7', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('58', '8', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('59', '9', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('60', '10', '0', '6');
INSERT INTO `tran_fuzzy_dtl` VALUES ('61', '1', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('62', '2', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('63', '3', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('64', '4', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('65', '5', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('66', '6', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('67', '7', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('68', '8', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('69', '9', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('70', '10', '0', '7');
INSERT INTO `tran_fuzzy_dtl` VALUES ('71', '1', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('72', '2', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('73', '3', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('74', '4', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('75', '5', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('76', '6', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('77', '7', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('78', '8', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('79', '9', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('80', '10', '0', '8');
INSERT INTO `tran_fuzzy_dtl` VALUES ('81', '1', '0.566667', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('82', '2', '0.333333', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('83', '3', '0.166667', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('84', '4', '0', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('85', '5', '0', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('86', '6', '0.2', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('87', '7', '0.133333', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('88', '8', '0', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('89', '9', '0', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('90', '10', '0', '9');
INSERT INTO `tran_fuzzy_dtl` VALUES ('91', '1', '0.566667', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('92', '2', '0.333333', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('93', '3', '0.166667', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('94', '4', '0', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('95', '5', '0', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('96', '6', '0.2', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('97', '7', '0.133333', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('98', '8', '0', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('99', '9', '0', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('100', '10', '0', '10');
INSERT INTO `tran_fuzzy_dtl` VALUES ('101', '1', '0.566667', '11');
INSERT INTO `tran_fuzzy_dtl` VALUES ('102', '2', '0.333333', '11');
INSERT INTO `tran_fuzzy_dtl` VALUES ('103', '3', '0.166667', '11');
INSERT INTO `tran_fuzzy_dtl` VALUES ('104', '4', '0', '11');
INSERT INTO `tran_fuzzy_dtl` VALUES ('105', '5', '0', '11');
INSERT INTO `tran_fuzzy_dtl` VALUES ('106', '6', '0.2', '11');
INSERT INTO `tran_fuzzy_dtl` VALUES ('107', '7', '0.133333', '11');
INSERT INTO `tran_fuzzy_dtl` VALUES ('108', '8', '0', '11');
INSERT INTO `tran_fuzzy_dtl` VALUES ('109', '9', '0', '11');
INSERT INTO `tran_fuzzy_dtl` VALUES ('110', '10', '0', '11');

-- ----------------------------
-- Table structure for tran_parameter
-- ----------------------------
DROP TABLE IF EXISTS `tran_parameter`;
CREATE TABLE `tran_parameter` (
  `id_parameter` int(11) NOT NULL AUTO_INCREMENT,
  `nama_parameter` varchar(50) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_parameter`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tran_parameter
-- ----------------------------
INSERT INTO `tran_parameter` VALUES ('1', 'Harga', 'Rp');
INSERT INTO `tran_parameter` VALUES ('2', 'Kapasitas', 'Kg');
INSERT INTO `tran_parameter` VALUES ('3', 'Kecepatan', 'Rpm');
INSERT INTO `tran_parameter` VALUES ('4', 'Daya', 'Watt');
INSERT INTO `tran_parameter` VALUES ('5', 'Berat', 'Kg');
INSERT INTO `tran_parameter` VALUES ('6', 'Panjang', 'Cm');
INSERT INTO `tran_parameter` VALUES ('7', 'Lebar', 'Cm');
INSERT INTO `tran_parameter` VALUES ('8', 'Tinggi', 'Cm');

-- ----------------------------
-- Table structure for tran_zadeh
-- ----------------------------
DROP TABLE IF EXISTS `tran_zadeh`;
CREATE TABLE `tran_zadeh` (
  `id_zadeh` int(11) NOT NULL AUTO_INCREMENT,
  `id_parameter_1` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `id_parameter_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_zadeh`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tran_zadeh
-- ----------------------------
INSERT INTO `tran_zadeh` VALUES ('36', '1', '2', '2');
INSERT INTO `tran_zadeh` VALUES ('37', '2', '1', '3');
INSERT INTO `tran_zadeh` VALUES ('38', '3', '2', '4');
INSERT INTO `tran_zadeh` VALUES ('39', '4', '1', '5');
INSERT INTO `tran_zadeh` VALUES ('40', '5', '2', '6');
INSERT INTO `tran_zadeh` VALUES ('41', '6', '2', '7');
INSERT INTO `tran_zadeh` VALUES ('42', '7', '1', '8');
