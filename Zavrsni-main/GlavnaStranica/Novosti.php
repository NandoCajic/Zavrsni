<?php 
// Inicijalizacija sesije i uključivanje potrebnih datoteka:
  session_start();
  include("../Login/Spajanje.php");
  include("../Login/Funkcije.php");
  $user_data = check_login($con);
  $user_data['ImeSlika']; // New field to store the filename of the profile picture
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
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Novosti.css'>
    <link rel="icon" href="../IconKitchen-Output/web/icon-512.png" sizes="any">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <script src='main.js'></script>
    <style>
/* Desigin za body */
  @import url('https://fonts.googleapis.com/css?family=Alegreya+Sans:800,900');

  body{
    background: #131314;
    background: linear-gradient(to right, #141313, #1a1b1d, #000000);
  }

/*Blog Kartice*/
  * {
      box-sizing: border-box;
    }
    body{
      
      display: flex;
      flex-direction: column;
      font-size: 1rem;
      justify-content: center;
      align-items: center;
    }
    
    .blog-card {
      display: flex;
      flex-direction: column;
      margin: 1rem auto;
      box-shadow: 0 3px 7px -1px rgba(0, 0, 0, 0.1);
      margin-bottom: 1.6%;
      background: #fff;
      line-height: 1.4;
      font-family: sans-serif;
      border-radius: 5px;
      overflow: hidden;
      z-index: 0;
    }
    .blog-card a {
      color: inherit;
    }
    .blog-card a:hover {
      color: #5ad67d;
    }
    .blog-card:hover .photo {
      transform: scale(1.3) rotate(3deg);
    }
    .blog-card .meta {
      position: relative;
      z-index: 0;
      height: 300px;
    }
    .blog-card .photo {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-size: cover;
      background-position: center;
      transition: transform 0.2s;
    }
    .blog-card .details, .blog-card .details ul {
      margin: auto;
      padding: 0;
      list-style: none;
    }
    .blog-card .details {
      position: absolute;
      top: 0;
      bottom: 0;
      left: -100%;
      margin: auto;
      transition: left 0.2s;
      background: rgba(0, 0, 0, 0.6);
      color: #fff;
      padding: 10px;
      width: 100%;
      font-size: 0.9rem;
    }
    .blog-card .details a {
      text-decoration: dotted underline;
    }
    .blog-card .details ul li {
      display: inline-block;
    }
    .blog-card .details .author:before {
      font-family: FontAwesome;
      margin-right: 10px;
      content: "\f007";
    }
    .blog-card .details .date:before {
      font-family: FontAwesome;
      margin-right: 10px;
      content: "\f133";
    }
    .blog-card .details .tags ul:before {
      font-family: FontAwesome;
      content: "\f02b";
      margin-right: 10px;
    }
    .blog-card .details .tags li {
      margin-right: 2px;
    }
    .blog-card .details .tags li:first-child {
      margin-left: -4px;
    }
    .blog-card .description {
      padding: 1rem;
      background: #fff;
      position: relative;
      z-index: 1;
    }
    .blog-card .description h1, .blog-card .description h2 {
      font-family: Poppins, sans-serif;
    }
    .blog-card .description h1 {
      line-height: 1;
      margin: 0;
      font-size: 1.7rem;
    }
    .blog-card .description h2 {
      font-size: 1rem;
      font-weight: 300;
      text-transform: uppercase;
      color: #a2a2a2;
      margin-top: 5px;
    }
    .blog-card .description .read-more {
      text-align: right;
    }
    .blog-card .description .read-more a {
      color: #5ad67d;
      display: inline-block;
      position: relative;
    }
    .blog-card .description .read-more a:after {
      content: "\f061";
      font-family: FontAwesome;
      margin-left: -10px;
      opacity: 0;
      vertical-align: middle;
      transition: margin 0.3s, opacity 0.3s;
    }
    .blog-card .description .read-more a:hover:after {
      margin-left: 5px;
      opacity: 1;
    }
    .blog-card p {
      position: relative;
      margin: 1rem 0 0;
    }
    .blog-card p:first-of-type {
      margin-top: 1.25rem;
    }
    .blog-card p:first-of-type:before {
      content: "";
      position: absolute;
      height: 5px;
      background: #5ad67d;
      width: 35px;
      top: -0.75rem;
      border-radius: 3px;
    }
    .blog-card:hover .details {
      left: 0%;
    }
    @media (min-width: 640px) {
      .blog-card {
        flex-direction: row;
        max-width: 1000px;
      }
      .blog-card .meta {
        flex-basis: 40%;
        height: auto;
      }
      .blog-card .description {
        flex-basis: 60%;
      }
      .blog-card .description:before {
        transform: skewX(-3deg);
        content: "";
        background: #fff;
        width: 30px;
        position: absolute;
        left: -10px;
        top: 0;
        bottom: 0;
        z-index: -1;
      }
      .blog-card.alt {
        flex-direction: row-reverse;
      }
      .blog-card.alt .description:before {
        left: inherit;
        right: -10px;
        transform: skew(3deg);
      }
      .blog-card.alt .details {
        padding-left: 25px;
      }
    }
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
/* Znak koji se okrece */
  span {
    font-family: 'Bebas Neue', cursive;
    font-size: 3em;

    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-image: linear-gradient(gold, gold);
    background-size: 100% 10px;
    background-repeat: no-repeat;
    background-position: 100% 0%;
     transition: background-size .7s, background-position .5s ease-in-out;
  }
  
  span:hover {
    background-size: 100% 100%;
    background-position: 0% 100%;
    transition: background-position .7s, background-size .5s ease-in-out;
  }  
  .svg-frame {
    position: relative;
    width: 300px;
    height: 300px;
    transform-style: preserve-3d;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .svg-frame svg {
    position: absolute;
    transition: .5s;
    z-index: calc(1 - (0.2 * var(--j)));
    transform-origin: center;
    width: 344px;
    height: 344px;
    fill: none;
  }
  
  .svg-frame:hover svg {
    transform: rotate(-80deg) skew(30deg) translateX(calc(45px * var(--i))) translateY(calc(-35px * var(--i)));
  }
  
  .svg-frame svg #center {
    transition: .5s;
    transform-origin: center;
  }
  
  .svg-frame:hover svg #center {
    transform: rotate(-30deg) translateX(45px) translateY(-3px);
  }
  
  #out2 {
    animation: rotate16 7s ease-in-out infinite alternate;
    transform-origin: center;
  }
  
  #out3 {
    animation: rotate16 3s ease-in-out infinite alternate;
    transform-origin: center;
    stroke: #ff0;
  }
  
  #inner3,
  #inner1 {
    animation: rotate16 4s ease-in-out infinite alternate;
    transform-origin: center;
  }
  
  #center1 {
    fill: #ff0;
    animation: rotate16 2s ease-in-out infinite alternate;
    transform-origin: center;
  }
  
  @keyframes rotate16 {
    to {
      transform: rotate(360deg);
    }
  }
/* Hold my beer Button */
  button {
    border: 0;
    background: ghostwhite;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1em 1em 1em 3em;
    position: relative;
    overflow: hidden;
    font-size: 17px;
    font-family: inherit;
    border-radius: 12px;
    box-shadow: rgba(33, 35, 38, 0.1) 0px 10px 10px -10px;
   }
   
   button svg {
    position: absolute;
    left: .4em;
    width: 40px;
    height: 40px;
    transform: rotateY(-180deg);
    transition: transform .4s cubic-bezier(0.68, -0.6, 0.32, 1.6);
   }
   
   button:hover svg {
    transform: rotateY(-180deg) translateX(-.25em);
   }
   
   button:active {
    transform: scale(0.98);
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
  box-shadow: 0px 5px 5px 0px #00FFFF;
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
            <!-- <li><a href="#food-menu">Menu</a></li>
            <li><a href="#testimonials">Testimonial</a></li>
            <li><a href="#contact">Contact</a></li> -->
            </ul>
     
        <li class='dropdown'>
        <a href='javascript:void(0)' class='dropbtn'><img class="Icona" src='<?php echo $profilePicture; ?>' alt='Account'></a>
            <div class='dropdown-content'>
            <?php 
          // Ako korisnik nije prijavljen, prikaži poruku i opciju za prijavu/registraciju
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
<!-- Vrteca Plava stvar sta god -->
  <div class="svg-frame">
    <svg style="--i:0;--j:0;">
      <g id="out1">
        <path d="M72 172C72 116.772 116.772 72 172 72C227.228 72 272 116.772 272 172C272 227.228 227.228 272 172 272C116.772 272 72 227.228 72 172ZM197.322 172C197.322 158.015 185.985 146.678 172 146.678C158.015 146.678 146.678 158.015 146.678 172C146.678 185.985 158.015 197.322 172 197.322C185.985 197.322 197.322 185.985 197.322 172Z"></path>
        <path mask="url(#path-1-inside-1_111_3212)" stroke-miterlimit="16" stroke-width="2" stroke="#00FFFF" d="M72 172C72 116.772 116.772 72 172 72C227.228 72 272 116.772 272 172C272 227.228 227.228 272 172 272C116.772 272 72 227.228 72 172ZM197.322 172C197.322 158.015 185.985 146.678 172 146.678C158.015 146.678 146.678 158.015 146.678 172C146.678 185.985 158.015 197.322 172 197.322C185.985 197.322 197.322 185.985 197.322 172Z"></path>
      </g>
    </svg>

    <svg style="--i:1;--j:1;">
      <g id="out2">
        <mask fill="white" id="path-2-inside-2_111_3212">
          <path d="M102.892 127.966C93.3733 142.905 88.9517 160.527 90.2897 178.19L94.3752 177.88C93.1041 161.1 97.3046 144.36 106.347 130.168L102.892 127.966Z"></path>
          <path d="M93.3401 194.968C98.3049 211.971 108.646 226.908 122.814 237.541L125.273 234.264C111.814 224.163 101.99 209.973 97.2731 193.819L93.3401 194.968Z"></path>
          <path d="M152.707 92.3592C140.33 95.3575 128.822 101.199 119.097 109.421L121.742 112.55C130.981 104.739 141.914 99.1897 153.672 96.3413L152.707 92.3592Z"></path>
          <path d="M253.294 161.699C255.099 175.937 253.132 190.4 247.59 203.639L243.811 202.057C249.075 189.48 250.944 175.74 249.23 162.214L253.294 161.699Z"></path>
          <path d="M172 90.0557C184.677 90.0557 197.18 92.9967 208.528 98.6474C219.875 104.298 229.757 112.505 237.396 122.621L234.126 125.09C226.869 115.479 217.481 107.683 206.701 102.315C195.921 96.9469 184.043 94.1529 172 94.1529V90.0557Z"></path>
          <path d="M244.195 133.235C246.991 138.442 249.216 143.937 250.83 149.623L246.888 150.742C245.355 145.34 243.242 140.12 240.586 135.174L244.195 133.235Z"></path>
          <path d="M234.238 225.304C223.932 237.338 210.358 246.126 195.159 250.604C179.961 255.082 163.79 255.058 148.606 250.534L149.775 246.607C164.201 250.905 179.563 250.928 194.001 246.674C208.44 242.42 221.335 234.071 231.126 222.639L234.238 225.304Z"></path>
        </mask>
        <path mask="url(#path-2-inside-2_111_3212)" fill="#00FFFF" d="M102.892 127.966L105.579 123.75L101.362 121.063L98.6752 125.28L102.892 127.966ZM90.2897 178.19L85.304 178.567L85.6817 183.553L90.6674 183.175L90.2897 178.19ZM94.3752 177.88L94.7529 182.866L99.7386 182.488L99.3609 177.503L94.3752 177.88ZM106.347 130.168L110.564 132.855L113.251 128.638L109.034 125.951L106.347 130.168ZM93.3401 194.968L91.9387 190.168L87.1391 191.569L88.5405 196.369L93.3401 194.968ZM122.814 237.541L119.813 241.54L123.812 244.541L126.813 240.542L122.814 237.541ZM125.273 234.264L129.272 237.265L132.273 233.266L128.274 230.265L125.273 234.264ZM97.2731 193.819L102.073 192.418L100.671 187.618L95.8717 189.02L97.2731 193.819ZM152.707 92.3592L157.567 91.182L156.389 86.3226L151.53 87.4998L152.707 92.3592ZM119.097 109.421L115.869 105.603L112.05 108.831L115.278 112.649L119.097 109.421ZM121.742 112.55L117.924 115.778L121.152 119.596L124.97 116.368L121.742 112.55ZM153.672 96.3413L154.849 101.201L159.708 100.023L158.531 95.1641L153.672 96.3413ZM253.294 161.699L258.255 161.07L257.626 156.11L252.666 156.738L253.294 161.699ZM247.59 203.639L245.66 208.251L250.272 210.182L252.203 205.569L247.59 203.639ZM243.811 202.057L239.198 200.126L237.268 204.739L241.88 206.669L243.811 202.057ZM249.23 162.214L248.601 157.253L243.641 157.882L244.269 162.842L249.23 162.214ZM172 90.0557V85.0557H167V90.0557H172ZM208.528 98.6474L206.299 103.123L206.299 103.123L208.528 98.6474ZM237.396 122.621L240.409 126.611L244.399 123.598L241.386 119.608L237.396 122.621ZM234.126 125.09L230.136 128.103L233.149 132.093L237.139 129.08L234.126 125.09ZM206.701 102.315L204.473 106.791L204.473 106.791L206.701 102.315ZM172 94.1529H167V99.1529H172V94.1529ZM244.195 133.235L248.601 130.87L246.235 126.465L241.83 128.83L244.195 133.235ZM250.83 149.623L252.195 154.433L257.005 153.067L255.64 148.257L250.83 149.623ZM246.888 150.742L242.078 152.107L243.444 156.917L248.254 155.552L246.888 150.742ZM240.586 135.174L238.22 130.768L233.815 133.134L236.181 137.539L240.586 135.174ZM234.238 225.304L238.036 228.556L241.288 224.759L237.491 221.506L234.238 225.304ZM195.159 250.604L196.572 255.4L196.572 255.4L195.159 250.604ZM148.606 250.534L143.814 249.107L142.386 253.899L147.178 255.326L148.606 250.534ZM149.775 246.607L151.203 241.816L146.411 240.388L144.983 245.18L149.775 246.607ZM194.001 246.674L195.415 251.47L195.415 251.47L194.001 246.674ZM231.126 222.639L234.379 218.841L230.581 215.589L227.329 219.386L231.126 222.639ZM98.6752 125.28C88.5757 141.13 83.8844 159.826 85.304 178.567L95.2754 177.812C94.0191 161.227 98.1709 144.681 107.109 130.653L98.6752 125.28ZM90.6674 183.175L94.7529 182.866L93.9976 172.895L89.912 173.204L90.6674 183.175ZM99.3609 177.503C98.1715 161.8 102.102 146.135 110.564 132.855L102.131 127.481C92.5071 142.585 88.0368 160.4 89.3895 178.258L99.3609 177.503ZM109.034 125.951L105.579 123.75L100.205 132.183L103.661 134.385L109.034 125.951ZM88.5405 196.369C93.8083 214.41 104.78 230.259 119.813 241.54L125.815 233.542C112.512 223.558 102.802 209.532 98.1397 193.566L88.5405 196.369ZM126.813 240.542L129.272 237.265L121.274 231.263L118.815 234.54L126.813 240.542ZM128.274 230.265C115.679 220.813 106.486 207.534 102.073 192.418L92.4735 195.221C97.493 212.412 107.948 227.513 122.272 238.263L128.274 230.265ZM95.8717 189.02L91.9387 190.168L94.7415 199.767L98.6745 198.619L95.8717 189.02ZM151.53 87.4998C138.398 90.681 126.188 96.8793 115.869 105.603L122.325 113.239C131.457 105.519 142.262 100.034 153.884 97.2187L151.53 87.4998ZM115.278 112.649L117.924 115.778L125.56 109.322L122.915 106.193L115.278 112.649ZM124.97 116.368C133.616 109.059 143.846 103.866 154.849 101.201L152.495 91.4818C139.981 94.5132 128.347 100.419 118.514 108.732L124.97 116.368ZM158.531 95.1641L157.567 91.182L147.848 93.5364L148.812 97.5185L158.531 95.1641ZM248.334 162.327C250.028 175.697 248.181 189.277 242.978 201.708L252.203 205.569C258.082 191.522 260.169 176.177 258.255 161.07L248.334 162.327ZM249.521 199.027L245.741 197.445L241.88 206.669L245.66 208.251L249.521 199.027ZM248.423 203.987C254.025 190.602 256.014 175.98 254.19 161.585L244.269 162.842C245.873 175.5 244.125 188.357 239.198 200.126L248.423 203.987ZM249.858 167.174L253.923 166.659L252.666 156.738L248.601 157.253L249.858 167.174ZM172 95.0557C183.903 95.0557 195.644 97.8172 206.299 103.123L210.757 94.1717C198.717 88.1761 185.45 85.0557 172 85.0557V95.0557ZM206.299 103.123C216.954 108.429 226.233 116.135 233.406 125.634L241.386 119.608C233.281 108.874 222.796 100.167 210.757 94.1717L206.299 103.123ZM234.383 118.631L231.113 121.1L237.139 129.08L240.409 126.611L234.383 118.631ZM238.116 122.077C230.393 111.849 220.403 103.552 208.93 97.8393L204.473 106.791C214.56 111.814 223.345 119.11 230.136 128.103L238.116 122.077ZM208.93 97.8393C197.458 92.1263 184.816 89.1529 172 89.1529V99.1529C183.269 99.1529 194.385 101.767 204.473 106.791L208.93 97.8393ZM177 94.1529V90.0557H167V94.1529H177ZM239.79 135.601C242.416 140.49 244.504 145.649 246.02 150.988L255.64 148.257C253.927 142.225 251.567 136.395 248.601 130.87L239.79 135.601ZM249.464 144.813L245.523 145.932L248.254 155.552L252.195 154.433L249.464 144.813ZM251.698 149.376C250.067 143.628 247.818 138.073 244.991 132.808L236.181 137.539C238.666 142.168 240.644 147.052 242.078 152.107L251.698 149.376ZM242.951 139.579L246.561 137.64L241.83 128.83L238.22 130.768L242.951 139.579ZM230.441 222.051C220.763 233.351 208.017 241.603 193.746 245.808L196.572 255.4C212.698 250.649 227.101 241.325 238.036 228.556L230.441 222.051ZM193.746 245.808C179.475 250.012 164.291 249.99 150.033 245.742L147.178 255.326C163.289 260.125 180.447 260.151 196.572 255.4L193.746 245.808ZM153.397 251.962L154.567 248.035L144.983 245.18L143.814 249.107L153.397 251.962ZM148.348 251.399C163.7 255.973 180.049 255.997 195.415 251.47L192.588 241.877C179.077 245.858 164.702 245.837 151.203 241.816L148.348 251.399ZM195.415 251.47C210.78 246.942 224.504 238.058 234.924 225.891L227.329 219.386C218.167 230.084 206.099 237.897 192.588 241.877L195.415 251.47ZM227.874 226.436L230.986 229.101L237.491 221.506L234.379 218.841L227.874 226.436Z"></path>
      </g>
    </svg>

    <svg style="--i:0;--j:2;">
      <g id="inner3">
        <path d="M195.136 135.689C188.115 131.215 179.948 128.873 171.624 128.946C163.299 129.019 155.174 131.503 148.232 136.099L148.42 136.382C155.307 131.823 163.368 129.358 171.627 129.286C179.886 129.213 187.988 131.537 194.954 135.975L195.136 135.689Z"></path>
        <path d="M195.136 208.311C188.115 212.784 179.948 215.127 171.624 215.054C163.299 214.981 155.174 212.496 148.232 207.901L148.42 207.618C155.307 212.177 163.368 214.642 171.627 214.714C179.886 214.786 187.988 212.463 194.954 208.025L195.136 208.311Z"></path>
        <path mask="url(#path-5-inside-3_111_3212)" fill="#00FFFF" d="M195.136 135.689L195.474 135.904L195.689 135.566L195.351 135.352L195.136 135.689ZM171.624 128.946L171.627 129.346L171.624 128.946ZM148.232 136.099L148.011 135.765L147.678 135.986L147.899 136.32L148.232 136.099ZM148.42 136.382L148.086 136.603L148.307 136.936L148.641 136.716L148.42 136.382ZM171.627 129.286L171.63 129.686L171.627 129.286ZM194.954 135.975L194.739 136.313L195.076 136.528L195.291 136.19L194.954 135.975ZM195.136 208.311L195.351 208.648L195.689 208.433L195.474 208.096L195.136 208.311ZM171.624 215.054L171.627 214.654L171.624 215.054ZM148.232 207.901L147.899 207.68L147.678 208.014L148.011 208.234L148.232 207.901ZM148.42 207.618L148.641 207.284L148.307 207.063L148.086 207.397L148.42 207.618ZM171.627 214.714L171.63 214.314L171.627 214.714ZM194.954 208.025L195.291 207.81L195.076 207.472L194.739 207.687L194.954 208.025ZM195.351 135.352C188.265 130.836 180.022 128.473 171.62 128.546L171.627 129.346C179.874 129.274 187.966 131.594 194.921 136.026L195.351 135.352ZM171.62 128.546C163.218 128.619 155.018 131.127 148.011 135.765L148.453 136.432C155.33 131.88 163.38 129.418 171.627 129.346L171.62 128.546ZM147.899 136.32L148.086 136.603L148.753 136.161L148.566 135.878L147.899 136.32ZM148.641 136.716C155.463 132.199 163.448 129.757 171.63 129.686L171.623 128.886C163.287 128.958 155.15 131.447 148.199 136.049L148.641 136.716ZM171.63 129.686C179.812 129.614 187.839 131.916 194.739 136.313L195.169 135.638C188.138 131.158 179.959 128.813 171.623 128.886L171.63 129.686ZM195.291 136.19L195.474 135.904L194.799 135.474L194.617 135.76L195.291 136.19ZM194.921 207.974C187.966 212.406 179.874 214.726 171.627 214.654L171.62 215.454C180.022 215.527 188.265 213.163 195.351 208.648L194.921 207.974ZM171.627 214.654C163.38 214.582 155.33 212.12 148.453 207.567L148.011 208.234C155.018 212.873 163.218 215.38 171.62 215.454L171.627 214.654ZM148.566 208.122L148.753 207.838L148.086 207.397L147.899 207.68L148.566 208.122ZM148.199 207.951C155.15 212.553 163.287 215.041 171.623 215.114L171.63 214.314C163.448 214.243 155.463 211.801 148.641 207.284L148.199 207.951ZM171.623 215.114C179.959 215.187 188.138 212.842 195.169 208.362L194.739 207.687C187.839 212.084 179.812 214.386 171.63 214.314L171.623 215.114ZM194.617 208.239L194.799 208.526L195.474 208.096L195.291 207.81L194.617 208.239Z"></path>
      </g>
      <path stroke="#00FFFF" d="M240.944 172C240.944 187.951 235.414 203.408 225.295 215.738C215.176 228.068 201.095 236.508 185.45 239.62C169.806 242.732 153.567 240.323 139.5 232.804C125.433 225.285 114.408 213.12 108.304 198.384C102.2 183.648 101.394 167.25 106.024 151.987C110.654 136.723 120.434 123.537 133.696 114.675C146.959 105.813 162.884 101.824 178.758 103.388C194.632 104.951 209.472 111.97 220.751 123.249" id="out3"></path>
    </svg>

    <svg style="--i:1;--j:3;">
      <g id="inner1">
        <path fill="#00FFFF" d="M145.949 124.51L148.554 129.259C156.575 124.859 165.672 122.804 174.806 123.331C183.94 123.858 192.741 126.944 200.203 132.236C207.665 137.529 213.488 144.815 217.004 153.261C220.521 161.707 221.59 170.972 220.09 179.997L224.108 180.665L224.102 180.699L229.537 181.607C230.521 175.715 230.594 169.708 229.753 163.795L225.628 164.381C224.987 159.867 223.775 155.429 222.005 151.179C218.097 141.795 211.628 133.699 203.337 127.818C195.045 121.937 185.266 118.508 175.118 117.923C165.302 117.357 155.525 119.474 146.83 124.037C146.535 124.192 146.241 124.349 145.949 124.51ZM224.638 164.522C224.009 160.091 222.819 155.735 221.082 151.563C217.246 142.352 210.897 134.406 202.758 128.634C194.62 122.862 185.021 119.496 175.06 118.922C165.432 118.367 155.841 120.441 147.311 124.914L148.954 127.91C156.922 123.745 165.876 121.814 174.864 122.333C184.185 122.87 193.166 126.019 200.782 131.421C208.397 136.822 214.339 144.257 217.928 152.877C221.388 161.188 222.526 170.276 221.23 179.173L224.262 179.677C224.998 174.671 225.35 169.535 224.638 164.522Z" clip-rule="evenodd" fill-rule="evenodd"></path>
        <path fill="#00FFFF" d="M139.91 220.713C134.922 217.428 130.469 213.395 126.705 208.758L130.983 205.286L130.985 205.288L134.148 202.721C141.342 211.584 151.417 217.642 162.619 219.839C173.821 222.036 185.438 220.232 195.446 214.742L198.051 219.491C197.759 219.651 197.465 219.809 197.17 219.963C186.252 225.693 173.696 227.531 161.577 225.154C154.613 223.789 148.041 221.08 142.202 217.234L139.91 220.713ZM142.752 216.399C148.483 220.174 154.934 222.833 161.769 224.173C173.658 226.504 185.977 224.704 196.689 219.087L195.046 216.09C185.035 221.323 173.531 222.998 162.427 220.82C151.323 218.643 141.303 212.747 134.01 204.122L131.182 206.5C134.451 210.376 138.515 213.607 142.752 216.399Z" clip-rule="evenodd" fill-rule="evenodd"></path>
      </g>
    </svg>

    <svg style="--i:2;--j:4;">
      <path fill="#00FFFF" d="M180.956 186.056C183.849 184.212 186.103 181.521 187.41 178.349C188.717 175.177 189.013 171.679 188.258 168.332C187.503 164.986 185.734 161.954 183.192 159.65C180.649 157.346 177.458 155.883 174.054 155.46C170.649 155.038 167.197 155.676 164.169 157.288C161.14 158.9 158.683 161.407 157.133 164.468C155.582 167.528 155.014 170.992 155.505 174.388C155.997 177.783 157.524 180.944 159.879 183.439L161.129 182.259C159.018 180.021 157.648 177.186 157.207 174.141C156.766 171.096 157.276 167.989 158.667 165.245C160.057 162.5 162.261 160.252 164.977 158.806C167.693 157.36 170.788 156.788 173.842 157.167C176.895 157.546 179.757 158.858 182.037 160.924C184.317 162.99 185.904 165.709 186.581 168.711C187.258 171.712 186.992 174.849 185.82 177.694C184.648 180.539 182.627 182.952 180.032 184.606L180.956 186.056Z" id="center1"></path>
      <path fill="#00FFFF" d="M172 166.445C175.068 166.445 177.556 168.932 177.556 172C177.556 175.068 175.068 177.556 172 177.556C168.932 177.556 166.444 175.068 166.444 172C166.444 168.932 168.932 166.445 172 166.445ZM172 177.021C174.773 177.021 177.021 174.773 177.021 172C177.021 169.227 174.773 166.979 172 166.979C169.227 166.979 166.979 169.227 166.979 172C166.979 174.773 169.227 177.021 172 177.021Z" id="center"></path>
    </svg>

  </div>
  <a href="#black" id="black"></a>

<!-- Blog Kartica 1 -->
    <div class="containor">
    <div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url(https://www.decodedmagazine.com/wp-content/uploads/2021/05/the-yellowheads.jpg)"></div>
      <ul class="details">
        <li class="author"><a href="#">The Yellowheads</a></li>
        <li class="date">Aug. 24, 2015</li>
        <li class="tags">
          <ul>
            <li><a href="#">Techno</a></li>
            <li><a href="#">Hard techno</a></li>
            <li><a href="#">Future Techno</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="description">
      <h1>The Yellowheads </h1>
      <h2>Boogaloo Zagerb</h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
      <p class="read-more">
        <a href="#">Read More</a>
      </p>
    </div>
  </div>
<!-- Blog Kartica 2 -->
  <div class="blog-card alt">
    <div class="meta">
      <div class="photo" style="background-image: url(https://media.timeout.com/images/105595631/image.jpg)"></div>
      <ul class="details">
        <li class="author"><a href="#">Umek</a></li>
        <li class="date">July. 15, 2015</li>
        <li class="tags">
          <ul>
          <li><a href="#">Techno</a></li>
            <li><a href="#">Hard techno</a></li>
            <li><a href="#">Future Techno</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="description">
      <h1>Umek</h1>
      <h2>Depo Zagerb</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
      <p class="read-more">
        <a href="#">Read More</a>
      </p>
    </div>
  </div>
<!-- Blog kartica 3 -->
  <div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url(https://d3vhc53cl8e8km.cloudfront.net/artists/2996/1e4631ba-2c77-11ec-954e-0ecc81f4ee58.jpg)"></div>
      <ul class="details">
        <li class="author"><a href="#">Eli Brown</a></li>
        <li class="date">Aug. 24, 2015</li>
        <li class="tags">
          <ul>
          <li><a href="#">Techno</a></li>
            <li><a href="#">Hard techno</a></li>
            <li><a href="#">Future Techno</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="description">
      <h1>Eli Brown</h1>
      <h2>Opening a door to the future - Pag</h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
      <p class="read-more">
        <a href="#">Read More</a>
      </p>
    </div>
  </div>
<!-- Blog kartica 4 -->
  <div class="blog-card alt">
    <div class="meta">
      <div class="photo" style="background-image: url(https://i.ytimg.com/vi/bOEa1BjA1Bo/maxresdefault.jpg)"></div>
      <ul class="details">
        <li class="author"><a href="#">Space 92</a></li>
        <li class="date">July. 15, 2015</li>
        <li class="tags">
          <ul>
          <li><a href="#">Techno</a></li>
            <li><a href="#">Hard techno</a></li>
            <li><a href="#">Future Techno</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="description">
      <h1>Space 92</h1>
      <h2>Ultra Split</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
      <p class="read-more">
        <a href="#">Read More</a>
      </p>
    </div>
  </div>
<!-- Hold my beer button -->
  <button>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path style="fill:#363636" d="M17.1,21a1,1,0,0,1-1-.945C16.036,18.754,16,17.39,16,16a1,1,0,0,1,2,0c0,1.354.035,2.681.1,3.945A1,1,0,0,1,17.159,21,.5.5,0,0,1,17.1,21Z"></path><path style="fill:#363636" d="M46.9,21a.5.5,0,0,1-.055,0,1,1,0,0,1-.945-1.053c.069-1.264.1-2.591.1-3.945a1,1,0,0,1,2,0c0,1.39-.036,2.754-.106,4.055A1,1,0,0,1,46.9,21Z"></path><path style="fill:#ffbd4a" d="M47.544,24.117A1,1,0,0,0,46.551,23H43a4.005,4.005,0,0,1-.28,1,1.994,1.994,0,0,1-2.056.973A1.947,1.947,0,0,1,39.3,24a3.786,3.786,0,0,1-.3-1H17.449a1,1,0,0,0-.993,1.117A57.092,57.092,0,0,0,19.546,37c.388,0,.732-.009,1.048-.029L20.6,37h4.9a2.5,2.5,0,0,1,0,5,2.5,2.5,0,0,1,0,5,2.5,2.5,0,0,1,0,5H24.3a2.145,2.145,0,0,0-1.515,0h-.038v.01a6.155,6.155,0,0,1-1.029.2,50.273,50.273,0,0,1-1.024,6.1A3,3,0,0,0,23.611,62H40.389a3,3,0,0,0,2.92-3.685A50.2,50.2,0,0,1,42,47c0-3.026.921-5.641,1.988-8.668a.975.975,0,0,0,.05-.324A9.1,9.1,0,0,1,43.045,38H38a3,3,0,0,1,0-6h6.987c.006-.023.012-.048.018-.07.306.036.639.055,1.016.062A54.206,54.206,0,0,0,47.544,24.117Z"></path><path style="fill:#363636" d="M19.421,11a.981.981,0,0,1-.4-.084A1,1,0,0,1,18.506,9.6,6,6,0,0,1,24,6a5.742,5.742,0,0,1,1.58.222A6.99,6.99,0,0,1,37.426,4.585,5.939,5.939,0,0,1,40,4a6.006,6.006,0,0,1,6,6,1,1,0,0,1-2,0,3.991,3.991,0,0,0-6.29-3.271,1,1,0,0,1-1.43-.3,4.991,4.991,0,0,0-9.121,1.344,1,1,0,0,1-1.41.652A3.993,3.993,0,0,0,20.338,10.4,1,1,0,0,1,19.421,11Z"></path><path style="fill:#363636" d="M47,17a1,1,0,0,1-1-1,1,1,0,0,0-1-1h-.17a.831.831,0,0,0-.83.83,1,1,0,0,1-2,0A2.834,2.834,0,0,1,44.83,13H45a3,3,0,0,1,3,3A1,1,0,0,1,47,17Z"></path><path style="fill:#363636" d="M32,20c-.071,0-.143,0-.215,0A4.089,4.088,0,0,1,28,15.83a.831.831,0,0,0-.83-.83H19a1,1,0,0,0-1,1,1,1,0,0,1-2,0,3,3,0,0,1,3-3h8.17A2.834,2.834,0,0,1,30,15.83,2.118,2.118,0,0,0,31.891,18,2,2,0,0,0,34,16a3,3,0,0,1,6,0,1,1,0,0,1-2,0,1,1,0,0,0-2,0,4.017,4.017,0,0,1-1.246,2.9A3.968,3.968,0,0,1,32,20Z"></path><path style="fill:#363636" d="M25.5,43h-5a3.5,3.5,0,0,1,0-7h5a3.5,3.5,0,0,1,0,7Zm-5-5a1.5,1.5,0,0,0,0,3h5a1.5,1.5,0,0,0,0-3Z"></path><path style="fill:#363636" d="M25.5,48h-5a3.5,3.5,0,0,1,0-7h5a3.5,3.5,0,0,1,0,7Zm-5-5a1.5,1.5,0,0,0,0,3h5a1.5,1.5,0,0,0,0-3Z"></path><path style="fill:#363636" d="M25.5,53h-5a3.5,3.5,0,0,1,0-7h5a3.5,3.5,0,0,1,0,7Zm-5-5a1.5,1.5,0,0,0,0,3h5a1.5,1.5,0,0,0,0-3Z"></path><path style="fill:#363636" d="M45,39H38a4,4,0,0,1,0-8h8a1,1,0,0,1,0,2H38a2,2,0,0,0,0,4h7a1,1,0,0,1,0,2Z"></path><path style="fill:#363636" d="M58,37H51a1,1,0,0,1-1-1,3,3,0,0,0-3-3H46a1,1,0,0,1,0-2h1a5.008,5.008,0,0,1,4.9,4H58a1,1,0,0,1,0,2Z"></path><path style="fill:#363636" d="M47,55H46a1,1,0,0,1,0-2h1a3,3,0,0,0,3-3,1,1,0,0,1,1-1h7a1,1,0,0,1,0,2H51.9A5.008,5.008,0,0,1,47,55Z"></path><path style="fill:#363636" d="M41,26a3.152,3.152,0,0,1-.493-.04A3.084,3.084,0,0,1,38,22.893V16a1,1,0,0,1,2,0v6.893a1.083,1.083,0,0,0,.825,1.092A1,1,0,0,0,42,23V15.83a1,1,0,1,1,2,0V23a3,3,0,0,1-3,3Z"></path></svg>
  <label> Hold my beer
</label>
</button>
</div>
<script>
//Cili js code
  document.addEventListener('click', function (event) {
    var dropdowns = document.getElementsByClassName('dropdown-content');
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.style.display === 'block' && !event.target.matches('.dropbtn')) {
        openDropdown.style.display = 'none';
      }
    }
  });
</script>
</body>
</html>