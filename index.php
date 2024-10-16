<?php
$servername = "database";
$username = "root";
$password = "123";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, rollnumber FROM natwest";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Natwest Team 4</title>

  <!-- Add some CSS for styling -->
  <style>
    body {
      background-color: #e6e6fa; /* Light purple background */
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      display: flex;
      align-items: center;
      padding: 20px;
      background-color: #4B0082; /* Indigo color for contrast */
      color: white;
    }

    .header img {
      width: 150px; /* Adjust size of the NatWest logo */
      height: auto;
      margin-right: 20px;
    }

    .header h1 {
      font-size: 36px;
      margin: 0;
    }

    .content {
      padding: 20px;
    }

    .team-text {
      text-align: center;
      font-size: 28px;
      font-weight: bold;
      margin: 20px 0;
      color: #4B0082; /* Indigo color for the text */
    }
  </style>
</head>
<body>

  <!-- Header section with NatWest logo and title -->
  <div class="header">
    <img src="natwest_logo.png" alt="NatWest Logo">
    <h1>Bootcamp Team 4</h1>
  </div>

  <!-- Main content -->
  <div class="content">
    <p class="team-text">Welcome to Bootcamp Team 4's Project</p>

    <?php
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo " - Name: " . $row["firstname"]. " " . $row["rollnumber"]. "<br>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
  </div>

</body>
</html>

