<?php
function postToFile($name, $email, $message)
{
  $returnMessage = "";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $arquivo = fopen("arquivo.txt", "a") or die("Não foi possível abrir o arquivo");
    $linhaArquivo = "nome / email / mensagem \n";
    $linhaArquivo = $name . " /// " . $email . " /// " . $message . "\n";

    fwrite($arquivo, $linhaArquivo);
    fclose($arquivo);

    $returnMessage = "Mensagem enviada com sucesso!";

    return $returnMessage;
  }
}

function readFileContents()
{
  $arquivo = fopen("arquivo.txt", "r") or die("Não foi possível abrir o arquivo");
  $linhaArquivo = fgets($arquivo);
  while (!feof($arquivo)) {
    echo $linhaArquivo;
    $linhaArquivo = fgets($arquivo);
  }
  fclose($arquivo);
}

function deleteFileContents()
{
  $arquivo = fopen("arquivo.txt", "w") or die("Não foi possível abrir o arquivo");
  $linhaArquivo = "";
  fwrite($arquivo, $linhaArquivo);
  fclose($arquivo);
}

function editFileContents($name, $email, $message)
{
  $arquivo = fopen("arquivo.txt", "a") or die("Não foi possível abrir o arquivo");
  $linhaArquivo = "nome / email / mensagem \n";
  $linhaArquivo = $name . " /// " . $email . " /// " . $message . "\n";

  fwrite($arquivo, $linhaArquivo);
  fclose($arquivo);
}
