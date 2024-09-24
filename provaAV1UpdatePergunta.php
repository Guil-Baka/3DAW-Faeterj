<?php
$oldPergunta = $_POST['oldPergunta'];
$pergunta = $_POST['pergunta'];
$alternativa1 = $_POST['alternativa1'];
$alternativa2 = $_POST['alternativa2'];
$alternativa3 = $_POST['alternativa3'];
$alternativa4 = $_POST['alternativa4'];
$resposta = $_POST['resposta'];

$perguntas = fopen("perguntas.txt", "r");
$temp = fopen("temp.txt", "w");

while (!feof($perguntas)) {
  $linha = fgets($perguntas);
  $dados = explode(";", $linha);
  if ($dados[1] == $oldPergunta) {
    $pergunta = $dados[0] . ";" . $pergunta . ";" . $alternativa1 . ";" . $alternativa2 . ";" . $alternativa3 . ";" . $alternativa4 . ";" . $resposta . ";" . PHP_EOL;
  }
  fwrite($temp, $linha);
}

fclose($perguntas);
fclose($temp);

unlink("perguntas.txt");

rename("temp.txt", "perguntas.txt");
