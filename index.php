<?php require 'sitedebrindesadmin/funcao2.php'; ?>
<?php $title = 'Home - Site de Brindes'; ?>
<?php include 'header.php'; ?>

<body>

<div id="all">
<?php $menuIndex = 'active' ?>
<?php include 'cabecalho.php'; ?>


<section class="banner">

	<div id="slides">

				<div class="slides_container">
				
					<div class="slide">
						<a href="produtos.php/" title="Site de Brindes" target="_blank"><img src="banner/img/agenda.png" width="" height="" alt="Slide 1"></a>
						<div class="caption" style="bottom:0">
							<p>Site de Brindes</p>
						</div>
					</div>
					
					
					<div class="slide">
						<a href="produtos.php" title="Site de Brindes" target="_blank"><img src="banner/img/bone.png" width="" height="" alt="Slide 2"></a>
						<div class="caption">
							<p>Site de Brindes</p>
						</div>
					</div>
					
                    
					<div class="slide">
						<a href="produtos.php" title="Site de Brindes" target="_blank"><img src="banner/img/chav.png" width="" height="" alt="Slide 3"></a>
						<div class="caption">
							<p>Site de Brindes</p>
						</div>
					</div>
					
				</div>
	
			</div> <!--/slides-->

</section> <!--BANNER-->
</div><!--ALL-->

	<section class="lista_produtos_all">

 <section class="lista_produtos">
 	
    	<h6>Produtos Site de Brindes:</h6>
    	<ul>
        
        	<?php lista_categoria_frontend(); ?>
            <div style="clear:both"></div>
        </ul>
    	
        
    </section><!--lista_produtos-->
    
    </section><!--lista_produtos_all-->

	<?php include 'footer.php'; ?>

</body>
</html>