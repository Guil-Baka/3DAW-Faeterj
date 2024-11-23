<?php
require_once '../db/dbCon.php';
$email = $_POST['email'];
$password = $_POST['password'];

//PostgreSQL
//16.4

// connect to the database
$db = dbCon();

// check if user exists
$sql = "SELECT * FROM users WHERE email = :email";
$foundEmail = $db->prepare($sql);
$foundEmail->bindParam(':email', $email);
$foundEmail->execute();
$user = $foundEmail->fetch();


//i'm not using password_verify because i'm not hashing the password not a secure application but it's just a test
if ($user) {
  if ($user['password'] == $password) {
    session_start();
    $_SESSION['user'] = $user;
    header('Location: ../../index.php');
  } else {
    echo "Senha incorreta";
  }
} else {
  echo "Usuário não encontrado";
}
