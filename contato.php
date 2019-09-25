<?php $title = 'Contato - Site de Brindes'; ?>
<?php include 'header.php'; ?>

<body class="contato">

<div id="all">
<?php $menuContato = 'active' ?>
<?php include 'cabecalho.php'; ?>


		<section id="contato">
        
        	 <?php
				if(isset($_POST['submit'])) {
				$name = $_POST['name'];
				$fone = $_POST['fone'];
				$email = $_POST['email'];
				$mensagem = $_POST['mensagem'];
				$output_form = 'no';
				
				if(empty($name) || empty($fone) || empty($email) || empty($mensagem)) {
					echo '<p class="error">Por favor, Preencha todos os campos do formulario!</p>';
					$output_form = 'yes';
				}
				
				}//ISSET
				
				else {
					$output_form = 'yes';
				}
				
				if(!empty($name) && !empty($fone) && !empty($email) && !empty($mensagem)) {
					$from = 'Site de Brindes';
					$to = 'nome@agencia.com.br';
					$subject = 'Contato Site Site de Brindes';
					$msg = "Formulário de Contato: $from \n" .
	       			   	   "Nome: $name \n" .
						   "Fone: $fone \n" .
	        		       "Email: $email \n" .
			               "Mensagem: $mensagem";
						   
				mail($to, $subject, $msg);
				echo '<p class="sucesso">Mensagem enviada com sucesso!</br> <a href="Site de Brindes" title="voltar">Voltar</a></p>';
				$output_form = 'no';		   
				
				
				
				$name = '';
				$fone = '';
				$email = '';
				$mensagem = '';
				
				}//Empty
				
				if($output_form == 'yes') {
				
				?>
        
        
        	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            
            	<input type="text" id="name" name="name">
                <input type="text" id="email" name="email">
                <input type="text" id="fone" name="fone">
                <textarea id="mensagem" name="mensagem"></textarea>
                <input type="hidden" name="submit">
                <input type="image" src="estru/botao.png" id="submit">
            
            </form>
           
           	<?php } ?>
        	<p> simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a ci.</p>
                
                <div class="mapa">
                	<iframe width="526" height="152" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117700.45693540592!2d-43.59959552592809!3d-22.79730247495676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bde559108a05b%3A0x50dc426c672fd24e!2sRio%20de%20Janeiro%2C%20RJ!5e0!3m2!1spt-BR!2sbr!4v1569380386916!5m2!1spt-BR!2sbr" style="color:#0000FF;text-align:left"></a></small>
                </div>
                
                
        </section><!--CONTATO-->
   



</div><!--ALL-->

	

	<?php include 'footer.php'; ?>

</body>
</html>