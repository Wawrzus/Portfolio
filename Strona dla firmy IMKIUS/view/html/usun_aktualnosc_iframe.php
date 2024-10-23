<?php

    namespace Pgimkius\View\Html\Usun_zapytanie_iframe;

    use PDO;
    use PDOException;

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
    <link rel="stylesheet" href="assets/css/usun_zapytanie_iframe.css">
    <title>Document</title>
</head>
<body>
    <div class="main">

    <?php

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

        $sql = 'SELECT * FROM akt2';
        $statement = $connection->query($sql);
        $publishers = $statement->fetchAll();

        if($publishers)
        {
            ?><form action="usun_aktualnosc_iframe" id="formularz" method="post"><?php
            foreach($publishers as $publishers)
            {
                ?>

                    <div class="box">

                        <div class="box-l"><?php echo $publishers['tytul'] ?></div>
                        <div class="box-r"><input type="submit" name="<?php echo $publishers['akt2_id'] ?>" value="Usuń" id="guzik"></input></div>

                    </div>
            
                <?php
            }
            ?></form><?php
        }

    ?>

    </div>
</body>
</html>