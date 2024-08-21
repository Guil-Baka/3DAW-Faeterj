<?php
include("exercicio1Func/calculate.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
    integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls"
    crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
  <title>Exerc1</title>
</head>

<body style="background-color: #F5EDED;">
  <form action="" class="pure-form" style="background-color: #E2DAD6;  margin: auto; margin-top: 10%; max-width: 75%; border-radius: 25px; ">

    <fieldset style="margin: auto; padding: 20%; display: flex; flex-direction: column; flex-wrap: wrap;">
      <p style="color: #6482AD; letter-spacing: -2px; font-size: 2rem; font-family: JetBrains Mono  ; ">Calculadora</p>
      <input type="number" name="number1" id="number1" placeholder="Numero 1" required>
      <select style="margin-bottom: 2%; margin-top: 2%;" name="operation" id="operation">
        <option value="add">Soma</option>
        <option value="subtract">Subtrair</option>
        <option value="multiply">Multiplicar</option>
        <option value="divide">Dividir</option>
      </select>
      <input type="number" name="number2" id="number2" placeholder="Numero 2" required>
      <button class="pure-button pure-button-primary" type="submit" style="font-family: JetBrains Mono; letter-spacing: -2px; margin-top: 5%; background-color: #7FA1C3;">Calcular</button>
      <?php
      if (!empty($_GET['number1']) && !empty($_GET['number2'])) {
        $result = calculateTwoNumbers($_GET['number1'], $_GET['number2'], $_GET['operation']);
      } else {
        // echo "<p style: color: black;>Preecha os campos.</p>";
      }
      ?>
      <p style="margin-top: 5%; font-family: JetBrains Mono; letter-spacing: -2px; color: #6482AD;">Resultado: <?php echo $result; ?></p>
      <!-- print on console -->
      <?php
      if (!empty($_GET['number1']) && !empty($_GET['number2'])) {
        $result = calculateTwoNumbers($_GET['number1'], $_GET['number2'], $_GET['operation']);
        echo "<script>console.log('Resultado: $result');</script>";
      } else {
        // echo "<script>console.log('Preencha os campos.');</script>";
      }
      ?>
    </fieldset>
  </form>

</body>

</html>