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
		<?php if(isset($description_for_layout)){ echo $title_for_layout . ' - '; } ?> Justin McCandless
	</title>
	<?php if(isset($description_for_layout)){ echo "<meta name='description' content='".$description_for_layout."' />"; } ?>
	<meta name="keywords" content="Justin McCandless, blog, technology, entrepreneurship, startup, travel, China, Ecuador, Peru, Austria " />
	<?php
		echo $this->Html->meta('icon');
	
		echo $this->Html->css('style');
		echo $this->Html->css('lightbox');
		echo $this->Html->css('/js/redactor/css/redactor');
		echo $this->Html->css('http://fonts.googleapis.com/css?family=Bowlby+One+SC');

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
<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32798612-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- End Google Analytics -->	
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
			    <a class = "h1" href = "<?= $this->Html->url('/'); ?>"><img src="<?= $this->Html->url('/img/vegas.png'); ?>" style="position: absolute; top: 12px; right: 54px;"></a>
			    <a class = "h1" href = "<?= $this->Html->url('/'); ?>"><h1 style = "position: relative; top: -10px; left: 0px;">Justin McCandless</h1></a>
			    <ul class = "nav">
				    <li class="neon1"><a href = "<?= $this->Html->url('/'); ?>">Home</a>
				    <li class="neon2"><a href="<?= $this->Html->url('/about/'); ?>">About</a>
				    <li class="neon3"><a href = "<?= $this->Html->url('/projects/'); ?>">Projects</a>
					  <!-- <li class="neon4"><a href = "<?= $this->Html->url('/photos/'); ?>">Pictures</a> -->
				    <li class="neon5"><a href = "<?= $this->Html->url('/archive/'); ?>">Archive</a>
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
				<div id="rightbar_fixed">
					<!-- Begin Google Custom Search -->        
					<script>
                      (function() {
                        var cx = '005531558768930437238:WMX-1557164545';
                        var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
                        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                            '//www.google.com/cse/cse.js?cx=' + cx;
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
                      })();
                    </script>
                    <gcse:search></gcse:search>
					<!-- End Google Custom Search -->
					
					<!-- Google Adsense -->
					<script type="text/javascript"><!--
                    google_ad_client = "ca-pub-2475745093547689";
                    /* Wide (Bella made me do this) */
                    google_ad_slot = "3201290884";
                    google_ad_width = 336;
                    google_ad_height = 280;
                    //-->
                    </script>
                    <script type="text/javascript"
                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                    </script>
					<br clear="all" /><br />
					
					<!-- Twitter Feed -->
					<a class="twitter-timeline"  href="https://twitter.com/justinjmcc"  data-widget-id="264616093967056896">Tweets by @justinjmcc</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

					<br clear="all" /><br />
					
					<!-- Hidden Google + link for authorship -->
					<a href="https://plus.google.com/101532221547292067981?rel=author" style="display: none;"><img src="/img/googleplus.jpg" /></a>
					<br clear="all" /><br />
				</div>
			</div>
		</div>
		<div id="footer_bg">
			<div id="footer">
				<p> content copyright Justin McCandless <?= date('Y') ?> </p>
			    <p> design and code <a href = "http://www.github.com/justinmc/justinmccandless.com">open source</a> </p>
			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<!-- Disqus Comment Count -->
	<script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'justinmccandless'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
    </script>
    <!-- End Disqus Comment Count -->    
</body>
</html>
