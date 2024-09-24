<?php
$pergunta = $_POST['pergunta'];

// search the file if pergunta matches thats enough to exclude
$perguntas = fopen("perguntas.txt", "r");
$temp = fopen("temp.txt", "w");

while (!feof($perguntas)) {
  $linha = fgets($perguntas);
  $dados = explode(";", $linha);
  if ($dados[1] == $pergunta) {
    continue;
  }
  fwrite($temp, $linha);
}

// close the files
fclose($perguntas);
fclose($temp);

// delete the original file
unlink("perguntas.txt");
// rename the temporary file to the original name
rename("temp.txt", "perguntas.txt");
