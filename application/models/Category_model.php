<?php

class Category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_all($id = null)
	{
		$query = $this->db->get('category');
		return $query->custom_result_object('models\\Category');
		//return $query->result();
	}

	public function get_all_for_input_select()
	{
		$query = $this->db->select('category.id, category.name')->order_by('category.name')->get('category');
		$lista = [];
		foreach ($query->result_array() as $item) {
			$lista[$item['id']] = $item['name'];
		}
		return $lista;
	}

	public function count_products($category_id)
	{
		$query = $this->db->get_where('product', array('category_id' => $category_id));
		return $query->num_rows();
	}


	public function get_by_id($id)
	{
		return $this->db->get_where('category', array('id' => $id))->custom_row_object(0, 'models\\Category');
	}

	public function create()
	{
		$status = 1;
		if (!$this->input->post('status')) {
			$status = 2;
		}

		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'status' => $status,
		);

		return $this->db->insert('category', $data);
	}

	public function update($id)
	{
		$status = 1;
		if (!$this->input->post('status')) {
			$status = 2;
		}

		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'status' => $status,
		);

		return $this->db->where('id', $id)->update('category', $data);
	}

	public function delete($id)
	{
		return $this->db->where('id', $id)->delete('category');
	}
}
