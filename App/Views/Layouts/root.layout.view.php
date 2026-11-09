<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk" data-bs-theme="dark">
<head>
    <title><?= App\Configuration::APP_NAME ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $link->asset('favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $link->asset('favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $link->asset('favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= $link->asset('favicons/site.webmanifest') ?>">
    <link rel="shortcut icon" href="<?= $link->asset('favicons/favicon.ico') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= $link->asset('css/app.css') ?>">
    <script src="<?= $link->asset('js/script.js') ?>"></script>
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-sm bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand f1-font" href="<?= $link->url('home.index') ?>">
            F1 Fantasy
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Otvoriť navigáciu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url('home.index') ?>">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url('calendar.index') ?>">Kalendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url('fantasy.index') ?>">Fantasy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url('drivers.index') ?>">Jazdci</a>
                </li>
                <?php if ($user->isLoggedIn()) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= e($user->getName()) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="<?= $link->url('profile.index') ?>">Settings</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="<?= $link->url('admin.index') ?>">Admin</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="<?= $link->url('auth.logout') ?>">Log out</a>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= App\Configuration::LOGIN_URL ?>">Log in</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<main class="container-fluid">
    <?= $contentHTML ?>
</main>

<footer class="mt-auto py-2 bg-body-tertiary">
    <div class="container-fluid text-center">
        <span class="text-body-secondary">© <?= date('Y') ?> <?= App\Configuration::APP_NAME ?>. All rights reserved.</span>
    </div>
</footer>
</body>
</html>
