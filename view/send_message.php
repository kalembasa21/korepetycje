<?php
require_once("../conn.php");
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $message_content = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    $sql_username = "SELECT imie_nazwisko FROM users WHERE id = '$user_id'";
    $result_username = $conn->query($sql_username);

    // Sprawdzenie czy udało się pobrać imię użytkownika
    if ($result_username->num_rows > 0) {
        $row_username = $result_username->fetch_assoc();
        $sender_name = $row_username['imie_nazwisko']; // Przypisanie imienia użytkownika
    }

    $sql_insert = "INSERT INTO chat_messages (username, message) VALUES ('$sender_name', '$message_content')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Wiadomość wysłana pomyślnie.";
    } else {
        echo "Błąd podczas wysyłania wiadomości: " . $conn->error;
    }
} else {
    echo "Nie udało się przesłać wiadomości.";
}

$conn->close();
?>
