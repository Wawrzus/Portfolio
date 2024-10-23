<?php

    namespace Pgimkius\View\Usun_aktualnosc;

    class Usun_aktualnosc {
        public function usun_aktualnosc() {
            require "../view/html/usun_aktualnosc.html";
        }
    }

    $usun_aktualnosc = new Usun_aktualnosc;
    $usun_aktualnosc -> usun_aktualnosc();

?>