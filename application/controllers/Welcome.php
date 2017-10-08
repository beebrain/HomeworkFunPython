<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->model('MasterModel');
        $menuAll = $this->MasterModel->get_all_lab();

        $data['menuAll'] = $menuAll;
//	    print_r($menuAll);
		$this->load->view('welcome_message',$data);
	}

	public function Homework($homework=""){
        $this->load->model('HomeworkModel');
        $this->load->model('MasterModel');
        $menuAll = $this->MasterModel->get_all_lab();

        $data['menuAll'] = $menuAll;

        $condition['hwfolder'] = $homework;
        $dataresult = $this->HomeworkModel->get_submitHomework($condition);
        $data['submitFile'] = $dataresult;

        //print_r($result);
        $this->load->view('HomeworkDetail',$data);
//        print_r($menuHomework)
    }


    public function insertJson(){
        $getjson =$_GET['json_payload'];
        $this->load->model('LabModel');
        $this->load->model('HomeworkModel');
        $json_payload = json_decode($getjson);

        $datacondition['filename'] = $json_payload->filename;
        if ($json_payload->type == "Lab"){
            $datacondition['labfolder'] = $json_payload->labfolder;
            $dataresult = $this->LabModel->get_submitLab($datacondition);
        }else{
            $datacondition['hwfolder'] = $json_payload->hwfolder;
            $dataresult = $this->HomeworkModel->get_submitHomework($datacondition);
        }

        $datainsert['filename'] = $json_payload->filename;
        $datainsert['studentid'] = $json_payload->studentid;
        $datainsert['filedetail'] = $json_payload->filedetail;
        $datainsert['submittime'] = $json_payload->submittime;


        if (empty($dataresult)) {
            if ($json_payload->type == "Lab"){
                $datainsert['labfolder'] = $json_payload->labfolder;
                $this->LabModel->insertNew($datainsert);
            }else{
                $datainsert['hwfolder'] = $json_payload->hwfolder;
                $this->HomeworkModel->insertNew($datainsert);
            }
        }else{
            // update record
            if ($json_payload->type == "Lab"){
                $datainsert['labfolder'] = $json_payload->labfolder;
                $this->LabModel->updateData($datainsert);
            }else{
                $datainsert['hwfolder'] = $json_payload->hwfolder;
                $this->HomeworkModel->updateData($datainsert);
            }
        }

//	    $getjson =$_GET['json_payload'];
////        print_r($getjson);
//        $json_payload = json_decode($getjson);
//        print_r($json_payload);
//        $this->load->model('HomeworkModel');
//        $datacondition['hwfolder'] = 'HW02';
//        $datacondition['filename'] = '111111';
//        $result = $this->HomeworkModel->get_submitHomework($datacondition);
//        print_r(len($result));
//        $temp_value = $json_payload['temp_value'];
//        if (write_file(APPPATH."/log.txt", $temp_value) ){
//            print("Write");
//        }
//        print_r($temp_value);
    }


    public function insertResultJson(){
        $getjson =$_GET['json_payload'];
        $this->load->model('LabResultModel');
        $json_payload = json_decode($getjson);

        $datainsert['filename'] = $json_payload->filename;
        $datainsert['studentid'] = $json_payload->studentid;
        $datainsert['labfolder'] = $json_payload->labfolder;

        $dataresult = $this->LabResultModel->getResult($datainsert);

        $datainsert['result'] = $json_payload->result;
        if (empty($dataresult)) {
            $this->LabResultModel->insertNew($datainsert);
        }else{
            $this->LabResultModel->updateData($datainsert);
        }
    }


    public function getconfig(){
        $dataname['name'] =$_GET['name'];

        $this->load->model('MasterModel');
        $detailConfig = $this->MasterModel->get_config($dataname);
        if(!empty($detailConfig)) {
            print(json_encode($detailConfig[0]));
        }


    }

    public function Lab($labName=""){
        $this->load->model('LabModel');
        $this->load->model('LabResultModel');
        $this->load->model('MasterModel');
        $menuAll = $this->MasterModel->get_all_lab();


        $data['menuAll'] = $menuAll;
        $condition['labfolder'] = $labName;
        $dataresult = $this->LabModel->get_submitLab($condition);


        foreach ($dataresult as $key => $value){
            $datacondition['labfolder'] = $value->labfolder;
//            $datacondition['filename'] = $value->filename;
            $datacondition['studentid'] = $value->studentid;

            $dataresultdetail = $this->LabResultModel->getResult($datacondition);
            $value->result = $dataresultdetail;
//            print_r($dataresultdetail);
        }

//        print_r($dataresult);

        $data['submitFile'] = $dataresult;
        //print_r($result);
        $this->load->view('LabDetail',$data);
//        print_r($menuHomework);


    }


}
