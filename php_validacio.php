<?php
    
    $nev_Hiba = false;
    $nev_HibaUzenet = "";
    $anyag_Hiba = false;
    $anyag_HibaUzenet = "";
    $meretarany_Hiba = false;
    $meretarany_HibaUzenet = "";
    $osszerakasi_ido_Hiba = false;
    $osszerakasi_ido_HibaUzenet = "";
    $gyartas_ideje_Hiba = false;
    $gyartas_ideje_HibaUzenet = "";

    $sikeres_db = 0;

    $ujNev = $_POST["nev"] ?? "";
    $ujAnyag = $_POST["anyag"] ?? "";
    $ujMeretarany = $_POST["meretarany"] ?? "";
    $ujOsszerakasiIdo = $_POST["osszerakasi_ido"] ?? "";
    $ujGyartasIdeje = $_POST["gyartas_ideje"] ?? "";
            
    if (empty($_POST["nev"])) {
        $nev_Hiba = true;
        $nev_HibaUzenet = "A név megadása kötelező!";
    }
    else if (!is_string($_POST["nev"])) {
        $nev_Hiba = true;
        $nev_HibaUzenet = "A név csak szöveg formátumú lehet!";
    }
    else if (mb_strlen(trim($_POST["nev"])) <= 1) {
        $nev_Hiba = true;
        $nev_HibaUzenet = "A név nem állhat csak egy karakterből!";
    }
    else if (mb_strlen(trim($_POST["nev"])) > 35) {
        $nev_Hiba = true;
        $nev_HibaUzenet = "A név nem állhat több mint 35 karakterből!";
    }
    else {
        $ujNev = trim(htmlspecialchars($_POST["nev"], ENT_QUOTES));
        $sikeres_db++;
    }

    if (empty($_POST["anyag"])) {
        $anyag_Hiba = true;
        $anyag_HibaUzenet = "Az anyag megadása kötelező!";
    }
    else if (!is_string($_POST["anyag"])) {
        $anyag_Hiba = true;
        $anyag_HibaUzenet = "Az anyag csak szöveg formátumú lehet!";
    }
    else if (mb_strlen(trim($_POST["anyag"])) <= 1) {
        $anyag_Hiba = true;
        $anyag_HibaUzenet = "Az anyag nem állhat csak egy karakterből!";
    }
    else if (mb_strlen(trim($_POST["anyag"])) > 35) {
        $anyag_Hiba = true;
        $anyag_HibaUzenet = "Az anyag nem állhat több mint 35 karakterből!";
    }
    else {
        $ujAnyag = trim(htmlspecialchars($_POST["anyag"], ENT_QUOTES));
        $sikeres_db++;
    }

    if (empty($_POST["meretarany"])) {
        $meretarany_Hiba = true;
        $meretarany_HibaUzenet = "A méretarány megadása kötelező!";
    }
    else if (!is_string($_POST["meretarany"])) {
        $meretarany_Hiba = true;
        $meretarany_HibaUzenet = "A méretarány csak szöveg formátumú lehet!";
    }
    else if (mb_strlen(trim($_POST["meretarany"])) <= 2) {
        $meretarany_Hiba = true;
        $meretarany_HibaUzenet = "A méretarány nem állhat kevesebb mint két karakterből!";
    }
    else if (mb_strlen(trim($_POST["meretarany"])) > 10) {
        $meretarany_Hiba = true;
        $meretarany_HibaUzenet = "A méretarány nem állhat több mint 10 karakterből!";
    }
    else if (!str_contains($_POST["meretarany"], ":")) {
        $meretarany_Hiba = true;
        $meretarany_HibaUzenet = "A méretaránynak tartalmaznia kell egy kettőspontot!";
    }
    else {
        $ujMeretarany = trim(htmlspecialchars($_POST["meretarany"], ENT_QUOTES));
        $sikeres_db++;
    }

    if (empty($_POST["osszerakasi_ido"])) {
        if ($_POST["osszerakasi_ido"] === "0") {
            $osszerakasi_ido_Hiba = true;
            $osszerakasi_ido_HibaUzenet = "A 0 összerakási időnek nincs értelme!";
        }
        else {
            $osszerakasi_ido_Hiba = true;
            $osszerakasi_ido_HibaUzenet = "Az összerakási idő megadása kötelező!";
        }
    }
    else if (!is_numeric($_POST["osszerakasi_ido"])) {
        $osszerakasi_ido_Hiba = true;
        $osszerakasi_ido_HibaUzenet = "Az összerakási idő csak szám formátumú lehet!";
    }
    else if ($_POST["osszerakasi_ido"] <= 0) {
        $osszerakasi_ido_Hiba = true;
        $osszerakasi_ido_HibaUzenet = "A 0 és annál kisebb összerakási időnek nincs értelme!";
    }
    else if (mb_strlen(trim((string)$_POST["osszerakasi_ido"])) > 4) {
        $osszerakasi_ido_Hiba = true;
        $osszerakasi_ido_HibaUzenet = "Ez már egy picit túl nagy szám lenne!";
    }
    else {
        $ujOsszerakasiIdo = trim(htmlspecialchars($_POST["osszerakasi_ido"], ENT_QUOTES));
        $sikeres_db++;
    }

    $lista = explode("-", $_POST["gyartas_ideje"]);

    if (empty($_POST["gyartas_ideje"])) {
        $gyartas_ideje_Hiba = true;
        $gyartas_ideje_HibaUzenet = "A gyártás idejének megadása kötelező!";
    }
    else if (!str_contains($_POST["gyartas_ideje"], "-")) {
        $gyartas_ideje_Hiba = true;
        $gyartas_ideje_HibaUzenet = "A gyártás ideje csak dátum formátumú lehet!";
    }
    else if (!is_numeric($lista[0]) || !is_numeric($lista[1]) || !is_numeric($lista[2])) {
        $gyartas_ideje_Hiba = true;
        $gyartas_ideje_HibaUzenet = "A gyártás ideje csak dátum formátumú lehet!";
    }
    else if (is_string((int)$lista[0]) || is_string((int)$lista[1]) || is_string((int)$lista[2])) {
        $gyartas_ideje_Hiba = true;
        $gyartas_ideje_HibaUzenet = "A gyártás ideje csak dátum formátumú lehet!";
    }
    else if (!checkdate($lista[1], $lista[2], $lista[0])) {
        $gyartas_ideje_Hiba = true;
        $gyartas_ideje_HibaUzenet = "A gyártás ideje csak dátum formátumú lehet!";
    }
    else {
        $ujGyartasIdeje = trim(htmlspecialchars($_POST["gyartas_ideje"], ENT_QUOTES));
        $sikeres_db++;
    }
?>
