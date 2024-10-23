<?php

    namespace Pgimkius\Controller\Projekty;

    class Projekty {
        public function projekty() {
            require "../view/projekty.php";
        }
    }

    $elektronika = new Projekty;
    $elektronika -> projekty();

?>