<div class="pastes view">
<h2><?php  __('Paste');?> <? echo $paste['Paste']['id'] ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo ('code');?></th>
	</tr>
	<tr>
      <td><pre id='parseCode' class='<?php echo $paste['Paste']['parse']; ?>:git'><?php echo htmlentities($paste['Paste']['code']); ?></pre></td>
	</tr>
	<tr>
		<td><?php __('Parser Engine:');?><?php echo $paste['Paste']['parse']; ?>&nbsp;<br />
		<?php __('Entry Created:');?><?php echo $paste['Paste']['created']; ?>&nbsp;<br />
		<?php __('Entry Modified:');?><?php echo $paste['Paste']['modified']; ?>&nbsp;</td>
	</tr>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $paste['Paste']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $paste['Paste']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $paste['Paste']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $paste['Paste']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Edit %s', true), __('Paste', true)), array('action' => 'edit', $paste['Paste']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Delete %s', true), __('Paste', true)), array('action' => 'delete', $paste['Paste']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $paste['Paste']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Pastes', true)), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Paste', true)), array('action' => 'add')); ?> </li>
	</ul>
</div>
