/*
 * Calcular IMC
*/

function imc(w, h) {

	var peso = $(w).val();
	var altura = $(h).val();
	var imc = peso / (altura * altura);
		
	//Apresentar o resultado
    $("input[name='res']").val(imc);
  
  if(imc < 18.5){
    $("#efeito").val("SUBNUTRIÇÃO");
  }
  if(imc >= 18.5 && imc <= 24.9){
    $("#efeito").val("PESO SAULDÁVEL");
  }
  if(imc > 24.9 && imc <= 29.9){
    $("#efeito").val("SOBREPESO");
  }
  if(imc > 29.9 && imc <= 34.9){
    $("#efeito").val("OBESIDADE GRAU 1");
  }
  if(imc > 34.9 && imc <= 39.9){
    $("#efeito").val("OBESIDADE GRAU 2");
  }
  if(imc > 39.9){
    $("#efeito").val("OBESIDADE GRAU 3");
  }

  var peso_ideal = 20 * (altura * altura);

  $("#ideal").val(peso_ideal);


  return true;
}



// Aguardar que o documento esteja completo - carregado
$(document).ready(function(){

  console.log("Documento carregado.");

  $("#btn-j2").click(function(){
      imc("#peso", "#altura");

  });

});
