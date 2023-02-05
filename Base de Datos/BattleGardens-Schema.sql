drop schema if exists battlegardens;
create schema battlegardens;


use battlegardens;


create table tipo_user(
id_rol int primary key auto_increment,
nombre varchar(24) not null
);

create table tema(
id_tema int primary key auto_increment,
tema varchar(12) not null
);

create table idioma(
id_idioma int primary key auto_increment,
idioma varchar(3) not null
);

create table letra(
id_letra int primary key auto_increment,
letra varchar(3) not null
);

create table preferencias(
id_preferencias int primary key,
id_tema int default 0 not null,
id_idioma int default 0 not null,
id_letra int default 0 not null,

CONSTRAINT FK0 FOREIGN KEY (id_tema) references tema (id_tema) on delete restrict on update cascade,
CONSTRAINT FK1 FOREIGN KEY (id_idioma) references idioma (id_idioma) on delete restrict on update cascade,
CONSTRAINT FK2 FOREIGN KEY (id_letra) references letra (id_letra) on delete restrict on update cascade
);

create table usuario(
nickname varchar(30) primary key,
email varchar(100) not null,
clave varchar(256) not null,
ryoz int not null default 0, 
id_rol int not null,
id_preferencias int default null,
ultima_sesion date default null,

CONSTRAINT FK3 FOREIGN KEY (id_preferencias) references preferencias (id_preferencias) on delete restrict on update cascade,
CONSTRAINT FK4 FOREIGN KEY (id_rol) references tipo_user (id_rol) on delete restrict on update cascade
);

create table juego(
id_juego int primary key auto_increment,
ronda int not null default 0,
aventura int not null default 0,
ryoz int not null default 2,
chatarra int not null default 3,
suministro int not null default 3,
ryoz_total int not null default 0,
chatarra_total int not null default 0,
suministro_total int not null default 0,
nickname varchar(30) not null,

CONSTRAINT FK5 FOREIGN KEY (nickname) references usuario (nickname) on delete restrict on update cascade
);

create table progreso(
id_progreso int primary key auto_increment,
nombre varchar(16) not null
);
alter table progreso auto_increment=0;

create table artefacto(
id_artefacto int primary key auto_increment,
img_artefacto varchar(250) not null,
nombre varchar(30) not null,
plus_ingenio int not null default 0,
plus_sigilo int not null default 0,
plus_fuerza int not null default 0,
valor int not null,
autor varchar(30) not null,
fecha date not null,
id_progreso int not null,

CONSTRAINT FK6 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK7 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT 
);

create table botin(
id_artefacto int,
id_juego  int,

primary key(id_artefacto, id_juego),
CONSTRAINT FK8 FOREIGN KEY (id_artefacto) references artefacto (id_artefacto) on delete restrict on update cascade,
CONSTRAINT FK9 FOREIGN KEY (id_juego) references juego (id_juego) on delete restrict on update cascade
);

create table mundo(
id_mundo int primary key auto_increment,
nombre varchar(30) not null,
sobrenombre varchar(30) not null,
descripcion varchar(240) not null
);

create table extraviado(
id_extraviado int primary key auto_increment,
nombre int not null,
origen int not null,
titulo int not null,
ingenio int not null default 0,
sigilo int not null default 0,
fuerza int not null default 0,
img_color varchar(250) not null,
img_bw varchar(250) not null,
valor int not null default 0,
fecha date not null,
id_progreso int not null,

CONSTRAINT FK10 FOREIGN KEY(origen)  REFERENCES mundo (id_mundo) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK11 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT
);

create table extraviado_detalle(
id_juego int,
id_extra_det int,
ronda_rescate int,
inicial boolean not null default false,
id_extraviado int not null,
id_mundo int not null,
id_artefacto int,

primary key(id_juego, id_extra_det),
CONSTRAINT FK12 FOREIGN KEY (id_artefacto) references artefacto (id_artefacto) on delete restrict on update cascade,
CONSTRAINT FK13 FOREIGN KEY (id_extraviado) references extraviado (id_extraviado) on delete restrict on update cascade,
CONSTRAINT FK14 FOREIGN KEY (id_mundo) references mundo (id_mundo) on delete restrict on update cascade,
CONSTRAINT FK15 FOREIGN KEY (id_juego) references juego (id_juego) on delete restrict on update cascade
);

create table historia(
id_historia int primary key,
titulo varchar(30) not null,
contenido varchar(500) not null,
autor varchar(30) not null,
fecha date not null,
id_progreso int not null,

CONSTRAINT FK16 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK17 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT     
);

create table lore(
id_extraviado int,
id_historia int,
fecha_zero varchar(20),

primary key(id_extraviado, id_historia),
CONSTRAINT FK18 FOREIGN KEY (id_extraviado) references extraviado (id_extraviado) on delete restrict on update cascade,
CONSTRAINT FK19 FOREIGN KEY (id_historia) references historia (id_historia) on delete restrict on update cascade
);

create table estado_extra (
id_estado int primary key auto_increment,
nombre varchar(24) not null
);

create table tener_estado(
id_estado int,
id_extra_det int,
id_juego int,

primary key(id_estado, id_extra_det),
CONSTRAINT FK20 FOREIGN KEY (id_juego, id_extra_det) references extraviado_detalle (id_juego, id_extra_det) on delete restrict on update cascade,
CONSTRAINT FK21 FOREIGN KEY (id_estado) references estado_extra (id_estado) on delete restrict on update cascade
);

create table maquina(
id_maquina int primary key auto_increment,
nombre varchar(30) not null,
estado varchar(24) not null default 'Operativa',
porcentaje int not null default 100
);

create table tipo_evento(
id_tipo_evento int primary key auto_increment,
nombre varchar(24) not null
);

create table activador(
id_activador int primary key auto_increment,
nombre varchar(30) not null,
imagen_activador varchar(200) not null,
imagen_bw varchar(200) not null
);

create table evento_detalle(
id_det_evento int primary key auto_increment, 
contenido varchar(500) not null,
autor varchar(30) not null,
fecha date not null,
id_progreso int not null,

CONSTRAINT FK22 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK23 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT
);

create table evento(
id_evento int,
id_activador int,
id_det_evento int not null,
id_tipo_evento int not null,

primary key(id_evento, id_activador),
CONSTRAINT FK24 FOREIGN KEY(id_det_evento)  REFERENCES evento_detalle (id_det_evento) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK25 FOREIGN KEY(id_activador)  REFERENCES activador (id_activador) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK26 FOREIGN KEY (id_tipo_evento) references tipo_evento (id_tipo_evento) on delete restrict on update cascade
);

create table tipo_publicacion(
id_tipo_publi int primary key auto_increment,
nombre varchar(24) not null,
id_extraviado int,

CONSTRAINT FK27 FOREIGN KEY(id_extraviado)  REFERENCES extraviado (id_extraviado) ON UPDATE CASCADE ON DELETE RESTRICT
);

create table publicacion(
id_publicacion int primary key auto_increment,
id_progreso int not null,
titulo varchar(32) not null,
contenido varchar(400) not null,
imagen varchar(200),
autor varchar(30) not null,
fecha date not null,
id_tipo_publi int not null,

CONSTRAINT FK28 FOREIGN KEY(id_progreso)  REFERENCES progreso (id_progreso) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK29 FOREIGN KEY(id_tipo_publi)  REFERENCES tipo_publicacion (id_tipo_publi) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK30 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT   
);

create table relacciones(
id_extraviado int,
id_conocido int,

primary key(id_extraviado, id_conocido),
CONSTRAINT FK31 FOREIGN KEY(id_extraviado)  REFERENCES extraviado (id_extraviado) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK32 FOREIGN KEY(id_conocido)  REFERENCES extraviado (id_extraviado) ON UPDATE CASCADE ON DELETE RESTRICT
);

create table desbloqueados(
nickname varchar(30),
id_extraviado int,
fecha date,

primary key(nickname, id_extraviado),
CONSTRAINT FK33 FOREIGN KEY(id_extraviado)  REFERENCES extraviado (id_extraviado) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK34 FOREIGN KEY(nickname)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT   
);

create table requisito(
id_requisito int auto_increment primary key,
primario varchar(24) not null,
secundario varchar(24)
);

create table evento_requisito(
id_evento int,
id_requisito int,

primary key(id_requisito, id_evento),
CONSTRAINT FK35 FOREIGN KEY (id_requisito) references requisito (id_requisito) on delete restrict on update cascade,
CONSTRAINT FK36 FOREIGN KEY (id_evento) references evento (id_evento) on delete restrict on update cascade
);

create table recurso(
id_recurso int primary key auto_increment,
nombre varchar(24) not null,
img_color varchar(250) not null
);

create table conclusion(
id_conclusion int primary key auto_increment,
texto varchar(500) not null,
id_evento int not null,
id_activador int not null,

CONSTRAINT FK37 FOREIGN KEY (id_evento, id_activador) references evento (id_evento, id_activador) on delete restrict on update cascade
);

create table recurso_conclusion(
id_conclusion int,
id_recurso int,
cantidad int not null default 0,
accion varchar(6) not null default 'Perder',

primary key(id_conclusion, id_recurso),
CONSTRAINT FK38 FOREIGN KEY (id_recurso) references recurso (id_recurso) on delete restrict on update cascade,
CONSTRAINT FK39 FOREIGN KEY (id_conclusion) references conclusion (id_conclusion) on delete restrict on update cascade
);





