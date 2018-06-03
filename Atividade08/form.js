/*
 * Validar os campos do formulários
*/

function validarCampo(campo, grupo, alerta) {
	
	console.log("validarCampo: " + campo + " " + grupo + " " + alerta);

	// Validar os campos - valor1 e valor2
	var valor = $(campo).val();

	// Validar - valor
	if ($(campo).val() == "") {
	  // Exibe o alerta
	  $(alerta).slideDown();
	  // Adiciona a classe CSS de erro
	  $(grupo).addClass("has-error");
	  // Limpa o campo
	  $(campo).val("");
	  // Define o foco para o campo
	  $(campo).focus();
	  return false;
	}

	// Valor - correto
	// Remover a classe de erro;
	$(grupo).removeClass("has-error");
	// Ocultar o alerta - mensagem
	$(alerta).hide();
	return true;
  
}


// Aguardar que o documento esteja completo - carregado
$(document).ready(function(){

	console.log("Documento carregado.");

	$("#nome").blur(function(){
		validarCampo("#nome", "#campo_nome", "#alerta_nome");
	});


	$("#cidade").blur(function(){
		if ( $("#cidade").val() == "0" ) {
         	$("#alerta_cidade").slideDown();
			// Adiciona a classe CSS de erro
			$("#campo_cidade").addClass("has-error");
			// Define o foco para o campo
			$("#cidade").focus(); 
        } else{
        	// Remover a classe de erro;
			$("#campo_cidade").removeClass("has-error");
			// Ocultar o alerta - mensagem
			$("#alerta_cidade").hide();
        }

	});
});
