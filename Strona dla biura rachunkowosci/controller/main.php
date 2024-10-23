<?php

    namespace Biuro_rachunkowe\Controller\Main;
    
    class Main {
        function main() {
            require '../view/main.php';
        }
    }

    $main = new Main;
    $main -> main();

?>