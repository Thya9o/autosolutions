-- ----------------------------------------------------------------------------------------------------------------
-- Thiago
-- 04/09/2017
-- Cria uma database inicial (vazia)
-- ----------------------------------------------------------------------------------------------------------------
--  cria a database
CREATE DATABASE `autosolutions` CHARACTER SET `utf8mb4` COLLATE `utf8mb4_unicode_ci`;
-- ----------------------------------------------------------------------------------------------------------------
-- cria a tabela de clientes
CREATE TABLE `cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(100) NOT NULL,
  `sobrenome` VARCHAR(150) NOT NULL,
  `apelido` VARCHAR(100) DEFAULT NULL,
  `documento` VARCHAR(14) DEFAULT NULL COMMENT 'Documento pode ser usado para CPF, RG ou CNPJ',
  `sexo` ENUM('M', 'F') DEFAULT 'M',
  `data_nascimento` DATETIME DEFAULT NULL,
  `data_cadastro` DATETIME NOT NULL,
  `cep` CHAR(8) DEFAULT NULL,
  `endereco` VARCHAR(50) DEFAULT NULL,
  `numero` VARCHAR(5) DEFAULT NULL,
  `complemento` VARCHAR(20) DEFAULT NULL,
  `bairro` VARCHAR(30) DEFAULT NULL,
  `id_cidade` INT DEFAULT NULL,
  `id_estado` INT DEFAULT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `situacao` INT DEFAULT NULL,
  `tipo` CHAR(1)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

-- cria a tabela de telefone
CREATE TABLE `telefone` (
  `id_cliente` INT NOT NULL,
  `fone` CHAR(11) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `tipo` ENUM('M', 'F') NOT NULL DEFAULT 'M',
  PRIMARY KEY (`id_cliente`, `fone`),
  FOREIGN KEY (`id_cliente`) REFERENCES `cliente`(`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
