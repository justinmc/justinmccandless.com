<?php if ($post): ?>
<a href="/blog/<?php echo urlencode($post['Post']['title']); ?>"><h3><?php echo $post['Post']['title']; ?></h3></a>
<a href="/blog/<?php echo urlencode($post['Post']['title']); ?>"><img style="max-width: 800px;" src="<?= $this->Html->url('/' . $post['Post']['titlepic']) ?>" /></a>
<br />
<i>Posted: <?php echo $this->Time->nice($post['Post']['date']); ?></i>
<br /><br />
<p>
	<?php echo $post['Post']['post']; ?>
</p>
<br />
<!-- Google +1 -->
<div style = "float: right;">
    <g:plusone annotation="none"></g:plusone>
</div>
<!-- Facebook Like -->
<div class="fb-like" style = "float: right" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false" data-font="verdana"></div>
<?php else: ?>
<h2>没有找到该页面 Post Not Found</h2>
<p>
	对不起，没有找到您填写的地址。
<br/>
	Sorry!  The url you entered doesn't seem to be a valid post.
</p>
<p>
	<?php echo $this->Html->link('主页 Home', '/'); ?>
</p>
<?php endif; ?>
<br /><br />
<!-- Disqus -->
<div id="disqus_thread"></div>
<script type="text/javascript">
    var disqus_shortname = 'justinmccandless';

    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
<!-- End Disqus -->