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
 * Database Result Class
 *
 * This is the platform-independent result class.
 * This class will not be called directly. Rather, the adapter
 * class for the specific database will extend and instantiate it.
 *
 * @category	Database
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_result {

<<<<<<< HEAD
	var $conn_id				= NULL;
	var $result_id				= NULL;
	var $result_array			= array();
	var $result_object			= array();
	var $custom_result_object	= array();
	var $current_row			= 0;
	var $num_rows				= 0;
	var $row_data				= NULL;


	/**
	 * Query result.  Acts as a wrapper function for the following functions.
	 *
	 * @access	public
	 * @param	string	can be "object" or "array"
	 * @return	mixed	either a result object or array
	 */
	public function result($type = 'object')
	{
		if ($type == 'array') return $this->result_array();
		else if ($type == 'object') return $this->result_object();
		else return $this->custom_result_object($type);
=======
	public $conn_id;
	public $result_id;
	public $result_array			= array();
	public $result_object			= array();
	public $custom_result_object		= array();
	public $current_row			= 0;
	public $num_rows;
	public $row_data;

	/**
	 * Constructor
	 *
	 * @param	object
	 * @return	void
	 */
	public function __construct(&$driver_object)
	{
		$this->conn_id = $driver_object->conn_id;
		$this->result_id = $driver_object->result_id;
	}

	// --------------------------------------------------------------------

	/**
	 * Number of rows in the result set
	 *
	 * @return	int
	 */
	public function num_rows()
	{
		if (is_int($this->num_rows))
		{
			return $this->num_rows;
		}
		elseif (count($this->result_array) > 0)
		{
			return $this->num_rows = count($this->result_array);
		}
		elseif (count($this->result_object) > 0)
		{
			return $this->num_rows = count($this->result_object);
		}

		return $this->num_rows = count($this->result_array());
	}

	// --------------------------------------------------------------------

	/**
	 * Query result. Acts as a wrapper function for the following functions.
	 *
	 * @param	string	'object', 'array' or a custom class name
	 * @return	array
	 */
	public function result($type = 'object')
	{
		if ($type === 'array')
		{
			return $this->result_array();
		}
		elseif ($type === 'object')
		{
			return $this->result_object();
		}
		else
		{
			return $this->custom_result_object($type);
		}
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Custom query result.
	 *
<<<<<<< HEAD
	 * @param class_name A string that represents the type of object you want back
	 * @return array of objects
	 */
	public function custom_result_object($class_name)
	{
		if (array_key_exists($class_name, $this->custom_result_object))
		{
			return $this->custom_result_object[$class_name];
		}

		if ($this->result_id === FALSE OR $this->num_rows() == 0)
=======
	 * @param	string	A string that represents the type of object you want back
	 * @return	array	of objects
	 */
	public function custom_result_object($class_name)
	{
		if (isset($this->custom_result_object[$class_name]))
		{
			return $this->custom_result_object[$class_name];
		}
		elseif ( ! $this->result_id OR $this->num_rows === 0)
>>>>>>> codeigniter/develop
		{
			return array();
		}

<<<<<<< HEAD
		// add the data to the object
		$this->_data_seek(0);
		$result_object = array();

		while ($row = $this->_fetch_object())
		{
			$object = new $class_name();

			foreach ($row as $key => $value)
			{
				$object->$key = $value;
			}

			$result_object[] = $object;
		}

		// return the array
		return $this->custom_result_object[$class_name] = $result_object;
=======
		// Don't fetch the result set again if we already have it
		$_data = NULL;
		if (($c = count($this->result_array)) > 0)
		{
			$_data = 'result_array';
		}
		elseif (($c = count($this->result_object)) > 0)
		{
			$_data = 'result_object';
		}

		if ($_data !== NULL)
		{
			for ($i = 0; $i < $c; $i++)
			{
				$this->custom_result_object[$class_name][$i] = new $class_name();

				foreach ($this->{$_data}[$i] as $key => $value)
				{
					$this->custom_result_object[$class_name][$i]->$key = $value;
				}
			}

			return $this->custom_result_object[$class_name];
		}

		$this->_data_seek(0);
		$this->custom_result_object[$class_name] = array();

		while ($row = $this->_fetch_object($class_name))
		{
			$this->custom_result_object[$class_name][] = $row;
		}

		return $this->custom_result_object[$class_name];
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Query result.  "object" version.
	 *
	 * @access	public
	 * @return	object
=======
	 * Query result. "object" version.
	 *
	 * @return	array
>>>>>>> codeigniter/develop
	 */
	public function result_object()
	{
		if (count($this->result_object) > 0)
		{
			return $this->result_object;
		}

<<<<<<< HEAD
		// In the event that query caching is on the result_id variable
		// will return FALSE since there isn't a valid SQL resource so
		// we'll simply return an empty array.
		if ($this->result_id === FALSE OR $this->num_rows() == 0)
=======
		// In the event that query caching is on, the result_id variable
		// will not be a valid resource so we'll simply return an empty
		// array.
		if ( ! $this->result_id OR $this->num_rows === 0)
>>>>>>> codeigniter/develop
		{
			return array();
		}

<<<<<<< HEAD
=======
		if (($c = count($this->result_array)) > 0)
		{
			for ($i = 0; $i < $c; $i++)
			{
				$this->result_object[$i] = (object) $this->result_array[$i];
			}

			return $this->result_object;
		}

>>>>>>> codeigniter/develop
		$this->_data_seek(0);
		while ($row = $this->_fetch_object())
		{
			$this->result_object[] = $row;
		}

		return $this->result_object;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Query result.  "array" version.
	 *
	 * @access	public
=======
	 * Query result. "array" version.
	 *
>>>>>>> codeigniter/develop
	 * @return	array
	 */
	public function result_array()
	{
		if (count($this->result_array) > 0)
		{
			return $this->result_array;
		}

<<<<<<< HEAD
		// In the event that query caching is on the result_id variable
		// will return FALSE since there isn't a valid SQL resource so
		// we'll simply return an empty array.
		if ($this->result_id === FALSE OR $this->num_rows() == 0)
=======
		// In the event that query caching is on, the result_id variable
		// will not be a valid resource so we'll simply return an empty
		// array.
		if ( ! $this->result_id OR $this->num_rows === 0)
>>>>>>> codeigniter/develop
		{
			return array();
		}

<<<<<<< HEAD
=======
		if (($c = count($this->result_object)) > 0)
		{
			for ($i = 0; $i < $c; $i++)
			{
				$this->result_array[$i] = (array) $this->result_object[$i];
			}

			return $this->result_array;
		}

>>>>>>> codeigniter/develop
		$this->_data_seek(0);
		while ($row = $this->_fetch_assoc())
		{
			$this->result_array[] = $row;
		}

		return $this->result_array;
	}

	// --------------------------------------------------------------------

	/**
	 * Query result.  Acts as a wrapper function for the following functions.
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	string	can be "object" or "array"
	 * @return	mixed	either a result object or array
	 */
	public function row($n = 0, $type = 'object')
	{
		if ( ! is_numeric($n))
		{
			// We cache the row data for subsequent uses
			if ( ! is_array($this->row_data))
			{
				$this->row_data = $this->row_array(0);
			}

			// array_key_exists() instead of isset() to allow for MySQL NULL values
			if (array_key_exists($n, $this->row_data))
			{
				return $this->row_data[$n];
			}
			// reset the $n variable if the result was not achieved
			$n = 0;
		}

<<<<<<< HEAD
		if ($type == 'object') return $this->row_object($n);
		else if ($type == 'array') return $this->row_array($n);
=======
		if ($type === 'object') return $this->row_object($n);
		elseif ($type === 'array') return $this->row_array($n);
>>>>>>> codeigniter/develop
		else return $this->custom_row_object($n, $type);
	}

	// --------------------------------------------------------------------

	/**
	 * Assigns an item into a particular column slot
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	object
=======
	 * @return	void
>>>>>>> codeigniter/develop
	 */
	public function set_row($key, $value = NULL)
	{
		// We cache the row data for subsequent uses
		if ( ! is_array($this->row_data))
		{
			$this->row_data = $this->row_array(0);
		}

		if (is_array($key))
		{
			foreach ($key as $k => $v)
			{
				$this->row_data[$k] = $v;
			}
<<<<<<< HEAD

			return;
		}

		if ($key != '' AND ! is_null($value))
=======
			return;
		}

		if ($key !== '' && ! is_null($value))
>>>>>>> codeigniter/develop
		{
			$this->row_data[$key] = $value;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Returns a single result row - custom object version
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @return	object
	 */
	public function custom_row_object($n, $type)
	{
<<<<<<< HEAD
		$result = $this->custom_result_object($type);

		if (count($result) == 0)
		{
			return $result;
		}

		if ($n != $this->current_row AND isset($result[$n]))
=======
		isset($this->custom_result_object[$type]) OR $this->custom_result_object($type);

		if (count($this->custom_result_object[$type]) === 0)
		{
			return NULL;
		}

		if ($n !== $this->current_row && isset($this->custom_result_object[$type][$n]))
>>>>>>> codeigniter/develop
		{
			$this->current_row = $n;
		}

<<<<<<< HEAD
		return $result[$this->current_row];
	}

	/**
	 * Returns a single result row - object version
	 *
	 * @access	public
=======
		return $this->custom_result_object[$type][$this->current_row];
	}

	// --------------------------------------------------------------------

	/**
	 * Returns a single result row - object version
	 *
>>>>>>> codeigniter/develop
	 * @return	object
	 */
	public function row_object($n = 0)
	{
		$result = $this->result_object();
<<<<<<< HEAD

		if (count($result) == 0)
		{
			return $result;
		}

		if ($n != $this->current_row AND isset($result[$n]))
=======
		if (count($result) === 0)
		{
			return NULL;
		}

		if ($n !== $this->current_row && isset($result[$n]))
>>>>>>> codeigniter/develop
		{
			$this->current_row = $n;
		}

		return $result[$this->current_row];
	}

	// --------------------------------------------------------------------

	/**
	 * Returns a single result row - array version
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @return	array
	 */
	public function row_array($n = 0)
	{
		$result = $this->result_array();
<<<<<<< HEAD

		if (count($result) == 0)
		{
			return $result;
		}

		if ($n != $this->current_row AND isset($result[$n]))
=======
		if (count($result) === 0)
		{
			return NULL;
		}

		if ($n !== $this->current_row && isset($result[$n]))
>>>>>>> codeigniter/develop
		{
			$this->current_row = $n;
		}

		return $result[$this->current_row];
	}

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Returns the "first" row
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @return	object
	 */
	public function first_row($type = 'object')
	{
		$result = $this->result($type);
<<<<<<< HEAD

		if (count($result) == 0)
		{
			return $result;
		}
		return $result[0];
=======
		return (count($result) === 0) ? NULL : $result[0];
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the "last" row
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @return	object
	 */
	public function last_row($type = 'object')
	{
		$result = $this->result($type);
<<<<<<< HEAD

		if (count($result) == 0)
		{
			return $result;
		}
		return $result[count($result) -1];
=======
		return (count($result) === 0) ? NULL : $result[count($result) - 1];
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the "next" row
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @return	object
	 */
	public function next_row($type = 'object')
	{
		$result = $this->result($type);
<<<<<<< HEAD

		if (count($result) == 0)
		{
			return $result;
=======
		if (count($result) === 0)
		{
			return NULL;
>>>>>>> codeigniter/develop
		}

		if (isset($result[$this->current_row + 1]))
		{
			++$this->current_row;
		}

		return $result[$this->current_row];
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the "previous" row
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @return	object
	 */
	public function previous_row($type = 'object')
	{
		$result = $this->result($type);
<<<<<<< HEAD

		if (count($result) == 0)
		{
			return $result;
=======
		if (count($result) === 0)
		{
			return NULL;
>>>>>>> codeigniter/develop
		}

		if (isset($result[$this->current_row - 1]))
		{
			--$this->current_row;
		}
		return $result[$this->current_row];
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * The following functions are normally overloaded by the identically named
	 * methods in the platform-specific driver -- except when query caching
	 * is used.  When caching is enabled we do not load the other driver.
	 * These functions are primarily here to prevent undefined function errors
	 * when a cached result object is in use.  They are not otherwise fully
	 * operational due to the unavailability of the database resource IDs with
	 * cached results.
	 */
	public function num_rows() { return $this->num_rows; }
	public function num_fields() { return 0; }
	public function list_fields() { return array(); }
	public function field_data() { return array(); }
	public function free_result() { return TRUE; }
	protected function _data_seek() { return TRUE; }
=======
	 * Returns an unbuffered row and move pointer to next row
	 *
	 * @param	string	'array', 'object' or a custom class name
	 * @return	mixed	either a result object or array
	 */
	public function unbuffered_row($type = 'object')
	{
		if ($type === 'array')
		{
			return $this->_fetch_assoc();
		}
		elseif ($type === 'object')
		{
			return $this->_fetch_object();
		}

		return $this->_fetch_object($type);
	}

	// --------------------------------------------------------------------

	/**
	 * The following functions are normally overloaded by the identically named
	 * methods in the platform-specific driver -- except when query caching
	 * is used. When caching is enabled we do not load the other driver.
	 * These functions are primarily here to prevent undefined function errors
	 * when a cached result object is in use. They are not otherwise fully
	 * operational due to the unavailability of the database resource IDs with
	 * cached results.
	 */
	public function num_fields() { return 0; }
	public function list_fields() { return array(); }
	public function field_data() { return array(); }
	public function free_result() { $this->result_id = FALSE; }
	protected function _data_seek() { return FALSE; }
>>>>>>> codeigniter/develop
	protected function _fetch_assoc() { return array(); }
	protected function _fetch_object() { return array(); }

}
<<<<<<< HEAD
// END DB_result class

/* End of file DB_result.php */
/* Location: ./system/database/DB_result.php */
=======

/* End of file DB_result.php */
/* Location: ./system/database/DB_result.php */
>>>>>>> codeigniter/develop
