CREATE DATABASE avaliacao_3;

USE avaliacao_3;

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `last_name` varchar(191) NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

