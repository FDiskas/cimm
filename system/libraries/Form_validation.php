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
 * Form Validation Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Validation
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/libraries/form_validation.html
 */
class CI_Form_validation {

<<<<<<< HEAD
	protected $CI;
	protected $_field_data			= array();
	protected $_config_rules		= array();
	protected $_error_array			= array();
	protected $_error_messages		= array();
	protected $_error_prefix		= '<p>';
	protected $_error_suffix		= '</p>';
	protected $error_string			= '';
	protected $_safe_form_data		= FALSE;

	/**
	 * Constructor
=======
	/**
	 * Reference to the CodeIgniter instance
	 *
	 * @var object
	 */
	protected $CI;

	/**
	 * Validation data for the current form submission
	 *
	 * @var array
	 */
	protected $_field_data		= array();

	/**
	 * Validation rules for the current form
	 *
	 * @var array
	 */
	protected $_config_rules	= array();

	/**
	 * Array of validation errors
	 *
	 * @var array
	 */
	protected $_error_array		= array();

	/**
	 * Array of custom error messages
	 *
	 * @var array
	 */
	protected $_error_messages	= array();

	/**
	 * Start tag for error wrapping
	 *
	 * @var string
	 */
	protected $_error_prefix	= '<p>';

	/**
	 * End tag for error wrapping
	 *
	 * @var string
	 */
	protected $_error_suffix	= '</p>';

	/**
	 * Custom error message
	 *
	 * @var string
	 */
	protected $error_string		= '';

	/**
	 * Whether the form data has been validated as safe
	 *
	 * @var bool
	 */
	protected $_safe_form_data	= FALSE;

	/**
	 * Custom data to validate
	 *
	 * @var array
	 */
	protected $validation_data	= array();

	/**
	 * Initialize Form_Validation class
	 *
	 * @param	array	$rules
	 * @return	void
>>>>>>> codeigniter/develop
	 */
	public function __construct($rules = array())
	{
		$this->CI =& get_instance();

<<<<<<< HEAD
=======
		// applies delimiters set in config file.
		if (isset($rules['error_prefix']))
		{
			$this->_error_prefix = $rules['error_prefix'];
			unset($rules['error_prefix']);
		}
		if (isset($rules['error_suffix']))
		{
			$this->_error_suffix = $rules['error_suffix'];
			unset($rules['error_suffix']);
		}

>>>>>>> codeigniter/develop
		// Validation rules can be stored in a config file.
		$this->_config_rules = $rules;

		// Automatically load the form helper
		$this->CI->load->helper('form');

<<<<<<< HEAD
		// Set the character encoding in MB.
		if (function_exists('mb_internal_encoding'))
		{
			mb_internal_encoding($this->CI->config->item('charset'));
		}

		log_message('debug', "Form Validation Class Initialized");
=======
		log_message('debug', 'Form Validation Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Set Rules
	 *
	 * This function takes an array of field names and validation
	 * rules as input, validates the info, and stores it
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @param	string
	 * @return	void
=======
	 * @param	mixed	$field
	 * @param	string	$label
	 * @param	mixed	$rules
	 * @return	object
>>>>>>> codeigniter/develop
	 */
	public function set_rules($field, $label = '', $rules = '')
	{
		// No reason to set rules if we have no POST data
<<<<<<< HEAD
		if (count($_POST) == 0)
=======
		// or a validation array has not been specified
		if ($this->CI->input->method() !== 'post' && empty($this->validation_data))
>>>>>>> codeigniter/develop
		{
			return $this;
		}

<<<<<<< HEAD
		// If an array was passed via the first parameter instead of indidual string
=======
		// If an array was passed via the first parameter instead of individual string
>>>>>>> codeigniter/develop
		// values we cycle through it and recursively call this function.
		if (is_array($field))
		{
			foreach ($field as $row)
			{
				// Houston, we have a problem...
<<<<<<< HEAD
				if ( ! isset($row['field']) OR ! isset($row['rules']))
=======
				if ( ! isset($row['field'], $row['rules']))
>>>>>>> codeigniter/develop
				{
					continue;
				}

				// If the field label wasn't passed we use the field name
<<<<<<< HEAD
				$label = ( ! isset($row['label'])) ? $row['field'] : $row['label'];
=======
				$label = isset($row['label']) ? $row['label'] : $row['field'];
>>>>>>> codeigniter/develop

				// Here we go!
				$this->set_rules($row['field'], $label, $row['rules']);
			}
<<<<<<< HEAD
			return $this;
		}

		// No fields? Nothing to do...
		if ( ! is_string($field) OR  ! is_string($rules) OR $field == '')
=======

			return $this;
		}

		// Convert an array of rules to a string
		if (is_array($rules))
		{
			$rules = implode('|', $rules);
		}

		// No fields? Nothing to do...
		if ( ! is_string($field) OR ! is_string($rules) OR $field === '')
>>>>>>> codeigniter/develop
		{
			return $this;
		}

		// If the field label wasn't passed we use the field name
<<<<<<< HEAD
		$label = ($label == '') ? $field : $label;

		// Is the field name an array?  We test for the existence of a bracket "[" in
		// the field name to determine this.  If it is an array, we break it apart
		// into its components so that we can fetch the corresponding POST data later
		if (strpos($field, '[') !== FALSE AND preg_match_all('/\[(.*?)\]/', $field, $matches))
=======
		$label = ($label === '') ? $field : $label;

		// Is the field name an array? If it is an array, we break it apart
		// into its components so that we can fetch the corresponding POST data later
		if (preg_match_all('/\[(.*?)\]/', $field, $matches))
>>>>>>> codeigniter/develop
		{
			// Note: Due to a bug in current() that affects some versions
			// of PHP we can not pass function call directly into it
			$x = explode('[', $field);
			$indexes[] = current($x);

<<<<<<< HEAD
			for ($i = 0; $i < count($matches['0']); $i++)
			{
				if ($matches['1'][$i] != '')
				{
					$indexes[] = $matches['1'][$i];
=======
			for ($i = 0, $c = count($matches[0]); $i < $c; $i++)
			{
				if ($matches[1][$i] !== '')
				{
					$indexes[] = $matches[1][$i];
>>>>>>> codeigniter/develop
				}
			}

			$is_array = TRUE;
		}
		else
		{
			$indexes	= array();
			$is_array	= FALSE;
		}

		// Build our master array
		$this->_field_data[$field] = array(
<<<<<<< HEAD
			'field'				=> $field,
			'label'				=> $label,
			'rules'				=> $rules,
			'is_array'			=> $is_array,
			'keys'				=> $indexes,
			'postdata'			=> NULL,
			'error'				=> ''
=======
			'field'		=> $field,
			'label'		=> $label,
			'rules'		=> $rules,
			'is_array'	=> $is_array,
			'keys'		=> $indexes,
			'postdata'	=> NULL,
			'error'		=> ''
>>>>>>> codeigniter/develop
		);

		return $this;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Set Error Message
	 *
	 * Lets users set their own error messages on the fly.  Note:  The key
	 * name has to match the  function name that it corresponds to.
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	string
=======
	 * By default, form validation uses the $_POST array to validate
	 *
	 * If an array is set through this method, then this array will
	 * be used instead of the $_POST array
	 *
	 * Note that if you are validating multiple arrays, then the
	 * reset_validation() function should be called after validating
	 * each array due to the limitations of CI's singleton
	 *
	 * @param	array	$data
	 * @return	void
	 */
	public function set_data($data = '')
	{
		if ( ! empty($data) && is_array($data))
		{
			$this->validation_data = $data;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Set Error Message
	 *
	 * Lets users set their own error messages on the fly. Note:
	 * The key name has to match the function name that it corresponds to.
	 *
	 * @param	array
	 * @param	string
	 * @return	object
>>>>>>> codeigniter/develop
	 */
	public function set_message($lang, $val = '')
	{
		if ( ! is_array($lang))
		{
			$lang = array($lang => $val);
		}

		$this->_error_messages = array_merge($this->_error_messages, $lang);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set The Error Delimiter
	 *
	 * Permits a prefix/suffix to be added to each error message
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	void
=======
	 * @param	string
	 * @param	string
	 * @return	object
>>>>>>> codeigniter/develop
	 */
	public function set_error_delimiters($prefix = '<p>', $suffix = '</p>')
	{
		$this->_error_prefix = $prefix;
		$this->_error_suffix = $suffix;
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Get Error Message
	 *
	 * Gets the error message associated with a particular field
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the field name
	 * @return	void
	 */
	public function error($field = '', $prefix = '', $suffix = '')
	{
		if ( ! isset($this->_field_data[$field]['error']) OR $this->_field_data[$field]['error'] == '')
=======
	 * @param	string	the field name
	 * @param	string	the html start tag
	 * @param 	strign	the html end tag
	 * @return	string
	 */
	public function error($field = '', $prefix = '', $suffix = '')
	{
		if (empty($this->_field_data[$field]['error']))
>>>>>>> codeigniter/develop
		{
			return '';
		}

<<<<<<< HEAD
		if ($prefix == '')
=======
		if ($prefix === '')
>>>>>>> codeigniter/develop
		{
			$prefix = $this->_error_prefix;
		}

<<<<<<< HEAD
		if ($suffix == '')
=======
		if ($suffix === '')
>>>>>>> codeigniter/develop
		{
			$suffix = $this->_error_suffix;
		}

		return $prefix.$this->_field_data[$field]['error'].$suffix;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
=======
	 * Get Array of Error Messages
	 *
	 * Returns the error messages as an array
	 *
	 * @return	array
	 */
	public function error_array()
	{
		return $this->_error_array;
	}

	// --------------------------------------------------------------------

	/**
>>>>>>> codeigniter/develop
	 * Error String
	 *
	 * Returns the error messages as a string, wrapped in the error delimiters
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	str
=======
	 * @param	string
	 * @param	string
	 * @return	string
>>>>>>> codeigniter/develop
	 */
	public function error_string($prefix = '', $suffix = '')
	{
		// No errrors, validation passes!
		if (count($this->_error_array) === 0)
		{
			return '';
		}

<<<<<<< HEAD
		if ($prefix == '')
=======
		if ($prefix === '')
>>>>>>> codeigniter/develop
		{
			$prefix = $this->_error_prefix;
		}

<<<<<<< HEAD
		if ($suffix == '')
=======
		if ($suffix === '')
>>>>>>> codeigniter/develop
		{
			$suffix = $this->_error_suffix;
		}

		// Generate the error string
		$str = '';
		foreach ($this->_error_array as $val)
		{
<<<<<<< HEAD
			if ($val != '')
=======
			if ($val !== '')
>>>>>>> codeigniter/develop
			{
				$str .= $prefix.$val.$suffix."\n";
			}
		}

		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Run the Validator
	 *
	 * This function does all the work.
	 *
<<<<<<< HEAD
	 * @access	public
=======
	 * @param	string	$group
>>>>>>> codeigniter/develop
	 * @return	bool
	 */
	public function run($group = '')
	{
		// Do we even have any data to process?  Mm?
<<<<<<< HEAD
		if (count($_POST) == 0)
=======
		$validation_array = empty($this->validation_data) ? $_POST : $this->validation_data;
		if (count($validation_array) === 0)
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		// Does the _field_data array containing the validation rules exist?
		// If not, we look to see if they were assigned via a config file
<<<<<<< HEAD
		if (count($this->_field_data) == 0)
		{
			// No validation rules?  We're done...
			if (count($this->_config_rules) == 0)
=======
		if (count($this->_field_data) === 0)
		{
			// No validation rules?  We're done...
			if (count($this->_config_rules) === 0)
>>>>>>> codeigniter/develop
			{
				return FALSE;
			}

			// Is there a validation rule for the particular URI being accessed?
<<<<<<< HEAD
			$uri = ($group == '') ? trim($this->CI->uri->ruri_string(), '/') : $group;

			if ($uri != '' AND isset($this->_config_rules[$uri]))
=======
			$uri = ($group === '') ? trim($this->CI->uri->ruri_string(), '/') : $group;

			if ($uri !== '' && isset($this->_config_rules[$uri]))
>>>>>>> codeigniter/develop
			{
				$this->set_rules($this->_config_rules[$uri]);
			}
			else
			{
				$this->set_rules($this->_config_rules);
			}

<<<<<<< HEAD
			// We're we able to set the rules correctly?
			if (count($this->_field_data) == 0)
			{
				log_message('debug', "Unable to find validation rules");
=======
			// Were we able to set the rules correctly?
			if (count($this->_field_data) === 0)
			{
				log_message('debug', 'Unable to find validation rules');
>>>>>>> codeigniter/develop
				return FALSE;
			}
		}

		// Load the language file containing error messages
		$this->CI->lang->load('form_validation');

		// Cycle through the rules for each field, match the
		// corresponding $_POST item and test for errors
		foreach ($this->_field_data as $field => $row)
		{
<<<<<<< HEAD
			// Fetch the data from the corresponding $_POST array and cache it in the _field_data array.
			// Depending on whether the field name is an array or a string will determine where we get it from.

			if ($row['is_array'] == TRUE)
			{
				$this->_field_data[$field]['postdata'] = $this->_reduce_array($_POST, $row['keys']);
			}
			else
			{
				if (isset($_POST[$field]) AND $_POST[$field] != "")
				{
					$this->_field_data[$field]['postdata'] = $_POST[$field];
				}
=======
			// Fetch the data from the corresponding $_POST or validation array and cache it in the _field_data array.
			// Depending on whether the field name is an array or a string will determine where we get it from.
			if ($row['is_array'] === TRUE)
			{
				$this->_field_data[$field]['postdata'] = $this->_reduce_array($validation_array, $row['keys']);
			}
			elseif (isset($validation_array[$field]) && $validation_array[$field] !== '')
			{
				$this->_field_data[$field]['postdata'] = $validation_array[$field];
			}

			// Don't try to validate if we have no rules set
			if (empty($row['rules']))
			{
				continue;
>>>>>>> codeigniter/develop
			}

			$this->_execute($row, explode('|', $row['rules']), $this->_field_data[$field]['postdata']);
		}

		// Did we end up with any errors?
		$total_errors = count($this->_error_array);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		if ($total_errors > 0)
		{
			$this->_safe_form_data = TRUE;
		}

		// Now we need to re-set the POST data with the new, processed data
		$this->_reset_post_array();

<<<<<<< HEAD
		// No errors, validation passes!
		if ($total_errors == 0)
		{
			return TRUE;
		}

		// Validation fails
		return FALSE;
=======
		return ($total_errors === 0);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Traverse a multidimensional $_POST array index until the data is found
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	array
	 * @param	array
	 * @param	integer
=======
	 * @param	array
	 * @param	array
	 * @param	int
>>>>>>> codeigniter/develop
	 * @return	mixed
	 */
	protected function _reduce_array($array, $keys, $i = 0)
	{
<<<<<<< HEAD
		if (is_array($array))
		{
			if (isset($keys[$i]))
			{
				if (isset($array[$keys[$i]]))
				{
					$array = $this->_reduce_array($array[$keys[$i]], $keys, ($i+1));
				}
				else
				{
					return NULL;
				}
			}
			else
			{
				return $array;
			}
=======
		if (is_array($array) && isset($keys[$i]))
		{
			return isset($array[$keys[$i]]) ? $this->_reduce_array($array[$keys[$i]], $keys, ($i+1)) : NULL;
>>>>>>> codeigniter/develop
		}

		return $array;
	}

	// --------------------------------------------------------------------

	/**
	 * Re-populate the _POST array with our finalized and processed data
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	null
=======
	 * @return	void
>>>>>>> codeigniter/develop
	 */
	protected function _reset_post_array()
	{
		foreach ($this->_field_data as $field => $row)
		{
			if ( ! is_null($row['postdata']))
			{
<<<<<<< HEAD
				if ($row['is_array'] == FALSE)
=======
				if ($row['is_array'] === FALSE)
>>>>>>> codeigniter/develop
				{
					if (isset($_POST[$row['field']]))
					{
						$_POST[$row['field']] = $this->prep_for_form($row['postdata']);
					}
				}
				else
				{
					// start with a reference
					$post_ref =& $_POST;

					// before we assign values, make a reference to the right POST key
<<<<<<< HEAD
					if (count($row['keys']) == 1)
=======
					if (count($row['keys']) === 1)
>>>>>>> codeigniter/develop
					{
						$post_ref =& $post_ref[current($row['keys'])];
					}
					else
					{
						foreach ($row['keys'] as $val)
						{
							$post_ref =& $post_ref[$val];
						}
					}

					if (is_array($row['postdata']))
					{
						$array = array();
						foreach ($row['postdata'] as $k => $v)
						{
							$array[$k] = $this->prep_for_form($v);
						}

						$post_ref = $array;
					}
					else
					{
						$post_ref = $this->prep_for_form($row['postdata']);
					}
				}
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Executes the Validation routines
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	array
	 * @param	array
	 * @param	mixed
	 * @param	integer
=======
	 * @param	array
	 * @param	array
	 * @param	mixed
	 * @param	int
>>>>>>> codeigniter/develop
	 * @return	mixed
	 */
	protected function _execute($row, $rules, $postdata = NULL, $cycles = 0)
	{
		// If the $_POST data is an array we will run a recursive call
		if (is_array($postdata))
		{
			foreach ($postdata as $key => $val)
			{
<<<<<<< HEAD
				$this->_execute($row, $rules, $val, $cycles);
				$cycles++;
=======
				$this->_execute($row, $rules, $val, $key);
>>>>>>> codeigniter/develop
			}

			return;
		}

<<<<<<< HEAD
		// --------------------------------------------------------------------

		// If the field is blank, but NOT required, no further tests are necessary
		$callback = FALSE;
		if ( ! in_array('required', $rules) AND is_null($postdata))
		{
			// Before we bail out, does the rule contain a callback?
			if (preg_match("/(callback_\w+(\[.*?\])?)/", implode(' ', $rules), $match))
			{
				$callback = TRUE;
				$rules = (array('1' => $match[1]));
=======
		// If the field is blank, but NOT required, no further tests are necessary
		$callback = FALSE;
		if ( ! in_array('required', $rules) && is_null($postdata))
		{
			// Before we bail out, does the rule contain a callback?
			if (preg_match('/(callback_\w+(\[.*?\])?)/', implode(' ', $rules), $match))
			{
				$callback = TRUE;
				$rules = array(1 => $match[1]);
>>>>>>> codeigniter/develop
			}
			else
			{
				return;
			}
		}

<<<<<<< HEAD
		// --------------------------------------------------------------------

		// Isset Test. Typically this rule will only apply to checkboxes.
		if (is_null($postdata) AND $callback == FALSE)
=======
		// Isset Test. Typically this rule will only apply to checkboxes.
		if (is_null($postdata) && $callback === FALSE)
>>>>>>> codeigniter/develop
		{
			if (in_array('isset', $rules, TRUE) OR in_array('required', $rules))
			{
				// Set the message type
<<<<<<< HEAD
				$type = (in_array('required', $rules)) ? 'required' : 'isset';

				if ( ! isset($this->_error_messages[$type]))
				{
					if (FALSE === ($line = $this->CI->lang->line($type)))
					{
						$line = 'The field was not set';
					}
				}
				else
				{
					$line = $this->_error_messages[$type];
=======
				$type = in_array('required', $rules) ? 'required' : 'isset';

				if (isset($this->_error_messages[$type]))
				{
					$line = $this->_error_messages[$type];
				}
				elseif (FALSE === ($line = $this->CI->lang->line($type)))
				{
					$line = 'The field was not set';
>>>>>>> codeigniter/develop
				}

				// Build the error message
				$message = sprintf($line, $this->_translate_fieldname($row['label']));

				// Save the error message
				$this->_field_data[$row['field']]['error'] = $message;

				if ( ! isset($this->_error_array[$row['field']]))
				{
					$this->_error_array[$row['field']] = $message;
				}
			}

			return;
		}

		// --------------------------------------------------------------------

		// Cycle through each rule and run it
<<<<<<< HEAD
		foreach ($rules As $rule)
=======
		foreach ($rules as $rule)
>>>>>>> codeigniter/develop
		{
			$_in_array = FALSE;

			// We set the $postdata variable with the current data in our master array so that
			// each cycle of the loop is dealing with the processed data from the last cycle
<<<<<<< HEAD
			if ($row['is_array'] == TRUE AND is_array($this->_field_data[$row['field']]['postdata']))
=======
			if ($row['is_array'] === TRUE && is_array($this->_field_data[$row['field']]['postdata']))
>>>>>>> codeigniter/develop
			{
				// We shouldn't need this safety, but just in case there isn't an array index
				// associated with this cycle we'll bail out
				if ( ! isset($this->_field_data[$row['field']]['postdata'][$cycles]))
				{
					continue;
				}

				$postdata = $this->_field_data[$row['field']]['postdata'][$cycles];
				$_in_array = TRUE;
			}
			else
			{
<<<<<<< HEAD
				$postdata = $this->_field_data[$row['field']]['postdata'];
			}

			// --------------------------------------------------------------------

			// Is the rule a callback?
			$callback = FALSE;
			if (substr($rule, 0, 9) == 'callback_')
=======
				// If we get an array field, but it's not expected - then it is most likely
				// somebody messing with the form on the client side, so we'll just consider
				// it an empty field
				$postdata = is_array($this->_field_data[$row['field']]['postdata'])
						? NULL
						: $this->_field_data[$row['field']]['postdata'];
			}

			// Is the rule a callback?
			$callback = FALSE;
			if (strpos($rule, 'callback_') === 0)
>>>>>>> codeigniter/develop
			{
				$rule = substr($rule, 9);
				$callback = TRUE;
			}

			// Strip the parameter (if exists) from the rule
			// Rules can contain a parameter: max_length[5]
			$param = FALSE;
<<<<<<< HEAD
			if (preg_match("/(.*?)\[(.*)\]/", $rule, $match))
=======
			if (preg_match('/(.*?)\[(.*)\]/', $rule, $match))
>>>>>>> codeigniter/develop
			{
				$rule	= $match[1];
				$param	= $match[2];
			}

			// Call the function that corresponds to the rule
			if ($callback === TRUE)
			{
				if ( ! method_exists($this->CI, $rule))
				{
<<<<<<< HEAD
					continue;
				}

				// Run the function and grab the result
				$result = $this->CI->$rule($postdata, $param);

				// Re-assign the result to the master data array
				if ($_in_array == TRUE)
				{
					$this->_field_data[$row['field']]['postdata'][$cycles] = (is_bool($result)) ? $postdata : $result;
				}
				else
				{
					$this->_field_data[$row['field']]['postdata'] = (is_bool($result)) ? $postdata : $result;
				}

				// If the field isn't required and we just processed a callback we'll move on...
				if ( ! in_array('required', $rules, TRUE) AND $result !== FALSE)
=======
					log_message('debug', 'Unable to find callback validation rule: '.$rule);
					$result = FALSE;
				}
				else
				{
					// Run the function and grab the result
					$result = $this->CI->$rule($postdata, $param);
				}

				// Re-assign the result to the master data array
				if ($_in_array === TRUE)
				{
					$this->_field_data[$row['field']]['postdata'][$cycles] = is_bool($result) ? $postdata : $result;
				}
				else
				{
					$this->_field_data[$row['field']]['postdata'] = is_bool($result) ? $postdata : $result;
				}

				// If the field isn't required and we just processed a callback we'll move on...
				if ( ! in_array('required', $rules, TRUE) && $result !== FALSE)
>>>>>>> codeigniter/develop
				{
					continue;
				}
			}
<<<<<<< HEAD
			else
			{
				if ( ! method_exists($this, $rule))
				{
					// If our own wrapper function doesn't exist we see if a native PHP function does.
					// Users can use any native PHP function call that has one param.
					if (function_exists($rule))
					{
						$result = $rule($postdata);

						if ($_in_array == TRUE)
						{
							$this->_field_data[$row['field']]['postdata'][$cycles] = (is_bool($result)) ? $postdata : $result;
						}
						else
						{
							$this->_field_data[$row['field']]['postdata'] = (is_bool($result)) ? $postdata : $result;
						}
					}
					else
					{
						log_message('debug', "Unable to find validation rule: ".$rule);
					}

					continue;
				}

				$result = $this->$rule($postdata, $param);

				if ($_in_array == TRUE)
				{
					$this->_field_data[$row['field']]['postdata'][$cycles] = (is_bool($result)) ? $postdata : $result;
				}
				else
				{
					$this->_field_data[$row['field']]['postdata'] = (is_bool($result)) ? $postdata : $result;
				}
			}

			// Did the rule test negatively?  If so, grab the error.
=======
			elseif ( ! method_exists($this, $rule))
			{
				// If our own wrapper function doesn't exist we see if a native PHP function does.
				// Users can use any native PHP function call that has one param.
				if (function_exists($rule))
				{
					$result = ($param !== FALSE) ? $rule($postdata, $param) : $rule($postdata);

					if ($_in_array === TRUE)
					{
						$this->_field_data[$row['field']]['postdata'][$cycles] = is_bool($result) ? $postdata : $result;
					}
					else
					{
						$this->_field_data[$row['field']]['postdata'] = is_bool($result) ? $postdata : $result;
					}
				}
				else
				{
					log_message('debug', 'Unable to find validation rule: '.$rule);
					$result = FALSE;
				}
			}
			else
			{
				$result = $this->$rule($postdata, $param);

				if ($_in_array === TRUE)
				{
					$this->_field_data[$row['field']]['postdata'][$cycles] = is_bool($result) ? $postdata : $result;
				}
				else
				{
					$this->_field_data[$row['field']]['postdata'] = is_bool($result) ? $postdata : $result;
				}
			}

			// Did the rule test negatively? If so, grab the error.
>>>>>>> codeigniter/develop
			if ($result === FALSE)
			{
				if ( ! isset($this->_error_messages[$rule]))
				{
					if (FALSE === ($line = $this->CI->lang->line($rule)))
					{
						$line = 'Unable to access an error message corresponding to your field name.';
					}
				}
				else
				{
					$line = $this->_error_messages[$rule];
				}

				// Is the parameter we are inserting into the error message the name
<<<<<<< HEAD
				// of another field?  If so we need to grab its "field label"
				if (isset($this->_field_data[$param]) AND isset($this->_field_data[$param]['label']))
=======
				// of another field? If so we need to grab its "field label"
				if (isset($this->_field_data[$param], $this->_field_data[$param]['label']))
>>>>>>> codeigniter/develop
				{
					$param = $this->_translate_fieldname($this->_field_data[$param]['label']);
				}

				// Build the error message
				$message = sprintf($line, $this->_translate_fieldname($row['label']), $param);

				// Save the error message
				$this->_field_data[$row['field']]['error'] = $message;

				if ( ! isset($this->_error_array[$row['field']]))
				{
					$this->_error_array[$row['field']] = $message;
				}

				return;
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Translate a field name
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string	the field name
	 * @return	string
	 */
	protected function _translate_fieldname($fieldname)
	{
		// Do we need to translate the field name?
		// We look for the prefix lang: to determine this
<<<<<<< HEAD
		if (substr($fieldname, 0, 5) == 'lang:')
=======
		if (strpos($fieldname, 'lang:') === 0)
>>>>>>> codeigniter/develop
		{
			// Grab the variable
			$line = substr($fieldname, 5);

			// Were we able to translate the field name?  If not we use $line
			if (FALSE === ($fieldname = $this->CI->lang->line($line)))
			{
				return $line;
			}
		}

		return $fieldname;
	}

	// --------------------------------------------------------------------

	/**
	 * Get the value from a form
	 *
	 * Permits you to repopulate a form field with the value it was submitted
	 * with, or, if that value doesn't exist, with the default
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the field name
	 * @param	string
	 * @return	void
	 */
	public function set_value($field = '', $default = '')
	{
		if ( ! isset($this->_field_data[$field]))
=======
	 * @param	string	the field name
	 * @param	string
	 * @return	string
	 */
	public function set_value($field = '', $default = '')
	{
		if ( ! isset($this->_field_data[$field], $this->_field_data[$field]['postdata']))
>>>>>>> codeigniter/develop
		{
			return $default;
		}

		// If the data is an array output them one at a time.
<<<<<<< HEAD
		//     E.g: form_input('name[]', set_value('name[]');
=======
		//	E.g: form_input('name[]', set_value('name[]');
>>>>>>> codeigniter/develop
		if (is_array($this->_field_data[$field]['postdata']))
		{
			return array_shift($this->_field_data[$field]['postdata']);
		}

		return $this->_field_data[$field]['postdata'];
	}

	// --------------------------------------------------------------------

	/**
	 * Set Select
	 *
	 * Enables pull-down lists to be set to the value the user
	 * selected in the event of an error
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	string
=======
	 * @param	string
	 * @param	string
	 * @param	bool
>>>>>>> codeigniter/develop
	 * @return	string
	 */
	public function set_select($field = '', $value = '', $default = FALSE)
	{
<<<<<<< HEAD
		if ( ! isset($this->_field_data[$field]) OR ! isset($this->_field_data[$field]['postdata']))
		{
			if ($default === TRUE AND count($this->_field_data) === 0)
			{
				return ' selected="selected"';
			}
			return '';
		}

		$field = $this->_field_data[$field]['postdata'];

=======
		if ( ! isset($this->_field_data[$field], $this->_field_data[$field]['postdata']))
		{
			return ($default === TRUE && count($this->_field_data) === 0) ? ' selected="selected"' : '';
		}

		$field = $this->_field_data[$field]['postdata'];
>>>>>>> codeigniter/develop
		if (is_array($field))
		{
			if ( ! in_array($value, $field))
			{
				return '';
			}
		}
<<<<<<< HEAD
		else
		{
			if (($field == '' OR $value == '') OR ($field != $value))
			{
				return '';
			}
=======
		elseif (($field === '' OR $value === '') OR ($field !== $value))
		{
			return '';
>>>>>>> codeigniter/develop
		}

		return ' selected="selected"';
	}

	// --------------------------------------------------------------------

	/**
	 * Set Radio
	 *
	 * Enables radio buttons to be set to the value the user
	 * selected in the event of an error
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	string
=======
	 * @param	string
	 * @param	string
	 * @param	bool
>>>>>>> codeigniter/develop
	 * @return	string
	 */
	public function set_radio($field = '', $value = '', $default = FALSE)
	{
<<<<<<< HEAD
		if ( ! isset($this->_field_data[$field]) OR ! isset($this->_field_data[$field]['postdata']))
		{
			if ($default === TRUE AND count($this->_field_data) === 0)
			{
				return ' checked="checked"';
			}
			return '';
		}

		$field = $this->_field_data[$field]['postdata'];

=======
		if ( ! isset($this->_field_data[$field], $this->_field_data[$field]['postdata']))
		{
			return ($default === TRUE && count($this->_field_data) === 0) ? ' checked="checked"' : '';
		}

		$field = $this->_field_data[$field]['postdata'];
>>>>>>> codeigniter/develop
		if (is_array($field))
		{
			if ( ! in_array($value, $field))
			{
				return '';
			}
		}
<<<<<<< HEAD
		else
		{
			if (($field == '' OR $value == '') OR ($field != $value))
			{
				return '';
			}
=======
		elseif (($field === '' OR $value === '') OR ($field !== $value))
		{
			return '';
>>>>>>> codeigniter/develop
		}

		return ' checked="checked"';
	}

	// --------------------------------------------------------------------

	/**
	 * Set Checkbox
	 *
	 * Enables checkboxes to be set to the value the user
	 * selected in the event of an error
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	string
=======
	 * @param	string
	 * @param	string
	 * @param	bool
>>>>>>> codeigniter/develop
	 * @return	string
	 */
	public function set_checkbox($field = '', $value = '', $default = FALSE)
	{
<<<<<<< HEAD
		if ( ! isset($this->_field_data[$field]) OR ! isset($this->_field_data[$field]['postdata']))
		{
			if ($default === TRUE AND count($this->_field_data) === 0)
			{
				return ' checked="checked"';
			}
			return '';
		}

		$field = $this->_field_data[$field]['postdata'];

		if (is_array($field))
		{
			if ( ! in_array($value, $field))
			{
				return '';
			}
		}
		else
		{
			if (($field == '' OR $value == '') OR ($field != $value))
			{
				return '';
			}
		}

		return ' checked="checked"';
=======
		// Logic is exactly the same as for radio fields
		return $this->set_radio($field, $value, $default);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Required
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function required($str)
	{
<<<<<<< HEAD
		if ( ! is_array($str))
		{
			return (trim($str) == '') ? FALSE : TRUE;
		}
		else
		{
			return ( ! empty($str));
		}
=======
		return is_array($str) ? (bool) count($str) : (trim($str) !== '');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Performs a Regular Expression match test.
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	regex
=======
	 * @param	string
	 * @param	string	regex
>>>>>>> codeigniter/develop
	 * @return	bool
	 */
	public function regex_match($str, $regex)
	{
<<<<<<< HEAD
		if ( ! preg_match($regex, $str))
		{
			return FALSE;
		}

		return  TRUE;
=======
		return (bool) preg_match($regex, $str);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Match one field to another
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	field
=======
	 * @param	string
	 * @param	string	field
>>>>>>> codeigniter/develop
	 * @return	bool
	 */
	public function matches($str, $field)
	{
<<<<<<< HEAD
		if ( ! isset($_POST[$field]))
		{
			return FALSE;
		}

		$field = $_POST[$field];

		return ($str !== $field) ? FALSE : TRUE;
	}
	
	// --------------------------------------------------------------------

	/**
	 * Match one field to another
	 *
	 * @access	public
	 * @param	string
	 * @param	field
=======
		$validation_array = empty($this->validation_data) ? $_POST : $this->validation_data;

		return isset($validation_array[$field]) ? ($str === $validation_array[$field]) : FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Differs from another field
	 *
	 * @param	string
	 * @param	string	field
	 * @return	bool
	 */
	public function differs($str, $field)
	{
		return ! (isset($this->_field_data[$field]) && $this->_field_data[$field]['postdata'] === $str);
	}

	// --------------------------------------------------------------------

	/**
	 * Is Unique
	 *
	 * Check if the input value doesn't already exist
	 * in the specified database field.
	 *
	 * @param	string
	 * @param	string	field
>>>>>>> codeigniter/develop
	 * @return	bool
	 */
	public function is_unique($str, $field)
	{
<<<<<<< HEAD
		list($table, $field)=explode('.', $field);
		$query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
		
		return $query->num_rows() === 0;
    }
=======
		list($table, $field) = explode('.', $field);
		if (isset($this->CI->db))
		{
			$query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
			return $query->num_rows() === 0;
		}
		return FALSE;
	}
>>>>>>> codeigniter/develop

	// --------------------------------------------------------------------

	/**
	 * Minimum Length
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	value
=======
	 * @param	string
	 * @param	string
>>>>>>> codeigniter/develop
	 * @return	bool
	 */
	public function min_length($str, $val)
	{
<<<<<<< HEAD
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}

		if (function_exists('mb_strlen'))
		{
			return (mb_strlen($str) < $val) ? FALSE : TRUE;
		}

		return (strlen($str) < $val) ? FALSE : TRUE;
=======
		if ( ! is_numeric($val))
		{
			return FALSE;
		}
		else
		{
			$val = (int) $val;
		}

		return (MB_ENABLED === TRUE)
			? ($val <= mb_strlen($str))
			: ($val <= strlen($str));
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Max Length
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	value
=======
	 * @param	string
	 * @param	string
>>>>>>> codeigniter/develop
	 * @return	bool
	 */
	public function max_length($str, $val)
	{
<<<<<<< HEAD
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}

		if (function_exists('mb_strlen'))
		{
			return (mb_strlen($str) > $val) ? FALSE : TRUE;
		}

		return (strlen($str) > $val) ? FALSE : TRUE;
=======
		if ( ! is_numeric($val))
		{
			return FALSE;
		}
		else
		{
			$val = (int) $val;
		}

		return (MB_ENABLED === TRUE)
			? ($val >= mb_strlen($str))
			: ($val >= strlen($str));
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Exact Length
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	value
=======
	 * @param	string
	 * @param	string
>>>>>>> codeigniter/develop
	 * @return	bool
	 */
	public function exact_length($str, $val)
	{
<<<<<<< HEAD
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}

		if (function_exists('mb_strlen'))
		{
			return (mb_strlen($str) != $val) ? FALSE : TRUE;
		}

		return (strlen($str) != $val) ? FALSE : TRUE;
=======
		if ( ! is_numeric($val))
		{
			return FALSE;
		}
		else
		{
			$val = (int) $val;
		}

		return (MB_ENABLED === TRUE)
			? (mb_strlen($str) === $val)
			: (strlen($str) === $val);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Valid Email
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function valid_email($str)
	{
<<<<<<< HEAD
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
=======
		return (bool) filter_var($str, FILTER_VALIDATE_EMAIL);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Valid Emails
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function valid_emails($str)
	{
		if (strpos($str, ',') === FALSE)
		{
			return $this->valid_email(trim($str));
		}

		foreach (explode(',', $str) as $email)
		{
<<<<<<< HEAD
			if (trim($email) != '' && $this->valid_email(trim($email)) === FALSE)
=======
			if (trim($email) !== '' && $this->valid_email(trim($email)) === FALSE)
>>>>>>> codeigniter/develop
			{
				return FALSE;
			}
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Validate IP Address
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	string "ipv4" or "ipv6" to validate a specific ip format
	 * @return	string
=======
	 * @param	string
	 * @param	string	'ipv4' or 'ipv6' to validate a specific IP format
	 * @return	bool
>>>>>>> codeigniter/develop
	 */
	public function valid_ip($ip, $which = '')
	{
		return $this->CI->input->valid_ip($ip, $which);
	}

	// --------------------------------------------------------------------

	/**
	 * Alpha
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function alpha($str)
	{
<<<<<<< HEAD
		return ( ! preg_match("/^([a-z])+$/i", $str)) ? FALSE : TRUE;
=======
		return ctype_alpha($str);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Alpha-numeric
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function alpha_numeric($str)
	{
<<<<<<< HEAD
		return ( ! preg_match("/^([a-z0-9])+$/i", $str)) ? FALSE : TRUE;
=======
		return ctype_alnum((string) $str);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Alpha-numeric with underscores and dashes
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function alpha_dash($str)
	{
<<<<<<< HEAD
		return ( ! preg_match("/^([-a-z0-9_-])+$/i", $str)) ? FALSE : TRUE;
=======
		return (bool) preg_match('/^[a-z0-9_-]+$/i', $str);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Numeric
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function numeric($str)
	{
<<<<<<< HEAD
		return (bool)preg_match( '/^[\-+]?[0-9]*\.?[0-9]+$/', $str);
=======
		return (bool) preg_match('/^[\-+]?[0-9]*\.?[0-9]+$/', $str);
>>>>>>> codeigniter/develop

	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Is Numeric
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function is_numeric($str)
	{
		return ( ! is_numeric($str)) ? FALSE : TRUE;
=======
	 * Integer
	 *
	 * @param	string
	 * @return	bool
	 */
	public function integer($str)
	{
		return (bool) preg_match('/^[\-+]?[0-9]+$/', $str);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Integer
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function integer($str)
	{
		return (bool) preg_match('/^[\-+]?[0-9]+$/', $str);
=======
	 * Decimal number
	 *
	 * @param	string
	 * @return	bool
	 */
	public function decimal($str)
	{
		return (bool) preg_match('/^[\-+]?[0-9]+\.[0-9]+$/', $str);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Decimal number
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function decimal($str)
	{
		return (bool) preg_match('/^[\-+]?[0-9]+\.[0-9]+$/', $str);
=======
	 * Greater than
	 *
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	public function greater_than($str, $min)
	{
		return is_numeric($str) ? ($str > $min) : FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Greather than
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function greater_than($str, $min)
	{
		if ( ! is_numeric($str))
		{
			return FALSE;
		}
		return $str > $min;
=======
	 * Equal to or Greater than
	 *
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	public function greater_than_equal_to($str, $min)
	{
		return is_numeric($str) ? ($str >= $min) : FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Less than
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
=======
	 * @param	string
	 * @param	int
>>>>>>> codeigniter/develop
	 * @return	bool
	 */
	public function less_than($str, $max)
	{
<<<<<<< HEAD
		if ( ! is_numeric($str))
		{
			return FALSE;
		}
		return $str < $max;
=======
		return is_numeric($str) ? ($str < $max) : FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Equal to or Less than
	 *
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	public function less_than_equal_to($str, $max)
	{
		return is_numeric($str) ? ($str <= $max) : FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Is a Natural number  (0,1,2,3, etc.)
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function is_natural($str)
	{
<<<<<<< HEAD
		return (bool) preg_match( '/^[0-9]+$/', $str);
=======
		return ctype_digit((string) $str);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Is a Natural number, but not a zero  (1,2,3, etc.)
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function is_natural_no_zero($str)
	{
<<<<<<< HEAD
		if ( ! preg_match( '/^[0-9]+$/', $str))
		{
			return FALSE;
		}

		if ($str == 0)
		{
			return FALSE;
		}

		return TRUE;
=======
		return ($str != 0 && ctype_digit((string) $str));
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Valid Base64
	 *
	 * Tests a string for characters outside of the Base64 alphabet
	 * as defined by RFC 2045 http://www.faqs.org/rfcs/rfc2045
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	bool
	 */
	public function valid_base64($str)
	{
<<<<<<< HEAD
		return (bool) ! preg_match('/[^a-zA-Z0-9\/\+=]/', $str);
=======
		return ! preg_match('/[^a-zA-Z0-9\/\+=]/', $str);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Prep data for form
	 *
	 * This function allows HTML to be safely shown in a form.
	 * Special characters are converted.
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	string
	 */
	public function prep_for_form($data = '')
	{
		if (is_array($data))
		{
			foreach ($data as $key => $val)
			{
				$data[$key] = $this->prep_for_form($val);
			}

			return $data;
		}

<<<<<<< HEAD
		if ($this->_safe_form_data == FALSE OR $data === '')
=======
		if ($this->_safe_form_data === FALSE OR $data === '')
>>>>>>> codeigniter/develop
		{
			return $data;
		}

<<<<<<< HEAD
		return str_replace(array("'", '"', '<', '>'), array("&#39;", "&quot;", '&lt;', '&gt;'), stripslashes($data));
=======
		return str_replace(array("'", '"', '<', '>'), array('&#39;', '&quot;', '&lt;', '&gt;'), stripslashes($data));
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Prep URL
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	string
	 */
	public function prep_url($str = '')
	{
<<<<<<< HEAD
		if ($str == 'http://' OR $str == '')
=======
		if ($str === 'http://' OR $str === '')
>>>>>>> codeigniter/develop
		{
			return '';
		}

<<<<<<< HEAD
		if (substr($str, 0, 7) != 'http://' && substr($str, 0, 8) != 'https://')
		{
			$str = 'http://'.$str;
=======
		if (strpos($str, 'http://') !== 0 && strpos($str, 'https://') !== 0)
		{
			return 'http://'.$str;
>>>>>>> codeigniter/develop
		}

		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Strip Image Tags
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	string
	 */
	public function strip_image_tags($str)
	{
<<<<<<< HEAD
		return $this->CI->input->strip_image_tags($str);
=======
		return $this->CI->security->strip_image_tags($str);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * XSS Clean
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	string
	 */
	public function xss_clean($str)
	{
		return $this->CI->security->xss_clean($str);
	}

	// --------------------------------------------------------------------

	/**
	 * Convert PHP tags to entities
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @return	string
	 */
	public function encode_php_tags($str)
	{
<<<<<<< HEAD
		return str_replace(array('<?php', '<?PHP', '<?', '?>'),  array('&lt;?php', '&lt;?PHP', '&lt;?', '?&gt;'), $str);
	}

}
// END Form Validation Class

/* End of file Form_validation.php */
/* Location: ./system/libraries/Form_validation.php */
=======
		return str_replace(array('<?', '?>'),  array('&lt;?', '?&gt;'), $str);
	}

	// --------------------------------------------------------------------

	/**
	 * Reset validation vars
	 *
	 * Prevents subsequent validation routines from being affected by the
	 * results of any previous validation routine due to the CI singleton.
	 *
	 * @return	void
	 */
	public function reset_validation()
	{
		$this->_field_data = array();
		$this->_config_rules = array();
		$this->_error_array = array();
		$this->_error_messages = array();
		$this->error_string = '';
	}

}

/* End of file Form_validation.php */
/* Location: ./system/libraries/Form_validation.php */
>>>>>>> codeigniter/develop
