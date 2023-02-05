use battlegardens;

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

INSERT INTO maquina (nombre) VALUES
("El Monitor"),
("El Centinela"),
("El Colector"),
("La Cabina OPT");