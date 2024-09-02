<!DOCTYPE html>
<html lang="en">

<head>
  <script>
    function play() {
      var player = document.getElementById('player');
      player.play();
      // start animation
      playAnim();
    }

    function pause() {
      var player = document.getElementById('player');
      player.pause();
      // stop animation
      pauseAnim();
    }

    function stop() {
      var player = document.getElementById('player');
      player.pause();
      player.currentTime = 0;
      // stop animation
      pauseAnim();
      // set rotation to 0
      rotateToZero();
    }

    function setVolumeMax() {
      var player = document.getElementById('player');
      player.volume = 1;
    }

    function updateProgress() {
      var player = document.getElementById('player');
      var progressBar = document.getElementById('progress-bar');
      var percentage = Math.floor((100 / player.duration) * player.currentTime);
      progressBar.value = percentage;
    }

    function updateVolume() {
      var player = document.getElementById('player');
      var volumeBar = document.getElementById('range');
      player.volume = volumeBar.value / 100;
    }

    function updateVolumeTo(value) {
      var player = document.getElementById('player');
      var volumeBar = document.getElementById('range');
      volumeBar.value = value;
      player.volume = value / 100;
    }

    function pauseAnim() {
      // remove animation from pedro and wrapper
      document.querySelector('.pedro').style.animationPlayState = 'paused';
      document.querySelector('.wrapper').style.animationPlayState = 'paused';
    }

    function playAnim() {
      // add animation to pedro and wrapper
      document.querySelector('.pedro').style.animationPlayState = 'running';
      document.querySelector('.wrapper').style.animationPlayState = 'running';
    }

    function rotateToZero() {
      // set rotation to 0
      document.querySelector('.pedro').style.transform = 'rotate(0deg)';
    }

    function pageLoad() {
      pauseAnim();
    }
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- import css pedro.css -->
  <link rel="stylesheet" href="styles.css">
  <!-- import pure css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
    integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls"
    crossorigin="anonymous">
</head>

<body class="main" onload="pageLoad()">
  <div class="backgroundCube">
    <div class="controls">
      <button class="pure-button pure-button-primary" onclick="play()">Play</button>
      <button class="pure-button" onclick="pause()">Pause</button>
      <button class="pure-button" onclick="stop()">Stop</button>
      <input type="range" min="0" max="100" value="100" class="slider" id="range" onchange="updateVolume()">

      <p></p>
    </div>
    <audio src="pedro.mp3" id="player"></audio>
    <div class="wrapper">
      <img class="pedro" src="pedropng.png" alt="">
    </div>
  </div>
</body>