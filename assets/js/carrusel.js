const carousel = document.querySelector(".carousel");
const images = carousel.querySelectorAll("img");

let isDragging = false;
let startPosX = 0;
let currentTranslate = 0;
let prevTranslate = 0;
let animationID;

images.forEach((image) => {
    image.addEventListener("mousedown", (e) => {
        isDragging = true;
        startPosX = e.clientX - image.getBoundingClientRect().left;
        cancelAnimationFrame(animationID);
    });

    image.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        const x = e.clientX - image.getBoundingClientRect().left;
        const translate = prevTranslate + x - startPosX;

        if (translate < 0) {
            currentTranslate = translate;
            carousel.style.transform = `translateX(${translate}px)`;
        }
    });

    image.addEventListener("mouseup", () => {
        isDragging = false;
        prevTranslate = currentTranslate;

        // Ajustar la posición final al ancho de una imagen
        const imageWidth = images[0].getBoundingClientRect().width;
        const newPosition = Math.round(prevTranslate / imageWidth) * imageWidth;

        animateCarousel(prevTranslate, newPosition, 300);
    });

    image.addEventListener("mouseleave", () => {
        isDragging = false;
        prevTranslate = currentTranslate;

        // Ajustar la posición final al ancho de una imagen
        const imageWidth = images[0].getBoundingClientRect().width;
        const newPosition = Math.round(prevTranslate / imageWidth) * imageWidth;

        animateCarousel(prevTranslate, newPosition, 300);
    });

    image.addEventListener("click", () => {
        images.forEach((img) => {
            img.classList.remove("expanded");
        });
        image.classList.add("expanded");
    });
});

function animateCarousel(start, end, duration) {
    const startTime = new Date().getTime();

    function animation() {
        const currentTime = new Date().getTime();
        const elapsedTime = currentTime - startTime;
        currentTranslate = easeInOutQuad(elapsedTime, start, end - start, duration);

        carousel.style.transform = `translateX(${currentTranslate}px)`;

        if (elapsedTime < duration) {
            animationID = requestAnimationFrame(animation);
        }
    }

    animation();
}

// Función de temporización para suavizar la animación
function easeInOutQuad(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return c / 2 * t * t + b;
    t--;
    return -c / 2 * (t * (t - 2) - 1) + b;
}
