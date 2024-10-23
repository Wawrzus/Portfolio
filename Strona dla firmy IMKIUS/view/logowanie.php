<?php

    namespace Pgimkius\View\Logowanie;

    class Logowanie {
        public function logowanie() {
            require "../view/html/logowanie.html";
        }
    }

    $logowanie = new Logowanie;
    $logowanie -> logowanie();

?>