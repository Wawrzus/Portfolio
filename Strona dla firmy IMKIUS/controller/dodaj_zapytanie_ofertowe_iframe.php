<?php

    namespace Pgimkius\Controller\Dodaj_zapytanie_ofertowe_iframe;

    use PDO;
    use PDOException;

    class Dodaj_zapytanie_ofertowe_iframe {
        public function dodaj_zapytanie_ofertowe_iframe() {
            require "../view/dodaj_zapytanie_ofertowe_iframe.php";
        }

        public function dodaj_zapytanie() {
            $json = file_get_contents('../controller/dane.json');
            $json_data = json_decode($json);
            $dbhost = $json_data -> dbhost;
            $dbuser = $json_data -> dbuser;
            $dbpass = $json_data -> dbpass;

            $tytul = $_POST['tytul_input'];
            $tresc = $_POST['tresc_input'];
            $iow = $_POST['informacja_o_wyniku_postepowania_input'];
            $nazwa_pliku = $_FILES['file']['name'];

            try {
                $connection = new PDO($dbhost, $dbuser, $dbpass);
                $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO zapytania(tytul, tresc, iow, pdf) VALUES('$tytul', '$tresc', '$iow', '$nazwa_pliku')";
                $statement = $connection -> prepare($sql);
                $statement -> execute();
            }
            catch(PDOException $e) {
                echo("Nie działa");
            }

            echo("Artykuł dodoany!");
        }

        public function dodaj_plik() {
            if(isset($_FILES['file'])) {
                $nazwa_pliku = $_FILES['file']['name'];
                $tymczasowa_nazwa = $_FILES['file']['tmp_name'];
                $folder = "assets/pdfs/";
            }

            if(move_uploaded_file($tymczasowa_nazwa, $folder . $nazwa_pliku)) {
                echo("Zdjęcie przesłane");
            }
            else {
                echo("Zdjęcie nie przesłane");
                echo $folder . $nazwa_pliku;
            }
        }
    }

    $dodaj_zapytanie_ofertowe_iframe = new Dodaj_zapytanie_ofertowe_iframe;
    $dodaj_zapytanie_ofertowe_iframe -> dodaj_zapytanie_ofertowe_iframe();

    if(isset($_POST['submit'])) {
        $dodaj_zapytanie_ofertowe_iframe -> dodaj_zapytanie();
        $dodaj_zapytanie_ofertowe_iframe -> dodaj_plik();
    }

?>