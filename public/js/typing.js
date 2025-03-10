document.addEventListener("DOMContentLoaded", function () {
    const textElement = document.getElementById("typing-text");
    const phrases = [
        "A melhor plataforma de Analíse de Viabilidade.",
        "Inscreva-se agora e transforme sua carreira.",
        "Junte-se a milhares de alunos satisfeitos.",
        "Decisões inteligentes começam aqui.",
            "Visualize o futuro do seu projeto.",
            "Viabilidade ao seu alcance.",
            "Reduza riscos, maximize resultados.",
            "Invista com confiança.",
            "Seu sucesso, nossa análise.",
            "Planeje, analise, prospere.",
            "O futuro do seu negócio começa agora.",
            "Precisão que gera resultados.",
            "Transforme ideias em realidade.",
    ];
    let index = 0;
    let charIndex = 0;
    let isDeleting = false;

    function typeEffect() {
        let currentPhrase = phrases[index];
        if (isDeleting) {
            textElement.textContent = currentPhrase.substring(0, charIndex--);
        } else {
            textElement.textContent = currentPhrase.substring(0, charIndex++);
        }

        let speed = isDeleting ? 50 : 100;

        if (!isDeleting && charIndex === currentPhrase.length) {
            speed = 1500;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            index = (index + 1) % phrases.length;
            speed = 500;
        }

        setTimeout(typeEffect, speed);
    }

    typeEffect();
});
