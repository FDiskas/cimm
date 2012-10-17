<?php  if ( !defined( 'BASEPATH' ) ) {exit( 'No direct script access allowed' );
}

/**
 * Created by  MyghtMedia
 * @author     FDisk
 * @date       9/16/12
 * @time       10:22 PM
 * @copyright  Copyright (c) 2012 MightMedia
 * @version    2.0
 *
 * Description
 */


class Demo extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->parser->parse('admin/main','labas');
	}
}


/* End of file demo.php */
/* Location: ./application/controllers/demo.php */