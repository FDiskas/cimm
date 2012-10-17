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
 * @since		Version 1.3.1
 * @filesource
 */

<<<<<<< HEAD
// ------------------------------------------------------------------------

=======
>>>>>>> codeigniter/develop
/**
 * Unit Testing Class
 *
 * Simple testing class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	UnitTesting
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/uri.html
 */
class CI_Unit_test {

	var $active					= TRUE;
	var $results				= array();
	var $strict					= FALSE;
	var $_template				= NULL;
	var $_template_rows			= NULL;
	var $_test_items_visible	= array();
=======
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/unit_testing.html
 */
class CI_Unit_test {

	public $active					= TRUE;
	public $results				= array();
	public $strict					= FALSE;
	protected $_template				= NULL;
	protected $_template_rows			= NULL;
	protected $_test_items_visible	= array();
>>>>>>> codeigniter/develop

	public function __construct()
	{
		// These are the default items visible when a test is run.
		$this->_test_items_visible = array (
							'test_name',
							'test_datatype',
							'res_datatype',
							'result',
							'file',
							'line',
							'notes'
						);

<<<<<<< HEAD
		log_message('debug', "Unit Testing Class Initialized");
=======
		log_message('debug', 'Unit Testing Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Run the tests
	 *
	 * Runs the supplied tests
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function set_test_items($items = array())
	{
		if ( ! empty($items) AND is_array($items))
=======
	 * @param	array
	 * @return	void
	 */
	public function set_test_items($items = array())
	{
		if ( ! empty($items) && is_array($items))
>>>>>>> codeigniter/develop
		{
			$this->_test_items_visible = $items;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Run the tests
	 *
	 * Runs the supplied tests
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	mixed
	 * @param	mixed
	 * @param	string
	 * @return	string
	 */
<<<<<<< HEAD
	function run($test, $expected = TRUE, $test_name = 'undefined', $notes = '')
	{
		if ($this->active == FALSE)
=======
	public function run($test, $expected = TRUE, $test_name = 'undefined', $notes = '')
	{
		if ($this->active === FALSE)
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		if (in_array($expected, array('is_object', 'is_string', 'is_bool', 'is_true', 'is_false', 'is_int', 'is_numeric', 'is_float', 'is_double', 'is_array', 'is_null'), TRUE))
		{
<<<<<<< HEAD
			$expected = str_replace('is_float', 'is_double', $expected);
			$result = ($expected($test)) ? TRUE : FALSE;
=======
			$expected = str_replace('is_double', 'is_float', $expected);
			$result = $expected($test);
>>>>>>> codeigniter/develop
			$extype = str_replace(array('true', 'false'), 'bool', str_replace('is_', '', $expected));
		}
		else
		{
<<<<<<< HEAD
			if ($this->strict == TRUE)
				$result = ($test === $expected) ? TRUE : FALSE;
			else
				$result = ($test == $expected) ? TRUE : FALSE;

=======
			$result = ($this->strict === TRUE) ? ($test === $expected) : ($test === $expected);
>>>>>>> codeigniter/develop
			$extype = gettype($expected);
		}

		$back = $this->_backtrace();

		$report[] = array (
							'test_name'			=> $test_name,
							'test_datatype'		=> gettype($test),
							'res_datatype'		=> $extype,
							'result'			=> ($result === TRUE) ? 'passed' : 'failed',
							'file'				=> $back['file'],
							'line'				=> $back['line'],
							'notes'				=> $notes
						);

		$this->results[] = $report;

<<<<<<< HEAD
		return($this->report($this->result($report)));
=======
		return $this->report($this->result($report));
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Generate a report
	 *
	 * Displays a table with the test data
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	string
	 */
	function report($result = array())
	{
		if (count($result) == 0)
=======
	 * @return	string
	 */
	public function report($result = array())
	{
		if (count($result) === 0)
>>>>>>> codeigniter/develop
		{
			$result = $this->result();
		}

		$CI =& get_instance();
		$CI->load->language('unit_test');

		$this->_parse_template();

		$r = '';
		foreach ($result as $res)
		{
			$table = '';

			foreach ($res as $key => $val)
			{
<<<<<<< HEAD
				if ($key == $CI->lang->line('ut_result'))
				{
					if ($val == $CI->lang->line('ut_passed'))
					{
						$val = '<span style="color: #0C0;">'.$val.'</span>';
					}
					elseif ($val == $CI->lang->line('ut_failed'))
=======
				if ($key === $CI->lang->line('ut_result'))
				{
					if ($val === $CI->lang->line('ut_passed'))
					{
						$val = '<span style="color: #0C0;">'.$val.'</span>';
					}
					elseif ($val === $CI->lang->line('ut_failed'))
>>>>>>> codeigniter/develop
					{
						$val = '<span style="color: #C00;">'.$val.'</span>';
					}
				}

<<<<<<< HEAD
				$temp = $this->_template_rows;
				$temp = str_replace('{item}', $key, $temp);
				$temp = str_replace('{result}', $val, $temp);
				$table .= $temp;
=======
				$table .= str_replace(array('{item}', '{result}'), array($key, $val), $this->_template_rows);
>>>>>>> codeigniter/develop
			}

			$r .= str_replace('{rows}', $table, $this->_template);
		}

		return $r;
	}

	// --------------------------------------------------------------------

	/**
	 * Use strict comparison
	 *
	 * Causes the evaluation to use === rather than ==
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	bool
	 * @return	null
	 */
	function use_strict($state = TRUE)
	{
		$this->strict = ($state == FALSE) ? FALSE : TRUE;
=======
	 * @param	bool
	 * @return	void
	 */
	public function use_strict($state = TRUE)
	{
		$this->strict = (bool) $state;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Make Unit testing active
	 *
	 * Enables/disables unit testing
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	bool
	 * @return	null
	 */
	function active($state = TRUE)
	{
		$this->active = ($state == FALSE) ? FALSE : TRUE;
=======
	 * @param	bool
	 * @return	void
	 */
	public function active($state = TRUE)
	{
		$this->active = (bool) $state;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Result Array
	 *
	 * Returns the raw result data
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	array
	 */
	function result($results = array())
=======
	 * @return	array
	 */
	public function result($results = array())
>>>>>>> codeigniter/develop
	{
		$CI =& get_instance();
		$CI->load->language('unit_test');

<<<<<<< HEAD
		if (count($results) == 0)
=======
		if (count($results) === 0)
>>>>>>> codeigniter/develop
		{
			$results = $this->results;
		}

		$retval = array();
		foreach ($results as $result)
		{
			$temp = array();
			foreach ($result as $key => $val)
			{
				if ( ! in_array($key, $this->_test_items_visible))
				{
					continue;
				}

				if (is_array($val))
				{
					foreach ($val as $k => $v)
					{
<<<<<<< HEAD
=======
						if ( ! in_array($k, $this->_test_items_visible))
						{
							continue;
						}

>>>>>>> codeigniter/develop
						if (FALSE !== ($line = $CI->lang->line(strtolower('ut_'.$v))))
						{
							$v = $line;
						}
						$temp[$CI->lang->line('ut_'.$k)] = $v;
					}
				}
				else
				{
					if (FALSE !== ($line = $CI->lang->line(strtolower('ut_'.$val))))
					{
						$val = $line;
					}
					$temp[$CI->lang->line('ut_'.$key)] = $val;
				}
			}

			$retval[] = $temp;
		}

		return $retval;
	}

	// --------------------------------------------------------------------

	/**
	 * Set the template
	 *
	 * This lets us set the template to be used to display results
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_template($template)
=======
	 * @param	string
	 * @return	void
	 */
	public function set_template($template)
>>>>>>> codeigniter/develop
	{
		$this->_template = $template;
	}

	// --------------------------------------------------------------------

	/**
	 * Generate a backtrace
	 *
	 * This lets us show file names and line numbers
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	array
	 */
	function _backtrace()
	{
		if (function_exists('debug_backtrace'))
		{
			$back = debug_backtrace();

			$file = ( ! isset($back['1']['file'])) ? '' : $back['1']['file'];
			$line = ( ! isset($back['1']['line'])) ? '' : $back['1']['line'];

			return array('file' => $file, 'line' => $line);
		}
		return array('file' => 'Unknown', 'line' => 'Unknown');
=======
	 * @return	array
	 */
	protected function _backtrace()
	{
		$back = debug_backtrace();
		return array(
				'file' => (isset($back[1]['file']) ? $back[1]['file'] : ''),
				'line' => (isset($back[1]['line']) ? $back[1]['line'] : '')
			);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Get Default Template
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	string
	 */
	function _default_template()
	{
		$this->_template = "\n".'<table style="width:100%; font-size:small; margin:10px 0; border-collapse:collapse; border:1px solid #CCC;">';
		$this->_template .= '{rows}';
		$this->_template .= "\n".'</table>';

		$this->_template_rows = "\n\t".'<tr>';
		$this->_template_rows .= "\n\t\t".'<th style="text-align: left; border-bottom:1px solid #CCC;">{item}</th>';
		$this->_template_rows .= "\n\t\t".'<td style="border-bottom:1px solid #CCC;">{result}</td>';
		$this->_template_rows .= "\n\t".'</tr>';
=======
	 * @return	string
	 */
	protected function _default_template()
	{
		$this->_template = "\n".'<table style="width:100%; font-size:small; margin:10px 0; border-collapse:collapse; border:1px solid #CCC;">{rows}'."\n</table>";

		$this->_template_rows = "\n\t<tr>\n\t\t".'<th style="text-align: left; border-bottom:1px solid #CCC;">{item}</th>'
					."\n\t\t".'<td style="border-bottom:1px solid #CCC;">{result}</td>'."\n\t</tr>";
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Parse Template
	 *
	 * Harvests the data within the template {pseudo-variables}
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	void
	 */
	function _parse_template()
=======
	 * @return	void
	 */
	protected function _parse_template()
>>>>>>> codeigniter/develop
	{
		if ( ! is_null($this->_template_rows))
		{
			return;
		}

<<<<<<< HEAD
		if (is_null($this->_template))
=======
		if (is_null($this->_template) OR ! preg_match('/\{rows\}(.*?)\{\/rows\}/si', $this->_template, $match))
>>>>>>> codeigniter/develop
		{
			$this->_default_template();
			return;
		}

<<<<<<< HEAD
		if ( ! preg_match("/\{rows\}(.*?)\{\/rows\}/si", $this->_template, $match))
		{
			$this->_default_template();
			return;
		}

		$this->_template_rows = $match['1'];
		$this->_template = str_replace($match['0'], '{rows}', $this->_template);
	}

}
// END Unit_test Class
=======
		$this->_template_rows = $match[1];
		$this->_template = str_replace($match[0], '{rows}', $this->_template);
	}

}
>>>>>>> codeigniter/develop

/**
 * Helper functions to test boolean true/false
 *
<<<<<<< HEAD
 *
 * @access	private
=======
>>>>>>> codeigniter/develop
 * @return	bool
 */
function is_true($test)
{
<<<<<<< HEAD
	return (is_bool($test) AND $test === TRUE) ? TRUE : FALSE;
}
function is_false($test)
{
	return (is_bool($test) AND $test === FALSE) ? TRUE : FALSE;
}


=======
	return ($test === TRUE);
}
function is_false($test)
{
	return ($test === FALSE);
}

>>>>>>> codeigniter/develop
/* End of file Unit_test.php */
/* Location: ./system/libraries/Unit_test.php */