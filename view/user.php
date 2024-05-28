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

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = htmlspecialchars($row['imie_nazwisko']);
    echo "Witaj, $username!" . '<br><br>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $imie_nazwisko = $_POST['imie_nazwisko'];
    $klasa = $_POST['klasa'];
    $numer_telefonu = $_POST['numer_telefonu'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];
    $przedmioty = isset($_POST['przedmioty']) ? $_POST['przedmioty'] : [];

    $imie_nazwisko = filter_var($imie_nazwisko, FILTER_SANITIZE_STRING);
    $klasa = filter_var($klasa, FILTER_SANITIZE_STRING);
    $numer_telefonu = filter_var($numer_telefonu, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $haslo = filter_var($haslo, FILTER_SANITIZE_STRING);

    if (!empty($haslo)) {
        $hashed_password = password_hash($haslo, PASSWORD_DEFAULT);
    } else {
        $hashed_password = $row['haslo'];
    }

    $conn->begin_transaction();

    try {
        $sql = "UPDATE users SET imie_nazwisko='$imie_nazwisko', klasa='$klasa', numer_telefonu='$numer_telefonu', email='$email', haslo='$haslo' WHERE id=$user_id";
        $conn->query($sql);

        $conn->commit();
        echo "Dane zostały zaktualizowane pomyślnie.";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Błąd aktualizacji danych: " . $conn->error;
    }
}
?>
<p>Możesz edytować swoje dane poniżej</p>
<form method="post" action="index.php">
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
        <input type="password" class="formularz-styl" placeholder="Hasło" name="haslo">
        <i class="ikona-inputu uil uil-lock-alt"></i>
    </div>
<!--    --><?php
//    $rola = isset($row['rola']) ? $row['rola'] : '';
//    $rola = mysqli_real_escape_string($conn, $rola);
//    if ($rola === 'korepetytor') {?>
<!--        <div class="grupa-formularza mt-2">-->
<!--            <label for="przedmioty">Wybierz z jakich przemiotów chcesz udzielać korepetycji:</label>-->
<!--            <select name="przedmioty[]" id="przedmioty" multiple>-->
<!--                <option value="matematyka">Matematyka</option>-->
<!--                <option value="j angielski">J. angielski</option>-->
<!--                <option value="historia">Historia</option>-->
<!--                <option value="biologia">Biologia</option>-->
<!--                <option value="chemia">Chemia</option>-->
<!--                <option value="fizyka">Fizyka</option>-->
<!--                <option value="j polski">J. polski</option>-->
<!--                <option value="geografia">Geografia</option>-->
<!--                <option value="informatyka">Informatyka</option>-->
<!--                <option value="j niemiecki">J. niemiecki</option>-->
<!--                <option value="proj oprogramowania">Proj. oprogramowania</option>-->
<!--                <option value="wos">WOS</option>-->
<!--                <option value="edb">EDB</option>-->
<!--                <option value="bhp">BHP</option>-->
<!--                <option value="wf">WF</option>-->
<!--                <option value="plastyka">Plastyka</option>-->
<!--                <option value="Bazy danych">Bazy danych</option>-->
<!--                <option value="ap desk">Ap. desk.</option>-->
<!--                <option value="j ang zaw">J. ang. zaw.</option>-->
<!--                <option value="pp">P.P.</option>-->
<!--                <option value="ap int">Ap. int.</option>-->
<!--                <option value="obiektowka">obiektowka</option>-->
<!--            </select>-->
<!--        </div>-->
<!--        --><?php
//    }
//    ?>
    <button type="submit" class="btn mt-4" name="submit">Zapisz zmiany</button>
</form>

<br>
<a class="logout" href="#" onclick="confirmLogout()">Wyloguj się</a>

<script>
    function confirmLogout() {
        if (confirm("Czy na pewno chcesz się wylogować?")) {
            window.location.href = "/korepetycje/view/logout.php";
        }
    }
</script>

<?php
$conn->close();
?>
