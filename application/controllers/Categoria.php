<?php

class Categoria extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('category_model');
		$this->load->library('form_validation');
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
			'list_all' =>  $this->category_model->get_all(),
			'message_success' => $this->session->flashdata('save'),
			'message_delete' => $this->session->flashdata('delete'),
			'message_update' => $this->session->flashdata('update'),
			'delete_message_validation' => $this->session->flashdata('delete_message_validation'),
		];

		$this->loadViews('categoria/list', $data);
	}

	public function novo()
	{
		$this->load->helper('form');

		$data = [
			'category' => null,
		];

		$this->form_validation->set_rules('name', 'Nome', 'required');
		$this->form_validation->set_rules('description', 'Descrição', 'required');

		if ($this->form_validation->run() === FALSE)
		{

			$this->loadViews('categoria/form', $data);
		}
		else
		{
			$this->category_model->create();
			$this->session->set_flashdata('save', true);
			redirect('categoria_index');
		}
	}


	function remover() {

		//$this->message_validate_remover_category = "Esta categoria possui produtos. Não é permitido remover categorias que possuem produtos";
		$id = $this->input->post('id');

		$count_produtos = $this->category_model->count_products($id);
		if ($count_produtos > 0) {
			$categoria = $this->category_model->get_by_id($id);
			$message = "A categoria <strong>{$categoria->name}</strong> possui <strong>{$count_produtos} produto(s)</strong>. Não é permitido remover categorias que possuem produtos";

			$this->session->set_flashdata('delete_message_validation', $message);
		} else {

			$this->category_model->delete($id);
			$this->session->set_flashdata('delete', true);
		}
		redirect('categoria_index');
	}

	public function alterar($id = null)
	{

		if ($id) {
			$product = $this->category_model->get_by_id($id);


			if (!$product) {
				show_404();
			}

			$this->load->helper('form');
			$this->load->library('form_validation');

			$data = [
				'category' => $product,
				'list_category_select' => $this->category_model->get_all_for_input_select(),
				'message_success' => false,
			];

			$this->form_validation->set_rules('name', 'Nome', 'required');
			$this->form_validation->set_rules('description', 'Descrição', 'required');

			if ($this->form_validation->run() === FALSE)
			{

				$this->loadViews('categoria/form', $data);
			}
			else
			{
				$this->category_model->update($id);
				$this->session->set_flashdata('update', true);
				redirect('categoria_index');
			}
		}
	}

}
