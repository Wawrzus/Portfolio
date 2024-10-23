<?php

    namespace Pgimkius\View\Uslugi;

    class Uslugi {
        public function uslugi() {
            require "../view/html/uslugi.html";
        }
    }

    $uslugi = new Uslugi;
    $uslugi -> uslugi();

?>