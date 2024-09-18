<?php

$nome = $_POST["nome"];
echo $nome;
$professor = $_POST["professor"];
$cargaHoraria = $_POST["cargaHoraria"];
$disciplina = $nome . ";" . $professor . ";" . $cargaHoraria . PHP_EOL;

$file = fopen('disciplinas.txt', 'a');
fwrite($file, $disciplina);
fclose($file);
