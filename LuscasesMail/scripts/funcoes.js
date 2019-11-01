$(document).ready(function(){
	
	var bgColorArray = ['../img/bg/1.jpg','../img/bg/2.jpg'],
		selectBG = bgColorArray[Math.floor(Math.random() * bgColorArray.length)];

	$('body').css('background', 'url(' + selectBG + ')')
	
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
			document.getElementById("divAviso").innerHTML = "";		
			document.getElementById("loginLoading").innerHTML = "<br><img src='../img/loading.svg' width='32px' height='32px'>";
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
		beforeSend: function(){			
			document.getElementById("divAviso").innerHTML = "";
			document.getElementById("loginLoading").innerHTML = "<br><img src='../img/loading.svg' width='32px' height='32px'>";
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
				document.getElementById("divAviso").innerHTML = "<br><h5>Conta criada com sucesso.</h5>";
				//location.href = 'paginas/caixa_entrada.html';				
			}
			else if (jsonData.success == "2")
			{
				document.getElementById("divAviso").className = "loginFail";
				document.getElementById("divAviso").innerHTML = "<br><h5>Senhas n?o coincidem!</h5>";							
			}
			else
			{
				document.getElementById("divAviso").className = "loginFail";
				document.getElementById("divAviso").innerHTML = "<br><h5>Email j? existe!</h5>";
			}
	   },
	   complete:function(data){			
			$("#loginLoading").hide();
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
