<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Chat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<?php
session_start();

if (!(isset($_SESSION['user_id']))) {
    header("Location: ../index.php");
    exit();
}
include_once('header_sp.php');
?>
<div class="center-body">
<div class="container">
    <div id="messageContainer" class="message-container mt-4"></div>
</div>

<form id="messageForm">
    <div class="container">
        <div class="form-group">
            <input type="text" class="form-control" id="messageInput" placeholder="Napisz wiadomość...">
        </div>
        <button type="submit" class="btn btn-primary">Wyślij</button>
    </div>
</form>
</div>
<?php include_once('footer_sp.php'); ?>
<script src="../main.js"></script>
<script>
    function fetchMessages() {
        $.get('get_messages.php', function(messages) {
            $('#messageContainer').html(messages);
        });
    }
    fetchMessages();
    setInterval(fetchMessages, 1000);
    $('#messageForm').submit(function(event) {
        event.preventDefault();
        var message = $('#messageInput').val();
        if (message.trim() !== '') {
            $.post('send_message.php', { message: message }, function(response) {
                fetchMessages();
            });
            $('#messageInput').val('');
        }
    });
</script>
</body>
</html>
