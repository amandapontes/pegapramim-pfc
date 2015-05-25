create database pegapramim;
use pegapramim;

create table entidades(
	id_ent int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	ativo char(1) not null,
	nome_ent varchar(100) not null,
	login_ent varchar(55) not null,
	senha_ent varchar(20) not null,
	dt_criacao_ent datetime not null,
	tipo char(1) not null
	)engine=MYiSAM;

create table opcoes(
	id_opc int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent),
	vr_por_km double(5,2) null,
	distancia_limite int null
)engine=MYiSAM;

create table news_letters(
	id_news int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	email varchar(255) not null,
	dt_criacao datetime not null
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
	situacao_enco char(1) not null,
	motivo_denuncia text null,
	id_ent int not null,
	foreign key(id_ent) references entidades(id_ent),
	id_ent_ajudante int null,
	foreign key(id_ent_ajudante) references entidades(id_ent),
	descricao_enc text null
)engine=MYiSAM;



create table propostas(
	id_pro int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	dt_criacao_pro datetime not null,
	vr_pro double(5,2) null,
	aprovado_pro char(1) not null,
	status_pro char(1) not null,
	id_enc int not null,
	foreign key(id_enc) references encomendas(id_enc),
	id_ent_ajudante int not null,
	foreign key(id_ent_ajudante) references entidades(id_ent)
)engine=MYiSAM;


create table negociacoes(
	id_nego int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	dt_criacao_nego datetime not null,
	id_pro int not null,
	foreign key(id_pro) references encomendas(id_enc)
)engine=MYiSAM;


create table lista_negociacoes(
	id_lista_nego int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	dt_criacao_lista_nego datetime not null,
	msg_lista_nego text not null,
	id_nego int not null,
	foreign key(id_nego) references negociacoes(id_nego),
	id_ent_enviou int not null,
	foreign key(id_ent_enviou) references entidades(id_ent)
)engine=MYiSAM;


create table avaliacoes(
	id_ava int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	dt_criacao_ava datetime not null,
	nota_ava int not null,
	id_pro int not null,
	foreign key(id_pro) references encomendas(id_enc)
)engine=MYiSAM;


create table eventos(
	id_eve int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	dt_criacao_eve datetime not null,
	descricao_eve text not null,
	id_enc int not null,
	foreign key(id_enc) references encomendas(id_enc),
	id_ent_adm int not null,
	foreign key(id_ent_adm) references entidades(id_ent)
)engine=MYiSAM;