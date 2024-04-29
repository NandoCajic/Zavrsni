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
    // If no profile picture, use a default image
    $profilePicture = "Profilne/user1.png"; // Adjust the path to your default image
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
/* Design za Naslov */
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
  float: left;
  margin: 20px; /* Add margin to create space between cards */
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
  width: 40px;
  height:40px;
}

.user__info > small {
  color: #666;
}

  .user {
    display: flex;
    gap: .5rem;
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
    <div class="card">
      <div class="card__header">
        <img src="https://i.ytimg.com/vi/bOEa1BjA1Bo/maxresdefault.jpg" alt="card__image" class="card__image" width="600">
      </div>
      <div class="card__body">
        <span class="tag tag-blue">Technology</span>
        <h4>Umek</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
        
      </div>
      <div class="card__footer">
        <div class="user">
          <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
          <div class="user__info">
            <h5>Jane Doe</h5>
            <small>2h ago</small>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card__header">
        <img src="https://media.timeout.com/images/105595631/image.jpg" alt="card__image" class="card__image" width="600">
      </div>
      <div class="card__body">
        <span class="tag tag-brown">Food</span>
        <h4>Space 92</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
      </div>
      <div class="card__footer">
        <div class="user">
          <img src="https://i.pravatar.cc/40?img=2" alt="user__image" class="user__image">
          <div class="user__info">
            <h5>Jony Doe</h5>
            <small>Yesterday</small>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card__header">
        <img src="https://www.decodedmagazine.com/wp-content/uploads/2021/05/the-yellowheads.jpg" alt="card__image" class="card__image" width="600">
      </div>
      <div class="card__body">
        <span class="tag tag-red">Automobile</span>
        <h4>The yellowheads</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
      </div>
      <div class="card__footer">
        <div class="user">
          <img src="https://i.pravatar.cc/40?img=3" alt="user__image" class="user__image">
          <div class="user__info">
            <h5>John Doe</h5>
            <small>2d ago</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
// Include database connection
include("../Login/Spajanje.php");

// Query to get last 10 inputs from the database
$sql = "SELECT * FROM objave ORDER BY ID DESC LIMIT 1";
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
        echo '<img src="Profilne/'. $user_data['ImeSlika'] .'" alt="user__image" class="user__image">';
        echo '<div class="user__info">';
        echo '<h5>' . $row["Korisnik"] . '</h5>';
        echo '<small>' . date("Y-m-d H:i:s", strtotime($row["Datum"])) . '</small>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div><hr>';
    }
} else {
    echo "0 results";
}

// Close database connection
$con->close();
?>

 
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
