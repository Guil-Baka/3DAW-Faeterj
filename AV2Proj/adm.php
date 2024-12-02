<!DOCTYPE html>
<html lang="en">

<head>
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
    <!-- import script from /functions/js -->
    <script></script>

<title>Hostel Mediterrâneo</title>
</head>

<body class="body-dark" onload="getStoredSession()">
    <div class="header">
        <!-- get svg -->
        <div class="img-container">
        <img src="assets/svgs/Logo.svg" alt="">
        </div>
        <nav class="nav-container">
    </div>
    <script>
        function createRoom(roomNumber,numberOfBeds,roomName,descri,price){
            event.preventDefault();
            $.ajax({
        url: 'functions/db/postRoom.php',
        type: 'POST',
        data: {
            roomNumber: roomNumber,
            numberOfBeds: numberOfBeds,
            roomName: roomName,
            descri: descri,
            price: price
        },
        success(response){
            console.log(response);
        }
    });
        }
        
    function alterRoom(roomNumber,numberOfBeds,roomName,descri,price){
        event.preventDefault();
        $.ajax({
        url: 'functions/db/updateRoom.php',
        type: 'POST',
        data: {
            roomNumber: roomNumber,
            numberOfBeds: numberOfBeds,
            roomName: roomName,
            descri: descri,
            price: price
        },
        success(response){
            console.log(response);
        }
        
        });
        }

        function deleteRoom(roomNumber){
            event.preventDefault();
            $.ajax({
        url: 'functions/db/excludeRoom.php',
        type: 'POST',
        data: {
            roomNumber: roomNumber
        },
        success(response){
            console.log(response);
        }
    });
        }

    </script>

    <div class="div-generic">
        <form action="adm.php" method="post">
        <legend>Numero do quarto</legend>
        <input id="roomNumber" type="number"><br><br>
        
        <legend>Numero de camas</legend>
        <input id="numberOfBeds" type="number"><br><br>
        
        <legend>Nome do quarto</legend>
        <input id="roomName" type="text"><br><br>
    
        <legend>Descricao do quarto</legend>
        <input id="descri" type="text"><br><br>
        
        <legend>preco do quarto</legend>
        <input id="price" type="text"><br><br>
        
        <button id='criar' onclick="createRoom(document.getElementById('roomNumber').value, 
        document.getElementById('numberOfBeds').value,
        document.getElementById('roomName').value,
        document.getElementById('descri').value, 
        document.getElementById('price').value)">Criar quarto</button>
        <button id='alterar' onclick="alterRoom(document.getElementById('roomNumber').value, 
        document.getElementById('numberOfBeds').value,
        document.getElementById('roomName').value,
        document.getElementById('descri').value, 
        document.getElementById('price').value)">Alterar quarto</button>
        <button id='deletar' onclick="deleteRoom(document.getElementById('roomNumber').value)">Deletar quarto</button>
        </form>
    </div>
</body>

</html>