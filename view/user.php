<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

require_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $imie_nazwisko = $_POST['imie_nazwisko'];
    $klasa = $_POST['klasa'];
    $numer_telefonu = $_POST['numer_telefonu'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];

    $imie_nazwisko = mysqli_real_escape_string($conn, $imie_nazwisko);
    $klasa = mysqli_real_escape_string($conn, $klasa);
    $numer_telefonu = mysqli_real_escape_string($conn, $numer_telefonu);
    $email = mysqli_real_escape_string($conn, $email);
    $haslo = mysqli_real_escape_string($conn, $haslo);

    $sql = "UPDATE users SET imie_nazwisko='$imie_nazwisko', klasa='$klasa', numer_telefonu='$numer_telefonu', email='$email', haslo='$haslo' WHERE id=$user_id";

    if ($conn->query($sql) === TRUE) {
        echo "Dane zostały zaktualizowane pomyślnie." . "<br>";
    } else {
        echo "Błąd aktualizacji danych: " . $conn->error;
    }

}

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['imie_nazwisko'];
    echo "Witaj, $username!" . '<br><br>';
    $rola = $row['rola'];
    $rola = mysqli_real_escape_string($conn, $rola);
    if ($rola === 'korepetytor') {?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="subject"><p>Wybierz z jakich przemiotów chcesz udzielać korepetycji:</p></label>
                <input type="checkbox" name="subject" value="Matematyka"> Matematyka<br>
                <input type="checkbox" name="subject" value="Fizyka"> Fizyka<br>
                <input type="checkbox" name="subject" value="Chemia"> Chemia<br>
            </div>
             <button type="submit">Submit</button>
        </form><br>
        <?php
        if (isset($_POST['subject'])) {
            $selected_subjects = $_POST['subject'];
            $user_id = $_SESSION['user_id'];
            $subjects_values = implode(",", $selected_subjects);

            $sql = "UPDATE users SET przedmioty = '$subjects_values' WHERE id = $user_id";
            $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                $sql = "SELECT przedmioty FROM users WHERE id = $user_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $selected_subjects = explode(",", $row['subjects']);

                    echo "<ul>";
                    foreach ($selected_subjects as $subject) {
                        echo "<li>$subject</li>";
                    }
                    echo "</ul>";
                }
            }
        }
    }
}
?>
<p>Możesz edytować swoje dane poniżej</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="grupa-formularza">
        <input type="text" class="formularz-styl" placeholder="Imię i nazwisko" name="imie_nazwisko" value="<?php echo $row['imie_nazwisko']; ?>">
        <i class="ikona-inputu uil uil-user"></i>
    </div>
    <div class="grupa-formularza mt-2">
        <input type="text" class="formularz-styl" placeholder="Klasa" name="klasa" value="<?php echo $row['klasa']; ?>">
        <i class="ikona-inputu uil uil-backpack"></i>
    </div>
    <div class="grupa-formularza mt-2">
        <input type="tel" class="formularz-styl" placeholder="Numer telefonu" name="numer_telefonu" value="<?php echo $row['numer_telefonu']; ?>">
        <i class="ikona-inputu uil uil-phone"></i>
    </div>
    <div class="grupa-formularza mt-2">
        <input type="email" class="formularz-styl" placeholder="Email" name="email" value="<?php echo $row['email']; ?>">
        <i class="ikona-inputu uil uil-at"></i>
    </div>
    <div class="grupa-formularza mt-2">
        <input type="password" class="formularz-styl" placeholder="Hasło" name="haslo" value="<?php echo $row['haslo']; ?>">
        <i class="ikona-inputu uil uil-lock-alt"></i>
    </div>
    <button type="submit" class="btn mt-4" name="submit">Zapisz zmiany</button>
</form>
<br>
<a class="logout" href="#" onclick="confirmLogout()">Wyloguj się</a>

<script>
    function confirmLogout() {
        if (confirm("Czy na pewno chcesz się wylogować?")) {
            window.location.href = "/view/logout.php";
        }
    }
</script>

<?php
$conn->close();
?>
