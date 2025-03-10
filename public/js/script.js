document.addEventListener("DOMContentLoaded", function () {
    // 📌 MENU RESPONSIVO
    const menuToggle = document.getElementById("menu-toggle");
    const menu = document.getElementById("menu");

    if (menuToggle && menu) {
        menuToggle.addEventListener("click", function () {
            menu.classList.toggle("hidden");
        });
    }

    // 📌 SLIDER
    let currentIndex = 0;
    const slides = document.querySelectorAll("#slider > div");
    const totalSlides = slides.length;
    const slider = document.getElementById("slider");
    const prevBtn = document.getElementById("prev");
    const nextBtn = document.getElementById("next");

    if (slider && slides.length > 0) {
        function updateSlider() {
            const offset = -currentIndex * 100;
            slider.style.transform = `translateX(${offset}%)`;
        }

        if (prevBtn) {
            prevBtn.addEventListener("click", function () {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateSlider();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener("click", function () {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlider();
            });
        }

        // Troca de slide automática a cada 5 segundos
        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }, 9000);
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("shake-button");

    function shakeEffect() {
        button.classList.add("shake");

        // Remove o efeito após 500ms para poder ser reaplicado
        setTimeout(() => {
            button.classList.remove("shake");
        }, 500);
    }

    // Inicia o tremor automaticamente a cada 2 segundos
    setInterval(shakeEffect, 3000);
});


/// Efeito nos crtões de beneficios
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.service-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'scale(1.05)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'scale(1)';
        });
    });
});


//efeito na tabela de cursos
document.addEventListener("DOMContentLoaded", function () {
    const tabButtons = document.querySelectorAll(".tab-button");
    const tabContents = document.querySelectorAll(".tab-content");

    tabButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Remover classes 'active' de todos os botões e esconder todas as abas
            tabButtons.forEach(btn => btn.classList.remove("bg-gradient-to-r", "from-orange-500", "to-red-500", "text-white"));
            tabContents.forEach(content => content.classList.add("hidden"));

            // Adicionar classes ativas ao botão clicado
            this.classList.add("bg-gradient-to-r", "from-orange-500", "to-red-500", "text-white");

            // Mostrar o conteúdo correspondente
            const tabId = this.getAttribute("data-tab");
            document.getElementById(tabId).classList.remove("hidden");
        });
    });
});

//Formulario

document.getElementById("calculate").addEventListener("submit", function(event) {
    let isValid = true;

    // Validação do Nome
    let name = document.getElementById("name").value.trim();
    if (name === "") {
        document.getElementById("name-error").textContent = "O nome é obrigatório.";
        isValid = false;
    } else {
        document.getElementById("name-error").textContent = "";
    }

    // Validação do Email
    let email = document.getElementById("email").value.trim();
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById("email-error").textContent = "Digite um email válido.";
        isValid = false;
    } else {
        document.getElementById("email-error").textContent = "";
    }

    // Validação do Telefone
    let tel = document.getElementById("tel").value.trim();
    let telRegex = /^\d{9}$/; // Exemplo: 923456789 (9 dígitos)
    if (!telRegex.test(tel)) {
        document.getElementById("tel-error").textContent = "Digite um telefone válido (9 dígitos).";
        isValid = false;
    } else {
        document.getElementById("tel-error").textContent = "";
    }

    // Validação do BI
    let bi = document.getElementById("bi").value.trim();
    let biRegex = /^\d{9}[A-Z]{2}\d{3}$/; // Exemplo: 123456789LA012
    if (!biRegex.test(bi)) {
        document.getElementById("bi-error").textContent = "Digite um BI válido (ex: 123456789LA012).";
        isValid = false;
    } else {
        document.getElementById("bi-error").textContent = "";
    }

    // Se algum campo estiver inválido, impede o envio do formulário
    if (!isValid) {
        event.preventDefault();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".testimonials-slider", {
        loop: true,
        autoplay: { delay: 5000 },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        spaceBetween: 20,
        slidesPerView: 1,
    });
});


