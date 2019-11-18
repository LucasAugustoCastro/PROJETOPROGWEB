$(window).on('load', function() {	
	$(".loading").fadeOut("slow");
});

$(document).ready(function(){

	$.ajax({ 
		type: "POST",		
		url: '../php/inbox.php',
		data: $(this).serialize(),
		beforeSend: function(){		
			document.getElementById('inboxPage').classList.add("menuActive");
			document.getElementById('titleAtual').innerHTML = "<i class='fas fa-envelope-open-text'></i> Inbox"		
			document.getElementById('divChange').innerHTML = "<br><img src='../img/loading.svg' width='32px' height='32px'>";		
		},
		success: function(response)
		{
			document.getElementById('divChange').innerHTML = "";
			var jsonData = JSON.parse(response);		
	//console.log(jsonData.email[0]['@attributes'].titulo);
	var divEmails = '';
	for(var i in jsonData) {                    
		if(Array.isArray(jsonData[i])) {
			$.each(jsonData.email, function (i, item) {
				console.log("TA AQ1")
				divEmails += '<form id="replyForm" method="post"><input type="hidden" name="titulo" value="'+item['@attributes'].titulo+'"" /><input type="hidden" name="conteudo" value="'+item['@attributes'].conteudo+'"" /><input type="hidden" name="remetente" value="'+item['@attributes'].remetente+'"" /><input type="hidden" name="id" value="'+item['@attributes'].id+'"" /><div id="'+item['@attributes'].id+'"" class="row divEmail p-3 text-dark"><div class="col-3">De: '+item['@attributes'].remetente+'@luscasesmail.com</div><div name="'+item['@attributes'].remetente+'"" class="col-6">Titulo: '+item['@attributes'].titulo+'</div><div class="col-1 divEmailIcon"><i class="far fa-eye"></i></div></div>	<div id="'+item['@attributes'].id+'conteudo" class="row divEmailConteudo row p-3 text-dark"><div class="p-3 col-">'+item['@attributes'].conteudo+'</div><div class="row"><div class="col- pl-4 pt-3 pb-3 respondeIcon"><button class="respondeIconButton" type="submit"><i class="fas fa-reply"></i></input></div><div class="col-10"></div><div class="col- p-3 respondeIcon"><button class="respondeIconButton" type="submit"><i class="fas fa-trash-restore"></i></input></div></div></div></form><div class="row divEmail border-bottom"></div>';
			});
		} else {
			console.log("TA AQ2")
			divEmails = '<form id="replyForm" method="post"><input type="hidden" name="titulo" value="'+jsonData.email['@attributes'].titulo+'"" /><input type="hidden" name="conteudo" value="'+jsonData.email['@attributes'].conteudo+'"" /><input type="hidden" name="remetente" value="'+jsonData.email['@attributes'].remetente+'"" /><input type="hidden" name="id" value="'+jsonData.email['@attributes'].id+'"" /><div id="'+jsonData.email['@attributes'].id+'"" class="row divEmail p-3 text-dark"><div class="col-3">De: '+jsonData.email['@attributes'].remetente+'@luscasesmail.com</div><div class="col-6">Titulo: '+jsonData.email['@attributes'].titulo+'</div><div class="col-1 divEmailIcon"><i class="far fa-eye"></i></div></div> <div id="'+jsonData.email['@attributes'].id+'conteudo" class="row divEmailConteudo p-3 text-dark"><div p-3 class="col-">'+jsonData.email['@attributes'].conteudo+'</div><div class="row"><div class="col- pl-4 pt-3 pb-3 respondeIcon"><button class="respondeIconButton" type="submit"><i class="fas fa-reply"></i></input></div><div class="col-10"></div><div class="col- p-3 respondeIcon"><button class="respondeIconButton" type="submit"><i class="fas fa-trash-restore"></i></input></div></div></div></form><div class="row divEmail border-bottom"></div>';
		}
	}
	$('#divChange').append(divEmails);	
},
complete:function(data){			
}
});

	$('#inboxPage').click(function() {	   
		$.ajax({ 
			type: "POST",		
			url: '../php/inbox.php',
			data: $(this).serialize(),
			beforeSend: function(){		
				document.getElementById('titleAtual').innerHTML = "<i class='fas fa-envelope-open-text'></i> Inbox"	
				document.getElementById('inboxPage').classList.add("menuActive");
				document.getElementById('enviarPage').classList.remove("menuActive");	
				document.getElementById('lixeiraPage').classList.remove("menuActive");				
				document.getElementById('divChange').innerHTML = "<br><img src='../img/loading.svg' width='32px' height='32px'>";		
			},
			success: function(response)
			{
				document.getElementById('divChange').innerHTML = "";
				var jsonData = JSON.parse(response);		
				//console.log(jsonData.email[0]['@attributes'].titulo);
				var divEmails = '';
				for(var i in jsonData) {                    
					if(Array.isArray(jsonData[i])) {
						$.each(jsonData.email, function (i, item) {
							console.log("TA AQ1")
							divEmails += '<form id="replyForm" method="post"><input type="hidden" name="titulo" value="'+item['@attributes'].titulo+'"" /><input type="hidden" name="conteudo" value="'+item['@attributes'].conteudo+'"" /><input type="hidden" name="remetente" value="'+item['@attributes'].remetente+'"" /><input type="hidden" name="id" value="'+item['@attributes'].id+'"" /><div id="'+item['@attributes'].id+'"" class="row divEmail p-3 text-dark"><div class="col-3">De: '+item['@attributes'].remetente+'@luscasesmail.com</div><div name="'+item['@attributes'].remetente+'"" class="col-6">Titulo: '+item['@attributes'].titulo+'</div><div class="col-1 divEmailIcon"><i class="far fa-eye"></i></div></div>	<div id="'+item['@attributes'].id+'conteudo" class="row divEmailConteudo row p-3 text-dark"><div class="p-3 col-">'+item['@attributes'].conteudo+'</div><div class="row"><div class="col- pl-4 pt-3 pb-3 respondeIcon"><button class="respondeIconButton" type="submit"><i class="fas fa-reply"></i></input></div><div class="col-10"></div><div class="col- p-3 respondeIcon"><button class="respondeIconButton" type="submit"><i class="fas fa-trash-restore"></i></input></div></div></div></form><div class="row divEmail border-bottom"></div>';
						});
					} else {
						console.log("TA AQ2")
						divEmails = '<form id="replyForm" method="post"><input type="hidden" name="titulo" value="'+jsonData.email['@attributes'].titulo+'"" /><input type="hidden" name="conteudo" value="'+jsonData.email['@attributes'].conteudo+'"" /><input type="hidden" name="remetente" value="'+jsonData.email['@attributes'].remetente+'"" /><input type="hidden" name="id" value="'+jsonData.email['@attributes'].id+'"" /><div id="'+jsonData.email['@attributes'].id+'"" class="row divEmail p-3 text-dark"><div class="col-3">De: '+jsonData.email['@attributes'].remetente+'@luscasesmail.com</div><div class="col-6">Titulo: '+jsonData.email['@attributes'].titulo+'</div><div class="col-1 divEmailIcon"><i class="far fa-eye"></i></div></div> <div id="'+jsonData.email['@attributes'].id+'conteudo" class="row divEmailConteudo p-3 text-dark"><div p-3 class="col-">'+jsonData.email['@attributes'].conteudo+'</div><div class="row"><div class="col- pl-4 pt-3 pb-3 respondeIcon"><button class="respondeIconButton" type="submit"><i class="fas fa-reply"></i></input></div><div class="col-10"></div><div class="col- p-3 respondeIcon"><button class="respondeIconButton" type="submit"><i class="fas fa-trash-restore"></i></input></div></div></div></form><div class="row divEmail border-bottom"></div>';
					}
				}				
				$('#divChange').append(divEmails);	
			},
			complete:function(data){			
			}
		});
	});	

	$('#enviarPage').click(function() {	   
		document.getElementById('titleAtual').innerHTML = "<i class='fas fa-paper-plane'></i> Enviar"	
		document.getElementById('inboxPage').classList.remove("menuActive");
		document.getElementById('enviarPage').classList.add("menuActive");	
		document.getElementById('lixeiraPage').classList.remove("menuActive");	
		document.getElementById('divChange').innerHTML = "<br><img src='../img/loading.svg' width='32px' height='32px'>";		
		document.getElementById('divChange').innerHTML = '<form id="enviarEmail" method="post"><div class="form-group"><div class="p-3">Email</div><input name="email" required type="email" class="form-control" placeholder="name@luscasesmail.com"></div><div class="form-group"><div class="pl-3 pb-3">Titulo</div><input required name="titulo" class="form-control" placeholder=""></div><div class="form-group"><div class="pl-3 pb-3">Mensagem</div><textarea required class="form-control" name="mensagem" rows="3"></textarea></div><div class="pl-3 pb-3"><button type="submit" class="btn btn-dark">Enviar</button></div></form><div class="pl-3" id="resposta"></div>';
	});	

	$('#lixeiraPage').click(function() {	   
		$.ajax({ 
			type: "POST",		
			url: '../php/inbox.php',
			data: $(this).serialize(),
			beforeSend: function(){		
				document.getElementById('titleAtual').innerHTML = "<i class='fas fa-trash-alt'></i> Lixeira"	
				document.getElementById('inboxPage').classList.remove("menuActive");
				document.getElementById('enviarPage').classList.remove("menuActive");	
				document.getElementById('lixeiraPage').classList.add("menuActive");	
				document.getElementById('divChange').innerHTML = "<br><img src='../img/loading.svg' width='32px' height='32px'>";	
			},
			success: function(response)
			{
			},
			complete:function(data){			
			}
		});
	});	


	//pagina responder
	$('#divChange').on('submit', '#replyForm', function(e){
		e.preventDefault();

		$.ajax({ 
			type: "POST",		
			url: '../php/responder.php',
			data: $(this).serialize(),
			beforeSend: function(){		
				document.getElementById('titleAtual').innerHTML = "<i class='fas fa-share'></i> Responder"	
				document.getElementById('inboxPage').classList.add("menuActive");
				document.getElementById('enviarPage').classList.remove("menuActive");	
				document.getElementById('lixeiraPage').classList.remove("menuActive");				
				document.getElementById('divChange').innerHTML = "<br><img src='../img/loading.svg' width='32px' height='32px'>";	
			},
			success: function(response){
				document.getElementById('divChange').innerHTML = "";
				var jsonData = JSON.parse(response);
				document.getElementById('divChange').innerHTML = '<form id="enviarResposta" method="post"><input type="hidden" name="titulo" value="'+jsonData.titulo+'"" /><input type="hidden" name="remetente" value="'+jsonData.remetente+'"" /><div class="form-group"><div class="p-3">Responder</div><input disabled class="form-control" placeholder="'+jsonData.remetente+'@luscasesmail.com"></div><div class="form-group"><div class="pl-3 pb-3">Titulo</div><input disabled class="form-control" placeholder="Re: '+jsonData.titulo+'"></div><div class="form-group"><div class="pl-3 pb-3">Mensagem</div><textarea disabled class="form-control" placeholder="'+jsonData.conteudo+'" rows="3"></textarea></div><div class="form-group"><div class="pl-3 pb-3">Resposta</div><textarea required class="form-control" name="conteudoR" rows="3"></textarea></div><div class="pl-3 pb-3"><button type="submit" class="btn btn-dark">Enviar</button></div></form><div class="pl-3" id="resposta"></div>';
			},
			complete:function(data){			
			}
		});
	});	

	//enviar email
	$('#divChange').on('submit', '#enviarEmail', function(e){
		e.preventDefault();
		$.ajax({ 
			type: "POST",		
			url: '../php/enviarEmail.php',
			data: $(this).serialize(),
			beforeSend: function(){		
			},
			success: function(response){				
				var jsonData = JSON.parse(response);
				if (jsonData.success == 0){
					document.getElementById('resposta').innerHTML = "<div id='resposta' class='p-3'>Mensagem enviada com sucesso.</div>";	
				}
				else if(jsonData.success == 1){
					document.getElementById('resposta').innerHTML = "<div id='resposta' class='p-3'>Email nao encontrado :(</div>"	
				}
				else{
					document.getElementById('resposta').innerHTML = "<div id='resposta' class='p-3'>erro :(</div>";	

				}
			},
			complete:function(data){	
				//window.location("http://localhost/paginas/caixa_entrada.php");	
			}
		});
	});	

	//enviar resposta
	$('#divChange').on('submit', '#enviarResposta', function(e){
		e.preventDefault();
		$.ajax({ 
			type: "POST",		
			url: '../php/enviarResposta.php',
			data: $(this).serialize(),
			beforeSend: function(){		
			},
			success: function(response){				
				var jsonData = JSON.parse(response);
				if (jsonData.success == 0){
					document.getElementById('resposta').innerHTML = "<div id='resposta' class='p-3'>Mensagem enviada com sucesso.</div>";	
				}
				else{
					document.getElementById('resposta').innerHTML = "<div id='resposta' class='p-3'>erro :(</div>";		

				}
			},
			complete:function(data){	
				//window.location("http://localhost/paginas/caixa_entrada.php");	
			}
		});
	});	

//mostrar conteudo msg
$('#divChange').on('click', '.divEmail', function (){
	var x = document.getElementById(this.id+'conteudo');	 	
	if (x.style.display === "block") {
		document.getElementById(this.id).classList.remove("divEmailActive");
		x.style.display = "none";
	} else {
		document.getElementById(this.id).classList.add("divEmailActive");
		x.style.display = "block";
	}
		//document.getElementById(this.id).classList.remove(".divEmailConteudo");	
		//document.getElementById(this.id).classList.add(".divEmailConteudoActive");	        
	});

});
