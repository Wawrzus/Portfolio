<?php

    namespace Pgimkius\Controller\Baza_danych;

    use PDO;
    use PDOException;

    class Baza_danych {

        function odczyt_zapytan() {

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

            $sql = 'SELECT * FROM zapytania';
            $statement = $connection->query($sql);
            $publishers = $statement->fetchAll();
            
            if($publishers)
            {
                foreach($publishers as $publishers)
                {
                    ?>
                    
                    <div class="headline_zapytanie">
                        <ul>
                            <li id="naglowek"><h2><?php echo $publishers['tytul'] ?></h2></li>
                        </ul>
                    </div>
                    
                    <div class="text_zapytania">
                        <p><?php echo $publishers['tresc'] ?></p>
                        <div class="guzik-box"><a href="assets/pdfs/<?php echo $publishers['pdf'] ?>" target="blank"><button class="zapytanie">Pobierz<img src="assets/images/direct-download.png" id="download"><img src="assets/images/direct-download-blue.png" id="download-blue"></button></a></div>
                    </div>

                    <?php
                }
            }
        }

        function odczyt_mobile_zapytan() {

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

            $sql = 'SELECT * FROM zapytania';
            $statement = $connection->query($sql);
            $publishers = $statement->fetchAll();
            
            if($publishers)
            {
                foreach($publishers as $publishers)
                {
                    ?>
                    
                    <div class="mobile_headline_zapytanie">
                        <ul>
                            <li id="mobile_naglowek"><h2><?php echo $publishers['tytul'] ?></h2></li>
                        </ul>
                    </div>
                    
                    <div class="mobile_text_zapytania">
                        <p><?php echo $publishers['tresc'] ?></p>
                        <p><?php echo $publishers['iow'] ?></p>
                        <div class="guzik-box"><a href="assets/pdfs/<?php echo $publishers['pdf'] ?>" target="blank"><button class="zapytanie">Pobierz<img src="assets/images/direct-download.png" id="download"><img src="assets/images/direct-download-blue.png" id="download-blue"></button></a></div>
                    </div>

                    <?php
                }
            }
        }

        function odczyt_aktualnosci() {
            
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
                foreach($publishers as $publishers)
                {
                    ?>
                    
                    <div class="headline_aktualnosc">
                        <ul>
                            <li id="naglowek"><h2><?php echo $publishers['tytul'] ?></h2></li>
                        </ul>
                    </div>
                    
                    <div class="zdjecia">
                        <?php

                            if(!empty($publishers['obraz1']) && empty($publishers['obraz2'])) {
                                ?><img src="assets/images_aktualnosci/<?php echo $publishers['obraz1'] ?>" id="obraz"><?php   
                            }
                            else if(empty($publishers['obraz1']) && !empty($publishers['obraz2'])) {
                                ?><img src="assets/images_aktualnosci/<?php echo $publishers['obraz2'] ?>" id="obraz"><?php
                            }
                            else if(!empty($publishers['obraz1']) && !empty($publishers['obraz2'])) {
                                ?>
                                    <img src="assets/images_aktualnosci/<?php echo $publishers['obraz1'] ?>" id="obraz">
                                    <img src="assets/images_aktualnosci/<?php echo $publishers['obraz2'] ?>" id="obraz">
                                <?php
                            }
                            else {
                                
                            }

                        ?>
                    </div>

                    <div class="text_aktualnosc">
                        <p><?php echo $publishers['tresc'] ?></p>
                    </div>

                    

                    <?php
                }
            }
        }

        function odczyt_mobile_aktualnosci() {
            
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
                foreach($publishers as $publishers)
                {
                    ?>
                    
                    <div class="mobile_headline_aktualnosc">
                        <ul>
                            <li id="mobile_naglowek"><h2><?php echo $publishers['tytul'] ?></h2></li>
                        </ul>
                    </div>
                    
                    <div class="zdjecia">
                        <?php

                            if(!empty($publishers['obraz1']) && empty($publishers['obraz2'])) {
                                ?><img src="assets/images_aktualnosci/<?php echo $publishers['obraz1'] ?>" id="obraz"><?php   
                            }
                            else if(empty($publishers['obraz1']) && !empty($publishers['obraz2'])) {
                                ?><img src="assets/images_aktualnosci/<?php echo $publishers['obraz2'] ?>" id="obraz"><?php
                            }
                            else if(!empty($publishers['obraz1']) && !empty($publishers['obraz2'])) {
                                ?>
                                    <img src="assets/images_aktualnosci/<?php echo $publishers['obraz1'] ?>" id="obraz">
                                    <img src="assets/images_aktualnosci/<?php echo $publishers['obraz2'] ?>" id="obraz">
                                <?php
                            }
                            else {
                                
                            }

                        ?>
                    </div>

                    <div class="mobile_text_aktualnosc">
                        <p><?php echo $publishers['tresc'] ?></p>
                    </div>

                    

                    <?php
                }
            }
        }

        function odczyt_oferta_pracy() {
            
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

            $sql = 'SELECT * FROM oferty_pracy';
            $statement = $connection->query($sql);
            $publishers = $statement->fetchAll();
            
            if($publishers)
            {
                foreach($publishers as $publishers)
                {
                    echo $publishers['tresc'];
                }
            }
        }
    }
?>