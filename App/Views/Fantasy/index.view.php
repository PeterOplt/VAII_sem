<?php

/** @var \Framework\Support\LinkGenerator $link */
?>

<main class="vstack gap-4 py-5">
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
                        <form action="#" method="post">
                            <div class="mb-3">
                                <label for="p1-select" class="form-label small text-uppercase fw-bold text-body-secondary">P1:</label>
                                <select class="form-select" id="p1-select" name="p1">
                                    <option value="stroll" selected>Lance Stroll</option>
                                    <option value="verstappen">Max Verstappen</option>
                                    <option value="hamilton">Lewis Hamilton</option>
                                    <option value="leclerc">Charles Leclerc</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="p2-select" class="form-label small text-uppercase fw-bold text-body-secondary">P2:</label>
                                <select class="form-select" id="p2-select" name="p2">
                                    <option value="" disabled selected>Zvoľ jazdca</option>
                                    <option value="stroll">Lance Stroll</option>
                                    <option value="verstappen">Max Verstappen</option>
                                    <option value="hamilton">Lewis Hamilton</option>
                                    <option value="leclerc">Charles Leclerc</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="p3-select" class="form-label small text-uppercase fw-bold text-body-secondary">P3:</label>
                                <select class="form-select" id="p3-select" name="p3">
                                    <option value="" disabled selected>Zvoľ jazdca</option>
                                    <option value="stroll">Lance Stroll</option>
                                    <option value="verstappen">Max Verstappen</option>
                                    <option value="hamilton">Lewis Hamilton</option>
                                    <option value="leclerc">Charles Leclerc</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-danger w-100 text-uppercase fw-bold">Uložiť tip</button>
                        </form>
                    </div>
                </article>
            </div>

            <div class="col-12 col-lg-4">
                <section class="card f1-karta h-100">
                    <div class="card-body p-4 position-relative z-1">
                        <h2 class="f1-font text-uppercase fs-3 karta-nadpis">Zoznam jazdcov:</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent">Max Verstappen (Red Bull)</li>
                            <li class="list-group-item bg-transparent">Sergio Pérez (Red Bull)</li>
                            <li class="list-group-item bg-transparent">Lewis Hamilton (Mercedes)</li>
                            <li class="list-group-item bg-transparent">George Russell (Mercedes)</li>
                            <li class="list-group-item bg-transparent">Charles Leclerc (Ferrari)</li>
                            <li class="list-group-item bg-transparent">Carlos Sainz (Ferrari)</li>
                            <li class="list-group-item bg-transparent">Lando Norris (McLaren)</li>
                            <li class="list-group-item bg-transparent">Lance Stroll (Aston Martin)</li>
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
                    <li class="list-group-item bg-transparent">
                        <strong>Preteky: GP Bahrain</strong> | Tvoj tip: VER/HAM/LEC | Výsledok: VER/PER/SZA | <span class="text-success fw-bold">+15b</span>
                    </li>
                    <li class="list-group-item bg-transparent">
                        <strong>Preteky: GP Saudi</strong> | Tvoj tip: PER/VER/LEC | Výsledok: PER/VER/LEC | <span class="text-success fw-bold">+25b</span>
                    </li>
                </ul>
            </div>
        </section>
    </main>