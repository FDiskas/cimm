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
 * Database Driver Class
 *
 * This is the platform-independent base DB implementation class.
 * This class will not be called directly. Rather, the adapter
 * class for the specific database will extend and instantiate it.
 *
 * @package		CodeIgniter
 * @subpackage	Drivers
 * @category	Database
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_driver {

	var $username;
	var $password;
	var $hostname;
	var $database;
	var $dbdriver		= 'mysql';
	var $dbprefix		= '';
	var $char_set		= 'utf8';
	var $dbcollat		= 'utf8_general_ci';
	var $autoinit		= TRUE; // Whether to automatically initialize the DB
	var $swap_pre		= '';
	var $port			= '';
	var $pconnect		= FALSE;
	var $conn_id		= FALSE;
	var $result_id		= FALSE;
	var $db_debug		= FALSE;
	var $benchmark		= 0;
	var $query_count	= 0;
	var $bind_marker	= '?';
	var $save_queries	= TRUE;
	var $queries		= array();
	var $query_times	= array();
	var $data_cache		= array();
	var $trans_enabled	= TRUE;
	var $trans_strict	= TRUE;
	var $_trans_depth	= 0;
	var $_trans_status	= TRUE; // Used with transactions to determine if a rollback should occur
	var $cache_on		= FALSE;
	var $cachedir		= '';
	var $cache_autodel	= FALSE;
	var $CACHE; // The cache class object

	// Private variables
	var $_protect_identifiers	= TRUE;
	var $_reserved_identifiers	= array('*'); // Identifiers that should NOT be escaped

	// These are use with Oracle
	var $stmt_id;
	var $curs_id;
	var $limit_used;



	/**
	 * Constructor.  Accepts one parameter containing the database
	 * connection settings.
	 *
	 * @param array
	 */
	function __construct($params)
=======
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
abstract class CI_DB_driver {

	public $dsn;
	public $username;
	public $password;
	public $hostname;
	public $database;
	public $dbdriver		= 'mysqli';
	public $subdriver;
	public $dbprefix		= '';
	public $char_set		= 'utf8';
	public $dbcollat		= 'utf8_general_ci';
	public $autoinit		= TRUE; // Whether to automatically initialize the DB
	public $encrypt			= FALSE;
	public $swap_pre		= '';
	public $port			= '';
	public $pconnect		= FALSE;
	public $conn_id			= FALSE;
	public $result_id		= FALSE;
	public $db_debug		= FALSE;
	public $benchmark		= 0;
	public $query_count		= 0;
	public $bind_marker		= '?';
	public $save_queries		= TRUE;
	public $queries			= array();
	public $query_times		= array();
	public $data_cache		= array();

	public $trans_enabled		= TRUE;
	public $trans_strict		= TRUE;
	protected $_trans_depth		= 0;
	protected $_trans_status	= TRUE; // Used with transactions to determine if a rollback should occur

	public $cache_on		= FALSE;
	public $cachedir		= '';
	public $cache_autodel		= FALSE;
	public $CACHE; // The cache class object

	protected $_protect_identifiers		= TRUE;
	protected $_reserved_identifiers	= array('*'); // Identifiers that should NOT be escaped

	// clause and character used for LIKE escape sequences
	protected $_like_escape_str = " ESCAPE '%s' ";
	protected $_like_escape_chr = '!';

	/**
	 * The syntax to count rows is slightly different across different
	 * database engines, so this string appears in each driver and is
	 * used for the count_all() and count_all_results() functions.
	 */
	protected $_count_string = 'SELECT COUNT(*) AS ';

	/**
	 * Constructor
	 *
	 * @param	array
	 * @return	void
	 */
	public function __construct($params)
>>>>>>> codeigniter/develop
	{
		if (is_array($params))
		{
			foreach ($params as $key => $val)
			{
				$this->$key = $val;
			}
		}

		log_message('debug', 'Database Driver Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Database Settings
	 *
<<<<<<< HEAD
	 * @access	private Called by the constructor
	 * @param	mixed
	 * @return	void
	 */
	function initialize()
	{
		// If an existing connection resource is available
		// there is no need to connect and select the database
		if (is_resource($this->conn_id) OR is_object($this->conn_id))
=======
	 * @return	bool
	 */
	public function initialize()
	{
		/* If an established connection is available, then there's
		 * no need to connect and select the database.
		 *
		 * Depending on the database driver, conn_id can be either
		 * boolean TRUE, a resource or an object.
		 */
		if ($this->conn_id)
>>>>>>> codeigniter/develop
		{
			return TRUE;
		}

		// ----------------------------------------------------------------

		// Connect to the database and set the connection ID
<<<<<<< HEAD
		$this->conn_id = ($this->pconnect == FALSE) ? $this->db_connect() : $this->db_pconnect();

		// No connection resource?  Throw an error
		if ( ! $this->conn_id)
		{
			log_message('error', 'Unable to connect to the database');

			if ($this->db_debug)
			{
				$this->display_error('db_unable_to_connect');
			}
			return FALSE;
		}

		// ----------------------------------------------------------------

		// Select the DB... assuming a database name is specified in the config file
		if ($this->database != '')
		{
			if ( ! $this->db_select())
			{
				log_message('error', 'Unable to select database: '.$this->database);

				if ($this->db_debug)
				{
					$this->display_error('db_unable_to_select', $this->database);
				}
				return FALSE;
			}
			else
			{
				// We've selected the DB. Now we set the character set
				if ( ! $this->db_set_charset($this->char_set, $this->dbcollat))
				{
					return FALSE;
				}

				return TRUE;
			}
		}

=======
		$this->conn_id = ($this->pconnect === FALSE) ? $this->db_connect() : $this->db_pconnect();

		// No connection resource? Check if there is a failover else throw an error
		if ( ! $this->conn_id)
		{
			// Check if there is a failover set
			if ( ! empty($this->failover) && is_array($this->failover))
			{
				// Go over all the failovers
				foreach ($this->failover as $failover)
				{
					// Replace the current settings with those of the failover
					foreach ($failover as $key => $val)
					{
						$this->$key = $val;
					}

					// Try to connect
					$this->conn_id = ($this->pconnect === FALSE) ? $this->db_connect() : $this->db_pconnect();

					// If a connection is made break the foreach loop
					if ($this->conn_id)
					{
						break;
					}
				}
			}

			// We still don't have a connection?
			if ( ! $this->conn_id)
			{
				log_message('error', 'Unable to connect to the database');

				if ($this->db_debug)
				{
					$this->display_error('db_unable_to_connect');
				}
				return FALSE;
			}
		}

		// ----------------------------------------------------------------

		// Select the DB... assuming a database name is specified in the config file
		if ($this->database !== '' && ! $this->db_select())
		{
			log_message('error', 'Unable to select database: '.$this->database);

			if ($this->db_debug)
			{
				$this->display_error('db_unable_to_select', $this->database);
			}
			return FALSE;
		}

		// Now we set the character set and that's all
		return $this->db_set_charset($this->char_set);
	}

	// --------------------------------------------------------------------

	/**
	 * Reconnect
	 *
	 * Keep / reestablish the db connection if no queries have been
	 * sent for a length of time exceeding the server's idle timeout.
	 *
	 * This is just a dummy method to allow drivers without such
	 * functionality to not declare it, while others will override it.
	 *
	 * @return      void
	 */
	public function reconnect()
	{
	}

	// --------------------------------------------------------------------

	/**
	 * Select database
	 *
	 * This is just a dummy method to allow drivers without such
	 * functionality to not declare it, while others will override it.
	 *
	 * @return      bool
	 */
	public function db_select()
	{
>>>>>>> codeigniter/develop
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Set client character set
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	resource
	 */
	function db_set_charset($charset, $collation)
	{
		if ( ! $this->_db_set_charset($this->char_set, $this->dbcollat))
		{
			log_message('error', 'Unable to set database connection charset: '.$this->char_set);

			if ($this->db_debug)
			{
				$this->display_error('db_unable_to_set_charset', $this->char_set);
=======
	 * @param	string
	 * @return	bool
	 */
	public function db_set_charset($charset)
	{
		if (method_exists($this, '_db_set_charset') && ! $this->_db_set_charset($charset))
		{
			log_message('error', 'Unable to set database connection charset: '.$charset);

			if ($this->db_debug)
			{
				$this->display_error('db_unable_to_set_charset', $charset);
>>>>>>> codeigniter/develop
			}

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * The name of the platform in use (mysql, mssql, etc...)
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	string
	 */
	function platform()
=======
	 * @return	string
	 */
	public function platform()
>>>>>>> codeigniter/develop
	{
		return $this->dbdriver;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Database Version Number.  Returns a string containing the
	 * version of the database being used
	 *
	 * @access	public
	 * @return	string
	 */
	function version()
	{
		if (FALSE === ($sql = $this->_version()))
		{
			if ($this->db_debug)
			{
				return $this->display_error('db_unsupported_function');
			}
			return FALSE;
		}

		// Some DBs have functions that return the version, and don't run special
		// SQL queries per se. In these instances, just return the result.
		$driver_version_exceptions = array('oci8', 'sqlite', 'cubrid');

		if (in_array($this->dbdriver, $driver_version_exceptions))
		{
			return $sql;
		}
		else
		{
			$query = $this->query($sql);
			return $query->row('ver');
		}
=======
	 * Database version number
	 *
	 * Returns a string containing the version of the database being used.
	 * Most drivers will override this method.
	 *
	 * @return	string
	 */
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		if (FALSE === ($sql = $this->_version()))
		{
			return ($this->db_debug) ? $this->display_error('db_unsupported_function') : FALSE;
		}

		$query = $this->query($sql);
		$query = $query->row();
		return $this->data_cache['version'] = $query->ver;
	}

	// --------------------------------------------------------------------

	/**
	 * Version number query string
	 *
	 * @return	string
	 */
	protected function _version()
	{
		return 'SELECT VERSION() AS ver';
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Execute the query
	 *
	 * Accepts an SQL string as input and returns a result object upon
<<<<<<< HEAD
	 * successful execution of a "read" type query.  Returns boolean TRUE
=======
	 * successful execution of a "read" type query. Returns boolean TRUE
>>>>>>> codeigniter/develop
	 * upon successful execution of a "write" type query. Returns boolean
	 * FALSE upon failure, and if the $db_debug variable is set to TRUE
	 * will raise an error.
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	An SQL query string
	 * @param	array	An array of binding data
	 * @return	mixed
	 */
<<<<<<< HEAD
	function query($sql, $binds = FALSE, $return_object = TRUE)
	{
		if ($sql == '')
		{
			if ($this->db_debug)
			{
				log_message('error', 'Invalid query: '.$sql);
				return $this->display_error('db_invalid_query');
			}
			return FALSE;
		}

		// Verify table prefix and replace if necessary
		if ( ($this->dbprefix != '' AND $this->swap_pre != '') AND ($this->dbprefix != $this->swap_pre) )
		{
			$sql = preg_replace("/(\W)".$this->swap_pre."(\S+?)/", "\\1".$this->dbprefix."\\2", $sql);
=======
	public function query($sql, $binds = FALSE, $return_object = NULL)
	{
		if ($sql === '')
		{
			log_message('error', 'Invalid query: '.$sql);

			return ($this->db_debug) ? $this->display_error('db_invalid_query') : FALSE;
		}
		elseif ( ! is_bool($return_object))
		{
			$return_object = ! $this->is_write_type($sql);
		}

		// Verify table prefix and replace if necessary
		if ($this->dbprefix !== '' && $this->swap_pre !== '' && $this->dbprefix !== $this->swap_pre)
		{
			$sql = preg_replace('/(\W)'.$this->swap_pre.'(\S+?)/', '\\1'.$this->dbprefix.'\\2', $sql);
>>>>>>> codeigniter/develop
		}

		// Compile binds if needed
		if ($binds !== FALSE)
		{
			$sql = $this->compile_binds($sql, $binds);
		}

<<<<<<< HEAD
		// Is query caching enabled?  If the query is a "read type"
		// we will load the caching class and return the previously
		// cached query if it exists
		if ($this->cache_on == TRUE AND stristr($sql, 'SELECT'))
		{
			if ($this->_cache_init())
			{
				$this->load_rdriver();
				if (FALSE !== ($cache = $this->CACHE->read($sql)))
				{
					return $cache;
				}
			}
		}

		// Save the  query for debugging
		if ($this->save_queries == TRUE)
=======
		// Is query caching enabled? If the query is a "read type"
		// we will load the caching class and return the previously
		// cached query if it exists
		if ($this->cache_on === TRUE && $return_object === TRUE && $this->_cache_init())
		{
			$this->load_rdriver();
			if (FALSE !== ($cache = $this->CACHE->read($sql)))
			{
				return $cache;
			}
		}

		// Save the query for debugging
		if ($this->save_queries === TRUE)
>>>>>>> codeigniter/develop
		{
			$this->queries[] = $sql;
		}

		// Start the Query Timer
<<<<<<< HEAD
		$time_start = list($sm, $ss) = explode(' ', microtime());
=======
		$time_start = microtime(TRUE);
>>>>>>> codeigniter/develop

		// Run the Query
		if (FALSE === ($this->result_id = $this->simple_query($sql)))
		{
<<<<<<< HEAD
			if ($this->save_queries == TRUE)
=======
			if ($this->save_queries === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->query_times[] = 0;
			}

			// This will trigger a rollback if transactions are being used
			$this->_trans_status = FALSE;

<<<<<<< HEAD
			if ($this->db_debug)
			{
				// grab the error number and message now, as we might run some
				// additional queries before displaying the error
				$error_no = $this->_error_number();
				$error_msg = $this->_error_message();

				// We call this function in order to roll-back queries
				// if transactions are enabled.  If we don't call this here
=======
			// Grab the error now, as we might run some additional queries before displaying the error
			$error = $this->error();

			// Log errors
			log_message('error', 'Query error: '.$error['message'].' - Invalid query: '.$sql);

			if ($this->db_debug)
			{
				// We call this function in order to roll-back queries
				// if transactions are enabled. If we don't call this here
>>>>>>> codeigniter/develop
				// the error message will trigger an exit, causing the
				// transactions to remain in limbo.
				$this->trans_complete();

<<<<<<< HEAD
				// Log and display errors
				log_message('error', 'Query error: '.$error_msg);
				return $this->display_error(
										array(
												'Error Number: '.$error_no,
												$error_msg,
												$sql
											)
										);
=======
				// Display errors
				return $this->display_error(array('Error Number: '.$error['code'], $error['message'], $sql));
>>>>>>> codeigniter/develop
			}

			return FALSE;
		}

		// Stop and aggregate the query time results
<<<<<<< HEAD
		$time_end = list($em, $es) = explode(' ', microtime());
		$this->benchmark += ($em + $es) - ($sm + $ss);

		if ($this->save_queries == TRUE)
		{
			$this->query_times[] = ($em + $es) - ($sm + $ss);
=======
		$time_end = microtime(TRUE);
		$this->benchmark += $time_end - $time_start;

		if ($this->save_queries === TRUE)
		{
			$this->query_times[] = $time_end - $time_start;
>>>>>>> codeigniter/develop
		}

		// Increment the query counter
		$this->query_count++;

<<<<<<< HEAD
		// Was the query a "write" type?
		// If so we'll simply return true
		if ($this->is_write_type($sql) === TRUE)
		{
			// If caching is enabled we'll auto-cleanup any
			// existing files related to this particular URI
			if ($this->cache_on == TRUE AND $this->cache_autodel == TRUE AND $this->_cache_init())
=======
		// Will we have a result object instantiated? If not - we'll simply return TRUE
		if ($return_object !== TRUE)
		{
			// If caching is enabled we'll auto-cleanup any existing files related to this particular URI
			if ($this->cache_on === TRUE && $this->cache_autodel === TRUE && $this->_cache_init())
>>>>>>> codeigniter/develop
			{
				$this->CACHE->delete();
			}

			return TRUE;
		}

		// Return TRUE if we don't need to create a result object
<<<<<<< HEAD
		// Currently only the Oracle driver uses this when stored
		// procedures are used
=======
>>>>>>> codeigniter/develop
		if ($return_object !== TRUE)
		{
			return TRUE;
		}

		// Load and instantiate the result driver
<<<<<<< HEAD

		$driver			= $this->load_rdriver();
		$RES			= new $driver();
		$RES->conn_id	= $this->conn_id;
		$RES->result_id	= $this->result_id;

		if ($this->dbdriver == 'oci8')
		{
			$RES->stmt_id		= $this->stmt_id;
			$RES->curs_id		= NULL;
			$RES->limit_used	= $this->limit_used;
			$this->stmt_id		= FALSE;
		}

		// oci8 vars must be set before calling this
		$RES->num_rows	= $RES->num_rows();

		// Is query caching enabled?  If so, we'll serialize the
		// result object and save it to a cache file.
		if ($this->cache_on == TRUE AND $this->_cache_init())
=======
		$driver		= $this->load_rdriver();
		$RES		= new $driver($this);

		// Is query caching enabled? If so, we'll serialize the
		// result object and save it to a cache file.
		if ($this->cache_on === TRUE && $this->_cache_init())
>>>>>>> codeigniter/develop
		{
			// We'll create a new instance of the result object
			// only without the platform specific driver since
			// we can't use it with cached data (the query result
			// resource ID won't be any good once we've cached the
			// result object, so we'll have to compile the data
			// and save it)
			$CR = new CI_DB_result();
<<<<<<< HEAD
			$CR->num_rows		= $RES->num_rows();
			$CR->result_object	= $RES->result_object();
			$CR->result_array	= $RES->result_array();
=======
			$CR->result_object	= $RES->result_object();
			$CR->result_array	= $RES->result_array();
			$CR->num_rows		= $RES->num_rows();
>>>>>>> codeigniter/develop

			// Reset these since cached objects can not utilize resource IDs.
			$CR->conn_id		= NULL;
			$CR->result_id		= NULL;

			$this->CACHE->write($sql, $CR);
		}

		return $RES;
	}

	// --------------------------------------------------------------------

	/**
	 * Load the result drivers
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	string	the name of the result class
	 */
	function load_rdriver()
=======
	 * @return	string	the name of the result class
	 */
	public function load_rdriver()
>>>>>>> codeigniter/develop
	{
		$driver = 'CI_DB_'.$this->dbdriver.'_result';

		if ( ! class_exists($driver))
		{
			include_once(BASEPATH.'database/DB_result.php');
			include_once(BASEPATH.'database/drivers/'.$this->dbdriver.'/'.$this->dbdriver.'_result.php');
		}

		return $driver;
	}

	// --------------------------------------------------------------------

	/**
	 * Simple Query
<<<<<<< HEAD
	 * This is a simplified version of the query() function.  Internally
	 * we only use it when running transaction commands since they do
	 * not require all the features of the main query() function.
	 *
	 * @access	public
	 * @param	string	the sql query
	 * @return	mixed
	 */
	function simple_query($sql)
=======
	 * This is a simplified version of the query() function. Internally
	 * we only use it when running transaction commands since they do
	 * not require all the features of the main query() function.
	 *
	 * @param	string	the sql query
	 * @return	mixed
	 */
	public function simple_query($sql)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->conn_id)
		{
			$this->initialize();
		}

		return $this->_execute($sql);
	}

	// --------------------------------------------------------------------

	/**
	 * Disable Transactions
	 * This permits transactions to be disabled at run-time.
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function trans_off()
=======
	 * @return	void
	 */
	public function trans_off()
>>>>>>> codeigniter/develop
	{
		$this->trans_enabled = FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Enable/disable Transaction Strict Mode
	 * When strict mode is enabled, if you are running multiple groups of
	 * transactions, if one group fails all groups will be rolled back.
	 * If strict mode is disabled, each group is treated autonomously, meaning
	 * a failure of one group will not affect any others
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function trans_strict($mode = TRUE)
=======
	 * @return	void
	 */
	public function trans_strict($mode = TRUE)
>>>>>>> codeigniter/develop
	{
		$this->trans_strict = is_bool($mode) ? $mode : TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Start Transaction
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function trans_start($test_mode = FALSE)
=======
	 * @return	void
	 */
	public function trans_start($test_mode = FALSE)
>>>>>>> codeigniter/develop
	{
		if ( ! $this->trans_enabled)
		{
			return FALSE;
		}

		// When transactions are nested we only begin/commit/rollback the outermost ones
		if ($this->_trans_depth > 0)
		{
			$this->_trans_depth += 1;
			return;
		}

		$this->trans_begin($test_mode);
<<<<<<< HEAD
=======
		$this->_trans_depth += 1;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Complete Transaction
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function trans_complete()
=======
	 * @return	bool
	 */
	public function trans_complete()
>>>>>>> codeigniter/develop
	{
		if ( ! $this->trans_enabled)
		{
			return FALSE;
		}

		// When transactions are nested we only begin/commit/rollback the outermost ones
		if ($this->_trans_depth > 1)
		{
			$this->_trans_depth -= 1;
			return TRUE;
		}
<<<<<<< HEAD
=======
		else
		{
			$this->_trans_depth = 0;
		}
>>>>>>> codeigniter/develop

		// The query() function will set this flag to FALSE in the event that a query failed
		if ($this->_trans_status === FALSE)
		{
			$this->trans_rollback();

			// If we are NOT running in strict mode, we will reset
			// the _trans_status flag so that subsequent groups of transactions
			// will be permitted.
			if ($this->trans_strict === FALSE)
			{
				$this->_trans_status = TRUE;
			}

			log_message('debug', 'DB Transaction Failure');
			return FALSE;
		}

		$this->trans_commit();
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Lets you retrieve the transaction flag to determine if it has failed
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	bool
	 */
	function trans_status()
=======
	 * @return	bool
	 */
	public function trans_status()
>>>>>>> codeigniter/develop
	{
		return $this->_trans_status;
	}

	// --------------------------------------------------------------------

	/**
	 * Compile Bindings
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	the sql statement
	 * @param	array	an array of bind data
	 * @return	string
	 */
<<<<<<< HEAD
	function compile_binds($sql, $binds)
	{
		if (strpos($sql, $this->bind_marker) === FALSE)
		{
			return $sql;
		}

		if ( ! is_array($binds))
		{
			$binds = array($binds);
		}

		// Get the sql segments around the bind markers
		$segments = explode($this->bind_marker, $sql);

		// The count of bind should be 1 less then the count of segments
		// If there are more bind arguments trim it down
		if (count($binds) >= count($segments)) {
			$binds = array_slice($binds, 0, count($segments)-1);
		}

		// Construct the binded query
		$result = $segments[0];
		$i = 0;
		foreach ($binds as $bind)
		{
			$result .= $this->escape($bind);
			$result .= $segments[++$i];
		}

		return $result;
=======
	public function compile_binds($sql, $binds)
	{
		if (empty($binds) OR empty($this->bind_marker) OR strpos($sql, $this->bind_marker) === FALSE)
		{
			return $sql;
		}
		elseif ( ! is_array($binds))
		{
			$binds = array($binds);
			$bind_count = 1;
		}
		else
		{
			// Make sure we're using numeric keys
			$binds = array_values($binds);
			$bind_count = count($binds);
		}

		// We'll need the marker length later
		$ml = strlen($this->bind_marker);

		// Make sure not to replace a chunk inside a string that happens to match the bind marker
		if ($c = preg_match_all("/'[^']*'/i", $sql, $matches))
		{
			$c = preg_match_all('/'.preg_quote($this->bind_marker).'/i',
				str_replace($matches[0],
					str_replace($this->bind_marker, str_repeat(' ', $ml), $matches[0]),
					$sql, $c),
				$matches, PREG_OFFSET_CAPTURE);

			// Bind values' count must match the count of markers in the query
			if ($bind_count !== $c)
			{
				return $sql;
			}
		}
		elseif (($c = preg_match_all('/'.preg_quote($this->bind_marker).'/i', $sql, $matches, PREG_OFFSET_CAPTURE)) !== $bind_count)
		{
			return $sql;
		}

		do
		{
			$c--;
			$sql = substr_replace($sql, $this->escape($binds[$c]), $matches[0][$c][1], $ml);
		}
		while ($c !== 0);

		return $sql;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Determines if a query is a "write" type.
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	An SQL query string
	 * @return	boolean
	 */
	function is_write_type($sql)
	{
		if ( ! preg_match('/^\s*"?(SET|INSERT|UPDATE|DELETE|REPLACE|CREATE|DROP|TRUNCATE|LOAD DATA|COPY|ALTER|GRANT|REVOKE|LOCK|UNLOCK)\s+/i', $sql))
		{
			return FALSE;
		}
		return TRUE;
=======
	 * @param	string	An SQL query string
	 * @return	bool
	 */
	public function is_write_type($sql)
	{
		return (bool) preg_match('/^\s*"?(SET|INSERT|UPDATE|DELETE|REPLACE|CREATE|DROP|TRUNCATE|LOAD|COPY|ALTER|RENAME|GRANT|REVOKE|LOCK|UNLOCK|REINDEX)\s+/i', $sql);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Calculate the aggregate query elapsed time
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	integer	The number of decimal places
	 * @return	integer
	 */
	function elapsed_time($decimals = 6)
=======
	 * @param	int	The number of decimal places
	 * @return	int
	 */
	public function elapsed_time($decimals = 6)
>>>>>>> codeigniter/develop
	{
		return number_format($this->benchmark, $decimals);
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the total number of queries
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	integer
	 */
	function total_queries()
=======
	 * @return	int
	 */
	public function total_queries()
>>>>>>> codeigniter/develop
	{
		return $this->query_count;
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the last query that was executed
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function last_query()
=======
	 * @return	string
	 */
	public function last_query()
>>>>>>> codeigniter/develop
	{
		return end($this->queries);
	}

	// --------------------------------------------------------------------

	/**
	 * "Smart" Escape String
	 *
	 * Escapes data based on type
	 * Sets boolean and null types
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
	function escape($str)
	{
		if (is_string($str))
		{
			$str = "'".$this->escape_str($str)."'";
		}
		elseif (is_bool($str))
		{
			$str = ($str === FALSE) ? 0 : 1;
		}
		elseif (is_null($str))
		{
			$str = 'NULL';
=======
	 * @param	string
	 * @return	mixed
	 */
	public function escape($str)
	{
		if (is_string($str) OR method_exists($str, '__toString'))
		{
			return "'".$this->escape_str($str)."'";
		}
		elseif (is_bool($str))
		{
			return ($str === FALSE) ? 0 : 1;
		}
		elseif (is_null($str))
		{
			return 'NULL';
>>>>>>> codeigniter/develop
		}

		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Escape LIKE String
	 *
	 * Calls the individual driver for platform
	 * specific escaping for LIKE conditions
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
	function escape_like_str($str)
=======
	 * @param	string
	 * @return	mixed
	 */
	public function escape_like_str($str)
>>>>>>> codeigniter/develop
	{
		return $this->escape_str($str, TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Primary
	 *
<<<<<<< HEAD
	 * Retrieves the primary key.  It assumes that the row in the first
	 * position is the primary key
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	string
	 */
	function primary($table = '')
	{
		$fields = $this->list_fields($table);

		if ( ! is_array($fields))
		{
			return FALSE;
		}

		return current($fields);
=======
	 * Retrieves the primary key. It assumes that the row in the first
	 * position is the primary key
	 *
	 * @param	string	the table name
	 * @return	string
	 */
	public function primary($table = '')
	{
		$fields = $this->list_fields($table);
		return is_array($fields) ? current($fields) : FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * "Count All" query
	 *
	 * Generates a platform-specific query string that counts all records in
	 * the specified database
	 *
	 * @param	string
	 * @return	int
	 */
	public function count_all($table = '')
	{
		if ($table === '')
		{
			return 0;
		}

		$query = $this->query($this->_count_string.$this->escape_identifiers('numrows').' FROM '.$this->protect_identifiers($table, TRUE, NULL, FALSE));
		if ($query->num_rows() === 0)
		{
			return 0;
		}

		$query = $query->row();
		$this->_reset_select();
		return (int) $query->numrows;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Returns an array of table names
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	array
	 */
	function list_tables($constrain_by_prefix = FALSE)
=======
	 * @return	array
	 */
	public function list_tables($constrain_by_prefix = FALSE)
>>>>>>> codeigniter/develop
	{
		// Is there a cached result?
		if (isset($this->data_cache['table_names']))
		{
			return $this->data_cache['table_names'];
		}

		if (FALSE === ($sql = $this->_list_tables($constrain_by_prefix)))
		{
<<<<<<< HEAD
			if ($this->db_debug)
			{
				return $this->display_error('db_unsupported_function');
			}
			return FALSE;
		}

		$retval = array();
		$query = $this->query($sql);

		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				if (isset($row['TABLE_NAME']))
				{
					$retval[] = $row['TABLE_NAME'];
				}
				else
				{
					$retval[] = array_shift($row);
				}
			}
		}

		$this->data_cache['table_names'] = $retval;
=======
			return ($this->db_debug) ? $this->display_error('db_unsupported_function') : FALSE;
		}

		$this->data_cache['table_names'] = array();
		$query = $this->query($sql);

		foreach ($query->result_array() as $row)
		{
			// Do we know from which column to get the table name?
			if ( ! isset($key))
			{
				if (isset($row['table_name']))
				{
					$key = 'table_name';
				}
				elseif (isset($row['TABLE_NAME']))
				{
					$key = 'TABLE_NAME';
				}
				else
				{
					/* We have no other choice but to just get the first element's key.
					 * Due to array_shift() accepting it's argument by reference, if
					 * E_STRICT is on, this would trigger a warning. So we'll have to
					 * assign it first.
					 */
					$key = array_keys($row);
					$key = array_shift($key);
				}
			}

			$this->data_cache['table_names'][] = $row[$key];
		}

>>>>>>> codeigniter/develop
		return $this->data_cache['table_names'];
	}

	// --------------------------------------------------------------------

	/**
	 * Determine if a particular table exists
<<<<<<< HEAD
	 * @access	public
	 * @return	boolean
	 */
	function table_exists($table_name)
	{
		return ( ! in_array($this->_protect_identifiers($table_name, TRUE, FALSE, FALSE), $this->list_tables())) ? FALSE : TRUE;
=======
	 *
	 * @return	bool
	 */
	public function table_exists($table_name)
	{
		return in_array($this->protect_identifiers($table_name, TRUE, FALSE, FALSE), $this->list_tables());
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Fetch MySQL Field Names
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	array
	 */
	function list_fields($table = '')
=======
	 * Fetch Field Names
	 *
	 * @param	string	the table name
	 * @return	array
	 */
	public function list_fields($table = '')
>>>>>>> codeigniter/develop
	{
		// Is there a cached result?
		if (isset($this->data_cache['field_names'][$table]))
		{
			return $this->data_cache['field_names'][$table];
		}

<<<<<<< HEAD
		if ($table == '')
		{
			if ($this->db_debug)
			{
				return $this->display_error('db_field_param_missing');
			}
			return FALSE;
=======
		if ($table === '')
		{
			return ($this->db_debug) ? $this->display_error('db_field_param_missing') : FALSE;
>>>>>>> codeigniter/develop
		}

		if (FALSE === ($sql = $this->_list_columns($table)))
		{
<<<<<<< HEAD
			if ($this->db_debug)
			{
				return $this->display_error('db_unsupported_function');
			}
			return FALSE;
		}

		$query = $this->query($sql);

		$retval = array();
		foreach ($query->result_array() as $row)
		{
			if (isset($row['COLUMN_NAME']))
			{
				$retval[] = $row['COLUMN_NAME'];
			}
			else
			{
				$retval[] = current($row);
			}
		}

		$this->data_cache['field_names'][$table] = $retval;
=======
			return ($this->db_debug) ? $this->display_error('db_unsupported_function') : FALSE;
		}

		$query = $this->query($sql);
		$this->data_cache['field_names'][$table] = array();

		foreach ($query->result_array() as $row)
		{
			// Do we know from where to get the column's name?
			if ( ! isset($key))
			{
				if (isset($row['column_name']))
				{
					$key = 'column_name';
				}
				elseif (isset($row['COLUMN_NAME']))
				{
					$key = 'COLUMN_NAME';
				}
				else
				{
					/* We have no other choice but to just get the first element's key.
					 * Due to array_shift() accepting it's argument by reference, if
					 * E_STRICT is on, this would trigger a warning. So we'll have to
					 * assign it first.
					 */
					$key = array_keys($row);
					$key = array_shift($key);
				}
			}

			$this->data_cache['field_names'][$table][] = $row[$key];
		}

>>>>>>> codeigniter/develop
		return $this->data_cache['field_names'][$table];
	}

	// --------------------------------------------------------------------

	/**
	 * Determine if a particular field exists
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	boolean
	 */
	function field_exists($field_name, $table_name)
	{
		return ( ! in_array($field_name, $this->list_fields($table_name))) ? FALSE : TRUE;
=======
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	public function field_exists($field_name, $table_name)
	{
		return in_array($field_name, $this->list_fields($table_name));
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Returns an object with field data
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the table name
	 * @return	object
	 */
	function field_data($table = '')
	{
		if ($table == '')
		{
			if ($this->db_debug)
			{
				return $this->display_error('db_field_param_missing');
			}
			return FALSE;
		}

		$query = $this->query($this->_field_data($this->_protect_identifiers($table, TRUE, NULL, FALSE)));

		return $query->field_data();
=======
	 * @param	string	the table name
	 * @return	object
	 */
	public function field_data($table = '')
	{
		if ($table === '')
		{
			return ($this->db_debug) ? $this->display_error('db_field_param_missing') : FALSE;
		}

		$query = $this->query($this->_field_data($this->protect_identifiers($table, TRUE, NULL, FALSE)));
		return $query->field_data();
	}

	// --------------------------------------------------------------------

	/**
	 * Escape the SQL Identifiers
	 *
	 * This function escapes column and table names
	 *
	 * @param	mixed
	 * @return	mixed
	 */
	public function escape_identifiers($item)
	{
		if ($this->_escape_char === '' OR empty($item))
		{
			return $item;
		}
		elseif (is_array($item))
		{
			foreach ($item as $key => $value)
			{
				$item[$key] = $this->escape_identifiers($value);
			}

			return $item;
		}
		// Avoid breaking functions and literal values inside queries
		elseif (ctype_digit($item) OR $item[0] === "'" OR ($this->_escape_char !== '"' && $item[0] === '"') OR strpos($item, '(') !== FALSE)
		{
			return $item;
		}

		static $preg_ec = array();

		if (empty($preg_ec))
		{
			if (is_array($this->_escape_char))
			{
				$preg_ec = array(
						preg_quote($this->_escape_char[0]), preg_quote($this->_escape_char[1]),
						$this->_escape_char[0], $this->_escape_char[1]
						);
			}
			else
			{
				$preg_ec[0] = $preg_ec[1] = preg_quote($this->_escape_char);
				$preg_ec[2] = $preg_ec[3] = $this->_escape_char;
			}
		}

		foreach ($this->_reserved_identifiers as $id)
		{
			if (strpos($item, '.'.$id) !== FALSE)
			{
				return preg_replace('/'.$preg_ec[0].'?([^'.$preg_ec[1].'\.]+)'.$preg_ec[1].'?\./i', $preg_ec[2].'$1'.$preg_ec[3].'.', $item);
			}
		}

		return preg_replace('/'.$preg_ec[0].'?([^'.$preg_ec[1].'\.]+)'.$preg_ec[1].'?(\.)?/i', $preg_ec[2].'$1'.$preg_ec[3].'$2', $item);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Generate an insert string
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	the table upon which the query will be performed
	 * @param	array	an associative array data of key/values
	 * @return	string
	 */
<<<<<<< HEAD
	function insert_string($table, $data)
	{
		$fields = array();
		$values = array();

		foreach ($data as $key => $val)
		{
			$fields[] = $this->_escape_identifiers($key);
			$values[] = $this->escape($val);
		}

		return $this->_insert($this->_protect_identifiers($table, TRUE, NULL, FALSE), $fields, $values);
=======
	public function insert_string($table, $data)
	{
		$fields = $values = array();

		foreach ($data as $key => $val)
		{
			$fields[] = $this->escape_identifiers($key);
			$values[] = $this->escape($val);
		}

		return $this->_insert($this->protect_identifiers($table, TRUE, NULL, FALSE), $fields, $values);
	}

	// --------------------------------------------------------------------

	/**
	 * Insert statement
	 *
	 * Generates a platform-specific insert string from the supplied data
	 *
	 * @param	string	the table name
	 * @param	array	the insert keys
	 * @param	array	the insert values
	 * @return	string
	 */
	protected function _insert($table, $keys, $values)
	{
		return 'INSERT INTO '.$table.' ('.implode(', ', $keys).') VALUES ('.implode(', ', $values).')';
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Generate an update string
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	the table upon which the query will be performed
	 * @param	array	an associative array data of key/values
	 * @param	mixed	the "where" statement
	 * @return	string
	 */
<<<<<<< HEAD
	function update_string($table, $data, $where)
	{
		if ($where == '')
		{
			return false;
=======
	public function update_string($table, $data, $where)
	{
		if ($where === '')
		{
			return FALSE;
>>>>>>> codeigniter/develop
		}

		$fields = array();
		foreach ($data as $key => $val)
		{
<<<<<<< HEAD
			$fields[$this->_protect_identifiers($key)] = $this->escape($val);
=======
			$fields[$this->protect_identifiers($key)] = $this->escape($val);
>>>>>>> codeigniter/develop
		}

		if ( ! is_array($where))
		{
			$dest = array($where);
		}
		else
		{
			$dest = array();
			foreach ($where as $key => $val)
			{
<<<<<<< HEAD
				$prefix = (count($dest) == 0) ? '' : ' AND ';
=======
				$prefix = (count($dest) === 0) ? '' : ' AND ';
				$key = $this->protect_identifiers($key);
>>>>>>> codeigniter/develop

				if ($val !== '')
				{
					if ( ! $this->_has_operator($key))
					{
						$key .= ' =';
					}

					$val = ' '.$this->escape($val);
				}

				$dest[] = $prefix.$key.$val;
			}
		}

<<<<<<< HEAD
		return $this->_update($this->_protect_identifiers($table, TRUE, NULL, FALSE), $fields, $dest);
=======
		return $this->_update($this->protect_identifiers($table, TRUE, NULL, FALSE), $fields, $dest);
	}

	// --------------------------------------------------------------------

	/**
	 * Update statement
	 *
	 * Generates a platform-specific update string from the supplied data
	 *
	 * @param	string	the table name
	 * @param	array	the update data
	 * @param	array	the where clause
	 * @param	array	the orderby clause
	 * @param	array	the limit clause
	 * @param	array	the like clause
	 * @return	string
	 */
	protected function _update($table, $values, $where, $orderby = array(), $limit = FALSE, $like = array())
	{
		foreach ($values as $key => $val)
		{
			$valstr[] = $key.' = '.$val;
		}

		$where = empty($where) ? '' : ' WHERE '.implode(' ', $where);

		if ( ! empty($like))
		{
			$where .= ($where === '' ? ' WHERE ' : ' AND ').implode(' ', $like);
		}

		return 'UPDATE '.$table.' SET '.implode(', ', $valstr)
			.$where
			.(count($orderby) > 0 ? ' ORDER BY '.implode(', ', $orderby) : '')
			.($limit ? ' LIMIT '.$limit : '');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Tests whether the string has an SQL operator
	 *
<<<<<<< HEAD
	 * @access	private
	 * @param	string
	 * @return	bool
	 */
	function _has_operator($str)
	{
		$str = trim($str);
		if ( ! preg_match("/(\s|<|>|!|=|is null|is not null)/i", $str))
		{
			return FALSE;
		}

		return TRUE;
=======
	 * @param	string
	 * @return	bool
	 */
	protected function _has_operator($str)
	{
		return (bool) preg_match('/(\s|<|>|!|=|IS NULL|IS NOT NULL|BETWEEN)/i', trim($str));
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the SQL string operator
	 *
	 * @param	string
	 * @return	string
	 */
	protected function _get_operator($str)
	{
		return preg_match('/(=|!|<|>| IS NULL| IS NOT NULL| BETWEEN)/i', $str, $match)
			? $match[1] : FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Enables a native PHP function to be run, using a platform agnostic wrapper.
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	the function name
	 * @param	mixed	any parameters needed by the function
	 * @return	mixed
	 */
<<<<<<< HEAD
	function call_function($function)
	{
		$driver = ($this->dbdriver == 'postgre') ? 'pg_' : $this->dbdriver.'_';
=======
	public function call_function($function)
	{
		$driver = ($this->dbdriver === 'postgre') ? 'pg_' : $this->dbdriver.'_';
>>>>>>> codeigniter/develop

		if (FALSE === strpos($driver, $function))
		{
			$function = $driver.$function;
		}

		if ( ! function_exists($function))
		{
<<<<<<< HEAD
			if ($this->db_debug)
			{
				return $this->display_error('db_unsupported_function');
			}
			return FALSE;
		}
		else
		{
			$args = (func_num_args() > 1) ? array_splice(func_get_args(), 1) : null;
			if (is_null($args))
			{
				return call_user_func($function);
			}
			else
			{
				return call_user_func_array($function, $args);
			}
		}
=======
			return ($this->db_debug) ? $this->display_error('db_unsupported_function') : FALSE;
		}

		return (func_num_args() > 1)
			? call_user_func_array($function, array_splice(func_get_args(), 1))
			: call_user_func($function);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Set Cache Directory Path
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the path to the cache directory
	 * @return	void
	 */
	function cache_set_path($path = '')
=======
	 * @param	string	the path to the cache directory
	 * @return	void
	 */
	public function cache_set_path($path = '')
>>>>>>> codeigniter/develop
	{
		$this->cachedir = $path;
	}

	// --------------------------------------------------------------------

	/**
	 * Enable Query Caching
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function cache_on()
	{
		$this->cache_on = TRUE;
		return TRUE;
=======
	 * @return	bool	cache_on value
	 */
	public function cache_on()
	{
		return $this->cache_on = TRUE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Disable Query Caching
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function cache_off()
	{
		$this->cache_on = FALSE;
		return FALSE;
	}


=======
	 * @return	bool	cache_on value
	 */
	public function cache_off()
	{
		return $this->cache_on = FALSE;
	}

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Delete the cache files associated with a particular URI
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function cache_delete($segment_one = '', $segment_two = '')
	{
		if ( ! $this->_cache_init())
		{
			return FALSE;
		}
		return $this->CACHE->delete($segment_one, $segment_two);
=======
	 * @return	bool
	 */
	public function cache_delete($segment_one = '', $segment_two = '')
	{
		return ($this->_cache_init())
			? $this->CACHE->delete($segment_one, $segment_two)
			: FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Delete All cache files
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function cache_delete_all()
	{
		if ( ! $this->_cache_init())
		{
			return FALSE;
		}

		return $this->CACHE->delete_all();
=======
	 * @return	bool
	 */
	public function cache_delete_all()
	{
		return ($this->_cache_init())
			? $this->CACHE->delete_all()
			: FALSE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize the Cache Class
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	void
	 */
	function _cache_init()
	{
		if (is_object($this->CACHE) AND class_exists('CI_DB_Cache'))
		{
			return TRUE;
		}

		if ( ! class_exists('CI_DB_Cache'))
		{
			if ( ! @include(BASEPATH.'database/DB_cache.php'))
			{
				return $this->cache_off();
			}
		}
=======
	 * @return	bool
	 */
	protected function _cache_init()
	{
		if (class_exists('CI_DB_Cache'))
		{
			if (is_object($this->CACHE))
			{
				return TRUE;
			}
		}
		elseif ( ! @include_once(BASEPATH.'database/DB_cache.php'))
		{
			return $this->cache_off();
		}
>>>>>>> codeigniter/develop

		$this->CACHE = new CI_DB_Cache($this); // pass db object to support multiple db connections and returned db objects
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Close DB Connection
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function close()
	{
		if (is_resource($this->conn_id) OR is_object($this->conn_id))
		{
			$this->_close($this->conn_id);
		}
=======
	 * @return	void
	 */
	public function close()
	{
		if ($this->conn_id)
		{
			$this->_close();
			$this->conn_id = FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Close DB Connection
	 *
	 * This method would be overriden by most of the drivers.
	 *
	 * @return	void
	 */
	protected function _close()
	{
>>>>>>> codeigniter/develop
		$this->conn_id = FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Display an error message
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	the error message
	 * @param	string	any "swap" values
	 * @param	boolean	whether to localize the message
	 * @return	string	sends the application/error_db.php template
	 */
	function display_error($error = '', $swap = '', $native = FALSE)
=======
	 * @param	string	the error message
	 * @param	string	any "swap" values
	 * @param	bool	whether to localize the message
	 * @return	string	sends the application/error_db.php template
	 */
	public function display_error($error = '', $swap = '', $native = FALSE)
>>>>>>> codeigniter/develop
	{
		$LANG =& load_class('Lang', 'core');
		$LANG->load('db');

		$heading = $LANG->line('db_error_heading');

<<<<<<< HEAD
		if ($native == TRUE)
		{
			$message = $error;
		}
		else
		{
			$message = ( ! is_array($error)) ? array(str_replace('%s', $swap, $LANG->line($error))) : $error;
=======
		if ($native === TRUE)
		{
			$message = (array) $error;
		}
		else
		{
			$message = is_array($error) ? $error : array(str_replace('%s', $swap, $LANG->line($error)));
>>>>>>> codeigniter/develop
		}

		// Find the most likely culprit of the error by going through
		// the backtrace until the source file is no longer in the
		// database folder.
<<<<<<< HEAD

		$trace = debug_backtrace();

		foreach ($trace as $call)
		{
			if (isset($call['file']) && strpos($call['file'], BASEPATH.'database') === FALSE)
			{
				// Found it - use a relative path for safety
				$message[] = 'Filename: '.str_replace(array(BASEPATH, APPPATH), '', $call['file']);
				$message[] = 'Line Number: '.$call['line'];

=======
		$trace = debug_backtrace();
		foreach ($trace as $call)
		{
			// We'll need this on Windows, as APPPATH and BASEPATH will always use forward slashes
			if (DIRECTORY_SEPARATOR !== '/')
			{
				$call['file'] = str_replace('\\', '/', $call['file']);
			}

			if (isset($call['file'], $call['class']) && strpos($call['file'], BASEPATH.'database') === FALSE && strpos($call['class'], 'Loader') !== FALSE)
			{
				// Found it - use a relative path for safety
				$message[] = 'Filename: '.str_replace(array(APPPATH, BASEPATH), '', $call['file']);
				$message[] = 'Line Number: '.$call['line'];
>>>>>>> codeigniter/develop
				break;
			}
		}

		$error =& load_class('Exceptions', 'core');
		echo $error->show_error($heading, $message, 'error_db');
		exit;
	}

	// --------------------------------------------------------------------

	/**
	 * Protect Identifiers
	 *
<<<<<<< HEAD
	 * This function adds backticks if appropriate based on db type
	 *
	 * @access	private
	 * @param	mixed	the item to escape
	 * @return	mixed	the item with backticks
	 */
	function protect_identifiers($item, $prefix_single = FALSE)
	{
		return $this->_protect_identifiers($item, $prefix_single);
	}

	// --------------------------------------------------------------------

	/**
	 * Protect Identifiers
	 *
	 * This function is used extensively by the Active Record class, and by
	 * a couple functions in this class.
	 * It takes a column or table name (optionally with an alias) and inserts
	 * the table prefix onto it.  Some logic is necessary in order to deal with
	 * column names that include the path.  Consider a query like this:
=======
	 * This function is used extensively by the Query Builder class, and by
	 * a couple functions in this class.
	 * It takes a column or table name (optionally with an alias) and inserts
	 * the table prefix onto it. Some logic is necessary in order to deal with
	 * column names that include the path. Consider a query like this:
>>>>>>> codeigniter/develop
	 *
	 * SELECT * FROM hostname.database.table.column AS c FROM hostname.database.table
	 *
	 * Or a query with aliasing:
	 *
	 * SELECT m.member_id, m.member_name FROM members AS m
	 *
	 * Since the column name can include up to four segments (host, DB, table, column)
	 * or also have an alias prefix, we need to do a bit of work to figure this out and
	 * insert the table prefix (if it exists) in the proper position, and escape only
	 * the correct identifiers.
	 *
<<<<<<< HEAD
	 * @access	private
=======
>>>>>>> codeigniter/develop
	 * @param	string
	 * @param	bool
	 * @param	mixed
	 * @param	bool
	 * @return	string
	 */
<<<<<<< HEAD
	function _protect_identifiers($item, $prefix_single = FALSE, $protect_identifiers = NULL, $field_exists = TRUE)
=======
	public function protect_identifiers($item, $prefix_single = FALSE, $protect_identifiers = NULL, $field_exists = TRUE)
>>>>>>> codeigniter/develop
	{
		if ( ! is_bool($protect_identifiers))
		{
			$protect_identifiers = $this->_protect_identifiers;
		}

		if (is_array($item))
		{
			$escaped_array = array();
<<<<<<< HEAD

			foreach ($item as $k => $v)
			{
				$escaped_array[$this->_protect_identifiers($k)] = $this->_protect_identifiers($v);
=======
			foreach ($item as $k => $v)
			{
				$escaped_array[$this->protect_identifiers($k)] = $this->protect_identifiers($v, $prefix_single, $protect_identifiers, $field_exists);
>>>>>>> codeigniter/develop
			}

			return $escaped_array;
		}

<<<<<<< HEAD
		// Convert tabs or multiple spaces into single spaces
		$item = preg_replace('/[\t ]+/', ' ', $item);

		// If the item has an alias declaration we remove it and set it aside.
		// Basically we remove everything to the right of the first space
		if (strpos($item, ' ') !== FALSE)
		{
			$alias = strstr($item, ' ');
			$item = substr($item, 0, - strlen($alias));
		}
		else
		{
			$alias = '';
		}

		// This is basically a bug fix for queries that use MAX, MIN, etc.
		// If a parenthesis is found we know that we do not need to
		// escape the data or add a prefix.  There's probably a more graceful
		// way to deal with this, but I'm not thinking of it -- Rick
		if (strpos($item, '(') !== FALSE)
		{
			return $item.$alias;
=======
		// This is basically a bug fix for queries that use MAX, MIN, etc.
		// If a parenthesis is found we know that we do not need to
		// escape the data or add a prefix. There's probably a more graceful
		// way to deal with this, but I'm not thinking of it -- Rick
		if (strpos($item, '(') !== FALSE)
		{
			return $item;
		}

		// Convert tabs or multiple spaces into single spaces
		$item = preg_replace('/\s+/', ' ', $item);

		// If the item has an alias declaration we remove it and set it aside.
		// Note: strripos() is used in order to support spaces in table names
		if ($offset = strripos($item, ' AS '))
		{
			$alias = ($protect_identifiers)
					? substr($item, $offset, 4).$this->escape_identifiers(substr($item, $offset + 4))
					: substr($item, $offset);
			$item = substr($item, 0, $offset);
		}
		elseif ($offset = strrpos($item, ' '))
		{
			$alias = ($protect_identifiers)
					? ' '.$this->escape_identifiers(substr($item, $offset + 1))
					: substr($item, $offset);
			$item = substr($item, 0, $offset);
		}
		else
		{
			$alias = '';
>>>>>>> codeigniter/develop
		}

		// Break the string apart if it contains periods, then insert the table prefix
		// in the correct location, assuming the period doesn't indicate that we're dealing
		// with an alias. While we're at it, we will escape the components
		if (strpos($item, '.') !== FALSE)
		{
			$parts	= explode('.', $item);

			// Does the first segment of the exploded item match
<<<<<<< HEAD
			// one of the aliases previously identified?  If so,
			// we have nothing more to do other than escape the item
			if (in_array($parts[0], $this->ar_aliased_tables))
=======
			// one of the aliases previously identified? If so,
			// we have nothing more to do other than escape the item
			if (in_array($parts[0], $this->qb_aliased_tables))
>>>>>>> codeigniter/develop
			{
				if ($protect_identifiers === TRUE)
				{
					foreach ($parts as $key => $val)
					{
						if ( ! in_array($val, $this->_reserved_identifiers))
						{
<<<<<<< HEAD
							$parts[$key] = $this->_escape_identifiers($val);
=======
							$parts[$key] = $this->escape_identifiers($val);
>>>>>>> codeigniter/develop
						}
					}

					$item = implode('.', $parts);
				}
<<<<<<< HEAD
				return $item.$alias;
			}

			// Is there a table prefix defined in the config file?  If not, no need to do anything
			if ($this->dbprefix != '')
=======

				return $item.$alias;
			}

			// Is there a table prefix defined in the config file? If not, no need to do anything
			if ($this->dbprefix !== '')
>>>>>>> codeigniter/develop
			{
				// We now add the table prefix based on some logic.
				// Do we have 4 segments (hostname.database.table.column)?
				// If so, we add the table prefix to the column name in the 3rd segment.
				if (isset($parts[3]))
				{
					$i = 2;
				}
				// Do we have 3 segments (database.table.column)?
				// If so, we add the table prefix to the column name in 2nd position
				elseif (isset($parts[2]))
				{
					$i = 1;
				}
				// Do we have 2 segments (table.column)?
				// If so, we add the table prefix to the column name in 1st segment
				else
				{
					$i = 0;
				}

				// This flag is set when the supplied $item does not contain a field name.
				// This can happen when this function is being called from a JOIN.
<<<<<<< HEAD
				if ($field_exists == FALSE)
=======
				if ($field_exists === FALSE)
>>>>>>> codeigniter/develop
				{
					$i++;
				}

				// Verify table prefix and replace if necessary
<<<<<<< HEAD
				if ($this->swap_pre != '' && strncmp($parts[$i], $this->swap_pre, strlen($this->swap_pre)) === 0)
				{
					$parts[$i] = preg_replace("/^".$this->swap_pre."(\S+?)/", $this->dbprefix."\\1", $parts[$i]);
				}

				// We only add the table prefix if it does not already exist
				if (substr($parts[$i], 0, strlen($this->dbprefix)) != $this->dbprefix)
=======
				if ($this->swap_pre !== '' && strpos($parts[$i], $this->swap_pre) === 0)
				{
					$parts[$i] = preg_replace('/^'.$this->swap_pre.'(\S+?)/', $this->dbprefix.'\\1', $parts[$i]);
				}
				// We only add the table prefix if it does not already exist
				elseif (strpos($parts[$i], $this->dbprefix) !== 0)
>>>>>>> codeigniter/develop
				{
					$parts[$i] = $this->dbprefix.$parts[$i];
				}

				// Put the parts back together
				$item = implode('.', $parts);
			}

			if ($protect_identifiers === TRUE)
			{
<<<<<<< HEAD
				$item = $this->_escape_identifiers($item);
=======
				$item = $this->escape_identifiers($item);
>>>>>>> codeigniter/develop
			}

			return $item.$alias;
		}

<<<<<<< HEAD
		// Is there a table prefix?  If not, no need to insert it
		if ($this->dbprefix != '')
		{
			// Verify table prefix and replace if necessary
			if ($this->swap_pre != '' && strncmp($item, $this->swap_pre, strlen($this->swap_pre)) === 0)
			{
				$item = preg_replace("/^".$this->swap_pre."(\S+?)/", $this->dbprefix."\\1", $item);
			}

			// Do we prefix an item with no segments?
			if ($prefix_single == TRUE AND substr($item, 0, strlen($this->dbprefix)) != $this->dbprefix)
=======
		// Is there a table prefix? If not, no need to insert it
		if ($this->dbprefix !== '')
		{
			// Verify table prefix and replace if necessary
			if ($this->swap_pre !== '' && strpos($item, $this->swap_pre) === 0)
			{
				$item = preg_replace('/^'.$this->swap_pre.'(\S+?)/', $this->dbprefix.'\\1', $item);
			}
			// Do we prefix an item with no segments?
			elseif ($prefix_single === TRUE && strpos($item, $this->dbprefix) !== 0)
>>>>>>> codeigniter/develop
			{
				$item = $this->dbprefix.$item;
			}
		}

<<<<<<< HEAD
		if ($protect_identifiers === TRUE AND ! in_array($item, $this->_reserved_identifiers))
		{
			$item = $this->_escape_identifiers($item);
=======
		if ($protect_identifiers === TRUE && ! in_array($item, $this->_reserved_identifiers))
		{
			$item = $this->escape_identifiers($item);
>>>>>>> codeigniter/develop
		}

		return $item.$alias;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Dummy method that allows Active Record class to be disabled
	 *
	 * This function is used extensively by every db driver.
=======
	 * Dummy method that allows Query Builder class to be disabled
	 * and keep count_all() working.
>>>>>>> codeigniter/develop
	 *
	 * @return	void
	 */
	protected function _reset_select()
	{
	}

}

/* End of file DB_driver.php */
/* Location: ./system/database/DB_driver.php */