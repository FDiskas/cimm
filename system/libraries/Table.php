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
 * HTML Table Generating Class
 *
 * Lets you create tables manually or from database result objects, or arrays.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	HTML Tables
<<<<<<< HEAD
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/uri.html
 */
class CI_Table {

	var $rows				= array();
	var $heading			= array();
	var $auto_heading		= TRUE;
	var $caption			= NULL;
	var $template			= NULL;
	var $newline			= "\n";
	var $empty_cells		= "";
	var	$function			= FALSE;

	public function __construct()
	{
		log_message('debug', "Table Class Initialized");
=======
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/table.html
 */
class CI_Table {

	/**
	 * Data for table rows
	 *
	 * @var array
	 */
	public $rows		= array();

	/**
	 * Data for table heading
	 *
	 * @var array
	 */
	public $heading		= array();

	/**
	 * Whether or not to automatically create the table header
	 *
	 * @var bool
	 */
	public $auto_heading	= TRUE;

	/**
	 * Table caption
	 *
	 * @var string
	 */
	public $caption		= NULL;

	/**
	 * Table layout template
	 *
	 * @var array
	 */
	public $template	= NULL;

	/**
	 * Newline setting
	 *
	 * @var string
	 */
	public $newline		= "\n";

	/**
	 * Contents of empty cells
	 *
	 * @var string
	 */
	public $empty_cells	= '';

	/**
	 * Callback for custom table layout
	 *
	 * @var function
	 */
	public $function	= FALSE;

	/**
	 * Set the template from the table config file if it exists
	 *
	 * @param	array	$config	(default: array())
	 * @return	void
	 */
	public function __construct($config = array())
	{
		// initialize config
		foreach ($config as $key => $val)
		{
			$this->template[$key] = $val;
		}

		log_message('debug', 'Table Class Initialized');
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Set the template
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function set_template($template)
=======
	 * @param	array
	 * @return	bool
	 */
	public function set_template($template)
>>>>>>> codeigniter/develop
	{
		if ( ! is_array($template))
		{
			return FALSE;
		}

		$this->template = $template;
<<<<<<< HEAD
=======
		return TRUE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Set the table heading
	 *
	 * Can be passed as an array or discreet params
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	void
	 */
	function set_heading()
=======
	 * @param	mixed
	 * @return	void
	 */
	public function set_heading($args = array())
>>>>>>> codeigniter/develop
	{
		$args = func_get_args();
		$this->heading = $this->_prep_args($args);
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Set columns.  Takes a one-dimensional array as input and creates
	 * a multi-dimensional array with a depth equal to the number of
	 * columns.  This allows a single array with many elements to  be
	 * displayed in a table that has a fixed column count.
	 *
	 * @access	public
=======
	 * Set columns. Takes a one-dimensional array as input and creates
	 * a multi-dimensional array with a depth equal to the number of
	 * columns. This allows a single array with many elements to be
	 * displayed in a table that has a fixed column count.
	 *
>>>>>>> codeigniter/develop
	 * @param	array
	 * @param	int
	 * @return	void
	 */
<<<<<<< HEAD
	function make_columns($array = array(), $col_limit = 0)
	{
		if ( ! is_array($array) OR count($array) == 0)
=======
	public function make_columns($array = array(), $col_limit = 0)
	{
		if ( ! is_array($array) OR count($array) === 0 OR ! is_int($col_limit))
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		// Turn off the auto-heading feature since it's doubtful we
		// will want headings from a one-dimensional array
		$this->auto_heading = FALSE;

<<<<<<< HEAD
		if ($col_limit == 0)
=======
		if ($col_limit === 0)
>>>>>>> codeigniter/develop
		{
			return $array;
		}

		$new = array();
<<<<<<< HEAD
		while (count($array) > 0)
=======
		do
>>>>>>> codeigniter/develop
		{
			$temp = array_splice($array, 0, $col_limit);

			if (count($temp) < $col_limit)
			{
				for ($i = count($temp); $i < $col_limit; $i++)
				{
					$temp[] = '&nbsp;';
				}
			}

			$new[] = $temp;
		}
<<<<<<< HEAD
=======
		while (count($array) > 0);
>>>>>>> codeigniter/develop

		return $new;
	}

	// --------------------------------------------------------------------

	/**
	 * Set "empty" cells
	 *
	 * Can be passed as an array or discreet params
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	void
	 */
	function set_empty($value)
=======
	 * @param	mixed
	 * @return	void
	 */
	public function set_empty($value)
>>>>>>> codeigniter/develop
	{
		$this->empty_cells = $value;
	}

	// --------------------------------------------------------------------

	/**
	 * Add a table row
	 *
	 * Can be passed as an array or discreet params
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	void
	 */
	function add_row()
=======
	 * @param	mixed
	 * @return	void
	 */
	public function add_row($args = array())
>>>>>>> codeigniter/develop
	{
		$args = func_get_args();
		$this->rows[] = $this->_prep_args($args);
	}

	// --------------------------------------------------------------------

	/**
	 * Prep Args
	 *
	 * Ensures a standard associative array format for all cell data
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	type
	 * @return	type
	 */
	function _prep_args($args)
=======
	 * @param	array
	 * @return	array
	 */
	protected function _prep_args($args)
>>>>>>> codeigniter/develop
	{
		// If there is no $args[0], skip this and treat as an associative array
		// This can happen if there is only a single key, for example this is passed to table->generate
		// array(array('foo'=>'bar'))
<<<<<<< HEAD
		if (isset($args[0]) AND (count($args) == 1 && is_array($args[0])))
=======
		if (isset($args[0]) && count($args) === 1 && is_array($args[0]))
>>>>>>> codeigniter/develop
		{
			// args sent as indexed array
			if ( ! isset($args[0]['data']))
			{
				foreach ($args[0] as $key => $val)
				{
<<<<<<< HEAD
					if (is_array($val) && isset($val['data']))
					{
						$args[$key] = $val;
					}
					else
					{
						$args[$key] = array('data' => $val);
					}
=======
					$args[$key] = (is_array($val) && isset($val['data'])) ? $val : array('data' => $val);
>>>>>>> codeigniter/develop
				}
			}
		}
		else
		{
			foreach ($args as $key => $val)
			{
				if ( ! is_array($val))
				{
					$args[$key] = array('data' => $val);
				}
			}
		}

		return $args;
	}

	// --------------------------------------------------------------------

	/**
	 * Add a table caption
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_caption($caption)
=======
	 * @param	string
	 * @return	void
	 */
	public function set_caption($caption)
>>>>>>> codeigniter/develop
	{
		$this->caption = $caption;
	}

	// --------------------------------------------------------------------

	/**
	 * Generate the table
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	mixed
	 * @return	string
	 */
	function generate($table_data = NULL)
=======
	 * @param	mixed
	 * @return	string
	 */
	public function generate($table_data = NULL)
>>>>>>> codeigniter/develop
	{
		// The table data can optionally be passed to this function
		// either as a database result object or an array
		if ( ! is_null($table_data))
		{
			if (is_object($table_data))
			{
				$this->_set_from_object($table_data);
			}
			elseif (is_array($table_data))
			{
<<<<<<< HEAD
				$set_heading = (count($this->heading) == 0 AND $this->auto_heading == FALSE) ? FALSE : TRUE;
=======
				$set_heading = (count($this->heading) !== 0 OR $this->auto_heading !== FALSE);
>>>>>>> codeigniter/develop
				$this->_set_from_array($table_data, $set_heading);
			}
		}

<<<<<<< HEAD
		// Is there anything to display?  No?  Smite them!
		if (count($this->heading) == 0 AND count($this->rows) == 0)
=======
		// Is there anything to display? No? Smite them!
		if (count($this->heading) === 0 && count($this->rows) === 0)
>>>>>>> codeigniter/develop
		{
			return 'Undefined table data';
		}

		// Compile and validate the template date
		$this->_compile_template();

		// set a custom cell manipulation function to a locally scoped variable so its callable
		$function = $this->function;

		// Build the table!

<<<<<<< HEAD
		$out = $this->template['table_open'];
		$out .= $this->newline;
=======
		$out = $this->template['table_open'].$this->newline;
>>>>>>> codeigniter/develop

		// Add any caption here
		if ($this->caption)
		{
<<<<<<< HEAD
			$out .= $this->newline;
			$out .= '<caption>' . $this->caption . '</caption>';
			$out .= $this->newline;
=======
			$out .= $this->newline.'<caption>'.$this->caption.'</caption>'.$this->newline;
>>>>>>> codeigniter/develop
		}

		// Is there a table heading to display?
		if (count($this->heading) > 0)
		{
<<<<<<< HEAD
			$out .= $this->template['thead_open'];
			$out .= $this->newline;
			$out .= $this->template['heading_row_start'];
			$out .= $this->newline;
=======
			$out .= $this->template['thead_open'].$this->newline.$this->template['heading_row_start'].$this->newline;
>>>>>>> codeigniter/develop

			foreach ($this->heading as $heading)
			{
				$temp = $this->template['heading_cell_start'];

				foreach ($heading as $key => $val)
				{
<<<<<<< HEAD
					if ($key != 'data')
					{
						$temp = str_replace('<th', "<th $key='$val'", $temp);
					}
				}

				$out .= $temp;
				$out .= isset($heading['data']) ? $heading['data'] : '';
				$out .= $this->template['heading_cell_end'];
			}

			$out .= $this->template['heading_row_end'];
			$out .= $this->newline;
			$out .= $this->template['thead_close'];
			$out .= $this->newline;
=======
					if ($key !== 'data')
					{
						$temp = str_replace('<th', '<th '.$key.'="'.$val.'"', $temp);
					}
				}

				$out .= $temp.(isset($heading['data']) ? $heading['data'] : '').$this->template['heading_cell_end'];
			}

			$out .= $this->template['heading_row_end'].$this->newline.$this->template['thead_close'].$this->newline;
>>>>>>> codeigniter/develop
		}

		// Build the table rows
		if (count($this->rows) > 0)
		{
<<<<<<< HEAD
			$out .= $this->template['tbody_open'];
			$out .= $this->newline;
=======
			$out .= $this->template['tbody_open'].$this->newline;
>>>>>>> codeigniter/develop

			$i = 1;
			foreach ($this->rows as $row)
			{
				if ( ! is_array($row))
				{
					break;
				}

				// We use modulus to alternate the row colors
<<<<<<< HEAD
				$name = (fmod($i++, 2)) ? '' : 'alt_';

				$out .= $this->template['row_'.$name.'start'];
				$out .= $this->newline;
=======
				$name = fmod($i++, 2) ? '' : 'alt_';

				$out .= $this->template['row_'.$name.'start'].$this->newline;
>>>>>>> codeigniter/develop

				foreach ($row as $cell)
				{
					$temp = $this->template['cell_'.$name.'start'];

					foreach ($cell as $key => $val)
					{
<<<<<<< HEAD
						if ($key != 'data')
						{
							$temp = str_replace('<td', "<td $key='$val'", $temp);
=======
						if ($key !== 'data')
						{
							$temp = str_replace('<td', '<td '.$key.'="'.$val.'"', $temp);
>>>>>>> codeigniter/develop
						}
					}

					$cell = isset($cell['data']) ? $cell['data'] : '';
					$out .= $temp;

<<<<<<< HEAD
					if ($cell === "" OR $cell === NULL)
					{
						$out .= $this->empty_cells;
					}
					else
					{
						if ($function !== FALSE && is_callable($function))
						{
							$out .= call_user_func($function, $cell);
						}
						else
						{
							$out .= $cell;
						}
=======
					if ($cell === '' OR $cell === NULL)
					{
						$out .= $this->empty_cells;
					}
					elseif ($function !== FALSE && is_callable($function))
					{
						$out .= call_user_func($function, $cell);
					}
					else
					{
						$out .= $cell;
>>>>>>> codeigniter/develop
					}

					$out .= $this->template['cell_'.$name.'end'];
				}

<<<<<<< HEAD
				$out .= $this->template['row_'.$name.'end'];
				$out .= $this->newline;
			}

			$out .= $this->template['tbody_close'];
			$out .= $this->newline;
=======
				$out .= $this->template['row_'.$name.'end'].$this->newline;
			}

			$out .= $this->template['tbody_close'].$this->newline;
>>>>>>> codeigniter/develop
		}

		$out .= $this->template['table_close'];

		// Clear table class properties before generating the table
		$this->clear();

		return $out;
	}

	// --------------------------------------------------------------------

	/**
	 * Clears the table arrays.  Useful if multiple tables are being generated
	 *
<<<<<<< HEAD
	 * @access	public
	 * @return	void
	 */
	function clear()
	{
		$this->rows				= array();
		$this->heading			= array();
		$this->auto_heading		= TRUE;
=======
	 * @return	void
	 */
	public function clear()
	{
		$this->rows		= array();
		$this->heading		= array();
		$this->auto_heading	= TRUE;
>>>>>>> codeigniter/develop
	}

	// --------------------------------------------------------------------

	/**
	 * Set table data from a database result object
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	object
	 * @return	void
	 */
	function _set_from_object($query)
	{
		if ( ! is_object($query))
		{
			return FALSE;
		}

		// First generate the headings from the table column names
		if (count($this->heading) == 0)
		{
			if ( ! method_exists($query, 'list_fields'))
			{
				return FALSE;
=======
	 * @param	object
	 * @return	void
	 */
	protected function _set_from_object($query)
	{
		if ( ! is_object($query))
		{
			return;
		}

		// First generate the headings from the table column names
		if (count($this->heading) === 0)
		{
			if ( ! is_callable(array($query, 'list_fields')))
			{
				return;
>>>>>>> codeigniter/develop
			}

			$this->heading = $this->_prep_args($query->list_fields());
		}

		// Next blast through the result array and build out the rows
<<<<<<< HEAD

=======
>>>>>>> codeigniter/develop
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$this->rows[] = $this->_prep_args($row);
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Set table data from an array
	 *
<<<<<<< HEAD
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function _set_from_array($data, $set_heading = TRUE)
	{
		if ( ! is_array($data) OR count($data) == 0)
=======
	 * @param	array
	 * @param	bool
	 * @return	void
	 */
	protected function _set_from_array($data, $set_heading = TRUE)
	{
		if ( ! is_array($data) OR count($data) === 0)
>>>>>>> codeigniter/develop
		{
			return FALSE;
		}

		$i = 0;
		foreach ($data as $row)
		{
			// If a heading hasn't already been set we'll use the first row of the array as the heading
<<<<<<< HEAD
			if ($i == 0 AND count($data) > 1 AND count($this->heading) == 0 AND $set_heading == TRUE)
=======
			if ($i++ === 0 && count($data) > 1 && count($this->heading) === 0 && $set_heading === TRUE)
>>>>>>> codeigniter/develop
			{
				$this->heading = $this->_prep_args($row);
			}
			else
			{
				$this->rows[] = $this->_prep_args($row);
			}
<<<<<<< HEAD

			$i++;
=======
>>>>>>> codeigniter/develop
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Compile Template
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	void
	 */
	function _compile_template()
	{
		if ($this->template == NULL)
=======
	 * @return	void
	 */
	protected function _compile_template()
	{
		if ($this->template === NULL)
>>>>>>> codeigniter/develop
		{
			$this->template = $this->_default_template();
			return;
		}

		$this->temp = $this->_default_template();
		foreach (array('table_open', 'thead_open', 'thead_close', 'heading_row_start', 'heading_row_end', 'heading_cell_start', 'heading_cell_end', 'tbody_open', 'tbody_close', 'row_start', 'row_end', 'cell_start', 'cell_end', 'row_alt_start', 'row_alt_end', 'cell_alt_start', 'cell_alt_end', 'table_close') as $val)
		{
			if ( ! isset($this->template[$val]))
			{
				$this->template[$val] = $this->temp[$val];
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Default Template
	 *
<<<<<<< HEAD
	 * @access	private
	 * @return	void
	 */
	function _default_template()
	{
		return  array (
						'table_open'			=> '<table border="0" cellpadding="4" cellspacing="0">',

						'thead_open'			=> '<thead>',
						'thead_close'			=> '</thead>',

						'heading_row_start'		=> '<tr>',
						'heading_row_end'		=> '</tr>',
						'heading_cell_start'	=> '<th>',
						'heading_cell_end'		=> '</th>',

						'tbody_open'			=> '<tbody>',
						'tbody_close'			=> '</tbody>',

						'row_start'				=> '<tr>',
						'row_end'				=> '</tr>',
						'cell_start'			=> '<td>',
						'cell_end'				=> '</td>',

						'row_alt_start'		=> '<tr>',
						'row_alt_end'			=> '</tr>',
						'cell_alt_start'		=> '<td>',
						'cell_alt_end'			=> '</td>',

						'table_close'			=> '</table>'
					);
	}


}


=======
	 * @return	void
	 */
	protected function _default_template()
	{
		return  array(
				'table_open'		=> '<table border="0" cellpadding="4" cellspacing="0">',

				'thead_open'		=> '<thead>',
				'thead_close'		=> '</thead>',

				'heading_row_start'	=> '<tr>',
				'heading_row_end'	=> '</tr>',
				'heading_cell_start'	=> '<th>',
				'heading_cell_end'	=> '</th>',

				'tbody_open'		=> '<tbody>',
				'tbody_close'		=> '</tbody>',

				'row_start'		=> '<tr>',
				'row_end'		=> '</tr>',
				'cell_start'		=> '<td>',
				'cell_end'		=> '</td>',

				'row_alt_start'		=> '<tr>',
				'row_alt_end'		=> '</tr>',
				'cell_alt_start'	=> '<td>',
				'cell_alt_end'		=> '</td>',

				'table_close'		=> '</table>'
			);
	}

}

>>>>>>> codeigniter/develop
/* End of file Table.php */
/* Location: ./system/libraries/Table.php */