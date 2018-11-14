DROP DATABASE IF EXISTS projetointegrador;

CREATE DATABASE projetointegrador CHARACTER SET utf8 COLLATE utf8_general_ci;

USE projetointegrador;

-- 1
CREATE TABLE empresa  (
  id INT NOT NULL AUTO_INCREMENT,
  razaoSocial varchar(100) NOT NULL,
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
  idFuncao int,
  idEmpresa int,
  status int NOT NULL,

  CONSTRAINT FK_funcionario_endereco
  FOREIGN KEY (idEndereco)
  REFERENCES endereco(id),

  CONSTRAINT FK_funcionario_funcao
  FOREIGN KEY (idFuncao)
  REFERENCES funcao(id),

  CONSTRAINT FK_funcionario_empresa
  FOREIGN KEY (idEmpresa)
  REFERENCES empresa(id),

  PRIMARY KEY(id)
);

-- 8
CREATE TABLE IF NOT EXISTS infoAcidente (
  id int AUTO_INCREMENT,
  tipoDeRisco varchar(50) NOT NULL,
  agente varchar(50) NOT NULL,
  idSetor int,
  medicao varchar(50) NOT NULL,

  CONSTRAINT FK_infoAcidente_setor
  FOREIGN KEY (idSetor)
  REFERENCES setor(id),

  PRIMARY KEY(id)
);

-- 09
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

-- 10
CREATE TABLE IF NOT EXISTS acidente (
  id int AUTO_INCREMENT,
  descricao varchar(50) NOT NULL,
  data date NOT NULL,
  idFuncionario int,
  idInfoAcidente int,
  idEmpresa int,
  status int NOT NULL,

  CONSTRAINT FK_acidente_funcionario
  FOREIGN KEY (idFuncionario)
  REFERENCES funcionario(id),

  CONSTRAINT FK_acidente_infoAcidente
  FOREIGN KEY (idInfoAcidente)
  REFERENCES infoAcidente(id),

  CONSTRAINT FK_acidente_empresa
  FOREIGN KEY (idEmpresa)
  REFERENCES empresa(id),

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

CREATE TABLE IF NOT EXISTS mensagem (
  id int AUTO_INCREMENT,
  descricao varchar(2000) NOT NULL,
  assunto varchar(50) NOT NULL,
  observacao varchar(50) NOT NULL,
  data date NOT NULL,
  idUsuario INT NOT NULL,
  status int NOT NULL,

  CONSTRAINT fk_mensa_usuario
  FOREIGN KEY (idUsuario)
  REFERENCES usuario (id),
  
  PRIMARY KEY(id)
);

INSERT INTO estado (sigla) VALUES
('RS');

INSERT INTO cidade (nome, idEstado) VALUES
('Pelotas', 1);

INSERT INTO empresa (razaoSocial, nome, cnpj, status) VALUES
('Macro Atacado Treichel LTDA 1', 'Treichel 1', '03.204.565/0001-89', 1),
('Macro Atacado Treichel LTDA 2', 'Treichel 2', '03.204.565/0001-89', 1),
('Macro Atacado Treichel LTDA 3', 'Treichel 3', '03.204.565/0001-89', 1),
('Macro Atacado Treichel LTDA 4', 'Treichel 4', '03.204.565/0001-89', 1),
('Macro Atacado Treichel LTDA 5', 'Treichel 5', '03.204.565/0001-89', 1);

INSERT INTO endereco (logradouro, numero, complemento, cep, bairro, idCidade, status) VALUES
('Rua Montenegro', 111, '', '96090-420', 'Laranjal', 1, 1),
('Rua Dr. Claudio Manoel de Costa', 8721, 202, '96080-080', 'Areal', 1, 1),
('Rua Rio Grande do Sul', 111, '', '96090-420', 'Laranjal', 1, 1),
('Rua Av. Bento Gonçalves', 111, '', '96090-420', 'Centro', 1, 1),
('Rua Montenegro 2', 111, '', '96090-420', 'Laranjal', 1, 1);

INSERT INTO usuario (nome, email, senha, idEndereco, status) VALUES
('Administrador', 'yuriinternacional86@gmail.com', (MD5("Yuri@123")), 1, 2),
('Administrador 2', 'admin2@gmail.com', (MD5("Admin2@123")), 2, 2);

INSERT INTO user_has_empresa (idEmpresa, idUsuario) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2);

INSERT INTO setor (nome, idEmpresa, status) VALUES
('Caixa central', 1, 1),
('Hortifruti', 1, 1),
('Higiene', 1, 1),
('Perfumaria', 1, 1),
('Petshop', 1, 1),
('Padaria', 1, 1),
('Açougue', 1, 1);

INSERT INTO funcao (descricao, idSetor, status) VALUES
('Empacotador', 1, 1),
('Operador de caixa', 1, 1),
('Auxiliar de Limpeza', 3, 1);

INSERT INTO funcionario (nome, dataNascimento, rg, cpf, email, telefoneResidencial, telefoneCelular, idEndereco, idFuncao, idEmpresa, status) VALUES
('Lucas Lopes de Souza', '1980-09-13', 123456789, "000.111.222-33", NULL, "(53) 32012341", "(53) 991012341", 3, 1, 1, 1),
('Marcelo Pereira', '1980-09-13', 123456789, "000.111.222-33", NULL, "(53) 32012341", "(53) 991012341", 4, 2, 1, 1),
('Bruna Perez de Oliveira', '1980-09-13', 123456789, "000.111.222-33", NULL, "(53) 32012341", "(53) 991012341", 5, 3, 1, 1);

INSERT INTO infoAcidente (tipoDeRisco, agente, idSetor, medicao) VALUES
('Risco Físico', 'Ruído', 1, '80 Db'),
('Risco Físico', 'Ruído', 1, '84 Db'),
('Risco de Acidente', 'Piso Molhado', 3, NULL);

INSERT INTO acidente (descricao, data, idFuncionario, idInfoAcidente, idEmpresa, status) VALUES
("Descrevendo o acidente....", '2018-11-13', 1, 1, 1, 1),
("Descrevendo o acidente....", '2018-11-13', 2, 2, 1, 1),
("Descrevendo o acidente....", '2018-11-13', 3, 3, 1, 1);

INSERT INTO mensagem (descricao, assunto, observacao, data, idUsuario, status) VALUES
("Efetuar treinamento NR 33 aos colaboradores.", 'Treinamentos Normas Regulamentadoras', 'Treinamentos futuros pendentes', '2018-11-13', 1, 1),
("Efetuar treinamento NR 33 aos colaboradores. aoieoeaioe ioaeaoiioei oeieaieaioea eiaoeaiea o ea ieaoaei aeoea ieaoie oeaiaeia eieaoeai eaoea", 'Treinamentos Normas Regulamentadoras', 'Treinamentos futuros pendentes', '2018-11-13', 1, 1),
("Efetuar treinamento NR 33 aos colaboradores. a eo ieie eaiooeaie aiaeoaeii e aoeio ioaie oeieaoeai eaoieaea eaioaeie aoaeieoaie aoeaieao e ai aeoi eaoi aeeaiae oieaaeoi aeaeoieao ieaoiaeo ieo aieaoea iaeieaoie aead", 'Treinamentos Normas Regulamentadoras', 'Treinamentos futuros pendentes', '2018-11-13', 1, 1),
("Efetuar treinamento NR 33 aos colaboradores. aoieio eaioe aieaio aeoeaeaie ae aoiea ieai eaoea ieo eiea oieao eaie aoie aoe aiaeo eaia oeiaeo aeieoe aaeioaea eioeai aeoa ei o eaoaeo iaeoaei eaoea ioeaiaeo aeea ieaoea ieaoaeiaeo iaeoae iaeo eai aeoa eeiaae", 'Treinamentos Normas Regulamentadoras', 'Treinamentos futuros pendentes', '2018-11-13', 1, 1);