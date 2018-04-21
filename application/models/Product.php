<?php

namespace models;

use DateTime;

/**
 * Class Product
 * Fields:
 * 	$id
 * 	$created_at
 *  $updated_at
 * 	$name
 *  $description
 *  $price
 *  $category_id
 *
 *
 *
 * @package models
 */
class Product
{
	public $id;
	public $name;
	//public $created_at;
	//public $updated_at;
	public $description;
	public $price;
	public $category_id;
	public $category_name;


	public function __set($name, $value)
	{

		// Para formatar no Set eh preciso remover adeclaracao pulic $creted_at
		if ($name === 'created_at')
		{
			$this->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $value);
		}
		if ($name === 'updated_at')
		{
			$this->updated_at = DateTime::createFromFormat('Y-m-d H:i:s', $value);
		}
	}

	public function __get($name)
	{
		if (isset($this->name)) {
			return $this->name;
		}
	}

	public function get_price()
	{
		return number_format($this->price, '2', ',', '.');
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
