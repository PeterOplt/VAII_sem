<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Auth\AppUser $user */
/** @var \App\Models\Race[] $races */
/** @var \App\Models\Driver[] $drivers */
/** @var \App\Models\Prediction[] $predictions */
?>

<div class="vstack gap-4 py-5">
    <section class="card f1-karta">
        <div class="card-body p-4 position-relative z-1">
            <h2 class="f1-font text-uppercase fs-3 karta-nadpis">Do uzávierky tipov zostáva:</h2>
            <div class="row row-cols-2 row-cols-md-4 g-3">
                <div class="col">
                    <div class="border rounded p-3 text-center">
                        <div class="display-4 fw-bold lh-1 text-danger f1-font">03</div>
                        <div class="small text-uppercase fw-bold text-body-secondary mt-2">Dni</div>
                    </div>
                </div>
                <div class="col">
                    <div class="border rounded p-3 text-center">
                        <div class="display-4 fw-bold lh-1 text-danger f1-font">15</div>
                        <div class="small text-uppercase fw-bold text-body-secondary mt-2">Hodín</div>
                    </div>
                </div>
                <div class="col">
                    <div class="border rounded p-3 text-center">
                        <div class="display-4 fw-bold lh-1 text-danger f1-font">55</div>
                        <div class="small text-uppercase fw-bold text-body-secondary mt-2">Minút</div>
                    </div>
                </div>
                <div class="col">
                    <div class="border rounded p-3 text-center">
                        <div class="display-4 fw-bold lh-1 text-danger f1-font">19</div>
                        <div class="small text-uppercase fw-bold text-body-secondary mt-2">Sekúnd</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="row g-4">
        <div class="col-12 col-lg-4">
            <article class="card f1-karta h-100">
                <div class="card-body p-4 position-relative z-1">
                    <h2 class="f1-font text-uppercase fs-3 karta-nadpis">Vybraní jazdci</h2>
                    <form action="<?php echo e($link->url('fantasy.save')) ?>" method="post">

                        <div class="mb-3">
                            <label for="race-selected" class="form-label small text-uppercase fw-bold text-body-secondary">Zvoľ pretek:</label>
                            <select class="form-select" id="race-selected" name="raceId">
                                <?php foreach ($races as $race): ?>
                                    <option value="<?= $race->getId() ?>"><?= e($race->getName()) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>



                        <div class="mb-3">
                            <label for="p1-select" class="form-label small text-uppercase fw-bold text-body-secondary">P1:</label>
                            <select class="form-select" id="p1-select" name="predictedP1DriverId">
                                <option value="" disabled selected>Zvoľ jazdca</option>
                                <?php foreach ($drivers as $driver): ?>
                                    <option value="<?= $driver->getId() ?>"><?= e($driver->getFirstName() . ' ' . $driver->getLastName()) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="p2-select" class="form-label small text-uppercase fw-bold text-body-secondary">P2:</label>
                            <select class="form-select" id="p2-select" name="predictedP2DriverId">
                                <option value="" disabled selected>Zvoľ jazdca</option>
                                <?php foreach ($drivers as $driver): ?>
                                    <option value="<?= $driver->getId() ?>"><?= e($driver->getFirstName() . ' ' . $driver->getLastName()) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="p3-select" class="form-label small text-uppercase fw-bold text-body-secondary">P3:</label>
                            <select class="form-select" id="p3-select" name="predictedP3DriverId">
                                <option value="" disabled selected>Zvoľ jazdca</option>
                                <?php foreach ($drivers as $driver): ?>
                                    <option value="<?= $driver->getId() ?>"><?= e($driver->getFirstName() . ' ' . $driver->getLastName()) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 text-uppercase fw-bold ">Uložiť tip</button>
                    </form>
                </div>
            </article>
        </div>

        <div class="col-12 col-lg-4">
            <section class="card f1-karta h-100">
                <div class="card-body p-4 position-relative z-1">
                    <h2 class="f1-font text-uppercase fs-3 karta-nadpis">Zoznam jazdcov:</h2>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($drivers as $driver): ?>
                            <li class="list-group-item bg-transparent"><?=
                                e($driver->getFirstName() . ' ' . $driver->getLastName() . ' (' . $driver->getTeam()->getName() . ')'
                                ) ?></li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </section>
        </div>

        <div class="col-12 col-lg-4">
            <section class="card f1-karta h-100">
                <div class="card-body p-4 position-relative z-1">
                    <h2 class="f1-font text-uppercase fs-3 karta-nadpis">Priebežný rebríček</h2>
                    <table class="table table-hover mb-0 priehladne">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Hráč</th>
                            <th class="text-end">Body</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Alex_F1</td>
                            <td class="text-end">142</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Peter_Oplt</td>
                            <td class="text-end">128</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Lucia_F1</td>
                            <td class="text-end">115</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>FerrariFan</td>
                            <td class="text-end">102</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- Spodný blok: História tipov -->
    <section class="card f1-karta">
        <div class="card-body p-4 position-relative z-1">
            <h2 class="f1-font text-uppercase fs-3 karta-nadpis">História tipov:</h2>
            <ul class="list-group list-group-flush">
                <?php foreach ($predictions as $prediction):  ?>
                    <li class="list-group-item bg-transparent"><?= $prediction->getPredictedDriverP1()->getFirstName() . ' ' . $prediction->getPredictedDriverP2()->getLastName() . ' (' . $prediction->getPredictedDriverP3()->getTeam()->getName() . ')' ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</div>