<?php

    namespace Pgimkius\Pub\Index;
    use Pgimkius\Pub\Routing\Routing;

    class Index {
        public function index() {
            require '../pub/routing.php';
            $routing = new Routing;
            $routing -> routing();
        }
    }

    $index = new Index;
    $index -> index();

?>

    

