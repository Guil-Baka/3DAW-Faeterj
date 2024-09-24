<?php

// recebe o cpf do usuario que realizou a pergunta 
$cpf = $_POST['cpf'];
// recebe a pergunta
$pergunta = $_POST['pergunta'];
// recebe alternativas,  são 4 alternativas
$alternativa1 = $_POST['alternativa1'];
$alternativa2 = $_POST['alternativa2'];
$alternativa3 = $_POST['alternativa3'];
$alternativa4 = $_POST['alternativa4'];
// recebe a resposta correta
$resposta = $_POST['resposta'];

// arquivo terá a seguinte estrutura. 
// cpf;pergunta;alternativa1;alternativa2;alternativa3;alternativa4;resposta; . PHP_EOL
$pergunta = $cpf . ";" . $pergunta . ";" . $alternativa1 . ";" . $alternativa2 . ";" . $alternativa3 . ";" . $alternativa4 . ";" . $resposta . ";" . PHP_EOL;

// check if the file exists and create it if it doesn't
if (!file_exists('perguntas.txt')) {
  $file = fopen('perguntas.txt', 'w');
  fclose($file);
}

// append the new question to the file
$file = fopen('perguntas.txt', 'a');
fwrite($file, $pergunta);
fclose($file);
