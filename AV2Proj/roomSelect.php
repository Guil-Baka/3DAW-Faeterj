<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- import Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
    integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls"
    crossorigin="anonymous">
  <!-- import css -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="normalize.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <script> 
  function roomList() {
      $.ajax({
        url: 'functions/db/getRoomList.php',
        type: 'GET',
        success: function(rooms) {
          console.log(rooms);
          // 
          // Parses the rooms object from JSON format and sets the stored session with the rooms's listing.
          //  
          // @param {string} rooms - The rooms object in JSON format.
          //  
          rooms = JSON.parse(rooms);
        }
      });
      } 
      </script>
  <title>Listagem quartos</title>
</head>

<body onload="roomList()">
<div class="div-generic">
    <form action="roomSelect.php" method="POST">
      <legend>Selecione a Data Inicial</legend>
      <input type="date">
      <legend>Selecione a Data Final</legend>
      <input type="date">
      <button class="outline-confirm-button">Verificar Disponibilidade</button>

    </form>
    
  </div>


</body>

</html> 
