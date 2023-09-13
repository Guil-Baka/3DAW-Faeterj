<!--  require  -->
<?php require_once("functions/postToFile.php"); ?>
<!--  require  -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- reload page  -->
  <meta http-equiv="refresh" content="5">
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
      <button onclick="<?php $aviso = postToFile($_POST['name'], $_POST['email'], $_POST['message']); ?>" type="submit">Enviar</button>
      <!--  call post to file and send as props whats in the html fields -->
    </form>
    <p> <?php echo $aviso ?> </p>
  </div>

</body>

</html>