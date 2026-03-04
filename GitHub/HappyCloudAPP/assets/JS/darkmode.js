document.addEventListener("DOMContentLoaded", function() {
    const toggle = document.getElementById("darkModeToggle");
    toggle.addEventListener("click", function() {
        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {
            toggle.textContent = "☀️ Light Mode";
        } else {
            toggle.textContent = "🌙 Dark Mode";
        }
    });
});