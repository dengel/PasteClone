/**
 * Script:
 *   Fuel.sql.js - SQL Fuel for Lighter.js.
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
Fuel.sql = new Class ({
	
	Extends: Fuel,
	language: 'sql',
	
	initialize: function(lighter, options) {
		
		/** Set of keywords in CSV form. Add multiple keyword hashes for differentiate keyword sets. */
		this.keywords = new Hash({
			keywords: {
				csv: 'absolute, action, add, after, alter, as, asc, at, authorization, begin, bigint, binary, bit, by, cascade, char, character, check, checkpoint, close, collate, column, commit, committed, connect, connection, constraint, contains, continue, create, cube, current, current_date, current_time, cursor, database, date, deallocate, dec, decimal, declare, default, delete, desc, distinct, double, drop, dynamic, else, end, end-exec, escape, except, exec, execute, false, fetch, first, float, for, force, foreign, forward, free, from, full, function, global, goto, grant, group, grouping, having, hour, ignore, index, inner, insensitive, insert, instead, int, integer, intersect, into, is, isolation, key, last, level, load, local, max, min, minute, modify, move, name, national, nchar, next, no, numeric, of, off, on, only, open, option, order, out, output, partial, password, precision, prepare, primary, prior, privileges, procedure, public, read, real, references, relative, repeatable, restrict, return, returns, revoke, rollback, rollup, rows, rule, schema, scroll, second, section, select, sequence, serializable, set, size, smallint, static, statistics, table, temp, temporary, then, time, timestamp, to, top, transaction, translation, trigger, true, truncate, uncommitted, union, unique, update, values, varchar, varying, view, when, where, with, work',
				alias: 'kw1',
				mod: 'gi'
			},
			functions: {
				csv: 'abs, avg, case, cast, coalesce, convert, count, current_timestamp, current_user, day, isnull, left, lower, month, nullif, replace, right, session_user, space, substring, sum, system_user, upper, user, year',
				alias: 'kw2',
				mod: 'gi'
			},
			operators: {
				csv: 'all, and, any, between, cross, in, join, like, not, null, or, outer, some',
				alias: 'kw3',
				mod: 'gi'
			}
		}),
		
		/** Set of RegEx patterns to match */
		this.patterns = new Hash({
			'singleLineComments': {pattern: /--(.*)$/gm, alias: 'co0'},
			'multiLineComments':  {pattern: this.common.multiComments, alias: 'co1'},
			'multiLineStrings':   {pattern: this.common.multiLineStrings, alias: 'st0'}
		});
		
		// Call parent constructor AFTER instance variables are set.
		this.parent(lighter, options);
	}
	
});
