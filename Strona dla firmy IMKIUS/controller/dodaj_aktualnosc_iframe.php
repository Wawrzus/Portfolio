<?php

    namespace Pgimkius\Controller\Dodaj_aktualnosc_iframe;

    use PDO;
    use PDOException;

    class Dodaj_aktualnosc_iframe {
        public function dodaj_aktualnosc_iframe() {
            require "../view/dodaj_aktualnosc_iframe.php";
        }

        public function dodaj_aktualnosc() {
            $json = file_get_contents('../controller/dane.json');
            $json_data = json_decode($json);
            $dbhost = $json_data -> dbhost;
            $dbuser = $json_data -> dbuser;
            $dbpass = $json_data -> dbpass;

            $tytul = $_POST['tytul_input'];
            $tresc = $_POST['tresc_input'];
            $nazwa_pliku1 = $_FILES['graf1']['name'];
            $nazwa_pliku2 = $_FILES['graf2']['name'];

            try {
                $connection = new PDO($dbhost, $dbuser, $dbpass);
                $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO akt2(tytul, tresc, obraz1, obraz2) VALUES('$tytul', '$tresc', '$nazwa_pliku1', '$nazwa_pliku2')";
                $statement = $connection -> prepare($sql);
                $statement -> execute();
            }
            catch(PDOException $e) {
                echo("Nie działa");
            }

            echo("Aktualnosc dodana!");
        }

        public function dodaj_grafiki() {
            if(isset($_FILES['graf1'])) {
                $nazwa_pliku1 = $_FILES['graf1']['name'];
                $tymczasowa_nazwa1 = $_FILES['graf1']['tmp_name'];
                $folder = "assets/images_aktualnosci/";
            }

            if(isset($_FILES['graf2'])) {
                $nazwa_pliku2 = $_FILES['graf2']['name'];
                $tymczasowa_nazwa2 = $_FILES['graf2']['tmp_name'];
                $folder = "assets/images_aktualnosci/";
            }

            if(move_uploaded_file($tymczasowa_nazwa1, $folder . $nazwa_pliku1)) {
                echo "Zdjęcie1 zostało przesłane " . $folder . $nazwa_pliku1;
            }
            else {
                echo"Zdjęcie1 nie zostało przesłane " . $folder . $nazwa_pliku1;
            }

            if(move_uploaded_file($tymczasowa_nazwa2, $folder . $nazwa_pliku2)) {
                echo "Zdjęcie1 zostało przesłane " . $folder . $nazwa_pliku2;
            }
            else {
                echo"Zdjęcie1 nie zostało przesłane " . $folder . $nazwa_pliku2;
            }

        }
    }

    $dodaj_aktualnosc_iframe = new Dodaj_aktualnosc_iframe;
    $dodaj_aktualnosc_iframe -> dodaj_aktualnosc_iframe();

    if(isset($_POST['dodaj_aktualnosc'])) {
        $dodaj_aktualnosc_iframe -> dodaj_aktualnosc();
        $dodaj_aktualnosc_iframe -> dodaj_grafiki();
    }

?>