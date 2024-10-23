<?php

    namespace Biuro_rachunkowe\Controller\Routing;

    class Routing {
        function routing() {
            require '../controller/main.php';
        }
    }

    $routing = new Routing;
    $routing -> routing();

?>