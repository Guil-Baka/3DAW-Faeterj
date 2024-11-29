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
    function roomListNonReserved(callback, startDate, endDate) {
      $.ajax({
        url: 'functions/db/returnRoomsNotReserved.php',
        type: 'GET',
        data: {
          startDate: document.getElementById('dateStart').value,
          endDate: document.getElementById('dateEnd').value
        },
        success: function(rooms) {
          console.log(rooms);
          const list = JSON.parse(rooms);
          if (callback) {
            callback(list);
          }
        }
      });
    }

    function handleNonReservedRoomList(rooms) {
      console.log(rooms);
      rooms.forEach(room => {
        var row = document.createElement('tr');
        row.innerHTML = `
          <td>${room.name}</td>
          <td>${room.description}</td>
          <td>${room.price}</td>
          <td>${room.num}</td>
          <td>${room.num_beds}</td>
        `;
        document.getElementById('roomList').appendChild(row);
      });
    }

    function roomList(callback) {
      $.ajax({
        url: 'functions/db/getRoomList.php',
        type: 'GET',
        success: function(rooms) {
          console.log(rooms);
          const list = JSON.parse(rooms);
          if (callback) {
            callback(list);
          }
          // o inferno que foi fazer isso jesus
        }
      });
    }

    /**
     * Handles the list of rooms and displays them in a table.
     *
     * @param {Array} rooms - The array of rooms to be displayed.
     */
    function handleRoomList(rooms) {
      console.log(rooms);
      let i = 0;
      rooms.forEach(room => {
        var row = document.createElement('tr');
        row.innerHTML = `
          <td>${room.name}</td>
          <td>${room.description}</td>
          <td>${room.price}</td>
          <td>${room.num}</td>
          <td>${room.num_beds}</td>
          <td><button id='reserve${i}' onclick='handlePostReservation(${i})'>Reservar</button></td>
        `;
        document.getElementById('roomList').appendChild(row);

        i++;
      });
    }

    function getStoredSession() {

      let email = localStorage.getItem('email');
      let expires = localStorage.getItem('expires');

      if (email && expires) {
        if (Date.now() > expires) {
          localStorage.removeItem('email');
          localStorage.removeItem('expires');
          return null;
        } else {
          console.log(email);
          return email;
        }
      } else {
        return null;
      }
    }

    /**
     * Retrieves the data from a specific row in the roomList table.
     *
     * @param {number} searchPosition - The position of the row to retrieve the data from.
     * @returns {object} - An object containing the data from the specified row.
     */
    function getTableEntry(searchPosition) {
      var table = document.getElementById('roomList');
      var row = table.rows[searchPosition];
      var entry = {
        name: row.cells[0].innerHTML,
        description: row.cells[1].innerHTML,
        price: row.cells[2].innerHTML,
        num: row.cells[3].innerHTML,
        num_beds: row.cells[4].innerHTML
      }
      console.log(entry);
      return entry;
    }

    function getTableEntryReservations(searchPosition) {
      var table = document.getElementById('reserveList');
      var row = table.rows[searchPosition];
      var entry = {
        room_name: row.cells[0].innerHTML,
        room_number: row.cells[1].innerHTML,
        start_date: row.cells[2].innerHTML,
        end_date: row.cells[3].innerHTML
      }
      console.log(entry);
      return entry;
    }

    function handleReserveCancelation(searchPosition) {
      table = getTableEntryReservations(searchPosition);
      console.log(table);
      $.ajax({
        url: 'functions/db/excludeReservation.php',
        type: 'POST',
        data: {
          roomNumber: table.room_number,
          userEmail: getStoredSession(),
          startDate: table.start_date,
          endDate: table.end_date
        },
        success: function(response) {
          console.log(response);
        }
      });
    }

    function handleUpdateButton(searchPosition) {
      //print the searchPosition
      console.log("HandleUpdateButton: " + searchPosition);
      // change the button with ID sendInfo innerhtml to "Alterar"
      document.getElementsByName('sendInfo').innerHTML = "Alterar";
      // change the button with ID sendInfo onclick to handleReserveUpdate
      document.getElementsByName('sendInfo').onclick = handleReserveUpdate(searchPosition);
    }

    function handleReserveUpdate(searchPosition) {
      table = getTableEntryReservations(searchPosition);
      console.log(table);
      $.ajax({
        url: 'functions/db/updateReservation.php',
        type: 'POST',
        data: {
          roomNumber: table.room_number,
          userEmail: getStoredSession(),
          oldStartDate: table.start_date,
          oldEndDate: table.end_date,
          startDate: document.getElementById('dateStart').value,
          endDate: document.getElementById('dateEnd').value
        },
        success: function(response) {
          console.log(response);
          // change the button with ID sendInfo innerhtml to "Verificar Disponibilidade"
          document.getElementsByName('sendInfo').innerHTML = "Verificar Disponibilidade";
          // change the button with ID sendInfo onclick to nothing
          document.getElementsByName('sendInfo').onclick = "";
        }
      });
    }

    function reservationList(callback) {
      $.ajax({
        url: 'functions/db/getReservation.php',
        type: 'GET',
        data: {
          userEmail: getStoredSession()
        },
        success: function(reservations) {
          console.log(reservations);
          const list = JSON.parse(reservations);
          if (callback) {
            callback(list);
          }
        }
      });
    }

    function handleReservationList(reservations) {
      console.log(reservations);
      let i = 0;
      reservations.forEach(reservation => {
        var row = document.createElement('tr');
        row.innerHTML = `
          <td>${reservation.room_name}</td>
          <td>${reservation.room_number}</td>
          <td>${reservation.start_date}</td>
          <td>${reservation.end_date}</td>
          <td><button id='cancel${i}' onClick='handleReserveCancelation(${i})' >Cancelar</button>
          <button id='update${i}' onClick='handleUpdateButton(${i})'>
          Alterar Data de Reserva
          </button></td>
        `;
        document.getElementById('reserveList').appendChild(row);
        i++;
      });
    }

    function postReservation(startDate, endDate, roomNumber) {
      //debug prints
      console.log("postReservation: " + startDate + endDate + roomNumber + getStoredSession());
      $.ajax({
        url: 'functions/db/postReservation.php',
        type: 'POST',
        data: {
          roomNumber: roomNumber,
          userEmail: getStoredSession(),
          startDate: startDate,
          endDate: endDate
        },
        success: function(response) {
          console.log(response);
        }
      });
    }

    function handlePostReservation(searchPosition) {
      table = getTableEntry(searchPosition);
      postReservation(document.getElementById('dateStart').value, document.getElementById('dateEnd').value, table.num);

    }

    function getCurrentDate(day_offset) {
      let date = new Date();
      date.setDate(date.getDate() + day_offset);
      return date.toISOString().split('T')[0];
    }

    function changeValueOnDateComponent() {
      let dateStart = document.getElementById('dateStart');
      let dateEnd = document.getElementById('dateEnd');
      dateStart.value = getCurrentDate(0);
      dateEnd.value = getCurrentDate(1);
    }

    function loadPage() {
      changeValueOnDateComponent();
      // reservationList();
    }
  </script>
  <title>Listagem quartos</title>
</head>

<body class="body-dark" onload="loadPage()">
  <div class="header">
    <!-- get svg -->
    <div class="img-container">
      <img src="assets/svgs/Logo.svg" alt="">
    </div>
    <nav class="nav-container">


  </div>
  <div class="div-generic">
    <form>
      <legend>Selecione a Data Inicial</legend>
      <input id="dateStart" type="date">
      <legend>Selecione a Data Final</legend>
      <input id="dateEnd" type="date">
      <button id="sendInfo" class="outline-confirm-button">Verificar Disponibilidade</button>
    </form>
  </div>

  <div>
    <!-- Create a table to show the rooms  -->
    <table class="pure-table pure-table-bordered">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
          <th>Número</th>
          <th>Número de Camas</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="roomList">
        <h1>Lista de Quartos</h1>
        <script>
          roomList(handleRoomList);
        </script>
      </tbody>
    </table>
  </div>
  <div>
    <table class="pure-table pure-table-bordered">
      <thead>
        <tr>
          <th>Nome do Quarto</th>
          <th>Numero do Quarto</th>
          <th>Data Check-in</th>
          <th>Data Check-out</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="reserveList">
        <h1>Reservas do Usuário</h1>
        <p>Para mudar o periodo da reserva, no inicio da pagina coloque a data nova e clique no botão "Alterar Data de Reserva" ao lado da reserva que deseja alterar</p>
        <script>
          reservationList(handleReservationList);
        </script>
      </tbody>
    </table>
  </div>
</body>