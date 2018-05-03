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

  if(escala < 3.5){
    $("#efeito").val("Geralmente não sentido, mas gravado.");
  }
  if(escala >= 3.5 && escala <= 5.4){
    $("#efeito").val("Às vezes sentido, mas raramente causa danos.");
  }
  if(escala >= 5.5 && escala <= 6.0){
    $("#efeito").val("No máximo causa pequenos danos a prédios bem construídos, mas pode danificar seriamente casas mal construídas em regiões próximas.");
  }
  if(escala >= 6.1 && escala <= 6.9){
    $("#efeito").val("Pode ser destrutivo em áreas em torno de até 100km do epicentro.");
  }
  if(escala >= 7.0 && escala <= 7.9){
    $("#efeito").val("Grande terremoto. Pode causar sérios danos numa grande faixa.");
    alert("Grande terremoto. Pode causar sérios danos numa grande faixa.");
  }
  if(escala > 7.9){
    $("#efeito").val("Enorme terremoto. Pode causar graves danos em muitas áreas mesmo que estejam a centenas de quilômetros.");
  }

  
  return true;
}



// Aguardar que o documento esteja completo - carregado
$(document).ready(function(){

  console.log("Documento carregado.");

  $("#btn-j1").click(function(){
      escala_ritcher("#amplitude", "#deltaT");
  });

});
