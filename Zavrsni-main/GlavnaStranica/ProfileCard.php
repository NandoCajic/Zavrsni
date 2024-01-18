<?php
//Inicijalizacija sesije i uključivanje potrebnih datoteka:
  session_start();
  include("../Login/Spajanje.php");
  include("../Login/Funkcije.php");
  $user_data = check_login($con);

  $user_data['Korisnik']; 
  $user_data['Grad'];
  $user_data['Mobitel'];
  $user_data['Korisnik_id'];
  $user_data['ImeSlika']; // New field to store the filename of the profile picture

// Check if the user has a profile picture
  if (!empty($user_data['ImeSlika'])) {
    $profilePicture = "Profilne/" . $user_data['ImeSlika'];
  }  
  else {
    // If no profile picture, use a default image
    $profilePicture = "Profilne/user1.png"; // Adjust the path to your default image
  }
?>
<!DOCTYPE html>
<html>
<head>
<!-- Head -->
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>
  <link rel="icon" href="../IconKitchen-Output/web/icon-512.png" sizes="any">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <style>
/* Dizajn za navigaciju */
  *,
  *::after,
  *::before {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }

  .html {
    font-size: 62.5%;
  }

  body {
    font-family: "Poppins", sans-serif;
  }

/* ///////////..utility classes../////////// */

  #container {
    max-width: 1200px;
    width: 90%;
    margin: auto;
    margin-top: 60px;
  }

  

/* ............/navbar/............ *

/* desktop mode............/// */

  .navbar input[type="checkbox"],
  .navbar .hamburger-lines {
    display: none;
  }

  .navbar {
  position: fixed;
  top: 0;
  width: 100%;
  background: linear-gradient(to right, #141313, #1a1b1d, #000000);
  opacity: 0.95;
  height: 50px;
  z-index: 12;
  box-shadow: 0px 5px 5px 0px red;
  }

  .navbar-container {
    display: flex;
    justify-content: space-between;
    height: 64px;
    align-items: center;
  }

  .menu-items {
    order: 2;
    display: flex;
  }

  .menu-items li {
    list-style: none;
    margin-left: 1.5rem;
    margin-bottom: 0.7rem;
    margin-right:1rem;
    font-size: 1.2rem;
  }

  .menu-items a {
    text-decoration: none;
    color: #444;
    font-weight: 500;
    transition: color 0.3s ease-in-out;
  }

  .menu-items a:hover {
    color: #117964;
    transition: color 0.3s ease-in-out;
  }




  @keyframes about-img-animation {
    100% {
      transform: translate(0);
    }
  }

  @keyframes about-text-animation {
    100% {
      transform: translate(0);
    }
  }

  


  @media (max-width: 768px) {
    .navbar {
      opacity: 0.95;
    }

    .navbar-container input[type="checkbox"],
    .navbar-container .hamburger-lines {
      display: block;
    }

    .navbar-container {
      display: block;
      position: relative;
      height: 64px;
    }

    .navbar-container input[type="checkbox"] {
      position: absolute;
      display: block;
      height: 32px;
      width: 30px;
      top: 20px;
      left: 20px;
      z-index: 5;
      opacity: 0;
    }

    .navbar-container .hamburger-lines {
      display: block;
      height: 23px;
      width: 35px;
      position: absolute;
      top: 17px;
      left: 20px;
      z-index: 2;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .navbar-container .hamburger-lines .line {
      display: block;
      height: 4px;
      width: 100%;
      border-radius: 10px;
      background: #333;
    }

    .navbar-container .hamburger-lines .line1 {
      transform-origin: 0% 0%;
      transition: transform 0.4s ease-in-out;
    }

    .navbar-container .hamburger-lines .line2 {
      transition: transform 0.2s ease-in-out;
    }

    .navbar-container .hamburger-lines .line3 {
      transform-origin: 0% 100%;
      transition: transform 0.4s ease-in-out;
    }

    .navbar .menu-items {
      padding-top: 100px;
      background: #fff;
      height: 100vh;
      max-width: 300px;
      transform: translate(-150%);
      display: flex;
      flex-direction: column;
      margin-left: -40px;
      padding-left: 50px;
      transition: transform 0.5s ease-in-out;
      box-shadow: 5px 0px 10px 0px #aaa;
    }

    .navbar .menu-items li {
      margin-bottom: 1.5rem;
      font-size: 1.3rem;
      font-weight: 500;
    }

    .logo {
      position: absolute;
      top: 5px;
      right: 15px;
      font-size: 2rem;
     
    }

    .navbar-container input[type="checkbox"]:checked ~ .menu-items {
      transform: translateX(0);
    }

    .navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line1 {
      transform: rotate(35deg);
    }

    .navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line2 {
      transform: scaleY(0);
    }

    .navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line3 {
      transform: rotate(-35deg);
    }

/* ......./ food /......... */

    .food-container {
      flex-direction: column;
      align-items: stretch;
    }

    .food-type:not(:last-child) {
      margin-bottom: 3rem;
    }

    .food-type {
      box-shadow: 5px 5px 10px 0 #aaa;
    }

    .img-container {
      margin: 0;
    }
  }

  @media (max-width: 500px) {
    html {
      font-size: 65%;
    }

    .navbar .menu-items li{
        font-size: 1.6rem;
    }

    .testimonial-container {
      flex-direction: column;
      text-align: center;
    }

    .food-menu-container img {
      margin: auto;
    }

    .food-menu-item {
      flex-direction: column;
      text-align: center;
    }

    .form-container {
      width: 90%;
    }

    .contact-container {
      display: flex;
      flex-direction: column;
    }

    .contact-img {
      width: 90%;
      margin: 3rem auto;
    }

    .logo {
      position: absolute;
      top: 06px;
      right: 15px;
      font-size: 3rem;
    }

    .navbar .menu-items li {
      margin-bottom: 2.5rem;
      font-size: 1.8rem;
      font-weight: 500;
    }
  }

  @media (min-width: 769px) and (max-width: 1200px) {
    .img-container h3 {
      font-size: 1.5rem;
    }

    .img-container .btn {
      font-size: 0.7rem;
    }
  }

  @media (orientation: landscape) and (max-height: 500px) {
    .showcase-area {
      height: 50vmax;
    }
  }
/* Design za body */
  body {
  margin: 0 auto;
  padding: 0;
  background-color: #000000;
  background-image: url(http://transparenttextures.com/patterns/black-thread.png);
  }
/* Design Za profilnu kartu */

        #card img {
            width: 150px;
            height: 150px;
            float: left;
            border-radius: 50%;
            margin-right: 20px;
            cursor: pointer; /* Add cursor pointer for visual indication it's clickable */
        }

        /* Style for the hidden file input */
        #file {
            display: none; /* Hide the file input */
        }
  a {
    --s: 0.01em;   /* the thickness of the line */
    --c: #2c4bff; /* the color */
    
    color: #0000;
    padding-bottom: var(--s);
    background: 
      linear-gradient(90deg,var(--c) 50%,#000 0) calc(100% - var(--_p,0%))/200% 100%,
      linear-gradient(var(--c) 0 0) 0% 100%/var(--_p,0%) var(--s) no-repeat;
    -webkit-background-clip: text,padding-box;
            background-clip: text,padding-box;
    transition: 0.5s;
  }
  a:hover {--_p: 100%}


  a {
    font-family: system-ui, sans-serif;
    font-size: 1rem;
    cursor: pointer;
  }
  .left {
    left: 25px;
  }

  .right {
    right: 25px;
  }

  .center {
    text-align: center;
  }

  .bottom {
    position: absolute;
    bottom: 25px;
  }

  #gradient {
    background: #999955;
    background-image: linear-gradient(#DAB046 20%, #D73B25 20%, #D73B25 40%, #C71B25 40%, #C71B25 60%, #961A39 60%, #961A39 80%, #601035 80%);
    margin: 0 auto;
    margin-top: 100px;
    width: 100%;
    height: 150px;
  }

  #gradient:after {
    content: "";
    position: absolute;
    background: #E9E2D0;
    left: 50%;
    margin-top: -67.5px;
    margin-left: -270px;
    padding-left: 20px;
    border-radius: 5px;
    width: 520px;
    height: 275px;
    z-index: -1;
  }
  *{

  font-family: 'Lato', sans-serif;
  font-family: 'Oswald', sans-serif;
  }
  #card {
    position: absolute;
    width: 450px;
    height: 225px;
    padding: 25px;
    padding-top: 0;
    padding-bottom: 0;
    left: 50%;
    top: 67.5px;
    margin-left: -250px;
    background: #E9E2D0;
    box-shadow: -20px 0 35px -25px black, 20px 0 35px -25px black;
    z-index: 5;
  }

  #card img {
    width: 150px;
    float: left;
    border-radius: 5px;
    margin-right: 20px;
  
  }

  #card h2 {
    font-family: courier;
    color: #333;
    margin: 0 auto;
    padding: 0;
    font-size: 15pt;
  }

  #card p {
    font-family: courier;
    color: #555;
    font-size: 13px;
  }

  #card span {
    font-family: courier;
  }
  .FileSub {
  border: none;
  width: 140px;
  height: 20px;
  color:black;
  z-index: 1;
  display: flex;
  background:transparent;
  position: relative;
  cursor: pointer;
  top:155px ;
  right: 165px;
  	}
/* File submit button */
  .FileSub p{
    margin: 0 auto;
    align-self: center;
    font-size: 17px;
    font-weight: bold;
    text-align: center;
    position: absolute;
    color:black;
  
  }

  .FileSub::after {
    position: absolute;
    content: "";
    width: 100%;
    z-index: -1;
    height: 10%;
    bottom: 0;
    clip-path: polygon(
      0% 74%,
      4% 75%,
      8% 76%,
      11% 77%,
      15% 78%,
      20% 78%,
      25% 77%,
      32% 77%,
      37% 75%,
      40% 74%,
      43% 74%,
      46% 73%,
      52% 72%,
      57% 72%,
      65% 74%,
      66% 75%,
      71% 78%,
      75% 82%,
      81% 86%,
      83% 88%,
      88% 91%,
      90% 94%,
      94% 96%,
      98% 98%,
      100% 100%,
      82% 100%,
      0 100%
    );
    background: #8792eb;
    transition: 0.2s ease;
  }

  .FileSub::before {
    position: absolute;
    content: "";
    /*   bottom: 80%; */
    transform: rotate(180deg);
    width: 100%;
    height: 10%;
    transition: 0.2s ease;
    /*   bottom:; */
    z-index: -1;
    clip-path: polygon(
      0% 74%,
      4% 75%,
      8% 76%,
      11% 77%,
      15% 78%,
      20% 78%,
      25% 77%,
      32% 77%,
      37% 75%,
      40% 74%,
      43% 74%,
      46% 73%,
      52% 72%,
      57% 72%,
      65% 74%,
      66% 75%,
      71% 78%,
      75% 82%,
      81% 86%,
      83% 88%,
      88% 91%,
      90% 94%,
      94% 96%,
      98% 98%,
      100% 100%,
      82% 100%,
      0 100%
    );
    background: #8792eb;
  }

  .FileSub:hover::after {
    clip-path: polygon(
      0 30%,
      9% 34%,
      7% 39%,
      11% 43%,
      13% 33%,
      17% 30%,
      24% 34%,
      25% 35%,
      30% 31%,
      30% 38%,
      39% 33%,
      35% 43%,
      43% 45%,
      55% 46%,
      65% 74%,
      67% 66%,
      81% 57%,
      75% 82%,
      81% 86%,
      83% 88%,
      88% 91%,
      90% 94%,
      94% 96%,
      98% 98%,
      100% 100%,
      82% 100%,
      0 100%
    );
    height: 80%;
  }

  .FileSub:hover::before {
    clip-path: polygon(
      0 30%,
      9% 34%,
      7% 39%,
      11% 43%,
      13% 33%,
      17% 30%,
      24% 34%,
      25% 35%,
      30% 31%,
      30% 38%,
      39% 33%,
      35% 43%,
      43% 45%,
      55% 46%,
      65% 74%,
      67% 66%,
      81% 57%,
      75% 82%,
      81% 86%,
      83% 88%,
      88% 91%,
      90% 94%,
      94% 96%,
      98% 98%,
      100% 100%,
      82% 100%,
      0 100%
    );
    height: 80%;
  }

  </style>
</head>
<body>
<!-- Navigasijska traka -->
  <nav class="navbar">
      <div class="navbar-container container">
          <input type="checkbox" name="" id="">
          <div class="hamburger-lines">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
          </div>
          <ul class="menu-items">
              <li><a href="Glavna.php">Home</a></li>
              <li><a href="Novosti.php">Novosti</a></li>
              <li><a href="Najpopularnije.php">Najpopularnije</a></li>
          </ul>
          <h1 class="logo">Techno Zona</h1>
      </div>
    </nav>

  <div id="gradient"></div>
<!-- Profilna karta -->
  <div id="card">
          <!-- Profilna Slika -->
          <form action="Upload.php" method="post" enctype="multipart/form-data" onsubmit="return validateFile()">
              <!-- Round picture, on click triggers the file input -->
              <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" onclick="document.getElementById('file').click()">
              <!-- Hidden file input -->
            
              <input type="file" name="file" id="file" accept="image/jpeg, image/jpg, image/png, image/gif" required>
            
              <button class="FileSub" type="submit" ><p>Upload picture</p></button>
          </form>
    <!-- Ime iz baze podataka -->
    <?php echo"<h1>". $user_data['Korisnik'] . "</h1>" ?>
    <?php echo"<h3>Broj Mobitela: ". $user_data['Mobitel'] . "</h3>" ?>
    <?php echo"<p>Korisnički ID : #".$user_data['Korisnik_id']."</p>"?>
    <span class="left bottom"><a href='../Login/LogOut.php'>LogOut</a></span>
    <?php echo'<span class="right bottom">Grad: '.$user_data['Grad'].'</span>' ?>
  </div>
<script>
    // JavaScript to update the round picture when a file is selected
        document.getElementById('file').addEventListener('change', function () {
            var fileInput = this;
            var imgElement = document.getElementById('profileImage');
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    imgElement.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>