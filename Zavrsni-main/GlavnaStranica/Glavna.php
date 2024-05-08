<?php 
// Inicijalizacija sesije i uključivanje potrebnih datoteka:
  session_start();
  include("../Login/Spajanje.php");
  include("../Login/Funkcije.php");
  $user_data = check_login($con);
  $user_data['ImeSlika']; 
// Korisnik je prijavljen, prikaži gumb za dodavanje objave
  if (isset($_SESSION['Korisnik_id'])) {
     
    echo '<button id="btn1"><a href="objave.php">Dodaj objavu</a>
    <span class="first"></span>
    <span class="second"></span>
    <span class="third"></span>
    <span class="fourth"></span></button>';
    
  } 

// Korisnik nije prijavljen, prikaži poruku ili poduzmi odgovarajuće radnje

  else {
    
    echo '<button id="No"><a href="../Login/LogOut.php">Logiraj se da bi objavio</a>
    <span class="first"></span>
    <span class="second"></span>
    <span class="third"></span>
    <span class="fourth"></span></button>';
  }
  if (!empty($user_data['ImeSlika'])) {
    $profilePicture = "Profilne/" . $user_data['ImeSlika'];
  }  
  else {

    $profilePicture = "Profilne/user1.png"; 
  }


?>
<head>
<link rel="stylesheet" href="Glavna.css">
<link rel="stylesheet" href="Navbar/Navbar.css">
<link rel="icon" href="../IconKitchen-Output/web/icon-512.png" sizes="any">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
@import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap");
  .hero-banner {
    align-items: center;
    display: flex;
    height: 60vh;
    position: relative;
    justify-content: center;
    z-index: -1;
  }

  .hero-banner__title {
    color: #fff;
    font-size: 100px;
    font-weight: 700;
    padding: 0 20px;
    position: absolute;
    text-align: center;
    text-transform: uppercase;
  }

  .hero-banner__stroked-title {
    color: transparent;
    -webkit-text-stroke: 2px white;
    text-stroke: 2px white;
  }

  .hero-banner__image {
    border-radius: 20px;
    position: fixed;
    transform: rotate(-15deg);
    width: 450px;
  }






/* Card design */
  #container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    max-width: 1200px;
    margin-block: 2rem;
    gap: 2rem;
    
  }

  img {
    max-width: 100%;
    display: block;
    object-fit: cover;
  }

  .card {
    display: flex;
    flex-direction: column;
    width: clamp(20rem, calc(20rem + 2vw), 22rem);
    overflow: hidden;
    box-shadow: 0 .1rem 1rem rgba(0, 0, 0, 0.1);
    border-radius: 1em;
    background: #ECE9E6;
  background: linear-gradient(to right, #FFFFFF, #ECE9E6);

  }



  .card__body {
    padding: 1rem;
    display: flex;
    flex-direction: column;
    gap: .5rem;
  }


  .tag {
    align-self: flex-start;
    padding: .25em .75em;
    border-radius: 1em;
    font-size: .75rem;
  }

  .tag + .tag {
    margin-left: .5em;
  }

  .tag-blue {
    background: #56CCF2;
  background: linear-gradient(to bottom, #c2d9f8, #c5f1ff);
    color: #fafafa;
  }

  .tag-brown {
    background: #D1913C;
  background: linear-gradient(to bottom, #FFD194, #D1913C);
    color: #fafafa;
  }

  .tag-red {
    background: #cb2d3e;
  background: linear-gradient(to bottom, #ef473a, #cb2d3e);
    color: #fafafa;
  }

  .card__body h4 {
    font-size: 1.5rem;
    text-transform: capitalize;
  }

  .card__footer {
    display: flex;
    padding: 1rem;
    margin-top: auto;
  }

  .user {
    display: flex;
    gap: .5rem;
  }

  .user__image {
    border-radius: 50%;
  }

  .user__info > small {
    color: #666;
  }
/* Botun za Objave */
  button {
    border: none;
    padding: 20px 40px;
    font-size: 14px;
    position: relative;
    background: transparent;
    color: #ffa500;
    text-transform: uppercase;
    border: 3px solid #ffa500;
    cursor: pointer;
    transition: all 0.7s;
    overflow: hidden;
    border-radius: 50px;
  }

  button:hover {
    color: #000;
  }
  span {
    transition: all 0.7s;
    z-index: -1;
  }

  button .first {
    content: "";
    position: absolute;
    right: 100%;
    top: 0;
    width: 25%;
    height: 100%;
    background: #ffa500;
  }

  button:hover .first {
    top: 0;
    right: 0;
  }
  button .second {
    content: "";
    position: absolute;
    left: 25%;
    top: -100%;
    height: 100%;
    width: 25%;
    background: #ffa500;
  }

  button:hover .second {
    top: 0;
    left: 50%;
  }

  button .third {
    content: "";
    position: absolute;
    left: 50%;
    height: 100%;
    top: 100%;
    width: 25%;
    background: #ffa500;
  }

  button:hover .third {
    top: 0;
    left: 25%;
  }

  button .fourth {
    content: "";
    position: absolute;
    left: 100%;
    top: 0;
    height: 100%;
    width: 25%;
    background: #ffa500;
  }

  button:hover .fourth {
    top: 0;
    left: 0;
  }
  @import url('https://fonts.googleapis.com/css?family=Alegreya+Sans:800,900');


  @import url("https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@400;500&display=swap");

  .container {
    display: grid;
    grid-template-columns: 300px 300px 300px;
    grid-gap: 50px;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: transparent;
    font-family: 'Baloo Paaji 2', cursive;
  }




/* Dizajn Za linkove */

  .a {
    color: #18272F;
    position: relative;
    text-decoration: none;
    background-color:transparent;
  }

  .a::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 4px;
    border-radius: 4px;
    background-color: #18272F;
    bottom: 0;
    left: 0;
    transform-origin: right;
    transform: scaleX(0);
    transition: transform .3s ease-in-out;
  }

  .a:hover::before {
    transform-origin: left;
    transform: scaleX(1);
  }

/* Botuni za log in */

  #no{
    position: fixed;
    bottom: 10px;
    left: 93.5%;
    transform: translateX(-50%);
  }
  #btn1{
    position: fixed;
    bottom: 10px;
    left: 93.5%;
    transform: translateX(-50%);
  }
/* Pozicija Log in Log out botuna */
        
  .fixed-div {
              background: linear-gradient(to left, #141313, #1a1b1d, #000000);
              position: fixed;
              top: 0;
              left: 0;
              background-color: #3498db;
              color: #fff;
              padding: 10px;
              border-radius: 0 0 0 10px;
              box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
              z-index: 999; /* Ensures it's above other content */
          }

          .fixed-div a {
              text-decoration: none;
              color: #fff;
              padding: 5px 15px;
              margin-right: 10px;
              background-color: #1e70b9;
              border-radius: 5px;
          }

          .fixed-div a:hover {
              background-color: #135192;
          }

          .fixed-div p {
              margin: 0;
              font-size: 16px;
              padding :12px;
          }
/* Dizajn Kocke ispod naslova */
    .grid-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 20px;
    font-size: 1.2em;
  }
  * {
    box-sizing: border-box;
  }

  .cube-container {
    width: 200px;
    height: 200px;
    perspective: 800px;
    margin: 50px auto;
  }

  .cube {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    animation: rotate 8s infinite linear;
  }

  .face {
    position: absolute;
    width: 200px;
    height: 200px;
    color: rgb(214, 21, 21);
    font-size: 18px;
    text-align: center;
    line-height: 200px;
    background: transparent;
    opacity: 0.9;
    border: 2px solid;
    border-image: linear-gradient(to right, #ff6b6b, #355c7d, #557d35, #cfcf16, #a51f1f) 1;
    box-shadow: 0 0 100px rgba(245, 8, 8, 0.8);
  }

  .front {
    transform: translateZ(100px);

  }

  .back {
    transform: rotateY(180deg) translateZ(100px);
    
  }

  .right {
    transform: rotateY(90deg) translateZ(100px);
  }

  .left {
    transform: rotateY(-90deg) translateZ(100px);
  }

  .top {
    transform: rotateX(90deg) translateZ(100px);
  }

  .bottom {
    transform: rotateX(-90deg) translateZ(100px);
  }

  .cube-container:hover .cube {
    animation-play-state: paused;
  }

  @keyframes rotate {
    0% {
      transform: rotateX(0) rotateY(0) rotateZ(0);
    }

    100% {
      transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
    }
  }


/* Dizajn za body */
  body {
    font-family: "Quicksand", sans-serif;
    display: grid;
    place-items: center;
    height: 180vh;
    background-color: #000000;
    background-image: url(http://transparenttextures.com/patterns/black-thread.png);
  }
  
/* Dizajn Za Formu */
  .form {
    position: relative;
    display: block;
    padding: 2.2rem;
    max-width: 350px;
    background: linear-gradient(14deg, rgba(2,0,36, 0.8) 0%, rgba(24, 24, 65, 0.7) 66%, 
              rgb(20, 76, 99) 100%), radial-gradient(circle, rgba(2,0,36, 0.5) 0%, 
              rgba(32, 15, 53, 0.2) 65%, rgba(14, 29, 28, 0.9) 100%);
    border: 2px solid #fff;
    -webkit-box-shadow: rgba(0,212,255) 0px 0px 50px -15px;
    box-shadow: rgba(0,212,255) 0px 0px 50px -15px;
    overflow: hidden;
    z-index: +1;
  }

  /*------input and submit section-------*/

  .input-container {
    position: relative;
  }

  .input-container input, .form button {
    outline: none;
    border: 2px solid #ffffff;
    margin: 8px 0;
    font-family: monospace;
  }

  .input-container input {
    background-color: #fff;
    padding: 0px;
    font-size: 0.875rem;
    line-height: 1.25rem;
    width:100%;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  }
  .input-pwd{
    height:10%;
  }
  .input-mail:focus::placeholder {
    opacity: 0;
    transition: opacity .9s;
  }

  .input-pwd:focus::placeholder {
    opacity: 0;
    transition: opacity .9s;
  }

  .submit {
    position: relative;
    display: block;
    padding: 8px;
    background-color: #c0c0c0;
    color: #ffffff;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
    font-size: 0.875rem;
    line-height: 1.25rem;
    font-weight: 500;
    width: 100%;
    text-transform: uppercase;
    overflow: hidden;
  }

  .submit:hover {
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
    border-radius: 3.9px;
    box-shadow: 4px 5px 17px -4px #ffffff;
    cursor: pointer;
  }

  .submit:hover::before {
    -webkit-animation: sh02 0.5s 0s linear;
    -moz-animation: sh02 0.5s 0s linear;
    animation: sh02 .5s 0s linear;
  }

  .submit::before {
    content: '';
    display: block;
    width: 0px;
    height: 85%;
    position: absolute;
    top: 50%;
    left: 0%;
    opacity: 0;
    background: #fff;
    box-shadow: 0 0 50px 30px #fff;
    -webkit-transform: skewX(-20deg);
    -moz-transform: skewX(-20deg);
    -ms-transform: skewX(-20deg);
    -o-transform: skewX(-20deg);
    transform: skewX(-20deg);
  }

  @keyframes sh02 {
    from {
      opacity: 0;
      left: 0%;
    }

    50% {
      opacity: 1;
    }

    to {
      opacity: 0;
      left: 100%;
    }
  }

  /*--------signup section---------*/

  .signup-link {
    color: #c0c0c0;
    font-size: 0.875rem;
    line-height: 1.25rem;
    text-align: center;
    font-family: monospace;
  }

  .signup-link a {
    color: #fff;
    text-decoration: none;
  }

  .up:hover {
    text-decoration: underline;
  }


  /*--------header section-----------*/

  .form-title {
    font-size: 1.25rem;
    line-height: 1.75rem;
    font-family: monospace;
    font-weight: 600;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
    animation-duration: 1.5s;
    overflow: hidden;
    transition: .12s;
  }

  .form-title span {
    animation: flickering 2s linear infinite both;
  }

  .title-2 {
    display: block;
    margin-top: -0.5rem;
    font-size: 2.1rem;
    font-weight: 800;
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    -webkit-text-stroke: #fff 0.1rem;
    letter-spacing: 0.2rem;
    color: transparent;
    position: relative;
    text-shadow: 0px 0px 16px #CECECE;
  }


  @keyframes flickering {
    0%,
    100% {
      opacity: 1;
    }

    41.99% {
      opacity: 1;
    }

    42% {
      opacity: 0;
    }

    43% {
      opacity: 0;
    }

    43.01% {
      opacity: 1;
    }

    47.99% {
      opacity: 1;
    }

    48% {
      opacity: 0;
    }

    49% {
      opacity: 0;
    }

    49.01% {
      opacity: 1;
    }
  }

  /*---------shooting stars-----------*/


  .bg-stars {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -2;
    background-size: cover;
    animation: animateBg 50s linear infinite;
  }

  @keyframes animateBg {
    0%,100% {
      transform: scale(1);
    }

    50% {
      transform: scale(1.2);
    }
  }

  .star {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 4px;
    height: 4px;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 0 0 4px rgba(255,255,255,0.1),0 0 0 8px rgba(255,255,255,0.1),0 0 20px rgba(255,255,255,0.1);
    animation: animate 3s linear infinite;
  }

  .star::before {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 300px;
    height: 1px;
    background: linear-gradient(90deg,#fff,transparent);
  }

  @keyframes animate {
    0% {
      transform: rotate(315deg) translateX(0);
      opacity: 1;
    }

    70% {
      opacity: 1;
    }

    100% {
      transform: rotate(315deg) translateX(-1000px);
      opacity: 0;
    }
  }

  .star:nth-child(1) {
    top: 0;
    right: 0;
    left: initial;
    animation-delay: 0s;
    animation-duration: 1s;
  }

  .star:nth-child(2) {
    top: 0;
    right: 100px;
    left: initial;
    animation-delay: 0.2s;
    animation-duration: 3s;
  }

  .star:nth-child(3) {
    top: 0;
    right: 220px;
    left: initial;
    animation-delay: 2.75s;
    animation-duration: 2.75s;
  }

  .star:nth-child(4) {
    top: 0;
    right: -220px;
    left: initial;
    animation-delay: 1.6s;
    animation-duration: 1.6s;
  }
  /* File upload */


  .custum-file-upload {
    height: 200px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: space-between;
    gap: 20px;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    border: 2px dashed #e8e8e8;
    background-color: #212121;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0px 48px 35px -48px #e8e8e8;
  }

  .custum-file-upload .icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .custum-file-upload .icon svg {
    height: 80px;
    fill: #e8e8e8;
  }

  .custum-file-upload .text {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .custum-file-upload .text span {
    font-weight: 400;
    color: #e8e8e8;
  }

  .custum-file-upload input {
    display: none;
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
            <li><a href="#">Home</a></li>
            <li><a href="Novosti.php">Novosti</a></li>
            <li><a href="Najpopularnije.php">Najpopularnije</a></li>
            <li><a href="Chat.php">Chat</a></li>
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

<!-- Kocka u pozadini i Naslov -->
  <div class="hero-banner">
  <div class="hero-banner__title" aria-hidden="true">Techno Zona </div>
  <img class="hero-banner__image" />
  <div class="cube-container">
  <div class="cube">
  <div class="face front"></div>
  <div class="face back"></div>
  <div class="face right"></div>
  <div class="face left"></div>
  <div class="face top"></div>
  <div class="face bottom"></div>
  </div>
  </div>

  <h1 class="hero-banner__title hero-banner__stroked-title">Techno Zona </h1>
  </div>
<!-- Container sa svim objavama -->
  <div id="container">
   
    <?php
// Include database connection
include("../Login/Spajanje.php");

// Query to get last 10 inputs from the database
$sql = "SELECT * FROM objave ORDER BY ID DESC LIMIT 6";
$result = $con->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="card__header">';
        echo '<img src="uploads/' . $row["Slika"] . '" alt="card__image" class="card__image" width="600">';
        echo '</div>';
        echo '<div class="card__body">';
        echo '<span class="tag tag-blue">' . $row["Naslov"] . '</span>';
        echo '<h4>' . $row["Naslov"] . '</h4>';
        echo '<p>' . $row["Komentar"] . '</p>';
        echo '</div>';
        echo '<div class="card__footer">';
        echo '<div class="user">';
        echo '<img style="width:40px;height:40px;" src="Profilne/'. $user_data['ImeSlika'] .'" alt="user__image" class="user__image">';
        echo '<div class="user__info">';
        echo '<h5>' . $row["Korisnik"] . '</h5>';
        echo '<small>' . date("Y-m-d H:i:s", strtotime($row["Datum"])) . '</small>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

// Close database connection
$con->close();
?>
  </div>
  

 
<script>
//Cili JQuery
 
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
