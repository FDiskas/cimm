<<<<<<< HEAD
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Code Igniter
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

/**
 * Database Utility Class
 *
 * @category	Database
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_forge {

	var $fields			= array();
	var $keys			= array();
	var $primary_keys	= array();
	var $db_char_set	=	'';

	/**
	 * Constructor
	 *
	 * Grabs the CI super object instance so we can access it.
	 *
	 */
	function __construct()
=======
/**
 * Database Forge Class
 *
 * @category	Database
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
abstract class CI_DB_forge {

	public $fields		= array();
	public $keys		= array();
	public $primary_keys	= array();
	public $db_char_set	=	'';

	// Platform specific SQL strings
	protected $_create_database	= 'CREATE DATABASE %s';
	protected $_drop_database	= 'DROP DATABASE %s';
	protected $_drop_table		= 'DROP TABLE IF EXISTS %s';
	protected $_rename_table	= 'ALTER TABLE %s RENAME TO %s';

	public function __construct()
>>>>>>> codeigniter/develop
	{
		// Assign the main database object to $this->db
		$CI =& get_instance();
		$this->db =& $CI->db;
<<<<<<< HEAD
		log_message('debug', "Database Forge Class Initialized");
=======
		log_message('debug', 'Database Forge Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Create database
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the database name
	 * @return	bool
	 */
	function create_database($db_name)
	{
		$sql = $this->_create_database($db_name);

		if (is_bool($sql))
		{
			return $sql;
		}

		return $this->db->query($sql);
=======
	 * @param	string	the database name
	 * @return	bool
	 */
	public function create_database($db_name)
	{
		if ($this->_create_database === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsuported_feature') : FALSE;
		}
		elseif ( ! $this->db->query(sprintf($this->_create_database, $db_name, $this->db->char_set, $this->db->dbcollat)))
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unable_to_drop') : FALSE;
		}

		if ( ! empty($this->db->data_cache['db_names']))
		{
			$this->db->data_cache['db_names'][] = $db_name;
		}

		return TRUE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Drop database
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the database name
	 * @return	bool
	 */
	function drop_database($db_name)
	{
		$sql = $this->_drop_database($db_name);

		if (is_bool($sql))
		{
			return $sql;
		}

		return $this->db->query($sql);
=======
	 * @param	string	the database name
	 * @return	bool
	 */
	public function drop_database($db_name)
	{
		if ($db_name === '')
		{
			show_error('A table name is required for that operation.');
			return FALSE;
		}
		elseif ($this->_drop_database === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsuported_feature') : FALSE;
		}
		elseif ( ! $this->db->query(sprintf($this->_drop_database, $db_name)))
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unable_to_drop') : FALSE;
		}

		if ( ! empty($this->db->data_cache['db_names']))
		{
			$key = array_search(strtolower($db_name), array_map('strtolower', $this->db->data_cache['db_names']), TRUE);
			if ($key !== FALSE)
			{
				unset($this->db->data_cache['db_names'][$key]);
			}
		}

		return TRUE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Add Key
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	key
	 * @param	string	type
	 * @return	void
	 */
	function add_key($key = '', $primary = FALSE)
=======
	 * @param	string	key
	 * @param	string	type
	 * @return	object
	 */
	public function add_key($key = '', $primary = FALSE)
>>>>>>> codeigniter/develop
	{
		if (is_array($key))
		{
			foreach ($key as $one)
			{
				$this->add_key($one, $primary);
			}

			return;
		}

<<<<<<< HEAD
		if ($key == '')
=======
		if ($key === '')
>>>>>>> codeigniter/develop
		{
			show_error('Key information is required for that operation.');
		}

		if ($primary === TRUE)
		{
			$this->primary_keys[] = $key;
		}
		else
		{
			$this->keys[] = $key;
		}
<<<<<<< HEAD
=======

		return $this;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Add Field
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	collation
	 * @return	void
	 */
	function add_field($field = '')
	{
		if ($field == '')
=======
	 * @param	string	collation
	 * @return	object
	 */
	public function add_field($field = '')
	{
		if ($field === '')
>>>>>>> codeigniter/develop
		{
			show_error('Field information is required.');
		}

		if (is_string($field))
		{
<<<<<<< HEAD
			if ($field == 'id')
			{
				$this->add_field(array(
										'id' => array(
													'type' => 'INT',
													'constraint' => 9,
													'auto_increment' => TRUE
													)
								));
=======
			if ($field === 'id')
			{
				$this->add_field(array(
					'id' => array(
						'type' => 'INT',
						'constraint' => 9,
						'auto_increment' => TRUE
					)
				));
>>>>>>> codeigniter/develop
				$this->add_key('id', TRUE);
			}
			else
			{
				if (strpos($field, ' ') === FALSE)
				{
					show_error('Field information is required for that operation.');
				}

				$this->fields[] = $field;
			}
		}

		if (is_array($field))
		{
			$this->fields = array_merge($this->fields, $field);
		}

<<<<<<< HEAD
=======
		return $this;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Create Table
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function create_table($table = '', $if_not_exists = FALSE)
	{
		if ($table == '')
=======
	 * @param	string	the table name
	 * @return	bool
	 */
	public function create_table($table = '', $if_not_exists = FALSE)
	{
		if ($table === '')
>>>>>>> codeigniter/develop
		{
			show_error('A table name is required for that operation.');
		}

<<<<<<< HEAD
		if (count($this->fields) == 0)
=======
		if (count($this->fields) === 0)
>>>>>>> codeigniter/develop
		{
			show_error('Field information is required.');
		}

		$sql = $this->_create_table($this->db->dbprefix.$table, $this->fields, $this->primary_keys, $this->keys, $if_not_exists);
<<<<<<< HEAD

		$this->_reset();
		return $this->db->query($sql);
=======
		$this->_reset();

		if (is_bool($sql))
		{
			return $sql;
		}

		if (($result = $this->db->query($sql)) !== FALSE && ! empty($this->db->data_cache['table_names']))
		{
			$this->db->data_cache['table_names'][] = $this->db->dbprefix.$table;
		}

		return $result;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Drop Table
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function drop_table($table_name)
	{
		$sql = $this->_drop_table($this->db->dbprefix.$table_name);

		if (is_bool($sql))
		{
			return $sql;
		}

		return $this->db->query($sql);
=======
	 * @param	string	the table name
	 * @return	bool
	 */
	public function drop_table($table_name)
	{
		if ($table_name === '')
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_table_name_required') : FALSE;
		}
		elseif ($this->_drop_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsuported_feature') : FALSE;
		}

		$result = $this->db->query(sprintf($this->_drop_table, $this->db->escape_identifiers($this->db->dbprefix.$table_name)));

		// Update table list cache
		if ($result && ! empty($this->db->data_cache['table_names']))
		{
			$key = array_search(strtolower($this->db->dbprefix.$table_name), array_map('strtolower', $this->db->data_cache['table_names']), TRUE);
			if ($key !== FALSE)
			{
				unset($this->db->data_cache['table_names'][$key]);
			}
		}

		return $result;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Rename Table
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	the old table name
	 * @param	string	the new table name
	 * @return	bool
	 */
<<<<<<< HEAD
	function rename_table($table_name, $new_table_name)
	{
		if ($table_name == '' OR $new_table_name == '')
		{
			show_error('A table name is required for that operation.');
		}

		$sql = $this->_rename_table($this->db->dbprefix.$table_name, $this->db->dbprefix.$new_table_name);
		return $this->db->query($sql);
=======
	public function rename_table($table_name, $new_table_name)
	{
		if ($table_name === '' OR $new_table_name === '')
		{
			show_error('A table name is required for that operation.');
			return FALSE;
		}
		elseif ($this->_rename_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsuported_feature') : FALSE;
		}

		$result = $this->db->query(sprintf($this->_rename_table,
						$this->db->escape_identifiers($this->db->dbprefix.$table_name),
						$this->db->escape_identifiers($this->db->dbprefix.$new_table_name))
					);

		if ($result && ! empty($this->db->data_cache['table_names']))
		{
			$key = array_search(strtolower($this->db->dbprefix.$table_name), array_map('strtolower', $this->db->data_cache['table_names']), TRUE);
			if ($key !== FALSE)
			{
				$this->db->data_cache['table_names'][$key] = $this->db->dbprefix.$new_table_name;
			}
		}

		return $result;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Column Add
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	the table name
	 * @param	string	the column name
	 * @param	string	the column definition
	 * @return	bool
	 */
<<<<<<< HEAD
	function add_column($table = '', $field = array(), $after_field = '')
	{
		if ($table == '')
=======
	public function add_column($table = '', $field = array(), $after_field = '')
	{
		if ($table === '')
>>>>>>> codeigniter/develop
		{
			show_error('A table name is required for that operation.');
		}

		// add field info into field array, but we can only do one at a time
		// so we cycle through
<<<<<<< HEAD

		foreach ($field as $k => $v)
		{
			$this->add_field(array($k => $field[$k]));

			if (count($this->fields) == 0)
=======
		foreach (array_keys($field) as $k)
		{
			$this->add_field(array($k => $field[$k]));

			if (count($this->fields) === 0)
>>>>>>> codeigniter/develop
			{
				show_error('Field information is required.');
			}

			$sql = $this->_alter_table('ADD', $this->db->dbprefix.$table, $this->fields, $after_field);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
			$this->_reset();

			if ($this->db->query($sql) === FALSE)
			{
				return FALSE;
			}
		}

		return TRUE;
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Column Drop
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	the table name
	 * @param	string	the column name
	 * @return	bool
	 */
<<<<<<< HEAD
	function drop_column($table = '', $column_name = '')
	{

		if ($table == '')
=======
	public function drop_column($table = '', $column_name = '')
	{
		if ($table === '')
>>>>>>> codeigniter/develop
		{
			show_error('A table name is required for that operation.');
		}

<<<<<<< HEAD
		if ($column_name == '')
=======
		if ($column_name === '')
>>>>>>> codeigniter/develop
		{
			show_error('A column name is required for that operation.');
		}

<<<<<<< HEAD
		$sql = $this->_alter_table('DROP', $this->db->dbprefix.$table, $column_name);

		return $this->db->query($sql);
=======
		return $this->db->query($this->_alter_table('DROP', $this->db->dbprefix.$table, $column_name));
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Column Modify
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	the table name
	 * @param	string	the column name
	 * @param	string	the column definition
	 * @return	bool
	 */
<<<<<<< HEAD
	function modify_column($table = '', $field = array())
	{
		if ($table == '')
=======
	public function modify_column($table = '', $field = array())
	{
		if ($table === '')
>>>>>>> codeigniter/develop
		{
			show_error('A table name is required for that operation.');
		}

		// add field info into field array, but we can only do one at a time
		// so we cycle through
<<<<<<< HEAD

		foreach ($field as $k => $v)
=======
		foreach (array_keys($field) as $k)
>>>>>>> codeigniter/develop
		{
			// If no name provided, use the current name
			if ( ! isset($field[$k]['name']))
			{
				$field[$k]['name'] = $k;
			}

			$this->add_field(array($k => $field[$k]));
<<<<<<< HEAD

			if (count($this->fields) == 0)
=======
			if (count($this->fields) === 0)
>>>>>>> codeigniter/develop
			{
				show_error('Field information is required.');
			}

			$sql = $this->_alter_table('CHANGE', $this->db->dbprefix.$table, $this->fields);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
			$this->_reset();

			if ($this->db->query($sql) === FALSE)
			{
				return FALSE;
			}
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Reset
	 *
	 * Resets table creation vars
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	void
	 */
	function _reset()
	{
		$this->fields		= array();
		$this->keys			= array();
		$this->primary_keys	= array();
=======
	 * @return	void
	 */
	protected function _reset()
	{
		$this->fields = $this->keys = $this->primary_keys = array();
>>>>>>> codeigniter/develop
	}

}

/* End of file DB_forge.php */
/* Location: ./system/database/DB_forge.php */