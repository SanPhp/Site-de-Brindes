<?php require 'authorize.php'; ?>
<?php header("Content-type: text/html; charset=utf-8"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="icon" href="../estru/favicon.png" sizes="32x32">
<link rel="icon" href="../estru/favicon.ico" sizes="32x32">

<title>Área Adminstrativa - Site de Brindes (Desenvolvida por Agência)</title>
<style type="text/css">
* {
	font-size: small;
	font-size: 15px;
	margin: 0px;
	padding: 0px;
	
	
}
body {
	font-family: sans-serif;
	margin: 80px 0px 0px 0px;
	padding: 0px;
}
body img {
	border: none;
}

header {
	width:100%;
	height: 50px;
	background-color:#cc99cc;
	position: fixed;
	top: 0px;
}

header a {
	color: #000;
}
header h4 {
	padding: 13px 0px 0px 20px;
	margin: 0px;
	
}
header h5 a {
	float: right;
	margin: -27px 15px 0px 0px;
	color: #000;
}

header h6 a {
	float: right;
	margin: -5px 15px 0px 0px;
	font-size: 13px;
	color: #000;
}
section.all {
	width: 1010px;
	margin: 0px auto 0px auto;
}
div.botoes {
	width: 498px;
	height: 150px;
	border-top: 1px solid #E6E6E6;
	border-bottom: 1px solid #E6E6E6;
	display: inline-block;
	box-sizing: border-box;
	text-align: center;
	padding: 65px 0px 0px 0px;
	background-color: #F5F5F5;
	border-radius: 10px;
	font-size: 22px;
	font-weight: 600;
	color: #C9C9C9;
	text-shadow: 0px 2px 1px #FFFFFF;
}

div.botoes:hover {
	width: 498px;
	height: 150px;
	border-top: 1px solid #E6E6E6;
	border-bottom: 1px solid #E6E6E6;
	display: inline-block;
	box-sizing: border-box;
	text-align: center;
	padding: 65px 0px 0px 0px;
	background-color: #E9E9E9;
	border-radius: 10px;
	color: #666;
}
form {
	width: 1000px;
	margin: 10px 0px 0px 0px;
}

form label {
	display: inline-block;
}


</style>
</head>

<body>
<body>
<header>
<h4>Site de Brindes - Área Administrativa Personalizada <a href="" title="" target="_blank"> Desenvolvida por (Agência)</a></h4>
<h5><a href="" title="Ir para o Site Brintex Brindes" target="_blank">Ir para o Site</a></h5>
    <h6><a href="" title="Ir para a Galeria do Site de Brindes" target="_blank">Ir para a Galeria do Site</a></h6>
</header>
<section class="all">
	<a href="index.php?tabela=categoria_form" title=""><div class="botoes">Adicionar Categoria</div></a>
    <a href="index.php?tabela=galeria_form" title=""><div class="botoes">Adicionar Imagem</div></a>
    
    
    <?php
		if(isset($_GET['tabela'])) {
		$tabela = $_GET['tabela'];

		if ($tabela == 'categoria_form')
			require 'categoria_form.php';
		elseif ($tabela == 'galeria_form')
			require 'galeria_form.php';
		}//ISSET
		else {
			include 'welcome.php';
		}	
	?>
</section>
</body>
</html>