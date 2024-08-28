<?php
// I will receive the data from the form in exercicio2IncluirDisciplina.php
// and insert it into a txt file
// the exercicio2IncluirDisciplina.php will use POST method to send the data
// I will use the $_POST to receive the data

// if method is POST
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
return "Disciplina incluída com sucesso!";
