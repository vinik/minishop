<?php

/**
 * country_model.php
 * @author Vinicius Kirst <vinicius.kirst@gmail.com>  
 */

require_once('supermodel.php');

/**
 * Class Country_model
 */
 class Country_model extends Supermodel
{
	function __construct()
	{
		parent::__construct();
		
		$this->set_table_name('countries');
		$this->set_fields('name,abbr');
		$this->set_key('country_id');
	}
	
	/**
	 * Field country_id
	 */
	private $country_id;
	
	/**
	 * Field name
	 */
	private $name;
	
	/**
	 * Field abbr
	 */
	private $abbr;
	
	
	
	/**
	 * Getter country_id
	 * @return country_id
	 */
	function get_country_id(){
		return $this->country_id;
	}
	
	/**
	 * Setter country_id
	 * @param country_id
	 */
	function set_country_id($country_id){
		$this->country_id = $country_id;
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
	 * Getter abbr
	 * @return abbr
	 */
	function get_abbr(){
		return $this->abbr;
	}
	
	/**
	 * Setter abbr
	 * @param abbr
	 */
	function set_abbr($abbr){
		$this->abbr = $abbr;
	}
	
	
	/**
	 * @return Country_model
	 */
	function factory()
	{
		return new Country_model();
	}
	
	
}