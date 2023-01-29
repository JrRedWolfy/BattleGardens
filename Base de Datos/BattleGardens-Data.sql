use battlegardens;

DELETE FROM tipo_user WHERE id_rol IS NOT NULL;
DELETE FROM tema WHERE id_tema IS NOT NULL;
DELETE FROM idioma WHERE id_idioma IS NOT NULL;
DELETE FROM letra WHERE id_letra IS NOT NULL;
DELETE FROM preferencias WHERE id_preferencias IS NOT NULL;
DELETE FROM usuario WHERE nickname IS NOT NULL;
DELETE FROM juego WHERE id_juego IS NOT NULL;
DELETE FROM progreso WHERE id_progreso IS NOT NULL;
DELETE FROM artefacto WHERE id_artefacto IS NOT NULL;
DELETE FROM botin WHERE id_artefacto IS NOT NULL;
DELETE FROM extraviado WHERE id_extraviado IS NOT NULL;
DELETE FROM extraviado_detalle WHERE id_extra_det IS NOT NULL;
DELETE FROM historia WHERE id_historia IS NOT NULL;


INSERT INTO estado_extra VALUES
("Desconocido"),
(1, "Explorando"),
(2, "Cansado"),
(3, "Muerto"),
(4, "Rescatado"),
(5, "Hambriento"),
(6, "Indefenso");

INSERT INTO tipo_user VALUES
("Arquitecto"),
("Lore"),
("Creador"),
("Tester"),
("Regular"),
("No log");

INSERT INTO tema VALUES
("BattleGarden"),
("OldWest"),
("Cyber");

INSERT INTO idioma VALUES
("ESP"),
("ENG"),
("FRN");

INSERT INTO letra VALUES
("NRM"),
("MDM"),
("LRG");

INSERT INTO usuario VALUES
("Howler", "RedCatter554@gmail.com", "Salamence13", 1, null),
("Kyle", "davidlucealafaja@gmail.com", "Kyle", 2, null),
("Maddox","pinkfloid478@gmail.com","Maddox", 3, null);

INSERT INTO progreso VALUES
("En progreso"),
("Acabado"),
("En testeo"),
("Activo");

INSERT INTO mundo VALUES
("Startland", "Colonia Humana", "Uno de los primeros mundos colonizado por los humanos tras el evento llamado Finisterre.", null, null),
("Jaro", "El Mundo Ceniza", "Un planeta ubicado en la rama temporal 07. El planeta recibe su nombre por su color rojizo en vista espacial.", null, null),
("", "El Mundo del Valle", "Un planeta ubicado en la rama temporal 03. Su terrasfera se conforma de valles preciosos e imposibles.", null, null),
("RYQZ-00", "Mundo Zero", "El planeta donde reside la civilización RYQZ, descubridora de la Energía Ryoz.", null, null);

INSERT INTO maquina VALUES
("El Monitor"),
("El Centinela"),
("El Colector"),
("La Cabina OPT");