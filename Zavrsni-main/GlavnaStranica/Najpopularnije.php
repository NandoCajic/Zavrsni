<?php 
// Inicijalizacija sesije i uključivanje potrebnih datoteka:
  session_start();
  include("../Login/Spajanje.php");
  include("../Login/Funkcije.php");
?>
<!DOCTYPE html>
<html>
<head>
<!-- Head -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Artists</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Najpop.css'>
    <script src='main.js'></script>
    <link rel="icon" href="../IconKitchen-Output/web/icon-512.png" sizes="any">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <style>
      
/* Dizajn Kutija */
  .kutija{
  display: grid;
  grid-template-columns: auto auto auto auto ;
  margin-top:10%;
  padding: 10px;
  }
  .kutija > .card {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
  }
/* Dizajn za body */
  body {
    font-family: "Quicksand", sans-serif;
    height: 100%;
    background-color: #000000;
    background-image: url(http://transparenttextures.com/patterns/black-thread.png);
  }
  
/* Dizajn za sve */
  *{

  font-family: 'Lato', sans-serif;
  font-family: 'Oswald', sans-serif;
  }
  .Icona{
  width:40px;
  height:40px;
  margin-bottom:10px;
  }
/* Dropdown design */
  .dropdown {
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
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

    .dropdown {
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
/*Dizajn za karte */
  :root {
    --card-height: 300px;
    --card-width: calc(var(--card-height) / 1.5);
  }
  * {
    box-sizing: border-box;
  }
  
  .card {
    width: var(--card-width);
    height: var(--card-height);
    position: relative;
 

   
    padding: 0 36px;
    perspective: 2500px;
    margin: 0 50px;
  }
  
  .cover-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .wrapper {
    transition: all 0.5s;
    position: absolute;
    width: 100%;
    z-index: -1;
  }
  
  .card:hover .wrapper {
    transform: perspective(900px) translateY(-5%) rotateX(25deg) translateZ(0);
    box-shadow: 2px 35px 32px -8px rgba(0, 0, 0, 0.75);
    -webkit-box-shadow: 2px 35px 32px -8px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 2px 35px 32px -8px rgba(0, 0, 0, 0.75);
  }
  
  .wrapper::before,
  .wrapper::after {
    content: "";
    opacity: 0;
    width: 100%;
    height: 80px;
    transition: all 0.5s;
    position: absolute;
    left: 0;
  }
  .wrapper::before {
    top: 0;
    height: 100%;
    background-image: linear-gradient(
      to top,
      transparent 46%,
      rgba(12, 13, 19, 0.5) 68%,
      rgba(12, 13, 19) 97%
    );
  }
  .wrapper::after {
    bottom: 0;
    opacity: 1;
    background-image: linear-gradient(
      to bottom,
      transparent 46%,
      rgba(12, 13, 19, 0.5) 68%,
      rgba(12, 13, 19) 97%
    );
  }
  
  .card:hover .wrapper::before,
  .wrapper::after {
    opacity: 1;
  }
  
  .card:hover .wrapper::after {
    height: 120px;
  }
  .title {
    width: 100%;
    transition: transform 0.5s;
  }
  .card:hover .title {
    transform: translate3d(0%, -50px, 100px);
  }
  
  .character {
    width: 100%;
    opacity: 0;
    transition: all 0.5s;
    position: absolute;
    z-index: -1;
  }
  
  .card:hover .character {
    opacity: 1;
    transform: translate3d(0%, -30%, 100px);
  }
  @media (max-width: 768px) {
  .card {
    width: 100%; /* Make the card full width on smaller screens */
    margin: 0; /* Remove margin on smaller screens */
  }
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
            <!-- <li><a href="generator.php?dj=">Menu</a></li>
            <li><a href="generator.php?dj=">Testimonial</a></li> -->
            <!-- <li><a href="generator.php?dj=">Contact</a></li> -->
            </ul>
     
        <li class='dropdown'>
        <a href='javascript:void(0)' class='dropbtn'><img class="Icona" src='Slike/User/user1.png' alt='Account'></a>
            <div class='dropdown-content'>
            <?php 
            if (empty($user_data = check_login($con))) {
              echo "
                <a href='../Login/Login.php'>Login</a>
                <a href='../Login/SignUp.php'>Register</a>
               ";
              
            } 
           
            // Ako je korisnik prijavljen, prikaži opcije za odjavu i profil
            
            else {
                $user_data = check_login($con);
                echo "
                <a href='./ProfileCard.php'>" . $user_data['Korisnik'] . ", Profile</a>
                <a href='../Login/LogOut.php'>LogOut</a>"
                 ;}
          ?>
             </div>
              </li>
       
    </div>
  </nav>

<!-- Strani DJ -->
  <!-- Prvi red -->
    <!--Yellowheads -->
     <!-- Mythrill -->
<a href="Generator.php?dj=mythrill" alt="Mythrill" target="_blank">
  <div class="card">
    <div class="wrapper">
      <img src="https://i1.sndcdn.com/avatars-000712960906-xumar9-t500x500.jpg" class="cover-image" />
    </div>
    <img src="./Slike/ye.png" class="character" />
  </div>
</a>

<!-- Carl Cox -->
<a href="Generator.php?dj=carlcox" alt="Carl Cox" target="_blank">
  <div class="card">
    <div class="wrapper">
      <img src="Slike/Dj-s/CarlCox/CarlCox-Pozdaina.png" class="cover-image" />
    </div>
    <img src="" class="character" />
  </div>
</a>

<!-- Charlote De Witte -->
<a href="generator.php?dj=charlotedewitte" alt="Charlote De Witte" target="_blank">
  <div class="card">
    <div class="wrapper">
      <img src="Slike/Dj-s/CharloteDeWitte/CharloteDeWitte-pozadina.jpg" class="cover-image" />
    </div>
    <img src="" class="character" />
  </div>
</a>

<!-- Nina Kraviz -->
<a href="generator.php?dj=ninakraviz" alt="Nina Kraviz" target="_blank">
  <div class="card">
    <div class="wrapper">
      <img src="Slike/Dj-s/NinaKraviz/NinaKraviz-pozadina.jpg" class="cover-image" />
    </div>
    <img src="" class="character" />
  </div>
</a>
  <!-- Drugi Red -->
    <!--Dyen  -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/Dyen/Dyen-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Sam Paganini -->
          <a href="generator.php?dj=" alt="Mythrill" target="_blank">
          <div class="card">
            <div class="wrapper">
            <img src="Slike/Dj-s/SamPaganini/SamPaganini-pozadina.jpg" class="cover-image" />
            </div>
            <img src="" class="character" />
          </div>
        </a>
    <!-- Will Sparks -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/WillSparks/WillSparks-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Boris Brejcha -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/BorisBrejcha/BorisBrejcha-pozadina.jpeg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
  <!--Treci red -->
    <!-- Bossta -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/Bossta/Bossta-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Bollmann -->
    <a href="generator.php?dj=" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
        <img src="Slike/Dj-s/Bollman/Bollmann-pozadina.png" class="cover-image" />
        </div>
        <img src="" class="character" />
      </div>
    </a>
    <!-- Azyr -->
    <a href="generator.php?dj=" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
        <img src="Slike/Dj-s/Azyr/Azyr-pozadina.jpg" class="cover-image" />
        </div>
        <img src="" class="character" />
      </div>
    </a>
    <!-- JulienEarle -->
    <a href="generator.php?dj=" alt="Mythrill" target="_blank">
      <div class="card">
        <div class="wrapper">
        <img src="Slike/Dj-s/JulienEarle/JulienEarle-pozadina.jpg" class="cover-image" />
        </div>
        <img src="" class="character" />
      </div>
    </a>
  <!-- Četvrti Red -->
    <!-- Shlomo -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/Shlomo/Shlomo-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Nico Moreno -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/NicoMoreno/NicoMoreno-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Riddika -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/Riddika/Riddika-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- MrMachine -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/MrMachine/MrMachine-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
  <!-- Peti red -->
    <!-- Salvatore Ganacci -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/SalvatoreGanacci/SalvatoreGanacci-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Sara Landry -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/SaraLandry/SaraLandry-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Krl Mx -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/KrlMx/KrlMx-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- KarimAlkhayat -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/KarimAlkhayat/KarimAlkhayat-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
  <!-- Šesti red -->
    <!-- HelenaHauff -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/HelenaHauff/HelenaHauff-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Joris Voorn -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/JorisVoorn/JorisVoorn-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
        </a>
    <!-- Enrico Sangiuliano -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/EnricoSangiuliano/EnricoSangiuliano-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Eli Brown -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/EliBrown/EliBrown-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
  <!-- Sedmi red -->
    <!-- Basswell -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/Basswell/Basswell-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- AmelieLens -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/AmelieLens/AmelieLens-Pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- AdamBeyer -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/AdamBeyer/AdamBeyer-pozadina.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- DeborahDeLuca -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/Dj-s/DeborahDeLuca/DeborahDeLuca-pozadina.png" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
  <!-- Osmi red -->
    <!-- Utoka -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/NašiDJ/Utoka/Utoka.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- Danitz -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/NašiDJ/Danitz/Danitz.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
    <!-- DJ Jock -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="Slike/NašiDJ/DJJock/DJJock.jpg" class="cover-image" />
          </div>
          <img src="" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
  <!-- Deveti red -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
  <!-- Deseti red -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
  <!-- Jedanaesti red -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
  <!-- Dvanesti red -->
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      <a href="generator.php?dj=" alt="Mythrill" target="_blank">
        <div class="card">
          <div class="wrapper">
          <img src="data:image/jpeg;base64,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" class="cover-image" />
          </div>
          <img src="./Slike/umek.png" class="character" />
        </div>
      </a>
      
    </div>

<script>

</script>
</body>
</html>