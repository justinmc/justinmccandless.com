<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		The Blog of Justin McCandless
	</title>
	<?php
		echo $this->Html->meta('icon');
	
		echo $this->Html->css('style');
		echo $this->Html->css('lightbox');
		echo $this->Html->css('/js/redactor/css/redactor');

		echo $this->Html->script('http://code.jquery.com/jquery-1.7.2.min.js');
		echo $this->Html->script('lightbox');
		echo $this->Html->script('redactor/redactor');
		echo $this->Html->script('confirm-link');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
<meta name="google-site-verification" content="udKKu8OEdAdtCp2TvUqEh_YcRkXu8uIE4a2qYEtEniE" />
<!-- Google +1 Code -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
	
</head>
<body>

<!-- Facebook Like code -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=132237094403";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Google Ad Sense code -->
<script type="text/javascript"><!--
google_ad_client = "ca-pub-2475745093547689";
/* 180&#42;150 small retangle */
google_ad_slot = "8421616956";
google_ad_width = 180;
google_ad_height = 150;
//-->
</script>

	<div id="container">
		<div id="header_bg">
			<div id="header">
				<br />
				<div class = "decCornerTop"></div>
			    <img src="/img/titleSuits.png" style="position: absolute; top: 10px; right: 64px;">
			    <a class = "h1" href = "<?= $this->Html->url('/'); ?>"><h1 style = "position: relative; top: -10px; left: 0px;">Justin McCandless</h1></a>
			    <ul class = "nav" style="position: relative; top: -12px; left: 0px;">
				    <li><a href = "<?= $this->Html->url('/'); ?>">Home</a>
				    <li><a href="<?= $this->Html->url('/about/'); ?>">About</a>
				    <li><a href = "<?= $this->Html->url('/projects/'); ?>">Projects</a>
					<li><a href = "<?= $this->Html->url('/photos/'); ?>">Albums</a>
				    <li><a href = "<?= $this->Html->url('/archive/'); ?>">Archive</a>
					<?php if ($this->Session->read('Auth.User')): ?>
					<li><a href="<?= $this->Html->url('/admin/'); ?>">Admin</a></li>
					<li><a href="<?= $this->Html->url('/users/logout/'); ?>">Logout</a></li>
					<?php endif; ?>
			    </ul>
			</div>
		</div>
		<div id="container_center">
			<div id="content">
				<?php echo $this->Session->flash(); ?>
	
				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="rightbar">
				<div id="fixed">
					<!-- Begin Google Custom Search -->        
					<form action="http://justinmccandless.com/search.php" id="cse-search-box">
					  <div>
						<input type="hidden" name="cx" value="partner-pub-2475745093547689:0579282146" />
						<input type="hidden" name="cof" value="FORID:10" />
						<input type="hidden" name="ie" value="UTF-8" />
						<input type="text" name="q" size="16" />
						<input type="submit" name="sa" value="Search" />
					  </div>
					</form>
					<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
					<!-- End Google Custom Search -->
					<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
					</script>
				</div>
			</div>
		</div>
		<div id="footer_bg">
			<div id="footer">
				<p> content copyright Justin McCandless 2012 </p>
			    <p> design and code <a href = "http://www.github.com/justinmc/justinmccandless.com">open source</a> </p>
			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
