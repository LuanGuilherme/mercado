create database LOJA DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE LOJA;

create table imagens(
idimg INT auto_increment NOT NULL,
img VARCHAR(170) NOT NULL,
PRIMARY KEY(idimg)
);

INSERT INTO imagens(idimg,img)
VALUES (1,"img/p1.jpg"),
(2,"img/p2.jpg"),
(3,"img/p3.jpg"),
(4,"img/p4.jpg"),
(5,"img/p5.jpg"),
(6,"img/p6.jpg"),
(7,"img/p7.jpg"),
(8,"img/p8.jpg"),
(9,"img/p9.jpg"),
(10,"img/p10.jpg"),
(11,"img/p11.jpg"),
(12,"img/p12.jpg"),
(13,"img/p13.jpg"),
(14,"img/p14.jpg"),
(15,"img/p15.jpg"),
(16,"img/p16.jpg"),
(17,"img/p17.jpg"),
(18,"img/p18.jpg"),
(19,"img/p19.jpg"),
(20,"img/p20.jpg");

create table produtos(
idproduto INT auto_increment NOT NULL,
nomeproduto VARCHAR (50) NOT NULL,
preco VARCHAR (20) NOT NULL,
quantidade VARCHAR (10) NOT NULL,
descproduto VARCHAR (100) NOT NULL,
idimg INT NOT NULL,
PRIMARY KEY(idproduto), 
FOREIGN KEY(idimg) REFERENCES imagens(idimg)
);

INSERT INTO produtos (nomeproduto,preco,quantidade,descproduto,idimg)
VALUES ("Tomate","R$ 4,00","5000","fruta vermelha",1),
("Pão","R$ 2,00","5000","pão integral",2),
("Manteiga","R$ 4,00","5000","manteiga com sal",3),
("Chocolate","R$ 5,00","5000","ao leite",4),
("Macarrão","R$ 3,00","5000","massa pikada",5),
("Coca-cola","R$ 4,00","5000","refresco gelado",6),
("OMO","R$ 4,50","5000","tira manchas",7),
("Sabão","R$ 1,00","5000","limpeza absoluta",8),
("Costela","R$ 17,00 KG","5000","carne ao ponto",9),
("Bife","R$ 12,00 kg","5000","fatiado",10),
("Alface","R$ 4,00 kg","5000","orgânico",11),
("Danone","R$ 4,00","5000","com vitaminas",12),
("Leite","R$ 3,00","5000","integral",13),
("Ketchup","R$ 4,00","5000","molho",14),
("Nuttela","R$ 6,00","5000","doce caro",15),
("Leite Condensado","R$ 4,00","5000","doce ao leite",16),
("Gelatina","R$ 1,00","5000","em pó",17),
("Molho de tomate","R$ 4,00","5000","feito de tomate",18),
("Yakult","R$ 6,00","5000","contém lactobacilos vivos",19),
("Bis","R$ 4,50","5000","quem come pede bis",20);

create table clientes(
idcliente INT auto_increment NOT NULL,
nomecliente VARCHAR (50) NOT NULL,
email VARCHAR (50) NOT NULL,
idade VARCHAR (3) NOT NULL, 
endereco VARCHAR (50) NOT NULL,
senha VARCHAR (17) NOT NULL,
cpf VARCHAR (11) NOT NULL,
PRIMARY KEY(idcliente)
);

create table adm(
idproduto INT NOT NULL,
idadm INT auto_increment NOT NULL,
nomeadm VARCHAR (50) NOT NULL,
emailadm VARCHAR (50) NOT NULL,
senha VARCHAR (17) NOT NULL,
FOREIGN KEY(idproduto) REFERENCES produtos(idproduto),
PRIMARY KEY(idadm)
);

INSERT INTO adm (idproduto, idadm, nomeadm, emailadm, senha) VALUES (1, 1, "Administrador", "adm@adm.com", "rodartsinimda");