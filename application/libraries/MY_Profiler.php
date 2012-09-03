<?php  if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );


/**
 * Created by  MightMedia
 * @author     FDisk
 * @date       9/3/12
 * @time       10:00 PM
 * @copyright  Copyright (c) 2012 MightMedia
 * @version    2.0
 *
 * Description
 */


class MY_Profiler extends CI_Profiler
{

	/**
	 * Compile memory usage
	 *
	 * Display total used memory
	 *
	 * @return	string
	 */
	protected function _compile_memory_usage()
	{
		$this->CI->load->helper( 'number' );
		$output  = "\n\n";
		$output .= '<fieldset id="ci_profiler_memory_usage" style="border:1px solid #5a0099;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee">';
		$output .= "\n";
		$output .= '<legend style="color:#5a0099;">&nbsp;&nbsp;'.$this->CI->lang->line('profiler_memory_usage').'&nbsp;&nbsp;</legend>';
		$output .= "\n";

		if (function_exists('memory_get_usage') && ($usage = memory_get_usage()) != '')
		{
			$output .= "<div style='color:#5a0099;font-weight:normal;padding:4px 0 4px 0'>".byte_format( $usage ).'</div>';
		}
		else
		{
			$output .= "<div style='color:#5a0099;font-weight:normal;padding:4px 0 4px 0'>".$this->CI->lang->line('profiler_no_memory')."</div>";
		}

		$output .= "</fieldset>";

		return $output;
	}
}


/* End of file MY_Profiler.php */
/* Location: ./application/libraries/MY_Profiler.php */