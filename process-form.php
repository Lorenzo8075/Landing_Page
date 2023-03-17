<?php
  $firstName = $_POST["first-name"];
  $lastName = $_POST["last-name"];
  $email = $_POST["email"];
  $notifications = $_POST["push-type"];
  $school = $_POST["school"];
  $industry = $_POST["industry"];
  $type = '';
  if (isset($_POST['full-time'])) {
    $type .= 'Full Time';
  }
  if (isset($_POST['part-time'])) {
    $type .= 'Part Time';
  }
  $description = $_POST["description"];

  var_dump($firstName, $lastName, $email, $notifications, $school, $industry, $type, $description);

  $host = "localhost";
  $dbname = "Waitlist";
  $username = "lorenzo";
  $password = "Sansone98";

  $conn = mysqli_connect($host, $username, $password, $dbname);

  if(mysqli_connect_errno()){
    die("Connection error: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO `User Info`(`firstName`, `lastName`, `email`, `notifications`, `school`, `industry`, `type`, `description`)
          VALUES (?,?,?,?,?,?,?,?)";

  $stmt = mysqli_stmt_init($conn);

  if(! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt,"ssssssss", $firstName, $lastName, $email, $notifications, $school, $industry, $type, $description);

mysqli_stmt_execute($stmt);

echo "Form submitted";

?>





