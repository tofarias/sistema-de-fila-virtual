#SET FOREIGN_KEY_CHECKS=0;

drop database if EXISTS db_sgfv;
create database db_sgfv;
use db_sgfv;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `salas` (
  `sala_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localizacao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sala_id`),
  UNIQUE KEY `salas_codigo_unique` (`codigo`),
  UNIQUE KEY `salas_nome_unique` (`nome`),
  KEY `salas_created_by_foreign` (`created_by`),
  KEY `salas_updated_by_foreign` (`updated_by`),
  CONSTRAINT `salas_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `salas_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#INSERTS

INSERT INTO `db_sgfv`.`users`
(`id`,
`name`,
`email`,
`password`,
`remember_token`,
`created_at`)
VALUES
(1,
'usuario',
'usuario@email.com',
'$2y$10$nTVuvUiGUjI/G0vWXa6NrO6QN5ccIJuJw6aFo8rJTW3mYvzbKW8qe',
'abcdefghij',
now()
);

INSERT INTO `db_sgfv`.`salas`
(`sala_id`,
`codigo`,
`nome`,
`localizacao`,
`created_by`,
`created_at`
)
VALUES
(1,
'ABC01',
'sala de reuniões 01',
'predio A',
1,
now()
);
