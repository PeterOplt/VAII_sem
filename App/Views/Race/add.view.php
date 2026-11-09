<?php

/** @var \App\Models\Race $race */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card f1-karta">
                <div class="card-body position-relative z-1">
                    <h1 class="1-font text-uppercase">Pridať pretek</h1>

                    <form method="post" action="<?= e($link->url('race.save')) ?>">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name" class="form-label">Názov pretekov</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
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
                                ></textarea>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Uložiť pretek</button>
                            <a href="<?= e($link->url('race.index')) ?>" class="btn btn-secondary">Zrušiť</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
