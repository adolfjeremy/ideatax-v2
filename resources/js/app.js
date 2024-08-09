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

const statCount = document.querySelectorAll(".stat_nums");

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
    const projectValue = statCount[0].getAttribute("data-id");
    const clientValue = statCount[1].getAttribute("data-id");
    const expValue = statCount[2].getAttribute("data-id");

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                console.log("Target is visible!");
                count(projectValue, statCount[0]);
                count(clientValue, statCount[1]);
                count(expValue, statCount[2]);
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
