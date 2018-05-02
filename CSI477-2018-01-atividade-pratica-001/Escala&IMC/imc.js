/*
 * Calcular IMC
*/

function imc(w, h) {

	var peso = $(w).val();
	var altura = $(h).val();
	var imc = peso / (altura * altura);
		
	//Apresentar o resultado
    $("input[name='res']").val(imc);
  
  return true;
}



// Aguardar que o documento esteja completo - carregado
$(document).ready(function(){

  console.log("Documento carregado.");

  $("#btn-j2").click(function(){
      imc("#peso", "#altura");

  });

});
