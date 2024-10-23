<?php

    namespace Pgimkius\Controller\Projektowanie_urzadzen;

    class Projektowanie_urzadzen {
        public function projektowanie_urzadzen() {
            require "../view/projektowanie_urzadzen.php";
        }
    }

    $praca = new Projektowanie_urzadzen;
    $praca -> projektowanie_urzadzen();

?>