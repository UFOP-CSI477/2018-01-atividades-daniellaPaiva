/*
 * Validar os campos do formulários
*/

function jornada1() {

	var res = $("input[name='planetas']:checked").val();

    if (res == 'Sol')  {
        alert("Resposta correta.");
        $("#btn-pj").show();
        $("#btn-j1").hide();

    } else{
    	alert("Resposta errada.");
    	$("#btn-pj").hide();
    }

    return true;
	 
}


function continuar(){
	if($("#met").val() != "0"){
		$("#foguet").removeAttr('disabled');
	}

	if($("#foguet").val() != "0"){
		$("#ovn").removeAttr('disabled');
		$("#btn-j2").removeAttr('disabled');
	}
}


function jornada2() {
	var cont=0;

	if($("#met").val() != "3"){
		cont = 1;
	} else {
		$("#met").attr('disabled', 'disabled');
	}

	if($("#foguet").val() != "1"){
		cont = 1;
	} else {
		$("#foguet").attr('disabled', 'disabled');
	}

	if($("#ovn").val() != "2"){
		cont = 1;
	} else {
		$("#ovn").attr('disabled', 'disabled');
	}

	if(cont == 1){
		alert("Resposta errada. Tente novamente!");
	} else{
		alert("Parabéns");
		$("#btn-pj2").removeAttr('disabled');
	}
	
}



// Aguardar que o documento esteja completo - carregado
$(document).ready(function(){

	console.log("Documento carregado.");
	
	$("#btn-j1").click(function(){
		jornada1();
	});

	$("#btn-pj").click(function(){
		window.location.href='jornada2.html'
	});


	$("#btn-j2-c").click(function(){
		continuar();
	});

	$("#btn-j2").click(function(){
		jornada2();
	});


	$("#btn-pj2").click(function(){
		window.location.href='jornada3.html'
	});

	
});
