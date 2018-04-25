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

	$("#data").blur(function(){
		validarCampo("#data", "#campo_data", "#alerta_data");
	});

	$("#email").blur(function(){
		validarCampo("#email", "#campo_email", "#alerta_email");
	});

	$("#mat").blur(function(){
		validarCampo("#mat", "#campo_mat", "#alerta_mat");
	});

	$("#curso").blur(function(){
		if ( $("#curso").val() == "0" ) {
         	$("#alerta_curso").slideDown();
			// Adiciona a classe CSS de erro
			$("#campo_curso").addClass("has-error");
			// Define o foco para o campo
			$("#curso").focus(); 
        } else{
        	// Remover a classe de erro;
			$("#campo_curso").removeClass("has-error");
			// Ocultar o alerta - mensagem
			$("#alerta_curso").hide();
        }

	});
});
