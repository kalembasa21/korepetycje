<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="/korepetycje/style.css">
</head>
<body>
<?php include_once('header_sp.php'); ?>

<div class="calendar">
    <div class="controls">
        <button id="prevMonth">Poprzedni miesiąc</button>
        <h2 id="currentMonth">Kwiecień 2024</h2>
        <button id="nextMonth">Następny miesiąc</button>
    </div>
    <div class="weekdays">
        <div>Pon</div>
        <div>Wt</div>
        <div>Śr</div>
        <div>Czw</div>
        <div>Pt</div>
        <div>Sob</div>
        <div>Nd</div>
    </div>
    <div class="days">

    </div>
</div>
<?php include_once('footer_sp.php'); ?>
<script src="/korepetycje/main.js"></script>
</body>
</html>
