<?php
function calculateTwoNumbers()
{
  $result = "Não foi possível calcular";
  $N1 = $_GET['number1'];
  $N2 = $_GET['number2'];
  $operation = $_GET['operation'];

  if ($operation == "add") {
    $result = $N1 + $N2;
  } elseif ($operation == "subtract") {
    $result = $N1 - $N2;
  } elseif ($operation == "multiply") {
    $result = $N1 * $N2;
  } elseif ($operation == "divide") {
    $result = divisao($N1, $N2);
  } elseif ($operation == "pow") {
    $result = pow($N1, $N2);
  }

  echo "<script>console.log('Resultado: $result');</script>";
  echo "<h1>Resultado: $result</h1>";
}

function singleNumberOperation()
{
  $result = "Não foi possível calcular";
  $N1 = $_GET['number1'];
  $operation = $_GET['operation'];

  if ($operation == "sqrt") {
    $result = sqrt($N1);
  } elseif ($operation == "signal") {
    $result = $N1 * -1;
  } elseif ($operation == "percent") {
    $result = $N1 / 100;
  } elseif ($operation == "divOneByX") {
    $result = 1 / $N1;
  } elseif ($operation == "sen") {
    $result = sin($N1);
  } elseif ($operation == "cos") {
    $result = cos($N1);
  } elseif ($operation == "tan") {
    $result = tan($N1);
  }
  echo "<script>console.log('Resultado: $result');</script>";
  echo "<h1>Resultado: $result</h1>";
}

function divisao($N1, $N2)
{
  if ($N2 == 0) {
    return "Não é possível dividir por 0";
  } else {
    return $N1 / $N2;
  }
}
