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
  <script src="functions/js/login.js"></script>

  <title>Hostel Mediterrâneo</title>
</head>

<body class="body-dark">
  <div class="header">
    <!-- get svg -->
    <div class="img-container">
      <img src="assets/svgs/Logo.svg" alt="">
    </div>
    <nav class="nav-container">
      <button id="submit" class="outline-button" onclick="login()"> Login</button>
  </div>
  <div class="div-container div-container-dark">
    <div class="slideshow-container">
      <div class="slider">
        <img id="slide-1" src="assets/images/slideshow/1.jpg" alt="">
        <img id="slide-2" src="assets/images/slideshow/2.jpg" alt="">
        <img id="slide-3" src="assets/images/slideshow/3.jpg" alt="">
        <img id="slide-4" src="assets/images/slideshow/4.jpg" alt="">
        <img id="slide-5" src="assets/images/slideshow/5.jpg" alt="">
        <img id="slide-6" src="assets/images/slideshow/6.jpg" alt="">
        <img id="slide-7" src="assets/images/slideshow/7.jpg" alt="">
      </div>
      <div class="slider-nav">
        <a href="#slide-1"></a>
        <a href="#slide-2"></a>
        <a href="#slide-3"></a>
        <a href="#slide-4"></a>
        <a href="#slide-5"></a>
        <a href="#slide-6"></a>
        <a href="#slide-7"></a>
      </div>

    </div>
    <div class="div-content">
      <h1>Hostel Mediterrâneo</h1>
      <p>O melhor lugar para se hospedar em Paraty,
        temos opções de camas e quartos com e sem banheiro dentro do quarto
        (quartos sem banheiro contam com um banheiro comunitário no corredor)
        ,com preço variável pela localização da cama. Ao chegar no aeroporto
        ou rodoviária de sua escolha nossos motoristas parceiros iram te trazer ao hostel,
        oferecemos descontos para o almoço em um restaurante proximo.</p>
    </div>
    <div class="div-generic">
    </div>
  </div>
  <div class="div-generic">
    <form action="">
      <legend>Selecione a Data Inicial</legend>
      <input type="date">
      <legend>Selecione a Data Final</legend>
      <input type="date">
      <button class="outline-confirm-button">Verificar Disponibilidade</button>

    </form>
  </div>

</body>

</html>