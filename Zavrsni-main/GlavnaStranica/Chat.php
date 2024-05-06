<?php
session_start();
include("../Login/Spajanje.php");
include("../Login/Funkcije.php");

// Check if user is logged in
$user_data = check_login($con);

// Function to fetch messages from the last 24 hours
function fetchMessages($con) {
    $last_24_hours = date("Y-m-d H:i:s", strtotime("-24 hours"));
    $query = "SELECT * FROM messages WHERE timestamp >= '$last_24_hours'";
    $result = mysqli_query($con, $query);
    $messages = "";
    while ($row = mysqli_fetch_assoc($result)) {
       
        $messages .= ' '.  $row["user_id"] .'<div class="message sol"><div class="resim" style="background-image: url("https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-prn2/t1/1461137_576157439120105_582502926_n.jpg");"> '. $row["message"] . '</div><div class="messageText" data-time="10:42"></div> </div>"';
    }
    return $messages;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    $message = $_POST["message"];
    $user_id = $user_data['Korisnik'];

  
    $query = "INSERT INTO messages (user_id, message) VALUES ('$user_id', '$message')";
    mysqli_query($con, $query);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Chat</title>
    <style>
        #chatbox {
            height: 300px;
            overflow-y: scroll;
        }
        body {
  background: #222;
}

* {
  outline: 0;
}

.time {
  text-align: center;
  margin-bottom: 10px;
}
.time span {
  background-color: #000000;
  display: inline-block;
  border-radius: 3px;
  text-align: center;
  padding: 2px 20px;
  color: #fff;
  opacity: 0.3;
}
.message {
  margin-bottom: 10px;
}
.message .messageText {
  text-align: left;
  color: #FFFFFF;
}
.message.sol {
  text-align: left;
}
.message.sag {
  text-align: right;
}
.message .resim {
  background: #FF0044 none no-repeat center;
  vertical-align: text-top;
  background-size: cover;
  display: inline-block;
  position: relative;
  color: #FFFFFF;
  height: 40px;
  width: 40px;
}
.message .messageText {
  background-color: #FF0044;
  vertical-align: text-top;
  display: inline-block;
  position: relative;
  line-height: 20px;
  max-width: 165px;
  color: #FFFFFF;
  padding: 10px;
}
.message.left .userPortrait,
.message.sag .messageText {
  border-radius: 5px 0 0 5px;
}
.message.sag .userPortrait,
.message.sol .messageText {
  border-radius: 0 5px 5px 0;
}
.message.mtLine.sol .messageText {
  border-radius: 0 5px 5px 0;
}
.message.mtLine.sag .messageText {
  border-radius: 5px 0 0 5px;
}
.message .messageText:before {
  border-color: transparent #FF0044;
  border-style: solid;
  position: absolute;
  border-width: 0;
  display: block;
  content: "";
  z-index: 1;
}
.message.sol .messageText:before {
  border-width: 0 10px 10px 0;
  left: -10px;
  top: 0;
}
.message.sag .messageText:before {
  border-width: 10px 0 0 10px;
  right: -10px;
  top: 30px;
}
.message .messageText:after {
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
    </style>
</head>
<body>

<div id="chatbox">
    <?php echo fetchMessages($con); ?>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="text" name="message" placeholder="Type your message..." required>
    <input type="submit" value="Send">
   
    
    <div class="message sol">
      <div class="resim" style="background-image: url('https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-prn2/t1/1461137_576157439120105_582502926_n.jpg');"></div><div class="messageText" data-time="10:42">
      
      </div>
    </div>
    
</form>

</body>
</html>
