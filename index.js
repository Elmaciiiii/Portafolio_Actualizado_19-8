

function toggleMenu() {
    const navLinks = document.getElementById('links');
    navLinks.classList.toggle('activo');
}

document.addEventListener('DOMContentLoaded', function() {
    const habilidadesLink = document.getElementById('habilidadesLink');

    if (habilidadesLink) {
        habilidadesLink.addEventListener('click', function() {
            sessionStorage.setItem('fillSkills', 'true');
        });
    }

    // Revisar si se necesita llenar las barras cuando se carga habilidades.html
    if (window.location.pathname.includes('habilidades.html')) {
        if (sessionStorage.getItem('fillSkills') === 'true') {
            llenarBarrasHabilidades();
            sessionStorage.removeItem('fillSkills');
        }
    }
});

function llenarBarrasHabilidades() {
    document.getElementById("html").classList.add("barra-progreso1");
    document.getElementById("js").classList.add("barra-progreso2");
    document.getElementById("bd").classList.add("barra-progreso3");
    document.getElementById("ps").classList.add("barra-progreso4");
    document.getElementById("py").classList.add("barra-progreso5");
}
