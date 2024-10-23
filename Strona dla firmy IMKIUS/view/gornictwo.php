<?php

    namespace Pgimkius\View\Gornictwo;

    class Gornictwo {
        public function gornictwo() {
            require "../view/html/gornictwo.html";
        }
    }

    $gornictwo = new Gornictwo;
    $gornictwo -> gornictwo();

?>