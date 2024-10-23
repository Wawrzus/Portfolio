<?php

    namespace Pgimkius\View\Praca;

    class Praca {
        public function praca() {
            require "../view/html/praca.php";
        }
    }

    $praca = new Praca;
    $praca -> praca();

?>