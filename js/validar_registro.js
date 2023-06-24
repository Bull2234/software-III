const form = document.getElementById('regisform');

form.addEventListener('submit', (event) => {
  const password = document.getElementById('contrasena').value;
  const confirmar = document.getElementById('confirmacion').value;
  const tipousuario = document.getElementById('usuario')
  const popup = document.getElementById('popup');
  var contrasenaRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*\W)[a-zA-Z0-9\S]{8,}$/;
  const popup_contrasena_segura = document.getElementById('popup_contrasena_segura');
  //comprobar fecha variables
  var fechaInput = document.getElementById('fecha').value;
  var fechaSeleccionada = new Date(fechaInput);
  var fechaActual = new Date();
  const popup_fecha = document.getElementById('popup_fecha');
  fechaSeleccionada.setHours(0, 0, 0, 0);
  fechaActual.setHours(0, 0, 0, 0);
  if (password !== confirmar) {
    popup.classList.add("open-popup");
    event.preventDefault(); // evita que el formulario se envíe
   
  }
  //agregamos validaciones al formulario de registro (contraseña segura )
  if (contrasenaRegex.test(password)) {
    console.log("Contraseña válida");
  } else {
    popup_contrasena_segura.classList.add("open-popup-seguro");
    event.preventDefault(); // evita que el formulario se envíe
  }

  if (fechaSeleccionada.getTime() === fechaActual.getTime()) {
    popup_fecha.classList.add("open-popup-fecha");
    event.preventDefault(); // evita que el formulario se envíe
    //alert("No se permite seleccionar la fecha actual");
    return false;
  }

  return true;
  


 
});

function soloLetras(event) {
  var input = event.target;
  var inputValue = event.key;
  
  var letrasRegex = /^[a-zA-Z\s]*$/; // Expresión regular para letras y espacios
  
  if (!letrasRegex.test(inputValue)) {
    event.preventDefault(); // Evitar que el carácter no válido se ingrese en el campo
  }
}

function soloNumeros(event) {
  var input = event.target;
  var inputValue = event.key;
  
  var letrasRegex = /^[a-zA-Z\s]*$/; // Expresión regular para letras y espacios
  
  if (!letrasRegex.test(inputValue)) {
    event.preventDefault(); // Evitar que el carácter no válido se ingrese en el campo
  }
}

function soloNumeros(event) {
  var input = event.target;
  var inputValue = event.key;
  
  var numerosRegex = /^[0-9]+$/; // Expresión regular para números
  
  if (!numerosRegex.test(inputValue)) {
    event.preventDefault(); // Evitar que el carácter no válido se ingrese en el campo
  }
}