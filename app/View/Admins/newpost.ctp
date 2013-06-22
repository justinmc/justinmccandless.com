<h2>创建一篇博客 Create a New Post</h2>
<br />
<form name="addPost" action="<?= $this->Html->url('/admin/postsedit/') ?>" method="post" enctype="multipart/form-data">
	<table>
	<tbody>
		<tr>
			<td>
				编号 ID:
			</td>
			<td>				
				<input type="text" name="id" readonly="readonly" value="<?php echo $nextId; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				日期 Date:
			</td>
			<td>
				<input type="datetime" name="displayonly" disabled="disabled" value="<? echo $this->Time->nice(time()); ?>" />
				<input type="datetime" name="date" readonly="readonly" hidden="hidden" value="<? echo time(); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				中文题目 Title:
			</td>
			<td>
				<input type="text" name="title" />
			</td>
		</tr>
		<tr>
			<td>
				上传一张标题照片 Upload a Title Photo:
			</td>
			<td>
				<input type="file" name="titlepic" />
			</td>
		</tr>
	</tbody>
	</table>
  <h3>Post Intro</h3>
	<textarea name="post_intro">##Post - Before the break</textarea>
	<br />
  <h3>Post Page</h3>
	<textarea class="mdhtmlform-md" data-mdhtmlform-group="1">## Post - After the break</textarea>
	<textarea class="mdhtmlform-html" data-mdhtmlform-group="1" name="post"></textarea>
	<br />
  <div class="mdhtmlform-html" data-mdhtmlform-group="1"></div>
	<br />
	<input type="submit" value="提交 Submit" />
	<br /><br />
</form>

<script type="text/javascript">
	$(document).ready(
		function()
		{
			$('.redactor_content').redactor();
		}
	);
</script>
