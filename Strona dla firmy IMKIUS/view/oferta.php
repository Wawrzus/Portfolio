<?php

    namespace Pgimkius\View\Oferta;

    class Oferta {
        public function oferta() {
            require "../view/html/oferta.html";
        }
    }

    $oferta = new Oferta;
    $oferta -> oferta();

?>