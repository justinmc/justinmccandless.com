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
<a style="float: right;" href="<?= $this->Html->url('/blog/' . urlencode($post['Post']['title'])) ?>#disqus_thread"></a>
<br /><br /><br /><br />
<?php endforeach; ?>
<br /><br />
<div class="centerme">
	<span style="float: left;"><?= $this->Paginator->prev() ?></span>
	<?= $this->Paginator->numbers() ?>
	<span style="float: right;"><?= $this->Paginator->next() ?></span>
</div>
