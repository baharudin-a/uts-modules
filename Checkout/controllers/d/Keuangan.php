<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Keuangan extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('event_model');
			$this->load->library('form_validation');
		}

		public function index(){
			$this->load->view('keuangan');
		}
		public function event(){
			$data["coba"] = $this->event_model->getAll();
			$this->load->view('event',$data);
		}
		public function chart(){
			$this->load->view('chart');
		}
		public function add()
	    // {
	    //     $coba = $this->event_model;
	    //     $validation = $this->form_validation;
	    //     $validation->set_rules($coba->rules());

	    //     if ($validation->run()) {
	    //         $coba->save();
	    //        // $this->session->set_flashdata('success', 'Berhasil disimpan');
	    //         $this->load->view("keuangan/ee");
	    //     }else{
	    //     	$this->load->view("keuangan/ee");
	    //     }

	        
	    // }

    {
        $coba = $this->event_model;
        $validation = $this->form_validation;
        $validation->set_rules($coba->rules());

        if ($validation->run()) {
            $coba->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("keuangan/ee");
    }


	    public function edit($id = null)
	    {
	        if (!isset($id)) redirect('/keuangan');
	       
	        $coba = $this->event_model;
	        $validation = $this->form_validation;
	        $validation->set_rules($coba->rules());

	        if ($validation->run()) {
	            $coba->update();
	            $this->session->set_flashdata('success', 'Berhasil disimpan');
	        }

	        $data["coba"] = $coba->getById($id);
	        if (!$data["coba"]) show_404();
	        
	        $this->load->view("admin/product/edit_form", $data);
	    }

	    public function delete($id=null)
	    {
	        if (!isset($id)) show_404();
	        
	        if ($this->event_model->delete($id)) {
	            redirect(site_url('/keuangan'));
	        }
	    }
		
}	