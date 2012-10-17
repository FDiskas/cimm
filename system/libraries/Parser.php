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
 * Parser Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Parser
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/libraries/parser.html
 */
class CI_Parser {

<<<<<<< HEAD
	var $l_delim = '{';
	var $r_delim = '}';
	var $object;

	/**
	 *  Parse a template
=======
	/**
	 * Left delimeter character for psuedo vars
	 *
	 * @var string
	 */
	public $l_delim = '{';

	/**
	 * Right delimeter character for psuedo vars
	 *
	 * @var string
	 */
	public $r_delim = '}';

	/**
	 * Reference to CodeIgniter instance
	 *
	 * @var object
	 */
	protected $CI;

	/**
	 * Parse a template
>>>>>>> codeigniter/develop
	 *
	 * Parses pseudo-variables contained in the specified template view,
	 * replacing them with the data in the second param
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	string
	 */
	public function parse($template, $data, $return = FALSE)
	{
<<<<<<< HEAD
		$CI =& get_instance();
		$template = $CI->load->view($template, $data, TRUE);
=======
		$this->CI =& get_instance();
		$template = $this->CI->load->view($template, $data, TRUE);
>>>>>>> codeigniter/develop

		return $this->_parse($template, $data, $return);
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Parse a String
=======
	 * Parse a String
>>>>>>> codeigniter/develop
	 *
	 * Parses pseudo-variables contained in the specified string,
	 * replacing them with the data in the second param
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	string
	 */
<<<<<<< HEAD
	function parse_string($template, $data, $return = FALSE)
=======
	public function parse_string($template, $data, $return = FALSE)
>>>>>>> codeigniter/develop
	{
		return $this->_parse($template, $data, $return);
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Parse a template
=======
	 * Parse a template
>>>>>>> codeigniter/develop
	 *
	 * Parses pseudo-variables contained in the specified template,
	 * replacing them with the data in the second param
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	string
	 */
<<<<<<< HEAD
	function _parse($template, $data, $return = FALSE)
	{
		if ($template == '')
=======
	protected function _parse($template, $data, $return = FALSE)
	{
		if ($template === '')
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		foreach ($data as $key => $val)
		{
<<<<<<< HEAD
			if (is_array($val))
			{
				$template = $this->_parse_pair($key, $val, $template);
			}
			else
			{
				$template = $this->_parse_single($key, (string)$val, $template);
			}
		}

		if ($return == FALSE)
		{
			$CI =& get_instance();
			$CI->output->append_output($template);
=======
			$template = is_array($val)
					? $this->_parse_pair($key, $val, $template)
					: $template = $this->_parse_single($key, (string) $val, $template);
		}

		if ($return === FALSE)
		{
			$this->CI->output->append_output($template);
>>>>>>> codeigniter/develop
		}

		return $template;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Set the left/right variable delimiters
	 *
	 * @access	public
=======
	 * Set the left/right variable delimiters
	 *
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	string
	 * @return	void
	 */
<<<<<<< HEAD
	function set_delimiters($l = '{', $r = '}')
=======
	public function set_delimiters($l = '{', $r = '}')
>>>>>>> codeigniter/develop
	{
		$this->l_delim = $l;
		$this->r_delim = $r;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Parse a single key/value
	 *
	 * @access	private
=======
	 * Parse a single key/value
	 *
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	string
	 * @param	string
	 * @return	string
	 */
<<<<<<< HEAD
	function _parse_single($key, $val, $string)
	{
		return str_replace($this->l_delim.$key.$this->r_delim, $val, $string);
=======
	protected function _parse_single($key, $val, $string)
	{
		return str_replace($this->l_delim.$key.$this->r_delim, (string) $val, $string);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Parse a tag pair
	 *
	 * Parses tag pairs:  {some_tag} string... {/some_tag}
	 *
	 * @access	private
=======
	 * Parse a tag pair
	 *
	 * Parses tag pairs: {some_tag} string... {/some_tag}
	 *
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	array
	 * @param	string
	 * @return	string
	 */
<<<<<<< HEAD
	function _parse_pair($variable, $data, $string)
=======
	protected function _parse_pair($variable, $data, $string)
>>>>>>> codeigniter/develop
	{
		if (FALSE === ($match = $this->_match_pair($string, $variable)))
		{
			return $string;
		}

		$str = '';
		foreach ($data as $row)
		{
<<<<<<< HEAD
			$temp = $match['1'];
			foreach ($row as $key => $val)
			{
				if ( ! is_array($val))
				{
					$temp = $this->_parse_single($key, $val, $temp);
				}
				else
				{
					$temp = $this->_parse_pair($key, $val, $temp);
				}
=======
			$temp = $match[1];
			foreach ($row as $key => $val)
			{
				$temp = is_array($val)
						? $this->_parse_pair($key, $val, $temp)
						: $this->_parse_single($key, $val, $temp);
>>>>>>> codeigniter/develop
			}

			$str .= $temp;
		}

<<<<<<< HEAD
		return str_replace($match['0'], $str, $string);
=======
		return str_replace($match[0], $str, $string);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 *  Matches a variable pair
	 *
	 * @access	private
=======
	 * Matches a variable pair
	 *
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	string
	 * @return	mixed
	 */
<<<<<<< HEAD
	function _match_pair($string, $variable)
	{
		if ( ! preg_match("|" . preg_quote($this->l_delim) . $variable . preg_quote($this->r_delim) . "(.+?)". preg_quote($this->l_delim) . '/' . $variable . preg_quote($this->r_delim) . "|s", $string, $match))
		{
			return FALSE;
		}

		return $match;
	}

}
// END Parser Class

/* End of file Parser.php */
/* Location: ./system/libraries/Parser.php */
=======
	protected function _match_pair($string, $variable)
	{
		return preg_match('|'.preg_quote($this->l_delim).$variable.preg_quote($this->r_delim).'(.+?)'.preg_quote($this->l_delim).'/'.$variable.preg_quote($this->r_delim).'|s',
					$string, $match)
			? $match : FALSE;
	}

}

/* End of file Parser.php */
/* Location: ./system/libraries/Parser.php */
>>>>>>> codeigniter/develop
