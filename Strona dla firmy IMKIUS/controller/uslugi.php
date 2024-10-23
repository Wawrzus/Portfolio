<?php

    namespace Pgimkius\Controller\Uslugi;

    class Uslugi {
        public function uslugi() {
            require "../view/uslugi.php";
        }
    }

    $uslugi = new Uslugi;
    $uslugi -> uslugi();

?>