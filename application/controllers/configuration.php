<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('configuration/dashboard');
	}
	
	
	/*
	 * COUNTRIES
	 */
	
	function countries()
	{
		$country = $this->country_model->factory();
		$data['country_list'] = $country->search();
		
		$this->load->view('configuration/countries', $data);
	}
	
	function edit_country($country_id)
	{
		$country = $this->country_model->factory();
		$country->set_country_id($country_id);
		if ($country->retrieve()) {
			$data['country'] = $country;
			$this->load->view('configuration/country_form', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('countries.error.not-found'));
			redirect('configuration/countries', 'refresh');
		}
	}
	
	function new_country()
	{
		$country = $this->country_model->factory();
		$data['country'] = $country;
		$this->load->view('configuration/country_form', $data);
	}
	
	function process_country()
	{
		
		$country_id = $this->input->post('country_id');
		$process = TRUE;
		
		$country = $this->country_model->factory();
		
		if ($country_id) {
			$country->set_country_id($country_id);
			$process = $country->retrieve();
		}
		
		if ($process) {
			$this->load->library('form_validation');
			
			if ($this->form_validation->run('country') == FALSE) {
				if ($country_id) {
					$this->edit_country($country_id);
				} else {
					$this->new_country();
				}
			} else {
				$country->retrieve_post();
				if ($country_id) {
					$result = $country->update();
				} else {
					$result = $country->create();
				}
				
				if ($result) {
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $this->lang->line('countries.process-country.success'));
				} else {
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('countries.process-country.error'));
				}
				redirect('configuration/countries', 'refresh');
			}
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('countries.error.not-found'));
			redirect('configuration/countries');
		}
		
	}
	
	/*
	 * STATES
	 */
	
	function states()
	{
		$state = $this->state_model->factory();
		$data['state_list'] = $state->search();
		$this->load->view('configuration/states', $data);
	}
	
	function edit_state($state_id)
	{
		$state = $this->state_model->factory();
		$state->set_state_id($state_id);
		if ($state->retrieve()) {
			$data['state'] = $state;
			$this->load->view('configuration/state_form', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('states.error.not-found'));
			redirect('configuration/states', 'refresh');
		}
	}
	
	function new_state()
	{
		$state = $this->state_model->factory();
		$data['state'] = $state;
		$this->load->view('configuration/state_form', $data);
	}
	
	function process_state()
	{
		$state = $this->state_model->factory();
		$state_id = $this->input->post($state->get_key());
		
		$process = TRUE;
		
		if ($state_id) {
			$state->set_state_id($state_id);
			$process = $state->retrieve();
		}
		
		if ($process) {
			$this->load->library('form_validation');
				
			if ($this->form_validation->run('state') == FALSE) {
				if ($state_id) {
					$this->edit_state($state_id);
				} else {
					$this->new_state();
				}
			} else {
				$state->retrieve_post();
				if ($state_id) {
					$result = $state->update();
				} else {
					$result = $state->create();
				}
				
				if ($result) {
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $this->lang->line('states.process-state.success'));
				} else {
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('states.process-state.error'));
				}
				redirect('configuration/states', 'refresh');
			}
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('states.error.not-found'));
			redirect('configuration/states');
		}
		
	}
	
	/*
	 * USERTYPES
	 */
	
	function usertypes()
	{
		$usertype = $this->usertype_model->factory();
		$data['usertype_list'] = $usertype->search();
		$this->load->view('configuration/usertypes', $data);
	}
	
	function new_usertype()
	{
		$usertype = $this->usertype_model->factory();
		$usertype = $this->usertype_model->factory();
		$data['usertype'] = $usertype;
		$this->load->view('configuration/usertype_form', $data);
	}
	
	function edit_usertype($usertype_id)
	{
		$usertype = $this->usertype_model->factory();
		$usertype->set_usertype_id($usertype_id);
		if ($usertype->retrieve()) {
			$data['usertype'] = $usertype;
			$this->load->view('configuration/usertype_form', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('usertypes.error.not-found'));
			redirect('configuration/usertypes', 'refresh');
		}
	}
	
	function process_usertype()
	{
		$usertype = $this->usertype_model->factory();
		$usertype_id = $this->input->post($usertype->get_key());
	
		$process = TRUE;
	
		if ($usertype_id) {
			$usertype->set_usertype_id($usertype_id);
			$process = $usertype->retrieve();
		}
	
		if ($process) {
			$this->load->library('form_validation');
	
			if ($this->form_validation->run('usertype') == FALSE) {
				if ($usertype_id) {
					$this->edit_usertype($usertype_id);
				} else {
					$this->new_usertype();
				}
			} else {
				$usertype->retrieve_post();
				if ($usertype_id) {
					$result = $usertype->update();
				} else {
					$result = $usertype->create();
				}
	
				if ($result) {
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $this->lang->line('usertypes.process-usertype.success'));
				} else {
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('usertypes.process-usertype.error'));
				}
				redirect('configuration/usertypes', 'refresh');
			}
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('usertypes.error.not-found'));
			redirect('configuration/usertypes');
		}
	
	}
	
	
	/*
	 * SERVICETYPES
	*/
	
	function servicetypes()
	{
		$this->load->model('servicetype_model');
		$servicetype = $this->servicetype_model->factory();
		$data['servicetype_list'] = $servicetype->search();
		$this->load->view('configuration/servicetypes', $data);
	}
	
	function new_servicetype()
	{
		$this->load->model('servicetype_model');
		$servicetype = $this->servicetype_model->factory();
		$servicetype = $this->servicetype_model->factory();
		$data['servicetype'] = $servicetype;
		$this->load->view('configuration/servicetype_form', $data);
	}
	
	function edit_servicetype($servicetype_id)
	{
		$this->load->model('servicetype_model');
		$servicetype = $this->servicetype_model->factory();
		$servicetype->set_servicetype_id($servicetype_id);
		if ($servicetype->retrieve()) {
			$data['servicetype'] = $servicetype;
			$this->load->view('configuration/servicetype_form', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('servicetypes.error.not-found'));
			redirect('configuration/servicetypes', 'refresh');
		}
	}
	
	function process_servicetype()
	{
		$this->load->model('servicetype_model');
		$servicetype = $this->servicetype_model->factory();
		$servicetype_id = $this->input->post($servicetype->get_key());
	
		$process = TRUE;
	
		if ($servicetype_id) {
			$servicetype->set_servicetype_id($servicetype_id);
			$process = $servicetype->retrieve();
		}
	
		if ($process) {
			$this->load->library('form_validation');
	
			if ($this->form_validation->run('servicetype') == FALSE) {
				if ($servicetype_id) {
					$this->edit_servicetype($servicetype_id);
				} else {
					$this->new_servicetype();
				}
			} else {
				$servicetype->retrieve_post();
				if ($servicetype_id) {
					$result = $servicetype->update();
				} else {
					$result = $servicetype->create();
				}
	
				if ($result) {
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $this->lang->line('servicetypes.process-servicetype.success'));
				} else {
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('servicetypes.process-servicetype.error'));
				}
				redirect('configuration/servicetypes', 'refresh');
			}
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('servicetypes.error.not-found'));
			redirect('configuration/servicetypes');
		}
	}
	
	/*
	 * PLANTSIZETYPE
	 */
	
	function plantsizetypes()
	{
		$this->load->model('plantsizetype_model');
		$plantsizetype = $this->plantsizetype_model->factory();
		$data['plantsizetype_list'] = $plantsizetype->search(array('order_by' => 'plantsizetype_order'));
		$this->load->view('configuration/plantsizetypes', $data);
	}
	
	function new_plantsizetype()
	{
		$this->load->model('plantsizetype_model');
		$plantsizetype = $this->plantsizetype_model->factory();
		$plantsizetype = $this->plantsizetype_model->factory();
		$data['plantsizetype'] = $plantsizetype;
		$this->load->view('configuration/plantsizetype_form', $data);
	}
	
	function edit_plantsizetype($plantsizetype_id)
	{
		$this->load->model('plantsizetype_model');
		$plantsizetype = $this->plantsizetype_model->factory();
		$plantsizetype->set_plantsizetype_id($plantsizetype_id);
		if ($plantsizetype->retrieve()) {
			$data['plantsizetype'] = $plantsizetype;
			$this->load->view('configuration/plantsizetype_form', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('plantsizetypes.error.not-found'));
			redirect('configuration/plantsizetypes', 'refresh');
		}
	}
	
	function process_plantsizetype()
	{
		$this->load->model('plantsizetype_model');
		$plantsizetype = $this->plantsizetype_model->factory();
		$plantsizetype_id = $this->input->post($plantsizetype->get_key());
	
		$process = TRUE;
	
		if ($plantsizetype_id) {
			$plantsizetype->set_plantsizetype_id($plantsizetype_id);
			$process = $plantsizetype->retrieve();
		}
	
		if ($process) {
			$this->load->library('form_validation');
	
			if ($this->form_validation->run('plantsizetype') == FALSE) {
				if ($plantsizetype_id) {
					$this->edit_plantsizetype($plantsizetype_id);
				} else {
					$this->new_plantsizetype();
				}
			} else {
				$plantsizetype->retrieve_post();
				if ($plantsizetype_id) {
					$result = $plantsizetype->update();
				} else {
					$result = $plantsizetype->create();
				}
	
				if ($result) {
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $this->lang->line('plantsizetypes.process-plantsizetype.success'));
				} else {
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('plantsizetypes.process-plantsizetype.error'));
				}
				redirect('configuration/plantsizetypes', 'refresh');
			}
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('plantsizetypes.error.not-found'));
			redirect('configuration/plantsizetypes');
		}
	}
	
	/*
	 * ALLIED SUPPLY TYPE
	 */
	
	function alliedsupplytypes()
	{
		$this->load->model('alliedsupplytype_model');
		$alliedsupplytype = $this->alliedsupplytype_model->factory();
		$data['alliedsupplytype_list'] = $alliedsupplytype->search(array('order_by' => 'alliedsupplytype_desc'));
		$this->load->view('configuration/alliedsupplytypes', $data);
	}
	
	function new_alliedsupplytype()
	{
		$this->load->model('alliedsupplytype_model');
		$alliedsupplytype = $this->alliedsupplytype_model->factory();
		$alliedsupplytype = $this->alliedsupplytype_model->factory();
		$data['alliedsupplytype'] = $alliedsupplytype;
		$this->load->view('configuration/alliedsupplytype_form', $data);
	}
	
	function edit_alliedsupplytype($alliedsupplytype_id)
	{
		$this->load->model('alliedsupplytype_model');
		$alliedsupplytype = $this->alliedsupplytype_model->factory();
		$alliedsupplytype->set_alliedsupplytype_id($alliedsupplytype_id);
		if ($alliedsupplytype->retrieve()) {
			$data['alliedsupplytype'] = $alliedsupplytype;
			$this->load->view('configuration/alliedsupplytype_form', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('alliedsupplytypes.error.not-found'));
			redirect('configuration/alliedsupplytypes', 'refresh');
		}
	}
	
	function process_alliedsupplytype()
	{
		$this->load->model('alliedsupplytype_model');
		$alliedsupplytype = $this->alliedsupplytype_model->factory();
		$alliedsupplytype_id = $this->input->post($alliedsupplytype->get_key());
	
		$process = TRUE;
	
		if ($alliedsupplytype_id) {
			$alliedsupplytype->set_alliedsupplytype_id($alliedsupplytype_id);
			$process = $alliedsupplytype->retrieve();
		}
	
		if ($process) {
			$this->load->library('form_validation');
	
			if ($this->form_validation->run('alliedsupplytype') == FALSE) {
				if ($alliedsupplytype_id) {
					$this->edit_alliedsupplytype($alliedsupplytype_id);
				} else {
					$this->new_alliedsupplytype();
				}
			} else {
				$alliedsupplytype->retrieve_post();
				if ($alliedsupplytype_id) {
					$result = $alliedsupplytype->update();
				} else {
					$result = $alliedsupplytype->create();
				}
	
				if ($result) {
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $this->lang->line('alliedsupplytypes.process-alliedsupplytype.success'));
				} else {
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('alliedsupplytypes.process-alliedsupplytype.error'));
				}
				redirect('configuration/alliedsupplytypes', 'refresh');
			}
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('alliedsupplytypes.error.not-found'));
			redirect('configuration/alliedsupplytypes');
		}
	}
	
	
	/*
	 * CONTAINER SIZES
	 */
	
	function container_sizes()
	{
		$this->load->model('container_size_model');
		$container_size = $this->container_size_model->factory();
		$data['container_size_list'] = $container_size->search(array('order_by' => 'order'));
		$this->load->view('configuration/container_sizes', $data);
	}
	
	function new_container_size()
	{
		$this->load->model('container_size_model');
		$container_size = $this->container_size_model->factory();
		$container_size = $this->container_size_model->factory();
		$data['container_size'] = $container_size;
		$this->load->view('configuration/container_size_form', $data);
	}
	
	function edit_container_size($container_size_id)
	{
		$this->load->model('container_size_model');
		$container_size = $this->container_size_model->factory();
		$container_size->set_containersize_id($container_size_id);
		if ($container_size->retrieve()) {
			$data['container_size'] = $container_size;
			$this->load->view('configuration/container_size_form', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('container_sizes.error.not-found'));
			redirect('configuration/container_sizes', 'refresh');
		}
	}
	
	function process_container_size()
	{
		$this->load->model('container_size_model');
		$container_size = $this->container_size_model->factory();
		$container_size_id = $this->input->post($container_size->get_key());
	
		$process = TRUE;
	
		if ($container_size_id) {
			$container_size->set_containersize_id($container_size_id);
			$process = $container_size->retrieve();
		}
	
		if ($process) {
			$this->load->library('form_validation');
	
			if ($this->form_validation->run('container_size') == FALSE) {
				if ($container_size_id) {
					$this->edit_container_size($container_size_id);
				} else {
					$this->new_container_size();
				}
			} else {
				$container_size->retrieve_post();
				if ($container_size_id) {
					$result = $container_size->update();
				} else {
					$result = $container_size->create();
				}
	
				if ($result) {
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $this->lang->line('container_sizes.process-container_size.success'));
				} else {
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('container_sizes.process-container_size.error'));
				}
				redirect('configuration/container_sizes', 'refresh');
			}
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('container_sizes.error.not-found'));
			redirect('configuration/container_sizes');
		}
	}
	
	/*
	 * ZIPCODES
	 */
	
	function zipcodes($init = 0)
	{
		
		$this->load->model('zipcode_model');
		$zipcode = $this->zipcode_model->factory();
		$data['zipcode_list'] = $zipcode->search(array('order_by' => 'state, city', 'total' => PAGINATION_SIZE, 'initial' => $init));
		
		$this->load->library('pagination');
		
		$config['base_url'] = site_url('configuration/zipcodes');
		$config['total_rows'] = $this->zipcode_model->total_rows();
		$config['per_page'] = PAGINATION_SIZE;
		$config['num_links'] = 4;
		$config['anchor_class'] = 'class="new-alias-button button-blue"';
		$config['full_tag_open'] = '<div class="right">';
		$config['full_tag_close'] = '</div><div class="fix"></div><BR>';
		
		$this->pagination->initialize($config);
		
		
		$this->load->view('configuration/zipcodes', $data);
	}
	
	function new_zipcode()
	{
		$this->load->model('zipcode_model');
		$zipcode = $this->zipcode_model->factory();
		$data['zipcode'] = $zipcode;
		$this->load->view('configuration/zipcode_form', $data);
	}
	
	function edit_zipcode($zip)
	{
		$this->load->model('zipcode_model');
		$zipcode = $this->zipcode_model->factory();
		$zipcode->set_zip($zip);
		if ($zipcode->retrieve()) {
			$data['zipcode'] = $zipcode;
			$this->load->view('configuration/zipcode_form', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('zipcodes.error.not-found'));
			redirect('configuration/zipcodes', 'refresh');
		}
	}
	
	function view_zipcode($zip)
	{
		$this->load->model('zipcode_model');
		$zipcode = $this->zipcode_model->factory();
		$zipcode->set_zip($zip);
		if ($zipcode->retrieve()) {
			$data['zipcode'] = $zipcode;
			$this->load->view('configuration/zipcode_viewer', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('zipcodes.error.not-found'));
			redirect('configuration/zipcodes', 'refresh');
		}
	}
	
	/*
	 * SERVICE PRICE UNITS
	 */
	
	function servicepriceunits()
	{
		$this->load->model('service_price_unit_model');
		$service_price_unit = $this->service_price_unit_model->factory();
		$data['service_price_unit_list'] = $service_price_unit->search(array('order_by' => 'order'));
		$this->load->view('configuration/servicepriceunits', $data);
	}
	
	function new_servicepriceunit()
	{
		$this->load->model('service_price_unit_model');
		$service_price_unit = $this->service_price_unit_model->factory();
		$data['service_price_unit'] = $service_price_unit;
		$this->load->view('configuration/service_price_unit_form', $data);
	}
	
	function edit_servicepriceunit($service_price_unit_id)
	{
		$this->load->model('service_price_unit_model');
		$service_price_unit = $this->service_price_unit_model->factory();
		$service_price_unit->set_servicepriceunit_id($service_price_unit_id);
		if ($service_price_unit->retrieve()) {
			$data['service_price_unit'] = $service_price_unit;
			$this->load->view('configuration/service_price_unit_form', $data);
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('servicepriceunits.error.not-found'));
			redirect('configuration/servicepriceunits', 'refresh');
		}
	}
	
	function sort_servicepriceunit()
	{
		$service_price_unit_ids = $this->input->post('liServicePriceUnitList');
		
		if (is_array($service_price_unit_ids)) {
			
			$this->load->model('service_price_unit_model');
			
			foreach ($service_price_unit_ids as $index => $service_price_unit_id) {
				$service_price_unit = $this->service_price_unit_model->factory();
				$service_price_unit->set_servicepriceunit_id($service_price_unit_id);
				if ($service_price_unit->retrieve()) {
					$service_price_unit->set_order($index + 1);
					$service_price_unit->update();
				} else {
					die("ERROR");
				}
				
			}
		}
	}
	
	function process_servicepriceunit()
	{
		$this->load->model('service_price_unit_model');
		$service_price_unit = $this->service_price_unit_model->factory();
		
		$service_price_unit_id = intval($this->input->post($service_price_unit->get_key()));
		
		$process = TRUE;
		
		if ($service_price_unit_id) {
			$service_price_unit->set_servicepriceunit_id($service_price_unit_id);
			$process = $service_price_unit->retrieve();
		}
		
		if ($process) {
			$this->load->library('form_validation');
		
			if ($this->form_validation->run('service_price_unit') == FALSE) {
				if ($service_price_unit_id) {
					$this->edit_servicepriceunit($service_price_unit_id);
				} else {
					$this->new_servicepriceunit();
				}
			} else {
				$service_price_unit->retrieve_post();
				if ($service_price_unit_id) {
					$result = $service_price_unit->update();
				} else {
					$service_price_unit->set_order($this->service_price_unit_model->next_order());
					$result = $service_price_unit->create();
				}
				
				if ($result) {
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $this->lang->line('servicepriceunits.process-servicepriceunit.success'));
				} else {
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('servicepriceunits.process-servicepriceunit.error'));
				}
				redirect('configuration/servicepriceunits', 'refresh');
			}
		} else {
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $this->lang->line('servicepriceunits.error.not-found'));
			redirect('configuration/servicepriceunits', 'refresh');
		}
	}
}

/* End of file configuration.php */
/* Location: ./application/controllers/configuration.php */