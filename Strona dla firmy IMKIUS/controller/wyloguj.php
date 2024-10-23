<?php

    namespace Pgimkius\Controller\Wyloguj;

    class Wyloguj {
        public function wyloguj() {
            session_destroy();
            header('Location: glowna');
        }
    }

    if(isset($_POST['wyloguj'])) {
        $wyloguj = new Wyloguj;
        $wyloguj -> wyloguj();
    }

?>