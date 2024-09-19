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

    function responseHandler(response) {
      alert(response);
    }

    function postAluno() {
      var nome = document.getElementById("nome").value;
      var matricula = document.getElementById("matricula").value;
      var cpf = document.getElementById("cpf").value;
      var dtNasc = document.getElementById("dtNasc").value;
      var data = "nome=" + nome + "&matricula=" + matricula + "&cpf=" + cpf + "&dtNasc=" + dtNasc;
      alert(data);
      ajaxPost("ex06IncludeAluno.php", data, responseHandler);
    }
  </script>
  <style>
    body {
      background-color: #1c1c1c;
      font-family: JetBrains Mono;
      color: white;
    }
  </style>
</head>

<body>

  <div>
    <form id="cadAlun" action="">
      <legend>Cadastro de Alunos</legend>
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>
      <label for="matricula">Matrícula:</label>
      <input type="text" id="matricula" name="matricula" required>
      <label for="cpf">CPF:</label>
      <input type="text" id="cpf" name="cpf" required>
      <label for="dtNasc">Data de Nascimento:</label>
      <input type="date" id="dtNasc" name="dtNasc" required>
      <button type="submit" onclick="event.preventDefault(); postAluno();">Cadastrar</button>
    </form>
  </div>
</body>

</html>