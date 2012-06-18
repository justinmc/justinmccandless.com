<h3>修改相册 Edit Album <?php echo $title; ?></h3>
<?php echo $this->Html->link('back to all albums', '/admin/photos/'); ?>
<table>
<tbody>
	<tr>
		<th>&nbsp;</th>
		<th>文件 File</th>
		<th>Preview</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<td>上传新照片 Upload New Photo
			<form enctype="multipart/form-data" method="post" action="<?= $this->Html->link('/admin/newphoto/') ?>" name="addPhoto">
			<input type="text" hidden="hidden" value="<?= $title ?>" readonly="readonly" name="albumName">
			<input type="file" name="photo">
			<br />
			<input type="submit" value="提交 Submit">
			</form>
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php foreach ($photos as $photo): ?>
	<tr>
		<td>&nbsp;</td>
		<td><?= ($cdn_uri . '/' . $photo) ?></td>
		<td><img height="50" width="75" src="<?php echo ($cdn_uri . '/' . $photo); ?>" /></td>
		<td><a href="#" class="click_delete" data-link="<?= ('/admin/deletephoto/' . $title . '/' . $photo) ?>">删除照片 Delete Photo</a></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>

<script type="text/javascript">
	
$(document).ready(function () {
	
	$(".click_delete").click(function () {
		var deletepost = confirm('这将永久删除你的照片。你确定吗? This will permanently delete your photo.  Are you sure?');
				
		if (deletepost)
			window.location = $(this).data('link');
		else
			return false;
	});
});
	
</script>