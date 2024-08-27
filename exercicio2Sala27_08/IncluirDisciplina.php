<?php
// $msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome'];
  $professor = $_POST['professor'];
  $cargaHoraria = $_POST['cargaHoraria'];

  // write to file
  $file = fopen('disciplinas.txt', 'a');
  // append to file
  fwrite($file, $nome . ';' . $professor . ';' . $cargaHoraria . PHP_EOL);
  fclose($file);
}
