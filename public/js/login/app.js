// Popovers

// Constantes Varibles

const help_button = document.querySelector("#help-button");
const help_container = document.querySelector("#help");
const formulario = document.querySelector("#formulario");

//Funciones de eventos click

help_button.onclick = () => {
    help_container.classList.toggle('active');
}
