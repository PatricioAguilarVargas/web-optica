<footer class="text-center">
	<div class="footer-above">
		<div class="container">
			<div class="row">
				<div class="footer-col col-md-4">
					
					<div class="contact_info">
						<div class="info_item">
							<h2>Ubicación</h2>
						</div>
						<div class="info_item" >
							<i class="glyphicon glyphicon-home" style="color: #fff;"></i>
							<p><?=$dt["ub.ciudad"]?><br>
							<?=$dt["ub.direccion"]?></p>
						</div>
						<div class="info_item" >
							<i class="glyphicon glyphicon-earphone" style="color: #fff;"></i>
							<p><?=$dt["ub.telefono"]?><br>
							<?=$dt["gen.horario"]?><br>
							<?=$dt["gen.horarioFDS"]?></p>
						</div>
					</div>
				</div>
				<div class="footer-col col-md-4">
					<h2>Redes Sociales</h2>
					<ul class="list-inline">
						<li>
							<a href="<?=$dt["rs.facebook"]?>" target="_blank" class="social-icons-icon icon-sprite icon-sprite-48 icon-facebook-48"></a>
						</li>
						<li>
							<a href="<?=$dt["rs.instagram"]?>" target="_blank" class="social-icons-icon icon-sprite icon-sprite-48 icon-instagram-48"></a>
						</li>

						<!--li>
							<a href="<?=$dt["rs.pinest"]?>" target="_blank" class="social-icons-icon icon-sprite icon-sprite-48 icon-pinterest-48"></a>
						</li>
						<li>
							<a href="<?=$dt["rs.twitter"]?>" target="_blank" class="social-icons-icon icon-sprite icon-sprite-48 icon-twitter-48"></a>
						</li>
						<li>
							<a href="<?=$dt["rs.youtube"]?>" target="_blank" class="social-icons-icon icon-sprite icon-sprite-48 icon-youtube-48"></a>
						</li-->
					</ul>
				</div>
				<div class="footer-col col-md-4">
					<div class="info_item">
						<h2>Contacto</h2>
					</div>
					<div class="contact_info">
						<div class="info_item" >
								<i class="glyphicon glyphicon-envelope" style="color: #fff;"></i>
								<p><?=$dt["em.mailAdmin1"]?><br>
								Envíenos sus consultas en cualquier momento!<br>
								<a href="optica<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>#contacto" class="footer" style="color: #fff;">Formulario de contacto aquí</a>.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-below">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					Copyright &copy; <?=$dt["gen.title"]?> 2017
				</div>
			</div>
		</div>
	</div>
</footer>	
<a class="to-top fixed" href="#"><i class="fa fa-long-arrow-up"></i></a>