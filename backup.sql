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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO admins VALUES ('1','Admin One','','jaybayron400@gmail.com','','','$2y$10$wxJywCmCDvOxKdVSj2wMRO4Rozs/VUmyMfXa0cuGgsykL.Ag9d7jC','','','2023-07-06 11:40:38','2023-07-06 13:07:28');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;
INSERT INTO supports VALUES ('54','Support Six','12312312376','jaybayron4002@gmail.com','','','','','','2023-07-02 20:46:25','2023-07-07 16:44:50');
INSERT INTO supports VALUES ('56','Support Fourteen','1293812378','jaybayron4004@gmail.com','','','','','','2023-07-04 20:46:25','2023-07-07 17:23:45');
INSERT INTO supports VALUES ('57','Support sixteen','12312312376','jaybayron4005@gmail.com','','','','','','2023-07-05 20:46:25','2023-07-07 16:44:50');
INSERT INTO supports VALUES ('58','Support fifthteen','12312312376','jaybayron4006@gmail.com','','','','','','2023-07-06 20:46:25','2023-07-07 15:37:16');
INSERT INTO supports VALUES ('60','Support Nine','12312312376','jaybayron4008@gmail.com','','','','','','2023-07-08 20:46:25','2023-07-07 16:44:50');
INSERT INTO supports VALUES ('65','Support Four','12312312376','jaybayron40013@gmail.com','','','','','','2023-07-09 20:46:25','2023-07-07 16:44:50');
INSERT INTO supports VALUES ('66','support nineteen','12312312376','jaybayron40014@gmail.com','','','','','','2023-07-09 20:46:25','2023-07-07 16:44:50');
INSERT INTO supports VALUES ('69','Support Five','12312312376','jaybayron40017@gmail.com','','','','','','2023-07-04 20:46:25','2023-07-07 17:25:14');
INSERT INTO supports VALUES ('71','Support One','129837129837','jaybayron40019@gmail.com','','','','','','2023-07-05 20:46:25','2023-07-07 16:44:50');
INSERT INTO supports VALUES ('76','Nigel Gaines','+1 (273) 438-3447','nakifajyni@mailinator.com','','','$2y$10$9FDMteeKpuGsLQtLY50WG.FhKb1QHPfGsdx7jBYd.QfygvP2krh9.','','','2023-07-07 18:41:40','2023-07-07 18:41:40');
INSERT INTO supports VALUES ('77','Imogene Osborne','+1 (308) 883-8682','zafur@mailinator.com','','','$2y$10$0eKW1/6EvO1qHFxbAJwQAOvZfz6imQbDyq6V.Cv.N0RzXtMwPgzqG','','','2023-07-07 18:42:33','2023-07-07 18:42:33');
INSERT INTO supports VALUES ('78','Erich Stuart','+1 (164) 944-1444','cexoru@mailinator.com','','','$2y$10$cHeupOIkZFyu932MAfsQWOaLE8kZoB.3Y7Jb6AN914YKbczzUBgBe','','','2023-07-07 18:42:54','2023-07-07 18:42:54');
INSERT INTO supports VALUES ('79','Halee Miller','+1 (885) 402-5735','dimadyri@mailinator.com','','','$2y$10$LT6N.HKW/Bet1oG4BfW2nevmY45m7idPFPNZseWB0lDWlFKXzEoXi','','','2023-07-07 18:43:23','2023-07-07 18:43:23');
INSERT INTO supports VALUES ('80','Rajah Porter','+1 (662) 102-8852','gudysu@mailinator.com','','','$2y$10$/iMEAHf9E6jT9TYnv2IoBuFOZcwL7lOX1TaJiUiEjJMIbSWYrTGES','','','2023-07-07 18:44:32','2023-07-07 18:44:32');
INSERT INTO supports VALUES ('81','Sarah Love','+1 (918) 372-9877','pitu@mailinator.com','','','$2y$10$MNFtM0MaUNYqCQG6nXlxMOkWJT9C/UMFOsmVm3R410JCSTS.wT3Cu','','','2023-07-07 18:45:57','2023-07-07 18:45:57');
INSERT INTO supports VALUES ('82','Jerry Quinn','+1 (506) 844-7963','fotivim@mailinator.com','','','$2y$10$mJsO5Mstq7Dk8kayYQ7iHOnvp20L99Hdj9.qdFuLPYCatJMSWTVAC','','','2023-07-07 18:47:40','2023-07-07 18:47:40');
INSERT INTO supports VALUES ('103','Lance Ferrell','+1 (716) 901-1243','xycydam@mailinator.com','','','$2y$10$1GjHhM1G9saUdTgzZXr3NOtHnB98cLVo1m8XQqA3j.vWAc8.kWGnm','','','2023-07-07 18:50:19','2023-07-07 18:50:19');
INSERT INTO supports VALUES ('105','Kyle Kaufman','+1 (552) 942-8811','nyfebez@mailinator.com','','','$2y$10$iBUNUmlfDDYI0nI5jvwsO..8gOR1BbB4MRjTcpE9jZ.eAWcVXY0lm','','','2023-07-07 18:51:58','2023-07-07 18:51:58');
INSERT INTO supports VALUES ('107','Cheyenne Weeks','+1 (902) 562-3867','cewobazi@mailinator.com','','','$2y$10$e2tOXgogXXh3rPX6834xsObNnrOOhRR9rKduCl/aGGRZhBJu3Rqfm','','','2023-07-07 20:03:21','2023-07-07 20:03:21');
INSERT INTO supports VALUES ('109','Myra Mercado','+1 (474) 143-1502','qenocuh@mailinator.com','','','$2y$10$GiSNfH6kEQlgWER75t2nA.5QbK3Zf7Y4AXlmk8gq.UiYKvJq.NWnq','','','2023-07-07 20:57:26','2023-07-07 20:57:26');
INSERT INTO supports VALUES ('110','Ronan Goff','+1 (492) 732-1029','norikefy@mailinator.com','','','$2y$10$6UQDkiINvRiNpRV.SD3DiehViYtgZJvR0hHe5e5oLOyC9H3MoT7QS','','','2023-07-07 20:57:58','2023-07-07 20:57:58');
INSERT INTO supports VALUES ('113','Imogene Howell','+1 (327) 793-5686','gynitiba@mailinator.com','','','$2y$10$98FszMdUDAuQCyku2ri6qemrD2GOKG0V8VEcwirUPM8AE64pSc0ma','','','2023-07-07 20:58:33','2023-07-07 20:58:33');
INSERT INTO supports VALUES ('115','Hector Buchanan','+1 (102) 298-2939','zilyk@mailinator.com','','','$2y$10$Rrrq4BzxjUOiAj8NY4mdteJZplWjUZC3.rGfLjYBDGvcwRkzggDvi','','','2023-07-07 20:58:48','2023-07-07 20:58:48');
INSERT INTO supports VALUES ('117','Devin Cantrell','+1 (445) 768-1329','kyfukoxuh@mailinator.com','','','$2y$10$kqQJH8/ErtjXCKpC7Yqtg.MyvlawQjFeQZFmUg1kch/V/JeWbA3ka','','','2023-07-07 20:59:01','2023-07-07 20:59:01');
INSERT INTO supports VALUES ('118','Erasmus Finley','+1 (522) 826-3846','mymizife@mailinator.com','','','$2y$10$dWcnjG9SLSwgv9fQdKhLZeGohQZ8FVH9aEbjRTuX7nvP6.9kiDlry','','','2023-07-07 20:59:07','2023-07-07 20:59:07');
INSERT INTO supports VALUES ('119','Lev Delgado','+1 (954) 312-6133','fafumuqusi@mailinator.com','','','$2y$10$sRExv/Tm.JP771k60Xvj6ebhgt0hmMlKqn.V1IgbOlnLbKOKtojZ6','','','2023-07-07 20:59:12','2023-07-07 20:59:12');
INSERT INTO supports VALUES ('120','Leandra Mcintyre','+1 (994) 919-1136','wemesyhu@mailinator.com','','','$2y$10$b1m3k6RZDA06CKjVzwVSnuUXnIspIhVvDVlG6XYJcOGEQyembX402','','','2023-07-07 20:59:16','2023-07-07 20:59:16');
INSERT INTO supports VALUES ('122','Alana Houston','+1 (138) 733-1179','vycahuz@mailinator.com','','','$2y$10$mmI8aIkVOvFtbGxmQsNfkuoUV3Smd/bu5GfmCbOBG8PFTkaa.dnCe','','','2023-07-07 22:35:44','2023-07-07 22:35:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES ('1','User One','','jaybayron400@gmail.com','','','$2y$10$toryx4gf007DZr4AdJnGSu2FSBDBUZn6QWTKGzIfI3oWQfpiRTOiG','','','2023-07-08 17:24:21','2023-07-08 17:24:21');
