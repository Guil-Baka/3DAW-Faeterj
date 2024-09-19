<?php

$nome = $_POST["nome"];
$professor = $_POST["professor"];
$cargaHoraria = $_POST["cargaHoraria"];
$disciplina = $nome . ";" . $professor . ";" . $cargaHoraria . PHP_EOL;
// Use js alert to show all the data received
echo "<script>alert('$disciplina');</script>";


$file = fopen('disciplinas.txt', 'a');
fwrite($file, $disciplina);
fclose($file);
