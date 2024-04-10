<?php
require_once("../conn.php");
session_start();
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM chat_messages ORDER BY created_at LIMIT 50";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div><strong>' . $row['username'] . ':</strong> ' . $row['message'] . '</div>';
    }
} else {
    echo '<div>Brak wiadomości.</div>';
}

$conn->close();
?>
