<!--  require  -->
<?php
include("functions/js/navigateToTab.js");
require("functions/postToFile.php");
?>

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

  <div class="tabs">
    <button class="tabButton" onclick="">Enviar</button>
    <button class="tabButton" onclick="">Ver Mensagens</button>
    <button class="tabButton" onclick="">Excluir Mensagens</button>
    <button class="tabButton" onclick="">Editar Mensagens</button>
  </div>

  <div id="send" class="sendTab">
    <p>Enviar Mensagem</p>
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" placeholder="Digite seu Nome" required>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Digite seu Email" required>
    <label for="message">Mensagem</label>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="Digite sua Mensagem" required></textarea>
    <button onclick="<?php $aviso = postToFile($_POST['name'], $_POST['email'], $_POST['message']); ?>" type="submit">Enviar</button>
  </div>

  <div id="read" class="readTab">
    <p>Ver Mensagens</p>
    <?php readFileContents(); ?>
  </div>

  <div id="delete" class="deleteTab">
    <p>Excluir Mensagens</p>
    <button onclick="<?php deleteFileContents(); ?>" type="submit">Excluir</button>
  </div>

  <div id="edit" class="editTab">
    <p>Editar Mensagens</p>
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" placeholder="Digite seu Nome" required>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Digite seu Email" required>
    <label for="message">Mensagem</label>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="Digite sua Mensagem" required></textarea>
    <button onclick="<?php editFileContents($_POST['name'], $_POST['email'], $_POST['message']); ?>" type="submit">Editar</button>
  </div>

  <div class="aviso">
    <p> <?php echo $aviso ?> </p>
  </div>
</body>

</html>