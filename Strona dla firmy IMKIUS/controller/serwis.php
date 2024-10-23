<?php

    namespace Pgimkius\Controller\Serwis;

    class Serwis {
        public function serwis() {
            require "../view/serwis.php";
        }
    }

    $elektronika = new Serwis;
    $elektronika -> serwis();

?>