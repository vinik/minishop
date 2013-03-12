<?php

/**
 * user_model.php
 * @author Vinicius Kirst <vinicius.kirst@gmail.com>  
 */

require_once('supermodel.php');

/**
 * Class User_model
 */
 class User_model extends Supermodel
{
	function __construct()
	{
		parent::__construct();
		
		$this->set_table_name('users');
		$this->set_fields('username,password,email');
		$this->set_key('user_id');
	}
	
	private $user_id = NULL;
	
	/**
	 * Field username
	 */
	private $username;
	
	/**
	 * Field password
	 */
	private $password;
	
	/**
	 * Field email
	 */
	private $email;
	
	
	
	function get_cust_id(){
		return $this->cust_id;
	}
	
	function set_cust_id($cust_id){
		$this->cust_id = $cust_id;
	}
	
	/**
	 * Getter username
	 * @return username
	 */
	function get_username(){
		return $this->username;
	}
	
	/**
	 * Setter username
	 * @param username
	 */
	function set_username($username){
		$this->username = $username;
	}
	
	/**
	 * Getter password
	 * @return password
	 */
	function get_password(){
		return $this->password;
	}
	
	/**
	 * Setter password
	 * @param password
	 */
	function set_password($password){
		$this->password = $password;
	}
	
	
	
	/**
	 * Getter email
	 * @return email
	 */
	function get_email(){
		return $this->email;
	}
	
	/**
	 * Setter email
	 * @param email
	 */
	function set_email($email){
		$this->email = $email;
	}
	
	
	
	/**
	 * @return User_model
	 */
	function factory()
	{
		return new User_model();
	}
	
	
}