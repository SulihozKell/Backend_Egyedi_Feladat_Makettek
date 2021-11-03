<?php
    require_once "db.php";
    require_once "Makett.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $deleteId = $_POST["deleteId"] ?? "";

        if ($deleteId !== "") {
            Makett::torol($deleteId);
        }
        else {
            require "php_validacio.php";

            if ($sikeres_db === 5) {
                $ujMakett = new Makett($ujNev, $ujAnyag, $ujMeretarany, $ujOsszerakasiIdo, new DateTime($ujGyartasIdeje));
                $ujMakett->uj();

                $ujNev = "";
                $ujAnyag = "";
                $ujMeretarany = "";
                $ujOsszerakasiIdo = "";
                $ujGyartasIdeje = "";
            }
        }
    }

    $makettek = Makett::osszes();

    $gomb = $_POST["gomb"] ?? false;

    function kiir($eretek) {
        echo trim(htmlspecialchars($eretek, ENT_QUOTES));
    }

?><!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Makettek</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="main.css">
        <script src="js_validacio.js"></script>
    </head>
    <body>
        <div class="container bg-dark">
            <div class="p-2 kep_hatter">
                <form method="POST" onsubmit="return validacio()">
                    <div class="mb-2">
                        <label class="pb-1" for="nev">Név</label><br /><input type="text" name="nev" value="<?php if ($gomb) echo kiir($ujNev); ?>" id="nev">
                        <span id="hibauzenet_js_nev"></span>
                        <span class="hibauzenet_php"><?php if (isset($nev_Hiba)) echo $nev_HibaUzenet; ?></span>
                    </div>
                    <div class="mb-2">
                        <label class="pb-1" for="anyag">Anyag</label><br /><input type="text" name="anyag" value="<?php if ($gomb) echo kiir($ujAnyag); ?>" id="anyag">
                        <span id="hibauzenet_js_anyag"></span>
                        <span class="hibauzenet_php"><?php if (isset($anyag_Hiba)) echo $anyag_HibaUzenet; ?></span>
                    </div>
                    <div class="mb-2">
                        <label class="pb-1" for="meretarany">Méretarány</label><br /><input type="text" name="meretarany" value="<?php if ($gomb) echo kiir($ujMeretarany); ?>" id="meretarany">
                        <span id="hibauzenet_js_meretarany"></span>
                        <span class="hibauzenet_php"><?php if (isset($meretarany_Hiba)) echo $meretarany_HibaUzenet; ?></span>
                    </div>
                    <div class="mb-2">
                        <label class="pb-1" for="osszerakasi_ido">Összerakási idő</label><br /><input type="number" name="osszerakasi_ido" value="<?php if ($gomb) echo kiir($ujOsszerakasiIdo); ?>" id="osszerakasi_ido">
                        <span id="hibauzenet_js_osszerakasi_ido"></span>
                        <span class="hibauzenet_php"><?php if (isset($osszerakasi_ido_Hiba)) echo $osszerakasi_ido_HibaUzenet; ?></span>
                    </div>
                    <div class="mb-2">
                        <label class="pb-1" for="gyartas_ideje">Gyártás ideje</label><br /><input type="date" name="gyartas_ideje" value="<?php if ($gomb) echo kiir($ujGyartasIdeje); ?>" id="gyartas_ideje">
                        <span id="hibauzenet_js_gyartas_ideje"></span>
                        <span class="hibauzenet_php"><?php if (isset($gyartas_ideje_Hiba)) echo $gyartas_ideje_HibaUzenet; ?></span>
                    </div>
                    <div class="mb-5" style="width: 250px;">
                        <input type="submit" class="btn btn-success btn-lg mb-2 w-100" value="Új Makett" name="gomb">
                    </div>
                </form>
            </div>

            <div class="row kiir">
                <?php foreach ($makettek as $makett) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 border border-primary">
                        <h2 class="text-center"><?php echo $makett->getNev(); ?></h2>
                        <p>Anyag: <?php echo $makett->getAnyag(); ?></p>
                        <p>Méretarány: <?php echo $makett->getMeretarany(); ?></p>
                        <p>Összerakás ideje: <?php echo $makett->getOsszerakasiIdo(); ?> óra</p>
                        <p>Gyártás Ideje: <?php echo $makett->getGyartasIdeje()->format("Y-m-d"); ?></p>
                        <div class="p-2 mb-2 text-center w-100 bg-primary rounded" style="transform: rotate(0);"><a class="text-decoration-none text-light stretched-link" href="editMakett.php?id=<?php echo $makett->getId(); ?>">Szerkesztés</a></div>
                        <form class="text-center" method="POST">
                            <input type="hidden" name="deleteId" value="<?php echo $makett->getId(); ?>">
                            <button class="btn btn-warning btn-lg w-100 mb-2" type="submit">Törlés</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
