<!DOCTYPE html>
<html lang="en">
<!-- Cadastro de alunos usando AJAX -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- import font -->
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
    integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls"
    crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>CadAlun</title>
  <script>
    function creatAjaxObject() {
      var ajax;
      if (window.XMLHttpRequest) {
        ajax = new XMLHttpRequest();
      } else {
        ajax = new ActiveXObject("Microsoft.XMLHTTP");
      }
      return ajax;
    }

    function ajaxPost(url, data, callback) {
      var ajax = creatAjaxObject();
      ajax.open("POST", url, true);
      ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
          callback(ajax.responseText);
        }
      }
      ajax.send(data);
    }

    function ajaxGet(url, callback) {
      var ajax = creatAjaxObject();
      ajax.open("GET", url, true);
      ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
          callback(ajax.responseText);
        }
      }
      ajax.send();
    }

    function getAlunos() {

    }

    function responseHandler(response) {
      // alert(response);
      // n to mandando responde de qualquer jeito então melhor deixar comentado
    }

    function postAluno() {
      var nome = document.getElementById("nome").value;
      var matricula = document.getElementById("matricula").value;
      var cpf = document.getElementById("cpf").value;
      var dtNasc = document.getElementById("dtNasc").value;
      var data = "nome=" + nome + "&matricula=" + matricula + "&cpf=" + cpf + "&dtNasc=" + dtNasc;
      ajaxPost("ex07IncludeAluno.php", data, responseHandler);
    }

    function postNameAluno(nome) {
      var data = "nome=" + nome;
      ajaxPost("ex07ExcludeAluno.php", data, responseHandler);
    }

    function postUpdateAluno(oldNome, oldMatricula, oldCpf, oldDtNasc) {
      var newNome = document.getElementById("nome").value;
      var newMatricula = document.getElementById("matricula").value;
      var newCpf = document.getElementById("cpf").value;
      var newDtNasc = document.getElementById("dtNasc").value;
      var data = "nome=" + oldNome + "&matricula=" + oldMatricula + "&cpf=" + oldCpf + "&dtNasc=" + oldDtNasc + "&newNome=" + newNome + "&newMatricula=" + newMatricula + "&newCpf=" + newCpf + "&newDtNasc=" + newDtNasc;
      ajaxPost("ex07UpdateAluno.php", data, responseHandler);
      // change the button back to Cadastrar after updating the aluno
      document.getElementById("formButton").innerHTML = "Cadastrar";

    }

    function changeButtonToUpdate() {
      var buttons = document.getElementsByTagName("button");
      for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].id.startsWith("update")) {
          buttons[i].onclick = function() {
            var searchPosition = this.id.replace("update", "");
            var entry = getTableEntry(searchPosition);
            // fill the form with the data from the table
            document.getElementById("nome").value = entry.nome;
            document.getElementById("matricula").value = entry.matricula;
            document.getElementById("cpf").value = entry.cpf;
            //remove last character from the date
            entry.dtNasc = entry.dtNasc.slice(0, -1);
            document.getElementById("dtNasc").value = entry.dtNasc;
            // change the button to update the aluno
            document.getElementById("formButton").innerHTML = '<i class="bi bi-arrow-clockwise"></i> Update';
            document.getElementById("formButton").onclick = function() {
              postUpdateAluno(entry.nome, entry.matricula, entry.cpf, entry.dtNasc);
            }
          }
        }
      }
    }

    function handleDeleteAluno() {
      // get the id of the button that was clicked
      var buttons = document.getElementsByTagName("button");
      for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].id.startsWith("delete")) {
          buttons[i].onclick = function() {
            var searchPosition = this.id.replace("delete", "");
            var nome = getTableInfo(searchPosition);
            postNameAluno(nome);
          }
        }
      }
    }

    function getTableInfo(searchPosition) {
      // get the name of the aluno in the same line as the button
      var table = document.getElementsByTagName("table")[0];
      var row = table.rows[searchPosition];
      var nome = row.cells[1].innerHTML;
      return nome;
    }

    function getTableEntry(searchPosition) {
      // get usable data from the table
      var table = document.getElementsByTagName("table")[0];
      var row = table.rows[searchPosition];
      var entry = {
        nome: row.cells[1].innerHTML,
        matricula: row.cells[2].innerHTML,
        cpf: row.cells[3].innerHTML,
        dtNasc: row.cells[4].innerHTML
      }
      return entry;
    }

    function changeButtons() {
      // change the onclick event of the buttons to call handleDeleteAluno
      handleDeleteAluno();
      changeButtonToUpdate();
    }

    function dynamicSearch() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("singleSearchOnchange");
      filter = input.value.toUpperCase();
      table = document.getElementsByTagName("table")[0];
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
  <style>
    body {
      background-color: #1c1c1c;
      font-family: JetBrains Mono;
      color: white;
    }

    /* change button that has name delete */
    button[id^="delete"] {
      color: red;
      border: none;
      background-color: transparent;
    }

    /* change button that has name update */
    button[id^="update"] {
      color: greenyellow;
      border: none;
      background-color: transparent;
    }

    .tableDiv {
      display: flex;
      flex-flow: column wrap;
      justify-content: center;
      margin-top: 20px;
      background-color: #2c2c2c;
      padding: 25px;
      padding-top: 10px;
      border-radius: 25px;
    }

    .searchField {
      margin: auto;
      margin-top: 5px;
      margin-bottom: 10px;
      border-radius: 10px;
      border: none;
      max-width: 300px;
      padding: 5px;
    }

    .mainDiv {
      display: flex;
      flex-flow: column wrap;
      justify-content: center;
      align-items: center;
    }

    .formDiv {
      display: flex;
      flex-flow: column wrap;
      justify-content: center;
      align-items: center;
      background-color: #2c2c2c;
      padding: 25px;
      border-radius: 25px;

    }

    .outlineButton {
      border: 1px solid white;
      border-radius: 10px;
      padding: 5px;
      background-color: transparent;
      color: white;
    }

    .outlineButton:hover {
      background-color: white;
      color: black;
    }
  </style>
</head>

<body onload="changeButtons()">

  <div class="mainDiv">
    <form class="formDiv" id="cadAlun" action="">
      <legend>Cadastro de Alunos</legend>
      <label for="nome">Nome:</label>
      <input class="searchField" type="text" id="nome" name="nome" required>
      <label for="matricula">Matrícula:</label>
      <input class="searchField" type="text" id="matricula" name="matricula" required>
      <label for="cpf">CPF:</label>
      <input class="searchField" type="text" id="cpf" name="cpf" required>
      <label for="dtNasc">Data de Nascimento:</label>
      <input class="searchField" type="date" id="dtNasc" name="dtNasc" required>
      <button class="outlineButton" type="submit" id="formButton" onclick="event.preventDefault(); postAluno();">
        <i class="bi bi-check-all"></i>
        Cadastrar</button>
    </form>

    <!-- table to show aluno -->
    <div class="tableDiv">
      <table class="pure-table pure-table-horizontal">
        <thead>
          <tr>
            <th>Posição</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Actions</th>
          </tr>
          <!-- for each aluno in the txt file, print on the table -->
          <?php
          $file = fopen('alunos.txt', 'r');
          $i = 1;
          // count the number of lines in the file before printing the table
          $lines = count(file('alunos.txt'));
          // instead of printing until feof, print until the number of lines in the file is reached
          while ($i <= $lines) {
            $line = fgets($file);
            $data = explode(';', $line);
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $data[0] . "</td>";
            echo "<td>" . $data[1] . "</td>";
            echo "<td>" . $data[2] . "</td>";
            echo "<td>" . $data[3] . "</td>";
            echo "<td>
            <button id='delete" . $i . "'>
            <i class='bi bi-person-fill-x'></i>
            </button>
            <button id='update" . $i . "'>
            <i class='bi bi-person-lines-fill'></i>
            </button>
          </td>";
            echo "</tr>";
            $i++;
          }
          fclose($file);
          ?>
        </thead>
        <!-- add text field input -->
        <form action="">
          <input placeholder="Buscar" class="searchField" type="text" id="singleSearchOnchange" oninput="dynamicSearch()">
        </form>
      </table>
    </div>

  </div>
</body>

</html>