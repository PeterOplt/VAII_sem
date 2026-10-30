<?php

/** @var \Framework\Support\LinkGenerator $link */
?>

<link rel="stylesheet" href="<?= $link->asset('css/style_fantasy.css') ?>">
<main>
        <section class="countdown-panel">
            <h2>Do uzávierky tipov zostáva:</h2>

            <div class="countdown-container">
                <div class="countdown-box">
                    <span class="number">02</span>
                    <span class="label">Dni</span>
                </div>
                <div class="countdown-box">
                    <span class="number">14</span>
                    <span class="label">Hodín</span>
                </div>
                <div class="countdown-box">
                    <span class="number">35</span>
                    <span class="label">Minút</span>
                </div>
                <div class="countdown-box">
                    <span class="number">10</span>
                    <span class="label">Sekúnd</span>
                </div>
            </div>
        </section>
        <!-- Hlavná mriežka s 3 blokmi podla wireframu -->
        <div class="fantasy-grid">

            <!-- 1. Blok: Formulár pre výber jazdcov -->
            <article class="fantasy-card">
                <h2>Vybraný jazdci</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="p1-select">P1:</label>
                        <select id="p1-select" name="p1">
                            <option value="stroll" selected>Lance Stroll</option>
                            <option value="verstappen">Max Verstappen</option>
                            <option value="hamilton">Lewis Hamilton</option>
                            <option value="leclerc">Charles Leclerc</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="p2-select">P2:</label>
                        <select id="p2-select" name="p2">
                            <option value="" disabled selected>Zvoľ jazdca</option>
                            <option value="stroll">Lance Stroll</option>
                            <option value="verstappen">Max Verstappen</option>
                            <option value="hamilton">Lewis Hamilton</option>
                            <option value="leclerc">Charles Leclerc</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="p3-select">P3:</label>
                        <select id="p3-select" name="p3">
                            <option value="" disabled selected>Zvoľ jazdca</option>
                            <option value="stroll">Lance Stroll</option>
                            <option value="verstappen">Max Verstappen</option>
                            <option value="hamilton">Lewis Hamilton</option>
                            <option value="leclerc">Charles Leclerc</option>
                        </select>
                    </div>

                    <button type="submit">Uložiť tip</button>
                </form>
            </article>

            <!-- 2. Blok: Zoznam jazdcov -->
            <section class="fantasy-card">
                <h2>Zoznam jazdcov:</h2>
                <ul class="drivers-list">
                    <li>Max Verstappen (Red Bull)</li>
                    <li>Sergio Pérez (Red Bull)</li>
                    <li>Lewis Hamilton (Mercedes)</li>
                    <li>George Russell (Mercedes)</li>
                    <li>Charles Leclerc (Ferrari)</li>
                    <li>Carlos Sainz (Ferrari)</li>
                    <li>Lando Norris (McLaren)</li>
                    <li>Lance Stroll (Aston Martin)</li>
                </ul>
            </section>

            <!-- 3. Blok: Priebežný rebríček -->
            <section class="fantasy-card">
                <h2>Priebežný rebríček</h2>
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Hráč</th>
                        <th>Body</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Alex_F1</td>
                        <td>142</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Peter_Oplt</td>
                        <td>128</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Lucia_F1</td>
                        <td>115</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>FerrariFan</td>
                        <td>102</td>
                    </tr>
                    </tbody>
                </table>
            </section>

        </div>

        <!-- Spodný blok: História tipov -->
        <section class="history-panel">
            <h2>História tipov:</h2>
            <ul class="history-list">
                <li>
                    <strong>Preteky: GP Bahrain</strong> | Tvoj tip: VER/HAM/LEC | Výsledok: VER/PER/SZA | <span class="points">+15b</span>
                </li>
                <li>
                    <strong>Preteky: GP Saudi</strong> | Tvoj tip: PER/VER/LEC | Výsledok: PER/VER/LEC | <span class="points">+25b</span>
                </li>
            </ul>
        </section>
    </main>