<?php

    namespace Pgimkius\Controller\Glowna;

    class Glowna {
        public function glowna() {
            require "../view/glowna.php";
        }
    }

    $glowna = new Glowna;
    $glowna -> glowna();

?>