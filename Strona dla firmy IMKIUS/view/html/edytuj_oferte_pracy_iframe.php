<?php

    namespace Pgimkius\View\Html\Edytuj_oferte_pracy_iframe;

    use Pgimkius\Controller\Baza_danych\Baza_danych;

    use PDO;
    use PDOException;

    require('../controller/baza_danych.php');
    $odczyt = new Baza_danych;

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/edytuj_oferte_pracy.css">
    <script src="assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>

        tinymce.init({
            selector: '#default',
            height: 500,
            width: 700
        });

    </script>
    <title>Panel administracyjny</title>
</head>
<body>
    
    <form class="formularz" action="edytuj_oferte_pracy_iframe" method="post">

        <label id="praca_label" for="default">Oferta pracy:</label>
        <textarea id="default" name="default">

        <?php 

            $odczyt -> odczyt_oferta_pracy();

        ?>

        </textarea>

        <input type="submit" name="zapisz" value="Zapisz" id="button">

    </form>

</body>
</html>