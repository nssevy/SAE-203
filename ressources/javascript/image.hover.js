document.querySelectorAll(".image-container").forEach((container) => {
    const image = container.querySelector("img");

    if (image) {
        image.style.transition = "transform 0.5s ease";

        container.addEventListener("mouseenter", () => {
            image.style.transform = "scale(1.1)";
        });

        container.addEventListener("mouseleave", () => {
            image.style.transform = "scale(1)";
        });
    }
});
