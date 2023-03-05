use battlegardens;


INSERT INTO obtencion (nombre, valor) VALUES
("Mercado", 300),
("Aventura", 10);

INSERT INTO rareza (nombre, indice_rareza) VALUES
("Comun", 1),
("Poco Comun", 2),
("Raro", 3),
("Excepcional", 4),
("Reliquia", 5);

INSERT INTO artefacto (id_artefacto, id_obtencion, id_rareza, img_artefacto, nombre, autor, fecha, id_progreso, inhabilitado) VALUES
(0, 1, 1, "img", "Artefacto por Defecto", "Maddox", 05-03-2023, 3, 1);

INSERT INTO elemento (id_elemento, nombre, imagen_elemento, imagen_bw) VALUES
(0, "Negativo", "", ""),
(1, "Afirmativo", "", ""),
(2, "Ryoz", "", ""),
(3, "Chatarra", "", ""),
(4, "Suministros", "", ""),
(5, "Fuerza", "", ""),
(6, "Inteligencia", "", ""),
(7, "Convicción", "", "");

INSERT INTO activador (id_activador, id_elemento) VALUES
(0, 0),
(1, 1);

INSERT INTO conclusion (id_conclusion, texto, id_evento, id_activador) VALUES
(0, "Escriba aquí la conclusión del evento", 0, 0);

INSERT INTO extraviado (id_extraviado, id_rareza, nombre, origen, titulo, conviccion, fuerza, inteligencia, img_color, img_bw, valor, fecha, id_progreso) VALUES
(0, 1, "Extraviado Jimmy", 1, "El Defecto", 0, 0, 0, "", "", 1, 05-03-2023, 3);

INSERT INTO extraviado_detalle () VALUES
();
/*FALTA RELLENAR*/

INSERT INTO estado_extra (nombre) VALUES
("Desconocido"),
("Explorando"),
("Cansado"),
("Muerto"),
("Rescatado"),
("Hambriento"),
("Indefenso");

INSERT INTO tipo_user (nombre) VALUES
("Arquitecto"),
("Lore"),
("Creador"),
("Tester"),
("Regular");

INSERT INTO tema (tema) VALUES
("BattleGarden"),
("OldWest"),
("Cyber");

INSERT INTO idioma (idioma) VALUES
("ESP"),
("ENG"),
("FRN");

INSERT INTO letra (letra) VALUES
("NRM"),
("MDM"),
("LRG");

INSERT INTO usuario (nickname, email, clave, id_rol) VALUES
("Howler", "RedCatter554@gmail.com", "Salamence13", 1),
("Kyle", "davidlucealafaja@gmail.com", "Kyle", 2),
("Maddox", "pinkfloid478@gmail.com","Maddox", 3);

INSERT INTO progreso (nombre) VALUES
("Paralizado"),
("En progreso"),
("Acabado"),
("En testeo"),
("Activo");

INSERT INTO mundo (nombre, sobrenombre, descripcion) VALUES
("Startland", "Colonia Humana", "Uno de los primeros mundos colonizado por los humanos tras el evento llamado Finisterre."),
("Jaro", "El Mundo Ceniza", "Un planeta ubicado en la rama temporal 07. El planeta recibe su nombre por su color rojizo en vista espacial."),
("Miracle", "El Mundo del Valle", "Un planeta ubicado en la rama temporal 03. Su terrasfera se conforma de valles preciosos e imposibles."),
("RYQZ-00", "Mundo Zero", "El planeta donde reside la civilización RYQZ, descubridora de la Energía Ryoz.");

INSERT INTO maquina (nombre, id_estado_maquina) VALUES
("El Monitor", 1),
("El Centinela", 1),
("El Colector", 1),
("La Cabina OPT", 1);

INSERT INTO estado_maquina (nombre) VALUES
("Operativa"),
("Reparandose"),
("Estropeada");