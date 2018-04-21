<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public $container_view= 'layout/home';

	public function __construct() {
		parent::__construct();
	}
}
