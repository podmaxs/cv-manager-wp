<div class="wrap">
	<h2>
	<a href="#" class="label pull-right label-primary label-sm">
		<small>ACTUALIZAR A LA VERSION PRO</small>
	</a>
	Lista de los CV almacenados</h2>
<form action="?" method="GET">
<div class="wp-filter">

	<!-- BUSCADOR -->

	<div class="search-form mb">

		<input type="search" placeholder="Buscar CV" id="cv-search-input" class="search" name="s" value="<?=$ff?>">
<input type="submit" name="" id="doaction" class="button action" value="Buscar">
		</div>

	<!-- 	BUSCADOR -->

	<select disabled class="attachment-filters mt" name="attachment-filter">
	<option value="" selected="selected">Todos</option>
	<option value="detached">En revision</option>
	<option value="post_mime_type:image">Descargados</option>
	<option value="post_mime_type:image">Favoritos</option>
	</select>
	<div class="actions mt">
		<label for="filter-by-date" class="screen-reader-text">Filtrar por fecha</label>
		<select name="m" id="filter-by-date" disabled>
			<option selected="selected" value="0">Todas las fechas</option>
			<option value="201511">noviembre 2015</option>
			<option value="201509">septiembre 2015</option>
			<option value="201507">julio 2015</option>
		</select>
		<input disabled type="submit" name="filter_action" id="post-query-submit" class="button" value="Filtrar">		
	</div>




</div>	


<div class="tablenav top">
	<div class="alignleft actions bulkactions">
		<label for="bulk-action-selector-top" class="screen-reader-text">Selecciona acción en lote</label>
		<input type="hidden" name="page" id="page" class="form-control" value="cvManager/cvManager.php">
		<select name="filterRubro" id="bulk-action-selector-top">
			<option value="-1" >Todos los rubros</option>
			<?php foreach ($cargos as $key => $value): ?>
			<option <?php if ($rubro==$value): ?>
				selected="selected"
			<?php endif ?> value="<?=$value?>"><?=$value?></option>
			<?php endforeach ?>
		</select>
	<input type="submit" name="" id="doaction" class="button action" value="Aplicar">
	</div>
<div class="tablenav-pages">
	<span class="displaying-num"><?=$TTCV?> elementos</span>
	<?php if ($TTCV>$cvxp): ?>
	<span class="pagination-links">
		<?php if (($cp-1)>0): ?>	
		<a class="prev-page disabled" title="Ir a la página anterior" href="?page=cvManager/cvManager.php&paged=<?=$cp-1?>">‹</a>
		<?php endif ?>
	<span class="paging-input">
		<label for="current-page-selector" class="screen-reader-text">Seleccionar página</label>
		<input class="current-page" id="current-page-selector" title="Página actual" type="text" name="paged" value="<?=$cp?>" size="1">
		 de 
		 <span class="total-pages"><?=$ttp?></span>
		 </span>
		 <?php if (($cp+1)<=$ttp): ?>
	<a class="next-page" title="Ir a la página siguiente" href="?page=cvManager/cvManager.php&paged=<?=$cp+1?>">›</a>
		 <?php endif ?>
		</span>
	<?php endif ?>
		</div>
		<br class="clear">
	</div>

<table class="table_cv">
	<thead>
		<tr>
			<th ><small>DESCRIPTION</small></th>
			<th class="t-right"><small>ACTION</small></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($cv_list as $value): ?>
		
		<tr>
			<td>
				<div class="item_cv">
					<div class="preview_file_cv <?PHP if($value->sexo=='masculino'){echo 'preview_file_cv_primary';}
					 if($value->sexo=='femenino'){echo 'preview_file_cv_pink';} ?>"><?=getExt($value->CV_FILE)?></div>
					<div class="item_body">
<!-- 					<b class="text-muted pull-right label label-green">REVISION</b>
 --><!-- 					<b class="text-muted pull-right label label-primary">DESCARGADO</b>
					 -->				<!-- 	<b class="text-muted pull-right label label-favorite">FAVORITO</b> -->
						<h3><?=$value->nombre?> <?=$value->apellido?> <small>(<?=$value->cargo?>)</small></h3>
						<b ><a class="t-default" href="mailto:<?=$value->mail?>" target="_blank"><?=$value->mail?></a></b>
						<b class="text-muted"><?=$value->provincia?> <?=$value->ciudad?></b>
					<b class="label pull-right"><?=$value->DATE?></b>
						<b class="text-muted">
							<a class="t-default" href="tel:<?=$value->phone?>"><?=$value->phone?></a>
						</b>
					</div>
				</div>
			</td>
			<td width="200px">
				<ul class="action_cv_list">
					<li><a target="_blank" class="t-primary" href="<?=getResourcePath($value->CV_FILE)?>">Descargar CV</a></li>
					<li><a class="t-favorite" disabled  href="#">Agregar/ Quitar favorito</a></li>
					<li><a class="t-green" disabled  href="#">Poner en revision</a></li>
					<li><a class="t-danger"  disabled href="#">Eliminar cv</a></li>

				</ul>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>


</form>
</div>