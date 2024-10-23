<?php

    namespace Pgimkius\Controller\Praca;

    class Praca {
        public function praca() {
            require "../view/praca.php";
        }
    }

    $praca = new Praca;
    $praca -> praca();

?>