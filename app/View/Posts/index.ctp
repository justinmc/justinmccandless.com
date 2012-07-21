<?php foreach($posts as $post): ?>
<a class="content_postTitle" href="<?= $this->Html->url('/blog/' . htmlspecialchars('Correctly Fading in/out onmouseover Using jQuery', ENT_QUOTES, "UTF-8")) ?>"><h3><?php echo $post['Post']['title']; ?></h3></a>
<a class="content_postPic" href="<?= $this->Html->url('/blog/' . urlencode($post['Post']['title'])) ?>"><img src="<?= $this->Html->url('/' . $post['Post']['titlepic']) ?>" /></a>
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
