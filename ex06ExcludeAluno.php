<?php

// recebe os dados do aluno via POST
$nome = $_POST['nome'];

// abre o arquivo de texto em lê linha por linha e colocando em um outro arquivo temporário
$alunos = fopen("alunos.txt", "r");
$temp = fopen("temp.txt", "w");

// se ele achar o aluno, ele não escreve no arquivo temporário
while (!feof($alunos)) {
  $linha = fgets($alunos);
  $dados = explode(";", $linha);
  if ($dados[0] == $nome) {
    continue;
  }
  fwrite($temp, $linha);
}

// fecha os arquivos
fclose($alunos);
fclose($temp);

// deleta o arquivo original
unlink("alunos.txt");

// renomeia o arquivo temporário para o nome original
rename("temp.txt", "alunos.txt");

echo "Aluno deletado com sucesso!";
