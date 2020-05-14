<?php
Class MY_Controller Extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('language') == "arabic"){
            $this->lang->load('ps', 'arabic');
        }else{
            $this->lang->load('ps', 'english');
        }
        if($this->input->get('lang')){
            $this->session->set_userdata(array("language"=>$this->input->get('lang')));
            $this->lang->load('ps', $this->input->get('lang'));
        }
    }
    
}
?>