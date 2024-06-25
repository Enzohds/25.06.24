<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'restaurant_feedback';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["nome"];
  $email = $_POST["email"];
  $phone = $_POST["telefone"];
  $visit_date = $_POST["data-visita"];
  $visit_time = $_POST["hora-visita"];
  $favorite_food = $_POST["comida"];
  $food_quality = $_POST["qualidade-comida"];
  $service_quality = $_POST["atendimento"];
  $comments = $_POST["comentarios"];

  $sql = "INSERT INTO feedback (name, email, phone, visit_date, visit_time, favorite_food, food_quality, service_quality, comments)
          VALUES ('$name', '$email', '$phone', '$visit_date', '$visit_time', '$favorite_food', '$food_quality', '$service_quality', '$comments')";

  if ($conn->query($sql) === TRUE) {
    echo "Feedback submitted successfully!";
  } else {
    echo "Error: ". $sql. "<br>". $conn->error;
  }
}

$conn->close();
?>