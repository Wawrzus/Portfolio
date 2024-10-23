<?php

    namespace Pgimkius\Controller\Zapytania;

    class Zapytania {
        public function zapytania() {
            require "../view/zapytania.php";
        }
    }

    $zapytania = new Zapytania;
    $zapytania -> zapytania();

?>