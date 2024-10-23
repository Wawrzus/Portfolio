<?php

    namespace Pgimkius\Controller\Usun_zapytanie;

    class Usun_zapytanie {
        public function usun_zapytanie() {
            require "../view/usun_zapytanie.php";
        }
    }

    $usun_zapytanie = new Usun_zapytanie;
    $usun_zapytanie -> usun_zapytanie();

?>