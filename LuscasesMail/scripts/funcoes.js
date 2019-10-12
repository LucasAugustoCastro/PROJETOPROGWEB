$(document).ready(function(){
	
    $("#bEntrar").click(function(){
        fVerificarVazio();
        fVerificarSenha();
    });
	
	//Login
	$('#loginform').submit(function(e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: 'php/login.php',
		data: $(this).serialize(),
		success: function(response)
		{
			var jsonData = JSON.parse(response);
  
			if (jsonData.success == "1")
			{
				alert('Logado com sucesso!');
				location.href = 'paginas/caixa_entrada.html';
			}
			else
			{
				alert('Email ou senha não encontrados!');
			}
	   }
   });
 });
 
	//Registro
 	$('#registerform').submit(function(e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: '../php/cadastro.php',
		data: $(this).serialize(),
		success: function(response)
		{
			var jsonData = JSON.parse(response);
  
			if (jsonData.success == "1")
			{
				alert('Conta criada com sucesso!');	
				location.href = 'paginas/caixa_entrada.html';				
			}
			else
			{
				alert('Email já existe!');
			}
	   }
   });
 });
	
});

$(window).on('load', function() {	
	$(".loading").fadeOut("slow");
});


function fVerificarVazio() {

    $("input").each(function(){
        if($(this).val() == ""){
            $(this).addClass("txtBoxVazio");
        }
        else{
            $("#divEntrar").html("<div id='divEntrar'><button onclick='location.href='paginas/caixa_entrada.html''  id='bEntrar' class='botao'> Entrar </button></div>")
        }
    });
}

function fVerificarSenha() {

    if($("#pSenha").val() != $("#pConfirm").val()) {
        $("#divAviso").html("<h4>Senha e confirmacao de senha diferentes.</h4>")
    }
    
}
