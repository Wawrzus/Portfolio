<?php

    namespace Biuro_rachunkowe\View\Main;
    
    class Main {
        function main() {
            require '../view/html/main.html';
        }
    }

    $main = new Main;
    $main -> main();

?>