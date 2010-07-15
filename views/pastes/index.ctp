<div class="pastes index">
	<h2><?php __('Pastes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('code');?></th>
			<th><?php echo $this->Paginator->sort('parse');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pastes as $paste):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $paste['Paste']['id']; ?>&nbsp;</td>
		<td><?php echo $paste['Paste']['parse']; ?>&nbsp;</td>
      <td><pre id='parseCode' class='<?php echo $paste['Paste']['parse']; ?>:git'><?php echo htmlentities($paste['Paste']['code']); ?></pre></td>
		<td><?php echo $paste['Paste']['created']; ?>&nbsp;</td>
		<td><?php echo $paste['Paste']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $paste['Paste']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $paste['Paste']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $paste['Paste']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $paste['Paste']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Paste', true)), array('action' => 'add')); ?></li>
	</ul>
</div>
