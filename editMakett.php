<?php 
    require_once "db.php";
    require_once "Makett.php";
    
    $makettId = $_GET["id"] ?? null;

    if ($makettId === null) {
        header("Location: index.php");
        exit();
    }

    $makett = Makett::getById($makettId);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        require_once "php_validacio.php";

        foreach ($makett as $adatok) {
            $adatok->setNev($ujNev);
            $adatok->setAnyag($ujAnyag);
            $adatok->setMeretarany($ujMeretarany);
            $adatok->setOsszerakasiIdo($ujOsszerakasiIdo);
            $adatok->setGyartasIdeje($ujGyartasIdeje);
            $adatok->mentes();
        }
    }

    $gomb = $_POST["gomb"] ?? false;

?><!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Makett Szerkesztés</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <script src="js_validacio.js"></script>
    </head>
    <body>
        <div class="container bg-dark">
            <div class="p-2 kep_hatter">
                <form method="POST" onsubmit="return validacio()">
                    <?php foreach ($makett as $adatok) { ?>
                        <div class="mb-2">
                            <label class="pb-1" for="nev">Név</label><br /><input type="text" name="nev" value="<?php if (!$gomb) echo trim(htmlspecialchars($adatok->getNev(), ENT_QUOTES)); ?>" id="nev">
                            <div class="hibauzenet_php"><?php if (isset($nev_Hiba)) echo $nev_HibaUzenet; ?></div>
                            <div id="hibauzenet_js_nev"></div>
                        </div>
                        <div class="mb-2">
                            <label class="pb-1" for="anyag">Anyag</label><br /><input type="text" name="anyag" value="<?php if (!$gomb) echo trim(htmlspecialchars($adatok->getAnyag(), ENT_QUOTES)); ?>" id="anyag">
                            <div class="hibauzenet_php"><?php if (isset($anyag_Hiba)) echo $anyag_HibaUzenet; ?></div>
                            <div id="hibauzenet_js_anyag"></div>
                        </div>
                        <div class="mb-2">
                            <label class="pb-1" for="meretarany">Méretarány</label><br /><input type="text" name="meretarany" value="<?php if (!$gomb) echo trim(htmlspecialchars($adatok->getMeretarany(), ENT_QUOTES)); ?>" id="meretarany">
                            <div class="hibauzenet_php"><?php if (isset($meretarany_Hiba)) echo $meretarany_HibaUzenet; ?></div>
                            <div id="hibauzenet_js_meretarany"></div>
                        </div>
                        <div class="mb-2">
                            <label class="pb-1" for="osszerakasi_ido">Összerakási idő</label><br /><input type="number" name="osszerakasi_ido" value="<?php if (!$gomb) echo trim(htmlspecialchars($adatok->getOsszerakasiIdo(), ENT_QUOTES)); ?>" id="osszerakasi_ido">
                            <div class="hibauzenet_php"><?php if (isset($osszerakasi_ido_Hiba)) echo $osszerakasi_ido_HibaUzenet; ?></div>
                            <div id="hibauzenet_js_osszerakasi_ido"></div>
                        </div>
                        <div class="mb-2">
                            <label class="pb-1" for="gyartas_ideje">Gyártás Ideje</label><br /><input type="date" name="gyartas_ideje" value="<?php if (!$gomb) echo trim(htmlspecialchars($adatok->getGyartasIdeje()->format("Y-m-d"), ENT_QUOTES)); ?>" id="gyartas_ideje">
                            <div class="hibauzenet_php"><?php if (isset($gyartas_ideje_Hiba)) echo $gyartas_ideje_HibaUzenet; ?></div>
                            <div id="hibauzenet_js_gyartas_ideje"></div>
                        </div>
                        <div class="mb-1" style="width: 250px;">
                            <input type="submit" class="btn btn-success btn-lg mb-2 w-100" value="Változtatás" name="gomb">
                        </div>
                    <?php } ?>
                </form>
                <div class="p-2 my-2 text-center bg-primary rounded" style="transform: rotate(0); width: 250px">
                    <a class="text-decoration-none text-light stretched-link" href="index.php">Vissza</a>
                </div>
                <?php
                    if ($gomb) {
                        header("Location: index.php");
                        exit();
                    }
                ?>
            </div>
        </div>
    </body>
</html>
