<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php include_once('header_sp.php'); ?><br>
<!--<div class="center-body">-->
<!--    <div class="month">-->
<!--        <ul>-->
<!--            <li class="prev">&#10094;</li>-->
<!--            <li class="next">&#10095;</li>-->
<!--            <li>Kwiecień<br><span style="font-size:18px">2024</span></li>-->
<!--        </ul>-->
<!--    </div>-->
<!---->
<!--    <ul class="weekdays">-->
<!--        <li>P</li>-->
<!--        <li>Wt</li>-->
<!--        <li>Śr</li>-->
<!--        <li>Czw</li>-->
<!--        <li>Pt</li>-->
<!--        <li>So</li>-->
<!--        <li>N</li>-->
<!--    </ul>-->
<!---->
<!--    <ul class="days">-->
<!--        <li>1</li>-->
<!--        <li>2</li>-->
<!--        <li>3</li>-->
<!--        <li>4</li>-->
<!--        <li>5</li>-->
<!--        <li>6</li>-->
<!--        <li>7</li>-->
<!--        <li>8</li>-->
<!--        <li>9</li>-->
<!--        <li>10</li>-->
<!--        <li>11</li>-->
<!--        <li>12</li>-->
<!--        <li>13</li>-->
<!--        <li>14</li>-->
<!--        <li>15</li>-->
<!--        <li>16</li>-->
<!--        <li>17</li>-->
<!--        <li>18</li>-->
<!--        <li>19</li>-->
<!--        <li>20</li>-->
<!--        <li>21</li>-->
<!--        <li><span class="active">22</span></li>-->
<!--        <li>23</li>-->
<!--        <li>24</li>-->
<!--        <li>25</li>-->
<!--        <li>26</li>-->
<!--        <li>27</li>-->
<!--        <li>28</li>-->
<!--        <li>29</li>-->
<!--        <li>30</li>-->
<!--    </ul>-->
<!--    <div class="calendar">-->
<!--        <div class="controls">-->
<!--            <button id="prevMonth">Poprzedni miesiąc</button>-->
<!--            <h2 id="currentMonth">Kwiecień 2024</h2>-->
<!--            <button id="nextMonth">Następny miesiąc</button>-->
<!--        </div>-->
<!--        <div class="weekdays">-->
<!--            <div>Pon</div>-->
<!--            <div>Wt</div>-->
<!--            <div>Śr</div>-->
<!--            <div>Czw</div>-->
<!--            <div>Pt</div>-->
<!--            <div>Sob</div>-->
<!--            <div>Nd</div>-->
<!--        </div>-->
<!--        <div class="days">-->
<!--        </div>-->
<!--    </div>-->
</div>
<?php include_once('footer_sp.php'); ?>
<!--<script src="../main.js"></script>-->
<!--<script>-->
<!--    document.addEventListener("DOMContentLoaded", function() {-->
<!--        const currentDate = new Date(2024, 3, 1);-->
<!--        const monthNames = ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"];-->
<!--        const monthElement = document.getElementById("currentMonth");-->
<!--        const daysElement = document.querySelector(".days");-->
<!---->
<!--        function renderCalendar(date) {-->
<!--            const year = date.getFullYear();-->
<!--            const month = date.getMonth();-->
<!--            const daysInMonth = new Date(year, month + 1, 0).getDate();-->
<!--            const firstDayIndex = new Date(year, month, 1).getDay();-->
<!---->
<!--            monthElement.textContent = `${monthNames[month]} ${year}`;-->
<!--            daysElement.innerHTML = "";-->
<!---->
<!--            for (let i = 0; i < firstDayIndex; i++) {-->
<!--                daysElement.innerHTML += `<div></div>`;-->
<!--            }-->
<!---->
<!--            for (let i = 1; i <= daysInMonth; i++) {-->
<!--                daysElement.innerHTML += `<div>${i}</div>`;-->
<!--            }-->
<!--        }-->
<!--        renderCalendar(currentDate);-->
<!--        document.getElementById("prevMonth").addEventListener("click", function() {-->
<!--            currentDate.setMonth(currentDate.getMonth() - 1);-->
<!--            renderCalendar(currentDate);-->
<!--        });-->
<!---->
<!--        document.getElementById("nextMonth").addEventListener("click", function() {-->
<!--            currentDate.setMonth(currentDate.getMonth() + 1);-->
<!--            renderCalendar(currentDate);-->
<!--        });-->
<!--    });-->
<!--</script>-->
</body>
</html>
