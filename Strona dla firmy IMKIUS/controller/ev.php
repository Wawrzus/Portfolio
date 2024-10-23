<?php

    namespace Pgimkius\Controller\Ev;

    class Ev {
        public function ev() {
            require "../view/ev.php";
        }
    }

    $ev = new Ev;
    $ev -> ev();

?>