<?php if ($error): ?>
<?php
if ($error == 401) {
   echo $form->create('Paste', array('url' => 'view'));
   echo $form->input('id', array('value' => $paste['Paste']['id'], 'type' => 'hidden'));
   echo $form->input('protect', array('label' => 'Insert key below:'));
   echo $form->end('Try now');
} elseif ($error == 410) {
   echo "All gone :(<br><br>";
} elseif ($error == 404) {
   echo "Maybe search for it?";
} else {
   echo "Error: ($error)";
}

?>
<?php else: ?>
<div class="pastes view">
<h2><?php  __('Paste');?> <? echo $paste['Paste']['id'] ?></h2>
   <table cellpadding="0" cellspacing="0">
   <tr>
         <th colspan="2"><?php __('Code');?></th>
   </tr>
   <tr>
      <td  colspan="2"><pre id='parseCode' class='<?php echo $paste['Paste']['parse']; ?>:git'><?php echo htmlentities($paste['Paste']['code']); ?></pre></td>
   </tr>
   <tr>
      <td colspan='2'><?php echo $this->element('social'); ?></td>
   </tr>
   <tr>
      <td colspan="2">
      <span class="small">
      <?php __('Hits:');?> <?php echo $paste['Paste']['hits']; ?><br />
      <?php __('Remote:');?> <?php echo $paste['Paste']['remote']; ?><br />
      <?php __('Referer:');?> <?php echo $paste['Paste']['referer']; ?><br />
      <?php __('Agent:');?> <?php echo $paste['Paste']['agent']; ?><br />
      </span>
      </td>
   </tr>
   <tr>
          <td width="1">
        <?php echo $gravatar ?>
          </td>	
      <td><?php __('Parser Engine:');?> <?php echo $paste['Paste']['parse']; ?>&nbsp;<br />
      <?php __('Entry Created:');?> <?php echo $paste['Paste']['created']; ?>&nbsp;<br />
      <?php __('Entry Modified:');?> <?php echo $paste['Paste']['modified']; ?>&nbsp;
      <?php if ($paste['Paste']['protect']) __('Entry Protected'); ?>&nbsp;</td>
   </tr>
   <tr>
      <td class="actions"  colspan="2">
         <?php echo $this->Html->link(__('View', true), array('action' => 'view', $paste['Paste']['id'])); ?>
         <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $paste['Paste']['id'])); ?>
         <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $paste['Paste']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $paste['Paste']['id'])); ?>
         <?php echo $this->Html->link(__('Print', true), array('action' => 'ezprint', $paste['Paste']['id'])); ?>
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
<?php endif; ?>
