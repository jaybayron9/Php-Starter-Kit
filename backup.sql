CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verify_token` varchar(100) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `profile_photo_path` varchar(1000) DEFAULT NULL,
  `access_enabled` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
INSERT INTO admins VALUES ('1','Admin One','','jaybayron400@gmail.com','','','$2y$10$Ku/WemVHvwNKSHO6bD9BauxyhfJGGJs9tkJVKDzfjq/M2kVm1iPh2','','','1','2023-07-08 17:39:54','2023-07-08 17:39:54');
CREATE TABLE `supports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verify_token` varchar(100) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `profile_photo_path` varchar(1000) DEFAULT NULL,
  `access_enabled` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
INSERT INTO supports VALUES ('1','Support One','0923912039','jaybayron400@gmail.com','','','$2y$10$YfH9Ss3AmLT6JehkoHJR5uVOV3Lwq2Zjfk29q6vELIUhbAgoqUT8a','','','1','2023-07-08 17:39:54','2023-07-09 00:40:33');
INSERT INTO supports VALUES ('7','Kenneth Waller','+1 (281) 677-4435','cemalohol@mailinator.com','','','$2y$10$VCaGZy1ioiRGDP1lT8oNgOcIt42YcHsNpSYqRuIteyQYCTD2Fclzm','','','1','2023-07-09 00:18:01','2023-07-09 00:18:01');
INSERT INTO supports VALUES ('9','Branden Sawyer','+1 (586) 488-6038','tixaj@mailinator.com','','','$2y$10$9REOxZ06rbW47EZP8qqsKuLP/YfbLeUyokh4.jE6XpqcC7e/44wT.','','','1','2023-07-09 00:36:41','2023-07-09 00:36:41');
INSERT INTO supports VALUES ('10','Hanna Hyde','+1 (553) 469-7811','gytycomy@mailinator.com','','','$2y$10$5UHRfYj4hNs.PwEzYhLDcOYiIwQr75NkiQR8rNWovsbCF2xEd7m3S','','','1','2023-07-09 00:37:10','2023-07-09 00:37:10');
INSERT INTO supports VALUES ('11','Marny Kid','+1 (621) 756-6422','taqedoxije@mailinator.com','','','$2y$10$e3vwySVdpxmRWK.mdTEABu/DkEVt8aDBzV8fEW1ZKWvx.84IhUWoC','','','1','2023-07-09 00:37:17','2023-07-09 01:28:25');
INSERT INTO supports VALUES ('12','Emma Hartman','+1 (664) 743-3033','siweh@mailinator.com','','','$2y$10$/GnvdISMtppzcXMCgD45/O8SL1uYmTLyibxp8DSR3j2J5iSZ9tazq','','','1','2023-07-09 00:37:25','2023-07-09 00:37:25');
INSERT INTO supports VALUES ('13','Kaden Stokes','+1 (657) 829-7581','zenycyti@mailinator.com','','','$2y$10$IeN4zo6PotdGUFA2bh0Y5e1ffao2UtaWcrEqXm39UMkkNuH5hlZuK','','','1','2023-07-09 00:37:51','2023-07-09 00:37:51');
INSERT INTO supports VALUES ('15','Clinton Walters','+1 (774) 159-8646','tosybu@mailinator.com','','','$2y$10$qb75s0DibFv8OwmXAJAIee9Lj5RReDf3FfUzj1UWKkyIkIYPpLXDW','','','1','2023-07-09 00:38:23','2023-07-09 00:38:23');
INSERT INTO supports VALUES ('16','Darrel Nash','+1 (804) 812-1453','nobavu@mailinator.com','','','$2y$10$yVrB6wslc0P3Ui5e7eeb5.QbLLEYBOF8PFzIMqx.5.oclYtYGQ1wK','','','1','2023-07-09 00:39:30','2023-07-09 00:39:30');
INSERT INTO supports VALUES ('17','Cherokee Jennings','+1 (796) 882-3959','mozofi@mailinator.com','','','$2y$10$BKLlw9I.eTyRPlhyniZ4OOV1DS59pmOp4hMbFOBt1hKSjcx9NUzDi','','','1','2023-07-09 00:41:33','2023-07-09 00:41:33');
INSERT INTO supports VALUES ('19','Carla Howe','+1 (608) 473-2713','lypywapu@mailinator.com','','','$2y$10$HfnLKoIjimzqaayCzfe9vO.Mq1TNHAZYsLZLaRXorOj.geaiQbATi','','','1','2023-07-09 00:45:17','2023-07-09 00:45:17');
INSERT INTO supports VALUES ('20','Dorothy Le ko','+1 (652) 634-4267','wozyze@mailinator.com','','','$2y$10$wHSvBfFBSFE28.vixvA2IO.0sOeyDGxWp9TO7THm./DAzW0Z4BDTC','','','1','2023-07-09 00:45:48','2023-07-09 01:28:04');
INSERT INTO supports VALUES ('21','Leslie Harris','+1 (628) 893-8531','dobab@mailinator.com','','','$2y$10$1RknLnWCIrVB8kS847GUkeUNhpoxTp3XA2XAL83Smxqjx9YzE8Nci','','','1','2023-07-09 00:49:23','2023-07-09 00:49:23');
INSERT INTO supports VALUES ('22','Fleur Ingram','+1 (609) 342-7907','mynohykub@mailinator.com','','','$2y$10$fCiIxNMs8sIeuBQ9jXfYjeaXJFykQ9E5RqddJkqnKE0v5Y3erppE.','','','1','2023-07-09 01:27:32','2023-07-09 01:27:32');
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verify_token` varchar(100) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `profile_photo_path` varchar(1000) DEFAULT NULL,
  `access_enabled` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
INSERT INTO users VALUES ('1','User One','09504523523','jaybayron400@gmail.com','','2023-07-08 17:39:55','$2y$10$TZyqPInWMJl.bKvf1he9guzaiKT0/CZC/0jPMmLK07/prYwKqoMfa','','','1','2023-07-08 17:39:55','2023-07-09 02:23:17');
