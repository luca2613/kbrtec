/*DATABASE*/
DROP DATABASE IF EXISTS db_kbrtec;
CREATE DATABASE db_kbrtec;
USE db_kbrtec;

create table nivel_usuario
(
cd_nivel_usuario int not null,
nm_nivel_usuario varchar(255) not null,
constraint pk_nivel_usuario primary key(cd_nivel_usuario)
);

create table usuario
(
cd_usuario int not null auto_increment,
cd_nivel_usuario int not null,
nm_usuario varchar(255) not null,
nm_senha_usuario varchar(255) not null,
nm_email_usuario varchar(255) not null,
constraint pk_usuario primary key(cd_usuario),
constraint fk_usuario_nivel_usuario foreign key(cd_nivel_usuario) references nivel_usuario(cd_nivel_usuario)
);

create table categoria
(
cd_categoria int not null auto_increment,
nm_categoria varchar(255) not null,
constraint pk_categoria primary key(cd_categoria)
);

create table subcategoria
(
cd_subcategoria int not null auto_increment,
cd_categoria int not null,
nm_subcategoria varchar(255) not null,
constraint pk_subcategoria primary key(cd_subcategoria),
constraint fk_subcategoria_categoria foreign key(cd_categoria) references categoria(cd_categoria)
);

create table produto
(
cd_produto int not null auto_increment,
nm_produto varchar(255) not null,
cd_categoria int not null,
cd_subcategoria int not null,
ds_produto text not null,
cd_imagem_produto longtext not null,
vl_produto text not null,
nm_tag_produto text not null,
ic_produto bool not null,
constraint pk_produto primary key(cd_produto),
constraint fk_produto_categoria foreign key(cd_categoria) references categoria(cd_categoria),
constraint fk_produto_subcategoria foreign key(cd_subcategoria) references subcategoria(cd_subcategoria)
);


/*inserts*/
insert into nivel_usuario values
(1, 'administrador'),
(2, 'usuario');

insert into usuario values
(DEFAULT, 1, 'admin123', md5('admin123'),'luca.developerpk@gmail.com'),
(DEFAULT, 2, 'usuario', md5('usuario'),'portgasdlucav1@gmail.com');

insert into categoria values
(DEFAULT, 'categoria1'),
(DEFAULT, 'categoria2');


insert into subcategoria values
(DEFAULT, 1, 'subcategoria 1-1'),
(DEFAULT, 1, 'subcategoria 1-2'),
(DEFAULT, 2, 'subcategoria 2-1'),
(DEFAULT, 2, 'subcategoria 2-2');



/*SELECT*/
select * from nivel_usuario;
select * from usuario;
select * from usuario where nm_usuario = 'admin123' and nm_senha_usuario = 'admin123';
select * from categoria;
select * from subcategoria;

select * from produto;

select nm_categoria,cd_subcategoria,nm_subcategoria from subcategoria join categoria 
on subcategoria.cd_categoria = categoria.cd_categoria;

