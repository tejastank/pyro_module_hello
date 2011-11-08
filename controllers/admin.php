<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Roles controller for the groups module
 *
 * @author Semicolon Developers
 * @package PyroCMS
 * @subpackage Groups Module
 * @category Modules
 *
 */
class Admin extends Admin_Controller
{
	/**
	 * Constructor method
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		// Load the required classes
		$this->load->model('hello_m');
		$this->load->library('form_validation');
		$this->lang->load('hello');

		// Validation rules
		$this->validation_rules = array(
			array(
				'field' => 'name',
				'label' => lang('hello.name'),
				'rules' => 'trim|required|max_length[100]'
			),
			array(
				'field' => 'message',
				'label' => lang('hello.message'),
				'rules' => 'trim|required|max_length[250]'
			)
		);

	    $this->template->set_partial('shortcuts', 'admin/partials/shortcuts');
	}

	/**
	 * Create a new group role
	 *s
	 * @access public
	 * @return void
	 */
	public function index()
	{
    	$hello = $this->hello_m->get_all();

    	$this->template
    		->title($this->module_details['name'])
			->set('hello', $hello)
    		->build('admin/index', $this->data);
	}

	/**
	 * Create a new group role
	 *
	 * @access public
	 * @return void
	 */
	public function add()
	{
		if ($_POST)
		{
			$this->form_validation->set_rules($this->validation_rules);

			if ($this->form_validation->run())
			{
				$this->hello_m->insert($this->input->post())
					? $this->session->set_flashdata('success', sprintf(lang('hello.add_success'), $this->input->post('name')))
					: $this->session->set_flashdata('error', sprintf(lang('hello.add_error'), $this->input->post('name')));

				redirect('admin/hello');
			}
		}

		// Loop through each validation rule
		foreach ($this->validation_rules as $rule)
		{
			$hello->{$rule['field']} = set_value($rule['field']);
		}

		$this->template
			->title($this->module_details['name'], lang('hello.add_title'))
			->set('hello', $hello)
			->build('admin/form', $this->data);
	}
//
//
//	/**
//	 * Edit a group role
//	 *
//	 * @access public
//	 * @param int $id The ID of the group to edit
//	 * @return void
//	 */
	public function edit($id = 0)
	{
		$hello = $this->hello_m->get($id);

		// Make sure we found something
		$hello or redirect('admin/hello');

		if ($_POST)
		{
			// Got validation?
			if ($hello->name == '')
			{
				//if they're changing description on admin or user save the old name
				$_POST['name'] = $hello->name;
				$this->form_validation->set_rules('description', lang('hello.description'), 'trim|required|max_length[250]');
			}
			else
			{
				$this->form_validation->set_rules($this->validation_rules);
			}

			if ($this->form_validation->run())
			{
				$this->hello_m->update($id, $this->input->post())
					? $this->session->set_flashdata('success', sprintf(lang('hello.edit_success'), $this->input->post('name')))
					: $this->session->set_flashdata('error', sprintf(lang('hello.edit_error'), $this->input->post('name')));

				// Redirect
				redirect('admin/hello');
			}
		}

		$this->template
			->title($this->module_details['name'], sprintf(lang('hello.edit_title'), $hello->name))
			->set('hello', $hello)
			->build('admin/form', $this->data);
	}
//
//	/**
//	 * Delete group role(s)
//	 *
//	 * @access public
//	 * @param int $id The ID of the group to delete
//	 * @return void
//	 */
	public function delete($id = 0)
	{
		$this->hello_m->delete($id)
			? $this->session->set_flashdata('success', lang('hello.delete_success'))
			: $this->session->set_flashdata('error', lang('hello.delete_error'));

		redirect('admin/hello');
	}
}
