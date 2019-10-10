<html>
    <head>
		<meta charset="UTF-8" /> 
        <link rel="stylesheet" type="text/css" href="../css/css.css"/>
        <script type="text/javascript" src="../scripts/jquery.js"></script>
        <script type="text/javascript" src="../scripts/funcoes.js"></script>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>	
    </head>

    <body class = "background">
		<div class="loading"></div>
			<div class = "div1"> 
			<!--<table><h2>Bem-Vindo ao Luscases Mail</h2></table>-->
				<table>					
					<tr>
						<td><h3>Cadastro</h3></td>
					</tr>
				</table>	
				<table>
					<form action="script.php" method="post">
					<tr>
						<td>
							<label class="field a-field a-field_a2">
								<input type="text" class="field__input a-field__input" placeholder=" " required name="nome">
								<span class="a-field__label-wrap">
									<span class="a-field__label">Nome</span>
								</span>
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<label class="field a-field a-field_a2">
								<input type="text" class="field__input a-field__input" placeholder=" " required name="nome">
								<span class="a-field__label-wrap">
									<span class="a-field__label">E-mail</span>
								</span>
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<label class="field a-field a-field_a2">
								<input type="password" class="field__input a-field__input" placeholder=" " required name="nome">
								<span class="a-field__label-wrap">
									<span class="a-field__label">Senha</span>
								</span>
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<label class="field a-field a-field_a2">
								<input type="password" class="field__input a-field__input" placeholder=" " required name="nome">
								<span class="a-field__label-wrap">
									<span class="a-field__label">Confirme Senha</span>
								</span>
							</label>
						</td>
					</tr>
						<tr>
							<td colspan="2">
								<br>
								<div align="center">
								<input id="bCriarConta" type=submit class="botao" value="Criar Conta">     </div>                       
							</td>
						</tr>					
						</form>
					</table>
		</div>

    </body>

</html>
