import "./bootstrap";
import $ from "jquery";
import "./floatingButton";

import "bootstrap";

$(function () {
    $(document).scroll(function () {
        var $nav = $(".navbar-fixed-top");
        $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
    });
});

const projectCount = document.querySelector(".project_num");
const clientCount = document.querySelector(".client_num");
const expCount = document.querySelector(".exp_num");

function count(limit, element) {
    let count = 0;
    setInterval(function () {
        if (count < limit) {
            element.innerText = `${(count += 1)}+`;
        } else {
            clearInterval();
        }
    }, 5);
}

document.addEventListener("DOMContentLoaded", function () {
    const target = document.querySelector(".about_stats");

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                console.log("Target is visible!");
                count(359, projectCount);
                count(200, clientCount);
                count(20, expCount);
                observer.unobserve(entry.target);
            }
        });
    });

    observer.observe(target);
});

function copyLink() {
    const elem = document.querySelector(".copy_link");
    navigator.clipboard.writeText(elem.innerText);
    alert("link copied");
}

const copyButton = document.querySelector(".copy_button");
copyButton.addEventListener("click", copyLink);
