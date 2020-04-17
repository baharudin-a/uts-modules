<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model("member_model");
        $this->load->model("admin_model");
        $this->load->model("adminkeluar_model");
        $this->load->model("admineventm_model");
         $this->load->model("admineventk_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["harian_masuk"] = $this->admin_model->getAll();
        $this->load->view("admin", $data);
    }
    public function admin()
    {

        $this->load->view("admin");
    }

    public function adminkeluar()
    {
         
        $data["harian_keluar"] = $this->adminkeluar_model->getAll();
        $this->load->view("admin/adminkeluar", $data);
    }
    public function admineventk()
    {
         
        $data["event_keluar"] = $this->admineventk_model->getAll();
        $this->load->view("admin/admineventk", $data);
    }
    public function admineventm()
    {
         
        $data["event_masuk"] = $this->admineventm_model->getAll();
        $this->load->view("admin/admineventm", $data);
    }



    public function add()
    {
        $admin = $this->admin_model;
        $validation = $this->form_validation;
        $validation->set_rules($admin->rules());

        if ($validation->run()) {
            $admin->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["harian_masuk"] = $this->admin_model->getAll();
        $this->load->view("admin", $data);
    }

    public function tambah()
    {
        $harian_keluar = $this->adminkeluar_model;
        $validation = $this->form_validation;
        $validation->set_rules($harian_keluar->rules());

        if ($validation->run()) {
            $harian_keluar->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["harian_keluar"] = $this->adminkeluar_model->getAll();
        $this->load->view("admin/adminkeluar", $data);
    }

    public function edit($id=null)
    {
        if (!isset($id)) redirect('admin/adminkeluar');
       
        $harian_keluar = $this->adminkeluar_model;
        $validation = $this->form_validation;
        $validation->set_rules($harian_keluar->rules());

        if ($validation->run()) {
            $harian_keluar->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/adminkeluar'));
        }

        $data["harian_keluar"] = $harian_keluar->getById($id);
        if (!$data["harian_keluar"]) show_404();
        
        $this->load->view("admin/edit_harian", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->adminkeluar_model->delete($id)) {
            redirect(site_url('admin/adminkeluar'));
        }
    }
}