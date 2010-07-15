<?php
class Paste extends AppModel {
	var $name = 'Paste';
	var $displayField = 'id';
	var $validate = array(
		'id' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

   function getParseValues() {
      return array(
         'css' => 'css', 
         'html' => 'html', 
         'js' => 'js', 
         'md' => 'md', 
         'php' => 'php', 
         'ruby' => 'ruby', 
         'shell' => 'shell', 
         'sql' => 'sql'
      );
   }
}
?>
