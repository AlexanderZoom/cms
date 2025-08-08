-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 14 2019 г., 06:06
-- Версия сервера: 5.7.20-0ubuntu0.16.04.1
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `local_feed`
--
CREATE DATABASE IF NOT EXISTS `local_feed` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `local_feed`;

-- --------------------------------------------------------

--
-- Структура таблицы `admin_audit`
--

CREATE TABLE `admin_audit` (
  `id` char(36) NOT NULL,
  `type` char(30) NOT NULL,
  `message` longtext NOT NULL,
  `user` char(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- Дамп данных таблицы `admin_audit`
--

INSERT INTO `admin_audit` (`id`, `type`, `message`, `user`, `created_at`, `updated_at`) VALUES
('006ae23f-d901-4579-b822-6b43b9d819d7', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:49:02', NULL),
('03228dc2-cb71-448d-b3cb-013e280545bc', 'delete', 'Controller: Controller_Admin_Pages Action: delete \nPages abc', 'zoomerev@gmail.com', '2016-09-29 12:33:19', NULL),
('046dcf6b-e392-4295-9da5-220032147c05', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:36:37', NULL),
('04b42f6c-0f1f-4b13-a536-73db8400e9e2', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:21:04', NULL),
('051be87a-5f0b-4717-8d33-a07c325575d8', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:29:37', NULL),
('054bb491-8e58-4edd-b452-5a9a2d043be2', 'edit', 'Controller: Controller_Admin_Users Action: edit \nUsers ddd', 'alexazoom', '2016-10-12 02:47:08', NULL),
('065da8c6-2387-4ddc-aa75-caf02fa736df', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 89.110.0.187', 'zoomerev@gmail.com', '2016-10-10 04:21:31', NULL),
('0780dc44-2edb-41b7-9f15-afbfbf7eef77', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:10:18', NULL),
('07a24e45-6346-4d10-b4b9-54762bd2e3a5', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:08:19', NULL),
('07c69f7b-9d6e-4ddd-aa58-8a919edfc622', 'add', 'Controller: Controller_Admin_Users Action: create \nUsers sss', 'zoomerev@gmail.com', '2016-10-12 02:32:58', NULL),
('0ad87e9f-8a7b-4bcd-8848-1e5f9c6ae61e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-02 12:35:20', NULL),
('0af5eac2-aa8c-4445-b475-a3d88ffbc86b', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:35:05', NULL),
('0b0e3945-f56c-4e71-b933-5aefd4de7c9e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:36:19', NULL),
('0e6034b7-abda-4267-9e64-fea9af9ae1c9', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:19:20', NULL),
('0edabf02-5392-49ed-a7d9-0853cc93fbf1', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [_GLOBAL_%EMPTY%EMPTY] => Array\n        (\n            [package] => _GLOBAL_\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:47:59', NULL),
('0f1bf674-0c4e-425e-8a44-eb2b265bf8b6', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:01:58', NULL),
('0f70c503-3cd3-4dc6-84a2-7355256371ec', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:18:57', NULL),
('112e3dad-85de-4bc5-8a47-dcd925923ab4', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 0\n            [instance_inherit] => 1\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:40:25', NULL),
('11675f0d-65cd-42e6-8130-e72425dcc9d2', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:29:06', NULL),
('1329e8f0-b1af-4fdd-ad97-03762c66ce78', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-11-09 07:05:31', NULL),
('14401467-6884-401f-9ea9-9bdd490356d8', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:35:56', NULL),
('15a7c9f0-b3e3-4ec5-901e-bb60c066d585', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:16:49', NULL),
('1901cfa3-0263-4e24-bae1-f7fbf66012e1', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 21:36:10', NULL),
('19395826-517f-4b1e-b9c0-786d0498192e', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-02 12:18:24', NULL),
('1964b391-7956-432b-afc9-9875a8c31825', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY%8] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 32\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:46:20', NULL),
('1a560c41-cbd9-4122-85e1-b49b8d36946e', 'edit', 'Controller: Controller_Admin_Users Action: edit \nUsers aaa', 'alexazoom', '2016-10-12 02:07:16', NULL),
('1a5fa16a-8da3-4010-921e-3529dde42a9a', 'add', 'Controller: Controller_Admin_SiteGroups Action: create \nSiteGroup sdfsdf 0', 'zoomerev@gmail.com', '2016-09-29 12:35:35', NULL),
('1af51095-323c-4299-92cb-ff890c770b7d', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:45:16', NULL),
('1b54bb8c-4dc8-4c0d-8720-ab3d941f5712', 'edit', 'Controller: Controller_Admin_Pages Action: setmain \nPages Set main id 7', 'zoomerev@gmail.com', '2016-09-29 12:33:15', NULL),
('1bff3e58-820a-4bed-aa59-d2040c946b8a', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 1\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:40:41', NULL),
('1ffc964c-5d08-409e-a2fb-5e1f5cb793f5', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2016-11-09 07:02:22', NULL),
('2018a5be-6c75-49db-bebd-df2fea0a6601', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:32:09', NULL),
('221f679b-4aca-4386-b3dc-b83b17012162', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:24:44', NULL),
('2225bea6-dc53-4ea4-9cf2-0ce4bd6ebd1a', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 178.66.121.173', 'zoomerev@gmail.com', '2016-11-09 07:04:20', NULL),
('24af7499-f451-478d-b1bc-9ed51ddda2fb', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:31:26', NULL),
('24bc03ef-8cc4-4fc3-81e8-24d36d8d9f65', 'add', 'Controller: Controller_Admin_Pages Action: create \nPages Запрет', 'zoomerev@gmail.com', '2016-11-04 13:12:43', NULL),
('24fafda1-d7cb-4e5f-8eff-3f6d6c37d49b', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:03:11', NULL),
('2583a87a-ddac-4ce1-a3e1-9a34b6ac5612', 'edit', 'Controller: Controller_Admin_Users Action: edit \nUsers ddd', 'alexazoom', '2016-10-12 02:47:32', NULL),
('25b61ec3-440f-4598-b90a-787e1be01b2d', 'login', 'logout', 'zoomerev@gmail.com', '2016-09-29 11:38:12', NULL),
('25d7a13d-beb7-4306-bcb1-958dd436daf0', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 1\n            [instance_invert] => 1\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:08:42', NULL),
('27407028-8e9b-4045-a1b5-75841cdbbc8e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:35:53', NULL),
('284d793f-926b-4d9b-86ab-c926b8b2e263', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-11 18:44:54', NULL),
('28bbae19-e997-40c1-b1eb-75be576ef68d', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:30:51', NULL),
('28ed6e7b-9fae-4214-b6ba-6e9337952d50', 'delete', 'Controller: Controller_Admin_Users Action: delete \nUsers hjhjh', 'alexazoom', '2016-10-12 02:24:04', NULL),
('293a06f7-3597-4b7f-84d9-3f422c640077', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2016-10-17 23:08:59', NULL),
('2a8c0ad4-5f3f-48bf-8dc6-95f1a8a79c2f', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 23:34:37', NULL),
('2a8dd156-c179-43e1-af2d-739fc028b0e0', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-03 02:51:48', NULL),
('2b57036c-1003-453e-842c-1c2dcfd53379', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [general%EMPTY%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [pages%EMPTY%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:33:20', NULL),
('2bfc6676-2406-46dc-b1d4-4786f5e4411a', 'edit', 'Controller: Controller_Admin_Menu Action: edit \nMenu contact', 'zoomerev@gmail.com', '2016-09-29 12:31:41', NULL),
('2c4d3648-72bd-4f47-a5ca-91ddacbc7e12', 'delete', 'Controller: Controller_Admin_Cron Action: delete \nCron 99 * * * * test2', 'zoomerev@gmail.com', '2016-10-02 12:23:26', NULL),
('2cfb20f5-5876-4e7d-a11c-c6bf255b3c73', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:08:18', NULL),
('2da9e5f2-ded9-4ce7-94d1-7af50e78b974', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2017-02-25 08:40:17', NULL),
('2db4b62e-615a-45c1-999d-178cdbda69a5', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-11 19:00:21', NULL),
('2e761424-b759-446a-8b05-fd0e8da83902', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-12-02 15:25:53', NULL),
('302e7b6d-4ec7-4f4a-b5ca-f519dc6a50b1', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 127.0.0.1', 'zoomerev@gmail.com', '2017-12-03 05:50:04', '2017-12-03 05:50:04'),
('311e21d6-5555-40eb-8a79-fb51875cc723', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 178.66.121.173', 'zoomerev@gmail.com', '2016-11-09 07:04:15', NULL),
('325d1bdd-8c28-400f-a39a-e90dbf2dae8c', 'edit', 'Controller: Controller_Admin_Access Action: instance \nAccess group id 4 rights Array\n(\n    [general%user%EMPTY%32] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => 32\n            [except] => 0\n            [rights] => 5\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:27:51', NULL),
('332e4e09-221b-4b01-be14-53fc5faaabc0', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 89.110.14.178', 'zoomerev@gmail.com', '2016-11-09 06:46:39', NULL),
('3408da2d-5d57-4969-94d4-a95af0bdd19d', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-11-09 07:02:15', NULL),
('34e767e3-92e2-4b95-917b-2656cae0e9b6', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:12:53', NULL),
('362da0db-9a60-4604-9692-c7be9bc0cab4', 'delete', 'Controller: Controller_Admin_SiteUsers Action: delete \nSiteUSers zoomerev@gmail.comc', 'zoomerev@gmail.com', '2016-09-29 12:35:10', NULL),
('398358a4-e8e5-4159-b0c9-e08f5b90121c', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2017-02-25 08:41:13', NULL),
('399a10f4-af57-42c1-b5f0-be83ba0fb14c', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages fdsf', 'zoomerev@gmail.com', '2016-09-29 12:33:07', NULL),
('3a2f9d3f-4ae8-40bc-be25-60c9d3889df6', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-11-09 07:11:06', NULL),
('3b19127c-638c-493d-96a4-aeb0c9c364ca', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2016-11-09 07:13:35', NULL),
('3b3484cf-64d2-4451-89ec-695139f65216', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:26:41', NULL),
('3cd292c6-788d-4692-a9bb-b07c3197935a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-12 04:30:41', NULL),
('3d0a8f69-28ee-4b45-b488-c94cb16a13cf', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Запрет', 'zoomerev@gmail.com', '2016-11-04 13:15:52', NULL),
('3d532d1f-c853-419b-a2d3-0c3e3896583c', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-09-29 12:45:57', NULL),
('3dc69dce-079e-4bfc-a73f-4250e7eafdff', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2017-04-18 18:40:23', NULL),
('3e8d2cbb-1012-4cdb-8c8f-1eebc1bfbc8c', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:34:25', NULL),
('3e9a83ff-433b-4506-8033-8396f5e343e5', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [general%EMPTY%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [pages%EMPTY%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:35:47', NULL),
('3f775a31-9c7d-4e17-a5d4-9ce8f497615b', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:07:14', NULL),
('4190849a-fea0-4c84-8f52-d34e1d2a4e9f', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-02 10:46:23', NULL),
('43aa821d-0e0e-4f41-9fd3-362141c666fa', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 178.66.110.25', 'zoomerev@gmail.com', '2016-10-16 19:27:41', NULL),
('43e4f69a-0621-4aee-9d97-2baf5bfd2570', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:29:49', NULL),
('4446f2ab-03d8-4a91-9310-d60f5cefb6ba', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:01:01', NULL),
('449d6cf5-b633-4c2f-9456-692ce98834b1', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:05:02', NULL),
('456c80d6-555f-4ca8-a53e-9363ae5d4c28', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2017-12-02 05:19:44', '2017-12-02 05:19:44'),
('4778b118-4b47-42fe-a4e0-920dfd1c1dfd', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-12 04:30:24', NULL),
('483083d0-8d1d-43a7-86d5-e71437576274', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2019-09-14 05:53:40', '2019-09-14 05:53:40'),
('48aafdeb-82e3-43c3-b673-2f7ceb293481', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [general%EMPTY%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [pages%pages%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:36:07', NULL),
('49048029-0820-4ce7-92c1-210763c3d15c', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:45:09', NULL),
('4938bfc3-e8e3-44ca-acf0-d0762c639541', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-05 14:37:42', NULL),
('4a0b792f-dae8-4dd9-8d40-f845d9b83d85', 'edit', 'Controller: Controller_Admin_Access Action: instance \nAccess group id 4 rights Array\n(\n    [general%user%EMPTY%34] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => 34\n            [except] => 0\n            [rights] => 8\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:09:29', NULL),
('4b1596e4-6172-40d0-aace-6587d6402d16', 'add', 'Controller: Controller_Admin_Users Action: create \nUsers ddd', 'zoomerev@gmail.com', '2016-10-12 02:33:10', NULL),
('4b97390c-3a0a-42db-9a6f-8fb29ef73f1c', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 21:43:09', NULL),
('4b99ca5b-5bfe-4a6f-8071-e1bfa1ae170e', 'edit', 'Controller: Controller_Admin_Pages Action: setmain \nPages Set main id 8', 'zoomerev@gmail.com', '2016-10-12 03:07:29', NULL),
('4d94dbb8-24dd-4b3a-8a67-5a85ebe5b376', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 19:50:02', NULL),
('4e01f395-756b-4b4f-ab9a-01821e3d7d4d', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 21:23:08', NULL),
('4e3541ad-e98c-4c41-961e-ca9ebe290b71', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 6 rights Array\n(\n    [pages%pages%EMPTY%2] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 2\n            [except] => 0\n            [rights] => 128\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2017-12-18 02:29:50', '2017-12-18 02:29:50'),
('4e40fcc4-64b2-4b41-a7bd-bbddc6953413', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-05 20:35:09', NULL),
('4ef57efc-d132-4a8f-be7a-32d1555d592f', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'alexazoom', '2016-10-03 04:06:15', NULL),
('50913b2d-b672-4dd6-a091-1aa21ca70039', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:39:21', NULL),
('5162e4c9-ab57-4894-b9d7-18d8385f734a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:28:00', NULL),
('51e2bba2-99cf-49cb-b410-24160155550c', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-11-09 07:04:51', NULL),
('529f397b-e230-4168-a1f4-b2d609a974db', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:34:26', NULL),
('53c59b4a-8619-47ee-9833-43530f3194b8', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 21:31:15', NULL),
('554e4457-3881-4b87-bc1b-2e798f3fd67e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:23:08', NULL),
('5588e336-b8f1-43e2-bb3f-99b7d67ed2c7', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:39:09', NULL),
('558934fe-7726-4a53-9311-305d35c8fdc7', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:09:03', NULL),
('559f68eb-0077-4c16-9e91-30903b321819', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [_GLOBAL_%EMPTY%EMPTY] => Array\n        (\n            [package] => _GLOBAL_\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:05:49', NULL),
('561c835c-60e5-410b-88e7-6777127a7dbd', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 127.0.0.1', 'zoomerev@gmail.com', '2017-12-07 00:39:16', '2017-12-07 00:39:16'),
('598bdc77-a9c4-45af-b988-8a5eecefb1ae', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 15\n            [instance_inherit] => 1\n            [instance_invert] => 0\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:23:38', NULL),
('59a8dde0-9d36-49b5-b105-c5b875f999b8', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY%8] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:35:09', NULL),
('5accd448-d6c4-4f01-b0bc-4c7480e92b8f', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2017-04-18 18:40:38', NULL),
('5b3da3ef-4b78-4bf5-be35-1ebc1ec49522', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 127.0.0.1', 'zoomerev@gmail.com', '2017-12-18 02:22:07', '2017-12-18 02:22:07'),
('5b595a6a-4ef5-41ea-81a0-a9c310f221ec', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2017-02-25 08:40:43', NULL),
('5ba2fd7d-420c-4d8e-9ddc-1e86f0609f97', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:39:03', NULL),
('5c0028b5-3196-4c72-b9af-760abecd5922', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-12 08:13:46', NULL),
('5cedd6ac-4310-4cdb-b6e9-01fa4b8a08fc', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [general%pages%EMPTY%2] => Array\n        (\n            [package] => general\n            [structure] => pages\n            [instance] => 2\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%pages%EMPTY%6] => Array\n        (\n            [package] => general\n            [structure] => pages\n            [instance] => 6\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-11 20:47:14', NULL),
('5dd27df2-f93b-4857-b1b8-64b28cb05bef', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY%8] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:41:02', NULL),
('5e13d8ec-1028-45d8-a308-4b9417eec10d', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:09:20', NULL),
('5e27d74f-f64f-49dd-8e73-a1d4a06580a1', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 23:35:12', NULL),
('5e8049e2-5faa-4d32-9008-b7abcb6a675d', 'add', 'Controller: Controller_Admin_Pages Action: create \nPages О нас', 'zoomerev@gmail.com', '2016-10-11 18:37:06', NULL),
('5ebb4185-a07c-451f-a5ba-3250cefde7b4', 'edit', 'Controller: Controller_Admin_Access Action: instance \nAccess group id 4 rights Array\n(\n    [general%user%EMPTY%34] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => 34\n            [except] => 0\n            [rights] => 12\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:09:17', NULL),
('5f400479-58ca-41cc-8fa0-fadd6d62534a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:33:31', NULL),
('5fe6b55b-3569-4562-b2c4-14a24521e5ed', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-02 12:13:51', NULL),
('6109a0b0-3bd9-4ae5-9fa7-eb75c5d41a55', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 21:44:08', NULL),
('61921298-50fd-4a13-8356-474af38f7e2f', 'login', 'logout', 'zoomerev@gmail.com', '2016-09-29 11:33:34', NULL),
('645255db-2625-42c2-80a0-58454a285286', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-09-29 12:45:49', NULL),
('64df9d0e-9ba2-4a65-9afb-100b89cd1e1d', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:35:27', NULL),
('667938ec-3d75-4e17-aad1-49fb624c1fbd', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:16:09', NULL),
('6700bb60-f026-4e16-858a-514f4f84b6be', 'edit', 'Controller: Controller_Admin_Cron Action: edit \nCron 1,3 * * * * gc garbage collector', 'zoomerev@gmail.com', '2016-10-12 08:38:58', NULL),
('6741e60e-716e-4066-bb52-4877f55ec410', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2017-04-02 05:19:13', NULL),
('68714c92-e4dc-4ad2-8f01-f2fa9e48c008', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [general%pages%EMPTY%8] => Array\n        (\n            [package] => general\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:07:43', NULL),
('699ba6c6-2182-4042-b7f7-06327eae0eec', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [general%pages%EMPTY%2] => Array\n        (\n            [package] => general\n            [structure] => pages\n            [instance] => 2\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:05:31', NULL),
('6a8044cf-2fad-4392-b1b9-01211b8c1e0d', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:03:28', NULL),
('6a8d928f-d118-44fa-b7cc-2e44c3021baf', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Рейтинг ELO в играх для двух игроков', 'zoomerev@gmail.com', '2016-10-11 16:26:36', NULL),
('6ac8d761-3616-49a8-8a72-1aaf29650dda', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:52:13', NULL),
('6bf609f0-c514-4615-bd57-05d6bb88a487', 'edit', 'Controller: Controller_Admin_Users Action: edit \nUsers alexazoom', 'zoomerev@gmail.com', '2016-10-03 04:05:59', NULL),
('6c448534-23c0-4e64-8fc2-deafbd055345', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [_GLOBAL_%EMPTY%EMPTY] => Array\n        (\n            [package] => _GLOBAL_\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%pages%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:05:42', NULL),
('6c786e0e-b461-4cda-9c5e-1f3b621a6eae', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-09-29 12:36:42', NULL),
('6c9b0fb0-66fd-49b4-8b06-26defc3d9c80', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 21:22:39', NULL),
('6d5a2056-da9f-4327-a305-24b4bc4da562', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 89.110.12.35', 'zoomerev@gmail.com', '2016-09-30 00:26:19', NULL),
('6e685a14-f7fd-4a37-a660-d514967f434f', 'delete', 'Controller: Controller_Admin_Users Action: delete \nUsers alexazooma', 'alexazoom', '2016-10-12 02:28:17', NULL),
('6f833df8-f214-4639-9cd1-d9b7f075d899', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-12 04:32:47', NULL),
('707556d7-ca72-44f9-9a35-92ed0c841dd9', 'add', 'Controller: Controller_Admin_Cron Action: create \nCron * * * * * gc', 'zoomerev@gmail.com', '2016-10-02 11:47:26', NULL),
('70960186-97e0-46af-8030-598237ebcbcd', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:06:51', NULL),
('726339ad-1718-4fae-b78c-eaa3cc60f705', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:10:22', NULL),
('73d2cb4e-9cb8-4886-ac26-041ec7531b3b', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-16 20:13:07', NULL),
('75a0160d-a91b-4924-a537-470d012c05f3', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.169', 'zoomerev@gmail.com', '2016-10-01 14:42:14', NULL),
('760beac8-2946-4518-9845-fdc7cf2ace1d', 'edit', 'Controller: Controller_Admin_Users Action: edit \nUsers jjj', 'alexazoom', '2016-10-12 02:07:25', NULL),
('76607aed-0fde-4f51-9eee-4b0898d72091', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 23:33:33', NULL),
('7718bfbb-70c8-4faf-9081-6c02b21d46c8', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-11 18:42:47', NULL),
('77522488-9676-4337-b706-c22298819a76', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-11-16 17:21:09', NULL),
('78565ba8-87ee-49f1-9a20-6d9ac9373407', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-12-31 01:13:15', NULL),
('796148bc-bd0d-42be-bf91-28eb6a52cc06', 'add', 'Controller: Controller_Admin_Menu Action: create \nMenu root', 'zoomerev@gmail.com', '2016-09-29 12:31:57', NULL),
('796f159e-9f87-467c-9f53-af99b8d43387', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 4 rights Array\n(\n    [_GLOBAL_%EMPTY%EMPTY] => Array\n        (\n            [package] => _GLOBAL_\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 47\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [pages%EMPTY%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 129\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 08:18:44', NULL),
('7972dfcf-39bd-448f-91d4-3c7d9c6be33b', 'login', 'logout', 'zoomerev@gmail.com', '2016-09-29 11:36:33', NULL),
('7acdfba8-9150-4d3c-b937-89218b7e1be2', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-11-20 10:02:38', NULL),
('7ae2ed3a-e245-43a7-afb8-157e6b5bec11', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:28:26', NULL),
('7c99e3d8-edba-4827-88a3-5d42376107a3', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 178.66.121.173', 'zoomerev@gmail.com', '2016-11-09 07:10:25', NULL),
('7d6f01dc-2781-4486-a499-5369c8eb9d25', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Рейтинг ELO в играх для двух игроков', 'zoomerev@gmail.com', '2016-10-11 16:28:13', NULL),
('7dfcaad2-3c7f-4322-b1ff-b147e53b83a8', 'delete', 'Controller: Controller_Admin_Users Action: delete \nUsers sss', 'alexazoom', '2016-10-12 02:34:12', NULL),
('7e4c43c5-15a0-46b4-8757-357368ed491f', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:39:18', NULL),
('7eceeaac-48b3-4212-94b1-d27f08fa5c26', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2017-04-18 20:54:39', NULL),
('7f1e87eb-6d42-4a64-8c13-2be8f45f019f', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 23:33:52', NULL),
('7f3ce173-6cc1-4ae3-9807-bd5935a9394c', 'delete', 'Controller: Controller_Admin_Users Action: delete \nUsers zoomerevev', 'alexazoom', '2016-10-12 02:28:17', NULL),
('80319cfd-fc6b-4e0e-a050-c497f460d92e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:14:46', NULL),
('819dbe63-5e39-4767-9ec0-cdd14c3fb4f4', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2016-11-09 07:04:15', NULL),
('81d0369c-b60e-462f-9833-aa934fe5e764', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-11 14:52:06', NULL),
('83d5e165-bb3c-4f03-b1d8-4e430140e67e', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2017-02-25 08:40:22', NULL),
('83de57e5-98f6-49c6-b9ec-967292e97ef2', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 15\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:20:43', NULL),
('849d73e7-6643-4a2f-9d23-7d84f5a63322', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-20 07:25:13', NULL),
('854f1b2e-6fdd-49d2-a280-b55702359d9a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:07:56', NULL),
('85605d20-4f45-453a-8870-3a1be1503dee', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-12 04:27:07', NULL),
('8672dad0-34c4-4098-b98f-a7caa9023ae7', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 15\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:10:25', NULL),
('873798f6-04d9-4530-a678-089db817841b', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:07:42', NULL),
('877b0631-ef94-41a2-a1d6-9212547019fd', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:09:08', NULL),
('87c5fc16-edd3-462a-a7b8-a40d83cb9e8c', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 19:49:52', NULL),
('8970987a-fb58-4525-b2ad-a2c5af745455', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:03:35', NULL),
('8a7df9fe-64b5-4a56-b660-fefee62b208d', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 07:11:39', NULL),
('90dd1d6d-6faa-486b-9321-b3dda15846e4', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY%8] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 128\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [pages%pages%EMPTY%9] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 9\n            [except] => 0\n            [rights] => 128\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-11-04 13:14:52', NULL),
('91829d3d-4c0c-4680-9cbc-2b2366494a0a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:36:26', NULL),
('922ea74d-6ca0-4d26-82cd-3dc5a0d6f403', 'edit', 'Controller: Controller_Admin_SiteGroups Action: edit \nSiteGroup sss 0', 'zoomerev@gmail.com', '2016-09-29 12:36:02', NULL),
('92536345-5cb1-41c8-82a2-40dd559c8aa8', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:35:03', NULL),
('92a60ecd-f34d-41c5-9b42-d057ff1ef431', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2017-04-02 05:21:38', NULL),
('92f12b8e-1f83-4277-8fde-6d43d1a13f47', 'delete', 'Controller: Controller_Admin_Menu Action: delete \nMenu root', 'zoomerev@gmail.com', '2016-09-29 12:32:33', NULL),
('931eaef5-cc79-48ad-87e6-3158b91e5e35', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 176.97.36.31', 'zoomerev@gmail.com', '2017-04-18 17:49:37', NULL),
('940afd6e-2800-4b83-af41-e55c77983f5a', 'edit', 'Controller: Controller_Admin_Pages Action: setmain \nPages Set main id 6', 'zoomerev@gmail.com', '2016-10-11 19:00:21', NULL),
('94468c54-b5ea-48dc-9cee-bd419b8867a4', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:37:50', NULL),
('948d6c72-2672-47ef-ad95-0550ae707791', 'edit', 'Controller: Controller_Admin_Access Action: instance \nAccess group id 4 rights Array\n(\n    [general%group%EMPTY%19] => Array\n        (\n            [package] => general\n            [structure] => group\n            [instance] => 19\n            [except] => 0\n            [rights] => 4\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:44:02', NULL),
('9578a4d5-5756-40bd-85d0-7ff6bc294262', 'edit', 'Controller: Controller_Admin_Pages Action: setmain \nPages Set main id 2', 'zoomerev@gmail.com', '2016-09-29 12:33:22', NULL);
INSERT INTO `admin_audit` (`id`, `type`, `message`, `user`, `created_at`, `updated_at`) VALUES
('95e094d7-2f02-422b-9bad-0db22bcfc4e2', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-12 04:36:50', NULL),
('9627f2c9-fb8d-471a-b75b-7a8678c7f69d', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:38:36', NULL),
('976572d9-4ab8-4343-995f-9871350bc33e', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 23:10:15', NULL),
('982b6581-0481-4992-8aac-6ac187952187', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2016-11-09 07:09:06', NULL),
('999a4e66-b2fe-463c-bd08-5c2c1d52e1c4', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:32:47', NULL),
('99b47af6-4b82-40b0-b1c4-07dca7989e03', 'delete', 'Controller: Controller_Admin_Users Action: delete \nUsers jjj', 'alexazoom', '2016-10-12 02:24:04', NULL),
('9bf1f9cc-054d-4eaf-9953-27eb38623217', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:38:24', NULL),
('9bfe4acd-91ed-423a-ba03-18be85b6c08a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:09:05', NULL),
('9c2cbc4a-779c-4376-b54c-d9fe4af35bb1', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:08:14', NULL),
('9da9175d-f474-4b0f-a043-64b4cabf284a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:21:19', NULL),
('a02fb286-c714-4565-8203-80cf41f1aeb9', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 92.100.206.21', 'zoomerev@gmail.com', '2016-10-19 05:41:51', NULL),
('a0edb8c6-5eee-445b-af18-f1e001825ad2', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:28:10', NULL),
('a106776e-fe53-4042-b1d2-ec65898b405b', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-12-02 15:25:07', NULL),
('a1dd10e5-1026-4526-a9c9-1d2184f12fb9', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-20 07:19:26', NULL),
('a614c81a-08bd-463f-9059-d3d5fb0a94fc', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:01:38', NULL),
('a6501edb-200a-4e00-bf2b-7f21f8100ca4', 'add', 'Controller: Controller_Admin_EmailTemplate Action: create \nEmailTemplate sdfdsf', 'zoomerev@gmail.com', '2016-09-29 12:34:11', NULL),
('a76df241-0a11-4992-a543-7ebf7c272db5', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 127.0.0.1', 'zoomerev@gmail.com', '2018-08-28 02:14:02', '2018-08-28 02:14:02'),
('a7aa3239-6a76-42cd-8c71-14bd0a0584bd', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 15\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:10:12', NULL),
('a7ab6e41-3e08-4375-aeda-c6728c2edf81', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:44:57', NULL),
('a7b5a39b-4eb2-40a8-b2c2-1dea0d0d4a0f', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY%8] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 128\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 08:19:21', NULL),
('a7f86e5d-1ba2-4fe3-9eda-397845775c54', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:33:58', NULL),
('a8068b7a-1278-4a18-97f9-10b7b115ed0a', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY%8] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 32\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:49:34', NULL),
('a85af536-8d30-4d3c-8fff-bb666f81884f', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:45:47', NULL),
('a9cc7046-a9f0-4061-9adb-e60c26531131', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 3\n            [instance_inherit] => 1\n            [instance_invert] => 0\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:40:35', NULL),
('abf6322f-f90e-4ccd-9b89-dfc253470c3e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:33:19', NULL),
('ac3ca4a2-665c-458c-a6dc-fe7aff875072', 'add', 'Controller: Controller_Admin_SiteUsers Action: create \nSiteUsers zoomerev@gmail.comc', 'zoomerev@gmail.com', '2016-09-29 12:34:53', NULL),
('ac862507-e590-493c-b835-8d68c8cc9545', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:16:58', NULL),
('ae3ab547-513a-4ebc-aab7-60ba8ef5b75d', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY%8] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:38:47', NULL),
('ae5d1911-4697-461f-a3c4-60e77728c79e', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 176.97.36.31', 'zoomerev@gmail.com', '2017-04-18 20:56:33', NULL),
('aee84266-5c07-4464-b72d-801e91197b90', 'edit', 'Controller: Controller_Admin_Groups Action: edit \nGroup abc 1', 'zoomerev@gmail.com', '2016-09-29 12:47:02', NULL),
('b2c36e5d-afd1-42d8-9e2e-42bfb961d580', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 23:09:05', NULL),
('b4a4de52-786f-4621-9b03-1d5f46b06b77', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Рейтинг ELO в играх для двух игроков', 'zoomerev@gmail.com', '2016-10-05 23:20:06', NULL),
('b4c36f9a-311f-4f28-a4c5-1ae3099f4364', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2017-02-25 08:35:17', NULL),
('b54d3151-9347-4aa9-bee6-7117d99b4293', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:09:22', NULL),
('b5aa0790-b067-4483-9ab8-29524b71807a', 'login', 'login', 'zoomerev@gmail.com', '2016-09-29 11:33:41', NULL),
('b5d7ac3e-cb81-45a6-ad61-a480145cc614', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:10:35', NULL),
('b82674c8-4906-45da-8309-e47496fcfba3', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:30:19', NULL),
('b9939779-05db-4208-8f0b-7e5e34d15349', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages fdsf', 'zoomerev@gmail.com', '2016-10-11 18:42:55', NULL),
('bac00a7e-2213-4f6e-8e66-f3981b4e0a1d', 'edit', 'Controller: Controller_Admin_Access Action: instance \nAccess group id 4 rights Array\n(\n    [general%user%EMPTY%34] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => 34\n            [except] => 0\n            [rights] => 5\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:07:55', NULL),
('bae0bdfc-f00c-4e16-9da4-62ffdd626916', 'edit', 'Controller: Controller_Admin_Pages Action: setmain \nPages Set main id 2', 'zoomerev@gmail.com', '2016-10-12 03:06:43', NULL),
('bca980ce-90b1-4d5a-aa74-82f78c10d741', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 127.0.0.1', 'zoomerev@gmail.com', '2017-12-02 05:19:56', '2017-12-02 05:19:56'),
('be00ac86-8e7e-4ae8-86d9-b7b7bf174cbb', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:28:30', NULL),
('beaffdec-bf7d-4af7-ba6b-4b1e0a65e32f', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:11:35', NULL),
('beb93e91-f8bf-4c71-b37b-329a2fe8688b', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-02 12:11:38', NULL),
('bf65c477-e8f5-4463-8c2b-45dd7a7aaf00', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:21:49', NULL),
('c01346b2-6324-4b42-82a5-439f6e694f89', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:29:12', NULL),
('c0c3f131-6240-4116-9685-0a25605cf14b', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:07:20', NULL),
('c0f968cd-1dee-48c3-b6b5-6f01dbdc5170', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Регистрация приостановлена', 'zoomerev@gmail.com', '2016-11-04 13:18:37', NULL),
('c13ffa48-1047-45aa-ab55-3f9aed25f7bb', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 1\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:40:29', NULL),
('c1bf61d6-ff3c-4bc8-b37c-f85867bf421e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:34:44', NULL),
('c1ce633c-c77d-49d1-b0d9-f9544074adae', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 178.66.107.208', 'zoomerev@gmail.com', '2016-12-28 05:13:46', NULL),
('c2281a29-8b07-4050-be2b-63fd253f3e38', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Привет мир', 'zoomerev@gmail.com', '2016-10-11 18:55:16', NULL),
('c23ab69a-f369-4f03-b8ac-e1e066028154', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-19 11:54:25', NULL),
('c328b3fc-8a2a-45f2-885b-de4883e707c3', 'edit', 'Controller: Controller_Admin_SiteUsers Action: edit \nSiteUsers zoomerev@gmail.comc', 'zoomerev@gmail.com', '2016-09-29 12:35:01', NULL),
('c4003d92-5f5b-46b1-a179-d6383a2ad854', 'edit', 'Controller: Controller_Admin_Menu Action: edit \nMenu blog', 'zoomerev@gmail.com', '2016-12-28 05:21:48', NULL),
('c41153f1-4ae8-41d4-aa98-3c7b09bf454c', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages fdsf', 'zoomerev@gmail.com', '2016-10-11 18:54:53', NULL),
('c6a9676b-fdc7-4d54-8f83-5e25b6607d7c', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'alexazoom', '2016-10-12 02:06:53', NULL),
('c6f1192e-4597-4c19-88b1-a47164c15768', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [general%EMPTY%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:33:22', NULL),
('c7314bb5-e100-4993-baa8-7f60cfa31ddd', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 127.0.0.1', 'zoomerev@gmail.com', '2019-09-14 05:53:17', '2019-09-14 05:53:17'),
('c79fcb9f-fbef-4964-8350-6f62e2439c4a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 21:33:56', NULL),
('c7ef4b64-a4a9-4f55-9d67-bc28c8c47419', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-16 20:39:05', NULL),
('c83645e0-8b5d-41d3-beae-6d974c73c1d3', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2017-03-12 21:38:43', NULL),
('c8a42e5f-740a-4286-9b9d-6d1768bb54a3', 'edit', 'Controller: Controller_Admin_Access Action: instance \nAccess group id 4 rights Array\n(\n    [general%user%EMPTY%35] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => 35\n            [except] => 0\n            [rights] => 5\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:22:50', NULL),
('c9459318-aa3d-47cb-95bc-79e825a58d86', 'delete', 'Controller: Controller_Admin_Pages Action: delete \nPages Регистрация приостановлена', 'zoomerev@gmail.com', '2016-11-04 13:19:07', NULL),
('c9d00a7d-8c1b-4655-b498-64d2bd5e4228', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:40:32', NULL),
('ca1f4639-afdf-4b7e-968c-615b2c905341', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 3\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:17:09', NULL),
('cae5d0c2-4978-4208-aa54-6a2b421ea493', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:33:43', NULL),
('cb4ef5ac-3253-4da4-8ecf-3623d718f40c', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:22:09', NULL),
('cc6d7b6c-893c-4089-a573-ece36b11ce6c', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:36:34', NULL),
('ced1b866-2c3e-4f63-ae5c-093cfffb665e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:23:43', NULL),
('cefe9994-8c24-4582-85df-9cd82f74cf2b', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages fdsf', 'zoomerev@gmail.com', '2016-10-11 18:44:27', NULL),
('d2cd246f-2dfe-4e8b-b2ca-93a212c20483', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Рейтинг ELO в играх для двух игроков', 'zoomerev@gmail.com', '2016-10-11 19:00:50', NULL),
('d387971f-b511-489b-83e4-27081920891a', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Рейтинг ELO в играх для двух игроков', 'zoomerev@gmail.com', '2016-10-11 16:25:54', NULL),
('d3d5e2c0-f743-418e-b196-444d1456a241', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:21:44', NULL),
('d55569e4-6d1c-4d3a-876d-56488aaa16ae', 'login', 'Controller: Controller_Admin_Logout Action: index \nlogout', 'zoomerev@gmail.com', '2017-12-02 05:20:21', '2017-12-02 05:20:21'),
('d6cb2e0a-bb06-4847-93c7-63d0bd71dbf6', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Рейтинг ELO в играх для двух игроков', 'zoomerev@gmail.com', '2016-10-12 03:50:13', NULL),
('d8440ad6-3f6c-4634-9048-325d6f7674e0', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Регистрация приостановлена', 'zoomerev@gmail.com', '2016-11-04 13:17:35', NULL),
('d8d8be6a-2236-4f50-94b6-d30b5603a402', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-11-09 07:05:58', NULL),
('d9544998-55c3-489a-9508-34e11401b49e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-11 15:24:28', NULL),
('d9d1a573-2163-46c6-967b-acd957ef17d0', 'add', 'Controller: Controller_Admin_Users Action: create \nUsers hjhjh', 'alexazoom', '2016-10-12 02:17:38', NULL),
('da6c873d-7cac-47ba-b06e-cd2b5dcf84f5', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:09:45', NULL),
('dc605525-7b8f-45e8-8360-4958a169285e', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 1\n            [instance_invert] => 0\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:34:44', NULL),
('ddbac9b6-8198-44d1-977c-ac7ff85c9527', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:57:18', NULL),
('dfa41b5e-8aef-4114-8cf9-e89986253dc2', 'login', 'login remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-09-29 11:38:18', NULL),
('dfd481bf-4027-470f-b30e-47f4fcfe60ad', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:06:16', NULL),
('e0b22e53-1926-4d17-894d-ed8618ef2fb5', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 7 rights Array\n(\n    [_GLOBAL_%EMPTY%EMPTY] => Array\n        (\n            [package] => _GLOBAL_\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-09-29 12:35:45', NULL),
('e13ff15d-563f-4da3-927b-dc345eab0a58', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:28:14', NULL),
('e1e1c15e-60ff-453e-992b-28b1f69145a7', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 4 rights Array\n(\n    [_GLOBAL_%EMPTY%EMPTY] => Array\n        (\n            [package] => _GLOBAL_\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 47\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [pages%EMPTY%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 129\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 08:18:55', NULL),
('e44f260a-3d36-403f-a490-b972b112a788', 'edit', 'Controller: Controller_Admin_Access Action: instance \nAccess group id 4 rights Array\n(\n    [general%user%EMPTY%37] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => 37\n            [except] => 0\n            [rights] => 5\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:33:36', NULL),
('e486f477-a431-4ff8-bae5-722b8d25db28', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [general%EMPTY%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:31:46', NULL),
('e50f1c44-c82e-4976-8a4b-b384326499a3', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 20:37:33', NULL),
('e575fed3-ca26-433d-91db-e42fc511edee', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 1\n            [instance_invert] => 1\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:40:54', NULL),
('e5a77231-9255-4651-a7ee-2cd93d430718', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-02 12:16:37', NULL),
('e611f2e5-bdd4-482c-9ee8-57c52793436a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 21:44:32', NULL),
('ebc3fb0b-4c67-47b7-aae0-258efb62b73e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:10:51', NULL),
('ec0de409-c60c-46c6-ad1d-9a290214cb35', 'edit', 'Controller: Controller_Admin_Access Action: index \nAccess group id 4 rights Array\n(\n    [general%main%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%user%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => user\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 1\n        )\n\n    [SiteMenu%main%EMPTY] => Array\n        (\n            [package] => SiteMenu\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [SiteEmailTemplate%main%EMPTY] => Array\n        (\n            [package] => SiteEmailTemplate\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [static_pages%main%EMPTY] => Array\n        (\n            [package] => static_pages\n            [structure] => main\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 02:08:31', NULL),
('ec51f0d1-0874-4a52-a3f0-ff82bd6ab6c2', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 23:34:55', NULL),
('ece6deb3-9b8e-4158-8ef2-7a7d6223777a', 'edit', 'Controller: Controller_Admin_EmailTemplate Action: edit \nEmailTemplate sdfdsf', 'zoomerev@gmail.com', '2016-09-29 12:34:18', NULL),
('ee55f80b-0498-4c01-9479-af2a605551e2', 'delete', 'Controller: Controller_Admin_EmailTemplate Action: delete \nEmailTemplate sdfdsf', 'zoomerev@gmail.com', '2016-09-29 12:34:23', NULL),
('ef19649b-358a-4289-a80b-36e8c17ae527', 'delete', 'Controller: Controller_Admin_SiteGroups Action: delete \nGroup sss 0', 'zoomerev@gmail.com', '2016-09-29 12:36:07', NULL),
('f08ee340-61dd-47fb-bb69-1be74dee6a95', 'edit', 'Controller: Controller_Admin_Cron Action: edit \nCron 1,3 * * * * gc', 'zoomerev@gmail.com', '2016-10-02 12:23:10', NULL),
('f09d7d2c-4dc9-4b6c-8f29-5ab8104a0296', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [general%pages%EMPTY%8] => Array\n        (\n            [package] => general\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-11 19:29:19', NULL),
('f0ae3fbd-e685-4ff1-a337-6510236e5aaf', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Привет мир', 'zoomerev@gmail.com', '2016-10-12 03:50:25', NULL),
('f0d5fdae-a562-4ddf-971b-ff8a5c9f54ed', 'add', 'Controller: Controller_Admin_Pages Action: create \nPages abc', 'zoomerev@gmail.com', '2016-09-29 12:32:58', NULL),
('f16b231f-f315-465b-9674-557cf383b442', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY%8] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 32\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:45:47', NULL),
('f1de85ef-bedd-4e11-9d59-786d92413cec', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 23:08:00', NULL),
('f29e6bba-c8ca-4a34-8dae-54b18d6a8e25', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 92.100.201.134', 'zoomerev@gmail.com', '2016-10-13 23:14:10', NULL),
('f36627fe-745d-41ef-ba1a-8b740bf36bb4', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 09:34:48', NULL),
('f3977f40-9e8a-49aa-8580-c78995b43dda', 'delete', 'Controller: Controller_Admin_Cron Action: delete \nCron 99 * * * * test', 'zoomerev@gmail.com', '2016-10-02 12:23:26', NULL),
('f4a5c9d7-834d-4cb0-8ef1-0eadc4e70340', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [general%pages%EMPTY%2] => Array\n        (\n            [package] => general\n            [structure] => pages\n            [instance] => 2\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-11 20:47:02', NULL),
('f77047af-641a-49a2-a0c6-e9b0bdd2974a', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:08:12', NULL),
('f786470f-66c9-4657-8135-d6aeec02e31e', 'edit', 'Controller: Controller_Admin_SiteAccess Action: instance \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY%8] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => 8\n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:34:26', NULL),
('f909798c-8223-4f7d-953c-df3463004308', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-10-12 04:49:12', NULL),
('f98dde6c-44ea-4d12-94b6-b5a9706a035d', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2017-01-15 12:14:35', NULL),
('f9b1f2b7-d613-44c7-8596-34406319415b', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2016-11-04 12:24:28', NULL),
('f9edcc0d-dea8-4802-9afe-374e5a4a6140', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 21:01:59', NULL),
('fa5618b4-af5c-4e98-8a5f-fdfcacaf4669', 'login', 'login 127.0.0.1 91.108.63.79', 'zoomerev@gmail.com', '2016-09-29 11:36:37', NULL),
('fa7efe03-6235-46b5-a1a3-0e0cbcdad097', 'edit', 'Controller: Controller_Admin_Pages Action: edit \nPages Привет мир', 'zoomerev@gmail.com', '2016-10-20 07:26:17', NULL),
('fa89c37c-8779-490c-a33f-8f00f729e75e', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [pages%pages%EMPTY] => Array\n        (\n            [package] => pages\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-12 03:45:58', NULL),
('fb3acd66-e5a9-46e6-94b2-6c19427e8fb5', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 22:35:31', NULL),
('fc23fdd8-b133-4b29-9130-f59a26790b6c', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 91.108.63.79', 'zoomerev@gmail.com', '2017-03-16 15:38:42', NULL),
('fc319c1e-f636-4e90-9f6f-f74ca03a4d35', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:41:16', NULL),
('fc9814c0-935e-4bae-9b15-01481a69b204', 'login', 'Controller: Controller_Admin_Auth_Login Action: index \nlogin remote addr: 127.0.0.1 forwarded for: 95.55.107.178', 'zoomerev@gmail.com', '2016-10-17 23:34:09', NULL),
('fdfd5125-6fea-41d7-b6c9-938c909fc418', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 23:25:08', NULL),
('fea03882-b028-4ac7-90bd-26ebe9ae176f', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-11-09 07:11:21', NULL),
('ff11e0a2-1d44-4c63-89cb-38248ff5b655', 'edit', 'Controller: Controller_Admin_SiteAccess Action: index \nAccess group id 1 rights Array\n(\n    [_GLOBAL_%EMPTY%EMPTY] => Array\n        (\n            [package] => _GLOBAL_\n            [structure] => \n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 0\n            [instance_invert] => 0\n        )\n\n    [general%pages%EMPTY] => Array\n        (\n            [package] => general\n            [structure] => pages\n            [instance] => \n            [except] => 0\n            [rights] => 1\n            [instance_inherit] => 1\n            [instance_invert] => 1\n        )\n\n)\n', 'zoomerev@gmail.com', '2016-10-11 19:29:32', NULL),
('ffe92eb0-2221-4a3b-abed-0d7bbc608a3e', 'edit', 'Controller: Controller_Admin_Settings Action: index \nSettings', 'zoomerev@gmail.com', '2016-10-17 10:07:44', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `admin_cron`
--

CREATE TABLE `admin_cron` (
  `id` bigint(20) NOT NULL,
  `minute` varchar(50) NOT NULL,
  `hour` varchar(50) NOT NULL,
  `mday` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `wday` varchar(50) NOT NULL,
  `command` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `started_at` datetime DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_cron`
--

INSERT INTO `admin_cron` (`id`, `minute`, `hour`, `mday`, `month`, `wday`, `command`, `created_at`, `updated_at`, `started_at`, `comment`) VALUES
(6, '1,3', '*', '*', '*', '*', 'gc', '2016-10-02 11:47:26', '2019-09-14 06:03:02', '2019-09-14 06:03:02', 'garbage collector');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_group`
--

CREATE TABLE `admin_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `is_disabled` tinyint(4) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_group`
--

INSERT INTO `admin_group` (`id`, `code`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 'admin', 0, '2013-11-30 10:15:28', NULL),
(4, 'member 2', 0, '2014-08-08 19:37:54', '2014-08-21 23:16:44'),
(15, 'user', 0, '2016-05-15 09:40:43', NULL),
(16, 'moderator', 0, '2016-05-15 09:40:52', NULL),
(17, 'power user', 0, '2016-05-15 09:41:01', NULL),
(19, 'creator', 0, '2016-05-15 09:41:23', '2016-05-25 16:49:55'),
(20, 'support', 0, '2016-05-15 09:41:28', NULL),
(21, 'editor', 0, '2016-05-15 09:41:38', NULL),
(23, 'hacker', 0, '2016-05-15 09:42:00', NULL),
(25, 'abc', 1, '2016-05-26 10:06:15', '2016-09-29 12:47:02');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_group_access`
--

CREATE TABLE `admin_group_access` (
  `group_id` bigint(20) NOT NULL,
  `package` varchar(100) NOT NULL,
  `structure` varchar(100) DEFAULT NULL,
  `instance` varchar(100) DEFAULT NULL,
  `rights` bigint(20) NOT NULL,
  `except` tinyint(4) NOT NULL DEFAULT '0',
  `instance_inherit` tinyint(4) NOT NULL DEFAULT '0',
  `instance_invert` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- Дамп данных таблицы `admin_group_access`
--

INSERT INTO `admin_group_access` (`group_id`, `package`, `structure`, `instance`, `rights`, `except`, `instance_inherit`, `instance_invert`, `created_at`, `updated_at`) VALUES
(4, 'general', 'user', '35', 5, 0, 0, 0, '2016-10-12 02:22:50', '2016-10-12 02:22:50'),
(4, 'general', 'user', '32', 5, 0, 0, 0, '2016-10-12 02:27:51', '2016-10-12 02:27:51'),
(4, 'general', 'user', '37', 5, 0, 0, 0, '2016-10-12 02:33:36', '2016-10-12 02:33:36'),
(4, 'general', 'main', '', 1, 0, 0, 0, '2016-10-12 02:40:35', '2016-10-12 02:40:35'),
(4, 'general', 'user', '', 3, 0, 1, 0, '2016-10-12 02:40:35', '2016-10-12 02:40:35'),
(4, 'SiteMenu', 'main', '', 1, 0, 0, 0, '2016-10-12 02:40:35', '2016-10-12 02:40:35'),
(4, 'SiteEmailTemplate', 'main', '', 1, 0, 0, 0, '2016-10-12 02:40:35', '2016-10-12 02:40:35'),
(4, 'static_pages', 'main', '', 1, 0, 0, 0, '2016-10-12 02:40:35', '2016-10-12 02:40:35'),
(4, 'general', 'group', '19', 4, 0, 0, 0, '2016-10-12 02:44:02', '2016-10-12 02:44:02');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_group_user`
--

CREATE TABLE `admin_group_user` (
  `admin_group_id` bigint(20) UNSIGNED NOT NULL,
  `admin_user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_group_user`
--

INSERT INTO `admin_group_user` (`admin_group_id`, `admin_user_id`) VALUES
(1, 1),
(4, 2),
(4, 26),
(19, 37);

-- --------------------------------------------------------

--
-- Структура таблицы `admin_notification`
--

CREATE TABLE `admin_notification` (
  `id` char(36) NOT NULL,
  `type` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `name` int(40) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` longtext NOT NULL,
  `uid` bigint(20) DEFAULT NULL,
  `gid` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `admin_notification_visit`
--

CREATE TABLE `admin_notification_visit` (
  `id` char(36) NOT NULL,
  `nid` char(36) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `visit` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `admin_session`
--

CREATE TABLE `admin_session` (
  `session_id` varchar(24) NOT NULL,
  `last_active` int(10) UNSIGNED NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_session`
--

INSERT INTO `admin_session` (`session_id`, `last_active`, `contents`) VALUES
('5b8485bae3d086-01865889', 1535412039, 'VSwYjXzTjXBs9dEJnQHtjpujyWE1f95m0w/U1F74wiTUNWX1+Jwp5C5jVzcp9JtJk7GTfMLjUZjpXRZYLUbOuqH/wGXX8rCp97koNGhmhCsUKB5gOaVMPo6LUOO7hGp762/B3HGgB/3NlZ45sZld/p9Cz279kxU/H+llmxCHuyrgfw=='),
('5d7c56348bd868-41179498', 1568429620, '3lowoWr/fshGcf/6O28o+30cKsGDrvNYhlEa9A41o5QwXAZtqhbM8h58CemP5pXZThydPiPRMKo2cjlVDgH+L/eQHxyn9JINfK4='),
('5d7c57ef175972-92402666', 1568430063, 'HsUEymbrLpx2BDnVb16qIbSk/s2V3y9GLNxHdeyGhzgVJpG0+awvVz6GcOzqjNtFFCVk6P7LHDM0Oha0eHG7cG75Ac7z38U+sAQ='),
('5d7c58671bb635-12296557', 1568430183, 'nAKIUa5QQFJwuagAvx3bVtAKtD1VfJUvP9Na1L7dSt34nrZmh8nqC1Ay1ZUTK5HGobrX/XBrl2x7qeBd/qiH15cPa6ZNt4m5H7I=');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_user`
--

CREATE TABLE `admin_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_salt` varchar(10) NOT NULL,
  `is_disabled` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_ip` varchar(15) DEFAULT NULL,
  `last_ip_forward` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_user`
--

INSERT INTO `admin_user` (`id`, `login`, `password`, `password_salt`, `is_disabled`, `last_login`, `last_ip`, `last_ip_forward`, `created_at`, `updated_at`) VALUES
(1, 'zoomerev@gmail.com', '5d573efa40477813cf62d1d4b27de3e2', 'f450551be3', 0, '2019-09-14 05:53:17', '127.0.0.1', '127.0.0.1', '2013-11-30 10:15:28', '2019-09-14 05:53:17'),
(2, 'geroyster@gmail.com', '43204d50183ba87b8c36073a6d71db43', 'f602b5b337', 1, NULL, NULL, NULL, '2013-11-30 10:15:28', '2016-05-07 08:30:21'),
(26, 'alexazoom', 'e0610a460601a7543b6a69568cbde495', 'a19949ee63', 0, '2016-10-12 02:06:53', '127.0.0.1', '91.108.63.79', '2014-06-03 18:32:41', '2016-10-12 02:06:53'),
(37, 'ddd', '1a37a2cf1a4820a0c79b2e85b53bfd2e', '3d01f64c55', 0, NULL, NULL, NULL, '2016-10-12 02:33:10', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `admin_user_token`
--

CREATE TABLE `admin_user_token` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_user_token`
--

INSERT INTO `admin_user_token` (`id`, `user_id`, `user_agent`, `token`, `type`, `created`, `expires`) VALUES
(1, 1, '21b8892f102c2d762de2bbe50ededcdea8a6ee0e', '4f87cacfaf1728723ac10820b6bf8b46f8f90454', '', 1465307500, 1496843500);

-- --------------------------------------------------------

--
-- Структура таблицы `media_storage_category`
--

CREATE TABLE `media_storage_category` (
  `code` varchar(50) NOT NULL,
  `type_data` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media_storage_category`
--

INSERT INTO `media_storage_category` (`code`, `type_data`, `created_at`, `updated_at`) VALUES
('avatar', 'public', '2016-10-02 13:16:50', '2016-10-02 13:16:54'),
('media', 'public', '2016-06-03 22:32:52', '2016-06-03 22:32:55');

-- --------------------------------------------------------

--
-- Структура таблицы `media_storage_data`
--

CREATE TABLE `media_storage_data` (
  `code` char(70) NOT NULL,
  `type` char(10) NOT NULL,
  `type_data` char(20) NOT NULL,
  `path` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- Дамп данных таблицы `media_storage_data`
--

INSERT INTO `media_storage_data` (`code`, `type`, `type_data`, `path`, `url`, `created_at`, `updated_at`) VALUES
('main', 'local', 'public', '%www_dir%/media', '%www_url%/media', '2016-06-03 22:20:00', '2016-06-03 22:20:10');

-- --------------------------------------------------------

--
-- Структура таблицы `media_storage_file`
--

CREATE TABLE `media_storage_file` (
  `id` char(36) NOT NULL,
  `data_code` varchar(50) NOT NULL,
  `category_code` varchar(50) NOT NULL,
  `path` varchar(200) NOT NULL,
  `path_data` varchar(200) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_extension` varchar(10) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_mime` varchar(100) NOT NULL,
  `name` varchar(75) NOT NULL,
  `type` int(11) UNSIGNED NOT NULL DEFAULT '10000',
  `status` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media_storage_file`
--

INSERT INTO `media_storage_file` (`id`, `data_code`, `category_code`, `path`, `path_data`, `file_name`, `file_extension`, `file_size`, `file_mime`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
('00f294be-efe7-4895-aa2d-b7b8d794056f', 'main', 'media', '/docs/', '0/0', '9x79pu8mw.jpg', 'jpg', 121942, 'image/jpeg', 'vc_types.jpg', 10000, 'ok', '2016-10-19 17:26:32', '2016-10-19 17:26:32'),
('0c602d94-70cf-4a34-9262-6abde541a243', 'main', 'avatar', '/', '0/0', 'tff99cpun.jpg', 'jpg', 34065, 'image/jpeg', '14.jpg', 10000, 'ok', '2016-11-20 09:59:33', '2016-11-20 09:59:33'),
('1624476f-42c2-4dbe-9b50-1f8c18c7527e', 'main', 'media', '/', '0/0', '991mn3qmr.png', 'png', 73348, 'image/png', 'superman-logo-012.png', 10000, 'ok', '2016-10-12 04:52:42', '2016-10-12 04:52:42'),
('17d07b5f-9f87-4159-9a0a-8e64228cba2f', 'main', 'media', '/wall/', '0/0', '7bpg7414n.jpg', 'jpg', 456727, 'image/jpeg', 'le_mont_saint_michel_castle-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:32', '2016-10-19 11:58:32'),
('1e8a741a-83c0-41bd-a355-bfd08e5bfee5', 'main', 'media', '/docs/', '0/0', 'jtix2gdsd.jpg', 'jpg', 74369, 'image/jpeg', 'vc#types.jpg', 10000, 'ok', '2016-10-19 17:26:30', '2016-10-19 17:26:30'),
('20853719-291f-44fc-a899-67181d8a3a36', 'main', 'media', '/docs/', '0/0', 'w1ckexkzo.jpg', 'jpg', 77754, 'image/jpeg', 'vc_literals.jpg', 10000, 'ok', '2016-10-19 17:26:30', '2016-10-19 17:26:30'),
('265089e8-0e88-492f-8f6c-1bb7e02f28f4', '__DIR__', 'media', '/', '/__DIR__media', 'docs', 'dir', 0, 'dir', 'docs', 0, 'ok', '2016-10-19 17:24:11', '2016-10-19 17:24:11'),
('27b787fb-1cdb-477f-9c89-f864891fe772', 'main', 'media', '/', '0/0', 'zp7f5nla5.jpg', 'jpg', 18182, 'image/jpeg', 'OPDdypFAouo.jpg', 10000, 'ok', '2016-10-05 23:17:17', '2016-10-05 23:17:17'),
('2c6e402c-5362-44d9-8bd8-56143ab3243d', 'main', 'media', '/wall/', '0/0', 'c5o04dd9g.jpg', 'jpg', 1161448, 'image/jpeg', 'city_at_night_panoramic_view-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:34', '2016-10-19 11:58:34'),
('2e0aa322-fb98-47cd-bc94-b58ffade756c', 'main', 'media', '/docs/', '0/0', 'xxfad3lho.pdf', 'pdf', 6569667, 'application/pdf', 'ProgrammingPlatformforMicrosoftNETFramework45inCSharp4thEd.pdf', 10000, 'ok', '2016-10-19 17:26:30', '2016-10-19 17:26:30'),
('2ecaf1a9-c1ce-403c-a2db-214fe178a46c', 'main', 'media', '/wall/', '0/0', '8y0nk5lng.jpg', 'jpg', 270993, 'image/jpeg', 'calm_ocean_dusk-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:31', '2016-10-19 11:58:31'),
('46c0804a-be98-49c1-90c7-82f533cf4a4d', 'main', 'media', '/wall/', '0/0', 'a47g6leqf.jpg', 'jpg', 794227, 'image/jpeg', 'venice_sunrise-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:34', '2016-10-19 11:58:34'),
('52c58393-d984-4d31-803a-a98ebf7c3108', 'main', 'media', '/', '0/0', 'qol2oif68.rar', 'rar', 7553941, 'application/x-rar', 'Саммерфилд М. Программирование на Python 3 (+CD) (2009).rar', 10000, 'ok', '2016-11-04 12:26:48', '2016-11-04 12:26:48'),
('6b66db4c-e8db-448f-922b-387a98be5e56', 'main', 'media', '/', '0/0', '304v1hx8c.jpg', 'jpg', 129708, 'image/jpeg', 'newbiepc.jpg', 10000, 'ok', '2016-10-05 23:17:18', '2016-10-05 23:17:18'),
('6eed727e-04dd-432e-bded-8888d8cee0ed', 'main', 'media', '/wall/', '0/0', 'knmx374dk.jpg', 'jpg', 1238157, 'image/jpeg', 'follow_the_sun-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:34', '2016-10-19 11:58:34'),
('6f5bef1f-5450-40e1-9f00-eac3809bb044', 'main', 'media', '/docs/', '0/0', 'hrrc5g9ik.pdf', 'pdf', 26476479, 'application/pdf', 'Cooking_book_RMC-M13_23_small(not_for_print).pdf', 10000, 'ok', '2016-10-19 17:26:59', '2016-10-19 17:26:59'),
('75151307-99f2-4625-b582-de88cb0de336', 'main', 'media', '/docs/', '0/0', 'qjox407ah.pdf', 'pdf', 1462696, 'application/pdf', 'jqgriddocs.pdf', 10000, 'ok', '2016-10-19 17:26:14', '2016-10-19 17:26:14'),
('7e02eeab-adc7-415f-8079-ab39bef10bf4', 'main', 'media', '/docs/', '0/0', 'eeynb14iw.jpg', 'jpg', 165264, 'image/jpeg', 'vc_opearators.jpg', 10000, 'ok', '2016-10-19 17:26:31', '2016-10-19 17:26:31'),
('82c90493-4b2b-48a0-9406-a80f7de85ceb', 'main', 'media', '/', '0/0', 'htvjhhcis.pdf', 'pdf', 1232535, 'application/pdf', 'prosto-o-vim.pdf', 10000, 'ok', '2016-10-19 05:45:15', '2016-10-19 05:45:15'),
('83d4c6e7-1420-4976-b43d-113af4e9f736', '__DIR__', 'media', '/', '/__DIR__media', 'wall', 'dir', 0, 'dir', 'wall', 0, 'ok', '2016-10-19 11:58:11', '2016-10-19 11:58:11'),
('941f8735-afb2-4d58-80c2-a85acd9edf4e', 'main', 'media', '/', '0/0', 'o49qimvfl.jpg', 'jpg', 108017, 'image/jpeg', 'CcOr2A3dahc.jpg', 10000, 'ok', '2016-10-05 23:17:17', '2016-10-05 23:17:17'),
('9e594af9-ea4d-4d56-8365-c044190371e2', 'main', 'media', '/docs/', '0/0', '982m9vier.pdf', 'pdf', 820277, 'application/pdf', 'VS-KB-Brochure-CPP-Letter-HiRez.pdf', 10000, 'ok', '2016-10-19 17:26:34', '2016-10-19 17:26:34'),
('ae71a300-3ca8-4134-9c36-4cd0e8275135', 'main', 'media', '/wall/', '0/0', 'afojh2wi6.jpg', 'jpg', 855706, 'image/jpeg', 'paris_panoramic_view-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:33', '2016-10-19 11:58:33'),
('aff03015-b3ca-4eea-8c18-f02afe6057cf', 'main', 'avatar', '/', '0/0', 'x1wj2i0k0.jpg', 'jpg', 25346, 'image/jpeg', '1.jpg', 10000, 'ok', '2016-10-10 04:17:13', '2016-10-10 04:17:13'),
('c0688a94-2867-44a8-8eeb-7f32418ab16d', 'main', 'media', '/', '0/0', '6oem3kgk9.png', 'png', 218144, 'image/png', 'PNG_transparency_demonstration_1.png', 10000, 'ok', '2016-10-05 23:17:18', '2016-10-05 23:17:18'),
('c148c484-d8c9-4712-85a2-f64460f2fb7e', 'main', 'media', '/docs/', '0/0', '0ceo988r2.jpg', 'jpg', 59075, 'image/jpeg', 'qzvJ3kxMYLI.jpg', 10000, 'ok', '2016-10-19 17:26:13', '2016-10-19 17:26:13'),
('c331a417-f112-44da-a5dc-eb258071a6f3', 'main', 'media', '/docs/', '0/0', '0j1hwkbie.pdf', 'pdf', 6822687, 'application/pdf', 'C__Dlya_chaynikov.pdf', 10000, 'ok', '2016-10-19 17:26:32', '2016-10-19 17:26:32'),
('c6989355-eade-41c3-8cd0-8881572eff4a', 'main', 'media', '/wall/', '0/0', 'h9p27gw29.jpg', 'jpg', 615288, 'image/jpeg', 'beyond_the_story_i-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:32', '2016-10-19 11:58:32'),
('ca2599fe-3b96-4f1a-b645-126943d78ba8', 'main', 'media', '/docs/', '0/0', '6ryxfcxq0.jpg', 'jpg', 181168, 'image/jpeg', 'ASCII.jpg', 10000, 'ok', '2016-10-19 17:26:09', '2016-10-19 17:26:09'),
('cb0aa365-c5a0-4175-adfc-d3f9e8d5dc6b', 'main', 'media', '/docs/', '0/0', 'r8d34vrq1.rar', 'rar', 51690961, 'application/x-rar', 'SovremennyySamouchiteRabotyKompyutere.rar', 10000, 'ok', '2016-10-19 17:27:15', '2016-10-19 17:27:15'),
('ce6e6c4f-fd8b-4628-8ab4-7ceec64e7173', 'main', 'media', '/wall/', '0/0', 'nsf2448ka.jpg', 'jpg', 957220, 'image/jpeg', 'the_punisher_logo-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:34', '2016-10-19 11:58:34'),
('d159365d-b53b-4282-8229-c26e573e2243', 'main', 'media', '/wall/', '0/0', 'nu0u2yhnn.jpg', 'jpg', 259147, 'image/jpeg', 'water_lily-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:33', '2016-10-19 11:58:33'),
('d93c157b-68af-4d98-9ad4-150a526d9444', 'main', 'media', '/wall/', '0/0', 'inu5v4wi3.jpg', 'jpg', 287340, 'image/jpeg', '3d_abstract_e2_cs9_fx_design-wallpaper-1920x1080.jpg', 10000, 'ok', '2016-10-19 11:58:32', '2016-10-19 11:58:32'),
('ddb7fb58-cc47-4745-add4-e7ac3b4d6916', 'main', 'media', '/docs/', '0/0', '78kvuk472.pdf', 'pdf', 1232535, 'application/pdf', 'prosto-o-vim.pdf', 10000, 'ok', '2016-10-19 17:26:13', '2016-10-19 17:26:13'),
('e16075ff-a35b-4974-bbf2-2a09a651f072', 'main', 'media', '/docs/', '0/0', 'w0qablpae.pdf', 'pdf', 8192304, 'application/pdf', 'SG_Aspire_One_721_753_Aspire_1430_1551_1830T.pdf', 10000, 'ok', '2016-10-19 17:26:38', '2016-10-19 17:26:38'),
('e944c377-18e5-441e-a8d4-c5302cc62e2e', 'main', 'media', '/docs/', '0/0', 'jf6iqivea.pdf', 'pdf', 6625295, 'application/pdf', 'aspire_8951g.pdf', 10000, 'ok', '2016-10-19 17:26:33', '2016-10-19 17:26:33'),
('f09c2e21-87b2-4174-b042-4206c45453fb', 'main', 'media', '/docs/', '0/0', 'xq7b0c437.rar', 'rar', 7553941, 'application/x-rar', 'Саммерфилд М. Программирование на Python 3 (+CD) (2009).rar', 10000, 'ok', '2016-10-19 17:26:46', '2016-10-19 17:26:46');

-- --------------------------------------------------------

--
-- Структура таблицы `media_storage_file_extra`
--

CREATE TABLE `media_storage_file_extra` (
  `file_id` char(36) NOT NULL,
  `width` smallint(6) DEFAULT NULL,
  `height` smallint(6) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media_storage_file_extra`
--

INSERT INTO `media_storage_file_extra` (`file_id`, `width`, `height`, `created_at`, `updated_at`) VALUES
('00f294be-efe7-4895-aa2d-b7b8d794056f', 1248, 957, '2016-10-19 17:26:32', NULL),
('0c602d94-70cf-4a34-9262-6abde541a243', 150, 150, '2016-11-20 09:59:33', NULL),
('1624476f-42c2-4dbe-9b50-1f8c18c7527e', 854, 649, '2016-10-12 04:52:42', NULL),
('17d07b5f-9f87-4159-9a0a-8e64228cba2f', 1920, 1080, '2016-10-19 11:58:32', NULL),
('1e8a741a-83c0-41bd-a355-bfd08e5bfee5', 682, 440, '2016-10-19 17:26:30', NULL),
('20853719-291f-44fc-a899-67181d8a3a36', 1248, 663, '2016-10-19 17:26:30', NULL),
('27b787fb-1cdb-477f-9c89-f864891fe772', 604, 568, '2016-10-05 23:17:17', NULL),
('2c6e402c-5362-44d9-8bd8-56143ab3243d', 1920, 1080, '2016-10-19 11:58:34', NULL),
('2ecaf1a9-c1ce-403c-a2db-214fe178a46c', 1920, 1080, '2016-10-19 11:58:31', NULL),
('46c0804a-be98-49c1-90c7-82f533cf4a4d', 1920, 1080, '2016-10-19 11:58:34', NULL),
('6b66db4c-e8db-448f-922b-387a98be5e56', 726, 818, '2016-10-05 23:17:18', NULL),
('6eed727e-04dd-432e-bded-8888d8cee0ed', 1920, 1080, '2016-10-19 11:58:34', NULL),
('7e02eeab-adc7-415f-8079-ab39bef10bf4', 846, 1023, '2016-10-19 17:26:31', NULL),
('941f8735-afb2-4d58-80c2-a85acd9edf4e', 600, 800, '2016-10-05 23:17:18', NULL),
('ae71a300-3ca8-4134-9c36-4cd0e8275135', 1920, 1080, '2016-10-19 11:58:33', NULL),
('aff03015-b3ca-4eea-8c18-f02afe6057cf', 112, 150, '2016-10-10 04:17:13', NULL),
('c0688a94-2867-44a8-8eeb-7f32418ab16d', 800, 600, '2016-10-05 23:17:18', NULL),
('c148c484-d8c9-4712-85a2-f64460f2fb7e', 604, 385, '2016-10-19 17:26:13', NULL),
('c6989355-eade-41c3-8cd0-8881572eff4a', 1920, 1080, '2016-10-19 11:58:32', NULL),
('ca2599fe-3b96-4f1a-b645-126943d78ba8', 715, 488, '2016-10-19 17:26:09', NULL),
('ce6e6c4f-fd8b-4628-8ab4-7ceec64e7173', 1920, 1080, '2016-10-19 11:58:34', NULL),
('d159365d-b53b-4282-8229-c26e573e2243', 1920, 1080, '2016-10-19 11:58:33', NULL),
('d93c157b-68af-4d98-9ad4-150a526d9444', 1920, 1080, '2016-10-19 11:58:32', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `text` mediumtext,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `subject`, `text`, `datetime`) VALUES
(8, 'sswwwwwwwwww', 'dddddddddddddddddddddddddddddddddddddddddddddddd', '2015-01-05 20:37:33'),
(9, 'wwwwwwwwwwwwwwwww', 'wwddddddddddddddddddddddddddd', '2015-01-05 20:37:53');

-- --------------------------------------------------------

--
-- Структура таблицы `old_media_storage_categories`
--

CREATE TABLE `old_media_storage_categories` (
  `code` varchar(50) NOT NULL,
  `hidden` varchar(3) NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `old_media_storage_categories`
--

INSERT INTO `old_media_storage_categories` (`code`, `hidden`, `created_at`, `updated_at`) VALUES
('files', 'no', '2014-05-31 00:00:00', NULL),
('media', 'no', '2013-11-28 09:16:19', NULL),
('private', 'no', '2016-06-03 17:41:33', NULL),
('userfiles', 'no', '2016-06-03 17:42:24', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `old_media_storage_files`
--

CREATE TABLE `old_media_storage_files` (
  `id` char(36) NOT NULL,
  `location_code` varchar(50) NOT NULL,
  `category_code` varchar(50) DEFAULT NULL,
  `vfolder_id` varchar(36) NOT NULL,
  `location_path` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_extension` varchar(10) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_mime` varchar(100) NOT NULL,
  `name` varchar(75) NOT NULL,
  `type` int(11) UNSIGNED NOT NULL DEFAULT '10000',
  `private` varchar(3) NOT NULL DEFAULT 'no',
  `status` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `old_media_storage_files`
--

INSERT INTO `old_media_storage_files` (`id`, `location_code`, `category_code`, `vfolder_id`, `location_path`, `file_name`, `file_extension`, `file_size`, `file_mime`, `name`, `type`, `private`, `status`, `created_at`, `updated_at`) VALUES
('535ed5ca-141b-45ac-8f4c-5cb1d3c53c53', 'main', 'media', '', 'public/0/0', 'p3n8kkxjn.jpg', 'jpg', 780831, 'image/jpeg', 'Koala.jpg', 10000, 'no', 'ok', '2016-04-08 11:42:13', NULL),
('97eaaaf8-2ead-44d4-9974-e4d3091158f4', 'private', 'private', '', 'private/0/0', 't6vfpjyuo.jpg', 'jpg', 18182, 'image/jpeg', 'OPDdypFAouo.jpg', 10000, 'yes', 'ok', '2016-05-07 08:42:07', NULL),
('9c0c0209-8202-4b28-a79d-11a56f945d26', 'private', 'private', '', 'private/0/0', '93ajb4060.jpg', 'jpg', 110416, 'image/jpeg', 'ÑÐ¾Ð·Ð²ÐµÐ·-Ð¸Ðµ-Ð¾Ñ€Ð¸Ð¾Ð½-29684644.jpg', 10000, 'yes', 'ok', '2015-10-27 12:51:09', NULL),
('cfd0079d-a799-4e5b-9fa2-8a5af8e144d1', 'main', 'media', '', 'public/0/0', '8rdv3y9xa.jpg', 'jpg', 777835, 'image/jpeg', 'Penguins.jpg', 10000, 'no', 'ok', '2015-10-27 12:51:36', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `old_media_storage_file_extras`
--

CREATE TABLE `old_media_storage_file_extras` (
  `file_id` char(36) NOT NULL,
  `width` smallint(6) DEFAULT NULL,
  `height` smallint(6) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `old_media_storage_reserved_size`
--

CREATE TABLE `old_media_storage_reserved_size` (
  `location_code` varchar(50) NOT NULL,
  `size` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `old_media_storage_reserved_size`
--

INSERT INTO `old_media_storage_reserved_size` (`location_code`, `size`, `created_at`, `updated_at`) VALUES
('main', 0, '2013-11-28 09:17:20', '2016-04-08 11:42:13'),
('private', 0, '2013-11-28 09:19:55', '2016-05-07 08:42:07');

-- --------------------------------------------------------

--
-- Структура таблицы `old_media_storage_vfolders`
--

CREATE TABLE `old_media_storage_vfolders` (
  `id` char(36) NOT NULL,
  `category_code` varchar(50) NOT NULL,
  `name` varchar(75) NOT NULL,
  `parent_id` varchar(36) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE `setting` (
  `code` varchar(70) DEFAULT NULL,
  `value` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`code`, `value`, `created_at`, `updated_at`) VALUES
('site.main.name', 'Сайт', '2016-06-16 01:34:15', '2016-10-02 12:35:20'),
('site.main.description', 'Сайт о сайте', '2016-06-16 01:34:15', '2016-09-19 22:26:47'),
('site.main.feedback_email', 'geroyster@gmail.com', '2016-06-16 02:05:07', '2016-09-17 14:48:27'),
('admin.module.pro.stat', '2345667', '2016-06-16 02:08:08', '2019-09-14 05:53:21'),
('site.pages.default_path', 'pages', '2016-09-05 14:54:40', '2016-10-11 15:24:28'),
('site.main.default_module', 'pages', '2016-09-05 15:02:56', '2016-10-11 18:44:54'),
('site.main.default_language', 'ru', '2016-09-05 18:13:35', '2016-10-12 04:30:41'),
('site.main.name_separator', '::', '2016-09-07 15:39:11', '2016-09-07 15:39:11'),
('site.main.register_type', 'verification', '2016-09-14 02:16:48', '2016-09-19 00:23:46'),
('site.main.format_date', 'd-m-Y', '2016-09-17 16:34:02', '2016-09-17 16:34:02'),
('site.main.format_time', 'H:i:s', '2016-09-17 16:34:02', '2016-09-17 16:34:02'),
('site.main.url', 'http://cms.local/', '2016-09-17 16:34:02', '2016-09-17 16:34:02');

-- --------------------------------------------------------

--
-- Структура таблицы `site_cron`
--

CREATE TABLE `site_cron` (
  `id` bigint(20) NOT NULL,
  `minute` varchar(50) NOT NULL,
  `hour` varchar(50) NOT NULL,
  `mday` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `wday` varchar(50) NOT NULL,
  `command` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `started_at` datetime DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Структура таблицы `site_email_template`
--

CREATE TABLE `site_email_template` (
  `id` bigint(20) NOT NULL,
  `name` char(100) DEFAULT NULL,
  `title` char(75) NOT NULL,
  `text` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_email_template`
--

INSERT INTO `site_email_template` (`id`, `name`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'site.register.success', 'Регистрация на %sitename%', 'Здравствуйте,&nbsp;%username%.<br /><br />Добро пожаловать на&nbsp;<a title=\"%sitename%\" href=\"%siteurl%\">%sitename%</a><br /><br />Ваши регистрационные данные:<br /><br /><strong>Логин:&nbsp;%login%</strong><br /><strong>Пароль:&nbsp;%password%<br /><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".', '2016-09-17 16:31:39', '2016-09-17 21:03:41'),
(3, 'site.register.verify', 'Подтверждение регистрации на %sitename%', 'Здравствуйте,&nbsp;%username%.<br /><br />Добро пожаловать на&nbsp;<a title=\"%sitename%\" href=\"%siteurl%\">%sitename%</a><br /><br /><strong><br /></strong>Для завершения регистрации пройдите по <a href=\"%verification_url%\">ссылке</a><strong><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".', '2016-09-17 17:26:50', '2016-09-17 17:28:25'),
(5, 'site.register.forgot', 'Сброс пароля на %sitename%', 'Здравствуйте,&nbsp;%username%.<br /><br />Вы или кто-то еще запросили сброс пароля на сайте&nbsp;<a href=\"%siteurl%\">%sitename%</a>.<br />Для сброса пароля пройдите по ссылке <a href=\"%verification_url%\">здесь</a><strong><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".', '2016-09-18 02:52:00', '2016-09-18 02:56:37'),
(6, 'site.register.confirm', 'Регистрация на %sitename%', 'Здравствуйте,&nbsp;%username%.<br /><br />Добро пожаловать на&nbsp;<a title=\"%sitename%\" href=\"%siteurl%\">%sitename%</a><br /><br />Для подтверждении регистрации пройдите по <a href=\"%verification_url%\">ссылке</a> <br /><br />Ваши регистрационные данные:<br /><br /><strong>Логин:&nbsp;%login%</strong><br /><strong>Пароль:&nbsp;%password%<br /><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".', '2016-09-18 07:27:09', '2016-09-18 07:27:09'),
(7, 'site.register.premoderate', 'Регистрация на %sitename%', 'Здравствуйте,&nbsp;%username%.<br /><br />На нашем сайте включена ручная проверка регистрационных данных. <br />После проверки данных Вам придет письмо о подтверждении регистрации.<br /><br />Ваши регистрационные данные:<br /><br /><strong>Логин:&nbsp;%login%</strong><br /><strong>Пароль:&nbsp;%password%<br /><br /><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".', '2016-09-18 07:31:19', '2016-09-18 07:31:19'),
(8, 'site.register.premoderate.confirm', 'Подтверждение регистрации на %sitename%', 'Здравствуйте,&nbsp;%username%.<br /><br />Добро пожаловать на&nbsp;<a title=\"%sitename%\" href=\"%siteurl%\">%sitename%</a><br /><br />Ваши регистрационные данные прошли проверку.<br /><strong><br /></strong>С наилучшими пожеланиями<br />команда сайта \"%sitename%\".', '2016-09-18 07:32:35', '2016-09-18 07:32:35');

-- --------------------------------------------------------

--
-- Структура таблицы `site_group`
--

CREATE TABLE `site_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `is_disabled` tinyint(4) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_group`
--

INSERT INTO `site_group` (`id`, `code`, `is_disabled`, `created_at`, `updated_at`) VALUES
(1, 'everyone', 0, '2016-09-05 21:58:07', NULL),
(2, 'banned', 0, '2016-09-05 21:58:32', NULL),
(3, 'premoderate', 0, '2016-09-05 21:58:44', NULL),
(4, 'user', 0, '2016-09-05 21:58:52', NULL),
(6, 'moderator', 0, '2016-09-06 00:50:08', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `site_group_access`
--

CREATE TABLE `site_group_access` (
  `group_id` bigint(20) NOT NULL,
  `package` varchar(100) NOT NULL,
  `structure` varchar(100) DEFAULT NULL,
  `instance` varchar(100) DEFAULT NULL,
  `rights` bigint(20) NOT NULL,
  `except` tinyint(4) NOT NULL DEFAULT '0',
  `instance_inherit` tinyint(4) NOT NULL DEFAULT '0',
  `instance_invert` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_group_access`
--

INSERT INTO `site_group_access` (`group_id`, `package`, `structure`, `instance`, `rights`, `except`, `instance_inherit`, `instance_invert`, `created_at`, `updated_at`) VALUES
(3, '_GLOBAL_', '', '', 1, 0, 0, 0, '2016-09-05 23:18:37', '2016-09-05 23:18:37'),
(6, '_GLOBAL_', '', '', 111, 0, 0, 0, '2016-09-06 00:58:10', '2016-09-06 00:58:10'),
(1, '_GLOBAL_', '', '', 1, 0, 0, 0, '2016-10-12 03:47:59', '2016-10-12 03:47:59'),
(4, '_GLOBAL_', '', '', 47, 0, 0, 0, '2016-10-12 08:18:55', '2016-10-12 08:18:55'),
(4, 'pages', '', '', 129, 0, 0, 0, '2016-10-12 08:18:55', '2016-10-12 08:18:55'),
(1, 'pages', 'pages', '8', 128, 0, 0, 0, '2016-11-04 13:14:52', '2016-11-04 13:14:52'),
(1, 'pages', 'pages', '9', 128, 0, 0, 0, '2016-11-04 13:14:52', '2016-11-04 13:14:52'),
(6, 'pages', 'pages', '2', 128, 0, 0, 0, '2017-12-18 02:29:50', '2017-12-18 02:29:50');

-- --------------------------------------------------------

--
-- Структура таблицы `site_group_user`
--

CREATE TABLE `site_group_user` (
  `site_group_id` bigint(20) UNSIGNED NOT NULL,
  `site_user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_group_user`
--

INSERT INTO `site_group_user` (`site_group_id`, `site_user_id`) VALUES
(1, 4),
(4, 1),
(4, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `site_menu`
--

CREATE TABLE `site_menu` (
  `id` bigint(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) NOT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `position` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- Дамп данных таблицы `site_menu`
--

INSERT INTO `site_menu` (`id`, `name`, `url`, `target`, `parent`, `position`, `created_at`, `updated_at`) VALUES
(2, 'home', '/', 'self', 3, 1, '2016-09-09 20:04:15', '2016-09-09 23:30:39'),
(3, 'TOPMENU', 'TOPMENU', 'self', NULL, 1, '2016-09-09 22:31:34', '2016-09-19 09:28:45'),
(4, 'blog', '/blog', 'self', 3, 2, '2016-09-09 23:38:30', '2016-12-28 05:21:48'),
(5, 'photos', '/photos', 'parent', 3, 3, '2016-09-09 23:39:00', '2016-09-10 03:05:28'),
(6, 'about', '/about', 'self', 3, 4, '2016-09-09 23:39:22', '2016-09-09 23:39:22'),
(7, 'links', '/links', 'self', 3, 5, '2016-09-09 23:39:58', '2016-09-09 23:39:58'),
(8, 'contact', '/contact', 'self', 3, 7, '2016-09-09 23:40:22', '2016-09-29 12:31:41');

-- --------------------------------------------------------

--
-- Структура таблицы `site_page`
--

CREATE TABLE `site_page` (
  `id` bigint(20) NOT NULL,
  `title` char(75) NOT NULL,
  `slug` char(100) DEFAULT NULL,
  `text` longtext NOT NULL,
  `main` tinyint(4) NOT NULL DEFAULT '0',
  `published_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- Дамп данных таблицы `site_page`
--

INSERT INTO `site_page` (`id`, `title`, `slug`, `text`, `main`, `published_at`, `created_at`, `updated_at`) VALUES
(2, 'Привет мир', '/blog', '<p>Было бы ошибкой подходить к созданию главной страницы сайта как к обычной рядовой задаче интернет-маркетинга. Это проблема не из легких, здесь нужно постараться создать некое подобие <em>конспекта</em> коммерческого сайта, или, если угодно, его квинтэссенцию. При этом предстоит еще и зацепить читателя, то есть потенциального клиента. Заставить его совершать <strong><em>ожидаемые </em></strong>действия, вовлечь в определенный конверсионный сценарий. Как это сделать? Надеемся, наша статья поможет найти ответ на вопрос, что написать на главной странице сайта.</p>\r\n<h2>Хороший слоган на вес золота</h2>\r\n<div><img class=\"big-img\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://texterra.ru/upload/img/2012-07-24-texterra-01.jpg\" alt=\"Хороший слоган на вес золота\" /></div>\r\n<p>Когда перед разработчиком стоит вопрос, как писать тексты для главных страниц, он должен в первую очередь задуматься над заголовком сайта (или <acronym title=\"Лаконичная фраза, которая выражает суть рекламного сообщения, слово происходит из гаэльского языка, где означало &laquo;боевой клич&raquo;\">слоганом</acronym>. Это нам знакомо по заголовкам новостей в современных СМИ: если фраза яркая, неординарная, емкая, легко читается, то непременно привлечет гораздо большее число посетителей &ndash; иногда в десятки раз, нежели тусклый, формальный, который нехотя придумали только ради того, чтобы он был. Сам удачный заголовок &ndash; это половина успеха (или даже больше!), в нем сконцентрирована сущность самого сообщения. Нередко читатели по заголовку узнают самое главное о событии или происшествии, а затем в самом тексте по ходу дела уже знакомятся с дополнительными подробностями. Сама культура чтения претерпела огромные изменения, и опытный маркетолог должен обязательно это учитывать.</p>\r\n<p>Примерно так же дело обстоит и с заголовком для сайта. Если он хорошо и профессионально сделан, то возникает продающий эффект, и слоган начинает работать. Большинство знаменитых мировых брендов известны нам в первую очередь по коротким фразам из рекламы. Задача веб-копирайтера &ndash; попытаться создать то же самое для сайта.</p>\r\n<p>Однако если переборщить с &laquo;кричащими&raquo; и нарочито яркими эффектами, то слоган может показаться натянутым и смешным, что может нанести ущерб для репутации. Впрочем, слоган &ndash; штучный товар, общих рецептов не существует, выручить может лишь чувство меры и вкуса.</p>\r\n<h2>Успеть зацепить клиента</h2>\r\n<div><img class=\"big-img\" src=\"http://texterra.ru/upload/img/2012-07-24-texterra-02.jpg\" alt=\"Успеть зацепить клиента\" /></div>\r\n<p>Стоит ли загромождать витрину интернет-ресурса тем, что не вызывает непосредственный интерес читателя? Вряд ли. О клиенте нужно заботиться, а не заставлять его продираться сквозь бурелом неактуальной информации (если этот контент &laquo;дорог как память&raquo;, то можно запрятать его в глубь сайта, не выставляя на всеобщее обозрение).</p>\r\n<p>Эксперты интернет-маркетинга даже выделяют временной промежуток &ndash; на то, чтобы зацепить читателя, у вас есть не больше десяти секунд. В виде опыта попробуйте представить, что вы и есть тот самый торопливый клиент, и приготовьте секундомер. Что вас привлечет на сайте в первую очередь? Что помешает? Чего будет недоставать? И, самое главное, захотите ли вы воспользоваться услугами? Каждое такое замечание &ndash; повод для отдельной проработки первой страницы. Если как следует усовершенствовать &laquo;витрину&raquo; сайта, то она заиграет новыми красками.</p>\r\n<p>Также можно посоветовать использовать короткие предложения, не отягощать текст пространными (дее)причастными оборотами, разбивать на несколько частей сложные для восприятия фразы. Конечно, речь не идет о намеренной примитивизации текста. Читателю вряд ли понравится, если разработчики сайта будут относиться к нему свысока, донельзя утрируя материал. Тут можно посоветовать придерживаться правила золотой середины.</p>\r\n<p>Также будет хорошо разделить текст на короткие части, снабдив их подзаголовками. Для удобства пользователей должны быть ссылки на разделы и глубокие ссылки на отдельные материалы.</p>\r\n<p>В описаниях современных товаров часто присутствует определение &laquo;эргономичный&raquo;, это не только комфорт сам по себе, но и удобство использования. По нашему мнению, современный сайт должен быть именно таким. Подружитесь со своим читателем и клиентом, создайте для него приемлемые условия в виртуальном пространстве. И тогда он ответит вам взаимностью.</p>\r\n<h2>Уникальность, оригинальность, актуальность</h2>\r\n<p>Еще одно важное требование для текста главной страницы сайта &ndash; это уникальность контента. Ранее мы уже давали <a href=\"http://texterra.ru/blog/kak-ukrotit-pingvina.html\">ряд рекомендаций на эту тему</a>. Стоит лишний раз повторить, что ни в коем случае нельзя копировать контент с других сайтов, просто заменяя название компании. В противном случае могут возникнуть проблемы с поисковиками, они просто не будут продвигать сайт с плагиатом и откровенно плохим рерайтом, а это, в свою очередь, будет угрожать развитию бизнеса (ни больше ни меньше!). Уникальный контент сайта &ndash; это задача-минимум для разработчика.</p>\r\n<p>Кроме того, стоит избегать банальности, например использования шаблонов и расхожих конструкций типа &laquo;на любой вкус&raquo;, &laquo;широкий ассортимент&raquo; или &laquo;динамично развивающаяся компания&raquo;. Читатель нашего времени это уже не воспринимает, и подобные приемы давно перестали работать. Но, так или иначе, так продолжают писать многие до сих пор (и, видимо, будут). И надо постараться сделать так, чтобы ваш сайт выгодно отличался от интернет-ресурсов в вашей отрасли.</p>\r\n<p>Нельзя обойтись и без актуальности. Сайт должен быть действующим, живым. Иначе говоря, не реже раза в неделю на главной странице должны появляться новые материалы, статьи, пресс-релизы, снабженные, само собой, емкими лаконичными заголовками. Читателю вряд ли понравится, если, зайдя на вашу интернет-страницу, он обнаружит, что там ничего не изменилось с момента последнего посещения. Придет ли он вновь? Ответ очевиден.</p>\r\n<p>&laquo;Мертвый&raquo; сайт &ndash; это верный путь к забвению. Помните об этом, если вы хотите, чтобы ваше виртуальное детище привлекало новых посетителей и приносило доход.</p>\r\n<h2>Задача для профессионалов</h2>\r\n<div><img class=\"big-img\" src=\"http://texterra.ru/upload/img/2012-07-24-texterra-03.jpg\" alt=\"Задача для профессионалов\" width=\"200\" height=\"150\" /></div>\r\n<p>И напоследок можно упомянуть о второстепенных, но тоже значимых факторах. Например, окошко поиска должно быть хорошо видимым на первой странице сайта (иначе клиент, пожелав, например, &laquo;вбить&raquo; в &laquo;поиск&raquo; название интересующей модели товара, так не найдет, куда вбить, а покупатель торопится, и дальнейший исход ясен). Стоит уделить внимание и оформлению текста, иллюстрациям, цвету и размеру шрифта. Не будут лишними и таблицы и диаграммами (но опять-таки не намертво застывшие). Конечно, это работа дизайнера, однако автор контента должен с ним сотрудничать, не пуская дело на самотек и стараясь видеть в целом всю схему первой страницы.</p>\r\n<p>Итак, создание первой страницы сайта &ndash; очень ответственная задача. Конечно, можно действовать на свой страх и риск, методом проб и ошибок. Но дело в том, что на данный момент большинство отраслей бизнеса освоены, все ниши заняты, и в выбранной вами отрасли бизнеса работают десятки сайтов-конкурентов.</p>', 0, '2016-09-07 00:00:00', '2016-09-01 14:17:47', '2016-10-20 07:26:17'),
(6, 'Рейтинг ELO в играх для двух игроков', '/links', 'Раньше наш рабочий процесс прерывался из-за ряда неразрешенных вопросов:<br /><br />\r\n<ul>\r\n<li>А кто из нас лучше всех играет в настольный футбол?</li>\r\n<li>С кем бы мне сейчас пойти поиграть?</li>\r\n<li>Кого надо уволить, потому что он не работает а только играет?</li>\r\n</ul>\r\n<img src=\"/media/0/0/6oem3kgk9.png\" width=\"471\" height=\"353\" /><a href=\"/media/0/0/lqsou168a.pdf\" target=\"_blank\">dddddddd<img src=\"/media/0/0/zp7f5nla5.jpg\" width=\"375\" height=\"353\" /></a><br />Наш опыт решения данных вопросов с помощью системы рейтинга ELO будет рассмотрен в статье. А также ссылка на репозиторий и на сайт будут разбросаны по статье.<br /><a name=\"habracut\"></a><br />Когда компания маленькая, а игроков еще меньше, то вопрос лучшего решается простым проведением турнира в пятницу вечером раз в пару месяцев. &lt;совет&gt;Шикарнейший повод выпить за счет компании.&lt;/совет&gt;(Мы по неопытности это не сразу поняли. И сначала просто так играли.) Но компания растет, лига тоже увеличивается, и вот уже отыграть турнир, даже с учетом предварительного разбиения на группы, становится очень сложно. Это просто физически тяжело на большом футбольном столе провести 15 партий за вечер.<br /><br />На данном этапе опытные <s>игроки в онлайн игры</s> шахматисты подсказывают, что существует метод расчета относительной силы игроков ELO, которая как раз используется для оценки уровня шахматистов.<br /><br /><center><iframe src=\"//www.youtube.com/embed/88HwWY0sSvU\" width=\"607\" height=\"360\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></center>', 0, '2015-08-01 19:30:21', '2016-09-02 08:15:21', '2016-10-12 03:50:13'),
(8, 'О нас', '/about', 'о нас потом будут шептаться, мол, это фарс,<br />таких не бывает, чтоб сразу и до могилы.<br />таких не бывает? вы слышите? нету вас!<br />и, нет, не бывает чувства такой вот силы,<br /><br />чтоб через года, через толпы других людей.<br />сквозь весь сонм проблем и, может быть, даже горя,<br />вы правда согласна всю жизнь, да к одной спине<br />своей прижиматься? вот это стальная воля!<br /><br />и ведь не поймут они глупые ничего,<br />что нет здесь особой воли, пути, ответа,<br />что все очень просто: он - мой, ну а я - его.<br />на этом и держится жизнь, <br />да и вся планета.', 1, '2016-10-11 18:36:06', '2016-10-11 18:37:06', '2016-10-11 18:37:06');

-- --------------------------------------------------------

--
-- Структура таблицы `site_session`
--

CREATE TABLE `site_session` (
  `session_id` varchar(24) NOT NULL,
  `last_active` int(10) UNSIGNED NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_session`
--

INSERT INTO `site_session` (`session_id`, `last_active`, `contents`) VALUES
('58b1176a24bb43-70762603', 1488001081, '2voBz6r2ZCkjNY6Teamr2ofV2TIx5yYyVMvwAks5qHdckuiBcA7aMXyaxtTdzlJHXDJEuih7FUoxFhY0ADfaiNdiibUprjqMpl0='),
('58bfe223858648-67396663', 1488970295, 'zZ2TgzHouJ5Wyi6Mpc8h53ljIPajvIVmbKQ1Sni24F94rjI6/+1DxBHfb6mgmrN7lXgbq/irMjCnNVAxjFojJnveJEEyuZAjhrU='),
('58c5944d8737a2-04386181', 1489343624, 'Ng0zWYazDdhIrHzsXVnhwPxByQR3M8Mak1CPI8iaVjhuDKJddzxMl3UB2KCb4KR+W66ztwto5Qbu+SvB7f1RfH90x8Sm0JLkhyY+ZGCuQHIFkZKfHi0Q6JqNAkIIX26OpguG93F3+M7cNab6v8R44w=='),
('58c595a98a2e44-67565505', 1489346197, 'fqro4WdDr+VMdhaorJ/1p9G6pH2EdSiiXWBND092+Nqx+roHP5HJfaFwx8p8PhTMqgIFJQ2ezSxZEVl0livfavbK/DDpcO78vPI='),
('58ca74191a2cf8-09914326', 1489667940, 'Ne0v+X60hQCDc/AfnQfR0ItpvmRvjwdh0KgWcGlHXJOfpoxYZW350QGKBroZCqFnVPHo2YI/8tNLg+uTrVhSZvITtykply32LSM='),
('58df8037d910b1-43842952', 1491042359, '1+DbYrfN1kRxv60V1yUUDqVGvcjslbpONP4MMUF7BncT9lQwCrMPofrH4wH7Ue3FXvk2NPWtkaavy0fXr6C4dSYLnhMZBsUXGGA='),
('58e05f99d1afe8-99245532', 1491099568, 'zEZ4OwhbhVgb738I1Noxa3m50feJwUBfao+ORFzA0PeqHp9uKa9VAKrqpBkw5H1Xj3cj/CbsdIl0SLDKslWPc2VgoXSZS2ecGso='),
('58e4b2b41a3300-56944661', 1491382964, 'IbRucpZ652CjFaZN+dZpqrvmBHRPixp2X07JY5zN6Z2D8aoY78xxeugy/gXoRb00i42zsXOxiWY0tVszg+zem/HYr6OHOEWMphI='),
('58f6534268d856-37115177', 1492538180, 'YX/MaDGNQDdDErNF/G0EasTY2+Nb2BvJ7IKknXTgvwrp9/XVeHMQm819dN4aRSM0clEcaTEKqnWRb36i6o8T8Mh6Vjbaf9jsvFee3g1MWTu8ludves2OUDHWt5JOtDEqvdA1MALhARqtAluV'),
('58f9b43d4439f6-05640771', 1492759613, 'bFXRVERuBiK6HAlrdHY8/SYa28ZIg7Oa3ID96lRBgxuNQX/znM7SKYOMG+HBAK05DKATzPl5lO1KUKRmdqRr7DDwlsKjJgI6MBk='),
('59162baf392820-63104903', 1494625201, 'OzrmwXeTX6oRAoSFA7G410Zxz/ysAVjgwEJ0IVFye4sKdxwL6RQJ1s7u+CJm7guIJNUEvTNy4A/GH8Jk34lfwDzqWxj6lONcU/k='),
('591779699961e4-87519175', 1494710634, 'HuOZ1vvtZJhaR+BSaYQyYu71yNctUPnYjFSkrvf4mRSn+tje5/o58kOU5Yow54g1s5ANzzm4v89okCYxqRtwiGk6eoLguWHp+m8='),
('5a221008e49a65-16750740', 1512181839, '91hqBUSN5b8NZqE9Y/M/L9UkIJPlUNOxMcOQDxXNjkcOT1NIM3U3IUT0dbnBm+TLqhf5dBkDpQrimZD74CzJDlV+JraG19mljWAqO67sKdUtsfLMytN0/PF85DMACBAve4HIpKOFkB3qrH1j'),
('5a23664bc20ae4-44328638', 1512269414, 'Q+MtpKJr3KTC+YSq8ODoLv1hO3fi8XOgq6FBVQ1lVvpcRsnc/nLzOvW8mkHvjIr9Mb8MopfZlDtwYFpLHFKHebRckzMznZFo5yM='),
('5a2863794baf36-71137455', 1512596462, 'Zbm80MeTEaODDJ9Yy8TSGQSoRGa1Qqe3vNTjBRMPpy24doYd9wKtM9vxLo2dStu/H6mzQlpTDzmlbxkdTLmOxkfka2gCpBAWWhU='),
('5a3703a4441aa0-08065674', 1513554877, '2Af/WnHEYDCvOD0yUQxPdonNerf6Yp/m9MZMjAJITOifTmt3y/VqfJz2p/oD605PoB0ypxCnlI8EurOtufQkBEHweqQCEppAFYQ='),
('5b848592969498-53585467', 1535412010, 'CZxCP3CI4LGQDAWlDovvfRGK82c6op0F4JLB1o+FEBti3XZX9VpwpgKK5hg8HrNzESI0uFWxJazzoX6t3xyrd8pPaY4oPkmvEnc='),
('5d7c560d3d3db2-84552957', 1568430241, 'NWeaBT6J6SS+ye1Blg2MzbLFcmPI4gsjI6tR7u6gq5Y4HTFAesEQkRZ5HC15//0vaIR1x3h1HpL0daTOrO0qp+2gTl2S/P2Viqg=');

-- --------------------------------------------------------

--
-- Структура таблицы `site_user`
--

CREATE TABLE `site_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_salt` varchar(10) NOT NULL,
  `is_disabled` tinyint(4) NOT NULL DEFAULT '0',
  `nickname` varchar(35) DEFAULT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_ip` varchar(15) DEFAULT NULL,
  `last_ip_forward` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_user`
--

INSERT INTO `site_user` (`id`, `login`, `password`, `password_salt`, `is_disabled`, `nickname`, `firstname`, `lastname`, `birthday`, `last_login`, `last_ip`, `last_ip_forward`, `created_at`, `updated_at`) VALUES
(1, 'geroys', 'f7d2924a3d5e09da5fa5f9d3a0eeaeab', 'f8c78e0d3a', 0, 'AZoom', 'Alexander', 'Zoom', '1982-06-12', '2016-10-10 04:13:34', '127.0.0.1', '89.110.0.187', '2016-09-06 00:11:56', '2016-10-10 04:13:34'),
(4, 'anonymous', 'edd5fca4860e96b5194ae43a7154280a', 'cecde9d080', 0, 'anonymous', '', '', '0000-00-00', NULL, NULL, NULL, '2016-09-06 07:34:32', NULL),
(14, 'geroyster@gmail.com', '8d933db4d92a2fe1893fa12bc3bbc6b9', 'a800819363', 0, 'AZoom', 'das', 'asd', '2016-11-04', '2017-12-18 02:28:29', '127.0.0.1', '127.0.0.1', '2016-09-18 22:30:52', '2017-12-18 02:28:29');

-- --------------------------------------------------------

--
-- Структура таблицы `site_user_token`
--

CREATE TABLE `site_user_token` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `site_user_verify`
--

CREATE TABLE `site_user_verify` (
  `id` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `name`, `date`) VALUES
(2, 'Petya', '2014-06-18 23:42:08'),
(3, 'Vasya', '2014-06-18 23:42:30'),
(4, 'Petya', '2014-06-18 23:42:30'),
(5, 'Vasya', '2014-06-18 23:42:43'),
(6, 'Petya', '2014-06-18 23:42:43');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_audit`
--
ALTER TABLE `admin_audit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_audit_idx1` (`created_at`),
  ADD KEY `admin_audit_idx2` (`type`,`user`);

--
-- Индексы таблицы `admin_cron`
--
ALTER TABLE `admin_cron`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `site_cron_idx1` (`minute`,`hour`,`mday`,`month`,`wday`,`command`) USING BTREE;

--
-- Индексы таблицы `admin_group`
--
ALTER TABLE `admin_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Индексы таблицы `admin_group_access`
--
ALTER TABLE `admin_group_access`
  ADD UNIQUE KEY `admin_group_access_idx1` (`group_id`,`package`,`structure`,`instance`);

--
-- Индексы таблицы `admin_group_user`
--
ALTER TABLE `admin_group_user`
  ADD UNIQUE KEY `admin_group_id` (`admin_group_id`,`admin_user_id`);

--
-- Индексы таблицы `admin_notification`
--
ALTER TABLE `admin_notification`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `admin_notification_idx1` (`created_at`) USING BTREE,
  ADD KEY `admin_notification_idx3` (`gid`),
  ADD KEY `admin_notification_idx2` (`uid`,`gid`) USING BTREE;

--
-- Индексы таблицы `admin_notification_visit`
--
ALTER TABLE `admin_notification_visit`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `admin_notification_visit_idx1` (`nid`,`uid`) USING BTREE,
  ADD KEY `admin_notification_visit_idx2` (`visit`) USING BTREE;

--
-- Индексы таблицы `admin_session`
--
ALTER TABLE `admin_session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_active` (`last_active`);

--
-- Индексы таблицы `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`login`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `admin_user_token`
--
ALTER TABLE `admin_user_token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_token` (`token`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Индексы таблицы `media_storage_category`
--
ALTER TABLE `media_storage_category`
  ADD PRIMARY KEY (`code`) USING BTREE;

--
-- Индексы таблицы `media_storage_data`
--
ALTER TABLE `media_storage_data`
  ADD UNIQUE KEY `code` (`code`);

--
-- Индексы таблицы `media_storage_file`
--
ALTER TABLE `media_storage_file`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `media_storage_file_idx1` (`category_code`,`path`,`name`),
  ADD UNIQUE KEY `media_storage_file_idx2` (`path_data`,`file_name`),
  ADD KEY `media_storage_file_idx3` (`created_at`,`status`);

--
-- Индексы таблицы `media_storage_file_extra`
--
ALTER TABLE `media_storage_file_extra`
  ADD PRIMARY KEY (`file_id`) USING BTREE,
  ADD KEY `created_at` (`created_at`) USING BTREE;

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject` (`subject`);

--
-- Индексы таблицы `old_media_storage_categories`
--
ALTER TABLE `old_media_storage_categories`
  ADD PRIMARY KEY (`code`);

--
-- Индексы таблицы `old_media_storage_files`
--
ALTER TABLE `old_media_storage_files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqbyfilename` (`location_code`,`location_path`,`file_name`),
  ADD UNIQUE KEY `category_code` (`category_code`,`vfolder_id`,`name`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `updated_at` (`updated_at`),
  ADD KEY `media_storage_files_idx1` (`category_code`,`location_path`);

--
-- Индексы таблицы `old_media_storage_file_extras`
--
ALTER TABLE `old_media_storage_file_extras`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `created_at` (`created_at`);

--
-- Индексы таблицы `old_media_storage_reserved_size`
--
ALTER TABLE `old_media_storage_reserved_size`
  ADD PRIMARY KEY (`location_code`);

--
-- Индексы таблицы `old_media_storage_vfolders`
--
ALTER TABLE `old_media_storage_vfolders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_code` (`category_code`,`name`,`parent_id`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `updated_at` (`updated_at`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
  ADD UNIQUE KEY `setting_idx1` (`code`);

--
-- Индексы таблицы `site_cron`
--
ALTER TABLE `site_cron`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_cron_idx1` (`minute`,`hour`,`mday`,`month`,`wday`,`command`);

--
-- Индексы таблицы `site_email_template`
--
ALTER TABLE `site_email_template`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `site_email_template_idx1` (`name`);

--
-- Индексы таблицы `site_group`
--
ALTER TABLE `site_group`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `code` (`code`) USING BTREE;

--
-- Индексы таблицы `site_group_access`
--
ALTER TABLE `site_group_access`
  ADD UNIQUE KEY `admin_group_access_idx1` (`group_id`,`package`,`structure`,`instance`) USING BTREE;

--
-- Индексы таблицы `site_group_user`
--
ALTER TABLE `site_group_user`
  ADD UNIQUE KEY `admin_group_id` (`site_group_id`,`site_user_id`) USING BTREE;

--
-- Индексы таблицы `site_menu`
--
ALTER TABLE `site_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_menu_idx1` (`name`,`url`,`parent`),
  ADD KEY `site_menu_idx2` (`parent`);

--
-- Индексы таблицы `site_page`
--
ALTER TABLE `site_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_page_idx2` (`slug`),
  ADD KEY `site_page_idx1` (`published_at`);

--
-- Индексы таблицы `site_session`
--
ALTER TABLE `site_session`
  ADD PRIMARY KEY (`session_id`) USING BTREE,
  ADD KEY `last_active` (`last_active`) USING BTREE;

--
-- Индексы таблицы `site_user`
--
ALTER TABLE `site_user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`login`) USING BTREE,
  ADD UNIQUE KEY `login` (`login`) USING BTREE;

--
-- Индексы таблицы `site_user_token`
--
ALTER TABLE `site_user_token`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uniq_token` (`token`) USING BTREE,
  ADD KEY `fk_user_id` (`user_id`) USING BTREE;

--
-- Индексы таблицы `site_user_verify`
--
ALTER TABLE `site_user_verify`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_user_registration_idx1` (`uid`,`type`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_cron`
--
ALTER TABLE `admin_cron`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `admin_group`
--
ALTER TABLE `admin_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `admin_user_token`
--
ALTER TABLE `admin_user_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `site_cron`
--
ALTER TABLE `site_cron`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `site_email_template`
--
ALTER TABLE `site_email_template`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `site_group`
--
ALTER TABLE `site_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `site_menu`
--
ALTER TABLE `site_menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `site_page`
--
ALTER TABLE `site_page`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `site_user`
--
ALTER TABLE `site_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `site_user_token`
--
ALTER TABLE `site_user_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `site_user_verify`
--
ALTER TABLE `site_user_verify`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
