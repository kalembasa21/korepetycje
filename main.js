"use strict"; 

const body = document.body;
const menu = body.querySelector(".menu");
const menuItems = menu.querySelectorAll(".menu__item");
const menuBorder = menu.querySelector(".menu__border");
let activeItem = menu.querySelector(".active");

function clickItem(item, index) {
    menu.style.removeProperty("--timeOut");
    if (activeItem == item) return;
    if (activeItem) {
        activeItem.classList.remove("active");
    }
    item.classList.add("active");
    activeItem = item;
    offsetMenuBorder(activeItem, menuBorder);
}

function offsetMenuBorder(element, menuBorder) {
    const offsetActiveItem = element.getBoundingClientRect();
    const left = Math.floor(offsetActiveItem.left - menu.offsetLeft - (menuBorder.offsetWidth  - offsetActiveItem.width) / 2) +  "px";
    menuBorder.style.transform = `translate3d(${left}, 0 , 0)`;
}

offsetMenuBorder(activeItem, menuBorder);

menuItems.forEach((item, index) => {
    item.addEventListener("click", () => clickItem(item, index)); 
})
window.addEventListener("resize", () => {
    offsetMenuBorder(activeItem, menuBorder);
    menu.style.setProperty("--timeOut", "none");
});

function confirmLogout() {
    let confirmed = confirm("Czy na pewno chcesz się wylogować?");

    if (confirmed) {
        window.location.href = "/view/logout.php";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const currentDate = new Date(2024, 3, 1);
    const monthNames = ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"];
    const monthElement = document.getElementById("currentMonth");
    const daysElement = document.querySelector(".days");

    function renderCalendar(date) {
        const year = date.getFullYear();
        const month = date.getMonth();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDayIndex = new Date(year, month, 1).getDay();

        monthElement.textContent = `${monthNames[month]} ${year}`;
        daysElement.innerHTML = "";

        for (let i = 0; i < firstDayIndex; i++) {
            daysElement.innerHTML += `<div></div>`;
        }

        for (let i = 1; i <= daysInMonth; i++) {
            daysElement.innerHTML += `<div>${i}</div>`;
        }
    }

    renderCalendar(currentDate);

    document.getElementById("prevMonth").addEventListener("click", function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    document.getElementById("nextMonth").addEventListener("click", function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });
});
