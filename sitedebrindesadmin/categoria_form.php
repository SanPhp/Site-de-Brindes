<?php require 'authorize.php'; ?>
<?php header("Content-type: text/html; charset=utf-8"); ?>
<?php
    include 'funcao2.php';
	incluir_categoria();
?>
<style type="text/css">
* {
	margin: 0px;
	padding: 0px;
}
div.lista_categoria {
	width: 1000px;
	height: auto;
	border-top: 1px solid#CDCDCD;	
	border-bottom: 1px solid #CDCDCD;	
	margin: 10px 0px 0px 0px;
	padding: 20px 0px 0px 0px;
	text-align: center;
	background-color: #EEEEEE;
}
div.lista_categoria p a {
	color: #B00;
}


div.lista_categoria article {
	float: left;
	margin: 0px 10px 25px 15px
}

legend {
	padding: 7px;
	box-shadow: 3px 3px 15px #bbb;
	background-color: #FFF;
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

</style>
<form action="" method="post" enctype="multipart/form-data">
	
    <fieldset>
    	<legend>Adicionar Categoria</legend>

	<label for="categoria">Nome da Categoria</label>
    <input type="text" id="categoria" name="categoria"><br>
	
    <input type="submit" id="submit" name="submit" value="Adicionar Categoria">
    
	</fieldset>
</form>


<div class="lista_categoria">
	
    <?php listagem_categoria(); ?>
    <div style="clear:both"></div>
    <?php if(isset($_GET['deletar']) == 'deletar_categoria') {
	deletar_categoria();
	}
	?>

    
</div>
