<!DOCTYPE html>
<html>
<?php
session_start();

include("../Login/Spajanje.php"); // Assuming this file contains the database connection
include("../Login/Funkcije.php");
  $user_data = check_login($con);
  $user_data1 = check_login($con);
  $user_data1['Korisnik'];
  $user_data['ImeSlika']; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO objave (Korisnik,Profilna,Slika, Naslov, Komentar) VALUES (?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Error: " . $con->error); 
    }

    $stmt->bind_param("sssss", $user_data1['Korisnik'], $user_data['ImeSlika'], $slika, $naslov, $komentar);

   
    $naslov = $_POST['Naslov'];

    $slika = $_FILES['Slika']['name'];

    
    $target_dir = "uploads/"; 
    $target_file = $target_dir . basename($_FILES["Slika"]["name"]);

    if (move_uploaded_file($_FILES["Slika"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["Slika"]["name"])). " has been uploaded.";
        $komentar = $_POST['Komentar'];
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    if ($stmt->execute()) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
    header("Location: Glavna.php");
}
?>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>
  <style>
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
    text-align:center;
  }
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
    text-align:center;
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
  </style>
</head>
<body>
  
<div id="popup-form">
<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
      <div class="form-title"><span>Dodaj svoju objavu</span></div>
      <div class="title-2"><span>Techno Zona</span></div>
      <div class="input-container">
          <input class="input-mail" type="text" name="Naslov" placeholder="Dodaj Naslov">
          <span> </span>
      </div>

      <section class="bg-stars">
          <span class="star"></span>
          <span class="star"></span>
          <span class="star"></span>
          <span class="star"></span>
      </section>

      <div class="input-container">
      <textarea class="input-pwd" name="Komentar" placeholder="Dodaj komentar"></textarea>
      </div>
      
      <label for="file" class="custum-file-upload">
          <div class="icon">
              <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path> </g></svg>
          </div>
          <div class="text">
              <span>Dodaj sliku</span>
          </div>
          <input id="file" name="Slika" type="file">
      </label>

      <button type="submit">Submit</button>
  </form>
    </form>


    </div>
    <script>
    $(document).ready(function(){
    //Pop up form apend i open
      $("#btn2").click(function(){
        $("ol").append("<li>Appended item</li>");
      });
      $("#btn1").click(function () {
                $("#popup-form").dialog("open");
                $("#container").append("<div id='container'><div class='card'> <div class='card__header'><img src='https://source.unsplash.com/600x400/?computer' alt='card__image' class='card__image' width='600'></div> <div class='card__body'><span class='tag tag-blue'>Technology</span><h4>What\'s new in 2022 Tech</h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p></div><div class='card__footer'><div class='user'><img src='https://i.pravatar.cc/40?img=1' alt='user__image' class='user__image'> <div class='user__info'> <?php echo "<h5>" . $user_data['Korisnik'] . "</h5>" ?><small>2h ago</small></div></div></div></div>");

            });

            $("#popup-form").dialog({
                autoOpen: false,
                draggable: true,
            });

    
         })
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