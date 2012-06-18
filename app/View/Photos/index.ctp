<a href="/photos"><h3>Photos</h3></a>
<p>
	Select an album below to view individual photos.
</p>
<table class="nolines">
<tbody>
	<tr>
		<th></th>
		<th></th>
	</tr>
	<?php foreach ($conts as $key => $cont): ?>
	<?php if (!($key % 2)): ?>
	<tr>
	<?php endif; ?>
		<td>
			<?php
			$firstPic = $cont->list_objects(1); 
			$firstPicLink = $cont->cdn_uri . '/' . $firstPic[0];
			?>
			<div class="album">
				<a href="<?= $this->Html->url('/photos/' . str_replace(Configure::read('Cloudfiles.prefix'), '', $cont->name)) ?>">
					<img src="<?php echo $this->Html->url('/images/view/*/100/1/') . $firstPicLink; ?>" />
				</a>
				<a href="<?= $this->Html->url('/photos/' . str_replace(Configure::read('Cloudfiles.prefix'), '', $cont->name)) ?>">
					<span class="name"><?php echo str_replace(Configure::read('Cloudfiles.prefix'), '', $cont->name); ?></span>
				</a>
				<br />
				<span class="photocount">
					Photos: <?= $cont->object_count; ?>
				</span>
			</div>
		</td>
	<?php if ($key % 2): ?>
	</tr>
	<?php endif; ?>
	<?php endforeach; ?>
</tbody>
</table>
