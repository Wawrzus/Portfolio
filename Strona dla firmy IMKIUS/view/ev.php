<?php

    namespace Pgimkius\View\Ev;

    class Ev {
        public function ev() {
            require "../view/html/ev.html";
        }
    }

    $ev = new Ev;
    $ev -> ev();

?>