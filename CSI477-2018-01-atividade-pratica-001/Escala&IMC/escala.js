/*
 * Calcular Escala Ritcher
 * M = log10(A) + 3.log10(8.deltaT) - 2,92
*/

function escala_ritcher(amplitude, deltaT) {

  var amp = Math.log10($(amplitude).val());
  var del = 3 * Math.log10(8 * $(deltaT).val());

  var escala = amp + del - 2.92;

  //Apresentar o resultado
  $("input[name='res']").val(escala);
  
  return true;
}



// Aguardar que o documento esteja completo - carregado
$(document).ready(function(){

  console.log("Documento carregado.");

  $("#btn-j1").click(function(){
      escala_ritcher("#amplitude", "#deltaT");
  });

});
