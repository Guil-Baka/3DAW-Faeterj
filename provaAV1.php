<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
    integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls"
    crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

    function responseHandler(response) {
      // alert(response);
      // n to mandando responde de qualquer jeito então melhor deixar comentado
    }

    function postUsuario(nome, senha, email, cpf) {
      var data = "nome=" + nome + "&senha=" + senha + "&email=" + email + "&cpf=" + cpf;
      ajaxPost("provaAV1IncludeUsuario.php", data, responseHandler);
      // clear form fields
      document.getElementById('nome').value = "";
      document.getElementById('senha').value = "";
      document.getElementById('email').value = "";
      document.getElementById('cpf').value = "";
    }

    function postPergunta(cpf, pergunta, alternativa1, alternativa2, alternativa3, alternativa4, resposta) {
      var data = "cpf=" + cpf + "&pergunta=" + pergunta + "&alternativa1=" + alternativa1 + "&alternativa2=" + alternativa2 + "&alternativa3=" + alternativa3 + "&alternativa4=" + alternativa4 + "&resposta=" + resposta;
      ajaxPost("provaAV1IncludePergunta.php", data, responseHandler);
      // clear form fields
      document.getElementById('cpf').value = "";
      document.getElementById('pergunta').value = "";
      document.getElementById('alternativa1').value = "";
      document.getElementById('alternativa2').value = "";
      document.getElementById('alternativa3').value = "";
      document.getElementById('alternativa4').value = "";
      document.getElementById('resposta').value = "";
    }

    function getPerguntaEntry(searchPosition) {
      // get usable data from the table
      var table = document.getElementsByTagName("table")[1];
      var row = table.rows[searchPosition];
      var entry = {
        pergunta: row.cells[1].innerText,
        alternativa1: row.cells[2].innerText,
        alternativa2: row.cells[3].innerText,
        alternativa3: row.cells[4].innerText,
        alternativa4: row.cells[5].innerText,
        resposta: row.cells[6].innerText
      }
      return entry;
    }

    function getTableEntry(searchPosition) {
      // get usable data from the table
      var table = document.getElementsByTagName("table")[0];
      var row = table.rows[searchPosition];
      var entry = {
        nome: row.cells[1].innerText,
        senha: row.cells[2].innerText,
        email: row.cells[3].innerText,
        cpf: row.cells[4].innerText
      }
      return entry;
    }

    function postPerguntaString(pergunta) {
      var data = "pergunta=" + pergunta;
      ajaxPost("provaAV1ExcludePergunta.php", data, responseHandler);
    }

    function handleDeleteQuestion() {
      var buttons = document.getElementsByTagName("button");
      for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].id.includes('delete')) {
          buttons[i].onclick = function() {
            var searchPosition = this.id.replace('delete', '');
            var entry = getPerguntaEntry(searchPosition);
            postPerguntaString(entry.pergunta);
          }
        }
      }
    }

    function postUpdatePergunta(oldPergunta) {
      var pergunta = document.getElementById('pergunta').value;
      var alternativa1 = document.getElementById('alternativa1').value;
      var alternativa2 = document.getElementById('alternativa2').value;
      var alternativa3 = document.getElementById('alternativa3').value;
      var alternativa4 = document.getElementById('alternativa4').value;
      var resposta = document.getElementById('resposta').value;
      var data = "oldPergunta=" + oldPergunta + "&pergunta=" + pergunta + "&alternativa1=" + alternativa1 + "&alternativa2=" + alternativa2 + "&alternativa3=" + alternativa3 + "&alternativa4=" + alternativa4 + "&resposta=" + resposta;
      ajaxPost("provaAV1UpdatePergunta.php", data, responseHandler);

      //hide the button alterar
      document.getElementById('updateButton').style.display = 'none';
    }


    function handleUpdateQuestion() {
      var buttons = document.getElementsByTagName("button");
      for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].id.includes('update')) {
          buttons[i].onclick = function() {
            var searchPosition = this.id.replace('update', '');
            var entry = getPerguntaEntry(searchPosition);
            //fill the form with the data from the table
            document.getElementById('pergunta').value = entry.pergunta;
            document.getElementById('alternativa1').value = entry.alternativa1;
            document.getElementById('alternativa2').value = entry.alternativa2;
            document.getElementById('alternativa3').value = entry.alternativa3;
            document.getElementById('alternativa4').value = entry.alternativa4;
            document.getElementById('resposta').value = entry.resposta;
            // unhide the button 
            document.getElementById('updateButton').style.display = 'block';
            // set the onclick function to post the updated question
            document.getElementById('updateButton').onclick = function() {
              postUpdatePergunta(entry.pergunta);
            }
          }
        }
      }
    }

    // theres a button beside each user in the table, this function will get the user data
    // on the same line as the button and then use postPergunta using the cpf of the user
    function postPerguntaFromUser() {
      // every button has an id with the format 'question' + i, where i is the line number in the table
      var buttons = document.getElementsByTagName("button");
      for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].id.includes('question')) {
          buttons[i].onclick = function() {
            var searchPosition = this.id.replace('question', '');
            var entry = getTableEntry(searchPosition);
            //get the question data from the form
            var pergunta = document.getElementById('pergunta').value;
            var alternativa1 = document.getElementById('alternativa1').value;
            var alternativa2 = document.getElementById('alternativa2').value;
            var alternativa3 = document.getElementById('alternativa3').value;
            var alternativa4 = document.getElementById('alternativa4').value;
            var resposta = document.getElementById('resposta').value;
            postPergunta(entry.cpf, pergunta, alternativa1, alternativa2, alternativa3, alternativa4, resposta);
          }
        }
      }
    }

    function updateButtons() {
      postPerguntaFromUser();
      handleDeleteQuestion();
      handleUpdateQuestion();
    }
  </script>

</head>

<body onload="updateButtons()">
  <div>
    <form action="">
      <!-- Nome, senha, email, cpf -->
      <input type="text" id="nome" placeholder="Nome" required>
      <input type="password" id="senha" placeholder="Senha" required>
      <input type="email" id="email" placeholder="Email" required>
      <input type="text" id="cpf" placeholder="CPF" required>
      <button type="button" onclick="postUsuario(document.getElementById('nome').value, document.getElementById('senha').value, document.getElementById('email').value, document.getElementById('cpf').value)">Enviar</button>
    </form>
  </div>
  <div>
    <!-- tabela com nome, senha, email, cpf -->
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Senha</th>
          <th>Email</th>
          <th>CPF</th>
        </tr>
        <?php
        $file = fopen('usuarios.txt', 'r');
        $i = 1;
        // count the number of lines in the file before printing the table
        $lines = count(file('usuarios.txt'));
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
            <button id = 'question" . $i . "'>Pergunta</button>

          </td>";
          echo "</tr>";
          $i++;
        }
        fclose($file);
        ?>
      </thead>
    </table>
  </div>
  <div>
    <!-- Formulario inicialmente hidden -->
    <form action="" id="perguntaForm">
      <!-- aqui nos receberemos um cadastro de pergunta multipla escolha -->
      <input type="text" id="pergunta" placeholder="Pergunta">
      <input type="text" id="alternativa1" placeholder="Alternativa 1">
      <input type="text" id="alternativa2" placeholder="Alternativa 2">
      <input type="text" id="alternativa3" placeholder="Alternativa 3">
      <input type="text" id="alternativa4" placeholder="Alternativa 4">
      <input type="text" id="resposta" placeholder="Resposta">
      <button type="button" id="updateButton" style="display: none;">Alterar</button>
  </div>
  <div>
    <!-- listar as perguntas -->
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Pergunta</th>
          <th>Alternativa 1</th>
          <th>Alternativa 2</th>
          <th>Alternativa 3</th>
          <th>Alternativa 4</th>
          <th>Resposta</th>
        </tr>
        <?php
        $file = fopen('perguntas.txt', 'r');
        $i = 1;
        // count the number of lines in the file before printing the table
        $lines = count(file('perguntas.txt'));
        // instead of printing until feof, print until the number of lines in the file is reached
        while ($i <= $lines) {
          $line = fgets($file);
          $data = explode(';', $line);
          echo "<tr>";
          echo "<td>" . $i . "</td>";
          echo "<td>" . $data[1] . "</td>";
          echo "<td>" . $data[2] . "</td>";
          echo "<td>" . $data[3] . "</td>";
          echo "<td>" . $data[4] . "</td>";
          echo "<td>" . $data[5] . "</td>";
          echo "<td>" . $data[6] . "</td>";
          echo "</tr>";
          // add a button to delete the question
          echo "<td>
            <button id = 'delete" . $i . "'>Excluir</button>
            <button id = 'update" . $i . "'>Alterar</button>
          </td>";
          $i++;
        }
        fclose($file);
        ?>
      </thead>
  </div>
</body>

</html>