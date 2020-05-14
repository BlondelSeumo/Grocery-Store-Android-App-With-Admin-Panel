<?php
class Setting_model extends CI_Model{
        function get_settings(){
           $q = $this->db->query("Select * from settings");
            return $q->result();
        }
        
        function get_setting_by_id($id){
        $q = $this->db->query("Select * from settings where id = '".$id."'"); 
            return $q->row();
      }
}
?>