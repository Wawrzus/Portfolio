<?php

    namespace Pgimkius\Controller\Elektronika;

    class Elektronika {
        public function elektronika() {
            require "../view/elektronika.php";
        }
    }

    $elektronika = new Elektronika;
    $elektronika -> elektronika();

?>