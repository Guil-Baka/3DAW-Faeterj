<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome'];
  $professor = $_POST['professor'];
  $cargaHoraria = $_POST['cargaHoraria'];

  $file = fopen('disciplinas.txt', 'a');
  fwrite($file, $nome . ';' . $professor . ';' . $cargaHoraria . PHP_EOL);
  fclose($file);
}

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

  <title>Document</title>
  <style>
    body {
      background-color: #BCC1BA;
      font-family: JetBrains Mono;
    }

    .tableDiv {
      background-color: #9FB7B9;
      padding: 2%;
      margin: auto;
      margin-top: 5%;
      border: 1px solid black;
      border-radius: 20px;
      margin-bottom: 5%;
      height: fit-content;
    }

    .formDiv {
      background-color: #9FB7B9;
      padding: 2%;
      margin: auto;
      margin-top: 5%;
      border: 1px solid black;
      border-radius: 20px;
      margin-bottom: 5%;
      display: flex;
      flex-flow: column wrap;
      height: fit-content;
    }

    .mainDiv {
      margin: auto;
      display: flex;
      flex-flow: row wrap;
    }

    .inputAdjust {
      margin-top: 1%;
      margin-bottom: 1%;
      align-self: flex-start;
    }

    .formAdjust {
      display: flex;
      flex-flow: column wrap;
    }

    .buttonAdjust {
      margin-top: 10%;
      margin-bottom: 1%;
      align-self: stretch;
    }
  </style>
</head>

<body>
  <!-- table to show what is in the disciplinas.txt -->
  <div class="mainDiv">
    <div class="formDiv">
      <p>Cadastrar Disciplina</p>
      <form class="formAdjust pure-form" action="exercicio4ListarIncluirDisciplina.php" method="POST" style="font-family: JetBrains Mono;">
        <input class="inputAdjust" type="text" name="nome" id="nome" placeholder="Nome" required>
        <input class="inputAdjust" type="text" name="professor" id="professor" placeholder="Professor" required>
        <input class="inputAdjust" type="number" name="cargaHoraria" id="cargaHoraria" placeholder="Carga Horaria" required>
        <button type="submit" class="pure-button pure-button-primary buttonAdjust">Cadastrar</button>
      </form>
    </div>
    <div class="tableDiv">
      <h2 style="font-family: JetBrains Mono;">Disciplinas</h2>
      <?php
      // I will open the file in read mode
      $file = fopen('disciplinas.txt', 'r');
      // I will read the file line by line
      echo ' <table class="pure-table pure-table-bordered">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Professor</th>
          <th>Carga Horária</th>
        </tr>
      </thead>
      <tbody>';
      // I will check if the line is empty 

      while (!feof($file)) {
        $line = fgets($file);
        $data = explode(';', $line);


        if ($data[0] != '') {
          echo '<tr>';
          echo '<td>' . $data[0] . '</td>';
          echo '<td>' . $data[1] . '</td>';
          echo '<td>' . $data[2] . '</td>';
          echo '</tr>';
        }
      }
      echo '</tbody></table>';
      // I will close the file 
      fclose($file);


      ?>
    </div>

</body>

</html>