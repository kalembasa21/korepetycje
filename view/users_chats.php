<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php require_once("header_sp.php");

require_once("../conn.php");

$sql = "CALL GetUsers()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Imię i nazwisko: " . $row["imie_nazwisko"] . "<br>";
    }
} else {
    echo "Brak użytkowników w bazie danych";
}

require_once("footer_sp.php"); ?>
<script src="../main.js"></script>
</body>
</html>