document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("#coursesMenu a");
    const conteudo = document.getElementById("conteudo-dinamico");

    links.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const url = this.href;

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    conteudo.innerHTML = html;
                })
                .catch(error => {
                    console.error("Erro ao carregar conteúdo:", error);
                    conteudo.innerHTML = "<p class='text-red-500'>Erro ao carregar o conteúdo. Tente novamente.</p>";
                });
        });
    });
});
