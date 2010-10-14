<div class="pastes index">
	<h2><?php __('Pastes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th nowrap>Id</th>
			<th nowrap>Code</th>
			<th nowrap>Parse</th>
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
	</tr>
<?php endforeach; ?>
	</table>

</div>
