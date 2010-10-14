<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php __($app_slogan); ?> -  <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('blueprint');
        echo $this->Html->css('pasteclone.specific');

        echo $scripts_for_layout;
        ?>
        <!-- dengel: Quisiera mover esto al $scipt_for_layour pero no se como -->
	<link  href="//fonts.googleapis.com/css?family=Inconsolata:regular" rel="stylesheet" type="text/css" >
        <script type="text/javascript" src="/paste/js/clientcide.js"></script>
        <script type="text/javascript" src="/paste/js/lighter/Lighter.js"></script>
        <script type="text/javascript" src="/paste/js/paste.js"></script>
    </head>
    <body>
        <div id="container" class="container">
		<div id="topmenu" class="span-24 last">
			<p class="menu">
			<?php echo $this->element("links"); ?>
			</p>
			<hr>
		</div>
            <div id="header" class="span-24 last">
		<br />&nbsp;
                <p class="mtitle"><?php echo $this->Html->link(__($app_slogan, true), '/'); ?></p>
		<br />&nbsp;
            </div>
            <div id="content" class="span-24 last">

                <?php echo $this->Session->flash(); ?>

                <?php echo $content_for_layout; ?>

		<hr>

                <?php echo $this->element("adsense"); ?>

            </div>
            <div id="footer" class="span-24 last">
		<br />&nbsp;<br />&nbsp;
		<?php
		if(Configure::read('debug')) {

		echo $this->Html->link(
		$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
                'http://book.cakephp.org/view/875/x1-3-Collection',
                array('target' => '_blank', 'escape' => false)
                );

		echo "<br /><small><a href='#' id='beta_link' class='beta'>Version: 0.6 Development.</a></small>";
			echo "<div id='beta_div'>";
			echo $this->element('sql_dump');
			pr($this->params);
			echo "</div>";
		}
		?>
		<br />&nbsp;<br />&nbsp;
            </div>
        </div>
        </body>
        </html>
