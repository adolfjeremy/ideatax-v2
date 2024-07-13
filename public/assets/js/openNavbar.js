const hamburgerButton = document.querySelector("#hamburgerButton");
const navbar = document.querySelector(".mobile_nav");
const bg = document.querySelector(".bg_anim");
const mainContent = document.querySelector("main");

hamburgerButton.addEventListener("click", function () {
    navbar.classList.toggle("reveal");
    bg.classList.toggle("openNav");
    // document.body.classList.toggle("disable-scroll");
    this.classList.toggle("rotate");
});

mainContent.addEventListener("click", () => {
    navbar.classList.remove("reveal");
    bg.classList.remove("openNav");
    // document.body.classList.remove("disable-scroll");
    hamburgerButton.classList.remove("rotate");
});
