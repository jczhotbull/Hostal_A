-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2024 a las 22:19:09
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
-- Estructura de tabla para la tabla `bed_booking`
--

CREATE TABLE `bed_booking` (
  `id_bed_booking` int(254) NOT NULL,
  `booking_year` varchar(4) NOT NULL,
  `id_hostel` int(128) NOT NULL,
  `id_room` int(64) NOT NULL,
  `id_room_bed` int(128) NOT NULL,
  `date_range` varchar(40) NOT NULL,
  `booking_status` int(6) NOT NULL DEFAULT 1,
  `date_in` varchar(20) NOT NULL,
  `date_out` varchar(20) NOT NULL,
  `nights` varchar(20) NOT NULL,
  `arreglo_d` varchar(2054) NOT NULL,
  `codigo_amistades` varchar(40) NOT NULL,
  `amistad_rey` int(128) DEFAULT NULL,
  `id_guests` int(254) NOT NULL,
  `month_ini` varchar(20) NOT NULL,
  `month_end` varchar(20) NOT NULL,
  `hora_rey` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(7, 'Unavailable');

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
-- Estructura de tabla para la tabla `bunk_level`
--

CREATE TABLE `bunk_level` (
  `id_bunk_level` int(2) NOT NULL,
  `name_bunk_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bunk_level`
--

INSERT INTO `bunk_level` (`id_bunk_level`, `name_bunk_level`) VALUES
(1, 'Bunk 1'),
(2, 'Bunk 2'),
(3, 'Bunk 3');

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
(1, 'USA'),
(7, 'Mexico');

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
(26, 10, 2, 1, 130.00, 3, 145.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-16 23:08:40'),
(27, 10, 2, 1, 135.00, 3, 149.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-18 14:03:42'),
(28, 10, 2, 1, 16.80, 3, 18.20, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-22 02:14:55');

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
(1, 'Pending', '#ff7452', '#000000'),
(2, 'Solved', '#1cce00', '#000000'),
(3, 'Researching', '#8bc7e5', '#000000'),
(4, 'Repairing', '#99e5e4', '#000000'),
(5, 'Resolved', '#1cce00', '#000000'),
(6, 'Observing', '#e1ff28', '#000000'),
(7, 'Unsolved', '#ff9500', '#000000');

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
(1, 'Pending', '#ff7452', '#000000'),
(2, 'Solved', '#1cce00', '#000000'),
(3, 'Researching', '#8bc7e5', '#000000'),
(4, 'Repairing', '#99e5e4', '#000000'),
(5, 'Resolved', '#1cce00', '#000000'),
(6, 'Observing', '#e1ff00', '#000000'),
(7, 'Unsolved', '#ff9500', '#000000');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_incidencias_b`
--

CREATE TABLE `reporte_incidencias_b` (
  `id_reporte_incidencias_b` int(250) NOT NULL,
  `id_quien_reporto_b` int(24) NOT NULL,
  `id_de_la_bed_b` int(250) NOT NULL,
  `fecha_incidencia_b` datetime NOT NULL,
  `id_de_incidencia_b` int(250) NOT NULL,
  `id_incidencia_b_status` int(250) NOT NULL,
  `id_quien_actualizo_b` int(120) DEFAULT NULL,
  `update_fecha_inc_b` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reporte_incidencias_b`
--

INSERT INTO `reporte_incidencias_b` (`id_reporte_incidencias_b`, `id_quien_reporto_b`, `id_de_la_bed_b`, `fecha_incidencia_b`, `id_de_incidencia_b`, `id_incidencia_b_status`, `id_quien_actualizo_b`, `update_fecha_inc_b`) VALUES
(1, 9, 130, '2024-03-17 01:29:03', 6, 4, 9, '2024-03-17 02:27:57'),
(2, 9, 135, '2024-03-17 01:29:14', 4, 1, NULL, NULL),
(3, 9, 129, '2024-03-17 01:29:19', 9, 1, NULL, NULL),
(6, 9, 130, '2024-03-17 01:58:32', 7, 4, 9, '2024-03-18 03:00:11'),
(7, 9, 130, '2024-03-17 01:58:36', 4, 5, 9, '2024-03-17 02:27:31'),
(8, 9, 129, '2024-03-17 01:58:40', 3, 1, NULL, NULL),
(9, 9, 145, '2024-03-17 01:58:45', 6, 3, 9, '2024-03-17 02:28:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_incidencias_r`
--

CREATE TABLE `reporte_incidencias_r` (
  `id_reporte_incidencias_r` int(120) NOT NULL,
  `id_quien_reporto_r` int(24) NOT NULL,
  `id_de_la_room_r` int(24) NOT NULL,
  `fecha_incidencia_r` datetime NOT NULL,
  `id_de_incidencia_r` int(110) NOT NULL,
  `id_incidencia_r_status` int(110) NOT NULL,
  `id_quien_actualizo_r` int(24) DEFAULT NULL,
  `update_fecha_inc_r` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reporte_incidencias_r`
--

INSERT INTO `reporte_incidencias_r` (`id_reporte_incidencias_r`, `id_quien_reporto_r`, `id_de_la_room_r`, `fecha_incidencia_r`, `id_de_incidencia_r`, `id_incidencia_r_status`, `id_quien_actualizo_r`, `update_fecha_inc_r`) VALUES
(13, 9, 46, '2024-03-17 12:47:27', 3, 1, NULL, NULL),
(14, 9, 46, '2024-03-17 12:47:31', 6, 1, NULL, NULL),
(15, 9, 46, '2024-03-17 12:47:36', 9, 5, 9, '2024-03-18 02:58:05'),
(16, 9, 48, '2024-03-17 12:47:39', 6, 4, 9, '2024-03-20 07:02:44');

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
(2, 'Unavailable');

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
(18, 'Tulum', 1, 0, ''),
(19, '.', 1, 0, ''),
(20, 'Caracas', 1, 1010, 'Av Casanova con Calle Villaflor'),
(21, 'Caracas', 1, 1010, 'Delicias a San Francisquito Pasaje San Carlos');

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
(124, 'guests/doc_id_g/186_13139999.png', 1, '', '', 12, NULL, 186),
(125, 'guests/doc_id_g/187_17720914.png', 1, '', '', 12, NULL, 187),
(126, 'guests/doc_id_g/188_666643315555.png', 1, '', '', 12, NULL, 188),
(127, 'guests/doc_id_g/189_177209146.png', 1, '', '', 12, NULL, 189),
(128, 'guests/doc_id_g/190_17720914776.png', 1, '', '', 12, NULL, 190),
(129, 'guests/doc_id_g/191_66348.png', 1, '', '', 12, NULL, 191),
(130, 'guests/doc_id_g/194_157744.png', 1, '', '', 12, NULL, 194),
(131, 'guests/doc_id_g/193_13137951.png', 1, 'jczhotbull@gmail.com', '04241198683', 12, NULL, 193),
(132, 'guests/doc_id_g/195_99888445.png', 1, '', '', 12, NULL, 195),
(133, 'guests/doc_id_g/196_9986533.png', 1, '', '', 12, NULL, 196),
(134, 'guests/doc_id_g/197_3647888.png', 1, '', '', 12, NULL, 197),
(135, 'guests/doc_id_g/198_8888899.png', 1, '', '', 12, NULL, 198),
(136, 'guests/doc_id_g/199_77777.png', 1, '', '', 12, NULL, 199),
(137, 'guests/doc_id_g/200_55555.png', 1, 'jczhotbull@gmail.com', '04241198683', 12, NULL, 200),
(138, 'guests/doc_id_g/201_88888.png', 1, '', '', 12, NULL, 201),
(139, 'guests/doc_id_g/202_000655.png', 1, '', '', 12, NULL, 202),
(140, 'guests/doc_id_g/203_99999.png', 1, '', '', 12, NULL, 203),
(141, 'guests/doc_id_g/204_5555566.png', 1, '', '', 12, NULL, 204),
(142, 'guests/doc_id_g/205_7777733.png', 1, '', '', 12, NULL, 205),
(143, 'guests/doc_id_g/206_0006557.png', 1, '', '', 12, NULL, 206),
(144, 'guests/doc_id_g/207_777778999.png', 1, '', '', 12, NULL, 207),
(145, 'guests/doc_id_g/208_000655999.png', 1, '', '', 12, NULL, 208),
(146, 'guests/doc_id_g/209_99999777.png', 1, '', '', 12, NULL, 209),
(147, 'guests/doc_id_g/210_777774122.png', 1, '', '', 12, NULL, 210),
(148, 'guests/doc_id_g/211_00065599.png', 1, '', '', 12, NULL, 211),
(149, 'guests/doc_id_g/212_11444.png', 1, '', '', 12, NULL, 212),
(150, 'guests/doc_id_g/213_774887.png', 1, '', '', 12, NULL, 213);

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
(9, '', '', 'jczhotbull@gmail.com', 'img_per/9_13137951.png', NULL, NULL),
(10, '04241198683', '', 'jczhotbull@gmail.com', NULL, NULL, NULL);

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
(186, 13139999, '', NULL, '', NULL, NULL, '84c39300619e9b32a3d92dfe11c94a8a', 1, 9, '0000-00-00', 0, 3, '2024-03-24 16:20:35'),
(187, 17720914, '', NULL, '', NULL, NULL, '6c9eb0f571672a22c060f04a73703984', 1, 9, '0000-00-00', 0, 3, '2024-03-24 16:24:08'),
(188, 2147483647, '', NULL, '', NULL, NULL, 'e78a51be4f6c64a3ebabe53129e5aeda', 1, 9, '0000-00-00', 0, 3, '2024-03-24 16:24:24'),
(189, 177209146, '', NULL, '', NULL, NULL, 'ad38dd764cab520028988d7cc17b7f40', 1, 9, '0000-00-00', 0, 3, '2024-03-24 16:24:47'),
(190, 2147483647, '', NULL, '', NULL, NULL, 'b2a503e1d32408c9b96d767e2675bb03', 1, 9, '0000-00-00', 0, 3, '2024-03-24 16:32:18'),
(191, 66348, '', NULL, '', NULL, NULL, '7ad80cdea9e0ab56d894bc6bd20ac7b3', 1, 9, '0000-00-00', 0, 3, '2024-03-24 16:43:03'),
(192, 6553333, '', NULL, '', NULL, NULL, '065ee2a78ca42eb522db1900e876a7d6', 1, 9, '0000-00-00', 0, 3, '2024-03-24 17:03:29'),
(193, 13137951, 'Juan', NULL, 'Guerrero', NULL, NULL, '4ab27d025f4ec1b788b330d48b6eea58', 1, 9, '2024-03-12', 0, 1, '2024-03-25 19:04:27'),
(194, 157744, '', NULL, '', NULL, NULL, '972652fd6e13379743f1ca81589a55c6', 1, 9, '0000-00-00', 0, 3, '2024-03-24 20:35:16'),
(195, 99888445, '', NULL, '', NULL, NULL, '7d9e9409a815abac0e3f913ac34f2e40', 1, 9, '0000-00-00', 0, 3, '2024-03-24 21:22:02'),
(196, 9986533, '', NULL, '', NULL, NULL, '9f2ffd961d662b7ab7bb85b00958fb70', 1, 9, '0000-00-00', 0, 3, '2024-03-24 21:23:58'),
(197, 3647888, '', NULL, '', NULL, NULL, 'd20b161f268c2435f6b4c1f76c738aae', 1, 9, '0000-00-00', 0, 3, '2024-03-24 21:24:43'),
(198, 8888899, '', NULL, '', NULL, NULL, '2a95924704c440dee8b62a751ddb8a42', 1, 9, '0000-00-00', 0, 3, '2024-03-24 21:30:27'),
(199, 77777, '', NULL, '', NULL, NULL, '90c3e27b5953b363692288c3e499bd7b', 1, 9, '0000-00-00', 0, 3, '2024-03-25 13:40:08'),
(200, 55555, 'Sinai', NULL, 'Guerrero', NULL, NULL, '4bbc286886cc459942f1bd4ec0e0d645', 1, 9, '2024-03-12', 0, 2, '2024-03-25 19:05:00'),
(201, 88888, '', NULL, '', NULL, NULL, '2d159b502763ed8f4ffa682620098cda', 1, 9, '0000-00-00', 0, 3, '2024-03-25 13:40:50'),
(202, 655, '', NULL, '', NULL, NULL, 'a6b8470375b38aeb49d699c176997a90', 1, 9, '0000-00-00', 0, 3, '2024-03-25 13:41:24'),
(203, 99999, '', NULL, '', NULL, NULL, '6de378a67c1bed64a828e91cf5cac7b2', 1, 9, '0000-00-00', 0, 3, '2024-03-25 13:41:47'),
(204, 5555566, '', NULL, '', NULL, NULL, '0842c687ea65d10c832a198cd4ec9824', 1, 9, '0000-00-00', 0, 3, '2024-03-25 13:42:04'),
(205, 7777733, '', NULL, '', NULL, NULL, 'a2369aa89af78a5411a82bb0eb4478b3', 1, 9, '0000-00-00', 0, 3, '2024-03-25 13:42:18'),
(206, 6557, '', NULL, '', NULL, NULL, '3a18824f8b85f2918b4185c3c9681870', 1, 9, '0000-00-00', 0, 3, '2024-03-25 16:36:16'),
(207, 777778999, '', NULL, '', NULL, NULL, '4670d1d706aa4ebeb3d0beff4d740645', 1, 9, '0000-00-00', 0, 3, '2024-03-25 16:36:35'),
(208, 655999, '', NULL, '', NULL, NULL, 'e20d26b4a23d968c20b431c0f0eecd2a', 1, 9, '0000-00-00', 0, 3, '2024-03-25 16:36:49'),
(209, 99999777, '', NULL, '', NULL, NULL, '3658b475275b41fd22cb6e56475a7f12', 1, 9, '0000-00-00', 0, 3, '2024-03-25 16:37:12'),
(210, 777774122, '', NULL, '', NULL, NULL, 'f2ef409e481e8171de6bf276e47e1799', 1, 9, '0000-00-00', 0, 3, '2024-03-25 16:37:25'),
(211, 65599, '', NULL, '', NULL, NULL, '112deca267294e17a59018a45ef558cb', 1, 9, '0000-00-00', 0, 3, '2024-03-25 16:37:39'),
(212, 11444, '', NULL, '', NULL, NULL, '25b94ed557973f30842a0e9736ab304c', 1, 9, '0000-00-00', 0, 3, '2024-03-25 16:37:49'),
(213, 774887, '', NULL, '', NULL, NULL, 'c625b85e03b4d637d37c927063b8f5a1', 1, 9, '0000-00-00', 0, 3, '2024-03-25 16:38:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_guests_buys`
--

CREATE TABLE `tb_guests_buys` (
  `id_guests_buys` int(254) NOT NULL,
  `id_hostel` int(11) NOT NULL,
  `id_service` int(128) NOT NULL,
  `monto` varchar(40) NOT NULL,
  `impuesto` varchar(40) NOT NULL,
  `descuento` varchar(40) NOT NULL,
  `total` varchar(40) NOT NULL,
  `cantidad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_guests_services`
--

CREATE TABLE `tb_guests_services` (
  `id_guests_services` int(254) NOT NULL,
  `id_hostel` int(11) NOT NULL,
  `id_del_servicio` int(24) NOT NULL,
  `monto` varchar(40) NOT NULL,
  `impuesto` varchar(40) NOT NULL,
  `descuento` varchar(40) NOT NULL,
  `total` varchar(40) NOT NULL,
  `cantidad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(9, 13137951, '', 'Juan', '', 'Zuñiga', '', '1978-11-24', 19, 1, 1, '84eafe3ac0e8f6722de034ad39be0631', 1, 'No', 10, 9, 1, 9, 1, 1, '2024-03-16 22:57:12'),
(10, 17720914, 'a17720914', 'Sinai', '', 'Guerrero', 'Salazar', '2024-03-12', 20, 2, 1, '5840548d18a3f739d071ea952059905d', 2, 'No', 10, 10, 1, 9, 1, 1, '2024-03-16 22:55:50');

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
(9, 10, 1, 110.00, 1, 1, '2024-03-16 23:10:05', 9),
(10, 10, 3, 140.00, 1, 1, '2024-03-16 23:10:17', 9),
(11, 10, 4, 90.00, 1, 1, '2024-03-16 23:10:31', 9),
(12, 10, 1, 115.00, 1, 4, '2024-03-25 13:21:02', 9),
(13, 10, 1, 120.00, 3, 4, '2024-03-25 20:54:05', 9);

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
(14, 10, 1, 220.00, 1, 1, '2024-03-16 23:09:17', 9),
(15, 10, 3, 150.00, 1, 1, '2024-03-16 23:09:39', 9),
(16, 10, 4, 260.00, 1, 1, '2024-03-16 23:09:52', 9),
(17, 10, 1, 100.00, 1, 5, '2024-03-20 21:26:24', 9),
(18, 10, 4, 170.00, 1, 3, '2024-03-22 02:15:46', 9),
(19, 10, 1, 550.00, 1, 5, '2024-03-22 12:47:44', 9);

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
(46, 10, 1, 13, 2, 1, 9, '2024-03-19 21:21:07', 1, '', 1),
(47, 10, 3, 1, 1, 1, 9, '2024-03-16 22:59:21', 1, '', 1),
(48, 10, 1, 2, 2, 1, 9, '2024-03-16 22:59:32', 1, '', 1),
(49, 10, 1, 3, 2, 1, 9, '2024-03-16 22:59:48', 1, '', 1),
(50, 10, 3, 2, 2, 1, 9, '2024-03-16 23:00:05', 1, '', 1),
(51, 10, 4, 1, 2, 1, 9, '2024-03-16 23:00:17', 1, '', 1),
(53, 10, 4, 3, 2, 1, 9, '2024-03-16 23:04:39', 1, '', 1),
(54, 10, 4, 5, 1, 1, 9, '2024-03-16 23:05:06', 1, '', 1),
(55, 10, 3, 4, 2, 1, 9, '2024-03-16 23:06:02', 1, '', 1),
(56, 10, 4, 6, 2, 1, 9, '2024-03-16 23:06:19', 1, '', 1),
(57, 10, 4, 11, 2, 1, 9, '2024-03-17 16:35:05', 1, '', 1),
(58, 10, 1, 11, 2, 1, 9, '2024-03-23 21:39:49', 1, '', 1),
(59, 10, 4, 12, 2, 1, 9, '2024-03-20 21:12:16', 1, '', 1);

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
  `bed_status_temp` int(32) NOT NULL DEFAULT 1,
  `id_bunk_level` int(24) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_rooms_beds`
--

INSERT INTO `tb_rooms_beds` (`id_rooms_beds`, `id_hostel`, `id_room`, `id_room_kind`, `id_bed_kind`, `id_bed_number`, `note`, `bed_status_temp`, `id_bunk_level`) VALUES
(129, 10, 46, 1, 1, 11, '', 1, 1),
(130, 10, 46, 1, 1, 2, '', 1, 2),
(131, 10, 46, 1, 1, 3, '', 1, 2),
(132, 10, 46, 1, 1, 4, '', 1, 2),
(133, 10, 46, 1, 1, 5, '', 1, 1),
(134, 10, 46, 1, 1, 6, '', 1, 1),
(135, 10, 46, 1, 1, 7, '', 1, 1),
(138, 10, 47, 3, 1, 1, '', 1, 1),
(139, 10, 47, 3, 1, 2, '', 1, 1),
(140, 10, 47, 3, 1, 3, '', 1, 1),
(141, 10, 47, 3, 1, 4, '', 1, 1),
(142, 10, 48, 1, 1, 1, '', 1, 1),
(143, 10, 48, 1, 1, 2, '', 1, 2),
(144, 10, 49, 1, 1, 1, '', 1, 1),
(145, 10, 49, 1, 1, 2, '', 1, 1),
(146, 10, 49, 1, 1, 3, '', 1, 1),
(147, 10, 49, 1, 1, 4, '', 1, 1),
(148, 10, 50, 3, 1, 1, '', 7, 1),
(149, 10, 50, 3, 1, 2, '', 1, 1),
(150, 10, 50, 3, 1, 3, '', 1, 1),
(151, 10, 50, 3, 1, 4, '', 1, 1),
(152, 10, 51, 4, 2, 1, '', 7, 1),
(153, 10, 51, 4, 2, 1, '', 1, 1),
(154, 10, 53, 4, 2, 1, '', 7, 1),
(155, 10, 54, 4, 2, 1, '', 1, 1),
(156, 10, 54, 4, 2, 2, '', 1, 1),
(157, 10, 54, 4, 2, 3, '', 1, 1),
(158, 10, 55, 3, 1, 1, '', 1, 1),
(159, 10, 55, 3, 1, 2, '', 1, 1),
(160, 10, 55, 3, 1, 3, '', 1, 1),
(161, 10, 55, 3, 1, 4, '', 1, 1),
(162, 10, 55, 3, 1, 5, '', 1, 1),
(163, 10, 56, 4, 2, 11, '', 1, 1),
(164, 10, 57, 4, 2, 2, '', 7, 1),
(165, 10, 57, 4, 2, 2, '', 7, 2),
(166, 10, 57, 4, 2, 4, '', 1, 1),
(167, 10, 57, 4, 2, 5, '', 1, 2),
(168, 10, 57, 4, 2, 5, '', 1, 2),
(169, 10, 57, 4, 2, 8, '', 1, 1),
(170, 10, 57, 4, 2, 7, '', 1, 1),
(171, 10, 57, 4, 2, 7, '', 1, 1),
(172, 10, 57, 4, 2, 7, '', 1, 1),
(173, 10, 58, 1, 1, 11, '', 1, 1),
(174, 10, 58, 1, 1, 3, '', 1, 2),
(175, 10, 58, 1, 1, 4, '', 1, 2),
(176, 10, 59, 4, 2, 4, '', 1, 1),
(177, 10, 59, 4, 2, 8, '', 1, 1);

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
  `service_charac` varchar(111) NOT NULL,
  `sale_kind` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_services`
--

INSERT INTO `tb_services` (`id_services`, `id_hostal`, `id_product_kind`, `id_producto`, `creado_por_el`, `service_date`, `service_status`, `service_charac`, `sale_kind`) VALUES
(12, 10, 1, 5, 9, '2024-03-16 23:34:25', 1, '', 2),
(13, 10, 2, 3, 9, '2024-03-16 23:21:21', 1, '', 1);

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
(5, 10, 1, 5, 20.00, 1, 1, '2024-03-16 23:10:57', 9);

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
(10, '', '', '', '', '', '', '1', '', '', ''),
(11, '04242772573', '04242772573', '', 'Delicias a San Francisquito Pasaje San ', 'Casa Numero 5, Parroquia San Juan', '5555', '222', 'sinaicel@gmail.com', 'sinaicel@gmail.com', 'sinaicel@gmail.com');

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
(10, 'Freelance', '', '001', 18, 10, NULL, 1, 9, 1, '2024-03-16 22:57:20', 2),
(11, 'Sinai Guerrero S', 'pp', '11111', 21, 11, NULL, 0, 9, 1, '2024-03-18 13:51:26', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bed_booking`
--
ALTER TABLE `bed_booking`
  ADD PRIMARY KEY (`id_bed_booking`),
  ADD KEY `los_hosteless` (`id_hostel`),
  ADD KEY `cuartillos` (`id_room`),
  ADD KEY `camacama` (`id_room_bed`);

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
-- Indices de la tabla `bunk_level`
--
ALTER TABLE `bunk_level`
  ADD PRIMARY KEY (`id_bunk_level`);

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
  ADD KEY `registrado_g_por` (`guests_register_by`),
  ADD KEY `sexoi` (`guests_sex`);

--
-- Indices de la tabla `tb_guests_buys`
--
ALTER TABLE `tb_guests_buys`
  ADD PRIMARY KEY (`id_guests_buys`);

--
-- Indices de la tabla `tb_guests_services`
--
ALTER TABLE `tb_guests_services`
  ADD PRIMARY KEY (`id_guests_services`);

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
  ADD KEY `estado_b` (`bed_status_temp`),
  ADD KEY `level_cama` (`id_bunk_level`);

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
-- AUTO_INCREMENT de la tabla `bed_booking`
--
ALTER TABLE `bed_booking`
  MODIFY `id_bed_booking` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

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
  MODIFY `id_bed_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `behaviors`
--
ALTER TABLE `behaviors`
  MODIFY `id_behaviors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `bunk_level`
--
ALTER TABLE `bunk_level`
  MODIFY `id_bunk_level` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_exchange_rates` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id_reporte_incidencias_b` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reporte_incidencias_r`
--
ALTER TABLE `reporte_incidencias_r`
  MODIFY `id_reporte_incidencias_r` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id_address` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tb_data_guests`
--
ALTER TABLE `tb_data_guests`
  MODIFY `id_data_guests` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `tb_data_personal`
--
ALTER TABLE `tb_data_personal`
  MODIFY `id_data_per` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tb_guests`
--
ALTER TABLE `tb_guests`
  MODIFY `id_guests` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT de la tabla `tb_guests_buys`
--
ALTER TABLE `tb_guests_buys`
  MODIFY `id_guests_buys` int(254) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_guests_services`
--
ALTER TABLE `tb_guests_services`
  MODIFY `id_guests_services` int(254) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tb_prices_beds`
--
ALTER TABLE `tb_prices_beds`
  MODIFY `id_prices_beds` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_prices_rooms`
--
ALTER TABLE `tb_prices_rooms`
  MODIFY `id_prices_rooms` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `id_room` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  MODIFY `id_rooms_beds` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de la tabla `tb_services`
--
ALTER TABLE `tb_services`
  MODIFY `id_services` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_services_prices`
--
ALTER TABLE `tb_services_prices`
  MODIFY `id_services_prices` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `z_data_hostel`
--
ALTER TABLE `z_data_hostel`
  MODIFY `id_data_hostel` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `z_hostel`
--
ALTER TABLE `z_hostel`
  MODIFY `id_hostel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bed_booking`
--
ALTER TABLE `bed_booking`
  ADD CONSTRAINT `camacama` FOREIGN KEY (`id_room_bed`) REFERENCES `tb_rooms_beds` (`id_rooms_beds`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuartillos` FOREIGN KEY (`id_room`) REFERENCES `tb_room` (`id_room`) ON UPDATE CASCADE,
  ADD CONSTRAINT `los_hosteless` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `registrado_g_por` FOREIGN KEY (`guests_register_by`) REFERENCES `tb_personal` (`id_per`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sexoi` FOREIGN KEY (`guests_sex`) REFERENCES `sex` (`id_sex`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `level_cama` FOREIGN KEY (`id_bunk_level`) REFERENCES `bunk_level` (`id_bunk_level`) ON UPDATE CASCADE,
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
