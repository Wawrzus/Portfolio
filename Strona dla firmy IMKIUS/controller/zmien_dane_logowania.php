<?php

    namespace Pgimkius\Controller\Zmien_dane_logowania;

    class Zmien_dane_logowania {
        public function zmien_dane_logowania() {
            require "../view/zmien_dane_logowania.php";
        }
    }

    $zmien_dane_logowania = new Zmien_dane_logowania;
    $zmien_dane_logowania -> zmien_dane_logowania();

?>