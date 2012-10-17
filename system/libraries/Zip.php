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
 * Zip Compression Class
 *
 * This class is based on a library I found at Zend:
 * http://www.zend.com/codex.php?id=696&single=1
 *
 * The original library is a little rough around the edges so I
 * refactored it and added several additional methods -- Rick Ellis
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Encryption
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/zip.html
 */
class CI_Zip  {

	var $zipdata	= '';
	var $directory	= '';
	var $entries	= 0;
	var $file_num	= 0;
	var $offset		= 0;
	var $now;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		log_message('debug', "Zip Compression Class Initialized");

		$this->now = time();
=======
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/zip.html
 */
class CI_Zip {

	/**
	 * Zip data in string form
	 *
	 * @var string
	 */
	public $zipdata		= '';

	/**
	 * Zip data for a directory in string form
	 *
	 * @var string
	 */
	public $directory	= '';

	/**
	 * Number of files/folder in zip file
	 *
	 * @var int
	 */
	public $entries		= 0;

	/**
	 * Number of files in zip
	 *
	 * @var int
	 */
	public $file_num	= 0;

	/**
	 * relative offset of local header
	 *
	 * @var int
	 */
	public $offset		= 0;

	/**
	 * Reference to time at init
	 *
	 * @var int
	 */
	public $now;

	/**
	 * Initialize zip compression class
	 *
	 * @return	void
	 */
	public function __construct()
	{
		$this->now = time();
		log_message('debug', 'Zip Compression Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Add Directory
	 *
	 * Lets you add a virtual directory into which you can place files.
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed	the directory name. Can be string or array
	 * @return	void
	 */
	function add_dir($directory)
	{
		foreach ((array)$directory as $dir)
		{
			if ( ! preg_match("|.+/$|", $dir))
=======
	 * @param	mixed	the directory name. Can be string or array
	 * @return	void
	 */
	public function add_dir($directory)
	{
		foreach ( (array) $directory as $dir)
		{
			if ( ! preg_match('|.+/$|', $dir))
>>>>>>> codeigniter/develop
			{
				$dir .= '/';
			}

			$dir_time = $this->_get_mod_time($dir);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
			$this->_add_dir($dir, $dir_time['file_mtime'], $dir_time['file_mdate']);
		}
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *	Get file/directory modification time
	 *
	 *	If this is a newly created file/dir, we will set the time to 'now'
	 *
	 *	@param string	path to file
	 *	@return array	filemtime/filemdate
	 */
	function _get_mod_time($dir)
	{
		// filemtime() will return false, but it does raise an error.
		$date = (@filemtime($dir)) ? filemtime($dir) : getdate($this->now);

		$time['file_mtime'] = ($date['hours'] << 11) + ($date['minutes'] << 5) + $date['seconds'] / 2;
		$time['file_mdate'] = (($date['year'] - 1980) << 9) + ($date['mon'] << 5) + $date['mday'];

		return $time;
=======
	 * Get file/directory modification time
	 *
	 * If this is a newly created file/dir, we will set the time to 'now'
	 *
	 * @param	string	path to file
	 * @return	array	filemtime/filemdate
	 */
	protected function _get_mod_time($dir)
	{
		// filemtime() may return false, but raises an error for non-existing files
		$date = file_exists($dir) ? filemtime($dir) : getdate($this->now);

		return array(
				'file_mtime' => ($date['hours'] << 11) + ($date['minutes'] << 5) + $date['seconds'] / 2,
				'file_mdate' => (($date['year'] - 1980) << 9) + ($date['mon'] << 5) + $date['mday']
			);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Add Directory
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string	the directory name
	 * @return	void
	 */
	function _add_dir($dir, $file_mtime, $file_mdate)
	{
		$dir = str_replace("\\", "/", $dir);
=======
	 * @param	string	the directory name
	 * @param	int
	 * @param	int
	 * @return	void
	 */
	protected function _add_dir($dir, $file_mtime, $file_mdate)
	{
		$dir = str_replace('\\', '/', $dir);
>>>>>>> codeigniter/develop

		$this->zipdata .=
			"\x50\x4b\x03\x04\x0a\x00\x00\x00\x00\x00"
			.pack('v', $file_mtime)
			.pack('v', $file_mdate)
			.pack('V', 0) // crc32
			.pack('V', 0) // compressed filesize
			.pack('V', 0) // uncompressed filesize
			.pack('v', strlen($dir)) // length of pathname
			.pack('v', 0) // extra field length
			.$dir
			// below is "data descriptor" segment
			.pack('V', 0) // crc32
			.pack('V', 0) // compressed filesize
			.pack('V', 0); // uncompressed filesize

		$this->directory .=
			"\x50\x4b\x01\x02\x00\x00\x0a\x00\x00\x00\x00\x00"
			.pack('v', $file_mtime)
			.pack('v', $file_mdate)
			.pack('V',0) // crc32
			.pack('V',0) // compressed filesize
			.pack('V',0) // uncompressed filesize
			.pack('v', strlen($dir)) // length of pathname
			.pack('v', 0) // extra field length
			.pack('v', 0) // file comment length
			.pack('v', 0) // disk number start
			.pack('v', 0) // internal file attributes
			.pack('V', 16) // external file attributes - 'directory' bit set
			.pack('V', $this->offset) // relative offset of local header
			.$dir;

		$this->offset = strlen($this->zipdata);
		$this->entries++;
	}

	// --------------------------------------------------------------------

	/**
	 * Add Data to Zip
	 *
	 * Lets you add files to the archive. If the path is included
<<<<<<< HEAD
	 * in the filename it will be placed within a directory.  Make
	 * sure you use add_dir() first to create the folder.
	 *
	 * @access	public
=======
	 * in the filename it will be placed within a directory. Make
	 * sure you use add_dir() first to create the folder.
	 *
>>>>>>> codeigniter/develop
	 * @param	mixed
	 * @param	string
	 * @return	void
	 */
<<<<<<< HEAD
	function add_data($filepath, $data = NULL)
=======
	public function add_data($filepath, $data = NULL)
>>>>>>> codeigniter/develop
	{
		if (is_array($filepath))
		{
			foreach ($filepath as $path => $data)
			{
				$file_data = $this->_get_mod_time($path);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
				$this->_add_data($path, $data, $file_data['file_mtime'], $file_data['file_mdate']);
			}
		}
		else
		{
			$file_data = $this->_get_mod_time($filepath);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
			$this->_add_data($filepath, $data, $file_data['file_mtime'], $file_data['file_mdate']);
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Add Data to Zip
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string	the file name/path
	 * @param	string	the data to be encoded
	 * @return	void
	 */
	function _add_data($filepath, $data, $file_mtime, $file_mdate)
	{
		$filepath = str_replace("\\", "/", $filepath);

		$uncompressed_size = strlen($data);
		$crc32  = crc32($data);

		$gzdata = gzcompress($data);
		$gzdata = substr($gzdata, 2, -4);
=======
	 * @param	string	the file name/path
	 * @param	string	the data to be encoded
	 * @param	int
	 * @param	int
	 * @return	void
	 */
	protected function _add_data($filepath, $data, $file_mtime, $file_mdate)
	{
		$filepath = str_replace('\\', '/', $filepath);

		$uncompressed_size = strlen($data);
		$crc32  = crc32($data);
		$gzdata = substr(gzcompress($data), 2, -4);
>>>>>>> codeigniter/develop
		$compressed_size = strlen($gzdata);

		$this->zipdata .=
			"\x50\x4b\x03\x04\x14\x00\x00\x00\x08\x00"
			.pack('v', $file_mtime)
			.pack('v', $file_mdate)
			.pack('V', $crc32)
			.pack('V', $compressed_size)
			.pack('V', $uncompressed_size)
			.pack('v', strlen($filepath)) // length of filename
			.pack('v', 0) // extra field length
			.$filepath
			.$gzdata; // "file data" segment

		$this->directory .=
			"\x50\x4b\x01\x02\x00\x00\x14\x00\x00\x00\x08\x00"
			.pack('v', $file_mtime)
			.pack('v', $file_mdate)
			.pack('V', $crc32)
			.pack('V', $compressed_size)
			.pack('V', $uncompressed_size)
			.pack('v', strlen($filepath)) // length of filename
			.pack('v', 0) // extra field length
			.pack('v', 0) // file comment length
			.pack('v', 0) // disk number start
			.pack('v', 0) // internal file attributes
			.pack('V', 32) // external file attributes - 'archive' bit set
			.pack('V', $this->offset) // relative offset of local header
			.$filepath;

		$this->offset = strlen($this->zipdata);
		$this->entries++;
		$this->file_num++;
	}

	// --------------------------------------------------------------------

	/**
	 * Read the contents of a file and add it to the zip
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function read_file($path, $preserve_filepath = FALSE)
=======
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	public function read_file($path, $preserve_filepath = FALSE)
>>>>>>> codeigniter/develop
	{
		if ( ! file_exists($path))
		{
			return FALSE;
		}

		if (FALSE !== ($data = file_get_contents($path)))
		{
<<<<<<< HEAD
			$name = str_replace("\\", "/", $path);

			if ($preserve_filepath === FALSE)
			{
				$name = preg_replace("|.*/(.+)|", "\\1", $name);
=======
			$name = str_replace('\\', '/', $path);
			if ($preserve_filepath === FALSE)
			{
				$name = preg_replace('|.*/(.+)|', '\\1', $name);
>>>>>>> codeigniter/develop
			}

			$this->add_data($name, $data);
			return TRUE;
		}
<<<<<<< HEAD
=======

>>>>>>> codeigniter/develop
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Read a directory and add it to the zip.
	 *
	 * This function recursively reads a folder and everything it contains (including
<<<<<<< HEAD
	 * sub-folders) and creates a zip based on it.  Whatever directory structure
	 * is in the original file path will be recreated in the zip file.
	 *
	 * @access	public
	 * @param	string	path to source
	 * @return	bool
	 */
	function read_dir($path, $preserve_filepath = TRUE, $root_path = NULL)
	{
=======
	 * sub-folders) and creates a zip based on it. Whatever directory structure
	 * is in the original file path will be recreated in the zip file.
	 *
	 * @param	string	path to source
	 * @param	bool
	 * @param	bool
	 * @return	bool
	 */
	public function read_dir($path, $preserve_filepath = TRUE, $root_path = NULL)
	{
		$path = rtrim($path, '/\\').DIRECTORY_SEPARATOR;
>>>>>>> codeigniter/develop
		if ( ! $fp = @opendir($path))
		{
			return FALSE;
		}

		// Set the original directory root for child dir's to use as relative
		if ($root_path === NULL)
		{
<<<<<<< HEAD
			$root_path = dirname($path).'/';
=======
			$root_path = dirname($path).DIRECTORY_SEPARATOR;
>>>>>>> codeigniter/develop
		}

		while (FALSE !== ($file = readdir($fp)))
		{
<<<<<<< HEAD
			if (substr($file, 0, 1) == '.')
=======
			if ($file[0] === '.')
>>>>>>> codeigniter/develop
			{
				continue;
			}

			if (@is_dir($path.$file))
			{
<<<<<<< HEAD
				$this->read_dir($path.$file."/", $preserve_filepath, $root_path);
			}
			else
			{
				if (FALSE !== ($data = file_get_contents($path.$file)))
				{
					$name = str_replace("\\", "/", $path);

					if ($preserve_filepath === FALSE)
					{
						$name = str_replace($root_path, '', $name);
					}

					$this->add_data($name.$file, $data);
				}
			}
		}

=======
				$this->read_dir($path.$file.DIRECTORY_SEPARATOR, $preserve_filepath, $root_path);
			}
			elseif (FALSE !== ($data = file_get_contents($path.$file)))
			{
				$name = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $path);
				if ($preserve_filepath === FALSE)
				{
					$name = str_replace($root_path, '', $name);
				}
				$this->add_data($name.$file, $data);
			}
		}

		closedir($fp);
>>>>>>> codeigniter/develop
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Get the Zip file
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	binary string
	 */
	function get_zip()
	{
		// Is there any data to return?
		if ($this->entries == 0)
=======
	 * @return	string	(binary encoded)
	 */
	public function get_zip()
	{
		// Is there any data to return?
		if ($this->entries === 0)
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

<<<<<<< HEAD
		$zip_data = $this->zipdata;
		$zip_data .= $this->directory."\x50\x4b\x05\x06\x00\x00\x00\x00";
		$zip_data .= pack('v', $this->entries); // total # of entries "on this disk"
		$zip_data .= pack('v', $this->entries); // total # of entries overall
		$zip_data .= pack('V', strlen($this->directory)); // size of central dir
		$zip_data .= pack('V', strlen($this->zipdata)); // offset to start of central dir
		$zip_data .= "\x00\x00"; // .zip file comment length

		return $zip_data;
=======
		return $this->zipdata
			.$this->directory."\x50\x4b\x05\x06\x00\x00\x00\x00"
			.pack('v', $this->entries) // total # of entries "on this disk"
			.pack('v', $this->entries) // total # of entries overall
			.pack('V', strlen($this->directory)) // size of central dir
			.pack('V', strlen($this->zipdata)) // offset to start of central dir
			."\x00\x00"; // .zip file comment length
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Write File to the specified directory
	 *
	 * Lets you write a file
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the file name
	 * @return	bool
	 */
	function archive($filepath)
=======
	 * @param	string	the file name
	 * @return	bool
	 */
	public function archive($filepath)
>>>>>>> codeigniter/develop
	{
		if ( ! ($fp = @fopen($filepath, FOPEN_WRITE_CREATE_DESTRUCTIVE)))
		{
			return FALSE;
		}

		flock($fp, LOCK_EX);
		fwrite($fp, $this->get_zip());
		flock($fp, LOCK_UN);
		fclose($fp);

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Download
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the file name
	 * @param	string	the data to be encoded
	 * @return	bool
	 */
	function download($filename = 'backup.zip')
	{
		if ( ! preg_match("|.+?\.zip$|", $filename))
=======
	 * @param	string	the file name
	 * @return	void
	 */
	public function download($filename = 'backup.zip')
	{
		if ( ! preg_match('|.+?\.zip$|', $filename))
>>>>>>> codeigniter/develop
		{
			$filename .= '.zip';
		}

		$CI =& get_instance();
		$CI->load->helper('download');
<<<<<<< HEAD

		$get_zip = $this->get_zip();

=======
		$get_zip = $this->get_zip();
>>>>>>> codeigniter/develop
		$zip_content =& $get_zip;

		force_download($filename, $zip_content);
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Data
	 *
<<<<<<< HEAD
	 * Lets you clear current zip data.  Useful if you need to create
	 * multiple zips with different data.
	 *
	 * @access	public
	 * @return	void
	 */
	function clear_data()
=======
	 * Lets you clear current zip data. Useful if you need to create
	 * multiple zips with different data.
	 *
	 * @return	object
	 */
	public function clear_data()
>>>>>>> codeigniter/develop
	{
		$this->zipdata		= '';
		$this->directory	= '';
		$this->entries		= 0;
		$this->file_num		= 0;
		$this->offset		= 0;
<<<<<<< HEAD
=======
		return $this;
>>>>>>> codeigniter/develop
	}

}

/* End of file Zip.php */
/* Location: ./system/libraries/Zip.php */