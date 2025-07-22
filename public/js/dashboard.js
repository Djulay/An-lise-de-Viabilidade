document.addEventListener("DOMContentLoaded", function () {
    function toggleSubmenu(menuId) {
        document.getElementById(menuId).classList.toggle("hidden");
    }

    document.querySelectorAll("[data-toggle]").forEach(button => {
        button.addEventListener("click", function () {
            toggleSubmenu(this.getAttribute("data-toggle"));
        });
    });
});



