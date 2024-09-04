<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome'];
  $professor = $_POST['professor'];
  $cargaHoraria = $_POST['cargaHoraria'];

  // I will open the file in append mode
  $file = fopen('disciplinas.txt', 'a');

  // I will write the data in the file
  fwrite($file, "$nome" . ';' . "$professor" . ';' . "$cargaHoraria" . PHP_EOL);

  // I will close the file
  fclose($file);
}
