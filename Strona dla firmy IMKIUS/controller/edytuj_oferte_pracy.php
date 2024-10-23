<?php

    namespace Pgimkius\Controller\Edytuj_oferte_pracy;

    class Edytuj_oferte_pracy {
        public function edytuj_oferte_pracy() {
            require "../view/edytuj_oferte_pracy.php";
        }
    }

    $edytuj_oferte_pracy = new Edytuj_oferte_pracy;
    $edytuj_oferte_pracy -> edytuj_oferte_pracy();

?>