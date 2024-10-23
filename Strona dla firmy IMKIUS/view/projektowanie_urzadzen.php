<?php

    namespace Pgimkius\View\Projektowanie_urzadzen;

    class Projektowanie_urzadzen {
        public function projektowanie_urzadzen() {
            require "../view/html/projektowanie_urzadzen.html";
        }
    }

    $praca = new Projektowanie_urzadzen;
    $praca -> projektowanie_urzadzen();

?>