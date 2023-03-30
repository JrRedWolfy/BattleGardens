use battlegardens;


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

INSERT INTO usuario (nickname, img_perfil, email, clave, id_rol) VALUES
("Howler", "", "RedCatter554@gmail.com", SHA2("Howler", 256), 1),
("Kyle", "", "davidlucealafaja@gmail.com", SHA2("Kyle", 256), 2),
("Maddox", "", "pinkfloid478@gmail.com",SHA2("Maddox", 256), 3),
("Liam", "", "davidlucealafaja@gmail.com", SHA2("Liam", 256), 4),
("Als", "", "davidlucealafaja@gmail.com", SHA2("Als", 256), 5);

/*Aplicar SHA2(password, 256)*/

INSERT INTO sombrero (nombre, img_sombrero, img_equipado, descripcion, codigo) VALUES
("Sombrero de Iniciación", "", "", "Sombrero obseequiado a todo aquel que inicie sesión para estrenar su colección de sombreros", ""),
("Marca H.A.T.S.", "", "", "Sombrero especial obtenido por haber pertenecido o pertenecer al equipo H.A.T.S.", ""),
("Casco de Misionero", "", "", "Sombrero entregado por terminar una partida de Battle Gardens Lite", ""),
("Calva del Salvador", "", "", "Sombrero entregado por haber salvado a tu primer extraviado", "");

/*INSERT INTO logro NOT NEEDED*/

INSERT INTO juego (id_juego, nickname) VALUES
(1, "Howler");

INSERT INTO rareza (nombre, indice_rareza) VALUES
("Comun", 1),
("Poco Comun", 2),
("Raro", 3),
("Excepcional", 4),
("Reliquia", 5);

INSERT INTO progreso (nombre) VALUES
("Paralizado"),
("En progreso"),
("Acabado"),
("En testeo"),
("Activo");

INSERT INTO obtencion (nombre, valor) VALUES
("Mercado", 300),
("Aventura", 10);

INSERT INTO artefacto (id_artefacto, id_obtencion, id_rareza, img_artefacto, nombre, autor, fecha, id_progreso, inhabilitado) VALUES
(1, 1, 1, "img", "Artefacto por Defecto", "Maddox", "2023-03-28", 3, 1);

/*INSERT INTO botin NOT NEEDED*/

INSERT INTO mundo (nombre, sobrenombre, descripcion) VALUES
("Startland", "Colonia Humana", "Uno de los primeros mundos colonizado por los humanos tras el evento llamado Finisterre."),
("Jaro", "El Mundo Ceniza", "Un planeta ubicado en la rama temporal 07. El planeta recibe su nombre por su color rojizo en vista espacial."),
("Miracle", "El Mundo del Valle", "Un planeta ubicado en la rama temporal 03. Su terrasfera se conforma de valles preciosos e imposibles."),
("RYQZ-00", "Mundo Zero", "El planeta donde reside la civilización RYQZ, descubridora de la Energía Ryoz.");

INSERT INTO extraviado (id_extraviado, id_rareza, nombre, origen, titulo, img_color, img_bw, fecha, id_progreso) VALUES
(1, 1, "Extraviado Jimmy", 1, "El Defecto", "", "", "2023-03-28", 3);

/*INSERT INTO extraviado_detalle NOT NEEDED*/

INSERT INTO historia (id_historia, id_mundo, titulo, contenido, autor, fecha, id_progreso) VALUES
(1, 1, "Titulo por Defecto", "Escriba aquí", "Howler", "2023-07-03", 3);

/*INSERT INTO lore NOT NEEDED*/

INSERT INTO estado_extra (nombre) VALUES
("Desconocido"),
("Explorando"),
("Cansado"),
("Muerto"),
("Rescatado"),
("Hambriento"),
("Indefenso");

/*INSERT INTO tener_estado NOT NEEDED*/

INSERT INTO estado_maquina (nombre) VALUES
("Operativa"),
("Reparandose"),
("Estropeada");

INSERT INTO maquina (nombre, id_estado_maquina, porcentaje) VALUES
("El Monitor", 1, 100),
("El Centinela", 1, 100),
("El Colector", 1, 100),
("La Cabina OPT", 1, 100);

INSERT INTO elemento (id_elemento, nombre, imagen_elemento, imagen_bw) VALUES
(1, "Negativo", "", ""),
(2, "Afirmativo", "", ""),
(3, "Ryoz", "", ""),
(4, "Chatarra", "", ""),
(5, "Suministros", "", ""),
(6, "Fuerza", "", ""),
(7, "Inteligencia", "", ""),
(8, "Convicción", "", "");

INSERT INTO activador (id_activador, id_elemento) VALUES
(1, 1),
(2, 2);

/*INSERT INTO relacciones NOT NEEDED*/

/*INSERT INTO desbloqueados NOT NEEDED*/

/*INSERT INTO evento_requisito NOT NEEDED*/

INSERT INTO tipo_evento (id_tipo_evento, nombre) VALUES
(1, "Inicio"),
(2, "Aventura"),
(3, "Historia"),
(4, "Final"),
(5, "Exito");

INSERT INTO evento_detalle (id_det_evento, contenido, autor, fecha, id_progreso) VALUES
(1, "Tras escapar de la Organización de Salvaguarda Temporal...", "Howler", "2023-03-28", 3);

INSERT INTO evento (id_evento, id_activador, id_det_evento, id_tipo_evento) VALUES
(1, 2, 1, 1);

INSERT INTO conclusion (id_conclusion, texto, id_evento, id_activador) VALUES
(1, "Escriba aquí la conclusión del evento", 1, 2);

/*INSERT INTO elemento_conclusion NOT NEEDED*/



