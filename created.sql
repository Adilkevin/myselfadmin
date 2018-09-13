/*
Navicat MySQL Data Transfer

Source Server         : ahakingdom
Source Server Version : 50721
Source Host           : 192.168.10.10:3306
Source Database       : created

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-09-13 14:29:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='后台用户表';

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'admin', null, '', '$2y$10$q/kNBCAamfVlb3KqciXmCenHrGDfg0MvO40lhITX1QdCl16MIdKV.', 'wygyMNcjW1ZAYKm8vlbmg7IiGjAkEPIp6XOEU8VeOJaxnfpeCch53iWm7P3N', 'yy1', '2018-09-06 07:11:09', '2018-09-06 07:11:09');
INSERT INTO `admins` VALUES ('6', 'test', null, '123123@asfas.com', 'eyJpdiI6IngrVWU1VkRJYXlLdG5tSzkwbVV0bVE9PSIsInZhbHVlIjoiMk9Rdlp5WFA3MkM0Sk9XU25hRmM1dz09IiwibWFjIjoiMTJiZjVlMDllMGE5MDhlOGNlNzU1MTJkOGI4ZTIxMGY1NTdlZjBhNTVhM2RlMTM0NzVhMDQ4ZDIyZTYyZjljYiJ9', null, 'test', '2018-09-06 03:54:12', '2018-09-06 03:54:12');
INSERT INTO `admins` VALUES ('7', '1', null, '', 'eyJpdiI6IllVQ1lwMmJMcWdZZ0VDU2dKSFRDZEE9PSIsInZhbHVlIjoiWGNUZHRURW5NdEFOK29BZlFiSkdndz09IiwibWFjIjoiNTZmNjYzMjIyZjkwZGI5Nzg3OGM1YjAyYjNjYmYwN2YwNDI0OTNmNTNjOWMzNzMwODVjNDM4YzQ5Yjk3NGVhYSJ9', null, 'admin', '2018-09-06 07:09:37', '2018-09-06 07:09:37');

-- ----------------------------
-- Table structure for left_nav
-- ----------------------------
DROP TABLE IF EXISTS `left_nav`;
CREATE TABLE `left_nav` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `sort` bigint(20) unsigned DEFAULT '1' COMMENT '排序',
  `type_id` int(4) NOT NULL COMMENT '关联id',
  `user_id` bigint(11) unsigned NOT NULL COMMENT '用户关联id',
  `name` varchar(32) NOT NULL,
  `parent_id` tinyint(2) DEFAULT '0' COMMENT '默认为0;0：为一级导航；非0：即为多级导航',
  `is_delete` tinyint(2) DEFAULT '0' COMMENT '0:未删除；1：删除',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of left_nav
-- ----------------------------
INSERT INTO `left_nav` VALUES ('1', '23', '2', '1', '123123', '0', '1', '2018-09-11 06:35:20', '2018-09-11 10:21:10');
INSERT INTO `left_nav` VALUES ('2', '23', '1', '1', 'asawc', '0', '1', '2018-09-11 06:36:13', '2018-09-12 01:34:15');
INSERT INTO `left_nav` VALUES ('4', '23', '1', '1', 'asawc3', '0', '1', '2018-09-11 06:37:45', '2018-09-11 10:21:37');
INSERT INTO `left_nav` VALUES ('5', '11', '1', '1', '111', '0', '1', '2018-09-11 06:39:41', '2018-09-11 10:21:02');
INSERT INTO `left_nav` VALUES ('6', '2', '1', '1', 'asawc', '1', '1', '2018-09-11 06:42:17', '2018-09-11 10:21:10');
INSERT INTO `left_nav` VALUES ('7', '1', '1', '1', '123123', '0', '1', '2018-09-11 06:49:29', '2018-09-12 01:34:10');
INSERT INTO `left_nav` VALUES ('8', '1', '1', '1', '图片管理', '4', '1', '2018-09-11 07:13:47', '2018-09-11 10:21:37');
INSERT INTO `left_nav` VALUES ('9', '1', '1', '1', '图库34', '0', '1', '2018-09-11 08:12:56', '2018-09-11 10:20:38');
INSERT INTO `left_nav` VALUES ('10', '1', '1', '1', '图库4', '0', '0', '2018-09-11 08:13:03', '2018-09-11 08:31:03');
INSERT INTO `left_nav` VALUES ('11', '1', '1', '1', '活动', '0', '0', '2018-09-11 08:13:41', '2018-09-11 08:25:16');
INSERT INTO `left_nav` VALUES ('12', '1', '3', '1', '活动1', '0', '0', '2018-09-11 08:14:24', '2018-09-11 08:14:24');
INSERT INTO `left_nav` VALUES ('13', '12', '1', '1', '评论管理', '0', '0', '2018-09-11 08:20:07', '2018-09-11 08:20:07');
INSERT INTO `left_nav` VALUES ('14', '12323', '1', '1', '会员管理4', '0', '0', '2018-09-11 08:20:33', '2018-09-11 08:30:35');
INSERT INTO `left_nav` VALUES ('15', '1', '1', '1', '产品管理', '0', '0', '2018-09-11 08:20:48', '2018-09-11 08:20:48');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_08_29_150747_create_permission_tables', '1');

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('1', '1', 'App\\User');
INSERT INTO `model_has_roles` VALUES ('1', '6', 'App\\User');
INSERT INTO `model_has_roles` VALUES ('1', '8', 'App\\User');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', 'admins', '0', '2018-09-12 03:09:17', '2018-09-12 03:09:17');
INSERT INTO `roles` VALUES ('2', 'manager', 'admins', '0', '2018-09-12 03:09:17', '2018-09-12 03:09:17');
INSERT INTO `roles` VALUES ('3', 'write', 'admins', '0', '2018-09-12 08:51:47', '2018-09-12 08:51:47');

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) NOT NULL DEFAULT '0' COMMENT '0:表示默认拥有',
  `name` varchar(32) NOT NULL,
  `remark` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', '0', '图片', null, null, null);
INSERT INTO `types` VALUES ('2', '0', '文章', null, null, null);
INSERT INTO `types` VALUES ('3', '0', '商品', null, null, null);
INSERT INTO `types` VALUES ('4', '0', '视频', null, null, null);
INSERT INTO `types` VALUES ('5', '0', '专题', null, null, null);
INSERT INTO `types` VALUES ('6', '0', '链接', null, null, null);
INSERT INTO `types` VALUES ('7', '1', '测试', null, null, '2018-09-08 09:24:26');
INSERT INTO `types` VALUES ('9', '1', '活动', '322', '2018-09-08 03:16:08', '2018-09-08 09:25:01');
INSERT INTO `types` VALUES ('10', '1', '图库', '12323', '2018-09-08 03:19:04', '2018-09-08 09:23:53');
INSERT INTO `types` VALUES ('26', '1', 'asawc2', '2323', '2018-09-08 07:36:23', '2018-09-08 07:36:23');
INSERT INTO `types` VALUES ('27', '1', '12312355', '666', '2018-09-08 08:20:49', '2018-09-08 08:20:49');
INSERT INTO `types` VALUES ('36', '1', '11122', null, '2018-09-08 09:01:41', '2018-09-08 09:01:41');
INSERT INTO `types` VALUES ('37', '1', '111124', '213', '2018-09-08 09:03:57', '2018-09-08 09:03:57');
INSERT INTO `types` VALUES ('38', '1', '恶趣味', null, '2018-09-08 09:04:36', '2018-09-08 09:04:36');
INSERT INTO `types` VALUES ('39', '1', '233', null, '2018-09-08 09:05:15', '2018-09-08 09:05:15');
INSERT INTO `types` VALUES ('40', '1', '23', null, '2018-09-08 09:06:26', '2018-09-08 09:06:26');
INSERT INTO `types` VALUES ('41', '1', '222212', null, '2018-09-08 09:17:22', '2018-09-08 09:17:22');
INSERT INTO `types` VALUES ('42', '1', 'asawc23', null, '2018-09-08 09:21:08', '2018-09-08 09:21:08');
INSERT INTO `types` VALUES ('43', '1', '1111', null, '2018-09-11 04:03:42', '2018-09-11 04:03:42');
INSERT INTO `types` VALUES ('44', '1', '222', '213123', '2018-09-11 04:12:02', '2018-09-11 04:12:02');
INSERT INTO `types` VALUES ('45', '1', '图库1', '213', '2018-09-11 04:13:51', '2018-09-11 04:13:51');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
