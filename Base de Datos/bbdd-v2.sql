create table usuario(
nickname varchar(30) primary key,
email varchar(120) unique,
clave varchar(256) not null

);

create table artefacto(
id_artefacto int auto_increment,
nombre varchar(30) not null,
imagen_artefacto varchar(200) not null,
autor varchar(24) not null,

CONSTRAINT FK17 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT 
);

create table evento(
id_evento int primary key,
contenido varchar(300),
autor varchar(24) not null,

CONSTRAINT FK17 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT 
);

create table publicacion(
id_publicacion int primary key,
contenido varchar(400) not null,
imagen varchar(200),
autor varchar(24) not null,

CONSTRAINT FK17 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT   
);

create table preferencias(

   
);

create table historia(
id_historia int primary key,
titulo varchar(30) not null,
contenido varchar(500) not null,
autor varchar(24) not null,

CONSTRAINT FK17 FOREIGN KEY(autor)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT     
);

create table relacciones(

    
);

create table tipo_publicacion(

    
);

create table desbloqueados(

CONSTRAINT FK17 FOREIGN KEY(nickname)  REFERENCES usuario (nickname) ON UPDATE CASCADE ON DELETE RESTRICT   
);

create table lore(

    
);