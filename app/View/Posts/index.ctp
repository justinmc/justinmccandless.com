<?php foreach($posts as $post): ?>
<a href="<?= $this->Html->url('/blog/' . urlencode($post['Post']['title'])) ?>"><h3><?php echo $post['Post']['title']; ?></h3></a>
<a href="<?= $this->Html->url('/blog/' . urlencode($post['Post']['title'])) ?>"><img src="<?= $this->Html->url('/' . $post['Post']['titlepic']) ?>" width="800" /></a>
<br />
<div class="post">
<span>Posted: <?php echo $this->Time->nice($post['Post']['date']); ?></span>
</div>
<br />
<p>
	<?php echo $post['Post']['post_intro']; ?>
</p>
<a href="<?= $this->Html->url('/blog/' . urlencode($post['Post']['title'])) ?>">Read</a>
<br /><br /><br /><br />
<?php endforeach; ?>
<br />
<div class="centerme">
	<?= $this->Paginator->first() ?>
	<?= $this->Paginator->numbers() ?>
	<?= $this->Paginator->last() ?>
</div>
