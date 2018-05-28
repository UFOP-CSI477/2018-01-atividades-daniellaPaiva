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

	$(".entrar").blur(function()){
		validarCampo("#email", "#campo_email", "#alerta_email");
	}

	

});
