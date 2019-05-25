/*
 Navicat Premium Data Transfer

 Source Server         : Mysql
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost:3306
 Source Schema         : perpustakaan

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 15/03/2019 14:10:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_admin
-- ----------------------------
DROP TABLE IF EXISTS `data_admin`;
CREATE TABLE `data_admin`  (
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nik` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `level` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`username`) USING BTREE,
  INDEX `level`(`level`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_admin
-- ----------------------------
INSERT INTO `data_admin` VALUES ('admin', 'admin', '35252421582', 'Ngadimin', 'Garum', '08575214582', '1');
INSERT INTO `data_admin` VALUES ('azein', 'azein', '352514282042', 'Azein Rastafara', 'Samben', '08574265282', '2');
INSERT INTO `data_admin` VALUES ('momod', 'momod', '35857552255', 'Momod', 'Blitar', '08575424522582', '2');

-- ----------------------------
-- Table structure for data_anggota
-- ----------------------------
DROP TABLE IF EXISTS `data_anggota`;
CREATE TABLE `data_anggota`  (
  `id_anggota` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nis` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_anggota
-- ----------------------------
INSERT INTO `data_anggota` VALUES ('kur01', '352751761', 'Kurniawan Setiawan', 'Blitar', '08574558555');
INSERT INTO `data_anggota` VALUES ('san01', '35254582258', 'Sandios', 'Garum', '0857562154');

-- ----------------------------
-- Table structure for data_buku
-- ----------------------------
DROP TABLE IF EXISTS `data_buku`;
CREATE TABLE `data_buku`  (
  `id_buku` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `isbn` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `judul_buku` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kategori` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pengarang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `penerbit` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tahun_terbit` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `stok` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `rak_buku` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  INDEX `id_buku`(`id_buku`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_buku
-- ----------------------------
INSERT INTO `data_buku` VALUES ('b002', 'er482', 'Sejarah Pemrograman', 'jav01', 'Sandios', 'Gramed', '2011', '19', '110-120', 'tidak ada');
INSERT INTO `data_buku` VALUES ('b001', 'q3421', 'Belajar Sains', 'sa01', 'Reina', 'Gramed', '2014', '12', '100-102', 'Masih perjalanan');
INSERT INTO `data_buku` VALUES ('mtk01', 'wax21', 'Belajar Matematika', 'mtk01', 'Dr. Iwan', 'Graha Medika', '2001', '20', '140-252', 'Tidak ada');

-- ----------------------------
-- Table structure for data_kategori
-- ----------------------------
DROP TABLE IF EXISTS `data_kategori`;
CREATE TABLE `data_kategori`  (
  `id_kategori` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama_kategori` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_kategori
-- ----------------------------
INSERT INTO `data_kategori` VALUES ('sa01', 'Sains');
INSERT INTO `data_kategori` VALUES ('mtk01', 'Matematika');
INSERT INTO `data_kategori` VALUES ('jav01', 'Permrograman');
INSERT INTO `data_kategori` VALUES ('sa02', 'Sosialita');

-- ----------------------------
-- Table structure for data_peminjaman
-- ----------------------------
DROP TABLE IF EXISTS `data_peminjaman`;
CREATE TABLE `data_peminjaman`  (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_buku` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tanggal_pinjam` date NULL DEFAULT NULL,
  `tanggal_kembali` date NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`no`) USING BTREE,
  INDEX `anggota`(`id_anggota`) USING BTREE,
  INDEX `buku`(`id_buku`) USING BTREE,
  INDEX `status`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_peminjaman
-- ----------------------------
INSERT INTO `data_peminjaman` VALUES (7, 'san01', 'b001', '2019-03-12', '2019-03-12', '1');
INSERT INTO `data_peminjaman` VALUES (8, 'kur01', 'b002', '2019-03-12', '2019-03-12', '1');
INSERT INTO `data_peminjaman` VALUES (9, 'kur01', 'b002', '2019-03-12', '2019-03-12', '1');
INSERT INTO `data_peminjaman` VALUES (10, 'kur01', 'b002', '2019-03-12', '2019-03-21', '1');
INSERT INTO `data_peminjaman` VALUES (11, 'kur01', 'b002', '2019-03-14', '2019-03-17', '2');

-- ----------------------------
-- Table structure for sys_level
-- ----------------------------
DROP TABLE IF EXISTS `sys_level`;
CREATE TABLE `sys_level`  (
  `id_level` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_level` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  INDEX `id_level`(`id_level`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sys_level
-- ----------------------------
INSERT INTO `sys_level` VALUES ('1', 'Superadmin');
INSERT INTO `sys_level` VALUES ('2', 'Petugas');

-- ----------------------------
-- Table structure for sys_log
-- ----------------------------
DROP TABLE IF EXISTS `sys_log`;
CREATE TABLE `sys_log`  (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `aktivitas` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_admin` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sys_status_peminjaman
-- ----------------------------
DROP TABLE IF EXISTS `sys_status_peminjaman`;
CREATE TABLE `sys_status_peminjaman`  (
  `id_status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_status`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sys_status_peminjaman
-- ----------------------------
INSERT INTO `sys_status_peminjaman` VALUES ('1', 'Dikembalikan');
INSERT INTO `sys_status_peminjaman` VALUES ('2', 'Dipinjam');

-- ----------------------------
-- Table structure for sys_total_pinjam
-- ----------------------------
DROP TABLE IF EXISTS `sys_total_pinjam`;
CREATE TABLE `sys_total_pinjam`  (
  `buku_dipinjam` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sys_total_pinjam
-- ----------------------------
INSERT INTO `sys_total_pinjam` VALUES ('1');

SET FOREIGN_KEY_CHECKS = 1;
