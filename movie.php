<?php
include("./_connect.php");

var_dump($_POST);

if ($_POST) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $imdb = $_POST['imdb']; 
    $rt = $_POST['rt'];
    $rating = $_POST['rating'];

    $fields = "(`title`, `year`, "; 
    if ($imdb) $fields .= "`imdb_url`, ";
    if ($rt) $fields .= "`rt_url`, ";
    $fields .= "`my_rating`)";

    $values = "('{$title}', '{$year}', "; 
    if ($imdb) $values .= "'{$imdb}', ";
    if ($rt) $values .= "'{$rt}', ";
    $values .= "'{$rating}')"; 

    $sql = "INSERT INTO movies $fields VALUES $values";
    var_dump($sql);

    $result = $mysqli->query($sql);
    var_dump($result);
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <style>
        label { display: inline-block; width: 160px; text-align: right; }
        label::after { content: ":" }
    </style>
</head>
<body>
    <h1>Add Movie</h1> 
    <form method="post">
        <label for="title">Title</label>
        <input id="title" name="title"><br>

        <label for="year">Year</label>
        <input id="year" name="year" type="number" width="4"><br>
        
        <label for="imdb">IMDB url</label>
        <input id="imdb" name="imdb"><br>
        
        <label for="rt">Rotten Tomato URL</label>
        <input id="rt" name="rt"><br>
        
        <label for="rating">My rating</label>
        <input id="rating" name="rating" type="range" min=1 max=6 step=1 list="ticks">
        <span id="output"></span><br>
        
        <button id="submitBtn">Submit</button>
        
        <datalist id="ticks">
            <option value="1"></option>
            <option value="2"></option>
            <option value="3"></option>
            <option value="4"></option>
            <option value="5"></option>
            <option value="6"></option>
        </datalist>
    </form>
    <script>
        const output = document.querySelector("#output");
        const input = document.querySelector("#rating");
        output.textContent = input.value;
        input.addEventListener("input", (event) => {
            output.textContent = event.target.value;
        });
    </script>
</body>
</html>