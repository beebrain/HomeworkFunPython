<?php

class MasterModel extends CI_Model
{



    public function get_all_lab(){
        $query = $this->db->get('masterconfig');
        return $query->result();
    }

    public function get_config($condition){
        $query = $this->db->get_where('masterconfig', $condition);
        return $query->result();
    }



  /*  public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_entry()
    {
        $this->title = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
*/
}