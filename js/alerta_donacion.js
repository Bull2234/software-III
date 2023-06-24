
document.addEventListener('DOMContentLoaded', function(){
  const nombre_prod = document.getElementById('nombre_prod');
  const cant_prod = document.getElementById('cantidad_prod');
  const fecha_prod = document.getElementById('fecha_prod');
  const btn = document.getElementById('btn');
  const alert = document.getElementById('alert');
  const correo = document.getElementById('correo_donante');

  function adddonacion(event){
    if(nombre_prod.value === '' || cantidad_prod.value === '' || fecha_prod.value === '' || correo.value === ''){
      alert.style.display = 'block';
      alert.innerHTML = 'Hay campos vacíos';
      event.preventDefault(); 
     
    } 
    else {
       
    }
    
}

  
  
  btn.addEventListener('click', adddonacion);
});

