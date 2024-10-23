<?php

    namespace Pgimkius\View\Dodaj_aktualnosc;

    class Dodaj_aktualnosc {
        public function dodaj_aktualnosc() {
            require "../view/html/dodaj_aktualnosc.html";
        }
    }

    $dodaj_aktualnosc = new Dodaj_aktualnosc;
    $dodaj_aktualnosc -> dodaj_aktualnosc();

?>