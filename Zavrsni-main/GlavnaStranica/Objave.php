<?php
include("../Login/Spajanje.php");
include("../Login/Funkcije.php");
session_start();
header('Content-Type: text/plain');
$user_data = check_login($con);
// Check if the 'korisnik' session variable is set
if (isset($user_data['Korisnik'])) {
    $username = $user_data['Korisnik']; // Retrieve the username from the session

    // Retrieve data from the POST request
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
        $title = $data['title'];
        $content = $data['content'];

        // Prepare and bind the SQL statement
        $stmt = $con->prepare("INSERT INTO objave (Naslov, Komentar, korisnik) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $content, $username);

        // Execute the statement
        if ($stmt->execute()) {
            // Close the statement
            $stmt->close();

            // Return a success response
            echo "New objava added successfully!";
        } else {
            // If execution fails, return an error response
            echo "Error adding new objava!";
        }
    } else {
        // If data is not received from the POST request
        echo "Error: No data received!";
    }
} else {
    // If the session variable is not set, indicate that the user must be logged in
    echo "You must be logged in to create a new objava";
}
?>
