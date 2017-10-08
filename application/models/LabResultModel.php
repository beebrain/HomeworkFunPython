<?php

class LabResultModel extends CI_Model
{

    public $title;
    public $content;
    public $date;
//
//    public function get_all_Submit($id=''){
//        $query = $this->db->get('lab');
//        return $query->result();
//    }
//
//    public function get_all_LabFolderName(){
//        $query = $this->db->distinct()->select('labfolder')->from('lab')->get();
//        return $query->result();
//
//    }
//
//    public function get_submitLab($name){
//        $query = $this->db->get_where('lab', $name);
//        return $query->result();
//
//    }
    public function getResult($data){
        $query = $this->db->get_where('labresult',$data);
        return $query->result();
    }

    public function insertNew($data){
        $this->db->insert('labresult', $data);
    }

    public function updateData($data){
        $datacond = array(
            'labfolder' => $data['labfolder'],
            'filename' => $data['filename'],
            'studentid' => $data['studentid']
        );

        $this->db->where($datacond);
        $this->db->update('labresult', $data);
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