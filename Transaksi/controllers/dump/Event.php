<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();


		$this->load->model('model_event');
	}

	/* 
	* It only redirects to the manage event page
	*/
	public function index()
	{

		if(!in_array('viewEvent', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->load->view('event',$data);
	}	

	/*
	* It checks if it gets the event id and retreives
	* the event information from the event model and 
	* returns the data into json format. 
	* This function is invoked from the view page.
	*/
	public function fetchEventDataById($id) 
	{
		if($id) {
			$data = $this->model_event->getEventData($id);
			echo json_encode($data);
		}

		return false;
	}

	/*
	* Fetches the event value from the event table 
	* this function is called from the datatable ajax function
	*/
	public function fetchEventData()
	{
		$result = array('data' => array());

		$data = $this->model_event->getEventData();

		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			if(in_array('updateEvent', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-app-xs bg-orange" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i> EDIT</button>';
			}

			if(in_array('deleteEvent', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-app-xs bg-maroon delete-link" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i> DELET</button>';
			}
				

			$status = ($value['active'] == 1) ? '<span class="label bg-teal">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['name'].'   '.$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* Its checks the event form validation 
	* and if the validation is successfully then it inserts the data into the database 
	* and returns the json format operation messages
	*/
	public function create()
	{
		if(!in_array('createEvent', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('event_name', 'Event name', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-default">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'nama' => $this->input->post('nama'),
        		'keterangan' => $this->input->post('keterangan'),	
        	);

        	$create = $this->model_event->create($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the brand information';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);
	}

	/*
	* Its checks the event form validation 
	* and if the validation is successfully then it updates the data into the database 
	* and returns the json format operation messages
	*/
	public function update($id)
	{

		if(!in_array('updateEvent', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_event_name', 'Event name', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-default">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'name' => $this->input->post('edit_event_name'),
	        		'active' => $this->input->post('edit_active'),	
	        	);

	        	$update = $this->model_event->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	/*
	* It removes the event information from the database 
	* and returns the json format operation messages
	*/
	public function remove()
	{
		if(!in_array('deleteEvent', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$event_id = $this->input->post('event_id');

		$response = array();
		if($event_id) {
			$delete = $this->model_event->remove($event_id);
			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}

}