<?php

    namespace Pgimkius\View\Usun_zapytanie;

    class Usun_zapytanie {
        public function usun_zapytanie() {
            require "../view/html/usun_zapytanie.html";
        }
    }

    $usun_zapytanie = new Usun_zapytanie;
    $usun_zapytanie -> usun_zapytanie();

?>