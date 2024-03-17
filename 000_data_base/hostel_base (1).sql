-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2024 a las 23:55:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hostel_base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bed_kind`
--

CREATE TABLE `bed_kind` (
  `id_bed_kind` int(3) NOT NULL,
  `name_bed_kind` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bed_kind`
--

INSERT INTO `bed_kind` (`id_bed_kind`, `name_bed_kind`) VALUES
(1, 'Single'),
(2, 'Double'),
(3, 'None');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bed_number`
--

CREATE TABLE `bed_number` (
  `id_bed_number` int(6) NOT NULL,
  `name_bed_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bed_number`
--

INSERT INTO `bed_number` (`id_bed_number`, `name_bed_number`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, 'None'),
(11, 'aaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bed_status`
--

CREATE TABLE `bed_status` (
  `id_bed_status` int(11) NOT NULL,
  `name_bed_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bed_status`
--

INSERT INTO `bed_status` (`id_bed_status`, `name_bed_status`) VALUES
(1, 'Available'),
(2, 'Dirty'),
(3, 'Reserved'),
(4, 'Occupied'),
(5, 'Cleaning');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `behaviors`
--

CREATE TABLE `behaviors` (
  `id_behaviors` int(11) NOT NULL,
  `name_behaviors` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `behaviors`
--

INSERT INTO `behaviors` (`id_behaviors`, `name_behaviors`) VALUES
(1, 'Normal'),
(2, 'Challenging'),
(3, 'Addicted'),
(4, 'Unhygienic'),
(5, 'Problematic'),
(6, 'Swindler'),
(7, 'Thief'),
(8, 'Excellent'),
(9, 'Gentile'),
(10, 'Collaborator'),
(11, 'Very Good'),
(12, 'Good'),
(13, 'Awesome'),
(14, 'Gratifying'),
(16, 'Disorderly');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `name_country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id_country`, `name_country`) VALUES
(1, 'USA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currency`
--

CREATE TABLE `currency` (
  `id_currency` int(11) NOT NULL,
  `name_currency` varchar(20) NOT NULL,
  `symbol_currency` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `currency`
--

INSERT INTO `currency` (`id_currency`, `name_currency`, `symbol_currency`) VALUES
(1, 'Dollar', 'US$'),
(2, 'Peso Mexicano', 'MXN$'),
(3, 'Euro', '€');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

CREATE TABLE `discounts` (
  `id_discounts` int(3) NOT NULL,
  `name_discounts` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `discounts`
--

INSERT INTO `discounts` (`id_discounts`, `name_discounts`) VALUES
(1, '0'),
(2, '5'),
(3, '10'),
(4, '15'),
(5, '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exchange_rates`
--

CREATE TABLE `exchange_rates` (
  `id_exchange_rates` int(64) NOT NULL,
  `id_hostel` int(11) NOT NULL,
  `id_hostel_currency` int(11) NOT NULL,
  `id_currency_A` int(11) NOT NULL,
  `currency_A_value` decimal(20,2) NOT NULL,
  `id_currency_B` int(11) NOT NULL,
  `currency_B_value` decimal(20,2) NOT NULL,
  `id_currency_C` int(11) DEFAULT NULL,
  `currency_C_value` decimal(20,2) DEFAULT NULL,
  `id_currency_D` int(11) DEFAULT NULL,
  `currency_D_value` decimal(20,2) DEFAULT NULL,
  `id_currency_E` int(11) DEFAULT NULL,
  `currency_E_value` decimal(20,2) DEFAULT NULL,
  `all_set_this_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `exchange_rates`
--

INSERT INTO `exchange_rates` (`id_exchange_rates`, `id_hostel`, `id_hostel_currency`, `id_currency_A`, `currency_A_value`, `id_currency_B`, `currency_B_value`, `id_currency_C`, `currency_C_value`, `id_currency_D`, `currency_D_value`, `id_currency_E`, `currency_E_value`, `all_set_this_time`) VALUES
(16, 7, 1, 1, 7.00, 3, 12.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 21:22:57'),
(17, 7, 1, 1, 0.00, 3, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 16:39:20'),
(18, 7, 1, 1, 0.00, 3, 7.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 19:35:56'),
(19, 7, 1, 1, 0.00, 3, 10.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 19:36:11'),
(20, 7, 1, 1, 0.00, 3, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 19:39:03'),
(21, 7, 1, 1, 0.00, 3, 10.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 19:39:52'),
(22, 7, 1, 1, 0.00, 3, 20.50, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 19:40:34'),
(23, 7, 1, 1, 55.70, 3, 60.20, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 19:41:47'),
(24, 9, 2, 1, 45.00, 3, 55.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-13 11:37:53'),
(25, 7, 2, 1, 15.00, 3, 16.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-14 13:08:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `floors`
--

CREATE TABLE `floors` (
  `id_floors` int(3) NOT NULL,
  `name_floors` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `floors`
--

INSERT INTO `floors` (`id_floors`, `name_floors`) VALUES
(1, 'Ground Floor'),
(2, 'First Floor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hostel_area`
--

CREATE TABLE `hostel_area` (
  `id_hostel_area` int(11) NOT NULL,
  `name_hostel_area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hostel_area`
--

INSERT INTO `hostel_area` (`id_hostel_area`, `name_hostel_area`) VALUES
(1, 'Unique');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidents_beds`
--

CREATE TABLE `incidents_beds` (
  `id_incidents_beds` int(22) NOT NULL,
  `name_incidents_beds` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incidents_beds`
--

INSERT INTO `incidents_beds` (`id_incidents_beds`, `name_incidents_beds`) VALUES
(1, 'No incidents'),
(2, 'Messy'),
(3, 'Other'),
(4, 'The Lights Do Not Work'),
(5, 'Requires Complete Cleaning'),
(6, 'Electrical Outlets Do Not Work'),
(7, 'USB Charger Not Working'),
(8, 'Change Sheets Urgently'),
(9, 'Very Disorganized');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidents_rooms`
--

CREATE TABLE `incidents_rooms` (
  `id_incidents_rooms` int(22) NOT NULL,
  `name_incidents_rooms` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incidents_rooms`
--

INSERT INTO `incidents_rooms` (`id_incidents_rooms`, `name_incidents_rooms`) VALUES
(1, 'No incidents'),
(2, 'Messy'),
(3, 'Air Conditioning Does Not Work'),
(4, 'Other'),
(5, 'The Lights Do Not Work'),
(6, 'The Pot Does Not Work'),
(7, 'The Shower Does Not Work'),
(8, 'Requires Complete Cleaning'),
(9, 'Very Disorganized');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incident_b_status`
--

CREATE TABLE `incident_b_status` (
  `id_incident_b_status` int(11) NOT NULL,
  `name_incident_b_status` varchar(20) NOT NULL,
  `color_back` varchar(20) NOT NULL DEFAULT '#25e557',
  `color_text` varchar(20) NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incident_b_status`
--

INSERT INTO `incident_b_status` (`id_incident_b_status`, `name_incident_b_status`, `color_back`, `color_text`) VALUES
(1, 'Pending', '#1cce00', '#000000'),
(2, 'Solved', '#1cce00', '#000000'),
(3, 'Researching', '#1cce00', '#000000'),
(4, 'Repairing', '#1cce00', '#000000'),
(5, 'Resolved', '#1cce00', '#000000'),
(6, 'Observing', '#1cce28', '#000000'),
(7, 'Unsolved', '#1cce00', '#000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incident_r_status`
--

CREATE TABLE `incident_r_status` (
  `id_incident_r_status` int(11) NOT NULL,
  `name_incident_r_status` varchar(20) NOT NULL,
  `color_back` varchar(20) NOT NULL DEFAULT '#25e557',
  `color_text` varchar(20) NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incident_r_status`
--

INSERT INTO `incident_r_status` (`id_incident_r_status`, `name_incident_r_status`, `color_back`, `color_text`) VALUES
(1, 'Pending', '#1cce00', '#000000'),
(2, 'Solved', '#1cce00', '#000000'),
(3, 'Researching', '#1cce00', '#000000'),
(4, 'Repairing', '#1cce00', '#000000'),
(5, 'Resolved', '#1cce00', '#000000'),
(6, 'Observing', '#1cce00', '#000000'),
(7, 'Unsolved', '#1cce00', '#000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nationality`
--

CREATE TABLE `nationality` (
  `id_nationality` int(11) NOT NULL,
  `name_nationality` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nationality`
--

INSERT INTO `nationality` (`id_nationality`, `name_nationality`) VALUES
(1, 'American'),
(7, '.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `name_producto` varchar(20) NOT NULL,
  `en_check_in` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `name_producto`, `en_check_in`) VALUES
(2, 'French Fries', 2),
(3, 'Bath Soap', 3),
(4, 'Bicycle', 2),
(5, 'Breakfast', 3),
(6, 'Towel', 3),
(7, 'Laundry', 2),
(8, 'Café ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_kind`
--

CREATE TABLE `product_kind` (
  `id_product_kind` int(11) NOT NULL,
  `name_product_kind` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `product_kind`
--

INSERT INTO `product_kind` (`id_product_kind`, `name_product_kind`) VALUES
(1, 'Edible'),
(2, 'Personal Cleanlines'),
(3, 'Recreation');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quien_y_cuando_host`
--

CREATE TABLE `quien_y_cuando_host` (
  `id_q_y_c_host` int(48) NOT NULL,
  `id_quien_open_o_close` int(11) NOT NULL,
  `id_host_open_o_close` int(24) NOT NULL,
  `fecha_open_o_close` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text_open_o_close` varchar(110) NOT NULL,
  `historial_status_host` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quien_y_cuando_per`
--

CREATE TABLE `quien_y_cuando_per` (
  `id_q_y_c_per` int(48) NOT NULL,
  `id_quien_act_o_desact` int(11) NOT NULL,
  `id_per_act_o_desact` int(24) NOT NULL,
  `fecha_act_o_desact` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text_act_o_desact` varchar(110) NOT NULL,
  `historial_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quien_y_cuando_room`
--

CREATE TABLE `quien_y_cuando_room` (
  `id_q_y_c_room` int(48) NOT NULL,
  `id_quien_permite_o_no` int(11) NOT NULL,
  `id_room_activ_or_deac` int(24) NOT NULL,
  `fecha_perm_o_no` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text_perm_o_no` varchar(110) NOT NULL,
  `historico_de_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `quien_y_cuando_room`
--

INSERT INTO `quien_y_cuando_room` (`id_q_y_c_room`, `id_quien_permite_o_no`, `id_room_activ_or_deac`, `fecha_perm_o_no`, `text_perm_o_no`, `historico_de_status`) VALUES
(1, 7, 45, '2024-03-14 13:23:56', 'Se incendio', 0),
(2, 7, 45, '2024-03-14 13:24:37', 'Fue reparada', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_incidencias_b`
--

CREATE TABLE `reporte_incidencias_b` (
  `id_reporte_incidencias_b` int(250) NOT NULL,
  `id_quien_reporto_b` int(24) NOT NULL,
  `id_de_la_bed_b` int(250) NOT NULL,
  `fecha_incidencia_b` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_de_incidencia_b` int(250) NOT NULL,
  `id_incidencia_b_status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_incidencias_r`
--

CREATE TABLE `reporte_incidencias_r` (
  `id_reporte_incidencias_r` int(120) NOT NULL,
  `id_quien_reporto_r` int(24) NOT NULL,
  `id_de_la_room_r` int(24) NOT NULL,
  `fecha_incidencia_r` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_de_incidencia_r` int(110) NOT NULL,
  `id_incidencia_r_status` int(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol_per` int(11) NOT NULL,
  `name_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol_per`, `name_rol`) VALUES
(1, 'Super Admin'),
(2, 'Volunteer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_kind`
--

CREATE TABLE `room_kind` (
  `id_room_kind` int(4) NOT NULL,
  `name_room_kind` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `room_kind`
--

INSERT INTO `room_kind` (`id_room_kind`, `name_room_kind`) VALUES
(1, 'Feminine'),
(3, 'Mixed'),
(4, 'Private');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_number`
--

CREATE TABLE `room_number` (
  `id_room_number` int(8) NOT NULL,
  `name_room_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `room_number`
--

INSERT INTO `room_number` (`id_room_number`, `name_room_number`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, 'Aventura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_status`
--

CREATE TABLE `room_status` (
  `id_room_status` int(11) NOT NULL,
  `name_room_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `room_status`
--

INSERT INTO `room_status` (`id_room_status`, `name_room_status`) VALUES
(1, 'Available'),
(2, 'Dirty'),
(3, 'Reserved'),
(4, 'Occupied'),
(5, 'Cleaning');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sex`
--

CREATE TABLE `sex` (
  `id_sex` int(2) NOT NULL,
  `name_sex` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sex`
--

INSERT INTO `sex` (`id_sex`, `name_sex`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, '.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taxes`
--

CREATE TABLE `taxes` (
  `id_taxes` int(3) NOT NULL,
  `name_taxes` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `taxes`
--

INSERT INTO `taxes` (`id_taxes`, `name_taxes`) VALUES
(1, '0'),
(2, '9'),
(3, '10'),
(4, '11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_address`
--

CREATE TABLE `tb_address` (
  `id_address` int(64) NOT NULL,
  `city_address` varchar(20) NOT NULL,
  `id_country` int(11) NOT NULL,
  `post_code_address` int(11) DEFAULT NULL,
  `name_address` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_address`
--

INSERT INTO `tb_address` (`id_address`, `city_address`, `id_country`, `post_code_address`, `name_address`) VALUES
(13, 'MIAMI', 1, 5, 'uuuu'),
(14, '.', 1, 0, ''),
(15, 'Caracas', 1, 1010, 'Delicias a San Francisquito Pasaje San Carlos'),
(16, 'Caracas', 1, 1010, 'Delicias a San Francisquito Pasaje San Carloszz'),
(17, 'Caracas', 1, 1010, 'Delicias a San Francisquito Pasaje San Carlos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_data_guests`
--

CREATE TABLE `tb_data_guests` (
  `id_data_guests` int(250) NOT NULL,
  `guests_doc_id_pic` varchar(60) NOT NULL,
  `id_nation_g` int(60) NOT NULL DEFAULT 7,
  `guests_email` varchar(60) DEFAULT NULL,
  `guests_phone` varchar(20) DEFAULT NULL,
  `guests_behaviors` int(60) NOT NULL DEFAULT 12,
  `guests_observ` varchar(200) DEFAULT NULL,
  `id_guests` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_data_guests`
--

INSERT INTO `tb_data_guests` (`id_data_guests`, `guests_doc_id_pic`, `id_nation_g`, `guests_email`, `guests_phone`, `guests_behaviors`, `guests_observ`, `id_guests`) VALUES
(1, 'guests/doc_id_g/31_65874.png', 7, NULL, NULL, 12, NULL, 31),
(2, 'guests/doc_id_g/32_38745.png', 7, NULL, NULL, 12, NULL, 32),
(3, 'guests/doc_id_g/33_2222.png', 7, NULL, NULL, 12, NULL, 33),
(4, 'guests/doc_id_g/34_887543.png', 7, NULL, NULL, 12, NULL, 34),
(5, 'guests/doc_id_g/36_6669996.png', 7, NULL, NULL, 12, NULL, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_data_personal`
--

CREATE TABLE `tb_data_personal` (
  `id_data_per` int(16) NOT NULL,
  `a_phone_per` varchar(40) DEFAULT NULL,
  `b_phone_per` varchar(40) DEFAULT NULL,
  `email_per` varchar(40) NOT NULL,
  `pic_per` varchar(60) DEFAULT NULL,
  `pic_doc_per` varchar(60) DEFAULT NULL,
  `pic_passport_per` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_data_personal`
--

INSERT INTO `tb_data_personal` (`id_data_per`, `a_phone_per`, `b_phone_per`, `email_per`, `pic_per`, `pic_doc_per`, `pic_passport_per`) VALUES
(7, '', '', 'jczhotbull@gmail.com', NULL, NULL, NULL),
(8, '04242772573', '', 'sinaicel@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_guests`
--

CREATE TABLE `tb_guests` (
  `id_guests` int(250) NOT NULL,
  `guests_doc_id` int(20) NOT NULL,
  `p_name_g` varchar(20) DEFAULT NULL,
  `s_name_g` varchar(20) DEFAULT NULL,
  `p_surname_g` varchar(20) DEFAULT NULL,
  `s_surname_g` varchar(20) DEFAULT NULL,
  `guests_pic` varchar(60) DEFAULT NULL,
  `guests_pass` varchar(60) NOT NULL,
  `guests_status` int(1) NOT NULL DEFAULT 1,
  `guests_register_by` int(64) NOT NULL,
  `guests_birth` date DEFAULT NULL,
  `guests_mod` int(1) NOT NULL DEFAULT 0,
  `guests_sex` int(12) NOT NULL DEFAULT 3,
  `guests_today` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_guests`
--

INSERT INTO `tb_guests` (`id_guests`, `guests_doc_id`, `p_name_g`, `s_name_g`, `p_surname_g`, `s_surname_g`, `guests_pic`, `guests_pass`, `guests_status`, `guests_register_by`, `guests_birth`, `guests_mod`, `guests_sex`, `guests_today`) VALUES
(28, 666688, NULL, NULL, '', NULL, NULL, '1d8970c3ab3d16233d3835d668f4df3a', 1, 7, NULL, 0, 3, '2024-03-14 11:09:13'),
(29, 77754, NULL, NULL, '', NULL, NULL, 'ba661fc8acbc9d29edc74c193e57506c', 1, 7, NULL, 0, 3, '2024-03-14 11:13:08'),
(30, 756999, NULL, NULL, '', NULL, NULL, '84a30b1f61e05882cac95176f0e70684', 1, 7, NULL, 0, 3, '2024-03-14 11:44:39'),
(31, 65874, NULL, NULL, '', NULL, NULL, 'c6347430511747c9770b4897c63d89dd', 1, 7, NULL, 0, 3, '2024-03-14 12:16:06'),
(32, 38745, NULL, NULL, '', NULL, NULL, '85776dc89df76987232aa35d28098948', 1, 7, NULL, 0, 3, '2024-03-14 12:28:20'),
(33, 2222, NULL, NULL, '', NULL, NULL, 'df472da98996001af3d7fc61d5f36ddf', 1, 7, NULL, 0, 3, '2024-03-14 12:37:24'),
(34, 887543, NULL, NULL, '', NULL, NULL, '9d0590e1de5562af2cb9b4f970614dcd', 1, 7, NULL, 0, 3, '2024-03-14 13:49:00'),
(35, 77533, NULL, NULL, '', NULL, NULL, '84ccaba432b9b3e790708ddbaf51fb36', 1, 7, NULL, 0, 3, '2024-03-14 13:53:05'),
(36, 6669996, NULL, NULL, '', NULL, NULL, 'a47ebbefb120448be28febb120ede31b', 1, 7, NULL, 0, 3, '2024-03-14 14:07:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_personal`
--

CREATE TABLE `tb_personal` (
  `id_per` int(11) NOT NULL,
  `doc_per` int(13) NOT NULL,
  `passport_per` varchar(30) DEFAULT NULL,
  `p_name_per` varchar(20) NOT NULL,
  `s_name_per` varchar(20) DEFAULT NULL,
  `p_surname_per` varchar(20) NOT NULL,
  `s_surname_per` varchar(20) DEFAULT NULL,
  `birth_per` date NOT NULL,
  `id_address` int(16) NOT NULL,
  `id_sex` int(2) NOT NULL,
  `id_nationality` int(11) NOT NULL,
  `password_per` varchar(60) NOT NULL,
  `id_rol_per` int(11) NOT NULL,
  `info_send_per` varchar(3) NOT NULL DEFAULT 'No',
  `id_hostel` int(11) NOT NULL,
  `id_data_per` int(16) NOT NULL,
  `per_was_mod` int(1) NOT NULL DEFAULT 0,
  `per_registered_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `pass_was_mod` int(1) NOT NULL DEFAULT 0,
  `creado_el` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_personal`
--

INSERT INTO `tb_personal` (`id_per`, `doc_per`, `passport_per`, `p_name_per`, `s_name_per`, `p_surname_per`, `s_surname_per`, `birth_per`, `id_address`, `id_sex`, `id_nationality`, `password_per`, `id_rol_per`, `info_send_per`, `id_hostel`, `id_data_per`, `per_was_mod`, `per_registered_by`, `status`, `pass_was_mod`, `creado_el`) VALUES
(7, 13137951, '', 'Juan', '', 'Zuñiga', '', '2024-03-11', 14, 1, 1, '6ce5acb0221e1f0d28b8199ab07adc6b', 1, 'No', 7, 7, 1, 7, 1, 1, '2024-03-11 21:08:08'),
(8, 17720914, '2222', 'Sinai', 'Guerrero', 'S', 'Zuñiga', '2024-03-13', 15, 1, 1, '707009723d518d5aff0e713bfa256ee6', 1, 'No', 9, 8, 1, 7, 1, 1, '2024-03-13 10:53:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_prices_beds`
--

CREATE TABLE `tb_prices_beds` (
  `id_prices_beds` int(64) NOT NULL,
  `id_hostel` int(48) NOT NULL,
  `id_room_kind` int(16) NOT NULL,
  `name_prices_beds` decimal(20,2) NOT NULL,
  `taxes_beds` int(32) NOT NULL DEFAULT 1,
  `discount_beds` int(32) NOT NULL DEFAULT 1,
  `set_prices_date_b` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prices_set_by_who_b` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_prices_beds`
--

INSERT INTO `tb_prices_beds` (`id_prices_beds`, `id_hostel`, `id_room_kind`, `name_prices_beds`, `taxes_beds`, `discount_beds`, `set_prices_date_b`, `prices_set_by_who_b`) VALUES
(1, 7, 1, 33.00, 1, 1, '2024-03-12 14:20:52', 7),
(2, 7, 1, 88.00, 1, 1, '2024-03-12 14:21:30', 7),
(3, 7, 1, 777.00, 1, 1, '2024-03-12 14:24:54', 7),
(6, 7, 1, 77.70, 1, 1, '2024-03-12 19:45:36', 7),
(7, 7, 3, 12.20, 1, 1, '2024-03-12 20:57:03', 7),
(8, 7, 1, 44.30, 2, 5, '2024-03-13 14:18:39', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_prices_rooms`
--

CREATE TABLE `tb_prices_rooms` (
  `id_prices_rooms` int(64) NOT NULL,
  `id_hostel` int(48) NOT NULL,
  `id_room_kind` int(16) NOT NULL,
  `name_prices_rooms` decimal(20,2) NOT NULL,
  `taxes_room` int(16) NOT NULL DEFAULT 1,
  `discount_room` int(32) NOT NULL DEFAULT 1,
  `set_prices_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prices_set_by_who` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_prices_rooms`
--

INSERT INTO `tb_prices_rooms` (`id_prices_rooms`, `id_hostel`, `id_room_kind`, `name_prices_rooms`, `taxes_room`, `discount_room`, `set_prices_date`, `prices_set_by_who`) VALUES
(4, 7, 1, 70.00, 1, 1, '2024-03-12 12:03:23', 7),
(5, 7, 1, 115.00, 1, 1, '2024-03-12 12:03:34', 7),
(6, 7, 1, 200.00, 1, 1, '2024-03-12 12:03:37', 7),
(7, 7, 4, 550.00, 1, 1, '2024-03-12 12:14:49', 7),
(8, 7, 1, 15.50, 1, 1, '2024-03-12 19:44:09', 7),
(9, 7, 1, 88.50, 4, 2, '2024-03-13 14:18:20', 7),
(10, 7, 4, 22.00, 1, 5, '2024-03-13 14:34:58', 7),
(12, 7, 1, 333.00, 1, 1, '2024-03-13 15:55:42', 7),
(13, 7, 1, 444.00, 1, 1, '2024-03-13 15:56:09', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_room`
--

CREATE TABLE `tb_room` (
  `id_room` int(6) NOT NULL,
  `id_hostel` int(32) NOT NULL,
  `id_room_kind` int(11) NOT NULL,
  `id_room_number` int(11) NOT NULL,
  `id_floors` int(11) NOT NULL,
  `id_hostel_area` int(11) NOT NULL,
  `creada_por` int(11) NOT NULL,
  `room_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `room_status` int(1) NOT NULL DEFAULT 1,
  `room_observ` varchar(111) DEFAULT NULL,
  `room_status_temp` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_room`
--

INSERT INTO `tb_room` (`id_room`, `id_hostel`, `id_room_kind`, `id_room_number`, `id_floors`, `id_hostel_area`, `creada_por`, `room_date`, `room_status`, `room_observ`, `room_status_temp`) VALUES
(34, 7, 4, 1, 2, 1, 7, '2024-03-12 14:43:42', 1, 'ttttriiiooo', 1),
(38, 7, 1, 13, 2, 1, 7, '2024-03-13 01:01:51', 1, 'rrruuuoo', 1),
(39, 7, 3, 1, 2, 1, 7, '2024-03-12 13:45:45', 1, '', 1),
(40, 7, 1, 5, 2, 1, 7, '2024-03-12 14:45:40', 1, 'ooo', 1),
(41, 9, 1, 1, 2, 1, 8, '2024-03-13 11:13:31', 1, 'eee', 1),
(42, 9, 1, 2, 1, 1, 8, '2024-03-13 11:13:45', 1, '', 1),
(43, 9, 4, 3, 2, 1, 8, '2024-03-13 11:14:00', 1, '', 1),
(44, 9, 3, 1, 1, 1, 8, '2024-03-13 11:14:46', 1, 'tttt', 1),
(45, 7, 4, 4, 2, 1, 7, '2024-03-14 13:24:37', 1, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rooms_beds`
--

CREATE TABLE `tb_rooms_beds` (
  `id_rooms_beds` int(64) NOT NULL,
  `id_hostel` int(64) NOT NULL,
  `id_room` int(14) NOT NULL,
  `id_room_kind` int(64) NOT NULL,
  `id_bed_kind` int(10) NOT NULL,
  `id_bed_number` int(10) NOT NULL,
  `note` varchar(70) DEFAULT NULL,
  `bed_status_temp` int(32) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_rooms_beds`
--

INSERT INTO `tb_rooms_beds` (`id_rooms_beds`, `id_hostel`, `id_room`, `id_room_kind`, `id_bed_kind`, `id_bed_number`, `note`, `bed_status_temp`) VALUES
(89, 7, 34, 4, 1, 1, 'yyyyyoo', 1),
(90, 7, 34, 4, 1, 2, '', 1),
(91, 7, 34, 4, 1, 3, 'ooo', 1),
(92, 7, 34, 4, 1, 4, 'jjjjjjjj', 1),
(103, 7, 38, 1, 1, 1, '', 1),
(104, 7, 38, 1, 1, 2, 'pppppppppp', 1),
(105, 7, 39, 3, 2, 2, '', 1),
(106, 7, 40, 1, 1, 11, '', 1),
(107, 7, 40, 1, 1, 6, '', 1),
(108, 7, 40, 1, 1, 7, '', 1),
(109, 9, 41, 1, 1, 1, '', 1),
(110, 9, 41, 1, 1, 2, 'rrrr', 1),
(111, 9, 41, 1, 1, 3, '', 1),
(112, 9, 42, 1, 2, 1, '', 1),
(113, 9, 42, 1, 2, 2, '', 1),
(114, 9, 43, 4, 1, 1, '', 1),
(115, 9, 43, 4, 1, 1, '', 1),
(116, 9, 44, 3, 1, 1, '', 1),
(117, 9, 44, 3, 1, 2, '', 1),
(118, 9, 44, 3, 1, 3, '', 1),
(119, 9, 44, 3, 1, 4, 'sin una pata', 1),
(120, 9, 44, 3, 1, 5, '', 1),
(121, 9, 44, 3, 1, 6, '', 1),
(122, 7, 45, 4, 1, 2, '', 1),
(123, 7, 45, 4, 1, 2, 'Quemaron la sabana', 1),
(124, 7, 45, 4, 1, 4, 'Falta una pata ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_services`
--

CREATE TABLE `tb_services` (
  `id_services` int(32) NOT NULL,
  `id_hostal` int(32) NOT NULL,
  `id_product_kind` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `creado_por_el` int(11) NOT NULL,
  `service_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `service_status` int(1) NOT NULL DEFAULT 1,
  `service_charac` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_services`
--

INSERT INTO `tb_services` (`id_services`, `id_hostal`, `id_product_kind`, `id_producto`, `creado_por_el`, `service_date`, `service_status`, `service_charac`) VALUES
(1, 7, 1, 2, 7, '2024-03-13 02:03:09', 1, 'aaa'),
(2, 7, 3, 4, 7, '2024-03-12 22:56:20', 1, ''),
(4, 7, 2, 7, 7, '2024-03-12 22:56:41', 1, ''),
(5, 7, 2, 6, 7, '2024-03-12 22:56:52', 1, ''),
(6, 7, 1, 5, 7, '2024-03-14 13:36:33', 0, ''),
(7, 9, 3, 4, 8, '2024-03-13 11:26:26', 1, 'nueva'),
(8, 9, 2, 3, 8, '2024-03-13 11:26:34', 1, ''),
(9, 9, 2, 7, 8, '2024-03-13 11:26:40', 1, ''),
(10, 9, 2, 6, 8, '2024-03-13 11:26:44', 1, ''),
(11, 7, 1, 8, 7, '2024-03-14 13:39:04', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_services_prices`
--

CREATE TABLE `tb_services_prices` (
  `id_services_prices` int(128) NOT NULL,
  `id_hostel` int(64) NOT NULL,
  `id_product_kind` int(64) NOT NULL,
  `id_product` int(32) NOT NULL,
  `the_price` decimal(18,2) NOT NULL,
  `tax_services` int(16) NOT NULL DEFAULT 1,
  `discount_type` int(64) NOT NULL DEFAULT 1,
  `set_this_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `set_by_this_per` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_services_prices`
--

INSERT INTO `tb_services_prices` (`id_services_prices`, `id_hostel`, `id_product_kind`, `id_product`, `the_price`, `tax_services`, `discount_type`, `set_this_day`, `set_by_this_per`) VALUES
(2, 7, 1, 5, 40.00, 1, 3, '2024-03-13 18:17:26', 7),
(3, 7, 1, 2, 25.00, 4, 2, '2024-03-13 18:17:35', 7),
(4, 7, 1, 8, 20.00, 3, 1, '2024-03-14 13:43:36', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_data_hostel`
--

CREATE TABLE `z_data_hostel` (
  `id_data_hostel` int(16) NOT NULL,
  `a_phone_hostel` varchar(20) DEFAULT NULL,
  `b_phone_hostel` varchar(20) DEFAULT NULL,
  `c_phone_hostel` varchar(20) DEFAULT NULL,
  `a_web_hostel` varchar(40) DEFAULT NULL,
  `b_web_hostel` varchar(40) DEFAULT NULL,
  `reg_number_hostel` varchar(20) DEFAULT NULL,
  `ranking_hostel` varchar(9) DEFAULT NULL,
  `a_email_hostel` varchar(40) DEFAULT NULL,
  `b_email_hostel` varchar(40) DEFAULT NULL,
  `c_email_hostel` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `z_data_hostel`
--

INSERT INTO `z_data_hostel` (`id_data_hostel`, `a_phone_hostel`, `b_phone_hostel`, `c_phone_hostel`, `a_web_hostel`, `b_web_hostel`, `reg_number_hostel`, `ranking_hostel`, `a_email_hostel`, `b_email_hostel`, `c_email_hostel`) VALUES
(7, '', '', '', '', '', '', '1', '', '', ''),
(8, '04242772573', '04242772573', '3333', 'Delicias a San Francisquito Pasaje San ', 'Casa Numero 5, Parroquia San Juan', '5555', '2226', 'sinaicel@gmail.com', 'sinaicel@gmail.com', 'sinaicel@gmail.com'),
(9, '04242772573', '04242772573', '3333', 'Delicias a San Francisquito Pasaje San ', 'Casa Numero 5, Parroquia San Juan', '5555', 'aaa', 'sinaicel@gmail.com', 'sinaicel@gmail.com', 'sinaicel@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_hostel`
--

CREATE TABLE `z_hostel` (
  `id_hostel` int(11) NOT NULL,
  `name_hostel` varchar(50) NOT NULL,
  `nick_name_hostel` varchar(11) DEFAULT NULL,
  `code_hostel` varchar(20) NOT NULL,
  `id_address` int(16) NOT NULL,
  `id_data_hostel` int(11) DEFAULT NULL,
  `logo_hostel` varchar(60) DEFAULT NULL,
  `hostel_was_mod` int(1) NOT NULL DEFAULT 0,
  `hostel_registered_by` int(16) DEFAULT NULL,
  `status_hostel` int(1) NOT NULL DEFAULT 1,
  `abierto_el` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_currency` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `z_hostel`
--

INSERT INTO `z_hostel` (`id_hostel`, `name_hostel`, `nick_name_hostel`, `code_hostel`, `id_address`, `id_data_hostel`, `logo_hostel`, `hostel_was_mod`, `hostel_registered_by`, `status_hostel`, `abierto_el`, `id_currency`) VALUES
(7, 'Nuevo hostel', '', '5894', 13, 7, NULL, 1, 7, 1, '2024-03-14 13:06:53', 2),
(8, 'segundario', 'pp', '2222', 16, 8, NULL, 1, 7, 1, '2024-03-13 10:48:42', 1),
(9, 'tercero', 'pp', 'aaaaazzzz', 17, 9, NULL, 1, 8, 1, '2024-03-13 11:31:11', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bed_kind`
--
ALTER TABLE `bed_kind`
  ADD PRIMARY KEY (`id_bed_kind`);

--
-- Indices de la tabla `bed_number`
--
ALTER TABLE `bed_number`
  ADD PRIMARY KEY (`id_bed_number`);

--
-- Indices de la tabla `bed_status`
--
ALTER TABLE `bed_status`
  ADD PRIMARY KEY (`id_bed_status`);

--
-- Indices de la tabla `behaviors`
--
ALTER TABLE `behaviors`
  ADD PRIMARY KEY (`id_behaviors`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Indices de la tabla `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id_currency`);

--
-- Indices de la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id_discounts`);

--
-- Indices de la tabla `exchange_rates`
--
ALTER TABLE `exchange_rates`
  ADD PRIMARY KEY (`id_exchange_rates`),
  ADD KEY `hostal_exchange` (`id_hostel`),
  ADD KEY `currency_Selected` (`id_hostel_currency`),
  ADD KEY `curremcy_aa` (`id_currency_A`),
  ADD KEY `curremcy_bb` (`id_currency_B`);

--
-- Indices de la tabla `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id_floors`);

--
-- Indices de la tabla `hostel_area`
--
ALTER TABLE `hostel_area`
  ADD PRIMARY KEY (`id_hostel_area`);

--
-- Indices de la tabla `incidents_beds`
--
ALTER TABLE `incidents_beds`
  ADD PRIMARY KEY (`id_incidents_beds`);

--
-- Indices de la tabla `incidents_rooms`
--
ALTER TABLE `incidents_rooms`
  ADD PRIMARY KEY (`id_incidents_rooms`);

--
-- Indices de la tabla `incident_b_status`
--
ALTER TABLE `incident_b_status`
  ADD PRIMARY KEY (`id_incident_b_status`);

--
-- Indices de la tabla `incident_r_status`
--
ALTER TABLE `incident_r_status`
  ADD PRIMARY KEY (`id_incident_r_status`);

--
-- Indices de la tabla `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id_nationality`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `product_kind`
--
ALTER TABLE `product_kind`
  ADD PRIMARY KEY (`id_product_kind`);

--
-- Indices de la tabla `quien_y_cuando_host`
--
ALTER TABLE `quien_y_cuando_host`
  ADD PRIMARY KEY (`id_q_y_c_host`),
  ADD KEY `host_open_or` (`id_host_open_o_close`);

--
-- Indices de la tabla `quien_y_cuando_per`
--
ALTER TABLE `quien_y_cuando_per`
  ADD PRIMARY KEY (`id_q_y_c_per`),
  ADD KEY `el_activado_o_desact` (`id_per_act_o_desact`);

--
-- Indices de la tabla `quien_y_cuando_room`
--
ALTER TABLE `quien_y_cuando_room`
  ADD PRIMARY KEY (`id_q_y_c_room`);

--
-- Indices de la tabla `reporte_incidencias_b`
--
ALTER TABLE `reporte_incidencias_b`
  ADD PRIMARY KEY (`id_reporte_incidencias_b`),
  ADD KEY `reportado_por_b` (`id_quien_reporto_b`),
  ADD KEY `La_cama_tal` (`id_de_la_bed_b`),
  ADD KEY `la_incidcencia_b` (`id_de_incidencia_b`),
  ADD KEY `status_incidencia_b` (`id_incidencia_b_status`);

--
-- Indices de la tabla `reporte_incidencias_r`
--
ALTER TABLE `reporte_incidencias_r`
  ADD PRIMARY KEY (`id_reporte_incidencias_r`),
  ADD KEY `reportado_por_r` (`id_quien_reporto_r`),
  ADD KEY `en_el_cuarto` (`id_de_la_room_r`),
  ADD KEY `la_incidcencia_r` (`id_de_incidencia_r`),
  ADD KEY `status_incidencia` (`id_incidencia_r_status`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol_per`);

--
-- Indices de la tabla `room_kind`
--
ALTER TABLE `room_kind`
  ADD PRIMARY KEY (`id_room_kind`);

--
-- Indices de la tabla `room_number`
--
ALTER TABLE `room_number`
  ADD PRIMARY KEY (`id_room_number`);

--
-- Indices de la tabla `room_status`
--
ALTER TABLE `room_status`
  ADD PRIMARY KEY (`id_room_status`);

--
-- Indices de la tabla `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id_sex`);

--
-- Indices de la tabla `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id_taxes`);

--
-- Indices de la tabla `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `country` (`id_country`);

--
-- Indices de la tabla `tb_data_guests`
--
ALTER TABLE `tb_data_guests`
  ADD PRIMARY KEY (`id_data_guests`),
  ADD KEY `g_nacionalidad` (`id_nation_g`),
  ADD KEY `g_ranking` (`guests_behaviors`);

--
-- Indices de la tabla `tb_data_personal`
--
ALTER TABLE `tb_data_personal`
  ADD PRIMARY KEY (`id_data_per`);

--
-- Indices de la tabla `tb_guests`
--
ALTER TABLE `tb_guests`
  ADD PRIMARY KEY (`id_guests`),
  ADD KEY `registrado_g_por` (`guests_register_by`);

--
-- Indices de la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  ADD PRIMARY KEY (`id_per`),
  ADD KEY `sex` (`id_sex`),
  ADD KEY `nacionality` (`id_nationality`),
  ADD KEY `hostel` (`id_hostel`),
  ADD KEY `address_per` (`id_address`),
  ADD KEY `data_per` (`id_data_per`),
  ADD KEY `roles` (`id_rol_per`);

--
-- Indices de la tabla `tb_prices_beds`
--
ALTER TABLE `tb_prices_beds`
  ADD PRIMARY KEY (`id_prices_beds`),
  ADD KEY `eltiporoom` (`id_room_kind`),
  ADD KEY `descuentos_bed` (`discount_beds`),
  ADD KEY `el_tax` (`taxes_beds`);

--
-- Indices de la tabla `tb_prices_rooms`
--
ALTER TABLE `tb_prices_rooms`
  ADD PRIMARY KEY (`id_prices_rooms`),
  ADD KEY `tipo_room` (`id_room_kind`),
  ADD KEY `descuento_r` (`discount_room`),
  ADD KEY `taxes_r` (`taxes_room`);

--
-- Indices de la tabla `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `room_kindd` (`id_room_kind`),
  ADD KEY `rrom_nummm` (`id_room_number`),
  ADD KEY `hostel_areasss` (`id_hostel_area`),
  ADD KEY `hostales_con_room` (`id_hostel`),
  ADD KEY `floorsss` (`id_floors`),
  ADD KEY `room_stado` (`room_status_temp`);

--
-- Indices de la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  ADD PRIMARY KEY (`id_rooms_beds`),
  ADD KEY `tipo_cama` (`id_bed_kind`),
  ADD KEY `num_cama` (`id_bed_number`),
  ADD KEY `el_id_room` (`id_room`),
  ADD KEY `estado_b` (`bed_status_temp`);

--
-- Indices de la tabla `tb_services`
--
ALTER TABLE `tb_services`
  ADD PRIMARY KEY (`id_services`),
  ADD KEY `tipodeproducto` (`id_product_kind`),
  ADD KEY `elproducto` (`id_producto`),
  ADD KEY `elhostel` (`id_hostal`);

--
-- Indices de la tabla `tb_services_prices`
--
ALTER TABLE `tb_services_prices`
  ADD PRIMARY KEY (`id_services_prices`),
  ADD KEY `el_hostel` (`id_hostel`),
  ADD KEY `tipo_pproducc` (`id_product_kind`),
  ADD KEY `el_produccc` (`id_product`),
  ADD KEY `descuento` (`discount_type`),
  ADD KEY `tax_Service` (`tax_services`);

--
-- Indices de la tabla `z_data_hostel`
--
ALTER TABLE `z_data_hostel`
  ADD PRIMARY KEY (`id_data_hostel`);

--
-- Indices de la tabla `z_hostel`
--
ALTER TABLE `z_hostel`
  ADD PRIMARY KEY (`id_hostel`),
  ADD KEY `address` (`id_address`),
  ADD KEY `data` (`id_data_hostel`),
  ADD KEY `money` (`id_currency`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bed_kind`
--
ALTER TABLE `bed_kind`
  MODIFY `id_bed_kind` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bed_number`
--
ALTER TABLE `bed_number`
  MODIFY `id_bed_number` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bed_status`
--
ALTER TABLE `bed_status`
  MODIFY `id_bed_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `behaviors`
--
ALTER TABLE `behaviors`
  MODIFY `id_behaviors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `currency`
--
ALTER TABLE `currency`
  MODIFY `id_currency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id_discounts` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exchange_rates`
--
ALTER TABLE `exchange_rates`
  MODIFY `id_exchange_rates` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `floors`
--
ALTER TABLE `floors`
  MODIFY `id_floors` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hostel_area`
--
ALTER TABLE `hostel_area`
  MODIFY `id_hostel_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `incidents_beds`
--
ALTER TABLE `incidents_beds`
  MODIFY `id_incidents_beds` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `incidents_rooms`
--
ALTER TABLE `incidents_rooms`
  MODIFY `id_incidents_rooms` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `incident_b_status`
--
ALTER TABLE `incident_b_status`
  MODIFY `id_incident_b_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `incident_r_status`
--
ALTER TABLE `incident_r_status`
  MODIFY `id_incident_r_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id_nationality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `product_kind`
--
ALTER TABLE `product_kind`
  MODIFY `id_product_kind` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `quien_y_cuando_host`
--
ALTER TABLE `quien_y_cuando_host`
  MODIFY `id_q_y_c_host` int(48) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `quien_y_cuando_per`
--
ALTER TABLE `quien_y_cuando_per`
  MODIFY `id_q_y_c_per` int(48) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `quien_y_cuando_room`
--
ALTER TABLE `quien_y_cuando_room`
  MODIFY `id_q_y_c_room` int(48) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reporte_incidencias_b`
--
ALTER TABLE `reporte_incidencias_b`
  MODIFY `id_reporte_incidencias_b` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_incidencias_r`
--
ALTER TABLE `reporte_incidencias_r`
  MODIFY `id_reporte_incidencias_r` int(120) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `room_kind`
--
ALTER TABLE `room_kind`
  MODIFY `id_room_kind` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `room_number`
--
ALTER TABLE `room_number`
  MODIFY `id_room_number` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `room_status`
--
ALTER TABLE `room_status`
  MODIFY `id_room_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sex`
--
ALTER TABLE `sex`
  MODIFY `id_sex` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id_taxes` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `id_address` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tb_data_guests`
--
ALTER TABLE `tb_data_guests`
  MODIFY `id_data_guests` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_data_personal`
--
ALTER TABLE `tb_data_personal`
  MODIFY `id_data_per` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_guests`
--
ALTER TABLE `tb_guests`
  MODIFY `id_guests` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_prices_beds`
--
ALTER TABLE `tb_prices_beds`
  MODIFY `id_prices_beds` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_prices_rooms`
--
ALTER TABLE `tb_prices_rooms`
  MODIFY `id_prices_rooms` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `id_room` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  MODIFY `id_rooms_beds` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `tb_services`
--
ALTER TABLE `tb_services`
  MODIFY `id_services` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_services_prices`
--
ALTER TABLE `tb_services_prices`
  MODIFY `id_services_prices` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `z_data_hostel`
--
ALTER TABLE `z_data_hostel`
  MODIFY `id_data_hostel` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `z_hostel`
--
ALTER TABLE `z_hostel`
  MODIFY `id_hostel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `exchange_rates`
--
ALTER TABLE `exchange_rates`
  ADD CONSTRAINT `curremcy_aa` FOREIGN KEY (`id_currency_A`) REFERENCES `currency` (`id_currency`) ON UPDATE CASCADE,
  ADD CONSTRAINT `curremcy_bb` FOREIGN KEY (`id_currency_B`) REFERENCES `currency` (`id_currency`) ON UPDATE CASCADE,
  ADD CONSTRAINT `currency_Selected` FOREIGN KEY (`id_hostel_currency`) REFERENCES `currency` (`id_currency`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hostal_exchange` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `quien_y_cuando_host`
--
ALTER TABLE `quien_y_cuando_host`
  ADD CONSTRAINT `host_open_or` FOREIGN KEY (`id_host_open_o_close`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `quien_y_cuando_per`
--
ALTER TABLE `quien_y_cuando_per`
  ADD CONSTRAINT `el_activado_o_desact` FOREIGN KEY (`id_per_act_o_desact`) REFERENCES `tb_personal` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte_incidencias_b`
--
ALTER TABLE `reporte_incidencias_b`
  ADD CONSTRAINT `La_cama_tal` FOREIGN KEY (`id_de_la_bed_b`) REFERENCES `tb_rooms_beds` (`id_rooms_beds`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `la_incidcencia_b` FOREIGN KEY (`id_de_incidencia_b`) REFERENCES `incidents_beds` (`id_incidents_beds`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reportado_por_b` FOREIGN KEY (`id_quien_reporto_b`) REFERENCES `tb_personal` (`id_per`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status_incidencia_b` FOREIGN KEY (`id_incidencia_b_status`) REFERENCES `incidents_beds` (`id_incidents_beds`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte_incidencias_r`
--
ALTER TABLE `reporte_incidencias_r`
  ADD CONSTRAINT `en_el_cuarto` FOREIGN KEY (`id_de_la_room_r`) REFERENCES `tb_room` (`id_room`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `la_incidcencia_r` FOREIGN KEY (`id_de_incidencia_r`) REFERENCES `incidents_rooms` (`id_incidents_rooms`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reportado_por_r` FOREIGN KEY (`id_quien_reporto_r`) REFERENCES `tb_personal` (`id_per`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status_incidencia` FOREIGN KEY (`id_incidencia_r_status`) REFERENCES `incident_r_status` (`id_incident_r_status`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_address`
--
ALTER TABLE `tb_address`
  ADD CONSTRAINT `country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_data_guests`
--
ALTER TABLE `tb_data_guests`
  ADD CONSTRAINT `g_nacionalidad` FOREIGN KEY (`id_nation_g`) REFERENCES `nationality` (`id_nationality`) ON UPDATE CASCADE,
  ADD CONSTRAINT `g_ranking` FOREIGN KEY (`guests_behaviors`) REFERENCES `behaviors` (`id_behaviors`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_guests`
--
ALTER TABLE `tb_guests`
  ADD CONSTRAINT `registrado_g_por` FOREIGN KEY (`guests_register_by`) REFERENCES `tb_personal` (`id_per`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  ADD CONSTRAINT `address_per` FOREIGN KEY (`id_address`) REFERENCES `tb_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_per` FOREIGN KEY (`id_data_per`) REFERENCES `tb_data_personal` (`id_data_per`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hostel` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nationality` FOREIGN KEY (`id_nationality`) REFERENCES `nationality` (`id_nationality`) ON UPDATE CASCADE,
  ADD CONSTRAINT `roles` FOREIGN KEY (`id_rol_per`) REFERENCES `roles` (`id_rol_per`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sex` FOREIGN KEY (`id_sex`) REFERENCES `sex` (`id_sex`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_prices_beds`
--
ALTER TABLE `tb_prices_beds`
  ADD CONSTRAINT `descuentos_bed` FOREIGN KEY (`discount_beds`) REFERENCES `discounts` (`id_discounts`) ON UPDATE CASCADE,
  ADD CONSTRAINT `el_tax` FOREIGN KEY (`taxes_beds`) REFERENCES `taxes` (`id_taxes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `eltiporoom` FOREIGN KEY (`id_room_kind`) REFERENCES `room_kind` (`id_room_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_prices_rooms`
--
ALTER TABLE `tb_prices_rooms`
  ADD CONSTRAINT `descuento_r` FOREIGN KEY (`discount_room`) REFERENCES `discounts` (`id_discounts`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taxes_r` FOREIGN KEY (`taxes_room`) REFERENCES `taxes` (`id_taxes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_room` FOREIGN KEY (`id_room_kind`) REFERENCES `room_kind` (`id_room_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_room`
--
ALTER TABLE `tb_room`
  ADD CONSTRAINT `floorsss` FOREIGN KEY (`id_floors`) REFERENCES `floors` (`id_floors`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hostales_con_room` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hostel_areasss` FOREIGN KEY (`id_hostel_area`) REFERENCES `hostel_area` (`id_hostel_area`),
  ADD CONSTRAINT `room_kindd` FOREIGN KEY (`id_room_kind`) REFERENCES `room_kind` (`id_room_kind`) ON UPDATE CASCADE,
  ADD CONSTRAINT `room_stado` FOREIGN KEY (`room_status_temp`) REFERENCES `room_status` (`id_room_status`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rrom_nummm` FOREIGN KEY (`id_room_number`) REFERENCES `room_number` (`id_room_number`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  ADD CONSTRAINT `el_id_room` FOREIGN KEY (`id_room`) REFERENCES `tb_room` (`id_room`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_b` FOREIGN KEY (`bed_status_temp`) REFERENCES `bed_status` (`id_bed_status`) ON UPDATE CASCADE,
  ADD CONSTRAINT `num_cama` FOREIGN KEY (`id_bed_number`) REFERENCES `bed_number` (`id_bed_number`),
  ADD CONSTRAINT `tipo_cama` FOREIGN KEY (`id_bed_kind`) REFERENCES `bed_kind` (`id_bed_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_services`
--
ALTER TABLE `tb_services`
  ADD CONSTRAINT `elhostel` FOREIGN KEY (`id_hostal`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elproducto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipodeproducto` FOREIGN KEY (`id_product_kind`) REFERENCES `product_kind` (`id_product_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_services_prices`
--
ALTER TABLE `tb_services_prices`
  ADD CONSTRAINT `descuento` FOREIGN KEY (`discount_type`) REFERENCES `discounts` (`id_discounts`) ON UPDATE CASCADE,
  ADD CONSTRAINT `el_hostel` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `el_produccc` FOREIGN KEY (`id_product`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tax_Service` FOREIGN KEY (`tax_services`) REFERENCES `taxes` (`id_taxes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_pproducc` FOREIGN KEY (`id_product_kind`) REFERENCES `product_kind` (`id_product_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `z_hostel`
--
ALTER TABLE `z_hostel`
  ADD CONSTRAINT `address` FOREIGN KEY (`id_address`) REFERENCES `tb_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data` FOREIGN KEY (`id_data_hostel`) REFERENCES `z_data_hostel` (`id_data_hostel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `money` FOREIGN KEY (`id_currency`) REFERENCES `currency` (`id_currency`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
