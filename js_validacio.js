
function validacio() {
    let nev = document.getElementById("nev").value;
    let anyag = document.getElementById("anyag").value;
    let meretarany = document.getElementById("meretarany").value;
    let osszerakasi_ido = document.getElementById("osszerakasi_ido").value;
    let gyartas_ideje = document.getElementById("gyartas_ideje").value;

    let hibauzenet_nev = document.getElementById("hibauzenet_js_nev");
    let hibauzenet_anyag = document.getElementById("hibauzenet_js_anyag");
    let hibauzenet_meretarany = document.getElementById("hibauzenet_js_meretarany");
    let hibauzenet_osszerakasi_ido = document.getElementById("hibauzenet_js_osszerakasi_ido");
    let hibauzenet_gyartas_ideje = document.getElementById("hibauzenet_js_gyartas_ideje");

    sikeres_db = 0;

    if (nev === '' || nev === null || nev === undefined) {
        hibauzenet_nev.innerHTML = "A név megadása kötelező!";
    }
    else if (!typeof nev === "string") {
        hibauzenet_nev.innerHTML = "A név csak szöveg formátumú lehet!";
    }
    else if (nev.trim().length <= 1) {
        hibauzenet_nev.innerHTML = "A név nem állhat csak egy karakterből!";
    }
    else if (nev.trim().length > 35) {
        hibauzenet_nev.innerHTML = "A név nem állhat több mint 35 karakterből!";
    }
    else {
        hibauzenet_nev.innerHTML = "";
        sikeres_db++;
    }

    if (anyag === '' || anyag === null || anyag === undefined) {
        hibauzenet_anyag.innerHTML = "Az anyag megadása kötelező!";
    }
    else if (!typeof anyag === "string") {
        hibauzenet_anyag.innerHTML = "Az anyag csak szöveg formátumú lehet!";
    }
    else if (anyag.trim().length <= 1) {
        hibauzenet_anyag.innerHTML = "Az anyag nem állhat csak egy karakterből!";
    }
    else if (anyag.trim().length > 35) {
        hibauzenet_anyag.innerHTML = "Az anyag nem állhat több mint 35 karakterből!";
    }
    else {
        hibauzenet_anyag.innerHTML = "";
        sikeres_db++;
    }

    if (meretarany === '' || meretarany === null || meretarany === undefined) {
        hibauzenet_meretarany.innerHTML = "A méretarány megadása kötelező!";
    }
    else if (!typeof meretarany === "string") {
        hibauzenet_meretarany.innerHTML = "A méretarány csak szöveg formátumú lehet!";
    }
    else if (meretarany.trim().length <= 2) {
        hibauzenet_meretarany.innerHTML = "A méretarány nem állhat kevesebb mint két karakterből!";
    }
    else if (meretarany.trim().length > 10) {
        hibauzenet_meretarany.innerHTML = "A méretarány nem állhat több mint 10 karakterből!";
    }
    else if (!meretarany.trim().includes(":")) {
        hibauzenet_meretarany.innerHTML = "A méretaránynak tartalmaznia kell egy kettőspontot!";
    }
    else {
        hibauzenet_meretarany.innerHTML = "";
        sikeres_db++;
    }

    if (osszerakasi_ido === 0 || osszerakasi_ido === null || osszerakasi_ido === undefined) {
        if (osszerakasi_ido === 0) {
            hibauzenet_osszerakasi_ido.innerHTML = "A 0 összerakási időnek nincs értelme!";
        }
        else {
            hibauzenet_osszerakasi_ido.innerHTML = "Az összerakási idő megadása kötelező!";
        }
    }
    else if (isNaN(osszerakasi_ido)) {
        hibauzenet_osszerakasi_ido.innerHTML = "Az összerakási idő csak szám formátumú lehet!";
    }
    else if (osszerakasi_ido <= 0) {
        hibauzenet_osszerakasi_ido.innerHTML = "A 0 és annál kisebb összerakási időnek nincs értelme!";
    }
    else if (osszerakasi_ido.toString().length > 4) {
        hibauzenet_osszerakasi_ido.innerHTML = "Ez már egy picit túl nagy szám lenne!";
    }
    else {
        hibauzenet_osszerakasi_ido.innerHTML = "";
        sikeres_db++;
    }

    let lista = gyartas_ideje.split("-");

    if (gyartas_ideje === '' || gyartas_ideje === null || gyartas_ideje === undefined) {
        hibauzenet_gyartas_ideje.innerHTML = "A gyártás idejének megadása kötelező!";
    }
    else if (!gyartas_ideje.includes("-")) {
        hibauzenet_gyartas_ideje.innerHTML = "A gyártás ideje csak dátum formátumú lehet!";
    }
    /*
    else if (!Number.isInteger(lista[0]) || !Number.isInteger(lista[1]) || !Number.isInteger(lista[2])) {
        hibauzenet_gyartas_ideje.innerHTML = "A gyártás ideje csak dátum formátumú lehet!";
    }
    else if (!typeof lista[0] === "string" || !typeof lista[1] === "string" || !typeof lista[2] === "string") {
        hibauzenet_gyartas_ideje.innerHTML = "A gyártás ideje csak dátum formátumú lehet!";
    }
    else if ((gyartas_ideje.getFullYear() != lista[0]) || (gyartas_ideje.getMonth() + 1 != lista[1]) || (gyartas_ideje.getDate() != lista[2])) {
        gyartas_ideje_HibaUzenet.innerHTML = "A gyártás ideje csak dátum formátumú lehet!";
    }
    */
    else {
        hibauzenet_gyartas_ideje.innerHTML = "";
        sikeres_db++;
    }

    if (sikeres_db === 5) {
        return true;
    }
    else {
        return false;
    }
}
