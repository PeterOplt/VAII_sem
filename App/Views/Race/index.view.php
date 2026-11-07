<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Auth\AppUser $user */
/** @var \App\Models\Race[] $races */
?>

<link rel="stylesheet" href="<?= $link->asset('css/style_race.css') ?>">
<div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">Preteky</h1>
            <a href="<?= e($link->url('race.add')) ?>" class="btn btn-primary">Pridať pretek</a>
        </div>
        <table class="race">
            <thead>
                <tr>
                    <th>Race</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Circuit</th>
                    <th>Laps</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($races as $race): ?>
                    <tr>
                        <td><?= e($race->getName()) ?></td>
                        <td><?= date('d.m.Y H:i',strtotime($race->getRaceDate())) ?></td>
                        <td><?= e($race->getLocation()) ?></td>
                        <td><?= e($race->getCircuitName()) ?></td>
                        <td><?= e($race->getLaps()) ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="<?= e($link->url('race.edit', ['id' => $race->getId()])) ?>">Upraviť</a>
                            <form method="post" action="<?= e($link->url('race.delete')) ?>" class="d-inline">
                                <input type="hidden" name="id" value="<?= e($race->getId()) ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Zmazať</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>