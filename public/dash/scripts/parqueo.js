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

