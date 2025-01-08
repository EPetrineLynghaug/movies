
<?php
include("./_connect.php");
$sql = "SELECT * FROM movies";
$sql .= " ORDER BY my_rating DESC, year DESC";
var_dump($sql);
$result = $mysqli->query($sql);
// var_dump($result->num_rows);

if ($result->num_rows > 0) {
  $output = "<ul>";
  while($row = $result->fetch_assoc()) {
      $output .= "<li>{$row['title']} ({$row['year']})";
      // URLs coming here
      $output .= " {$row['my_rating']}</li>";
  }
  $output .= "</ul>";
} else {
  $output = "<p style='color: red'>No result!</p>";
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Movie ratings</title>
  
</head>
<body>
  <h1>My Movie ratings</h1>
  <p><a href="movie.php">Add Movie</a></p>
  <?php echo $output; ?>
</body>
</html>