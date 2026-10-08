# F1 Hub & Fantasy League

Peter Oplt

5ZYI34

## Stručný opis projektu
Aplikácia slúži ako komplexný informačný portál, osobný kalendár a interaktívna komunitná platforma pre fanúšikov Formuly 1. Návštevníkom umožňuje pohodlne prehliadať harmonogram nadchádzajúcich aj minulých pretekov, podrobné detaily okruhov, aktuálne výsledky a profily jednotlivých jazdcov a tímov.

Registrovaným používateľom aplikácia ponúka rozšírené personalizované funkcie, najmä zapojenie sa do interaktívnej Fantasy ligy. Používatelia môžu pred každými pretekmi natipovať umiestnenie na pódiu (1., 2. a 3. miesto) a na základe reálnych výsledkov získavať body do celkovej tabuľky lídrov. Taktiež si môžu spravovať vlastný zoznam obľúbených jazdcov a prispôsobovať svoj používateľský profil. Správca systému má k dispozícii administrátorské rozhranie na spravovanie celého kalendára pretekov, spracovanie a zadávanie reálnych výsledkov a správu používateľských účtov.

## Role v projekte
Návštevník : Neoverený používateľ, ktorý si môže prehliadať verejný kalendár pretekov, profily jazdcov, tímov a verejnú rebríčkovú tabuľku hráčov vo Fantasy lige.

Registrovaný používateľ: Má všetky oprávnenia návštevníka. Zodpovedá za správu svojho profilu (zmena údajov, nahratie avataru), spravuje svoj zoznam obľúbených jazdcov a aktívne sa zapája do Fantasy ligy vytváraním alebo úpravou svojich tipov pred začiatkom pretekov.

Správca : Má plné oprávnenia nad systémom. Zodpovedá za správu databázy pretekov a jazdcov (vytváranie, úprava, mazanie), zadáva oficiálne výsledky po skončení pretekov (čím sa automaticky prepočítajú body vo Fantasy lige) a spravuje používateľské účty.

## Prípady použitia podľa rolí
* **Návštevník:**
    * Vyhľadá a vyfiltruje nadchádzajúce alebo odjazdené preteky podľa dátumu alebo krajiny.
    * Zobrazí detail konkrétneho okruhu, profil jazdca a tímu.
    * Zobrazí verejnú tabuľku výsledkov a poradia vo Fantasy lige.
* **Registrovaný používateľ:**
    * Upraví svoje profilové údaje a nahrá svoj profilový obrázok.
    * Pridá si jazdca do zoznamu obľúbených alebo ho z neho odoberie.
    * Zadá svoj tip na 1., 2. a 3. miesto pre nadchádzajúce preteky vo Fantasy lige.
    * Zobrazí svoju históriu tipov a prehľad získaných bodov z minulých pretekov.
* **Správca:**
    * Vytvorí, upraví alebo vymaže preteky v kalendári
    * Vytvorí, upraví alebo vymaže profil jazdca
    * Zadá alebo importuje z externého API oficiálne výsledky pretekov po ich skončení, čo spustí systémové vyhodnotenie tipov používateľov.
## Plánované entity
1. **User** (Používateľ – povinná entita pre prihlasovanie a správu rolí):
   * *Účel:* Reprezentuje registrovaného používateľa alebo správcu v systéme.
   * *Atribúty:* id, username, email, password_hash, role (user/admin), total_points, avatar_path.
2. **Race** (Preteky / Veľká cena):
   * *Účel:* Reprezentuje konkrétnu Veľkú cenu v sezóne F1.
   * *Atribúty:* id, name, location, circuit_name, race_date, laps, description, image_path.
3. **Driver** (Jazdec):
   * *Účel:* Reprezentuje jazdca F1.
   * *Atribúty:* id, first_name, last_name, number, nationality, team_id, photo_path.
4. **Team** (Tím / Stajňa):
   * *Účel:* Reprezentuje tím pôsobiaci v šampionáte F1.
   * *Atribúty:* id, name, base_location, power_unit, logo_path.
5. **Prediction** (Tip vo Fantasy lige):
   * *Účel:* Reprezentuje tip odovzdaný používateľom pre konkrétne preteky.
   * *Atribúty:* id, user_id, race_id, predicted_p1_driver_id, predicted_p2_driver_id, predicted_p3_driver_id, points_earned, created_at.

## Vzťahy medzi entitami
* **Team – Driver (Vzťah 1:N):** Jeden tím spravuje viacero jazdcov, ale každý jazdec patrí v danej sezóne k jednému tímu.
* **User – Prediction – Race (Vzťah 1:N):** Používateľ môže vytvoriť ku každým pretekom jeden tip (Prediction). Jeden pretek má priradených množstvo tipov od rôznych používateľov.
* **Driver – Prediction (Vzťah 1:N):** Konkrétny jazdec vystupuje na pozíciách (P1, P2, P3) vo viacerých tipoch používateľov.
* **User – Driver (Vzťah M:N – Obľúbení jazdci):** Používateľ si môže označiť viacerých obľúbených jazdcov a jazdec môže byť v obľúbených u viacerých používateľov (realizované cez asociačnú tabuľku user_favorite_drivers)

## Hlavné stránky aplikácie
1. **Domovská stránka (Prehľad & Kalendár):** Zobrazenie kalendára pretekov s odpočítavaním času do štartu najbližšej Veľkej ceny a s rýchlym odkazom na zadanie tipu.
2. **Fantasy Liga (Tipovanie & Rebríček):** Stránka s formulárom pre výber pódia (P1, P2, P3) pre nadchádzajúce preteky a celkovou tabuľkou hráčov zoradených podľa počtu získaných bodov.
3. **Zoznam a detail jazdcov/tímov:** Prehľadový katalóg všetkých jazdcov a tímov s možnosťou filtrovania a vyhľadávania a tlačidlom na pridanie do obľúbených.
4. **Profil používateľa:** Osobné rozhranie prihláseného používateľa so zoznamom obľúbených jazdcov, históriou jeho tipov a možnosťou uploadu profilového obrázka alebo zmeny hesla.
5. **Administrátorská zóna:** Stránka určená pre správcu na kompletné spravovanie kalendára (CRUD Race), správy jazdcov (CRUD Driver) a zadávanie alebo synchronizáciu reálnych výsledkov pretekov na vyhodnotenie Fantasy ligy.

## Rozdelenie funkcionality
* **Základná funkcionalita:**
  * Autentifikácia používateľov (registračný a prihlasovací formulár s validáciou vstupov na klientskej aj serverovej strane).
  * Kompletná správa dát (CRUD operácie) pre Admina nad entitami `Race` (Preteky) a `Driver` (Jazdci).
  * Systém Fantasy ligy: Možnosť vytvoriť a upraviť tip používateľa pred uzávierkou pretekov.
  * AJAX volanie pre pridanie/odobranie jazdca do zoznamu obľúbených v reálnom čase bez opätovného načítania celej stránky.
  * AJAX volanie pre odoslanie/úpravu tipu vo Fantasy lige na pozadí.
  * Práca so súbormi: Upload profilového obrázka (avatar) používateľa a fotiek k jazdcom/okruhom.
* **Rozširujúca funkcionalita:**
  * Odpočítavanie času v Javascripte do štartu pretekov a uzávierky Fantasy ligy.
  * Integrácia externého API (napr. *Ergast F1 API* / *OpenF1 API*) na automatické dopĺňanie oficiálnych výsledkov pretekov.
  * Interaktívne filtrovanie pretekov podľa sezóny alebo štátu pomocou klientskeho JavaScriptu/AJAXu.
