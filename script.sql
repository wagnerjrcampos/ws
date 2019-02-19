create database ws_db;

use ws_db;

create table tb_users(
    id int primary key auto_increment,
    nome varchar(150) not null,
    email varchar(250) not null,
    telefone varchar(12) not null
);

insert into tb_users values (null, 'Wagner', 'wagnerjrcampos26@gmail.com', '21 97915-4578');