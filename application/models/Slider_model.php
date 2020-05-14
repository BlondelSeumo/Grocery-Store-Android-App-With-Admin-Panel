<?php 

    class Slider_model extends CI_Model
    {        
        
        
        public function get_slider_by_id($id){
            $q = $this->db->query("select * from slider where id ='".$id."' limit 0,1");
            return $q->row();
        }
        public function get_slider(){
                $q = $this->db->query("Select * from slider");
                return $q->result();   
        }
        
        public function get_active_slider(){
            $q = $this->db->query("select * from slider where slider_status = 1");
            return $q->result();
        }
        
          public function edit_slider($id)
        {
            $edit = array(
                                     "slider_title"=>$this->input->post("slider_title"),
                                    "slider_status"=>$this->input->post("slider_status"),
                                     "slider_url"=>$this->input->post("slider_url")
                            );
            
                    if($_FILES["slider_img"]["size"] > 0){
                        $config['upload_path']          = './uploads/sliders/';
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $this->load->library('upload', $config);
        
                        if ( ! $this->upload->do_upload('slider_img'))
                        {
                                $error = array('error' => $this->upload->display_errors());
                        }
                        else
                        {
                            $img_data = $this->upload->data();
                            $edit["slider_image"]=$img_data['file_name'];
                        }
                        
                   }
                    
                  
                    $this->db->update("slider",$edit,array("id"=>$id)); 
        }

    }
?>