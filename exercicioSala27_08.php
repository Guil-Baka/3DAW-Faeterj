<?php
include("exercicioSala27_08/calculate.php");
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
  <style>
    body {
      background-color: #F5EDED;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
  </style>
</head>

<body>
  <form action="" class="pure-form" style="background-color: #E2DAD6;  margin: auto; margin-top: 10%; min-width: 390px; max-width: 75%; border-radius: 25px; ">
    <fieldset style="margin: auto; padding: 5%; display: flex; flex-direction: column; flex-wrap: wrap; min-width: 5%;">
      <p style="color: #6482AD; letter-spacing: -2px; font-size: 2rem; font-family: JetBrains Mono  ; ">Calculadora</p>
      <input style="font-family: JetBrains Mono; min-width: 0px;" type="number" name="number1" id="number1" placeholder="Número 1" required>
      <select style="margin-bottom: 2%; margin-top: 2%;" name="operation" id="operation">
        <option value="add">Soma</option>
        <option value="subtract">Subtrair</option>
        <option value="multiply">Multiplicar</option>
        <option value="divide">Dividir</option>
        <option value="pow">Potência</option>
        <option value="sqrt">Raiz Quadrada</option>
        <option value="signal">Inverter Sinal</option>
        <option value="percent">Porcentagem</option>
        <option value="divOneByX">1/x</option>
        <option value="sen">Sen</option>
        <option value="cos">Cos</option>
        <option value="tan">Tan</option>
      </select>
      <input style="font-family: JetBrains Mono; min-width: none;" type="number" name="number2" id="number2" placeholder="Número 2" required>
      <!-- when sqrt is selected hide the second input  -->
      <script>
        document.getElementById('operation').addEventListener('change', function() {
          if (this.value == 'sqrt') {
            document.getElementById('number2').style.display = 'none';
            // not required when sqrt is selected
            document.getElementById('number2').removeAttribute('required');
            // change number1 placeholder to 'Número'
            document.getElementById('number1').placeholder = 'Número';
          } else if (this.value == 'sen') {
            document.getElementById('number2').style.display = 'none';
            document.getElementById('number2').removeAttribute('required');
            document.getElementById('number1').placeholder = 'Número';
          } else if (this.value == 'cos') {
            document.getElementById('number2').style.display = 'none';
            document.getElementById('number2').removeAttribute('required');
            document.getElementById('number1').placeholder = 'Número';
          } else if (this.value == 'tan') {
            document.getElementById('number2').style.display = 'none';
            document.getElementById('number2').removeAttribute('required');
            document.getElementById('number1').placeholder = 'Número';
          } else if (this.value == 'percent') {
            document.getElementById('number2').style.display = 'none';
            document.getElementById('number2').removeAttribute('required');
            document.getElementById('number1').placeholder = 'Número';
          } else if (this.value == 'divOneByX') {
            document.getElementById('number2').style.display = 'none';
            document.getElementById('number2').removeAttribute('required');
            document.getElementById('number1').placeholder = 'Número';
          } else if (this.value == 'signal') {
            document.getElementById('number2').style.display = 'none';
            document.getElementById('number2').removeAttribute('required');
            document.getElementById('number1').placeholder = 'Número';
          } else {
            document.getElementById('number2').style.display = 'block';
            document.getElementById('number2').setAttribute('required', 'required');
            document.getElementById('number1').placeholder = 'Número 1';
          }
        });
      </script>
      <button class="pure-button pure-button-primary" type="submit" style="font-family: JetBrains Mono; letter-spacing: -2px; margin-top: 5%; background-color: #7FA1C3;">Calcular</button>
      <p style="margin-top: 5%; font-family: JetBrains Mono; letter-spacing: -2px; color: #6482AD;">
        <?php
        if ($_GET['operation'] == 'sqrt' || $_GET['operation'] == 'sen' || $_GET['operation'] == 'cos' || $_GET['operation'] == 'tan' || $_GET['operation'] == 'percent' || $_GET['operation'] == 'divOneByX' || $_GET['operation'] == 'signal') {
          singleNumberOperation();
        } else {
          calculateTwoNumbers();
        }
        ?>

      </p>

    </fieldset>
  </form>

</body>

</html>