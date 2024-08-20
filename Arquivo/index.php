<!--  require  -->
<?php
include("functions/js/navigateToTab.js");
require("functions/postToFile.php");
?>
<!--  require  -->

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
  integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls"
  crossorigin="anonymous">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- reload page  -->
  <!-- <meta http-equiv="refresh" content="60"> -->
</head>

<body style="background-color: #2E073F; color: #EBD3F8;">
  <!-- send message -->
  <div id="send" class="pure-g" style="padding: 5%;">
    <div class="pure-u-1-3">
      <form action="" class="pure-form" method="post">
        <fieldset>
          <input style="margin-bottom: 2%;" type="text" name="name" id="name" placeholder="Nome" required>
          <input style="margin-bottom: 2%;" type="email" name="email" id="email" placeholder="Email" required>
          <textarea name="message" id="message" cols="30" rows="10" placeholder="Mensagem" required></textarea>
          <!-- <input type="submit" value="Enviar"> -->
          <button class="pure-button pure-button-primary" type="submit" style="margin: 5;">Enviar</button>
        </fieldset>
      </form>
    </div>
    <!-- check if forms are empty -->
    <div class="pure-u-1-3">
      <?php
      if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        $aviso = postToFile($_POST['name'], $_POST['email'], $_POST['message']);
      } else {
        $aviso = "Please fill in all the form fields.";
      }
      ?>
    </div>
  </div>

  <!-- read the file line by line  -->
  <?php function readFileContents2()
  {
    $file = fopen("arquivo.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
      echo fgets($file) . "<br>";
      echo "!!!!!!!!";
      echo "<br>";
    }
    fclose($file);
  }
  ?>

  <div>
    <?php
    readFileContents2();
    ?>
  </div>

  <div class="aviso"">
    <p> <?php echo $aviso ?> </p>
  </div>
</body>

</html>