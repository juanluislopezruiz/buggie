<div class="container mt-100">
	<div class="row">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_bugs" data-toggle="tab"><span class="fa fa-bug"></span> <span class="hidden-xs">Bugs </span><?php echo $badge_bugs;?></a></li>
			<li><a href="#tab_mejoras" data-toggle="tab"><span class="fa fa-line-chart"></span> <span class="hidden-xs">Mejoras </span><?php echo $badge_mejoras;?></a></li>
			<li><a href="#tab_optimizaciones" data-toggle="tab"><span class="fa fa-code"></span> <span class="hidden-xs">Optimizaciones </span><?php echo $badge_optimizaciones;?></a></li>
			<li><a href="#tab_historial" data-toggle="tab"><span class="fa fa-history"></span> <span class="hidden-xs">Historial</span></a></li>
		</ul>
		<div class="tab-content col-xs-12">
			
		<?php 
			if($tab_activa==1)
			{
				echo '<div class="tab-pane fade in active" id="tab_bugs">';
			}
			else
			{
				echo '<div class="tab-pane fade" id="tab_bugs">';
			}
		 ?>
			
				<div class="row">
					<div class="col-xs-12">
						<h3>
							<span class="fa fa-bug"></span> Lista de bugs<button class="btn btn-primary btn-sm pull-right" data-toggle="collapse" data-target="#collapse-form-bugs">Nuevo</button><br>
							<small class="hidden-xs">
								Lista completa de los bugs reportados para este proyecto.
								Una vez resuelto un bug, el desarrollador podrá marcarlo como solucionado.
								Automáticamente este pasará a formar parte del historial de bugs.
							</small>
						</h3>
						<hr>
					</div>
					<div class="col-xs-12 collapse" id="collapse-form-bugs">
						<form action="<?php echo site_url('home/reportar_bug');?>" method="post">
							<div class="col-xs-12">
								<label for="txttitulo">Titulo:</label>
								<input type="text" name="txttitulo" id="txttitulo" class="form-control" placeholder="Introduzca una título para el bug...">
								<label for="txtdescripcion" class="mt-10">Descripción del bug:</label>
								<span class="fa fa-code btn-code pull-right"></span>
								<textarea name="txtdescripcion" id="txtdescripcion" class="form-control" rows="20" placeholder="Introduce la descripción del bug..."></textarea>
								<button type="submit" class="btn btn-primary pull-right mt-10">Reportar</button>
							</div>
						</form>
					</div>
				</div>
				
				<?php echo $lista_bugs;?>

			</div>

		<?php 
			if($tab_activa==2)
			{
				echo '<div class="tab-pane fade in active" id="tab_mejoras">';
			}
			else
			{
				echo '<div class="tab-pane fade" id="tab_mejoras">';
			}
		 ?>
				<div class="row">
					<div class="col-xs-12">
						<h3>
							<span class="fa fa-line-chart"></span> Lista de mejoras<button class="btn btn-primary btn-sm pull-right" data-toggle="collapse" data-target="#collapse-form-mejoras">Nueva</button><br>
							<small class="hidden-xs">
								Lista completa de mejoras
							</small>
						</h3>
						<hr>
					</div>
					<div class="col-xs-12 collapse" id="collapse-form-mejoras">
						<form action="<?php echo site_url('home/reportar_mejora');?>" method="post">
							<div class="col-xs-12">
								<label for="txttitulo">Titulo:</label>
								<input type="text" name="txttitulo" id="txttitulo" class="form-control" placeholder="Introduzca una título...">
								<label for="txtdescripcion" class="mt-10">Descripción:</label>
								<span class="fa fa-code btn-code pull-right"></span>
								<textarea name="txtdescripcion" id="txtdescripcion" class="form-control" rows="20" placeholder="Introduce la descripción..."></textarea>
								<button type="submit" class="btn btn-primary pull-right mt-10">Reportar</button>
							</div>
						</form>
					</div>
				</div>
				<div class="row" id="lista_mejoras">
					<div class="col-xs-12">
						<?php echo $lista_mejoras;?>
					</div>
				</div>
			</div>

		<?php 
			if($tab_activa==3)
			{
				echo '<div class="tab-pane fade in active" id="tab_optimizaciones">';
			}
			else
			{
				echo '<div class="tab-pane fade" id="tab_optimizaciones">';
			}
		 ?>
				<div class="row">
					<div class="col-xs-12">
						<h3>
							<span class="fa fa-code"></span> Lista de optimizaciones<button class="btn btn-primary btn-sm pull-right" data-toggle="collapse" data-target="#collapse-form-optimizaciones">Nueva</button><br>
							<small class="hidden-xs">
								Lista completa de los bugs reportados para este proyecto.
								Una vez resuelto un bug, el desarrollador podrá marcarlo como solucionado.
								Automáticamente este pasará a formar parte del historial de bugs.
							</small>
						</h3>
						<hr>
					</div>
					<div class="col-xs-12 collapse" id="collapse-form-optimizaciones">
						<form action="<?php echo site_url('home/reportar_optimizacion');?>" method="post">
							<div class="col-xs-12">
								<label for="txttitulo">Titulo:</label>
								<input type="text" name="txttitulo" id="txttitulo" class="form-control" placeholder="Introduzca una título...">
								<label for="txtdescripcion" class="mt-10">Descripción:</label>
								<span class="fa fa-code btn-code pull-right"></span>
								<textarea name="txtdescripcion" id="txtdescripcion" class="form-control" rows="20" placeholder="Introduce la descripción..."></textarea>
								<button type="submit" class="btn btn-primary pull-right mt-10">Reportar</button>
							</div>
						</form>
					</div>
				</div>
				<div class="row" id="lista_optimizaciones">
					<div class="col-xs-12">
						<?php echo $lista_optimizaciones;?>
					</div>
				</div>
			</div>
			
		<?php 
			if($tab_activa==4)
			{
				echo '<div class="tab-pane fade in active" id="tab_historial">';
			}
			else
			{
				echo '<div class="tab-pane fade" id="tab_historial">';
			}
		 ?>
				<div class="row">
					<div class="col-xs-12">
						<h3>
							<span class="fa fa-code"></span> Historial<br>
							<small class="hidden-xs">
								historial
							</small>
						</h3>
						<hr>
					</div>
				</div>
				<div class="row" id="historial">
					<div class="col-xs-12">
						<?php echo $historial;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
