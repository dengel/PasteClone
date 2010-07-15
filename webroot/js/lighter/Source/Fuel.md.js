/**
 * Script:
 *   Fuel.md.js - MarkDown language file for Lighter.js
 *
 * License:
 *   MIT-style license.
 * 
 * Author:
 *   Jose Prado
 *
 * Copyright:
 *   Copyright (©) 2009 [Jose Prado](http://pradador.com/).
 * 
 */
Fuel.md = new Class ({
	
	Extends: Fuel,
	language: 'md',
	
	initialize: function(code, options) {
		
		/** Set of RegEx patterns to match */
		this.patterns = new Hash({
			'header1': {pattern: /^(.+)\n=+\n/gim,   alias: 'st1'},
			'header2': {pattern: /^(.+)\n-+\n/gim,   alias: 'st2'},
			'header3': {pattern: /[#]{1,6}.*/gim,    alias: 'st0'},
			'ul':      {pattern: /^\*\s*.*/gim,      alias: 'kw1'},
			'ol':      {pattern: /^\d+\..*/gim,      alias: 'kw1'},
			'italics': {pattern: /\*.*?\*/g,         alias: 'kw3'},
			'bold':    {pattern: /\*\*.*?\*\*/g,     alias: 'kw3'},
			'url':     {pattern: /\[[^\]]*\]\([^\)]*\)/g, alias: 'kw4'}
		});
		
		this.parent(code, options);
	}
	
});