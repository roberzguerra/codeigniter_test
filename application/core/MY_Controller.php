<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $container_view = 'layout/container';

	public function __construct() {
		parent::__construct();
		$this->load->library('CustomAutoloader');
		$this->load->library('session');
		$this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/* // Exemplo erro 404
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}*/
		$this->loadViews();

	}

	public function loadViews($container_view=null, $data=null)
	{
		$data = [
			'header' => $this->load->view('layout/header', null, true),
			'base_menus' => $this->load->view('layout/base_menus', null, true),
			'container' => $this->getContainerView($container_view, $data),
			'footer' => $this->load->view('layout/footer', null, true),
		];
		$this->load->view('layout/layout', $data);

	}

	public function getContainerView($container_view=null, $data=null)
	{
		if (!$container_view) {
			$container_view = $this->container_view;
		}

		return $this->load->view($container_view, $data, true);
	}
}
