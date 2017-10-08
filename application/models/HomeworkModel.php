<?php

class HomeworkModel extends CI_Model
{

    public $title;
    public $content;
    public $date;

    public function get_all_Submit($id=''){
        $query = $this->db->get('homework');
        return $query->result();
    }

    public function get_all_HomeworkFolderName(){
        $query = $this->db->distinct()->select('hwfolder')->from('homework')->get();
        return $query->result();

    }

    public function get_submitHomework($name){
        $query = $this->db->get_where('homework', $name);
        return $query->result();

    }

    public function insertNew($data){
        $this->db->insert('homework', $data);
    }

    public function updateData($data){
        $datacond = array(
            'hwfolder' => $data['hwfolder'],
            'filename' => $data['filename']
        );

        $this->db->where($datacond);
        $this->db->update('homework', $data);
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