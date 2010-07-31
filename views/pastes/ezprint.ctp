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
<div class="pastes">
<h2><?php  __('Paste');?> <? echo $paste['Paste']['id'] ?></h2>
      <pre id='parseCode' class='<?php echo $paste['Paste']['parse']; ?>:git'><?php echo htmlentities($paste['Paste']['code']); ?></pre>
</div>
<?php endif; ?>
