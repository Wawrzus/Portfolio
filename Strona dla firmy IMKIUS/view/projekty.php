<?php

    namespace Pgimkius\View\Projekty;

    class Projekty {
        public function projekty() {
            require "../view/html/projekty.html";
        }
    }

    $elektronika = new Projekty;
    $elektronika -> projekty();

?>