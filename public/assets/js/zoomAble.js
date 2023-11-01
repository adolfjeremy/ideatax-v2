const imagesContainer = document.querySelectorAll(".zoomable");

let currentZoom = 1;
let minZoom = 1;
let maxZoom = 5;
let stepSize = 0.05;

function zoomImage(direction, targetElement) {
    let newZoom = currentZoom + direction * stepSize;

    // Limit the zoom level to the minimum and maximum values
    if (newZoom < minZoom || newZoom > maxZoom) {
        return;
    }

    currentZoom = newZoom;

    // Update the CSS transform of the image to scale it
    targetElement.style.transform = "scale(" + currentZoom + ")";
}
imagesContainer.forEach((container) => {
    container.addEventListener("wheel", function (event) {
        let direction = event.deltaY > 0 ? -1 : 1;
        zoomImage(direction, this);
    });
});
