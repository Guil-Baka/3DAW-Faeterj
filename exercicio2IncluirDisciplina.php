<?php
require_once 'funcExercicio2/IncluirDisciplina.php';
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
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
  </style>
</head>

<body>
  <form class="pure-form" action="funcExercicio2/IncluirDisciplina.php" method="POST" style="font-family: JetBrains Mono;">
    <fieldset>
      <legend>Incluir Disciplina</legend>
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" required>
      <label for="professor">Professor:</label>
      <input type="text" name="professor" id="professor" required>
      <label for="cargaHoraria">Carga Horária:</label>
      <input type="number" name="cargaHoraria" id="cargaHoraria" required>
      <button type="submit" class="pure-button pure-button-primary">Cadastrar</button>
    </fieldset>
  </form>

  <div>
    <h2>Disciplinas</h2>
    <table class="pure-table pure-table-bordered">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Professor</th>
          <th>Carga Horária</th>
        </tr>
      </thead>
      <tbody>
        <?php

        ?>
      </tbody>
    </table>
  </div>

</body>

</html>