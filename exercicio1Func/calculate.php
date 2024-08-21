<?php
function calculateTwoNumbers($number1, $number2, $operation)
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
    // catch division by zero error using try-catch
    try {
      $result = $N1 / $N2;
    } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    // $result = $N1 / $N2;
  }

  return $result;
}
