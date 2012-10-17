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
 * Database Cache Class
 *
 * @category	Database
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_Cache {

<<<<<<< HEAD
	var $CI;
	var $db;	// allows passing of db object so that multiple database connections and returned db objects can be supported

	/**
	 * Constructor
	 *
	 * Grabs the CI super object instance so we can access it.
	 *
	 */
	function __construct(&$db)
	{
		// Assign the main CI object to $this->CI
		// and load the file helper since we use it a lot
=======
	public $CI;
	public $db;	// allows passing of db object so that multiple database connections and returned db objects can be supported

	public function __construct(&$db)
	{
		// Assign the main CI object to $this->CI and load the file helper since we use it a lot
>>>>>>> codeigniter/develop
		$this->CI =& get_instance();
		$this->db =& $db;
		$this->CI->load->helper('file');
	}

	// --------------------------------------------------------------------

	/**
	 * Set Cache Directory Path
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the path to the cache directory
	 * @return	bool
	 */
	function check_path($path = '')
	{
		if ($path == '')
		{
			if ($this->db->cachedir == '')
=======
	 * @param	string	the path to the cache directory
	 * @return	bool
	 */
	public function check_path($path = '')
	{
		if ($path === '')
		{
			if ($this->db->cachedir === '')
>>>>>>> codeigniter/develop
			{
				return $this->db->cache_off();
			}

			$path = $this->db->cachedir;
		}

		// Add a trailing slash to the path if needed
<<<<<<< HEAD
		$path = preg_replace("/(.+?)\/*$/", "\\1/",  $path);
=======
		$path = preg_replace('/(.+?)\/*$/', '\\1/',  $path);
>>>>>>> codeigniter/develop

		if ( ! is_dir($path) OR ! is_really_writable($path))
		{
			// If the path is wrong we'll turn off caching
			return $this->db->cache_off();
		}

		$this->db->cachedir = $path;
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Retrieve a cached query
	 *
	 * The URI being requested will become the name of the cache sub-folder.
	 * An MD5 hash of the SQL statement will become the cache file name
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	string
	 */
	function read($sql)
=======
	 * @return	string
	 */
	public function read($sql)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->check_path())
		{
			return $this->db->cache_off();
		}

		$segment_one = ($this->CI->uri->segment(1) == FALSE) ? 'default' : $this->CI->uri->segment(1);
<<<<<<< HEAD

		$segment_two = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);

		$filepath = $this->db->cachedir.$segment_one.'+'.$segment_two.'/'.md5($sql);

		if (FALSE === ($cachedata = read_file($filepath)))
=======
		$segment_two = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);
		$filepath = $this->db->cachedir.$segment_one.'+'.$segment_two.'/'.md5($sql);

		if (FALSE === ($cachedata = file_get_contents($filepath)))
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		return unserialize($cachedata);
	}

	// --------------------------------------------------------------------

	/**
	 * Write a query to a cache file
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function write($sql, $object)
=======
	 * @return	bool
	 */
	public function write($sql, $object)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->check_path())
		{
			return $this->db->cache_off();
		}

		$segment_one = ($this->CI->uri->segment(1) == FALSE) ? 'default' : $this->CI->uri->segment(1);
<<<<<<< HEAD

		$segment_two = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);

		$dir_path = $this->db->cachedir.$segment_one.'+'.$segment_two.'/';

=======
		$segment_two = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);
		$dir_path = $this->db->cachedir.$segment_one.'+'.$segment_two.'/';
>>>>>>> codeigniter/develop
		$filename = md5($sql);

		if ( ! @is_dir($dir_path))
		{
			if ( ! @mkdir($dir_path, DIR_WRITE_MODE))
			{
				return FALSE;
			}

			@chmod($dir_path, DIR_WRITE_MODE);
		}

		if (write_file($dir_path.$filename, serialize($object)) === FALSE)
		{
			return FALSE;
		}

		@chmod($dir_path.$filename, FILE_WRITE_MODE);
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Delete cache files within a particular directory
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function delete($segment_one = '', $segment_two = '')
	{
		if ($segment_one == '')
=======
	 * @return	bool
	 */
	public function delete($segment_one = '', $segment_two = '')
	{
		if ($segment_one === '')
>>>>>>> codeigniter/develop
		{
			$segment_one  = ($this->CI->uri->segment(1) == FALSE) ? 'default' : $this->CI->uri->segment(1);
		}

<<<<<<< HEAD
		if ($segment_two == '')
=======
		if ($segment_two === '')
>>>>>>> codeigniter/develop
		{
			$segment_two = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);
		}

		$dir_path = $this->db->cachedir.$segment_one.'+'.$segment_two.'/';
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		delete_files($dir_path, TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Delete all existing cache files
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function delete_all()
	{
		delete_files($this->db->cachedir, TRUE);
=======
	 * @return	bool
	 */
	public function delete_all()
	{
		delete_files($this->db->cachedir, TRUE, 0, TRUE);
>>>>>>> codeigniter/develop
	}

}

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
/* End of file DB_cache.php */
/* Location: ./system/database/DB_cache.php */