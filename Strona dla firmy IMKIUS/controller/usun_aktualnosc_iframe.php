<?php

    namespace Pgimkius\Controller\Usun_aktualnosc_iframe;

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
        echo("Nie działa");
    }

    class Usun_aktualnosc_iframe {
        public function usun_aktualnosc_iframe() {
            require "../view/usun_aktualnosc_iframe.php";
        }

        public function usun_wiersz($id) {
            $json = file_get_contents('../controller/dane.json');
            $json_data = json_decode($json);
            $dbhost = $json_data -> dbhost;
            $dbuser = $json_data -> dbuser;
            $dbpass = $json_data -> dbpass;

            try {
                $connection = new PDO($dbhost, $dbuser, $dbpass);
                $sql = "DELETE FROM akt2 WHERE akt2_id = $id";
                $connection -> exec($sql);
                header('Location: usun_aktualnosc_iframe');
            }
            catch(PDOException $e) {
                echo("Nie działa " . $e->getMessage());
            }
        }
    }

    $usun_aktualnosc_iframe = new Usun_aktualnosc_iframe;
    $usun_aktualnosc_iframe -> usun_aktualnosc_iframe();

    $sql = 'SELECT * FROM akt2';
    $statement = $connection->query($sql);
    $publishers = $statement->fetchAll();

    if($publishers)
    {
        foreach($publishers as $publishers)
        {
            $id = $publishers['akt2_id'];
            if(isset($_POST[$id])) {
                $usun_aktualnosc_iframe -> usun_wiersz($id);
            }
        }
    }

?>