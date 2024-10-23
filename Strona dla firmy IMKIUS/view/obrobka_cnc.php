<?php

    namespace Pgimkius\View\Obrobka_cnc;

    class Obrobka_cnc {
        public function obrobka_cnc() {
            require "../view/html/obrobka_cnc.html";
        }
    }

    $obrobka_cnc = new Obrobka_cnc;
    $obrobka_cnc -> obrobka_cnc();

?>