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
	`url_instagran` VARCHAR(255) NULL DEFAULT NULL,
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

