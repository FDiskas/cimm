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
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

<<<<<<< HEAD
	private static $instance;

	/**
	 * Constructor
=======
	/**
	 * Reference to the global CI instance
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Set up controller properties and methods
	 *
	 * @return	void
>>>>>>> codeigniter/develop
	 */
	public function __construct()
	{
		self::$instance =& $this;
<<<<<<< HEAD
		
=======

>>>>>>> codeigniter/develop
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
<<<<<<< HEAD

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
	}

=======
		$this->load->initialize();
		log_message('debug', 'Controller Class Initialized');
	}

	/**
	 * Return the CI object
	 *
	 * @return	object
	 */
>>>>>>> codeigniter/develop
	public static function &get_instance()
	{
		return self::$instance;
	}
<<<<<<< HEAD
}
// END Controller class
=======

}
>>>>>>> codeigniter/develop

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */