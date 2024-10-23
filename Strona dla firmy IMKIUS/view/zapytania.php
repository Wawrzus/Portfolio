<?php

    namespace Pgimkius\View\Zapytania;

    class Zapytania {
        public function zapytania() {
            require "../view/html/zapytania.php";
        }
    }

    $zapytania = new Zapytania;
    $zapytania -> zapytania();

?>