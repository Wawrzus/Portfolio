<?php

    namespace Pgimkius\Controller\Usun_zapytanie_iframe;

    use PDO;
    use PDOException;

    $json = file_get_contents('../controller/dane.json');
    $json_data = json_decode($json);
    $dbhost = $json_data -> dbhost;
    $dbuser = $json_data -> dbuser;
    $dbpass = $json_data -> dbpass;

    try {
        $connection = new PDO($dbhost, $dbuser, $dbpass);
    }
    catch(PDOException $e) {
        echo "Nie działa" . $e->getMessage();
    }

    class Usun_zapytanie_iframe {
        public function usun_zapytanie_iframe() {
            require "../view/usun_zapytanie_iframe.php";
        }

        public function usun_wiersz($id) {
            $json = file_get_contents('../controller/dane.json');
            $json_data = json_decode($json);
            $dbhost = $json_data -> dbhost;
            $dbuser = $json_data -> dbuser;
            $dbpass = $json_data -> dbpass;

            try {
                $connection = new PDO($dbhost, $dbuser, $dbpass);
                $sql = "DELETE FROM zapytania WHERE zapID = $id";
                $connection -> exec($sql);
                header('Location: usun_zapytanie_iframe');
            }
            catch(PDOException $e) {
                echo "Nie działa" . $e->getMessage();
            }
        }

        public function usun_plik($plik) {
            unlink("assets/pdfs/" . $plik);
        }
    }

    $usun_zapytanie_iframe = new Usun_zapytanie_iframe;
    $usun_zapytanie_iframe -> usun_zapytanie_iframe();

    $sql = 'SELECT * FROM zapytania';
    $statement = $connection->query($sql);
    $publishers = $statement->fetchAll();

    if($publishers)
    {
        foreach($publishers as $publishers)
        {
            $id = $publishers['zapID'];
            $plik = $publishers['pdf'];
            if(isset($_POST[$id])) {
                $usun_zapytanie_iframe -> usun_wiersz($id);
                $usun_zapytanie_iframe -> usun_plik($plik);
            }
        }
    }

?>