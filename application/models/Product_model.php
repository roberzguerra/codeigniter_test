<?php

class Product_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_all($id = null)
	{
		$this->db->select('product.*, category.name AS category_name');
		$this->db->from('product');
		$this->db->join('category', 'category.id = product.category_id');

		$query = $this->db->get();
		return $query->custom_result_object('models\\Product');
		//return $query->result();
	}

	public function get_by_id($id)
	{
		return $this->db->get_where('product', array('id' => $id))->custom_row_object(0, 'models\\Product');
	}

	public function create()
	{

		$data = array(
			'name' => $this->input->post('name'),
			'price' => (float) str_replace(',', '.', $this->input->post('price')),
			'description' => $this->input->post('description'),
			'category_id' => $this->input->post('category'),
		);

		return $this->db->insert('product', $data);
	}

	public function update($id)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'price' => (float) str_replace(',', '.', $this->input->post('price')),
			'description' => $this->input->post('description'),
			'category_id' => $this->input->post('category'),
		);

		return $this->db->where('id', $id)->update('product', $data);
	}

	public function delete($id)
	{
		return $this->db->where('id', $id)->delete('product');
	}
}
