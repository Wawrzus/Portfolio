<?php

    namespace Pgimkius\Controller\Dodaj_zapytanie_ofertowe;

    class Dodaj_zapytanie_ofertowe {
        public function dodaj_zapytanie_ofertowe() {
            require "../view/dodaj_zapytanie_ofertowe.php";
        }
    }

    $dodaj_zapytanie_ofertowe = new Dodaj_zapytanie_ofertowe;
    $dodaj_zapytanie_ofertowe -> dodaj_zapytanie_ofertowe();

?>