<?php

    namespace Pgimkius\Controller\Obrobka_cnc;

    class Obrobka_cnc {
        public function obrobka_cnc() {
            require "../view/obrobka_cnc.php";
        }
    }

    $obrobka_cnc = new Obrobka_cnc;
    $obrobka_cnc -> obrobka_cnc();

?>