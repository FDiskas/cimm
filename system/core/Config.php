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
 * CodeIgniter Config Class
 *
 * This class contains functions that enable config files to be managed
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Config {

	/**
	 * List of all loaded config values
	 *
	 * @var array
	 */
<<<<<<< HEAD
	var $config = array();
=======
	public $config = array();

>>>>>>> codeigniter/develop
	/**
	 * List of all loaded config files
	 *
	 * @var array
	 */
<<<<<<< HEAD
	var $is_loaded = array();
	/**
	 * List of paths to search when trying to load a config file
	 *
	 * @var array
	 */
	var $_config_paths = array(APPPATH);
=======
	public $is_loaded =	array();

	/**
	 * List of paths to search when trying to load a config file.
	 * This must be public as it's used by the Loader class.
	 *
	 * @var array
	 */
	public $_config_paths =	array(APPPATH);
>>>>>>> codeigniter/develop

	/**
	 * Constructor
	 *
	 * Sets the $config data from the primary config.php file as a class variable
<<<<<<< HEAD
	 *
	 * @access   public
	 * @param   string	the config file name
	 * @param   boolean  if configuration values should be loaded into their own section
	 * @param   boolean  true if errors should just return false, false if an error message should be displayed
	 * @return  boolean  if the file was successfully loaded or not
	 */
	function __construct()
	{
		$this->config =& get_config();
		log_message('debug', "Config Class Initialized");

		// Set the base_url automatically if none was provided
		if ($this->config['base_url'] == '')
		{
			if (isset($_SERVER['HTTP_HOST']))
			{
				$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
				$base_url .= '://'. $_SERVER['HTTP_HOST'];
				$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
			}

=======
	 */
	public function __construct()
	{
		$this->config =& get_config();
		log_message('debug', 'Config Class Initialized');

		// Set the base_url automatically if none was provided
		if (empty($this->config['base_url']))
		{
			if (isset($_SERVER['HTTP_HOST']))
			{
				$base_url = ( ! empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') ? 'https' : 'http';
				$base_url .= '://'.$_SERVER['HTTP_HOST']
					.str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
			}
>>>>>>> codeigniter/develop
			else
			{
				$base_url = 'http://localhost/';
			}

			$this->set_item('base_url', $base_url);
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Load Config File
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the config file name
	 * @param   boolean  if configuration values should be loaded into their own section
	 * @param   boolean  true if errors should just return false, false if an error message should be displayed
	 * @return	boolean	if the file was loaded correctly
	 */
	function load($file = '', $use_sections = FALSE, $fail_gracefully = FALSE)
	{
		$file = ($file == '') ? 'config' : str_replace('.php', '', $file);
		$found = FALSE;
		$loaded = FALSE;

		foreach ($this->_config_paths as $path)
		{
			$check_locations = defined('ENVIRONMENT')
				? array(ENVIRONMENT.'/'.$file, $file)
				: array($file);

=======
	 * @param	string	the config file name
	 * @param	bool	if configuration values should be loaded into their own section
	 * @param	bool	true if errors should just return false, false if an error message should be displayed
	 * @return	bool	if the file was loaded correctly
	 */
	public function load($file = '', $use_sections = FALSE, $fail_gracefully = FALSE)
	{
		$file = ($file === '') ? 'config' : str_replace('.php', '', $file);
		$found = $loaded = FALSE;

		$check_locations = defined('ENVIRONMENT')
			? array(ENVIRONMENT.'/'.$file, $file)
			: array($file);

		foreach ($this->_config_paths as $path)
		{
>>>>>>> codeigniter/develop
			foreach ($check_locations as $location)
			{
				$file_path = $path.'config/'.$location.'.php';

				if (in_array($file_path, $this->is_loaded, TRUE))
				{
					$loaded = TRUE;
					continue 2;
				}

				if (file_exists($file_path))
				{
					$found = TRUE;
					break;
				}
			}

			if ($found === FALSE)
			{
				continue;
			}

			include($file_path);

			if ( ! isset($config) OR ! is_array($config))
			{
				if ($fail_gracefully === TRUE)
				{
					return FALSE;
				}
				show_error('Your '.$file_path.' file does not appear to contain a valid configuration array.');
			}

			if ($use_sections === TRUE)
			{
				if (isset($this->config[$file]))
				{
					$this->config[$file] = array_merge($this->config[$file], $config);
				}
				else
				{
					$this->config[$file] = $config;
				}
			}
			else
			{
				$this->config = array_merge($this->config, $config);
			}

			$this->is_loaded[] = $file_path;
			unset($config);

			$loaded = TRUE;
			log_message('debug', 'Config file loaded: '.$file_path);
			break;
		}

		if ($loaded === FALSE)
		{
			if ($fail_gracefully === TRUE)
			{
				return FALSE;
			}
<<<<<<< HEAD
			show_error('The configuration file '.$file.'.php'.' does not exist.');
=======
			show_error('The configuration file '.$file.'.php does not exist.');
>>>>>>> codeigniter/develop
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch a config file item
	 *
<<<<<<< HEAD
	 *
	 * @access	public
	 * @param	string	the config item name
	 * @param	string	the index name
	 * @param	bool
	 * @return	string
	 */
	function item($item, $index = '')
	{
		if ($index == '')
		{
			if ( ! isset($this->config[$item]))
			{
				return FALSE;
			}

			$pref = $this->config[$item];
		}
		else
		{
			if ( ! isset($this->config[$index]))
			{
				return FALSE;
			}

			if ( ! isset($this->config[$index][$item]))
			{
				return FALSE;
			}

			$pref = $this->config[$index][$item];
		}

		return $pref;
=======
	 * @param	string	the config item name
	 * @param	string	the index name
	 * @return	string
	 */
	public function item($item, $index = '')
	{
		if ($index == '')
		{
			return isset($this->config[$item]) ? $this->config[$item] : FALSE;
		}

		return isset($this->config[$index], $this->config[$index][$item]) ? $this->config[$index][$item] : FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch a config file item - adds slash after item (if item is not empty)
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the config item name
	 * @param	bool
	 * @return	string
	 */
	function slash_item($item)
=======
	 * @param	string	the config item name
	 * @return	string
	 */
	public function slash_item($item)
>>>>>>> codeigniter/develop
	{
		if ( ! isset($this->config[$item]))
		{
			return FALSE;
		}
<<<<<<< HEAD
		if( trim($this->config[$item]) == '')
=======
		elseif (trim($this->config[$item]) === '')
>>>>>>> codeigniter/develop
		{
			return '';
		}

		return rtrim($this->config[$item], '/').'/';
	}

	// --------------------------------------------------------------------

	/**
	 * Site URL
	 * Returns base_url . index_page [. uri_string]
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the URI string
	 * @return	string
	 */
	function site_url($uri = '')
	{
		if ($uri == '')
=======
	 * @param	mixed	the URI string or an array of segments
	 * @return	string
	 */
	public function site_url($uri = '')
	{
		if (empty($uri))
>>>>>>> codeigniter/develop
		{
			return $this->slash_item('base_url').$this->item('index_page');
		}

<<<<<<< HEAD
		if ($this->item('enable_query_strings') == FALSE)
		{
			$suffix = ($this->item('url_suffix') == FALSE) ? '' : $this->item('url_suffix');
			return $this->slash_item('base_url').$this->slash_item('index_page').$this->_uri_string($uri).$suffix;
		}
		else
		{
			return $this->slash_item('base_url').$this->item('index_page').'?'.$this->_uri_string($uri);
		}
=======
		$uri = $this->_uri_string($uri);

		if ($this->item('enable_query_strings') === FALSE)
		{
			$suffix = ($this->item('url_suffix') === FALSE) ? '' : $this->item('url_suffix');

			if ($suffix !== '' && ($offset = strpos($uri, '?')) !== FALSE)
			{
				$uri = substr($uri, 0, $offset).$suffix.substr($uri, $offset);
			}
			else
			{
				$uri .= $suffix;
			}

			return $this->slash_item('base_url').$this->slash_item('index_page').$uri;
		}
		elseif (strpos($uri, '?') === FALSE)
		{
			$uri = '?'.$uri;
		}

		return $this->slash_item('base_url').$this->item('index_page').$uri;
>>>>>>> codeigniter/develop
	}

	// -------------------------------------------------------------

	/**
	 * Base URL
	 * Returns base_url [. uri_string]
	 *
<<<<<<< HEAD
	 * @access public
	 * @param string $uri
	 * @return string
	 */
	function base_url($uri = '')
	{
		return $this->slash_item('base_url').ltrim($this->_uri_string($uri),'/');
=======
	 * @param	string	$uri
	 * @return	string
	 */
	public function base_url($uri = '')
	{
		return $this->slash_item('base_url').ltrim($this->_uri_string($uri), '/');
>>>>>>> codeigniter/develop
	}

	// -------------------------------------------------------------

	/**
	 * Build URI string for use in Config::site_url() and Config::base_url()
	 *
<<<<<<< HEAD
	 * @access protected
	 * @param  $uri
	 * @return string
	 */
	protected function _uri_string($uri)
	{
		if ($this->item('enable_query_strings') == FALSE)
=======
	 * @param	mixed	$uri
	 * @return	string
	 */
	protected function _uri_string($uri)
	{
		if ($this->item('enable_query_strings') === FALSE)
>>>>>>> codeigniter/develop
		{
			if (is_array($uri))
			{
				$uri = implode('/', $uri);
			}
<<<<<<< HEAD
			$uri = trim($uri, '/');
		}
		else
		{
			if (is_array($uri))
			{
				$i = 0;
				$str = '';
				foreach ($uri as $key => $val)
				{
					$prefix = ($i == 0) ? '' : '&';
					$str .= $prefix.$key.'='.$val;
					$i++;
				}
				$uri = $str;
			}
		}
	    return $uri;
=======
			return trim($uri, '/');
		}
		elseif (is_array($uri))
		{
			return http_build_query($uri);
		}

		return $uri;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * System URL
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	string
	 */
	function system_url()
	{
		$x = explode("/", preg_replace("|/*(.+?)/*$|", "\\1", BASEPATH));
=======
	 * @return	string
	 */
	public function system_url()
	{
		$x = explode('/', preg_replace('|/*(.+?)/*$|', '\\1', BASEPATH));
>>>>>>> codeigniter/develop
		return $this->slash_item('base_url').end($x).'/';
	}

	// --------------------------------------------------------------------

	/**
	 * Set a config file item
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	the config item key
	 * @param	string	the config item value
	 * @return	void
	 */
<<<<<<< HEAD
	function set_item($item, $value)
=======
	public function set_item($item, $value)
>>>>>>> codeigniter/develop
	{
		$this->config[$item] = $value;
	}

	// --------------------------------------------------------------------

	/**
	 * Assign to Config
	 *
	 * This function is called by the front controller (CodeIgniter.php)
<<<<<<< HEAD
	 * after the Config class is instantiated.  It permits config items
	 * to be assigned or overriden by variables contained in the index.php file
	 *
	 * @access	private
	 * @param	array
	 * @return	void
	 */
	function _assign_to_config($items = array())
=======
	 * after the Config class is instantiated. It permits config items
	 * to be assigned or overriden by variables contained in the index.php file
	 *
	 * @param	array
	 * @return	void
	 */
	public function _assign_to_config($items = array())
>>>>>>> codeigniter/develop
	{
		if (is_array($items))
		{
			foreach ($items as $key => $val)
			{
				$this->set_item($key, $val);
			}
		}
	}
<<<<<<< HEAD
}

// END CI_Config class

/* End of file Config.php */
/* Location: ./system/core/Config.php */
=======

}

/* End of file Config.php */
/* Location: ./system/core/Config.php */
>>>>>>> codeigniter/develop
