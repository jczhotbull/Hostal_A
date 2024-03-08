-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2024 a las 19:25:07
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
(10, 'None');

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
(1, '5'),
(2, '10'),
(3, '15');

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
(1, 6, 2, 1, 200.00, 3, 220.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-08 16:36:13');

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
(1, 'American');

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
(12, '12');

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
(2, 'Female');

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
(1, '9'),
(2, '10'),
(3, '11');

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
(11, 'Caracas', 1, 0, ''),
(12, '.', 1, NULL, NULL);

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
(6, NULL, NULL, 'jczhotbull@gmail.com', NULL, NULL, NULL);

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
(6, 13137951, NULL, 'Juan', NULL, 'Zuñiga', NULL, '1978-11-24', 12, 1, 1, '362eee548bd10b1831944896a901c340', 1, 'No', 6, 6, 0, 6, 1, 0, '2024-03-08 13:50:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_prices_rooms`
--

CREATE TABLE `tb_prices_rooms` (
  `id_prices_rooms` int(64) NOT NULL,
  `name_prices_rooms` decimal(20,2) NOT NULL,
  `id_room_kind` int(16) NOT NULL,
  `set_prices_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prices_set_by_who` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `room_observ` varchar(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_room`
--

INSERT INTO `tb_room` (`id_room`, `id_hostel`, `id_room_kind`, `id_room_number`, `id_floors`, `id_hostel_area`, `creada_por`, `room_date`, `room_status`, `room_observ`) VALUES
(20, 6, 1, 1, 2, 1, 6, '2024-03-08 14:05:56', 1, ''),
(21, 6, 3, 1, 1, 1, 6, '2024-03-08 14:06:52', 1, ''),
(22, 6, 1, 6, 2, 1, 6, '2024-03-08 14:07:17', 1, ''),
(23, 6, 1, 8, 1, 1, 6, '2024-03-08 14:07:35', 1, ''),
(24, 6, 4, 12, 1, 1, 6, '2024-03-08 14:07:51', 1, ''),
(25, 6, 4, 6, 2, 1, 6, '2024-03-08 14:08:16', 1, ''),
(26, 6, 4, 5, 1, 1, 6, '2024-03-08 14:08:39', 1, ''),
(27, 6, 3, 6, 2, 1, 6, '2024-03-08 14:09:10', 1, ''),
(28, 6, 4, 2, 1, 1, 6, '2024-03-08 14:21:24', 1, 'Se debe realizar limpieza profunda.'),
(29, 6, 3, 12, 2, 1, 6, '2024-03-08 14:22:39', 1, 'El lavamanos tiene fuga de agua.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rooms_beds`
--

CREATE TABLE `tb_rooms_beds` (
  `id_rooms_beds` int(64) NOT NULL,
  `id_room` int(14) NOT NULL,
  `id_bed_kind` int(10) NOT NULL,
  `id_bed_number` int(10) NOT NULL,
  `note` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_rooms_beds`
--

INSERT INTO `tb_rooms_beds` (`id_rooms_beds`, `id_room`, `id_bed_kind`, `id_bed_number`, `note`) VALUES
(50, 20, 1, 1, 'Colchón en mal estado'),
(51, 20, 1, 2, ''),
(52, 20, 1, 3, ''),
(53, 20, 1, 4, ''),
(54, 20, 1, 10, ''),
(55, 21, 1, 1, ''),
(56, 21, 1, 2, 'Cama por hacer '),
(57, 22, 2, 1, ''),
(58, 22, 2, 3, ''),
(59, 22, 2, 2, ''),
(60, 23, 1, 6, ''),
(61, 23, 1, 9, ''),
(62, 24, 2, 5, ''),
(63, 24, 2, 7, ''),
(64, 25, 2, 6, 'Una Pata esta rota'),
(65, 26, 2, 6, ''),
(66, 26, 2, 6, ''),
(67, 26, 2, 6, ''),
(68, 27, 1, 3, ''),
(69, 27, 1, 4, 'Sabana en mal estado'),
(70, 27, 1, 8, ''),
(71, 27, 1, 4, ''),
(72, 28, 2, 6, ''),
(73, 28, 2, 9, 'Derramaron liquido en la sabana'),
(74, 29, 1, 5, ''),
(75, 29, 1, 6, ''),
(76, 29, 1, 2, '');

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
(6, '', '', '', '', '', '', '1', '', '', '');

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
(6, 'El Grande', '', '001', 11, 6, NULL, 1, 6, 1, '2024-03-08 16:10:07', 2);

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
-- Indices de la tabla `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id_nationality`);

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
-- Indices de la tabla `tb_data_personal`
--
ALTER TABLE `tb_data_personal`
  ADD PRIMARY KEY (`id_data_per`);

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
-- Indices de la tabla `tb_prices_rooms`
--
ALTER TABLE `tb_prices_rooms`
  ADD PRIMARY KEY (`id_prices_rooms`);

--
-- Indices de la tabla `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `room_kindd` (`id_room_kind`),
  ADD KEY `rrom_nummm` (`id_room_number`),
  ADD KEY `hostel_areasss` (`id_hostel_area`),
  ADD KEY `hostales_con_room` (`id_hostel`),
  ADD KEY `floorsss` (`id_floors`);

--
-- Indices de la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  ADD PRIMARY KEY (`id_rooms_beds`),
  ADD KEY `tipo_cama` (`id_bed_kind`),
  ADD KEY `num_cama` (`id_bed_number`),
  ADD KEY `el_id_room` (`id_room`);

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
  MODIFY `id_bed_kind` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bed_number`
--
ALTER TABLE `bed_number`
  MODIFY `id_bed_number` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `currency`
--
ALTER TABLE `currency`
  MODIFY `id_currency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id_discounts` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exchange_rates`
--
ALTER TABLE `exchange_rates`
  MODIFY `id_exchange_rates` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id_nationality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `room_kind`
--
ALTER TABLE `room_kind`
  MODIFY `id_room_kind` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `room_number`
--
ALTER TABLE `room_number`
  MODIFY `id_room_number` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sex`
--
ALTER TABLE `sex`
  MODIFY `id_sex` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id_taxes` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `id_address` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_data_personal`
--
ALTER TABLE `tb_data_personal`
  MODIFY `id_data_per` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_prices_rooms`
--
ALTER TABLE `tb_prices_rooms`
  MODIFY `id_prices_rooms` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `id_room` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  MODIFY `id_rooms_beds` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `z_data_hostel`
--
ALTER TABLE `z_data_hostel`
  MODIFY `id_data_hostel` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `z_hostel`
--
ALTER TABLE `z_hostel`
  MODIFY `id_hostel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Filtros para la tabla `tb_address`
--
ALTER TABLE `tb_address`
  ADD CONSTRAINT `country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON UPDATE CASCADE;

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
-- Filtros para la tabla `tb_room`
--
ALTER TABLE `tb_room`
  ADD CONSTRAINT `floorsss` FOREIGN KEY (`id_floors`) REFERENCES `floors` (`id_floors`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hostales_con_room` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hostel_areasss` FOREIGN KEY (`id_hostel_area`) REFERENCES `hostel_area` (`id_hostel_area`),
  ADD CONSTRAINT `room_kindd` FOREIGN KEY (`id_room_kind`) REFERENCES `room_kind` (`id_room_kind`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rrom_nummm` FOREIGN KEY (`id_room_number`) REFERENCES `room_number` (`id_room_number`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  ADD CONSTRAINT `el_id_room` FOREIGN KEY (`id_room`) REFERENCES `tb_room` (`id_room`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `num_cama` FOREIGN KEY (`id_bed_number`) REFERENCES `bed_number` (`id_bed_number`),
  ADD CONSTRAINT `tipo_cama` FOREIGN KEY (`id_bed_kind`) REFERENCES `bed_kind` (`id_bed_kind`) ON UPDATE CASCADE;

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
