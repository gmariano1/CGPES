CREATE TABLE `usuario` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `usuario`(`id`, `email`, `senha`, `perfil`, `data`, `nome`) VALUES 
(1, "admin@admin.com", "$2y$10$aUb060IZeClVrnreX3f7A.EQhIncxFGiaFeePt1faibtcKZ0kxX6S", "A", "","admin"); /*senha: 1234*/