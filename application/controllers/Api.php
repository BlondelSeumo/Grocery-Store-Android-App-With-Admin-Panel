<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                header('Content-type: text/json');
                date_default_timezone_set('Asia/Kolkata');
                $this->load->database();
                $this->load->helper('sms_helper');
                 $this->load->helper(array('form', 'url'));
                 $this->db->query("SET time_zone='+05:30'");
        }
        public function index(){
            echo json_encode(array("api"=>"welcome"));
        }
        public function get_categories(){
            $parent = 0 ;
            if($this->input->post("parent")){
                $parent    = $this->input->post("parent");
            }
        $categories = $this->get_categories_short($parent,0,$this) ;
        $data["responce"] = true;
        $data["data"] = $categories;
        echo json_encode($data);
        
    }
     public function get_categories_short($parent,$level,$th){
            $q = $th->db->query("Select a.*, ifnull(Deriv1.Count , 0) as Count, ifnull(Total1.PCount, 0) as PCount FROM `categories` a  LEFT OUTER JOIN (SELECT `parent`, COUNT(*) AS Count FROM `categories` GROUP BY `parent`) Deriv1 ON a.`id` = Deriv1.`parent` 
                         LEFT OUTER JOIN (SELECT `category_id`,COUNT(*) AS PCount FROM `products` GROUP BY `category_id`) Total1 ON a.`id` = Total1.`category_id` 
                         WHERE a.`parent`=" . $parent);
                        
                        $return_array = array();
                        
                        foreach($q->result() as $row){
                                    if ($row->Count > 0) {
                                        $sub_cat = 	$this->get_categories_short($row->id, $level + 1,$th);
                    				    $row->sub_cat = $sub_cat;   	
                                    } elseif ($row->Count==0) {
                    				
                                    }
                            $return_array[] = $row;
                        }
        return $return_array;
    }
        public function pincode(){
        	$q =$this->db->query("Select * from pincode");
        	 echo json_encode($q->result());
        }
/* user registration */               
public function signup(){
       $data = array(); 
            $_POST = $_REQUEST;      
                $this->load->library('form_validation');
                /* add registers table validation */
                $this->form_validation->set_rules('user_name', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('user_mobile', 'Mobile Number', 'trim|required|is_unique[registers.user_phone]');
                $this->form_validation->set_rules('user_email', 'User Email', 'trim|required|is_unique[registers.user_email]');
                 $this->form_validation->set_rules('password', 'Password', 'trim|required');
                
                
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = strip_tags($this->form_validation->error_string());
                    
                    
        		}else
                {
                     
                    $this->db->insert("registers", array("user_phone"=>$this->input->post("user_mobile"),
                                            "user_fullname"=>$this->input->post("user_name"),
                                             "user_email"=>$this->input->post("user_email"),
                                             "user_password"=>md5($this->input->post("password")), 
                                            "status" => 1
                                            ));
                    $user_id =  $this->db->insert_id();  
                    $data["responce"] = true; 
                    $data["message"] = "User Register Sucessfully..";
                    
                  }                  
           
                     echo json_encode($data);
}     

 public function update_profile_pic(){
        $data = array(); 
                $this->load->library('form_validation');
                /* add users table validation */
                $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
                
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                
         		if(isset($_FILES["image"]) && $_FILES["image"]["size"] > 0){
                    $config['upload_path']          = './uploads/profile/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
    
                    if ( ! $this->upload->do_upload('image'))
                    {
                    $data["responce"] = false;  
        			$data["error"] = 'Error! : '.$this->upload->display_errors();
                           
                    }
                    else
                    {
                        $img_data = $this->upload->data();
                        $this->load->model("common_model");
                        $this->common_model->data_update("registers", array(
                                            "user_image"=>$img_data['file_name']
                                            ),array("user_id"=>$this->input->post("user_id")));
                                            
                        $data["responce"] = true;
                        $data["data"] = $img_data['file_name'];
                    }
                    
               		}else{
               	$data["responce"] = false;  
        			$data["error"] = 'Please choose profile image';
               	
               		}
               
               
                  }                  
           
                     echo json_encode($data);
        
        }     

public function change_password(){
            $data = array(); 
                $this->load->library('form_validation');
                /* add users table validation */
                $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
                $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
                $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
                
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $this->load->model("common_model");
                    $q = $this->db->query("select * from registers where user_id = '".$this->input->post("user_id")."' and  user_password = '".md5($this->input->post("current_password"))."' limit 1");
                    $user = $q->row();
                    
                    if(!empty($user)){
                    $this->common_model->data_update("registers", array(
                                            "user_password"=>md5($this->input->post("new_password"))
                                            ),array("user_id"=>$user->user_id));
                    
                    $data["responce"] = true;
                    }else{
                    $data["responce"] = false;  
        			$data["error"] = 'Current password do not match';
                    }
                  }                  
           
                     echo json_encode($data);
}      

public function update_userdata(){
          $data = array(); 
                $this->load->library('form_validation');
                /* add users table validation */
                $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
                $this->form_validation->set_rules('user_fullname', 'Full Name', 'trim|required');
                 $this->form_validation->set_rules('user_mobile', 'Mobile', 'trim|required');
                
                
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $insert_array=  array(
                                            "user_fullname"=>$this->input->post("user_fullname"),
                                            "user_phone"=>$this->input->post("user_mobile")
                                            
                                            );
                     
                    $this->load->model("common_model");
                    //$this->db->where(array("user_id",$this->input->post("user_id")));
                    	if(isset($_FILES["image"]) && $_FILES["image"]["size"] > 0){
                    $config['upload_path']          = './uploads/profile/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                   
                    if ( ! $this->upload->do_upload('image'))
                    {
                    $data["responce"] = false;  
        			$data["error"] = 'Error! : '.$this->upload->display_errors();
                           
                    }
                    else
                    {
                         $img_data = $this->upload->data();
                         $image_name = $img_data['file_name'];
                         $insert_array["user_image"]=$image_name;
                    }
                    
               		} 
                    
                   $this->common_model->data_update("registers",$insert_array,array("user_id"=>$this->input->post("user_id")));
                    
                      $q = $this->db->query("Select * from `registers` where(user_id='".$this->input->post('user_id')."' ) Limit 1");  
                      $row = $q->row();
                    $data["responce"] = true;
                    $data["data"] = array("user_id"=>$row->user_id,"user_fullname"=>$row->user_fullname,"user_email"=>$row->user_email,"user_phone"=>$row->user_phone,"user_image"=>$row->user_image,"pincode"=>$row->pincode,"socity_id"=>$row->socity_id,"house_no"=>$row->house_no) ;
                  }                  
           
                     echo json_encode($data);
}           
/* user login json */
     
public function login(){
            $data = array(); 
            $_POST = $_REQUEST;      
                $this->load->library('form_validation');
                 $this->form_validation->set_rules('user_email', 'Email Id',  'trim|required');
                 $this->form_validation->set_rules('password', 'Password', 'trim|required');
               
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] =  strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                   //users.user_email='".$this->input->post('user_email')."' or
                    $q = $this->db->query("Select * from `registers` where(user_email='".$this->input->post('user_email')."' ) and user_password='".md5($this->input->post('password'))."' Limit 1");
                    
                    
                    if ($q->num_rows() > 0)
                    {
                        $row = $q->row(); 
                        if($row->status == "0")
                        {
                                $data["responce"] = false;  
   			                  $data["error"] = 'Your account currently inactive.Please Contact Admin';
                            
                        }
                       
                        else
                        {
                              $data["responce"] = true;  
   			                  $data["data"] = array("user_id"=>$row->user_id,"user_fullname"=>$row->user_fullname,"user_email"=>$row->user_email,"user_phone"=>$row->user_phone,"user_image"=>$row->user_image) ;
   			                   
                        }
                    }
                    else
                    {
                              $data["responce"] = false;  
   			                  $data["error"] = 'Invalide Username or Passwords';
                    }
                   
                    
                }
           echo json_encode($data);
            
        }
         
        
        function get_products(){
                 $this->load->model("product_model");
                $cat_id = "";
                if($this->input->post("cat_id")){
                    $cat_id = $this->input->post("cat_id");
                }
              $search= $this->input->post("search");
                
                $data["responce"] = true;  
                $data["data"] = $this->product_model->get_products(false,$cat_id,$search,$this->input->post("page"));
                echo json_encode($data);
        }       
         function get_time_slot(){ 
            
            $this->load->library('form_validation');
                $this->form_validation->set_rules('date', 'date',  'trim|required');
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $date = date("Y-m-d",strtotime($this->input->post("date")));
                    
                    $time = date("H:i:s");
                    
                    
                            
                    $this->load->model("time_model");
                    $time_slot = $this->time_model->get_time_slot();
                    $cloasing_hours =  $this->time_model->get_closing_hours($date);
                    
                    
                    $begin = new DateTime($time_slot->opening_time);
                    $end   = new DateTime($time_slot->closing_time);
                    
                    $interval = DateInterval::createFromDateString($time_slot->time_slot.' min');
                    
                    $times    = new DatePeriod($begin, $interval, $end);
                    $time_array = array();
                    foreach ($times as $time) {
                        if(!empty($cloasing_hours)){
                            foreach($cloasing_hours as $c_hr){
                            if($date == date("Y-m-d")){
                            	if(strtotime($time->format('h:i A')) > strtotime(date("h:i A")) &&  strtotime($time->format('h:i A')) > strtotime($c_hr->from_time) && strtotime($time->format('h:i A')) <  strtotime($c_hr->to_time) ){
                                    
                                }else{
                                    $time_array[] =  $time->format('h:i A'). ' - '. 
                                    $time->add($interval)->format('h:i A')
                                     ;
                                }
                            
                            }else{
                                if(strtotime($time->format('h:i A')) > strtotime($c_hr->from_time) && strtotime($time->format('h:i A')) <  strtotime($c_hr->to_time) ){
                                    
                                }else{
                                    $time_array[] =  $time->format('h:i A'). ' - '. 
                                    $time->add($interval)->format('h:i A')
                                     ;
                                }
                            }
                            
                            }
                        }else{
                        	if(strtotime($date) == strtotime(date("Y-m-d"))){
                        		if(strtotime($time->format('h:i A')) > strtotime(date("h:i A"))){
                        		$time_array[] =  $time->format('h:i A'). ' - '. 
                                	$time->add($interval)->format('h:i A');
                        		} 
                        	}else{
                            		$time_array[] =  $time->format('h:i A'). ' - '. 
                                	$time->add($interval)->format('h:i A')
                                 ;
                                 }
                        }
                    }
                    $data["responce"] = true;
                    $data["times"] = $time_array;
                }
                echo json_encode($data);
            
        } 
         
        function text_for_send_order(){
            echo json_encode(array("data"=>"<p>Our delivery boy will come withing your choosen time and will deliver your order. \n 
            </p>"));
        }
        function send_order(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('user_id', 'User ID',  'trim|required');
                 $this->form_validation->set_rules('date', 'Date',  'trim|required');
                 $this->form_validation->set_rules('time', 'Time',  'trim|required');
                 $this->form_validation->set_rules('data', 'data',  'trim|required');
                  $this->form_validation->set_rules('location', 'Location',  'trim|required');
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                     $ld = $this->db->query("select user_location.*, socity.* from user_location
                    inner join socity on socity.socity_id = user_location.socity_id
                     where user_location.location_id = '".$this->input->post("location")."' limit 1");
                    $location = $ld->row(); 
                    
                    $user_id = $this->input->post("user_id");
                    $date = date("Y-m-d", strtotime($this->input->post("date")));
                    //$timeslot = explode("-",$this->input->post("timeslot"));
                    
                    $times = explode('-',$this->input->post("time"));
                    $fromtime = date("H:i:s",strtotime(trim($times[0]))) ;
                    $totime = date("H:i:s",strtotime(trim($times[1])));
                    
                   
                    
                    $insert_array = array("user_id"=>$user_id,
                    "on_date"=>$date,
                    "delivery_time_from"=>$fromtime,
                    "delivery_time_to"=>$totime,
                   "delivery_address"=>$location->house_no."\n, ".$location->house_no,
                    "socity_id" => $location->socity_id, 
                     "delivery_charge" => $location->delivery_charge,
                    "location_id" => $location->location_id 
                    );
                    $this->load->model("common_model");
                    $id = $this->common_model->data_insert("sale",$insert_array);
                    
                    $data_post = $this->input->post("data");
                    $data_array = json_decode($data_post);
                    $total_price = 0;
                    $total_kg = 0;
                    $total_items = array();
                    foreach($data_array as $dt){
                        $qty_in_kg = $dt->qty; 
                        if($dt->unit=="gram"){
                            $qty_in_kg =  ($dt->qty * $dt->unit_value) / 1000;     
                        }
                        $total_price = $total_price + ($dt->qty * $dt->price);
                        $total_kg = $total_kg + $qty_in_kg;
                        $total_items[$dt->product_id] = $dt->product_id;    
                        
                        $array = array("product_id"=>$dt->product_id,
                        "qty"=>$dt->qty,
                        "unit"=>$dt->unit,
                        "unit_value"=>$dt->unit_value,
                        "sale_id"=>$id,
                        "price"=>$dt->price,
                        "qty_in_kg"=>$qty_in_kg
                        );
                        $this->common_model->data_insert("sale_items",$array);
                         
                    }
                     $total_price = $total_price + $location->delivery_charge;
                    $this->db->query("Update sale set total_amount = '".$total_price."', total_kg = '".$total_kg."', total_items = '".count($total_items)."' where sale_id = '".$id."'");
                    
                    $data["responce"] = true;  
        			$data["data"] = addslashes( "<p>Your order No #".$id." is send success fully \n Our delivery person will delivered order \n 
                    between ".$fromtime." to ".$totime." on ".$date." \n
                    Please keep <strong>".$total_price."</strong> on delivery
                    Thanks for being with Us.</p>" );
                    
                }
                echo json_encode($data);
        }    
        function my_orders(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('user_id', 'User ID',  'trim|required');
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $this->load->model("product_model");
                    $data = $this->product_model->get_sale_by_user($this->input->post("user_id"));
                }
                echo json_encode($data);
        }
        function order_details(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('sale_id', 'Sale ID',  'trim|required');
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $this->load->model("product_model");
                    $data = $this->product_model->get_sale_order_items($this->input->post("sale_id"));
                }
                echo json_encode($data);
        }
        function cancel_order(){
            $this->load->library('form_validation');
                $this->form_validation->set_rules('sale_id', 'Sale ID',  'trim|required');
                $this->form_validation->set_rules('user_id', 'User ID',  'trim|required');
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $this->db->query("Update sale set status = 3 where user_id = '".$this->input->post("user_id")."' and  sale_id = '".$this->input->post("sale_id")."' ");    
                    $data["responce"] = true;
                    $data["message"] = "Your order cancel successfully";
                }
                echo json_encode($data);
        }
        
        function get_society(){
                
                    $this->load->model("product_model");
                    $data  = $this->product_model->get_socities();
                
                echo json_encode($data);
        }
         
        function get_varients_by_id(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('ComaSepratedIdsString', 'IDS',  'trim|required');
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $this->load->model("product_model");
                    $data  = $this->product_model->get_prices_by_ids($this->input->post("ComaSepratedIdsString"));
                }
                echo json_encode($data);
        }
        
        
        function get_sliders(){
            $q = $this->db->query("Select * from slider");
            echo json_encode($q->result());
        } 
        
        function get_limit_settings(){
            $q = $this->db->query("Select * from settings");
            echo json_encode($q->result());
        }
         
         
          function add_address(){
            $this->load->library('form_validation');
                $this->form_validation->set_rules('user_id', 'Pincode',  'trim|required');
                 $this->form_validation->set_rules('pincode', 'Pincode ID', 'trim|required');
                $this->form_validation->set_rules('socity_id', 'Socity',  'trim|required');
                $this->form_validation->set_rules('house_no', 'House',  'trim|required');
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $user_id = $this->input->post("user_id");
                     $pincode = $this->input->post("pincode");
                    $socity_id = $this->input->post("socity_id");
                    $house_no = $this->input->post("house_no");
                    $receiver_name = $this->input->post("receiver_name");
                    $receiver_mobile = $this->input->post("receiver_mobile");
                    
                    $array = array(
                    "user_id" => $user_id,
                    "pincode" => $pincode,
                    "socity_id" => $socity_id,
                    "house_no" => $house_no,
                    "receiver_name" => $receiver_name,
                    "receiver_mobile" => $receiver_mobile
                    );
                    
                    $this->db->insert("user_location",$array);
                    $insert_id = $this->db->insert_id();
                    $q = $this->db->query("Select user_location.*,
                    socity.* from user_location 
                    inner join socity on socity.socity_id = user_location.socity_id
                    where location_id = '".$insert_id."'");
                    $data["responce"] = true;
                    $data["data"] = $q->row();
                    
                }
                echo json_encode($data);
        }
        
         public function edit_address(){
        $data = array(); 
                $this->load->library('form_validation');
                /* add users table validation */
                $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
                $this->form_validation->set_rules('socity_id', 'Socity ID', 'trim|required');
                 $this->form_validation->set_rules('house_no', 'House Number', 'trim|required');
                $this->form_validation->set_rules('receiver_name', 'Receiver Name', 'trim|required');
                $this->form_validation->set_rules('receiver_mobile', 'Receiver Mobile', 'trim|required'); 
                 $this->form_validation->set_rules('location_id', 'Location ID', 'trim|required');
                 
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $insert_array=  array(
                                            "pincode"=>$this->input->post("pincode"),
                                            "socity_id"=>$this->input->post("socity_id"),
                                            "house_no"=>$this->input->post("house_no"),
                                            "receiver_name"=>$this->input->post("receiver_name"),
                                            "receiver_mobile"=>$this->input->post("receiver_mobile")
                                            );
                     
                    $this->load->model("common_model");
                     
                    
                   $this->common_model->data_update("user_location",$insert_array,array("location_id"=>$this->input->post("location_id")));
                    
                      
                    $data["responce"] = true;
                    $data["data"] = "Your Address Update successfully";  
                  }                  
           
                     echo json_encode($data);
        }
        
        
         /* Delete Address */
     public function delete_address()
	{
	    $this->load->library('form_validation');
                 $this->form_validation->set_rules('location_id', 'Location ID', 'trim|required');
       
        if ($this->form_validation->run() == FALSE)
        		{
        			  $data["responce"] = false;
            		  $data["error"] = 'field is required';
        		}
       
	   else{
	        
            $this->db->delete("user_location",array("location_id"=>$this->input->post("location_id")));
             
             $data["responce"] = true;
             $data["message"] = 'Your Address deleted successfully...';
        }
        echo json_encode($data);
    }
    /* End Delete  Address */
        
        
        function get_address(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('user_id', 'User',  'trim|required');
                
                if ($this->form_validation->run() == FALSE) 
        		{
        		    $data["responce"] = false;  
        			$data["error"] = strip_tags($this->form_validation->error_string());
                    
        		}else
                {
                    $user_id = $this->input->post("user_id");
                    
        			$q = $this->db->query("Select user_location.*,
                    socity.* from user_location 
                    inner join socity on socity.socity_id = user_location.socity_id
                    where user_id = '".$user_id."'");
                    $data["responce"] = true;
                    $data["data"] = $q->result();
                }
                echo json_encode($data);
        }
         
         
          /* contact us */
 
 public function support(){
    
     $q = $this->db->query("select * from `pageapp` WHERE id =1"); 
     
      
     $data["responce"] = true;
    $data['data'] = $q->result();
    
            
       echo json_encode($data);  
 }
 
 
 /* end contact us */
 
 /* about us */
  public function aboutus(){
    
     $q = $this->db->query("select * from `pageapp` where id=2"); 
     
      
     $data["responce"] = true;     
    $data['data'] = $q->result();
    
            
       echo json_encode($data);  
 }
 /* end about us */
/* about us */
  public function terms(){
    
     $q = $this->db->query("select * from `pageapp` where id=3"); 
     
      
     $data["responce"] = true;     
    $data['data'] = $q->result();
    
            
       echo json_encode($data);  
 }
 /* end about us */         
  
  	public function register_fcm(){
            $data = array();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
            $this->form_validation->set_rules('token', 'Token', 'trim|required');
            $this->form_validation->set_rules('device', 'Device', 'trim|required');
            if ($this->form_validation->run() == FALSE) 
        {
                $data["responce"] = false;
               $data["error"] = $this->form_validation->error_string();
                                
        }else
            {   
                $device = $this->input->post("device");
                $token = $this->input->post("token");
                $user_id = $this->input->post("user_id");
                
                $field = "";
                if($device=="android"){
                    $field = "user_gcm_code";
                }else if($device=="ios"){
                    $field = "user_ios_token";
                }
                if($field!=""){
                    $this->db->query("update registers set ".$field." = '".$token."' where user_id = '".$user_id."'");
                    $data["responce"] = true;    
                }else{
                    $data["responce"] = false;
                    $data["error"] = "Device type is not set";
                }
                
                
            }
            echo json_encode($data);
    }
     public function test_fcm(){
        $message["title"] = "test";
        $message["message"] = "grocery test";
        $message["image"] = "";
        $message["created_at"] = date("Y-m-d h:i:s");  
    
    $this->load->helper('gcm_helper');
    $gcm = new GCM();   
    $result = $gcm->send_notification(array("c6Z2RszzX-g:APA91bGnCHNuKL-OFB5ZWwUvgF2rj0P4CfSExAbtWDQXOQCyJ4nJgA4i4yemG6rbIBTespVRkqbX3iwkkR-hfuxNWZVSd-3uodjQDSBPFew1RrCqIDJ9OaIogBRyWyGM7yoNF2QHEQXn"),$message ,"android");
      // $result = $gcm->send_topics("/topics/rabbitapp",$message ,"ios"); 
    print_r($result);
    }      
     
     /* Forgot Password */
    
    
    
       public function forgot_password(){
            $data = array();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            if ($this->form_validation->run() == FALSE) 
        {
                  $data["responce"] = false;  
               $data["error"] = 'Warning! : '.strip_tags($this->form_validation->error_string());
                        
        }else
            {
                   $request = $this->db->query("Select * from registers where user_email = '".$this->input->post("email")."' limit 1");
                   if($request->num_rows() > 0){
                                
                                $user = $request->row();
                                $token = uniqid(uniqid());
                                $this->db->update("registers",array("varified_token"=>$token),array("user_id"=>$user->user_id)); 
                                $this->load->library('email');
                               // $this->email->from($this->config->item('default_email'), $this->config->item('email_host'));
                                
                                $email = $user->user_email;
                                 $name = $user->user_fullname;
                                 $return = $this->send_email_verified_mail($email,$token,$name);
                                
                                 
                               
                                if (!$return){
                                                  $data["responce"] = false;  
                                                  $data["error"] = 'Warning! : Something is wrong with system to send mail.';
    
                                }else{
                                                  $data["responce"] = true;  
                                                  $data["error"] = 'Success! : Recovery mail sent to your email address please verify link.';
    
                                }
                   }else{
                                             $data["responce"] = false;  
                                             $data["error"] = 'Warning! : No user found with this email.';
    
                   }
                }
                echo json_encode($data);
        }
        
        
        public function send_email_verified_mail($email,$token,$name){
          //$message = $this->load->view('emails/email_verify',array("name"=>$name,"active_link"=>site_url("users/verify_email?email=".$email."&token=".$token)),TRUE);
          
           
                    
                            $this->email->from("shreeharitest@gmail.com","Grocery Store");
                            $list = array($email);
                            $this->email->to($list); 
                             $this->email->reply_to("shreeharitest@gmail.com","Grocery Store");
                            $this->email->subject('Forgot password request');
                            $this->email->message("Hi ".$name." \n Your password forgot request is accepted plase visit following link to change your password. \n
                                ".site_url("users/modify_password/".$token)."
                                ");
                           return $this->email->send();
                      
    }
    /* End Forgot Password */   
        
         
        
        
}

?>