drop schema if exists battlegardens;
create schema battlegardens;


use battlegardens;

/*PROBABLEMENTE FINAL*/
create table tipo_user(
id_rol int primary key auto_increment,
nombre varchar(16) not null
);

/*PROBABLEMENTE FINAL*/
create table color(
color varchar(16) primary key
);

/*PROBABLEMENTE FINAL*/
create table letra(
letra varchar(8) primary key
);

/*PROBABLEMENTE FINAL*/
create table usuario(
nickname varchar(32) primary key,
img_perfil varchar(256) default 'profile_default.png' not null,
email varchar(128) not null,
clave varchar(256) not null,
ryoz int not null default 0,
dinero int not null default 100,
main int not null default 1, /*Cambiar por el Recluta 1*/
id_rol int not null,
fecha_creacion date,
ultima_sesion date default null,
letra varchar(8) default "mediana",
color varchar(8) default "base",
inhabilitado boolean default 0,

/*Añadir la Clave foranea del extraviado cuando se pueda*/
CONSTRAINT FK1 FOREIGN KEY (color) references color (color) on delete restrict on update cascade,
CONSTRAINT FK2 FOREIGN KEY (letra) references letra (letra) on delete restrict on update cascade,
CONSTRAINT FK4 FOREIGN KEY (id_rol) references tipo_user (id_rol) on delete restrict on update cascade
);


create table sombrero(
id_sombrero int primary key auto_increment,
nombre varchar(32) not null,
img_sombrero varchar(256) default 'sombrero_default.png' not null,
descripcion varchar(256) not null,
codigo varchar(512)
);

/*PROBABLEMENTE FINAL*/
create table logro(
nickname varchar(32),
id_sombrero int,
fecha date,

primary key(nickname, id_sombrero),
CONSTRAINT FKO8 FOREIGN KEY (nickname) references usuario (nickname) on delete restrict on update cascade,
CONSTRAINT FKO9 FOREIGN KEY (id_sombrero) references sombrero (id_sombrero) on delete restrict on update cascade
);

/*ACTUALIZAR(Mirar el como controlar aventuras)*/
create table juego(
id_juego int primary key auto_increment,
ronda_total int not null default 0,
aventura int not null default 0,
ryoz int not null default 0,
chatarra int not null default 0,
suministro int not null default 0,
ryoz_total int not null default 0,
chatarra_total int not null default 0,
suministro_total int not null default 0,
nickname varchar(32) not null,

CONSTRAINT FK5 FOREIGN KEY (nickname) references usuario (nickname) on delete restrict on update cascade
);

/*PROBABLEMENTE FINAL*/
create table rareza(
id_rareza int primary key auto_increment,
nombre varchar(16),
indice_rareza int not null,
color varchar(8) not null,
valor int not null
);

/*PROBABLEMENTE FINAL*/
create table progreso(
id_progreso int primary key auto_increment,
nombre varchar(16) not null,
color varchar(8) not null,
texto varchar(128) not null
);

/*PROBABLEMENTE FINAL(añadir default img)*/
create table artefacto(
id_artefacto int primary key auto_increment,
id_rareza int not null,
icono varchar(256) default 'artefacto_icono_default.jpg' not null,
nombre varchar(32) not null,
descripcion varchar(512) not null,
plus_carisma int not null default 0,
plus_fuerza int not null default 0,
plus_inteligencia int not null default 0,
plus_desventura int not null default 0,
autor varchar(32) not null,
fecha date not null,
id_progreso int not null,
inhabilitado boolean default 0,

CONSTRAINT FK6 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FKA5 FOREIGN KEY(id_rareza)  REFERENCES rareza (id_rareza) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK7 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT 
);

/*PROBABLEMENTE FINAL*/
create table botin(
id_artefacto int,
id_juego  int,

primary key(id_artefacto, id_juego),
CONSTRAINT FK8 FOREIGN KEY (id_artefacto) references artefacto (id_artefacto) on delete restrict on update cascade,
CONSTRAINT FK9 FOREIGN KEY (id_juego) references juego (id_juego) on delete restrict on update cascade
);

/*PROBABLEMENTE FINAL*/
create table mundo(
id_mundo int primary key auto_increment,
nombre varchar(32) not null,
sobrenombre varchar(32) not null,
img varchar(256) default 'mundo_default.png' not null,
descripcion varchar(512) not null
);

/*PROBABLEMENTE FINAL(Añadir default img)*/
create table extraviado(
id_extraviado int primary key auto_increment,
id_rareza int not null,
nombre varchar(32) not null,
origen int not null,
titulo varchar(32) not null,
profesion varchar(32) not null,
descripcion varchar(512) not null,
carisma int not null default 0,
fuerza int not null default 0,
inteligencia int not null default 0,
desventura int not null default 0,
autor varchar(32) not null,
img varchar(256) default 'extraviado_default.png' not null,
icono varchar(256) default 'icono_default.png' not null,
fecha date not null,
id_progreso int not null default 2,
inhabilitado boolean default 0,

CONSTRAINT FKb7 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FKB5 FOREIGN KEY(id_rareza)  REFERENCES rareza (id_rareza) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK10 FOREIGN KEY(origen)  REFERENCES mundo (id_mundo) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK11 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT
);

/*PROBABLEMENTE FINAL*/
create table extraviado_detalle(
id_juego int,
id_extraviado int not null,
ronda_rescate int,
inicial boolean not null default 0,
id_mundo int not null,
id_artefacto int,

primary key(id_juego, id_extraviado),
CONSTRAINT FK12 FOREIGN KEY (id_artefacto) references artefacto (id_artefacto) on delete restrict on update cascade,
CONSTRAINT FK13 FOREIGN KEY (id_extraviado) references extraviado (id_extraviado) on delete restrict on update cascade,
CONSTRAINT FK14 FOREIGN KEY (id_mundo) references mundo (id_mundo) on delete restrict on update cascade,
CONSTRAINT FK15 FOREIGN KEY (id_juego) references juego (id_juego) on delete restrict on update cascade
);

/*PROBABLEMENTE FINAL*/
create table historia(
id_historia int primary key auto_increment,
id_mundo int not null,
titulo varchar(32) not null,
contenido varchar(2048) not null, /*Seguro aumentar en un futuro*/
autor varchar(32) not null,
fecha date not null,
id_progreso int not null,

CONSTRAINT FKA16 FOREIGN KEY(id_mundo)  REFERENCES mundo (id_mundo) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK16 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK17 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT     
);

/*PROBABLEMENTE FINAL*/
create table lore(
id_extraviado int,
id_historia int,

primary key(id_extraviado, id_historia),
CONSTRAINT FK18 FOREIGN KEY (id_extraviado) references extraviado (id_extraviado) on delete restrict on update cascade,
CONSTRAINT FK19 FOREIGN KEY (id_historia) references historia (id_historia) on delete restrict on update cascade
);

/*PROBABLEMENTE FINAL*/
create table estado_extra (
id_estado int primary key auto_increment,
nombre varchar(16) not null
);

/*PROBABLEMENTE FINAL*/
create table tener_estado(
id_estado int,
id_extraviado int,
id_juego int,

primary key(id_estado, id_extraviado, id_juego),
CONSTRAINT FK20 FOREIGN KEY (id_juego, id_extraviado) references extraviado_detalle (id_juego, id_extraviado) on delete restrict on update cascade,
CONSTRAINT FK21 FOREIGN KEY (id_estado) references estado_extra (id_estado) on delete restrict on update cascade
);

/*PROBABLEMENTE FINAL*/
create table estado_maquina(
id_estado_maquina int primary key auto_increment,
nombre varchar(16) not null
);

/*PROBABLEMENTE FINAL*/
create table maquina(
id_maquina int primary key auto_increment,
nombre varchar(16) not null,
id_estado_maquina int not null,
porcentaje int not null default 100,

CONSTRAINT FKA21 FOREIGN KEY (id_estado_maquina) references estado_maquina (id_estado_maquina) on delete restrict on update cascade
);



/*PROBABLEMENTE FINAL| TBL 1*/
create table tipo_evento(
id_tipo_evento int primary key auto_increment,
nombre varchar(16) not null
);

/*PROBABLEMENTE FINAL| TBL 2*/
create table elemento(
id_elemento int primary key auto_increment,
nombre varchar(32) not null,
activacion varchar(8) not null,
imagen_elemento varchar(256) default 'elemento_default.png' not null
);

/*PROBABLEMENTE FINAL| TBL 3*/
create table evento(
id_evento int primary key auto_increment,
id_tipo_evento int not null,
titulo varchar(32) not null, 
contenido varchar(1024) not null,
autor varchar(32) not null,
fecha date not null,
ultima_mod date default null,
id_progreso int not null,

CONSTRAINT FK22 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK23 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK26 FOREIGN KEY (id_tipo_evento) references tipo_evento (id_tipo_evento) on delete restrict on update cascade
);

/*PROBABLEMENTE FINAL| TBL 4*/
create table evento_activacion(
id_evento int,
id_elemento int,
cantidad int,

primary key(id_evento, id_elemento, cantidad),
CONSTRAINT FK24 FOREIGN KEY(id_evento)  REFERENCES evento (id_evento) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK25 FOREIGN KEY(id_elemento)  REFERENCES elemento (id_elemento) ON UPDATE CASCADE ON DELETE RESTRICT
);

/*PROBABLEMENTE FINAL| TBL 5*/
create table requisito(
id_requisito int auto_increment primary key,
primario varchar(32) not null,
secundario varchar(32)
);

/*PROBABLEMENTE FINAL| TBL 6*/
create table evento_requisito(
id_evento int,
id_requisito int,

primary key(id_requisito, id_evento),
CONSTRAINT FK35 FOREIGN KEY (id_requisito) references requisito (id_requisito) on delete restrict on update cascade,
CONSTRAINT FK36 FOREIGN KEY (id_evento) references evento (id_evento) on delete restrict on update cascade
);

/*PROBABLEMENTE FINAL| TBL 7*/
create table conclusion(
id_conclusion int primary key auto_increment,
texto varchar(1024) not null,
id_evento int not null,
id_elemento int not null,
cantidad int not null,

CONSTRAINT FK37 FOREIGN KEY (id_evento, id_elemento, cantidad) references evento_activacion (id_evento, id_elemento, cantidad) on delete restrict on update cascade
);

/*PROBABLEMENTE FINAL| TBL 8*/
create table elemento_conclusion(
id_conclusion int,
id_elemento int,
dominio varchar(32) not null, /*Puede que haya que hacer una tabla: Recluta, Mundo, Ubicacion, Vida, Maquina, Extraviado*/
cantidad int not null default 1,
accion boolean default 0,

primary key(id_conclusion, id_elemento),
CONSTRAINT FK38 FOREIGN KEY (id_elemento) references elemento (id_elemento) on delete restrict on update cascade,
CONSTRAINT FK39 FOREIGN KEY (id_conclusion) references conclusion (id_conclusion) on delete restrict on update cascade
);




/*PROBABLEMENTE FINAL*/
create table tipo_publicacion(
id_tipo_publi int primary key auto_increment,
nombre varchar(16) not null
);

create table publicacion(
id_publicacion int primary key auto_increment,
id_progreso int not null,
titulo varchar(32) not null,
concepto varchar(32), /*Deberia crear una tabla para conceptos??*/
contenido varchar(512) not null,
imagen varchar(256),
autor varchar(32) not null,
fecha date not null,
id_tipo_publi int not null,
raiz int,

CONSTRAINT FKFG FOREIGN KEY(raiz)  REFERENCES publicacion (id_publicacion) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK28 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK29 FOREIGN KEY(id_tipo_publi)  REFERENCES tipo_publicacion (id_tipo_publi) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK30 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT   
);

/*Mirar mejor forma de que sea 1:1*/
create table critica(
id_critica int primary key auto_increment,
titulo varchar(32) not null,
contenido varchar(512) not null,
autor varchar(32) not null,
fecha date not null,
valoracion int default 0 not null,

CONSTRAINT FK3e FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT   
);




/*PROBABLEMENTE FINAL*/
create table relacciones(
id_extraviado int,
id_conocido int,
motivo varchar(256) not null default "",

primary key(id_extraviado, id_conocido),
CONSTRAINT FK31 FOREIGN KEY(id_extraviado)  REFERENCES extraviado (id_extraviado) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK32 FOREIGN KEY(id_conocido)  REFERENCES extraviado (id_extraviado) ON UPDATE CASCADE ON DELETE RESTRICT
);

/*PROBABLEMENTE FINAL*/
create table desbloqueados(
nickname varchar(32),
id_extraviado int,
fecha date,
expira int default 3,

primary key(nickname, id_extraviado),
CONSTRAINT FK33 FOREIGN KEY(id_extraviado)  REFERENCES extraviado (id_extraviado) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK34 FOREIGN KEY(nickname)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT   
);

/*PROBABLEMENTE FINAL*/
create table obtenidos(
nickname varchar(32),
id_artefacto int,
fecha date,
expira int default 3,

primary key(nickname, id_artefacto),
CONSTRAINT FK3d FOREIGN KEY(id_artefacto)  REFERENCES artefacto (id_artefacto) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK3a FOREIGN KEY(nickname)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT   
);







