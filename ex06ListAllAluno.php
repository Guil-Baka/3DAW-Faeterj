<?php

// read each aluno in the file and put it in an array, then return the array
function listAllAlunos()
{
  $alunos = fopen("alunos.txt", "r");
  $alunosArray = [];
  while (!feof($alunos)) {
    $line = fgets($alunos);
    $data = explode(';', $line);
    $aluno = [
      'nome' => $data[0],
      'matricula' => $data[1],
      'cpf' => $data[2],
      'dtNasc' => $data[3]
    ];
    array_push($alunosArray, $aluno);
  }
  fclose($alunos);
  return $alunosArray;
}
