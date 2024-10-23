<?php

    namespace Pgimkius\Controller\Usun_aktualnosc;

    class Usun_aktualnosc {
        public function usun_aktualnosc() {
            require "../view/usun_aktualnosc.php";
        }
    }

    $usun_aktualnosc = new Usun_aktualnosc;
    $usun_aktualnosc -> usun_aktualnosc();

?>