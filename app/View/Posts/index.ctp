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

<?php if (($count == 0) && (count($posts) > 1)): ?>
<!-- Google Adsense between posts -->
<script type="text/javascript"><!--
google_ad_client = "ca-pub-2475745093547689";
/* Between Article */
google_ad_slot = "6170359755";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<br /><br /><br /><br />
<?php endif; ?>

<?php $count++; ?>
<?php endforeach; ?>
<br /><br />

<!-- Google Adsense after posts -->
<script type="text/javascript"><!--
google_ad_client = "ca-pub-2475745093547689";
/* Above page nav */
google_ad_slot = "2848197588";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<div class="centerme">
	<span style="float: left;"><?= $this->Paginator->prev('<< Newer', array(), ' ') ?></span>
	<?= $this->Paginator->numbers(array('separator' => '&nbsp;&nbsp;&nbsp;&nbsp;')); ?>
	<span style="float: right;"><?= $this->Paginator->next('Older >>', array(), ' ') ?></span>
</div>

