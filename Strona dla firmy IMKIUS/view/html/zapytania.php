<?php

    namespace Pgimkius\View\Html\Zapytania;

    use Pgimkius\Controller\Baza_danych\Baza_danych;

    use PDO;
    use PDOException;

    require('../controller/baza_danych.php');
    $odczyt_mobile = new Baza_danych;
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
    <link rel="stylesheet" href="assets/css/zapytania.css">
    <title>Imkius</title>
</head>
<body>

<div class="mobile_version">
        <div class="mobile_menu">
            <div class="hamburger-container" id="burger-button">
                <div class="burger-menu">
                    <div class="top-line"></div>
                    <div class="middle-line"></div>
                    <div class="bottom-line"></div>
                </div>    
            </div>
            <div class="logo-container"><img src="assets/images/imkiuspg.png" id="imkiuspg"></div>
            <div class="empty-container"><img src="assets/images/undo.png" id="wroc" onclick="history.back()"></div>
        </div>

        <div class="mobile-menu-swipe">
            <ul>
                <li><a href="glowna"><button>GŁÓWNA<img src="assets/images/white_arrow.png" id="przejdz"></button></a></li>
                <li><a href="aktualnosci"><button>AKTUALNOŚCI<img src="assets/images/white_arrow.png" id="przejdz"></button></a></li>
                <li><a href="oferta"><button>OFERTA<img src="assets/images/white_arrow.png" id="przejdz"></button></a></li>
                <li><a href="praca"><button>PRACA<img src="assets/images/white_arrow.png" id="przejdz"></button></a></li>
                <li><a href="zapytania"><button>ZAPYTANIA<img src="assets/images/white_arrow.png" id="przejdz"></button></a></li>
                <li><a href="rodo"><button>RODO<img src="assets/images/white_arrow.png" id="przejdz"></button></a></li>
            </ul>

            <ul id="kontakt-swipe-menu">
                <li><img src="assets/images/phone-call.png" id="phone-call"><p>+48 32 475 81 50</p></li>
                <li><img src="assets/images/mail.png" id="mail"><p>poczta@imkius.pl</p></li>
                <a href="http://www.pg-technology.pl"><li id="link_"><img src="assets/images/pgtech_vec.png" id="pgtech_vec"><p>pg-technology.pl</p></li></a>
                <a href="http://www.pggarden.pl"><li id="link_"><img src="assets/images/pggarden.png" id="pggarden"><p>pggarden.pl</p></li></a>
                <a href="projekty.html"><li id="link_"><img src="assets/images/flaga.png" id="flaga_ue"><p>projekty unijne</p></li></a>
            </ul>
        </div>
        <div class="mobile_main">

            <?php
                $odczyt_mobile -> odczyt_mobile_zapytan();
            ?>

        </div>
        <footer>

<div class="mobile_adresy">

    <ul>

        <li><p>PG IMKIUS Sp. z o. o.</p></li>
        <li><p>ul. Morcinka 7d</p></li>
        <li><p>43-417 Kaczyce</p></li>
        <li><p>tel. +48 32 475 81 50</p></li>
        <li><p>fax +48 32 469 41 83</p></li>
        <li><p>e-mail: poczta@imkius.pl</p></li>

    </ul>

</div>

<div class="mobile_dzialy">

    <ul>

        <li><p>Działy:</p></li>
        <li><p>Handlowy/Przetargowy wew. 16</p></li>
        <li><p>Elektroniczny wew. 12</p></li>
        <li><p>Realizacyjno-produkcyjny wew. 20</p></li>
        <li><p>Logistyki wew. 14</p></li>
        <li><p>Serwisu wew. 11</p></li>

    </ul>

</div>

<div class="mobile_bank">

    <p>NIP 548-242-98-90, REGON 240018340,<br>
    Kapitał zakładowy 200 000 PLN, Kapitał wpłacony 200 000 PLN<br>
    Wpis do Rejestru przedsiębiorców prowadzony przez Sąd Rejonowy w Bielsku-Białej<br>
    VIII Wydział Gospodarczy Krajowego Rejestru Sądowego pod nr KRS 0000228490<br>
    Konto bankowe:<br> 
    BNP Paribas Bank Polska S.A. nr 73 1750 1178 0000 0000 3985 8778</p>

</div>

<div class="mobile_mapa">

    <iframe width="1100px" height="100%" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10293.332948522542!2d18.6031958!3d49.8361958!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6f7962df73f2ba29!2sIMKIUS+sp.+z+o.o.!5e0!3m2!1spl!2spl!4v1503575963593" frameborder="0" allowfullscreen="" style="border: 0;"></iframe>

</div>

</footer>
    </div>

    <div class="pc_version">

    <div class="menu_contact">

        <ul>

            <li><img src="assets/images/phone-call.png" id="phone-call"><p>+48 32 475 81 50</p></li>
            <li><img src="assets/images/mail.png" id="mail"><p>poczta@imkius.pl</p></li>
            <a href="http://www.pg-technology.pl"><li id="link_"><img src="assets/images/pgtech_vec.png" id="pgtech_vec"><p>pg-technology.pl</p></li></a>
            <a href="http://www.pggarden.pl"><li id="link_"><img src="assets/images/pggarden.png" id="pggarden"><p>pggarden.pl</p></li></a>
            <a href="projekty.html"><li id="link_"><img src="assets/images/flaga.png" id="flaga_ue"><p>projekty unijne</p></li></a>

        </ul>

    </div>
    <div class="menu">

        <ul>

            <li><img src="assets/images/imkiuspg.png" id="imkiuspg"></li>
            <a href="glowna.html"><li><p>GŁÓWNA</p></li></a>
            <a href="aktualnosci.html"><li><p>AKTUALNOŚCI</p></li></a>
            <a href="oferta.html"><li><p>OFERTA</p></li></a>
            <a href="praca.html"><li><p>PRACA</p></li></a>
            <a href="zapytania.html"><li><p>ZAPYTANIA</p></li></a>
            <a href="rodo.html"><li><p>RODO</p></li></a>

        </ul>

    </div>

    <div class="main">

        <div class="main_second">

            <?php 
                $odczyt -> odczyt_zapytan();
            ?>

        </div>

    </div>
    <footer>

        <div class="kontakt_main">
    
            <div class="adresy">

                <ul>

                    <li><p>PG IMKIUS Sp. z o. o.</p></li>
                    <li><p>ul. Morcinka 7d</p></li>
                    <li><p>43-417 Kaczyce</p></li>
                    <li><p>tel. +48 32 475 81 50</p></li>
                    <li><p>fax +48 32 469 41 83</p></li>
                    <li><p>e-mail: poczta@imkius.pl</p></li>

                </ul>

            </div>
            <div class="dzialy">

                <ul>

                    <li><p>Działy:</p></li>
                    <li><p>Handlowy/Przetargowy wew. 16</p></li>
                    <li><p>Elektroniczny wew. 12</p></li>
                    <li><p>Realizacyjno-produkcyjny wew. 20</p></li>
                    <li><p>Logistyki wew. 14</p></li>
                    <li><p>Serwisu wew. 11</p></li>

                </ul>

            </div>
            <div class="bank">

                <p>NIP 548-242-98-90, REGON 240018340,<br>
                Kapitał zakładowy 200 000 PLN, Kapitał wpłacony 200 000 PLN<br>
                Wpis do Rejestru przedsiębiorców prowadzony przez Sąd Rejonowy w Bielsku-Białej<br>
                VIII Wydział Gospodarczy Krajowego Rejestru Sądowego pod nr KRS 0000228490<br>
                Konto bankowe:<br> 
                BNP Paribas Bank Polska S.A. nr 73 1750 1178 0000 0000 3985 8778</p>

            </div>  
            
        </div>

        <div class="mapa">

            <iframe width="1100px" height="100%" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10293.332948522542!2d18.6031958!3d49.8361958!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6f7962df73f2ba29!2sIMKIUS+sp.+z+o.o.!5e0!3m2!1spl!2spl!4v1503575963593" frameborder="0" allowfullscreen="" style="border: 0;"></iframe>

        </div>

    </footer>
    </div>
    <script src="js/script.js"></script>
</body>
</html>