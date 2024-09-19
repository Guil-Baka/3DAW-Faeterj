<!DOCTYPE html>
<html lang="en">

<head>
  <script>
    function creatAjaxObject() {
      if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
      } else if (window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
      }
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

    function responseHandler(response) {
      alert(response);
    }

    function postDisciplina() {
      var nome = document.getElementById("nome").value;
      var professor = document.getElementById("professor").value;
      var cargaHoraria = document.getElementById("cargaHoraria").value;
      var data = "nome=" + nome + "&professor=" + professor + "&cargaHoraria=" + cargaHoraria;
      ajaxPost("ex05IncludeDisciplina.php", data, responseHandler);
    }

    function postNameDisciplina() {
      var nome = document.getElementById("nome").value;
      var data = "nome=" + nome;
      ajaxPost("ex05ExcludeDisciplina.php", data, responseHandler);
    }

    function deleteDisciplina(nome) {
      var nome = document.getElementById("nome").value;
      // we only need the name to delete the line
      postNameDisciplina(nome);
    }

    function deleteDisciplinaButton() {
      //if a buttons id starts with delete, we know it is a delete button, so change the onclick event to call deleteDisciplina
      var buttons = document.getElementsByTagName("button");
      for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].id.startsWith("delete")) {
          buttons[i].onclick = function() {
            var searchPosition = this.id.replace("delete", "");
            var nome = getTableInfo(searchPosition);
            alert(nome + " " + searchPosition);
            deleteDisciplina(getTableInfo(searchPosition));
          }
        }
      }
    }

    function getTableInfo(searchPosition) {
      // get the first item on a row, which is the name of the disciplina
      var nome = document.getElementById("delete" + searchPosition).parentNode.parentNode.children[0].innerText;
      // alert(nome);
      return nome;
    }
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
    integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls"
    crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
  <title>CRUD</title>
  <style>
    body {
      background-color: #1c1c1c;
      font-family: JetBrains Mono;
      color: white;
    }

    #delete2 {
      background-color: red;
    }

    #delete1 {
      background-color: red;
    }
  </style>
</head>

<body onload="deleteDisciplinaButton()">
  <div>
    <form id="cadastro">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome">
      <label for="professor">Professor:</label>
      <input type="text" name="professor" id="professor">
      <label for="cargaHoraria">Carga Horária:</label>
      <input type="number" name="cargaHoraria" id="cargaHoraria">
      <!-- button to call postDisciplina, it should pass whatever is written in the input fields. -->
      <button type="submit" onclick="
        postDisciplina();
      ">
        Enviar
      </button>
    </form>

    <div>
      <table>
        <th>
        <td>Nome</td>
        <td>Professor</td>
        <td>Carga Horária</td>
        </th>
        <?php
        $file = fopen('disciplinas.txt', 'r');
        $i = 1;
        while (!feof($file)) {
          $line = fgets($file);
          $data = explode(';', $line);
          echo "<tr>";
          echo "<td>" . $data[0] . "</td>";
          echo "<td>" . $data[1] . "</td>";
          echo "<td>" . $data[2] . "</td>";
          echo "<td>
            <button id='delete" . $i . "'>Delete" . $i . "</button>          
          </td>";
          echo "</tr>";
          $i++;
        }
        fclose($file);
        ?>
      </table>
    </div>
  </div>
</body>

</html>