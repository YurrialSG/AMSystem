DROP DATABASE IF EXISTS projetointegrador;

CREATE DATABASE projetointegrador CHARACTER SET utf8 COLLATE utf8_general_ci;

USE projetointegrador;

-- 1
CREATE TABLE empresa (
  id INT NOT NULL AUTO_INCREMENT,
  razaoSocial varchar(100) NOT NULL,
  nome varchar(50) NOT NULL,
  cnpj varchar(50) NOT NULL,
  foto varchar(50),
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
  idEndereco int,
  status int NOT NULL,

  CONSTRAINT FK_usuario_endereco
  FOREIGN KEY (idEndereco)
  REFERENCES endereco(id),

  PRIMARY KEY(id)
);


CREATE TABLE user_has_empresa (
idEmpresa INT NOT NULL,
idUsuario INT NOT NULL,

CONSTRAINT fk_user_empresa
    FOREIGN KEY (idEmpresa)
    REFERENCES empresa (id),

    CONSTRAINT fk_user_usuario
    FOREIGN KEY (idUsuario)
    REFERENCES usuario (id)
);

INSERT INTO estado (sigla) VALUES
('RS');

INSERT INTO cidade (nome, idEstado) VALUES
('Pelotas', 1);

INSERT INTO empresa (razaoSocial, nome, cnpj, foto, status) VALUES
('Macro Atacado Treichel LTDA 1', 'Macro Atacado Treichel 1', '03.204.565/0001-89', 'd272e06c5af2a380c10c05cd8ccec0b4.png', 1),
('Macro Atacado Treichel LTDA 2', 'Macro Atacado Treichel 2', '03.204.565/0001-89', NULL, 1),
('Macro Atacado Treichel LTDA 3', 'Macro Atacado Treichel 3', '03.204.565/0001-89', NULL, 1),
('Macro Atacado Treichel LTDA 4', 'Macro Atacado Treichel 4', '03.204.565/0001-89', NULL, 1),
('Macro Atacado Treichel LTDA 5', 'Macro Atacado Treichel 5', '03.204.565/0001-89', NULL, 1);

INSERT INTO endereco (logradouro, numero, complemento, cep, bairro, idCidade, status) VALUES
('Rua Montenegro', 111, '', '96090-420', 'Laranjal', 1, 1),
('Rua Dr. Claudio Manoel de Costa', 8721, 202, '96080-080', 'Areal', 1, 1);

INSERT INTO usuario (nome, email, senha, idEndereco, status) VALUES
('Administrador', 'admin@gmail.com', (MD5("Admin@123")), 1, 2),
('Administrador 2', 'admin2@gmail.com', (MD5("Admin2@123")), 2, 2);

INSERT INTO user_has_empresa (idEmpresa, idUsuario) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2);