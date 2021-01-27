document.getElementById('Login').addEventListener('click', () => {
    location.href='../login/login.html'
});

let busquedaOculta = true;

document.getElementById('iconoBusqueda').addEventListener('click', () => {
    if(busquedaOculta) {
        mostrar();
        busquedaOculta = !busquedaOculta;
    } else {
        ocultar();
        busquedaOculta = !busquedaOculta;
    }
})

function ocultar() {
    document.getElementById('busqueda').style.display = 'none';
}

function mostrar() {
    document.getElementById('busqueda').style.display = 'inline';
}

document.getElementById('buttonBusqueda').addEventListener('click', () => {
    location.href='../busqueda';
})