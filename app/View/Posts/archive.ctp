<table>
<tbody>
	<tr>
		<th>Number</th>
		<th>Title</th>
		<th>Date</th>
	</tr>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?= ($post['Post']['id'] + 1) ?></td>
		<td><?= $this->Html->link($post['Post']['title'], '/blog/' . urlencode($post['Post']['title'])); ?></td>
		<td><?= $this->Time->nice($post['Post']['date']); ?></td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
