<?php  if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/**
 * Created by  JetBrains PhpStorm.
 * @author     FDisk
 * @date       9/3/12
 * @time       9:09 PM
 * @copyright  Copyright (c) 2012 MightMedia
 * @version    2.0
 *
 * Description
 *
 * @property MY_Output $output
 */


class Install extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->output->enable_profiler( true );

	}

	public function index() {

		$this->load->model('install_model');

		$this->install_model->createDatabase();

		$data['title'] = "The Smarty installer works!";
		$data['body']  = "This is body text to show that the Smarty Parser works!";

		// Load the template from the views directory
		$this->parser->parse("index.tpl", $data);
	}

	public function install() {

	}

	private function _checkDB() {

	}

	private function _checkTable() {

	}

	private function _checkFields() {

	}

	private function _optimize() {

	}

}


/* End of file install.php */
/* Location: ./application/controllers/install.php */