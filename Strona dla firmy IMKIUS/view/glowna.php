<?php

    namespace Pgimkius\View\Glowna;

    class Glowna {
        public function glowna() {
            require "../view/html/glowna.html";
        }
    }

    $glowna = new Glowna;
    $glowna -> glowna();

?>