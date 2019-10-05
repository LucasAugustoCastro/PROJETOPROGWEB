<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/css.css"/>
        <script type="text/javascript" src="../scripts/jquery.js"></script>
        <script type="text/javascript" src="../scripts/funcoes.js"></script>

    </head>

    <body class = "background">
       <div class = "div1">            
            <table class="table1" id="tabela">
				
				<tr>
                    <td colspan="2">
                        <div><h2>Bem-Vindo ao Luscases Mail</h3></div>
                    </td>
                </tr>
                <tr>
                    <td><br><h3>Cadastro</h3></td>
                </tr>
				
				<form action="script.php" method="post">
				<tr><td class="textCadastro">Nome: </td>
					<td>
						<label class="field a-field a-field_a2">
							<input type="text" class="field__input a-field__input" placeholder=" " required name="nome">
							<span class="a-field__label-wrap"></span>
						</label>
					</td>
				</tr>
				<tr><td class="textCadastro">E-mail: </td>
					<td>
						<label class="field a-field a-field_a2">
							<input type="text" class="field__input a-field__input" placeholder=" " required name="nome">
							<span class="a-field__label-wrap"></span>
						</label>
					</td>
				</tr>
				<tr><td class="textCadastro">Senha: </td>
					<td>
						<label class="field a-field a-field_a2">
							<input type="password" class="field__input a-field__input" placeholder=" " required name="nome">
							<span class="a-field__label-wrap"></span>
						</label>
					</td>
				</tr>
				<tr><td class="textCadastro">Confirme a Senha: </td>
					<td>
						<label class="field a-field a-field_a2">
							<input type="password" class="field__input a-field__input" placeholder=" " required name="nome">
							<span class="a-field__label-wrap"></span>
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
