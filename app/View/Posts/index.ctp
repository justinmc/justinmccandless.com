<?php $count = 0; ?>
<?php foreach($posts as $post): ?>
<a class="content_postTitle" href="<?= $this->Html->url('/blog/' . urlencode($post['Post']['title'])) ?>"><h3><?php echo $post['Post']['title']; ?></h3></a>
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

<?php $count++; ?>
<?php endforeach; ?>
<br /><br /><br /><br />

<div class="centerme">
	<span style="float: left;"><?= $this->Paginator->prev('<< Newer', array(), ' ') ?></span>
	<?= $this->Paginator->numbers(array('separator' => '&nbsp;&nbsp;&nbsp;&nbsp;')); ?>
	<span style="float: right;"><?= $this->Paginator->next('Older >>', array(), ' ') ?></span>
</div>

