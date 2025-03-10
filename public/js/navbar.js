document.addEventListener("DOMContentLoaded", function() {
    let navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function() {
        if (window.scrollY > 80) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
});
