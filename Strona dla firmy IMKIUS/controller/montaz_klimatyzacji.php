<?php

namespace Pgimkius\Controller\Montaz_klimatyzacji;

class Montaz_klimatyzacji {
    public function montaz_klimatyzacji() {
        require "../view/montaz_klimatyzacji.php";
    }
}

$montaz_klimatyzacji = new Montaz_klimatyzacji;
$montaz_klimatyzacji -> montaz_klimatyzacji();

?>