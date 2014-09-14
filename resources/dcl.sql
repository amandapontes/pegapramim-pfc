create database flymoto;
use flymoto;

create table entidades(
	id_ent int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	ativo char(1) not null,
	nome_ent varchar(100) not null,
	login_ent varchar(16) not null,
	senha_ent varchar(20) not null,
	cpf_cnpj_ent varchar(14) not null,
	dt_nasc_ent date null,
	tipo_ent char(1) not null
	)engine=MYiSAM;

create table tipo_endereco_contatos(
	id_tip int UNSIGNED AUTO_INCREMENT PRIMARY KEY   NOT NULL,
	nome_tip varchar(100) not null,
	tipo_tip char(1) not null,
	editavel_tip char(1)
)engine=MYiSAM;

insert into tipo_endereco_contatos values(1,'Telefone','T','0');
insert into tipo_endereco_contatos values(2,'Celular','T','0');

create table contatos(
	id_cont int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	descricao_cont text not null,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent),
	id_tip int not null,
	foreign key(id_tip) references tipo_endereco_contatos(id_tip)
	)engine=MYiSAM;

create table documentos(
	id_doc int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent),
	nome_doc text null,
	tipo_doc char(1) null
)engine=MYiSAM;

create table opcoes(
	id_opc int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent),
	vr_por_km double(5,2) null
)engine=MYiSAM;

create table lista_enderecos(
	id_lis_end int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent),
	id_tip int not null,
	foreign key(id_tip) references tipo_endereco_contatos(id_tip),
	id_end int not null,
	foreign key(id_end) references enderecos(id_end)
)engine=MYiSAM;

create table acessorios(
	id_ace int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	nome_ace varchar(100) not null
)engine=MYiSAM;

create table fabricantes(
	id_fab int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	nome_fab varchar(100) not null
)engine=MYiSAM;

create table modelos(
	id_mod int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	nome_mod varchar(100) not null,
	id_fab int not null,
	foreign key(id_fab) references fabricantes(id_fab)
)engine=MYiSAM;

create table veiculos(
	id_vei int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	placa_vei char(8) not null,
	ano_vei year not null,
	id_mod int not null,
	foreign key(id_mod) references modelos(id_mod),
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent)
)engine=MYiSAM;

create table lista_acessorios(
	id_lis_ace int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	id_vei int not null,
	foreign key(id_vei) references veiculos(id_vei),
	id_ace int not null,
	foreign key(id_ace) references acessorios(id_ace)
)engine=MYiSAM;

create table news_letters(
	id_news int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	email varchar(255) not null,
	dt_criacao datetime not null
)engine=MYiSAM;


create table enderecos_temps(
	id_end_temp int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	rua_end_temp text not null,
	num_end_temp varchar(25) not null,
	complemento_end_temp text not null,
	bairro_end_temp text not null,
	cidade_end_temp text not null,
	cep_end_temp varchar(9) not null,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent)
)engine=MYiSAM;

create table veiculos_temps(
	id_vei int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	placa_vei char(8) not null,
	ano_vei year not null,
	mod_vei text not null,
	fabricante_vei text not null,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent)
)engine=MYiSAM;



create table localicacoes(
	id_loci int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	longitude text not null,
	latitude text not null,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent)
)engine=MYiSAM;

create table encomendas(
	id_enc int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	longitude_cli text  null,
	latitude_cli text  null,
	longitude_enco text not null,
	latitude_enco text not null,
	dt_criacao_enco datetime not null,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent),
	id_ent_motoboy int null,
	foreign key(id_ent_motoboy) references entidades(id_ent)
)engine=MYiSAM;



create table propostas(
	id_pro int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	dt_criacao_pro datetime not null,
	aprovado_pro char(1) not null,
	id_enc int not null,
	foreign key(id_enc) references encomendas(id_enc),
	id_ent_motoboy int not null,
	foreign key(id_ent_motoboy) references entidades(id_ent)
)engine=MYiSAM;

