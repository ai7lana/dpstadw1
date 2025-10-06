document.addEventListener("DOMContentLoaded", function () {

        const estrelaCima = document.getElementById("estrelacima");
        const estrelaBaixo = document.getElementById("estrelabaixo");

        // posições e direções separadas
        let posCima = 0;
        let subindoCima = true;
        let posBaixo = 0;
        let subindoBaixo = false; // começa descendo pra ficar fora de sincronia

        const animar = () => {
            // ---- Estrela de cima ----
            if (subindoCima) {
                posCima += 0.2; // sobe lentamente
                if (posCima >= 20) subindoCima = false;
            } else {
                posCima -= 0.2; // desce suavemente
                if (posCima <= 0) subindoCima = true;
            }

            // ---- Estrela de baixo ----
            if (subindoBaixo) {
                posBaixo += 0.15; // sobe um pouco mais devagar
                if (posBaixo >= 15) subindoBaixo = false;
            } else {
                posBaixo -= 0.15;
                if (posBaixo <= 0) subindoBaixo = true;
            }

            // aplica o movimento com transição suave
            estrelaCima.style.transform = `translateY(${-posCima}px)`;
            estrelaBaixo.style.transform = `translateY(${-posBaixo}px)`;

            estrelaCima.style.transition = "transform 0.1s ease-out";
            estrelaBaixo.style.transition = "transform 0.1s ease-out";

            requestAnimationFrame(animar);
        };

        animar(); // inicia a animação
});

document.addEventListener("DOMContentLoaded", function () {
    const gatoDireita = document.getElementById("paogatodireita");
    const gatoEsquerda = document.getElementById("paogatoesquerda");

    let anguloDir = 0;
    let direcaoDir = 1;
    let anguloEsq = 0;
    let direcaoEsq = -1;

    const animar = () => {
        // Gato da direita
        anguloDir += 0.4 * direcaoDir;
        if (anguloDir > 8 || anguloDir < -8) direcaoDir *= -1;

        // Gato da esquerda
        anguloEsq += 0.5 * direcaoEsq;
        if (anguloEsq > 10 || anguloEsq < -10) direcaoEsq *= -1;

        // Aplica a rotação
        gatoDireita.style.transform = `rotate(${anguloDir}deg)`;
        gatoEsquerda.style.transform = `rotate(${anguloEsq}deg)`;

        // Suaviza o movimento
        gatoDireita.style.transition = "transform 0.1s ease-in-out";
        gatoEsquerda.style.transition = "transform 0.1s ease-in-out";

        requestAnimationFrame(animar);
    };

    animar();
});
