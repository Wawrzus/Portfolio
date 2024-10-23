<?php

    namespace Pgimkius\Controller\Gornictwo;

    class Gornictwo {
        public function gornictwo() {
            require "../view/gornictwo.php";
        }
    }

    $gornictwo = new Gornictwo;
    $gornictwo -> gornictwo();

?>