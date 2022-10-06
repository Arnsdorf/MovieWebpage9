<?php
require "settings/init.php";

$data = json_decode(file_get_contents('php://input'), true);


$data['password'] = "Scooby";
/*
 * password: Skal udfyldes og være Scooby
 * namesearch: Valgfri
 *
 */

/*
$header = "HTTP/1.1 400 Bad Request"; // Sending malformed data results in a 400 Bad Request response.
$header = "HTTP/1.1 401 Unauthorized"; // Trying to access to the API without authentication results in a 401 Unauthorized response.
$header = "HTTP/1.1 404 Not Found"; // Not Found
$header = "HTTP/1.1 405 Method Not Allowed"; // Trying to use a method on a route for which it is not implemented results in a 405 Method Not Allowed.
$header = "HTTP/1.1 422 Unprocessable Entity"; // Sending invalid data results in a 422 Unprocessable Entity response.

$header = "HTTP/1.1 200 OK"; // Getting a resource or a collection resources results in a 200 OK response
$header = "HTTP/1.1 200 Created"; // Creating a resource results in a 201 Created response.
$header = "HTTP/1.1 200 No Content"; // Updating or deleting a resource results in a 204 No Content response.
 */

header("Content-Type: application/json; charset=utf-8");

if (isset($data["password"]) && $data["password"] == "Scooby"){
    $sql = "SELECT * FROM movie WHERE 1=1";
    $bind = [];

    if (!empty($data["nameSearch"])){
        $sql = $sql .= " AND movieTitel LIKE CONCAT('%', :movieTitel, '%')";
        $bind[":movieTitel"] = $data["nameSearch"];
    }

    if (!empty($data["ratingSearch"])){
        $sql = $sql .= " AND movieIMDB >= :movieIMDB";
        $bind[":movieIMDB"] = $data["ratingSearch"];
    }

    if (!empty($data["aarSearch"])){
        $endYear = $data["aarSearch"];
        $endYear = substr_replace($endYear, "9", -1);
        $sql .= " AND movieYear >= :aarSearch AND movieYear <= :endYear";
        $bind[":aarSearch"] = $data["aarSearch"];
        $bind[":endYear"] = $endYear;
    }
    if (!empty($data["genreSearch"])){
        $sql = $sql .= " AND movieGenre >= :movieGenre";
        $bind[":movieGenre"] = $data["genreSearch"];
    }


    $movie = $db->sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    echo json_encode($movie);

} else{
    header("HTTP/1.1 401 Unauthorized");
    $error["errorMessage"] = "Hov Skipper, kodeordet er vidst nok forkert, kammerat";

    echo json_encode($error);
}
?>