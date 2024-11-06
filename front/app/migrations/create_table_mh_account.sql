-- manhotel.mh_account definition

CREATE TABLE `mh_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- password admin123
INSERT INTO manhotel.mh_account
(username, password, email, created_at, id)
VALUES('demo', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin@gmail.com', '2024-11-06 19:18:19.489', null);
