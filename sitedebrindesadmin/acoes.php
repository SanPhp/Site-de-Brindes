<?php
	
function acao_inserir_categoria() {
	
	$categoria = $_POST['categoria'];	
	include 'connect.php';
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$query = "INSERT INTO categoria (categoria) VALUES ('$categoria')";
	mysqli_query($dbc, $query);
}




function acao_inserir_galeria() {
		include 'appvars.php';
		$legenda = $_POST['legenda'];
		$imagem = $_FILES['imagem'];
		$imagem_type = $_FILES['imagem']['type'];
		$imagem_size = $_FILES['imagem']['size'];
		
	if($imagem_type == 'image/jpeg') {
		if(($imagem_size > 0) && ($imagem_size <= MAXBRI_MAXFILESIZE)) {
			
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
			
			require 'connect.php';
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$sql = "INSERT INTO galeria (id_categoria, legenda, titulo, imagem, miniatura) VALUES ('5', '$legenda', '$titulo', '$name', '$name')";
			$con = mysqli_query($dbc, $sql);
			mysqli_close($dbc);
			
			
		}// imagem size
		else {
			echo 'imagem tamanho com coresponde';
		}
	}//imagem type
	else {
		echo 'formato da imagem nao corresponde';
	}
}

?>
	
