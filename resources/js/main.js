document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("mobile-menu-btn");
    const menu = document.getElementById("mobile-menu");

    if (btn && menu) {
        btn.addEventListener("click", function () {
            if (menu.style.maxHeight && menu.style.maxHeight !== "0px") {
                menu.style.maxHeight = "0px";
            } else {
                menu.style.maxHeight = menu.scrollHeight + "px";
            }
        });
    }
});
