CREATE TABLE `users` (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NOT NULL,
	`senha` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`tipo` VARCHAR(255) NOT NULL,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	`ativo` TINYINT(1) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `email` (`email`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

CREATE TABLE `empresas` (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NOT NULL,
	`ramo` VARCHAR(255) NOT NULL,
	`descricao_rapida` VARCHAR(255) NOT NULL,
	`qtde_empregados` VARCHAR(255) NOT NULL,
	`url_imagem` TEXT NULL,
	`site` TEXT NULL,
	`aniversario_empresa` DATE NULL DEFAULT NULL,
	`telefone` VARCHAR(50) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`url_facebook` VARCHAR(255) NULL DEFAULT NULL,
	`url_google_plus` VARCHAR(255) NULL DEFAULT NULL,
	`url_twitter` VARCHAR(255) NULL DEFAULT NULL,
	`url_github` VARCHAR(255) NULL DEFAULT NULL,
	`url_instagram` VARCHAR(255) NULL DEFAULT NULL,
	`url_youtube` VARCHAR(255) NULL DEFAULT NULL,
	`url_pintrest` VARCHAR(255) NULL DEFAULT NULL,
	`descricao_completa` TEXT NULL,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	`ativo` TINYINT(1) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

CREATE TABLE `enderecos` (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`bairro` VARCHAR(255) NULL DEFAULT NULL,
	`cep` VARCHAR(9) NULL DEFAULT NULL,
	`cidade` VARCHAR(255) NULL DEFAULT NULL,
	`created` DATETIME NULL,
	`endereco` VARCHAR(255) NULL DEFAULT NULL,
	`endereco_completo` VARCHAR(255) NULL DEFAULT NULL,
	`estado` VARCHAR(2) NULL DEFAULT NULL,
	`latitude` VARCHAR(255) NULL DEFAULT NULL,
	`longitude` VARCHAR(255) NULL DEFAULT NULL,
	`modified` DATETIME NULL,
	`numero` VARCHAR(255) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `vagas_empresa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `url_imagem` text NOT NULL,
  `descricao_rapida` varchar(255) NOT NULL,
  `site` text NOT NULL,
  `periodo_trabalho` varchar(50) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `horario_trabalho` varchar(50) NOT NULL,
  `experiencia` varchar(50) NOT NULL,
  `escolaridade` varchar(50) NOT NULL,
  `descricao_completa` text NOT NULL,
  `empresa_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_vagas_empresa_empresas` (`empresa_id`),
  CONSTRAINT `FK_vagas_empresa_empresas` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
