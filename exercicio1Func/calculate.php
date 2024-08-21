<?php
function calculateTwoNumbers($operation)
{
  $result = 0;
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
  }

  return $result;
}

function divisao($N1, $N2)
{
  if ($N2 == 0) {
    return "Não é possível dividir por 0";
  } else {
    return $N1 / $N2;
  }
}
