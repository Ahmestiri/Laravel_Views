SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_20_094914_create_profiles_table', 1);

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bureau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `class`, `pole`, `bureau`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed', 'Mestiri', 'ahmed.mestiri@supcom.tn', NULL, '$2y$10$y9hDnwmZiGkxZi7kc0LU9.TCoo2TppUVbxRPwaJauhCdb2IKOzJQ.', 'INDP1', 'Projet', '', NULL, '2022-06-06 23:51:34', '2022-06-06 23:52:18'),
(2, 'Bacem', 'Ben Hamed', 'bacem.benhamed@supcom.tn', NULL, '$2y$10$JwbNeoEeSnWUJudUly3.B.y28Sj2NnqzKaNNCkjdm6u9EFJqntvpC', 'INDP2', 'Projet', 'on', NULL, '2022-06-06 23:56:37', '2022-06-06 23:56:37'),
(3, 'Yahya', 'Allaya', 'yahya.allaya@supcom.tn', NULL, '$2y$10$1DADaKcbjYdwQ.mUvm4Xe.wm8ePheEa.5t0aNtOEO76PZmeRbM5my', 'INDP2', 'RH', 'on', NULL, '2022-06-06 23:57:57', '2022-06-06 23:57:57'),
(4, 'Takwa', 'Assadi', 'takwa.assadi@supcom.tn', NULL, '$2y$10$4uOsRl35rGJqbsFzBf1nz.atQ/3crjssHTf4S4Xj/JKIMtGUyhGEK', 'INDP2', 'DevCo', 'on', NULL, '2022-06-06 23:59:12', '2022-06-06 23:59:12'),
(5, 'Abdelhamid', 'Ben Chedly', 'abdelhamid.benchedly@supcom.tn', NULL, '$2y$10$Sl0XaQPLlcxSZ5YMGc6CG.izBblWLy6nUYgXK/ShztocsQ6lZSX3m', 'INDP2', 'Marketing', 'on', NULL, '2022-06-07 00:00:44', '2022-06-07 00:00:44');

INSERT INTO `profiles` (`id`, `user_id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'profile/OMzHNAtqHC3i78pIIO1fByiHAVXbxmmamqrYDxo0.jpg', 'https://www.facebook.com/Ahmestiri', '2022-06-06 23:51:34', '2022-06-06 23:55:27'),
(2, 2, 'profile/jPc0EQwc7zByVNK2CE1gIdzOefUSz7lQfQZGQ9E3.jpg', 'https://www.facebook.com/profile.php?id=100009433672372', '2022-06-06 23:56:37', '2022-06-06 23:57:03'),
(3, 3, 'profile/EV3b4WpQpBmM02xV9kuXGxRZbYG8eoIJreBXPZan.jpg', 'https://www.facebook.com/yahya.allaya', '2022-06-06 23:57:57', '2022-06-06 23:58:40'),
(4, 4, 'profile/Vrtk2vzLZJt5B6eRAmIKS65Xe3m8FKFzeRDVBy4d.jpg', 'https://www.facebook.com/profile.php?id=100006566268850', '2022-06-06 23:59:12', '2022-06-06 23:59:58'),
(5, 5, 'profile/GftQiMLCjnhCdUKVAuzNCB8zDS1ZxxwmRcnD0YdP.jpg', 'https://www.facebook.com/abdelhamid.benchedly', '2022-06-07 00:00:44', '2022-06-07 00:01:10');

ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

