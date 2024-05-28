<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Users data</title>
</head>
<body>
<?php require_once("header_sp.php");

require_once("../conn.php");

$order = "ASC";
if (isset($_GET['order']) && $_GET['order'] == 'DESC') {
    $order = "DESC";
}

$sql = "CALL GetUsers()";
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

usort($users, function($a, $b) use ($order) {
    if ($order == 'ASC') {
        return $a['id'] <=> $b['id'];
    } else {
        return $b['id'] <=> $a['id'];
    }
});

$new_order = $order == 'ASC' ? 'DESC' : 'ASC';

echo '<table border="1">
        <tr>
            <th><a href="?order=' . $new_order . '">ID</a></th>
            <th>Imię i nazwisko</th>
            <th>Klasa</th>
            <th>Numer telefonu</th>
            <th>Email</th>
        </tr>';

foreach ($users as $row) {
    echo '<tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["imie_nazwisko"] . '</td>
            <td>' . $row["klasa"] . '</td>
            <td>' . $row["numer_telefonu"] . '</td>
            <td>' . $row["email"] . '</td>
          </tr>';
}

echo '</table>';



require_once("footer_sp.php"); ?>
<script src="../main.js"></script>
</body>
</html>