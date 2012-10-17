<<<<<<< HEAD
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://www.codeigniter.com/user_guide/license.html
 * @link		http://www.codeigniter.com
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
 * @link		http://codeigniter.com
>>>>>>> codeigniter/develop
 * @since		Version 1.0
 * @filesource
 */

/**
 * Jquery Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @category	Loader
 * @link		http://www.codeigniter.com/user_guide/libraries/javascript.html
 */
 
class CI_Jquery extends CI_Javascript {

	var $_javascript_folder = 'js';
	var $jquery_code_for_load = array();
	var $jquery_code_for_compile = array();
	var $jquery_corner_active = FALSE;
	var $jquery_table_sorter_active = FALSE;
	var $jquery_table_sorter_pager_active = FALSE;
	var $jquery_ajax_img = '';

	public function __construct($params)
	{
		$this->CI =& get_instance();	
=======
 * @category	Loader
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/javascript.html
 */

class CI_Jquery extends CI_Javascript {

	protected $_javascript_folder = 'js';
	public $jquery_code_for_load = array();
	public $jquery_code_for_compile = array();
	public $jquery_corner_active = FALSE;
	public $jquery_table_sorter_active = FALSE;
	public $jquery_table_sorter_pager_active = FALSE;
	public $jquery_ajax_img = '';

	public function __construct($params)
	{
		$this->CI =& get_instance();
>>>>>>> codeigniter/develop
		extract($params);

		if ($autoload === TRUE)
		{
<<<<<<< HEAD
			$this->script();			
		}
		
		log_message('debug', "Jquery Class Initialized");
	}
	
	// --------------------------------------------------------------------	 
	// Event Code
	// --------------------------------------------------------------------	
=======
			$this->script();
		}

		log_message('debug', 'Jquery Class Initialized');
	}

	// --------------------------------------------------------------------
	// Event Code
	// --------------------------------------------------------------------
>>>>>>> codeigniter/develop

	/**
	 * Blur
	 *
	 * Outputs a jQuery blur event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _blur($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'blur');
	}
	
	// --------------------------------------------------------------------
	
=======
	protected function _blur($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'blur');
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Change
	 *
	 * Outputs a jQuery change event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _change($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'change');
	}
	
	// --------------------------------------------------------------------
	
=======
	protected function _change($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'change');
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Click
	 *
	 * Outputs a jQuery click event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @param	boolean	whether or not to return false
	 * @return	string
	 */
<<<<<<< HEAD
	function _click($element = 'this', $js = '', $ret_false = TRUE)
=======
	protected function _click($element = 'this', $js = '', $ret_false = TRUE)
>>>>>>> codeigniter/develop
	{
		if ( ! is_array($js))
		{
			$js = array($js);
		}

		if ($ret_false)
		{
<<<<<<< HEAD
			$js[] = "return false;";
=======
			$js[] = 'return false;';
>>>>>>> codeigniter/develop
		}

		return $this->_add_event($element, $js, 'click');
	}

	// --------------------------------------------------------------------
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	/**
	 * Double Click
	 *
	 * Outputs a jQuery dblclick event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _dblclick($element = 'this', $js = '')
=======
	protected function _dblclick($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'dblclick');
	}

	// --------------------------------------------------------------------
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	/**
	 * Error
	 *
	 * Outputs a jQuery error event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _error($element = 'this', $js = '')
=======
	protected function _error($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'error');
	}

	// --------------------------------------------------------------------
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	/**
	 * Focus
	 *
	 * Outputs a jQuery focus event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _focus($element = 'this', $js = '')
=======
	protected function _focus($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'focus');
	}

	// --------------------------------------------------------------------
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	/**
	 * Hover
	 *
	 * Outputs a jQuery hover event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	- element
	 * @param	string	- Javascript code for mouse over
	 * @param	string	- Javascript code for mouse out
	 * @return	string
	 */
<<<<<<< HEAD
	function _hover($element = 'this', $over, $out)
	{
		$event = "\n\t$(" . $this->_prep_element($element) . ").hover(\n\t\tfunction()\n\t\t{\n\t\t\t{$over}\n\t\t}, \n\t\tfunction()\n\t\t{\n\t\t\t{$out}\n\t\t});\n";
=======
	protected function _hover($element = 'this', $over, $out)
	{
		$event = "\n\t$(".$this->_prep_element($element).").hover(\n\t\tfunction()\n\t\t{\n\t\t\t{$over}\n\t\t}, \n\t\tfunction()\n\t\t{\n\t\t\t{$out}\n\t\t});\n";
>>>>>>> codeigniter/develop

		$this->jquery_code_for_compile[] = $event;

		return $event;
	}

	// --------------------------------------------------------------------
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	/**
	 * Keydown
	 *
	 * Outputs a jQuery keydown event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _keydown($element = 'this', $js = '')
=======
	protected function _keydown($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'keydown');
	}

	// --------------------------------------------------------------------
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	/**
	 * Keyup
	 *
	 * Outputs a jQuery keydown event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _keyup($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'keyup');
	}	

	// --------------------------------------------------------------------
	
=======
	protected function _keyup($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'keyup');
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Load
	 *
	 * Outputs a jQuery load event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _load($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'load');
	}	
	
	// --------------------------------------------------------------------
	
=======
	protected function _load($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'load');
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Mousedown
	 *
	 * Outputs a jQuery mousedown event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _mousedown($element = 'this', $js = '')
=======
	protected function _mousedown($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'mousedown');
	}

	// --------------------------------------------------------------------
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	/**
	 * Mouse Out
	 *
	 * Outputs a jQuery mouseout event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _mouseout($element = 'this', $js = '')
=======
	protected function _mouseout($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'mouseout');
	}

	// --------------------------------------------------------------------
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	/**
	 * Mouse Over
	 *
	 * Outputs a jQuery mouseover event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _mouseover($element = 'this', $js = '')
=======
	protected function _mouseover($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'mouseover');
	}

	// --------------------------------------------------------------------

	/**
	 * Mouseup
	 *
	 * Outputs a jQuery mouseup event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _mouseup($element = 'this', $js = '')
=======
	protected function _mouseup($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'mouseup');
	}

	// --------------------------------------------------------------------

	/**
	 * Output
	 *
	 * Outputs script directly
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _output($array_js = '')
=======
	protected function _output($array_js = '')
>>>>>>> codeigniter/develop
	{
		if ( ! is_array($array_js))
		{
			$array_js = array($array_js);
		}
<<<<<<< HEAD
		
		foreach ($array_js as $js)
		{
			$this->jquery_code_for_compile[] = "\t$js\n";
=======

		foreach ($array_js as $js)
		{
			$this->jquery_code_for_compile[] = "\t".$js."\n";
>>>>>>> codeigniter/develop
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Resize
	 *
	 * Outputs a jQuery resize event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _resize($element = 'this', $js = '')
=======
	protected function _resize($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'resize');
	}

	// --------------------------------------------------------------------

	/**
	 * Scroll
	 *
	 * Outputs a jQuery scroll event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _scroll($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'scroll');
	}
	
=======
	protected function _scroll($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'scroll');
	}

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Unload
	 *
	 * Outputs a jQuery unload event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
<<<<<<< HEAD
	function _unload($element = 'this', $js = '')
=======
	protected function _unload($element = 'this', $js = '')
>>>>>>> codeigniter/develop
	{
		return $this->_add_event($element, $js, 'unload');
	}

<<<<<<< HEAD
	// --------------------------------------------------------------------	 
	// Effects
	// --------------------------------------------------------------------	
	
=======
	// --------------------------------------------------------------------
	// Effects
	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Add Class
	 *
	 * Outputs a jQuery addClass event
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string	- element
	 * @return	string
	 */
	function _addClass($element = 'this', $class='')
	{
		$element = $this->_prep_element($element);
		$str  = "$({$element}).addClass(\"$class\");";
		return $str;
=======
	 * @param	string	- element
	 * @return	string
	 */
	protected function _addClass($element = 'this', $class='')
	{
		$element = $this->_prep_element($element);
		return '$('.$element.').addClass("'.$class.'");';
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Animate
	 *
	 * Outputs a jQuery animate event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
<<<<<<< HEAD
	function _animate($element = 'this', $params = array(), $speed = '', $extra = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);
		
		$animations = "\t\t\t";
		
		foreach ($params as $param=>$value)
		{
			$animations .= $param.': \''.$value.'\', ';
=======
	protected function _animate($element = 'this', $params = array(), $speed = '', $extra = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		$animations = "\t\t\t";

		foreach ($params as $param => $value)
		{
			$animations .= $param.": '".$value."', ";
>>>>>>> codeigniter/develop
		}

		$animations = substr($animations, 0, -2); // remove the last ", "

<<<<<<< HEAD
		if ($speed != '')
		{
			$speed = ', '.$speed;
		}
		
		if ($extra != '')
		{
			$extra = ', '.$extra;
		}
		
		$str  = "$({$element}).animate({\n$animations\n\t\t}".$speed.$extra.");";
		
		return $str;
	}

	// --------------------------------------------------------------------
		
=======
		if ($speed !== '')
		{
			$speed = ', '.$speed;
		}

		if ($extra !== '')
		{
			$extra = ', '.$extra;
		}

		return "$({$element}).animate({\n$animations\n\t\t}".$speed.$extra.');';
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Fade In
	 *
	 * Outputs a jQuery hide event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
<<<<<<< HEAD
	function _fadeIn($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);	
		$speed = $this->_validate_speed($speed);
		
		if ($callback != '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}
		
		$str  = "$({$element}).fadeIn({$speed}{$callback});";
		
		return $str;
	}
		
	// --------------------------------------------------------------------
	
=======
	protected function _fadeIn($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return "$({$element}).fadeIn({$speed}{$callback});";
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Fade Out
	 *
	 * Outputs a jQuery hide event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
<<<<<<< HEAD
	function _fadeOut($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);
		
		if ($callback != '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}
		
		$str  = "$({$element}).fadeOut({$speed}{$callback});";
		
		return $str;
=======
	protected function _fadeOut($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').fadeOut('.$speed.$callback.');';
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Hide
	 *
	 * Outputs a jQuery hide action
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
<<<<<<< HEAD
	function _hide($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);	
		$speed = $this->_validate_speed($speed);
		
		if ($callback != '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}
		
		$str  = "$({$element}).hide({$speed}{$callback});";

		return $str;
	}
	
=======
	protected function _hide($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return "$({$element}).hide({$speed}{$callback});";
	}

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Remove Class
	 *
	 * Outputs a jQuery remove class event
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string	- element
	 * @return	string
	 */
	function _removeClass($element = 'this', $class='')
	{
		$element = $this->_prep_element($element);
		$str  = "$({$element}).removeClass(\"$class\");";
		return $str;
	}

	// --------------------------------------------------------------------
			
=======
	 * @param	string	- element
	 * @return	string
	 */
	protected function _removeClass($element = 'this', $class='')
	{
		$element = $this->_prep_element($element);
		return '$('.$element.').removeClass("'.$class.'");';
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Slide Up
	 *
	 * Outputs a jQuery slideUp event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
<<<<<<< HEAD
	function _slideUp($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);	
		$speed = $this->_validate_speed($speed);
		
		if ($callback != '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}
		
		$str  = "$({$element}).slideUp({$speed}{$callback});";
		
		return $str;
	}
		
	// --------------------------------------------------------------------
	
=======
	protected function _slideUp($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').slideUp('.$speed.$callback.');';
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Slide Down
	 *
	 * Outputs a jQuery slideDown event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
<<<<<<< HEAD
	function _slideDown($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);
		
		if ($callback != '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}
		
		$str  = "$({$element}).slideDown({$speed}{$callback});";
		
		return $str;
	}

	// --------------------------------------------------------------------
	
=======
	protected function _slideDown($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').slideDown('.$speed.$callback.');';
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Slide Toggle
	 *
	 * Outputs a jQuery slideToggle event
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
<<<<<<< HEAD
	function _slideToggle($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);
		
		if ($callback != '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}
		
		$str  = "$({$element}).slideToggle({$speed}{$callback});";
		
		return $str;
	}
		
	// --------------------------------------------------------------------
	
=======
	protected function _slideToggle($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').slideToggle('.$speed.$callback.');';
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Toggle
	 *
	 * Outputs a jQuery toggle event
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string	- element
	 * @return	string
	 */
	function _toggle($element = 'this')
	{
		$element = $this->_prep_element($element);
		$str  = "$({$element}).toggle();";
		return $str;
	}
	
	// --------------------------------------------------------------------
	
=======
	 * @param	string	- element
	 * @return	string
	 */
	protected function _toggle($element = 'this')
	{
		$element = $this->_prep_element($element);
		return '$('.$element.').toggle();';
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Toggle Class
	 *
	 * Outputs a jQuery toggle class event
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string	- element
	 * @return	string
	 */
	function _toggleClass($element = 'this', $class='')
	{
		$element = $this->_prep_element($element);
		$str  = "$({$element}).toggleClass(\"$class\");";
		return $str;
	}
	
	// --------------------------------------------------------------------
	
=======
	 * @param	string	- element
	 * @return	string
	 */
	protected function _toggleClass($element = 'this', $class='')
	{
		$element = $this->_prep_element($element);
		return '$('.$element.').toggleClass("'.$class.'");';
	}

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Show
	 *
	 * Outputs a jQuery show event
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
<<<<<<< HEAD
	function _show($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);	
		$speed = $this->_validate_speed($speed);
		
		if ($callback != '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}
		
		$str  = "$({$element}).show({$speed}{$callback});";
		
		return $str;
=======
	protected function _show($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').show('.$speed.$callback.');';
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Updater
	 *
<<<<<<< HEAD
	 * An Ajax call that populates the designated DOM node with 
	 * returned content
	 *
	 * @access	private
=======
	 * An Ajax call that populates the designated DOM node with
	 * returned content
	 *
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	the controller to run the call against
	 * @param	string	optional parameters
	 * @return	string
	 */
<<<<<<< HEAD
	
	function _updater($container = 'this', $controller, $options = '')
	{	
		$container = $this->_prep_element($container);
		
		$controller = (strpos('://', $controller) === FALSE) ? $controller : $this->CI->config->site_url($controller);
		
		// ajaxStart and ajaxStop are better choices here... but this is a stop gap
		if ($this->CI->config->item('javascript_ajax_img') == '')
		{
			$loading_notifier = "Loading...";
		}
		else
		{
			$loading_notifier = '<img src=\'' . $this->CI->config->slash_item('base_url') . $this->CI->config->item('javascript_ajax_img') . '\' alt=\'Loading\' />';
		}
		
		$updater = "$($container).empty();\n"; // anything that was in... get it out
		$updater .= "\t\t$($container).prepend(\"$loading_notifier\");\n"; // to replace with an image

		$request_options = '';
		if ($options != '')
		{
			$request_options .= ", {";
			$request_options .= (is_array($options)) ? "'".implode("', '", $options)."'" : "'".str_replace(":", "':'", $options)."'";
			$request_options .= "}";
		}

		$updater .= "\t\t$($container).load('$controller'$request_options);";
		return $updater;
=======

	protected function _updater($container = 'this', $controller, $options = '')
	{
		$container = $this->_prep_element($container);
		$controller = (strpos('://', $controller) === FALSE) ? $controller : $this->CI->config->site_url($controller);

		// ajaxStart and ajaxStop are better choices here... but this is a stop gap
		if ($this->CI->config->item('javascript_ajax_img') === '')
		{
			$loading_notifier = 'Loading...';
		}
		else
		{
			$loading_notifier = '<img src="'.$this->CI->config->slash_item('base_url').$this->CI->config->item('javascript_ajax_img').'" alt="Loading" />';
		}

		$updater = '$('.$container.").empty();\n" // anything that was in... get it out
			."\t\t$(".$container.').prepend("'.$loading_notifier."\");\n"; // to replace with an image

		$request_options = '';
		if ($options !== '')
		{
			$request_options .= ', {'
					.(is_array($options) ? "'".implode("', '", $options)."'" : "'".str_replace(':', "':'", $options)."'")
					.'}';
		}

		return $updater."\t\t$($container).load('$controller'$request_options);";
>>>>>>> codeigniter/develop
	}


	// --------------------------------------------------------------------
	// Pre-written handy stuff
	// --------------------------------------------------------------------
<<<<<<< HEAD
	 
	/**
	 * Zebra tables
	 *
	 * @access	private
=======

	/**
	 * Zebra tables
	 *
>>>>>>> codeigniter/develop
	 * @param	string	table name
	 * @param	string	plugin location
	 * @return	string
	 */
<<<<<<< HEAD
	function _zebraTables($class = '', $odd = 'odd', $hover = '')
	{
		$class = ($class != '') ? '.'.$class : '';
		
=======
	protected function _zebraTables($class = '', $odd = 'odd', $hover = '')
	{
		$class = ($class !== '') ? '.'.$class : '';
>>>>>>> codeigniter/develop
		$zebra  = "\t\$(\"table{$class} tbody tr:nth-child(even)\").addClass(\"{$odd}\");";

		$this->jquery_code_for_compile[] = $zebra;

<<<<<<< HEAD
		if ($hover != '')
=======
		if ($hover !== '')
>>>>>>> codeigniter/develop
		{
			$hover = $this->hover("table{$class} tbody tr", "$(this).addClass('hover');", "$(this).removeClass('hover');");
		}

		return $zebra;
	}

<<<<<<< HEAD


	// --------------------------------------------------------------------
	// Plugins
	// --------------------------------------------------------------------
	
=======
	// --------------------------------------------------------------------
	// Plugins
	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Corner Plugin
	 *
	 * http://www.malsup.com/jquery/corner/
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	target
	 * @return	string
	 */
	function corner($element = '', $corner_style = '')
=======
	 * @param	string	target
	 * @return	string
	 */
	public function corner($element = '', $corner_style = '')
>>>>>>> codeigniter/develop
	{
		// may want to make this configurable down the road
		$corner_location = '/plugins/jquery.corner.js';

<<<<<<< HEAD
		if ($corner_style != '')
=======
		if ($corner_style !== '')
>>>>>>> codeigniter/develop
		{
			$corner_style = '"'.$corner_style.'"';
		}

<<<<<<< HEAD
		return "$(" . $this->_prep_element($element) . ").corner(".$corner_style.");";
	}
	
=======
		return '$('.$this->_prep_element($element).').corner('.$corner_style.');';
	}

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * modal window
	 *
	 * Load a thickbox modal window
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function modal($src, $relative = FALSE)
	{	
=======
	 * @return	void
	 */
	public function modal($src, $relative = FALSE)
	{
>>>>>>> codeigniter/develop
		$this->jquery_code_for_load[] = $this->external($src, $relative);
	}

	// --------------------------------------------------------------------

	/**
	 * Effect
	 *
	 * Load an Effect library
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function effect($src, $relative = FALSE)
=======
	 * @return	void
	 */
	public function effect($src, $relative = FALSE)
>>>>>>> codeigniter/develop
	{
		$this->jquery_code_for_load[] = $this->external($src, $relative);
	}

	// --------------------------------------------------------------------

	/**
	 * Plugin
	 *
	 * Load a plugin library
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function plugin($src, $relative = FALSE)
=======
	 * @return	void
	 */
	public function plugin($src, $relative = FALSE)
>>>>>>> codeigniter/develop
	{
		$this->jquery_code_for_load[] = $this->external($src, $relative);
	}

	// --------------------------------------------------------------------

	/**
	 * UI
	 *
	 * Load a user interface library
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function ui($src, $relative = FALSE)
=======
	 * @return	void
	 */
	public function ui($src, $relative = FALSE)
>>>>>>> codeigniter/develop
	{
		$this->jquery_code_for_load[] = $this->external($src, $relative);
	}
	// --------------------------------------------------------------------

	/**
	 * Sortable
	 *
	 * Creates a jQuery sortable
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function sortable($element, $options = array())
=======
	 * @return	void
	 */
	public function sortable($element, $options = array())
>>>>>>> codeigniter/develop
	{

		if (count($options) > 0)
		{
			$sort_options = array();
			foreach ($options as $k=>$v)
			{
<<<<<<< HEAD
				$sort_options[] = "\n\t\t".$k.': '.$v."";
			}
			$sort_options = implode(",", $sort_options);
=======
				$sort_options[] = "\n\t\t".$k.': '.$v;
			}
			$sort_options = implode(',', $sort_options);
>>>>>>> codeigniter/develop
		}
		else
		{
			$sort_options = '';
		}

<<<<<<< HEAD
		return "$(" . $this->_prep_element($element) . ").sortable({".$sort_options."\n\t});";
=======
		return '$('.$this->_prep_element($element).').sortable({'.$sort_options."\n\t});";
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Table Sorter Plugin
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	table name
	 * @param	string	plugin location
	 * @return	string
	 */
<<<<<<< HEAD
	function tablesorter($table = '', $options = '')
	{
		$this->jquery_code_for_compile[] = "\t$(" . $this->_prep_element($table) . ").tablesorter($options);\n";
	}
	
=======
	public function tablesorter($table = '', $options = '')
	{
		$this->jquery_code_for_compile[] = "\t$(".$this->_prep_element($table).').tablesorter('.$options.");\n";
	}

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------
	// Class functions
	// --------------------------------------------------------------------

	/**
	 * Add Event
	 *
	 * Constructs the syntax for an event, and adds to into the array for compilation
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @param	string	The event to pass
	 * @return	string
<<<<<<< HEAD
	 */	
	function _add_event($element, $js, $event)
=======
	 */
	protected function _add_event($element, $js, $event)
>>>>>>> codeigniter/develop
	{
		if (is_array($js))
		{
			$js = implode("\n\t\t", $js);

		}

<<<<<<< HEAD
		$event = "\n\t$(" . $this->_prep_element($element) . ").{$event}(function(){\n\t\t{$js}\n\t});\n";
=======
		$event = "\n\t$(".$this->_prep_element($element).').'.$event."(function(){\n\t\t{$js}\n\t});\n";
>>>>>>> codeigniter/develop
		$this->jquery_code_for_compile[] = $event;
		return $event;
	}

	// --------------------------------------------------------------------

	/**
	 * Compile
	 *
	 * As events are specified, they are stored in an array
	 * This funciton compiles them all for output on a page
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	string
	 */
	function _compile($view_var = 'script_foot', $script_tags = TRUE)
=======
	 * @return	string
	 */
	protected function _compile($view_var = 'script_foot', $script_tags = TRUE)
>>>>>>> codeigniter/develop
	{
		// External references
		$external_scripts = implode('', $this->jquery_code_for_load);
		$this->CI->load->vars(array('library_src' => $external_scripts));

<<<<<<< HEAD
		if (count($this->jquery_code_for_compile) == 0 )
=======
		if (count($this->jquery_code_for_compile) === 0)
>>>>>>> codeigniter/develop
		{
			// no inline references, let's just return
			return;
		}

		// Inline references
<<<<<<< HEAD
		$script = '$(document).ready(function() {' . "\n";
		$script .= implode('', $this->jquery_code_for_compile);
		$script .= '});';
		
=======
		$script = '$(document).ready(function() {'."\n"
			.implode('', $this->jquery_code_for_compile)
			.'});';

>>>>>>> codeigniter/develop
		$output = ($script_tags === FALSE) ? $script : $this->inline($script);

		$this->CI->load->vars(array($view_var => $output));

	}
<<<<<<< HEAD
	
	// --------------------------------------------------------------------
	
=======

	// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
	/**
	 * Clear Compile
	 *
	 * Clears the array of script events collected for output
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function _clear_compile()
=======
	 * @return	void
	 */
	protected function _clear_compile()
>>>>>>> codeigniter/develop
	{
		$this->jquery_code_for_compile = array();
	}

	// --------------------------------------------------------------------
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	/**
	 * Document Ready
	 *
	 * A wrapper for writing document.ready()
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	string
	 */
	function _document_ready($js)
	{
		if ( ! is_array($js))
		{
			$js = array ($js);

		}
		
=======
	 * @return	string
	 */
	protected function _document_ready($js)
	{
		if ( ! is_array($js))
		{
			$js = array($js);
		}

>>>>>>> codeigniter/develop
		foreach ($js as $script)
		{
			$this->jquery_code_for_compile[] = $script;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Script Tag
	 *
	 * Outputs the script tag that loads the jquery.js file into an HTML document
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function script($library_src = '', $relative = FALSE)
=======
	 * @param	string
	 * @return	string
	 */
	public function script($library_src = '', $relative = FALSE)
>>>>>>> codeigniter/develop
	{
		$library_src = $this->external($library_src, $relative);
		$this->jquery_code_for_load[] = $library_src;
		return $library_src;
	}
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Prep Element
	 *
	 * Puts HTML element in quotes for use in jQuery code
	 * unless the supplied element is the Javascript 'this'
	 * object, in which case no quotes are added
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function _prep_element($element)
	{
		if ($element != 'this')
		{
			$element = '"'.$element.'"';
		}
		
		return $element;
	}
	
=======
	 * @param	string
	 * @return	string
	 */
	protected function _prep_element($element)
	{
		if ($element !== 'this')
		{
			$element = '"'.$element.'"';
		}

		return $element;
	}

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Validate Speed
	 *
	 * Ensures the speed parameter is valid for jQuery
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string
	 * @return	string
	 */	
	function _validate_speed($speed)
	{
		if (in_array($speed, array('slow', 'normal', 'fast')))
		{
			$speed = '"'.$speed.'"';
		}
		elseif (preg_match("/[^0-9]/", $speed))
		{
			$speed = '';
		}
	
=======
	 * @param	string
	 * @return	string
	 */
	protected function _validate_speed($speed)
	{
		if (in_array($speed, array('slow', 'normal', 'fast')))
		{
			return '"'.$speed.'"';
		}
		elseif (preg_match('/[^0-9]/', $speed))
		{
			return '';
		}

>>>>>>> codeigniter/develop
		return $speed;
	}

}

/* End of file Jquery.php */
/* Location: ./system/libraries/Jquery.php */