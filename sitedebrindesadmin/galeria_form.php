<?php require 'authorize.php'; ?>
<?php header("Content-type: text/html; charset=utf-8"); ?>
<?php
include 'funcao2.php';
incluir_galeria();
?>

<style type="text/css">
* {
	margin: 0px;
	padding: 0px;
	
}
div.lista_imagens {
		position: relative;
		right: 5px;
		width: 1000px;
		height: auto;
		margin: 5px auto 0px auto;
		padding: 20px 0px 20px 0px;
		text-align: center;
		background-color: #EEEEEE;
		border-top: 1px solid #E6E6E6;	
		border-bottom: 1px solid #E6E6E6;
}

div.lista_imagens article {
	margin: 0px 0px 40px 0px;
}
div.lista_imagens figure {
	margin: 0px 10px 0px 30px;
	float: left;	
}
div.lista_imagens figcaption a {
	color: #B00;
}
div.lista_categoria {
	width: 1000px;
	height: auto;
	border: 1px solid black;	
	margin: 5px 0px 0px 0px;
	padding: 20px 0px 20px 0px;
	text-align: center;
	box-sizing: border-box;
}

div.lista_categoria2 {
	width: 1000px;
	height: auto;
	border-top: 1px solid #E6E6E6;	
	border-bottom: 1px solid #E6E6E6;
	margin: 10px 0px 0px 0px;
	padding: 20px 0px 20px 0px;
	background-color: #F5F5F5;
	
}
div.lista_categoria2 article {
	float: left;
	margin: 0px 10px 0px 30px;
	padding: 10px 0px 10px 0px;

}

div.lista_categoria2 article p a {
	font-size: 18px;
	color: #333;
	text-align: center;
}


	
fieldset {
	background-color: #eeeeee;
	padding: 10px;
}

form label {
  display: inline-block;
  width: 150px;
  font-weight: bold;
}

legend {
	padding: 7px;
	box-shadow: 3px 3px 15px #bbb;
	background-color: #FFF;
}


input {
	margin: 0px 0px 3px 0px;
}

input[type="submit"] {
	margin: 5px 0px 0px 153px;
	width: 150px;
	height: 30px;
	
}

p.sucesso {
	padding: 10px;
	background-color: #A8FA85;
	font-size: 16px;
	width: 980px;
	color: #004000; 
	margin: 5px 0px 0px 0px;
	border-top: 3px solid #070;
	border-bottom: 3px solid #070;
}

p.error {
	padding: 10px;
	background-color: #FF6A6A;
	font-size: 16px;
	width: 980px;
	color: #200; 
	margin: 5px 0px 0px 0px;
	border-top: 3px solid #CA0000;
	border-bottom: 3px solid #CA0000;
}

h3 {
	text-align: center;
	font-size: 21px;
	margin: 5px 0px 5px 0px;
}


</style>

<form action="" method="post" enctype="multipart/form-data">

<fieldset>
	<legend>Adicionar imagem</legend>
    
    <label for="legenda">Legenda</label>
    <input type="text" id="legenda" name="legenda"><br>


    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="titulo"><br>

    
    <label for="imagem">Imagem</label>
    <input type="file" id="imagem" name="imagem"><br>

    <label for="categoria">Escolha uma Categoria</label>
    <select id="categoria" name="categoria">

    <?php consulta_categoria(); ?>	
		 
    </select><br>

    
    <input type="submit" id="submit" name="submit" value="Adicionar imagem">
</fieldset>
</form>

<div class="lista_categoria2">
	<?php listagem_categoria_visualizar_imagens(); ?>
    <div style="clear:both"></div>
</div>


	<?php titulo_categoria() ?>
        
<div class="lista_imagens">

	<?php listagem_galeria() ?>
    
    <div style="clear:both"></div>
    
	<?php if(isset($_GET['deletar']) == 'deletar_imagem'){
	 deletar_imagem();
	 }?>
	
</div>