SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS bd_BibliotecaUCSS;

USE bd_BibliotecaUCSS;

DROP TABLE IF EXISTS alumno;

CREATE TABLE `alumno` (
  `AL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AL_CODIGO` varchar(19) DEFAULT NULL,
  `AL_NOMBRE` varchar(99) DEFAULT NULL,
  `AL_APELLIDO` varchar(99) DEFAULT NULL,
  `AL_DNI` varchar(9) DEFAULT NULL,
  `AL_EDAD` varchar(3) DEFAULT NULL,
  `AL_EMAIL` varchar(99) DEFAULT NULL,
  `AL_CICLO` varchar(9) NOT NULL,
  `USUARIO` varchar(99) DEFAULT NULL,
  `PASSWORD` varchar(99) DEFAULT NULL,
  `AL_FOTO` varchar(99) DEFAULT NULL,
  `CA_ID` int(11) DEFAULT NULL,
  `tipousu_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`AL_ID`),
  UNIQUE KEY `USUARIO` (`USUARIO`),
  KEY `CA_ID` (`CA_ID`),
  KEY `tipousu_ID` (`tipousu_ID`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`CA_ID`) REFERENCES `carrera` (`CA_ID`),
  CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`tipousu_ID`) REFERENCES `tipousuario` (`tipousu_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO alumno VALUES("1","201701","RODOLFO MARTIN","SEGURA DOMINGUEZ","72726282","22","martin.segura_d@hotmail.com","X","MSEGURA","martin123","201701.png","1","3");
INSERT INTO alumno VALUES("2","201702","VICTOR ENRIQUE","QUEVEDO DIOSES","12345678","45","victorquevedo1975@gmail.com","X","vquevedo","victor123","201702.png","2","4");
INSERT INTO alumno VALUES("3","201703","ALEXIS JESUS","GUTIERREZ MORIANO","78945625","22","alexis.villafuerte@gmail.com","XI","GJESUS","JESUS123","201703.jpg","3","3");
INSERT INTO alumno VALUES("4","201704","NATHAN ARACELY","TERRAZAS MENDEZ","12345682","22","terrazas.duenas@outlook.com","IX","TARACELY","NATHAN123","201703.jpg","4","3");
INSERT INTO alumno VALUES("5","2015102104","BETSABE DORITA","BENDEZU GRANADOS","","18","2015102104@ucss.edu.pe","v","2015102104","2015102104","BETZA.png","1","3");
INSERT INTO alumno VALUES("6","2015200333","FIORELLA","BENITES BENITES","34345","18","","","2015200333","2015200333","SANDRA.png","1","3");
INSERT INTO alumno VALUES("8","2015101176","JHOCEPH","QUISPE MOTTA","","","","","2015101176","2015101176","JOCEPH.png","2","3");
INSERT INTO alumno VALUES("9","2015101904","LISBETHPAMELA\n","GARAY ZAVALA","","","","","2015101904","2015101904","PAMELA.png","1","3");
INSERT INTO alumno VALUES("19","2015101715","sANDOVAL AUCCASI","IRVIN DAVID","92726282","22","","X","2015101715","2015101715","IRVIN.png","1","3");
INSERT INTO alumno VALUES("20","2015100020","JUNIOR ","HUANCA","","","","","2015100020","2015100020","JUNIOR.png","4","3");
INSERT INTO alumno VALUES("21","2015200403","YANINA","HUAROTO","","","","","2015200403","2015200403","YANINA.png","1","3");
INSERT INTO alumno VALUES("22","2015100550","FRANCO","LOPEZ","","","","","2015100550","2015100550","FRANCO.png","1","3");
INSERT INTO alumno VALUES("23","2015100253","KEVIN","MAMANI","","","","","2015100253","2015100253","KEVIN.png","1","3");
INSERT INTO alumno VALUES("24","2015100447","JESUS","CASASOLA","","","","","2015100447","2015100447","PAOLO.png","1","3");
INSERT INTO alumno VALUES("25","2000","Juan","Paredes","07122667","25","jparedes@gmail.com","","user01","user01","paredes.png\n","1","3");
INSERT INTO alumno VALUES("26","2001","Carlos","Perez","5345","21","cperez@gmail.com","","user02","user02","carlos.png","2","3");
INSERT INTO alumno VALUES("27","2002","lucia","ramos","54545","23","luciar@gmail.com","x","user03","user03","lucia.png","4","4");
INSERT INTO alumno VALUES("29","201744","X","X","2","2","X","VIII","X","X","nodisponible.png","1","4");
INSERT INTO alumno VALUES("30","201743","Z","Z","2","4","Z","XI","Z","Z","nodisponible.png","3","4");
INSERT INTO alumno VALUES("31","201758","G","G","454","25","g","VI","GGG","g","nodisponible.png","3","4");
INSERT INTO alumno VALUES("32","201744","MARTIN","MARTIN","4568522","25","MARTIN@GMAIL.COM","VIII","UBER","UBER","nodisponible.png","3","4");



DROP TABLE IF EXISTS autor;

CREATE TABLE `autor` (
  `AU_ID` int(11) NOT NULL,
  `AU_NOMBRE` varchar(199) DEFAULT NULL,
  PRIMARY KEY (`AU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO autor VALUES("1","DAVID BERNOULI ZAMPON");
INSERT INTO autor VALUES("2","ENRIQUE TUESTA DECLONIO");
INSERT INTO autor VALUES("3","MANUEL TORRES REMON");
INSERT INTO autor VALUES("4","LEOBALDO LOPEZ ROMAN");
INSERT INTO autor VALUES("5","LUIS JOYANES AGUILAR");
INSERT INTO autor VALUES("6","LUQUE WELLING");
INSERT INTO autor VALUES("7","FRANCISCO JOSE GONZALES LOZANO");



DROP TABLE IF EXISTS carrera;

CREATE TABLE `carrera` (
  `CA_ID` int(11) NOT NULL,
  `CA_NOMBRE` varchar(199) DEFAULT NULL,
  `CAR_DESCRIPCION` varchar(499) DEFAULT NULL,
  `FA_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CA_ID`),
  KEY `fk_fa_id` (`FA_ID`),
  CONSTRAINT `fk_fa_id` FOREIGN KEY (`FA_ID`) REFERENCES `facultad` (`FA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO carrera VALUES("1","INGENIERIA DE SISTEMAS","ESTA CARRERA ES SUPER XVR","1");
INSERT INTO carrera VALUES("2","INGENIERIA ELECTRONICA","ESTA CARRERA TAMBIEN ES XVR","1");
INSERT INTO carrera VALUES("3","ADMINISTRACION DE EMPRESAS","ESTA CARRERA ES INTERESANTE ","2");
INSERT INTO carrera VALUES("4","NEGOCIOS INTERNACIONALES","ESTA CARRERA ES MUY NEGOCIADORA","2");



DROP TABLE IF EXISTS categoria;

CREATE TABLE `categoria` (
  `CAT_ID` int(11) NOT NULL,
  `CAT_NOMBRE` varchar(199) DEFAULT NULL,
  `CAT_DESCRIPCION` varchar(299) DEFAULT NULL,
  PRIMARY KEY (`CAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO categoria VALUES("1","FISICA BASICA","PARA INGENIERIA CICLOS 1,2,3");
INSERT INTO categoria VALUES("2","MATEMATICA BASICA","PARA INGENIERIA CICLOS 1,2,3");
INSERT INTO categoria VALUES("3","SISTEMAS ","INGENIERÍA DE SISTEMAS");
INSERT INTO categoria VALUES("4","MECANICA","INGENIERIA MECANICA");



DROP TABLE IF EXISTS facultad;

CREATE TABLE `facultad` (
  `FA_ID` int(11) NOT NULL,
  `FA_NOMBRE` varchar(199) DEFAULT NULL,
  `FA_DESCRIPCION` varchar(499) DEFAULT NULL,
  PRIMARY KEY (`FA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO facultad VALUES("1","FISE","FACULTAD DE INGENIERIA DE SISTEMAS Y ELECTRONICA");
INSERT INTO facultad VALUES("2","FAyN","FACULTAD DE ADMINISTRACION Y NEGOCIOS");



DROP TABLE IF EXISTS libro;

CREATE TABLE `libro` (
  `LI_ID` int(11) NOT NULL,
  `LI_CODIGO` varchar(99) CHARACTER SET latin1 DEFAULT NULL,
  `LI_NOMBRE` varchar(199) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `AU_ID` int(11) DEFAULT NULL,
  `CAT_ID` int(11) DEFAULT NULL,
  `LI_DESCRIPCION` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `LI_CONTENIDO` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `LI_PORTADA` varchar(99) CHARACTER SET latin1 DEFAULT NULL,
  `LI_FECHAPUBLIC` date NOT NULL,
  `LI_STOCK` int(11) DEFAULT NULL,
  `UBI_ID` int(11) NOT NULL,
  PRIMARY KEY (`LI_ID`),
  KEY `fk_au_id` (`AU_ID`),
  KEY `fk_cat_id` (`CAT_ID`),
  KEY `UBI_ID` (`UBI_ID`),
  CONSTRAINT `fk_au_id` FOREIGN KEY (`AU_ID`) REFERENCES `autor` (`AU_ID`),
  CONSTRAINT `fk_cat_id` FOREIGN KEY (`CAT_ID`) REFERENCES `categoria` (`CAT_ID`),
  CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`UBI_ID`) REFERENCES `ubigeo` (`UBI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO libro VALUES("1","FISI201701","Problemas Resueltos de Física General ","1","1","Este libro constituye una completa colección de problemas detalladamente resueltos que fueron propuestos a los alumnos mas avanzados de los primeros cursos de la facultad de física de la Universidad de Lomonosov de Moscu en seminarios especiales. Los problemas abarcan las siguientes disciplinas: mecanica, fisica estadistica, termodinamica, electricidad, magnetismo y optica.","Prólogo de la primera edición en ruso\nCapítulo 1.Mecanica\n§ 1. Cinemática del punto material y de los cuerpos sólidos\n§ 2. Consecuencias de las transformaciones de Lorentz\n§ 3. Dinámica del punto material\n§ 4. Movimiento con rozamiento seco\n§ 5. Movimiento de los sistemas de puntos materiales y cuerpos sólidos\n§ 6. Leyes de conservación de la cantidad de movimiento, del momento angular y de la energía\n§ 7. Sistemas de coordenadas no inerciales\n§ 8. Movimiento de los cuerpos de masa variable\n§ 9. Oscilaciones propias\n§ 10.Oscilaciones amortiguadas y forzadas\nSoluciones de los problemas de autocontrol del Capítulo 1\nCapítulo 2.Física estadística y termodinámica\n§ 11. Método estadístico\n§ 12. Método termodinámico\n§ 13. Gas electrónico y gas fotónico\n§ 14.Transiciones de fase\nSoluciones de los problemas de autocontrol del Capítulo 2\nCapítulo 3.Electricidad y magnetismo\n§ 15. Introducción a los problemas de electrostática\n§ 16. Distribución de la carga en la superficie de un conductor aislado\n§ 17. Conductores en un campo electrostático exterior\n§ 18. Campo electrostático en presencia de dieléctricos\n§ 19. Energía del campo electrostático\n§ 20. Campo magnético de corrientes continuas y materiales magnéticos\n§ 21. Energía del campo magnético\n§ 22. Campo electromagnético de una carga en movimiento\nCapítulo 4.Óptica\n§ 23. Radiación de los osciladores\n§ 24. Interferencia de la luz\n§ 25. Difracción de la luz ","fisi02.png","1995-11-08","4","1");
INSERT INTO libro VALUES("2","FISI201702","Fisica para la ciencia y la tecnología (varios tomos) ","7","1","Teoría y problemas (nivel 1r ciclo) ","Esta obra compuesta por dos tomos, el 1º dedicado a la mecánica, oscilaciones y Ondas, y Termodinámica; mientras que el 2º tomo se centra en electricidad y magnetismo, luz, y fundamentos básicos de la física moderna (mecanica cuántica, relatividad y estructura de la matéria).\nRecordemos que es una libro de Física General, y como tal; encontraremos falta de rigor en algunos de los temas incluidos. Incluye física con matemáticas muy elementales. A destacar la multitud de problemas que vienen, la obra se basa bastante en la comprensión y realización de ejercicios con un nivel teórico de física elemental y básico. Para ello encontraremos en cada tema un gran repertorio de problemas realizados, explicados y analizados paso a paso. Ademas de incluir una gran lista de problemas al final del tomo con sus respectivas soluciones.\nEn la obra se incluyen detalles como; anécdotas y breves biografías de físicos; secciones como: explorando la naturaleza y temario opcional que quizás se escapé de las ideas de una física general, elemental y básica. Eso si, siempre acompañado de fotografías de gran calidad, dibujos y esquemas que ayudan bastante para la comprensión de la materia.\nEn conclusión es una obra, completa (nunca se llega a profundizar), y sobretodo elemental; pasando a ser inútil para alumnos que hayan superado el 1º curso de la licenciatura de física; pero obra excepcional para adquirir un buen nivel básico (pre-universitario) y en ocasiones para nivel de 1º de carrera.\nAsí pues es una buena opción para reforzar tus conocimientos de una física elemental y útil para practicar con ejercicios; que mucho rigor no tendrá pero ejercicios...","fisi05.jpg","1990-11-08","5","2");
INSERT INTO libro VALUES("3","HTML01","HTML Y CSS3","3","3","EXCELENTE html","capas","SIS001.jpg","2017-11-01","788","1");
INSERT INTO libro VALUES("4","HPMYSQL","PROGRAMACION  PHP Y MYSQL","4","3","PROGRAMACION WEB","MUY BUENO","nodisponible.png","2016-03-17","5","1");
INSERT INTO libro VALUES("5","MECA01","RESISTENCIA DE MATERIALES","2","4","BUEN MATERIAL","EXCELENTE MATERIAL","MECA001.jpg","2017-11-21","293","2");
INSERT INTO libro VALUES("6","MECA02","MECANICA SOLIDA","6","4","MECANICA SOLIDA","MATERIAL SOLIDO","MECA002.jpg","2017-11-25","559","1");
INSERT INTO libro VALUES("7","PHPMYSQL001","PHP Y MYSQL","3","3","BUEN LIBRO","BUENA PROGRAMACION","PHPMYSQL001.jpg","2017-11-01","592","2");
INSERT INTO libro VALUES("8","POO1","Programacion Orientada a Objetos","5","3","Buen Libro","Buenas Ideas","P001.jpg","2017-11-12","491","2");
INSERT INTO libro VALUES("9","P002","Estructura de POO","4","3","Buen Libro","bastante","P002.jpg","2017-11-30","195","2");



DROP TABLE IF EXISTS noticia;

CREATE TABLE `noticia` (
  `NOTI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOTI_CODIGO` varchar(19) DEFAULT NULL,
  `NOTI_TITULO` varchar(99) CHARACTER SET utf8 DEFAULT NULL,
  `NOTI_DESCRIPCION` varchar(199) CHARACTER SET utf8 DEFAULT NULL,
  `NOTI_TEXTO` varchar(1999) CHARACTER SET utf8 DEFAULT NULL,
  `NOTI_FECHA` date DEFAULT NULL,
  `NOTI_PORTADA` varchar(29) DEFAULT NULL,
  `UBI_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`NOTI_ID`),
  KEY `UBI_ID` (`UBI_ID`),
  CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`UBI_ID`) REFERENCES `ubigeo` (`UBI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO noticia VALUES("1","2017001","INAUGURACION DE LA BIBLIOTECA VIRTUAL UCSS","ESTE SERA EL APP PARA RESERVA DE LIBROS EN LA UCSS.","ESTA MARAVILLOSA APP PROMETE DISMINUIR TIEMPOS EN RESERVA , ENTREGA Y DEVOLUCION DE LIBROS , PARA PODER AGILIZAR LOS PROCESOS Y MEJORAR LA CALIDAD DE SERVICIO AL ESTUDIANTE.","2017-10-16","2017001.jpg","1");



DROP TABLE IF EXISTS reserva;

CREATE TABLE `reserva` (
  `RE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RE_CODIGO` varchar(19) DEFAULT NULL,
  `RE_FECHEMI` datetime DEFAULT NULL,
  `RE_FECHDEVOLU` datetime DEFAULT NULL,
  `RE_FECHRET` datetime DEFAULT NULL,
  `RE_ESTADO` varchar(1) NOT NULL,
  `AL_ID` int(11) DEFAULT NULL,
  `LI_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`RE_ID`),
  KEY `LI_ID` (`LI_ID`),
  KEY `AL_ID` (`AL_ID`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`LI_ID`) REFERENCES `libro` (`LI_ID`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`AL_ID`) REFERENCES `alumno` (`AL_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

INSERT INTO reserva VALUES("7","POO12017022017-11-0","2017-11-04 14:25:06","","2017-11-04 22:33:26","1","2","8");
INSERT INTO reserva VALUES("8","HPMYSQL2017022017-1","2017-11-04 14:25:21","","2017-11-04 22:34:11","1","2","4");
INSERT INTO reserva VALUES("11","MECA012017012017-11","2017-11-04 15:29:39","","2017-11-04 22:34:06","1","1","5");
INSERT INTO reserva VALUES("12","FISI201702201702201","2017-11-04 20:20:00","","2017-11-04 22:34:00","1","2","2");
INSERT INTO reserva VALUES("14","MECA022017012017-11","2017-11-06 09:17:33","","2017-11-06 11:13:12","1","1","6");
INSERT INTO reserva VALUES("15","HTML012017022017-11","2017-11-10 11:45:03","","2017-11-10 12:31:51","1","2","3");
INSERT INTO reserva VALUES("16","MECA022017012017-11","2017-11-10 13:19:03","","2017-11-10 13:20:50","1","1","6");
INSERT INTO reserva VALUES("17","PHPMYSQL00120170220","2017-11-10 13:26:00","","2017-11-10 13:27:28","1","2","7");
INSERT INTO reserva VALUES("18","FISI201701201702201","2017-11-10 13:32:45","","2017-11-10 13:34:57","1","2","1");
INSERT INTO reserva VALUES("19","MECA022017022017-11","2017-11-10 13:32:52","","2017-11-10 13:34:22","1","2","6");
INSERT INTO reserva VALUES("21","P0022017012017-11-1","2017-11-10 14:06:17","","2017-11-10 14:08:50","2","1","9");
INSERT INTO reserva VALUES("22","FISI201702201702201","2017-11-12 09:45:09","","2017-11-12 10:04:43","1","2","2");
INSERT INTO reserva VALUES("23","MECA022017022017-11","2017-11-12 09:46:21","","2017-11-12 10:04:40","1","2","6");
INSERT INTO reserva VALUES("24","POO12017022017-11-1","2017-11-12 10:16:59","","2017-11-12 10:18:29","1","2","8");
INSERT INTO reserva VALUES("25","P0022017012017-11-1","2017-11-14 11:21:23","","2017-11-14 15:45:08","1","1","9");
INSERT INTO reserva VALUES("26","POO12017012017-11-1","2017-11-14 11:21:27","","2017-11-14 15:45:03","1","1","8");
INSERT INTO reserva VALUES("27","HTML012017012017-11","2017-11-14 11:21:34","","2017-11-14 11:22:48","1","1","3");
INSERT INTO reserva VALUES("28","FISI201701201702201","2017-11-14 15:46:45","","2017-11-14 15:49:46","1","2","1");
INSERT INTO reserva VALUES("29","MECA012017022017-11","2017-11-14 15:49:09","","2017-11-14 15:49:41","1","2","5");
INSERT INTO reserva VALUES("30","HTML012017022017-11","2017-11-17 18:14:52","","2017-11-17 18:15:19","1","2","3");
INSERT INTO reserva VALUES("31","PHPMYSQL00120170220","2017-11-17 18:15:48","","2017-11-17 18:16:29","1","2","7");
INSERT INTO reserva VALUES("32","HTML012015102104201","2017-11-23 09:46:26","","2017-11-23 17:19:31","1","5","3");
INSERT INTO reserva VALUES("33","MECA012015102104201","2017-11-23 09:48:18","","2017-11-23 10:07:52","1","5","5");
INSERT INTO reserva VALUES("43","MECA012015101176201","2017-11-23 10:04:14","","2017-11-23 10:07:39","1","8","5");
INSERT INTO reserva VALUES("44","POO120151011762017-","2017-11-23 10:04:18","","2017-11-23 10:07:34","1","8","8");
INSERT INTO reserva VALUES("45","FISI201701201510171","2017-11-23 10:18:48","","2017-11-23 18:10:52","1","19","1");
INSERT INTO reserva VALUES("46","FISI201702201520040","2017-11-23 10:43:47","","2017-11-23 18:10:49","1","21","2");
INSERT INTO reserva VALUES("47","FISI201702201520040","2017-11-23 10:44:04","","2017-11-23 18:10:35","1","21","2");
INSERT INTO reserva VALUES("48","HTML012015200403201","2017-11-23 10:44:33","","2017-11-23 18:10:46","1","21","3");
INSERT INTO reserva VALUES("49","FISI201702201520040","2017-11-23 10:45:04","","2017-11-23 18:10:33","1","21","2");
INSERT INTO reserva VALUES("51","PHPMYSQL00120152004","2017-11-23 10:48:56","","2017-11-23 18:08:26","1","21","7");
INSERT INTO reserva VALUES("54","MECA022015100447201","2017-11-23 10:50:04","","2017-11-23 17:24:42","1","24","6");
INSERT INTO reserva VALUES("55","HTML012015200333201","2017-11-23 11:08:11","","2017-11-23 17:24:36","1","6","3");
INSERT INTO reserva VALUES("56","HPMYSQL201520033320","2017-11-23 11:08:20","","2017-11-23 17:24:03","1","6","4");
INSERT INTO reserva VALUES("57","PHPMYSQL00120152003","2017-11-23 11:08:33","","2017-11-23 17:24:32","1","6","7");
INSERT INTO reserva VALUES("58","HTML012015101715201","2017-11-23 11:09:33","","2017-11-23 17:24:29","1","19","3");
INSERT INTO reserva VALUES("59","MECA012015101715201","2017-11-23 11:09:38","","2017-11-23 17:24:26","1","19","5");
INSERT INTO reserva VALUES("60","PHPMYSQL00120152003","2017-11-23 11:12:16","","2017-11-23 17:24:23","1","6","7");
INSERT INTO reserva VALUES("62","MECA012015200403201","2017-11-23 11:23:49","","2017-11-23 17:24:19","1","21","5");
INSERT INTO reserva VALUES("63","MECA022015102104201","2017-11-23 11:23:51","","2017-11-23 17:24:07","1","5","6");
INSERT INTO reserva VALUES("64","HTML012015200403201","2017-11-23 11:23:53","","2017-11-23 17:23:58","1","21","3");
INSERT INTO reserva VALUES("65","FISI201702201510171","2017-11-23 11:23:54","","2017-11-23 17:23:49","1","19","2");
INSERT INTO reserva VALUES("67","POO120151021042017-","2017-11-23 11:23:55","","2017-11-23 17:23:43","1","5","8");
INSERT INTO reserva VALUES("68","P00220151011762017-","2017-11-23 11:23:56","","2017-11-23 17:23:41","1","8","9");
INSERT INTO reserva VALUES("69","POO120152004032017-","2017-11-23 11:23:57","2017-11-23 17:20:52","2017-11-23 17:19:16","2","21","8");
INSERT INTO reserva VALUES("70","HTML012015101904201","2017-11-23 11:24:00","","2017-11-23 17:23:38","1","9","3");
INSERT INTO reserva VALUES("71","PHPMYSQL00120151005","2017-11-23 11:24:02","","2017-11-23 17:23:34","1","22","7");
INSERT INTO reserva VALUES("72","POO120151002532017-","2017-11-23 11:24:18","","2017-11-23 17:23:28","1","23","8");
INSERT INTO reserva VALUES("73","HTML012015100550201","2017-11-23 11:24:21","","2017-11-23 17:23:25","1","22","3");
INSERT INTO reserva VALUES("74","PHPMYSQL00120151019","2017-11-23 11:25:11","","2017-11-23 17:23:21","1","9","7");
INSERT INTO reserva VALUES("75","MECA012015102104201","2017-11-23 11:25:19","","2017-11-23 17:23:17","1","5","5");
INSERT INTO reserva VALUES("76","PHPMYSQL00120151011","2017-11-23 11:25:22","","2017-11-23 17:23:12","1","8","7");
INSERT INTO reserva VALUES("77","HPMYSQL201510025320","2017-11-23 11:25:23","","2017-11-23 17:23:07","1","23","4");
INSERT INTO reserva VALUES("79","FISI201701201520040","2017-11-23 11:25:25","","2017-11-23 17:19:10","1","21","1");
INSERT INTO reserva VALUES("80","POO120151005502017-","2017-11-23 11:25:26","","2017-11-23 17:23:04","1","22","8");
INSERT INTO reserva VALUES("81","MECA022015101715201","2017-11-23 11:25:28","","2017-11-23 17:23:01","1","19","6");
INSERT INTO reserva VALUES("82","FISI201702201510044","2017-11-23 11:25:30","","2017-11-23 17:22:58","1","24","2");
INSERT INTO reserva VALUES("83","POO120151019042017-","2017-11-23 11:25:31","","2017-11-23 17:22:53","1","9","8");
INSERT INTO reserva VALUES("85","MECA012015100447201","2017-11-23 11:25:44","","2017-11-23 17:22:56","1","24","5");
INSERT INTO reserva VALUES("86","FISI201701201520040","2017-11-23 11:25:44","","2017-11-23 17:22:51","1","21","1");
INSERT INTO reserva VALUES("88","HPMYSQL201520040320","2017-11-23 11:26:06","","2017-11-23 17:22:44","1","21","4");
INSERT INTO reserva VALUES("90","MECA022015101904201","2017-11-23 11:26:32","2017-11-24 15:02:15","2017-11-23 17:21:09","2","9","6");
INSERT INTO reserva VALUES("91","FISI201702201510190","2017-11-23 11:26:39","2017-11-24 15:01:43","2017-11-23 17:21:05","2","9","2");
INSERT INTO reserva VALUES("92","HTML012015100253201","2017-11-23 14:54:54","2017-11-24 15:01:11","2017-11-23 17:19:20","2","23","3");
INSERT INTO reserva VALUES("93","FISI201702201702201","2017-11-23 18:16:10","","2017-12-05 00:22:41","1","2","2");
INSERT INTO reserva VALUES("94","HTML012017022017-12","2017-12-01 18:26:15","","2017-12-05 00:22:38","1","2","3");
INSERT INTO reserva VALUES("95","FISI201702201702201","2017-12-02 10:44:26","2017-12-05 00:33:34","2017-12-02 11:26:15","2","2","2");
INSERT INTO reserva VALUES("96","PHPMYSQL00120170120","2017-12-05 00:35:23","2017-12-05 00:37:53","2017-12-05 00:36:29","1","1","7");
INSERT INTO reserva VALUES("97","MECA012017022017-12","2017-12-06 14:45:12","","","0","2","5");
INSERT INTO reserva VALUES("98","HTML012017022017-12","2017-12-06 14:46:21","","2017-12-06 16:23:50","1","2","3");
INSERT INTO reserva VALUES("99","P0022017022017-12-0","2017-12-06 15:26:49","","2017-12-06 15:28:34","1","2","9");
INSERT INTO reserva VALUES("100","MECA022017022017-12","2017-12-06 15:29:15","","2017-12-06 15:42:22","1","2","6");
INSERT INTO reserva VALUES("101","FISI201701201702201","2017-12-06 15:33:17","","2017-12-06 15:33:34","1","2","1");
INSERT INTO reserva VALUES("102","FISI201702201510210","2017-12-06 15:39:23","","2017-12-06 15:39:54","1","5","2");
INSERT INTO reserva VALUES("103","POO120151021042017-","2017-12-06 15:58:51","","2017-12-06 15:59:24","1","5","8");
INSERT INTO reserva VALUES("104","FISI201702201702201","2017-12-06 16:40:05","","","0","2","2");
INSERT INTO reserva VALUES("105","FISI20170220002017-","2017-12-07 02:31:37","","","0","25","2");



DROP TABLE IF EXISTS tipousuario;

CREATE TABLE `tipousuario` (
  `tipousu_ID` int(11) NOT NULL,
  `tipousu_NOMBRE` varchar(199) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`tipousu_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tipousuario VALUES("1","ADMINISTRADOR");
INSERT INTO tipousuario VALUES("2","PERSONAL BIBLIOTECARIO");
INSERT INTO tipousuario VALUES("3","ALUMNO");
INSERT INTO tipousuario VALUES("4","PROFESOR");



DROP TABLE IF EXISTS ubigeo;

CREATE TABLE `ubigeo` (
  `UBI_ID` int(11) NOT NULL,
  `UBI_NOMBRE` varchar(199) DEFAULT NULL,
  `UBI_DESCRIPCION` varchar(499) DEFAULT NULL,
  PRIMARY KEY (`UBI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ubigeo VALUES("1","LIMA","CIUDAD PRINCIPAL");
INSERT INTO ubigeo VALUES("2","HUAMACHUCO","CIUDAD ALTERNATIVA");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `usu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `usu_USERNAME` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usu_PASSWORD` varchar(99) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usu_NOMBRE` varchar(99) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipousu_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`usu_ID`),
  KEY `tipousu_ID` (`tipousu_ID`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipousu_ID`) REFERENCES `tipousuario` (`tipousu_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO usuario VALUES("1","VQUEVEDO","b10082df18f05bdf811e9fc890ba3013","QUEVEDO DIOSES, VICTOR","1");
INSERT INTO usuario VALUES("2","MSEGURA","03ab24993da5f67993f81c57eeb7bc10","SEGURA DOMINGUES, RODOLFO MARTIN","2");
INSERT INTO usuario VALUES("3","2015102104","2015102104","BENDEZU GRANADOS, BETSABE DORA","2");
INSERT INTO usuario VALUES("4","2015200333","2015200333","BENITES BENITES, SANDRA FIORELLA","2");
INSERT INTO usuario VALUES("5","	2015100447","	2015100447","CASASOLA ESTEBAN, PAOLO JESUS","1");
INSERT INTO usuario VALUES("6","2014100264","2014100264","CASTILLO MALLQUI, JORGE EDGARDO","2");
INSERT INTO usuario VALUES("8","2015100020","2015100020","Junior Huanca","2");
INSERT INTO usuario VALUES("9","2015100253","2015100253","KEVIN MAMANI","1");
INSERT INTO usuario VALUES("15","2015101881","2015101881","ELIDIA QUISPE","2");
INSERT INTO usuario VALUES("16","MSEGURA2","e278b4ce7c96e3fd9702d4b2e601afee","MARTIN","1");



SET FOREIGN_KEY_CHECKS=1;