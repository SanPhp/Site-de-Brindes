<?php require 'sitedebrindesadmin/funcao2.php'; ?>
<?php $title = 'Produtos - Brintex Brindes'; ?>
<?php include 'header.php'; ?>

<body class="demas">

<div id="all">
<?php $menuProdutos = 'active' ?>
<?php include 'cabecalho.php'; ?>


	<section id="produtos">
    	<h1></h1>
    
    		<?php titulo_galeria_frontend(); ?>
            <ul>
            	
               <?php lista_categoria_frontend(); ?>
               
            </ul>
            
            <section class="imagens_produtos">
            
       		<?php listar_imagens_frontend() ?>  
 
            <div style="clear:both"></div>
            
            </section> <!--/IMAGENS_PRODUTOS-->
            
            
            
            
            <div style="clear:both"></div>
    
    
    
    </section><!--PRODUTOS-->



</div><!--ALL-->

	

	<?php include 'footer.php'; ?>

</body>
</html>