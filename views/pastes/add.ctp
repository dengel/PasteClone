<div class="pastes form">
<?php echo $this->Form->create('Paste');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Paste', true)); ?></legend>
	<?php
		echo $this->Form->input('code',array('class' => 'pastebox'));
		echo $this->Form->input('parse',array('options' => $parseArray, 'empty' => '(choose one)'));
		echo $this->Form->input('Paste.protect',  array('type' => 'password'));
		echo $this->Form->input('email');
		echo $this->Form->input('gravatar');
		echo $this->Form->input('destruct');
	?>
	</fieldset>
        <div class="tocenter">
        <?php echo $this->Form->end(__('Submit', true));?>
        </div>
</div>
