<?php

require "settings/init.php";

if(!empty($_POST["data"])){
    $data = $_POST["data"];
    $file = $_FILES;

    if (!empty($file["movieBillede"]["tmp_name"])){
        move_uploaded_file($file["movieBillede"]["tmp_name"], "uploads/" . basename($file["movieBillede"]["name"]));
    }



    $sql = "INSERT INTO movie (movieTitel, movieYear, movieInstructor, movieDuration, movieGenre, movieIMDB, movieDiscription, movieActors, movieOscars, movieTotalGross, movieBillede) VALUES (:movieTitel, :movieYear, :movieInstructor, :movieDuration, :movieGenre, :movieIMDB, :movieDiscription, :movieActors, :movieOscars, :movieTotalGross, :movieBillede)";
    $bind = [":movieTitel" => $data["movieTitel"], ":movieYear" => $data["movieYear"], ":movieInstructor" => $data["movieInstructor"], ":movieDuration" => $data["movieDuration"], ":movieGenre" => $data["movieGenre"], ":movieIMDB" => $data["movieIMDB"], ":movieDiscription" => $data["movieDiscription"], ":movieActors" => $data["movieActors"], ":movieOscars" => $data["movieOscars"], ":movieOscars" => $data["movieOscars"], ":movieTotalGross" => $data["movieTotalGross"], ":movieBillede" => (!empty($file["movieBillede"]["tmp_name"])) ? $file["movieBillede"]["name"] : NULL,];

    $db->sql($sql, $bind, false);


    echo "<body style='font-size: 2rem; background-color: #FBAB7E; background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);'></body> 
        <h1 style='color: white; font-family: Poppins; display: flex; justify-content: center; padding: 50px;' id='echo_besked'>Godt svaret, skipper.🚢</h1> 
        <a style='text-decoration: none; color: black; font-family: Poppins; display: flex; justify-content: center;' href='insert.php'>Kom med endnu et svar!</a>
        ";

    exit;


}
?>


<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Movie</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.scss" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>


<div class="container text-white">
    <h1 class="text-center m-5 film">MoviePage</h1>
    <p class="text-center lille_tekst pb-5">Tænk på din yndlingsfilm og udfyld felterne nedenfor, så vil det være mega fedt.</p>
</div>

<form method="post" action="insert.php " enctype="multipart/form-data">
    <div class="row text-white m-0">
        <div class="col-12 col-md-6 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieTitel">Hvad er filmens titel?</label>
                <input class="form-control shadow" type="text" name="data[movieTitel]" id="movieTitel" placeholder="Film titel " value="">
            </div>
        </div>
        <div class="col-12 col-md-6 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieYear">Hvilket årstal er filmen fra?</label>
                <input class="form-control shadow" type="number" min="1900" max="2099" step="1" name="data[movieYear]" id="movieYear" placeholder="Årstal" value="">
            </div>
        </div>
        <div class="col-12 col-md-6 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieInstructor">Hvem instruede filmen?</label>
                <input class="form-control shadow" type="text" name="data[movieInstructor]" id="movieInstructor" placeholder="Instruktør" value="">
            </div>
        </div>

        <div class="col-12 col-md-6 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieDuration">Hvad er varigheden på filmen?</label>
                <input class="form-control shadow" type="time" name="data[movieDuration]" id="movieDuration" placeholder="Varighed" value="">
            </div>
        </div>

        <div class="col-12 col-md-6 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieGenre">Hvad er filmens genre?</label>
                <input class="form-control shadow" type="text" name="data[movieGenre]" id="movieGenre" placeholder="Genre" value="">
            </div>
        </div>

        <div class="col-12 col-md-6 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieIMDB">Hvad er filmens IMDB rating?</label>
                <input class="form-control shadow" type="text" name="data[movieIMDB]" id="movieIMDB" placeholder="IMDB Rating" value="">
            </div>
        </div>

        <div class="col-12 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieDiscription">Hvad er filmens handling?</label>
                <textarea class="form-control" name="data[movieDiscription]" id="movieDiscription"></textarea>
            </div>
        </div>

        <div class="col-12 col-md-6 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieActors">Nævn nogle af filmens skuespillere</label>
                <input class="form-control shadow" type="text" name="data[movieActors]" id="movieActors" placeholder="Skuespillere" value="">
            </div>
        </div>

        <div class="col-12 col-md-6 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieOscars">Hva' der nogle i filmen, som vandt en Oscar?</label>
                <input class="form-control shadow" type="text" name="data[movieOscars]" id="movieOscars" placeholder="Oscars" value="">
            </div>
        </div>

        <div class="col-12 col-md-6 p-5">
            <div class="form-group">
                <label class="overskrift" for="movieTotalGross">Hvor meget har filmen indtjent?</label>
                <input class="form-control shadow" type="number" name="data[movieTotalGross]" id="movieTotalGross" placeholder="Indtjent" value="">
            </div>
        </div>

        <div class="col-12 col-md-6 p-5">
            <label class="form-label overskrift" for="movieBillede">Her kan du indsætte et billede fra filmen</label>
            <input type="file" class="form-control shadow" id="movieBillede" name="movieBillede">
        </div>

        <div class="col-12 col-md-6 offset-md-3 pb-3 p-5">
            <button class="form-control submit_knap p-3 text-white shadow" type="submit" id="btnSubmit">Indsend dine svar her!</button>
        </div>

    </div>

</form>

<script>
    tinymce.init({
        selector: '#movieDiscription',
    });
</script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>