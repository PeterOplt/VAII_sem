<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Auth\AppUser $user */
?>
<link rel="stylesheet" href="<?= $link->asset('css/style_admin.css') ?>">
<div class="container-fluid">
    <h1>Správa pretekov</h1>
    <a class="btn btn-primary" href="<?= $link->url('race.index') ?>">Tabuľka pretekov</a>
</div>