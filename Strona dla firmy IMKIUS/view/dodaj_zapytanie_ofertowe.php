<?php

    namespace Pgimkius\View\Dodaj_zapytanie_ofertowe;

    class Dodaj_zapytanie_ofertowe {
        public function dodaj_zapytanie_ofertowe() {
            require "../view/html/dodaj_zapytanie_ofertowe.html";
        }
    }

    $dodaj_zapytanie_ofertowe = new Dodaj_zapytanie_ofertowe;
    $dodaj_zapytanie_ofertowe -> dodaj_zapytanie_ofertowe();

?>