/*
 Navicat Premium Data Transfer

 Source Server         : Leonardo
 Source Server Type    : MySQL
 Source Server Version : 100424 (10.4.24-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : eoffice

 Target Server Type    : MySQL
 Target Server Version : 100424 (10.4.24-MariaDB)
 File Encoding         : 65001

 Date: 12/11/2024 12:00:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity`  (
  `id_activity` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp,
  `delete` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_activity`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1852 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES (1728, 1, 'User membuka Dashboard', '2024-11-11 09:40:40', NULL);
INSERT INTO `activity` VALUES (1729, 1, 'User membuka Dashboard', '2024-11-11 20:00:01', NULL);
INSERT INTO `activity` VALUES (1730, 1, 'User membuka Folder Dokumen', '2024-11-11 20:00:31', NULL);
INSERT INTO `activity` VALUES (1731, 1, 'User membuka Folder Dokumen', '2024-11-11 20:02:00', NULL);
INSERT INTO `activity` VALUES (1732, 1, 'User membuka Folder Dokumen', '2024-11-11 20:02:10', NULL);
INSERT INTO `activity` VALUES (1733, 1, 'User membuka Folder Dokumen', '2024-11-11 20:02:23', NULL);
INSERT INTO `activity` VALUES (1734, 1, 'User membuka Folder Dokumen', '2024-11-11 20:06:48', NULL);
INSERT INTO `activity` VALUES (1735, 1, 'User membuka Folder', '2024-11-11 20:06:52', NULL);
INSERT INTO `activity` VALUES (1736, 1, 'User membuka Folder', '2024-11-11 20:08:09', NULL);
INSERT INTO `activity` VALUES (1737, 1, 'User membuka Folder', '2024-11-11 20:08:52', NULL);
INSERT INTO `activity` VALUES (1738, 1, 'User membuka Folder', '2024-11-11 20:09:10', NULL);
INSERT INTO `activity` VALUES (1739, 1, 'User membuka Folder', '2024-11-11 20:09:40', NULL);
INSERT INTO `activity` VALUES (1740, 1, 'User membuka Folder', '2024-11-11 20:09:52', NULL);
INSERT INTO `activity` VALUES (1741, 1, 'User membuka Folder Dokumen', '2024-11-11 20:10:17', NULL);
INSERT INTO `activity` VALUES (1742, 1, 'User membuka Form Folder', '2024-11-11 20:10:20', NULL);
INSERT INTO `activity` VALUES (1743, 1, 'User membuka Folder Dokumen', '2024-11-11 20:10:52', NULL);
INSERT INTO `activity` VALUES (1744, 1, 'User membuka Folder', '2024-11-11 20:10:59', NULL);
INSERT INTO `activity` VALUES (1745, 1, 'User membuka Folder Dokumen', '2024-11-11 20:11:43', NULL);
INSERT INTO `activity` VALUES (1746, 1, 'User membuka Form Folder', '2024-11-11 20:11:52', NULL);
INSERT INTO `activity` VALUES (1747, 1, 'User membuka Folder Dokumen', '2024-11-11 20:13:22', NULL);
INSERT INTO `activity` VALUES (1748, 1, 'User membuka Form Folder', '2024-11-11 20:15:34', NULL);
INSERT INTO `activity` VALUES (1749, 1, 'User membuka Form Folder', '2024-11-11 20:15:45', NULL);
INSERT INTO `activity` VALUES (1750, 1, 'User membuka Form Folder', '2024-11-11 20:15:59', NULL);
INSERT INTO `activity` VALUES (1751, 1, 'User membuka Form Folder', '2024-11-11 20:16:23', NULL);
INSERT INTO `activity` VALUES (1752, 1, 'User membuka Form Folder', '2024-11-11 20:17:47', NULL);
INSERT INTO `activity` VALUES (1753, 1, 'User membuka Form Folder', '2024-11-11 20:19:21', NULL);
INSERT INTO `activity` VALUES (1754, 1, 'User membuka Folder Dokumen', '2024-11-11 20:20:40', NULL);
INSERT INTO `activity` VALUES (1755, 1, 'User membuka Folder Dokumen', '2024-11-11 20:21:38', NULL);
INSERT INTO `activity` VALUES (1756, 1, 'User membuka Folder Dokumen', '2024-11-11 20:22:00', NULL);
INSERT INTO `activity` VALUES (1757, 1, 'User membuka Folder Dokumen', '2024-11-11 20:22:45', NULL);
INSERT INTO `activity` VALUES (1758, 1, 'User membuka Folder Dokumen', '2024-11-11 20:23:04', NULL);
INSERT INTO `activity` VALUES (1759, 1, 'User membuka Folder Dokumen', '2024-11-11 20:28:07', NULL);
INSERT INTO `activity` VALUES (1760, 1, 'User membuka Folder Dokumen', '2024-11-11 20:29:13', NULL);
INSERT INTO `activity` VALUES (1761, 1, 'User membuka Folder Dokumen', '2024-11-11 20:44:04', NULL);
INSERT INTO `activity` VALUES (1762, 1, 'User membuka Folder Dokumen', '2024-11-11 20:44:16', NULL);
INSERT INTO `activity` VALUES (1763, 1, 'User membuka Dokumen', '2024-11-11 20:44:52', NULL);
INSERT INTO `activity` VALUES (1764, 1, 'User membuka Folder Dokumen', '2024-11-11 20:44:57', NULL);
INSERT INTO `activity` VALUES (1765, 1, 'User membuka Folder Dokumen', '2024-11-11 20:46:03', NULL);
INSERT INTO `activity` VALUES (1766, 1, 'User membuka Folder Dokumen', '2024-11-11 20:47:30', NULL);
INSERT INTO `activity` VALUES (1767, 1, 'User membuka Folder Dokumen', '2024-11-11 20:47:40', NULL);
INSERT INTO `activity` VALUES (1768, 1, 'User membuka Folder', '2024-11-11 20:48:10', NULL);
INSERT INTO `activity` VALUES (1769, 1, 'User membuka Folder', '2024-11-11 20:49:05', NULL);
INSERT INTO `activity` VALUES (1770, 1, 'User membuka Folder', '2024-11-11 20:50:03', NULL);
INSERT INTO `activity` VALUES (1771, 1, 'User membuka Folder', '2024-11-11 20:50:17', NULL);
INSERT INTO `activity` VALUES (1772, 1, 'User membuka Folder', '2024-11-11 20:55:18', NULL);
INSERT INTO `activity` VALUES (1773, 1, 'User membuka Form Edit User', '2024-11-11 20:55:24', NULL);
INSERT INTO `activity` VALUES (1774, 1, 'User membuka Form Edit User', '2024-11-11 20:55:55', NULL);
INSERT INTO `activity` VALUES (1775, 1, 'User membuka Folder Dokumen', '2024-11-11 20:56:36', NULL);
INSERT INTO `activity` VALUES (1776, 1, 'User membuka Surat Masuk', '2024-11-11 20:56:37', NULL);
INSERT INTO `activity` VALUES (1777, 1, 'User membuka Surat Keluar', '2024-11-11 20:56:48', NULL);
INSERT INTO `activity` VALUES (1778, 1, 'User membuka Surat Masuk', '2024-11-11 20:56:59', NULL);
INSERT INTO `activity` VALUES (1779, 1, 'User membuka Surat Keluar', '2024-11-11 20:57:09', NULL);
INSERT INTO `activity` VALUES (1780, 1, 'User membuka Folder Dokumen', '2024-11-11 20:57:10', NULL);
INSERT INTO `activity` VALUES (1781, 1, 'User membuka Dokumen', '2024-11-11 20:57:55', NULL);
INSERT INTO `activity` VALUES (1782, 1, 'User membuka Folder Dokumen', '2024-11-11 20:58:05', NULL);
INSERT INTO `activity` VALUES (1783, 1, 'User membuka Folder', '2024-11-11 20:58:11', NULL);
INSERT INTO `activity` VALUES (1784, 1, 'User membuka Form Edit User', '2024-11-11 20:58:21', NULL);
INSERT INTO `activity` VALUES (1785, 1, 'User membuka Form Edit User', '2024-11-11 20:59:16', NULL);
INSERT INTO `activity` VALUES (1786, 1, 'User membuka Form Edit User', '2024-11-11 20:59:31', NULL);
INSERT INTO `activity` VALUES (1787, 1, 'User membuka Surat Keluar', '2024-11-11 21:01:55', NULL);
INSERT INTO `activity` VALUES (1788, 1, 'User membuka Surat Keluar', '2024-11-11 21:04:14', NULL);
INSERT INTO `activity` VALUES (1789, 1, 'User membuka Folder Dokumen', '2024-11-11 21:04:15', NULL);
INSERT INTO `activity` VALUES (1790, 1, 'User membuka Folder', '2024-11-11 21:04:19', NULL);
INSERT INTO `activity` VALUES (1791, 1, 'User membuka Form Edit User', '2024-11-11 21:04:27', NULL);
INSERT INTO `activity` VALUES (1792, 1, 'User membuka Form Edit User', '2024-11-11 21:04:48', NULL);
INSERT INTO `activity` VALUES (1793, 1, 'User membuka Form Edit User', '2024-11-11 21:05:08', NULL);
INSERT INTO `activity` VALUES (1794, 1, 'User membuka Form Edit User', '2024-11-11 21:05:50', NULL);
INSERT INTO `activity` VALUES (1795, 1, 'User membuka Dashboard', '2024-11-11 22:10:29', NULL);
INSERT INTO `activity` VALUES (1796, 1, 'User membuka PengajuanCuti', '2024-11-11 22:12:01', NULL);
INSERT INTO `activity` VALUES (1797, 1, 'User membuka PengajuanCuti', '2024-11-11 22:12:43', NULL);
INSERT INTO `activity` VALUES (1798, 1, 'User membuka PengajuanCuti', '2024-11-11 22:15:16', NULL);
INSERT INTO `activity` VALUES (1799, 1, 'User membuka Data Surat Masuk', '2024-11-11 22:15:27', NULL);
INSERT INTO `activity` VALUES (1800, 1, 'User membuka PengajuanCuti', '2024-11-11 22:15:40', NULL);
INSERT INTO `activity` VALUES (1801, 1, 'User membuka PengajuanCuti', '2024-11-11 22:29:44', NULL);
INSERT INTO `activity` VALUES (1802, 1, 'User membuka Data Keterlambatan', '2024-11-11 22:31:25', NULL);
INSERT INTO `activity` VALUES (1803, 1, 'User membuka Data Keterlambatan', '2024-11-11 22:34:16', NULL);
INSERT INTO `activity` VALUES (1804, 1, 'User membuka Data Keterlambatan', '2024-11-11 22:40:51', NULL);
INSERT INTO `activity` VALUES (1805, 1, 'User membuka Data Keterlambatan', '2024-11-11 22:41:46', NULL);
INSERT INTO `activity` VALUES (1806, 1, 'User membuka Data Keterlambatan', '2024-11-11 22:43:33', NULL);
INSERT INTO `activity` VALUES (1807, 1, 'User membuka Data Keterlambatan', '2024-11-11 22:44:03', NULL);
INSERT INTO `activity` VALUES (1808, 1, 'User membuka Data Keterlambatan', '2024-11-11 22:44:03', NULL);
INSERT INTO `activity` VALUES (1809, 1, 'User membuka Dashboard', '2024-11-11 22:44:14', NULL);
INSERT INTO `activity` VALUES (1810, 1, 'User membuka Dashboard', '2024-11-11 22:44:20', NULL);
INSERT INTO `activity` VALUES (1811, 1, 'User membuka Dashboard', '2024-11-11 22:45:48', NULL);
INSERT INTO `activity` VALUES (1812, 1, 'User membuka Data User', '2024-11-11 22:46:20', NULL);
INSERT INTO `activity` VALUES (1813, 1, 'User membuka Form User', '2024-11-11 22:46:23', NULL);
INSERT INTO `activity` VALUES (1814, 1, 'User membuka Data User', '2024-11-11 22:46:43', NULL);
INSERT INTO `activity` VALUES (1815, 1, 'User membuka Dashboard', '2024-11-11 22:46:45', NULL);
INSERT INTO `activity` VALUES (1816, 4, 'User membuka Dashboard', '2024-11-11 22:47:04', NULL);
INSERT INTO `activity` VALUES (1817, 4, 'User membuka Surat Keterlambatan', '2024-11-11 22:47:09', NULL);
INSERT INTO `activity` VALUES (1818, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:47:14', NULL);
INSERT INTO `activity` VALUES (1819, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:47:53', NULL);
INSERT INTO `activity` VALUES (1820, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:48:07', NULL);
INSERT INTO `activity` VALUES (1821, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:48:13', NULL);
INSERT INTO `activity` VALUES (1822, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:52:05', NULL);
INSERT INTO `activity` VALUES (1823, 4, 'User membuka Dashboard', '2024-11-11 22:52:08', NULL);
INSERT INTO `activity` VALUES (1824, 1, 'User membuka Dashboard', '2024-11-11 22:52:21', NULL);
INSERT INTO `activity` VALUES (1825, 1, 'User membuka Data User', '2024-11-11 22:52:26', NULL);
INSERT INTO `activity` VALUES (1826, 1, 'User membuka Form User', '2024-11-11 22:52:28', NULL);
INSERT INTO `activity` VALUES (1827, 2, 'User membuka Dashboard', '2024-11-11 22:52:59', NULL);
INSERT INTO `activity` VALUES (1828, 2, 'User membuka Data Keterlambatan', '2024-11-11 22:53:05', NULL);
INSERT INTO `activity` VALUES (1829, 2, 'User membuka Data Keterlambatan', '2024-11-11 22:53:33', NULL);
INSERT INTO `activity` VALUES (1830, 2, 'User membuka Dashboard', '2024-11-11 22:54:45', NULL);
INSERT INTO `activity` VALUES (1831, 4, 'User membuka Dashboard', '2024-11-11 22:54:57', NULL);
INSERT INTO `activity` VALUES (1832, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:55:03', NULL);
INSERT INTO `activity` VALUES (1833, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:55:44', NULL);
INSERT INTO `activity` VALUES (1834, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:56:15', NULL);
INSERT INTO `activity` VALUES (1835, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:56:25', NULL);
INSERT INTO `activity` VALUES (1836, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:56:50', NULL);
INSERT INTO `activity` VALUES (1837, 4, 'User membuka Dashboard', '2024-11-11 22:57:03', NULL);
INSERT INTO `activity` VALUES (1838, 2, 'User membuka Dashboard', '2024-11-11 22:57:15', NULL);
INSERT INTO `activity` VALUES (1839, 2, 'User membuka Data Keterlambatan', '2024-11-11 22:57:20', NULL);
INSERT INTO `activity` VALUES (1840, 2, 'User membuka Data Keterlambatan', '2024-11-11 22:57:44', NULL);
INSERT INTO `activity` VALUES (1841, 2, 'User membuka Data Keterlambatan', '2024-11-11 22:58:07', NULL);
INSERT INTO `activity` VALUES (1842, 2, 'User membuka Data Keterlambatan', '2024-11-11 22:58:22', NULL);
INSERT INTO `activity` VALUES (1843, 2, 'User membuka Dashboard', '2024-11-11 22:58:46', NULL);
INSERT INTO `activity` VALUES (1844, 4, 'User membuka Dashboard', '2024-11-11 22:58:58', NULL);
INSERT INTO `activity` VALUES (1845, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:59:03', NULL);
INSERT INTO `activity` VALUES (1846, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:59:19', NULL);
INSERT INTO `activity` VALUES (1847, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:59:25', NULL);
INSERT INTO `activity` VALUES (1848, 4, 'User membuka Data Keterlambatan', '2024-11-11 22:59:28', NULL);
INSERT INTO `activity` VALUES (1849, 4, 'User membuka Dashboard', '2024-11-11 22:59:45', NULL);
INSERT INTO `activity` VALUES (1850, 2, 'User membuka Dashboard', '2024-11-11 22:59:54', NULL);
INSERT INTO `activity` VALUES (1851, 2, 'User membuka Data Keterlambatan', '2024-11-11 22:59:59', NULL);

-- ----------------------------
-- Table structure for dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen`  (
  `id_dokumen` int NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_folder` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `deleted` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dokumen
-- ----------------------------
INSERT INTO `dokumen` VALUES (24, 'Midblok Bindo (1).pdf', NULL, 1, NULL, NULL);
INSERT INTO `dokumen` VALUES (25, 'Screenshot 202.png', 6, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for folder
-- ----------------------------
DROP TABLE IF EXISTS `folder`;
CREATE TABLE `folder`  (
  `id_folder` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `nama_folder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  `deleted` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_folder`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of folder
-- ----------------------------
INSERT INTO `folder` VALUES (6, NULL, 'Kesiswaan', 'Contoh advertorial produk kecantikan.jpg', 1, NULL);
INSERT INTO `folder` VALUES (7, NULL, 'Kepala Se', 'S1-S2-Hanya-5-Tahun-Cuma-di-UIB-Daftarkan-dirimu-segera-9.webp', 4, NULL);
INSERT INTO `folder` VALUES (8, 1, 'Restu', 'big-hari-buku-nasional.jpg', 1, NULL);

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level`  (
  `id_level` int NOT NULL AUTO_INCREMENT,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES (1, 'Admin');
INSERT INTO `level` VALUES (2, 'Kepala Sekolah');
INSERT INTO `level` VALUES (3, 'Kesiswaan');
INSERT INTO `level` VALUES (4, 'Guru');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `level` int NULL DEFAULT NULL,
  `surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `setting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `folder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `datas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 1, '1', '1', '1', '1', '1');
INSERT INTO `menu` VALUES (2, 2, '1', '1', '1', '1', '1');
INSERT INTO `menu` VALUES (3, 3, '1', '1', '1', '1', '1');
INSERT INTO `menu` VALUES (4, 4, '1', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, 'E-OFFICE', 'logo.png', '1.png');

-- ----------------------------
-- Table structure for surat_cuti
-- ----------------------------
DROP TABLE IF EXISTS `surat_cuti`;
CREATE TABLE `surat_cuti`  (
  `id_surat_cuti` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_pengajuan` date NULL DEFAULT NULL,
  `jenis_cuti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_mulai_cuti` date NULL DEFAULT NULL,
  `tanggal_terakhir_cuti` date NULL DEFAULT NULL,
  `total_hari_cuti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_kembali_kerja` date NULL DEFAULT NULL,
  `id_pengganti` int NULL DEFAULT NULL,
  `persetujuan_pengganti` enum('setuju','tidak setuju') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alasan_cuti` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `diajukan_oleh` int NULL DEFAULT NULL,
  `status` enum('menunggu','diproses','disetujui') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat_cuti`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of surat_cuti
-- ----------------------------
INSERT INTO `surat_cuti` VALUES (1, NULL, 'Guru', '2024-11-01', 'cuti_tahunan', '2024-11-01', '2024-11-30', '30', '2024-11-01', 2, NULL, 'saya tidak senang', 1, 'menunggu');

-- ----------------------------
-- Table structure for surat_keluar
-- ----------------------------
DROP TABLE IF EXISTS `surat_keluar`;
CREATE TABLE `surat_keluar`  (
  `id_suratkeluar` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pesan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_user` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_suratkeluar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of surat_keluar
-- ----------------------------
INSERT INTO `surat_keluar` VALUES (10, 'SURAT BALASAN PKL', 'Leonardo Penambahan Nilai.docx', 'leonardojaylenson28@gmail.com', 'asdadsadasdasdasdada', 1);
INSERT INTO `surat_keluar` VALUES (11, 'SURAT BALASAN PKL', 'KISI-KISI FINAL BLOK KELAS XII.docx', 'leonardojaylenson28@gmail.com', 'asdfghklmnbvczqwertyuiop\r\n', 1);

-- ----------------------------
-- Table structure for surat_keterlambatan
-- ----------------------------
DROP TABLE IF EXISTS `surat_keterlambatan`;
CREATE TABLE `surat_keterlambatan`  (
  `id_keterlambatan` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam_kedatangan` time NOT NULL,
  `total_keterlambatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alasan_terlambat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `kepsek` enum('disetuju','tidak disetujui') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hrd` enum('disetuju','tidak disetujui') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_keterlambatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of surat_keterlambatan
-- ----------------------------
INSERT INTO `surat_keterlambatan` VALUES (1, 'Leonardo Jaylenson', '1122334455667788991010', '2024-11-11', '07:33:00', '0 Jam 18 Menit', 'Ban meledak', '2024-11-10 22:29:13', 'tidak disetujui', NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  `deleted` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', 'leonardojaylenson28@gmail.com', 1, NULL, NULL);
INSERT INTO `user` VALUES (2, 'kesiswaan', 'c4ca4238a0b923820dcc509a6f75849b', 'leonardojaylenson28@gmail.com', 3, '2024-11-11 06:59:30', NULL);
INSERT INTO `user` VALUES (3, 'guru', 'c4ca4238a0b923820dcc509a6f75849b', 'xzentou@gmail.com', 4, NULL, '2024-11-11 06:39:39');
INSERT INTO `user` VALUES (4, 'kepalasekolah', '5b7579069280fe8db6f7823769b1094c', 'leonardojaylenson28@gmail.com', 2, NULL, '2024-11-11 22:46:43');

SET FOREIGN_KEY_CHECKS = 1;
