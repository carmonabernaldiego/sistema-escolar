-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla db_escolar.administratives
CREATE TABLE IF NOT EXISTS `administratives` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `documentation` int(1) NOT NULL,
  `observations` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla db_escolar.administratives: 2 rows
/*!40000 ALTER TABLE `administratives` DISABLE KEYS */;
INSERT INTO `administratives` (`user`, `name`, `surnames`, `curp`, `rfc`, `address`, `phone`, `level_studies`, `documentation`, `observations`) VALUES
	('admin', 'Diego', 'Carmona Bernal', 'CABD970405CSRRG03', 'CABD9704052K5', 'Av Francisco Sarabia', '9614044227', 'Ingenieria', 1, ''),
	('admin_d4bf7', 'Damian', 'Esponda Toledo', 'CONOCIDO', 'CONOCIDO', 'Conocido', '9373737737', 'Licenciatura', 1, '');
/*!40000 ALTER TABLE `administratives` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.attendance
CREATE TABLE IF NOT EXISTS `attendance` (
  `id_attendance` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `subject` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `registered` date NOT NULL,
  `update_registered` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_attendance`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla db_escolar.attendance: 1 rows
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` (`id_attendance`, `id_group`, `school_period`, `semester`, `subject`, `user_teacher`, `registered`, `update_registered`) VALUES
	('xfs980s', 'ADMIN_1205', '2021-1', 1, 'CAL_DIF_01', 'teacher_e94ac', '2021-03-09', NULL);
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.attendance_details
CREATE TABLE IF NOT EXISTS `attendance_details` (
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
  `absent` int(1) NOT NULL DEFAULT '0',
  KEY `FK_attendance_details_attendance` (`id_attendance`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla db_escolar.attendance_details: 0 rows
/*!40000 ALTER TABLE `attendance_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendance_details` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.careers
CREATE TABLE IF NOT EXISTS `careers` (
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `description` text COLLATE utf8_spanish2_ci,
  PRIMARY KEY (`career`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla db_escolar.careers: 11 rows
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` (`career`, `name`, `description`) VALUES
	('IDS', 'Ingeniería en Desarrollo de Software', 'Es la aplicación práctica del conocimiento científico y humanístico al diseño y construcción de programas de computadora, diseñando soluciones de software innovadoras y acordes con el entorno social y empresarial, mediante herramientas, técnicas, tecnologías de usabilidad, base de datos, redes, teleproceso y lenguajes de programación. En Politécnica de Chiapas formamos ingenieros profesionales especializados en el desarrollo de software; capaces de crear, innovar y aplicar la tecnología para ofrecer soluciones en las áreas de la comunicación digital, automatización, negocios, sistemas computacionales, educación, transportes, diversión y entretenimiento.'),
	('IEM', 'Ingeniería Mecatrónica', 'En esta Ingeniería se combinan diversas disciplinas como la mecánica, electrónica, computación, y control. Las (os) ingenieros mecatrónicos diseñan, integran y desarrollan diversos productos, mecanismos, equipos, maquinaria y sistemas integrales de automatización, así como la elaboración de análisis y consultorías técnicas en procesos relacionados con las áreas de aplicación de la ingeniería mecatrónica, todo esto con la ayuda de herramientas de hardware y software de vanguardia. En la Politécnica de Chiapas contamos con una formación integral, humana, práctica, teórica, empresarial, que permite a nuestras (os) ingenieros desarrollar e implementar tecnología para ofrecer soluciones que contribuyan a mejorar la calidad de vida de las personas así como optimizar los recursos de las empresas. Para ello, contamos con laboratorios equipados, académicos reconocidos y un programa educativo reconocido por una institución de calidad, CACEI.'),
	('ITA', 'Ingeniería en Tecnología Ambiental', 'Formar ingenieros ambientales competitivos, con dominio de los temas ambientales y ecológicos que se aboquen a solucionar los problemas ambientales de nuestro estado y país, con el propósito de impulsar el desarrollo sustentable mediante la investigación y aplicación de tecnologías ambientales. En la Universidad Politécnica de Chiapas formamos ingenieras (os) en Tecnología Ambiental de manera profesional y especializada, con valores, capaces de desarrollar, adoptar y aplicar la tecnología para ofrecer soluciones integrales en el área del medio ambiente.'),
	('LAGPYMES', 'Licenciatura en Administración y Gestión de PYMES', 'Forma profesionales con capacidades gerenciales, altamente competitivos que respondan a los desafíos que enfrentan las organizaciones en ambientes de incertidumbre; dirigiendo eficazmente sus recursos y funciones a través de una visión vanguardista, para diseñar, evaluar y aplicar estrategias que permitan innovar o mejorar procesos en las organizaciones en un marco de sustentabilidad.'),
	('INGPLRA', 'Ingeniería Petrolera', 'El ingeniero petrolero se forma aprovechando de manera sustentable los recursos naturales, atendiendo la preservación del medio ambiente, aplicando para ello las nuevas tecnologías, con habilidades, actitudes, aptitudes analíticas y creativas, de liderazgo y calidad humana, con un espíritu de superación permanente para investigar, desarrollar y aplicar el conocimiento científico y tecnológico. Las y los ingenieros petroleros son profesionistas capaces de atender las necesidades emanadas de los procesos de explotación de hidrocarburos, de agua y de energía geotérmica, a fin de redituar beneficios económicos al país y prever los posibles daños ecológicos al medio ambiente. En la Politécnica de Chiapas formamos ingenieros(as) petroleros de manera profesional, técnica y humana, comprometidos con las necesidades sociales, ambientales y económicas.'),
	('ITDM', 'Ingeniería en Tecnologías de Manufactura', 'El ingeniero en tecnologías de manufactura es el profesionista capaz de atender las necesidades emanadas de los procesos de transformación de productos manufacturados, contribuyendo al desarrollo local, regional y/o nacional. La combinación de conocimientos de automatización de procesos, tecnologías de manufactura avanzada y técnicas de gestión industrial, hacen del ingeniero en Tecnologías de Manufactura un líder en la industria manufacturera. Las y los ingenieros en Tecnologías de Manufactura de la Universidad Politécnica de Chiapas combinan la aplicación de los conocimientos científicos y tecnológicos para mejorar, diseñar, implantar, automatizar procesos de manufactura, así como administrar y evaluar proyectos en el ámbito de su competencia, con una formación en valores humanos como fundamento de un compromiso real con la sociedad, medio ambiente y las necesidades del crecimiento económico del estado y del país a través de la adquisición de habilidades en tecnologías industriales avanzadas.'),
	('INGENER', 'Ingeniería en Energía', 'La Ingeniería en Energía es una carrera profesional que se centra en los principios fundamentales para la toma de decisiones en la generación, distribución y utilización eficiente de la energía con responsabilidad ambiental, sostenible y social. Así también, estudian las fuentes energéticas alternas (energías renovables) para su transformación en energía secundaria tales como: electricidad, calor, etc. y su uso óptimo en los procesos de equipo y producción. En la Universidad Politécnica de Chiapas formamos ingenieros en energía con sólidos conocimientos basados en la teoría, la práctica y visión empresarial, capaces de ofrecer soluciones científicas y tecnológicas relacionadas con las fuentes convencionales y renovables de energía. El programa educativo de Ingeniería en Energía está acreditado por el Consejo de Acreditación para la Enseñanza de la Ingeniería (CACEI), los profesores pertenecen al cuerpo académico de energía y sustentabilidad que se encuentra consolidado y adscritos al Sistema Nacional de Investigadores (SNI) y/o al Sistema Estatal de Investigadores (SEI).'),
	('INGBIO', 'Ingeniería Biomédica', 'En esta rama de la ingeniería se fusionan aspectos de electrónica, medicina, física, informática, química, biología y matemáticas. Las y los ingenieros biomédicos diseñan, crean, desarrollan, innovan e implementan equipos, dispositivos y sistemas médicos que ofrezcan soluciones tecnológicas y científicas en el área de la salud; así también manejan programas de mejoramiento, administración, operación y conservación de instalaciones y equipo hospitalario. En Politécnica de Chiapas formamos ingenieras (os) biomédicos profesionales y especializados, con valores, capaces de desarrollar, adoptar y aplicar la tecnología para ofrecer soluciones científicas y administrativas integrales en el campo de la salud en nuestro país.'),
	('INGAGRO', 'Ingeniería Agroindustrial', 'En esta ingeniería se mezclan, las ciencias básicas como biología, química, matemáticas, física con la tecnología de alimentos y herramientas de gestión empresarial, a fin de crear y emprender nuevas fuentes de negocios con productos innovadores con alto contenido nutricional, aprovechando las bondades que ofrece la agroindustria, cuidando al medio ambiente. Las y los ingenieros Agroindustriales de la Universidad Politécnica de Chiapas cuentan con formación profesional, técnica y humana. Son capaces de aplicar, mantener, evaluar y seleccionar los procesos de transformación, producción de materias primas e insumos para convertirlos en productos terminados, aplicando herramientas y maquinaria que beneficien al sector productivo agropecuario.'),
	('MTAENEROV', 'Maestría en Energías Renovables', 'La Maestría en Energías Renovables de la Universidad Politécnica de Chiapas representa una excelente opción para todos aquellos que buscan una superación académica para los egresados de licenciaturas de las áreas de las ciencias y las ingenierías, tales como Ingeniería en Energía, Química, Mecánica, Eléctrica, Industrial, Física, Arquitectura y demás carreras afines.'),
	('MTABIOTEC', 'Maestría en Biotecnología', 'La Universidad Politécnica de Chiapas ofrece formar profesionales críticos capaces de generar y aportar conocimientos científicos y tecnológicos en el área de la Biotecnología, enfocándose siempre en buscar beneficios para los diversos sectores de la sociedad.\r\n\r\nMediante la biotecnología, los científicos buscan formas de aprovechar la "tecnología biológica" de los seres vivos para generar alimentos más saludables, mejores medicamentos, materiales más resistentes o menos contaminantes, cultivos más productivos, fuentes de energía renovables e incluso sistemas para eliminar la contaminación.\r\n\r\nLas y los maestros en Biotecnología podrán coadyuvar en la incorporación de procesos y técnicas biotecnológicas para la producción y transformación en diferentes sectores socioeconómicos, así también podrán participar en ámbitos académicos, empresariales y de investigación.');
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `subjects` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla db_escolar.groups: 2 rows
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id_group`, `school_period`, `name`, `semester`, `subjects`) VALUES
	('ADMIN2021', '2021-1', 'Desarrollo Web', 1, 'DSWEB2Q,'),
	('ADMIN_1205', '2021-1', 'Administración de Empresas 1205', 1, 'CAL_DIF_01,FUND_INV_DCSM09,ING_BAS_1,');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.groups_students
CREATE TABLE IF NOT EXISTS `groups_students` (
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `user_student` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla db_escolar.groups_students: 5 rows
/*!40000 ALTER TABLE `groups_students` DISABLE KEYS */;
INSERT INTO `groups_students` (`id_group`, `school_period`, `user_student`) VALUES
	('ADMIN_1205', '2021-1', 'student_f0404'),
	('ADMIN_1205', '2021-1', 'student_28e64'),
	('ADMIN_1205', '2021-1', 'student_0beb9'),
	('ADMIN2021', '2021-1', 'student_f0404'),
	('ADMIN2021', '2021-1', 'student_28e64');
/*!40000 ALTER TABLE `groups_students` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.school_periods
CREATE TABLE IF NOT EXISTS `school_periods` (
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` int(1) NOT NULL,
  `current` int(1) NOT NULL,
  PRIMARY KEY (`school_period`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla db_escolar.school_periods: 2 rows
/*!40000 ALTER TABLE `school_periods` DISABLE KEYS */;
INSERT INTO `school_periods` (`school_period`, `start_date`, `end_date`, `active`, `current`) VALUES
	('2021-1', '2021-01-08', '2021-07-07', 1, 1),
	('2021-2', '2021-07-21', '2021-12-21', 1, 0);
/*!40000 ALTER TABLE `school_periods` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.students
CREATE TABLE IF NOT EXISTS `students` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `documentation` int(1) NOT NULL,
  `observations` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla db_escolar.students: 3 rows
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`user`, `school_period`, `name`, `surnames`, `curp`, `rfc`, `address`, `phone`, `level_studies`, `documentation`, `observations`) VALUES
	('student_28e64', '2021-1', 'María Juana', 'Pompeya Corzo', 'CONOCIDO', 'CONOCIDO', 'Conocido', '9828782828', 'Licenciatura', 1, ''),
	('student_0beb9', '2021-1', 'Jesus', 'Ruiz Ruiz', 'CONOCIDO', 'CONOCIDO', 'Conocido', '2737283838', 'Licenciatura', 1, ''),
	('student_f0404', '2021-1', 'Ricardo', 'Flores Magon', 'CONOCIDO', 'CONOCIDO', 'Conocido', '272878328', 'Licenciatura', 1, '');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `subject` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `description` text COLLATE utf8_spanish2_ci,
  `semester` int(2) NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla db_escolar.subjects: 4 rows
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`subject`, `career`, `name`, `description`, `semester`, `user_teacher`) VALUES
	('ING_BAS_1', '2021-1', 'Ingles Básico I', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit viverra libero nec posuere. Mauris convallis neque et magna venenatis, eu egestas urna consequat. Donec tellus sem, pretium non leo eget, euismod consequat augue. Aliquam posuere, massa sed scelerisque rhoncus, nulla odio sodales ligula, et pretium arcu nunc quis ex. Integer in dapibus massa. Sed pulvinar semper purus id sagittis. Integer quam lorem, elementum eget efficitur a, venenatis sit amet metus. Sed gravida aliquet arcu non bibendum. Aliquam ac mattis odio. Nullam molestie bibendum eleifend. Proin auctor sodales tortor vitae interdum. Etiam in convallis elit. Duis eu urna ut elit dapibus suscipit.', 1, 'teacher_e94ac'),
	('CAL_DIF_01', '2021-1', 'Calculo Diferencial', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit viverra libero nec posuere. Mauris convallis neque et magna venenatis, eu egestas urna consequat. Donec tellus sem, pretium non leo eget, euismod consequat augue. Aliquam posuere, massa sed scelerisque rhoncus, nulla odio sodales ligula, et pretium arcu nunc quis ex. Integer in dapibus massa. Sed pulvinar semper purus id sagittis. Integer quam lorem, elementum eget efficitur a, venenatis sit amet metus. Sed gravida aliquet arcu non bibendum. Aliquam ac mattis odio. Nullam molestie bibendum eleifend. Proin auctor sodales tortor vitae interdum. Etiam in convallis elit. Duis eu urna ut elit dapibus suscipit.', 1, 'teacher_e94ac'),
	('DSWEB2Q', '2021-1', 'Diseño CSS', '', 1, 'teacher_e94ac'),
	('FUND_INV_DCSM09', '2021-1', 'Fundamentos de Investigación', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit viverra libero nec posuere. Mauris convallis neque et magna venenatis, eu egestas urna consequat. Donec tellus sem, pretium non leo eget, euismod consequat augue. Aliquam posuere, massa sed scelerisque rhoncus, nulla odio sodales ligula, et pretium arcu nunc quis ex. Integer in dapibus massa. Sed pulvinar semper purus id sagittis. Integer quam lorem, elementum eget efficitur a, venenatis sit amet metus. Sed gravida aliquet arcu non bibendum. Aliquam ac mattis odio. Nullam molestie bibendum eleifend. Proin auctor sodales tortor vitae interdum. Etiam in convallis elit. Duis eu urna ut elit dapibus suscipit.', 1, 'teacher_e94ac');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `documentation` int(1) NOT NULL,
  `observations` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla db_escolar.teachers: 3 rows
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`user`, `name`, `surnames`, `curp`, `rfc`, `address`, `phone`, `level_studies`, `documentation`, `observations`) VALUES
	('teacher_5c1ca', 'Moisés', 'Gómez Meléndez', 'CONOCIDO', 'CONOCIDO', 'Conocido', '9716278838', 'Licenciatura', 1, ''),
	('teacher_617af', 'Rigoberto', 'Nanguluru Conde', 'CONOCIDO', 'CONOCIDO', 'Conocido', '9881877732', 'Licenciatura', 1, ''),
	('teacher_e94ac', 'Fabiola', 'Cadenas Roblero', 'CONOCIDO', 'CONOCIDO', 'Conocido', '9672282892', 'Licenciatura', 1, 'Ninguna');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

-- Volcando estructura para tabla db_escolar.users
CREATE TABLE IF NOT EXISTS `users` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `permissions` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla db_escolar.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user`, `email`, `pass`, `permissions`, `image`) VALUES
	('admin', 'carmonabernaldiego@gmail.com', 'root', 'admin', 'admin84.png'),
	('admin_d4bf7', 'editor@gmail.com', 'verga', 'editor', 'user.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
