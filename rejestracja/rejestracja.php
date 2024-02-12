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
        <svg class="icon" viewBox="0 0 24 24">
            <path d="M3.8,6.6h16.4"></path>
            <path d="M20.2,12.1H3.8"></path>
            <path d="M3.8,17.5h16.4"></path>
        </svg>
    </button>

    <button class="menu__item" style="--bgColorItem: #f54888">
        <svg class="icon" viewBox="0 0 24 24">
            <path
                    d="M6.7,4.8h10.7c0.3,0,0.6,0.2,0.7,0.5l2.8,7.3c0,0.1,0,0.2,0,0.3v5.6c0,0.4-0.4,0.8-0.8,0.8H3.8
        C3.4,19.3,3,19,3,18.5v-5.6c0-0.1,0-0.2,0.1-0.3L6,5.3C6.1,5,6.4,4.8,6.7,4.8z"
            ></path>
            <path d="M3.4,12.9H8l1.6,2.8h4.9l1.5-2.8h4.6"></path>
        </svg>
    </button>

    <button class="menu__item" style="--bgColorItem: #4343f5">
        <svg class="icon" viewBox="0 0 24 24">
            <path d="M3.4,11.9l8.8,4.4l8.4-4.4"></path>
            <path d="M3.4,16.2l8.8,4.5l8.4-4.5"></path>
            <path d="M3.7,7.8l8.6-4.5l8,4.5l-8,4.3L3.7,7.8z"></path>
        </svg>
    </button>

    <button class="menu__item" style="--bgColorItem: #e0b115">
        <svg class="icon" viewBox="0 0 24 24">
            <path
                    d="M5.1,3.9h13.9c0.6,0,1.2,0.5,1.2,1.2v13.9c0,0.6-0.5,1.2-1.2,1.2H5.1c-0.6,0-1.2-0.5-1.2-1.2V5.1
          C3.9,4.4,4.4,3.9,5.1,3.9z"
            ></path>
            <path d="M4.2,9.3h15.6"></path>
            <path d="M9.1,9.5v10.3"></path>
        </svg>
    </button>

    <button class="menu__item" style="--bgColorItem: #65ddb7">
        <svg class="icon" viewBox="0 0 24 24">
            <path
                    d="M5.1,3.9h13.9c0.6,0,1.2,0.5,1.2,1.2v13.9c0,0.6-0.5,1.2-1.2,1.2H5.1c-0.6,0-1.2-0.5-1.2-1.2V5.1
          C3.9,4.4,4.4,3.9,5.1,3.9z"
            ></path>
            <path d="M5.5,20l9.9-9.9l4.7,4.7"></path>
            <path
                    d="M10.4,8.8c0,0.9-0.7,1.6-1.6,1.6c-0.9,0-1.6-0.7-1.6-1.6C7.3,8,8,7.3,8.9,7.3C9.7,7.3,10.4,8,10.4,8.8z"
            ></path>
        </svg>
    </button>

    <div class="menu__border" style="transform: translate3d(0px, 0px, 0px)"></div>
</menu>

<div class="svg-container">
    <svg viewBox="0 0 202.9 45.5">
        <clipPath
                id="menu"
                clipPathUnits="objectBoundingBox"
                transform="scale(0.0049285362247413 0.021978021978022)">
            <path d="M6.7,45.5c5.7,0.1,14.1-0.4,23.3-4c5.7-2.3,9.9-5,18.1-10.5c10.7-7.1,11.8-9.2,20.6-14.3c5-2.9,9.2-5.2,15.2-7
          c7.1-2.1,13.3-2.3,17.6-2.1c4.2-0.2,10.5,0.1,17.6,2.1c6.1,1.8,10.2,4.1,15.2,7c8.8,5,9.9,7.1,20.6,14.3c8.3,5.5,12.4,8.2,18.1,10.5
          c9.2,3.6,17.6,4.2,23.3,4H6.7z"></path>
        </clipPath>
    </svg>
</div>
<script src="rejestracja.js" crossorigin=""></script>
</body>
</html>
