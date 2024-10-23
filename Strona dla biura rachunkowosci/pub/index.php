<?php

    namespace Biuro_rachunkowe\Pub\Index;
    
    class Index {
        function index() {
            require '../controller/routing.php';
        }
    }

    $index = new Index;
    $index -> index();

?>