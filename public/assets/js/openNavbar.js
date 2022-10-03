const hamburgerButton = document.querySelector("#hamburgerButton");
const navbar = document.querySelector(".mobile_nav");
const mainContent = document.querySelector("main");

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
