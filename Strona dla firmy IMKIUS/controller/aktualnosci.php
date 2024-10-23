<?php

    namespace Pgimkius\Controller\Aktualnosci;

    use Pgimkius\Controller\Baza_danych\Baza_danych;

    class Aktualnosci {
        function aktualnosci() {
            require('../view/aktualnosci.php');
        } 

        
    }

    $aktualnosci = new Aktualnosci;
    $aktualnosci -> aktualnosci();

?>