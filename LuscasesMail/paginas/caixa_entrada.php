<?php
session_start();
// checar user logado ou nao
if(!isset($_SESSION['user'])){
   header('Location: ../');
}
?>

<html>
   <head>
      <meta charset="UTF-8" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../css/cssInbox.css"/>
      <script type="text/javascript" src="../scripts/jquery.js"></script>		
      <script type="text/javascript" src="../scripts/funcoesInbox.js"></script>			
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	  <script src="https://kit.fontawesome.com/758b477143.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="loading"></div>
      <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">        
            <ul class="navbar-nav bd-navbar-nav flex-row">               
                  <a class="nav-link" href="">Home</a>               
            </ul>        
         <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex"></ul>
		  <ul class="navbar-nav bd-navbar-nav flex-row">    
				<span class="textNav">Logado como: <b><?php echo("{$_SESSION['user']}");?></b></span>
		  </ul>
         <a name="logout" class="btn btn-bd-logout d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="../php/logout.php">Logout</a>
      </header>
      <div class="container-fluid">
      <div class="row flex-xl-nowrap">
         <div class="bd-sidebar">
		 <div class="col-12">
            <form class="bd-search d-flex align-items-center">
               <input type="search" class="form-control ds-input" id="search-input" placeholder="Busca..." aria-label="Search for..." autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" style="position: relative; vertical-align: top;" dir="auto">
            </form>
			</div>
		<a class="menuLink" href="">
			<div class="menu pt-3 pb-3">			
				<div class="menuIcon"><i class="fas fa-inbox"></i></div>
				<div class="menuOpcao">Inbox</div>  			
			</div>
		</a>
		<a class="menuLink" href="">
		<div class="menu pt-3 pb-3">
			<div class="menuIcon"><i class="far fa-paper-plane"></i></div>
			<div class="menuOpcao">Enviar</div>  
		</div>
		</a>
		<a class="menuLink" href="">
		<div class="menu pt-3 pb-3">
			<div class="menuIcon"><i class="fas fa-trash"></i></div>
			<div class="menuOpcao">Lixeira</div>  
		</div>
		</a>
         </div>
         <main role="main" class="main border-right w-75">
            <h2 id="quick-start">
               <div class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content">Inbox</div>
            </h2>
            <a class="email-link" href=""><div class="divEmail p-3 text-dark border-top">email1</div></a>
            <a class="email-link" href=""><div class="divEmail p-3 text-dark border-top">email2</div></a>
            <a class="email-link" href=""><div class="divEmail p-3 text-dark border-top">email13</div></a>
         </main>
      </div>
   </body>
</html>

