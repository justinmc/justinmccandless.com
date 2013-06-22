<h2>编辑博客 Edit Post</h2>
<br />
<form name="addPost" action="<?= $this->Html->url('/admin/postsedit/') ?>" method="post" enctype="multipart/form-data">
	<table>
	<tbody>
		<tr>
			<td>
				编号 ID:
			</td>
			<td>				
				<input type="text" name="id" readonly="readonly" value="<? echo $post['Post']['id']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				日期 Date:
			</td>
			<td>
				<input type="datetime" name="displayonly" disabled="disabled" value="<? echo $this->Time->nice($post['Post']['date']); ?>" />
				<input type="datetime" name="edited" readonly="readonly" hidden="hidden" value="<? echo time(); ?>" />
			</td>
		</tr>
		<tr>
			<td>
				题目 Title:
			</td>
			<td>
				<input type="text" name="title" value="<? echo $post['Post']['title']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				上传标题图片 Upload a Title Photo:
			</td>
			<td>
				<img src="/<? echo $post['Post']['titlepic']; ?>" style="width: 100%;" />
				<br /><br />
				<input type="file" name="titlepic" />
				<input type="text" name="original_titlepic" readonly="readonly" hidden="hidden" value="<? echo $post['Post']['titlepic']; ?>" />
			</td>
		</tr>
	</tbody>
  </table>
  <h3>Post Intro</h3>
	<textarea name="post_intro"><? echo $post['Post']['post_intro']; ?></textarea>
	<br />
  <h3>Post Page</h3>
	<textarea class="mdhtmlform-md" data-mdhtmlform-group="1"><? echo $post['Post']['post']; ?></textarea>
	<textarea class="mdhtmlform-html" data-mdhtmlform-group="1" name="post"></textarea>
	<br />
  <div class="mdhtmlform-html" data-mdhtmlform-group="1"></div>
	<br />
	<input type="submit" value="提交 Submit" />
	<br /><br />
</form>

