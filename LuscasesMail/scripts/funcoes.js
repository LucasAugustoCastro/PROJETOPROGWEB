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
		beforeSend: function(){				   
            $("#loginLoading").show();
			
				//delay teste
						var i = 0;
						function testt() {
							i++;
							console.log(i);
							if (i < 1000) {
								testt();
							}
						}
						testt();
						return true;
				//					
		},
		success: function(response)
		{
			var jsonData = JSON.parse(response);			
			if (jsonData.success == "1")
			{				
				document.getElementById("divAviso").className = "loginSucess";				
				document.getElementById("divAviso").innerHTML = "<br><h5>Logado com sucesso.</h5>";
				//location.href = 'paginas/caixa_entrada.html';
			}
			else
			{
				document.getElementById("divAviso").className = "loginFail";
				document.getElementById("divAviso").innerHTML = "<br><h5>Email ou senha incorretos.</h5>";
			}
	   },
	   complete:function(data){			
			$("#loginLoading").hide();
		   }
   });
 });
 
  $("#loading").ajaxStart(function () {
    $(this).show();
 });

 $("#loading").ajaxStop(function () {
   $(this).hide();
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
