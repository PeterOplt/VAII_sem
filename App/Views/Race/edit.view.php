<?php

/** @var \App\Models\Race $race */
/** @var \Framework\Support\LinkGenerator $link */

$raceDate = $race->getRaceDate();
$raceDateValue = $raceDate !== null ? date('Y-m-d\TH:i', strtotime($raceDate)) : '';
?>

<div class="py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card f1-karta">
                <div class="card-body position-relative z-1">
                    <h1 class="f1-font text-uppercase">Upraviť pretek</h1>

                    <form method="post" action="<?= e($link->url('race.save')) ?>">
                        <input type="hidden" name="id" value="<?= e($race->getId()) ?>">

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name" class="form-label">Názov pretekov</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    value="<?= e($race->getName()) ?>"
                                    maxlength="255"
                                    required
                                    autofocus
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="country" class="form-label">Krajina</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="country"
                                    name="country"
                                    value="<?= e($race->getCountry()) ?>"
                                    maxlength="100"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="location" class="form-label">Lokalita</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="location"
                                    name="location"
                                    value="<?= e($race->getLocation()) ?>"
                                    maxlength="255"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="circuitName" class="form-label">Názov okruhu</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="circuitName"
                                    name="circuitName"
                                    value="<?= e($race->getCircuitName()) ?>"
                                    maxlength="255"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="raceDate" class="form-label">Dátum a čas pretekov</label>
                                <input
                                    type="datetime-local"
                                    class="form-control"
                                    id="raceDate"
                                    name="raceDate"
                                    value="<?= e($raceDateValue) ?>"
                                    required
                                >
                            </div>

                            <div class="col-md-4">
                                <label for="laps" class="form-label">Počet kôl</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="laps"
                                    name="laps"
                                    value="<?= e($race->getLaps()) ?>"
                                    min="1"
                                    required
                                >
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Popis</label>
                                <textarea
                                    class="form-control"
                                    id="description"
                                    name="description"
                                    rows="5"
                                    maxlength="65535"
                                ><?= e($race->getDescription()) ?></textarea>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Uložiť zmeny</button>
                            <a href="<?= e($link->url('race.index')) ?>" class="btn btn-secondary">Zrušiť</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
