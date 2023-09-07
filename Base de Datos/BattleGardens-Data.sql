use battlegardens;


INSERT INTO tipo_user (nombre) VALUES
("Arquitecto"),
("Lore"),
("Creador"),
("Tester"),
("Regular");

INSERT INTO color (color) VALUES
("base"),
("monocrom"),
("cyber");

INSERT INTO letra (letra) VALUES
("pequena"),
("mediana"),
("grande");

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

INSERT INTO progreso (nombre, color, texto) VALUES
("Paralizado","#ff8a8a","Se encuentra deshabilitado por el momento."),
("En desarrollo","#8afffd","Se encuentra en vias de desarrollo, no esta listo para ser testeado."),
("Acabado","#90ff8a","Es un elemento acabado."),
("En testeo","#fff18a","Es un elemento interactuable para testers pero no en una partida oficial."),
("Activo","#e0e0e0","Actualmente es un elemento presente en todos las partidas.");

INSERT INTO artefacto (id_artefacto, id_rareza, nombre, descripcion, autor, fecha, id_progreso, inhabilitado) VALUES
(1, 1, "Artefacto por Defecto", "Este artefacto esta defectuoso", "Howler", "2023-03-28", 3, 1),
(2, 3, "Lupa Joya", "Una lupa preciosa perteneciente a la reina de Lyl, dicen que tiene propiedades magicas", "Howler", "2023-03-28", 2, 0),
(3, 1, "Guante de Obsidiana", "Un guante negro que da la fueza de todo un ejercito a quien lo lleve", "Maddox", "2024-03-28", 4, 0),
(4, 2, "Orbe Sombrio", "Orbe inestable que trae la desgracia a quien lo porta", "Maddox", "2025-03-28", 2, 0),
(5, 4, "Dimension de Bolsillo", "Un anillo de tamaño variable que guarda objetos", "Howler", "2024-03-28", 1, 0);

/*INSERT INTO botin NOT NEEDED*/

INSERT INTO mundo (nombre, sobrenombre, descripcion, img) VALUES
("Startland", "Colonia Humana", "Uno de los primeros mundos colonizado por los humanos tras el evento llamado Finisterre.","planetahumano.png"),
("Jaro", "El Mundo Ceniza", "Un planeta ubicado en la rama temporal 07. El planeta recibe su nombre por su color rojizo en vista espacial.","planetalava.png"),
("Miracle", "El Mundo del Valle", "Un planeta ubicado en la rama temporal 03. Su terrasfera se conforma de valles preciosos e imposibles.","planetamagico.png"),
("RYQZ-00", "Mundo Zero", "El planeta donde reside la civilización RYQZ, descubridora de la Energía Ryoz.","planetatetch.png");

INSERT INTO extraviado (id_extraviado, id_rareza, nombre, origen, titulo, profesion, descripcion, fuerza, inteligencia, carisma, desventura, autor, icono, fecha, id_progreso) VALUES
(1, 1, "Extraviado Jimmy", 1, "El Defecto", "Estar Muerto", "Se murio cuando su misión aun no comenzaba", 0, 0, 0, 0, "Howler", "icono_default.jpg", "2023-03-28", 3),
(2, 1, "Howler", 4, "El Fugitivo", "Cientifico", "Howler ha sido incriminado por el delito de perturbar el equilibrio temporal", 1, 4, 1, 0, "Howler", "fugitive_wolf.jpg", "2023-03-28", 3),
(3, 2, "Irjoh", 2, "El General Retirado", "Militar", "Un general perro que decidio retirarse tras perder a su hijo", 3, 2, 2, 1, "Maddox", "retired_general.jpg", "2024-03-28", 2),
(4, 1, "Daniel", 1, "El Caballero del Jardin", "Ninguna", "Un niño que sueña con ser un caballero de la mesa redonda", 1, 1, 3, 0, "Maddox", "little_knight.jpg", "2024-03-28", 2),
(5, 2, "Nizze", 2, "El Gato de Gerrillas", "Militar", "Se murio cuando su misión aun no comenzaba", 2, 2, 3, 1, "Howler", "camo_cat.jpg", "2022-03-28", 5),
(6, 2, "Liza", 3, "La Gata Maldita", "Ninguna", "Una gata negra que fue maldita con la inmortalidad y la mala suerte", 0, 3, 5, 5, "Maddox", "curse_cat.jpg", "2022-03-28", 1),
(7, 3, "Jack", 2, "El Cazarecompensas", "Peleador", "Un Cazarecompensas cuya unica misión en vida es acabar con su objetivo, sea quien sea", 2, 1, 2, 0, "Howler", "bounty_hunter.jpg", "2025-03-28", 1),
(8, 3, "Tiger", 4, "El Boxeador", "Peleador", "Una leyenda del boxeo que no abandonara el ring hasta ser derrotado limpiamente", 5, 3, 0, 3, "Maddox", "tiger_fighter.jpg", "2025-03-28", 3),
(9, 4, "Mis Death", 3, "La Espectro", "Ninguna", "Un fantasma que vaga sin rumbo haciendo peligrar la vida de quienes se encuentra", 0, 2, 2, 1, "Howler", "mis_death.jpg", "2022-03-28", 5);

/*INSERT INTO extraviado_detalle NOT NEEDED*/

INSERT INTO historia (id_historia, id_mundo, titulo, contenido, autor, fecha, id_progreso) VALUES
(1, 1, "Titulo por Defecto", "Escriba aquí", "Howler", "2023-07-03", 3),
(2, 2, "La Campaña", "La campaña de nuestros enemigos había dado comienzo a medio día. Era un plan bien orquestado que llevaba meses gestándose. El régimen había estado anticipando esa medida por parte de la oposición y había adoptado medidas para contrarrestar cualquier intento de derrocarlos. Sin embargo, había algo diferente en este plan en particular que los tomó por sorpresa. A medida que avanzaba el día, la tensión en el aire se hacía más espesa. La gente tenía miedo de salir de sus casas.", "Howler", "2023-09-03", 5),
(3, 2, "Sobre las olas", "Las corrientes de lava eran mas violentas que de costumbre, la mayoría de los surfistas ya se estaba retirando. Pero no Juan, , todavía estaba sobre su tabla de surf surfeando las olas creadas por el magma. Juan era un hábil surfista y siempre le había fascinado el poder de la naturaleza. El calor que emanaba de la lava era intenso, pero podía sentir su adrenalina bombeando mientras surfeaba sobre las olas. Fue una experiencia surrealista para Juan, ya que se sentía uno con el océano y el magma.", "Howler", "2023-07-03", 5),
(4, 1, "El Eclipsado", "El valle... me he quedado sin creditos en la IA autora ':D", "Howler", "2023-01-03", 5);

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

INSERT INTO elemento (id_elemento, nombre, activacion, imagen_elemento) VALUES
(1, "Negativo", "binario", "negar.png"),
(2, "Afirmativo", "binario", "afirmar.png"), 
(3, "Ryoz", "recurso", "ryoz.png"),/*yes*/
(4, "Chatarra", "recurso", "gears.png"),/*yes*/
(5, "Suministros", "recurso", "supplies.png"),/*yes*/
(6, "Fuerza", "stat", "fuerza.png"),/*yes*/
(7, "Inteligencia", "stat", "inteligencia.png"),/*yes*/
(8, "Carisma", "stat", "carisma.png"),/*yes*/
(9, "Desventura", "stat", "desventura.png"),/*yes*/
(10, "Monitor", "maquina", "monitor.png"),/*yes*/
(11, "Centinela", "maquina", "centinela.png"),/*yes*/
(12, "Colector", "maquina", "colector.png"),/*yes*/
(13, "Cabina-OPT", "maquina", "cabina.png"),/*yes*/
(14, "Startland", "mundo", "planetahumano.png"),/*yes*/
(15, "Jaro", "mundo", "planetalava.png"),/*yes*/
(16, "Miracle", "mundo", "planetamagico.png"),/*yes*/
(17, "RYQZ-00", "mundo", "planetatetch.png");/*yes*/


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



