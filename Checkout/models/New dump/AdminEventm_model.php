<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEventm_model extends CI_Model
{
    private $_table = "event_masuk";

    public $id;
    // public $kmu;
    public $id_member;
    public $event;
    public $keterangan;
    public $nominal;
    // public $image = "default.jpg";
    // public $description;

    public function rules()
    {
        return [
            // ['field' => 'id',
            // 'label' => 'Id',
            // 'rules' => 'required'],
            
             // ['field' => 'kmu',
             // 'label' => 'Kmu',
             // 'rules' => 'required'],

             ['field' => 'id_member',
             'label' => 'id_member',
             'rules' => 'required'],

              ['field' => 'event',
             'label' => 'Event',
             'rules' => 'required'],

             ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required'],

            ['field' => 'nominal',
            'label' => 'Nominal',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

   

    public function save()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        // $this->kmu = substr(uniqid(), 3,3);
        $this->id_member = $post["id_member"];
        $this->event = $post["event"];
        $this->keterangan = $post["keterangan"];
         $this->nominal = $post["nominal"];
        $this->db->insert($this->_table, $this);
    }

    //     public function savee()
    // {
    //     $post = $this->input->post();
    //     // $this->id = $post["id"];
    //     $this->kmu = $post["kmu"];
    //     $this->id_member = $post["id_member"];
    //     $this->event = $post["event"];
    //     $this->keterangan = $post["keterangan"];
    //      $this->nominal = $post["nominal"];
    //     $this->db->insert($this->_table, $this);
    // }

    public function update()
    {

        $post = $this->input->post();
        $this->id = $post["id"];
        $this->id_member = $post["id_member"];
        $this->keterangan = $post["keterangan"];
         $this->nominal = $post["nominal"];
        $this->db->update($this->_table, $this, array('id_member' => $post['id_member']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_member" => $id));
    }
}