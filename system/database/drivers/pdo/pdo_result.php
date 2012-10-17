<<<<<<< HEAD
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com
 * @since		Version 2.1.2
 * @filesource
 */

// ------------------------------------------------------------------------

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
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

>>>>>>> codeigniter/develop
/**
 * PDO Result Class
 *
 * This class extends the parent result class: CI_DB_result
 *
 * @category	Database
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/database/
<<<<<<< HEAD
=======
 * @since	2.1
>>>>>>> codeigniter/develop
 */
class CI_DB_pdo_result extends CI_DB_result {

	/**
	 * Number of rows in the result set
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	integer
	 */
	function num_rows()
	{
		if (is_numeric(stripos($this->result_id->queryString, 'SELECT')))
		{
			$dbh = $this->conn_id;
			$query = $dbh->query($this->result_id->queryString);
			$result = $query->fetchAll();
			unset($dbh, $query);
			return count($result);
		}
		else
		{
			return $this->result_id->rowCount();	
		}
=======
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
		elseif (($num_rows = $this->result_id->rowCount()) > 0)
		{
			return $this->num_rows = $num_rows;
		}

		return $this->num_rows = count($this->result_array());
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Number of fields in the result set
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	integer
	 */
	function num_fields()
=======
	 * @return	int
	 */
	public function num_fields()
>>>>>>> codeigniter/develop
	{
		return $this->result_id->columnCount();
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch Field Names
	 *
	 * Generates an array of column names
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	array
	 */
	function list_fields()
	{
		if ($this->db->db_debug)
		{
			return $this->db->display_error('db_unsuported_feature');
		}
		return FALSE;
=======
	 * @return	bool
	 */
	public function list_fields()
	{
		$field_names = array();
		for ($i = 0, $c = $this->num_fields(); $i < $c; $i++)
		{
			$field_names[$i] = @$this->result_id->getColumnMeta();
			$field_names[$i] = $field_names[$i]['name'];
		}

		return $field_names;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Field data
	 *
	 * Generates an array of objects containing field meta-data
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	array
	 */
	function field_data()
	{
		$data = array();
	
		try
		{
			for($i = 0; $i < $this->num_fields(); $i++)
			{
				$data[] = $this->result_id->getColumnMeta($i);
			}
			
=======
	 * @return	array
	 */
	public function field_data()
	{
		$data = array();

		try
		{
			if (strpos($this->result_id->queryString, 'PRAGMA') !== FALSE)
			{
				foreach ($this->result_array() as $field)
				{
					preg_match('/([a-zA-Z]+)(\(\d+\))?/', $field['type'], $matches);

					$F		= new stdClass();
					$F->name	= $field['name'];
					$F->type	= ( ! empty($matches[1])) ? $matches[1] : NULL;
					$F->default	= NULL;
					$F->max_length	= ( ! empty($matches[2])) ? preg_replace('/[^\d]/', '', $matches[2]) : NULL;
					$F->primary_key = (int) $field['pk'];
					$F->pdo_type	= NULL;

					$data[] = $F;
				}
			}
			else
			{
				for($i = 0, $max = $this->num_fields(); $i < $max; $i++)
				{
					$field = $this->result_id->getColumnMeta($i);

					$F		= new stdClass();
					$F->name	= $field['name'];
					$F->type	= $field['native_type'];
					$F->default	= NULL;
					$F->pdo_type	= $field['pdo_type'];

					if ($field['precision'] < 0)
					{
						$F->max_length	= NULL;
						$F->primary_key = 0;
					}
					else
					{
						$F->max_length	= ($field['len'] > 255) ? 0 : $field['len'];
						$F->primary_key = (int) ( ! empty($field['flags']) && in_array('primary_key', $field['flags']));
					}

					$data[] = $F;
				}
			}

>>>>>>> codeigniter/develop
			return $data;
		}
		catch (Exception $e)
		{
			if ($this->db->db_debug)
			{
				return $this->db->display_error('db_unsuported_feature');
			}
<<<<<<< HEAD
=======

>>>>>>> codeigniter/develop
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Free the result
	 *
<<<<<<< HEAD
	 * @return	null
	 */
	function free_result()
=======
	 * @return	void
	 */
	public function free_result()
>>>>>>> codeigniter/develop
	{
		if (is_object($this->result_id))
		{
			$this->result_id = FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Data Seek
	 *
	 * Moves the internal pointer to the desired offset.  We call
	 * this internally before fetching results to make sure the
	 * result set starts at zero
	 *
	 * @access	private
	 * @return	array
	 */
	function _data_seek($n = 0)
	{
		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
=======
>>>>>>> codeigniter/develop
	 * Result - associative array
	 *
	 * Returns the result set as an array
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	array
	 */
	function _fetch_assoc()
=======
	 * @return	array
	 */
	protected function _fetch_assoc()
>>>>>>> codeigniter/develop
	{
		return $this->result_id->fetch(PDO::FETCH_ASSOC);
	}

	// --------------------------------------------------------------------

	/**
	 * Result - object
	 *
	 * Returns the result set as an object
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	object
	 */
	function _fetch_object()
	{	
		return $this->result_id->fetchObject();
=======
	 * @param	string
	 * @return	object
	 */
	protected function _fetch_object($class_name = 'stdClass')
	{
		return $this->result_id->fetchObject($class_name);
>>>>>>> codeigniter/develop
	}

}

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
/* End of file pdo_result.php */
/* Location: ./system/database/drivers/pdo/pdo_result.php */