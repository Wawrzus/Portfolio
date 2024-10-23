<?php

    namespace Pgimkius\Controller\Oferta;

    class Oferta {
        public function oferta() {
            require "../view/oferta.php";
        }
    }

    $oferta = new Oferta;
    $oferta -> oferta();

?>