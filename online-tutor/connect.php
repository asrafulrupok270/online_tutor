<?php
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$conn = new mysqli('localhost', 'root', '', 'data');
if ($conn->connect_errno) {
  die('No connect! ' . $conn->connect_errno);
} else {
  $stmt = $conn->prepare("insert into online_data(name,address,email,password)values(?,?,?,?)");
  $stmt->bind_param("ssss", $name, $address, $email, $password);
  $stmt->execute();

  header('location:index.html');
  echo "Your registration done!";
  $stmt->close();
  $conn->close();
}