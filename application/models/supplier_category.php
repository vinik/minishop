<?php

/**
 * supplier_category_model.php
* @author Vinicius Kirst <vinicius.kirst@gmail.com>
*/

require_once('supermodel.php');

/**
 * Class Supplier_category_model
*/
class Supplier_category_model extends Supermodel
{
	function __construct()
	{
		parent::__construct();

		$this->set_table_name('supplier_category');
		$this->set_fields('name');
		$this->set_key('category_id');
	}

	private $category_id = NULL;

	/**
	 * Field name
	 */
	private $name;

	function get_category_id(){
		return $this->category_id;
	}

	function set_category_id($category_id){
		$this->category_id = $category_id;
	}

	/**
	 * Getter name
	 * @return name
	 */
	function get_name(){
		return $this->name;
	}

	/**
	 * Setter name
	 * @param name
	 */
	function set_name($name){
		$this->name = $name;
	}

	/**
	 * @return Supplier_category_model
	 */
	function factory()
	{
		return new Supplier_category_model();
	}


}