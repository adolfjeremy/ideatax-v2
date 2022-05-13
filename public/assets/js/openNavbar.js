const hamburgerButton = document.querySelector("#hamburgerButton");
const navbar = document.querySelector("nav");
const mainContent = document.querySelector("main");

hamburgerButton.addEventListener("click", function () {
    navbar.classList.toggle("open");
    document.body.classList.toggle("disable-scroll");
    this.classList.toggle("rotate");
});

mainContent.addEventListener("click", () => {
    navbar.classList.remove("open");
    document.body.classList.remove("disable-scroll");
    hamburgerButton.classList.remove("rotate");
});
