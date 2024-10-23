<?php

    namespace Pgimkius\View\Aktualnosci;

    class Aktualnosci {
        public function aktualnosci() {
            require "../view/html/aktualnosci.php";
        }
    }

    $aktualnosci = new Aktualnosci;
    $aktualnosci -> aktualnosci();

?>