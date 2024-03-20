const hamburgerButton = document.querySelector("#hamburgerButton");
const navbar = document.querySelector(".mobile_nav");
const mainContent = document.querySelector("main");
const scrollUp = document.querySelector(".scroll_up");

hamburgerButton.addEventListener("click", function () {
    navbar.classList.toggle("openNav");
    document.body.classList.toggle("disable-scroll");
    this.classList.toggle("rotate");
});

mainContent.addEventListener("click", () => {
    navbar.classList.remove("openNav");
    document.body.classList.remove("disable-scroll");
    hamburgerButton.classList.remove("rotate");
});

window.addEventListener("scroll", () => {
    if (window.scrollY > 500) {
        scrollUp.classList.remove("d-none");
    } else {
        scrollUp.classList.add("d-none");
    }
});

scrollUp.addEventListener("click", () => {
    window.scrollTo(0, 0);
});
