<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Paste: Yet another pastebin clone:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php echo $this->Html->css('cake.generic'); ?>
        <script type="text/javascript" src="/paste/js/clientcide.js"></script>
        <script type="text/javascript" src="/paste/js/lighter/Lighter.js"></script>
        <script type="text/javascript" src="/paste/js/paste.js"></script>
</head>
<body class="white" onLoad="javascript:window.print();">
<?php echo $this->Session->flash(); ?>
<?php echo $content_for_layout; ?>
</body>
</html>
