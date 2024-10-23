<?php

    namespace Pgimkius\Controller\Rodo;

    class Rodo {
        public function rodo() {
            require "../view/rodo.php";
        }
    }

    $rodo = new Rodo;
    $rodo -> rodo();

?>