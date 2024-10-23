<?php

    namespace Pgimkius\View\Elektronika;

    class Elektronika {
        public function elektronika() {
            require "../view/html/elektronika.html";
        }
    }

    $elektronika = new Elektronika;
    $elektronika -> elektronika();

?>