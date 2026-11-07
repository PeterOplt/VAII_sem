<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Auth\AppUser $user */
/** @var \App\Models\Race[] $races */
?>

<link rel="stylesheet" href="<?= $link->asset('css/style_race.css') ?>">
<div>
        <table class="race">
            <thead>
                <tr>
                    <th>Race</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($races as $race): ?>
                    <tr>
                        <td><?= $race->getName() ?></td>
                        <td><?= date('d.m.Y H:i',strtotime($race->getRaceDate())) ?></td>
                        <td><?= $race->getLocation() ?></td>
                        <td>
                            <button>Upraviť</button>
                            <button>Zmazať</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>