<?php

    namespace Pgimkius\Controller\Logowanie;

    use PDO;
    use PDOException;

    class Logowanie {
        public function logowanie() {
            require "../view/logowanie.php";
        }

        public function porownaj_dane() {
            $json = file_get_contents('../controller/dane.json');
            $json_data = json_decode($json);
            $dbhost = $json_data -> dbhost;
            $dbuser = $json_data -> dbuser;
            $dbpass = $json_data -> dbpass;

            $login_db = $_POST['login'];
            $haslo_db = $_POST['haslo'];

            try {
                $connection = new PDO($dbhost, $dbuser, $dbpass);
            }
            catch(PDOException $e) {
                echo("Nie działa");
            }

            $sql = 'SELECT * FROM uzytkownicy WHERE uzytkownicyID = 1';
            $statement = $connection->query($sql);
            $publishers = $statement->fetchAll();
            
            if($publishers)
            {
                foreach($publishers as $publishers)
                {
                    $login = $publishers['login'];
                    $haslo = $publishers['haslo'];
                }
            }

            if(strcmp($login_db, $login) == 0 && strcmp($haslo_db, $haslo) == 0) {
                $_SESSION['login'] = $login;
                $_SESSION['haslo'] = $haslo;
                header('Location: zmien_dane_logowania');
            }
            else {
                header('Location: glowna');
                session_destroy();
            }
        }
    }

    $logowanie = new Logowanie;
    $logowanie -> logowanie();

    if(isset($_POST['submit_haslo'])) {
        $logowanie -> porownaj_dane();
    }

?>