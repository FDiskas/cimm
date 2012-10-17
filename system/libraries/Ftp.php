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
 * FTP Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/libraries/ftp.html
 */
class CI_FTP {

<<<<<<< HEAD
	var $hostname	= '';
	var $username	= '';
	var $password	= '';
	var $port		= 21;
	var $passive	= TRUE;
	var $debug		= FALSE;
	var $conn_id	= FALSE;


	/**
	 * Constructor - Sets Preferences
	 *
	 * The constructor can be passed an array of config values
	 */
=======
	public $hostname	= '';
	public $username	= '';
	public $password	= '';
	public $port		= 21;
	public $passive		= TRUE;
	public $debug		= FALSE;
	public $conn_id		= FALSE;

>>>>>>> codeigniter/develop
	public function __construct($config = array())
	{
		if (count($config) > 0)
		{
			$this->initialize($config);
		}

<<<<<<< HEAD
		log_message('debug', "FTP Class Initialized");
=======
		log_message('debug', 'FTP Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize preferences
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function initialize($config = array())
=======
	 * @param	array
	 * @return	void
	 */
	public function initialize($config = array())
>>>>>>> codeigniter/develop
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}

		// Prep the hostname
		$this->hostname = preg_replace('|.+?://|', '', $this->hostname);
	}

	// --------------------------------------------------------------------

	/**
	 * FTP Connect
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	array	 the connection values
	 * @return	bool
	 */
	function connect($config = array())
=======
	 * @param	array	 the connection values
	 * @return	bool
	 */
	public function connect($config = array())
>>>>>>> codeigniter/develop
	{
		if (count($config) > 0)
		{
			$this->initialize($config);
		}

		if (FALSE === ($this->conn_id = @ftp_connect($this->hostname, $this->port)))
		{
<<<<<<< HEAD
			if ($this->debug == TRUE)
=======
			if ($this->debug === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_unable_to_connect');
			}
			return FALSE;
		}

		if ( ! $this->_login())
		{
<<<<<<< HEAD
			if ($this->debug == TRUE)
=======
			if ($this->debug === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_unable_to_login');
			}
			return FALSE;
		}

		// Set passive mode if needed
<<<<<<< HEAD
		if ($this->passive == TRUE)
=======
		if ($this->passive === TRUE)
>>>>>>> codeigniter/develop
		{
			ftp_pasv($this->conn_id, TRUE);
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * FTP Login
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	bool
	 */
	function _login()
=======
	 * @return	bool
	 */
	protected function _login()
>>>>>>> codeigniter/develop
	{
		return @ftp_login($this->conn_id, $this->username, $this->password);
	}

	// --------------------------------------------------------------------

	/**
	 * Validates the connection ID
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	bool
	 */
	function _is_conn()
	{
		if ( ! is_resource($this->conn_id))
		{
			if ($this->debug == TRUE)
=======
	 * @return	bool
	 */
	protected function _is_conn()
	{
		if ( ! is_resource($this->conn_id))
		{
			if ($this->debug === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_no_connection');
			}
			return FALSE;
		}
		return TRUE;
	}

	// --------------------------------------------------------------------

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
	/**
	 * Change directory
	 *
	 * The second parameter lets us momentarily turn off debugging so that
	 * this function can be used to test for the existence of a folder
<<<<<<< HEAD
	 * without throwing an error.  There's no FTP equivalent to is_dir()
	 * so we do it by trying to change to a particular directory.
	 * Internally, this parameter is only used by the "mirror" function below.
	 *
	 * @access	public
=======
	 * without throwing an error. There's no FTP equivalent to is_dir()
	 * so we do it by trying to change to a particular directory.
	 * Internally, this parameter is only used by the "mirror" function below.
	 *
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
<<<<<<< HEAD
	function changedir($path = '', $supress_debug = FALSE)
	{
		if ($path == '' OR ! $this->_is_conn())
=======
	public function changedir($path = '', $supress_debug = FALSE)
	{
		if ($path === '' OR ! $this->_is_conn())
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		$result = @ftp_chdir($this->conn_id, $path);

		if ($result === FALSE)
		{
<<<<<<< HEAD
			if ($this->debug == TRUE AND $supress_debug == FALSE)
=======
			if ($this->debug === TRUE && $supress_debug === FALSE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_unable_to_changedir');
			}
			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Create a directory
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function mkdir($path = '', $permissions = NULL)
	{
		if ($path == '' OR ! $this->_is_conn())
=======
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	public function mkdir($path = '', $permissions = NULL)
	{
		if ($path === '' OR ! $this->_is_conn())
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		$result = @ftp_mkdir($this->conn_id, $path);

		if ($result === FALSE)
		{
<<<<<<< HEAD
			if ($this->debug == TRUE)
=======
			if ($this->debug === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_unable_to_makdir');
			}
			return FALSE;
		}

		// Set file permissions if needed
		if ( ! is_null($permissions))
		{
<<<<<<< HEAD
			$this->chmod($path, (int)$permissions);
=======
			$this->chmod($path, (int) $permissions);
>>>>>>> codeigniter/develop
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Upload a file to the server
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function upload($locpath, $rempath, $mode = 'auto', $permissions = NULL)
=======
	 * @param	string
	 * @param	string
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	public function upload($locpath, $rempath, $mode = 'auto', $permissions = NULL)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		if ( ! file_exists($locpath))
		{
			$this->_error('ftp_no_source_file');
			return FALSE;
		}

		// Set the mode if not specified
<<<<<<< HEAD
		if ($mode == 'auto')
=======
		if ($mode === 'auto')
>>>>>>> codeigniter/develop
		{
			// Get the file extension so we can set the upload type
			$ext = $this->_getext($locpath);
			$mode = $this->_settype($ext);
		}

<<<<<<< HEAD
		$mode = ($mode == 'ascii') ? FTP_ASCII : FTP_BINARY;
=======
		$mode = ($mode === 'ascii') ? FTP_ASCII : FTP_BINARY;
>>>>>>> codeigniter/develop

		$result = @ftp_put($this->conn_id, $rempath, $locpath, $mode);

		if ($result === FALSE)
		{
<<<<<<< HEAD
			if ($this->debug == TRUE)
=======
			if ($this->debug === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_unable_to_upload');
			}
			return FALSE;
		}

		// Set file permissions if needed
		if ( ! is_null($permissions))
		{
<<<<<<< HEAD
			$this->chmod($rempath, (int)$permissions);
=======
			$this->chmod($rempath, (int) $permissions);
>>>>>>> codeigniter/develop
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Download a file from a remote server to the local server
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
<<<<<<< HEAD
	function download($rempath, $locpath, $mode = 'auto')
=======
	public function download($rempath, $locpath, $mode = 'auto')
>>>>>>> codeigniter/develop
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		// Set the mode if not specified
<<<<<<< HEAD
		if ($mode == 'auto')
=======
		if ($mode === 'auto')
>>>>>>> codeigniter/develop
		{
			// Get the file extension so we can set the upload type
			$ext = $this->_getext($rempath);
			$mode = $this->_settype($ext);
		}

<<<<<<< HEAD
		$mode = ($mode == 'ascii') ? FTP_ASCII : FTP_BINARY;
=======
		$mode = ($mode === 'ascii') ? FTP_ASCII : FTP_BINARY;
>>>>>>> codeigniter/develop

		$result = @ftp_get($this->conn_id, $locpath, $rempath, $mode);

		if ($result === FALSE)
		{
<<<<<<< HEAD
			if ($this->debug == TRUE)
=======
			if ($this->debug === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_unable_to_download');
			}
			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Rename (or move) a file
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
<<<<<<< HEAD
	function rename($old_file, $new_file, $move = FALSE)
=======
	public function rename($old_file, $new_file, $move = FALSE)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		$result = @ftp_rename($this->conn_id, $old_file, $new_file);

		if ($result === FALSE)
		{
<<<<<<< HEAD
			if ($this->debug == TRUE)
			{
				$msg = ($move == FALSE) ? 'ftp_unable_to_rename' : 'ftp_unable_to_move';

				$this->_error($msg);
=======
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_' . ($move === FALSE ? 'rename' : 'move'));
>>>>>>> codeigniter/develop
			}
			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Move a file
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
<<<<<<< HEAD
	function move($old_file, $new_file)
=======
	public function move($old_file, $new_file)
>>>>>>> codeigniter/develop
	{
		return $this->rename($old_file, $new_file, TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Rename (or move) a file
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function delete_file($filepath)
=======
	 * @param	string
	 * @return	bool
	 */
	public function delete_file($filepath)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		$result = @ftp_delete($this->conn_id, $filepath);

		if ($result === FALSE)
		{
<<<<<<< HEAD
			if ($this->debug == TRUE)
=======
			if ($this->debug === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_unable_to_delete');
			}
			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Delete a folder and recursively delete everything (including sub-folders)
	 * containted within it.
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function delete_dir($filepath)
=======
	 * @param	string
	 * @return	bool
	 */
	public function delete_dir($filepath)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		// Add a trailing slash to the file path if needed
<<<<<<< HEAD
		$filepath = preg_replace("/(.+?)\/*$/", "\\1/",  $filepath);

		$list = $this->list_files($filepath);

		if ($list !== FALSE AND count($list) > 0)
=======
		$filepath = preg_replace('/(.+?)\/*$/', '\\1/',  $filepath);

		$list = $this->list_files($filepath);

		if ($list !== FALSE && count($list) > 0)
>>>>>>> codeigniter/develop
		{
			foreach ($list as $item)
			{
				// If we can't delete the item it's probaly a folder so
				// we'll recursively call delete_dir()
				if ( ! @ftp_delete($this->conn_id, $item))
				{
					$this->delete_dir($item);
				}
			}
		}

		$result = @ftp_rmdir($this->conn_id, $filepath);

		if ($result === FALSE)
		{
<<<<<<< HEAD
			if ($this->debug == TRUE)
=======
			if ($this->debug === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_unable_to_delete');
			}
			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Set file permissions
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the file path
	 * @param	string	the permissions
	 * @return	bool
	 */
	function chmod($path, $perm)
=======
	 * @param	string	the file path
	 * @param	int	the permissions
	 * @return	bool
	 */
	public function chmod($path, $perm)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

<<<<<<< HEAD
		// Permissions can only be set when running PHP 5
		if ( ! function_exists('ftp_chmod'))
		{
			if ($this->debug == TRUE)
			{
				$this->_error('ftp_unable_to_chmod');
			}
			return FALSE;
		}

=======
>>>>>>> codeigniter/develop
		$result = @ftp_chmod($this->conn_id, $perm, $path);

		if ($result === FALSE)
		{
<<<<<<< HEAD
			if ($this->debug == TRUE)
=======
			if ($this->debug === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->_error('ftp_unable_to_chmod');
			}
			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * FTP List files in the specified directory
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	array
	 */
	function list_files($path = '.')
=======
	 * @return	array
	 */
	public function list_files($path = '.')
>>>>>>> codeigniter/develop
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		return ftp_nlist($this->conn_id, $path);
	}

	// ------------------------------------------------------------------------

	/**
	 * Read a directory and recreate it remotely
	 *
<<<<<<< HEAD
	 * This function recursively reads a folder and everything it contains (including
	 * sub-folders) and creates a mirror via FTP based on it.  Whatever the directory structure
	 * of the original file path will be recreated on the server.
	 *
	 * @access	public
=======
	 * This function recursively reads a folder and everything it contains
	 * (including sub-folders) and creates a mirror via FTP based on it.
	 * Whatever the directory structure of the original file path will be
	 * recreated on the server.
	 *
>>>>>>> codeigniter/develop
	 * @param	string	path to source with trailing slash
	 * @param	string	path to destination - include the base folder with trailing slash
	 * @return	bool
	 */
<<<<<<< HEAD
	function mirror($locpath, $rempath)
=======
	public function mirror($locpath, $rempath)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		// Open the local file path
		if ($fp = @opendir($locpath))
		{
<<<<<<< HEAD
			// Attempt to open the remote file path.
			if ( ! $this->changedir($rempath, TRUE))
			{
				// If it doesn't exist we'll attempt to create the direcotory
				if ( ! $this->mkdir($rempath) OR ! $this->changedir($rempath))
				{
					return FALSE;
				}
=======
			// Attempt to open the remote file path and try to create it, if it doesn't exist
			if ( ! $this->changedir($rempath, TRUE) && ( ! $this->mkdir($rempath) OR ! $this->changedir($rempath)))
			{
				return FALSE;
>>>>>>> codeigniter/develop
			}

			// Recursively read the local directory
			while (FALSE !== ($file = readdir($fp)))
			{
<<<<<<< HEAD
				if (@is_dir($locpath.$file) && substr($file, 0, 1) != '.')
				{
					$this->mirror($locpath.$file."/", $rempath.$file."/");
				}
				elseif (substr($file, 0, 1) != ".")
=======
				if (@is_dir($locpath.$file) && $file[0] !== '.')
				{
					$this->mirror($locpath.$file.'/', $rempath.$file.'/');
				}
				elseif ($file[0] !== '.')
>>>>>>> codeigniter/develop
				{
					// Get the file extension so we can se the upload type
					$ext = $this->_getext($file);
					$mode = $this->_settype($ext);

					$this->upload($locpath.$file, $rempath.$file, $mode);
				}
			}
			return TRUE;
		}

		return FALSE;
	}

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Extract the file extension
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string
	 * @return	string
	 */
	function _getext($filename)
=======
	 * @param	string
	 * @return	string
	 */
	protected function _getext($filename)
>>>>>>> codeigniter/develop
	{
		if (FALSE === strpos($filename, '.'))
		{
			return 'txt';
		}

		$x = explode('.', $filename);
		return end($x);
	}

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Set the upload type
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string
	 * @return	string
	 */
	function _settype($ext)
	{
		$text_types = array(
							'txt',
							'text',
							'php',
							'phps',
							'php4',
							'js',
							'css',
							'htm',
							'html',
							'phtml',
							'shtml',
							'log',
							'xml'
							);


		return (in_array($ext, $text_types)) ? 'ascii' : 'binary';
=======
	 * @param	string
	 * @return	string
	 */
	protected function _settype($ext)
	{
		$text_types = array(
					'txt',
					'text',
					'php',
					'phps',
					'php4',
					'js',
					'css',
					'htm',
					'html',
					'phtml',
					'shtml',
					'log',
					'xml'
				);


		return in_array($ext, $text_types) ? 'ascii' : 'binary';
>>>>>>> codeigniter/develop
	}

	// ------------------------------------------------------------------------

	/**
	 * Close the connection
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	path to source
	 * @param	string	path to destination
	 * @return	bool
	 */
	function close()
=======
	 * @return	bool
	 */
	public function close()
>>>>>>> codeigniter/develop
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

<<<<<<< HEAD
		@ftp_close($this->conn_id);
=======
		return @ftp_close($this->conn_id);
>>>>>>> codeigniter/develop
	}

	// ------------------------------------------------------------------------

	/**
	 * Display error message
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string
	 * @return	bool
	 */
	function _error($line)
=======
	 * @param	string
	 * @return	void
	 */
	protected function _error($line)
>>>>>>> codeigniter/develop
	{
		$CI =& get_instance();
		$CI->lang->load('ftp');
		show_error($CI->lang->line($line));
	}

<<<<<<< HEAD

}
// END FTP Class
=======
}
>>>>>>> codeigniter/develop

/* End of file Ftp.php */
/* Location: ./system/libraries/Ftp.php */