<?php

    namespace Pgimkius\View\Zmien_dane_logowania;

    class Zmien_dane_logowania {
        public function zmien_dane_logowania() {
            require "../view/html/zmien_dane_logowania.html";
        }
    }

    $zmien_dane_logowania = new Zmien_dane_logowania;
    $zmien_dane_logowania -> zmien_dane_logowania();

?>