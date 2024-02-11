<!doctype html>
<html lang="pl">
<head>
    <title>Webleb</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="rejestracja.css">
</head>
<body>
<div class="sekcja">
    <div class="kontener">
        <div class="wiersz pelna-wysokosc justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
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
                                                <input type="email" class="formularz-styl" placeholder="Email" name="login_email">
                                                <i class="ikona-inputu uil uil-at"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="password" class="formularz-styl" placeholder="Hasło" name="login_haslo">
                                                <i class="ikona-inputu uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4" name="login_submit">Zaloguj się</button>
                                        </form>
                                        <?php
                                        // Dane dostępowe do bazy danych
                                        $host = 'localhost'; // Adres hosta
                                        $username = 'root'; // Nazwa użytkownika bazy danych
                                        $password = ''; // Hasło bazy danych
                                        $database = 'korepetycje'; // Nazwa bazy danych

                                        // Połączenie z bazą danych
                                        $conn = new mysqli($host, $username, $password, $database);

                                        // Sprawdzenie połączenia
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        // Sprawdzenie logowania
                                        if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_submit'])){
                                            $login_email = $_POST['login_email'];
                                            $login_haslo = $_POST['login_haslo'];

                                            // Zabezpieczenie przed atakami SQL Injection
                                            $login_email = mysqli_real_escape_string($conn, $login_email);
                                            $login_haslo = mysqli_real_escape_string($conn, $login_haslo);

                                            // Zapytanie SQL sprawdzające czy istnieje użytkownik o podanym adresie email i haśle
                                            $sql = "SELECT * FROM users WHERE email='$login_email' AND haslo='$login_haslo'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                echo "Zalogowano pomyślnie";
                                                // Tutaj możesz przekierować użytkownika na inną stronę po zalogowaniu
                                            } else {
                                                echo "Nieprawidłowy email lub hasło";
                                            }
                                        }

                                        // Zamknięcie połączenia z bazą danych
                                        $conn->close();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="karta-tyl">
                                <div class="center-wrap">
                                    <div class="sekcja text-center">
                                        <h4 class="mb-3 pb-3">Zarejestruj się</h4>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                            <div class="grupa-formularza">
                                                <input type="text" class="formularz-styl" placeholder="Imię i nazwisko" name="imie_nazwisko">
                                                <i class="ikona-inputu uil uil-user"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="text" class="formularz-styl" placeholder="Klasa" name="klasa">
                                                <i class="ikona-inputu uil uil-backpack"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="tel" class="formularz-styl" placeholder="Numer telefonu" name="numer_telefonu">
                                                <i class="ikona-inputu uil uil-phone"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="email" class="formularz-styl" placeholder="Email" name="email">
                                                <i class="ikona-inputu uil uil-at"></i>
                                            </div>
                                            <div class="grupa-formularza mt-2">
                                                <input type="password" class="formularz-styl" placeholder="Hasło" name="haslo">
                                                <i class="ikona-inputu uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4" name="submit">Zarejestruj się</button>
                                        </form>
                                        <?php
                                        // Dane dostępowe do bazy danych
                                        $host = 'localhost'; // Adres hosta
                                        $username = 'root'; // Nazwa użytkownika bazy danych
                                        $password = ''; // Hasło bazy danych
                                        $database = 'korepetycje'; // Nazwa bazy danych

                                        // Połączenie z bazą danych
                                        $conn = new mysqli($host, $username, $password, $database);

                                        // Sprawdzenie połączenia
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        // Pobranie danych z formularza HTML
                                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                                            $imie_nazwisko = $_POST['imie_nazwisko'];
                                            $klasa = $_POST['klasa'];
                                            $numer_telefonu = $_POST['numer_telefonu'];
                                            $email = $_POST['email'];
                                            $haslo = $_POST['haslo'];

                                            // Zabezpieczenie przed atakami SQL Injection
                                            $imie_nazwisko = mysqli_real_escape_string($conn, $imie_nazwisko);
                                            $klasa = mysqli_real_escape_string($conn, $klasa);
                                            $numer_telefonu = mysqli_real_escape_string($conn, $numer_telefonu);
                                            $email = mysqli_real_escape_string($conn, $email);
                                            $haslo = mysqli_real_escape_string($conn, $haslo);

                                            // Zapytanie SQL dodające nowego użytkownika do tabeli users
                                            $sql = "INSERT INTO users (imie_nazwisko, klasa, numer_telefonu, email, haslo) VALUES ('$imie_nazwisko', '$klasa', '$numer_telefonu', '$email', '$haslo')";

                                            if ($conn->query($sql) === TRUE) {
                                                echo "Nowy rekord został dodany pomyślnie";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                        }

                                        // Zamknięcie połączenia z bazą danych
                                        $conn->close();
                                        ?>
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
</body>
</html>
