<?php
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <H1> Envie sua mensagem </H1>
  <div style="display: flex; flex-direction: column;">
    <form style="display: flex; flex-direction: column; padding: 2%;" action="index.php" method="POST">
      <label for="name">Nome</label>
      <input type="text" name="name" id="name" placeholder="Digite seu Nome" required>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Digite seu Email" required>
      <label for="message">Mensagem</label>
      <textarea name="message" id="message" cols="30" rows="10" placeholder="Digite sua Mensagem" required></textarea>
      <button type="submit">Enviar</button>
    </form>
    <p> <?php echo $returnMessage ?> </p>
  </div>

</body>

</html>