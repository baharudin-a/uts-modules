<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_event extends CI_Model
{
    private $_table = "coba";

    public $id_coba;
    public $nama;
    public $keterangan;
    public $image = "default.jpg";
    public $description;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_coba" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_coba = uniqid();
        $this->nama = $post["nama"];
        $this->keterangan = $post["keterangan"];
        // $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    // public function update()
    // {
    //     $post = $this->input->post();
    //     $this->product_id = $post["id"];
    //     $this->name = $post["name"];
    //     $this->price = $post["price"];
    //     $this->description = $post["description"];
    //     $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    // }

    // public function delete($id)
    // {
    //     return $this->db->delete($this->_table, array("product_id" => $id));
    // }
}
