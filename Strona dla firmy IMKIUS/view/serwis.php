<?php

    namespace Pgimkius\View\Serwis;

    class Serwis {
        public function serwis() {
            require "../view/html/serwis.html";
        }
    }

    $elektronika = new Serwis;
    $elektronika -> serwis();

?>