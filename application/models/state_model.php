<?php

/**
 * state_model.php
 * @author Vinicius Kirst <vinicius.kirst@gmail.com>  
 */

require_once('supermodel.php');

/**
 * Class State_model
 */
 class State_model extends Supermodel
{
	function __construct()
	{
		parent::__construct();
		
		$this->set_table_name('states');
		$this->set_fields('country_id,name,abbr');
		$this->set_key('state_id');
	}
	
	/**
	 * Field state_id
	 */
	private $state_id;
	
	/**
	 * 
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
	 * Getter state_id
	 * @return state_id
	 */
	function get_state_id(){
		return $this->state_id;
	}
	
	/**
	 * Setter state_id
	 * @param state_id
	 */
	function set_state_id($state_id){
		$this->state_id = $state_id;
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
	
	function get_country_id()
	{
		return $this->country_id;
	}
	
	function set_country_id($country_id)
	{
		$this->country_id = $country_id;
	}
	
	
	/**
	 * @return State_model
	 */
	function factory()
	{
		return new State_model();
	}
	
	
}