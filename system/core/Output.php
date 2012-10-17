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
 * Output Class
 *
 * Responsible for sending final output to browser
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Output
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/libraries/output.html
 */
class CI_Output {

	/**
	 * Current output string
	 *
	 * @var string
<<<<<<< HEAD
	 * @access 	protected
	 */
	protected $final_output;
=======
	 */
	public $final_output;

>>>>>>> codeigniter/develop
	/**
	 * Cache expiration time
	 *
	 * @var int
<<<<<<< HEAD
	 * @access 	protected
	 */
	protected $cache_expiration	= 0;
=======
	 */
	public $cache_expiration =	0;

>>>>>>> codeigniter/develop
	/**
	 * List of server headers
	 *
	 * @var array
<<<<<<< HEAD
	 * @access 	protected
	 */
	protected $headers			= array();
=======
	 */
	public $headers =	array();

>>>>>>> codeigniter/develop
	/**
	 * List of mime types
	 *
	 * @var array
<<<<<<< HEAD
	 * @access 	protected
	 */
	protected $mime_types		= array();
	/**
	 * Determines wether profiler is enabled
	 *
	 * @var book
	 * @access 	protected
	 */
	protected $enable_profiler	= FALSE;
=======
	 */
	public $mimes =		array();

	/**
	 * Mime-type for the current page
	 *
	 * @var string
	 */
	protected $mime_type		= 'text/html';

	/**
	 * Determines whether profiler is enabled
	 *
	 * @var book
	 */
	public $enable_profiler =	FALSE;

>>>>>>> codeigniter/develop
	/**
	 * Determines if output compression is enabled
	 *
	 * @var bool
<<<<<<< HEAD
	 * @access 	protected
	 */
	protected $_zlib_oc			= FALSE;
=======
	 */
	protected $_zlib_oc =		FALSE;

>>>>>>> codeigniter/develop
	/**
	 * List of profiler sections
	 *
	 * @var array
<<<<<<< HEAD
	 * @access 	protected
	 */
	protected $_profiler_sections = array();
=======
	 */
	protected $_profiler_sections =	array();

>>>>>>> codeigniter/develop
	/**
	 * Whether or not to parse variables like {elapsed_time} and {memory_usage}
	 *
	 * @var bool
<<<<<<< HEAD
	 * @access 	protected
	 */
	protected $parse_exec_vars	= TRUE;

	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		$this->_zlib_oc = @ini_get('zlib.output_compression');

		// Get mime types for later
		if (defined('ENVIRONMENT') AND file_exists(APPPATH.'config/'.ENVIRONMENT.'/mimes.php'))
		{
		    include APPPATH.'config/'.ENVIRONMENT.'/mimes.php';
		}
		else
		{
			include APPPATH.'config/mimes.php';
		}


		$this->mime_types = $mimes;

		log_message('debug', "Output Class Initialized");
=======
	 */
	public $parse_exec_vars =	TRUE;

	/**
	 * Set up Output class
	 *
	 * @return	void
	 */
	public function __construct()
	{
		$this->_zlib_oc = (bool) @ini_get('zlib.output_compression');

		// Get mime types for later
		$this->mimes =& get_mimes();

		log_message('debug', 'Output Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Get Output
	 *
	 * Returns the current output string
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	string
	 */
	function get_output()
=======
	 * @return	string
	 */
	public function get_output()
>>>>>>> codeigniter/develop
	{
		return $this->final_output;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Output
	 *
	 * Sets the output string
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_output($output)
	{
		$this->final_output = $output;

=======
	 * @param	string
	 * @return	void
	 */
	public function set_output($output)
	{
		$this->final_output = $output;
>>>>>>> codeigniter/develop
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Append Output
	 *
	 * Appends data onto the output string
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function append_output($output)
=======
	 * @param	string
	 * @return	void
	 */
	public function append_output($output)
>>>>>>> codeigniter/develop
	{
		if ($this->final_output == '')
		{
			$this->final_output = $output;
		}
		else
		{
			$this->final_output .= $output;
		}

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Header
	 *
	 * Lets you set a server header which will be outputted with the final display.
	 *
<<<<<<< HEAD
	 * Note:  If a file is cached, headers will not be sent.  We need to figure out
	 * how to permit header data to be saved with the cache data...
	 *
	 * @access	public
	 * @param	string
	 * @param 	bool
	 * @return	void
	 */
	function set_header($header, $replace = TRUE)
=======
	 * Note: If a file is cached, headers will not be sent. We need to figure out
	 * how to permit header data to be saved with the cache data...
	 *
	 * @param	string
	 * @param	bool
	 * @return	void
	 */
	public function set_header($header, $replace = TRUE)
>>>>>>> codeigniter/develop
	{
		// If zlib.output_compression is enabled it will compress the output,
		// but it will not modify the content-length header to compensate for
		// the reduction, causing the browser to hang waiting for more data.
		// We'll just skip content-length in those cases.
<<<<<<< HEAD

		if ($this->_zlib_oc && strncasecmp($header, 'content-length', 14) == 0)
=======
		if ($this->_zlib_oc && strncasecmp($header, 'content-length', 14) === 0)
>>>>>>> codeigniter/develop
		{
			return;
		}

		$this->headers[] = array($header, $replace);
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Content Type Header
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	extension of the file we're outputting
	 * @return	void
	 */
	function set_content_type($mime_type)
=======
	 * @param	string	extension of the file we're outputting
	 * @return	void
	 */
	public function set_content_type($mime_type, $charset = NULL)
>>>>>>> codeigniter/develop
	{
		if (strpos($mime_type, '/') === FALSE)
		{
			$extension = ltrim($mime_type, '.');

			// Is this extension supported?
<<<<<<< HEAD
			if (isset($this->mime_types[$extension]))
			{
				$mime_type =& $this->mime_types[$extension];
=======
			if (isset($this->mimes[$extension]))
			{
				$mime_type =& $this->mimes[$extension];
>>>>>>> codeigniter/develop

				if (is_array($mime_type))
				{
					$mime_type = current($mime_type);
				}
			}
		}

<<<<<<< HEAD
		$header = 'Content-Type: '.$mime_type;

		$this->headers[] = array($header, TRUE);

=======
		$this->mime_type = $mime_type;

		if (empty($charset))
		{
			$charset = config_item('charset');
		}

		$header = 'Content-Type: '.$mime_type
			.(empty($charset) ? NULL : '; charset='.strtolower($charset));

		$this->headers[] = array($header, TRUE);
>>>>>>> codeigniter/develop
		return $this;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Set HTTP Status Header
	 * moved to Common procedural functions in 1.7.2
	 *
	 * @access	public
	 * @param	int		the status code
	 * @param	string
	 * @return	void
	 */
	function set_status_header($code = 200, $text = '')
	{
		set_status_header($code, $text);

=======
	 * Get Current Content Type Header
	 *
	 * @return	string	'text/html', if not already set
	 */
	public function get_content_type()
	{
		for ($i = 0, $c = count($this->headers); $i < $c; $i++)
		{
			if (preg_match('/^Content-Type:\s(.+)$/', $this->headers[$i][0], $matches))
			{
				return $matches[1];
			}
		}

		return 'text/html';
	}

	// --------------------------------------------------------------------

	/**
	 * Set HTTP Status Header
	 * moved to Common procedural functions in 1.7.2
	 *
	 * @param	int	the status code
	 * @param	string
	 * @return	void
	 */
	public function set_status_header($code = 200, $text = '')
	{
		set_status_header($code, $text);
>>>>>>> codeigniter/develop
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Enable/disable Profiler
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	bool
	 * @return	void
	 */
	function enable_profiler($val = TRUE)
	{
		$this->enable_profiler = (is_bool($val)) ? $val : TRUE;

=======
	 * @param	bool
	 * @return	void
	 */
	public function enable_profiler($val = TRUE)
	{
		$this->enable_profiler = is_bool($val) ? $val : TRUE;
>>>>>>> codeigniter/develop
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Profiler Sections
	 *
	 * Allows override of default / config settings for Profiler section display
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function set_profiler_sections($sections)
	{
		foreach ($sections as $section => $enable)
		{
			$this->_profiler_sections[$section] = ($enable !== FALSE) ? TRUE : FALSE;
=======
	 * @param	array
	 * @return	void
	 */
	public function set_profiler_sections($sections)
	{
		if (isset($sections['query_toggle_count']))
		{
			$this->_profiler_sections['query_toggle_count'] = (int) $sections['query_toggle_count'];
			unset($sections['query_toggle_count']);
		}

		foreach ($sections as $section => $enable)
		{
			$this->_profiler_sections[$section] = ($enable !== FALSE);
>>>>>>> codeigniter/develop
		}

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Cache
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	integer
	 * @return	void
	 */
	function cache($time)
	{
		$this->cache_expiration = ( ! is_numeric($time)) ? 0 : $time;

=======
	 * @param	int
	 * @return	void
	 */
	public function cache($time)
	{
		$this->cache_expiration = is_numeric($time) ? $time : 0;
>>>>>>> codeigniter/develop
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Display Output
	 *
	 * All "view" data is automatically put into this variable by the controller class:
	 *
	 * $this->final_output
	 *
	 * This function sends the finalized output data to the browser along
<<<<<<< HEAD
	 * with any server headers and profile data.  It also stops the
	 * benchmark timer so the page rendering speed and memory usage can be shown.
	 *
	 * @access	public
	 * @param 	string
	 * @return	mixed
	 */
	function _display($output = '')
=======
	 * with any server headers and profile data. It also stops the
	 * benchmark timer so the page rendering speed and memory usage can be shown.
	 *
	 * @param	string
	 * @return	mixed
	 */
	public function _display($output = '')
>>>>>>> codeigniter/develop
	{
		// Note:  We use globals because we can't use $CI =& get_instance()
		// since this function is sometimes called by the caching mechanism,
		// which happens before the CI super object is available.
		global $BM, $CFG;

		// Grab the super object if we can.
		if (class_exists('CI_Controller'))
		{
			$CI =& get_instance();
		}

		// --------------------------------------------------------------------

		// Set the output data
<<<<<<< HEAD
		if ($output == '')
=======
		if ($output === '')
>>>>>>> codeigniter/develop
		{
			$output =& $this->final_output;
		}

		// --------------------------------------------------------------------

<<<<<<< HEAD
=======
		// Is minify requested?
		if ($CFG->item('minify_output') === TRUE)
		{
			$output = $this->minify($output, $this->mime_type);
		}


		// --------------------------------------------------------------------

>>>>>>> codeigniter/develop
		// Do we need to write a cache file?  Only if the controller does not have its
		// own _output() method and we are not dealing with a cache file, which we
		// can determine by the existence of the $CI object above
		if ($this->cache_expiration > 0 && isset($CI) && ! method_exists($CI, '_output'))
		{
			$this->_write_cache($output);
		}

		// --------------------------------------------------------------------

		// Parse out the elapsed time and memory usage,
		// then swap the pseudo-variables with the data

		$elapsed = $BM->elapsed_time('total_execution_time_start', 'total_execution_time_end');

		if ($this->parse_exec_vars === TRUE)
		{
<<<<<<< HEAD
			$memory	 = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';

			$output = str_replace('{elapsed_time}', $elapsed, $output);
			$output = str_replace('{memory_usage}', $memory, $output);
=======
			$memory	= round(memory_get_usage() / 1024 / 1024, 2).'MB';

			$output = str_replace(array('{elapsed_time}', '{memory_usage}'), array($elapsed, $memory), $output);
>>>>>>> codeigniter/develop
		}

		// --------------------------------------------------------------------

		// Is compression requested?
<<<<<<< HEAD
		if ($CFG->item('compress_output') === TRUE && $this->_zlib_oc == FALSE)
		{
			if (extension_loaded('zlib'))
			{
				if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) AND strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
				{
					ob_start('ob_gzhandler');
				}
			}
=======
		if ($CFG->item('compress_output') === TRUE && $this->_zlib_oc === FALSE
			&& extension_loaded('zlib')
			&& isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
		{
			ob_start('ob_gzhandler');
>>>>>>> codeigniter/develop
		}

		// --------------------------------------------------------------------

		// Are there any server headers to send?
		if (count($this->headers) > 0)
		{
			foreach ($this->headers as $header)
			{
				@header($header[0], $header[1]);
			}
		}

		// --------------------------------------------------------------------

		// Does the $CI object exist?
		// If not we know we are dealing with a cache file so we'll
		// simply echo out the data and exit.
		if ( ! isset($CI))
		{
			echo $output;
<<<<<<< HEAD
			log_message('debug', "Final output sent to browser");
			log_message('debug', "Total execution time: ".$elapsed);
=======
			log_message('debug', 'Final output sent to browser');
			log_message('debug', 'Total execution time: '.$elapsed);
>>>>>>> codeigniter/develop
			return TRUE;
		}

		// --------------------------------------------------------------------

		// Do we need to generate profile data?
		// If so, load the Profile class and run it.
<<<<<<< HEAD
		if ($this->enable_profiler == TRUE)
		{
			$CI->load->library('profiler');

=======
		if ($this->enable_profiler === TRUE)
		{
			$CI->load->library('profiler');
>>>>>>> codeigniter/develop
			if ( ! empty($this->_profiler_sections))
			{
				$CI->profiler->set_sections($this->_profiler_sections);
			}

			// If the output data contains closing </body> and </html> tags
			// we will remove them and add them back after we insert the profile data
<<<<<<< HEAD
			if (preg_match("|</body>.*?</html>|is", $output))
			{
				$output  = preg_replace("|</body>.*?</html>|is", '', $output);
				$output .= $CI->profiler->run();
				$output .= '</body></html>';
			}
			else
			{
				$output .= $CI->profiler->run();
			}
		}

		// --------------------------------------------------------------------

=======
			$output = preg_replace('|</body>.*?</html>|is', '', $output, -1, $count).$CI->profiler->run();
			if ($count > 0)
			{
				$output .= '</body></html>';
			}
		}

>>>>>>> codeigniter/develop
		// Does the controller contain a function named _output()?
		// If so send the output there.  Otherwise, echo it.
		if (method_exists($CI, '_output'))
		{
			$CI->_output($output);
		}
		else
		{
<<<<<<< HEAD
			echo $output;  // Send it to the browser!
		}

		log_message('debug', "Final output sent to browser");
		log_message('debug', "Total execution time: ".$elapsed);
=======
			echo $output; // Send it to the browser!
		}

		log_message('debug', 'Final output sent to browser');
		log_message('debug', 'Total execution time: '.$elapsed);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Write a Cache File
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param 	string
	 * @return	void
	 */
	function _write_cache($output)
	{
		$CI =& get_instance();
		$path = $CI->config->item('cache_path');

		$cache_path = ($path == '') ? APPPATH.'cache/' : $path;

		if ( ! is_dir($cache_path) OR ! is_really_writable($cache_path))
		{
			log_message('error', "Unable to write cache file: ".$cache_path);
=======
	 * @param	string
	 * @return	void
	 */
	public function _write_cache($output)
	{
		$CI =& get_instance();
		$path = $CI->config->item('cache_path');
		$cache_path = ($path === '') ? APPPATH.'cache/' : $path;

		if ( ! is_dir($cache_path) OR ! is_really_writable($cache_path))
		{
			log_message('error', 'Unable to write cache file: '.$cache_path);
>>>>>>> codeigniter/develop
			return;
		}

		$uri =	$CI->config->item('base_url').
				$CI->config->item('index_page').
				$CI->uri->uri_string();

		$cache_path .= md5($uri);

		if ( ! $fp = @fopen($cache_path, FOPEN_WRITE_CREATE_DESTRUCTIVE))
		{
<<<<<<< HEAD
			log_message('error', "Unable to write cache file: ".$cache_path);
=======
			log_message('error', 'Unable to write cache file: '.$cache_path);
>>>>>>> codeigniter/develop
			return;
		}

		$expire = time() + ($this->cache_expiration * 60);

		if (flock($fp, LOCK_EX))
		{
			fwrite($fp, $expire.'TS--->'.$output);
			flock($fp, LOCK_UN);
		}
		else
		{
<<<<<<< HEAD
			log_message('error', "Unable to secure a file lock for file at: ".$cache_path);
=======
			log_message('error', 'Unable to secure a file lock for file at: '.$cache_path);
>>>>>>> codeigniter/develop
			return;
		}
		fclose($fp);
		@chmod($cache_path, FILE_WRITE_MODE);

<<<<<<< HEAD
		log_message('debug', "Cache file written: ".$cache_path);
=======
		log_message('debug', 'Cache file written: '.$cache_path);

		// Send HTTP cache-control headers to browser to match file cache settings.
		$this->set_cache_header($_SERVER['REQUEST_TIME'], $expire);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Update/serve a cached file
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param 	object	config class
	 * @param 	object	uri class
	 * @return	void
	 */
	function _display_cache(&$CFG, &$URI)
	{
		$cache_path = ($CFG->item('cache_path') == '') ? APPPATH.'cache/' : $CFG->item('cache_path');

		// Build the file path.  The file name is an MD5 hash of the full URI
		$uri =	$CFG->item('base_url').
				$CFG->item('index_page').
				$URI->uri_string;

		$filepath = $cache_path.md5($uri);

		if ( ! @file_exists($filepath))
		{
			return FALSE;
		}

		if ( ! $fp = @fopen($filepath, FOPEN_READ))
=======
	 * @param	object	config class
	 * @param	object	uri class
	 * @return	bool
	 */
	public function _display_cache(&$CFG, &$URI)
	{
		$cache_path = ($CFG->item('cache_path') === '') ? APPPATH.'cache/' : $CFG->item('cache_path');

		// Build the file path. The file name is an MD5 hash of the full URI
		$uri =	$CFG->item('base_url').$CFG->item('index_page').$URI->uri_string;
		$filepath = $cache_path.md5($uri);

		if ( ! @file_exists($filepath) OR ! $fp = @fopen($filepath, FOPEN_READ))
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		flock($fp, LOCK_SH);

<<<<<<< HEAD
		$cache = '';
		if (filesize($filepath) > 0)
		{
			$cache = fread($fp, filesize($filepath));
		}
=======
		$cache = (filesize($filepath) > 0) ? fread($fp, filesize($filepath)) : '';
>>>>>>> codeigniter/develop

		flock($fp, LOCK_UN);
		fclose($fp);

		// Strip out the embedded timestamp
<<<<<<< HEAD
		if ( ! preg_match("/(\d+TS--->)/", $cache, $match))
=======
		if ( ! preg_match('/^(\d+)TS--->/', $cache, $match))
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

<<<<<<< HEAD
		// Has the file expired? If so we'll delete it.
		if (time() >= trim(str_replace('TS--->', '', $match['1'])))
		{
			if (is_really_writable($cache_path))
			{
				@unlink($filepath);
				log_message('debug', "Cache file has expired. File deleted");
				return FALSE;
			}
		}

		// Display the cache
		$this->_display(str_replace($match['0'], '', $cache));
		log_message('debug', "Cache file is current. Sending it to browser.");
		return TRUE;
	}


}
// END Output Class
=======
		$last_modified = filemtime($cache_path);
		$expire = $match[1];

		// Has the file expired?
		if ($_SERVER['REQUEST_TIME'] >= $expire && is_really_writable($cache_path))
		{
			// If so we'll delete it.
			@unlink($filepath);
			log_message('debug', 'Cache file has expired. File deleted.');
			return FALSE;
		}
		else
		{
			// Or else send the HTTP cache control headers.
			$this->set_cache_header($last_modified, $expire);
		}

		// Display the cache
		$this->_display(substr($cache, strlen($match[0])));
		log_message('debug', 'Cache file is current. Sending it to browser.');
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Set the HTTP headers to match the server-side file cache settings
	 * in order to reduce bandwidth.
	 *
	 * @param	int	timestamp of when the page was last modified
	 * @param	int	timestamp of when should the requested page expire from cache
	 * @return	void
	 */
	public function set_cache_header($last_modified, $expiration)
	{
		$max_age = $expiration - $_SERVER['REQUEST_TIME'];

		if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $last_modified <= strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']))
		{
			$this->set_status_header(304);
			exit;
		}
		else
		{
			header('Pragma: public');
			header('Cache-Control: max-age=' . $max_age . ', public');
			header('Expires: '.gmdate('D, d M Y H:i:s', $expiration).' GMT');
			header('Last-modified: '.gmdate('D, d M Y H:i:s', $last_modified).' GMT');
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Reduce excessive size of HTML content.
	 *
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	public function minify($output, $type = 'text/html')
	{
		switch ($type)
		{
			case 'text/html':

				$size_before = strlen($output);

				if ($size_before === 0)
				{
					return '';
				}

				// Find all the <pre>,<code>,<textarea>, and <javascript> tags
				// We'll want to return them to this unprocessed state later.
				preg_match_all('{<pre.+</pre>}msU', $output, $pres_clean);
				preg_match_all('{<code.+</code>}msU', $output, $codes_clean);
				preg_match_all('{<textarea.+</textarea>}msU', $output, $textareas_clean);
				preg_match_all('{<script.+</script>}msU', $output, $javascript_clean);

				// Minify the CSS in all the <style> tags.
				preg_match_all('{<style.+</style>}msU', $output, $style_clean);
				foreach ($style_clean[0] as $s)
				{
					$output = str_replace($s, $this->minify($s, 'text/css'), $output);
				}

				// Minify the javascript in <script> tags.
				foreach ($javascript_clean[0] as $s)
				{
					$javascript_mini[] = $this->minify($s, 'text/javascript');
				}

				// Replace multiple spaces with a single space.
				$output = preg_replace('!\s{2,}!', ' ', $output);

				// Remove comments (non-MSIE conditionals)
				$output = preg_replace('{\s*<!--[^\[].*-->\s*}msU', '', $output);

				// Remove spaces around block-level elements.
				$output = preg_replace('/\s*(<\/?(html|head|title|meta|script|link|style|body|h[1-6]|div|p|br)[^>]*>)\s*/is', '$1', $output);

				// Replace mangled <pre> etc. tags with unprocessed ones.

				if ( ! empty($pres_clean))
				{
					preg_match_all('{<pre.+</pre>}msU', $output, $pres_messed);
					$output = str_replace($pres_messed[0], $pres_clean[0], $output);
				}

				if ( ! empty($codes_clean))
				{
					preg_match_all('{<code.+</code>}msU', $output, $codes_messed);
					$output = str_replace($codes_messed[0], $codes_clean[0], $output);
				}

				if ( ! empty($codes_clean))
				{
					preg_match_all('{<textarea.+</textarea>}msU', $output, $textareas_messed);
					$output = str_replace($textareas_messed[0], $textareas_clean[0], $output);
				}

				if (isset($javascript_mini))
				{
					preg_match_all('{<script.+</script>}msU', $output, $javascript_messed);
					$output = str_replace($javascript_messed[0], $javascript_mini, $output);
				}

				$size_removed = $size_before - strlen($output);
				$savings_percent = round(($size_removed / $size_before * 100));

				log_message('debug', 'Minifier shaved '.($size_removed / 1000).'KB ('.$savings_percent.'%) off final HTML output.');

			break;

			case 'text/css':

				//Remove CSS comments
				$output = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $output);

				// Remove spaces around curly brackets, colons,
				// semi-colons, parenthesis, commas
				$output = preg_replace('!\s*(:|;|,|}|{|\(|\))\s*!', '$1', $output);

			break;

			case 'text/javascript':

				// Currently leaves JavaScript untouched.
			break;

			default: break;
		}

		return $output;
	}

}
>>>>>>> codeigniter/develop

/* End of file Output.php */
/* Location: ./system/core/Output.php */