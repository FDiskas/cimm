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
 * CodeIgniter Hooks Class
 *
 * Provides a mechanism to extend the base system without hacking.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/libraries/encryption.html
 */
class CI_Hooks {

	/**
<<<<<<< HEAD
	 * Determines wether hooks are enabled
	 *
	 * @var bool
	 */
	var $enabled		= FALSE;
=======
	 * Determines whether hooks are enabled
	 *
	 * @var bool
	 */
	public $enabled =	FALSE;

>>>>>>> codeigniter/develop
	/**
	 * List of all hooks set in config/hooks.php
	 *
	 * @var array
	 */
<<<<<<< HEAD
	var $hooks			= array();
	/**
	 * Determines wether hook is in progress, used to prevent infinte loops
	 *
	 * @var bool
	 */
	var $in_progress	= FALSE;

	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		$this->_initialize();
		log_message('debug', "Hooks Class Initialized");
	}

	// --------------------------------------------------------------------
=======
	public $hooks =	array();

	/**
	 * Determines whether hook is in progress, used to prevent infinte loops
	 *
	 * @var bool
	 */
	public $in_progress	=	FALSE;
>>>>>>> codeigniter/develop

	/**
	 * Initialize the Hooks Preferences
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	void
	 */
	function _initialize()
	{
		$CFG =& load_class('Config', 'core');

		// If hooks are not enabled in the config file
		// there is nothing else to do

		if ($CFG->item('enable_hooks') == FALSE)
=======
	 * @return	void
	 */
	public function __construct()
	{
		$CFG =& load_class('Config', 'core');

		log_message('debug', 'Hooks Class Initialized');

		// If hooks are not enabled in the config file
		// there is nothing else to do
		if ($CFG->item('enable_hooks') === FALSE)
>>>>>>> codeigniter/develop
		{
			return;
		}

		// Grab the "hooks" definition file.
<<<<<<< HEAD
		// If there are no hooks, we're done.

		if (defined('ENVIRONMENT') AND is_file(APPPATH.'config/'.ENVIRONMENT.'/hooks.php'))
		{
		    include(APPPATH.'config/'.ENVIRONMENT.'/hooks.php');
=======
		if (defined('ENVIRONMENT') && is_file(APPPATH.'config/'.ENVIRONMENT.'/hooks.php'))
		{
			include(APPPATH.'config/'.ENVIRONMENT.'/hooks.php');
>>>>>>> codeigniter/develop
		}
		elseif (is_file(APPPATH.'config/hooks.php'))
		{
			include(APPPATH.'config/hooks.php');
		}

<<<<<<< HEAD

=======
		// If there are no hooks, we're done.
>>>>>>> codeigniter/develop
		if ( ! isset($hook) OR ! is_array($hook))
		{
			return;
		}

		$this->hooks =& $hook;
		$this->enabled = TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Call Hook
	 *
<<<<<<< HEAD
	 * Calls a particular hook
	 *
	 * @access	private
	 * @param	string	the hook name
	 * @return	mixed
	 */
	function _call_hook($which = '')
=======
	 * Calls a particular hook. Called by CodeIgniter.php.
	 *
	 * @param	string	the hook name
	 * @return	mixed
	 */
	public function call_hook($which = '')
>>>>>>> codeigniter/develop
	{
		if ( ! $this->enabled OR ! isset($this->hooks[$which]))
		{
			return FALSE;
		}

<<<<<<< HEAD
		if (isset($this->hooks[$which][0]) AND is_array($this->hooks[$which][0]))
=======
		if (isset($this->hooks[$which][0]) && is_array($this->hooks[$which][0]))
>>>>>>> codeigniter/develop
		{
			foreach ($this->hooks[$which] as $val)
			{
				$this->_run_hook($val);
			}
		}
		else
		{
			$this->_run_hook($this->hooks[$which]);
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Run Hook
	 *
	 * Runs a particular hook
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	array	the hook details
	 * @return	bool
	 */
	function _run_hook($data)
=======
	 * @param	array	the hook details
	 * @return	bool
	 */
	protected function _run_hook($data)
>>>>>>> codeigniter/develop
	{
		if ( ! is_array($data))
		{
			return FALSE;
		}

		// -----------------------------------
		// Safety - Prevents run-away loops
		// -----------------------------------

		// If the script being called happens to have the same
		// hook call within it a loop can happen
<<<<<<< HEAD

		if ($this->in_progress == TRUE)
=======
		if ($this->in_progress === TRUE)
>>>>>>> codeigniter/develop
		{
			return;
		}

		// -----------------------------------
		// Set file path
		// -----------------------------------

<<<<<<< HEAD
		if ( ! isset($data['filepath']) OR ! isset($data['filename']))
=======
		if ( ! isset($data['filepath'], $data['filename']))
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		$filepath = APPPATH.$data['filepath'].'/'.$data['filename'];

		if ( ! file_exists($filepath))
		{
			return FALSE;
		}

		// -----------------------------------
		// Set class/function name
		// -----------------------------------

		$class		= FALSE;
		$function	= FALSE;
		$params		= '';

<<<<<<< HEAD
		if (isset($data['class']) AND $data['class'] != '')
=======
		if ( ! empty($data['class']))
>>>>>>> codeigniter/develop
		{
			$class = $data['class'];
		}

<<<<<<< HEAD
		if (isset($data['function']))
=======
		if ( ! empty($data['function']))
>>>>>>> codeigniter/develop
		{
			$function = $data['function'];
		}

		if (isset($data['params']))
		{
			$params = $data['params'];
		}

<<<<<<< HEAD
		if ($class === FALSE AND $function === FALSE)
=======
		if ($class === FALSE && $function === FALSE)
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		// -----------------------------------
		// Set the in_progress flag
		// -----------------------------------

		$this->in_progress = TRUE;

		// -----------------------------------
		// Call the requested class and/or function
		// -----------------------------------

		if ($class !== FALSE)
		{
			if ( ! class_exists($class))
			{
				require($filepath);
			}

			$HOOK = new $class;
			$HOOK->$function($params);
		}
		else
		{
			if ( ! function_exists($function))
			{
				require($filepath);
			}

			$function($params);
		}

		$this->in_progress = FALSE;
		return TRUE;
	}

}

<<<<<<< HEAD
// END CI_Hooks class

=======
>>>>>>> codeigniter/develop
/* End of file Hooks.php */
/* Location: ./system/core/Hooks.php */