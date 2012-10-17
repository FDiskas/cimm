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
 * Router Class
 *
 * Parses URIs and determines routing
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @category	Libraries
=======
 * @category	Libraries
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/general/routing.html
 */
class CI_Router {

	/**
	 * Config class
	 *
	 * @var object
<<<<<<< HEAD
	 * @access public
	 */
	var $config;
=======
	 */
	public $config;

>>>>>>> codeigniter/develop
	/**
	 * List of routes
	 *
	 * @var array
<<<<<<< HEAD
	 * @access public
	 */
	var $routes			= array();
=======
	 */
	public $routes =	array();

>>>>>>> codeigniter/develop
	/**
	 * List of error routes
	 *
	 * @var array
<<<<<<< HEAD
	 * @access public
	 */
	var $error_routes	= array();
=======
	 */
	public $error_routes =	array();

>>>>>>> codeigniter/develop
	/**
	 * Current class name
	 *
	 * @var string
<<<<<<< HEAD
	 * @access public
	 */
	var $class			= '';
=======
	 */
	public $class =		'';

>>>>>>> codeigniter/develop
	/**
	 * Current method name
	 *
	 * @var string
<<<<<<< HEAD
	 * @access public
	 */
	var $method			= 'index';
=======
	 */
	public $method =	'index';

>>>>>>> codeigniter/develop
	/**
	 * Sub-directory that contains the requested controller class
	 *
	 * @var string
<<<<<<< HEAD
	 * @access public
	 */
	var $directory		= '';
=======
	 */
	public $directory =	'';

>>>>>>> codeigniter/develop
	/**
	 * Default controller (and method if specific)
	 *
	 * @var string
<<<<<<< HEAD
	 * @access public
	 */
	var $default_controller;
=======
	 */
	public $default_controller;
>>>>>>> codeigniter/develop

	/**
	 * Constructor
	 *
	 * Runs the route mapping function.
<<<<<<< HEAD
	 */
	function __construct()
	{
		$this->config =& load_class('Config', 'core');
		$this->uri =& load_class('URI', 'core');
		log_message('debug', "Router Class Initialized");
=======
	 *
	 * @return	void
	 */
	public function __construct()
	{
		$this->config =& load_class('Config', 'core');
		$this->uri =& load_class('URI', 'core');
		log_message('debug', 'Router Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Set the route mapping
	 *
	 * This function determines what should be served based on the URI request,
	 * as well as any "routes" that have been set in the routing config file.
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	void
	 */
	function _set_routing()
	{
		// Are query strings enabled in the config file?  Normally CI doesn't utilize query strings
		// since URI segments are more search-engine friendly, but they can optionally be used.
		// If this feature is enabled, we will gather the directory/class/method a little differently
		$segments = array();
		if ($this->config->item('enable_query_strings') === TRUE AND isset($_GET[$this->config->item('controller_trigger')]))
=======
	 * @return	void
	 */
	public function _set_routing()
	{
		// Are query strings enabled in the config file? Normally CI doesn't utilize query strings
		// since URI segments are more search-engine friendly, but they can optionally be used.
		// If this feature is enabled, we will gather the directory/class/method a little differently
		$segments = array();
		if ($this->config->item('enable_query_strings') === TRUE && isset($_GET[$this->config->item('controller_trigger')]))
>>>>>>> codeigniter/develop
		{
			if (isset($_GET[$this->config->item('directory_trigger')]))
			{
				$this->set_directory(trim($this->uri->_filter_uri($_GET[$this->config->item('directory_trigger')])));
				$segments[] = $this->fetch_directory();
			}

			if (isset($_GET[$this->config->item('controller_trigger')]))
			{
				$this->set_class(trim($this->uri->_filter_uri($_GET[$this->config->item('controller_trigger')])));
				$segments[] = $this->fetch_class();
			}

			if (isset($_GET[$this->config->item('function_trigger')]))
			{
				$this->set_method(trim($this->uri->_filter_uri($_GET[$this->config->item('function_trigger')])));
				$segments[] = $this->fetch_method();
			}
		}

		// Load the routes.php file.
<<<<<<< HEAD
		if (defined('ENVIRONMENT') AND is_file(APPPATH.'config/'.ENVIRONMENT.'/routes.php'))
=======
		if (defined('ENVIRONMENT') && is_file(APPPATH.'config/'.ENVIRONMENT.'/routes.php'))
>>>>>>> codeigniter/develop
		{
			include(APPPATH.'config/'.ENVIRONMENT.'/routes.php');
		}
		elseif (is_file(APPPATH.'config/routes.php'))
		{
			include(APPPATH.'config/routes.php');
		}

		$this->routes = ( ! isset($route) OR ! is_array($route)) ? array() : $route;
		unset($route);

		// Set the default controller so we can display it in the event
		// the URI doesn't correlated to a valid controller.
<<<<<<< HEAD
		$this->default_controller = ( ! isset($this->routes['default_controller']) OR $this->routes['default_controller'] == '') ? FALSE : strtolower($this->routes['default_controller']);

		// Were there any query string segments?  If so, we'll validate them and bail out since we're done.
=======
		$this->default_controller = empty($this->routes['default_controller']) ? FALSE : strtolower($this->routes['default_controller']);

		// Were there any query string segments? If so, we'll validate them and bail out since we're done.
>>>>>>> codeigniter/develop
		if (count($segments) > 0)
		{
			return $this->_validate_request($segments);
		}

		// Fetch the complete URI string
		$this->uri->_fetch_uri_string();

		// Is there a URI string? If not, the default controller specified in the "routes" file will be shown.
		if ($this->uri->uri_string == '')
		{
			return $this->_set_default_controller();
		}

<<<<<<< HEAD
		// Do we need to remove the URL suffix?
		$this->uri->_remove_url_suffix();

		// Compile the segments into an array
		$this->uri->_explode_segments();

		// Parse any custom routing that may exist
		$this->_parse_routes();

		// Re-index the segment array so that it starts with 1 rather than 0
		$this->uri->_reindex_segments();
=======
		$this->uri->_remove_url_suffix(); // Remove the URL suffix
		$this->uri->_explode_segments(); // Compile the segments into an array
		$this->_parse_routes(); // Parse any custom routing that may exist
		$this->uri->_reindex_segments(); // Re-index the segment array so that it starts with 1 rather than 0
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Set the default controller
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	void
	 */
	function _set_default_controller()
	{
		if ($this->default_controller === FALSE)
		{
			show_error("Unable to determine what should be displayed. A default route has not been specified in the routing file.");
=======
	 * @return	void
	 */
	protected function _set_default_controller()
	{
		if ($this->default_controller === FALSE)
		{
			show_error('Unable to determine what should be displayed. A default route has not been specified in the routing file.');
>>>>>>> codeigniter/develop
		}
		// Is the method being specified?
		if (strpos($this->default_controller, '/') !== FALSE)
		{
			$x = explode('/', $this->default_controller);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
			$this->set_class($x[0]);
			$this->set_method($x[1]);
			$this->_set_request($x);
		}
		else
		{
			$this->set_class($this->default_controller);
			$this->set_method('index');
			$this->_set_request(array($this->default_controller, 'index'));
		}

		// re-index the routed segments array so it starts with 1 rather than 0
		$this->uri->_reindex_segments();

<<<<<<< HEAD
		log_message('debug', "No URI present. Default controller set.");
=======
		log_message('debug', 'No URI present. Default controller set.');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Set the Route
	 *
	 * This function takes an array of URI segments as
	 * input, and sets the current class/method
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	array
	 * @param	bool
	 * @return	void
	 */
	function _set_request($segments = array())
	{
		$segments = $this->_validate_request($segments);

		if (count($segments) == 0)
=======
	 * @param	array
	 * @return	void
	 */
	protected function _set_request($segments = array())
	{
		$segments = $this->_validate_request($segments);

		if (count($segments) === 0)
>>>>>>> codeigniter/develop
		{
			return $this->_set_default_controller();
		}

		$this->set_class($segments[0]);

		if (isset($segments[1]))
		{
			// A standard method request
			$this->set_method($segments[1]);
		}
		else
		{
			// This lets the "routed" segment array identify that the default
			// index method is being used.
			$segments[1] = 'index';
		}

		// Update our "routed" segment array to contain the segments.
		// Note: If there is no custom routing, this array will be
		// identical to $this->uri->segments
		$this->uri->rsegments = $segments;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Validates the supplied segments.  Attempts to determine the path to
	 * the controller.
	 *
	 * @access	private
	 * @param	array
	 * @return	array
	 */
	function _validate_request($segments)
	{
		if (count($segments) == 0)
=======
	 * Validates the supplied segments.
	 * Attempts to determine the path to the controller.
	 *
	 * @param	array
	 * @return	array
	 */
	protected function _validate_request($segments)
	{
		if (count($segments) === 0)
>>>>>>> codeigniter/develop
		{
			return $segments;
		}

		// Does the requested controller exist in the root folder?
		if (file_exists(APPPATH.'controllers/'.$segments[0].'.php'))
		{
			return $segments;
		}

		// Is the controller in a sub-folder?
		if (is_dir(APPPATH.'controllers/'.$segments[0]))
		{
			// Set the directory and remove it from the segment array
			$this->set_directory($segments[0]);
			$segments = array_slice($segments, 1);

			if (count($segments) > 0)
			{
				// Does the requested controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].'.php'))
				{
					if ( ! empty($this->routes['404_override']))
					{
						$x = explode('/', $this->routes['404_override']);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
						$this->set_directory('');
						$this->set_class($x[0]);
						$this->set_method(isset($x[1]) ? $x[1] : 'index');

						return $x;
					}
					else
					{
						show_404($this->fetch_directory().$segments[0]);
					}
				}
			}
			else
			{
				// Is the method being specified in the route?
				if (strpos($this->default_controller, '/') !== FALSE)
				{
					$x = explode('/', $this->default_controller);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
					$this->set_class($x[0]);
					$this->set_method($x[1]);
				}
				else
				{
					$this->set_class($this->default_controller);
					$this->set_method('index');
				}

				// Does the default controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.'.php'))
				{
					$this->directory = '';
					return array();
				}

			}

			return $segments;
		}


		// If we've gotten this far it means that the URI does not correlate to a valid
<<<<<<< HEAD
		// controller class.  We will now see if there is an override
		if ( ! empty($this->routes['404_override']))
		{
			$x = explode('/', $this->routes['404_override']);

=======
		// controller class. We will now see if there is an override
		if ( ! empty($this->routes['404_override']))
		{
			$x = explode('/', $this->routes['404_override']);
>>>>>>> codeigniter/develop
			$this->set_class($x[0]);
			$this->set_method(isset($x[1]) ? $x[1] : 'index');

			return $x;
		}

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		// Nothing else to do at this point but show a 404
		show_404($segments[0]);
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Parse Routes
=======
	 * Parse Routes
>>>>>>> codeigniter/develop
	 *
	 * This function matches any routes that may exist in
	 * the config/routes.php file against the URI to
	 * determine if the class/method need to be remapped.
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	void
	 */
	function _parse_routes()
=======
	 * @return	void
	 */
	protected function _parse_routes()
>>>>>>> codeigniter/develop
	{
		// Turn the segment array into a URI string
		$uri = implode('/', $this->uri->segments);

		// Is there a literal match?  If so we're done
		if (isset($this->routes[$uri]))
		{
			return $this->_set_request(explode('/', $this->routes[$uri]));
		}

		// Loop through the route array looking for wild-cards
		foreach ($this->routes as $key => $val)
		{
			// Convert wild-cards to RegEx
<<<<<<< HEAD
			$key = str_replace(':any', '.+', str_replace(':num', '[0-9]+', $key));
=======
			$key = str_replace(array(':any', ':num'), array('.+', '[0-9]+'), $key);
>>>>>>> codeigniter/develop

			// Does the RegEx match?
			if (preg_match('#^'.$key.'$#', $uri))
			{
				// Do we have a back-reference?
<<<<<<< HEAD
				if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE)
=======
				if (strpos($val, '$') !== FALSE && strpos($key, '(') !== FALSE)
>>>>>>> codeigniter/develop
				{
					$val = preg_replace('#^'.$key.'$#', $val, $uri);
				}

				return $this->_set_request(explode('/', $val));
			}
		}

		// If we got this far it means we didn't encounter a
		// matching route so we'll set the site default route
		$this->_set_request($this->uri->segments);
	}

	// --------------------------------------------------------------------

	/**
	 * Set the class name
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_class($class)
=======
	 * @param	string
	 * @return	void
	 */
	public function set_class($class)
>>>>>>> codeigniter/develop
	{
		$this->class = str_replace(array('/', '.'), '', $class);
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch the current class
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	string
	 */
	function fetch_class()
=======
	 * @return	string
	 */
	public function fetch_class()
>>>>>>> codeigniter/develop
	{
		return $this->class;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Set the method name
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_method($method)
=======
	 * Set the method name
	 *
	 * @param	string
	 * @return	void
	 */
	public function set_method($method)
>>>>>>> codeigniter/develop
	{
		$this->method = $method;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Fetch the current method
	 *
	 * @access	public
	 * @return	string
	 */
	function fetch_method()
	{
		if ($this->method == $this->fetch_class())
		{
			return 'index';
		}

		return $this->method;
=======
	 * Fetch the current method
	 *
	 * @return	string
	 */
	public function fetch_method()
	{
		return ($this->method === $this->fetch_class()) ? 'index' : $this->method;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Set the directory name
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_directory($dir)
=======
	 * Set the directory name
	 *
	 * @param	string
	 * @return	void
	 */
	public function set_directory($dir)
>>>>>>> codeigniter/develop
	{
		$this->directory = str_replace(array('/', '.'), '', $dir).'/';
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Fetch the sub-directory (if any) that contains the requested controller class
	 *
	 * @access	public
	 * @return	string
	 */
	function fetch_directory()
=======
	 * Fetch the sub-directory (if any) that contains the requested controller class
	 *
	 * @return	string
	 */
	public function fetch_directory()
>>>>>>> codeigniter/develop
	{
		return $this->directory;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Set the controller overrides
	 *
	 * @access	public
	 * @param	array
	 * @return	null
	 */
	function _set_overrides($routing)
=======
	 * Set the controller overrides
	 *
	 * @param	array
	 * @return	void
	 */
	public function _set_overrides($routing)
>>>>>>> codeigniter/develop
	{
		if ( ! is_array($routing))
		{
			return;
		}

		if (isset($routing['directory']))
		{
			$this->set_directory($routing['directory']);
		}

<<<<<<< HEAD
		if (isset($routing['controller']) AND $routing['controller'] != '')
=======
		if ( ! empty($routing['controller']))
>>>>>>> codeigniter/develop
		{
			$this->set_class($routing['controller']);
		}

		if (isset($routing['function']))
		{
			$routing['function'] = ($routing['function'] == '') ? 'index' : $routing['function'];
			$this->set_method($routing['function']);
		}
	}

<<<<<<< HEAD

}
// END Router Class
=======
}
>>>>>>> codeigniter/develop

/* End of file Router.php */
/* Location: ./system/core/Router.php */