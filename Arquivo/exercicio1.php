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

  <title>Exerc1</title>
</head>

<body>
  <form action="" class="pure-form">
    <fieldset>
      <input type="number" name="number1" id="number1" placeholder="Number 1" required>
      <input type="number" name="number2" id="number2" placeholder="Number 2" required>
      <select name="operation" id="operation">
        <option value="add">Add</option>
        <option value="subtract">Subtract</option>
        <option value="multiply">Multiply</option>
        <option value="divide">Divide</option>
      </select>
      <button class="pure-button pure-button-primary" type="submit" style="margin: 5;">Calculate</button>
      <!-- print on console -->
      <?php
      if (!empty($_GET['number1']) && !empty($_GET['number2']) && !empty($_GET['operation'])) {
        $result = calculateTwoNumbers($_GET['number1'], $_GET['number2'], $_GET['operation']);
        echo "<script>console.log('Result: $result');</script>";
      } else {
        echo "<script>console.log('Please fill in all the form fields.');</script>";
      }
      ?>
      <!-- show result on page -->
      <?php
      if (!empty($_GET['number1']) && !empty($_GET['number2']) && !empty($_GET['operation'])) {
        $result = calculateTwoNumbers($_GET['number1'], $_GET['number2'], $_GET['operation']);
        echo "<p>Result: $result</p>";
      } else {
        echo "<p>Please fill in all the form fields.</p>";
      }
      ?>
    </fieldset>
  </form>

</body>

</html>