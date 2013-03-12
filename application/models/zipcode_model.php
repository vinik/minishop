<?php

/**
 * zipcode_model.php
 * @author Vinicius Kirst <vinicius.kirst@gmail.com>  
 */

require_once('supermodel.php');

/**
 * Class Zipcode_model
 */
 class Zipcode_model extends Supermodel
{
	function __construct()
	{
		parent::__construct();
		
		$this->set_table_name('zipcodes');
		$this->set_fields('city,latitude,longitude,state_id,zip');
		$this->set_key('zipcode_id');
	}
	
	private $zipcode_id;
	
	/**
	 * Field zip
	 */
	private $zip;
	
	/**
	 * Field city
	 */
	private $city;
	
	/**
	 * Field latitude
	 */
	private $latitude;
	
	/**
	 * Field longitude
	 */
	private $longitude;
	
	/**
	 * Field state_id
	 */
	private $state_id;
	
	
	
	/**
	 * Getter zipcode_id
	 * @return zipcode_id
	 */
	function get_zipcode_id(){
		return $this->zipcode_id;
	}
	
	/**
	 * Setter zipcode_id
	 * @param zipcode_id
	 */
	function set_zipcode_id($zipcode_id){
		$this->zipcode_id = $zipcode_id;
	}
	
	/**
	 * Getter zip
	 * @return zip
	 */
	function get_zip(){
		return $this->zip;
	}
	
	/**
	 * Setter zip
	 * @param zip
	 */
	function set_zip($zip){
		$this->zip = $zip;
	}
	
	/**
	 * Getter city
	 * @return city
	 */
	function get_city(){
		return $this->city;
	}
	
	/**
	 * Setter city
	 * @param city
	 */
	function set_city($city){
		$this->city = $city;
	}
	
	
	
	/**
	 * Getter latitude
	 * @return latitude
	 */
	function get_latitude(){
		return $this->latitude;
	}
	
	/**
	 * Setter latitude
	 * @param latitude
	 */
	function set_latitude($latitude){
		$this->latitude = $latitude;
	}
	
	/**
	 * Getter longitude
	 * @return longitude
	 */
	function get_longitude(){
		return $this->longitude;
	}
	
	/**
	 * Setter longitude
	 * @param longitude
	 */
	function set_longitude($longitude){
		$this->longitude = $longitude;
	}
	
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
	 * @return Zipcode_model
	 */
	function factory()
	{
		return new Zipcode_model();
	}
	
	
}