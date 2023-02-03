drop schema if exists battleGardens;
create schema battleGardens;


use battleGardens;

create table tipo_user(
id_rol int primary key auto_increment,
nombre varchar(24) not null
);

create table usuario(
nickname varchar(30) primary key,
email varchar(100) not null,
clave varchar(256) not null,
id_rol int,

CONSTRAINT FK1 FOREIGN KEY (id_rol) references tipo_user (id_rol) on delete restrict on update cascade
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
nickname varchar(30),

CONSTRAINT FK2 FOREIGN KEY (nickname) references usuario (nickname) on delete restrict on update cascade
);

create table artefacto(
id_artefacto int primary key auto_increment,
img_color varchar(250) not null,
nombre varchar(30) not null
);

create table botin(
id_artefacto int,
id_juego  int,

primary key(id_artefacto, id_juego),
CONSTRAINT FK3 FOREIGN KEY (id_artefacto) references artefacto (id_artefacto) on delete restrict on update cascade,
CONSTRAINT FK4 FOREIGN KEY (id_juego) references juego (id_juego) on delete restrict on update cascade
);

create table extraviado(
id_extraviado int primary key auto_increment,
nombre int not null,
titulo int not null,
ingenio int not null default 1,
sigilo int not null default 1,
fuerza int not null default 1,
img_color varchar(250) not null,
img_bw varchar(250) not null
);

create table extraviado_detalle(
id_extra_det int,
ronda_rescate int default -1,
inicial boolean not null default false,
id_extraviado int not null,
id_juego int,

primary key(id_juego, id_extra_det),
CONSTRAINT FK5 FOREIGN KEY (id_extraviado) references extraviado (id_extraviado) on delete restrict on update cascade,
CONSTRAINT FK6 FOREIGN KEY (id_juego) references juego (id_juego) on delete restrict on update cascade
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
CONSTRAINT FK7 FOREIGN KEY (id_juego, id_extra_det) references extraviado_detalle (id_juego, id_extra_det) on delete restrict on update cascade,
CONSTRAINT FK8 FOREIGN KEY (id_estado) references estado_extra (id_estado) on delete restrict on update cascade
);

create table mundo(
id_mundo int primary key auto_increment,
nombre varchar(30) not null,
id_extra_det int,
id_juego int,

CONSTRAINT FK9 FOREIGN KEY (id_juego, id_extra_det) references extraviado_detalle (id_juego, id_extra_det) on delete restrict on update cascade
);

create table maquina(
id_maquina int primary key auto_increment,
nombre varchar(30) not null,
estado varchar(24) not null default 'activa',
porcentaje int not null default 100
);

create table ronda(
id_ronda int,
id_juego int,

primary key(id_juego, id_ronda),
CONSTRAINT FK10 FOREIGN KEY (id_juego) references juego (id_juego) on delete restrict on update cascade
);

create table tipo_evento(
id_tipo_evento int primary key auto_increment,
nombre varchar(24) not null
);

create table evento(
id_evento int,
contenido varchar(500) not null,
participar boolean default false,
id_tipo_evento int,

primary key(id_evento, participar),
CONSTRAINT FK11 FOREIGN KEY (id_tipo_evento) references tipo_evento (id_tipo_evento) on delete restrict on update cascade
);

create table requisito(
id_requisito int auto_increment primary key,
nombre varchar(24) not null
);

create table evento_requisito(
id_evento int,
id_requisito int,

primary key(id_requisito, id_evento),
CONSTRAINT FK12 FOREIGN KEY (id_requisito) references requisito (id_requisito) on delete restrict on update cascade,
CONSTRAINT FK13 FOREIGN KEY (id_evento) references evento (id_evento) on delete restrict on update cascade
);

create table recurso(
id_recurso int primary key auto_increment,
nombre varchar(24) not null,
img_color varchar(250) not null
);

create table recurso_evento(
id_evento int,
id_recurso int,
cantidad int,
accion varchar(6),

primary key(id_evento, id_recurso),
CONSTRAINT FK14 FOREIGN KEY (id_recurso) references recurso (id_recurso) on delete restrict on update cascade,
CONSTRAINT FK15 FOREIGN KEY (id_evento) references evento (id_evento) on delete restrict on update cascade
);

create table conclusion(
id_conclusion int primary key auto_increment,
texto varchar(500) not null,
id_evento int,
participar boolean,

CONSTRAINT FK16 FOREIGN KEY (id_evento, participar) references evento (id_evento, participar) on delete restrict on update cascade
);




