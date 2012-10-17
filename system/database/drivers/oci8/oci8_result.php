<<<<<<< HEAD
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright   Copyright (c) 2008 - 2011, EllisLab, Inc.
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
 * @copyright   Copyright (c) 2008 - 2012, EllisLab, Inc. (http://ellislab.com/)
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
 * oci8 Result Class
 *
 * This class extends the parent result class: CI_DB_result
 *
 * @category	Database
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_oci8_result extends CI_DB_result {

	var $stmt_id;
	var $curs_id;
	var $limit_used;

	/**
	 * Number of rows in the result set.
	 *
	 * Oracle doesn't have a graceful way to retun the number of rows
	 * so we have to use what amounts to a hack.
	 *
	 *
	 * @access  public
	 * @return  integer
	 */
	public function num_rows()
	{
		if ($this->num_rows === 0 && count($this->result_array()) > 0)
		{
			$this->num_rows = count($this->result_array());
			@oci_execute($this->stmt_id);

			if ($this->curs_id)
			{
				@oci_execute($this->curs_id);
			}
		}

		return $rowcount;
=======
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 * @since	1.4.1
 */
class CI_DB_oci8_result extends CI_DB_result {

	public $stmt_id;
	public $curs_id;
	public $limit_used;
	public $commit_mode;

	/**
	 * Constructor
	 *
	 * @param	object
	 * @return	void
	 */
	public function __construct(&$driver_object)
	{
		parent::__construct($driver_object);

		$this->stmt_id = $driver_object->stmt_id;
		$this->curs_id = $driver_object->curs_id;
		$this->limit_used = $driver_object->limit_used;
		$this->commit_mode =& $driver_object->commit_mode;
		$driver_object->stmt_id = FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Number of fields in the result set
	 *
<<<<<<< HEAD
	 * @access  public
	 * @return  integer
=======
	 * @return	int
>>>>>>> codeigniter/develop
	 */
	public function num_fields()
	{
		$count = @oci_num_fields($this->stmt_id);

		// if we used a limit we subtract it
<<<<<<< HEAD
		if ($this->limit_used)
		{
			$count = $count - 1;
		}

		return $count;
=======
		return ($this->limit_used) ? $count - 1 : $count;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch Field Names
	 *
	 * Generates an array of column names
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @return	array
	 */
	public function list_fields()
	{
		$field_names = array();
		for ($c = 1, $fieldCount = $this->num_fields(); $c <= $fieldCount; $c++)
		{
			$field_names[] = oci_field_name($this->stmt_id, $c);
		}
		return $field_names;
	}

	// --------------------------------------------------------------------

	/**
	 * Field data
	 *
	 * Generates an array of objects containing field meta-data
	 *
<<<<<<< HEAD
	 * @access  public
	 * @return  array
=======
	 * @return	array
>>>>>>> codeigniter/develop
	 */
	public function field_data()
	{
		$retval = array();
		for ($c = 1, $fieldCount = $this->num_fields(); $c <= $fieldCount; $c++)
		{
<<<<<<< HEAD
			$F			= new stdClass();
			$F->name		= oci_field_name($this->stmt_id, $c);
			$F->type		= oci_field_type($this->stmt_id, $c);
			$F->max_length		= oci_field_size($this->stmt_id, $c);
=======
			$F		= new stdClass();
			$F->name	= oci_field_name($this->stmt_id, $c);
			$F->type	= oci_field_type($this->stmt_id, $c);
			$F->max_length	= oci_field_size($this->stmt_id, $c);
>>>>>>> codeigniter/develop

			$retval[] = $F;
		}

		return $retval;
	}

	// --------------------------------------------------------------------

	/**
	 * Free the result
	 *
<<<<<<< HEAD
	 * @return	null
=======
	 * @return	void
>>>>>>> codeigniter/develop
	 */
	public function free_result()
	{
		if (is_resource($this->result_id))
		{
			oci_free_statement($this->result_id);
			$this->result_id = FALSE;
		}
<<<<<<< HEAD
=======

		if (is_resource($this->stmt_id))
		{
			oci_free_statement($this->stmt_id);
		}

		if (is_resource($this->curs_id))
		{
			oci_cancel($this->curs_id);
			$this->curs_id = NULL;
		}
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Result - associative array
	 *
	 * Returns the result set as an array
	 *
<<<<<<< HEAD
	 * @access  protected
	 * @return  array
=======
	 * @return	array
>>>>>>> codeigniter/develop
	 */
	protected function _fetch_assoc()
	{
		$id = ($this->curs_id) ? $this->curs_id : $this->stmt_id;
		return oci_fetch_assoc($id);
	}

	// --------------------------------------------------------------------

	/**
	 * Result - object
	 *
	 * Returns the result set as an object
	 *
<<<<<<< HEAD
	 * @access  protected
	 * @return  object
	 */
	protected function _fetch_object()
	{
		$id = ($this->curs_id) ? $this->curs_id : $this->stmt_id;
		return @oci_fetch_object($id);
	}

	// --------------------------------------------------------------------

	/**
	 * Query result.  "array" version.
	 *
	 * @access  public
	 * @return  array
	 */
	public function result_array()
	{
		if (count($this->result_array) > 0)
		{
			return $this->result_array;
		}

		$row = NULL;
		while ($row = $this->_fetch_assoc())
		{
			$this->result_array[] = $row;
		}

		return $this->result_array;
=======
	 * @param	string
	 * @return	object
	 */
	protected function _fetch_object($class_name = 'stdClass')
	{
		$row = ($this->curs_id)
			? oci_fetch_object($this->curs_id)
			: oci_fetch_object($this->stmt_id);

		if ($class_name === 'stdClass' OR ! $row)
		{
			return $row;
		}

		$class_name = new $class_name();
		foreach ($row as $key => $value)
		{
			$class_name->$key = $value;
		}

		return $class_name;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Data Seek
	 *
<<<<<<< HEAD
	 * Moves the internal pointer to the desired offset.  We call
	 * this internally before fetching results to make sure the
	 * result set starts at zero
	 *
	 * @access	protected
	 * @return	array
	 */
	protected function _data_seek($n = 0)
	{
		return FALSE; // Not needed
=======
	 * Moves the internal pointer to the desired offset. We call
	 * this internally before fetching results to make sure the
	 * result set starts at zero.
	 *
	 * Oracle's PHP extension doesn't have an easy way of doing this
	 * and the only workaround is to (re)execute the statement or cursor
	 * in order to go to the first (zero) index of the result set.
	 * Then, we would need to "dummy" fetch ($n - 1) rows to get to the
	 * right one.
	 *
	 * This is as ridiculous as it sounds and it's the reason why every
	 * other method that is fetching data tries to use an already "cached"
	 * result set. Keeping this just in case it becomes needed at
	 * some point in the future, but it will only work for resetting the
	 * pointer to zero.
	 *
	 * @return	bool
	 */
	protected function _data_seek()
	{
		/* The PHP manual says that if OCI_NO_AUTO_COMMIT mode
		 * is used, and oci_rollback() and/or oci_commit() are
		 * not subsequently called - this will cause an unnecessary
		 * rollback to be triggered at the end of the script execution.
		 *
		 * Therefore we'll try to avoid using that mode flag
		 * if we're not currently in the middle of a transaction.
		 */
		if ($this->commit_mode !== OCI_COMMIT_ON_SUCCESS)
		{
			$result = @oci_execute($this->stmt_id, $this->commit_mode);
		}
		else
		{
			$result = @oci_execute($this->stmt_id);
		}

		if ($result && $this->curs_id)
		{
			if ($this->commit_mode !== OCI_COMMIT_ON_SUCCESS)
			{
				return @oci_execute($this->curs_id, $this->commit_mode);
			}
			else
			{
				return @oci_execute($this->curs_id);
			}
		}

		return $result;
>>>>>>> codeigniter/develop
	}

}

<<<<<<< HEAD

/* End of file oci8_result.php */
/* Location: ./system/database/drivers/oci8/oci8_result.php */
=======
/* End of file oci8_result.php */
/* Location: ./system/database/drivers/oci8/oci8_result.php */
>>>>>>> codeigniter/develop
