<?php

namespace models;

use DateTime;

class Category
{

	public $id;
	//public $created_at;
	//public $updated_at;
	public $name;
	public $status;


	public function created_at($format)
	{
		return $this->created_at->format($format);
	}

	public function __set($name, $value)
	{
		if ($name === 'created_at') {
			$this->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $value);
		} else if ($name === 'updated_at') {
			$this->updated_at = DateTime::createFromFormat('Y-m-d H:i:s', $value);
		}
	}

	public function __get($name)
	{
		if (isset($this->name)) {
			return $this->name;
		}
	}

	public function get_status()
	{
		if ($this->status === '1') {
			return "Ativo";
		}
		return "Inativo";
	}

	public function get_created_at()
	{
		return $this->created_at->format('d/m/Y H:i');
	}

	public function get_updated_at()
	{
		return $this->updated_at->format('d/m/Y H:i');
	}
}
