<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'korepetycje';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['imie_nazwisko'];
    echo '<br>' . "Witaj, $username!" . '<br>';
} else {
    echo "Błąd: Nie znaleziono informacji o użytkowniku.";
}
?>
<br>
<a href="/view/edit.php">Edytuj swoje dane</a>
<br>
<a class="logout" href="#" onclick="confirmLogout()">Wyloguj się</a>
<?php
$conn->close();
?>
