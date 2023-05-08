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
("Español"),
("Ingles"),
("Frances");

INSERT INTO letra (letra) VALUES
("Pequeña"),
("Mediana"),
("Grande");

INSERT INTO usuario (nickname, email, clave, id_rol, fecha_creacion) VALUES
("Time Anomaly", "", "", 5, CURDATE()),
("Howler", "RedCatter554@gmail.com", SHA2("Howler", 256), 1, CURDATE()),
("Kyle", "davidlucealafaja@gmail.com", SHA2("Kyle", 256), 2, CURDATE()),
("Maddox", "pinkfloid478@gmail.com",SHA2("Maddox", 256), 3, CURDATE()),
("Liam", "davidlucealafaja@gmail.com", SHA2("Liam", 256), 4, CURDATE()),
("Als", "davidlucealafaja@gmail.com", SHA2("Als", 256), 5, CURDATE());

/*Aplicar SHA2(password, 256)*/

INSERT INTO sombrero (nombre, descripcion, codigo) VALUES
("Sombrero de Iniciación", "Sombrero obseequiado a todo aquel que inicie sesión para estrenar su colección de sombreros", ""),
("Marca H.A.T.S.", "Sombrero especial obtenido por haber pertenecido o pertenecer al equipo H.A.T.S.", ""),
("Casco de Misionero", "Sombrero entregado por terminar una partida de Battle Gardens Lite", ""),
("Calva del Salvador", "Sombrero entregado por haber salvado a tu primer extraviado", "");

/*INSERT INTO logro NOT NEEDED*/

INSERT INTO juego (id_juego, nickname) VALUES
(1, "Howler");

INSERT INTO rareza (nombre, color, valor, indice_rareza) VALUES
("Comun", "#cccccc", 10, 1),
("Poco Comun", "#a4dbda", 20, 2),
("Raro", "#61e85f", 40, 4),
("Excepcional", "#e62100", 60, 8),
("Reliquia", "#8621ff", 100, 12);

INSERT INTO progreso (nombre) VALUES
("Paralizado"),
("En desarrollo"),
("Acabado"),
("En testeo"),
("Activo");

INSERT INTO artefacto (id_artefacto, id_rareza, nombre, descripcion, autor, fecha, id_progreso, inhabilitado) VALUES
(1, 1, "Artefacto por Defecto", "Este artefacto esta defectuoso", "Maddox", "2023-03-28", 3, 1);

/*INSERT INTO botin NOT NEEDED*/

INSERT INTO mundo (nombre, sobrenombre, descripcion) VALUES
("Startland", "Colonia Humana", "Uno de los primeros mundos colonizado por los humanos tras el evento llamado Finisterre."),
("Jaro", "El Mundo Ceniza", "Un planeta ubicado en la rama temporal 07. El planeta recibe su nombre por su color rojizo en vista espacial."),
("Miracle", "El Mundo del Valle", "Un planeta ubicado en la rama temporal 03. Su terrasfera se conforma de valles preciosos e imposibles."),
("RYQZ-00", "Mundo Zero", "El planeta donde reside la civilización RYQZ, descubridora de la Energía Ryoz.");

INSERT INTO extraviado (id_extraviado, id_rareza, nombre, origen, titulo, profesion, descripcion, fecha, id_progreso) VALUES
(1, 1, "Extraviado Jimmy", 1, "El Defecto", "Estar Muerto", "Se murio cuando su misión aun no comenzaba", "2023-03-28", 3);

/*INSERT INTO extraviado_detalle NOT NEEDED*/

INSERT INTO historia (id_historia, id_mundo, titulo, contenido, autor, fecha, id_progreso) VALUES
(0, 1, "Titulo por Defecto", "Escriba aquí", "Howler", "2023-07-03", 3);

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

INSERT INTO elemento (id_elemento, nombre) VALUES
(1, "Negativo"),
(2, "Afirmativo"),
(3, "Ryoz"),
(4, "Chatarra"),
(5, "Suministros"),
(6, "Fuerza"),
(7, "Inteligencia"),
(8, "Convicción");


/*INSERT INTO relacciones NOT NEEDED*/

/*INSERT INTO desbloqueados NOT NEEDED*/

/*INSERT INTO evento_requisito NOT NEEDED*/

INSERT INTO tipo_evento (id_tipo_evento, nombre) VALUES
(1, "Inicio"),
(2, "Aventura"),
(3, "Historia"),
(4, "Enlace");

INSERT INTO evento (id_tipo_evento, titulo, contenido, autor, fecha, id_progreso) VALUES
(1, "OST-ini", "Tras escapar de la Organización de Salvaguarda Temporal...", "Howler", "2023-03-28", 3);


/*INSERT INTO elemento_conclusion NOT NEEDED*/



