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
 * @link		http://codeigniter.com
 * @since		Version 2.0
 * @filesource	
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Memcached Caching Class 
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
 * @link		http://codeigniter.com
 * @since		Version 2.0
 * @filesource
 */

/**
 * CodeIgniter File Caching Class
>>>>>>> codeigniter/develop
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Core
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @link		
 */

class CI_Cache_file extends CI_Driver {

	protected $_cache_path;

	/**
	 * Constructor
=======
 * @author		EllisLab Dev Team
 * @link
 */
class CI_Cache_file extends CI_Driver {

	/**
	 * Directory in which to save cache files
	 *
	 * @var string
	 */
	protected $_cache_path;

	/**
	 * Initialize file-based cache
	 *
	 * @return	void
>>>>>>> codeigniter/develop
	 */
	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->helper('file');
<<<<<<< HEAD
		
		$path = $CI->config->item('cache_path');
	
		$this->_cache_path = ($path == '') ? APPPATH.'cache/' : $path;
=======
		$path = $CI->config->item('cache_path');
		$this->_cache_path = ($path === '') ? APPPATH.'cache/' : $path;
>>>>>>> codeigniter/develop
	}

	// ------------------------------------------------------------------------

	/**
	 * Fetch from cache
	 *
<<<<<<< HEAD
	 * @param 	mixed		unique key id
	 * @return 	mixed		data on success/false on failure
=======
	 * @param	mixed	unique key id
	 * @return	mixed	data on success/false on failure
>>>>>>> codeigniter/develop
	 */
	public function get($id)
	{
		if ( ! file_exists($this->_cache_path.$id))
		{
			return FALSE;
		}
<<<<<<< HEAD
		
		$data = read_file($this->_cache_path.$id);
		$data = unserialize($data);
		
		if (time() >  $data['time'] + $data['ttl'])
=======

		$data = unserialize(file_get_contents($this->_cache_path.$id));

		if ($data['ttl'] > 0 && time() >  $data['time'] + $data['ttl'])
>>>>>>> codeigniter/develop
		{
			unlink($this->_cache_path.$id);
			return FALSE;
		}
<<<<<<< HEAD
		
=======

>>>>>>> codeigniter/develop
		return $data['data'];
	}

	// ------------------------------------------------------------------------

	/**
	 * Save into cache
	 *
<<<<<<< HEAD
	 * @param 	string		unique key
	 * @param 	mixed		data to store
	 * @param 	int			length of time (in seconds) the cache is valid 
	 *						- Default is 60 seconds
	 * @return 	boolean		true on success/false on failure
	 */
	public function save($id, $data, $ttl = 60)
	{		
		$contents = array(
				'time'		=> time(),
				'ttl'		=> $ttl,			
				'data'		=> $data
			);
		
		if (write_file($this->_cache_path.$id, serialize($contents)))
		{
			@chmod($this->_cache_path.$id, 0777);
			return TRUE;			
=======
	 * @param	string	unique key
	 * @param	mixed	data to store
	 * @param	int	length of time (in seconds) the cache is valid
	 *				- Default is 60 seconds
	 * @return	bool	true on success/false on failure
	 */
	public function save($id, $data, $ttl = 60)
	{
		$contents = array(
			'time'		=> time(),
			'ttl'		=> $ttl,
			'data'		=> $data
		);

		if (write_file($this->_cache_path.$id, serialize($contents)))
		{
			@chmod($this->_cache_path.$id, 0660);
			return TRUE;
>>>>>>> codeigniter/develop
		}

		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Delete from Cache
	 *
<<<<<<< HEAD
	 * @param 	mixed		unique identifier of item in cache
	 * @return 	boolean		true on success/false on failure
	 */
	public function delete($id)
	{
		return unlink($this->_cache_path.$id);
=======
	 * @param	mixed	unique identifier of item in cache
	 * @return	bool	true on success/false on failure
	 */
	public function delete($id)
	{
		return file_exists($this->_cache_path.$id) ? unlink($this->_cache_path.$id) : FALSE;
>>>>>>> codeigniter/develop
	}

	// ------------------------------------------------------------------------

	/**
	 * Clean the Cache
	 *
<<<<<<< HEAD
	 * @return 	boolean		false on failure/true on success
	 */	
=======
	 * @return	bool	false on failure/true on success
	 */
>>>>>>> codeigniter/develop
	public function clean()
	{
		return delete_files($this->_cache_path);
	}

	// ------------------------------------------------------------------------

	/**
	 * Cache Info
	 *
	 * Not supported by file-based caching
	 *
<<<<<<< HEAD
	 * @param 	string	user/filehits
	 * @return 	mixed 	FALSE
=======
	 * @param	string	user/filehits
	 * @return	mixed	FALSE
>>>>>>> codeigniter/develop
	 */
	public function cache_info($type = NULL)
	{
		return get_dir_file_info($this->_cache_path);
	}

	// ------------------------------------------------------------------------

	/**
	 * Get Cache Metadata
	 *
<<<<<<< HEAD
	 * @param 	mixed		key to get cache metadata on
	 * @return 	mixed		FALSE on failure, array on success.
=======
	 * @param	mixed	key to get cache metadata on
	 * @return	mixed	FALSE on failure, array on success.
>>>>>>> codeigniter/develop
	 */
	public function get_metadata($id)
	{
		if ( ! file_exists($this->_cache_path.$id))
		{
			return FALSE;
		}
<<<<<<< HEAD
		
		$data = read_file($this->_cache_path.$id);		
		$data = unserialize($data);
		
		if (is_array($data))
		{
			$data = $data['data'];
=======

		$data = unserialize(file_get_contents($this->_cache_path.$id));

		if (is_array($data))
		{
>>>>>>> codeigniter/develop
			$mtime = filemtime($this->_cache_path.$id);

			if ( ! isset($data['ttl']))
			{
				return FALSE;
			}

			return array(
<<<<<<< HEAD
				'expire' 	=> $mtime + $data['ttl'],
				'mtime'		=> $mtime
			);
		}
		
=======
				'expire' => $mtime + $data['ttl'],
				'mtime'	 => $mtime
			);
		}

>>>>>>> codeigniter/develop
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Is supported
	 *
	 * In the file driver, check to see that the cache directory is indeed writable
<<<<<<< HEAD
	 * 
	 * @return boolean
=======
	 *
	 * @return	bool
>>>>>>> codeigniter/develop
	 */
	public function is_supported()
	{
		return is_really_writable($this->_cache_path);
	}

<<<<<<< HEAD
	// ------------------------------------------------------------------------
}
// End Class
=======
}
>>>>>>> codeigniter/develop

/* End of file Cache_file.php */
/* Location: ./system/libraries/Cache/drivers/Cache_file.php */