<?php 
session_start(); 
include("../Login/Spajanje.php"); 
include("../Login/Funkcije.php"); 

$user_data = check_login($con); 
$user_data['ImeSlika']; 
if (!empty($user_data['ImeSlika'])) {
  $profilePicture = "Profilne/" . $user_data['ImeSlika'];
}  
else {
  $profilePicture = "Profilne/user1.png"; 
}

function fetchMessages($con, $profilePicture) { 
    $last_24_hours = date("Y-m-d H:i:s", strtotime("-24 hours")); 
    $query = "SELECT * FROM messages WHERE timestamp >= '$last_24_hours'"; 
    $result = mysqli_query($con, $query); 
    
    if (!$result) {
        die('Error fetching messages: ' . mysqli_error($con));
    }
    
    $messages = ""; 
    while ($row = mysqli_fetch_assoc($result)) { 
        // Retrieve the user's profile picture from the database
        $user_id = $row["user_id"];
        $profileQuery = "SELECT ImeSlika FROM korisnik WHERE Korisnik = '$user_id'";
        $profileResult = mysqli_query($con, $profileQuery);
        
        if (!$profileResult) {
            die('Error fetching profile picture: ' . mysqli_error($con));
        }
        
        $profileRow = mysqli_fetch_assoc($profileResult);
        $userProfilePicture = !empty($profileRow['ImeSlika']) ? "Profilne/" . $profileRow['ImeSlika'] : $profilePicture;
        
        $messages .= '<div class="message sol">
                        <div class="resim" style="background-image: url(\''. $userProfilePicture .'\');"></div>
                        <div class="messageContent">
                            <div class="userName">'.$row["user_id"].'</div>
                            <div class="messageText" data-time="10:42">'. $row["message"] .'</div>
                        </div>
                      </div>'; 
    } 
    return $messages; 
} 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) { 
    $message = $_POST["message"]; 
    $user_id = $user_data['Korisnik']; 

    $query = "INSERT INTO messages (user_id, message) VALUES ('$user_id', '$message')"; 
    $insertResult = mysqli_query($con, $query);
    
    if (!$insertResult) {
        die('Error inserting message: ' . mysqli_error($con));
    }
} 

?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>Live Chat</title> 
    <style> 
      body { 
            background: #f5f5f5; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:black;
        } 
        
        #chatbox { 
            height: 600px; 
            overflow-y: scroll; 
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 80%;
            width: 700px;
        } 
        
        .message { 
            margin-bottom: 10px; 
            display: flex;
            align-items: flex-start;
            clear: both;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        } 
        
        .message .resim { 
            background-size: cover; 
            height: 40px; 
            width: 40px; 
            margin-right: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        } 

        .messageContent {
            flex-grow: 1;
        }
        
        .userName {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .messageText { 
    background-color: #FF0044; 
    color: #FFFFFF; 
    padding: 10px; 
    border-radius: 5px;
    word-wrap: break-word;
    position: relative;
    display: inline-block; /* Change to inline-block */
    max-width: calc(100% - 50px); /* Adjusted max-width */
}

.message.sol .messageText:before { 
    border-width: 0 10px 10px 0; 
    left: -10px; 
    top: 0; 
    border-color: transparent #FF0044;
}

.message.sag .messageText:before { 
    border-width: 10px 0 0 10px; 
    right: -10px; 
    top: 30px; 
    border-color: transparent #FF0044;
}

.messageText:after { 
    content: attr(data-time); 
    color: rgba(255,255,255,0.5); 
    position: absolute; 
    line-height: 20px; 
    display: block; 
    bottom: 2px; 
    z-index: 1; 
} 

.message.sol .messageText:after { 
    margin-left: 5px; 
    left: 100%; 
} 

.message.sag .messageText:after { 
    margin-right: 5px; 
    right: 100%; 
}
        
        input[type="text"] { 
            width:100%; 
            padding: 8px; 
            margin-right: 10px; 
            border-radius: 5px; 
            border: 1px solid #ccc; 
            flex-grow: 1;
        } 
        
        input[type="submit"] { 
            padding: 8px 15px; 
            border: none; 
            background-color: #FF0044; 
            color: #fff; 
            border-radius: 5px; 
            cursor: pointer; 
            flex-shrink: 0;
            width:100%; 
        } 
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

<div id="chatbox"> 
    <?php echo fetchMessages($con, $profilePicture); ?> 
</div> 

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="display: flex; flex-direction: column;"> 
    <div style="margin-bottom: 10px;">
        <input type="text" name="message" placeholder="Type your message..." required> 
    </div>
    <input type="submit" value="Send"> 
</form> 

</body> 
</html>
