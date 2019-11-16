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
			document.getElementById('titleAtual').innerHTML = "Inbox"		
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
				divEmails += '<div class="row divEmail p-3 text-dark border-bottom"><div class="col-3">'+item['@attributes'].remetente+'</div><div class="col-6">'+item['@attributes'].titulo+'</div></div>';
			});
		} else {
			divEmails += '<div class="row divEmail p-3 text-dark border-bottom"><div class="col-3">'+jsonData.email['@attributes'].remetente+'</div><div class="col-6">'+jsonData.email['@attributes'].titulo+'</div></div>';
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
				document.getElementById('titleAtual').innerHTML = "Inbox"	
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
							divEmails += '<div class="row divEmail p-3 text-dark border-bottom"><div class="col-3">'+item['@attributes'].remetente+'</div><div class="col-6">'+item['@attributes'].titulo+'</div></div>';
						});
					} else {
						divEmails += '<div class="row divEmail p-3 text-dark border-bottom"><div class="col-3">'+jsonData.email['@attributes'].remetente+'</div><div class="col-6">'+jsonData.email['@attributes'].titulo+'</div></div>';
					}
				}				
				$('#divChange').append(divEmails);	
			},
			complete:function(data){			
			}
		});
	});	

	$('#enviarPage').click(function() {	   
		$.ajax({ 
			type: "POST",		
			url: '../php/inbox.php',
			data: $(this).serialize(),
			beforeSend: function(){		
				document.getElementById('titleAtual').innerHTML = "Lixeira"	
				document.getElementById('inboxPage').classList.remove("menuActive");
				document.getElementById('enviarPage').classList.add("menuActive");	
				document.getElementById('lixeiraPage').classList.remove("menuActive");	
				document.getElementById('divChange').innerHTML = "<br><img src='../img/loading.svg' width='32px' height='32px'>";	
			},
			success: function(response)
			{
			},
			complete:function(data){			
			}
		});
	});	

	$('#lixeiraPage').click(function() {	   
		$.ajax({ 
			type: "POST",		
			url: '../php/inbox.php',
			data: $(this).serialize(),
			beforeSend: function(){		
				document.getElementById('titleAtual').innerHTML = "Lixeira"	
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

});
