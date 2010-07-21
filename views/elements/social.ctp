<?php if (isset($thisurl)): ?>
<div id="social_div" class="social">
<B>Share this:</B> 
<a href='http://reddit.com/submit?url=<?php echo $thisurl ?>' title="Submit to Reddit"><img src="http://i.imgur.com/images/reddit.png" alt="Submit to Reddit" /></a>
<a href='http://www.digg.com/submit?phase=2&url=<?php echo $thisurl ?>' title="Submit to Digg"><img src="http://i.imgur.com/images/digg.png" alt="Submit to Digg" /></a>
<a href='http://www.stumbleupon.com/submit?url=<?php echo $thisurl ?>' title="Submit to StumbleUpon"><img src="http://i.imgur.com/images/stumble.png" alt="Submit to StumbleUpon" /></a>
<a href='http://twitter.com/home?status=<?php echo $thisurl ?>' title="Submit to Twitter"><img src="http://i.imgur.com/images/twitter.png" alt="Submit to Twitter" /></a>
<a href='http://www.facebook.com/sharer.php?u=<?php echo $thisurl ?>' title="Submit to Facebook"><img src="http://i.imgur.com/images/facebook.png" alt="Submit to Facebook" /></a>
</div>
<?php endif; ?>
