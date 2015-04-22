
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
  `Puede_Cita` tinyint(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ----------------------------------------------------------
--
-- Dumping data for table `usuario`
--
--
-- Table structure for table `alumno`
--

CREATE TABLE `medicion_alumno` (
  `Matricula` varchar(11) NOT NULL PRIMARY KEY,
  `Fecha` date NOT NULL,
  `Estatura` int(3) NOT NULL,
  `Peso` Float(6) NOT NULL,
  `PorcentajeGrasa` Float(6) NOT NULL,
  `IMC` Float(6) NOT NULL,
  FOREIGN KEY (Matricula) REFERENCES usuario (Nomina)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ----------------------------------------------------------
CREATE TABLE `registro_diario` (
  `Matricula` varchar(11) NOT NULL PRIMARY KEY,
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
  `Matricula_profe` varchar(11) NOT NULL PRIMARY KEY,
  `Matricula_alumno` varchar(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` TIME NOT NULL,
  `Asistencia` tinyint(1) NOT NULL,
  FOREIGN KEY (Matricula_profe) REFERENCES usuario(Nomina)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

INSERT INTO `usuario` (`Nomina`, `Nombre`, `Password`, `Tipo`) VALUES
('ADMIN', 'Administrador', 'adminAFP', 'A');

