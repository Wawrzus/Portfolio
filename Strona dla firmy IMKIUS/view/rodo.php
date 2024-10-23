<?php

    namespace Pgimkius\View\Rodo;

    class Rodo {
        public function rodo() {
            require "../view/html/rodo.html";
        }
    }

    $rodo = new Rodo;
    $rodo -> rodo();

?>