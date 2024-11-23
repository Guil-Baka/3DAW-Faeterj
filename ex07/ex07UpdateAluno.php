<?php
// recebe os dados do crudaluno via POST
$oldNome = $_POST['nome'];
$oldMatricula = $_POST['matricula'];
$oldCpf = $_POST['cpf'];
$oldDtNasc = $_POST['dtNasc'];
$newNome = $_POST['newNome'];
$newMatricula = $_POST['newMatricula'];
$newCpf = $_POST['newCpf'];
$newDtNasc = $_POST['newDtNasc'];

// Use js alert to show all the data received
// echo "<script>alert('$oldNome $oldMatricula $oldCpf $oldDtNasc $newNome $newMatricula $newCpf $newDtNasc');</script>";

// abre o arquivo de texto em lê linha por linha e colocando em um outro arquivo temporário
$alunos = fopen("alunos.txt", "r");
$temp = fopen("temp.txt", "w");

// se ele achar o aluno, ele não escreve no arquivo temporário, substituindo os dados antigos pelos novos
while (!feof($alunos)) {
  $linha = fgets($alunos);
  $dados = explode(";", $linha);
  if ($dados[0] == $oldNome && $dados[1] == $oldMatricula && $dados[2] == $oldCpf && $dados[3]) {
    $linha = $newNome . ";" . $newMatricula . ";" . $newCpf . ";" . $newDtNasc . PHP_EOL;
    // echo "<script>alert('$linha');</script>";
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
