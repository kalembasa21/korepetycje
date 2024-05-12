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

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = htmlspecialchars($row['imie_nazwisko']);
    echo "Witaj, $username!" . '<br><br>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $imie_nazwisko = htmlspecialchars($_POST['imie_nazwisko']);
    $klasa = htmlspecialchars($_POST['klasa']);
    $numer_telefonu = htmlspecialchars($_POST['numer_telefonu']);
    $email = htmlspecialchars($_POST['email']);
    $haslo = htmlspecialchars($_POST['haslo']);


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

    if (isset($_POST['przedmioty'])) {
        $selected_subjects = $_POST['przedmioty'];
        $subjects_values = implode(" ", $selected_subjects);

        $sql = "UPDATE users SET przedmioty = '$subjects_values' WHERE id = $user_id";
        if ($conn->query($sql) === TRUE) {
            $sql = "SELECT przedmioty FROM users WHERE id = $user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $selected_subjects = explode(" ", $row['przedmioty']);

                echo "<ul>";
                foreach ($selected_subjects as $subject) {
                    echo "<li>$subject</li>";
                }
                echo "</ul>";
            }
        }
    }
}
?>
<p>Możesz edytować swoje dane poniżej</p>
<form method="post" action="index.php" onsubmit="refreshPage()">
    <div class="grupa-formularza">
        <input type="text" class="formularz-styl" placeholder="Imię i nazwisko" name="imie_nazwisko" value="<?php echo isset($row['imie_nazwisko']) ? htmlspecialchars($row['imie_nazwisko']) : ''; ?>">
        <i class="ikona-inputu uil uil-user"></i>
    </div>
    <div class="grupa-formularza mt-2">
        <input type="text" class="formularz-styl" placeholder="Klasa" name="klasa" value="<?php echo isset($row['klasa']) ? htmlspecialchars($row['klasa']) : ''; ?>">
        <i class="ikona-inputu uil uil-backpack"></i>
    </div>
    <div class="grupa-formularza mt-2">
        <input type="tel" class="formularz-styl" placeholder="Numer telefonu" name="numer_telefonu" value="<?php echo isset($row['numer_telefonu']) ? htmlspecialchars($row['numer_telefonu']) : ''; ?>">
        <i class="ikona-inputu uil uil-phone"></i>
    </div>
    <div class="grupa-formularza mt-2">
        <input type="email" class="formularz-styl" placeholder="Email" name="email" value="<?php echo isset($row['email']) ? htmlspecialchars($row['email']) : ''; ?>">
        <i class="ikona-inputu uil uil-at"></i>
    </div>
    <div class="grupa-formularza mt-2">
        <input type="password" class="formularz-styl" placeholder="Hasło" name="haslo" value="<?php echo isset($row['haslo']) ? htmlspecialchars($row['haslo']) : ''; ?>">
        <i class="ikona-inputu uil uil-lock-alt"></i>
    </div>
    <?php
    $rola = isset($row['rola']) ? $row['rola'] : '';
    $rola = mysqli_real_escape_string($conn, $rola);
    if ($rola === 'korepetytor') {?>
        <div class="grupa-formularza mt-2">
            <label for="przedmioty">Wybierz z jakich przemiotów chcesz udzielać korepetycji:</label>
            <select name="przedmioty[]" id="przedmioty" multiple>
                <option value="matematyka">Matematyka</option>
                <option value="język angielski">Język angielski</option>
                <option value="historia">Historia</option>
            </select>
        </div>
        <?php
    }
    ?>
    <button type="submit" class="btn mt-4" name="submit">Zapisz zmiany</button>
</form>

<br>
<a class="logout" href="#" onclick="confirmLogout()">Wyloguj się</a>

<script>
    function refreshPage() {
        window.location.reload();
    }

    function confirmLogout() {
        if (confirm("Czy na pewno chcesz się wylogować?")) {
            window.location.href = "/view/logout.php";
        }
    }
</script>

<?php
$conn->close();
?>
