<?php
require "settings/init.php";

$movies = $db->sql("SELECT * FROM `movie` WHERE`movieId` = 6;")

?>
<!-- Instruktion til webbrowser om at vi kører HTML5 -->
<!DOCTYPE html>

<!-- html starter og slutter hele dokumentet / lang=da: Fortæller siden er på dansk -->
<html lang="da">

<!-- I <head> har man opsætning - det ser brugeren ikke, men det fortæller noget om siden -->
<head>
    <!-- Sætter tegnsætning til utf-8 som bl.a. tillader danske bogstaver -->
    <meta charset="utf-8">

    <!-- Titel som ses oppe i browserens tab mv. -->
    <?php

    foreach ($movies as $movie){
    ?>

    <title>

        <?php

        echo $movie->movieTitel

        ?>

    </title>

    <!-- Metatags der fortæller at søgemaskiner er velkomne, hvem der udgiver siden og copyright information -->
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">


    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="css/goodfellas.scss" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/ede39c7ba1.js" crossorigin="anonymous"></script>
    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- i <body> har man alt indhold på siden som brugeren kan se -->
<body style="background-color: #1F1F1F;">

<div class="container pt-5">
    <div class="row">
        <h1 class="text-light overskrift">
        <?php

        echo $movie->movieTitel

        ?>

        </h1>

        <div>
            <h4 class="text-light">
                <?php

                echo $movie->movieYear

                ?> •

                <?php

                echo $movie->movieDuration

                ?> •

                <?php

                echo $movie->movieIMDB

                ?> <i class="fa-regular fa fa-star"></i>
            </h4>
            <div class="container bg-light box mt-5 " style="height: 600px">
                <?php
                if(!empty($movie->movieBillede)){
                    ?>
                    <img src="uploads/<?php echo $movie->movieBillede;?>">
                    <?php
                }else{
                    echo "Ikke noget billede endnu :(";
                }
                ?>
            </div>
            <h4 style="font-family: Poppins; border: white solid 2px; max-width: 150px; border-radius: 25px;" class="text-light mt-3 text-center p-2">
                <?php
                echo $movie->movieGenre
                ?>
            </h4>
            <h5 style="font-weight: lighter; font-family: Poppins; max-width: 600px;" class="text-light mt-5">
                <?php
                echo $movie->movieDiscription
                ?>
            </h5>
            <h5 style="border-bottom: solid white 2px; max-width: 600px; border-top: solid white 2px; font-family: Poppins;" class="text-light pt-2 pb-2 mt-5">
                Instruktør >
                <?php
                echo $movie->movieInstructor
                ?>
            </h5>
            <h5 style="border-bottom: solid white 2px; max-width: 600px; font-family: Poppins;" class="text-light pb-2">
                Medvirkende >
                <?php
                echo $movie->movieActors
                ?>
            </h5>
            <h5 style="border-bottom: solid white 2px; max-width: 600px; font-family: Poppins;" class="text-light pb-2">
                Oscar-Priser >
                <?php
                echo $movie->movieOscars
                ?>
            </h5>
            <h5 style="border-bottom: solid white 2px; max-width: 600px; font-family: Poppins;" class="text-light pb-2 mb-5">
                Total-Gross > $
                <?php
                echo $movie->movieTotalGross
                ?>
            </h5>
        </div>

    </div>
</div>

<?php



}

?>

</body>
</html>
