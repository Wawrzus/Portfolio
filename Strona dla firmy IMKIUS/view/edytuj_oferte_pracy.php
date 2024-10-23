<?php

    namespace Pgimkius\View\Edytuj_oferte_pracy;

    class Edytuj_oferte_pracy {
        public function edytuj_oferte_pracy() {
            require "../view/html/edytuj_oferte_pracy.html";
        }
    }

    $edytuj_oferte_pracy = new Edytuj_oferte_pracy;
    $edytuj_oferte_pracy -> edytuj_oferte_pracy();

?>