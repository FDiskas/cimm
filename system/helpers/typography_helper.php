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
 * CodeIgniter Typography Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/helpers/typography_helper.html
 */

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Convert newlines to HTML line breaks except within PRE tags
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('nl2br_except_pre'))
{
	function nl2br_except_pre($str)
	{
		$CI =& get_instance();

		$CI->load->library('typography');

=======
if ( ! function_exists('nl2br_except_pre'))
{
	/**
	 * Convert newlines to HTML line breaks except within PRE tags
	 *
	 * @param	string
	 * @return	string
	 */
	function nl2br_except_pre($str)
	{
		$CI =& get_instance();
		$CI->load->library('typography');
>>>>>>> codeigniter/develop
		return $CI->typography->nl2br_except_pre($str);
	}
}

// ------------------------------------------------------------------------

<<<<<<< HEAD
/**
 * Auto Typography Wrapper Function
 *
 *
 * @access	public
 * @param	string
 * @param	bool	whether to allow javascript event handlers
 * @param	bool	whether to reduce multiple instances of double newlines to two
 * @return	string
 */
if ( ! function_exists('auto_typography'))
{
	function auto_typography($str, $strip_js_event_handlers = TRUE, $reduce_linebreaks = FALSE)
	{
		$CI =& get_instance();
		$CI->load->library('typography');
		return $CI->typography->auto_typography($str, $strip_js_event_handlers, $reduce_linebreaks);
	}
}


// --------------------------------------------------------------------

/**
 * HTML Entities Decode
 *
 * This function is a replacement for html_entity_decode()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('entity_decode'))
{
	function entity_decode($str, $charset='UTF-8')
=======
if ( ! function_exists('auto_typography'))
{
	/**
	 * Auto Typography Wrapper Function
	 *
	 * @param	string
	 * @param	bool	whether to allow javascript event handlers
	 * @param	bool	whether to reduce multiple instances of double newlines to two
	 * @return	string
	 */
	function auto_typography($str, $reduce_linebreaks = FALSE)
	{
		$CI =& get_instance();
		$CI->load->library('typography');
		return $CI->typography->auto_typography($str, $reduce_linebreaks);
	}
}

// --------------------------------------------------------------------

if ( ! function_exists('entity_decode'))
{
	/**
	 * HTML Entities Decode
	 *
	 * This function is a replacement for html_entity_decode()
	 *
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	function entity_decode($str, $charset = NULL)
>>>>>>> codeigniter/develop
	{
		global $SEC;
		return $SEC->entity_decode($str, $charset);
	}
}

/* End of file typography_helper.php */
/* Location: ./system/helpers/typography_helper.php */