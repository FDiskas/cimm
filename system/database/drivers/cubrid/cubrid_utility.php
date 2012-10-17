<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
<<<<<<< HEAD
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Esen Sagynov
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

=======
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
 * @since		Version 2.1
 * @filesource
 */

>>>>>>> codeigniter/develop
/**
 * CUBRID Utility Class
 *
 * @category	Database
 * @author		Esen Sagynov
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_cubrid_utility extends CI_DB_utility {

	/**
	 * List databases
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	array
	 */
	function _list_databases()
	{
		// CUBRID does not allow to see the list of all databases on the
		// server. It is the way its architecture is designed. Every
		// database is independent and isolated.
		// For this reason we can return only the name of the currect
		// connected database.
		if ($this->conn_id)
		{
			return "SELECT '" . $this->database . "'";
		}
		else
		{
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Optimize table query
	 *
	 * Generates a platform-specific query so that a table can be optimized
	 *
	 * @access	private
	 * @param	string	the table name
	 * @return	object
	 * @link 	http://www.cubrid.org/manual/840/en/Optimize%20Database
	 */
	function _optimize_table($table)
	{
		// No SQL based support in CUBRID as of version 8.4.0. Database or
		// table optimization can be performed using CUBRID Manager
		// database administration tool. See the link above for more info.
		return FALSE;
=======
	 * @return	array
	 */
	public function list_databases()
	{
		if (isset($this->db->data_cache['db_names']))
		{
			return $this->db->data_cache['db_names'];
		}

		return $this->db->data_cache['db_names'] = cubrid_list_dbs($this->db->conn_id);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Repair table query
	 *
	 * Generates a platform-specific query so that a table can be repaired
	 *
	 * @access	private
	 * @param	string	the table name
	 * @return	object
	 * @link 	http://www.cubrid.org/manual/840/en/Checking%20Database%20Consistency
	 */
	function _repair_table($table)
	{
		// Not supported in CUBRID as of version 8.4.0. Database or
		// table consistency can be checked using CUBRID Manager
		// database administration tool. See the link above for more info.
		return FALSE;
	}

	// --------------------------------------------------------------------
	/**
	 * CUBRID Export
	 *
	 * @access	private
	 * @param	array	Preferences
	 * @return	mixed
	 */
	function _backup($params = array())
=======
	 * CUBRID Export
	 *
	 * @param	array	Preferences
	 * @return	mixed
	 */
	protected function _backup($params = array())
>>>>>>> codeigniter/develop
	{
		// No SQL based support in CUBRID as of version 8.4.0. Database or
		// table backup can be performed using CUBRID Manager
		// database administration tool.
		return $this->db->display_error('db_unsuported_feature');
	}
}

/* End of file cubrid_utility.php */
/* Location: ./system/database/drivers/cubrid/cubrid_utility.php */