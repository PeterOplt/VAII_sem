SET NAMES utf8mb4;

INSERT INTO teams (name, baseLocation, powerUnit, logoPath) VALUES
                                                                ('McLaren',       'Woking, Spojené kráľovstvo',       'Mercedes', NULL),
                                                                ('Ferrari',       'Maranello, Taliansko',             'Ferrari',  NULL),
                                                                ('Red Bull Racing','Milton Keynes, Spojené kráľovstvo','Red Bull Ford', NULL),
                                                                ('Mercedes',      'Brackley, Spojené kráľovstvo',     'Mercedes', NULL),
                                                                ('Aston Martin',  'Silverstone, Spojené kráľovstvo',  'Honda',    NULL),
                                                                ('Alpine',        'Enstone, Spojené kráľovstvo',      'Mercedes', NULL),
                                                                ('Williams',      'Grove, Spojené kráľovstvo',        'Mercedes', NULL),
                                                                ('Racing Bulls',  'Faenza, Taliansko',                'Red Bull Ford', NULL),
                                                                ('Haas',          'Kannapolis, USA',                  'Ferrari',  NULL),
                                                                ('Audi',          'Hinwil, Švajčiarsko',              'Audi',     NULL),
                                                                ('Cadillac',      'Fishers, USA',                     'Ferrari',  NULL);

-- =====================================================
-- JAZDCI (id 1–22, teamId podľa poradia tímov vyššie)
-- =====================================================
INSERT INTO drivers (firstName, lastName, number, nationality, teamId, imagePath) VALUES
                                                                                      ('Lando',     'Norris',     4,  'Veľká Británia', 1,  NULL),  -- 1
                                                                                      ('Oscar',     'Piastri',    81, 'Austrália',      1,  NULL),  -- 2
                                                                                      ('Charles',   'Leclerc',    16, 'Monako',         2,  NULL),  -- 3
                                                                                      ('Lewis',     'Hamilton',   44, 'Veľká Británia', 2,  NULL),  -- 4
                                                                                      ('Max',       'Verstappen', 1,  'Holandsko',      3,  NULL),  -- 5
                                                                                      ('Isack',     'Hadjar',     6,  'Francúzsko',     3,  NULL),  -- 6
                                                                                      ('George',    'Russell',    63, 'Veľká Británia', 4,  NULL),  -- 7
                                                                                      ('Kimi',      'Antonelli',  12, 'Taliansko',      4,  NULL),  -- 8
                                                                                      ('Fernando',  'Alonso',     14, 'Španielsko',     5,  NULL),  -- 9
                                                                                      ('Lance',     'Stroll',     18, 'Kanada',         5,  NULL),  -- 10
                                                                                      ('Pierre',    'Gasly',      10, 'Francúzsko',     6,  NULL),  -- 11
                                                                                      ('Franco',    'Colapinto',  43, 'Argentína',      6,  NULL),  -- 12
                                                                                      ('Alexander', 'Albon',      23, 'Thajsko',        7,  NULL),  -- 13
                                                                                      ('Carlos',    'Sainz',      55, 'Španielsko',     7,  NULL),  -- 14
                                                                                      ('Liam',      'Lawson',     30, 'Nový Zéland',    8,  NULL),  -- 15
                                                                                      ('Arvid',     'Lindblad',   41, 'Veľká Británia', 8,  NULL),  -- 16
                                                                                      ('Esteban',   'Ocon',       31, 'Francúzsko',     9,  NULL),  -- 17
                                                                                      ('Oliver',    'Bearman',    87, 'Veľká Británia', 9,  NULL),  -- 18
                                                                                      ('Nico',      'Hülkenberg', 27, 'Nemecko',        10, NULL),  -- 19
                                                                                      ('Gabriel',   'Bortoleto',  5,  'Brazília',       10, NULL),  -- 20
                                                                                      ('Sergio',    'Pérez',      11, 'Mexiko',         11, NULL),  -- 21
                                                                                      ('Valtteri',  'Bottas',     77, 'Fínsko',         11, NULL);  -- 22

-- =====================================================
-- PRETEKY (id 1–10)
-- 1–6 už prebehli a majú výsledky, 7–10 sú budúce
-- Časy sú v slovenskom čase
-- =====================================================
INSERT INTO races (name, country, location, circuitName, raceDate, laps, description, imagePath,
                   resultP1DriverId, resultP2DriverId, resultP3DriverId) VALUES
                                                                             ('Veľká cena Austrálie',      'Austrália',      'Melbourne',     'Albert Park Circuit',               '2026-03-08 05:00:00', 58, 'Úvodné preteky sezóny na pouličnom okruhu v parku okolo jazera.', NULL, 5, 1, 7),
                                                                             ('Veľká cena Monaka',         'Monako',         'Monte Carlo',   'Circuit de Monaco',                 '2026-06-07 15:00:00', 78, 'Najslávnejšie pouličné preteky s minimom možností na predbiehanie.', NULL, 3, 1, 2),
                                                                             ('Veľká cena Veľkej Británie','Veľká Británia', 'Silverstone',   'Silverstone Circuit',               '2026-07-05 16:00:00', 52, 'Rýchly okruh na bývalom letisku, domov britskej F1.', NULL, 1, 2, 5),
                                                                             ('Veľká cena Belgicka',       'Belgicko',       'Stavelot',      'Circuit de Spa-Francorchamps',      '2026-07-19 15:00:00', 44, 'Najdlhší okruh kalendára so slávnou zákrutou Eau Rouge.', NULL, 2, 5, 3),
                                                                             ('Veľká cena Talianska',      'Taliansko',      'Monza',         'Autodromo Nazionale Monza',         '2026-09-06 15:00:00', 53, 'Chrám rýchlosti s najvyššími priemernými rýchlosťami v sezóne.', NULL, 5, 4, 1),
                                                                             ('Veľká cena Mexika',         'Mexiko',         'Mexico City',   'Autódromo Hermanos Rodríguez',      '2026-11-01 21:00:00', 71, 'Okruh vo vysokej nadmorskej výške s výnimočnou atmosférou na štadióne.', NULL, 1, 5, 3),
                                                                             ('Veľká cena São Paula',      'Brazília',       'São Paulo',     'Autódromo José Carlos Pace',        '2026-11-08 18:00:00', 71, 'Krátky kopcovitý okruh Interlagos známy dramatickými pretekmi.', NULL, NULL, NULL, NULL),
                                                                             ('Veľká cena Las Vegas',      'USA',            'Las Vegas',     'Las Vegas Strip Circuit',           '2026-11-22 05:00:00', 50, 'Nočné preteky po slávnom bulvári Las Vegas Strip.', NULL, NULL, NULL, NULL),
                                                                             ('Veľká cena Kataru',         'Katar',          'Lusail',        'Lusail International Circuit',      '2026-11-29 17:00:00', 57, 'Rýchly okruh s plynulými zákrutami pod umelým osvetlením.', NULL, NULL, NULL, NULL),
                                                                             ('Veľká cena Abú Zabí',       'SAE',            'Abú Zabí',      'Yas Marina Circuit',                '2026-12-06 14:00:00', 58, 'Záverečné preteky sezóny za súmraku.', NULL, NULL, NULL, NULL);

-- =====================================================
-- POUŽÍVATELIA (id 1–4)
-- admin / admin123
-- peter, lucia, alex / heslo123
-- totalPoints = súčet pointsEarned z ich tipov nižšie
-- =====================================================
INSERT INTO users (username, email, passwordHash, role, totalPoints, avatarPath) VALUES
                                                                                     ('admin', 'admin@f1hub.sk', '$2y$10$9NS2UNFOMFwhmS4WsClGIOaC.YAgZYPc8UglyUgf1JDnb7JO4zOBK', 'admin', 0,  NULL),
                                                                                     ('peter', 'peter@f1hub.sk', '$2y$10$YPUjmDuE.z0nmWKL7p76C./htwR6Hv9UUMkU1/L.SAcElvPSFWll6', 'user',  62, NULL),
                                                                                     ('lucia', 'lucia@f1hub.sk', '$2y$10$YPUjmDuE.z0nmWKL7p76C./htwR6Hv9UUMkU1/L.SAcElvPSFWll6', 'user',  55, NULL),
                                                                                     ('alex',  'alex@f1hub.sk',  '$2y$10$YPUjmDuE.z0nmWKL7p76C./htwR6Hv9UUMkU1/L.SAcElvPSFWll6', 'user',  33, NULL);

-- =====================================================
-- TIPY
-- Ukážkové bodovanie: 10 b za presnú pozíciu,
-- 3 b za jazdca v top 3 na inej pozícii
-- =====================================================
INSERT INTO predictions (userId, raceId, predictedP1DriverId, predictedP2DriverId, predictedP3DriverId, pointsEarned, createdAt) VALUES
-- peter (spolu 62)
(2, 4, 2, 5, 3, 30, '2026-07-17 20:00:00'),
(2, 5, 5, 1, 4, 16, '2026-09-04 18:30:00'),
(2, 6, 5, 1, 3, 16, '2026-10-30 21:15:00'),
(2, 7, 1, 5, 2, 0,  '2026-11-05 19:00:00'),  -- budúce preteky, ešte nevyhodnotené
-- lucia (spolu 55)
(3, 4, 5, 2, 3, 16, '2026-07-18 10:00:00'),
(3, 5, 5, 4, 1, 30, '2026-09-05 12:00:00'),
(3, 6, 3, 1, 5, 9,  '2026-10-31 09:45:00'),
(3, 7, 5, 1, 3, 0,  '2026-11-06 08:30:00'),  -- budúce preteky
-- alex (spolu 33)
(4, 4, 1, 7, 8, 0,  '2026-07-18 22:00:00'),
(4, 5, 5, 7, 4, 13, '2026-09-05 23:10:00'),
(4, 6, 1, 5, 8, 20, '2026-11-01 08:00:00');

-- =====================================================
-- OBĽÚBENÍ JAZDCI
-- =====================================================
INSERT INTO user_favorite_drivers (userId, driverId) VALUES
                                                         (2, 1), (2, 3), (2, 10),
                                                         (3, 4), (3, 7),
                                                         (4, 5);