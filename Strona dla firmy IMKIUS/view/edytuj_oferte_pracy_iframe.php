<?php

    namespace Pgimkius\View\Edytuj_oferte_pracy_iframe;

    use PDO;
    use PDOException;

    class Edytuj_oferte_pracy_iframe {
        public function edytuj_oferte_pracy_iframe() {
            require "../view/html/edytuj_oferte_pracy_iframe.php";
        }

        function wprowadz_zmiany() {
            $dbhost = "mysql:host=localhost;dbname=pgimkius";
            $dbuser = "root";
            $dbpass = "";

            $tresc = $_POST['default'];

            try {
                $connection = new PDO($dbhost, $dbuser, $dbpass);
            }
            catch(PDOException $e) {
                echo("Nie działa");
            }

            $sql = "UPDATE oferty_pracy SET tresc='$tresc' WHERE ofpID=1";
            $statement = $connection->query($sql);
            $statement->execute();
    
            echo "Zmiany zostały wprowadzone!";
        }
    }

    $edytuj_oferte_pracy_iframe = new Edytuj_oferte_pracy_iframe;
    $edytuj_oferte_pracy_iframe -> edytuj_oferte_pracy_iframe();

    if(isset($_POST['zapisz'])) {
        $edytuj_oferte_pracy_iframe = new Edytuj_oferte_pracy_iframe;
        $edytuj_oferte_pracy_iframe -> wprowadz_zmiany();
    }
?>