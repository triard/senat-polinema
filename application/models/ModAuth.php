<?php
class ModAuth extends CI_model {
    private $_table = "account";
    
    function log() {
      $post = $this->input->post();
      // $data = array('username'=>$username);
      // $cek1 = $this->db->get_where('account', $data)->num_rows();
      $this->db->where('username', $post["username"]);
      $cek1 = $this->db->get($this->_table)->row();
      if($cek1) {
        $isPasswordTrue = password_verify($post["password"] ,$cek1->password);
        if($isPasswordTrue){
        $data_session = array(
            'username' => $cek1->username,
            'level' => $cek1->level,
            'email' => $cek1->email,
            'user_id'=> $cek1->user_id,
            'status' => "login"
        );
        $this->session->set_userdata($data_session);
      }
      }
  }
       //Start: method tambahan untuk reset code  
   public function getUserInfo($id)  
   {  
     $q = $this->db->get_where('account', array('user_id' => $id), 1);   
     if($this->db->affected_rows() > 0){  
       $row = $q->row();  
       return $row;  
     }else{  
       error_log('no user found getUserInfo('.$id.')');  
       return false;  
     }  
   }  
   
  public function getUserInfoByEmail($email){  
     $q = $this->db->get_where('account', array('email' => $email), 1);   
     if($this->db->affected_rows() > 0){  
       $row = $q->row();  
       return $row;  
     }  
   }  
   
   public function insertToken($user_id)  
   {    
     $token = substr(sha1(rand()), 0, 30);   
     $date = date('Y-m-d');  
       
     $string = array(  
         'token'=> $token,  
         'user_id'=>$user_id,  
         'created'=>$date  
       );  
     $query = $this->db->insert_string('tokens',$string);  
     $this->db->query($query);  
     return $token . $user_id;  
       
   }  
   
   public function isTokenValid($token)  
   {  
     $tkn = substr($token,0,30);  
     $uid = substr($token,30);     
       
     $q = $this->db->get_where('tokens', array(  
       'tokens.token' => $tkn,   
       'tokens.user_id' => $uid), 1);               
           
     if($this->db->affected_rows() > 0){  
       $row = $q->row();         
         
       $created = $row->created;  
       $createdTS = strtotime($created);  
       $today = date('Y-m-d');   
       $todayTS = strtotime($today);  
         
       if($createdTS != $todayTS){  
         return false;  
       }  
         
       $user_info = $this->getUserInfo($row->user_id);  
       return $user_info;  
         
     }else{  
       return false;  
     }  
       
   }   
   
   public function updatePassword($post)  
   {    
     $this->db->where('user_id', $post['user_id']);  
     $this->db->update('account', array('password' => password_hash($post['password'], PASSWORD_DEFAULT)));      
     return true;  
   }   
   //End: method tambahan untuk reset code  
}