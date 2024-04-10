<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Korepetycje</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php include_once('header.php'); ?><br>
<div class="center-body">
    <?php
        session_start();

        if (isset($_SESSION['user_id'])) {
            include_once('./view/user.php');
        } else {
            include_once('register.php');
        }
    ?>
</div>

<?php include_once('footer.php'); ?>
<script src="main.js"></script>
</body>
</html>