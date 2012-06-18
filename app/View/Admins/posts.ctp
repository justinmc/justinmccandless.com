<h2>管理博客 Administrate Posts</h2>
<p>
	在下面管理您的博客
<br/>
	Manage your posts below.
</p>
<table>
<tbody>
	<tr>
		<th>&nbsp;</th>
		<th>编号 Id</th>
		<th>题目 Title</th>
		<th>日期 Date</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<td><?= $this->Html->link('创建新博客 Create New', '/admin/newpost'); ?></td>
		<td><?= $nextId; ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?= $this->Html->link('编辑 Edit', '/admin/editpost/' . urlencode($post['Post']['title'])); ?></td>
		<td><?= $post['Post']['id']; ?></td>
		<td><?= $post['Post']['title']; ?></td>
		<td><?= $this->Time->nice($post['Post']['date']); ?></td>
		<td><a href="<?= ('/admin/deletepost/' . $post['Post']['id']) ?>" data-confirm-link="这将永久删除你的博客。你确定吗? This will permanently delete your post.  Are you sure?">Delete Post</a></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
