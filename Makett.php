<?php
    class Makett {
        private $id;
        private $nev;
        private $anyag;
        private $meretarany;
        private $osszerakasi_ido;
        private $gyartas_ideje;

        public function __construct(string $nev, string $anyag, string $meretarany, int $osszerakasi_ido, DateTime $gyartas_ideje)
        {
            $this->nev = $nev;
            $this->anyag = $anyag;
            $this->meretarany = $meretarany;
            $this->osszerakasi_ido = $osszerakasi_ido;
            $this->gyartas_ideje = $gyartas_ideje;
        }

        public function getId() : ?int {
            return $this->id;
        }

        public function getNev() : string {
            return $this->nev;
        }

        public function getAnyag() : string {
            return $this->anyag;
        }

        public function getMeretarany() : string {
            return $this->meretarany;
        }

        public function getOsszerakasiIdo() : int {
            return $this->osszerakasi_ido;
        }

        public function getGyartasIdeje() : DateTime {
            return $this->gyartas_ideje;
        }

        public function setNev($uj_nev) {
            $this->nev = $uj_nev;
        }

        public function setAnyag($uj_anyag) {
            $this->anyag = $uj_anyag;
        }

        public function setMeretarany($uj_meretarany) {
            $this->meretarany = $uj_meretarany;
        }

        public function setOsszerakasiIdo($uj_osszerakasi_ido) {
            $this->osszerakasi_ido = $uj_osszerakasi_ido;
        }

        public function setGyartasIdeje($uj_gyartas_ideje) {
            $this->gyartas_ideje = new DateTime($uj_gyartas_ideje);
        }

        public static function getById($id) {
            global $db;

            $t = $db->query("SELECT * FROM makett")->fetchAll();
            $eredmeny = [];

            foreach ($t as $elem) {
                if ($elem["id"] === $id) {
                    $makett = new Makett($elem["nev"], $elem["anyag"], $elem["meretarany"], $elem["osszerakasi_ido"], new DateTime($elem["gyartas_ideje"]));
                    $makett->id = $elem["id"];
                    $eredmeny[] = $makett;
                }
            }

            return $eredmeny;
        }

        public static function osszes() : array {
            global $db;

            $t = $db->query("SELECT * FROM makett")->fetchAll();
            $eredmeny = [];

            foreach ($t as $elem) {
                $makett = new Makett($elem["nev"], $elem["anyag"], $elem["meretarany"], $elem["osszerakasi_ido"], new DateTime($elem["gyartas_ideje"]));
                $makett->id = $elem["id"];
                $eredmeny[] = $makett;
            }

            return $eredmeny;
        }

        public static function torol(int $id) {
            global $db;

            $db->prepare("DELETE FROM makett WHERE id = :id")->execute([":id" => $id]);
        }
        
        public function uj() {
            global $db;

            $db->prepare("INSERT INTO makett (nev, anyag, meretarany, osszerakasi_ido, gyartas_ideje) VALUES (:nev, :anyag, :meretarany, :osszerakasi_ido, :gyartas_ideje)")
            ->execute([":nev" => $this->nev, ":anyag" => $this->anyag, ":meretarany" => $this->meretarany, ":osszerakasi_ido" => $this->osszerakasi_ido, ":gyartas_ideje" => $this->gyartas_ideje->format("Y-m-d H:i:s")]);
        }

        public function mentes() {
            global $db;

            $db->prepare('UPDATE makett SET nev = :nev, anyag = :anyag, meretarany = :meretarany, 
                osszerakasi_ido = :osszerakasi_ido, gyartas_ideje = :gyartas_ideje
                WHERE id = :id')
                ->execute([
                    ':id' => $this->id,
                    ':nev' => $this->nev,
                    ':anyag' => $this->anyag,
                    ':meretarany' => $this->meretarany,
                    ':osszerakasi_ido' => $this->osszerakasi_ido,
                    ':gyartas_ideje' => $this->gyartas_ideje->format('Y-m-d'),
                ]);
        }
    }
?>
