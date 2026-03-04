document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("aside form");
    const button = form.querySelector("button");

    form.addEventListener("submit", function(e) {

        button.disabled = true;
        button.textContent = "Ładowanie ⏳";
        e.preventDefault();
        setTimeout(function() {
            form.submit();
        }, 2000);
    });
});