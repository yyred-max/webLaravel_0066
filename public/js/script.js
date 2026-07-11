document.addEventListener("DOMContentLoaded", function() {
    const menu = document.querySelectorAll(".nav-link");

    menu.forEach(item => {

        item.addEventListener("click", function () {

            menu.forEach(link => {

                link.classList.remove("active");

            });

            this.classList.add("active");

        });

    });
});