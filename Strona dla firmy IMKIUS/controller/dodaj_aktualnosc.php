<?php

    namespace Pgimkius\Controller\Dodaj_aktualnosc;

    class Dodaj_aktualnosc {
        public function dodaj_aktualnosc() {
            require "../view/dodaj_aktualnosc.php";
        }
    }

    $dodaj_aaktualnosc = new Dodaj_aktualnosc;
    $dodaj_aaktualnosc -> dodaj_aktualnosc();

?>