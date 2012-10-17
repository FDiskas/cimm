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

if ( ! function_exists('xml_parser_create'))
{
	show_error('Your PHP installation does not support XML');
}

if ( ! class_exists('CI_Xmlrpc'))
{
	show_error('You must load the Xmlrpc class before loading the Xmlrpcs class in order to create a server.');
}

// ------------------------------------------------------------------------

/**
 * XML-RPC server class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	XML-RPC
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
=======
 * @author		EllisLab Dev Team
>>>>>>> codeigniter/develop
 * @link		http://codeigniter.com/user_guide/libraries/xmlrpc.html
 */
class CI_Xmlrpcs extends CI_Xmlrpc
{
<<<<<<< HEAD
	var $methods		= array();	//array of methods mapped to function names and signatures
	var $debug_msg		= '';		// Debug Message
	var $system_methods = array();	// XML RPC Server methods
	var $controller_obj;

	var $object			= FALSE;

	/**
	 * Constructor
	 */
	public function __construct($config=array())
=======
	/**
	 * array of methods mapped to function names and signatures
	 *
	 * @var array
	 */
	public $methods = array();

	/**
	 * Debug Message
	 *
	 * @var string
	 */
	public $debug_msg = '';

	/**
	 * XML RPC Server methods
	 *
	 * @var array
	 */
	public $system_methods	= array();

	/**
	 * Configuration object
	 *
	 * @var object
	 */
	public $object = FALSE;

	/**
	 * Initialize XMLRPC class
	 *
	 * @param	array	$config
	 * @return	void
	 */
	public function __construct($config = array())
>>>>>>> codeigniter/develop
	{
		parent::__construct();
		$this->set_system_methods();

		if (isset($config['functions']) && is_array($config['functions']))
		{
			$this->methods = array_merge($this->methods, $config['functions']);
		}

<<<<<<< HEAD
		log_message('debug', "XML-RPC Server Class Initialized");
=======
		log_message('debug', 'XML-RPC Server Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Prefs and Serve
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	void
	 */
	function initialize($config=array())
=======
	 * @param	mixed
	 * @return	void
	 */
	public function initialize($config = array())
>>>>>>> codeigniter/develop
	{
		if (isset($config['functions']) && is_array($config['functions']))
		{
			$this->methods = array_merge($this->methods, $config['functions']);
		}

		if (isset($config['debug']))
		{
			$this->debug = $config['debug'];
		}

		if (isset($config['object']) && is_object($config['object']))
		{
			$this->object = $config['object'];
		}

		if (isset($config['xss_clean']))
		{
			$this->xss_clean = $config['xss_clean'];
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Setting of System Methods
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function set_system_methods()
	{
		$this->methods = array(
					'system.listMethods'	 => array(
													'function' => 'this.listMethods',
													'signature' => array(array($this->xmlrpcArray, $this->xmlrpcString), array($this->xmlrpcArray)),
													'docstring' => 'Returns an array of available methods on this server'),
					'system.methodHelp'		 => array(
													'function' => 'this.methodHelp',
													'signature' => array(array($this->xmlrpcString, $this->xmlrpcString)),
													'docstring' => 'Returns a documentation string for the specified method'),
					'system.methodSignature' => array(
													'function' => 'this.methodSignature',
													'signature' => array(array($this->xmlrpcArray, $this->xmlrpcString)),
													'docstring' => 'Returns an array describing the return type and required parameters of a method'),
					'system.multicall'		 => array(
												'function' => 'this.multicall',
												'signature' => array(array($this->xmlrpcArray, $this->xmlrpcArray)),
												'docstring' => 'Combine multiple RPC calls in one request. See http://www.xmlrpc.com/discuss/msgReader$1208 for details')
					);
=======
	 * @return	void
	 */
	public function set_system_methods()
	{
		$this->methods = array(
					'system.listMethods'	 => array(
										'function' => 'this.listMethods',
										'signature' => array(array($this->xmlrpcArray, $this->xmlrpcString), array($this->xmlrpcArray)),
										'docstring' => 'Returns an array of available methods on this server'),
					'system.methodHelp'	 => array(
										'function' => 'this.methodHelp',
										'signature' => array(array($this->xmlrpcString, $this->xmlrpcString)),
										'docstring' => 'Returns a documentation string for the specified method'),
					'system.methodSignature' => array(
										'function' => 'this.methodSignature',
										'signature' => array(array($this->xmlrpcArray, $this->xmlrpcString)),
										'docstring' => 'Returns an array describing the return type and required parameters of a method'),
					'system.multicall'	 => array(
										'function' => 'this.multicall',
										'signature' => array(array($this->xmlrpcArray, $this->xmlrpcArray)),
										'docstring' => 'Combine multiple RPC calls in one request. See http://www.xmlrpc.com/discuss/msgReader$1208 for details')
				);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Main Server Function
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function serve()
	{
		$r = $this->parseRequest();
		$payload  = '<?xml version="1.0" encoding="'.$this->xmlrpc_defencoding.'"?'.'>'."\n";
		$payload .= $this->debug_msg;
		$payload .= $r->prepare_response();

		header("Content-Type: text/xml");
		header("Content-Length: ".strlen($payload));
=======
	 * @return	void
	 */
	public function serve()
	{
		$r = $this->parseRequest();
		$payload = '<?xml version="1.0" encoding="'.$this->xmlrpc_defencoding.'"?'.'>'."\n".$this->debug_msg.$r->prepare_response();

		header('Content-Type: text/xml');
		header('Content-Length: '.strlen($payload));
>>>>>>> codeigniter/develop
		exit($payload);
	}

	// --------------------------------------------------------------------

	/**
	 * Add Method to Class
	 *
<<<<<<< HEAD
	 * @access	public
=======
>>>>>>> codeigniter/develop
	 * @param	string	method name
	 * @param	string	function
	 * @param	string	signature
	 * @param	string	docstring
	 * @return	void
	 */
<<<<<<< HEAD
	function add_to_map($methodname, $function, $sig, $doc)
=======
	public function add_to_map($methodname, $function, $sig, $doc)
>>>>>>> codeigniter/develop
	{
		$this->methods[$methodname] = array(
			'function'  => $function,
			'signature' => $sig,
			'docstring' => $doc
		);
	}

	// --------------------------------------------------------------------

	/**
	 * Parse Server Request
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string	data
	 * @return	object	xmlrpc response
	 */
	function parseRequest($data='')
=======
	 * @param	string	data
	 * @return	object	xmlrpc response
	 */
	public function parseRequest($data = '')
>>>>>>> codeigniter/develop
	{
		global $HTTP_RAW_POST_DATA;

		//-------------------------------------
		//  Get Data
		//-------------------------------------

<<<<<<< HEAD
		if ($data == '')
=======
		if ($data === '')
>>>>>>> codeigniter/develop
		{
			$data = $HTTP_RAW_POST_DATA;
		}

		//-------------------------------------
		//  Set up XML Parser
		//-------------------------------------

		$parser = xml_parser_create($this->xmlrpc_defencoding);
<<<<<<< HEAD
		$parser_object = new XML_RPC_Message("filler");

		$parser_object->xh[$parser]					= array();
		$parser_object->xh[$parser]['isf']			= 0;
		$parser_object->xh[$parser]['isf_reason']	= '';
		$parser_object->xh[$parser]['params']		= array();
		$parser_object->xh[$parser]['stack']		= array();
		$parser_object->xh[$parser]['valuestack']	= array();
		$parser_object->xh[$parser]['method']		= '';

		xml_set_object($parser, $parser_object);
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, true);
=======
		$parser_object = new XML_RPC_Message('filler');

		$parser_object->xh[$parser] = array(
							'isf' =>	0,
							'isf_reason' =>	'',
							'params' =>	array(),
							'stack' =>	array(),
							'valuestack' =>	array(),
							'method' =>	''
						);

		xml_set_object($parser, $parser_object);
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, TRUE);
>>>>>>> codeigniter/develop
		xml_set_element_handler($parser, 'open_tag', 'closing_tag');
		xml_set_character_data_handler($parser, 'character_data');
		//xml_set_default_handler($parser, 'default_handler');

<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		//-------------------------------------
		//  PARSE + PROCESS XML DATA
		//-------------------------------------

		if ( ! xml_parse($parser, $data, 1))
		{
			// return XML error as a faultCode
			$r = new XML_RPC_Response(0,
			$this->xmlrpcerrxml + xml_get_error_code($parser),
			sprintf('XML error: %s at line %d',
				xml_error_string(xml_get_error_code($parser)),
				xml_get_current_line_number($parser)));
			xml_parser_free($parser);
		}
		elseif ($parser_object->xh[$parser]['isf'])
		{
			return new XML_RPC_Response(0, $this->xmlrpcerr['invalid_return'], $this->xmlrpcstr['invalid_return']);
		}
		else
		{
			xml_parser_free($parser);

			$m = new XML_RPC_Message($parser_object->xh[$parser]['method']);
			$plist='';

<<<<<<< HEAD
			for ($i=0; $i < count($parser_object->xh[$parser]['params']); $i++)
			{
				if ($this->debug === TRUE)
				{
					$plist .= "$i - " .  print_r(get_object_vars($parser_object->xh[$parser]['params'][$i]), TRUE). ";\n";
=======
			for ($i = 0, $c = count($parser_object->xh[$parser]['params']); $i < $c; $i++)
			{
				if ($this->debug === TRUE)
				{
					$plist .= $i.' - '.print_r(get_object_vars($parser_object->xh[$parser]['params'][$i]), TRUE).";\n";
>>>>>>> codeigniter/develop
				}

				$m->addParam($parser_object->xh[$parser]['params'][$i]);
			}

			if ($this->debug === TRUE)
			{
<<<<<<< HEAD
				echo "<pre>";
				echo "---PLIST---\n" . $plist . "\n---PLIST END---\n\n";
				echo "</pre>";
=======
				echo "<pre>---PLIST---\n".$plist."\n---PLIST END---\n\n</pre>";
>>>>>>> codeigniter/develop
			}

			$r = $this->_execute($m);
		}

		//-------------------------------------
		//  SET DEBUGGING MESSAGE
		//-------------------------------------

		if ($this->debug === TRUE)
		{
			$this->debug_msg = "<!-- DEBUG INFO:\n\n".$plist."\n END DEBUG-->\n";
		}

		return $r;
	}

	// --------------------------------------------------------------------

	/**
	 * Executes the Method
	 *
<<<<<<< HEAD
	 * @access	protected
	 * @param	object
	 * @return	mixed
	 */
	function _execute($m)
=======
	 * @param	object
	 * @return	mixed
	 */
	protected function _execute($m)
>>>>>>> codeigniter/develop
	{
		$methName = $m->method_name;

		// Check to see if it is a system call
<<<<<<< HEAD
		$system_call = (strncmp($methName, 'system', 5) == 0) ? TRUE : FALSE;

		if ($this->xss_clean == FALSE)
=======
		$system_call = (strpos($methName, 'system') === 0);

		if ($this->xss_clean === FALSE)
>>>>>>> codeigniter/develop
		{
			$m->xss_clean = FALSE;
		}

		//-------------------------------------
		//  Valid Method
		//-------------------------------------

		if ( ! isset($this->methods[$methName]['function']))
		{
			return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);
		}

		//-------------------------------------
		//  Check for Method (and Object)
		//-------------------------------------

<<<<<<< HEAD
		$method_parts = explode(".", $this->methods[$methName]['function']);
		$objectCall = (isset($method_parts['1']) && $method_parts['1'] != "") ? TRUE : FALSE;

		if ($system_call === TRUE)
		{
			if ( ! is_callable(array($this,$method_parts['1'])))
=======
		$method_parts = explode('.', $this->methods[$methName]['function']);
		$objectCall = (isset($method_parts[1]) && $method_parts[1] !== '');

		if ($system_call === TRUE)
		{
			if ( ! is_callable(array($this,$method_parts[1])))
>>>>>>> codeigniter/develop
			{
				return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);
			}
		}
<<<<<<< HEAD
		else
		{
			if ($objectCall && ! is_callable(array($method_parts['0'],$method_parts['1'])))
			{
				return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);
			}
			elseif ( ! $objectCall && ! is_callable($this->methods[$methName]['function']))
			{
				return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);
			}
=======
		elseif (($objectCall && ! is_callable(array($method_parts[0], $method_parts[1])))
			OR ( ! $objectCall && ! is_callable($this->methods[$methName]['function']))
		)
		{
			return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);
>>>>>>> codeigniter/develop
		}

		//-------------------------------------
		//  Checking Methods Signature
		//-------------------------------------

		if (isset($this->methods[$methName]['signature']))
		{
			$sig = $this->methods[$methName]['signature'];
<<<<<<< HEAD
			for ($i=0; $i<count($sig); $i++)
			{
				$current_sig = $sig[$i];

				if (count($current_sig) == count($m->params)+1)
				{
					for ($n=0; $n < count($m->params); $n++)
					{
						$p = $m->params[$n];
						$pt = ($p->kindOf() == 'scalar') ? $p->scalarval() : $p->kindOf();

						if ($pt != $current_sig[$n+1])
=======
			for ($i = 0, $c = count($sig); $i < $c; $i++)
			{
				$current_sig = $sig[$i];

				if (count($current_sig) === count($m->params)+1)
				{
					for ($n = 0, $mc = count($m->params); $n < $mc; $n++)
					{
						$p = $m->params[$n];
						$pt = ($p->kindOf() === 'scalar') ? $p->scalarval() : $p->kindOf();

						if ($pt !== $current_sig[$n+1])
>>>>>>> codeigniter/develop
						{
							$pno = $n+1;
							$wanted = $current_sig[$n+1];

							return new XML_RPC_Response(0,
								$this->xmlrpcerr['incorrect_params'],
								$this->xmlrpcstr['incorrect_params'] .
<<<<<<< HEAD
								": Wanted {$wanted}, got {$pt} at param {$pno})");
=======
								': Wanted '.$wanted.', got '.$pt.' at param '.$pno.')');
>>>>>>> codeigniter/develop
						}
					}
				}
			}
		}

		//-------------------------------------
		//  Calls the Function
		//-------------------------------------

		if ($objectCall === TRUE)
		{
<<<<<<< HEAD
			if ($method_parts[0] == "this" && $system_call == TRUE)
=======
			if ($method_parts[0] === 'this' && $system_call === TRUE)
>>>>>>> codeigniter/develop
			{
				return call_user_func(array($this, $method_parts[1]), $m);
			}
			else
			{
				if ($this->object === FALSE)
				{
					$CI =& get_instance();
<<<<<<< HEAD
					return $CI->$method_parts['1']($m);
				}
				else
				{
					return $this->object->$method_parts['1']($m);
=======
					return $CI->$method_parts[1]($m);
				}
				else
				{
					return $this->object->$method_parts[1]($m);
>>>>>>> codeigniter/develop
					//return call_user_func(array(&$method_parts['0'],$method_parts['1']), $m);
				}
			}
		}
		else
		{
			return call_user_func($this->methods[$methName]['function'], $m);
		}
	}
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Server Function:  List Methods
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function listMethods($m)
=======
	 * @param	mixed
	 * @return	object
	 */
	public function listMethods($m)
>>>>>>> codeigniter/develop
	{
		$v = new XML_RPC_Values();
		$output = array();

		foreach ($this->methods as $key => $value)
		{
			$output[] = new XML_RPC_Values($key, 'string');
		}

		foreach ($this->system_methods as $key => $value)
		{
<<<<<<< HEAD
			$output[]= new XML_RPC_Values($key, 'string');
=======
			$output[] = new XML_RPC_Values($key, 'string');
>>>>>>> codeigniter/develop
		}

		$v->addArray($output);
		return new XML_RPC_Response($v);
	}
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Server Function:  Return Signature for Method
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function methodSignature($m)
=======
	 * @param	mixed
	 * @return	object
	 */
	public function methodSignature($m)
>>>>>>> codeigniter/develop
	{
		$parameters = $m->output_parameters();
		$method_name = $parameters[0];

		if (isset($this->methods[$method_name]))
		{
			if ($this->methods[$method_name]['signature'])
			{
				$sigs = array();
				$signature = $this->methods[$method_name]['signature'];

<<<<<<< HEAD
				for ($i=0; $i < count($signature); $i++)
				{
					$cursig = array();
					$inSig = $signature[$i];
					for ($j=0; $j<count($inSig); $j++)
					{
						$cursig[]= new XML_RPC_Values($inSig[$j], 'string');
					}
					$sigs[]= new XML_RPC_Values($cursig, 'array');
				}
				$r = new XML_RPC_Response(new XML_RPC_Values($sigs, 'array'));
			}
			else
			{
				$r = new XML_RPC_Response(new XML_RPC_Values('undef', 'string'));
			}
		}
		else
		{
			$r = new XML_RPC_Response(0,$this->xmlrpcerr['introspect_unknown'], $this->xmlrpcstr['introspect_unknown']);
		}
		return $r;
=======
				for ($i = 0, $c = count($signature); $i < $c; $i++)
				{
					$cursig = array();
					$inSig = $signature[$i];
					for ($j = 0, $jc = count($inSig); $j < $jc; $j++)
					{
						$cursig[]= new XML_RPC_Values($inSig[$j], 'string');
					}
					$sigs[] = new XML_RPC_Values($cursig, 'array');
				}

				return new XML_RPC_Response(new XML_RPC_Values($sigs, 'array'));
			}

			return new XML_RPC_Response(new XML_RPC_Values('undef', 'string'));
		}

		return new XML_RPC_Response(0,$this->xmlrpcerr['introspect_unknown'], $this->xmlrpcstr['introspect_unknown']);
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Server Function:  Doc String for Method
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function methodHelp($m)
=======
	 * @param	mixed
	 * @return	object
	 */
	public function methodHelp($m)
>>>>>>> codeigniter/develop
	{
		$parameters = $m->output_parameters();
		$method_name = $parameters[0];

		if (isset($this->methods[$method_name]))
		{
			$docstring = isset($this->methods[$method_name]['docstring']) ? $this->methods[$method_name]['docstring'] : '';

			return new XML_RPC_Response(new XML_RPC_Values($docstring, 'string'));
		}
		else
		{
			return new XML_RPC_Response(0, $this->xmlrpcerr['introspect_unknown'], $this->xmlrpcstr['introspect_unknown']);
		}
	}
<<<<<<< HEAD
	
=======

>>>>>>> codeigniter/develop
	// --------------------------------------------------------------------

	/**
	 * Server Function:  Multi-call
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function multicall($m)
=======
	 * @param	mixed
	 * @return	object
	 */
	public function multicall($m)
>>>>>>> codeigniter/develop
	{
		// Disabled
		return new XML_RPC_Response(0, $this->xmlrpcerr['unknown_method'], $this->xmlrpcstr['unknown_method']);

		$parameters = $m->output_parameters();
		$calls = $parameters[0];

		$result = array();

		foreach ($calls as $value)
		{
			//$attempt = $this->_execute(new XML_RPC_Message($value[0], $value[1]));

			$m = new XML_RPC_Message($value[0]);
			$plist='';

<<<<<<< HEAD
			for ($i=0; $i < count($value[1]); $i++)
=======
			for ($i = 0, $c = count($value[1]); $i < $c; $i++)
>>>>>>> codeigniter/develop
			{
				$m->addParam(new XML_RPC_Values($value[1][$i], 'string'));
			}

			$attempt = $this->_execute($m);

<<<<<<< HEAD
			if ($attempt->faultCode() != 0)
=======
			if ($attempt->faultCode() !== 0)
>>>>>>> codeigniter/develop
			{
				return $attempt;
			}

			$result[] = new XML_RPC_Values(array($attempt->value()), 'array');
		}

		return new XML_RPC_Response(new XML_RPC_Values($result, 'array'));
	}

	// --------------------------------------------------------------------

	/**
	 *  Multi-call Function:  Error Handling
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function multicall_error($err)
=======
	 * @param	mixed
	 * @return	object
	 */
	public function multicall_error($err)
>>>>>>> codeigniter/develop
	{
		$str  = is_string($err) ? $this->xmlrpcstr["multicall_${err}"] : $err->faultString();
		$code = is_string($err) ? $this->xmlrpcerr["multicall_${err}"] : $err->faultCode();

		$struct['faultCode'] = new XML_RPC_Values($code, 'int');
		$struct['faultString'] = new XML_RPC_Values($str, 'string');

		return new XML_RPC_Values($struct, 'struct');
	}

	// --------------------------------------------------------------------

	/**
	 *  Multi-call Function:  Processes method
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function do_multicall($call)
	{
		if ($call->kindOf() != 'struct')
=======
	 * @param	mixed
	 * @return	object
	 */
	public function do_multicall($call)
	{
		if ($call->kindOf() !== 'struct')
>>>>>>> codeigniter/develop
		{
			return $this->multicall_error('notstruct');
		}
		elseif ( ! $methName = $call->me['struct']['methodName'])
		{
			return $this->multicall_error('nomethod');
		}

		list($scalar_type,$scalar_value)=each($methName->me);
<<<<<<< HEAD
		$scalar_type = $scalar_type == $this->xmlrpcI4 ? $this->xmlrpcInt : $scalar_type;

		if ($methName->kindOf() != 'scalar' OR $scalar_type != 'string')
		{
			return $this->multicall_error('notstring');
		}
		elseif ($scalar_value == 'system.multicall')
=======
		$scalar_type = $scalar_type === $this->xmlrpcI4 ? $this->xmlrpcInt : $scalar_type;

		if ($methName->kindOf() !== 'scalar' OR $scalar_type !== 'string')
		{
			return $this->multicall_error('notstring');
		}
		elseif ($scalar_value === 'system.multicall')
>>>>>>> codeigniter/develop
		{
			return $this->multicall_error('recursion');
		}
		elseif ( ! $params = $call->me['struct']['params'])
		{
			return $this->multicall_error('noparams');
		}
<<<<<<< HEAD
		elseif ($params->kindOf() != 'array')
=======
		elseif ($params->kindOf() !== 'array')
>>>>>>> codeigniter/develop
		{
			return $this->multicall_error('notarray');
		}

<<<<<<< HEAD
		list($a,$b)=each($params->me);
		$numParams = count($b);

		$msg = new XML_RPC_Message($scalar_value);
		for ($i = 0; $i < $numParams; $i++)
=======
		list($a,$b) = each($params->me);

		$msg = new XML_RPC_Message($scalar_value);
		for ($i = 0, $numParams = count($b); $i < $numParams; $i++)
>>>>>>> codeigniter/develop
		{
			$msg->params[] = $params->me['array'][$i];
		}

		$result = $this->_execute($msg);

<<<<<<< HEAD
		if ($result->faultCode() != 0)
=======
		if ($result->faultCode() !== 0)
>>>>>>> codeigniter/develop
		{
			return $this->multicall_error($result);
		}

		return new XML_RPC_Values(array($result->value()), 'array');
	}

}
<<<<<<< HEAD
// END XML_RPC_Server class

=======
>>>>>>> codeigniter/develop

/* End of file Xmlrpcs.php */
/* Location: ./system/libraries/Xmlrpcs.php */