SET NAMES utf8mb4;

CREATE TABLE `teams` (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         name VARCHAR(255) NOT NULL UNIQUE,
                         baseLocation VARCHAR(255) NOT NULL,
                         powerUnit VARCHAR(255) NOT NULL,
                         logoPath VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;