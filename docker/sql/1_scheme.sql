SET NAMES utf8mb4;

CREATE TABLE `teams` (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         name VARCHAR(255) NOT NULL UNIQUE,
                         baseLocation VARCHAR(255) NOT NULL,
                         powerUnit VARCHAR(255) NOT NULL,
                         logoPath VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `drivers` (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         firstName VARCHAR(50) NOT NULL,
                         lastName VARCHAR(50) NOT NULL,
                         number INT NOT NULL,
                         nationality VARCHAR(50) NOT NULL,
                         teamId INT NULL,
                         imagePath VARCHAR(255) NULL,
                         FOREIGN KEY (teamId) REFERENCES teams(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `races` (
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        name VARCHAR(255) NOT NULL,
                        country VARCHAR(100) NOT NULL,
                        location VARCHAR(255) NOT NULL,
                        circuitName VARCHAR(255) NOT NULL,
                        raceDate DATETIME NOT NULL,
                        laps INT NOT NULL,
                        description TEXT NULL,
                        imagePath VARCHAR(255) NULL,
                        resultP1DriverId INT NULL,
                        resultP2DriverId INT NULL,
                        resultP3DriverId INT NULL,
                        FOREIGN KEY (resultP1DriverId) REFERENCES drivers(id) ON DELETE SET NULL,
                        FOREIGN KEY (resultP2DriverId) REFERENCES drivers(id) ON DELETE SET NULL,
                        FOREIGN KEY (resultP3DriverId) REFERENCES drivers(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         username VARCHAR(50) NOT NULL UNIQUE,
                         email VARCHAR(255) NOT NULL UNIQUE,
                         passwordHash VARCHAR(255) NOT NULL,
                         role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
                         totalPoints INT NOT NULL DEFAULT 0,
                         avatarPath VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `predictions` (
                               id INT PRIMARY KEY AUTO_INCREMENT,
                               userId INT NOT NULL,
                               raceId INT NOT NULL,
                               predictedP1DriverId INT NOT NULL,
                               predictedP2DriverId INT NOT NULL,
                               predictedP3DriverId INT NOT NULL,
                               pointsEarned INT NOT NULL DEFAULT 0,
                               createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                               UNIQUE (userId, raceId),
                               FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE,
                               FOREIGN KEY (raceId) REFERENCES races(id) ON DELETE CASCADE,
                               FOREIGN KEY (predictedP1DriverId) REFERENCES drivers(id) ON DELETE RESTRICT,
                               FOREIGN KEY (predictedP2DriverId) REFERENCES drivers(id) ON DELETE RESTRICT,
                               FOREIGN KEY (predictedP3DriverId) REFERENCES drivers(id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `user_favorite_drivers` (
                                         id INT PRIMARY KEY AUTO_INCREMENT,
                                         userId INT NOT NULL,
                                         driverId INT NOT NULL,
                                         UNIQUE (userId, driverId),
                                         FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE,
                                         FOREIGN KEY (driverId) REFERENCES drivers(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;