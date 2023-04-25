//window.onload= document.querySelector("#liIz").value="23:59";

function lettersOnly(input){
    var  regex = /[^a-z\s]/gi;
    input.value = input.value.replace(regex,"");
    input.value = input.value.replace(/\s\s+/g," ").trimStart();
  }
  function verificar(input){
    var  regex = /[^a-z\s]/gi;
    input.value = input.value.replace(regex,"").trim();
  }
  function telephone(input){
    var  regex = /[^0-9]/gi;
    input.value = input.value.replace(regex,"");

  }



    const $seleccionArchivos = document.querySelector("#foto"),
    $imagenPrevisualizacion = document.querySelector("#imagenQr");
    const $fondo = document.querySelector("#fondo");

  // Escuchar cuando cambie
  $seleccionArchivos.addEventListener("change", () => {
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = $seleccionArchivos.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
      $imagenPrevisualizacion.src = "";
      return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    $fondo.style.height="1000px";
    $imagenPrevisualizacion.style.width="225px";
    $imagenPrevisualizacion.style.height="225px";

    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    $imagenPrevisualizacion.src = objectURL;
  });

    
  
