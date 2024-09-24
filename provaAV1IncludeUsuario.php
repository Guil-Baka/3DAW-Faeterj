<?php
// recebe via post os dados de usuario, escreve num arquivo usando ; como separador

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];

$usuario = $nome . ";" . $senha . ";" . $email . ";" . $cpf . ";" . PHP_EOL;

// Use js alert to show all the data received
// echo "<script>alert('$aluno');</script>";

// check if the file exists and create it if it doesn't
if (!file_exists('usuarios.txt')) {
  $file = fopen('usuarios.txt', 'w');
  fclose($file);
}

// append the new student to the file
$file = fopen('usuarios.txt', 'a');
fwrite($file, $usuario);
fclose($file);
