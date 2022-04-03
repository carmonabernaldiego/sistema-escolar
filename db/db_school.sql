-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-04-2022 a las 17:54:14
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_school`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administratives`
--

CREATE TABLE `administratives` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `occupation` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `observations` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administratives`
--

INSERT INTO `administratives` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `curp`, `rfc`, `phone`, `address`, `level_studies`, `occupation`, `observations`, `created_at`, `updated_at`) VALUES
('admin', 'Diego', 'Carmona Bernal', '1997-04-05', 'hombre', 'CABD970405HCSRRG03', 'CABD9704052K5', '9614044227', 'Av. Aquiles Serdán 915, Bienestar Social, 29077, Tuxtla Gutiérrez, Chiapas.', 'Ingenieria', 'Programador', '', '2021-12-05 18:33:37', '2022-04-03 06:06:33'),
('admineb405', 'Magnolia', 'Montejo Gómez', '1985-03-16', 'mujer', 'MMGO160385MCSRRG01', 'MMGO160385MCS', '9613459810', 'Av. Tulipanes #132, Bienestar Social, Tuxtla Gutiérrez, Chiapas', 'Licenciatura', 'Administrativo', '', '2021-12-04 02:13:36', '2022-02-05 23:24:23'),
('adminec4e9', 'Rosalinda', 'Pascacio Mendoza', '1997-09-16', 'mujer', 'PMRO970916MCSLLS09', 'PMRO970916MCS', '9654392021', 'Conocido', 'Maestria', 'Recurso Humanos', '', '2021-08-27 03:41:36', '2022-02-03 07:52:57'),
('editor', 'Jesús Antonio', 'Olvera Gálvez', '1989-10-14', 'hombre', 'OGJA891014HCSRRG02', 'OGJA8910142V9', '9614044227', '9 Av. Sur. Ote #2167', 'Maestria', 'Recursos Humanos', '', '2020-12-01 18:33:52', '2021-12-07 22:07:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance`
--

CREATE TABLE `attendance` (
  `id_attendance` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `subject` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `registered` date NOT NULL,
  `update_registered` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `attendance`
--

INSERT INTO `attendance` (`id_attendance`, `id_group`, `school_period`, `semester`, `subject`, `user_teacher`, `registered`, `update_registered`) VALUES
('xfs980s', 'ADMIN_1205', '2021-1', 1, 'CAL_DIF_01', 'teacher_e94ac', '2021-03-09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance_details`
--

CREATE TABLE `attendance_details` (
  `id_attendance` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `subject` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `registered` date NOT NULL,
  `update_registered` date DEFAULT NULL,
  `user_student` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `attend` int(1) NOT NULL DEFAULT '0',
  `tardiness` int(1) NOT NULL DEFAULT '0',
  `absent` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `description` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`career`, `name`, `description`) VALUES
('IDS', 'Ingeniería en Desarrollo de Software', 'Es la aplicación práctica del conocimiento científico y humanístico al diseño y construcción de programas de computadora, diseñando soluciones de software innovadoras y acordes con el entorno social y empresarial, mediante herramientas, técnicas, tecnologías de usabilidad, base de datos, redes, teleproceso y lenguajes de programación. En Politécnica de Chiapas formamos ingenieros profesionales especializados en el desarrollo de software; capaces de crear, innovar y aplicar la tecnología para ofrecer soluciones en las áreas de la comunicación digital, automatización, negocios, sistemas computacionales, educación, transportes, diversión y entretenimiento.'),
('IEM', 'Ingeniería Mecatrónica', 'En esta Ingeniería se combinan diversas disciplinas como la mecánica, electrónica, computación, y control. Las (os) ingenieros mecatrónicos diseñan, integran y desarrollan diversos productos, mecanismos, equipos, maquinaria y sistemas integrales de automatización, así como la elaboración de análisis y consultorías técnicas en procesos relacionados con las áreas de aplicación de la ingeniería mecatrónica, todo esto con la ayuda de herramientas de hardware y software de vanguardia. En la Politécnica de Chiapas contamos con una formación integral, humana, práctica, teórica, empresarial, que permite a nuestras (os) ingenieros desarrollar e implementar tecnología para ofrecer soluciones que contribuyan a mejorar la calidad de vida de las personas así como optimizar los recursos de las empresas. Para ello, contamos con laboratorios equipados, académicos reconocidos y un programa educativo reconocido por una institución de calidad, CACEI.'),
('INGBIO', 'Ingeniería Biomédica', 'En esta rama de la ingeniería se fusionan aspectos de electrónica, medicina, física, informática, química, biología y matemáticas. Las y los ingenieros biomédicos diseñan, crean, desarrollan, innovan e implementan equipos, dispositivos y sistemas médicos que ofrezcan soluciones tecnológicas y científicas en el área de la salud; así también manejan programas de mejoramiento, administración, operación y conservación de instalaciones y equipo hospitalario. En Politécnica de Chiapas formamos ingenieras (os) biomédicos profesionales y especializados, con valores, capaces de desarrollar, adoptar y aplicar la tecnología para ofrecer soluciones científicas y administrativas integrales en el campo de la salud en nuestro país.'),
('INGPLRA', 'Ingeniería Petrolera', 'El ingeniero petrolero se forma aprovechando de manera sustentable los recursos naturales, atendiendo la preservación del medio ambiente, aplicando para ello las nuevas tecnologías, con habilidades, actitudes, aptitudes analíticas y creativas, de liderazgo y calidad humana, con un espíritu de superación permanente para investigar, desarrollar y aplicar el conocimiento científico y tecnológico. Las y los ingenieros petroleros son profesionistas capaces de atender las necesidades emanadas de los procesos de explotación de hidrocarburos, de agua y de energía geotérmica, a fin de redituar beneficios económicos al país y prever los posibles daños ecológicos al medio ambiente. En la Politécnica de Chiapas formamos ingenieros(as) petroleros de manera profesional, técnica y humana, comprometidos con las necesidades sociales, ambientales y económicas.'),
('MATBASICAS', 'Tronco común', ''),
('MTABIOTEC', 'Maestría en Biotecnología', 'Mediante la biotecnología, los científicos buscan formas de aprovechar la \"tecnología biológica\" de los seres vivos para generar alimentos más saludables, mejores medicamentos, materiales más resistentes o menos contaminantes, cultivos más productivos, fuentes de energía renovables e incluso sistemas para eliminar la contaminación.\r\n\r\nLas y los maestros en Biotecnología podrán coadyuvar en la incorporación de procesos y técnicas biotecnológicas para la producción y transformación en diferentes sectores socioeconómicos, así también podrán participar en ámbitos académicos, empresariales y de investigación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `subjects` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_students`
--

CREATE TABLE `groups_students` (
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `user_student` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `school_periods`
--

CREATE TABLE `school_periods` (
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` int(1) NOT NULL,
  `current` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `school_periods`
--

INSERT INTO `school_periods` (`school_period`, `name`, `start_date`, `end_date`, `active`, `current`, `created_at`, `updated_at`) VALUES
('2021-1', 'Enero - Abril 2021', '2021-01-06', '2021-04-09', 1, 0, '2021-12-04 00:57:04', '2022-02-04 06:15:56'),
('2021-2', 'Abril - Julio 2021', '2021-04-30', '2021-07-23', 1, 0, '2021-10-08 20:38:04', '2022-02-04 06:14:40'),
('2021-3', 'Septiembre - Diciembre 2021', '2021-08-30', '2021-12-14', 1, 0, '2021-12-04 00:59:21', '2022-03-13 04:02:16'),
('2022-1', 'Enero - Abril 2022', '2022-01-03', '2022-04-26', 1, 1, '2022-01-05 05:37:49', '2022-03-13 03:27:59'),
('2022-2', 'Abril - Julio 2022', '2022-04-27', '2022-07-08', 1, 0, '2022-04-03 05:30:20', '2022-04-03 06:10:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `documentation` int(1) NOT NULL,
  `admission_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `curp`, `rfc`, `phone`, `address`, `career`, `documentation`, `admission_date`, `created_at`, `updated_at`) VALUES
('stdt8ef8ba', 'Carlos Esteban', 'Robles Flores', NULL, NULL, 'CSJJSSIKJSKLSKOSKJ', 'JNDKJHJDLKJSL', '9651251012', 'Conocido', 'IEM', 0, '2021-10-08', '2022-04-03 17:52:52', NULL),
('student_0beb9', 'Jesus', 'Ruiz Ruiz', NULL, NULL, 'PIJA0SKKS000022236', 'CONOCIDO', '2737283838', 'Conocido', 'IEM', 1, '2021-08-02', '2022-04-03 17:53:02', NULL),
('student_28e64', 'María Juana', 'Pompeya Corzo', NULL, NULL, 'L02LSLSJLJKJ89994P', 'CONOCIDO', '9828782828', 'Conocido', 'IEM', 0, '2021-08-02', '2022-04-03 17:53:06', NULL),
('student_f0404', 'Ricardo', 'Flores Magon', NULL, NULL, 'KKSKK99991P9199191', 'CONOCIDO', '272878328', 'Conocido', 'IEM', 1, '2021-08-02', '2022-04-03 17:53:11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `subject` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `description` text COLLATE utf8_spanish2_ci,
  `user_teachers` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`subject`, `career`, `name`, `semester`, `description`, `user_teachers`) VALUES
('CALDIF01', 'MATBASICAS', 'Calculo Diferencial', 9, 'Calculo jsjsjs', 'teacher_e9418,tchr37db23,teacher_e9408,'),
('CALINT', 'IDS', 'Calculo Integral', 1, '', ',teacher_e9443,tchra80e12,teacher_617af,'),
('DESARROLLO', 'MATBASICAS', 'Software', 3, 'jsjsjsj lalalas', 'teacher_e9408,'),
('EDU_FISC01QR', 'MATBASICAS', 'Educación física', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque venenatis lectus at rhoncus faucibus. Etiam sit amet nulla eu tortor luctus semper. Donec egestas leo nisl, at ornare ex tempus id. Nullam at euismod arcu, vitae bibendum risus. Vivamus cursus elit at diam mattis pretium. Maecenas non condimentum justo, et tempor tortor. Nam at mi commodo, euismod enim non, malesuada felis. Proin quis elementum justo. In posuere, nunc vel ultrices sagittis, velit purus viverra augue, posuere scelerisque dolor magna vel nisl. Aliquam in commodo ligula, at mattis ligula. Curabitur et arcu metus. Mauris neque arcu, volutpat quis volutpat a, bibendum ac magna. Duis pellentesque viverra quam eget euismod.\r\n\r\nPhasellus tincidunt posuere faucibus. Sed imperdiet metus ullamcorper enim consequat tempor. Quisque nec lectus facilisis, gravida nisl sit amet, egestas nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae turpis massa. Aenean gravida commodo ante a maximus. Sed eget mi ac ante hendrerit molestie. Vivamus feugiat purus sit amet lobortis tempor. Quisque neque libero, ultrices non ex id, venenatis convallis lorem. Suspendisse malesuada erat vel ornare interdum. In hac habitasse platea dictumst.', ',teacher_e9408,'),
('INGBAS01', 'IDS', 'Ingles Básico', 1, 'El idioma inglés (English language o English, pronunciado /ˈɪŋɡlɪʃ/) es una lengua germánica occidental que surgió en los reinos anglosajones de Inglaterra y se extendió hasta el Norte en lo que se convertiría en el sudeste de Escocia, bajo la influencia del Reino de Northumbria.', ',teacher_617af,tchra80e12,teacher_e9443,');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `specialty` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `curp`, `rfc`, `phone`, `address`, `level_studies`, `specialty`, `career`, `created_at`, `updated_at`) VALUES
('tchr-0daed', 'jdjjd', 'kkk', '2022-04-20', 'nodecirlo', 'UJJJJJJJJJJJJJJJJJ', 'JJJJJJJJJJJJJ', '2222222222', 'av', 'Ingenieria', 'j', 'IEM', '2022-04-03 17:35:39', NULL),
('tchra80e12', 'Pamela', 'Sánchez', '2022-02-08', 'mujer', 'ATME980215KMN32221', 'ATME980215KMN', '9991020394', 'Av. Siempre Viva', 'Licenciatura', 'Negocios', 'IDS,INGBIO,MATBASICAS,MTABIOTEC', '2022-02-02 00:47:13', '2022-02-07 12:45:38'),
('teacher_5c1ca', 'Moisés', 'Gómez Meléndez', '1996-02-02', 'hombre', 'KSK92992292KSA0000', 'CCCCCCONOCIDO', '9716278838', 'CONOCIDO', 'Ingenieria', 'Cálculo Diferencial', 'IDS,INGPLRA', '2022-02-06 20:37:47', '2022-02-06 20:34:37'),
('teacher_617af', 'Rigoberto', 'Nanguluru Conde', '2022-02-18', 'hombre', 'CLLLS9202JS8KS90SS', 'CCCCCCONOCIDO', '9881877732', 'CONOCIDO', 'Doctorado', 'Maestría en Computación', 'IDS,MATBASICAS', '2022-02-06 20:37:53', '2022-04-03 05:57:35'),
('teacher_e9408', 'Juanita de la Cruz', 'Nepomuceno', '2022-02-08', 'mujer', 'KSKKS020020219100S', 'JJJJJCONOCIDO', '9672282646', 'CONOCIDO', 'Maestria', 'Enseñanza del Español', 'INGBIO,MATBASICAS', '2022-02-06 20:37:59', '2022-02-06 20:38:44'),
('teacher_e9423', 'Carlos Alberto', 'Marín Roblero', '1987-04-15', 'hombre', 'KSKKS020020219100S', 'KKKKKCONOCIDO', '9613334538', 'CONOCIDO', 'Ingenieria', 'Automatas', 'IDS,IEM,INGBIO,INGPLRA,MATBASICAS,MTABIOTEC', '2022-02-06 20:38:03', '2022-04-03 06:16:28'),
('teacher_e9443', 'Jaime', 'Ponce Torres', '2022-02-08', 'hombre', 'KSKKS020020219100S', 'XAXX010101000', '9653649801', 'CONOCIDO', 'Ingenieria', 'Máquinas', 'INGBIO,MATBASICAS', '2022-02-06 20:38:07', '2022-04-03 06:16:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `permissions` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `image_updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user`, `email`, `pass`, `permissions`, `image`, `image_updated_at`, `created_at`, `updated_at`) VALUES
('admin', 'carmonabernaldiego@gmail.com', 'root', 'admin', 'admin221.png', '2022-02-22 15:18:06', '2021-12-05 18:27:39', '2022-04-03 06:10:34'),
('admineb405', 'magnoliamontejogomez@gmail.com', 'admineb405', 'editor', 'user.png', NULL, '2021-12-04 02:13:36', '2022-03-13 02:59:59'),
('adminec4e9', 'rosalindamendoza@gmail.com', 'adminec4e9', 'admin', 'user.png', NULL, '2021-08-27 03:41:36', NULL),
('editor', 'editor@gmail.com', 'editor', 'editor', 'user.png', NULL, '2021-05-01 00:00:00', NULL),
('tchr-0daed', NULL, 'tchr-0daed', 'teacher', 'user.png', NULL, '2022-04-03 17:35:39', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administratives`
--
ALTER TABLE `administratives`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id_attendance`);

--
-- Indices de la tabla `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD KEY `FK_attendance_details_attendance` (`id_attendance`);

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`career`);

--
-- Indices de la tabla `school_periods`
--
ALTER TABLE `school_periods`
  ADD PRIMARY KEY (`school_period`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
