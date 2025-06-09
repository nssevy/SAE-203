// Document queryselector ca veut dire que je vais chercher dans le html tout les éléments qui ont l'id "hover-card", tu peux vérifier dans index.html

// Aussi si tu veux voir direcrement ce que j'ai cible tu peux faire un console log
// par exemple si tu note :

// console.log(button);

// Et que tu vas dans l'inspecteur du navigateur tu pourras voir ce que la variable "button" cible
document.querySelectorAll("#hover-card").forEach((card) => {
    const button = card.querySelector("button");
    console.log(button);

    if (button) {
        // addEventListener ca veut dire ajoute à card (que j'ai défini en haut avec la variable "const button = card etc" tel evénement, là l'éventement est "mouseenter". Donc si la souris entre dans le card, alors on ajoute les classes suivantes au button. Et les classes c'est un background rose, un texte rose foncé et une bordure blanche.

        // C'est la meme chose pour tout les java que je fais
        card.addEventListener("mouseenter", () => {
            button.classList.add(
                "bg-pink-500/60",
                "text-pink-900",
                "border-white"
            );
        });
        // Et à chaque fois que l'on ajoute des classes css on est obligé de les enlèver sinon elles restent d'ou le "button.classlist.REMOVE"

        // Voila voila
        card.addEventListener("mouseleave", () => {
            button.classList.remove(
                "bg-pink-500/60",
                "text-pink-900",
                "border-white"
            );
        });
    }
});
