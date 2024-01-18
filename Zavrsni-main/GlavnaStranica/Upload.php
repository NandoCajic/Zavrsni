<?php
// Inicijalizacija sesije i uključivanje potrebnih datoteka:
session_start();
include("../Login/Spajanje.php");
include("../Login/Funkcije.php");
$user_data = check_login($con);

$user_data['Korisnik']; 
$user_data['Grad'];
$user_data['Mobitel'];
$user_data['Korisnik_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

    if (in_array($_FILES["file"]["type"], $allowedTypes)) {
        $targetDir = "Profilne/"; 
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            $fileName = $_FILES["file"]["name"];
            $filePath = $targetFile;

            $sql1 = "UPDATE korisnik SET ImeSlika=?, Slika=? WHERE Korisnik_id=?";
            $stmt1 = $con->prepare($sql1);
            
            if (!$stmt1) {
                die("Error in statement preparation: " . $con->error);
            }

            $stmt1->bind_param("ssi", $fileName, $filePath, $user_data['Korisnik_id']);

            if ($stmt1->execute()) {
                echo "<div class='card'><p>Datoteka " . $fileName . " je prenesena i povezana s ID-em: " . $user_data['Korisnik_id'] ."</p>";
                echo "<h3>Prikaz slike:</h3>";
                echo "<img class='img' src='$filePath' alt='Profilna slika'></div>";
                header("Location: ProfileCard.php");
            } else {
                echo "Pogreška pri ažuriranju zapisa: " . $stmt1->error;
            }

            $stmt1->close();
        } else {
            echo "Pogreška pri ažuriranju zapisa: Problem s prijenosom datoteke.";
        }
    } else {
        echo "Nevažeći tip datoteke. Molimo vas da prenesete JPEG, JPG, PNG ili GIF datoteku.";
    }
} else {
    echo "POST method not used or file upload error.";
}

// Close the database connection
$con->close();
?>
