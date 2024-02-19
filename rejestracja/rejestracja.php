<!doctype html>
<html lang="pl">
<head>
    <title>Korepetycje</title>
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
                                        $host = 'localhost';
                                        $username = 'root';
                                        $password = '';
                                        $database = 'korepetycje';

                                        $conn = new mysqli($host, $username, $password, $database);

                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

                                        if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_submit'])){
                                            $login_email = $_POST['login_email'];
                                            $login_haslo = $_POST['login_haslo'];

                                            $login_email = mysqli_real_escape_string($conn, $login_email);
                                            $login_haslo = mysqli_real_escape_string($conn, $login_haslo);

                                            $sql = "SELECT * FROM users WHERE email='$login_email' AND haslo='$login_haslo'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                echo "Zalogowano pomyślnie";
                                                header("Location: index.php");
                                                exit();
                                            } else {
                                                echo "Nieprawidłowy email lub hasło";
                                            }
                                        }

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
                                        $host = 'localhost';
                                        $username = 'root';
                                        $password = '';
                                        $database = 'korepetycje';

                                        $conn = new mysqli($host, $username, $password, $database);

                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }

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

                                            $sql = "INSERT INTO users (imie_nazwisko, klasa, numer_telefonu, email, haslo) VALUES ('$imie_nazwisko', '$klasa', '$numer_telefonu', '$email', '$haslo')";
                                        }
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
<menu class="menu" style="--timeOut: none">
    <button class="menu__item active" style="--bgColorItem: #ff8c00">
    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="user">
        <path d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z"></path>
    </svg>
    </button>

    <button class="menu__item" style="--bgColorItem: #f54888">
    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="chat">
        <path d="M18,2H6A3,3,0,0,0,3,5V16a3,3,0,0,0,3,3H8.59l2.7,2.71A1,1,0,0,0,12,22a1,1,0,0,0,.65-.24L15.87,19H18a3,3,0,0,0,3-3V5A3,3,0,0,0,18,2Zm1,14a1,1,0,0,1-1,1H15.5a1,1,0,0,0-.65.24l-2.8,2.4L9.71,17.29A1,1,0,0,0,9,17H6a1,1,0,0,1-1-1V5A1,1,0,0,1,6,4H18a1,1,0,0,1,1,1Z"></path>
    </svg>
    </button>

    <button class="menu__item" style="--bgColorItem: #4343f5">
    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="mobile-android">
        <path d="M12.71,16.29l-.15-.12a.76.76,0,0,0-.18-.09L12.2,16a1,1,0,0,0-.91.27,1.15,1.15,0,0,0-.21.33,1,1,0,0,0,1.3,1.31,1.46,1.46,0,0,0,.33-.22,1,1,0,0,0,.21-1.09A1,1,0,0,0,12.71,16.29ZM16,2H8A3,3,0,0,0,5,5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V5A3,3,0,0,0,16,2Zm1,17a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"></path>
    </svg>
    </button>

    <button class="menu__item" style="--bgColorItem: #e0b115">
    <svg class="icon" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="calendar-alt">
        <path d="M12,19a1,1,0,1,0-1-1A1,1,0,0,0,12,19Zm5,0a1,1,0,1,0-1-1A1,1,0,0,0,17,19Zm0-4a1,1,0,1,0-1-1A1,1,0,0,0,17,15Zm-5,0a1,1,0,1,0-1-1A1,1,0,0,0,12,15ZM19,3H18V2a1,1,0,0,0-2,0V3H8V2A1,1,0,0,0,6,2V3H5A3,3,0,0,0,2,6V20a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V6A3,3,0,0,0,19,3Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H20ZM20,9H4V6A1,1,0,0,1,5,5H6V6A1,1,0,0,0,8,6V5h8V6a1,1,0,0,0,2,0V5h1a1,1,0,0,1,1,1ZM7,15a1,1,0,1,0-1-1A1,1,0,0,0,7,15Zm0,4a1,1,0,1,0-1-1A1,1,0,0,0,7,19Z"></path>
    </svg>
    </button>

    <button class="menu__item" style="--bgColorItem: #65ddb7">
    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="angle-double-up">
        <path d="M12.71,12.54a1,1,0,0,0-1.42,0l-3,3A1,1,0,0,0,9.71,17L12,14.66,14.29,17a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Zm-3-1.08L12,9.16l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-3-3a1,1,0,0,0-1.42,0l-3,3a1,1,0,0,0,1.42,1.42Z"></path>
    </svg>
    </button>

    <div class="menu__border" style="transform: translate3d(0px, 0px, 0px)"></div>
</menu>

<div class="svg-container">
    <svg viewBox="0 0 202.9 45.5">
        <clipPath id="menu" clipPathUnits="objectBoundingBox" transform="scale(0.0049285362247413 0.021978021978022)">
            <path d="M6.7,45.5c5.7,0.1,14.1-0.4,23.3-4c5.7-2.3,9.9-5,18.1-10.5c10.7-7.1,11.8-9.2,20.6-14.3c5-2.9,9.2-5.2,15.2-7c7.1-2.1,13.3-2.3,17.6-2.1c4.2-0.2,10.5,0.1,17.6,2.1c6.1,1.8,10.2,4.1,15.2,7c8.8,5,9.9,7.1,20.6,14.3c8.3,5.5,12.4,8.2,18.1,10.5c9.2,3.6,17.6,4.2,23.3,4H6.7z"></path>
        </clipPath>
    </svg>
</div>
<script src="rejestracja.js" crossorigin=""></script>
</body>
</html>