<?php

namespace Pgimkius\View\Montaz_klimatyzacji;

class Montaz_klimatyzacji {
    public function montaz_klimatyzacji() {
        require "../view/html/montaz_klimatyzacji.html";
    }
}

$montaz_klimatyzacji = new Montaz_klimatyzacji;
$montaz_klimatyzacji -> montaz_klimatyzacji();

?>