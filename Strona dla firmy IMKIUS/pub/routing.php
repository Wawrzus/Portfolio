<?php

    namespace Pgimkius\Pub\Routing;

    use PDO;
    use PDOException;

    session_start();

    class Routing {
        public function routing() {

            $url = $_SERVER['REQUEST_URI'];

            if($url == '') {
                require '../controller/glowna.php';
            }

            else if($url == '/') {
                require '../controller/glowna.php';
            }

            else if($url == '/glowna') {
                require '../controller/glowna.php';
            }

            else if($url == '/zmien_dane_logowania' && isset($_SESSION['login']) && isset($_SESSION['haslo'])) {
                require '../controller/zmien_dane_logowania.php';
            }

            else if($url == '/zmien_dane_logowania' && empty($_SESSION['login']) && empty($_SESSION['haslo'])) {
                require '../controller/glowna.php';
            }

            else if($url == '/dodaj_zapytanie_ofertowe' && isset($_SESSION['login']) && isset($_SESSION['haslo'])) {
                require '../controller/dodaj_zapytanie_ofertowe.php';
            }

            else if($url == '/dodaj_zapytanie_ofertowe' && empty($_SESSION['login']) && empty($_SESSION['haslo'])) {
                require '../controller/glowna.php';
            }            

            else if($url == '/usun_zapytanie' && isset($_SESSION['login']) && isset($_SESSION['haslo'])) {
                require '../controller/usun_zapytanie.php';
            }

            else if($url == '/usun_zapytanie' && empty($_SESSION['login']) && empty($_SESSION['haslo'])) {
                require '../controller/glowna.php';
            }

            else if($url == '/zmien_dane_logowania' && isset($_SESSION['login']) && isset($_SESSION['haslo'])) {
                require '../controller/zmien_dane_logowania.php';
            }

            else if($url == '/zmien_dane_logowania' && empty($_SESSION['login']) && empty($_SESSION['haslo'])) {
                require '../controller/glowna.php';
            }

            else if($url == '/dodaj_aktualnosc' && isset($_SESSION['login']) && isset($_SESSION['haslo'])) {
                require '../controller/dodaj_aktualnosc.php';
            }

            else if($url == '/dodaj_aktualnosc' && empty($_SESSION['login']) && empty($_SESSION['haslo'])) {
                require '../controller/glowna.php';
            }

            else if($url == '/zmien_dane_logowania' && isset($_SESSION['login']) && isset($_SESSION['haslo'])) {
                require '../controller/zmien_dane_logowania.php';
            }

            else if($url == '/zmien_dane_logowania' && empty($_SESSION['login']) && empty($_SESSION['haslo'])) {
                require '../controller/glowna.php';
            }

            else if($url == '/usun_aktualnosc' && isset($_SESSION['login']) && isset($_SESSION['haslo'])) {
                require '../controller/usun_aktualnosc.php';
            }

            else if($url == '/usun_aktualnosc' && empty($_SESSION['login']) && empty($_SESSION['haslo'])) {
                require '../controller/glowna.php';
            }

            else if(substr($url, -3) == 'pdf') {
                $file_name = substr($url, 13);
                $file_name_sc = 'assets/pdfs/' . $file_name;

                header('Content-type: application/pdf');
                header('Content-Disposition: inline; filename="' . $file_name_sc);
                header('Content-Transfer-Encoding: binary');
                header('Accept-Ranges: bytes');
                @readfile($file_name_sc);
            }

            else if(substr($url, -3) == "pdf") {

                $json = file_get_contents('../controller/dane.json');
                $json_data = json_decode($json);
                $dbhost = $json_data -> dbhost;
                $dbuser = $json_data -> dbuser;
                $dbpass = $json_data -> dbpass;
                
                try
                {
                    $connection = new PDO($dbhost, $dbuser, $dbpass);
                }
                catch (PDOException $exception)
                {
                    die('Connection failed: ' . $exception->getMessage());
                }

                $sql = 'SELECT * FROM zapytania';
        
                $statement = $connection->query($sql);
            
                $publishers = $statement->fetchAll();

                if($publishers)
                {
                    foreach($publishers as $publishers)
                    {
                        if(substr($url, 13) == $publishers['pdf'])
                        {
                            $file = 'assets/pdfs/' . $publishers['pdf'];

                            header('Content-type: application/pdf');
                            header('Content-Disposition: inline; filename="' . $file);
                            header('Content-Transfer-Encoding: binary');
                            header('Accept-Ranges: bytes');
                            @readfile($file);
                        }
                    }
                }

            }
            
            else {
                require '../controller/' . $url . '.php';
            }
        }
    }

?>