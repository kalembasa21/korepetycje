<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once("conn.php");

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_submit'])) {
    $login_email = $_POST['login_email'];
    $login_haslo = $_POST['login_haslo'];

    $email = filter_var($login_email, FILTER_SANITIZE_EMAIL);
    $haslo = filter_var($login_haslo, FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("SELECT id, imie_nazwisko, haslo FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $username, $hashed_password);
        $stmt->fetch();

        if (password_verify($haslo, $hashed_password)) {
            session_start();
            $_SESSION['user_id'] = $user_id;
            header("Location: index.php");
            exit();
        } else {
            echo "Nieprawidłowe hasło";
        }
    } else {
        echo "Nie znaleziono użytkownika z podanym adresem email.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $imie_nazwisko = $_POST['imie_nazwisko'];
    $klasa = $_POST['klasa'];0
    $numer_telefonu = $_POST['numer_telefonu'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];

    $imie_nazwisko = filter_var($imie_nazwisko, FILTER_SANITIZE_STRING);
    $klasa = filter_var($klasa, FILTER_SANITIZE_STRING);
    $numer_telefonu = filter_var($numer_telefonu, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $haslo = filter_var($haslo, FILTER_SANITIZE_STRING);

    $hashed_password = password_hash($haslo, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (imie_nazwisko, klasa, numer_telefonu, email, haslo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $imie_nazwisko, $klasa, $numer_telefonu, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Rejestracja zakończona pomyślnie." . "<br>";
    } else {
        echo "Błąd rejestracji: " . $stmt->error;
    }
}

$conn->close();
?>

<h4 style="text-align: center; background-color: #0257b1; padding: 10px; border-radius: 5px">Zaloguj się aby korzystać z wszystkich dostępnych funkcji!</h4>

<div class="sekcja">
    <div class="kontener">
        <div class="wiersz pelna-wysokosc justify-content-center">
            <div class="col-12 text-center align-self-center">
                <div class="sekcja pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Zaloguj się </span><span>Zarejestruj się</span></h6>
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                    <label for="reg-log"></label>
                    <div class="karta-3d-owijka mx-auto">
                        <div class="karta-3d-wrapper">
                            <div class="karta-przod">
                                <div class="center-wrap">
                                    <div class="sekcja text-center">
                                        <h4 class="mb-4 pb-3">Zaloguj się</h4>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                            <div class="grupa-formularza">
                                                <input type="email" class="formularz-styl" required placeholder="Email" name="login_email">
                                                <i class="ikona-inputu uil uil-at"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="password" class="formularz-styl" required placeholder="Hasło" name="login_haslo">
                                                <i class="ikona-inputu uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4" name="login_submit">Zaloguj się</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="karta-tyl">
                                <div class="center-wrap">
                                    <div class="sekcja text-center">
                                        <h4 class="mb-3 pb-3">Zarejestruj się</h4>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                            <div class="grupa-formularza">
                                                <input type="text" class="formularz-styl" required placeholder="Imię i nazwisko" name="imie_nazwisko">
                                                <i class="ikona-inputu uil uil-user"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="text" class="formularz-styl" required placeholder="Klasa" name="klasa">
                                                <i class="ikona-inputu uil uil-backpack"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="tel" class="formularz-styl" required placeholder="Numer telefonu" name="numer_telefonu">
                                                <i class="ikona-inputu uil uil-phone"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="email" class="formularz-styl" required placeholder="Email" name="email">
                                                <i class="ikona-inputu uil uil-at"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="password" class="formularz-styl" required placeholder="Hasło" name="haslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}">
<!--                                                <small>Hasło musi zawierać przynajmniej 8 znaków (jedną cyfrę, jeden znak specjalny, jedną małą i jedną dużą literę).</small>-->
                                                <i class="ikona-inputu uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4" name="submit">Zarejestruj się</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>