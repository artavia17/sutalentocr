'user strict'

// Convierte la imagen la imagen del input en Code 64 para subirlo al servidor y que tenga una carga mas rapida


const imagen = document.querySelector("#imagen_perfil");
const input_hidden = document.querySelector("#code64");

function readFile(input){

    let file = input.files[0];

    let reader = new FileReader();

    reader.addEventListener("load", function () {
        imagen.src = reader.result;
        input_hidden.value = reader.result;
    }, false);
    
    if (file) {
      reader.readAsDataURL(file);
    }

}

// Validacion de datos

const actualizar = document.querySelector("#update");
const password = document.querySelector("#password");
const confirmation = document.querySelector("#confirmation");
const error = document.querySelector("#error");
const boton_updated = document.querySelector("#boton_actualizar");

actualizar.onsubmit = (e) =>{

  if(password.value != confirmation.value){
      error.textContent = "Las contraseñas no coinciden.";
      e.preventDefault();
  }else{
    error.textContent = "";
    boton_updated.textContent = "Actualizando perfil ..."
    boton_updated.disabled = true;

  }

}