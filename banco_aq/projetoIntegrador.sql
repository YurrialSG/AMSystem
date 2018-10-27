DROP DATABASE IF EXISTS projetointegrador;

CREATE DATABASE projetointegrador CHARACTER SET utf8 COLLATE utf8_general_ci;

USE projetointegrador;

-- 1
CREATE TABLE empresa (
  id INT NOT NULL AUTO_INCREMENT,
  razaoSocial varchar(50) NOT NULL,
  nome varchar(50) NOT NULL,
  cnpj varchar(50) NOT NULL,
  status int NOT NULL,
  PRIMARY KEY(id)
);

-- 2
CREATE TABLE IF NOT EXISTS setor (
  id INT NOT NULL AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  idEmpresa int,
  status int NOT NULL,

  CONSTRAINT FK_setor_empresa
  FOREIGN KEY (idEmpresa)
  REFERENCES empresa(id),

  PRIMARY KEY(id)
);

-- 3
CREATE TABLE IF NOT EXISTS funcao (
  id INT NOT NULL AUTO_INCREMENT,
  descricao varchar(50) NOT NULL,
  idSetor int,
  status int NOT NULL,

  CONSTRAINT FK_funcao_setor
  FOREIGN KEY (idSetor)
  REFERENCES setor(id),

  PRIMARY KEY(id)
);

-- 4
CREATE TABLE IF NOT EXISTS estado (
  id INT NOT NULL AUTO_INCREMENT,
  sigla varchar(50) NOT NULL,
  PRIMARY KEY(id)
);

-- 5
CREATE TABLE IF NOT EXISTS cidade (
  id INT NOT NULL AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  idEstado int,

  CONSTRAINT FK_cidade_estado
  FOREIGN KEY (idEstado)
  REFERENCES estado(id),

  PRIMARY KEY(id)
);

-- 6
CREATE TABLE IF NOT EXISTS endereco (
  id INT NOT NULL AUTO_INCREMENT,
  logradouro varchar(50) NOT NULL,
  numero int NOT NULL,
  complemento varchar(20) NOT NULL,
  cep varchar(11) NOT NULL,
  bairro varchar(25) NOT NULL,
  idCidade int,
  status int NOT NULL,

  CONSTRAINT FK_endereco_cidade
  FOREIGN KEY (idCidade)
  REFERENCES cidade(id),

  PRIMARY KEY(id)
);

-- 7
CREATE TABLE IF NOT EXISTS funcionario (
  id int AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  dataNascimento date NOT NULL,
  rg varchar(25) NOT NULL,
  cpf varchar(25) NOT NULL,
  email varchar(50),
  telefoneResidencial varchar(50),
  telefoneCelular varchar(50),
  idEndereco int,
  idSetor int,
  idEmpresa int,
  status int NOT NULL,

  CONSTRAINT FK_funcionario_endereco
  FOREIGN KEY (idEndereco)
  REFERENCES endereco(id),

  CONSTRAINT FK_funcionario_setor
  FOREIGN KEY (idSetor)
  REFERENCES setor(id),

  CONSTRAINT FK_funcionario_empresa
  FOREIGN KEY (idEmpresa)
  REFERENCES empresa(id),

  PRIMARY KEY(id)
);

-- 8
CREATE TABLE IF NOT EXISTS infoAcidente (
  id int AUTO_INCREMENT,
  tipoDeRisco varchar(50) NOT NULL,
  local varchar(50) NOT NULL,
  nivelLesao int,

  PRIMARY KEY(id)
);

-- 9
CREATE TABLE IF NOT EXISTS acidente (
  id int AUTO_INCREMENT,
  descricao varchar(50) NOT NULL,
  data date NOT NULL,
  idFuncionario int,
  idInfoAcidente int,
  status int NOT NULL,

  CONSTRAINT FK_acidente_funcionario
  FOREIGN KEY (idFuncionario)
  REFERENCES funcionario(id),

  CONSTRAINT FK_acidente_infoAcidente
  FOREIGN KEY (idInfoAcidente)
  REFERENCES infoAcidente(id),

  PRIMARY KEY(id)
);

-- 10
CREATE TABLE usuario (
  id INT NOT NULL AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  senha varchar(50) NOT NULL,
  hashTemporaria varchar(92) DEFAULT NULL,
  idEmpresa int,
  idEndereco int,
  status int NOT NULL,

  CONSTRAINT FK_usuario_empresa
  FOREIGN KEY (idEmpresa)
  REFERENCES empresa(id),

  CONSTRAINT FK_usuario_endereco
  FOREIGN KEY (idEndereco)
  REFERENCES endereco(id),

  PRIMARY KEY(id)
);


INSERT INTO usuario (nome, email, senha, status) VALUES 
("Caio Francisco Lopes", "caio@gmail.com",(MD5("Caio@123")),2),
("Administrador", "admin@gmail.com",(MD5("Admin@123")),2),
("Funcionario", "funcionario@gmail.com",(MD5("Funcionario@123")),1),
("Jeferson Luiz dos Santos Silva", "jefinho_silva@hotmail.com",(MD5("Jeferson@123")),1),
("Roberto Weslley", "roberto@hotmail.com",(MD5("Roberto@123")),1),
("Daiana Karine Rolim Caula", "daiana@bol.com.br",(MD5("Daiana@123")),1),
("Juliana Silva Sousa", "juliana@gmail.com",(MD5("Juliana@123")),1),
("Gilberto Alves da Cruz", "gilberto@outlook.com",(MD5("Gilberto@123")),1),
("Italo Aguiar Freire", "italo@outlook.com",(MD5("Italo@123")),0),
("Maria Renata Silveira", "maria@outlook.com",(MD5("Maria@123")),0),
("Paloma de Oliveira Gomes", "paloma@hotmail.com",(MD5("Paloma@123")),0),
("Everton Alencar Moura", "everton@hotmail.com",(MD5("Everton@123")),0),
("Diego Kedson dos Santos", "diego@hotmail.com",(MD5("Diego@123")),0),
("Irene Barbosa Gondim", "irene@gmail.com",(MD5("Irene@123")),0),
("Ana Neyla Martins da Mota", "ana@gmail.com",(MD5("Ana@123")),0),
("Allyson Bezerra de Oliveira", "allyson@outlook.com",(MD5("Allyson@123")),0),
("Emmanuel Alves de Melo", "emmanuelalves@outlook.com",(MD5("Emmanuel@123")),0),
("Marcelo Silva Costa", "marcelinho@gmail.com",(MD5("Marcelo@123")),1),
("Joaquim da Silva", "joaquim@hotmail.com",(MD5("Joaquim@123")),1),
("Vinicius Lima Angelo", "vinicius@gmail.com",(MD5("Vinicius@123")),1),
("Yuri Goncalves da Silveira", "yuriinternacional86@gmail.com",(MD5("Yuri@123")),0);