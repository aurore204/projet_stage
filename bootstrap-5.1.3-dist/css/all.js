document.addEventListener("DOMContentLoaded", function() {
    const currentLocation = window.location.pathname;
    const links = document.querySelectorAll('.sidebar .menu li a');

    // Supprimer la classe 'active' de tous les liens
    links.forEach(link => {
        link.parentElement.classList.remove('active');
    });

    // Ajouter la classe 'active' uniquement à l'élément parent du lien correspondant à l'URL actuelle
    links.forEach(link => {
        const href = link.getAttribute('href');
        if (currentLocation.endsWith(href)) {
            link.parentElement.classList.add('active');
        }
    });
});
