<h2>博客修改 Post Edits</h2>
<p>
	在这里你可以看到所有过去的修改纪录，博客编号对应管理员页面的博客编号。不能删除博客，因此并没有此项纪录。
<br/>
	You can see all of your past edits here.  The "post id" given corresponds to the id on the post Administration page.  Deletes are not accessible and are therefore not included in this table.
</p>
<br />
<table>
<tbody>
	<tr>
		<th>博客编号 Post id</th>
		<th>日期 Date</th>
		<th>修改范围 Field edited</th>
		<th>新修改内容 Value new</th>
		<th>原内容 Value old</th>
	</tr>
	<?php foreach ($edits as $edit): ?>
	<tr>
		<td><?= $edit['Edits']['posts_id']; ?></td>
		<td><?= $this->Time->nice($edit['Edits']['date']); ?></td>
		<td><?= $edit['Edits']['field']; ?></td>
		<td><?= $edit['Edits']['value_old']; ?></td>
		<td><?= $edit['Edits']['value_new']; ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
