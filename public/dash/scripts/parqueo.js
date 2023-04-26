


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


  document.addEventListener("DOMContentLoaded", function() {
    const $seleccionArchivos = document.querySelector("#fot"),
      $imagenPrevisualizacion = document.querySelector("#Modific_image");
  
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
      const primerArchivo = archivos[0];
      // Lo convertimos a un objeto de tipo objectURL
      const objectURL = URL.createObjectURL(primerArchivo);
      // Y a la fuente de la imagen le ponemos el objectURL
      $imagenPrevisualizacion.src = objectURL;
    });

  });



  var label = document.getElementById('labelqr');
  var butonqr = document.getElementById('butqr');
  var fondo = document.getElementById('fondo');

  function cambio(event){

    const archivo = event.target.files[0];

    butonqr.style.display = "none";

    label.style.display = "block";
    fondo.style.height = "842px";
  }
  
  