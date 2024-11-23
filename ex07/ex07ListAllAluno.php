<?php
// Read the file, line by line, and in the end return the data in a json format
$alunos = fopen("alunos.txt", "r");
$alunosArray = array();

while (!feof($alunos)) {
  $linha = fgets($alunos);
  $dados = explode(";", $linha);
  $aluno = array(
    "nome" => $dados[0],
    "matricula" => $dados[1],
    "cpf" => $dados[2],
    "dtNasc" => $dados[3]
  );
  array_push($alunosArray, $aluno);
}
fclose($alunos);
