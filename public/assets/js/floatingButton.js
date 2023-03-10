const button = document.querySelector(".floating_button");
const icon = document.querySelector(".floating_button_icon");
const whatsapp = document.querySelector(".floating_whatsapp");

button.addEventListener("click", () => {
    button.classList.add("rotateWa");

    if (icon.classList.contains("bi-whatsapp")) {
        whatsapp.classList.add("moveUp");
        whatsapp.classList.remove("moveDown");
    } else {
        whatsapp.classList.add("moveDown");
        whatsapp.classList.remove("moveUp");
        setTimeout(() => {
            whatsapp.classList.remove("moveDown");
        }, 250);
    }

    setTimeout(() => {
        if (icon.classList.contains("bi-whatsapp")) {
            icon.classList.remove("bi-whatsapp");
            icon.classList.add("bi-x");
        } else {
            icon.classList.remove("bi-x");
            icon.classList.add("bi-whatsapp");
        }
    }, 100);

    setTimeout(() => {
        button.classList.remove("rotateWa");
    }, 250);
});
