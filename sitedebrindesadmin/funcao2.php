<?php
/* - - - - - - - - - - - INCLUIR CATEGORIA- - - - - - - - - - - - - - - - */


function incluir_categoria() {
    include 'connect.php';
	if(isset($_POST['submit'])) {
    $categoria = $_POST['categoria'];
	if(!empty($categoria)) {	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql= "INSERT INTO categoria (categoria) VALUES ('$categoria')";
	$query = mysqli_query($dbc, $sql);
	echo '<p class="sucesso">Categoria adicionada com sucesso!</p>';
	} //empty
	else {
		echo '<p class="error">Campo vazio!</p>';
	}
	
	}
}




/* - - - - - - - - - - - UPLOAD DE IMAGEM ADICIONAR IMAGEM- - - - - - - - - - - - - - - - */

function incluir_galeria() {
include 'appvars.php';
require 'connect.php';
if(isset($_POST['submit'])) {
		$id_categoria = $_POST['categoria'];
		$legenda = $_POST['legenda'];
		$titulo = $_POST['titulo'];
		$imagem = $_FILES['imagem'];
		$imagem_type = $_FILES['imagem']['type'];
		$imagem_size = $_FILES['imagem']['size'];

	if($imagem_type == 'image/jpeg') {
		if(($imagem_size > 0) && ($imagem_size <= MAXBRI_MAXFILESIZE)) {
			if($_POST['categoria'] != 0) {	
			
			$name = md5(uniqid(rand(), true)).".jpg";   
			$nova = '../imagens/imgP/';
			$largura = 150;  
			       
             	$img = imagecreatefromjpeg($imagem['tmp_name']);
                $x   = imagesx($img);
                $y   = imagesy($img);
                $altura = ($largura * $y)/$x;
                $nova = imagecreatetruecolor($largura, $altura);
                imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
                imagejpeg($nova, MAXBRI_UPLOADPATH_THUBNAILS . $name);
                imagedestroy($img);
                imagedestroy($nova);
				
				
	//era pra fazer o upload da imagem grande
			$foto2 = $_FILES['imagem'];
			move_uploaded_file($foto2['tmp_name'], MAXBRI_UPLOADPATH_NORMAL .$name);
			
	
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$sql = "INSERT INTO galeria (id_categoria, legenda, titulo, imagem, miniatura) VALUES ('$id_categoria', '$legenda', '$titulo', '$name', '$name')";
			$con = mysqli_query($dbc, $sql);
			mysqli_close($dbc);
			echo '<p class="sucesso">Imagem adicionada com sucesso!</p>';
			
			}//$categoria igual a 0
			else {
				echo '<p class="error">Escolha uma Categoria!</p>';
			}
		}// imagem size
		else {
			echo '<p class="error">Escolha uma imagem com extenção .jpg e de no maximo 1MB!</p>';
		}
	}//imagem type
	else {
		echo '<p class="error">Escolha uma imagem com extenção .jpg e de no maximo 1MB!</p>';
	}
}//isset submit
}

/* - - - - - - - - - - - - LISTAGEM SELECT PARA ESCOLHER CATEGORIA - - - - - - - - - - - - - - - */

function consulta_categoria() {
		$categoria = $_POST['categoria'];
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$sql2 = "SELECT * FROM categoria";
		$query2 = mysqli_query($dbc, $sql2);
		echo'<option value="">Escolha uma Categoria</option>';
		while($row = mysqli_fetch_array($query2)) {
			
		$selected = '';
		if(!empty($categoria) && $categoria == $row['id_categoria']){
			
		$selected = 'selected="selected"';
		
		}
		
	echo'<option value="'.$row['id_categoria'].'" '.$selected.'>'.$row['categoria'].'</option>';
}// WHILE
}

/* - - - - - - - - - LISTAGEM SELECT PARA VISUALIZAR CATEGORIA VER QUAL ESTA CADASTRADA - - - - - - - - - - - */

function listagem_categoria() {
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$sql = "SELECT * FROM categoria ORDER BY categoria ASC";
		$query = mysqli_query($dbc, $sql);
		if(mysqli_num_rows($query) == 0) {
			
		echo '<p>Não há categoria cadastrada!</p>';
		}// IF MYSQLI_NUM_ROWS
		
		else {
		while($row = mysqli_fetch_array($query)) {
			
		echo '<article>';
    	echo '<p>'.$row['categoria'].'</p>';
		echo '<p><a href="index.php?tabela=categoria_form&deletar=deletar_categoria&id_categoria=' . $row['id_categoria'] . '" title="Deletar?" onclick="php deletar_categoria();">Deletar</a></p>';
		echo '</article>';
		
		}//WHILE FETCH ARRAY
		}// ELSE MYSQLI_NUM_ROWS
}


/* - - - - - - - - - - - - LISTAGEM PARA ESCOLHER VICUALIZAR IMAGENS - - - - - - - - - - - - - - - */


function listagem_categoria_visualizar_imagens() {
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$sql = "SELECT * FROM categoria ORDER BY categoria ASC";
		$query = mysqli_query($dbc, $sql);
		if(mysqli_num_rows($query) == 0) {
			
		echo '<p>Não há categoria cadastrada!</p>';
		}// IF MYSQLI_NUM_ROWS
		
		else {
		while($row = mysqli_fetch_array($query)) {
			
		echo '<article>';
    	echo '<p><a href="index.php?tabela=galeria_form&categoria='.$row['categoria'].'&id_categoria='.$row['id_categoria'].'" title="">'.$row['categoria'].'</a></p>';
		echo '</article>';
		
		}//WHILE FETCH ARRAY
		}// ELSE MYSQLI_NUM_ROWS
		
	function titulo_categoria() {
		if(isset($_GET['categoria'])) {
		$categoria = $_GET['categoria'];
		echo '<h3>'.$categoria.'</h3>';
		}
				
	}
}

/* - - - - - - - - - - - - LISTAGEM GALERIA IMAGENS - - - - - - - - - - - - - - - */


function listagem_galeria() {
	if(isset($_GET['id_categoria'])) {
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM galeria WHERE id_categoria = '".$_GET['id_categoria']."'";
	$query = mysqli_query($dbc, $sql);
	if(mysqli_num_rows($query) == 0) {
		echo'<h1>Não há imagem cadastrada para está categoria!</h1>';
	}
	else {
	while($row = mysqli_fetch_array($query)) {
		
		echo'<figure>';
        echo'<img src="'. MAXBRI_UPLOADPATH_THUBNAILS . $row['miniatura'].'" alt="Maxi Brindes" width="90%">';
		echo '<figcaption><a href="index.php?tabela=galeria_form&deletar=deletar_imagem&id_galeria='.$row['id_galeria'].'" title="Deletar?">Delete</a></figcaption>';
   		echo'</figure>';
	}//WHILE
	}
	mysqli_close($dbc);
	}//ISSET
	else {
			echo'<h1>Escolha uma categoria para visualizar as imagens cadastradas!</h1>';
	}//ELSE
		
	
}// FECHA FUNCAO

/* - - - - - - - - - - - - DELETAR IMAGEM GALERIA - - - - - - - - - - - - - - - */

function deletar_imagem() {
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "DELETE FROM galeria WHERE id_galeria = ".$_GET['id_galeria']."";
	$query = mysqli_query($dbc, $sql);	
	
	
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$sql2 = "SELECT * FROM categoria";
		
	
		//PAREI AQUI
	echo '<script language="javascript">location.href="javascript:history.back()"</script>';
}


/* - - - - - - - - - - - - DELETAR CATEGORIA - - - - - - - - - - - - - - - */

function deletar_categoria() {
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "DELETE FROM categoria WHERE id_categoria=".$_GET['id_categoria']."";	
	$query = mysqli_query($dbc, $sql);
	
	echo '<script language="javascript">location.href="index.php?tabela=categoria_form";</script>';
}

/* - - - - - - - - - - - - LISTAR CATEGORIA EM FRONTEND - - - - - - - - - - - - - - - */

function lista_categoria_frontend() {
	require 'connect.php';
	if(isset($_GET['id_categoria'])){
	$active = $_GET['id_categoria'];
	}
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM categoria ORDER BY categoria ASC";
	$query = mysqli_query($dbc, $sql);
	
	while($row = mysqli_fetch_array($query)){
		
		$ativar = '';
		if(!empty($active) && $active == $row['id_categoria']) {
		$ativar = 'active';
		}
	
		echo'<li class="'.$ativar.'"><img src="estru/seta_home.gif" alt=""><a href="produtos.php?categoria='.$row['categoria'].'&id_categoria='.$row['id_categoria'].'" title="" class="'.$ativar.'">'.$row['categoria'].'</a></li>';
	
	}//WHILE
}




/* - - - - - - - - - - - - LISTAR IMAGENS EM FRONTEND - - - - - - - - - - - - - - - */
function listar_imagens_frontend() {
	if(isset($_GET['id_categoria'])) {
	require 'appvars.php';
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM galeria WHERE id_categoria = '".$_GET['id_categoria']."' ORDER BY id_galeria ASC";
	$query = mysqli_query($dbc, $sql);
	if($num_rows = mysqli_num_rows($query) == 0){
		echo '<h6 style="color:#fff; text-align: center; margin: 20px 0px 0px 0px;">Não há imagem cadastrada para está galeria!</h6>';
	}
	else {
	while($row = mysqli_fetch_array($query)) {
	
		echo'<figure>
        <a href="'. MAXBRI_UPLOADPATH_NORMAL_FRONTEND . $row['imagem'].'" class="highslide" onClick="return hs.expand(this)">
		<img src="'. MAXBRI_UPLOADPATH_THUBNAILS_FRONTEND . $row['miniatura'].'" alt="Produtos Maxi Brindes"
		title="Click para Visualizar" /></a>

		<div class="highslide-caption">
		'.$row['legenda'].'
		</div>
        </figure>';
		
	}//WHILE
	}//ELSE NUM ROWS
	}//ISSET
	else {
		echo '<h6 style="color:#fff; text-align: center; margin: 20px 0px 0px 0px;">Escolha uma categoria para visualizar nossos produtos.</h6>';
	}

}//FUNCTION

function titulo_galeria_frontend() {
	if(isset($_GET['categoria'])){
$categoria = $_GET['categoria'];
echo'<h2>'.$categoria.'</h2>';
	}
}

?>