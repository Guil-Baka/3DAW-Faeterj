<?php
$nome = $_POST["nome"];
$matricula = $_POST["matricula"];
$cpf = $_POST["cpf"];
$dtNasc = $_POST["dtNasc"];

$aluno = $nome . ";" . $matricula . ";" . $cpf . ";" . $dtNasc . PHP_EOL;

// Use js alert to show all the data received
// echo "<script>alert('$aluno');</script>";

// check if the file exists and create it if it doesn't
if (!file_exists('alunos.txt')) {
  $file = fopen('alunos.txt', 'w');
  fclose($file);
}

// append the new student to the file
$file = fopen('alunos.txt', 'a');
fwrite($file, $aluno);
fclose($file);
