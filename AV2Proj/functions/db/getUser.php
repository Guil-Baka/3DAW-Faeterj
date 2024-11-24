<?php
include 'dbCon.php';
// get user by email and password
$email = $_GET['email'];
$password = $_GET['password'];

// check if email and password are empty
if (empty($email) || empty($password)) {
  header('HTTP/1.1 418 I\'m a teapot');
  echo "Email and password are required";
} else {
  // call connection to db
  $db = dbCon();

  $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $stmt = $db->query($query);

  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  class User
  {
    public $email;
    public $password;
  }

  // return user object populated with email and password
  $user = new User();
  $user->email = $users[0]['email'];
  $user->password = $users[0]['password'];

  // return user object

  header('HTTP/1.1 200 OK');
  echo json_encode($user);
}
