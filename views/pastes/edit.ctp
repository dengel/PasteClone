<div class="pastes form">
<?php echo $this->Form->create('Paste');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Paste', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
      echo $this->Form->input('parse',array('options' => $parseArray, 'empty' => '(choose one)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Paste.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Paste.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Pastes', true)), array('action' => 'index'));?></li>
	</ul>
</div>
