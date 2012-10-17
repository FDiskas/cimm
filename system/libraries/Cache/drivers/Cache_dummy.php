<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
<<<<<<< HEAD
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2006 - 2012 EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
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
 * @copyright	Copyright (c) 2006 - 2012 EllisLab, Inc.
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com
 * @since		Version 2.0
 * @filesource
 */

<<<<<<< HEAD
// ------------------------------------------------------------------------

=======
>>>>>>> codeigniter/develop
/**
 * CodeIgniter Dummy Caching Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Core
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @link
 */

=======
 * @author		EllisLab Dev Team
 * @link
 */
>>>>>>> codeigniter/develop
class CI_Cache_dummy extends CI_Driver {

	/**
	 * Get
	 *
	 * Since this is the dummy class, it's always going to return FALSE.
	 *
<<<<<<< HEAD
	 * @param 	string
	 * @return 	Boolean		FALSE
=======
	 * @param	string
	 * @return	bool	FALSE
>>>>>>> codeigniter/develop
	 */
	public function get($id)
	{
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Cache Save
	 *
<<<<<<< HEAD
	 * @param 	string		Unique Key
	 * @param 	mixed		Data to store
	 * @param 	int			Length of time (in seconds) to cache the data
	 *
	 * @return 	boolean		TRUE, Simulating success
=======
	 * @param	string	Unique Key
	 * @param	mixed	Data to store
	 * @param	int	Length of time (in seconds) to cache the data
	 * @return	bool	TRUE, Simulating success
>>>>>>> codeigniter/develop
	 */
	public function save($id, $data, $ttl = 60)
	{
		return TRUE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Delete from Cache
	 *
<<<<<<< HEAD
	 * @param 	mixed		unique identifier of the item in the cache
	 * @param 	boolean		TRUE, simulating success
=======
	 * @param	mixed	unique identifier of the item in the cache
	 * @return	bool	TRUE, simulating success
>>>>>>> codeigniter/develop
	 */
	public function delete($id)
	{
		return TRUE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Clean the cache
	 *
<<<<<<< HEAD
	 * @return 	boolean		TRUE, simulating success
=======
	 * @return	bool	TRUE, simulating success
>>>>>>> codeigniter/develop
	 */
	public function clean()
	{
		return TRUE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Cache Info
	 *
<<<<<<< HEAD
	 * @param 	string		user/filehits
	 * @return 	boolean		FALSE
=======
	 * @param	string	user/filehits
	 * @return	bool	FALSE
>>>>>>> codeigniter/develop
	 */
	 public function cache_info($type = NULL)
	 {
		 return FALSE;
	 }

	// ------------------------------------------------------------------------

	/**
	 * Get Cache Metadata
	 *
<<<<<<< HEAD
	 * @param 	mixed		key to get cache metadata on
	 * @return 	boolean		FALSE
=======
	 * @param	mixed	key to get cache metadata on
	 * @return	bool	FALSE
>>>>>>> codeigniter/develop
	 */
	public function get_metadata($id)
	{
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Is this caching driver supported on the system?
	 * Of course this one is.
	 *
<<<<<<< HEAD
	 * @return TRUE;
=======
	 * @return	bool	TRUE
>>>>>>> codeigniter/develop
	 */
	public function is_supported()
	{
		return TRUE;
	}

<<<<<<< HEAD
	// ------------------------------------------------------------------------

}
// End Class
=======
}
>>>>>>> codeigniter/develop

/* End of file Cache_dummy.php */
/* Location: ./system/libraries/Cache/drivers/Cache_dummy.php */