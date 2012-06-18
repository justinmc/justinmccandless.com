<h2>User Administration</h2>
<p>
	From this page you can manage administrator accounts.
</p>
<table>
<tbody>
	<tr>
		<th>&nbsp;</th>
		<th>名字 Name</th>
		<th>Created</th>
		<th>Modified</th>
		<th>&nbsp;</th>
	</tr>
	<tr>
		<td><?= $this->Html->link('Create New User', '/users/register/'); ?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?= $this->Html->link('Change Password', '/users/edit/' . $user['Users']['username']); ?></td>
		<td><?= $user['Users']['username']; ?></td>
		<td><?= $user['Users']['created']; ?></td>
		<td><?= $user['Users']['modified']; ?></td>
		<td><a href="<?= ($this->Html->url('/admin/deleteuser/' . $user['Users']['id'])) ?>" data-confirm-link="你确定吗? This will permanently the user.  Are you sure?">Delete User</a></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
