-- Copiando estrutura para tabela job.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ramo` varchar(255) NOT NULL,
  `descricao_rapida` varchar(255) NOT NULL,
  `qtde_empregados` varchar(255) NOT NULL,
  `url_imagem` text,
  `site` text,
  `aniversario_empresa` date DEFAULT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url_facebook` varchar(255) DEFAULT NULL,
  `url_google_plus` varchar(255) DEFAULT NULL,
  `url_twitter` varchar(255) DEFAULT NULL,
  `url_github` varchar(255) DEFAULT NULL,
  `url_instagram` varchar(255) DEFAULT NULL,
  `url_youtube` varchar(255) DEFAULT NULL,
  `url_pinterest` varchar(255) DEFAULT NULL,
  `descricao_completa` text,
  `user_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_empresas_users` (`user_id`),
  CONSTRAINT `FK_empresas_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela job.enderecos
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bairro` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `endereco_completo` varchar(255) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela job.escolaridade
CREATE TABLE IF NOT EXISTS `escolaridade` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `instituicao` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `nivel` varchar(255) NOT NULL COMMENT 'escolaridade (Ensino médio, graduação)',
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `descricao_rapida` varchar(255) NOT NULL,
  `trabalhador_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_escolaridade_trabalhadores` (`trabalhador_id`),
  CONSTRAINT `FK_escolaridade_trabalhadores` FOREIGN KEY (`trabalhador_id`) REFERENCES `trabalhadores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela job.experiencia
CREATE TABLE IF NOT EXISTS `experiencia` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(255) NOT NULL,
  `instituicao` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `descricao` text NOT NULL,
  `trabalhador_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_experiencia_trabalhadores` (`trabalhador_id`),
  CONSTRAINT `FK_experiencia_trabalhadores` FOREIGN KEY (`trabalhador_id`) REFERENCES `trabalhadores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela job.trabalhadores
CREATE TABLE IF NOT EXISTS `trabalhadores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url_imagem` text,
  `nome` varchar(50) DEFAULT NULL,
  `profissao` varchar(45) DEFAULT NULL,
  `descricao_rapida` varchar(255) DEFAULT NULL,
  `site` text,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `habilidades` text,
  `url_linkedin` text,
  `url_facebook` text,
  `url_google_plus` text,
  `endereco_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_trabalhadores_users` (`user_id`),
  KEY `FK_trabalhadores_enderecos` (`endereco_id`),
  CONSTRAINT `FK_trabalhadores_enderecos` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`),
  CONSTRAINT `FK_trabalhadores_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela job.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela job.vagas_empresa
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
  `status` varchar(50) NOT NULL,
  `descricao_completa` text NOT NULL,
  `empresa_id` bigint(20) NOT NULL,
  `endereco_id` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_vagas_empresa_empresas` (`empresa_id`),
  KEY `FK_vagas_empresa_enderecos` (`endereco_id`),
  CONSTRAINT `FK_vagas_empresa_empresas` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  CONSTRAINT `FK_vagas_empresa_enderecos` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;