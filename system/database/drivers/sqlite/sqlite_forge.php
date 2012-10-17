<<<<<<< HEAD
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
=======
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Open Software License version 3.0
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is
 * bundled with this package in the files license.txt / license.rst.  It is
 * also available through the world wide web at this URL:
 * http://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2012, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

<<<<<<< HEAD
// ------------------------------------------------------------------------

=======
>>>>>>> codeigniter/develop
/**
 * SQLite Forge Class
 *
 * @category	Database
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_sqlite_forge extends CI_DB_forge {

	/**
	 * Create database
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the database name
	 * @return	bool
	 */
	function _create_database()
=======
	 * @param	string	the database name
	 * @return	bool
	 */
	public function create_database($db_name = '')
>>>>>>> codeigniter/develop
	{
		// In SQLite, a database is created when you connect to the database.
		// We'll return TRUE so that an error isn't generated
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop database
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string	the database name
	 * @return	bool
	 */
	function _drop_database($name)
	{
		if ( ! @file_exists($this->db->database) OR ! @unlink($this->db->database))
		{
			if ($this->db->db_debug)
			{
				return $this->db->display_error('db_unable_to_drop');
			}
			return FALSE;
		}
		return TRUE;
	}
=======
	 * @param	string	the database name (ignored)
	 * @return	bool
	 */
	public function drop_database($db_name = '')
	{
		if ( ! @file_exists($this->db->database) OR ! @unlink($this->db->database))
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unable_to_drop') : FALSE;
		}
		elseif ( ! empty($this->db->data_cache['db_names']))
		{
			$key = array_search(strtolower($this->db->database), array_map('strtolower', $this->db->data_cache['db_names']), TRUE);
			if ($key !== FALSE)
			{
				unset($this->db->data_cache['db_names'][$key]);
			}
		}

		return TRUE;
	}

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Create Table
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	the table name
	 * @param	array	the fields
	 * @param	mixed	primary key(s)
	 * @param	mixed	key(s)
<<<<<<< HEAD
	 * @param	boolean	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
=======
	 * @param	bool	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	protected function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
>>>>>>> codeigniter/develop
	{
		$sql = 'CREATE TABLE ';

		// IF NOT EXISTS added to SQLite in 3.3.0
<<<<<<< HEAD
		if ($if_not_exists === TRUE && version_compare($this->db->_version(), '3.3.0', '>=') === TRUE)
=======
		if ($if_not_exists === TRUE && version_compare($this->db->version(), '3.3.0', '>=') === TRUE)
>>>>>>> codeigniter/develop
		{
			$sql .= 'IF NOT EXISTS ';
		}

<<<<<<< HEAD
		$sql .= $this->db->_escape_identifiers($table)."(";
		$current_field_count = 0;

		foreach ($fields as $field=>$attributes)
=======
		$sql .= $this->db->escape_identifiers($table).' (';
		$current_field_count = 0;

		foreach ($fields as $field => $attributes)
>>>>>>> codeigniter/develop
		{
			// Numeric field names aren't allowed in databases, so if the key is
			// numeric, we know it was assigned by PHP and the developer manually
			// entered the field information, so we'll simply add it to the list
			if (is_numeric($field))
			{
<<<<<<< HEAD
				$sql .= "\n\t$attributes";
=======
				$sql .= "\n\t".$attributes;
>>>>>>> codeigniter/develop
			}
			else
			{
				$attributes = array_change_key_case($attributes, CASE_UPPER);

<<<<<<< HEAD
				$sql .= "\n\t".$this->db->_protect_identifiers($field);

				$sql .=  ' '.$attributes['TYPE'];

				if (array_key_exists('CONSTRAINT', $attributes))
				{
					$sql .= '('.$attributes['CONSTRAINT'].')';
				}

				if (array_key_exists('UNSIGNED', $attributes) && $attributes['UNSIGNED'] === TRUE)
=======
				$sql .= "\n\t".$this->db->escape_identifiers($field).' '.$attributes['TYPE'];

				empty($attributes['CONSTRAINT']) OR $sql .= '('.$attributes['CONSTRAINT'].')';

				if ( ! empty($attributes['UNSIGNED']) && $attributes['UNSIGNED'] === TRUE)
>>>>>>> codeigniter/develop
				{
					$sql .= ' UNSIGNED';
				}

<<<<<<< HEAD
				if (array_key_exists('DEFAULT', $attributes))
				{
					$sql .= ' DEFAULT \''.$attributes['DEFAULT'].'\'';
				}

				if (array_key_exists('NULL', $attributes) && $attributes['NULL'] === TRUE)
				{
					$sql .= ' NULL';
				}
				else
				{
					$sql .= ' NOT NULL';
				}

				if (array_key_exists('AUTO_INCREMENT', $attributes) && $attributes['AUTO_INCREMENT'] === TRUE)
=======
				if (isset($attributes['DEFAULT']))
				{
					$sql .= " DEFAULT '".$attributes['DEFAULT']."'";
				}


				$sql .= ( ! empty($attributes['NULL']) && $attributes['NULL'] === TRUE)
					? ' NULL' : ' NOT NULL';

				if ( ! empty($attributes['AUTO_INCREMENT']) && $attributes['AUTO_INCREMENT'] === TRUE)
>>>>>>> codeigniter/develop
				{
					$sql .= ' AUTO_INCREMENT';
				}
			}

			// don't add a comma on the end of the last field
			if (++$current_field_count < count($fields))
			{
				$sql .= ',';
			}
		}

		if (count($primary_keys) > 0)
		{
<<<<<<< HEAD
			$primary_keys = $this->db->_protect_identifiers($primary_keys);
			$sql .= ",\n\tPRIMARY KEY (" . implode(', ', $primary_keys) . ")";
=======
			$sql .= ",\n\tPRIMARY KEY (".implode(', ', $this->db->escape_identifiers($primary_keys)).')';
>>>>>>> codeigniter/develop
		}

		if (is_array($keys) && count($keys) > 0)
		{
			foreach ($keys as $key)
			{
<<<<<<< HEAD
				if (is_array($key))
				{
					$key = $this->db->_protect_identifiers($key);
				}
				else
				{
					$key = array($this->db->_protect_identifiers($key));
				}

				$sql .= ",\n\tUNIQUE (" . implode(', ', $key) . ")";
			}
		}

		$sql .= "\n)";

		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop Table
	 *
	 *  Unsupported feature in SQLite
	 *
	 * @access	private
	 * @return	bool
	 */
	function _drop_table($table)
	{
		if ($this->db->db_debug)
		{
			return $this->db->display_error('db_unsuported_feature');
		}
		return array();
=======
				$key = is_array($key)
					? $this->db->escape_identifiers($key)
					: array($this->db->escape_identifiers($key));

				$sql .= ",\n\tUNIQUE (".implode(', ', $key).')';
			}
		}

		return $sql."\n)";
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Alter table query
	 *
	 * Generates a platform-specific query so that a table can be altered
	 * Called by add_column(), drop_column(), and column_alter(),
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	the ALTER type (ADD, DROP, CHANGE)
	 * @param	string	the column name
	 * @param	string	the table name
	 * @param	string	the column definition
	 * @param	string	the default value
<<<<<<< HEAD
	 * @param	boolean	should 'NOT NULL' be added
	 * @param	string	the field after which we should add the new field
	 * @return	object
	 */
	function _alter_table($alter_type, $table, $column_name, $column_definition = '', $default_value = '', $null = '', $after_field = '')
	{
		$sql = 'ALTER TABLE '.$this->db->_protect_identifiers($table)." $alter_type ".$this->db->_protect_identifiers($column_name);

		// DROP has everything it needs now.
		if ($alter_type == 'DROP')
		{
			// SQLite does not support dropping columns
			// http://www.sqlite.org/omitted.html
			// http://www.sqlite.org/faq.html#q11
			return FALSE;
		}

		$sql .= " $column_definition";

		if ($default_value != '')
		{
			$sql .= " DEFAULT \"$default_value\"";
		}

		if ($null === NULL)
		{
			$sql .= ' NULL';
		}
		else
		{
			$sql .= ' NOT NULL';
		}

		if ($after_field != '')
		{
			$sql .= ' AFTER ' . $this->db->_protect_identifiers($after_field);
		}

		return $sql;

	}

	// --------------------------------------------------------------------

	/**
	 * Rename a table
	 *
	 * Generates a platform-specific query so that a table can be renamed
	 *
	 * @access	private
	 * @param	string	the old table name
	 * @param	string	the new table name
	 * @return	string
	 */
	function _rename_table($table_name, $new_table_name)
	{
		$sql = 'ALTER TABLE '.$this->db->_protect_identifiers($table_name)." RENAME TO ".$this->db->_protect_identifiers($new_table_name);
		return $sql;
	}
=======
	 * @param	bool	should 'NOT NULL' be added
	 * @param	string	the field after which we should add the new field
	 * @return	string
	 */
	protected function _alter_table($alter_type, $table, $column_name, $column_definition = '', $default_value = '', $null = '', $after_field = '')
	{
		/* SQLite only supports adding new columns and it does
		 * NOT support the AFTER statement. Each new column will
		 * be added as the last one in the table.
		 */
		if ($alter_type !== 'ADD COLUMN')
		{
			// Not supported
			return FALSE;
		}

		return 'ALTER TABLE '.$this->db->escape_identifiers($table).' '.$alter_type.' '.$this->db->escape_identifiers($column_name)
			.' '.$column_definition
			.($default_value != '' ? " DEFAULT '".$default_value."'" : '')
			// If NOT NULL is specified, the field must have a DEFAULT value other than NULL
			.(($null !== NULL && $default_value !== 'NULL') ? ' NOT NULL' : ' NULL');
	}

>>>>>>> codeigniter/develop
}

/* End of file sqlite_forge.php */
/* Location: ./system/database/drivers/sqlite/sqlite_forge.php */