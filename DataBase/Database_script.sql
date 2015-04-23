
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Table usuario
-- Tipo A = Administrador
-- Tipo P = Profesor
-- Tipo E = Estudiante

Create database `afp`;
use `afp`;
-- --------------------------------------------------------
--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Nomina` varchar(15) NOT NULL PRIMARY KEY,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Tipo` char(1) NOT NULL,
  `Puede_Cita` tinyint(1),
  `Cita_Disponible` tinyint(1),
  `Profesor` varchar(15)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ----------------------------------------------------------
--
-- Dumping data for table `usuario`
--
--
-- Table structure for table `alumno`
--

CREATE TABLE `medicion_alumno` (
  `IdMedicion` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Matricula` varchar(15) NOT NULL,
  `Fecha` date NOT NULL,
  `Estatura` int(3) NOT NULL,
  `Peso` Float(6) NOT NULL,
  `PorcentajeGrasa` Float(6) NOT NULL,
  `IMC` Float(6) NOT NULL,
  FOREIGN KEY (Matricula) REFERENCES usuario (Nomina)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ----------------------------------------------------------
CREATE TABLE `registro_diario` (
  `IdRegistro` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Matricula` varchar(15) NOT NULL,
  `Fecha` date NOT NULL,
  `Num_Series` int ,
  `Distancia` Float(6),
  `Tiempo` TIME ,
  `Pulsacion` int ,
  `Pulsacion_1` int,
  `Pulsacion_3` int,
  `Borg` int,
  `Tipo` char(1),
  FOREIGN KEY (Matricula) REFERENCES usuario(Nomina)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
CREATE TABLE `agenda` (
  `IdAgenda` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Matricula_profe` varchar(15) NOT NULL,
  `Matricula_alumno` varchar(15) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` VARCHAR(10) NOT NULL,
  `Asistencia` tinyint(1) NOT NULL,
  FOREIGN KEY (Matricula_profe) REFERENCES usuario(Nomina)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

INSERT INTO `usuario` (`Nomina`, `Nombre`, `Password`, `Tipo`) VALUES
('ADMIN', 'Administrador', 'adminAFP', 'A');

INSERT INTO `usuario` (`Nomina`, `Nombre`, `Password`, `Tipo`) VALUES
('PROFE', 'Profesor', 'profeAFP', 'P');

INSERT INTO `usuario` (`Nomina`, `Nombre`, `Password`, `Tipo`,`Profesor`,`Puede_Cita`,`Cita_Disponible`) VALUES
('ESTUDIANTE', 'Estudiante', 'estudianteAFP', 'E', 'PROFE', 0, 1);

CREATE EVENT AutoDeleteOldNotifications
ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 14 DAY
DO
DELETE LOW_PRIORITY FROM afp.agenda WHERE Fecha < DATE_SUB(NOW(), INTERVAL 14 DAY)

