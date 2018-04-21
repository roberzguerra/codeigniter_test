<?php

class Produto extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('product_model');
	}



	public function index()
	{
		/* // Exemplo erro 404
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}*/

		$data = [
			'list_all' =>  $this->product_model->get_all(),
			'message_success' => $this->session->flashdata('save'),
			'message_delete' => $this->session->flashdata('delete'),
			'message_update' => $this->session->flashdata('update'),
		];

		$this->loadViews('produto/list', $data);
	}

	public function novo()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('category_model');

		$data = [
			'product' => null,
			'list_category_select' => $this->category_model->get_all_for_input_select(),
		];


		$this->form_validation->set_rules('name', 'Nome', 'required');
		$this->form_validation->set_rules('description', 'Descrição', 'required');
		$this->form_validation->set_rules('category', 'Categoria', 'required');

		$this->form_validation->set_rules('price', "Preço", 'required|callback_validate_decimal_brasil');
		$this->form_validation->set_message('validate_decimal_brasil','Campo Preço deve conter um valor decimal, exemplo: 10,50');

		if ($this->form_validation->run() === FALSE)
		{

			$this->loadViews('produto/form', $data);
		}
		else
		{
			$this->product_model->create();
			$this->session->set_flashdata('save', true);
			redirect('produto_index');
		}
	}

	function validate_decimal_brasil($value)
	{

		if (!preg_match('/^[0-9]+,[0-9]{2}$/', $value)) {
			return false;
		}
		return true;
	}

	function remover() {

		$this->product_model->delete($this->input->post('id'));

		$this->session->set_flashdata('delete', true);
		redirect('produto_index');

	}

	public function alterar($id = null)
	{

		if ($id) {
			$product = $this->product_model->get_by_id($id);


			if (!$product) {
				show_404();
			}

			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('category_model');

			$data = [
				'product' => $product,
				'list_category_select' => $this->category_model->get_all_for_input_select(),
				'message_success' => false,
			];


			$this->form_validation->set_rules('name', 'Nome', 'required');
			$this->form_validation->set_rules('description', 'Descrição', 'required');
			$this->form_validation->set_rules('category', 'Categoria', 'required');

			$this->form_validation->set_rules('price', "Preço", 'required|callback_validate_decimal_brasil');
			$this->form_validation->set_message('validate_decimal_brasil','Campo Preço deve conter um valor decimal, exemplo: 10,50');

			if ($this->form_validation->run() === FALSE)
			{

				$this->loadViews('produto/form', $data);
			}
			else
			{
				$this->product_model->update($id);
				$this->session->set_flashdata('update', true);
				redirect('produto_index');
			}
		}
	}

}
